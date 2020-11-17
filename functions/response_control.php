<?php

$hit = 0;
$error = "";

if(isset($_GET['id']) && isset($_GET['name'])){     //fresh page load
    $hit = 1;
    $user_id = $_GET['id'];
    $username = $_GET['name'];
}
else if(isset($_POST['submit_response']) && isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['respondant']) && !empty($_POST['respondant'])
    && isset($_POST['response']) && !empty($_POST['response'])){
    
    $username = $_POST['username'];
    $respondant = $_POST['respondant'];
    $response = $_POST['response'];
    $user_id = $_POST['id'];

    require_once("db_class.php");
    $db = new user_db;
    list($validity, $error) = $db->respond($user_id, $respondant, $response);
    if($validity){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['respondant'] = $respondant;
        $hit = 2;
    }
    else{
        //print error
    }
}
else{
    //either wrongly filled form or unusual request
    //forward to signup.php
    $error = "unusual page request or form not filled properly";

}

?>
