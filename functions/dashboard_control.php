<?php
$error = "";
$err_code = 0;
$responses = null;
if(!isset($_SESSION['user_id']) || !isset($_SESSION['source'])){
   $err_code = 1;
   $error = "session does not exist";
}
else{
   $source = $_SESSION['source'];
   $user_id = $_SESSION['user_id'];

   require_once("db_class.php");
   $db = new user_db;

   list($validity, $username, $password, $last_activity) = $db->fetch_user($user_id);
   if(!$validity){
      $err_code = 2;
      $error = $username;   //if $validity is 0, 2nd value in return contains error 
   }
   else{
      $link = 'localhost/project_game/respond.php?id=' . $user_id . "&name=" . $username;
      
      //fetch response list
      list($validity, $responses) = $db->fetch_responses($user_id);
      if(!$validity){
         $err_code = 3;
         $error = $responses;
      }
      else{
         //$responses is to be handled in dashboard
      }
   }


}

?>
