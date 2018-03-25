<!doctype html>
<html>
<head>
<style>
table
{
	margin:auto;
}	
td
{
	font-size:20px;
}	
</style>
<link rel="stylesheet" href="css/background.css" />
</head>
<body>
<h1 style="text-align:center">Users</h1>
<?php
include("config.php");
$query="select * from users";
$results=mysqli_query($conn,$query);
echo "<table cellspacing=0 style=border-style:solid border=1px>";
echo "<tr>
			<th><b>sr no</b></th>
			<th><b>name</b></th>
			<th><b>email id</b></th>
			<th><b>mobile no</b></th>
			</tr>";
$i=1;
while($row=mysqli_fetch_array($results))
{
	echo "<tr><td>$i</td><td>$row[name]</td><td>$row[email_id]</td><td>$row[mobile_no]</td></tr>";
	$i++;
}	
echo "</table>";
?>
</body>
</html>