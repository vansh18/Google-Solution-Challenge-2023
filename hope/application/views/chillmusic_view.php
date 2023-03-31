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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/chill_music.css';?>">
    <link rel="icon" type="image/x-icon" href="<?php echo ASSETS.'images/favicon-32x32.png';?>">
    <title>Chill Music</title>
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
                <li><a href="<?php echo BASE_URL."chill-music";?>">Chill Music</a></li>
                <li id="hidden-logout"><a href="<?php echo BASE_URL."logout";?>">Logout</a></li>
            </ul>
            <a href="<?php echo BASE_URL."logout";?>" class="visible-logout"><span class="logout_btn">Logout</span></a>
            <div class="toggle_btn">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
    </header>
    <section>

        <div class="left-box">
            <div class="music-blob">
                <img src="<?php echo ASSETS.'images/music-blob.svg';?>" alt="">
            </div>
            <div class="music-content">
                <h2>Select what you want to listen</h2>

                <div class="music-section">
                    <div class="box box-1">
                        <button id="show-box-button" class="video-button" data-category="category1"><p>LoFi</p></button>

                        <button id="show-box-button" class="video-button" data-category="category2"><p>Rain Sounds</p></button>

                        <button id="show-box-button" class="video-button" data-category="category3"><p>Concentration</p></button>
                    </div>
                    
                    <div class="box box-2">
                        <button id="show-box-button" class="video-button" data-category="category4"><p>White Noise</p></button>

                        <button id="show-box-button" class="video-button" data-category="category5"><p>Meditation</p></button>

                        <button id="show-box-button" class="video-button" data-category="category6"><p>Stress Relief</p></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-box">
            <div class="man">
                <img src="<?php echo ASSETS.'images/man.svg';?>" alt="">
            </div>
        </div>
        <div id="box-container">
            <div id="box-content">
                <iframe width="560" height="315" id="video-player" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
    </section>
</body>
<script>
const toggleBtn = document.querySelector('.toggle_btn');
const links = document.querySelector('.links');

toggleBtn.addEventListener('click', () => 
{
  links.classList.toggle('active1');
  document.getElementById('hidden-logout').style.display = 'flex';
});

const videoButtons = document.querySelectorAll('.video-button');
const boxContainer = document.getElementById('box-container');
const videoPlayer = document.getElementById('video-player');

const videoLinks = {
  category1: 'https://www.youtube.com/embed/jfKfPfyJRdk',
  category2: 'https://www.youtube.com/embed/mPZkdNFkNps',
  category3: 'https://www.youtube.com/embed/WPni755-Krg',
  category4: 'https://www.youtube.com/embed/yLOM8R6lbzg',
  category5: 'https://www.youtube.com/embed/1ZYbU82GVz4',
  category6: 'https://www.youtube.com/embed/UkM-FjfN6Mc'
};

for (let button of videoButtons) 
{
  button.addEventListener('click', () => 
  {
    const category = button.getAttribute('data-category');
    const link = videoLinks[category];
    videoPlayer.setAttribute('src', link);
    boxContainer.classList.add('visible');
  });
}

boxContainer.addEventListener('click', (event) => 
{
  if (event.target === boxContainer) 
  {
    videoPlayer.setAttribute('src', '');
    boxContainer.classList.remove('visible');
  }
});

</script>
</html>