<?php

require_once('php-single-line-db-queries/db_functions.php');

date_default_timezone_set('Europe/Zurich');

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

$NB_LANGUAGES = 6;

// Returns a string (the language) if the code is valid, null otherwise
function getLanguageFromCode($code) {
    switch($code) {
        case 0: return 'Anglais'; break;
        case 1: return 'Allemand'; break;
        case 2: return 'Italien'; break;
        case 3: return 'Latin'; break;
        case 4: return 'Français'; break;
        case 5: return 'Espagnol'; break;
        default: return null; break;
    }
}

// Returns an int (the code) if the language is valid, null otherwise
function getCodeFromLanguage($lang) {
    strtolower($lang);
    switch($lang) {
        case 'anglais':     return 0; break;
        case 'allemand':    return 1; break;
        case 'italien':     return 2; break;
        case 'latin':       return 3; break;
        case 'français':    return 4; break;
        case 'espagnol':    return 5; break;
        default: return null; break;
    }
}

?>