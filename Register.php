<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Seek-Mate</title>
    <link rel="stylesheet" href="css/Register-reset.css">
    <link rel="stylesheet" href="css/Register-style.css">
  </head>
		
  
 <body>
	<header id="header">
		<h1><a href="about.php">Seek-Mate</a></h1>
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
    <!-- multistep form -->
	<form id="msform">
	<!-- progressbar -->
		<ul id="progressbar">
			<li class="active">Account Setup</li>
			<li>Social Profiles</li>
			<li>Personal Details</li>
		</ul>
		<!-- fieldsets -->
		<fieldset>
			<h2 class="fs-title">Create your credential</h2>
			<input type="text" id="email" onBlur="CheckEntry('email')" placeholder="Email" />
			<input type="text" id="username" onBlur="CheckEntry('username')" placeholder="Username" />
			<input type="password" id="password" onBlur="CheckEntry('password')" placeholder="Password" />
			<input type="password" id="cpassword" onBlur="CheckEntry('cpassword')" placeholder="Confirm Password" />
			<input type="button" id="next1" class="next action-button" value="Next"/>
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Gamer Profile</h2>
			<input type="text" id="steam" onBlur="CheckEntry('steam')" placeholder="Steam profile url" />
			<select id="rank" size="1">
				<option value="1">Silver I</option>
				<option value="2">Silver II</option>
				<option value="3">Silver III</option>
				<option value="4">Silver IV</option>
				<option value="5">Silver Elite</option>
				<option value="6">Silver Elite Master</option>
				<option value="7">Gold Nova I</option>
				<option value="8">Gold Nova II</option>
				<option value="9">Gold Nova III</option>
				<option value="10">Gold Nova Master</option>
				<option value="11">Master Guardian I</option>
				<option value="12">Master Guardian II</option>
				<option value="13">Master Guardian Elite</option>
				<option value="14">Distinguished Master Guardian</option>
				<option value="15">Legendary Eagle</option>
				<option value="16">Legendary Eagle Master</option>
				<option value="17">Supreme Master First Class</option>
				<option value="18">The Global Elite</option>			  
			</select>
			<input type="text" id="team" placeholder="Your team name" />
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" id="next2" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Personal Details</h2>
			<input type="text" id="fname" placeholder="First Name" />
			<input type="text" id="lname" placeholder="Last Name" />
			<textarea id="commentary" placeholder="Comment me !"></textarea>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="send" class="send action-button" value="Send" />
		</fieldset>
	</form>
	<div style="text-align:center;margin: 20%;">
	<a href="about.php" style="margin-left: 15%;width: 60%;" id="DisplayBox" class="button big hidden"></a>
	</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://thecodeplayer.com/uploads/js/jquery.easing.min.js'></script>
	<script src="js/Register.js"></script>
  </body>
</html>
