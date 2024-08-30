<?php

include '../database_connection/db_connect_project3.php';

if (isset($_POST['submit_btn'])) {
	// code...

	$stud_name = $_POST['stud_name'];
	$stud_dept = $_POST['stud_dept'];
	$stud_clg = $_POST['stud_clg'];
	$stud_email = $_POST['stud_email'];
	$stud_pwd = mysqli_real_escape_string($cnect, $_POST['stud_pwd']);
	// image started
	$stud_img = $_FILES['stud_img']['name'];
	$stud_img_tmpName = $_FILES['stud_img']['tmp_name'];
	$allowed = (array('jpg', 'jpeg', 'png'));
	

	$seprator = explode('.', $stud_img);
	$extension = strtolower($seprator[1]);
	

	if (in_array($extension, $allowed)) {


	$qry = "INSERT INTO `student_information`( `stud_name`, `stud_dept`, `stud_clg`, `stud_email`, `stud_pwd`, `stud_img`) VALUES ('$stud_name','$stud_dept','$stud_clg','$stud_email','$stud_pwd','$stud_img')";

	$result = mysqli_query($cnect, $qry);

	if ($result) {
		// code...
		?> <script> alert("Registered successfully") </script> <?php
		move_uploaded_file($stud_img_tmpName, "../stud_images/".$stud_img);
	}
	else {
		?> <script> alert("something went wrong") </script> <?php
	}

	}
	else {
		?> <script> alert("image should be in format jpg , jpeg or png") </script> <?php
	}


}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- css bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container" style="margin-top: 30px;">

	<h1>Student Registration</h1>

	<form method="post" enctype="multipart/form-data">
	<!-- student name -->
	<div class="form-group row">
		<div class="col-md">
			<label>Student Name </label>
		</div>
		<div class="col-md-10">
			<input type="text" name="stud_name">
		</div>
	</div>

	<!-- student department	 -->
	<div class="form-group row">
		<div class="col-md">
			<label>Department or Branch</label>
		</div>
		<div class="col-md-10">
			<select name="stud_dept">
			<option>Information technology</option>
			<option>Computer Science and Engineering</option>
			<option>Electronics and Telecommunication</option>
			<option>Mechanical Engineering</option>
			</select>
		</div>
	</div>

	<!-- college name -->
	<div class="form-group row">
		<div class="col-md">
			<label>College Name</label>
		</div>
		<div class="col-md-10">
			<select name="stud_clg" >
				<option>Sipna College of Engineering and technology</option>
				<option>Government College of Engineering</option>
				<option>HVPM College of Engineering</option>
				<option>P. R. Pote Patil College of Engineering and Management</option>
			</select>
		</div>
	</div>

	<!-- student email -->
	<div class="form-group row">
		<div class="col-md">
			<label>Student Email </label>
		</div>
		<div class="col-md-10">
			<input type="Email" name="stud_email">
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md">
			<label>Student Password </label>
		</div>
		<div class="col-md-10">
			<input type="password" name="stud_pwd">
		</div>
	</div>

	<!-- Student image -->
	<div class="form-group row">
		<div class="col-md">
			<label>Student Photo</label>
		</div>
		<div class="col-md-10">
			<input type="file" name="stud_img">
		</div>
	</div>

	<!-- submit -->
	<div class="form-group row">
		<div class="col-md">
			<label>Register</label>
		</div>
		<div class="col-md-10">
			<input type="submit" name="submit_btn">
		</div>
	</div>

	</form>

	<div class="form-group row">
		<div class="col-md">
			<label>Do you already have an account?</label>
		</div>
		<div class="col-md-10">
			<a class="btn btn-primary" href="student_login.php">Login</a>
		</div>
	</div>


</div> <!-- container --> 





<!-- javascript bootstrap -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>