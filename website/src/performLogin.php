<!--
    Performs the log-in checks with the database and such and logs in the user
    Sets the 'loggedin' session to true if it passes the checks, false otherwise
    Rafael Félix
-->

<?php

session_start(); 

require_once('php-single-line-db-queries/db_functions.php');

//
// Redirects the user to the login page and shows an error
//
function redirect_print_error($err) {
    $_SESSION['loginError'] = true;
    $_SESSION['loginErrorText'] = $err;
    header('Location: login.php');
}

if( !empty($_POST['inputUsername']) &&
    !empty($_POST['inputPassword'])) {
    
    $username = $_POST['inputUsername'];

    $user = executeQuery('SELECT * FROM user WHERE username = :username', array(array('username', $username)));

    if($user) {
        $password_hash = $user[0]['password_hash'];
        $inputPassword = $_POST['inputPassword'];

        if(password_verify($inputPassword, $password_hash)) {
            executeNonQuery('UPDATE user SET last_login_date = NOW() WHERE username = :username', array(array('username', $username)));
            $_SESSION['loggedin'] = true;
            $_SESSION['loggedUser'] = $user[0];
            header('location:vocabs.php');
        }
        else {
            redirect_print_error('Mot de passe ou nom d\'utilisateur invalide.');
        }
    } 
    else {
        redirect_print_error('Mot de passe ou nom d\'utilisateur invalide.');
    }
}
else {
    print('Merci de remplir tous les champs.');
}

?>

