<?php
	$dbCon = mysqli_connect("localhost", "root", "", "Seek-Mate");
	if (mysqli_connect_errno()) {
		echo 2;
	}
	
	$Time = time() - 3600;
	$sql = "SELECT id, message, username, userRank, token, msgDate FROM chatMsg WHERE msgDate > '$Time'";
	$query = mysqli_query($dbCon, $sql);

	if ($query) {
		$number = 0;
		$msgBuffer = "";
		$msgBuffer2 = "";
		$lastRowId = -1;
		while ($row = mysqli_fetch_assoc($query))
		{
			$number += 1;
			if(!empty($row['message']) && !empty($row['username']) && !empty($row['userRank']))
			{
				$lastRowId = $row['id'];
				$msgBuffer = $msgBuffer . "<div id='msg". $row['id'] ."' class='media msg'>
						<a class='pull-left' href='#'>
							<h5 class='media-heading'>". $row['username'] ."</h5>
							<img src='/images/ranks/". $row['userRank'] .".png' style='width: 98px; height: 39px';>
						</a>
						<div class='media-body'>
							<small class='pull-right time'><i class='fa fa-clock-o'></i>". date('H:i:s', $row['msgDate']) ."</small>
							<p style='margin-top:20px;' class='TColor col-lg-10'>". urldecode($row['message']) ."</p>
						</div>							
					</div>";
			}
		}
		$RowId = $lastRowId - $number;
		if ($number < 10) {
			$number = 10 - $number;
			if ($RowId != -1) { $whereTag = " WHERE id < '$RowId'"; } else { $whereTag = ""; }
			$sql2 = "SELECT id, message, username, userRank, token, msgDate FROM chatMsg". $whereTag ." ORDER BY id DESC LIMIT $number";
			$query2 = mysqli_query($dbCon, $sql2);
			
			if ($query2) {
				while ($row2 = mysqli_fetch_assoc($query2))
				{
					if(!empty($row2['message']) && !empty($row2['username']) && !empty($row2['userRank']))
					{
						$msgBuffer2 = "<div id='msg". $row2['id'] ."' class='media msg'>
								<a class='pull-left' href='#'>
									<h5 class='media-heading'>". $row2['username'] ."</h5>
									<img src='/images/ranks/". $row2['userRank'] .".png' style='width: 98px; height: 39px';>
								</a>
								<div class='media-body'>
									<small class='pull-right time'><i class='fa fa-clock-o'></i>". date('H:i:s', $row2['msgDate']) ."</small>
									<p style='margin-top:20px;' class='TColor col-lg-10'>". urldecode($row2['message']) ."</p>
								</div>							
							</div>" . $msgBuffer2;
					}
				}
			}
		}
		echo $msgBuffer2 . $msgBuffer;
	} else {
		echo 2;
	}
?>
