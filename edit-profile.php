<?php 
ob_start();
session_start();
require_once('db/db.php');
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
$session_username = $_SESSION['username'];
if(isset($_GET['edit']))
{
    $edit_id =  $_GET['edit'];
    $edit_query = "SELECT *FROM user_pass WHERE id=$edit_id";
    $edit_query_run = mysqli_query($conn, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run );
        $eusername = $edit_row['username'];
        if($eusername == $session_username){
              $efirst_name = $edit_row['first_name'];
        $elast_name = $edit_row['last_name'];
        
        $epassword = $edit_row['password'];
        
        $eimage = $edit_row['image'];
        $eemail = $edit_row['email'];
        $edetails = $edit_row['details'];
       
        $eimage = $edit_row['image'];
        }
        else{
            header("location:index.php");
        }
      
    }
    else{
        header("location:index.php");
    }
    
}
else{
    header("location:index.php");
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
					  <a href="#" class="list-group-item">
						<span class="badge">12</span>
					  <i class="fa fa-file-text"></i> All Post
					  </a>
					  <a href="booking.php" class="list-group-item"><span class="badge">12</span> <i class="fa fa-comment"></i> Hotels & Resorts</a>
					  <a href="holidays-package.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-folder-open"></i>  Holidays Packages</a>
					  <a href="add_packages.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-users"></i> Add Package</a>
					  <a href="contact.php" class="list-group-item"><span class="badge">12</span><i class="fa fa-child" style="font-size:24px;color:green;"></i> Master contact</a>
				</div>
			</div>
			<div class="col-md-9 ">
					<h1><i class="fa fa-folder-open"></i> Edit Packages <small>Edit uder Packages </small></h1><hr>
					
					<ol class="breadcrumb">
						  <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
						  <li class="active"><i class="fa fa-users"></i> Edit Packages</li>
					</ol>
					
						<?php 
							if(isset($_POST['submit'])){
								 $first_name = $_POST['first_name'];
								 $last_name = $_POST['last_name'];
								 $username = $_POST['username'];
								 $password = $_POST['password'];
								 $email = $_POST['email'];
								 $details = $_POST['details'];
								
								
								 $image = $_FILES['image']['name'];
                                
                                if(empty($image)){
                                    $image = $eimage;
                                }
								 
								 $image_tmp  = $_FILES['image']['tmp_name'];
								 move_uploaded_file($image_tmp, "imageupload/$image");
								 
								
								
								
								if(empty($first_name) or empty($last_name) or empty($username) or empty($password) or empty($email) or empty($details) or empty($image)){
									?><script>alert('all *fields are required')</script><?php
									}
								
								else{
									$update_query = "UPDATE `user_pass` SET `username` = '$username', `password` = '$password', `first_name` = '$first_name', `last_name` = '$last_name', `email` = '$email', `image` = '$image', `details` ='$details' WHERE `user_pass`.`id` = $edit_id";
                                    if(mysqli_query($conn, $update_query)){
                                        ?><script>alert('edit successfully')</script><?php
                                        header("refresh:1; url=edit-profile.php?edit=$edit_id");
                                        if(!empty($image)){
                                             move_uploaded_file($image_tmp, "imageupload/$image");
                                        }
                                    }
                                    else{
                                        ?><script>alert('not successfully edit')</script><?php
                                    }
								}
								
							}
						?>
					<div class="row">
						<div class="col-md-8">
							<form method="post" enctype="multipart/form-data">
						  <div class="form-group">
						  
							<label for="first_name" class="form-control-label">First Name:</label>
							
							<input type="text" class="form-control" id="first_name" value="<?php echo $efirst_name;?>" name="first_name">
						  </div>
						  <div class="form-group">
							<label for="last_name" class="form-control-label">Last Name:</label>
							<input type="text" class="form-control" id="last_price" value="<?php echo $elast_name;?>" name="last_name">
						  </div>
						  <div class="form-group">
							<label for="username" class="form-control-label">User id:</label>
							<input type="text" class="form-control" id="username" value="<?php echo $eusername;?>" name="username">
						  </div>
						  <div class="form-group">
							<label for="password" class="form-control-label">Password:</label>
							<input type="text" class="form-control" id="password"  name="password">
						  </div>
						  <div class="form-group">
							<label for="email" class="form-control-label">Email id:</label>
							<input type="text" class="form-control" id="email" value="<?php echo $eemail;?>" name="email">
						  </div>
						 
						  <div class="form-group">
							<label for="image" class="form-control-label">Profile picture:</label>
							<input type="file"  id="image" name="image">
						  </div>
						  <div class="form-group">
							<label for="details" class="form-control-label">Details:</label>
							<textarea name="details" id="" cols="30" rows="10" value="<?php echo $edetails;?>" class="form-control"></textarea>
						  </div>
						  <div class="form-group">
							<input type="submit" name="submit" value="submit" class="btn btn-primary " />
						  </div>
						  
						</form>
						</div>
						<div class="col-md-4">
							<?php echo "<img src='imageupload/$eimage' width='100%'>"; ?>
						</div>
					</div>
				
						
							
						
				
			</div>
			
		</div>
	</div>
	<footer class="text-center">
		Copyright &copy; by <a href="#"> Developer.Amit Kumar </a>from&nbsp; <small><?php echo date('Y');?></small>
	</footer>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>