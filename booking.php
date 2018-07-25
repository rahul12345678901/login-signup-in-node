<?php 
ob_start();
session_start();
require_once('db/db.php');
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>

<?php


if(isset($_GET['del'])){
        $del_id = $_GET['del']; 
       $del_check_query = "SELECT * FROM hotel_booking WHERE id = $del_id";
        $del_check_run = mysqli_query($conn, $del_check_query);
        if(mysqli_num_rows($del_check_run) > 0){
             $del_query = "DELETE FROM `hotel_booking` WHERE `hotel_booking`.`id` = $del_id";
       if(mysqli_query( $conn, $del_query)){
            ?><script>alert('booking query has been deleted')</script><?php
       } else {
           ?><script>alert('booking query has not been deleted')</script><?php
       }
        }
        else{
            header('location:index.php');
        }
    }



    
	if(isset($_POST['checkboxes'])){
		foreach($_POST['checkboxes'] as $id){
		 $bulk_option = $_POST['bulk-option']; 
		 if($bulk_option == 'pending' ){
			 $status = "UPDATE `hotel_booking` SET `status` = '$bulk_option' WHERE `hotel_booking`.`id` = $id;";
			 if(mysqli_query($conn,$status)){
				 ?><script>alert('peding sucessfully')</script><?php
			 }else{
				?><script>alert('peding not sucessfully')</script><?php
			 }
		 }
		 else if($bulk_option == 'confirm'){
			 
			 $status = "UPDATE `hotel_booking` SET `status` = '$bulk_option' WHERE `hotel_booking`.`id` = $id;";
			 if(mysqli_query($conn,$status)){
				 ?><script>alert('confirm sucessfully')</script><?php
			 }else{
				?><script>alert('confirm not sucessfully')</script><?php
			 }
		 }
		 else if($bulk_option == 'cancel'){
			 $status = "UPDATE `hotel_booking` SET `status` = '$bulk_option' WHERE `hotel_booking`.`id` = $id;";
			 if(mysqli_query($conn,$status)){
				?><script>alert('cancel sucessfully')</script><?php
			 }else{
				?><script>alert('cancel not sucessfully')</script><?php
			 }
			 }
		}
	}
	
?>
<?php error_reporting(0);?>
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
			
			<div class="col-md-12 ">
					<h1><i class="fa fa-folder-open"></i> Hotel Booking <small>View All Booking </small></h1><hr>
					
					<ol class="breadcrumb">
						  <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
						  <li class="active"><i class="fa fa-users"></i> Booking information</li>
					</ol>
				
					<form action="" method="post">
						
					<div class="col-md-3"><select name="bulk-option" class="form-control"><option>---Status---</option><option>pending</option><option>confirm</option><option>cancel</option></select>
					</div><input type="submit" name="submit" value="Apply" class="btn btn-primary"><br><br>
				
						<?php 
							$query = "SELECT * FROM hotel_booking ORDER BY id DESC";
							$run = mysqli_query($conn,$query);
							if(mysqli_num_rows($run) > 0){
								
							
						?>
					
						
						<table class="table table-hover table-bordered table-striped" id="example" cellspacing="0" width="100%">
							<thead>	
								<tr>
									<th><input type="checkbox" id="selectallboxes"></th>
									<th>S.No</th>
									<th>Hotel Name</th>
									<th>Cst.Name</th>
									<th>Contact No</th>
									<th>Email</th>
									<th>Check In</th>
									<th>Check out</th>
									<th>Room Categorey</th>
									<th>No. of Rooms</th>
									<th>MealPlan</th>
									<th>Adult</th>
									<th>Child</th>
									<th>Message</th>
									<th>Status</th>
									
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$a=1;
									while($row = mysqli_fetch_array($run)){
										$id = $row['id'];
										$name = $row['name'];
										$contact = $row['contact'];
										$email = $row['email'];
										$chosehotel = $row['chosehotel'];
										$checki = $row['checki'];
										$checko = $row['checko'];
										$roomcategories = $row['roomcategories'];
										$norooms = $row['norooms'];
										$mealofplan = $row['mealofplan'];
										$adult = $row['adult'];
										$child = $row['child'];
										$msg = $row['msg'];
										$status = $row['status'];
									
								?>
								
								<tr>
									<td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
									<td><?php echo $a;?></td>
									
									<td><?php echo $chosehotel;?></td>
									
									<td><?php echo $name;?></td>
									<td><?php echo $contact;?></td>
									<td><?php echo $email;?></td>
									<td><?php echo $checki;?></td>
									<td><?php echo $checko;?></td>
									<td><?php echo $roomcategories;?></td>
									<td><?php echo $norooms;?></td>
									<td><?php echo $mealofplan;?></td>
									<td><?php echo $adult;?></td>
									<td><?php echo $child;?></td>
									<td><?php echo $msg;?></td>
									<td><?php echo $status; ?></td>
									
									<td><a href="booking.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
								</tr>
							
								<?php $a++; } ?>
							</tbody>
						</table>
						<?php
							}
							else{
								echo "<center><h2>no Booking Query</h2><center>";
							}
						?>
				</form>
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