<?php

//code to logout user and end session

include('config.php');

include('functions.php');

session_destroy();

header('Location: login.php');
