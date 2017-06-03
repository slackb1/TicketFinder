<?php

include( 'config.php' );
include( 'functions.php' );

$message = "";

//get current user reservations 
$myReservations = getUserReservations($database, $_SESSION['userID']);
//$myReservations = $myReservations[0];

if ( isset($_GET['message']) ) {
    if ( $_GET['message'] == 'fail') {
        $message = 'You have reached the max number of tickets for the event.';
    }
    else if ( $_GET['message'] == 'add' ) {
        $message = 'Tickets successfully added.';
    }
    else if ( $_GET['message'] == 'edit' ) {
        $message = 'Ticket reservations successfully updated';
    }
    else if ( $_GET['message'] == 'removed' ) {
        $message = 'Tickets were removed.';
    }
}

//I go last in the order of includes!
include( 'includes/preamble.php' );
?>
<body>
<?php include( 'includes/menu.php' ); ?>
    
<div class="container">
    <div class="row" style="text-align: center;">
        <h5><?php echo $message ?></h5>
    </div>
    <div class="row" style="border-bottom: 2px solid black; margin-bottom: 10px;">
        <div class="one-third column" style="border-right: 1px solid black;">
            <b>DATE</b>
        </div>
        <div class="one-third column" style="border-right: 1px solid black">
            <b>EVENT</b>
        </div>
        <div class="one-third column">
            <b># OF TICKETS</b>
        </div>
    </div>
    
    <?php foreach($myReservations as $myReservation) : ?>
    <div class="row fadeInOnLoad" style="border-bottom: 1px solid black; margin-bottom: 10px;">
        <div class="one-third column" style="border-right: 1px solid black;">
        <?php
            //formatting the date for date section
            $date=date_create($myReservation['date']);
            $date = date_format($date,"m/d/Y");
            echo $date;
        ?>
        </div>
        <div class="one-third column" style="border-right: 1px solid black">
            <a href="event.php?eventID=<?php echo $myReservation['eventID']?>" style="color: black; text-decoration: none;"><?php echo $myReservation['title'] ?></a>
        </div>
        <div class="one-third column numTixRemove">
            <?php echo $myReservation['numOfTickets'] ?> &nbsp;
            <a href="event.php?eventID=<?php echo $myReservation['eventID'] ?>" style="color: blue; text-decoration: none;"><b>EDIT</b></a>&nbsp;&nbsp;
            <a href="deleteReservation.php?eventID=<?php echo $myReservation['eventID']?>" style="color:red; text-decoration: none;"><b>REMOVE</b></a>
        </div>
    </div>
    <?php endforeach ?>
    
</div>
    
    
</body>
<?php include( 'includes/footer.php' ) ?>
</html>