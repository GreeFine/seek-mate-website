<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Seek-Mate</title>
    <link rel="stylesheet" href="css/Register-reset.css">
    <link rel="stylesheet" href="css/Register-style.css">
  </head>
  
 <body>
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
			
			<input type="text" name="email" placeholder="Email" />
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="pass" placeholder="Password" />
			<input type="password" name="cpass" placeholder="Confirm Password" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Gamer Profile</h2>
			<input type="text" name="steam" placeholder="Steam profile" />
			<select name="sometext" size="1">
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
			<input type="text" name="team" placeholder="Your team name" />
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="button" name="next" class="next action-button" value="Next" />
		</fieldset>
		<fieldset>
			<h2 class="fs-title">Personal Details</h2>
			<input type="text" name="fname" placeholder="First Name" />
			<input type="text" name="lname" placeholder="Last Name" />
			<textarea name="commentary" placeholder="Comment me !"></textarea>
			<input type="button" name="previous" class="previous action-button" value="Previous" />
			<input type="submit" name="submit" class="submit action-button" value="Submit" />
		</fieldset>
	</form>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://thecodeplayer.com/uploads/js/jquery.easing.min.js'></script>
    <script src="js/Register.js"></script>
  </body>
</html>
