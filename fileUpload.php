<?php
if(isset($_POST['submit'])){
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . $_SESSION["USN"] ."_". $_POST["sem"] . "_".basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
if (file_exists($target_file)) {
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "<script>alert('Something Went Wrong.Try Again');</script>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script>alert('The file has been uploaded successfully!');</script>";
    } else {
        echo "<script>alert('Sorry, there was an error uploading your file');</script>";
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Marks Card</title>
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
    <br>
    <br>
    <br>
    <br>
    <p style="font-size: 45px;font-style: bold;">Upload the Marks Card to be Attested</p>
    <br>
    <div class="container col-sm-offset-1 col-sm-9">
        <div class="jumbotron col-sm-offset-3 col-sm-7">
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="sem">Semester:</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="sem" name="sem">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <input type="file" class="box form-control" id="fileToUpload" name="fileToUpload">
                    </div>
                </div>
                <br>
                <div class="form-group">        
                    <div class="row">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <a href="https://localhost/WTProject/student.php"><button type="button" class="btn btn-info" name="back">Back</button></a>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>