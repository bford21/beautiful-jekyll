<?php
########## MySql details #############
$username = "a7546256_db"; //mysql username
$dbpassword = "comp497"; //mysql password
$hostname = "mysql1.000webhost.com"; //hostname
$databasename = 'a7546256_db'; //databasename

//connect to database
$conn = new mysqli($hostname, $username, $dbpassword, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
