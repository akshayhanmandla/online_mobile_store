<!doctype html>
<html>
<head><title>User Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<div class="card">
<div class="card-block">
<div class="card-header"><h1 style="text-align:center">User Registration Form</h1></div>
</div>
</div>
</div>
<br><br><br><br>
<?php 
error_reporting(E_ALL);
include('config.php');	
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query="insert into users values('','$name','$email','$password','$mobile')";
	if(mysqli_query($conn,$query))
	{
		echo "<script>alert('Registration successful');</script>";
		echo "<script>window.location='home.php';</script>";
	}	
	else
		echo "<script>alert('Registration failed due to some error');</script>";
}	
?>

<div class="offset-sm-3">
<form method="post">
<div class="form-group row">
<label for="name" class="col-sm-2 col-form-label"><h4>Name</h4></label>
<input type="text" id="name" name="name" class="col-sm-4 form-control" placeholder="enter your name">
</div>

<div class="form-group row">
<label for="mobile" class="col-sm-2 col-form-label"><h4>Mobile no</h4></label>
<input type="text" id="mobile" name="mobile" class="col-sm-4 form-control" placeholder="enter your mobile no">
</div>

<div class="form-group row">
<label for ="email" class="col-sm-2 col-form-label"><h4>Email id</h4></label>
<input type="email" id="email" name="email" class="col-sm-4 form-control" placeholder="enter your email id">
</div>

<div class="form-group row">
<label for="password" class="col-sm-2 col-form-label"><h4>Password</h4></label>
<input type="password" name="password" id="password" class="col-sm-4 form-control" placeholder="enter your password">
</div>

<div class="form-group row">
<input value="Register" name="submit" type="submit" class="offset-sm-3 col-sm-2 form-control">
</div>

</form>
</div>
</body>
</html>