<?php

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header('X-XSS-Protection: 0');

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

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>A8 : Cross-Site Request Forgery (CSRF)</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<script langauge="javascript">
	    function showForm1(){
	    	document.getElementById('form1').style.display="block";
	    }
		</script>
	</head>
	<body>

		<!-- Nav -->
			<nav id="nav">
				<ul class="container">
					<li><a href="a1.html">A1</a></li>
					<li><a href="a2.html">A2</a></li>
					<li><a href="a3.html">A3</a></li>
					<li><a href="a4.html">A4</a></li>
					<li><a href="a5.html">A5</a></li>
					<li><a href="a6.html">A6</a></li>
					<li><a href="a7.html">A7</a></li>
					<li><a href="a8.html">A8</a></li>
					<li><a href="a9.html">A9</a></li>
					<li><a href="a10.html">A10</a></li>
				</ul>
			</nav>
			<div class="wrapper style2">
				<article id="work">
					
					<h5>Contacts for <?php echo $_SESSION['uid'];?></h5>
					
					<div class="container">
							<button onclick="window.location.href = '/logout.php';">Log Out</button><br><br><br>

							<table>
							  <tr>
							    <th><b>User</b></th>
							    <th><b>Email</b></th>
							    <th></th>
							  </tr>
							  <tr>
							    <td>user1</td>
							    <td>
							    	<?php
									$file = fopen("user1.txt", "r") or die("Unable to open file!");
									echo fgets($file);
									fclose($file);
									?>
							    </td>
							    <td>
							    	<?php
							    	if ($_SESSION['uid'] == 'user1') {
						    		?>
								    <form id="ctrl" name="ctrl">
								    <input type="button" id="ctrlbtn" name="update_u1"  value="Update" onclick="showForm1();"/> <br>
									</form>
						    		<?php
							    	}
									?>
								</td>
							    <td>
							    	<?php
							    	if ($_SESSION['uid'] == 'user1') {
						    		?>
							    	<div id="form1" name="form1" style="display:none">
							    	<form id="frm1" name="frm1" action="update_email.php" method="GET">
							    	New Email <input type="text" name="new_email"/> <br>
							    	<input type="hidden" name="user" value="user1">
							  		<input type="submit" name="Update" value="Save"/> <br>
									</form>
									</div>
						    		<?php
							    	}
									?>
							    </td>
							  </tr>
							  <tr>
							    <td>user2</td>
							    <td>
							    	<?php
									$file = fopen("user2.txt", "r") or die("Unable to open file!");
									echo fgets($file);
									fclose($file);
									?>
							    </td>
							    <td>
							    	<?php
							    	if ($_SESSION['uid'] == 'user2') {
						    		?>
								    <form id="ctrl" name="ctrl">
								    <input type="button" id="ctrlbtn" name="update_u2"  value="Update" onclick="showForm1();"/> <br>
									</form>
						    		<?php
							    	}
									?>
								</td>
							    <td>
							    	<?php
							    	if ($_SESSION['uid'] == 'user2') {
						    		?>
							    	<div id="form1" name="form1" style="display:none">
							    	<form id="frm1" name="frm1" action="update_email.php" method="GET">
							    	New Email <input type="text" name="new_email"/> <br>
							    	<input type="hidden" name="user" value="user2">
							  		<input type="submit" name="Update" value="Save"/> <br>
									</form>
									</div>
						    		<?php
							    	}
									?>
							    </td>
							  </tr>
							</table>
					</div>
					
				</article>
			</div>
	
			<div class="wrapper style4">
				<article id="contact" class="container small">
					<header>
						<p>Mission: Produce an CSRF &lt;img&gt; tag that changes the email address the logged in user.</p>
					</header>
					<p>Save your CSRF attack in a blank html document, and view it to carry out the attack.</p>
					<div>
						
						<div class="row">
							<div class="12u">
							<ul>
							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'hint1');"> Hint 1 </H5>
							<DIV id="hint1" style="display:none">
							<P>
							Updating an email address is done with one GET call. Determine the URL.
							</P>
							</DIV></li>

							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'solution');"> Solution </H5>
							<DIV id="solution" style="display:none">
							<P>
							'/update_email.php?new_email=user1@evil.com&user=user1&Update=Save' is the relative URL.<br/>
							If user1 is authenticated to one site and visits another site with that URL embedded in it<br/>
							then the action will be executed.
							</P>
							</DIV></li>
							
							</ul>
							</div>
						</div>
					</div>
					<footer>
						<ul id="copyright">
							<li>&copy; OpenDNS. All rights reserved.</li><li><a href="http://engineering.opendns.com/security/" target="_blank">OpenDNS Security</a></li>
						</ul>
					</footer>
				</article>
			</div>

	</body>
</html>
