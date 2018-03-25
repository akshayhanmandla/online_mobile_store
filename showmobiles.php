<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php
include("config.php");
$query="select * from mobiles";
$results=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($results))
{
	?>
	<div name="image" style="text-align:center;border-style:groove;display:inline-block;">
	<img src="images/mobile1.jpg" alt="mobile image" class="img-thumbnail" width="200px" height="200px" />
	<h4 style="text-align:center;"><?php echo $row['brand']." ".$row['model']; ?></h4>
	<h4 style="text-align:center;">Price:<?php echo $row['price']; ?></h3>
	<h4 style="text-align:center;">Quantity:<?php echo $row['quantity'];?></h3>
	<div style="text-align:center">
	<form method="post">
	<input type="button" onclick="window.location.href='bookmobile.php?id=<?php echo $row['id'];?>'" value="Book now" class="btn btn-lg btn-primary">
	</form>
	</div>
	</div>
<?php
}	
?>
<!--
<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">Micromax A150</h3>
<h4 style="text-align:center;">Price:5000</h4>
<h4 style="text-align:center;">Quantity:6</h4>
<div style="text-align:center;">
<input type="button" onclick="runclick()" value="Book now"  class="btn btn-md">
</div>
</div>

<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">Samsung 567</h3>
<h4 style="text-align:center;">Price:10000</h4>
<h4 style="text-align:center;">Quantity:7</h4>
<div style="text-align:center;">
<input type="button" onclick="runclick()" value="Book now"  class="btn btn-md">
</div>
</div>

<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">MI Redmi</h3>
<h4 style="text-align:center;">Price:5000</h4>
<h4 style="text-align:center;">Quantity:1</h4>
<div style="text-align:center;">
<input onclick="runclick()" value="Book now" type="button" class="btn btn-md">
</div>
</div>

<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">IPhone 6s</h3>
<h4 style="text-align:center;">Price:3000</h4>
<h4 style="text-align:center;">Quantity:10</h4>
<div style="text-align:center;">
<input onclick="runclick()" value="Book now" type="button" class="btn btn-md">
</div>
</div>

<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">IPhone 6s</h3>
<h4 style="text-align:center;">Price:3000</h4>
<h4 style="text-align:center;">Quantity:10</h4>
<div style="text-align:center;">
<input onclick="runclick()" value="Book now" type="button" class="btn btn-md">
</div>
</div>

<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">IPhone 6s</h3>
<h4 style="text-align:center;">Price:3000</h4>
<h4 style="text-align:center;">Quantity:10</h4>
<div style="text-align:center;">
<input onclick="runclick()" value="Book now" type="button" class="btn btn-md">
</div>
</div>

<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">IPhone 6s</h3>
<h4 style="text-align:center;">Price:3000</h4>
<h4 style="text-align:center;">Quantity:10</h4>
<div style="text-align:center;">
<input onclick="runclick()" value="Book now" type="button" class="btn btn-md">
</div>
</div>

<div name="image" style="border-style:groove;display:inline-block;">
<img src="images/mobile.jpg" alt="mobile" class="img-thumbnail" width="200px" height="200px"/>
<h3 style="text-align:center;">IPhone 6s</h3>
<h4 style="text-align:center;">Price:3000</h4>
<h4 style="text-align:center;">Quantity:10</h4>
<div style="text-align:center;">
<input onclick="runclick()" value="Book now" type="button" class="btn btn-md">
</div>
</div>
-->

