<?php
use PHPMailer\PHPMailer\PHPMailer;
include "dbConfig.php";
require_once "../PHPMailer/PHPMailer.php";
require_once "../PHPMailer/SMTP.php";
require_once "../PHPMailer/Exception.php";


$to = $_POST["email"];
$id = $_POST["id"];
$rlink = $_POST["baseurltosend"];
$link = $rlink . "/inc/";
// $link = "https://user.mystampmaker.com/";
$senderName = 'Stampmaker';



$recipient = $to; // this is receipient email address.

// $usernameSmtp = 'support@mystampmaker.com';   // Remember to Change: this is you gmail adddress.
// $passwordSmtp = 'BMxidVcVbFY3PUnClJQNS60Oj5INeMU4frltCz45ggoB';            // This is you gmail password


$usernameSmtp = 'stampmakerapp@gmail.com';   // your smtp gmail adddress.
$passwordSmtp = 'ppasoxlcdihmznry';   // your smtp password.

//blimysfyaooqgkph
//4398yt[9g

// The subject line of the email
$subject = 'Confirm your Stampmaker account';

$sql = "SELECT adminmail,messageforactivation FROM settings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $message = $row["messageforactivation"];
  }
}
$message .= "<br>Please <a href='".$link."register.php?id=".$id."'>Click Here</a> to activate your Stampmaker account";

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
