<?php include "dbconfig.php";
session_start();

if(isset($_SESSION['uid'])){
	$data = $_SESSION['uid'];
	if($data['role']=='admin'){
		 header( 'Location:./index.php' );
	}else{
		 header('Location: https://test.mystampmaker.com/' );
	}
}
?>



<!DOCTYPE html>
<html>
<title>Admin Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/my.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<script src="assets/js/jquery-3.5.1.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
body,
h1 {
    font-family: "Raleway", sans-serif
}

body,
html {
    height: 100%
}

.bgimg {
    background-image: url('assets/img/bg.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
</style>

<body>

    <div class="bgimg my-display-container my-animate-opacity my-text-white">
        <div class="my-display-container">
            <div class="">
                <div class="my-bar my-white my-wide my-padding my-card my-black">
                    <a href="#" class="my-bar-item my-button"><b class="my-text-blue">Stamp Maker</b> Admin</a>
                </div>
            </div>
        </div>
        <div class="my-display-middle">

            <form class=" my-container" action="javascript:login()" method="POST" id="loginForm" <div
                class="my-section">
                <label><b>Username</b></label>
                <input class="my-input signup my-border my-margin-bottom" type="text" id="usernameLogin"
                    placeholder="Username" required=""
                    value="<?php if(isset($_COOKIE["usernameLogin"])) { echo $_COOKIE["usernameLogin"]; } ?>">
                <label><b>Password</b></label>
                <input type="password" class="signup my-input signup my-border my-margin-bottom" id="passLogin"
                    placeholder="Password" required=""
                    value="<?php if(isset($_COOKIE["passLogin"])) { echo $_COOKIE["passLogin"]; } ?>">
                <div class="field-group">
                    <div><input type="checkbox" name="remember" id="remember"
                            <?php if(isset($_COOKIE["usernameLogin"])) { ?> checked <?php } ?> />
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <button class="my-button btn my-block my-green my-section my-padding" id="login">Login</button>
        </div>
        </form>

        <!-- <h1 class="my-jumbo my-animate-top">COMING SOON</h1>
            <hr class="my-border-grey" style="margin:auto;width:40%">
            <p class="my-large my-center">35 days left</p> -->
    </div>

    </div>

</body>
<script type="text/javascript">
function login() {


    var txtusername = $("#usernameLogin").val();
    var txtpassword = $("#passLogin").val();
    var remember = $("#remember").is(":checked");
    //validate login form
    if (txtusername.trim() == "") {
        $("#usernameLogin").css("border", "1px solid red");
        swal("Username Required", "", "warning");
    }
    if (txtpassword.trim() == "") {
        $("#passLogin").css("border", "1px solid red");
        swal("Password Required", "", "warning");
    }
    if (txtpassword.length < 5) {
        $("#passLogin").css("border", "1px solid red");
        swal("Password Minimum 5 characher", "", "warning");
    } else $.ajax({
        url: "../auth/auth.php", //the page containing php script
        type: "post", //request type,
        dataType: 'json',
        data: JSON.stringify({
            username: txtusername,
            password: txtpassword,
            remember: remember,
        }),
        success: function(response) {
            console.log(response);
            if (response.status == 422) {
                $("#usernameLogin").css("border", "1px solid red");
                $("#passLogin").css("border", "1px solid red");
                swal(response.message, '', 'warning');
            }
            if (response.status == 200) {
                $("#usernameLogin").css("border", "1px solid green");
                $("#passLogin").css("border", "1px solid green");

                swal("Welcome!", response.message, "success").then(function() {
                    //Checking if the user turn from the  download
                    window.location.reload();
                });

            }

        },
        error: function(jqXHR, textStatus, errorThrown) {

            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
}
</script>

</html>