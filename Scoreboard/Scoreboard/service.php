<?php
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
		$result = submitCurrentGetNextQ($uname,$grade);
		echo $result;
	}	
	else {
		echo "unsupported op: $op";
	}
		
?>
