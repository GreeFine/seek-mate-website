<?php
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
			case (strlen($username) < 3 && strlen($username) > 25):
				echo 3;
				exit(0);
				break;
			case (strlen($Sha1Pass) < 4 && strlen($Sha1Pass) > 60):
				echo 3;
				exit(0);
				break;
			case (strlen($email) > 30):
				echo 3;
				exit(0);
				break;
			case (strlen($rank) > 2 || !is_numeric($rank)):
				echo 3;
				exit(0);
				break;
			case (strlen($steam) > 60):
				echo 3;
				exit(0);
				break;
			case (strlen($team) > 20):
				echo 3;
				exit(0);
				break;
			case (strlen($fname) > 20):
				echo 3;
				exit(0);
				break;
			case (strlen($lname) > 20):	
				echo 3;
				exit(0);
				break;
			case (strlen($commentary) > 40):
				echo 3;
				exit(0);
				break;
			default :
				break;
		}
		
		$sql = "SELECT email FROM users WHERE email = '$email';";
		$query = mysqli_query($dbCon, $sql);
		if ($query) {
			$row = mysqli_fetch_row($query);
			if (empty($row[0])) {
				$sql = "SELECT username FROM users WHERE username = '$username';";
				$query = mysqli_query($dbCon, $sql);
				if ($query) {
					$row = mysqli_fetch_row($query);
					if (empty($row[0])) {
						$sql = "INSERT INTO users( username, email, password, steam, rank, team, fname, lname, commentary) VALUES( '$username', '$email', '$Sha1Pass', '$steam', '$rank', '$team', '$fname', '$lname', '$commentary')";
						$query = mysqli_query($dbCon, $sql);
						echo 1;
					} else {
						echo 5;
					}
				}
			} else {
				echo 4;
			}
		}
	
	}
?>