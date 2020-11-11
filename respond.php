<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESPODANT'S ENTRY</title>

    <!-- SEPARATE CSS FILE TO BE LINKED HERE INSTEAD OF STYLE TAG -->
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        form{
            margin-top: 100px;
            padding: 10px 20px;
            border: 1px solid grey;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        input, textarea{
            border-radius: 10px;
            margin: 20px;
            padding: 10px;
            font-size: larger;
        }
        p{
            font-size: large;
            font-family: sans-serif;
            max-width: 70%;
            text-align: center;
        }
    </style>
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

