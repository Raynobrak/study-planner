<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<!--
	Page that lets you view your study planning
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="favicon.png"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link rel="stylesheet" href="style.css">

    <title>Mon Calendrier - Studeum</title>
</head>

<!-- Fullpage -->
<body>
	<?php
        include('navbar.php');
    ?>

	<div class="fullcontainer">
        <div class="container offsetContainer">
			<h2 class="mb-3">Mon planning de révision</h2>
			<h4 class="mb-3">Révisions planifiées :</h4>

			<?php
				require_once('calendar_computation_utils.php');

				$vocabId = null;

				if(!empty($_GET['vocabId'])){
					$vocabId = $_GET['vocabId'];
				}

				$calendar = generateStudyCalendarForUser($_SESSION['loggedUser']['username'], $vocabId);

				if(empty($calendar)) {
					echo '<div class="alert alert-primary mb-5" role="alert">Vous n\'avez aucun vocabulaire</div>';
				}

				foreach($calendar as $date => $vocs) {
					echo '<span><strong>'.$date.'</strong></span>';
					echo '<ul>';

					$end = end($vocs);
					foreach($vocs as $v) {
						echo '<li>'.$v['label'].'</li>';
						// if($end != $v) echo '<br>';
					}
					echo '</ul>';
				}
			?>

			<hr class="mt-5"><p style="text-align: center;">© 2020 - Studeum</p>
		</div>
	</div>
    <!-- JS to work with Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>