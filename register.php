<?php
include "dbConfig.php";
$id = $_GET["id"];
$stmt = $conn->prepare("UPDATE `user` SET isActive=1 WHERE id=$id") or die(mysqli_error());
if($stmt->execute()){
    echo "<script>alert('Account activated')</script>";
       echo "<script>window.location.href = 'index.php';</script>";

}
$stmt->close();
?>