
<div class="modal fade" id="myModalLogin" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h3 class="login-heading">Log In <button type="button" class="close" data-dismiss="modal">&times;</button></h3>
            <div class="modal-body">
                <form action="javascript:login()" method="post" id="loginForm">
                    <b id="info" style="color:red"></b><br>
                    <div class="form-input-row">
                        <i class="fa fa-user signup-icons"></i>
                    <input type="text" class="signup login-input form-control" id="usernameLogin" value="<?php if (isset($_COOKIE["usernameLogin"])) {
                                                                                                    echo $_COOKIE["usernameLogin"];
                                                                                                } ?>" placeholder="Username" required="">
                    </div><br>
                    <div class="form-input-row">
                        <i class="fa fa-key signup-icons"></i>
                    <input type="password" class="signup login-input form-control" id="passLogin" placeholder="Password" required="" value="<?php if (isset($_COOKIE["passLogin"])) {
                                                                                             echo $_COOKIE["passLogin"];
                                                                                                                                } ?>">
                    </div><br>

                    <center>
                        <h6 style="font-weight:normal;color: #22639a;">Not registered yet.<a id="reg" onclick="notauser();">Click
                                here</a></h6>
                    </center>
                    <div class="field-group">
                        <div><input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["usernameLogin"])) { ?> checked <?php } ?> />
                            <label for="remember-me" style="color: #22639a;">Remember me</label>
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-md login-submit-btn btn-success modals" id="login">Log In</button>
                    </center>
                </form>

            </div>
        </div>
    </div>
</div>
