<?php 
require_once("db_class.php"); 
require_once("create_unique_id.php");

if(isset($_POST['submit_signup_form']) && isset($_POST['username']) && !empty($_POST['username'])){
    
    //generate unique id
    $unique_string = create_unique_id(3);

    //create user_id and initial password
    $username = $_POST['username'];
    $user_id = $_POST['username'] . $unique_string;
    $password = $unique_string;

    echo $username . " is the user name<br>";
    echo $user_id . " is the user id<br>";
    echo $password . " is the password<br>";
    
    // do database stuff
    $db = new user_db;
    list($validity, $error) = $db->create_user($user_id, $username, $password);
    if(!$validity){
        echo $error;
    }
    else{
        echo "user created<br>";
    }

    //create link
            
    //show dashboard
    require_once("../dashboard.php");
}
else{
    echo "signup error";
}


?>
