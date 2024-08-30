<?php

include '../database_connection/db_connect_project3.php';

if (isset($_POST['submit_btn'])) {
	// code...
	$username = $_POST['username'];
	$old_pwd = mysqli_real_escape_string($cnect, $_POST['old_pwd']);
	$new_pwd = md5(mysqli_real_escape_string($cnect, $_POST['new_pwd'])); //md5 will automatically convert new password into encrypted password
	
	$qry = "select * from project_3table where username = '$username'";
	$result = mysqli_query($cnect, $qry);
	$output = mysqli_fetch_assoc($result);

	if ($username == $output['username']) {
		// code...
		if (md5($old_pwd) == $output['password']) {
			// code...
			$qry_2 = "update project_3table set password = '$new_pwd' where username = '$username'";
			$result_2 = mysqli_query($cnect, $qry_2);
			if ($result_2) {
				// code...
				?> <script> alert("password change sucessfully") </script> <?php
			}
	 
	        } //password

		else{
			?> <script> alert("please recheck your password") </script> <?php
		} 
		} //username
	else{
		?> <script> alert("please recheck your username") </script> <?php
	}

} //submit btn
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

<div class="container" style="margin-top: 100px; margin-right: 50px;">
    <form method="post" >
      <h1>Change Password</h1>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Current Password</label>
        <div class="col-sm-4">
        <input type="password" class="form-control" placeholder="Current Password" name="old_pwd">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">New Password</label>
        <div class="col-sm-4">
        <input type="password" class="form-control" placeholder="New Password" name="new_pwd">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Submit</label>
        <div class="col-sm-4">
        <input type="submit"  placeholder="Submit" name="submit_btn">
        </div>
      </div>

    </form>
  </div> <!--container -->




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>