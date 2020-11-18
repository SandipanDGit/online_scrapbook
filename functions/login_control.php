<?php
session_start();

$auth = false;
$error = "";

if(isset($_SESSION['user_id'])){
    if(isset($_GET['logout'])){

        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
}

if(isset($_POST['submit_login_form']) && isset($_POST['user_id']) && !empty($_POST['user_id'])
 && isset($_POST['password']) && !empty($_POST['password'])){
    require_once("db_class.php"); 
    
    //get user_id and password from request
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    
    //do database stuff
    $db = new user_db;
    list($validity, $error) = $db->authenticate($user_id, $password);

    //set session
    if($validity){
        $auth = true;
        session_start();
        $_SESSION['user_id'] = $user_id;    //to be accessed in dashboard
        $_SESSION['source'] = 'login';
    }
    else{
        //login page will check $auth, $error and act accordingly
    }
}
else{      
}

?>

