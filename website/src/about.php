<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<!--
    Page that describes the project a little bit
    Rafael Félix
-->

<!--
    TODO: Do better elements placement; they're all kinda cramped up in the middle rn it should feel more like an actual full-sized page
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <div class="fullcontainer jumbotron vertical-center">
        <div class="container text-center">

            <!-- Title/contents -->
            <h1 class="h1 mb-5 font-weight-normal">Studeum</h1>
            <p class="mb-5">
                Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet
            </p>

            <!-- "Return" button -->
            <?php
                if(!isset($_SESSION['loggedin']) || (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === false)) {
                    echo "<button type=\"button\" class=\"btn btn-outline-secondary mb-3\" onclick=\"location.href = 'home.php';\">Retour</button>";
                }
            ?>

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