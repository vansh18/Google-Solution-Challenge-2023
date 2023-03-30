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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/home.css';?>">
    <title>HOPE | Home</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="#">
                <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="logo">
                </a>
            </div>
            <ul class="links">
                <li><a href="<?php echo BASE_URL."home";?>">Home</a></li>
                <li><a href="<?php echo BASE_URL."meditation";?>">Meditation</a></li>
                <li><a href="<?php echo BASE_URL."habituation";?>">Habituation</a></li>
                <li><a href="<?php //echo BASE_URL."chill_music";?>">Chill Music</a></li>
                </ul>
                <a href="<?php echo BASE_URL."logout";?>"><span class="person">Logout</span></a>
            <div class="toggle_btn">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="upper_box">
                <div class="message">
                <div class="greetings">Good Morning, <?php echo $_SESSION['name'];?>
                <img src="<?php echo ASSETS.'images/icons/🦆 emoji _waving hand sign_.svg';?>" alt="emoji">
                    </div>
                    <p class="quote">You are the sky, Everything else is just weather.</p>
                </div>
                <div class="talk_to_hope"><a href="<?php echo BASE_URL."chat";?>">Talk to HOPE <img src="<?php echo ASSETS.'images/Boy.svg';?>" alt="Boy icon"></a></div>
            </div>
        </section>
        <h2 class="just_for_you">Just for you &#58&#41</h2>
        <div class="grid">
            <div class="box box-1">
                <p>Find inner peace and relaxation with our recommended meditation exercises. Breathe and center yourself today.</p>
            </div>
            <a href="<?php echo BASE_URL."meditation";?>" class="meditate-a">
                <div class="box box-2" style="background: linear-gradient(
                    rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)
                    ),url(<?php echo ASSETS.'images/meditate.jpg';?>); background-size: cover; background-position: center;">
                MEDITATE
            </div>
        </a>

            <a href="<?php echo BASE_URL."habituation";?>" class="habituation-a">
                <div class="box box-3" style="background: linear-gradient(
                    rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)
                    ),url(<?php echo ASSETS.'images/habits.jpg';?>); background-size: cover; background-position: center;">
                HABITAUATION
            </div>
        </a>

            <a href="<?php //echo BASE_URL."chill_music";?>" class="chill-music-a">
                <div class="box box-4" style="background: linear-gradient(
                    rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)
                    ),url(<?php echo ASSETS.'images/chill_music.jpg';?>);background-size: cover; background-position: center;">CHILL MUSIC</div>
            </a>
            <a href="#" class="know-more">
                <div class="box box-5">
                    <h3>HOPE</h3>
                    <p>Know more</p>
                </div>
            </a>
        </div>
        <div class="mob-grid">
            <div class="mob-container">
                <div class="recommend">
                    <p>Find inner peace and relaxation with our recommended meditation exercises. Breathe and center yourself today.</p>
                </div>
                <div class="hope">
                    <h3>HOPE</h3>
                    <a href="#">Know more</a>
                </div>
            </div>
            <div class="mob-container2">
                <a href="<?php echo BASE_URL."meditation";?>" class="mob-1">

                    <div class="mob-div"style="background: linear-gradient(
                        rgba(0, 0, 0, 0.4),
                        rgba(0, 0, 0, 0.4)
                        ),url(<?php echo ASSETS.'images/meditate.jpg';?>); background-size: cover; background-position: center;">
                        MEDITATE
                    </div>
                </a>
                <a href="<?php echo BASE_URL."habituation";?>" class="mob-2">

                    <div class="mob-div"style="background: linear-gradient(
                        rgba(0, 0, 0, 0.4),
                        rgba(0, 0, 0, 0.4)
                        ),url(<?php echo ASSETS.'images/habits.jpg';?>); background-size: cover; background-position: center;">
                        HABITAUATION
                    </div>
                </a>
                <a href="<?php //echo BASE_URL."chill_music";?>" class="mob-3">

                    <div class="mob-div"style="background: linear-gradient(
                        rgba(0, 0, 0, 0.4),
                        rgba(0, 0, 0, 0.4)
                        ),url(<?php echo ASSETS.'images/chill_music.jpg';?>); background-size: cover; background-position: center;">
                        CHILL MUSIC
                    </div>
                </a>
            </div>
        </div>
        <div class="buttons">
            <button class="button">Helpline</button>
            <button class="button">Contact a counsellor</button>
            <a href="<?php echo BASE_URL."feedback";?>" class="button">Give feedback</a>
        </div>
    </main>    
</body>
<script>
const toggleBtn = document.querySelector('.toggle_btn');
const links = document.querySelector('.links');

toggleBtn.addEventListener('click', () => 
{
  links.classList.toggle('active1');
});
</script>
</html>        
                   
