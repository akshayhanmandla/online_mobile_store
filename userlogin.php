<?php
session_start();
if(isset($_SESSION['user']))
	header("Location:home.php");
?>
<!doctype html>
<html>
<head>
<title>User login</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/background.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<script type="text/javascript">
</script>
</head>
 <?php
 include("config.php");
 if(isset($_POST['submit']))
 {
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	//echo $email;echo $password;
	$query="select * from users where email_id='$email'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)!=0)
	{
		$row=mysqli_fetch_array($result);
		if($row['password']===$password)
		{
			$_SESSION['user']=$row['name'];
			echo "<script>window.location.href='home.php'</script>";
		}	
		else
		{
			echo "<script>alert('Wrong Username or Password');</script>";
		}	
	}	
	else
	{
		echo "<script>alert('This email id is not registered with us');</script>";
	}	
 }

 
 ?>
<body>
<div class="card">
<div class="card-block">
<div class="card-header" align="center"><h1>Login to your account- User Login</h1></div>
</div>
</div>
<br><br><br><br><br><br>
<div class="container">
<form method="post">
<div class="form-group row">
<label for="username"  class="col-sm-2 offset-sm-3 col-form-label">Username</label>
<div class="col-sm-4">
<input id="username" placeholder="Enter username"  name="email" type="email" class="form-control">
</div>
</div>

<div class="form-group row">
<label for="password" class="col-sm-2 offset-sm-3 col-form-label">Password</label>
<div class="col-sm-4">
<input type="password" name="password" placeholder="Enter password" id="password" class="form-control">
</div>
</div>
<br>

<div class="form-group row">
<div class="offset-sm-6 col-sm-2">
<input value="login" name="submit" type="submit" class="btn btn-primary btn-lg">
</div>
</div>


<div class="form-group row">
<div class="offset-sm-6 col-sm-4">
If not registered, click here to<a href="userregister.php"> register</a>
</div>
</div>
</form>
</div >
</div>
</body>
</html>