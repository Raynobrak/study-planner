<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<!--
    Page that will allow a user to create an account
    Rafael Félix
-->

<?php
    // TODO: SET loggedin SESSION

    // Check if user is logged in; if it's the case, then redirect onto vocabs page
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        header('Location: vocabs.php');
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link rel="stylesheet" href="style.css">

    <title>Créer un compte - Studeum</title>
</head>

<!-- Fullpage -->
<body class="fullpage">

    <!-- Container -->
    <div class="jumbotron vertical-center">
        <div class="container text-center">

            <!-- Title -->
            <h1 class="h1 mb-5 font-weight-normal">Studeum</h1>

            <!-- Login form -->
            <form class="form-login" method="POST" action="performRegistration.php">
                <h2 class="h4 mb-3 font-weight-normal">Créez un compte</h1>

                <!-- Username/Password/Conf -->
                <div class="input-group-vertical">
                    <label for="inputUsername" class="sr-only">Nom d'utilisateur</label>
                    <input type="text" id="inputUsername" class="form-control" placeholder="Nom d'utilisateur" 
                    oninvalid="this.setCustomValidity('Remplissez ce champ s\'il vous plaît')" required autofocus>
                    <label for="inputPassword" class="sr-only">Mot de passe</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" 
                    oninvalid="this.setCustomValidity('Remplissez ce champ s\'il vous plaît')" required>
                    <label for="inputPasswordConf" class="sr-only">Confirmation de mot de passe</label>
                    <input type="password" id="inputPasswordConf" class="form-control mb-3" placeholder="Confirmation de mot de passe" 
                    oninvalid="this.setCustomValidity('Remplissez ce champ s\'il vous plaît')" required>
                </div>
                
                <!-- Submit -->
                <button class="btn btn-lg btn-primary mb-5" type="submit">Créer le compte</button>
            </form>

            <!-- Create an account instead -->
            <button type="button" class="btn btn-sm btn-secondary mb-3" onclick="location.href = 'login.php';">J'ai déjà un compte</button>

            <!-- Cancel -->
            <button type="button" class="btn btn-sm btn-outline-secondary mb-3" onclick="location.href = 'home.php';">Retour</button>

            <!-- Footer -->
            <p class="mt-5"><hr>© 2020 - Studeum</p>
        </div>
    </div>

    <!-- JS to work with Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>