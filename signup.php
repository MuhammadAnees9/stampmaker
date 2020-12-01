<?php
include "dbConfig.php";
$username = $_POST["usernName"];
$email = $_POST["emaIl"];
$sql_u = "SELECT * FROM user WHERE username='$username'";
    $sql_e = "SELECT * FROM user WHERE email='$email'";
    $res_u = mysqli_query($conn, $sql_u);
    $res_e = mysqli_query($conn, $sql_e);

    if (mysqli_num_rows($res_u) > 0) {
       echo json_encode(array("abc"=>'username'));
       return;    
    }else if(mysqli_num_rows($res_e) > 0){
       echo json_encode(array("abc"=>'email')); 
       return;
    }
    else{

// prepare and bind
$stmt = $conn->prepare("INSERT INTO user (username, email, password, nativeLanguage, userIP,isActive) VALUES (?, ?, ?,?,?,?)");
$stmt->bind_param("sssssi",$username,$email,$password,$langS,$ip,$active);

//Saving Data
 $username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["pass"];
$langS = $_POST["langS"];
$langT = $_POST["langT"];
$ip = getUserIpAddr();
$active = 0;
$stmt->execute();


$userid1 = $stmt->insert_id;
$stmt2 = $conn->prepare("insert into tbltranslation (sourceLang,TargetLang,userid) VALUES (?,?,?)");
$stmt2->bind_param('ssi',$langS,$langT,$userid);
$langS = $_POST["langS"];
$langT = $_POST["langT"];
$userid = $userid1;
$stmt2->execute();

 echo json_encode(array("abc"=>'done',"id"=> $userid));


    }












//Function of getting user's IP
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
