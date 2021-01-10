<?php

require_once('php-single-line-db-queries/db_functions.php');

date_default_timezone_set('Europe/Zurich');

function getVocabsForUser($username, $vocabId) {
    $vocabularies = executeQuery('SELECT 
                                    v.id, 
                                    v.label, 
                                    l.label as language, 
                                    v.words_count, 
                                    v.creation_date,
                                    v.param_retention_threshold,
                                    v.param_alpha
                                  FROM vocabulary v 
                                  LEFT JOIN user u  
                                    ON v.owner = u.id
                                  LEFT JOIN language l
                                    ON l.id = v.language
                                  WHERE 
                                    u.username = :username
                                    AND
                                    (
                                      :id IS NULL
                                      OR
                                      v.id = :id
                                    )'
                                    , array(array('username', $username), array('id', $vocabId)));
    return $vocabularies;
}

/*
function generateStudyCalendarForUser($username, $vocabId) {
    $vocabs = getVocabsForUser($username, $vocabId);

    $calendar = array();

    // Pour chaque vocabulaire...
    foreach($vocabs as $v) {
      $current_date = new DateTime($v['creation_date']);

      for($i = 0; $i < 20; $i++) {
        $current_date->add(new DateInterval(sprintf('P%dD', $i)));
        $date = $current_date->format('Y-m-d');
        $calendar[$date][] = $v;
      }
    }

    ksort($calendar);
    return $calendar;
}
*/

function generateStudyCalendarForUser($username, $vocabId) {
  $vocabs = getVocabsForUser($username, $vocabId);

  $calendar = array();

  $lowerLimit = new DateTime(date('Y-m-d'));

  $upperLimit = new DateTime(date('Y-m-d'));
  $upperLimit->add(new DateInterval(sprintf('P%dD', 365)));

  foreach($vocabs as $v) {

    $retentionThreshold = $v['param_retention_threshold'];
    $alpha = $v['param_alpha'];
    $current_date = new DateTime($v['creation_date']);

    $sessionsCount = 1;
    while($current_date < $upperLimit) {

      if($current_date >= $lowerLimit && $current_date <= $upperLimit) {
        $date = $current_date->format('Y-m-d');
        $calendar[$date][] = $v;
      } 

      $isi = computeISI($sessionsCount, $retentionThreshold, $alpha);
      $isi = max(round($isi), 1);
      
      $current_date->add(new DateInterval(sprintf('P%dD', $isi)));
               
      $sessionsCount++;      
    }
  }

  ksort($calendar);
  return $calendar;
}

/**
 * Computes the ISI separating session number n and n+1, depending on the retention threshold Rt and the alpha parameter.
 */
function computeISI($n, $Rt, $a) {
  $rawISI = pow(10, ($n * $a * (1 - $Rt)) / ($Rt * $Rt)) - 1; // Computing exact ISI value
  $roundedISI = round($rawISI); // Rounding to the nearest integer
  $adjustedISI = max(1, $roundedISI); // Limiting the ISI to 1, in case the result of the rounding is 0
  return $adjustedISI;
}

?>