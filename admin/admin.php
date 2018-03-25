<?php
session_start();
if(isset($_SESSION['admin']))
{
?>
<!doctype html>
<html>
<head>
<title>Admin</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="../css/background.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<script type="text/javascript">
/*
function products()
{
	$.ajax({
		type:"POST",
		url:"products.php",
		success:function(data)
		{
			$("#content").html(data);
		}	
	});
}

function addproduct()
{
	var number1=1;
	var number2=2;
	$.ajax({
		type:"POST",
		url:"addmobile.php",
		data:{ajax:number1,addproduct:number2},
		success:function(data)
		{
			$("#content").html(data);
		}	
	});
}

function userslist()
{
	$.ajax({
		type:"POST",
		url:"userlist.php",
		success:function(data)
		{
			$("#content").html(data);
		}
	});
}

function bookings()
{
	$.ajax({
		type:"POST",
		url:"bookings.php",
		success:function(data)
		{
			$("#content").html(data);
		}	
	});
}	
*/
function signout()
{
	window.location.href="admin_sign_out.php";
}	
</script>
</head>
<body>
<h1 style="text-align:center">Admin Console</h1>
<hr style="border-width:2px;border-color:black;">
<nav class="nav">
<a style="color:black;" href="products.php"  class="nav-link">Products</a>
<a style="color:black;" href="addmobile.php"   class="nav-link">Add product</a>
<a style="color:black;" href="userlist.php"  class="nav-link">See users</a>
<a style="color:black;" href="bookings.php" class="nav-link">Bookings</a>
<?php
echo str_repeat("&nbsp;",130);
?>
<h4>Welcome Admin</h4>
<?php 
echo str_repeat("&nbsp;",20);
?>
<input type="button" value="Sign out" onclick="signout();" class="btn btn-primary btn-lg" />
</nav>
<hr style="border-width:2px;border-color:black;">
<div id="content" style="text-align:center">
</div>
</body>
</html>
<?php
}
else
{
	header("Location:adminlogin.php");
}	
?>