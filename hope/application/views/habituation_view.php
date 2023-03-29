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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/habituation.css';?>">
    <title>Habituation</title>
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
            </ul>
            <a href="<?php echo BASE_URL."home";?>"><span class="back_btn">Back</span></a>
            <div class="toggle_btn">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="dropdown_menu">
                <li><a href="<?php echo BASE_URL."home";?>">Home</a></li>
                <li><a href="<?php echo BASE_URL."meditation";?>">Meditation</a></li>
                <li><a href="<?php echo BASE_URL."habituation";?>">Habituation</a></li>
                <li><a href="<?php //echo BASE_URL."chill_music";?>">Chill Music</a></li>
            </div>
        </div>
    </header>
    <section>
        <div class="background">
            <div class="container"> <!-- replicate this for each addiction  -->
                <div class="box-1_container">
                    <div class="box-1">
                        <p class="heading">Current Streak</p>
                        <p class="streak">0 Days</p>
                    </div>
                </div>
                <div class="box-2_container">
                    <div class="box-2">
                        <p class="heading">My Start Date</p>
                        <div class="time_container">
                            <p class="date">March 16, 2023</p>
                            <p class="time">6:00 PM</p>
                            <button><img src="<?php echo ASSETS.'images/icons/reset.svg';?>" alt=""></button>
                        </div>
                    </div>
                    <div class="actions">
                        <button id='add_addiction' onclick="Prompt.render('What addiction you want to add?','changeText')"><ion-icon name="add-outline"></ion-icon>Add Addiction</button>
                        <a href="#"><ion-icon name="remove-outline"></ion-icon>Remove</a>
                    </div>
                    <div class="addiction_navigation">
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
                <div class="box-3_container">
                    <div class="box-3">
                        <p class="heading">Addiction Free Since</p>
                        <p class="addiction_mins">0 Mins</p>
                    </div>
                </div>
            </div>
            
        </div>
        <div id="dialogoverlay"></div>
        <div id="dialogbox">
            <div>
                <div id="dialogboxbody"></div>
                <div id="dialogboxfoot"></div>
            </div>
        </div>
    </section>
    <script src="<?php echo ASSETS.'js/habituation.js';?>"></script>
</body>
</html>