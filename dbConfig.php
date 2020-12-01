<?php
//Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stampMaker";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn = new mysqli("stampmaker", "admin", "admin125", "stampmaker","3306");
//$link = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
