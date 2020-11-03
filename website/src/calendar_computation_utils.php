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

function computeStudySessionsForVocabulary($vocabulary) {
    $start_date = new DateTime($vocabulary['creation_date'];
}

function computeStudyCalendar($vocabularies) {

}

?>