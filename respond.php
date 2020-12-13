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
    <link rel="stylesheet" href="css/respond.css">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:1100px)" href="widescreen.css">
    <script src="https://kit.fontawesome.com/b06791e85d.js" crossorigin="anonymous"></script>
    <title>RESPODANT'S ENTRY</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
</head>
<body>
    <!-- INCLUDE PAGE HEADER HERE-->
    <nav id="navbar">
      <h1 class="logo"><a href=project.html>Secret Talk</a></h1>
      <ul>
        <li><a href="index.php">Sign Up</a></li>
        <li><a href="login.php">Sign In</a></li>
        <li><a href="contact.php">Contact</a></li> 
      </ul>
    </nav>
    <!-- THIS FORM WILL BE SUBMITTED BY JAVASCRIPT, OVERRIDING THE DEFAULT SUBMIT BEHAVIOUR -->
    <div class="container">
      <div class="box">
    <form action="respond.php" method="post">
        <div class="error"><?php if($error)echo $error; ?></div>
        <p class="prompt">HEY, I AM <?php if($hit == 1)echo $username; ?>, DROP A SECRET MESSAGE FOR ME</p>
        
        <input type="hidden" name="id" value="<?php  if($hit == 1)echo $user_id; ?>">
        <input type="hidden" name="username" value="<?php  if($hit == 1)echo $username; ?>">
        <input id="responder" name="responder" type="text" placeholder="Write your name..."><br>
        <label for="real_name">Your real name is optional. If given, it is disclosed only after 24 hours...</label>
        <input id="real_name" name="real_name" type="text" placeholder="Your real name..."><br>
        <textarea id="response" name="response" placeholder="Write your secret message here..." rows="5" cols="30" maxlength="512"></textarea>
        <input type="submit" name="submit_response" id="sub" value="Send message">
      </div>
   </div>
    </form>
    <footer id="main-footer">
    <div class="footer">
       <a href="#" id="pp">Privacy Policy</a>
   
       <a href="#" id="tt">Terms of Use</a>
     </div>
   
   </footer>
</body>
</html>