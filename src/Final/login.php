<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$uname = $_POST['uname'];
$pass = $_POST['pwd'];

if((($uname=='user1')&&($pass=='user1_pass')) || (($uname=='user2')&&($pass=='user2_pass')))
{	
	session_start([
		'name' => 'xsn',
		]);
	$_SESSION['uid'] = $uname;

	header("Location: /contacts.php?r=".mt_rand(0, 9999999));
}
else
{	
	http_response_code(403);
}
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>403 Unauthorized</title>
</head><body>
<h1>Unauthorized</h1>
<p>You are not authorized to view this resource.</p>
<hr>
<address><?php echo $_SERVER['SERVER_SOFTWARE']; ?> Server at <?php echo $_SERVER['SERVER_NAME'];?> Port <?php echo $_SERVER['SERVER_PORT'];?></address>
</body></html>