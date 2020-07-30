<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ],$extra);
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


require __DIR__.'/classes/Database.php';
require __DIR__.'/classes/JwtHandler.php';
$now = new DateTime();
$now->setTimezone(new DateTimeZone('America/Detroit'));
$start =  $now->format('Y-m-d H:i:s');
$db_connection = new Database();
$conn = $db_connection->dbConnection();
// $tz = 'America/Detroit';
// $timestamp = time();
// $dt = new DateTime("now", new DateTimeZone($tz)); 
// $dt->setTimestamp($timestamp); 
// $date2 =  $dt->format('Y-m-d H:i:s');
$data = json_decode(file_get_contents("php://input"));
$returnData = [];
if($_SERVER["REQUEST_METHOD"]=="POST"):
    
// CHECKING EMPTY FIELDS
if(!isset($data->username) 
    || !isset($data->password)
    || empty(trim($data->username))
    || empty(trim($data->password))
    ):

    $fields = ['fields' => ['username','password']];
    $returnData = msg(0,422,'Please Fill in all Required Fields!',$fields);

// IF THERE ARE NO EMPTY FIELDS THEN-
else:
    $username = trim($data->username);
    $password = trim($data->password);
    $remember  =trim($data->remember);
     
    // IF PASSWORD IS LESS THAN 8 THE SHOW THE ERROR
    if(strlen($password) < 5):
        $returnData = msg(0,422,'Your password must be at least 5 characters long!');

    // THE USER IS ABLE TO PERFORM THE LOGIN ACTION
    else:
        try{
            
            $fetch_user_by_email = "SELECT * FROM `user` WHERE `username`=:username or `email`=:username";
            $query_stmt = $conn->prepare($fetch_user_by_email);
            $query_stmt->bindValue(':username', $username,PDO::PARAM_STR);
            $query_stmt->execute();

            $CheckIfUserActivate = "SELECT * FROM `user` WHERE `username`=:username or `email`=:username AND isActive=1";
            $query_stmt2 = $conn->prepare($fetch_user_by_email);
            $query_stmt2->bindValue(':username', $username,PDO::PARAM_STR);
            $query_stmt2->execute();

            // IF THE USER IS FOUNDED BY EMAIL
            if($query_stmt->rowCount()):
                $row = $query_stmt->fetch(PDO::FETCH_ASSOC);
                $check_password = password_verify($password, $row['password']);

                // VERIFYING THE PASSWORD (IS CORRECT OR NOT?)
                // IF PASSWORD IS CORRECT THEN SEND THE LOGIN TOKEN
                  if($row['isActive']==0):
                         $returnData = msg(0,422,'Please check your email and activate account!');
                elseif($row['isLogin']=='true'):
                            $returnData = msg(0,422,'User already logged in!');
                            
                elseif($check_password):
                       
                        $jwt = new JwtHandler();
                        $token = $jwt->_jwt_encode_data(
                            'http://localhost/stampmaker/',
                            array("user_id"=> $row['id'])
                    );
                    $_SESSION['id']  =$row['id'];
                    $_SESSION["username"] = $row['username'];
                    $_SESSION["email"] = $row['email'];
                    $_SESSION["role"] = $row['role'];
                    $_SESSION["isLogin"] = $row['isLogin'];
                    $_SESSION['uid'] = $row;
                    if(!empty($remember)) {
               setcookie("usernameLogin",$username,time() + (3*30*24*3600), "/");
                setcookie("passLogin",$password,time()+  (3*30*24*3600), "/");
			}
                    $returnData = msg(1,200,'You have successfully logged in.',$row);

                        // $start = date("Y-m-d H:i:s");
                        $end = "Browser Closed!";
                        $sessionIP = getUserIpAddr();
                        $downloads = 0;
                        $userid = $row['id'];
                    $insert_query = "INSERT INTO `tblsession`(`start`,`end`,`sessionIP`,`downloads`,`userid`) VALUES(:start,:end,:sessionIP,:downloads,:userid)";

                    $insert_stmt = $conn->prepare($insert_query);
                    $insert_stmt->bindValue(':start',$start,PDO::PARAM_STR);
                    $insert_stmt->bindValue(':end',$end,PDO::PARAM_STR);
                    $insert_stmt->bindValue(':sessionIP',$sessionIP,PDO::PARAM_STR);
                    $insert_stmt->bindValue(':downloads',$downloads,PDO::PARAM_STR);
                    $insert_stmt->bindValue(':userid',$userid,PDO::PARAM_STR);
                    $insert_stmt->execute();
                    $_SESSION["sessionid"] = $conn->lastInsertId();
                     $update = $conn->prepare("UPDATE `user` SET isLogin='true' WHERE email='".$_SESSION["email"]."'");
                        $update->execute();
                    
                // IF INVALID PASSWORD
                else:
                    $returnData = msg(0,422,'Invalid password!');
                endif;

            // IF THE USER IS NOT FOUNDED BY EMAIL THEN SHOW THE FOLLOWING ERROR
            else:
            //    $returnData = msg(0,422,$d);
                $returnData = msg(0,422,'Wrong username or Email!');
            endif;
        }
        catch(PDOException $e){
            $returnData = msg(0,500,$e->getMessage());
        }

    endif;

endif;
elseif($_SERVER["REQUEST_METHOD"]=="DELETE"):
    if($_SESSION["role"]!='admin'):
         $returnData = msg(0,401,'You have not admin rights');
    else:
    $id = trim($data->id);
    $stmt = $conn->prepare("DELETE from user WHERE id=:id");
    $stmt->bindValue(':id', $id,PDO::PARAM_STR);
    $status = $stmt->execute();
    if($status==true){
         $returnData = msg(1,200,'user deleted successful');
     }
    endif;




    
elseif($_SERVER["REQUEST_METHOD"]=="PUT"):

    if(!isset($data->id) 
    || !isset($data->password)
    || empty(trim($data->id))
    || empty(trim($data->password))
    ):

    $fields = ['fields' => ['userid','password']];
    $returnData = msg(0,422,'Please Fill in all Required Fields!',$fields);
    

    else:
    $password = trim($data->password);
    $id = trim($data->id);
     $stmt = $conn->prepare("UPDATE user SET password=:password WHERE id=:id");
      $stmt->bindValue(':id', $id,PDO::PARAM_STR);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT),PDO::PARAM_STR);
     $status = $stmt->execute();
     if($status==true){
         $returnData = msg(1,200,'password updated successful');
     }
endif;
endif;
echo json_encode($returnData);