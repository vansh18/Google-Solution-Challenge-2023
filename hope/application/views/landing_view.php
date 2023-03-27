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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/landing.css'; ?>">
    <title>Landing</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="home.html">
                    <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="" srcset="" >
                </a>
            </div>
            <div class="buttons">
                <a href="<?php echo BASE_URL.'login';?>" id="login">Login</a>
                <a href="<?php echo BASE_URL.'signup';?>" id="signup">Sign Up</a>
            </div>
        </div>
    </header>
    <section>
        <div class="content">
            <div class="msg">
                <p>One Stop Solution For You</p>
            </div>
            <div class="heading">
                <h1>Assisting Your Mental Health With Our Best Service.</h1>
            </div>
            <div class="para">
                <p>Hope, an expert in Cognitive Behavioural Therapy. We believe we can achieve better for your mental health.</p>
            </div>
            <div class="button">
                <a href="<?php echo BASE_URL.'signup';?>">Get Started</a>
            </div>
            <div class="mob-buttons">
                <a href="<?php echo BASE_URL.'login';?>" id="mob-login">Login</a>
                <a href="<?php echo BASE_URL.'signup';?>" id="mob-signup">Sign Up</a>
            </div>
        </div>
        <div class="image">
            <img src="<?php echo ASSETS.'images/Image.png';?>" alt="">
        </div>
    </section>
</body>
</html>