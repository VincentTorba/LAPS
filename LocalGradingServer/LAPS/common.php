<?php
session_start();

$server = "192.168.1.6/Scoreboard/";
$pracimg = "192.168.1.8";

function mylog($msg)
{
	$myfile = fopen("logs.txt", "a");
	fwrite($myfile, $msg);
	fclose($myfile);
}

function submitReq($url)
{
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $url
	));
	$s = curl_exec($ch);
	//$s = file_get_contents($url);
	return $s;
}

function register($user,$pass)
{
	global $server;
	$url = $server."service.php?op=register&uname=$user&pwd=$pass";
	$reg = submitReq($url);
	return $reg;
}
function login($uname, $pwd)
{
	//1. remote request
	global $server;
	$url = $server."service.php?op=login&uname=$uname&pwd=$pwd";
	$res = submitReq($url);
	if($res==0) return "failed";

	//2. call the submitAndGetNext()
	$_SESSION["uname"] = $uname;
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
	$cmd = "wget $url -O /var/www/html/$link";
	runCmd($cmd);
	$cmd2 = "tar -xf /var/www/html/$link -C /var/www/html/PROBLEM --strip-components=1";
	runCmd($cmd2);	
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

