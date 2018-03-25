<?php
session_start();
if(!isset($_SESSION['admin']))
{
	header("Location:adminlogin.php");
}	
?>
<!doctype html>
<html>
<head>
<title>Add mobile</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
<link rel="stylesheet" href="../css/background.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php
include('../config.php');
if(isset($_POST['submit']))
{
	if($_FILES['image']['error'])
		echo "<script>alert('Image upload error');</script>";
	$name=$_FILES['image']['name'];
	$type=$_FILES['image']['type'];
	$size=$_FILES['image']['size'];
	$tmp_name=$_FILES['image']['tmp_name'];
	$destination="C:\\xampp\\htdocs\\onlinestore\\images\\";
	$destination=$destination.basename($name);
	if(move_uploaded_file($tmp_name , $destination))
		echo "<script>alert('File uploaded successfully');</script>";
	else
		echo "<script>alert('File not uploaded successfully');</script>";
	$brand=$_POST['brand'];
	$model=$_POST['model'];
	$networktype=$_POST['networktype'];
	$screensize=$_POST['screensize'];
	$operatingsystem=$_POST['operatingsystem'];
	$quantity=$_POST['quantity'];
	$camera=$_POST['megapixel'];
	$price=$_POST['price'];
	$query="insert into mobiles values('','$brand','$model','$networktype','$screensize','$operatingsystem','$price','$quantity',
	'$camera','$name')";
	if(mysqli_query($conn,$query))
		echo "<script>alert('Record inserted successfully');</script>";
	else
		echo "<script>alert('Record not inserted successfully');</script>";
}	
?>

</head>
<body>
<h2>
<?php 
echo str_repeat("&nbsp;",65);
?>
Add mobile <?php echo str_repeat("&nbsp;",35); ?> Welcome Admin</h2>
<p style="text-align:right"><input type="button" value="signout" class="btn btn-primary">
<hr>
 <div class="container">
 <br><br>
 <form method="post" enctype="multipart/form-data">
 <div class="form-group row">
 <label class="col-sm-2 col-form-label boldwords">Brand</label>
 <div class="col-sm-5">
 <select name="brand" class="form-control">
<option>Nokia</option>
<option>Samsung</option>
<option>Apple</option>
<option>Micromax</option>
<option>Xaomi</option>
 </select>
 </div>
 </div>
 
  <div class="form-group row">
 <label class="col-sm-2 col-form-label boldwords">Model</label>
 <div class="col-sm-5">
 <input type="text" name="model" class="form-control">
 </div>
 </div>
 
 <div class="form-group row">
 <label class="col-sm-2 col-form-label boldwords">Network type</label>
 <div class="col-sm-5">
<select name="networktype" class="form-control">
<option>2G</option>
<option>3G</option>
<option>4G</option>
<option>4G VOLTE</option>
</select>
 </div>
 </div>
 
 <div class="form-group row">
 <label class="col-sm-2 col-form-label boldwords">Screen size</label>
 <div class="col-sm-5">
 <select name="screensize" class="form-control">
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
 <label class="col-sm-2 col-form-label boldwords">operating system</label>
 <div class="col-sm-5">
 <select name="operatingsystem" class="form-control">
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
 <label class="col-sm-2 col-form-label boldwords">Price</label>
 <div class="col-sm-5">
 <input type="text" name="price" class="form-control">
 </div>
 </div>
 
 <div class="form-group row">
 <label class="col-sm-2 col-form-label boldwords">Quantity</label>
 <div class="col-sm-5">
 <input type="text" name="quantity" class="form-control">
 </div>
 </div>
 
 <div class="form-group row">
 <label class="col-sm-2 col-form-label boldwords">Camera MP</label>
 <div class="col-sm-5">
 <input type="text" name="megapixel" class="form-control">
 </div>
 </div>
 
 <div class="form-group row">
 <label class="col-sm-2 col-form-label boldwords">Upload image</label>
 <div class="col-sm-5">
 <input type="file" name="image"  class="form-control"/>
 </div>
 </div>
 
 <div class="form-group row">
 <div class="offset-sm-3">
 <input type="submit" name="submit" class="btn btn-primary btn-lg">
 </div>
 </div>
 
 </form>
 </div>
</body>
</html>