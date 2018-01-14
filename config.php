<?php

// Connecting to the MySQL database
$user = 'ticketfinder';
$password = 'password';

$database = new PDO('mysql:host=localhost;dbname=ticketfinder', $user, $password);

function my_autoloader($class) {
    include 'classes/class.' . $class . '.php';
}

spl_autoload_register('my_autoloader');

// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

// if customerID is not set in the session and current URL not login.php redirect to login page
if (!isset($_SESSION["userID"]) && $current_url != 'login.php') {
    header("Location: login.php");
}

// Else if session key userID is set get user from the database
elseif (isset($_SESSION["userID"])) {
    $user = new User($_SESSION['userID'], $database);
}
