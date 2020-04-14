<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
        
    
        <div class="container col-sm-offset-1 col-sm-8">
        <br>
        <br>
        <br>
        <div class ="jumbotron  col-sm-offset-3">
            <form class="form-horizontal" action="https://localhost/WTProject/processLogin.php" method="post">
                <center><legend style="font-size: 40px;font-style: bold">Login</legend></center>
                <input type="hidden" value="<?php echo $_POST['role']?>" name = "role" id="role">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="userid">User ID:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="userid" placeholder="Enter User ID" name="userid">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
                <?php
                if($_POST["role"] == "student"){
                    echo '<label>Do not have an Account?</label>';
                    echo '<a href="https://localhost/WTProject/signup.php"><button type="button" class="btn btn-default" value="Sign Up">Sign Up</button></a>';
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>