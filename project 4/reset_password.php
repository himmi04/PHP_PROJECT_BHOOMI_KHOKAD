<?php

if (isset($_POST['reset_btn'])) {

// database connection
include '../database_connection/db_connect_project3.php';

// getting data entered by user
$username = $_POST['username'];
$mobile_number = $_POST['mobile_number'];

// getting data from database
$qry = "select * from project_4tb where username = '$username' && mobile_number = '$mobile_number'";
$result = mysqli_query($cnect, $qry); 
$rows = mysqli_num_rows($result);

// password reset function
function randomPassword($length = 10) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890><?!@#$%&*';
    $pass = array(); // Declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; // Cache the length -1 for performance
    for ($i = 0; $i < $length; $i++) {
        $n = random_int(0, $alphaLength); // Use random_int for better security
        $pass[] = $alphabet[$n];
    }
    return implode($pass); // Turn the array into a string
} //randomPassword

if($rows>0)
{
	$password = mysqli_real_escape_string($cnect, randomPassword());
	$qry_2 = "UPDATE `project_4tb` SET `password`='$password' WHERE `username` = '$username'";
	$result_2 = mysqli_query($cnect, $qry_2);
	if ($result_2) {
		?> <script> alert("password reseted successfully") </script> <?php
	}
	
}
else {
	?> <script> alert("invalid username or password") </script> <?php
}

} //reset_btn

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<div class="container">
	
	<div style="margin-top: 100px;">
	<form method="post">

		
		<h3 style="margin-bottom: 20px;">Reset Password Form</h3>

		<div class="form-group row">
			<div class="col-md-2">
				<label>Username</label>
			</div>
			<div class="col-md-8">
				<input type="text" name="username">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-2">
				<label>Mobile Number</label>
			</div>
			<div class="col-md-8">
				<input type="number" name="mobile_number">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-2">
				<label>Reset</label>
			</div>
			<div class="col-md-8">
				<button name="reset_btn">Reset</button>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-2">
				<label>New reset password</label>
			</div>
			<div class="col-md-8" style="font-weight: bold;">
				<?php echo $password; ?>
			</div>
		</div>

	</form>
	</div>
	
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>