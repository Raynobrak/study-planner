<!--
    Performs the registration checks with the database and such and creates a new user which will be logged in by default
    Sets the 'loggedin' session to true if it passes the checks, false otherwise
    Rafael Félix + Lucas Charbonnier
-->

<?php 

session_start();

require_once('php-single-line-db-queries/db_functions.php');

function print_error($err) {
    echo '<div class="alert alert-danger" role="alert">Erreur lors de la création du compte : '.$err.'</div>';
}

// Making sure ever
if( !empty($_POST['inputUsername']) &&
    !empty($_POST['inputPassword']) &&
    !empty($_POST['inputPasswordConf'])) {

    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];
    $passwordConf = $_POST['inputPasswordConf'];

    if(strlen($username) > 50) {
        print_error('Merci de choisir un nom d\'utilisateur ne dépassant pas 50 caractères.');
    }
    else {
        if($username != strip_tags($username)) {
            print_error('Merci de ne pas essayer d\'injecter des caractères interdits dans votre nom d\'utilisateur...');
        }
        else {
            if($password != $passwordConf) {
                print_error('Vous avez mal répété votre mot de passe.');
            }
            else {

                $usernameTaken = count(executeQuery('SELECT 1 FROM user WHERE username = :username', array(array('username', $username, PDO::PARAM_STR)))) > 0;
                if($usernameTaken) {
                    print_error('Le nom d\'utilisateur souhaité est déjà utilisé par une autre personne, merci d\'en choisir un autre.');
                }
                else {
                    $secure_password_hash = password_hash($password, PASSWORD_DEFAULT);
                
                    $ok = executeNonQuery('INSERT INTO user(username, password_hash, registration_date) VALUES (:username, :pass, NOW())', array(array('username', $username), array('pass', $secure_password_hash)));
    
                    if(!$ok) {
                        print_error('Impossible de créer le compte pour une raison inconnue, merci de réessayer plus tard.');
                    }
                    else{
                        echo 'Compte créé avec succès. Vous pouvez maintenant <a href="login.php">vous connecter</a>.';
                    }
                }
            }
        }
    }
}
else {
    echo 'empty fields';
}

?>