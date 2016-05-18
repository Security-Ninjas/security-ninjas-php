<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

session_start([
	'name' => 'xsn',
	]);

session_destroy();
header("Location: /a8.html");
header("Content-Type: text/plain");
echo "ACCESS DENIED";

?>