<?php
//Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stampMaker";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli("stampmaker.ciyq4ufpar8z.us-east-1.rds.amazonaws.com", "admin", "admin12345", "stampmaker","3306");
//$link = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);



//check session login if admin
function CheckIfAdmin(){
    if(isset($_SESSION['uid'])){
     if($_SESSION['role']!="admin"){
         header("location:../403.php");
     }
}
if(!isset($_SESSION['uid'])){
      header("location:../index.php");
}

}

?>
