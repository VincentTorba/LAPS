#include_once("dp.php")

function submitCurrentAndGetNextQ($uname, $grade){
	$uname = secure($uname);
	$grade = secure($grade);

	//1. Get Current qid
	$q = "SELECT qid FROM tbl_users WHERE uname = '$uname';";
	$arr = executeSQL($q);
	$qid = $arr[0]["qid"];

	//2. Insert the record of qid
	$q2 = "INSERT INTO tbl_scores(uname,qid,score) VALUES ('$uname', '$qid', '$grade');";
	executeSQL($q2);
	
	//3. update the current qid to qid+1
	$newQid = $qid + 1;
	$q3 = "UPDATE tbl_users SET qid = $newQid WHERE uname = '$uname';";
	executeSQL($q3);

	//4. return the dowload zip file 
	$map = array(
		1 = >"prob1.tar",
		2 = >"prob2.tar",
		3 = >"prob3.tar"
	);
	return $map["newqid"];
}

function mylog($msg)
{
	$myfile = fopen("logs.txt", "a");
	fwrite($myfile, "\n", $msg);
	close($myfile);
}

function submitReq($url)
{
	$s = file_get_contents($url)
	return $s;
}

function login($uname, $pwd)
{
	//1. remote request
	global $server;
	$url - $server."service.php?op=login&uname=$uname&pwd=$pwd";
	$res = submitReq($url);
	if($res!="ok") return $res;

	//2. call the submitAndGetNext()
	submitAndGetNext($uname);
	return "ok";
}

function runCmd($cmd)
{
	return exec($cmd);
}

function downloadExtract($link)
{
	global $server, $pracimg;
	$url = server."DOWNLOAD/$link";
	$cmd = "wget $url -0 /var/www/html/LAPS/tmp/$link";
	runCmd($cmd);
}

function submitAndGetNext($uname)
{
	global $server, $pracimg;
	
	//1. rn current grd script
	mylog("step 1. getting grade\n")
	$grade = runCmd("python PROBLEM/grade.py")
	mylog("step 2. grade is $grade\n");
	
	//2. submit to remote
	$url = $server. "server.php?op=submitCurrentAndGetNextQ&uname=$uname&grade=$grade";
	mylog("step 3 submit grade: url: $url\n");
	$link = submitReq($url);
	mylog("step 4 link is $link\n");
	
	//3. extract link
	mylog("step 5. download and extract link\n");
	downloadExtract($link);
	mylog("step 6. run setup.py\n");

	//4. execute the setup
	runCmd("python PROBLEM/setup.py");
	return "ok";
}
if(1==2)
{
	runCmd(ls);
	

}
