<?php
session_start();
if (isset($_SESSION['username'])) { header('Location: about.php'); exit(); };
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login/Logout animation concept</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="css/Login-style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/init.js"></script>
	<link rel="stylesheet" href="css/skel.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/style-xlarge.css" />
  </head>
  
	<body>
		<header id="header">
			<h1><a href="index.php">Seek-Mate</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="about.php">About</a></li>
						<li><a href="ChatRoom.php">Find a Last</a></li>
						<?php 
						if (isset($_SESSION['username'])) {
						echo "<li><a href='profile.php'>Profile</a></li>";
						echo "<li><a href='LogOut.php' class='button special'>Log Out</a></li>";
						} else {
						echo "<li><a href='index.php' class='button special'>Log In</a></li>";
						} ?>
					</ul>
				</nav>
		</header>
						
    <div class="cont">
	<div class="demo">
	<div class="login">
		<div class="login__form">
			<div class="login__row">
			<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" class="login__input name" id="username" placeholder="Username"/>
			</div>
			<div class="login__row">
            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
            </svg>
            <input type="password" class="login__input pass" id="password" placeholder="Password"/>
			</div>
			<button type="button" id="submitBtn" class="login__submit">Sign in</button>
			<p class="login__signup">Don't have an account? &nbsp;<a href="Register.php">Register</a></p>
      </div>
    </div>
	</div>
	</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
	
  </body>
</html>