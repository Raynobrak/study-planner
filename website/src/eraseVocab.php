<?php
session_start();

require_once('php-single-line-db-queries/db_functions.php');

if(isset($_GET['vocabId'])) {
    executeNonQuery('DELETE FROM vocabulary WHERE id=:id;', array(array('id', $_GET['vocabId'])));
}

header('Location: vocabs.php');
?>