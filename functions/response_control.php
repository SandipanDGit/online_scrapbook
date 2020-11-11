<?php 
session_start();
if(isset($_POST['submit_response']) && isset($_POST['responder']) && !empty($_POST['responder'])
    && isset($_POST['response']) && !empty($_POST['response'])){

    echo $_POST['responder'] . ' wrote -' . '"' . $_POST['response'] .'"' ;
    
    //generate unique token     //include create_token.php
    //do database stuff         //include db.php
    //do link creation          
    //set session with link, name, password           
    //show dashboard            //include dashboard.php
}
else{
    $_SESSION['signup_error'] = "signup error";
    // header("Location: ../entry.php");
}


?>
