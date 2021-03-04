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
} ?>