<?php
ob_start();
session_start();
require_once('db/db.php');
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

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
	
   
  </head>
  <body>
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
				<h1><i class="fa fa-tachometer"></i> Dashboard <small>Statsitics Overview</small></h1><hr>
			<ol class="breadcrumb">
				  <li class="active"><i class="fa fa-tachometer"></i> Dashboard</a>
			</ol>
			<div class="row tag-boxes">
				<div class="col-md-6 col-lg-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-9">
									<div class="text-right huge">11</div><br>
									<div class="text-right" style="m;">New Comments</div>
									
							</div>
						</div>

					</div>
					<a href="#">
					
						<div class="panel-footer">
							<span class="pull-left"> View All Comments</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-file-text fa-5x"></i>
								</div>
								<div class="col-xs-9">
									<div class="text-right huge">11</div><br>
									<div class="text-right" style="m;"> Buy Packages</div>
									
							</div>
						</div>

					</div>
					<a href="buy-package.php">
					
						<div class="panel-footer">
							<span class="pull-left"> View All Buy Packages</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-users fa-5x"></i>
								</div>
								<div class="col-xs-9">
									<div class="text-right huge">30</div><br>
									<div class="text-right" style="m;">Add Packages</div>
									
							</div>
						</div>

					</div>
					<a href="add_packages.php">
					
						<div class="panel-footer">
							<span class="pull-left"> Add All packages</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-folder-open fa-5x"></i>
								</div>
								<div class="col-xs-9">
									<div class="text-right huge">21</div><br>
									<div class="text-right" style="m;">Holidays Packages</div>
									
							</div>
						</div>

					</div>
					<a href="holidays-package.php">
					
						<div class="panel-footer">
							<span class="pull-left"> View All Holidays Packages</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
							<div class="clearfix"></div>
						</div>
					</a>
				</div>
				</div>
				
			</div>
			
			
			
						
		</div>
			
		</div>
	</div>
	<footer class="text-center">
		Copyright &copy; by <a href="#"> Developer.Amit Kumar </a> 2017-<?php echo date('y');?>
	</footer>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>