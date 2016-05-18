<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header('X-XSS-Protection: 0');
header("Content-Type: text/plain");

session_start([
	'name' => 'xsn',
	]);

if (($_SESSION['uid'] != 'user1') && ($_SESSION['uid'] != 'user2')) {
	session_destroy();
	header("Location: /a8.html");
	header("Content-Type: text/plain");
	echo "ACCESS DENIED";
	exit(0);
}

$uid = $_SESSION['uid'];
$new_email = $_GET['new_email'];
$user = $_GET['user'];

//user2
if(($user == $uid) && ($user == 'user2'))
{
	$myfile = fopen("user2.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $new_email);
	header("Location: /contacts.php?r=".mt_rand(0, 9999999));
	echo "OK";
	exit(0);
}
elseif(($user == $uid) && ($user == 'user1'))
{
	$myfile = fopen("user1.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $new_email);
	header("Location: /contacts.php?r=".mt_rand(0, 9999999));
	echo "OK";
	exit(0);
}	
else {
	session_destroy();
	header("Location: /a8.html");
	echo "ACCESS DENIED";
}

?>