akshay hanmandla

<!doctype html>
<html>
<head>
<title>Book mobile</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link rel="stylesheet" href="css/background.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style type="text/css">
table{ font-size : 30px;}
</style>
</head>
<body>
<h1>
<?php
include('config.php');
if(isset($_REQUEST['id']))
{
	$id=$_REQUEST['id'];
	$query="select * from mobiles where id='$id'";
	$results=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($results);
	?>

	<div style="display:table;margin:0 auto;">
	<img src="images/mobile1.jpg" width="250px" height="250px">
	 <table border=1 style="border-style=groove;">
	 <tr><td>Brand </td><td><?php echo $row['brand']; ?></td></tr>
	<tr><td>Model </td><td> <?php echo $row['model']; ?></td></tr>
	<tr><td>Network type </td><td> <?php echo $row['network_type']; ?></td></tr>
	<tr><td>Screen size </td><td> <?php echo $row['screen_size']; ?></td></tr>
	<tr><td>Operating System </td><td> <?php echo $row['operating_system']; ?></td></tr>
	<tr><td>Price </td><td> <?php echo $row['price']; ?></td></tr>
	<tr><td>Quantity </td><td><?php echo $row['quantity']; ?></td></tr>
	</table>
	<div style="text-align:center">
	<input type="submit" value="BUY" name="buy" class="btn btn-lg btn-primary"/>
	</div>
	</div>
<?php	
}	
?>
</body>
</html>