<?php
  if (isset($_REQUEST['email']))  {
  //Email information
  $admin_email = "ibnelaiq@gmail.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  //Email response
  echo "Test Successful !!!";
  }
  //if "email" variable is not filled out, display the form
  else  {
?>
 <form method="post">
  Email: <input name="email" type="text" required/><br />
  Subject: <input name="subject" type="text" required/><br />
  Message:<br />
  <textarea name="comment" rows="15" cols="40"></textarea><br />
  <input type="submit" value="Submit" />
  </form>
<?php
  }