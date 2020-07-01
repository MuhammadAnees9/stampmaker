<?php
use PHPMailer\PHPMailer\PHPMailer;
include "dbConfig.php";
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";


$to = $_POST["email"];
$id = $_POST["id"];
$link = "http://stamp-maker-2.us-east-1.elasticbeanstalk.com/";
$senderName = 'Test';



$recipient = $to; // this is receipient email address.

$usernameSmtp = 'sayapingeorge@gmail.com';   // Remember to Change: this is you gmail adddress.
$passwordSmtp = 'bsffegtlvbrswupk';            // This is you gmail password




// The subject line of the email
$subject = 'Confirm Your Account';

$sql = "SELECT adminmail,messageforactivation FROM settings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $message = $row["messageforactivation"];
  }
}
$message .= "<br> <a href='".$link."/register.php?id=".$id."'>Click Here</a>";

$mail = new PHPMailer(true);

try {
    // Specify the SMTP settings.
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
$mail->SMTPSecure = 'tls';
$mail->SMTPKeepAlive = true;
$mail->Mailer = "smtp";
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = $usernameSmtp;/*SMTP username*/
$mail->Password = $passwordSmtp;/*SMTP password*/
$mail->SMTPAuth = true;/*Enable SMTP authentication*/
$mail->SMTPDebug = 0;//set debug
$mail->From = $usernameSmtp;// from address to which mail is sent
$mail->FromName = 'Stamp Maker (NO REPLY)';// specifying sender name
$mail->AddAddress($recipient);// specifying to address
$mail->AddReplyTo($usernameSmtp, 'Information');// specifying the mail address to which replay is sent
$mail->IsHTML(true);
$mail->Subject = $subject;
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
$mail->Body = $message;
    $mail->Send();
    echo json_encode(array("abc"=>'done',"msg" => "Email sent!"));;
} catch (phpmailerException $e) {
    echo json_encode(array("abc"=>'not-done',"msg" => "An error occurred. {$e->errorMessage()}"));
     //Catch errors from PHPMailer.
} catch (Exception $e) {
     echo json_encode(array("abc"=>'not-done',"msg" => "Email not sent. {$mail->ErrorInfo}"));
}

?>
