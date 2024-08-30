<?php

include '../database_connection/db_connect_project3.php';

session_start();

// if student is not login then go back to student_login
if (!isset($_SESSION['sid'])) {
	// code...
	header("location:student_login.php");
}

$stud_id = $_SESSION['sid'];

// fetching student information from database
$qry_1 = "select * from student_information where stud_id = '$stud_id'";
$result = mysqli_query($cnect, $qry_1);
$output = mysqli_fetch_assoc($result);

// fetching admin notices from database
$qry_2 = "select * from admin_notices order by uploaded_at desc limit 5";
$result_2 = mysqli_query($cnect, $qry_2);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Portal</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		#space{
			margin: 0px 20px;
			font-size: 15px;
		}
		.table{
			color: #F1F1F2;
		}
	</style>

		

</head>
<body style="background-color:#A1D6E2">
	<div class="container-fluid">

		<div class="form-group row" >

			<div class="col-md-9">

				<h2 style="color: #F1F1F2;">Profile</h2>

			</div>

		<!-- welcome user -->
		<div class="col-md-2">
			<h3   style="font-size: 25px;margin-top:10px;color: #F1F1F2;">Welcome <?php echo $output['stud_name']; ?></h3>
		</div>

		<!-- logout button -->
		<div class="col-md-1">
			<a style="margin-top: 10px;" class="btn btn-danger" href="logout.php">Logout</a>
		</div>

		</div> <!-- form-group row -->

	</div> <!-- container-fluid -->

	<div class="containe-fluid">

		<div class="form-group row">

		<div class="col-md-6">
		<table style="background-color: #1995AD;" class="table table-bordered" style="border:2px solid black;">
			<tr>
				<th>Student Photo</th>
				<td>
					<img width="100px" src="<?php echo "../stud_images/".$output['stud_img']; ?>">
				</td>
			</tr>
			<tr>
				<th>Student Name</th>
				<td><?php echo $output['stud_name']; ?></td>
			</tr>
			<tr>
				<th>Student Department</th>
				<td><?php echo $output['stud_dept']; ?></td>
			</tr>
			<tr>
				<th>Student College</th>
				<td><?php echo $output['stud_clg']; ?></td>
			</tr>
			<tr>
				<th>Student Email</th>
				<td><?php echo $output['stud_email']; ?></td>
			</tr>
		</table>
		</div> <!-- col-md-6 -->

		<div class="col-md-3"></div>

		<div class="col-md-3" >
			<h1 style="color: #F1F1F2;">Notices</h1>

			<?php
			$count = 1;
			while ($output_2 = mysqli_fetch_assoc($result_2)) {
			 	// code... 
			?>
			<div class="card" style="background-color: #1995AD;width: 20rem;">
  			<div class="card-body" style="color: #F1F1F2;">
    			<h5 class="card-title"> <?php echo $count++.".".$output_2['notice_heading']; ?> </h5>
    			<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  			</div>
			</div>	
			<?php
			}
			?>		

		</div> <!-- col-md-3 -->


		</div> <!-- form-group row -->

	</div> <!-- container -->


	



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>