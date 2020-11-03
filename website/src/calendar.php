<?php
    session_start();
    include('navbar.php');
    require_once('calendar_computation_utils.php');

    echo printStudyCalendarForUser($_SESSION['loggedUser']['username']);
?>