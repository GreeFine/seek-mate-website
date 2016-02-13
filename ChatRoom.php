<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
	    <title>Seek Mate</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="css/ChatRoom.css" rel="stylesheet">
	    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		<script src="js/jquery.min.js"></script>
	</head>

	<body style="background-image:url(images/CsGoWp.png);">
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
						} ?>
					</ul>
				</nav>
		</header>

		<div class="container">
			<div class="row White-BG">
				<div class="col-lg-3">
					<div class="btn-panel btn-panel-conversation">
						<a href="" class="btn col-lg-6 send-message-btn White-BG" role="button"><i class="fa fa-search"></i> Search</a>
						<a href="" class="btn col-lg-6  send-message-btn pull-right White-BG" role="button"><i class="fa fa-plus"></i> New Message</a>
					</div>
				</div>

				<div class="col-lg-offset-1 col-lg-7">
					<div class="btn-panel btn-panel-msg">
						<a href="" class="btn col-lg-3  send-message-btn pull-right White-BG" role="button"><i class="fa fa-gears"></i> Settings</a>
					</div>
				</div>
			</div>
			
			
			<div class="row">

				<div id="UserList" class="conversation-wrap col-lg-3 White-BG">
					<!-- User List Filed With Js -->
				</div>

				<div id="LobbyList" class="conversation-wrap col-lg-3 LobbyList pull-right White-BG">
					<!-- User List Filed With Js -->
				</div>

				<div class="message-wrap col-lg-8 White-BG">
					<div id="ChatBox" class="msg-wrap">
						<!-- ChatBox Js Filled -->
					</div>
					<div class="send-wrap ">
					<input id="messageBox" class="form-control send-message White-BG" placeholder="Votre message ..."></input>
					<script>
						$("#messageBox").keypress(function(event) {
							if (event.which == 13) {
							    SendMsg();
							}
						});
					</script>
					</div>

					<div class="btn-panel">
						<a href="javascript:PostLobby(<?php if (isset($_SESSION['steam'])) echo "'".$_SESSION['steam']."'"; ?>);" class="col-lg-3 btn send-message-btn" role="button"><i class="fa fa-cloud-upload"></i>Lobby from Game</a>
						<a href="javascript:PostLobbyTs();" class="col-lg-3 btn send-message-btn" role="button"><i class="fa fa-cloud-upload"></i>Lobby from TeamSpeak</a>
						<a href="javascript:SendMsg();" class="col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Send Message</a>
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/ChatRoom.js"></script>
	</body>
</html>
