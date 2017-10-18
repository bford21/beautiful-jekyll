<?php
$email = $_POST['email'];
$password = $_POST['password'];

//Connect to DB
require('dbconnect.php');

$sql = "SELECT password FROM users WHERE email='$email'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($password == $row['password']){
  echo "<p>Success, You logged in!</p>";

  // Creates a session for authentication
  session_start();
  $_SESSION['email'] = $email;

  //$conn->close();
  //header("Location: http://www.witsboston.com/userHome.php");
  //exit();
}else{
    echo "<p>Invalid email and password!</p>";
}

$conn->close();

?>
