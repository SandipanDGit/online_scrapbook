<?php 
if(isset($_POST['create_link']) && isset($_POST['username']) && !empty($_POST['username'])){

    echo $_POST['username'] . " is the user name";
    
    //generate unique id         //include create_id.php
    //generate a initial password   //include generate_password.php
    //do database stuff             //include db.php
    //create link          
    //set session 
    //set cookie         
    //show dashboard                //include dashboard.php
}
else{
    echo "signup error";
}


?>
