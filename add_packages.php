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
      <a class="navbar-brand" href="index.php"><img src="images/fevicon.png"class="img-responsive" style="width:20px;float:left;"><p style="float:left;">mit Dashboard</p></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="booking.php" data-target="#exampleModal" data-toggle="modal"><i class="fa fa-plus-square"></i> Hotels & Resorts</a></li>
        
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
					  <a href="add_packages.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-users"></i> Add Package</a>
					  <a href="contact.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-child" style="font-size:24px;color:green;"></i> Master contact</a>
				</div>
			</div>
			<div class="col-md-9 ">
					<h1><i class="fa fa-folder-open"></i> Packages <small>Add New Packages </small></h1><hr>
					
					<ol class="breadcrumb">
						  <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
						  <li class="active"><i class="fa fa-users"></i> Add New Packages</li>
					</ol>
					
						<?php 
							if(isset($_POST['submit'])){
								 $package_name = $_POST['t_name'];
								 $old_price = $_POST['old_price'];
								 $new_price = $_POST['new_price'];
								 $duration = $_POST['days'];
								 $inclusion_1 = $_POST['inclusion_1'];
								 $inclusion_2 = $_POST['inclusion_2'];
								 $inclusion_3 = $_POST['inclusion_3'];
								 $exclusion_1 = $_POST['exclusion_1'];
								 $p_itinerary_1 = $_POST['p_itinerary_1'];
								 $p_itinerary_2 = $_POST['p_itinerary_2'];
								 $p_itinerary_3 = $_POST['p_itinerary_3'];
								 $p_itinerary_4 = $_POST['p_itinerary_4'];
								 $image = $_FILES['image']['name'];
								 
								 $image_tmp  = $_FILES['image']['tmp_name'];
								 move_uploaded_file($image_tmp, "imageupload/$image");
								 
								
								$check_query = "SELECT * FROM pack_detail WHERE t_name = '$package_name'";
								$check_run = mysqli_query($conn,$check_query);
								
								if(empty($package_name) or empty($old_price) or empty($new_price) or empty($duration)){
									?><script>alert('all *fields are required')</script><?php
									}
								
								else if(mysqli_num_rows($check_run) > 0){
									?><script>alert('Package Name is already exist')</script><?php
								}
								else{
									$insert_query = "INSERT INTO `pack_detail`(`t_name`, `old_price`, `new_price`, `days`, `image`, `inclusion_1`, `inclusion_2`, `inclusion_3`, `exclusion_1`, `p_itinerary_1`, `p_itinerary_2`, `p_itinerary_3`, `p_itinerary_4` ) VALUES ('$package_name','$old_price','$new_price','$duration','$image','$inclusion_1','$inclusion_2','$inclusion_3','$exclusion_1','$p_itinerary_1','$p_itinerary_2','$p_itinerary_3','$p_itinerary_4')";
									
									if(mysqli_query($conn,$insert_query)){
										?><script>alert('package  added')</script><?php
									}
									else{
										?><script>alert('package are not added')</script><?php
									}
								}
								
							}
						?>
					<div class="row">
						<div class="col-md-8">
							<form method="post" enctype="multipart/form-data">
						  <div class="form-group">
						  
							<label for="package_name" class="form-control-label">Package Name:</label>
							
							<input type="text" class="form-control" id="package_name" name="t_name">
						  </div>
						  <div class="form-group">
							<label for="new_price" class="form-control-label">New Price:</label>
							<input type="text" class="form-control" id="new_price" name="new_price">
						  </div>
						  <div class="form-group">
							<label for="old_price" class="form-control-label">Old Price:</label>
							<input type="text" class="form-control" id="old_price" name="old_price">
						  </div>
						  <div class="form-group">
							<label for="duration" class="form-control-label">Package Duration Days:</label>
							<input type="text" class="form-control" id="duration" name="days">
						  </div>
						  <div class="form-group">
							<label for="Package_Inclusion1" class="form-control-label">Package Inclusion 1:</label>
							<input type="text" class="form-control" id="Package_Inclusion" name="inclusion_1">
						  </div>
						  <div class="form-group">
							<label for="Package_Inclusion1" class="form-control-label">Package Inclusion 2:</label>
							<input type="text" class="form-control" id="Package_Inclusion" name="inclusion_2">
						  </div>
						  <div class="form-group">
							<label for="Package_Inclusion1" class="form-control-label">Package Inclusion 3:</label>
							<input type="text" class="form-control" id="Package_Inclusion" name="inclusion_3">
						  </div>
						  <div class="form-group">
							<label for="Package_exclusion1 " class="form-control-label">Package Exclusion 1:</label>
							<input type="text" class="form-control" id="Package_exclusion" name="exclusion_1">
						  </div>
						  <div class="form-group">
							<label for="p_itinerary_1" class="form-control-label">Package Itinerary 1:</label>
							<input type="text" class="form-control" id="p_itinerary_1" name="p_itinerary_1">
						  </div>
						  <div class="form-group">
							<label for="p_itinerary_1" class="form-control-label">Package Itinerary 2:</label>
							<input type="text" class="form-control" id="p_itinerary_1" name="p_itinerary_2">
						  </div>
						  <div class="form-group">
							<label for="p_itinerary_1" class="form-control-label">Package Itinerary 3:</label>
							<input type="text" class="form-control" id="p_itinerary_1" name="p_itinerary_3">
						  </div>
						  <div class="form-group">
							<label for="p_itinerary_1" class="form-control-label">Package Itinerary 4:</label>
							<input type="text" class="form-control" id="p_itinerary_1" name="p_itinerary_4">
						  </div>
						  <div class="form-group">
							<label for="duration" class="form-control-label">Images:</label>
							<input type="file" class="form-control" id="file"  name='image'>
						  </div>
						  <div class="form-group">
							<input type="submit" name="submit" value="submit" class="btn btn-primary " />
						  </div>
						  
						</form>
						</div>
						<div class="col-md-4">
							
						</div>
					</div>
				
						
							
						
				
			</div>
			
		</div>
	</div>
	<footer class="text-center">
		Copyright &copy; by <a href="#"> Developer.Amit Kumar </a>from&nbsp;  2017-<?php echo date('y');?>
	</footer>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>