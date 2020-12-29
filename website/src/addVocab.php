<?php
session_start();

require_once('php-single-line-db-queries/db_functions.php');

if(
isset($_SESSION['loggedUser']) &&
isset($_POST['vocLabel']) &&
isset($_POST['language']) &&
isset($_POST['wordCount']) &&
isset($_POST['firstStudyDate']) &&
isset($_POST['alpha']) &&
isset($_POST['retentionThreshold']) ) {

    $user = $_SESSION['loggedUser']['id'];

    echo executeNonQuery('INSERT INTO vocabulary (
        owner, 
        language, 
        label,
        words_count, 
        creation_date,
        param_alpha,
        param_retention_threshold
    ) VALUES (
        :user, 
        :lng, 
        :lbl, 
        :wc, 
        :cd,
        :alpha,
        :rt)'
    , array(
        array('user', $user), 
        array('lng', htmlspecialchars($_POST['language'])),
        array('lbl', htmlspecialchars($_POST['vocLabel'])),
        array('wc', htmlspecialchars($_POST['wordCount'])),
        array('cd', htmlspecialchars($_POST['firstStudyDate'])),
        array('alpha', htmlspecialchars($_POST['alpha'])),
        array('rt', htmlspecialchars($_POST['retentionThreshold']))));
}

header('Location: vocabs.php');
?>