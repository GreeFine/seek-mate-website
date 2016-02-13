<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Seek-Mate</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.php">Seek-Mate</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="about.php">About</a></li>
						<li><a href="ChatRoom.php">Find a Last</a></li>
						<?php 
						session_start();
						if (isset($_SESSION['username'])) {
						echo "<li><a href='profile.php'>Profile</a></li>";
						echo "<li><a href='LogOut.php' class='button special'>Log Out</a></li>";
						} else {
						echo "<li><a href='index.php' class='button special'>Log In</a></li>";
						}; ?>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h2>Hi. This is Seek-Mate.</h2>
				<p>Find or Register to find the good Mate !</p>
				<ul class="actions">
					<li>
						<a href="ChatRoom.php" class="button big">The Chat Room</a>
					</li>
				</ul>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Find you ideal mate !</h2>
						<p>quick and precise look for it now</p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-cloud"></i>
								<h3>Big Network</h3>
								<p>Look forward and find now your teamate to play with in this large network of gamers.</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-desktop"></i>
								<h3>Practical</h3>
								<p>Join or invite your friend or people with ease. We provide direct links to your lobby or TeamSpeak servers.</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-rocket"></i>
								<h3>Teams / Community</h3>
								<p>We provide a forums and multiple way to make you Team and Host your community, You can also find the community that you need or Help from our users.</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Author</h2>
						<p>Thanks to them this community grow stronger.</p>
					</header>
					<section class="profiles">
						<div class="row">
							
							<section class="4u 6u(medium) 12u$(xsmall) profile">
								<img src="images/GreeFine.gif" alt="" />
								<h4>Raphaël / GreeFine</h4>
								<p>
								Founder / Dev<br />
								<a href="mailto:GreeFine@hotmail.fr">GreeFine@hotmail.fr</a>
								</p>
							</section>
							<section class="4u 6u$(medium) 12u$(xsmall) profile">
								<img src="images/Vicent.jpg" alt="" />
								<h4>Vicent Edenk</h4>
								<p>Corrector / Batman</p>
							</section>
						</div>
					</section>
						<p>To make this site life and to help it your can now suport by making a donation or susribing to the premium</p>
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="69EKU4X5NP5NY">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Contact</h2>
						<p>Send us what you thinks or recomendation !</p>
					</header>
				</div>
				<div class="container 50%">
					<form action="#" method="post">
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input name="name" id="name" value="" placeholder="Name" type="text">
							</div>
							<div class="6u$ 12u$(small)">
								<input name="email" id="email" value="" placeholder="Email" type="email">
							</div>
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Message" rows="6"></textarea>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input value="Send Message" class="special big" type="submit"></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="6u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Seek-Mate. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>