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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/helpline.css';?>">
    <link rel="icon" type="image/x-icon" href="<?php echo ASSETS.'images/favicon-32x32.png';?>">
    <title>HOPE - Helpline</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="<?php echo BASE_URL."home";?>">
                    <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="" srcset="" >
                </a>
            </div>
                <div class="toggle_btn">
                    <ion-icon name="menu-outline" id="menu-icon"></ion-icon>
                </div>
            <div class="dropdown_menu">
                <ul class="links">
                    <li><a href="<?php echo BASE_URL."home";?>">Home</a></li>
                    <li><a href="<?php echo BASE_URL."meditation";?>">Meditation</a></li>
                    <li><a href="<?php echo BASE_URL."habituation";?>">Habituation</a></li>
                    <li><a href="<?php echo BASE_URL."chill-music";?>">Chill Music</a></li>
                    <li id="hidden-logout"><a href="<?php echo BASE_URL."logout";?>">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <section>
        <div class="info">
            <h1>Are you in Crisis?</h1>
            <p>If you are in a crisis, Call one of the helplines below. Don't worry things will be alright.</p>
        </div>
        <div class="buttons">
            <button class="btn button-1">Crisis Helpline</button>
            <button class="btn button-2">Child Helpline</button>
            <button class="btn button-3">Local Emergency Helpline</button>
        </div>
    </section>
</body>
<script>
    var dropdown_menu = document.getElementById("dropdown_menu");
    var menu_icon = document.getElementById("menu-icon"); 

    menu_icon.addEventListener("click", function() 
    {
        if(menu_icon.name == "menu-outline")
        {
            menu_icon.name = "close-outline";
            document.querySelector(".links").style.display = "block";
            document.querySelector(".toggle_btn").style.color = "#FFF";
            console.log("working");
        }
        else
        {
            menu_icon.name = "menu-outline";
            document.querySelector(".links").style.display = "none";
            document.querySelector(".toggle_btn").style.color = "#000"; 
        }
    });
</script>
</html>