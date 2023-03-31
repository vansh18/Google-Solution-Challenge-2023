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
    <link rel="icon" type="image/x-icon" href="/images/favicon-32x32.png">
    <link rel="stylesheet" href="<?php echo ASSETS.'css/meditation.css';?>">
    <title>HOPE - MEDITATION</title>
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
                <button id="show-box-button_0" class="btn">Practice now</button>
              </div>
            </div>

            <div id="box-container">
              <div id="box-content">
                <iframe width="560" height="315" id="video-player" src="https://www.youtube.com/embed/ssss7V1_eyA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
            </div>
          
            <div class="card">
              <div class="img2 card-img">
                <img src="<?php echo ASSETS.'images/Guided.png';?>" alt="">
              </div>
              <div class="card-content">
                <h3>Guided Meditation</h3>
                <p>Relax and let go of stress as a meditation teacher guides you through a peaceful visualization.</p>
                <button id="show-box-button_1" class="btn">Practice now</button>
              </div>
            </div>

            <div id="box-container">
              <div id="box-content">
                <iframe width="560" height="315" id="video-player" src="https://www.youtube.com/embed/M-OwOZoSaJc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
              </div>
            </div>
          
            <div class="card">
              <div class="img3 card-img">
                <img src="<?php echo ASSETS.'images/yoga.png';?>" alt="">
              </div>
              <div class="card-content">
                <h3>Yoga Meditation</h3>
                <p>Combine the benefits of meditation with the physical and mental benefits of yoga.</p>
                <button id="show-box-button_2" class="btn">Practice now</button>
              </div>
            </div>
            <div id="box-container">
              <div id="box-content">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/rrLkhg3fA0M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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
  document.getElementById('hidden-logout').style.display = 'flex';
});

const showBoxButton_0 = document.getElementById('show-box-button_0');
const showBoxButton_1 = document.getElementById('show-box-button_1');
const showBoxButton_2 = document.getElementById('show-box-button_2');
const boxContainer = document.getElementById('box-container');
const videoPlayer = document.getElementById('video-player');

const videoLinks_0 = [
  'https://www.youtube.com/embed/ssss7V1_eyA',
  'https://www.youtube.com/embed/O-6f5wQXSu8'
];
const videoLinks_1 = [
  'https://www.youtube.com/embed/M-OwOZoSaJc',
  'https://www.youtube.com/embed/1jXxPMXDwIU'
];
const videoLinks_2 = [
  'https://www.youtube.com/embed/8TuRYV71Rgo',
  'https://www.youtube.com/embed/rrLkhg3fA0M'
];

showBoxButton_0.addEventListener('click', () => {
  const randomIndex_0 = Math.floor(Math.random() * videoLinks_0.length);
  const randomLink_0 = videoLinks_0[randomIndex_0];
  videoPlayer.setAttribute('src', randomLink_0);
  boxContainer.classList.add('visible');
});
showBoxButton_1.addEventListener('click', () => {
  const randomIndex_1 = Math.floor(Math.random() * videoLinks_1.length);
  const randomLink_1 = videoLinks_1[randomIndex_1];
  videoPlayer.setAttribute('src', randomLink_1);
  boxContainer.classList.add('visible');
});
showBoxButton_2.addEventListener('click', () => {
  const randomIndex_2 = Math.floor(Math.random() * videoLinks_2.length);
  const randomLink_2 = videoLinks_2[randomIndex_2];
  videoPlayer.setAttribute('src', randomLink_2);
  boxContainer.classList.add('visible');
});

boxContainer.addEventListener('click', (event) => {
  if (event.target === boxContainer) {
    videoPlayer.setAttribute('src', '');
    boxContainer.classList.remove('visible');
  }
});

</script>
</html>