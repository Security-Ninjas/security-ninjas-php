<?php

$file = $_GET['fname'];

/**

 This script will include stub files to show memes to users so they can vote on them.

 The stub files will be designed individually by the art department, and we just have to
 show them. But because we're including the files, it's important to sanitize input so
 that no one can steal something like /etc/passwd.

 Business wants the flexibility to rename memes in the future, so we'll limit the
 sanitization to ordinary files in this directory to keep us safe.

 The pattern is: \w+\.\w{3}

*/
if (!preg_match('/^(\w+)\.(\w{3})$/', $file)) {
	http_response_code(400);
	echo "<html><body><b>Bad request!</b></body></html>";
	exit(1);
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>A5 : Security Misconfiguration</title>
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
	</head>
	<body>

		<!-- Nav -->
			<nav id="nav">
				<ul class="container">
					<li><a href="a1.html">A1</a></li>
					<li><a href="a2.html">A2</a></li>
					<li><a href="a3.html">A3</a></li>
					<li><a href="a4.html">A4</a></li>
					<li><a href="a5.html" class="active">A5</a></li>
					<li><a href="a6.html">A6</a></li>
					<li><a href="a7.html">A7</a></li>
					<li><a href="a8.html">A8</a></li>
					<li><a href="a9.html">A9</a></li>
					<li><a href="a10.html">A10</a></li>
				</ul>
			</nav>
			<div class="wrapper style2">
				<article id="work">
					<div class="container">
						<?php
						echo file_get_contents($file);
						?>			
					</div>
				</article>
			</div>

			<div class="wrapper style4">
				<article id="contact" class="container small">
					<header>
						<p>Mission: Steal the username and password for the voting database.</p>
					</header>
					<div class="row">
							<div class="12u">
							<ul>
							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'hint1');"> Hint 1 </H5>
							<DIV id="hint1" style="display:none">
							<P>
							The 'fname' parameter of meme.php isn't restricted very well.
							</P>
							</DIV></li>

							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'hint2');"> Hint 2 </H5>
							<DIV id="hint2" style="display:none">
							<P>
							Look at the source for vote.php
							</P>
							
							</DIV></li>

							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'solution');"> Solution </H5>
							<DIV id="solution" style="display:none">
							<P>
							Fetch config.php<br/>
							e.g.: <a href="/meme.php?fname=config.php">/meme.php?fname=config.php</a>
							</P>
							
							</DIV></li>
							
							</ul>
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
