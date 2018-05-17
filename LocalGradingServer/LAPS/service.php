<?php
	// Need to make calls to common.php
	include_once("common.php");

	// Check what action is performed on the client side
	$op = $_GET["op"];
	if($op=="login") {
		$user = $_GET["uname"];
		$pass = $_GET["pwd"];
		$res = login($user, $pass); // Call to common.php login function
		echo $res;
	} 	
	else if ($op =="submitAndGetNext") {
		if (!isset($_SESSION["uname"])) {
			header("Location: index.html");
		}
		$uname = $_SESSION["uname"];
		$res = submitAndGetNext($uname); // Call to common.php function
		if ($res=="ok") {
			header("Location: PROBLEM/problem.html");
		}
		echo $res; // Sent the response back to the user
	}	
	else if ($op =="register") {
		$user = $_GET["uname"];
		$pass = $_GET["pwd"];
		$reg = register($user,$pass);
		echo $reg;
	}
	 else {
		// If the action in POST request is undefined
		echo "ERROR: Unsupported action";
	}
?>

