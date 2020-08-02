<?php
session_start();
include 'dbconfig.php';

$now = new DateTime();
$now->setTimezone(new DateTimeZone('America/Detroit'));
$end =  $now->format('Y-m-d H:i:s');
$id = $_SESSION["sessionid"];
$sql = "UPDATE tblsession SET `end`='$end' WHERE id='$id'";
$update = $conn->prepare("UPDATE `user` SET isLogin='false' WHERE email='".$_SESSION["email"]."'");
             $update->execute();
             $update->close();

if ($conn->query($sql) === TRUE) {
	session_destroy();
// unset ($_SESSION["username"]);
// unset ($_SESSION["sessionid"]);
 echo json_encode(array("abc"=>'done'));

}

?>