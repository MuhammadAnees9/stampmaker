<?php
include 'dbconfig.php';
session_start();
$end = date("Y-m-d H:i:s");
$id = $_SESSION["sessionid"];
$sql = "UPDATE tblsession SET end='$end' WHERE id='$id'";
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