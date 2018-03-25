<?php
/*if(isset($_POST['category']))
	$category=$_POST['category'];
*/
include("config.php");
//if($category==="minprice")
/*{
	$min_price=$_POST['minimum'];
	$max_price=$_POST['maximum'];
	$brand=$_POST['brand'];
	$networktype=$_POST['networktype'];
	$operating_system=$_POST['operating_system'];
	$camera=$_POST['camera'];
	if($min_price=="" && max_price=="")
		$query="select * from mobiles";
	if($min_price!="")
		$query
	
	$query="select * from mobiles where price between '$min_price' and '$max_price' and brand='$brand' and
		networktype='$networktype' and operating_system='$operatingsystem' and camera>='$camera'";
	*/
	$query=$_POST['query'];
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)!=0)
	{	
		while($row=mysqli_fetch_array($result))
		{
	?>
			<div name="image" style="text-align:center;border-style:groove;display:inline-block;">
			<img src="images/mobile1.jpg" alt="mobile image" class="img-thumbnail" width="200px" height="200px" />
			<h4 style="text-align:center;"><?php echo $row['brand']." ".$row['model']; ?></h4>
			<h4 style="text-align:center;">Price:<?php echo $row['price']; ?></h3>
			<h4 style="text-align:center;">Quantity:<?php echo $row['quantity'];?></h3>
			<div style="text-align:center">
			<form method="post">
			<input type="button" onclick="window.location.href='bookmobile.php?id=<?php echo $row['id'];?>'" value="Book now" class="btn btn-md">
			</form>
			</div>
			</div>
<?php	
		}	
	}
	else
	{
		echo "<div style='text-align:center;margin:200px auto;'><h3>Sorry no results for your search !</h3></div>";
	}	

?>
