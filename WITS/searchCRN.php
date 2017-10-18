<?php
$crn = $_POST['crn'];
$email = $_POST['email'];

//Connect to DB
require('dbconnect.php');

// Get existing CRN's in class list
$sql = "SELECT CRN FROM classList WHERE email='$email'";
$result2 = $conn->query($sql);
$classListCRNs = array();
if ($result2->num_rows > 0) {
  while($row = $result2->fetch_assoc()) {
          $classListCRNs[] = $row['CRN'];
  }
}

// Search by CRN
$sql = "SELECT * FROM classes WHERE CRN='$crn'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$alreadyAdded = FALSE;
$cleanProf = preg_replace("/[^a-zA-Z0-9\s]/", "", $row['professor']);
foreach($classListCRNs as $c){
  // Class is already in class list
  if($c == $row['CRN']){
    $alreadyAdded = TRUE;
    echo "<tr class='" . str_replace(' ', '', $cleanProf) . "'><td>" . $row['CRN'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['courseNum'] . "</td><td>" . $row['title'] . "</td><td>" . $row['days'] . "</td><td>" . $row['time'] . "</td><td>" . $row['professor'] . "</td><td><button type='button' class='btn btn-success' onclick='addClass(this.id)' id='" . $row['CRN'] . "' disabled>Add Class</button></td></tr>";
  }
}
if($alreadyAdded == FALSE && count($row) > 0 ){
  echo "<tr class='" . str_replace(' ', '', $cleanProf) . "'><td>" . $row['CRN'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['courseNum'] . "</td><td>" . $row['title'] . "</td><td>" . $row['days'] . "</td><td>" . $row['time'] . "</td><td>" . $row['professor'] . "</td><td><button type='button' class='btn btn-success' onclick='addClass(this.id)' id='" . $row['CRN'] . "'>Add Class</button></td></tr>";
}
/*
foreach($row as $r){
  echo $r;
}
*/
$conn->close();

?>
