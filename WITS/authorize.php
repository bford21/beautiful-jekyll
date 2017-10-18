<?php
	//Start session
	session_start();

	//Check whether the session variable is present or not
	if(!isset($_SESSION['email']) || (trim($_SESSION['email']) == '')) {
		header("location: http://www.witsboston.com");
		exit();
	}
?>
