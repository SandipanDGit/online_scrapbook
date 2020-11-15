<?php

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
    <form id="login_form" action="functions/login_control.php" method="post">

        <div class="header">LOGIN</div>
        <div class="subheader">to see your secret messages</div>
        <div class="line"></div>

        <input type="text" name="user_id" id="user_id" placeholder="User ID">
        <input type="password" name="password" id="password" placeholder="Secret key">
        <input type="submit" value="Open my box" name="submit_login_form">
    </form>
</body>
</html>