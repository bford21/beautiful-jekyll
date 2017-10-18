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

	// Get subjects to populate dropdown
	$query = "SELECT DISTINCT subject FROM classes";
	$result = $conn->query($query);

	// Get Class List
	$sql = "SELECT COUNT(email) AS total FROM classList WHERE email='$email'";
	$result2 = $conn->query($sql);
	$classListNum = $result2->fetch_assoc();

	// Get all professors
	$sql = "SELECT DISTINCT professor FROM classes ORDER BY professor";
	$result3 = $conn->query($sql);
	//$professors = $result2->fetch_assoc();

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
	#professorsDropDown{
		display: none;
	}
	#professorsDropDown2{
		display: none;
	}
	.glyphicon.glyphicon-plus{
		color: green;
	}
  </style>

  <script>

	$(document).ready(function(){

		// Show professorsDropDown2
		$('#addProfessor').click(function(){
				$('#professorsDropDown2').show();
		});

		// Close Alerts
    $('.close').click(function(){
        $("#alert-success").hide();
				$("#alert-error").hide();
    });

		// Change in filter professor checkbox
		$(':checkbox').change(function(){
				if($(':checkbox').is(':checked')){
					$("#professorsDropDown").show();
				}else{
					$('#professorsDropDown2').hide();
					$("#professorsDropDown").hide();
					$('tr:hidden').show();
				}
    });

		$('#professors').change(function(){
			var prof = $('#professors').val();
			prof = prof.replace(/[!\"#$%&'\(\)\*\+,\.\/:;<=>\?\@\[\\\]\^`\{\|\}~]/g, '');
			prof = prof.split(' ').join('');
			$("." + prof).hide();

		})
	});

	function getCourseNum(){
		var xhr;
		var e = document.getElementById("first-choice");
		var subject = e.options[e.selectedIndex].value;

		if (window.XMLHttpRequest) { // Mozilla, Safari, ...
				xhr = new XMLHttpRequest();
		} else if (window.ActiveXObject) { // IE 8 and older
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}

		var data = "subject=" + subject;
		xhr.open("POST", "getCourseNum.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(data);

		xhr.onreadystatechange = display_data;
		function display_data() {
		 if (xhr.readyState == 4) {
			 if (xhr.status == 200) {
				 var results = xhr.responseText;
				 document.getElementById("second-choice").innerHTML=results;
				 }
			 } else {
				 alert('There was a problem with the request.');
			 }
			}
		}

	// SEACH FUNCIONS
	function search(searchType){
		var xhr;

		if(searchType == "crn"){
	    var crn = document.getElementById('crn').value;

			if (window.XMLHttpRequest) { // Mozilla, Safari, ...
					xhr = new XMLHttpRequest();
			} else if (window.ActiveXObject) { // IE 8 and older
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}

			var data = "crn=" + crn + "&email=" + '<?php echo $email;?>';
			xhr.open("POST", "searchCRN.php", true);
		}
		else if(searchType == "className"){
	    var className = document.getElementById('className').value;

			if (window.XMLHttpRequest) { // Mozilla, Safari, ...
					xhr = new XMLHttpRequest();
			} else if (window.ActiveXObject) { // IE 8 and older
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}

			var data = "className=" + className + "&email=" + '<?php echo $email;?>';
			xhr.open("POST", "searchClassName.php", true);
		}
		else if(searchType == "courseNum"){
			var e = document.getElementById("first-choice");
			var subject = e.options[e.selectedIndex].value;
			var f = document.getElementById("second-choice");
			var courseNum = f.options[f.selectedIndex].value;

			if (window.XMLHttpRequest) { // Mozilla, Safari, ...
					xhr = new XMLHttpRequest();
			} else if (window.ActiveXObject) { // IE 8 and older
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}

			var data = "subject=" + subject + "&courseNum=" + courseNum + "&email=" + '<?php echo $email;?>';
			xhr.open("POST", "searchCourseNum.php", true);
		}

		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(data);

		xhr.onreadystatechange = display_data;
		function display_data() {
		 if (xhr.readyState == 4) {
			 if (xhr.status == 200) {
				 var results = xhr.responseText;
				 document.getElementById("resultsRow").innerHTML=results;
				 }
			 } else {
				 alert('There was a problem with the request.');
			 }
			}
		}

		// ADD CLASS to CLASS LIST
		function addClass(crn){
			var crn = crn;
			var email = '<?php echo $email;?>';
			var xhr;

			if (window.XMLHttpRequest) { // Mozilla, Safari, ...
					xhr = new XMLHttpRequest();
			} else if (window.ActiveXObject) { // IE 8 and older
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}

			var data = "email=" + email + "&crn=" + crn;
			xhr.open("POST", "addToClassList.php", true);
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
							document.getElementById(crn).disabled = true;
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
					<strong>Success!</strong> You added a new class to your class list!
				</div>
				<div class="alert alert-danger fade in" id="alert-error" >
					<a href="#" class="close" aria-label="close">&times;</a>
					<strong>Error!</strong> Class has already been added to your class list!
				</div>
      </div>
    </nav>

    <!-- Jumbotron --->
    <div class="jumbotron">
      <div class="container">
        <div class="col-md-8">
          <h2>Welcome back <?php echo $fname ?>!</h2>
          <p> Search for classes below and start adding them to your class list!</p>
        </div>
        <div class="col-md-4">
          <br />
          <img src="Images/calendar.png" alt="Calendar" style="width:128px;height:128px;" />
        </div>
      </div>
    </div>

    <br />

    <div class="container">

			<h2>Search by CRN</h2>
			<form name="crnSearchForm" method="post" >
				<input type="text" class="form-control" placeholder="CRN #" aria-describedby="basic-addon" id="crn" required="true" />
				<br />
				<button type="button" class="btn btn-success" onclick="search('crn')">Search</button>
			</form>

			<br />
			<br />
    </div>

		<div class="container">
			<h2>Search by Class Name</h2>
			<form name="classNameSearchForm" method="post" >
				<input type="text" class="form-control" placeholder="Class Name" aria-describedby="basic-addon" id="className" required="true" />
				<br />
				<button type="button" class="btn btn-success" onclick="search('className')">Search</button>
			</form>

			<br />
			<br />
		</div>

		<div class="container">
			<h2>Search by Subject/Course Number</h2>
			<form name="courseNumberSearchForm" method="post">
				<select class="form-control" id="first-choice"  onchange="getCourseNum()">
					<option>Subject</option>
					<?php
					if ($result->num_rows > 0) {
				    // output data of each row
						while($row = $result->fetch_assoc()){
								echo "<option value='" . $row['subject'] . "'>" . $row['subject'] . "</option>";
						}
					}
					?>
				</select>

				<br />

				<select class="form-control" id="second-choice">
					<option>Select a subject first</option>
				</select>

				<br />
				<button type="button" class="btn btn-success" onclick="search('courseNum')">Search</button>
			</form>

			<br />
		</div>

		<div class="container">
			<form class="form-inline" role="form">
			    <label><input type="checkbox" />Filter Professors</label>
				<br />
				<br />
				<div id="professorsDropDown">
					<select class="form-control" id="professors">
						<option>Select a professor</option>
						<?php
							$temp = array();
							while ($row = mysqli_fetch_array($result3)) {
								 echo "<option value='" . $row['professor'] . "'>" . $row['professor']. "</option>";
							}
							?>
					</select>
					<span class="glyphicon glyphicon-plus" aria-hidden="true" id="addProfessor">Add</span>
				</div>
				<div id="professorsDropDown2">
					<select class="form-control" id="professors">
						<option>Select a professor</option>
						<?php
							while ($row = mysqli_fetch_array($result3)) {
								 echo "<option value='" . $row['professor'] . "'>" . $row['professor']. "</option>";
							}
							?>
					</select>
				</div>
			</form>
			<br />
			<br />
		</div>

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

		    </tbody>
		  </table>
		</div>
</body>
</html>
