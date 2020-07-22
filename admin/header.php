<?php
session_start();
include('dbconfig.php');

CheckIfAdmin();
$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
?>
<!DOCTYPE html>
<html>
<title>Admin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?=$base_url?>assets/css/my.css">
<link rel="stylesheet" href="<?=$base_url?>assets/css/bootstrap.min.css">
<link href="<?=$base_url?>assets/css/dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="../assets/js/modals.js"></script>
<script src="assets/js/jquery-3.5.1.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

<style>
body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Raleway", sans-serif
}
</style>

<body class="my-light-grey my-content" style="max-width:1600px">
    <!-- Navbar (sit on top) -->

    <!-- Sidebar/menu -->
    <div class="my-display-container">
        <div class="">
            <div class="my-bar my-white my-wide my-padding my-card my-black">
                <a href="#" class="my-bar-item my-button"><b class="my-text-blue">Stamp Maker</b> Admin</a>
            </div>
        </div>
    </div>
    <nav class="my-sidebar my-collapse my-white my-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>

        <div class="my-container">
            <a href="#" onclick="my_close()" class="my-hide-large my-right my-jumbo my-padding my-hover-grey"
                title="close menu">
                <i class="fa fa-remove"></i>
            </a>
            <img src="assets/img/admin.png" style="width:45%;" class="my-round"><br><br>
            <h4><b>Admin</b></h4>
        </div>
        <div class="my-bar-block">
            <a href="index.php" onclick="my_close()" class="my-bar-item my-button my-padding"><i
                    class="fa fa-users fa-fw my-margin-right"></i>Users Table</a>
            <a href="session.php" onclick="my_close()" class="my-bar-item my-button my-padding"><i
                    class="fa fa-user fa-fw my-margin-right"></i>Sessions Table</a>
            <a href="translation.php" onclick="my_close()" class="my-bar-item my-button my-padding"><i
                    class="fa fa-envelope fa-fw my-margin-right"></i>Translation Table</a>
            <button href="translation.php" onclick="logout()" class="my-bar-item my-button my-padding"><i
                    class="fa fa-sign-out fa-fw my-margin-right"></i>Logout</button>
        </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="my-overlay my-hide-large my-animate-opacity" onclick="my_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="my-main" style="margin-left:300px">