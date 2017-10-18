<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'] . "@wit.edu";
$pass = $_POST['password'];
$pass2 = $_POST['passwordConfirm'];
$ccode = rand(1,100000);

//validation
// 1. Check that passwords match
// 2. check email is in right format
// 3. Check if user already exists
// 4. check lengths of fields

if($pass != $pass2){
  echo "Passwords do not match";
}
else{
  //Connect to DB
  require('dbconnect.php');

  $sql = "INSERT INTO users (fname, lname, email, password, ccode)
  VALUES ('$fname', '$lname', '$email', '$pass', '$ccode')";

  if ($conn->query($sql) === TRUE) {
    $mailto = $email;
    $subject = "Confirmation email from WITS!";
    $message = "Click on the following link to confirm your email: http://www.witsboston.com/confirmation.php?ccode=$ccode&email=$email";
    $headers = "From: WITSBoston.com";

    // Mail function
    mail ($mailto,$subject,$message,$headers);

    echo "Success";

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
