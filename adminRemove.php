<?php

include( 'config.php' );
include( 'functions.php' );

$events = getAllEvents($database);

$message = '';
if ( isset($_GET['message']) ) {
    $message = 'Event successfully removed.';
}


include( 'admin/adminMenu.php' );
include( 'includes/preamble.php' );
?>

<body>
<a class="button button-primary" style="font-size: medium; margin-left: 20px;" href="admin.php"><< Back to Admin Panel</a>
    
    
    
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
        </div>
    </div>
    
    <?php foreach($events as $event) : ?>
    <div class="row fadeInOnLoad" style="border-bottom: 1px solid black; margin-bottom: 10px;">
        <div class="one-third column" style="border-right: 1px solid black;">
        <?php
            //formatting the date for date section
            $date=date_create($event['date']);
            $date = date_format($date,"m/d/Y");
            echo $date;
        ?>
        </div>
        <div class="one-third column" style="border-right: 1px solid black">
            <?php echo $event['title'] ?>
        </div>
        <div class="one-third column numTixRemove">
            <a href="removeEvent.php?eventID=<?php echo $event['eventID']?>" onclick="return confirm('Are you sure you want to delete this event?');" style="color:red; text-decoration: none;"><b>REMOVE</b></a>
        </div>
    </div>
    <?php endforeach ?>
    
</div>
    

    
</body>