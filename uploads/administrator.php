<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://localhost/WTProject/styles.css">
    <style>
    	p{
    		font-size: 45px;
    		color:rgb(255,255,255);
    	}
    </style>
</head>
<body style="align-items: center;">
    <header>
        <img src='https://localhost/WTProject/kle8.png' width="60px" height="60px" />
        <label>KLE's Dr M S Sheshgiri College of Engineering and Technology</label>
    </header>
    <div class="container-fluid" style="background-color: orange;">
        <div class="row">
            <p style="color: black; font-style: bold; font-size: 25px; padding-top: 5px; text-align: right;"><u>ADMINISTRATOR</u>
            <a href="https://localhost/WTProject/logout.php"><button class="btn btn-lg" style="background-color: darkblue; color: white; margin-right: 10px;margin-left: 700px;">Logout</button></a></p>
        </div>
    </div>
    <?php
    session_start();
    echo '<br><br><p>Welcome</p>';
    echo '<p>'.$_SESSION['Name'].'</p>';
    ?>
    <br>
    <a href="https://localhost/WTProject/attestfile.php"><button type = "submit" class = "btn btn-primary btn-lg col-sm-offset-3 col-sm-6" style="font-size: 30px;font-style: bold; text-align: center; height: 60px; margin-top:20px; margin-bottom: 20px;">Attest Marks Card</button></a>
	<br>
	<br>
	<a href="https://localhost/WTProject/registeradmin.php"><button type = "submit" class = "btn btn-primary btn-lg col-sm-offset-3 col-sm-6" style="font-size: 30px;font-style: bold; text-align: center; height: 60px; margin-top:20px;margin-bottom: 20px;">Register Another Admin</button></a>
</body>
</html>
