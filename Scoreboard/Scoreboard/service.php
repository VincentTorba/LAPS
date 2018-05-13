<?php
	include_once("common.php");
	$op=$_GET["op"];
	if($op=="login") {
		$user=$_GET["uname"];
		$pass=$_GET["pwd"];
		$result = login($user,$pass);
		echo $result;
	}
	else if($op=="submitCurrentAndGetNext") {
		$uname=$_GET["uname"];	
		$grade=$_GET["grade"];
		$result = submitCurrentGetNextQ($uname,$grade);
		echo $result;
	}	
	else {
		echo "unsupported op: $op";
	}
		
?>
