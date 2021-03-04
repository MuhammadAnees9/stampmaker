<?php
use PHPMailer\PHPMailer\PHPMailer;
include "dbConfig.php";
require_once "../PHPMailer/PHPMailer.php";
require_once "../PHPMailer/SMTP.php";
require_once "../PHPMailer/Exception.php";


// $to = "sayapingeorge@gmail.com";
$to = "mystampmakerapp@gmail.com"; // also your email
$id = $_POST["id"];
$senderName = 'Admin';



$recipient = $to;

$usernameSmtp = 'mystampmakerapp@gmail.com';   // your smtp gmail adddress.
$passwordSmtp = 'blimysfyaooqgkph';   // your smtp password.

// The subject line of the email
$subject = 'New User Signed Up';
$message = "Hi, Admin a new user just signed up.";

$sql = "select tbl.sourceLang as slang,tbl.TargetLang as tlang,u.username as name,u.email as mail from user u inner join tbltranslation tbl on u.id = tbl.userid where u.id = '$id'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $message .= "<b>Name:</b>'".$row['name']."'<br><b>Email:</b>'".$row['mail']."'<br><b>Source Language:</b>'".$row['slang']."'<br><b>Target Language:</b>'".$row['tlang']."'<br>";
  }
}




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
    if (!$mail->send()) {
      echo json_encode(array("abc"=>'not-done',"msg" => '$mail->ErrorInfo'));
  } else {
      echo json_encode(array("abc"=>'done',"msg" => "Email sent!"));
  }
} catch (phpmailerException $e) {
    echo json_encode(array("abc"=>'not-done',"msg" => "An error occurred. {$e->errorMessage()}"));
     //Catch errors from PHPMailer.
} catch (Exception $e) {
     echo json_encode(array("abc"=>'not-done',"msg" => "Email not sent. {$mail->ErrorInfo}"));
}

?>