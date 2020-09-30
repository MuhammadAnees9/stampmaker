<html>
    <head>
    <?php
include "dbConfig.php";
session_start();
?>
    <link rel="icon" type="image/png" href="logofav.png" sizes="32x32">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171780865-1"></script>
    <script src="google_anylatic.js">
    </script>

<meta name="viewport" content="initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="http://hongru.github.io/proj/canvas2image/canvas2image.js"></script>

    <script type="text/javascript" src="customCircularLibrary.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript" src="modals.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <title>Stamp Maker</title>
        <link href="css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <nav>
            <div id="spacer-1">
            </div>
            <img src="img/logo.PNG">
            <h1>My Stamp Maker</h1>
            <div id="buttons">
                <div id="buttonPre">
                <?php
      getNav();
      function getNav(){
      if(isset($_SESSION["username"]))
      {
        echo "<h6 style='color:white'>Welcome, ".$_SESSION["username"]."</h6><button class='modals btn btn-danger btn-md' onclick='logout()' style='height:40px;'>Log Out</button>&nbsp;";
        if($_SESSION["username"] == "admin"){
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
                    <img id="addlinetext" src="img/linetext.PNG"/>
                    <img id="addroundtext" src="img/roundtext.PNG"/>
                    <img class="addcircle" src="img/shape.PNG"/>
                    <img id="addimage" src="img/image.PNG"/>    
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
                    <img id="addlinetext" src="img/mobilelinetext.PNG"/>
                    <img id="addroundtext" src="img/mobileround.PNG"/>
                    <img class="addcircle" src="img/mobileshape.PNG"/>
                    <img id="addimage" src="img/mobileimage.PNG"/>
                    
                </div>
                
            </div>
            <div id="mobileDownloadButtonParent">
                <button id="mobileDownloadButton" class="shadow">Download</button>
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
                <br>
                         
            </div>
     
            <div id="banner1">
                <img src="img/2.png">
            </div>
            <div id="propertyParent">
               
            </div>

            <!-- <input type='file' id='InputPictureSrc-" + (Pictures.length) + "' name='files' /></div>            <div class='slidecontainer'>      Horizontal Position:  <span class='range-slider__value'>0</span> <input type='range' id='InputPictureHorizontalPosition-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='126' >      </div>           <div class='slidecontainer'>     Vertical Position:  <span class='range-slider__value'>0</span>    <input type='range' id='InputPictureVerticalPosition-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='126' >      </div>          <div class='slidecontainer'>   Size:  <span class='range-slider__value'>0</span>     <input type='range' id='InputPictureSize-" + (Pictures.length) + "'  class='slider' min='1' max='250' value='250' >      </div>           <div class='slidecontainer'>      Rotation:   <span class='range-slider__value'>0</span>  <input type='range' id='InputPictureRotation-" + (Pictures.length) + "'  class='slider' min='0' max='360' value='0' >      </div>  </div> -->
                                    </div> 
            
            <div id="DownloadButtonParent">
                <button id="DownloadButton" class="shadow">Download</button>
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
        
        <script src="js/jquery.js"></script>
        <script>
            $(document).ready(function(){
                $("#content").slideToggle(1);
                $("#suggestions #content").slideToggle(1);
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
                            I have read and accept <a href="terms.php" target="_blank">Terms and Conditions.</a>
                            &nbsp;&nbsp;<input type="checkbox" id="accept" required="">
                        </label>
                        <br>
                        <a href="terms.php" style="float:right;" target="_blank">Terms and conditions</a><br>
                        <a href="privacy.php" style="float:right;" target="_blank">Privacy notice</a>
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
                    <form action="javascript:login()" method="post">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css" rel="stylesheet"/>
    <script type="text/javascript">
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

    </body>
</html>