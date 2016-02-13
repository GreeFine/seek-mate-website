<?php
	$dbCon = mysqli_connect("localhost", "root", "", "Seek-Mate");
	if (mysqli_connect_errno()) {
		echo 3;
	}
	
	$Time = time() - 600;
	$sql = "SELECT username, rank FROM users WHERE onlineTime > '$Time'";
	$query = mysqli_query($dbCon, $sql);

	if ($query) {
		while ($row = mysqli_fetch_assoc($query))
		{
			echo "<div class='media conversation'>
					<div class='media-body'>
						<a class='UserList pull-left' href='/profile/". $row['username'] ."'>
							<img src='/images/ranks/" . $row['rank'] . '.png' . "' style='width: 98px; height: 39px';>
							" . $row['username'] ."
						</a>
					</div>
				</div>";
		}
	} else {
		echo 2;
	}
?>

