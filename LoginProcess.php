<?php
	session_start();
	$dbCon = mysqli_connect("localhost", "root", "", "Seek-Mate");
	if (mysqli_connect_errno()) {
		echo "DB Co Failed";
	}
	
	if (isset($_POST["username"], $_POST["password"]))
	{
		$username = $_POST["username"];
		$Sha1Pass = sha1($_POST['password']);
		$sql = "SELECT id, username FROM users WHERE username = '$username' AND password = '$Sha1Pass' LIMIT 1";
		$query = mysqli_query($dbCon, $sql);
	
		if ($query) {
			$row = mysqli_fetch_row($query);
			$DbUserId = $row[0];
			$DbUsername = $row[1];
		}
		
		if (!empty($DbUserId)) {
			$_SESSION['username'] = $DbUsername;
			$_SESSION['id'] = $DbUserId;
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo "Credential Notdefined";
	}
?>