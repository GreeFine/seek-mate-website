<?php
	session_start();
	if (isset($_SESSION['username']))

	$dbCon = mysqli_connect("localhost", "root", "", "Seek-Mate");
	if (mysqli_connect_errno()) {
		echo 3;
	}


	if (isset($_SESSION["username"], $_SESSION["id"]))
	{
		$Username = $_SESSION["username"];
		$Id = $_SESSION["id"];
		$time = time();
		$sql = "UPDATE users SET onlineTime='$time' WHERE username='$Username' AND id='$Id'";

		if ($query = mysqli_query($dbCon, $sql) === TRUE) {
			echo 1;
		} else {
			echo 0;
		}
	} else {
		echo 2;
	}

?>