<?php
include "../dbConfig.php";
 if(isset($_POST["action"])){
     if($_POST["action"]=="add"){
                    $username = $_POST["username"];
            $email = $_POST["email"];
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
            $stmt = $conn->prepare("INSERT INTO user (username, email, password, nativeLanguage, userIP,isActive,role) VALUES (?, ?, ?,?,?,?,?)");
            $stmt->bind_param("sssssis",$username,$email,$password,$langS,$ip,$active,$role);

            //Saving Data
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = md5($_POST["pass"]);
            $langS = $_POST["langS"];
            $langT = $_POST["langT"];
            $ip = getUserIpAddr();
            $active = $_POST["isActive"];
            $role = $_POST["role"];
            $stmt->execute();


            $userid1 = $stmt->insert_id;
            $stmt2 = $conn->prepare("insert into tbltranslation (sourceLang,TargetLang,userid) VALUES (?,?,?)");
            $stmt2->bind_param('ssi',$langS,$langT,$userid);
            $langS = $_POST["langS"];
            $langT = $_POST["langS"];
            $userid = $userid1;
            $stmt2->execute();

            echo json_encode(array("abc"=>'done',"id"=> $userid));
    }
     }

      if($_POST["action"]=="updatePass"){
     $stmt = $conn->prepare("UPDATE user SET password=? WHERE id=?");
     $stmt->bind_param('si', md5($_POST["pass"]), $_POST["id"]);
     $status = $stmt->execute();
     if($status==true){
         echo json_encode(array("abc"=>'done'));
     }
 }



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

?>