<?php

session_start();
require_once("functions/dashboard_control.php");
if($error){
    if($err_code == 1){ 
        header("Location: login.php");
    }
    else if($err_code == 2){
        if(isset($_SESSION['source'])){
            header("Location: $source");
        }
    }
    else if($err_code == 3){
        //print error message
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
    <div class="main">
        <div class="welcome">
            <div class="subheader">Hey <?php echo $username; ?>! Your secret admirers missed you ;-)</div>
            <div class="header">Happy Secret Scrapbooking</div>
        </div>
        <div class="link"><?php echo $link ?></div>
        <div class="share">
            <div class="share_text">Share this link to receive secret messages</div>
            <div class="social_buttons">
                <div class="fb"> <a href="https://www.facebook.com/sharer/sharer.php?u= '<?= $link ?>'" target="_blank">
        
      FB</a></div>
                <div class="whatsapp">Whatsapp</div>
                <div class="other"><a href="https://chart.apis.google.com/chart?chs=150x150&cht=qr&chl='<?= $link ?>'&choe=UTF-8">Other</a></div>
            </div>
        </div> 
    </div>    
    <ol class="message_list">
        <?php if($err_code == 3): ?>
            <li class="mli">
                <div class="error"><?php echo $error; ?></div>
            </li>
        <?php elseif(count($responses)): ?>
            <?php foreach($responses as $record): ?>
                <li class="mli">
                    <div class="responder"><?php echo $record['responder']; ?></div>
                    <div class="response"><?php echo $record['response_body']; ?></div>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="mli">
                <div class="no_response">WAIT SOME MORE TO RECEIVE YOUR FIRST RESPONSE OR SHARE THE LINK ONCE AGAIN</div>
            </li>
        <?php endif; ?>
    </ol> 
</body>
</html>




