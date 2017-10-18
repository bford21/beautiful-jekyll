<?php
$email = $_POST['email'];
$crn = $_POST['crn'];

//Connect to DB
require('dbconnect.php');

$sql = "DELETE FROM classList WHERE email='$email' AND CRN='$crn'";

if ($conn->query($sql) === TRUE) {
    $sql = "SELECT COUNT(email) AS total FROM classList WHERE email='$email'";
    $result2 = $conn->query($sql);
    $classListNum = $result2->fetch_assoc();
    echo $classListNum['total'];
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>
