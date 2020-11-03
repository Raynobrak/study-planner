<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<!--
    Page that lets you edit and add vocab units
    Rafael Félix
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link rel="stylesheet" href="style.css">

    <title>Mes Vocabulaires - Studeum</title>
</head>

<!-- Fullpage -->
<body>

    <?php
        include('navbar.php');
    ?>

    <!-- Container -->
    <div class="fullcontainer">
        <div class="container offsetContainer">

            <!-- Vocabs Table -->
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Branche</th>
                        <th scope="col">Nombre de mots</th>
                        <th scope="col">Date de début</th>
                        <th scope="col">Planning de révision</th>
                        <th scope="col">Lien de la ressource</th>
                        <th scope="col">Suppression</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < 7; $i++) {
                            echo    '<tr>
                                        <th scope="row">'.($i+1).'</th>
                                        <td>Ayy</td>
                                        <td>Anglais</td>
                                        <td>150</td>
                                        <td>12.12.2021</td>
                                        <td class="text-center">'.
                                            // TODO: calendar page with data given trough GET
                                            '<button type="button" class="btn btn-info btn-sm"
                                            onclick="location.href = \'calendar.php\';">Afficher</button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-info btn-sm"
                                            onclick="window.open(\'https://www.bing.com\', \'_blank\');">Lien externe</button>
                                        </td>
                                        <td class="text-center">'.
                                            // TODO: eraseVocab.php page with data given trough GET
                                            '<button type="button" class="btn btn-danger btn-sm"
                                            onclick="location.href = \'eraseVocab.php\';">Supprimer</button>
                                        </td>
                                    </tr>';
                        }
                    ?>
                </tbody>
            </table>   
        </div>
    </div>

    <!-- JS to work with Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>