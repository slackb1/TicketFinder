<?php

include( 'config.php' );
include( 'functions.php' );

//$maxAvailableToUser = $_POST['availableToUser'];
$eventID = $_POST['eventID'];
$submittedNumOfTickets = $_POST['submittedNumOfTickets'];
$userTickets = $_POST['userTickets'];


/*

if ( $submittedNumOfTickets == 0 ) {
    //delete reservation
    reserveTickets($database, $eventID, $_SESSION['userID'], $numOfTickets);
    header('Location: reservations.php?message=success');
}
else if ( $maxAvailableToUser > 0 && $maxAvailableToUser < 5)
    {
    //add to current column
    addTickets($database, $eventID, $_SESSION['userID'], $numOfTickets);
    header('Location: reservations.php?message=success');
}

*/

if ( $userTickets == 0 ) {
    //create new row and reservation
    reserveTickets($database, $eventID, $_SESSION['userID'], $submittedNumOfTickets);
    header('Location: reservations.php?message=add');
}

else {
    editTickets($database, $eventID, $_SESSION['userID'], $submittedNumOfTickets);
    header('Location: reservations.php?message=edit');
}



?>
