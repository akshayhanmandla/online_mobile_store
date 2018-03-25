<?php
session_start();
//echo $_SESSION['user'];
?>
<!doctype html>
<html>
<head>
<title>Online Store</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/background.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>

</style>
<script type="text/javascript">
function runclick()
{
	alert("Hello");
}	
/*
function userlogin()
{
$.ajax({
		type:"POST",
		url:"userlogin.php",
		success:function(data)
		{
			console.log(data);
		$("#content").html(data);
		}	
	});
	return false;
}


function adminlogin()
{
	$.ajax({
	type:"POST",
	url:"adminlogin.php",
	success:function(data)
	{
		$("#content").html(data);
	}	
	});
	return false;
}	


function showmobiles()
{
	$.ajax({
		type:"POST",
		url:"showmobiles.php",
		success:function(data)
		{
			$("#content").html(data);
		}	
	});
}

*/	
function filter()
{
	query="select * from mobiles where ";
	minimum=document.getElementById("minprice").value;
	string="{";
	if(minimum!="")
	{
		minimum=parseInt(minimum);
	//	string+="minimum:"+minimum+",";
		query+="price>="+minimum+" and ";
	}
	maximum=document.getElementById("maxprice").value;
	if(maximum!="")
	{
		maximum=parseInt(maximum);
	//	string+="maximum:"+maximum+",";
		query+="price<="+maximum+" and ";
	}
	brand=document.getElementById("brand").value;
	if(brand!="")
	{
	//	string+="brand:"+brand+",";
		query+="brand='"+brand+"' and ";
	}
	networktype=document.getElementById("networktype").value;
	if(networktype!="")
	{
	//	string+="networktype:"+networktype+",";
		query+="network_type='"+networktype+"' and ";
	}	
	operating_system=document.getElementById("operatingsystem").value;
	if(operating_system!="")
	{
	//	string+="operating_system:"+operating_system;
		query+="operating_system='"+operating_system+"'";
	}	
	size=query.length;
	if(query.charAt(size-1)==' ')
		query=query.substr(0,size-5);
	if(string.charAt(string.length-1)==',')
		string=string.substr(0,string.length-1);
	string=string+"}";

	//camera=document.getElementById("camera");

	$.ajax({
		type:"POST",
		data: {"query":query},
		url:"filter.php",
		success:function(data)
		{
			$("#content").html(data);
		}
	});

}	

</script>
</head>
<body>
<?php 
//header ("Content-type: application/pdf");
//header("Content-Disposition: attachment; filename='http://www.careermonk.com/img/NITK%20Placement%20Gyan%202015.pdf'");
//header("Location:http://www.careermonk.com/img/NITK%20Placement%20Gyan%202015.pdf");
?>
<div class="card">
<div class="card-block">
<h1 class="card-header"  align="center">Welcome to our Online Store<h1>
</div>
<h3 style="color:black">
<a href="home.php" >Home</a>
<?php 
echo str_repeat("&nbsp;",10);
?>
<?php 
echo str_repeat("&nbsp;",10);
?>	
<a href="userlogin.php" >User</a>
<?php
echo str_repeat("&nbsp;",60);
if(isset($_SESSION['user']))
{
?>
<p  style="display:inline;">Welcome 
<?php 
$username=$_SESSION['user'];
echo ucfirst($username);
echo str_repeat("&nbsp;",20);
?>
<input style="text-align:right;" onclick="javascript:window.location.href='signout.php';" type="button" class="btn btn-primary" value="Sign Out" /> 
<?php
}
 ?>
</h3>
</div>

<div class="row">
<div class="col-3" style="background-color:lightblue; display:inline-block;" >
<h5>Select your mobile</h5>
<div class="container">
<form >
<div class="form-group row">
<label for="minprice" class="col-sm-5 col-form-label"><h6>Minimum price</h6></label>
<div class="col-sm-7">
<select id="minprice" onchange="filter()" class="form-control ">
<option value="">select any one</option>
<option>2000</option>
<option>4000</option>
<option>5000</option>
<option>7000</option>
<option>8000</option>
<option>10000</option>
<option> 15000</option>
<option>20000</option>
<option>30000</option>
<option> 50000</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="maxprice" class="col-sm-5 col-form-label"><h6>Maximum price</h6></label>
<div class="col-sm-7">
<select id="maxprice"  onchange="filter()" class="form-control">
<option value="">Select maxprice</option>
<option>2000</option>
<option>4000</option>
<option>5000</option>
<option>7000</option>
<option>8000</option>
<option>10000</option>
<option> 15000</option>
<option>20000</option>
<option>30000</option>
<option> 50000</option>
</select>
</div>
</div>


<div class="form-group row">
<label for="brand" class="col-sm-5 col-form-label"><h6>Brand</h6></label>
<div class="col-sm-7">
<select id="brand" onchange="filter()" class="form-control">
<option value="">Select Brand</option>
<option>Nokia</option>
<option>Samsung</option>
<option>Apple</option>
<option>Micromax</option>
<option>Xaomi</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="screensize" class="col-sm-5 col-form-label"><h6>Screen size</h6></label>
<div class="col-sm-7">
<select id="screensize" onchange="filter()" class="form-control">
<option value="">Select screen size</option>
<option>Less than 3 inch</option>
<option>3 - 3.4 inch</option>
<option>3.5 - 3.9 inch</option>
<option>4 - 4.4 inch</option>
<option>4.5 - 4.9 inch</option>
<option>5 - 5.1 inch</option>
<option>5.2 - 5.4 inch</option>
<option>5.5 - 5.6 inch</option>
<option>5.7 - 5.9 inch</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="networktype" class="col-sm-5 col-form-label"><h6>Network type</h6></label>
<div class="col-sm-7">
<select id="networktype" onchange="filter()" class="form-control">
<option value="">Select network type</option>
<option>2G</option>
<option>3G</option>
<option>4G</option>
<option>4G VOLTE</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="operatingsystem" class="col-sm-5 col-form-label"><h6>Operating System</h6></label>
<div class="col-sm-7">
<select id="operatingsystem" onchange="filter()" class="form-control">
<option  value="">Select Operating system</option>
<option>Anna</option>
<option>Belle</option>
<option>Donut</option>
<option>Eclair</option>
<option>Froyo</option>
<option>Gingerbread</option>
<option>Ice Cream Sandwich</option>
<option>Jelly Bean</option>
<option>KitKat</option>
<option>Lollipop</option>
<option>Marshmallow</option>
<option>Nougat</option>
<option>Oreo</option>
<option>Series 30</option>
<option>Series 40</option>
<option>Series 60</option>
</select>
</div>
</div>

<div class="form-group row">
<label for="camera" class="col-sm-5 col-form-label"><h6>Camera</h6></label>
<div class="col-sm-7">
<select id="camera"  onchange="filter()" class="form-control">
<option value="">Select camera megapixels</option>
<option>Below 2 MP</option>
<option>2 - 2.9 MP</option>
<option>3 - 4.9 MP</option>
<option>5 - 7.9 MP</option>
<option>8 - 11.9 MP</option>
<option>12 - 12.9 MP</option>
<option>13 - 15.9 MP</option>
<option>16 - 20.9 MP</option>
<option>21 MP & Above</option>
</select>
</div>
</div>


</form>
</div>
</div>
<div id="content" height="100%" class="col" >
<?php 
include('showmobiles.php');
?>				
</div>
</div>
</body>
</html>