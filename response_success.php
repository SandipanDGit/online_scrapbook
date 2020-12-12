<?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['responder'])){
        $username = $_SESSION['username'];
        $respondant = $_SESSION['responder'];
    }
    else{
        header("Location: signup.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/response_success.css">
    <title>Response Success</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
</head>
<body>
<nav id="navbar">
      <h1 class="logo"><a href=project.html>Secret Talk</a></h1>
      <ul>
        <li><a href="index.php">Sign Up</a></li>
        <li><a href="login.php">Sign In</a></li>
        <li><a href="contact.php">Contact</a></li> 
      </ul>
    </nav>
    <div class="container">
     <div class="box">
        <div class="content-box">
            <h2>CHEERS <?php echo $respondant; ?>! YOU HAVE WRITTEN TO <?php echo $username; ?>'S SCRAPBOOK</h2>
        </div>
     </div>
    </div>
    <footer id="main-footer">
     
     <div class="footer">
       <a href="#" id="pp">Privacy Policy</a>
   
       <a href="#" id="tt">Terms of Use</a>
     </div>
</body>
</html>