<?php
ob_start();
session_start();
require_once('db/db.php');
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
$session_username = $_SESSION['username'];
$query = "SELECT * FROM user_pass WHERE username = '$session_username'";
$run = mysqli_query($conn,$query);
$row = mysqli_fetch_array($run);
$image = $row['image'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$id  = $row['id'];
$date = getdate($row['date']);
$day = $date['mday'];
$month = substr($date['month'],0,3);
$year = $date['year'];
$username = $row['username'];
$email = $row['email'];
$role = $row['role'];
$password = $row['password'];
$details = $row['details'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>mit||Dashboard</title>

    <!-- Bootstrap -->
    <link href="images/fevicon.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style>
        img#profile-imag{
            -webkit-box-shadow: 3px 3px 33px 5px rgba(0,0,0,0.75);
            -moz-box-shadow: 3px 3px 33px 5px rgba(0,0,0,0.75);
            box-shadow: 3px 3px 33px 5px rgba(0,0,0,0.75);
        }
      
      </style>
   
  </head>
  <body id="profile">
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="images/fevicon.png"class="img-responsive" style="width:20px;float:left;"><p style="float:left;">mit Dashboard</p></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="booking.php"><i class="fa fa-plus-square"></i> Hotels & Resorts</a></li>
        <li><a href="add-admin.php"><i class="fa fa-user-plus"></i> Add User</a></li>
        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
	<div class="container-fluid body-section">
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					  <a href="index.php" class="list-group-item active">
						<i class="fa fa-tachometer"></i> Dashboard
					  </a>
					  <a href="buy-package.php" class="list-group-item">
						<span class="badge">12</span>
					  <i class="fa fa-file-text"></i> Buy Packages
					  </a>
					  <a href="booking.php" class="list-group-item"><span class="badge">12</span> <i class="fa fa-comment"></i> Hotels & Resorts</a>
					  <a href="holidays-package.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-folder-open"></i>  Holidays Packages</a>
					  <a href="add_packages.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-users"></i> Add Packages</a>
					  <a href="contact.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-child" style="font-size:24px;color:green;"></i> Master contact</a>
				</div>
			</div>
			<div class="col-md-9">
				<h1><i class="fa fa-user"></i> Profile <small>Personal Details</small></h1><hr>
			<ol class="breadcrumb">
				  <li ><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a>
                <li class="active"><i class="fa fa-user"></i> Profile</a>
			</ol>
			
			<div class="row">
			    <div class="col-sm-12">
                     <center><img src="imageupload/<?php echo $image;?>" id="profile-imag" width="300px" class="img-circle img-thumbnail"></center><br>
                     <a href="edit-profile.php?edit=<?php echo$id;?>" class="btn btn-primary pull-right">Edit Profile</a><hr>
                    <center>
                       <h2>Profile Details</h2>
                    </center><br>
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td width="20%"><b>User id:</b></td>
                            <td width="30%"><?php echo $id; ?></td>
                            <td width="20%"><b>SignUp Date:</b></td>
                            <td width="30%"><?php echo "$day $month $year";?></td>
                        </tr>
                         <tr>
                            <td width="20%"><b>First Name:</b></td>
                            <td width="30%"><?php echo $first_name;?></td>
                            <td width="20%"><b>Last Name:</b></td>
                            <td width="30%"><?php echo $last_name;?></td>
                        </tr>
                         <tr>
                            <td width="20%"><b>User Name:</b></td>
                            <td width="30%"><?php echo $username;?></td>
                            <td width="20%"><b>Email:</b></td>
                            <td width="30%"><?php echo $email;?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Role:</b></td>
                            <td width="30%"><?php echo $role;?></td>
                            <td width="20%"><b>Password:</b></td>
                            <td width="30%"><?php echo $password ;?></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-lg-10 col-sm-12">
                            <b>Details</b>
                            <div><?php echo $details;?></div>
                        </div>
                    </div><br><br>
			    </div>
			</div>
			
	        </div>
	   </div>
    </div>
	<footer class="text-center">
		Copyright &copy; by <a href="#"> Developer.Amit Kumar </a> 2016-<?php echo date('y');?>
	</footer>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>