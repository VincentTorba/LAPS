<?php
	include_once("db.php");
	//common utility
	function checksum($txt){
		return md5($txt);
	}
	function insertUser($uname, $pwd){
		$uname = secure($uname);
		$pwd = secure(checksum($pwd));
		$q = "INSERT INTO tbl_users(uname, pwd_hash) VALUES ('$uname', '$pwd')";
		executeSQL($q);
	}
?>
