<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<!--
    Page that describes the project a little bit
    Rafael Félix
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
    <div class="fullcontainer">
        <div class="offsetContainer" style="margin-left: 25%; margin-right: 25%; text-align: justify;">

            <!-- Title/contents -->
            <h1 class="h1 mb-5 font-weight-normal" style="text-align: center;">Studeum</h1>
            <p>
                Studeum est un site web qui a été développé par Lucas Charbonnier, Thomas Germano et Rafael Félix
                dans le cadre du travail de maturité (TIP) de l'École Technique des Métiers de Lausanne.
                
            </p>
            <p>
                Le projet consiste en ce site internet, qui sert à générer des horaires de répétition de vos vocabulaires,
                afin, d'une partie, de réussir une éventuelle évaluation, mais également afin que vous reteniez réellement 
                ces mots sur le long terme. Pour cela, une fonction qui décrit la rétention mémorielle moyenne d'une personne 
                est utilisée.
            </p>
            <p class="mb-5">
                Le fonctionnement précis de cette fonction et la synthèse de nos recherches à ce propos sont décris dans un 
                document qui faisait également partie de ce travail.<br>
                Nous avons aussi rédigé un document analysant les difficultés d'apprentissage d'un vocabulaire Anglais pour
                une personne francophone.
                <!-- TODO: liens de telechargement de docs (?) -->
            </p>

            <!-- "Return" button -->
            <?php
                if(!isset($_SESSION['loggedin']) || (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === false)) {
                    echo "<button type=\"button\" class=\"btn btn-outline-secondary mb-3\" onclick=\"location.href = 'home.php';\">Retour</button>";
                }
            ?>

            <!-- Footer -->
            <hr class="mt-5"><p style="text-align: center;">© 2020 - Studeum</p>
        </div>
    </div>

    <!-- JS to work with Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>