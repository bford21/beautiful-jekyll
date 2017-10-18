 <?php
$ccode = $_GET['ccode'];
$email = $_GET['email'];

//Connect to DB
require('dbconnect.php');

$sql = "SELECT ccode FROM users WHERE email='$email'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['ccode'];
if($ccode == $row['ccode']){
  $sql2 = "UPDATE users SET confirmed='yes' WHERE email='$email'";
  if ($conn->query($sql2) === TRUE) {
    $conn->close();
    header("Location: http://www.witsboston.com");
    exit();
  }
}else{
  echo "error";
}

?>
