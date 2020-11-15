<?php
    if(isset($_POST['submit_login_form']) && isset($_POST['user_id']) && isset($_POST['password'])
     && !empty($_POST['user_id']) && !empty($_POST['password'])){
         echo "submitted from login form";
     }
     else if(isset($_POST['submit_signup_form']) && isset($_POST['username'])&& !empty($_POST['username'])){
        echo "submitted from signup form";
    }
     else{
        header("Location: login.php");
    }

    echo "<br>dashboard";
?>