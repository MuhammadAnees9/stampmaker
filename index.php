<?php
include_once('header.php');

?>
 <title>Stamp Maker</title>
        <link href="css/style.css" rel="stylesheet"/> 
    </head>
    <body>
        <nav>
            <div id="spacer-1">
            </div>
            <img src="img/logo.PNG">
            <h1>My Stamp Maker&nbsp;&nbsp;&nbsp;<span><a href="pageMaker/index.html">My Page Maker</a></span></h1>
            
            <div id="buttons">
                <div id="buttonPre">
                <?php
      getNav();
              function getNav(){
                                if(isset($_SESSION["uid"]))
                                {
                                   
                                    $d = $_SESSION["uid"];
                                echo "<h6 style='color:white'>Welcome, ".$_SESSION["username"]."</h6><button class='modals btn btn-danger btn-md' onclick='logout()' style='height:40px;'>Log Out</button>&nbsp;";
                                if($d['role'] == "admin"){
                                echo "<button class='modals btn btn-secondary btn-md' onclick='Dashboard()' style='height:40px;'>Dashboard</button>";
                                }
                                
                                }
                                else{
                                echo "<button id='signup' data-toggle='modal' data-target='#myModal' >Sign Up</button> &nbsp;<button id='login' data-toggle='modal' data-target='#myModalLogin' onclick='reset()'>Sign In</button>";
                                }
                                
                                }

      ?>
                        
             
    
                </div>
                
            </div>
        </nav>
        
        <div id="mainContainer">
            <div id="bar" class="shadow">
                <div id="pcIcons">
                    <img class="addlinetext" src="img/linetext.PNG"/>
                    <img class="addroundtext" src="img/roundtext.PNG"/>
                    <img class="addcircle" src="img/shape.PNG"/>
                    <img class="addimage" src="img/image.PNG"/>    
                    <div id="abouts">

                    <center><h5 id="about">About</h5></center>
                    <div id="aboutText">
                       <p> Email:
sayapingeorge@gmail.com

Address: MyStampMaker

Brentwood Street, 30709

Southfield, MI 48076

United States

Company Name: My Stamp
Maker
</p>
                        </div>
                    </div>
                    

                </div>
                <div id="mobileIcons">
                    <img class="addlinetext" src="img/mobilelinetext.PNG"/>
                    <img class="addroundtext" src="img/mobileround.PNG"/>
                    <img class="addcircle" src="img/mobileshape.PNG"/>
                    <img class="addimage" src="img/mobileimage.PNG"/>
                    
                </div>
                
            </div>

            <?php $session = (isset($_SESSION['sessionid']))?$_SESSION['sessionid']:'null';?>
            <div id="mobileDownloadButtonParent">
                <button id="mobileDownloadButton" class="shadow" id="downloads"  onclick="down('<?php echo $session?>')">Download</button>
            </div>
            
    

            <div id="layers" class="shadow">
                
            </div>
            <div id="banner1">
                <img src="img/1.png">
            </div>
            <div id="canP">
                <div class="canvas">

                </div>
                <br>
                <center>
                    <div id="tools">
                        <span>+</span> | <span>-</span> | <span>100%</span> | <span>[ ]</span> 
                    </div>    
                </center>
               
                <br>
                <br>
                         
            </div>
     
            <div id="banner1">
                <img src="img/2.png">
            </div>
            <div id="propertyParent">
               
            </div>

            <!-- <input type='file' id='InputPictureSrc-" + (Pictures.length) + "' name='files' /></div>            <div class='slidecontainer'>      Horizontal Position:  <span class='range-slider__value'>0</span> <input type='range' id='InputPictureHorizontalPosition-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='126' >      </div>           <div class='slidecontainer'>     Vertical Position:  <span class='range-slider__value'>0</span>    <input type='range' id='InputPictureVerticalPosition-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='126' >      </div>          <div class='slidecontainer'>   Size:  <span class='range-slider__value'>0</span>     <input type='range' id='InputPictureSize-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='250' >      </div>           <div class='slidecontainer'>      Rotation:   <span class='range-slider__value'>0</span>  <input type='range' id='InputPictureRotation-" + (Pictures.length) + "'  class='slider' min='0' max='360' value='0' >      </div>  </div> -->
                                    </div> 
            
            <?php $session = (isset($_SESSION['sessionid']))?$_SESSION['sessionid']:'null';?>
            <div id="DownloadButtonParent">
                <button id="DownloadButton" class="shadow" id="downloads"  onclick="down('<?php echo $session?>')">Download</button>
            </div>
            
        </div>
        <div id="measure">
            
        </div>
        
        <div id="mobileInstructions">
            <center>Instructions</center><br>

Select Circle element to add a stamp circle<br>

Edit the circle, change its radius and stroke
width<br>

Select Round Text element to add a text
around the circle<br>

Enter and edit the text, change spacing and
rotate it clockwise<br>

Select Line Text element to add a text in the
center<br>

Enter and edit the text, move or rotate it<br>

Select Image element to add an image<br>

Upload the image, change its size and
position<br>

Add any numbers of elements<br>

Delete elements clicking on delete x<br>

Download your stamp
<br><br><br><br>
        </div>
       
        <div id="instructions">
            <div id="top">
                To View Instructions or "How to". Click Here
            </div>
            <div id="content">
                <center>Instructions</center><br>

Select Circle element to add a stamp circle<br>

Edit the circle, change its radius and stroke
width<br>

Select Round Text element to add a text
around the circle<br>

Enter and edit the text, change spacing and
rotate it clockwise<br>

Select Line Text element to add a text in the
center<br>

Enter and edit the text, move or rotate it<br>

Select Image element to add an image<br>

Upload the image, change its size and
position<br>

Add any numbers of elements<br>

Delete elements clicking on delete x<br>

Download your stamp
            </div>
           
        </div>
        <?php
if(empty($_SESSION["username"])){

}else{?>
<div id="suggestions">
            <div id="top">
                Suggestions and Concerns Click Here
            </div>
            <div id="content">
                <center>Enter your Concerns and Suggestions Below:</center><br>
                <input type="text" id='suggestText'  required> 
                <br>
                <br>
                <center><button onclick='suggestion()' class="modals">Send</button></center>
            </div>
           
        </div>


<?php } ?>
        <script>
            $(document).ready(function(){
                $("#content").slideToggle(1);
                $("#suggestions #content").slideToggle(1);
                $("#aboutText").fadeToggle();
            });
            $("#about").click(function(){
                $("#aboutText").fadeToggle();
            })
            $("#instructions").click(function(){
                $("#instructions #content").slideToggle();
            })
            $("#suggestions #top").click(function(){
                $("#suggestions #content").slideToggle();
            })
        </script>

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
<script>
    function layerSplit(){
    $(".layer").each(function(index,element){
    var t = $(element).text().split("#").pop().split("Delete")[0];

    
});
}</script>