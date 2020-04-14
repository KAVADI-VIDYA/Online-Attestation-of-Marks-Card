<!DOCTYPE html>
<html>
<head>
	<title>Files Attestation Page</title>
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
	<?php
	$dir = "uploads";
	$files = scandir($dir);
	echo "<center><div class ='container'><br>";
	echo "<p>The Files to be Attested</p>";
	echo "<div class = 'row'><br><br><br>";
	foreach ($files as $value) {
		if($value !== "." && $value !== "..")
			echo '<a href="https://localhost/WTProject/fileattestation.php?file='.$value.'"><img src = "https://localhost/WTProject/uploads/'.$value.'" style = "margin:10px; width:120px; height:140px;"></a>';
	}
	echo "</div></div></center>";
	?>
	echo '<center><a href="https://localhost/WTProject/administrator.php"><button type = "button" class = "btn btn-info" style="vertical-align:baseline;margin:20px;">Back</button></a></center>';
</body>
</html>