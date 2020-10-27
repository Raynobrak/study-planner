<!-- Show navbar if connected -->
<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Studeum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="vocabs.php">Mes Vocabulaires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calendar.php">Calendrier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">Le Projet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="performDeconnection.php">Déconnexion</a>
            </li>
        </ul>
        </div>
    </nav>
<?php
    }
?>