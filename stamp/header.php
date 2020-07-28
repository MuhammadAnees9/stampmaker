<?php
   session_start();
    $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
    if(isset($_SESSION['uid']) && $_SESSION['role']=='admin'){
        header('location:admin/index.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="stamp/image/png" href="logofav.png" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171780865-1"></script>
    <script src="stamp/assets/js/google_anylatic.js">
    </script>
    <script src="stamp/assets/js/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="stamp/assets/css/bootstrap.min.css">
    <script src="stamp/assets/js/bootstrap.min.js"></script>
    <script src="http://hongru.github.io/proj/canvas2image/canvas2image.js"></script>

    <script type="text/javascript" src="stamp/assets/js/customCircularLibrary.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="stamp/assets/js/main.js"></script>
    <script type="text/javascript" src="stamp/assets/js/modals.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="stamp/assets/js/select2.min.js"></script>
    <link href="stamp/assets/css/select2.min.css" rel="stylesheet" />
    <title>Stamp Maker</title>
</head>

<body>