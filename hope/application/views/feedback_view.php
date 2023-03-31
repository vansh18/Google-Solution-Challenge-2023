<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="<?php echo ASSETS.'css/feedback.css';?>">
    <link rel="icon" type="image/x-icon" href="<?php echo ASSETS.'images/favicon-32x32.png';?>">
    <title>HOPE - Feedback</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
            <a href="<?php echo BASE_URL."home";?>">
                    <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="" srcset="" >
                </a>
            </div>
            <ul class="links">
            <li><a href="<?php echo BASE_URL."home";?>">Home</a></li>
                <li><a href="<?php echo BASE_URL."meditation";?>">Meditation</a></li>
                <li><a href="<?php echo BASE_URL."habituation";?>">Habituation</a></li>
                <li><a href="<?php //echo BASE_URL."chill_music";?>">Chill Music</a></li>
                <li id="hidden-logout"><a href="<?php echo BASE_URL."logout";?>">Logout</a></li>
            </ul>
            <a href="<?php echo BASE_URL."logout";?>" class="visible-logout"><span class="logout_btn">Logout</span></a>
            <div class="toggle_btn">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
    </header>
    <div class="container">
        <h2>Your Feedback is Important To Us.</h2>
        <p>Feel free to let us know what can we do better.</p>
    </div>
    <div class="form">
        <form action="#">
            <textarea name="feedback" id="feedback" cols="25" rows="5" ></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
<script>
    const toggleBtn = document.querySelector('.toggle_btn');
    const links = document.querySelector('.links');
    
    toggleBtn.addEventListener('click', () => 
    {
      links.classList.toggle('active1');
      document.getElementById('hidden-logout').style.display = 'flex';
    });

</script>
</html>