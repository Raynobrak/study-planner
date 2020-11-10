<?php

require_once('php-single-line-db-queries/db_functions.php');

function getVocabsForUser($username) {
    $vocabularies = executeQuery('SELECT 
                                    v.id, 
                                    v.label, 
                                    l.label as language, 
                                    v.words_count, 
                                    v.creation_date 
                                  FROM vocabulary v 
                                  LEFT JOIN user u  
                                    ON v.owner = u.id
                                  LEFT JOIN language l
                                    ON l.id = v.language
                                  WHERE 
                                    u.username = :username', array(array('username', $username)));
    return $vocabularies;
}

/*
function computeStudySessionsForVocabulary($vocabulary) {

    $sessions = array();
    for($i = 0; $i < 5; $i++) {
      $current_date->add(new DateInterval(sprintf('P%dD', $i)));
      var_dump($current_date);
      $sessions[] = array($current_date);
    }

    return $sessions;
}
*/

function generateStudyCalendarForUser($username) {
    $vocabs = getVocabsForUser($username);

    $calendar = array();

    // Pour chaque vocabulaire...
    foreach($vocabs as $v) {

      $current_date = new DateTime($v['creation_date']);

      for($i = 0; $i < 5; $i++) {
        $current_date->add(new DateInterval(sprintf('P%dD', $i)));
        $date = $current_date->format('Y-m-d');
        $calendar[$date][] = $v;
      }
    }

    ksort($calendar);
    return $calendar;
}

?>