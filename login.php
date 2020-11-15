<?php
require_once("functions/login_control.php");

//check $auth and $error
if($auth){
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="error"><?php if($error){echo $error;} ?></div>
    <div class="signup">
        <button class="signup_button"><a href="signup.php">Create new link</a></button>    
    </div>
    <form id="login_form" action="login.php" method="post">

        <div class="header">LOGIN</div>
        <div class="subheader">to see your secret messages</div>

        <input type="text" name="user_id" id="user_id" placeholder="User ID">
        <input type="password" name="password" id="password" placeholder="Secret key">
        <input type="submit" value="Open my box" name="submit_login_form">
    </form>
</body>
</html>