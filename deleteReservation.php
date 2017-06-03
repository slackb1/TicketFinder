<?php

include ( 'config.php' );
include ( 'functions.php' );

$eventID = $_GET['eventID'];
$userID = $_SESSION['userID'];

deleteReservation($database, $eventID, $userID);

header('Location: reservations.php?message=removed');


?>