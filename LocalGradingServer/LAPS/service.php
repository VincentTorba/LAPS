<?php
	// Need to make calls to common.php
	include_once("common.php");

	// Check what action is performed on the client side
	$op = $_GET["op"];
	if($op=="login") {
		$user = $_GET["uname"];
		$pass = $_GET["pwd"];
		#$res = login($user, $pass); // Call to common.php login function
		echo "ok"; // Send response back to the user
	} 
	else if($op == "runChallenge1")
	{
		$c = escapshellcmd("Scoreboard/Downloads/prob1/setup.py");
		$execute = shell_exec($c);
		echo $execute;	

	}
	else if ($op == "submitChallenge1")
	{
		$command = escapeshellcmd('ScoreBoard/challenges/grade.py');
		$output = shell_exec($command);
		echo $output;
	}	
	else if ($op =="submitAndGETNext") {
		$uname = $_REQUEST["uname"];
		$grade = $_REQUEST["grade"];
		$res = submitAndGetNext($uname, $grade); // Call to common.php function
		echo $res; // Sent the response back to the user
	} else {
		// If the action in POST request is undefined
		echo "ERROR: Unsupported action";
	}
?>

