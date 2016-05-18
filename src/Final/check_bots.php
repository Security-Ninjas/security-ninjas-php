<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$captcha_text="following finding";
$captcha_input= $_GET['captcha'];
$redirect_location=$_GET['redirect_to'];
$should_contain="siege.org";

if($captcha_input!=$captcha_text){
	echo "Wrong CAPTCHA. Try Again.";
}
elseif(strpos($redirect_location, $should_contain) !== false){
	header("Location: http://".$redirect_location);
}
else{
	echo "Sanity check failed. This should never happen.";
}

?>