<?php

include( 'config.php' );
include( 'functions.php' );

$message = '';

if ( isset($_GET['add']) ) {
    if ( $_GET['add'] == 'success' ) {
    $message = 'Event was succesfully added.';
    }
}

if ( isset($_GET['edit']) ) {
    if ( $_GET['edit'] == 'success' ) {
        $message = 'Event was updated successfully.';
    }
}


include( 'admin/adminMenu.php' );

include( 'includes/preamble.php' );
?>

<body>

<div class="container">
    <div class="row" style="text-align: center;">
        <h5><?php echo $message ?></h5>
    </div>
    <div class="row" style="text-align:center;">
        <a class="button button-primary" style="font-size: large;" href="adminAdd.php">+ Add Event</a>
    </div>
    <div class="row" style="text-align:center;">
        <a class="button button-primary" href="adminRemove.php" style="font-size: large;">- Remove Event</a>
    </div>
    <div class="row" style="text-align:center;">
        <a class="button button-primary" href="adminAllEvents.php" style="font-size: large;">&#916; Edit Event</a>
    </div>

</div>



</body>
