<?php
session_start();
$userErr = $passErr = "";
$formOk = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["userid"])) {
		$userErr = "Username is required";
		$formOk = 0;
	} else {
		$user = test_input($_POST["userid"]);
	}
	if (empty($_POST["pwd"])) {
		$err = "Password is required";
		$formOk = 0;
	} else {
		$pass = test_input($_POST["pwd"]);
	}
	if($formOk == 1)
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "attestation";
		$con = mysqli_connect($servername,$username,$password,$dbname);
		if($con->connect_error)
			die("Connection Failed:".$con->connect_error);
		if($_POST['role'] == "student"){
			$sql = "SELECT * FROM AUTHENTICATION WHERE username = '".$user."' AND password = '".$pass."'";
			$result = $con->query($sql);
			if($result->num_rows > 0)
			{
				$sql = "SELECT * FROM STUDENT WHERE USN = '".$user."'";
				$result = $con->query($sql);
				$row = $result->fetch_assoc();
				$_SESSION['USN'] = $row['USN'];
				$_SESSION['Name'] = $row['Name'];
				session_write_close();
				include('C:/xampp/htdocs/WTProject/student.php');
			}
			else
			{
				$formOk = 0;
				$err = "Enter correct Username and Password";
			}
		}
		else
		{
			$sql = "SELECT * FROM ADMINISTRATOR WHERE Email='".$user."' AND Password='".$pass."'";
			$result = $con->query($sql);
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$_SESSION['Name'] = $row['Name'];
				session_write_close();
				include('C:/xampp/htdocs/WTProject/administrator.php');
			}
			else
			{
				$formOk = 0;
				$err = "Enter correct Username and Password";
			}
		}
	}
	if($formOk == 0)
	{
		include('C:/xampp/htdocs/WTProject/login.php');
		echo '<p style="color:rgb(150,0,0); font-size:20px; margin-right:100px;"><i><u style="color:red;">'.$err.'<i></u></p>';
	}
}

function test_input($data) {
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}
?>