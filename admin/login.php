<?php include "dbConfig.php";
session_start();

if(isset($_SESSION['uid'])){
	$data = $_SESSION['uid'];
	if($data['role']=='admin'){
		 header( 'Location: index.php' );
	}else{
		 header( 'Location: ../403.php' );
	}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="js/jquery-1.11.1.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="../modals.js"></script>
    <script src="js/dataTables.min.js"></script>
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form action="javascript:login()" method="POST" id="loginForm">
                        <fieldset>
                            <div class="form-group">
                                <input type="text" class="signup form-control" id="usernameLogin" placeholder="Username"
                                    required="">
                                <br>

                            </div>
                            <div class="form-group">
                                <input type="password" class="signup form-control" id="passLogin" placeholder="Password"
                                    required="">
                                <br>
                            </div>
                            <div class="checkbox">

                            </div>
                            <button class="btn btn-md btn-success modals" id="login">Log In</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>
<script type="text/javascript">
function login() {


    var txtusername = $("#usernameLogin").val();
    var txtpassword = $("#passLogin").val();
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
            password: txtpassword
        }),
        success: function(response) {
            console.log(response);
            if (response.status == 422) {
                $("#usernameLogin").css("border", "1px solid red");
                $("#passLogin").css("border", "1px solid red");
                swal(response.message, '', 'warning');
            }
            if (response.status == 200) {
                $('#myModalLogin').modal('hide');
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