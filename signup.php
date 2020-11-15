<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTRY</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <!-- INCLUDE PAGE HEADER HERE-->
    
    <!-- THIS FORM WILL BE SUBMITTED BY JAVASCRIPT, OVERRIDING THE DEFAULT SUBMIT BEHAVIOUR -->
    <form action="functions/signup_control.php" method="post">

        <input id="name" name="username" type="text" placeholder="Enter your name"><br>
        <input type="submit" name="submit_signup_form" value="Create my link">
    </form>
</body>
</html>