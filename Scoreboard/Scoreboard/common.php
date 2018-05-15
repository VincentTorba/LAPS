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
	function register($uname,$pass) {
		$qid = 0;
		$config = array(
    				"digest_alg" => "sha512",
   				 "private_key_bits" => 2048,
    				"private_key_type" => OPENSSL_KEYTYPE_RSA,);
   
		// Create the private and public key
		$res = openssl_pkey_new($config);

		// Extract the private key from $res to $privKey
		openssl_pkey_export($res, $privKey);

		// Extract the public key from $res to $pubKey
		$pubKey = openssl_pkey_get_details($res);
		$pubKey = $pubKey["key"];

		// Encrypt the data to $encrypted using the public key
		openssl_public_encrypt($pass, $encrypted, $pubKey);

		// Decrypt the data using the private key and store the results in $decrypted
	//	openssl_private_decrypt($encrypted, $decrypted, $privKey);	

		insertUser($uname,$pass,$qid,$pubKey);
		echo ("ok");
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
register("rocco","password");
?>
