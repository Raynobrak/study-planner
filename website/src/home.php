<?php 
    session_start(); 
    $_SESSION['registrationError'] = false;
    $_SESSION['registrationSuccess'] = false;
    $_SESSION['loginError'] = false;

    // Auto login
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header('Location: vocabs.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">

<!--
    Page that a user who's not logged in will land on
    Rafael Félix
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="favicon.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link rel="stylesheet" href="style.css">

    <title>Accueil - Studeum</title>
</head>

<!-- Fullpage -->
<body class="fullpage">

    <?php
        include('navbar.php');
    ?>

    <!-- Container -->
    <div class="fullcontainer vertical-center">
        <div class="container text-center">

            <!-- Title/subtitle -->
            <h1 class="h1 mb-3 font-weight-normal">Studeum</h1>
            <h2 class="h5 mb-5 font-weight-normal">Connectez vous ou créez un compte pour pouvoir commencer à utiliser Studeum</h2>

            <!-- Login/register buttons -->
            <div class="text-center mb-5">
                <div class="btn-group-vertical" role="group" aria-label="Login Register Buttons">
                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href = 'login.php';">Se connecter</button>
                    <button type="button" class="btn btn-primary btn-lg" onclick="location.href = 'register.php';">Créer un compte</button>
                </div>
            </div>

            <!-- "About" button -->
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="location.href = 'about.php';">Le projet</button>

            <!-- Footer -->
            <hr class="mt-5"><p>© 2020 - Studeum</p>
        </div>
    </div>

    <!-- JS to work with Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>