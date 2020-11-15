<?php 
require_once("db_class.php"); 

if(isset($_POST['submit_login_form']) && isset($_POST['user_id']) && !empty($_POST['user_id'])
 && isset($_POST['password']) && !empty($_POST['password'])){
    
    //create user_id and initial password
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    
    // do database stuff
    $db = new user_db;
    list($validity, $error) = $db->authenticate($user_id, $password);
    if(!$validity){
        echo $error;
    }
    else{
        echo "user authenticated<br>";
        require_once("../dashboard.php");
    }
}
else{
    echo "login error";
}


?>
