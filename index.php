<?php
session_start();

include_once('header.php');

?>

<!-- <div id="measure"></div> -->
<header class="header">
    <div class="container-fluid" style="margin: 0px; padding: 0px;">
        <div class="row" style="margin: 0px; padding: 0px;">
            <div class="col-lg-9 col-md-8 col-sm-5 text-center text-white brand">
                <img class="d-inline" src="logo.png" width="120px" />
                <h1 class="d-inline">My Stamp Maker</h1>

            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 text-center">
                <div class="btns-wrapper">
                    <?php
                    getNav();
                    function getNav()
                    {
                        if (isset($_SESSION["uid"])) {

                            $d = $_SESSION["uid"];
                            echo "<h6 style='margin:20px;'>Welcome, " . $d['username'] . "</h6><button class='btn btn-outline-warning' onclick='logout()' style='height:40px;margin:20px;'>Log Out</button>";
                            if ($d['role'] == "admin") {
                                echo "<button class='btn btn-outline-warning' onclick='Dashboard()' style='height:40px;margin:20px;'>Dashboard</button>";
                            }
                        } else {
                            echo "<button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#myModal' style='height:40px;margin:20px;'>Sign Up</button><button type='button' class='btn btn-outline-warning' data-toggle='modal' data-target='#myModalLogin' style='height:40px;margin:20px;' onclick='reset()'>Log In</button>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</header>
<div class="container-fluid">
    <div class="row mt-lg-4 wrapper" style="position: relative;">
        <div class="btns" style="padding:0px;">
            <ul class="list-group">
                <li class="list-group-item">

                    <button class="btn o" id="addroundtext" title="Text Around The Circle">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M136 153l-37 0 -10 23 -27 0 49 -102 27 0 27 55c-12,5 -22,13 -29,24zm5 -17l-17 -38 -17 38 34 0zm-21 -126c-61,0 -110,50 -110,111 0,61 49,110 110,110 7,0 13,0 20,-2 -7,-6 -12,-14 -16,-23 -1,0 -2,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,1 0,2 9,3 18,8 24,15 1,-6 2,-12 2,-17 0,-61 -50,-111 -111,-111zm60 140l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -28 0 -2zm2 -15c-30,4 -50,30 -46,58 3,27 27,50 58,46 16,-2 27,-10 34,-18 19,-23 15,-57 -6,-74 -11,-9 -24,-14 -40,-12z">
                            </path>
                        </svg>

                        <br><span style="color:black;">Round Text</span>
                    </button>
                </li>
                <li class="list-group-item">
                    <button class="btn o" id="addlinetext" title="Line Text">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M5 236l60 1 15 -38 45 0c-1,-20 3,-35 15,-50 1,-1 1,-2 2,-2l-41 -1 24 -59 22 54c1,0 7,-5 10,-7 13,-8 27,-11 43,-10l-45 -113 -60 0 -90 225zm180 -82l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12z">
                            </path>
                        </svg>
                        <br><span style="color:black;">Line Text</span>

                    </button>
                </li>
                <li class="list-group-item">
                    <button class="btn o" id="addcircle" title="Circle">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path fill="#000000" d="M125 15c-61,0 -110,49 -110,110 0,61 49,110 110,110 7,0 13,0 20,-1 -7,-7 -12,-15 -16,-24 -1,0 -3,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,2 0,2 9,3 17,8 24,15 1,-6 1,-11 1,-17 0,-61 -49,-110 -110,-110zm60 139l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12z">
                            </path>
                        </svg>
                        <br><span style="color:black;">Circle</span>


                    </button>
                </li>
                <li class="list-group-item">
                    <button class="btn o" id="addimage" title="Image">
                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path class="add_el_path" fill="#000000" d="M185 154l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -27 0 -3zm2 -15c-30,4 -50,30 -47,58 3,27 28,50 58,47 16,-2 28,-10 35,-19 19,-22 15,-56 -6,-74 -11,-8 -25,-14 -40,-12zm-83 -25c0,-11 -8,-20 -19,-20 -11,0 -20,9 -20,20 0,11 9,20 20,20 11,0 19,-9 19,-20zm-44 72l0 23 69 0c-2,-7 -4,-14 -4,-21 0,-22 12,-41 29,-53l-9 -12 -20 29 -25 -11 -40 45zm32 -174l-58 61 0 164 114 0c-5,-5 -9,-9 -12,-14l-88 0 0 -144 53 0 0 -53 101 0 0 99c5,1 9,3 14,5l0 -118 -124 0zm-5 26l0 27 -25 0 25 -27z">
                            </path>
                        </svg>
                        <br><span style="color:black;">Image</span>

                    </button>
                </li>

            </ul>
        </div>
        <!--Labels -->
        <div class="col-lg-2 col-sm-2 col-md-3 col-3" id="labels-container" style="border: none; ">
            <div class="card labels-card elementlabel">
                <h5 class="text-center">Labels</h5>
                <div class="card-body" id="labels">

                </div>
            </div>

        </div>

        <!-- Canvas -->
        <div class="col-lg-6 col-sm-8 col-md-6 col-9 canvas-col">
            <div class="row">
                <!-- <ul class="bookmarks col-lg-2 col-sm-2 col-md-3 col-2" id="labels">
        </ul> -->
                <div class="col-lg-2 col-md-2 left-banner" style="padding:0px; height:21em">
                    <img src="assets/img/banner.jpg" alt="" style="width:100%; height:100%">
                </div>
                <div class="col-lg-8 col-sm-12 col-md-8 col-12 ">
                    <center>
                        <div id="stageparent" class="canvas-stageparent">
                            <div id="parent_sub">
                                <!-- <div id="container"></div> -->
                                <div class="canvas"></div>
                                <center class="canvas-btns">

                                    <div class="canvasBtns">
                                        <button class="btn btn-outline-secondary btn-sm modals" onclick="plusStage()">+</button> |

                                        <button class="btn btn-outline-secondary btn-sm modals" onclick="minusStage()">-</button> |

                                        <button class="btn btn-outline-secondary btn-sm modals" onclick="real()">100%</button> |

                                        <button class="btn btn-outline-secondary btn-sm modals" onclick="fit()">[ ]</button>
                                    </div>
                                </center>

                            </div>
                        </div>
                    </center>
                    <center class=" mt-2 download-btn">
                        <?php $session = (isset($_SESSION['uid'])) ? $_SESSION['sessionid'] : 'null'; ?>
                        <button class="btn btn-lg btn-warning shadow" id="downloads" onclick="down('<?php echo $session ?>')">Download</button>

                    </center>
                </div>
                <div class="col-lg-2 col-md-2 right-banner" style="padding:0px; height:21em">
                    <img src="assets/img/banner.jpg" alt="" style="width:100%; height:100%" />
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-sm-12 col-md-3 col-12 right-panel" id="properties" style="height:auto;">

        </div>

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
                    <input type="text" class="signup form-control" id="usernametext" placeholder="Username" required="">
                    <br>
                    <input type="text" class="signup form-control" id="email" placeholder="Email" required="">
                    <br>
                    <input type="password" class="signup form-control" id="pass" placeholder="Password" required="">
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
                        echo json_encode(array("abc"=>'admin')); <option value="Czech">Czech</option>
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
                    <textarea class="form-control" placeholder="Reason of using (Not a translator)" id="reason"></textarea>
                    <br>
                    <label class="checkbox-inline">
                        I have read and accept <a href="terms.php" target="_blank">Terms and Conditions.</a>
                        &nbsp;&nbsp;<input type="checkbox" id="accept" required="">
                    </label>
                    <br>
                    <a href="terms.php" style="float:right;" target="_blank">Terms and conditions</a><br>
                    <a href="privacy.php" style="float:right;" target="_blank">Privacy notice</a>
                    <div class="field-group">
                        <div><input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["usernameLogin"])) { ?> checked <?php } ?> />
                            <label for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <br><br>
                    <center>
                        <button class="btn btn-md btn-success modals" id="signup">Sign Up</button>
                    </center>
                </form>

            </div>
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
</div>
<div class='demo bottomleft seggestions-section'>
    <div id='howto' onclick='toggleinstruction()'>
        To view Instruction or 'How To'.<b>Click Here</b>
    </div>
    <div class='suggest  bottomleft' id='suggestIns'>
        <div class="card">
            <div class="card-body">

                <!-- <center> -->
                <h5>Instructions</h5>
                <!-- </center> -->
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
</div>


<!-- Footer -->
<!-- Footer -->
<?php
if (empty($_SESSION["uid"])) {
} else {
    getSuggest();
}

function getSuggest()
{
    echo "
          
          <div class='suggest bottomright' id='suggest'>
          <center><h5>Leave Suggestion</h5></center>
          <textarea type='text' class='signup form-control' id='suggestText' placeholder='Enter your concerns or suggestions here.' required=''></textarea>
          <br><center><button class='modals btn btn-md btn-success' onclick='suggestion()'>Send</button></center>
        </div>
        
<div class='demo bottomright' onclick='togglesuggestions()'>
To send concerns or suggestions.<b>Click Here</b>
</div>



";
}
?>

<?php
include_once('footer.php')
?>