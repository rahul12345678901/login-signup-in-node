<?php
session_start();
require_once('db/db.php');

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn,strtolower($_POST['user']));
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $check_username_query = "SELECT * FROM user_pass WHERE username = '$username'";
    $check_username_run = mysqli_query($conn,$check_username_query);
    if(mysqli_num_rows($check_username_run) > 0){
        $row = mysqli_fetch_array( $check_username_run);
        
        $db_username = $row['username'];
        $db_password = $row['password'];
        
       
        
        if($username == $db_username && $password == $db_password){
            header('location:index.php');
            $_SESSION['username'] = $db_username;
 
        }else{
           echo "<script>alert('wrong username or password')</script>";
        }
        
    }
    else{
        echo "<script>alert('wrong username pr password')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Our Company</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	
	<link rel="stylesheet" href="css/style3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body { 
  background: url() no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.panel-default {

margin-top:140px;
}
.form-group.last { margin-bottom:0px; }
    </style>
   
</head>
<body>
   
   
   <div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Username</label>
                        <div class="col-sm-9">
                            <input type="text" name="user" class="form-control" id="user" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password"  name="password" class="form-control" id="Password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"/>
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                               
                                 <input type="reset" class="btn btn-danger ">
                               
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Not Registred? <a href="http://www.jquery2dotnet.com">Register here</a></div>
            </div>
        </div>
    </div>
       </div>

   
   
    
   
</body>
</html>