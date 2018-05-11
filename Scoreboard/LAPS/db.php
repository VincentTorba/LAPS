<?php
//provide db operations
	//execute sql statement
	//return an array of associative array
	function executeSQL($q){
		//1. establish db connection
		$link = mysql_connect('localhost', 'root', 'goodyear123!@#');
		if (!$link) {
		    throw new Exception("error: ".mysql_error());
		}
		mysql_select_db("db_laps", $link);

		//2. do it
		$res = mysql_query($q, $link);
		if(!$res){
			throw new Exception("error in query: ".mysql_error());
		}

		//3. build up arrays
		$arrRet = array();
		while($row=mysql_fetch_assoc($res)){
			$arrRet []= $row;
		}
		return $arrRet;
	
	}

	function secure($txt){
		//1. establish db connection
		$link = mysql_connect('localhost', 'root', 'goodyear123!@#');
		if (!$link) {
		    throw new Exception("error: ".mysql_error());
		}
		return mysql_real_escape_string($txt, $link);
	}
	function checksum($txt){
		return md5($txt);
	}
	function insertUser($uname, $pwd){
		$uname = secure($uname);
		$pwd = secure(checksum($pwd));
		$q = "INSERT INTO tbl_users(uname, pwd) VALUES ('$uname', '$pwd')";
		executeSQL($q);
	}


//TEST CASES

?>
