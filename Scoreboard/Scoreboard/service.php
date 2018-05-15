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
		$result = submitCurrentAndGetNextQ($uname,$grade);
		echo $result;
	}
	else if($op=="register") {
		$user = $_GET["uname"];
  	    $pass = $_GET["pwd"];
        $reg = register($user,$pass);
        echo $reg;
	}	
	else {
		echo "unsupported op: $op";
	}
		
?>
