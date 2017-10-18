<?php
	// Check to make sure the user is logged in
	require_once('authorize.php');

	//Start session
	session_start();

  //Connect to DB
  require('dbconnect.php');

	// Get Email
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $fname = $row['fname'];

	// Get CRN's in Class List DB
	$sql = "SELECT 'CRN' FROM classList WHERE email='$email'";
	$result = $conn->query($sql);
	$result2 = $result->fetch_assoc();

  // Get number of classes in class list
	$sql = "SELECT COUNT(email) AS total FROM classList WHERE email='$email'";
	$result2 = $conn->query($sql);
	$classListNum = $result2->fetch_assoc();

  /// GET CRN'S FROM CLASSLIST
  $sql = "SELECT CRN FROM classList WHERE email='$email'";
  $result2 = $conn->query($sql);
  $classListCRNs = array();
  if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
            $classListCRNs[] = $row['CRN'];
    }
  }

  /// SEARCH CRN'S IN CLASSES DB
  $classListArray = array();
  foreach($classListCRNs as $c){
    $sql = "SELECT * FROM classes WHERE CRN='$c'";
    $results3 = $conn->query($sql);
    while ($row = mysqli_fetch_array($results3)) {
         $classListArray[] = "<tr id='" . $row['CRN'] . "'><td>" . $row['CRN'] . "</td><td>" . $row['subject'] . "</td><td>" . $row['courseNum'] . "</td><td>" . $row['title'] . "</td><td>" . $row['days'] . "</td><td>" . $row['time'] . "</td><td>" . $row['professor'] . "</td><td><button type='button' class='btn btn-success' onclick='deleteClass(this.id)' id='" . $row['CRN'] . "'>Remove Class</button></td></tr>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>WITS - Scheduler</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="validation.min.js"></script>

  <!-- CSS --->
  <style>
  #alert-success, #alert-error{
		display: none;
	}
  </style>

  <script>
  $(document).ready(function(){
    $('.close').click(function(){
        $("#alert-success").hide();
        $("#alert-error").hide();
    });
  });

  // ADD CLASS to CLASS LIST
  function deleteClass(crn){
    var crn = crn;
    var email = '<?php echo $email;?>';
    var xhr;

    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var data = "email=" + email + "&crn=" + crn;
    xhr.open("POST", "removeClass.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
     if (xhr.readyState == 4) {
       if (xhr.status == 200) {
         var results = xhr.responseText;

         if(results.indexOf('Error') > -1){
           $(document).ready(function(){
            $("#alert-error").show();
           });
          }else{
            document.getElementById("classListNum").innerHTML=results;
            document.getElementById(crn).remove()
            $(document).ready(function(){
             $("#alert-success").show();
            });
          }


       } else {
         alert('There was a problem with the request.');
       }
      }
    }
  }

  </script>
</head>
<body>

  <!-- NAV BAR -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="userHome.php">WITS</a>
					<a class="navbar-brand" href="classList.php ">Class List <span class="badge" id="classListNum"><?php echo $classListNum['total'] ?></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <form class="navbar-form navbar-right" action="logout.php">
            <button type="submit" class="btn btn-success" >Logout</button>
          </form>
        </div><!--/.navbar-collapse -->
        <div class="alert alert-success fade in" id="alert-success" >
					<a href="#" class="close" aria-label="close">&times;</a>
					<strong>Success!</strong> You removed the class from your class list!
				</div>
				<div class="alert alert-danger fade in" id="alert-error" >
					<a href="#" class="close" aria-label="close">&times;</a>
					<strong>Error!</strong> Class was not able to me removed from class list!
				</div>
      </div>

    </nav>

    <!-- Jumbotron --->
    <div class="jumbotron">
      <div class="container">
        <div class="col-md-8">
          <h2><?php echo $fname ?>'s class list</h2>
          <p>When you've selected all the classes you need to take, click generate schedules and watch the magic happen!</p>
        </div>
        <div class="col-md-4">
          <br />
          <img src="Images/calendar.png" alt="Calendar" style="width:128px;height:128px;" />
        </div>
      </div>
    </div>

    <br />

		<div class="container">
			<table class="table">
		    <thead>
		      <tr>
		        <th>CRN</th>
		        <th>Subject</th>
		        <th>Course#</th>
						<th>Title</th>
						<th>Days</th>
						<th>Time</th>
						<th>Professor</th>
						<th>Add</th>
		      </tr>
		    </thead>
		    <tbody id="resultsRow">
          <?php
            foreach($classListArray as $c)
            echo $c;
          ?>
		    </tbody>
		  </table>
      
      <button type="button" class="btn btn-primary btn-lg btn-block">Generate Schedules!</button>
		</div>
</body>
</html>
