<?php
include 'dbConfig.php';
$id = $_POST["id"];
$sql = "UPDATE tblsession SET downloads=downloads+1 WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  echo json_encode(array("abc"=>'username'));
}
echo json_encode(array("abc"=>$conn->error));





?>