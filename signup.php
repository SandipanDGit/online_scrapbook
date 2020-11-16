<?php
    
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTRY</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <link rel="stylesheet" href="css/signup.css">
 </head>
 <body>
    <!-- INCLUDE PAGE HEADER HERE-->
    
    <!-- THIS FORM WILL BE SUBMITTED BY JAVASCRIPT, OVERRIDING THE DEFAULT SUBMIT BEHAVIOUR -->
   <div class="container">
      <div class="form-container">
          <div class="username">
              <form action="functions/signup_control.php" method="post">
                  <div class="image">
                    <img src="single_user.png" > 
                  </div>
                  <div class="input-field">
                      <i class="fas fa-user"></i>
                      <input id="name" name="username" type="text" placeholder="Enter your name"><br>
                  </div>
                 <input type="submit" name="create_link" value="Generate Link" class="xyz"><br>
                 <input type="submit" name="login" value="LogIn" class="xyz">
               </form>
          </div>
      </div>    
   </div>
    
 </body>
</html>