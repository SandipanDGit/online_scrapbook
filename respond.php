<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESPODANT'S ENTRY</title>

    <link rel="stylesheet" href="css/respond.css">
</head>
<body>
    <!-- INCLUDE PAGE HEADER HERE-->
    
    <!-- THIS FORM WILL BE SUBMITTED BY JAVASCRIPT, OVERRIDING THE DEFAULT SUBMIT BEHAVIOUR -->
    <form action="functions/response_control.php" method="post">

        <p class="prompt">HEY, I AM USER X, DROP A SECRET MESSAGE FOR ME</p>
        <input id="responder" name="responder" type="text" placeholder="Write your name..."><br>
        <textarea id="response" name="response" placeholder="Write your secret message here..." rows="5" cols="30" maxlength="512"></textarea>
        <input type="submit" name="submit_response" value="Send message">
    </form>
</body>
</html>

