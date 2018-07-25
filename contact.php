
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
       $del_check_query = "SELECT * FROM contact WHERE id = $del_id";
        $del_check_run = mysqli_query($conn, $del_check_query);
        if(mysqli_num_rows($del_check_run) > 0){
             $del_query = "DELETE FROM `contact` WHERE `contact`.`id` = $del_id";
       if(mysqli_query( $conn, $del_query)){
          ?><script>alert('query has been deleted')</script><?php
       } else {
           ?><script>alert('query has not been deleted')</script><?php
       }
        }
        else{
            header('location:index.php');
        }
    }
	
	if(isset($_POST['checkboxes'])){
		foreach($_POST['checkboxes'] as $row_id){
		 $bulk_option = $_POST['bulk-option']; 
		 if($bulk_option == 'pending' ){
			
				 
			
			 $status = "UPDATE `contact` SET `status` = '$bulk_option' WHERE `contact`.`id` = $row_id;";
			 if(mysqli_query($conn,$status)){
				?><script>alert('peding sucessfully')</script><?php
			 }else{
				?><script>alert('peding not sucessfully')</script><?php
			 }
		 }
		 else if($bulk_option == 'confirm'){
			 $status = "UPDATE `contact` SET `status` = '$bulk_option' WHERE `contact`.`id` = $row_id;";
			 if(mysqli_query($conn,$status)){
				?><script>alert('confirm sucessfully')</script><?php
			 }else{
				?><script>alert('confirm not sucessfully')</script><?php
			 }
		 }
		 else if($bulk_option == 'cancel'){
			 $status = "UPDATE `contact` SET `status` = '$bulk_option' WHERE `contact`.`id` = $row_id;";
			 if(mysqli_query($conn,$status)){
				 ?><script>alert('cancel sucessfully')</script><?php
			 }else{
				?><script>alert('cancel not sucessfully')</script><?php
			 }
		 }
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
					<h1><i class="fa fa-folder-open"></i>  Buy Packages <small>Buy Packages</small></h1><hr>
					
					<ol class="breadcrumb">
						  <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
						  <li class="active"><i class="fa fa-users"></i> Buy Packages</li>
					</ol>
						<div class="row">
					<form method="post">
						<div class="col-md-3">
					                <select name="bulk-option" class="form-control">
										<option>---Select Action---</option>
										<option value="pending">pending</option>
										<option value="confirm">confirm</option>
										<option value="cancel">cancel</option>
									</select>
								
						</div>
						<div class="col-md-3">
							<input type="submit" value="apply" name="submit" class="btn btn-primary">
						</div>
						</div>
						<br>
						
					<?php 
                        if(isset($_GET['reply'])){
                            $reply_id = $_GET['reply'];
                            $reply_check = "SELECT * FROM contact WHERE id=$reply_id";
                            $reply_check_run =  mysqli_query($conn, $reply_check);
                            if( mysqli_num_rows($reply_check_run) > 0){
                                $reply_row = mysqli_fetch_array($reply_check_run );
                                $reply_name = $reply_row['name'];
                                $reply_email = $reply_row['email'];
                                
                    ?>
					
					<div class="row">
					    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					        <form action="" method="post">
                                <div class="form-group">
					                <label for="comment">Name:*</label>
					                <input type="text" name="name1" value="<?php echo $reply_name;?>" class="form-control">
					            </div>
					            <div class="form-group">
					                <label for="comment">Email:*</label>
					                <input type="text" name="email1" value="<?php echo $reply_email;?>" class="form-control">
					            </div>
								
					            <div class="form-group">
					                <label for="comment"> Query Solve Comment:*</label>
	<textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Comment Area" class="form-control"></textarea>
					            </div>
					          
					            <input type="submit" name="reply" value="Reply" class="btn btn-primary">
					        </form>
					    </div>
					    <h3> <?php include('secure_email_code.php');?></h3>
					</div>
					<br>
					<?php 
                                                            }
                        }
							$query = "SELECT * FROM contact ORDER BY id DESC";
							$run = mysqli_query($conn,$query);
							if(mysqli_num_rows($run) > 0){
								
							
						?>
					
				      
					
				
						<table class="table table-hover table-bordered table-striped" id="example"  cellspacing="0" width="100%">
							<thead>	
								<tr>
									<th><input type="checkbox" id="selectallboxes"></th>
									<th>S.No</th>
									<th>Package Name</th>
									<th>Name</th>
									<th>contact</th>
									<th>Messages</th>
									<th>Date</th>
									<th>Action</th>
									<th>Reply</th>
									<th>Delete</th>
								</tr>
							</thead>
							
							<tbody>
								<?php 
                                $a=1;
                                while($row = mysqli_fetch_array($run))
                                {
                                    
                                    $row_id = $row['id'];
                                    $row_email = $row['email'];
                                    $row_name = $row['name'];
                                    $row_contact = $row['phone'];
                                    $row_msg = $row['msg'];
                                    $date = $row['date'];
                                    $pen_status = $row['status'];
                                ?>
								
								<tr>
									<td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $row_id;?>"></td>
									<td><?php echo $a; ?></td>
									
									<td><?php echo $row_name; ?></td>
									
									<td><?php echo $row_email; ?></td>
									<td><?php echo $row_contact; ?></td>
									<td><?php echo $row_msg; ?></td>
									<td><?php echo $date;?></td>
									<td><?php echo $pen_status; ?></td>
								
									<td><a href="contact.php?reply=<?php echo  $row_id;?>"><i class="fa fa-reply"></i></a></td>
									<td><a href="contact.php?del=<?php echo $row_id;?>"><i class="fa fa-times"></i></a></td>
								</tr>
							<?php $a++; } ?>
								
							</tbody>
						</table>
					
				
						
							
						<?php 
							}
							else{
								echo "<center><h2>No Data found</h2><center>";
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
  </body>
</html>