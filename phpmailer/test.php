<h1>SMTP Mailing Form</h1>
<?php
require ('PHPMailerAutoload.php');
$from = "yourmail@gmail.com";    //sender's username
$pwd = "password";                 //sender's password
//-------------------------------------------------------SEND eMail----------------------------------------------------------------------
if(isset($_POST['submit']))
{

$mail = new PHPMailer(true); //New instance,exceptions enabled with true
$to = $_POST['email'];
$subject ='Mail from user';
$body = "This is the body";
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
	echo "<script>alert('Mail sent');</script>";
else
	echo "<script>alert('Mail not sent');</script>";
}
?>
<!--
<form method="post">
Email:<input type="text" name="email" id="email"><br>
<input type="submit" name="submit">
</form>
-->