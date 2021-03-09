<?php


use PHPMailer\PHPMailer\PHPMailer;
session_start();
include "dbConfig.php";
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
$text = $_POST["text"];
$to = "sayapingeorge@gmail.com";
$from = $_SESSION["email"];
$id = $_SESSION["id"];
$subject = "Concern Or Suggestion";



$recipient = $to; // this is receipient email address.

$usernameSmtp = 'sayapingeorge@gmail.com';   // Remember to Change: this is you gmail adddress.
$passwordSmtp = 'bsffegtlvbrswupk';            // This is you gmail password

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
$message .= "<b>From:</b> ".$from."<br><b>User ID:</b> ".$id."<br>";

$message .= "<b>Message:</b> ".$text;
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