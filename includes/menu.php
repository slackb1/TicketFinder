<div class="header-menu">
<div class="row u-full-width">
    <div class="three columns">
        <h1>TicketFinder</h1>
    </div>
    <div class="four columns" style="text-align:right">
        <form method="GET" action="index.php">
			<input type="text" name="search-term" placeholder="Search events here..." />
            <input type="submit" value="Search" />
		</form> 
    </div>   
    <div class="three columns" style="padding-top: 1em; text-align: right;">
        <h5>Welcome, <?php echo $user->getName() ?>!</h5>
    </div>
    <div class="two columns" style="text-align: right; padding-top: 9px;">
        <a href="logout.php"><button>Logout</button></a>
    </div>
</div>
    
<div class="navbar twelve columns">
    <ul>
        <li><a href="index.php">Events &nbsp;</a></li>
        <li><a href="reservations.php">&nbsp;Reservations</a></li>
    </ul>
</div>    
    
    
</div>


<?php
    /*
    if ($current_url == 'index.php') : ?>
        <h5><u>Listing</u> | Reservations</h5>
        <?php elseif ($current_url == 'reservations.php') : ?>
        <h5>Listing | <u>Reservations</u></h5>
        <?php endif; ?>
        */
?>