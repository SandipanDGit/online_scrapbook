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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <nav id="navbar">
        <h1 class="logo"><a href=project.html>Secret Talk</a></h1>
        <ul>
            <li><a href="contact.php">Contact</a></li> 
            <li id="logout"><a href="login.php?logout=1">Logout</a></li>
        </ul>
    </nav>
    <main>
        <div class="main">
            <div class="welcome">
                <div class="header">Hey <?php echo $username; ?>!</div>
                <div class="subheader">Your admirers missed you</div>
            </div>
            <div class="link">
                <div id="link_text" class="link_text"><?php echo $link ?></div>
                <div id="copy_wrap"><i id="copy_button" class="copy_button fas fa-clipboard fa-2x" data-clipboard-target="#link_text"></i></div>
            </div>
            <div class="share">
                <div class="share_text">Share this link to receive secret messages</div>
                <div class="social_buttons">
                    <div class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u= '<?php echo $link ?>'" target="_blank"><i class="fab fa-facebook fa-3x"></i></a></div>
                    <div class="whatsapp"><i class="fab fa-whatsapp fa-3x"></i></div>
                    <div class="other"><a href="https://chart.apis.google.com/chart?chs=150x150&cht=qr&chl='<?= $link ?>'&choe=UTF-8"><i class="fas fa-qrcode fa-3x"></i></a></div>
                </div>
            </div>
            <div class="cred">
                <div class="title">
                    <span class="icon"><i class="fas fa-exclamation-triangle"></i></span>
                    <span class="cred_text">Take a note</span>
                </div>

                <form id="credentials" action="#" method="post">
                    <div class="userid">
                        <label class="l" for="userid">User ID</label>
                        <input type="text" name="userid" id="cred_userid" placeholder="<?php echo $user_id ?>"><br>
                    </div>
                    <div class="password">
                        <label class="l" for="userid">Password</label>
                        <input type="password" name="password" id="cred_password" value="<?php echo substr($user_id, -3) ?>"><i id="vis_icon" class="fas fa-eye"></i><br>
                        <!-- <label for="password"></label> -->
                    </div>
                    <!-- <i class="fas fa-eye-slash"></i>  -->
                </form>
            </div> 
        <!-- end of class=main -->
        </div> 
        <ol class="message_list">
            <div class="list_title">Here's your secret messages</div>
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
    <!-- end of main -->
    </main> 
    <footer>
        <div class="footer">
            <a href="#" id="pp">Privacy Policy</a>
            <a href="#" id="tt">Terms of Use</a>
        </div>
    </footer>

    <script>
        
        let password = document.querySelector("#cred_password");
        let icon = document.querySelector("#vis_icon");
        icon.addEventListener("click", (e)=>{
            console.log("ok");
            if (password.getAttribute("type") === "password") {
                password.setAttribute("type","text");
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                password.setAttribute("type","password");
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        })

        let copy_button = document.querySelector("#copy_button")
        copy_button.addEventListener("mousedown", ()=>{
            copy_button.style.transform="scale(1.1)";
            console.log("ok");
        })
        copy_button.addEventListener("mouseup", ()=>{
            copy_button.style.transform="scale(1)";
            console.log("ok");
        })
    </script>
</body>
</html>

