
<div class="modal fade" id="myModalLogin" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form action="javascript:login()" method="post" id="loginForm">
                    <center>
                        <h3>Log In</h3><b id="info" style="color:red"></b><br>
                    </center>
                    <input type="text" class="signup form-control" id="usernameLogin" value="<?php if (isset($_COOKIE["usernameLogin"])) {
                                                                                                    echo $_COOKIE["usernameLogin"];
                                                                                                } ?>" placeholder="Username" required="">
                    <br>
                    <input type="password" class="signup form-control" id="passLogin" placeholder="Password" required="" value="<?php if (isset($_COOKIE["passLogin"])) {
                                                                                                                                    echo $_COOKIE["passLogin"];
                                                                                                                                } ?>">
                    <br>

                    <center>
                        <h6 style="font-weight:normal;">Not registered yet.<a id="reg" onclick="notauser();">Click
                                here</a></h6>
                    </center>
                    <div class="field-group">
                        <div><input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["usernameLogin"])) { ?> checked <?php } ?> />
                            <label for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-md btn-success modals" id="login">Log In</button>
                    </center>
                </form>

            </div>
        </div>
    </div>
</div>