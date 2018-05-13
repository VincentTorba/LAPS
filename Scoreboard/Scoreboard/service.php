<?php
# REMOVE IT LATER!
	$_REQUEST["op"] = "login";
	$_REQUEST["uname"] = "rocco";
	$_REQUEST["pwd"] = "hello";
# ----- REMOVE ABOVE LATER

	include_once("common.php");
	$op=$_REQUEST["op"];
	if($op=="login") {
		$user=$_REQUEST["uname"];
		$pass=$_REQUEST["pwd"];
		$result = login($user,$pass);
		echo $result;
	}
	else if($op=="submitCurrentAndGetNext") {
		$uname=$_REQUEST["uname"];	
		$grade=$_REQUEST["grade"];
		$result = submitAndGetNextQ($uname);
		echo $result;
	}	
	else {
		echo "unsupported op: $op";
	}
		
?>
