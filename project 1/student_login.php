<?php

session_start();

include '../database_connection/db_connect_project3.php';

if (isset($_SESSION['sid'])) {
  // code...
  header("location:student_portal.php");
}

else if (isset($_POST['submit_btn'])) {
  // code...

$email = $_POST['email'];
$password = mysqli_real_escape_string($cnect, $_POST['password']);

$qry = "select * from student_information where stud_email = '$email' && stud_pwd = '$password'";
$result = mysqli_query($cnect, $qry);

$output = mysqli_fetch_assoc($result);



$rows = mysqli_num_rows($result);

if ($rows>0) {
  // code...
  $stud_id = $output['stud_id'];
  $_SESSION['sid'] = $stud_id;
  header("location:student_portal.php");
}
else {
  ?> <script> alert("invalid email or password") </script> <?php
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
<body style="background-color:#E2F0CB;">

  <div class="container" style="margin-top: 100px; margin-right: 50px;">
    <form method="post" >
      <h1>Student Login</h1>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-4">
        <input type="text" class="form-control" placeholder="Email" name="email">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-4">
        <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Login</label>
        <div class="col-sm-4">
        <button name="submit_btn">Login</button>
        </div>
      </div>

    </form>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Don't have an account?</label>
        <div class="col-sm-4">
        <a class="btn btn-primary" href="student_registration.php">Register</a>
        </div>
      </div>

  </div> <!--container -->
 


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
