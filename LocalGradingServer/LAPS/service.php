<?php
	// Need to make calls to common.php
	include_once("common.php");

	// Check what action is performed on the client side
	if($_POST["action"]=="login") {
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		$res = login($user, $pass); // Call to common.php login function
		echo $res; // Send response back to the user
	} else if ($_POST["action"]=="submit") {
		$uname = $_POST["uname"];
		$grade = $_POST["grade"];
		$res = submitAndGetNext($uname, $grade); // Call to common.php function
		echo $res; // Sent the response back to the user
	} else {
		// If the action in POST request is undefined
		echo "ERROR: Unsupported action";
	}
?>

