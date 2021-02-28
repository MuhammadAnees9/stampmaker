<?php
$to = $_POST["to"];
$from = $_POST["from"];
$subject = 'Please confirm your Stampmaker account';
$message =$_POST["message"];
// $message ="Click below link to confirm your account <br> <a href='http://localhost/StampMaker%20Super%20Final/StampMaker/register.php?id=8'>Click Here</a>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>