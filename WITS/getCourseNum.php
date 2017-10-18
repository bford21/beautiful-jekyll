<?php
$subject = $_POST['subject'];

//Connect to DB
require('dbconnect.php');

$sql = "SELECT DISTINCT courseNum FROM classes WHERE subject='$subject'";

$result = $conn->query($sql);

while ($row = mysqli_fetch_array($result)) {
   echo "<option value='" . $row['courseNum'] . "'>" . $row['courseNum']. "</option>";
}

$conn->close();

?>
