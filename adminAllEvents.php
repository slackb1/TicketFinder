<?php
include( 'config.php' );
include( 'functions.php' );

$events = getAllEvents($database);


//I go last in the order of includes!
include( 'includes/preamble.php' );
?>
<?php include ( 'admin/adminMenu.php' ); ?> 

<body>   

<a class="button button-primary" style="font-size: medium; margin-left: 20px;" href="admin.php"><< Back to Admin Panel</a>
<div class="container">
    <br />
    
    <?php foreach($events as $event) : ?>
    <?php 
        //formatting the date for date section
        $date=date_create($event['date']);
        $date = date_format($date,"m/d/Y");
    ?>
    
    <div class="row">
        <div class="twelve columns">
            <h4><?php echo $event['title'] ?></h4>
        </div>
    </div>
    <div class="row fadeInOnLoad">
        <div class="one-half column">
            <img src="<?php echo $event['photopath'] ?>" width="350">
        </div>
        <div class="one-half column">
            <h5><?php echo $date ?></h5>
            <h5>@ <?php echo $event['venue'] ?></h5>
            <h5><?php echo $event['city'] . ', ' . $event['state'] ?></h5>
            <a class="button button-primary" href="editEvent.php?eventID=<?php echo $event['eventID'] ?>">
                EDIT EVENT</a>
        </div>
    </div>
    <hr />
<?php endforeach ?>
</div>
    
    
</body>
<?php include( 'includes/footer.php' ) ?>
</html>

