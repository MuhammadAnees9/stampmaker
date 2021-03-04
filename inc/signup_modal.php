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
                        I have read and accept <a href="inc/terms.php" target="_blank">Terms and Conditions.</a>
                        &nbsp;&nbsp;<input type="checkbox" id="accept" required="">
                    </label>
                    <br>
                    <a href="inc/terms.php" style="float:right;" target="_blank">Terms and conditions</a><br>
                    <a href="inc/privacy.php" style="float:right;" target="_blank">Privacy notice</a>
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