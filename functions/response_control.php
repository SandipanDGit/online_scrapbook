<?php
$hit = 0;
$error = null;

if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['name']) && !empty($_GET['name'])){     //fresh request with required GET params
    if(isset($_GET['e'])){
        $hit = 1;
        $error = $_GET['e'];
        $user_id = $_GET['id'];
        $username = $_GET['name'];
    }
    else{
        $hit = 1;
        $user_id = $_GET['id'];
        $username = $_GET['name'];
    }
}
else if(isset($_POST['submit_response']) && isset($_POST['id']) && !empty($_POST['id'])     //2nd request with POST form data 
    && isset($_POST['username']) && !empty($_POST['username'])){
    
    if(isset($_POST['responder']) && !empty($_POST['responder']) && isset($_POST['response']) && !empty($_POST['response'])){   //check form completeness
        
        $user_id = $_POST['id'];
        $username = $_POST['username'];
        $responder = $_POST['responder'];
        $response = $_POST['response'];

        // echo "form is ok";

        require_once("db_class.php");
        $db = new user_db;
        list($validity, $error) = $db->respond($user_id, $responder, $response);
        if($validity == 1 && $error == 1){

            session_start();

            $_SESSION['username'] = $username;
            $_SESSION['responder'] = $responder;
            $hit = 2;
            $error = null;
        }
        else{
            $hit = 3;
        }
    }
    else{   //same as fresh page laod but with error

        $hit = 1;   
        $user_id = $_POST['id'];
        $username = $_POST['username'];
        $error = "form not filled properly";
    }
}
else{
    $hit = 0;
    $error = "incomplete data in request string";
}

?>
