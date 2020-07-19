<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
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

// INCLUDING DATABASE AND MAKING OBJECT
require __DIR__.'/classes/Database.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();

// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));
$returnData = [];

// IF REQUEST METHOD IS NOT POST
if($_SERVER["REQUEST_METHOD"] != "POST"):
    $returnData = msg(0,404,'Page Not Found!');

// CHECKING EMPTY FIELDS
elseif(!isset($data->username) 
    || !isset($data->email) 
    || !isset($data->password)
    || !isset($data->nativeLanguage)
     || !isset($data->role)
    || empty(trim($data->username))
    || empty(trim($data->email))
    || empty(trim($data->password))
    || empty(trim($data->nativeLanguage))
    || empty(trim($data->role))
    ):

    $fields = ['fields' => ['username','email','password','nativeLanguage','role']];
    $returnData = msg(0,422,'Please Fill in all Required Fields!',$fields);

// IF THERE ARE NO EMPTY FIELDS THEN-
else:
    
    $username = trim($data->username);
    $email = trim($data->email);
    $password = trim($data->password);
    $nativeLanguage = trim($data->nativeLanguage);
    $role = trim($data->role);
    $isActive = trim($data->isActive);
    $userIp = trim(getUserIpAddr());
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
        $returnData = msg(0,422,'Invalid Email Address!');
    
    elseif(strlen($password) < 6):
        $returnData = msg(0,422,'Your password must be at least 6 characters long!');

    elseif(strlen($username) < 3):
        $returnData = msg(0,422,'Your username must be at least 3 characters long!');

    else:
        try{

            $check_email = "SELECT `email` FROM `user` WHERE `email`=:email";
            $check_email_stmt = $conn->prepare($check_email);
            $check_email_stmt->bindValue(':email', $email,PDO::PARAM_STR);
            $check_email_stmt->execute();

            $check_user = "SELECT `username` FROM `user` WHERE `username`=:username";
            $check_user_stmt = $conn->prepare($check_user);
            $check_user_stmt->bindValue(':username', $username,PDO::PARAM_STR);
            $check_user_stmt->execute();
            
            if($check_email_stmt->rowCount()):
                $returnData = msg(0,422, 'This E-mail already in use!');
            elseif($check_user_stmt->rowCount()):
                $returnData = msg(0,422, 'This user already in use!');
            else:
                $insert_query = "INSERT INTO `user`(`username`,`email`,`password`,`nativeLanguage`,`userIp`,`role`,`isActive`) VALUES(:username,:email,:password,:nativeLanguage,:userIp,:role,:isActive)";

                $insert_stmt = $conn->prepare($insert_query);

                // DATA BINDING
              
                $insert_stmt->bindValue(':username', htmlspecialchars(strip_tags($username)),PDO::PARAM_STR);
                $insert_stmt->bindValue(':email', $email,PDO::PARAM_STR);
                $insert_stmt->bindValue(':password', password_hash($password, PASSWORD_DEFAULT),PDO::PARAM_STR);
                $insert_stmt->bindValue(':nativeLanguage', $nativeLanguage,PDO::PARAM_STR);
                 $insert_stmt->bindValue(':userIp', $userIp,PDO::PARAM_STR);
                   $insert_stmt->bindValue(':role', $role,PDO::PARAM_STR);
                 $insert_stmt->bindValue(':isActive', $isActive,PDO::PARAM_STR);
                $insert_stmt->execute();
                
                $userid1 = $conn->lastInsertId();
                $insert_query2 = "INSERT INTO `tbltranslation`(`sourceLang`,`TargetLang`,`userid`) VALUES(:sourceLang,:TargetLang,:userid)";

                $insert_stmt2 = $conn->prepare($insert_query2);

                // DATA BINDING
                $insert_stmt2->bindValue(':sourceLang',$nativeLanguage,PDO::PARAM_STR);
                $insert_stmt2->bindValue(':TargetLang', $nativeLanguage,PDO::PARAM_STR);
                $insert_stmt2->bindValue(':userid',$userid1,PDO::PARAM_STR);
                 $insert_stmt2->execute();
                $returnData = msg(1,201,'You have successfully registered.');

            endif;

        }
        catch(PDOException $e){
            $returnData = msg(0,500,$e->getMessage());
        }
    endif;
    
endif;

echo json_encode($returnData);