<?php

$servername = "localhost";
$username = "pma";
$password = "pma";
$db = "onlineshop";


// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
