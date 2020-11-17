<?php
    require_once("functions/response_control.php"); //sets session, $hit, $error
    if($hit == 2){  //response successfully recorded
        header("Location: response_success.php?username=$username&respondant=$respondant");
    }
    else if($hit == 1){
        //fresh page load
    }
    else{
        //check and print error
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
        <div class="error"><?php echo $error; ?></div>
        <p class="prompt">HEY, I AM <?php if(!$error)echo $username; ?>, DROP A SECRET MESSAGE FOR ME</p>
        
        <input type="hidden" name="id" value="<?php  if($hit == 1)echo $user_id; ?>">
        <input type="hidden" name="username" value="<?php  if($hit == 1)echo $username; ?>">
        <input id="responder" name="respondant" type="text" placeholder="Write your name..."><br>
        <textarea id="response" name="response" placeholder="Write your secret message here..." rows="5" cols="30" maxlength="512"></textarea>
        <input type="submit" name="submit_response" value="Send message">
    </form>
</body>
</html>

