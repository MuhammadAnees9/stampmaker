<?php
session_start();

include_once('header.php');

?>

<div id="measure"></div>
<div class="container shadow-sm p-3 text-white" style="background-color:#331C6F">
    <div class="row no-gutter">
	    <div class="col-sm-8 col-lg-8 col-md-7 col-xs-7">
		    <div class="row no-gutters">
			    <div class="col-sm-4 col-lg-5 col-md-4 col-xs-4">
				<img style="float:right" src="logo.png" />
			    </div>
			    <div class="col-sm-8 col-lg-7 col-md-7 col-xs-8">
				<h2 style="padding-top:25px; font-size: 40px">My Stamp Maker</h2>
			    </div>
		    </div>
		  
	    </div>
        <div class="col-sm-4 col-lg-4 col-md-5 col-xs-5">
            <center>
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
            </center>

        </div>
    </div>
</div>

<div class="container">
    <!-- Scrolling Wrapper End-->
    <div class="row">
        <ul class="bookmarks col-lg-2 col-sm-2 col-md-3 col-2" id="labels">
        </ul>
        <div class="col-lg-6 canvas col-sm-3 col-10 col-md-4" style="margin-top:40px;">

        </div>
        <br>
        <div class="col-lg-4 col-sm-12 col-md-12 col-xs-3" id="properties" style="height:auto;margin-top:40px;">
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
        <?php $session = (isset($_SESSION['uid']))?$_SESSION['sessionid']:'null';?>
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
                    <textarea class="form-control" placeholder="Reason of using (Not a translator)"
                        id="reason"></textarea>
                    <br>
                    <label class="checkbox-inline">
                        I have read and accept <a href="terms.php" target="_blank">Terms and Conditions.</a>
                        &nbsp;&nbsp;<input type="checkbox" id="accept" required="">
                    </label>
                    <br>
                    <a href="terms.php" style="float:right;" target="_blank">Terms and conditions</a><br>
                    <a href="privacy.php" style="float:right;" target="_blank">Privacy notice</a>
                    <div class="field-group">
                        <div><input type="checkbox" name="remember" id="remember"
                                <?php if(isset($_COOKIE["usernameLogin"])) { ?> checked <?php } ?> />
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
                    <input type="text" class="signup form-control" id="usernameLogin"
                        value="<?php if(isset($_COOKIE["usernameLogin"])) { echo $_COOKIE["usernameLogin"]; } ?>"
                        placeholder="Username" required="">
                    <br>
                    <input type="password" class="signup form-control" id="passLogin" placeholder="Password" required=""
                        value="<?php if(isset($_COOKIE["passLogin"])) { echo $_COOKIE["passLogin"]; } ?>">
                    <br>

                    <center>
                        <h6 style="font-weight:normal;">Not registered yet.<a id="reg" onclick="notauser();">Click
                                here</a></h6>
                    </center>
                    <div class="field-group">
                        <div><input type="checkbox" name="remember" id="remember"
                                <?php if(isset($_COOKIE["usernameLogin"])) { ?> checked <?php } ?> />
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
<div class='suggest  bottomleft' id='suggestIns'>
    <center>
        <h5>Instructions</h5>
    </center>
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
<div class='demo bottomleft' id='howto' onclick='toggleinstruction()'>
    To view Instruction or 'How To'.<b>Click Here</b>
</div>

<!-- Footer -->
<!-- Footer -->
<?php
if(empty($_SESSION["uid"])){

}else{
getSuggest();  
}

function getSuggest(){
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
