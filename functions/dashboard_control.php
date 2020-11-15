<?php
$error = "";
if(!isset($_SESSION['user_id'])){
   $error = "session does not exist";
}
else{
   $source = $_SESSION['source'];
   $user_id = $_SESSION['user_id'];

   require_once("db_class.php");
   $db = new user_db;

   list($validity, $username, $password, $last_activity) = $db->fetch_user($user_id);
   if(!$validity){
      $error = $username;   //if $validity is 0, 2nd value in return contains error 
   }
   else{
      $link = 'localhost/project_game/respond.php?id=' . $user_id;
   }
}

?>
