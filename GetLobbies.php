<?php
	$dbCon = mysqli_connect("localhost", "root", "", "Seek-Mate");
	if (mysqli_connect_errno()) {
		echo 3;
	}
	
	$Time = time() - 600;
	$sql = "SELECT username, rank, url FROM lobby WHERE lobbyDate > '$Time' AND open = '1'";
	$query = mysqli_query($dbCon, $sql);

	if ($query) {
		while ($row = mysqli_fetch_assoc($query))
		{
			if (preg_match('/^ts3server:\/\//', $row['url']))	{
				$icone = "<img src='/images/TS_Icone.jpg' style='width: 16px; height: 16px'>";
			} else {
				$icone = "<img src='/images/CSGO_Icone.png' style='width: 16px; height: 16px'>";
			}
			echo "<div class='media conversation'>
					<div class='media-body'>
						<a class='UserList pull-left' href='". $row['url'] ."'>
							<img src='/images/ranks/" . $row['rank'] . '.png' . "' style='width: 98px; height: 32px';>
							" . $row['username'] . $icone . "
						</a>
					</div>
				</div>";
		}
	} else {
		echo 2;
	}
?>

