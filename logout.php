<?php
include 'dbConfig.php';
session_start();
$end = date("Y-m-d H:i:s");
$id = $_SESSION["sessionid"];
$sql = "UPDATE tblsession SET end='$end' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
	
unset ($_SESSION["username"]);
unset ($_SESSION["sessionid"]);
 echo json_encode(array("abc"=>'done'));

}

?>