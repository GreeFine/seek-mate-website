<?php
	session_start();
	$dbCon = mysqli_connect("localhost", "root", "", "seek-mate");
	if (mysqli_connect_errno()) {
		echo 2;
	}
	
	if (isset($_POST["username"], $_POST["password"], $_POST["email"], $_POST["steam"], $_POST["rank"], $_POST["team"], $_POST["fname"], $_POST["lname"], $_POST["commentary"]))
	{
		
		$username = $_POST["username"];
		$email = $_POST["email"];
		$Sha1Pass = sha1($_POST['password']);
		$steam = $_POST["steam"];
		$rank = $_POST["rank"];
		$team = $_POST["team"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$commentary = $_POST["commentary"];
		
		if (filter_var($email, FILTER_VALIDATE_EMAIL)[0] === false) {echo 3; exit(0);};
		if (filter_var($steam, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED | FILTER_FLAG_HOST_REQUIRED)[0] === false) {echo 3; exit(0);};
		
		switch (true) {
			case (strlen($username) < 3 && strlen($username) > 20):
				exit(0);
				break;
			case (strlen($Sha1Pass) < 4 && strlen($Sha1Pass) > 60):
				exit(0);
				break;
			case (strlen($email) > 30):
				exit(0);
				break;
			case (strlen($rank) > 20):
				exit(0);
				break;
			case (strlen($steam) > 40):
				exit(0);
				break;
			case (strlen($team) > 20):
				exit(0);
				break;
			case (strlen($fname) > 20):			
				exit(0);
				break;
			case (strlen($lname) > 20):	
				exit(0);
				break;
			case (strlen($commentary) > 40):
				exit(0);
				break;
			default :
				break;
		}
		$sql = "INSERT INTO users( username, email, password, steam, rank, team, fname, lname, commentary) VALUES( '$username', '$email', '$Sha1Pass', '$steam', '$rank', '$team', '$fname', '$lname', '$commentary')";
		
		echo $sql;
		
		$query = mysqli_query($dbCon, $sql);
		
		
		/*
		username: document.getElementsByName("username")[0].value,
		email: document.getElementsByName("email")[0].value,
		password: document.getElementsByName("password")[0].value,
		steam: document.getElementsByName("steam")[0].value,
		rank: document.getElementsByName("rank")[0].value,
		team: document.getElementsByName("team")[0].value, 
		fname: document.getElementsByName("fname")[0].value,
		lname: document.getElementsByName("lname")[0].value,
		commentary: document.getElementsByName("commentary")[0].value
		*/
	
		
	}
?>