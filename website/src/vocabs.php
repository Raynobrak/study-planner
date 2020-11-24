<?php
session_start();

require_once('calendar_computation_utils.php');
require_once('php-single-line-db-queries/db_functions.php');

// Load all the data from the DB
$user = $_SESSION['loggedUser']['username'];
$vocabsData = getVocabsForUser($user, null);

// Load all languages
$languages = executeQuery('SELECT * FROM language');
?>

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
			<h2 class="mb-3">Mes vocabulaires</h2>
            <!-- Vocabs Table -->
            <?php 
            if(count($vocabsData) > 0) { 
            ?>
                <table class="table table-striped table-bordered mb-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Langue</th>
                            <th scope="col">Nombre de mots</th>
                            <th scope="col">Date de première révision</th>
                            <th scope="col">Planning de révision</th>
                            <th scope="col">Suppression</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($i = 0; $i < count($vocabsData); $i++) {
                                echo    '<tr>
                                            <th scope="row">'.($i+1).'</th>
                                            <td>'.$vocabsData[$i][1].'</td>
                                            <td>'.$vocabsData[$i][2].'</td>
                                            <td>'.$vocabsData[$i][3].'</td>
                                            <td>'.$vocabsData[$i][4].'</td>
                                            <td class="text-center">'.
                                                '<button type="button" class="btn btn-info btn-sm"
                                                onclick="location.href = \'calendar.php?vocabId='.$vocabsData[$i][0].'\';">Afficher</button>
                                            </td>
                                            <td class="text-center">'.
                                                '<button type="button" class="btn btn-danger btn-sm"
                                                onclick="location.href = \'eraseVocab.php?vocabId='.$vocabsData[$i][0].'\';">Supprimer</button>
                                            </td>
                                        </tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <?php
                }
                else {
                    echo '<div class="alert alert-primary mb-5" role="alert">Vous n\'avez aucun vocabulaire</div>';
                }
                ?>

			<!-- 
				Formulaire pour ajouter un vocabulaire
			-->	
			<form method="post" action="addVocab.php">
				<div class="form_description mb-4">
					<h2>Ajouter un vocabulaire</h2>
					<p>Remplissez les champs puis cliquez sur "ajouter"</p>
				</div>						
				
                <div class="formcontainer">
                    <!-- Nom -->
                    <label for="vocLabel">Nom du vocabulaire </label>
                    <input id="vocLabel" name="vocLabel" class="form-control mb-3" type="text" maxlength="255" value="" 
                    oninvalid="this.setCustomValidity('Remplissez ce champ s\'il vous plaît')" required > 
                
                    <!-- Langue -->
                    <label for="language">Langue </label>
                    <select id="language" name="language" class="form-control mb-3"> 
                        <?php
                        for($i = 0; $i < count($languages); $i++) {
                            echo '<option value="'. $languages[$i]['id'] .'" '. (($i == 0) ? 'selected' : '') .'>'. $languages[$i]['label'] .'</option>';
                        }
                        ?>
                    </select>
                
                    <!-- Nombre de mots -->
                    <label for="wordCount">Nombre de mots du vocabulaire</label>
                    <input id="wordCount" name="wordCount" class="form-control mb-3" type="number" maxlength="255" value="" 
                    oninvalid="this.setCustomValidity('Remplissez ce champ s\'il vous plaît')" required > 
                    
                    <!-- Date de prmière révision -->
                    <label for="firstStudyDate">Date de première révision </label>
                    <input type="date" class="form-control mb-4" name="firstStudyDate" 
                    oninvalid="this.setCustomValidity('Remplissez ce champ s\'il vous plaît')" required >
                    
                    <!-- Submit -->		
                    <input id="saveForm" class="btn btn-success mb-5" type="submit" name="submit" value="Ajouter">
                </div>
			</form>
        </div>
    </div>

    <!-- JS to work with Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>