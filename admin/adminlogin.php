<?php 
session_start();
if(isset($_SESSION['admin']))
{
	header("Location:admin.php");
}	
?>
<!doctype html>
<html>
<head>
<title>Admin login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet"  href="../css/background.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1"> 
<?php 
include('../config.php');
if(isset($_POST['adminlogin']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from admin";
	$results=mysqli_query($conn,$query);
	$flag=0;
	if(mysqli_num_rows($results)!=0)
	{	
		while($row=mysqli_fetch_array($results))
		{
			if($row['username']==$username && $row['password']==$password)
			{
				$_SESSION['admin']=1;
				header("Location:admin.php");
			}	
			else
			{
				echo "<script>alert('Username and password does not match');</script>";
			}	
		}
	}
	else
		echo "<script>alert('Wrong username and password');</script>";
	if($flag==1)
		header("Location:admin.php");
	else
		echo '<script>alert("Wrong username and password");</script>';
}
?>
</head>
<body>
<div class="card">
<div class="card-block">
<div class="card-header" align="center"><h1>Login to your account- Admin Login</h1></div>
</div>
</div>
<br><br><br><br><br><br>
<div class="container">
<form method="post">

<div class="form-group row">
<label for="username" class="col-sm-2 offset-sm-3 col-form-label">Username</label>
<div class="col-sm-4">
<input name="username" placeholder="Enter username" id="username" type="text" class="form-control">
</div>
</div>

<div class="form-group row">
<label for="password" class="col-sm-2 offset-sm-3 col-form-label">Password</label>
<div class="col-sm-4">
<input type="password" name="password" placeholder="Enter password" id="password" class="form-control">
</div>
</div>


<div class="form-group row">
<div class="offset-sm-6 col-sm-2">
<input name="adminlogin" value="login" type="submit" class="btn btn-lg btn-primary">
</div>
</div>

</form>
</div >
</div>
</body>
</html>