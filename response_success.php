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
</head>
<body>
    <div class="main">
        CHEERS <?php echo $respondant; ?>! YOU HAVE WRITTEN TO <?php echo $username; ?>'S SCRAPBOOK
    </div>
</body>
</html>