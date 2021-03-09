<?php
session_start();
include "dbConfig.php";
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$id = $_GET["id"];
$stmt = $conn->prepare("UPDATE `user` SET isActive=1 WHERE id=$id") or die(mysqli_error());
$stmt2 = "SELECT `id`,`username`,`email`,`role`,`isLogin` FROM user WHERE id=?";
$stmt2 = $conn->prepare($stmt2); 
$stmt2->bind_param("i", $id);


if($stmt->execute()){

                $insert_query = $conn->prepare("INSERT INTO `tblsession`(`start`,`end`,`sessionIP`,`downloads`,`userid`) VALUES(?,?,?,?,?)");
                $insert_query->bind_param("sssii",$start,$end,$sessionIP,$downloads,$userid);
                $start = date("Y-m-d H:i:s");
                $end = "Browser Closed!";
                $sessionIP = getUserIpAddr();
                $downloads = 0;
                $userid = $id;
                $insert_query->execute();
            $_SESSION["sessionid"] =  $insert_query->insert_id;

             if($stmt2->execute()){
                 
                      $result = $stmt2->get_result();
                    while ($row = $result->fetch_assoc()) {
                    $_SESSION['id']  =$row['id'];
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["email"] = $row['email'];
                    $_SESSION["role"] = $row['role'];
                    $_SESSION["isLogin"] = $row['isLogin'];
                    $_SESSION['uid'] = $row;
                    
                    //login true
                    $update = $conn->prepare("UPDATE `user` SET isLogin='true' WHERE email='".$_SESSION["email"]."'");
                    $update->execute();
                    
                    echo "<script>window.location.href = '../';</script>";
                    }
             }
}else{
        echo "<script>alert('Fail to activate user!')</script>";
       echo "<script>window.location.href = '../index.php';</script>";
             }
$stmt->close();

?>