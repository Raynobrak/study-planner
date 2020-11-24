<?php
session_start();

require_once('php-single-line-db-queries/db_functions.php');

if(
isset($_SESSION['loggedUser']) &&
isset($_POST['vocLabel']) &&
isset($_POST['language']) &&
isset($_POST['wordCount']) &&
isset($_POST['firstStudyDate'])) {

    $user = $_SESSION['loggedUser']['id'];

    echo executeNonQuery('INSERT INTO vocabulary (
        owner, 
        language, 
        label,
        words_count, 
        creation_date
    ) VALUES (
        :user, 
        :lng, 
        :lbl, 
        :wc, 
        :cd)'
    , array(
        array('user', $user), 
        array('lng', $_POST['language']),
        array('lbl', $_POST['vocLabel']),
        array('wc', $_POST['wordCount']),
        array('cd', $_POST['firstStudyDate'])));
}

header('Location: vocabs.php');
?>