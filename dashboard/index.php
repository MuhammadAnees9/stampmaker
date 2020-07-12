<?php include "../dbConfig.php";
session_start();
CheckIfAdmin();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
</head>

<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Stamp Maker </span>Admin</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Admin</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li class="active"><a href="index.php"><em class="fa fa-users">&nbsp;</em> Users Table</a></li>
            <li><a href="session.php"><em class="fa fa-dashboard">&nbsp;</em> Sessions Table</a></li>
            <li><a href="translation.php"><em class="fa fa-language">&nbsp;</em> Translation Table</a></li>
            <li><a href="../index.php"><em class="fa fa-power-off">&nbsp;</em> Return</a></li>
        </ul>
    </div>
    <!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <a class="btn btn-lg btn-primary mb-5" data-toggle='modal' data-target='#myModal'>
                        + ADD USERS</a>
                    <div class="panel-heading">
                        Users Table
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">User IP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                                    $sql = "SELECT id, username, email,userIP FROM user where isActive = 1 && username != 'admin'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                    echo "<tr>
                                                        <th scope='row'>".$row["id"]."</th>
                                                        <td>".$row["username"]."</td>
                                                        <td>".$row["email"]."</td>
                            
                                                        <td><input type='password' onkeydown='javascript:UpdatePassword(this)' id=".$row['id']."></td>
                                                        <td>".$row["userIP"]."</td>
                                                    </tr>";
                                                    }
                                                    } else {
                                                    echo "0 results";
                                                    }
                                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-12">
                <p class="back-link">Stamp Maker</p>
            </div>
        </div>
        <!--/.row-->
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="javascript:addUser()" id="addUser" method="post">
                        <center>
                            <h3>+ Add User</h3>
                        </center>
                        <input type="text" class="signup form-control" id="usernametext" placeholder="Username"
                            required="">
                        <br>
                        <input type="text" class="signup form-control" id="email" placeholder="Email" required=""
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <br>
                        <input type="password" class="signup form-control" id="pass" placeholder="Password" required=""
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                        <br>
                        <input type="hidden" name="action" id="action" value="add">
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="user">user</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Activate user</label>
                            <select class="form-control" name="isActive" id="isActive">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <select class="form-control" id="langS" required="">
                            <option selected="" value="" disabled="">Select Native / Source Language</option>
                            <option value="English">English</option>
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Amharic">Amharic</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Azeri">Azeri</option>
                            <option value="Bantu">Bantu</option>
                            <option value="Belarusan">Belarusan</option>
                            <option value="Bengali">Bengali</option>
                            <option value="Bosnian">Bosnian</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Burmese">Burmese</option>
                            <option value="Cambodian">Cambodian</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Creole">Creole</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Czech">Czech</option>
                            <option value="Danish">Danish</option>
                            <option value="Dari">Dari</option>
                            <option value="Dutch">Dutch</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Farsi">Farsi</option>
                            <option value="Finnish">Finnish</option>
                            <option value="Flemish">Flemish</option>
                            <option value="French">French</option>
                            <option value="Galician">Galician</option>
                            <option value="Georgian">Georgian</option>
                            <option value="German">German</option>
                            <option value="Greek">Greek</option>
                            <option value="Gujarati">Gujarati</option>
                            <option value="Haitian Kreyol">Haitian Kreyol</option>
                            <option value="Hausa">Hausa</option>
                            <option value="Hebrew">Hebrew</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Hmong">Hmong</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelandic">Icelandic</option>
                            <option value="Ilokano">Ilokano</option>
                            <option value="Indonesian">Indonesian</option>
                            <option value="Italian">Italian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Javanese">Javanese</option>
                            <option value="Karen">Karen</option>
                            <option value="Kashmiri">Kashmiri</option>
                            <option value="Kazakh">Kazakh</option>
                            <option value="Korean">Korean</option>
                            <option value="Kurdish">Kurdish</option>
                            <option value="Ladino">Ladino</option>
                            <option value="Laotian">Laotian</option>
                            <option value="Latin">Latin</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Maay">Maay</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malay">Malay</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Marathi">Marathi</option>
                            <option value="Moldavian">Moldavian</option>
                            <option value="Moldovan">Moldovan</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Nepali">Nepali</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Pashto">Pashto</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Portuguese - Brazilian">Portuguese - Brazilian</option>
                            <option value="Portuguese - European">Portuguese - European</option>
                            <option value="Punjabi">Punjabi</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Russian">Russian</option>
                            <option value="Serbian">Serbian</option>
                            <option value="Sinhalese">Sinhalese</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovene">Slovene</option>
                            <option value="Somali">Somali</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Swahili">Swahili</option>
                            <option value="Swedish">Swedish</option>
                            <option value="Tagalog">Tagalog</option>
                            <option value="Tamil">Tamil</option>
                            <option value="Thai">Thai</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Twi">Twi</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Urdu">Urdu</option>
                            <option value="Uyghur">Uyghur</option>
                            <option value="Uzbek">Uzbek</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Welsh">Welsh</option>
                            <option value="Yiddish">Yiddish</option>
                            <option value="Yoruba">Yoruba</option>
                            <option value="Zulu">Zulu</option>
                        </select>
                        <br><br>
                        <center>
                            <button class="btn btn-md btn-success modals" id="signup">+Add User</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/.main-->

</body>
<script type="text/javascript">
window.onload = function() {

    $('#langS').select2({
        width: '100%',
        placeholder: "Select Native / Source Language",
        allowClear: true,
    });
    $('#langTarget').select2({
        width: '100%',
        placeholder: "Select Target Language",
        allowClear: true,
    });
    //datatables
    $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
};
</script>

</html>