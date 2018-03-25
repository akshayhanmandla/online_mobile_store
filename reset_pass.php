<!doctype html>
<html>
<head>
<title>Reset password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="css/background.css" />

<?php
include('config.php');
require ('phpmailer/PHPMailerAutoload.php');
$from = "yourusername@gmail.com";    //sender's username
$pwd = "yourpassword";   
if(isset($_POST['submit']))
{
$email=$_POST['email'];	
//echo $email;
$query="select * from users where email_id='$email'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$password=$row['password'];
//echo $password;
//$md_email=md5($email);
$md_password=md5($password);
$url="http://localhost/onlinestore/reset_verify.php?id=$email&key=$md_password";



$mail = new PHPMailer(true); //New instance,exceptions enabled with true
$to = $email;
$subject ='Mail from user';
$body = "This is the body \n$url" ;
$mail->IsSMTP();                           // tell the class to use SMTP
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = 'ssl'; 
$mail->SMTPOptions = array(
			'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Port = 465;                    // set the SMTP server port	
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->Username = $from;     // SMTP server username
$mail->Password = $pwd;            // SMTP server password
$mail->From = $from;
$mail->FromName = "Hanmandla Akshay";
$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->AltBody = "Please return read receipt to me."; // optional, comment out and test
$mail->WordWrap = 80; // set word wrap
$mail->MsgHTML($body);
$mail->IsHTML(true); // send as HTML
if($mail->Send())
	echo "<script>Mail sent</script>";
else
	echo "<script>Mail not sent</script>";




}	

?>

<h1 style="text-align:center">Reset Password</h1>
<br><br><br><br>

</head>
<body>
<form method="post">
<div class="form-group row">
<label for="username"  class="col-sm-2 offset-sm-3 col-form-label">Enter email id</label>
<div class="col-sm-4">
<input id="username" placeholder="Enter email id"  name="email" type="email" class="form-control">
</div>
</div>

<div class="form-group row">
<div class="offset-sm-6 col-sm-2">
<input value="submit" name="submit" type="submit" class="btn btn-primary btn-lg">
</div>
</div>
</form>
</body>
</html>