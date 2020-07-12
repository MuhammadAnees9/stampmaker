<?php
include "dbConfig.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="http://hongru.github.io/proj/canvas2image/canvas2image.js"></script>
    <script type="text/javascript" src="customCircularLibrary.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript" src="modals.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="dashboard/js/select2.min.js"></script>
    <link href="dashboard/css/select2.min.css" rel="stylesheet" />
    <title>Stamp Maker</title>
</head>

<body>
    <div class="container">
        <?php ?>
        <div class="row shadow-sm bg-primary p-3 text-white">
            <h3 class="col-lg-3" style="padding:20px;">Stamp Maker</h3>
            <div class="col">
                <button class="btn" id="addroundtext" title="Text Around The Circle">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px"
                        height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path fill="#ffffff"
                            d="M136 153l-37 0 -10 23 -27 0 49 -102 27 0 27 55c-12,5 -22,13 -29,24zm5 -17l-17 -38 -17 38 34 0zm-21 -126c-61,0 -110,50 -110,111 0,61 49,110 110,110 7,0 13,0 20,-2 -7,-6 -12,-14 -16,-23 -1,0 -2,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,1 0,2 9,3 18,8 24,15 1,-6 2,-12 2,-17 0,-61 -50,-111 -111,-111zm60 140l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -28 0 -2zm2 -15c-30,4 -50,30 -46,58 3,27 27,50 58,46 16,-2 27,-10 34,-18 19,-23 15,-57 -6,-74 -11,-9 -24,-14 -40,-12z">
                        </path>
                        <svg>
                            <br><span style="color:white;">Round Text</span>
                </button>
                <button class="btn" id="addlinetext" title="Line Text">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px"
                        height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path fill="#ffffff"
                            d="M5 236l60 1 15 -38 45 0c-1,-20 3,-35 15,-50 1,-1 1,-2 2,-2l-41 -1 24 -59 22 54c1,0 7,-5 10,-7 13,-8 27,-11 43,-10l-45 -113 -60 0 -90 225zm180 -82l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12z">
                        </path>
                    </svg>
                    <br><span style="color:white;">Line Text</span>
                </button>
                <button class="btn" id="addcircle" title="Circle">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px"
                        height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path fill="#ffffff"
                            d="M125 15c-61,0 -110,49 -110,110 0,61 49,110 110,110 7,0 13,0 20,-1 -7,-7 -12,-15 -16,-24 -1,0 -3,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,2 0,2 9,3 17,8 24,15 1,-6 1,-11 1,-17 0,-61 -49,-110 -110,-110zm60 139l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12z">
                        </path>
                    </svg>
                    <br><span style="color:white;">Circle</span>
                </button>
                <button class="btn" id="addimage" title="Image">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px"
                        height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path class="add_el_path" fill="#ffffff"
                            d="M185 154l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12zm-83 -25c0,-11 -8,-20 -19,-20 -11,0 -20,9 -20,20 0,11 9,20 20,20 11,0 19,-9 19,-20zm-44 72l0 23 69 0c-2,-7 -4,-14 -4,-21 0,-22 12,-41 29,-53l-9 -12 -20 29 -25 -11 -40 45zm32 -174l-58 61 0 164 114 0c-5,-5 -9,-9 -12,-14l-88 0 0 -144 53 0 0 -53 101 0 0 99c5,1 9,3 14,5l0 -118 -124 0zm-5 26l0 27 -25 0 25 -27z">
                        </path>
                    </svg>
                    <br><span style="color:white;">Image</span>
                </button>
            </div>
            <?php
                                getNav();
                                function getNav(){
                                if(isset($_SESSION["uid"]))
                                {
                                    $d = $_SESSION["uid"];
                                echo "<h6 style='margin:20px;'>Welcome, ".$d['username']."</h6><button class='modals btn btn-danger btn-md' onclick='logout()' style='height:40px;margin:20px;'>Log Out</button>";
                                if($d['role'] == "admin"){
                                echo "<button class='modals btn btn-secondary btn-md' onclick='Dashboard()' style='height:40px;margin:20px;'>Dashboard</button>";
                                }
                                
                                }
                                else{
                                echo "<button type='button' class='btn btn-success btn-sm modals' data-toggle='modal' data-target='#myModal' style='height:40px;margin:20px;'>Sign Up</button><button type='button' class='btn btn-success btn-sm modals' data-toggle='modal' data-target='#myModalLogin' style='height:40px;margin:20px;' onclick='reset()'>Log In</button>";
                                }
                                
                                }
                                ?>
        </div>
        <div class="scrolling-wrapper" id="labels">
        </div>
        <!-- Scrolling Wrapper End-->
        <div class="row">
            <div class="col shadow-sm canvas" style="height:400px;">
            </div>
            <div class="col" id="properties" style="height:400px;">
                <div class="guide">
                    <u><b>Create a round stamp</b></u><br>
                    Select <b>Circle</b> element to add a stamp circle<br>
                    Edit the circle, change its radius and stroke width<br>
                    Select <b>Round</b> Text element to add a text around the circle<br>
                    Enter and edit the text, change spacing and rotate it clockwise<br>
                    Select <b>Line</b> Text element to add a text in the center<br>
                    Enter and edit the text, move or rotate it<br>
                    Select <b>Image</b> element to add an image<br>
                    Upload the image, change its size and position<br>
                    Add any numbers of elements<br>
                    Delete elements clicking on <b>delete x</b> <br>
                    <b>Download</b> your stamp
                </div>
            </div>
        </div>
        <br>
        <div class="col-lg">
            <?php $session = (isset($_SESSION['sessionid']))?$_SESSION['sessionid']:'null';?>
            <center>
                <button class="btn btn-lg btn-success shadow" id="downloads"
                    onclick="down('<?php echo $session?>')">Download</button>
            </center>
        </div>
    </div>
    <script>
    // $(document).click(function(){
    // alert($("#colorpicker").spectrum("get").toHex());
    // })
    </script>
    <!-- Modal Of Sign Up -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="javascript:ajaxCall()" method="post">
                        <center>
                            <h3>Sign Up</h3>
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
                        <emp style="font-size:15px;text-decoration:underline;" class="notInlisted" id="source">*
                            Language Not Inlisted?</emp>
                        <br>
                        <input type="text" class="signup form-control" id="lang2" placeholder="Write Language Here">
                        <br>
                        <select class="form-control" id="langTarget" required="">
                            <option selected="" value="" disabled="">Select Target Language</option>
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
                        <p style="font-size:15px;text-decoration:underline;" id="target">* Language Not Inlisted?</p>
                        <input type="text" class="signup form-control" id="lang3" placeholder="Write Language Here">
                        <label class="checkbox-inline">
                            Not a translator? &nbsp;&nbsp;<input type="checkbox" id="notatranslator">
                        </label>
                        <textarea class="form-control" placeholder="Reason of using (Not a translator)"
                            id="reason"></textarea>
                        <br>
                        <label class="checkbox-inline">
                            I have read and accept Terms and Conditions. &nbsp;&nbsp;<input type="checkbox" id="accept"
                                required="">
                        </label>
                        <br>
                        <center>
                            <button class="btn btn-md btn-success modals" id="signup">Sign Up</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                        <input type="text" class="signup form-control" id="usernameLogin" placeholder="Username"
                            required="">
                        <br>
                        <input type="password" class="signup form-control" id="passLogin" placeholder="Password"
                            required="">
                        <br>
                        <center>
                            <h6 style="font-weight:normal;">Not registered yet.<a id="reg" onclick="notauser();">Click
                                    here</a></h6>
                        </center>
                        <center>
                            <button class="btn btn-md btn-success modals" id="login">Log In</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <?php
                if(empty($_SESSION["username"])){
                }else{
                getSuggest();
                }
                function getSuggest(){
                echo "<div class='suggest bottomright'>
                    <center><h5>Leave Suggestion</h5></center>
                    <textarea type='text' class='signup form-control' id='suggestText' placeholder='Enter your concerns or suggestions here.' required=''></textarea>
                    <br><center><button class='modals btn btn-md btn-success' onclick='suggestion()'>Send</button></center>
                </div><div class='demo bottomright' onclick='togglesuggestions()'>
                To send your concerns or suggestions.<b>Click Here</b>
            </div>";
            }
            ?>
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
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
});
var idleTime = 0;
$(document).ready(function() {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function(e) {
        idleTime = 0;
    });
    $(this).keypress(function(e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 240) {
        $.ajax({
            url: "logout.php", //the page containing php script
            type: "post", //request type,
            dataType: 'json',
            success: function(response) {
                if (response.abc == "done") {
                    swal("You Have Been Logout",
                        "You have been logout, Reason: Inactive for about 4 hours.", "warning").then(
                        function() {
                            location.reload();
                        });
                }
            }
        });
    }
}
</script>