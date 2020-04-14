<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Sign up</title>
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
$usnErr = $nameErr = $emailErr = $phnoErr = $branchErr = $pwdErr = $cnfpwdErr = "";
$usn = $name = $email = $phno = $branch = $pwd = $cnfpwd = "";
$formOk = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usn"])) {
    $usnErr = "USN is required";
    $formOk = 0;
  } else {
    $usn = test_input($_POST["usn"]);
    //if (!preg_match("/[0-9].[A-Z].[A-Z].[0-9].[0-9].[A-Z].[A-Z].[0-9].[0-9].[0-9]/",$usn)) {
      //$usnErr = "Invalid USN";
      //$usn = "";
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

  if (empty($_POST["pwd"])) {
    $pwdErr = "Password is required";
    $formOk = 0;
  } else {
    $pwd = test_input($_POST["pwd"]);
  }
  
  if (empty($_POST["cnfpwd"])) {
    $cnfpwdErr = "Confirm Password";
    $formOk = 0;
  } else {
    $cnfpwd = test_input($_POST["cnfpwd"]);
    if($pwd !== $cnfpwd){
        $cnfpwdErr = "Password does not match";
        $cnfpwd = "";
        $formOk = 0;
    }
  }
  if ($_POST["dept"] === "-1") {
    $branchErr = "Select Branch";
    $formOk = 0;
  }else{
    $branch = $_POST["dept"];
  }

if($formOk == 1){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attestation";
    $con = mysqli_connect($servername,$username,$password,$dbname);
    if($con->connect_error)
        die("Connection Failed:".$con->connect_error);
    $sql = "INSERT INTO STUDENT VALUES('".$usn."','".$name."','".$email."',".$phno.",".$branch.")";
    $sql1 = "INSERT INTO AUTHENTICATION VALUES('".$usn."','".$pwd."')";
    if(($con->query($sql) == TRUE) && ($con->query($sql1) == TRUE)){
        $_SESSION["Name"] = $name;
        $_SESSION["USN"] = $usn;
        session_regenerate_id(true);
        header("location: student.php");
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
            <label class="control-label col-sm-2" for="usn">USN:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="usn" value="<?php echo $usn;?>" name="usn">
                <span class="error">* <?php echo $usnErr;?></span>
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
            <label class="control-label col-sm-2" for="branch">Branch:</label>
            <div class="col-sm-8">
                <select name="dept" id="dept" name = "dept">
					<option value="-1">--Select--</option>
					<option value="1">Computer Science</option>
					<option value="2">Electronics and Communication</option>
					<option value="3">Electrical and Electronics</option>
					<option value="4">Mechanical</option>
					<option value="5">Chemical</option>
					<option value="6">Civil</option>
					<option value="7">Bio Medical</option>
				</select>
                <span class="error">* <?php echo $branchErr;?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="pwd" value="<?php echo $pwd;?>" name="pwd">
                <span class="error">* <?php echo $pwdErr;?></span>
            </div>
        </div>
		<div class="form-group">
            <label class="control-label col-sm-2" for="cnfpwd">Confirm Password:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="cnfpwd" value="<?php echo $cnfpwd;?>" name="cnfpwd">
                <span class="error">* <?php echo $cnfpwdErr;?></span>
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>	
	</div>
</body>
</html>