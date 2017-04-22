<?php

//I AM THE LOGIN PAGE
include( 'config.php' );
include( 'functions.php' );

$loginMessage = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    //query db for user 
    $sql = file_get_contents('sql/attemptLogin.sql');
    $params = array(
        'username' => $username,
        'password' => $password
    );
    $statement = $database->prepare($sql);
    $statement->execute($params);
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    //if $users is not empty
    if (!empty($users)) {
        //set $user equal to the first result of $users
        $user = $users[0];
        
        //Set session variable for user
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['isAdmin'] = $user['isAdmin'];
        
        if ($_SESSION['isAdmin'] == 1) {
            header('Location: admin.php');
        } else {
            //redirect to listings
            header('Location: index.php');
        }
        
    }
    else if (empty($users)) {
        $loginMessage = "Sorry, login failed. Try again.";
    }
}

//I go last with includes
include( 'includes/preamble.php' );
?>


<body> 
    <div id="loginWindow">
        <h3 id="loginWelcome">Welcome to TicketFinder</h3>
        <form action="" method="post">
            <input type="text" placeholder="Enter username" class="u-full-width" name="username" required autofocus>
            <input type="password" placeholder="Enter password" class="u-full-width" name="password" required>
            <p><?php echo $loginMessage ?></p>
            <input class="button-primary" type="submit" value="Login">        
        </form>
    </div><!-- end of login window div --> 





</body>
