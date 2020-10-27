<?php
    session_start();

    $_SESSION['loggedin'] = false;
    $_SESSION['loggedUser'] = null;

    header('Location: home.php');
?>