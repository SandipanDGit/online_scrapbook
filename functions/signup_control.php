<?php 
if(isset($_POST['create_link']) && isset($_POST['username']) && !empty($_POST['username'])){

    echo $_POST['username'] . " is the user name";
    
    //generate unique id
    require_once("create_unique_id.php");
    $unique_string = create_unique_id(4);

    //create user_id and initial password
    $user_id = $username . $unique_string;
    $password = $unique_string;
    
    //do database stuff
    require_once("db_create_user.php");         

    //create link
            
    //show dashboard
}
else{
    echo "signup error";
}


?>
