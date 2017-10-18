<?php
$email = $_POST['email'];
$crn = $_POST['crn'];

//Connect to DB
require('dbconnect.php');

$sql = "SELECT * FROM classList WHERE CRN='$crn'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc() > 0){
  echo "Error: Class has already been added to class list!";
}else{

  $sql = "INSERT INTO classList VALUES ('$email', '$crn')";

  if ($conn->query($sql) === TRUE) {
    // Get ClassListNum to return
    $sql = "SELECT COUNT(email) AS total FROM classList WHERE email='$email'";
    $result2 = $conn->query($sql);
    $classListNum = $result2->fetch_assoc();
    echo $classListNum['total'];
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>
