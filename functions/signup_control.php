<?php 
require_once("db_class.php"); 
require_once("create_unique_id.php");
$auth = false;
$error = "";

if(isset($_POST['submit_signup_form']) && isset($_POST['username']) && !empty($_POST['username'])){
    
    //if another session is active but still user tried to create new link, then
    //destroy previous session data, keep the same session ID
    if(isset($_SESSION)){
        $_SESSION = array();
    }

    //generate unique id
    $unique_string = create_unique_id(2);

    //create user_id and initial password
    $username = $_POST['username'];
    $user_id = $_POST['username'] . $unique_string;
    $password = create_unique_id_num(4);
    
    // do database stuff
    $db = new user_db;
    list($validity, $error) = $db->create_user($user_id, $username, $password);
    if($validity){
        $auth = true;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['source'] = "signup";
    }
    else{
        //signup page will check auth and error and act accordingly
    }
}
else{   
    // $error = "form not filled properly";
}


?>
