<?php

session_start();
require_once("functions/dashboard_control.php");
if($error){
    if(!isset($_SESSION['source'])){    //if true, means error is session error.
        header("Location: signup.php");
    }
    else{
        header("Location: $source");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <nav class="top_nav">
        <button id="logout"><a href="login.php?logout=1">Logout</a></button>
    </nav>
    <main class="main">
        <div class="welcome">
            <div class="subheader">Hey <?php echo $username; ?>! Your secret admirers missed you ;-)</div>
            <div class="header">Happy Secret Scrapbooking</div>
        </div>
        <div class="link"><?php echo $link ?></div>
        <div class="share">
            <div class="share_text">Share this link to receive secret messages</div>
            <div class="social_buttons">
                <div class="fb">FB</div>
                <div class="whatsapp">Whatsapp</div>
                <div class="other">Other</div>
            </div>
        </div>  
    </main>
</body>
</html>