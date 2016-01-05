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
					<li><a href="elements.html">Elements</a></li>
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
			
			<input type="text" id="email" placeholder="Email" />
			<input type="text" id="username" placeholder="Username" />
			<input type="password" id="password" placeholder="Password" />
			<input type="password" name="cpassword" placeholder="Confirm Password" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Gamer Profile</h2>
			<input type="text" id="steam" placeholder="Steam profile url" />
			<select id="rank" size="1">
			  <option>Silver I</option>
			  <option>Silver II</option>
			  <option>Silver III</option>
			  <option>Silver IV</option>
			  <option>Silver Elite</option>
			  <option>Silver Elite Master</option>
			  <option>Gold Nova I</option>
			  <option>Gold Nova II</option>
			  <option>Gold Nova III</option>
			  <option>Gold Nova Master</option>
			  <option>Master Guardian I</option>
			  <option>Master Guardian II</option>
			  <option>Master Guardian Elite</option>
			  <option>Distinguished Master Guardian</option>
			  <option>Legendary Eagle</option>
			  <option>Legendary Eagle Master</option>
			  <option>Supreme Master First Class</option>
			  <option>The Global Elite</option>			  
			</select>
			<input type="text" id="team" placeholder="Your team name" />
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Personal Details</h2>
			<input type="text" id="fname" placeholder="First Name" />
			<input type="text" id="lname" placeholder="Last Name" />
			<textarea id="commentary" placeholder="Comment me !"></textarea>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="text" name="send" class="send action-button" value="Send" />
		</fieldset>
	</form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://thecodeplayer.com/uploads/js/jquery.easing.min.js'></script>
	<script src="js/Register.js"></script>
  </body>
</html>
