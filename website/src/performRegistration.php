<!--
    Performs the registration checks with the database and such and creates a new user which will be logged in by default
    Sets the 'loggedin' session to true if it passes the checks, false otherwise
    Rafael Félix
-->

<?php 

session_start();

require_once('php-single-line-db-queries/db_functions.php');

$ok = executeNonQuery('INSERT INTO user(username) VALUES(:name)', array(array('name', 'lucas')));

if(!$ok) {
    echo 'Une erreur est survenue lors de la création du compte.';
}
else{

}

?>