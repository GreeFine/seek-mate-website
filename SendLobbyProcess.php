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

	if (isset($_SESSION["username"],$_SESSION["rank"],$_SESSION["token"]) && !empty($_POST["lobbyAdr"]))
	{

		$lobbyAdr = $_POST["lobbyAdr"];
			if(preg_match('/^ts3server:\/\//', $lobbyAdr) || preg_match('/^steam:\/\/joinlobby\/730\//', $lobbyAdr)) {
				$restriction = $_POST["restriction"];
			if (strlen($lobbyAdr) > 181 || !is_numeric($restriction)) { echo 6; exit();}
			$username = $_SESSION["username"];
			$rank = $_SESSION["rank"];
			$token = $_SESSION["token"];
			$lobbyDate = time();

			$sql = "INSERT INTO lobby( url, username, rank, restriction, token, lobbyDate, open) VALUES( '$lobbyAdr', '$username', '$rank', '$restriction', '$token', '$lobbyDate', '1')";
			$query = mysqli_query($dbCon, $sql);
			echo 1;
		} else {
			echo 3;
		}
	} else { echo 0; };
?>