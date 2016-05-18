<!DOCTYPE HTML>

<html>
	<head>
		<title>A2 : Broken Authentication and Session Management</title>
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
					<li><a href="a2.html" class="active">A2</a></li>
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
					<div class="container">
							<?php

							if($_COOKIE['sessionID'] == 'b3daa77b4c04a9551b8781d03191fe098f325e67')
							{
								echo "Pesonal details for User1 <p>Name: Foo <br> Email: foo_rocks@gmail.com <br> Phone: 415-415-415</p>";

							}	

							elseif($_COOKIE['sessionID'] == 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4')
							{
								echo "Pesonal details for User2 <p>Name: Bar <br> Email: bar_rocks@gmail.com <br> Phone: 415-415-416</p>";

							}
							else
								echo "<a href=a2.html>Please Login</a>"
							?>

							</div>
						
					</div>
					
				</article>
			</div>

			<div class="wrapper style4">
				<article id="contact" class="container small">
					<header>
						<p>Mission: Log in as user2</p>
					</header>
					<div>
						<div class="row">
							<div class="12u">
							<ul>
							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'hint1');"> Hint 1 </H5>
							<DIV id="hint1" style="display:none">
							<P>
							Login as user1 and see how session management is being done.<br/>
							Talk to your neighbor and note similarities.
							</P>
							</DIV></li>

							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'hint2');"> Hint 2 </H5>
							<DIV id="hint2" style="display:none">
							<P>
							Look at the session cookie. What properties does it have? Does it look predictable?
							</P>
							</DIV></li>


							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'hint3');"> Hint 3 </H5>
							<DIV id="hint3" style="display:none">
							<P>
							Google: "40 character hexadecimal string"
							</P>
							</DIV></li>

							<li><H5 style="cursor: pointer" onclick="toggleBlock(this, 'solution');"> Solution </H5>
							<DIV id="solution" style="display:none">
							<P>
							The cookie "sessionID" is a SHA1 hash of the username.<br/>
							Replace SHA1(user1) in the cookie with SHA1(user2) to authenticate as user2.<br/>
							i.e.: sessionID=a1881c06eec96db9901c7bbfe41c42a3f08e9cb4
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

