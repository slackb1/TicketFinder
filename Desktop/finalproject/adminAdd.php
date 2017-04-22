<?php

include( 'config.php' );
include( 'functions.php' );




include( 'admin/adminMenu.php' );
include( 'includes/preamble.php' );



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

<body>
<a class="button button-primary" style="font-size: medium; margin-left: 20px;" href="admin.php"><< Back to Admin Panel</a>
<div class="container">
    <div class="row" style="text-align:center;">
        <h3><u>ADD EVENT</u></h3>
    </div>
    <form action="addEvent.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="four columns">
        <label for="title">Title</label>
        <input class="u-full-width" required type="text" placeholder="Example Band" id="title" name="title">
    </div>
        <div class="four columns">
            <label for="venue">Venue</label>
            <input class="u-full-width" required type="text" placeholder="Test Bank Arena" id="venue" name="venue">
    </div>
        <div class="four columns">
            <label for="city">City</label>
            <input class="u-full-width" required type="text" placeholder="Cincinnati" id="city" name="city">        
        </div>
    </div>
    <div class="row">
        <div class="four columns">
            <label for="state">State</label>
            <select id="state" required name="state">
                <?php foreach ($states as $key => $value) : ?>
                <option value="<?php echo $key ?>" ><?php echo $value?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="eight columns">
            <!-- SELECT MONTH -->
            <div class="two columns">
            <label for="month">MM</label>
            <select name="month" id="month" required>
                <?php foreach( $months as $month ) : ?>
                    <option value="<?php echo $month ?>"><?php echo $month ?></option>
                <?php endforeach ?>
            </select>
            </div>
            <!-- SELECT DAY --> 
            <div class="two columns">
            <label for="day">DD</label>
            <select name="day" id="day" required>
                <?php foreach( $days as $day ) :?>
                <option value="<?php echo $day ?>"><?php echo $day ?></option>
                <?php endforeach ?>
            </select>
            </div>
            <!-- SELECT YEAR --> 
            <div class="two columns">
            <label for="year">YYYY</label>
            <select name="year" id="year" required>
                <?php foreach( $years as $year ) :?>
                <option value="<?php echo $year ?>"><?php echo $year ?></option>
                <?php endforeach ?>
            </select>
            </div>
            </div>
        </div>
        <!--
    <div class="row" style="text-align: center; margin-top: 25px; margin-bottom: 25px">
        <label for="fileToUpload">Event Image</label>
        <input type="file" required name="fileToUpload" id="fileToUpload">
    </div>
-->
    <div class="row" style="text-align:center;">
        <input type="submit" value="Add Event" name="submit">
    </div>    
    </form>
</div>    
    
    
    
    
</body>