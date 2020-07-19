<?php
include "dbConfig.php";
$id = $_GET["id"];
$stmt = $conn->prepare("UPDATE `user` SET isActive=1 WHERE id=$id") or die(mysqli_error());
if($stmt->execute()){
    echo "<script>alert('Account activated')</script>";
       echo "<script>window.location.href = 'index.php';</script>";
//     $stmt2 = $conn->prepare("SELECT * FROM `user` WHERE id = $id") or die(mysqli_error());
//     $stmt2->execute();
//    $result = $stmt2->get_result();
//     while ($data = $result->fetch_assoc()) {
//        $_SESSION["sessionid"] = $data;
      
//     }
}
$stmt->close();
// 
// $stmt->bind_param("i", $country_code); 
//  
// $data = 

// $_SESSION["sessionid"] = $stmt->insert_id;


// $sql = "update user set isActive = 1 where id = '$id'";
// $conn->query($sql);

?>