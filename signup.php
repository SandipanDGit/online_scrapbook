<?php
session_start();

require_once("functions/signup_control.php");   

if($auth){
    header("Location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret Talk</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <meta name="description" content="Welcome to the best secret talk app">
    <meta name="keywords"  content="secret,question,answer,message">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:1100px)" href="widescreen.css">
    <script src="https://kit.fontawesome.com/b06791e85d.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav id="navbar">
      <h1 class="logo"><a href=project.html>Secret Talk</a></h1>
      <ul>
        <li><a href="login.php">Sign In</a></li>
        <li><a href="contact.php">Contact</a></li> 
      </ul>
    </nav>
    <div class="container">
     <div class="box">

      <form action="signup.php" method="post">

          <?php if($error): ?>
            <div class="error"><?php {echo $error;} ?></div>
          <?php endif; ?>
          <h1>Create My Link</h1>
          <input type="text" name="username"  id="name" placeholder="Enter Your Name">
          <input type="submit" name="submit_signup_form" id="sub"  value="GET NOW"> 
      </form>
        <div class="content-box">
           <h2>How It Works?</h2>
           <p>1<font face="Symbol">.</font> Get a link</p>
           <p>2<font face="Symbol">.</font> Share in social media</p>
           <p>3<font face="Symbol">.</font> Come back to see secret messages</p>
           <img
           src="https://cb-thumbnails.s3.ap-south-1.amazonaws.com/underline_welcome.svg"
         />
        </div>
     </div>
   </div>
   <footer id="main-footer">
     
     <div class="footer">
       <a href="#" id="pp">Privacy Policy</a>
       <a href="#" id="tt">Terms of Use</a>
     </div>
 </footer>
  </body>
</html>
