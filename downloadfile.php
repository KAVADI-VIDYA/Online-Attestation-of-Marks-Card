<!DOCTYPE html>
<html>
<head>
	<title>Download Attested Marks Card</title>
	<meta http-equiv="refresh" content="10" />
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="https://localhost/WTProject/styles.css">
</head>
<body>
	<header>
		<img src='https://localhost/WTProject/kle8.png' width="40px" height="40px" />
		<label>KLE's Dr M S Sheshgiri College of Engineering and Technology</label>
	</header>
	<div class="container">
		<br>
		<br>
		<br>
		<?php
		session_start();
		$dir = "attested";
		$files = scandir($dir);
		$flag = 0;
		echo '<br><center><div class="row">';
		foreach ($files as $file) {
			if($file != "." && $file != ".." && isset($_SESSION["USN"]) && substr($file, 0, 10) === $_SESSION["USN"]){
				$flag = 1;
				echo '<iframe src="https://localhost/WTProject/attested/'.$file.'"  style="width: 150px;height:200px; padding-top:0px" ></iframe>';
				echo '<a href="/WTProject/attested/'.$file.'" download="'.$_SESSION["USN"].'_'.substr($file,11,1).'"><button type="button" class="btn btn-primary" style = "margin:20px;">Download</button></a>';
			}
		}
		echo '</div></center>';
		if($flag == 0)
			echo '<p>You have no Attested Marks Cards to Download</p>';
		$dir = "rejected";
		$files = scandir($dir);
		$files1 = array();
		$i=0;
		foreach ($files as $file) {
			if($file != "." && $file != ".." && isset($_SESSION["USN"]) && substr($file, 0, 10) === $_SESSION["USN"]){
				$files1[$i] = $file;
				$i++;
			}	
		}
		if($i != 0)
		{
			echo '<p>Your following marks cards have been rejected<p>';
			echo '<br><center><div class="row">';
			foreach ($files1 as $file) {
				echo '<img src="/WTProject/rejected/'.$file.'" title="'.$file.'" width = "150px" height = "160px" style="margin:20px;">';
			}	
		}
		echo '<center><a href="https://localhost/WTProject/student.php"><button type = "button" class = "btn btn-info" style="vertical-align:baseline;">Back</button></a></center>';
		?>
	</div>
</body>
</html>