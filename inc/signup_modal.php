<style type="text/css">
    /***** Stamp Maker new ******/

.modal-dialog-signup .modal-content{
    border: 2px solid #52a6ef;
}

.signup-modals{
  color: #2f88d4;
}   

.signup-modals-body{
    padding: 10px 80px 40px;
} 

.signup-input{
  border: none;
  padding-left: 40px;
  border-bottom: 3px solid #7abcf3;
}

.signup-input::placeholder {
  color: #41a0efad;
}

.signup-heading{
  color: #0e6cbb;
  font-weight: 400;
  letter-spacing: 1px;
  text-align: center;
  padding: 15px 35px;
}

.signup-select-label{
    font-weight: 900;
    color: #22639a;
}

.signup-label{
    color: #22639a;
}

.signup-select{
    border: 2px solid #82baea8f;
    color: #007bff;
    background-color: #c9e1f559;
}

.signup-icons{
    position: absolute; 
    padding: 9px; 
    pointer-events: none; 
    font-size: 20px; 
    color: #72b6ec;
}

.form-input-row{
    position: relative;
}

.signup-submit-btn{
    background-color: #ff8800;
    border: none;
    color: #ffffff;
}
</style>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-signup modal-lg">
        <div class="modal-content">
            <div>
                <h3 class="signup-heading">Sign Up <button style="color: #0764b3;" type="button" class="close" data-dismiss="modal">&times;</button></h3> 
            </div>
            <div class="modal-body signup-modals-body">
                <form action="javascript:ajaxCall()" method="post">
                    <div class="form-input-row">
                        <i class="fa fa-user signup-icons"></i>
                        <input type="text" class="signup signup-input form-control" id="usernametext" placeholder="Username" required="">
                    </div>
                    <br>
                    <div class="form-input-row">
                        <i class="fa fa-envelope signup-icons"></i>
                        <input type="text" class="signup signup-input form-control" id="email" placeholder="Email" required="">
                    </div>    
                    <br>
                    <div class="form-input-row">
                        <i class="fa fa-key signup-icons"></i>
                        <input type="password" class="signup signup-input form-control" id="pass" placeholder="Password" required="">
                    </div>    
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label class="signup-select-label">Select Native / Source Language</label>
                          <select class="form-control signup-select" id="langS" required="">
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
                        <emp style="font-size:15px;text-decoration:underline; color: #22639a;" class="notInlisted" id="source">*
                            Language Not Inlisted?</emp>
                        </div>
                        <div class="form-group col-md-6">
                          <input type="text" class="signup form-control" id="lang2" placeholder="Write Language Here">
                          <label class="signup-select-label">Select Target Language</label>
                            <select class="form-control signup-select" id="langTarget" required="">
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

                            <p style="font-size:15px;text-decoration:underline; color: #22639a;" id="target">* Language Not Inlisted?</p>
                        </div>
                    </div>
                    
                    <input type="text" class="signup form-control" id="lang3" placeholder="Write Language Here">

                    <label class="checkbox-inline signup-label">
                        Not a translator? &nbsp;&nbsp;<input type="checkbox" id="notatranslator">
                    </label>
                    <textarea class="form-control" placeholder="Reason of using (Not a translator)" id="reason"></textarea>
                    <br>
                    <label class="checkbox-inline signup-label">
                        I have read and accept <a href="inc/terms.php" target="_blank">Terms and Conditions.</a>
                        &nbsp;&nbsp;<input type="checkbox" id="accept" required="">
                    </label>
                    <br>
                    <a href="inc/terms.php" style="float:right;" target="_blank">Terms and conditions</a><br>
                    <a href="inc/privacy.php" style="float:right;" target="_blank">Privacy notice</a>
                    <div class="field-group">
                        <div><input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["usernameLogin"])) { ?> checked <?php } ?> />
                            <label class="signup-label" for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <br><br>
                    <center>
                        <button class="btn btn-md btn-warning signup-submit-btn modals" id="signup">Sign Up</button>
                    </center>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
