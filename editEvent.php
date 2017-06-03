<?php
include( 'config.php' );
include( 'functions.php' );


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $eventID = $_POST['eventID'];
    $title = $_POST['title'];
    $venue = $_POST['venue'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $date = '' . $year . '-' . $month . '-' . $day;
    
    $sql = file_get_contents('sql/editEvent.sql');
    $statement = $database->prepare($sql);
    $params = array (
        'eventID' => $eventID,
        'title' => $title,
        'venue' => $venue,
        'city' => $city,
        'state' => $state,
        'date' => $date
    );
    $statement->execute($params);
    
    header('Location: admin.php?edit=success');
}

if (isset($_GET['eventID'])) {
    $event = getEvent($database, $_GET['eventID']);
    $event = $event[0];
}
else {
    header('Location: index.php');
}

//setting success message content 
$message = '';
if ( isset($_GET['message']) ) {
    $message = 'Event updated successfully.';
}


//I go last in the order of includes!
include( 'includes/preamble.php' );
?>

<body>
<?php 
    include( 'admin/adminMenu.php' );
    $date= $event['date'];
    $currentYear = substr($date,0,4);
    $currentMonth = substr($date,5,2);
    $currentDay = substr($date,8,2); 
    
    $title = $event['title'];
    $venue = $event['venue'];
    $city = $event['city'];
    $currentState = $event['state'];
    
    $months = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    $days = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31');
    $years = array('2017', '2018', '2019', '2020');
    $states = array(
    'AL'=>'Alabama',
    'AK'=>'Alaska',
    'AZ'=>'Arizona',
    'AR'=>'Arkansas',
    'CA'=>'California',
    'CO'=>'Colorado',
    'CT'=>'Connecticut',
    'DE'=>'Delaware',
    'DC'=>'District of Columbia',
    'FL'=>'Florida',
    'GA'=>'Georgia',
    'HI'=>'Hawaii',
    'ID'=>'Idaho',
    'IL'=>'Illinois',
    'IN'=>'Indiana',
    'IA'=>'Iowa',
    'KS'=>'Kansas',
    'KY'=>'Kentucky',
    'LA'=>'Louisiana',
    'ME'=>'Maine',
    'MD'=>'Maryland',
    'MA'=>'Massachusetts',
    'MI'=>'Michigan',
    'MN'=>'Minnesota',
    'MS'=>'Mississippi',
    'MO'=>'Missouri',
    'MT'=>'Montana',
    'NE'=>'Nebraska',
    'NV'=>'Nevada',
    'NH'=>'New Hampshire',
    'NJ'=>'New Jersey',
    'NM'=>'New Mexico',
    'NY'=>'New York',
    'NC'=>'North Carolina',
    'ND'=>'North Dakota',
    'OH'=>'Ohio',
    'OK'=>'Oklahoma',
    'OR'=>'Oregon',
    'PA'=>'Pennsylvania',
    'RI'=>'Rhode Island',
    'SC'=>'South Carolina',
    'SD'=>'South Dakota',
    'TN'=>'Tennessee',
    'TX'=>'Texas',
    'UT'=>'Utah',
    'VT'=>'Vermont',
    'VA'=>'Virginia',
    'WA'=>'Washington',
    'WV'=>'West Virginia',
    'WI'=>'Wisconsin',
    'WY'=>'Wyoming',
);
?> 
    
    
<div class="container">
    <h4 class="fadeInOnLoad" style="text-align: center;"><?php echo $message; ?></h4>
    <form action="" method="post">
    <div class="row">
    <div class="four columns">
            <label for="title">Title</label>
            <input type="text" class="u-full-width" id="title" name="title" required value="<?php echo $title ?>">
        </div>
    </div>
    
    <div class="row">
        <div class="one-half column fadeInOnLoad">
            <img src="<?php echo $event['photopath'] ?>" width="350">
        </div>
        <div class="one-half column">
            <!-- SELECT MONTH -->
            <div class="row">
            <div class="two columns">
            <label for="month">MM</label>
            <select name="month" id="month" required>
                <?php foreach( $months as $month ) : ?>
                <option value="<?php echo $month ?>" <?php if ($currentMonth == $month) {echo 'selected';} ?>><?php echo $month?></option>
                <?php endforeach; ?>
            </select>   
            </div>
            <!-- SELECT DAY -->
            <div class="two columns">
            <label for="day">DD</label>
            <select name="day" id="day" required>
                <?php foreach( $days as $day ) : ?>
                <option value="<?php echo $day ?>" <?php if ($currentDay == $day) {echo 'selected';} ?>><?php echo $day?></option>
                <?php endforeach; ?>
            </select>
            </div>
            <!-- SELECT YEAR -->
            <div class="two columns">
            <label for="year">YYYY</label>
            <select name="year" id="year" required>
                <?php foreach( $years as $year ) : ?>
                <option value="<?php echo $year ?>" <?php if ($currentYear == $year) {echo 'selected';} ?>><?php echo $year?></option>
                <?php endforeach; ?>
            </select>
            </div>
            </div><!-- end of row -->
            <!-- INPUT VENUE -->
            <div class="row">
            <label for="venue">Venue</label>
            <input type="text" required id="venue" name="venue" value="<?php echo $venue ?>">
            </div>
            <!-- INPUT CITY -->
            <div class="row">
            <div class="one-half column">
            <label for="city">City</label>
            <input type="text" name="city" id="city" value="<?php echo $city ?>">
            </div>
            <!-- SELECT STATE -->
            <div class="one-half column">
            <label for="state">State</label>
            <select id="state" required name="state">
                <?php foreach ($states as $key => $value) : ?>
                <option value="<?php echo $key ?>" <?php if ($currentState == $key) {echo 'selected';} ?>><?php echo $value?></option>
                <?php endforeach; ?>
            </select>
            </div>
            </div>
            <input type="hidden" name="eventID" value="<?php echo $_GET['eventID'] ?>">
            <input type="submit" class="button-primary" value="SUBMIT">
            </form>
        </div>
    </div>
    
</div>
    
    
</body>
<?php include( 'includes/footer.php' ) ?>
</html>

