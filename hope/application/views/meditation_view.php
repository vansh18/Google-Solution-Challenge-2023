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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/meditation.css';?>">
    <title>HOPE | MEDITATION</title>
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
        <a href="<?php echo BASE_URL."logout";?>"><span class="logout_btn">Logout</span></a>
        <div class="toggle_btn">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
    </div>
  </header>

  <section>
        <div class="greeting-message">
            <h1 style="color:#3C2A21">MEDITATION</h1>
            <p style="color:#3C2A21">Find Inner Peace and Calm Your Mind: Explore Meditation Techniques</p>
        </div>
        <div class="cards">
            <div class="card">
              <div class="img1 card-img">
                <img src="<?php echo ASSETS.'images/mindfullness.png';?>" alt="">
              </div>
              <div class="card-content">
                <h3>Mindfulness Meditation</h3>
                <p>Find peace and focus in the present moment with mindfulness meditation.</p>
                <a href="#" class="btn">Practice now</a>
              </div>
            </div>
          
            <div class="card">
              <div class="img2 card-img">
                <img src="<?php echo ASSETS.'images/Guided.png';?>" alt="">
              </div>
              <div class="card-content">
                <h3>Guided Meditation</h3>
                <p>Relax and let go of stress as a meditation teacher guides you through a peaceful visualization.</p>
                <a href="#" class="btn">Practice now</a>
              </div>
            </div>
          
            <div class="card">
              <div class="img3 card-img">
                <img src="<?php echo ASSETS.'images/yoga.png';?>" alt="">
              </div>
              <div class="card-content">
                <h3>Yoga Meditation</h3>
                <p>Combine the benefits of meditation with the physical and mental benefits of yoga.</p>
                <a href="#" class="btn">Practice now</a>
              </div>
            </div>
          </div>
  </section>
</body>
<script>
const toggleBtn = document.querySelector('.toggle_btn');
const links = document.querySelector('.links');

toggleBtn.addEventListener('click', () => {
  links.classList.toggle('active');
});
</script>
</html>