<?php

	include_once("db.php");

	function login($uname, $pwd)
	{
		$uname = secure($uname);
		$pwd = secure(checksum($pwd));
		$q = "SELECT * FROM tbl_users WHERE uname='$uname'AND pwd='$pwd'";
		$arr = executeSQL($q);
		return count($arr)>0;

	}

	function submitCurrentAndGetNextQ($uname, $grade){
		$uname = secure($uname);
		$grade = secure($grade); //secure defined in db.php

		///1.get current question id
			$q="SELECT qid FROM tbl_users WHERE uname = '$uname';";
			$arr = executeSQL($q);
			$qid = $arr[0]["qid"];

		///2.Insert the record of qid
			$q2="INSERT INTO tbl_scores(uname, qid, score) VALUES ('$uname', '$qid', '$grade');";
			executeSQL($q2);

		///3.update the current qid to qid +1
			$newQid = $qid + 1;
			$q3 = " UPDATE tbl_users SET qid = $newQid WHERE uname = '$uname';";
			executeSQL($q3);
			

		///4. return the download zip file hard code it
			 $map = array(1=>"prob1.tar",2=>"prob2.tar",3=>"prob3.tar");
		return $map[$newQid];
	}

?>
