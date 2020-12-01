<?php
include "dbconfig.php";
$id = $_GET["id"];
$sql = "update user set isActive = 1 where id = '$id'";
$conn->query($sql);
echo "<script>window.location.href = 'indexx.php';</script>";
