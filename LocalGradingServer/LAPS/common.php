<?php
$server = "192.168.1.6/Scoreboard/";
$pracimg = "192.168.1.8";

function mylog($msg)
{
	$myfile = fopen("logs.txt", "a");
	fwrite($myfile, "\n", $msg);
	fclose($myfile);
}

function submitReq($url)
{
	$s = file_get_contents($url);
	return $s;
}

function login($uname, $pwd)
{
	//1. remote request
	global $server;
	$url = $server."service.php?op=login&uname=$uname&pwd=$pwd";
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
	$url = $server."Downloads/$link";
	$cmd = "wget $url -o /var/www/html/LAPS/$link";
	runCmd($cmd);
	$cmd2 = "tar -xvf /var/www/html/LAPS/tmp/$link -c Problem";
	runCmd($cmd);	
}

function submitAndGetNext($uname)
{
	global $server, $pracimg;
	
	//1. rn current grd script
	mylog("step 1. getting grade\n");
	$grade = runCmd("python PROBLEM/grade.py");
	mylog("step 2. grade is $grade \n");
	
	//2. submit to remote
	$url = $server. "service.php?op=submitCurrentAndGetNext&uname=$uname&grade=$grade";
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

function checksum($txt){
		return md5($txt);
	}

if(1==2)
{
	$link = submitAndGetNext("rocco");
	print($link);
}
?>

