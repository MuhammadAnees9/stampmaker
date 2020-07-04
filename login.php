<?php
session_start();
include "dbConfig.php";

$email = $_POST["username"];
$password = $_POST["password"];
$stmt = $conn->prepare("SELECT * FROM `user` WHERE username = '$email' && password = '$password' && isActive = '1'") or die(mysqli_error());
  if($stmt->execute()){
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;
  }
  if($num_rows > 0){




  	while ($data = $result->fetch_assoc()) {
       $_SESSION["username"] = $data['username'];
       $_SESSION["email"] = $data['email'];
       $_SESSION["id"] = $data['id'];
           // prepare and bind
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
  	if($_SESSION["username"] == "admin"){
  		echo json_encode(array("abc"=>'admin'));
  	}
    else{

    echo json_encode(array("abc"=>'done'));
    }
  }else{
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
