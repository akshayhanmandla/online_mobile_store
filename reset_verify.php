<!doctype html>
<html>
<head>
<?php
include('config.php');
require('phpmailer/PHPMailerAutoload.php');

if(isset($_POST['submit']))
{
$email=$_GET['email'];
echo "<h1>Password changed successfully</h1>";
$password=$_POST['password'];
$query="update users set password='$password' where email_id='$email'";
$result=mysqli_query($conn,$query);
if($result)
{
	echo "<script>alert('Password changed successfully');</script>";
}	
else
{
	echo "<script>alert('Sorry some problem occurred ! Please try again');</script>";
}
}


if(isset($_GET['id']) && isset($_GET['key']))
{
$email=$_GET['id'];
$query="select * from users where email_id='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$md_pass=$_GET['key'];
$password=$row['password'];
if($md_pass===md5($password))
{
	?>
<h1 style="text-align:center">New Password</h1>
<br><br><br><br>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="css/background.css" />
<form method="post" action="reset_verify.php?email=<?php echo $email ?>">
<div class="form-group row">
<label for="password"  class="col-sm-2 offset-sm-3 col-form-label">Enter new password</label>
<div class="col-sm-4">
<!--<input type="hidden" value="" name="email" /> -->
<input id="password" placeholder="Enter password"  name="password" type="text" class="form-control">
</div>
</div>

<div class="form-group row">
<div class="offset-sm-6 col-sm-2">
<input value="submit" name="submit" type="submit" class="btn btn-primary btn-lg">
</div>
</div>
</form>
<?php
}
else
{
	echo '<script>alert("Invalid url");</script>';
	echo '<h1>Server refused to connect</h1>';
}
}
?>
</head>
<body>
</body>
</html>