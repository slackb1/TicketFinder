<?php

//I am the index page that will the house the listings
include( 'config.php' );
include( 'functions.php' );

if ( $user->getIsAdmin() == 1) {
    header('Location: admin.php');
}
//code to handle a search query
if (isset($_GET['search-term'])) {
       $searchTerm = '%' . $_GET['search-term'] . '%';
}
else $searchTerm = '%';

//call searchEvents function 
$events = searchEvents($database, $searchTerm);

//I go last in the order of includes!
include( 'includes/preamble.php' );
?>
<body>
<?php include ( 'includes/menu.php' ); ?>    

<div class="container">
    <br />
    <!--showing current search term -->
    <?php if (isset($_GET['search-term'])) : ?>
    <div class="row fadeInOnLoad" style="text-align:center">
        <h6>Showing search results for: '<?php echo $_GET['search-term']?>'</h6>
    </div>
    <?php endif; ?>
    
    
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
            <a class="button button-primary" href="event.php?eventID=<?php echo $event['eventID'] ?>">
                GET TICKETS</a>
        </div>
    </div>
    <hr />
<?php endforeach ?>
</div>
    
    
</body>
<?php include( 'includes/footer.php' ) ?>
</html>
