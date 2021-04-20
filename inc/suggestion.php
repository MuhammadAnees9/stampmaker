<?php 
if (empty($_SESSION["uid"])) {
} else {
    getSuggest();
}

function getSuggest()
{
    echo "
        <div class='demo bottomright seggestions-section'> 
        	<div id='suggestionbox' onclick='togglesuggestions()'>
	            To send concerns or suggestions.<b>Click Here</b>
	        </div>
	        <div class='suggest' id='suggest'>
	        	<div class='card'>
                    <div class='card-body'>
				        <center><h5>Leave Suggestion</h5></center>
				        <textarea type='text' class='signup form-control' id='suggestText' placeholder='Enter your concerns or suggestions here.' required=''></textarea>
				        <br><center><button class='modals btn btn-md btn-success' onclick='suggestion()'>Send</button></center>
				    </div>
				</div>        
	        </div>
	    </div>
    ";
} ?>
