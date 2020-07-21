<?php

include_once('header.php');
?>
<!-- Header -->

<header id="portfolio">

    <a href="#"><img src="/myimages/avatar_g2.jpg" style="width:65px;"
            class="my-circle my-right my-margin my-hide-large my-hover-opacity"></a>
    <span class="my-button my-hide-large my-xxlarge my-hover-text-grey" onclick="my_open()"><i
            class="fa fa-bars"></i></span>
    <div class="my-container">
        <h1><b>Users Detail</b></h1>
    </div>
</header>

<!-- First Photo Grid-->
<div class="my-row-padding">
    <div class="my-container">
        <button class="my-button my-blue fa fa-plus my-button my-green my-large" data-toggle='modal'
            data-target='#myModal'>Add
            Users</button>
        <br>
        <br>
        <table id="table" class="my-table-all my-card-4 table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">User IP</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                                    $sql = "SELECT id, username, email,userIP,isActive FROM user where role != 'admin'";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        $status = ($row['isActive']==1)?'Active':'Not active';
                                                    echo "<tr>
                                                        <th scope='row'>".$row["id"]."</th>
                                                        <td>".$row["username"]."</td>
                                                        <td>".$row["email"]."</td>
                            
                                                        <td><input type='password' required class='pwd' onkeydown='javascript:UpdatePassword(this)' id=".$row['id']."></td>
                                                        <td>".$row["userIP"]."</td>
                                                           <td>".$status."</td>
                                                        <td>
                                                      
                                                        <button class='delete my-btn my-red' id=".$row["id"].">Delete</button>
                                                        </td>
                                                       
                                                    </tr>";
                                                    }
                                                    } else {
                                                    echo "0 results";
                                                    }
                                                    ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="javascript:addUser();" id="addUser" method="post">
                    <center>
                        <h3>+ Add User</h3>
                    </center>
                    <input type="text" class="signup form-control" id="usernametext" placeholder="Username" required="">
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
                    <label for="">Select Language</label>
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
                        <option value="Polish">Polis<script src="assets/js/select2.min.js"></script>European">Portuguese
                            - European</option>
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
                        <option value="Yiddish">Yidd<script src="assets/js/select2.min.js"></script>a</option>
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



<?php
include_once('footer.php');
?>