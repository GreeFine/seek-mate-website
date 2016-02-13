<?php
	session_start();
	$timenow = time();
	if (isset($_SESSION["TimeRestriction"]))
	{
		$TimeRestriction = $_SESSION["TimeRestriction"];
		if ($TimeRestriction > $timenow) {
			echo 5;
			exit();
		} else {
			$_SESSION["TimeRestriction"] = $timenow + 3;
		}
	} else {
		$_SESSION["TimeRestriction"] = $timenow + 3;
	};

	$dbCon = mysqli_connect("localhost", "root", "", "seek-mate");
	if (mysqli_connect_errno()) {
		echo 2;
	}
	
	if (isset($_SESSION["username"],$_SESSION["rank"],$_SESSION["token"]) && !empty($_POST["message"]))
	{		
		$message = $_POST["message"];
		if (strlen($message) > 181) { echo 6; exit();}
		$username = $_SESSION["username"];
		$rank = $_SESSION["rank"];
		$token = $_SESSION["token"];
		$msgDate = time();

		$sql = "INSERT INTO chatmsg( message, username, userRank, token, msgDate) VALUES( '$message', '$username', '$rank', '$token', '$msgDate')";
		$query = mysqli_query($dbCon, $sql);
		echo 1;
	} else { echo 0; };
?>