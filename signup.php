<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTRY</title>
    
    <!-- SEPARATE CSS FILE TO BE LINKED HERE INSTEAD OF STYLE TAG -->
    <style>
        body{
            display: flex;
            justify-content: center;
        }
        form{
            margin-top: 150px;
            border: 1px solid grey;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        input{
            border-radius: 10px;
            margin: 20px;
            padding: 10px;
            font-size: larger;
        }
    </style>
</head>
<body>
    <!-- INCLUDE PAGE HEADER HERE-->
    
    <!-- THIS FORM WILL BE SUBMITTED BY JAVASCRIPT, OVERRIDING THE DEFAULT SUBMIT BEHAVIOUR -->
    <form action="functions/signup_control.php" method="post">

        <input id="name" name="username" type="text" placeholder="Enter your name"><br>
        <input type="submit" name="create_link" value="Create my link">
    </form>
</body>
</html>