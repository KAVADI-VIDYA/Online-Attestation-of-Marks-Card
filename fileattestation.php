<!DOCTYPE html>
<html>
<head>
	<title>Attest File</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://localhost/WTProject/styles.css">
    <style type="text/css">
    	p{
    		text-align: left;
    		color: rgb(255,255,255);
    	}
    </style>
</head>
<body>
	<header>
        <img src='https://localhost/WTProject/kle8.png' width="40px" height="40px" />
        <label>KLE's Dr M S Sheshgiri College of Engineering and Technology</label>
    </header>
 
	<div class="row">
		<div class="col-sm-6">
			<img src="https://localhost/WTProject/uploads/<?php echo $_GET['file'];?>" style="width: 100%; height: 100%;">
		</div>
		<div class="col-sm-6">
			<?php
			session_start();
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "attestation";
			$con = mysqli_connect($servername,$username,$password,$dbname);
			if($con->connect_error)
				die("Connection Failed ".$con->connect_error);
			$file = $_GET['file'];
			$usn = substr($file, 0,10);
			$sem = substr($file, 11,1);
			$s = "SELECT Name FROM STUDENT WHERE USN = '".$usn."'";
			$res = $con->query($s);
			$r = $res->fetch_assoc();
			echo "<br><p>Name : ".$r['Name']."</p>";
			echo "<br>";
			$sql = "SELECT MARKS.SubjectCode,InternalMarks,ExternalMarks,TotalMarks,SubjectName FROM MARKS,SUBJECT WHERE USN = '".$usn."' AND MARKS.Semester = ".$sem." AND MARKS.SubjectCode = SUBJECT.SubjectCode AND MARKS.Semester = SUBJECT.Semester";
			$results = $con->query($sql);
			if($results->num_rows > 0){
				echo "<p>USN: ".$usn."</p>";
				echo "<table class = 'table table-bordered' border='1 px white' style='color:white; text-align: center;'>";
				echo "<tr>";
				echo "<th>Subject Code</th>";
				echo "<th>Subject Name</th>";
				echo "<th>Internal Marks</th>";
				echo "<th>External Marks</th>";
				echo "<th>Total Marks</th>";
				echo "<th>Grade</th>";
				echo "</tr>";
				while($row = $results->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>".$row['SubjectCode']."</td>";
					echo "<td>".$row['SubjectName']."</td>";
					echo "<td>".$row['InternalMarks']."</td>";
					echo "<td>".$row['ExternalMarks']."</td>";
					echo "<td>".$row['TotalMarks']."</td>";
					echo "<td>".grade($row['TotalMarks'])."</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<br><p>SGPA : ".SGPA($usn,$sem)."</p>";
				echo "<br><p>CGPA : ".CGPA($usn,$sem)."</p>";
				$data = "KLEMSSCETCOMPUTERSCIENCE".$sem;
				echo "<a href = 'https://localhost/WTProject/generator.php?sample=".$data."&file=".$file."'><button class = 'btn btn-primary'>Attest</button></a>";
				echo "<a href = 'https://localhost/WTProject/reject.php?file=".$file."'><button class = 'btn btn-danger' style='margin:10px;'>Reject</button></a>";
			}
			else
			{
				echo "<br><br><p>No Details Available</p>";
				echo "<a href = 'https://localhost/WTProject/reject.php?file=".$file."'><button class = 'btn btn-danger' style='margin:10px;'>Reject</button></a>";
			}

			function grade($marks){
				if (($marks>=90) && ($marks<=100))
					return 'S+';
				elseif (($marks>=80) && ($marks<90))
					return 'S';
				elseif (($marks >= 70) && ($marks < 80))
					return 'A';
				elseif (($marks >= 60) && ($marks < 70))
					return 'B';
				elseif (($marks >= 50) && ($marks < 60))
					return 'C';
				elseif (($marks >= 45) && ($marks < 50)) 
					return 'D';
				elseif (($marks >= 40) && ($marks < 45))
					return 'E';
				else
					return 'F';
			}

			function SGPA($usn,$sem)
			{
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "attestation";
				$con = mysqli_connect($servername,$username,$password,$dbname);
				if($con->connect_error)
					die("Connection Failed ".$con->connect_error);
				$sql = "SELECT SubjectCode,Credits FROM SUBJECT WHERE Semester = ".$sem." AND SubjectCode IN (SELECT SubjectCode FROM MARKS WHERE USN='".$usn."' AND Semester = ".$sem.")";
				$totalCredit = 0;
				$creditScore = 0;
				$totalCreditScore = 0;
				$result = $con->query($sql);
				if($result->num_rows > 0)
				{
					while($row = $result->fetch_assoc())
					{
						$totalCredit += $row['Credits'];
						$sql1 = "SELECT TotalMarks FROM MARKS WHERE USN = '".$usn."' AND Semester = ".$sem." AND SubjectCode = '".$row['SubjectCode']."'";
						$result1 = $con->query($sql1);
						$row1 = $result1->fetch_assoc();
						$gr = grade($row1['TotalMarks']);
						switch ($gr) {
							case 'S+':
								$creditScore = 10;
								break;
							case 'S':
								$creditScore = 9;
								break;
							case 'A':
								$creditScore = 8;
								break;
							case 'B':
								$creditScore = 7;
								break;
							case 'C':
								$creditScore = 6;
								break;
							case 'D':
								$creditScore = 5;
								break;
							case 'E':
								$creditScore = 4;
								break;
							default:
								$creditScore = 0;
								break;
						}
						$totalCreditScore += $creditScore * $row['Credits'];

					}
					return $totalCreditScore / $totalCredit;
				}
			}

			function CGPA($usn,$sem)
			{
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "attestation";
				$con = mysqli_connect($servername,$username,$password,$dbname);
				if($con->connect_error)
					die("Connection Failed ".$con->connect_error);
				$totalCredits = 0;
				$cgpa = 0;
				for($i = 1;$i <= $sem;$i++)
				{
					$sql = "SELECT Credits FROM SUBJECT WHERE Semester = ".$i;
					$result = $con->query($sql);
					$totalCredit = 0;
					if($result->num_rows > 0)
					{
						while ($row = $result->fetch_assoc()) {
							$totalCredit += $row['Credits'];
						}
					}
					$cgpa += SGPA($usn,$i) * $totalCredit;
					$totalCredits += $totalCredit;
				}
				return $cgpa/$totalCredits;
			}
			?>
		</div>
	</div>
</body>
</html>