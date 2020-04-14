<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Register Admin</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="https://localhost/WTProject/styles.css">
    <style type="text/css">
        .error{
            color: #ff0000;
        }
    </style>
</head>
<body>
<?php
session_start();
$idErr = $nameErr = $emailErr = $phnoErr = "";
$id = $name = $email = $phno = "";
$formOk = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["id"])) {
    $idErr = "ID is required";
    $formOk = 0;
  } else {
    $id = test_input($_POST["id"]);
    //if (!preg_match("/^[0-9].[A-Z]{2}.[0-9]{2}.[A-Z]{2}.[0-9]{3}$/",$id)) {
      //$idErr = "Invalid ID";
      //$id = "";
      //$formOk = 0;
    //}
  }
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $formOk = 0;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $name = "";
      $formOk = 0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $formOk = 0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email = "";
      $formOk = 0;
    }
  }
    
  if (empty($_POST["phno"])) {
    $phno = "Phone Number is required";
    $formOk = 0;
  } else {
    $phno = test_input($_POST["phno"]);
  }
  
if($formOk == 1){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attestation";
    $con = mysqli_connect($servername,$username,$password,$dbname);
    if($con->connect_error)
        die("Connection Failed:".$con->connect_error);
    $sql = "INSERT INTO ADMINISTRATOR VALUES('".$id."','".$name."','".$email."',".$phno.",'')";
    if($con->query($sql) == TRUE){
        echo '<script>alert("Successfully Registered!")</script>';
    }else{
        echo '<script>alert("Something went Wrong.Try again")</script>';
    }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

	<header>
		<img src='https://localhost/WTProject/kle8.png' width="40px" height="40px" />
		<label>KLE's Dr M S Sheshgiri College of Engineering and Technology</label>
	</header>
	
	<div class="container col-sm-offset-1 col-sm-8">
		<br>
    	<br>
    	<br>
    	<br>
    	<br>
        <div class ="jumbotron  col-sm-offset-3">
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <center><legend style="font-size: 40px;font-style: bold">Sign Up</legend></center>
        <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="id" value="<?php echo $id;?>" name="id">
                <span class="error">* <?php echo $idErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" value="<?php echo $name;?>" name="name">
                <span class="error">* <?php echo $nameErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">E-mail:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" value="<?php echo $email;?>" name="email">
                <span class="error">* <?php echo $emailErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="phno">Phone No.:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="phno" value="<?php echo $phno;?>" name="phno">
                <span class="error">* <?php echo $phnoErr;?></span>
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <a href = "https://localhost/WTProject/administrator.php"><button type="button" class="btn btn-info col-sm-offset-10">Back</button>	
	</div>
</body>
</html>