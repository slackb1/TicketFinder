<?php
include( 'config.php' );
include( 'functions.php' );


removeEvent($database, $_GET['eventID']);


header('Location: adminRemove.php?message=success');

?>