<?php
  if($_POST['id']){
                  $_SESSION['id']  =$_POST['id'];
                    $_SESSION["username"] = $_POST['username'];
                    $_SESSION["email"] = $_POST['email'];
                    $_SESSION["role"] = $_POST['role'];
                    $_SESSION["isLogin"] = $_POST['isLogin'];
                    $_SESSION['uid'] = $_POST['id']; 
   }

?>