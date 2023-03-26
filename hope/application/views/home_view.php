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
    <title>Home</title>
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="" srcset="" >
                </a>
            </div>
            <ul class="links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Meditation</a></li>
                <li><a href="habituation.html">Habituation</a></li>
                <li><a href="#">Chill Music</a></li>
            </ul>
            <span class="action_btn">Hi, <?php echo $_SESSION['name'];?></span>
            <div class="toggle_btn">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="dropdown_menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">Meditation</a></li>
                <li><a href="#">Habituation</a></li>
                <li><a href="#">Chill Music</a></li>
            </div>
        </div>
    </header>
    <section>
        <div class="upper_box">
            <div class="message">
                <div class="greetings">Good Morning, <?php echo $_SESSION['name'];?>
                    <img src="<?php echo ASSETS.'images/icons/🦆 emoji _waving hand sign_.svg';?>" alt="">
                </div>
                <p class="quote">You are the sky, Everything else is just weather.</p>
            </div>
            <div class="talk_to_hope"><a href="<?php echo BASE_URL."chat";?>">Talk to HOPE <img src="<?php echo ASSETS.'images/Boy.svg';?>" alt=""></a></div>
        </div>
    </section>
    <h2 class="just_for_you">Just for you :)</h2>
        <div class="grid">
            <div class="box box-1">
                <p>Anxiety</p>
                <p>Depression</p>
                <p>Meditate</p>
            </div>
            <div class="box box-2" style="background: linear-gradient(
                rgba(0, 0, 0, 0.4),
                rgba(0, 0, 0, 0.4)
              ),url(<?php echo ASSETS.'images/meditate.jpg';?>); background-size: cover;">MEDITATE</div>
            <div class="box box-3" style="background: linear-gradient(
                rgba(0, 0, 0, 0.4),
                rgba(0, 0, 0, 0.4)
              ),url(<?php echo ASSETS.'images/habits.jpg';?>); background-size: cover;">HABITAUATION</div>
            <div class="box box-4" style="background: linear-gradient(
                rgba(0, 0, 0, 0.4),
                rgba(0, 0, 0, 0.4)
              ),url(<?php echo ASSETS.'images/chill_music.jpg';?>); background-size: cover;">CHILL MUSIC</div>
            <div class="box box-5">
                <h3>HOPE</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda temporibus quam quia ad. Aliquid debitis et labore, possimus provident maiores.</p>
                <button onclick="window.location.href = '<?php echo BASE_URL.'chat';?>';">Let's Chat</button>
            </div> 
        </div>
        <div class="buttons">
            <button>Helpline</button>
            <button>Contact a counsellor</button>
        </div>




    <script>
        const toggleBtn = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn ion-icon')
        const dropDownMenu = document.querySelector('.dropdown_menu')

        toggleBtn.onclick = function()
        {
            dropDownMenu.classList.toggle('open')
            const isOpen = dropDownMenu.classList.contains('open')

            toggleBtnIcon.classList = isOpen
            ? 'close-outline'
            : 'menu-outline'
        }
    </script>
</body>
</html>