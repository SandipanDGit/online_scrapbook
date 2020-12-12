<?php
require_once("functions/login_control.php");

//check $auth and $error
//if($auth){
 //   header("Location: dashboard.php");
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" media="screen and (max-width:768px)" href="css/mobile.css">
    <link rel="stylesheet" media="screen and (min-width:1100px)" href="widescreen.css">
    <script src="https://kit.fontawesome.com/b06791e85d.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
</head>
<body>
    <nav id="navbar">
      <h1 class="logo"><a href=project.html>Secret Talk</a></h1>
      <ul>
        <li><a href="index.php">Sign Up</a></li>
        <li><a href="contact.php">Contact</a></li> 
      </ul>
    </nav>
    <div class="container">
     <div class="box">

      <form id="login_form" action="login.php" method="post">
      <?php if($error): ?>
        <div class="error"><?php {echo $error;} ?></div>
       <?php endif; ?>
        
        <h2>LOGIN</h2>
        <input type="text" name="user_id" id="user_id" placeholder="User ID">
        <input type="password" name="password" id="password" placeholder="Secret key">
        <input type="submit" value="LOGIN >" id="sub" name="submit_login_form">
      </form>
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