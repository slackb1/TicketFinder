<?php
include( 'config.php' );
include( 'functions.php' );


if (isset($_GET['eventID'])) {
    $event = getEvent($database, $_GET['eventID']);
    $event = $event[0];
}
else {
    header('Location: index.php');
}

$numOfTickets = getNumOfTickets($database, $_GET['eventID']);
$numOfTickets = $numOfTickets[0]['num'];
$ticketsRemaining = 50 - $numOfTickets;

$userTickets = getUserTicketsForThisEvent($database, $_GET['eventID'], $_SESSION['userID']);
$userTickets = $userTickets[0]['tix'];

$maxAvailableToUser = 5 - $userTickets;
if ( $maxAvailableToUser == 5 ) { $userTickets = 0; }

//I go last in the order of includes!
include( 'includes/preamble.php' );
?>

<body>
<?php 
    include( 'includes/menu.php' );
    $date=date_create($event['date']);
    $date = date_format($date,"m/d/Y");    
?> 
    
    
<div class="container">
    <div class="row">
    <div class="twelve columns">
            <h4><?php echo $event['title'] ?></h4>
        </div>
    </div>
    
    <div class="row">
        <div class="one-half column fadeInOnLoad">
            <img src="<?php echo $event['photopath'] ?>" width="350">
        </div>
        <div class="one-half column fadeInOnLoad">
            <h5><?php echo $date ?></h5>
            <h6>@ <?php echo $event['venue'] ?></h6>
            <h6><?php echo $event['city'] . ', ' . $event['state'] ?></h6>
            <h6><?php echo $ticketsRemaining ?> Seats Remaining (Max 5 per person)</h6>
            <h6>You currently have <b><?php echo $userTickets ?></b> tickets for this event.</h6>
            <form action="handleTicketRequest.php" method="post"> 
                <input type="number" name="submittedNumOfTickets" min="1" max="5">
                <input type="hidden" name="eventID" value="<?php echo $_GET['eventID'] ?>">
                <input type="hidden" name="userTickets" value="<?php echo $userTickets ?>">
                <?php if ( $numOfTickets == 0 ) : ?>
                 <input type="submit" class="button-primary" value="RESERVE TICKETS">
                <?php else : ?>
                 <input type="submit" class="button-primary" value="UPDATE TICKETS">
                <?php endif; ?>
            </form>
        </div>
    </div>
    
</div>
    
    
</body>
<?php include( 'includes/footer.php' ) ?>
</html>

