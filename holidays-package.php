<?php 
ob_start();
session_start();
require_once('db/db.php');
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
$username = $_SESSION['username'];
?>

<?php
if(isset($_GET['del'])){
        $del_id = $_GET['del']; 
			$del_check_query = "SELECT * FROM pack_detail WHERE id = $del_id";
			$del_check_run = mysqli_query($conn, $del_check_query);	
		if(mysqli_num_rows($del_check_run) > 0){
             $del_query = "DELETE FROM `pack_detail` WHERE `pack_detail`.`id` = $del_id ";
		if(mysqli_query( $conn, $del_query)){
           ?><script>alert('package has been deleted')</script><?php
       } else {
           ?><script>alert('package has not been deleted')</script><?php
       }
        }
        else{
            header('location:index.php');
        }
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
	<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
	  <link href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css" rel="stylesheet">
    <script>
        
    </script>
	
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
			<div class="col-md-9 ">
					<h1><i class="fa fa-folder-open"></i> Holidays Package <small>View All Packages </small></h1><hr>
					
					<ol class="breadcrumb">
						  <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
						  <li class="active"><i class="fa fa-users"></i> User</li>
					</ol>
					
						<?php 
							$query = "SELECT * FROM pack_detail ORDER BY id DESC";
							$run = mysqli_query($conn,$query);
							if(mysqli_num_rows($run) > 0){
								
							
						?>
					
				      
						<table class="table table-hover table-bordered table-striped" id="example"  cellspacing="0" width="100%">
							<thead>	
								<tr>
									<th><input type="checkbox" id="selectallboxes"></th>
									<th>S.No</th>
									
									<th>Package Name</th>
									
									<th>Old Price</th>
									<th>New Price</th>
									<th>Photo</th>
									<th>Days</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$a=1;
									while($row = mysqli_fetch_array($run)){
										$id = $row['id'];
										$t_name = $row['t_name'];
										$image = $row['image'];
										$old_price = $row['old_price'];
										$new_price = $row['new_price'];
										$days = $row['days'];
									
								?>
								
								<tr>
									<td><input type="checkbox"></td>
									<td><?php echo $a?></td>
									
									<td><?php echo $t_name?></td>
									
									<td><?php echo $old_price?></td>
									<td><?php echo $new_price?></td>
									<td><img src="imageupload/<?php echo $image;?>" class="img-responsive" width="50px"></td>
									<td><?php echo $days;?></td>
								
									<td><a href="edit-user.php?edit=<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
									<td><a href="holidays-package.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
								</tr>
							
								<?php $a++; } ?>
							</tbody>
						</table>
						<?php
							}
							else{
								echo "<center><h2>no packages_available</h2><center>";
							}
						?>
				
			</div>
			
		</div>
	</div>
	<footer class="text-center">
		Copyright &copy; by <a href="#"> Developer.Amit Kumar </a>from&nbsp; <small><?php echo date('Y');?></small>
	</footer>
	</div>
  <script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.jqueryui.min.js"></script>
	<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/code.js"></script>
  </body>
</html>