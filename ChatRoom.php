<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Seek-Mate</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</head>
	<header id="header">
		<h1><a href="index.html">Seek-Mate</a></h1>
		<nav id="nav">
			<ul>
				<li><a href="about.php">About</a></li>
				<li><a href="ChatRoom.php">Find a Last</a></li>
				<li><a href="elements.html">Elements</a></li>
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
	<body>
	<h2> Chat <h2>
        <div class="Message_row">
			<input type="text" class="login__input" name="L_password" placeholder="¨Password"/>
        </div>
        <button type="button" class="login__submit">Sign in</button>
	</body>
</html>

