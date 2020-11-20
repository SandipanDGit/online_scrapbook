<?php
    require_once("functions/response_control.php"); //sets session, $hit, $error
    if($hit == 1){
        //fresh page load
    }
    elseif($hit == 2 && $error == null){  //response successfully recorded
        header("Location: response_success.php");
    } 
    elseif($hit == 3 && strlen($error)>0){
        //same as fresh page, hidden fields in form populated. but shows and error
        header("location: respond.php?id=$user_id&name=$username&e=$error");
    }
    elseif($hit == 0){
        header("Location: signup.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESPODANT'S ENTRY</title>

    <link rel="stylesheet" href="css/respond.css">
</head>
<body>
    <!-- INCLUDE PAGE HEADER HERE-->
    
    <!-- THIS FORM WILL BE SUBMITTED BY JAVASCRIPT, OVERRIDING THE DEFAULT SUBMIT BEHAVIOUR -->
    <form action="respond.php" method="post">
        <div class="error"><?php if($error)echo $error; ?></div>
        <p class="prompt">HEY, I AM <?php if($hit == 1)echo $username; ?>, DROP A SECRET MESSAGE FOR ME</p>
        
        <input type="hidden" name="id" value="<?php  if($hit == 1)echo $user_id; ?>">
        <input type="hidden" name="username" value="<?php  if($hit == 1)echo $username; ?>">
        <input id="responder" name="responder" type="text" placeholder="Write your name..."><br>
        <textarea id="response" name="response" placeholder="Write your secret message here..." rows="5" cols="30" maxlength="512"></textarea>
        <input type="submit" name="submit_response" value="Send message">
    </form>
</body>
</html>

