<?php
session_start();
include "dbConfig.php";

$email = $_POST["username"];
$password = md5($_POST["password"]);
$stmt = $conn->prepare("SELECT * FROM `user` WHERE `username` = '$email' or `email` = '$email' && `password` = '$password' && isActive = '1'") or die(mysqli_error());
if($stmt->execute()){
$result = $stmt->get_result();
$num_rows = $result->num_rows;
}
if($num_rows > 0){
   
    
      $update = $conn->prepare("UPDATE `user` SET isLogin='true' WHERE email='".$d['email']."'");
      if($update->execute())
      {
        while ($data = $result->fetch_assoc()) 
        {
          
          $_SESSION["username"] = $data['username'];
          $_SESSION["email"] = $data['email'];
          $_SESSION["role"] = $data['role'];
          $_SESSION["isLogin"] = $data['isLogin'];
          $_SESSION['uid'] = $data;
          // prepare and bind
         if($data["isLogin"]=="false"){
            $update = $conn->prepare("UPDATE `user` SET isLogin='true' WHERE email='".$_SESSION["email"]."'");
            $update->execute();
            $update->close();
          }
          $stmt = $conn->prepare("INSERT INTO tblsession (start, end, sessionIP, downloads, userid) VALUES (?, ?, ?,?,?)");
          $stmt->bind_param("sssii",$start,$end,$sessionIP,$downloads,$userid);

          //Saving Data
          $start = date("Y-m-d H:i:s");
          $end = "Browser Closed!";
          $sessionIP = getUserIpAddr();
          $downloads = 0;
          $userid = $data['id'];
          $stmt->execute();
          $_SESSION["sessionid"] = $stmt->insert_id;
          $stmt->close();
          // <--- available in $data
        }
        if($_SESSION['isLogin']==='true')
        {
          echo json_encode(array("abc"=>'true'));
        }else{
          if($_SESSION["role"] == "admin"){
        echo json_encode(array("abc"=>'admin'));
        }
        else{

        echo json_encode(array("abc"=>'done'));
        }
        }
        
      }
    
}
else{
echo json_encode(array("abc"=>'fail'));
}

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


?>
