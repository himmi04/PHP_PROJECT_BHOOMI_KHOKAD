<?php

include '../database_connection/db_connect_project3.php';

if (isset($_POST['submit_btn'])) {
	// code...
$notice = mysqli_real_escape_string($cnect, $_POST['notice']);
$notice_heading = mysqli_real_escape_string($cnect, $_POST['notice_heading']);

$qry_1 = "insert into admin_notices(notice, notice_heading) values('$notice', '$notice_heading')";
$result  = mysqli_query($cnect, $qry_1);

if($result)
{
	?> <script> alert("registered sucessfully") </script> <?php
}
else{
	echo "not submitted".mysqli_error();
}


} //submit btn

$qry_2 = "select * from admin_notices order by uploaded_at desc";
$result_2 = mysqli_query($cnect, $qry_2);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin</title>
	<!-- bootsrap css -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- google fonts of notice box -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
</head>
<body>
	<div class="form-group row">
		<div class="col-md-10">
	    	<h1>Welcome Admin</h1>
	    </div>
	    <div class="col-md" data-toggle="collapse" href="#history" >
	    	<button type="button" class="btn btn-dark"> Previous Notices </button>
	    </div>
	</div>

	<form method="post">
	<div class="container-fluid">

		<!-- notice starts from here -->
		<div class="form-group row">
		<div class="col-md-6">
		<h4 >Notice Box</h4>
		<div class="form-group row">
			<div class="col-md">
				<label>Heading of notice</label>
			</div>
			<div class="col-md-10">
				<textarea rows="2" cols="30" name="notice_heading"></textarea>
			</div>
		</div>
		    <!-- notice starts here -->
		<div style="margin-top: 20px;" class="form-group row">
			<!-- notice -->
		<div class="col-md">
			<label>Notice</label>
		</div>
		<!-- notice box -->
		<div class="col-md-10">
			<textarea rows="10" cols="30" name="notice"></textarea>
		</div>
		</div>
		   <!-- notice end here -->

	

		   <!-- submit btn starts here -->
		   <div class="form-group row">
		   	<!-- submit -->
		   	<div class="col-md">
		   		<label>Submit</label>
		   	</div>
		   	<!-- submit box -->
		   	<div class="col-md-10">
		   		<input type="submit" name="submit_btn">
		   	</div>
		   </div>
		   <!-- submit btn ends here -->

		</div>

		   
		   <!-- previous notices starts here -->
		   <div class="col-md-6 collapse" id="history">
			<table class="table table-bordered">
				<tr>
					<th>Sr No</th>
					<th>Notice Heading</th>
					<th>Notice</th>
					<th>Upload_at</th>
				</tr>
				<?php

				$count = 1;
				while ($output = mysqli_fetch_assoc($result_2)) {

				?>
				<tr>
					<td><?php echo $count++; ?></td>
					<td><?php echo $output['notice_heading']; ?></td>
					<td><?php echo $output['notice']; ?></td>
					<td><?php echo $output['uploaded_at']; ?></td>
				</tr>
				<?php
				} 
				?>
			</table>

			</div>
			<!-- history ends here -->

		</div> <!-- form-group row -->

	</div> <!-- container-fluid --> 
	</form>

	


	


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>