<?php
	include_once("common.php");
	$op=$_GET["op"];
	if($op=="login") {
		$user=$_GET["uname"];
		$pass=$_GET["pwd"];
		$result = login($uname,$pwd);
		echo $result;
	}
	else if($op=="submitCurrentAndGetNextQ") {
		$uname=$_GET["uname"];	
		$grade=$_GET["grade"];
		$result = submitAndGetNextQ($uname);
		echo $result;
	}	
	else {
		echo "unsupported op: $op";
	}
		
?>
