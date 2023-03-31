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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/about_hope.css';?>">
    <title>HOPE - About Us </title>
</head>
<body>
    <header class="heading">
        <h1>About Us</h1>
    </header>
    <section class="about">
        <div class="card">
            <img src="<?php echo ASSETS.'images/Boy.svg';?>" alt="Boy">
            <div class="para">
                <p>
                    Our mission is to provide accessible and effective mental health support to everyone, everywhere.
                    Our AI-powered chatbot, Hope, provides expertise in cognitive behavioral therapy to help overcome anxiety and depression.We offer a range of resources and tools such as guided meditations and relaxing areas to support mental health journeys. We prioritize data security and confidentiality to protect our users' privacy. We're dedicated to breaking down barriers to mental health support and creating a world where mental health is prioritized and stigma is eliminated.
                </p>
            </div>
          </div>
    </section>

    <section class="meet-team">
        <div class="container">
            <h1>Meet Our Team</h1>
              <div class="main-card">
                <div class="cards">
                  <div class="card">
                   <div class="content">
                     <div class="img">
                      <img src="<?php echo ASSETS.'images/alan.jpeg';?>" alt="">
                     </div>
                     <div class="details">
                       <div class="name">Alan Mohan</div>
                       <div class="job">Backend Developer</div>
                     </div>
                     <div class="media-icons">
                       <a target="_blank" href="https://www.linkedin.com/in/alan-mohan-2b9608232/"><ion-icon name="logo-linkedin" class="icon1"></ion-icon></a>
                       <a target="_blank" href="https://github.com/alanmohan"><ion-icon name="logo-github" class="icon1"></ion-icon></a>
                     </div>
                   </div>
                  </div>
                  <div class="card">
                   <div class="content">
                     <div class="img">
                      <img src="<?php echo ASSETS.'images/vansh.jpeg';?>" alt="">
                     </div>
                     <div class="details">
                       <div class="name">Vansh Gupta</div>
                       <div class="job">Frontend Developer</div>
                     </div>
                     <div class="media-icons">
                       <a target="_blank" href="https://www.linkedin.com/in/vansh-gupta-1557ab1ba/"><ion-icon name="logo-linkedin" class="icon1"></ion-icon></a>
                       <a target="_blank" href="https://github.com/vansh18"><ion-icon name="logo-github" class="icon1"></ion-icon></a>
                     </div>
                   </div>
                  </div>
                  <div class="card">
                   <div class="content">
                     <div class="img">
                      <img src="<?php echo ASSETS.'images/ameya.jpg';?>" alt="">
                     </div>
                     <div class="details">
                       <div class="name">Ameya Navare</div>
                       <div class="job"></div>
                     </div>
                     <div class="media-icons">
                       <a target="_blank" href="" class="icon1"></ion-icon></a>
                       <a target="_blank" href="" class="icon1"></ion-icon></a>
                     </div>
                   </div>
                  </div>
                  <div class="card">
                   <div class="content">
                     <div class="img">
                       <img src="<?php echo ASSETS.'images/rahul.jpg';?>" alt="">
                     </div>
                     <div class="details">
                       <div class="name">Rahul Sumbly</div>
                       <div class="job"></div>
                     </div>
                     <div class="media-icons">
                       <a target="_blank" href="https://www.linkedin.com/in/rahul-sumbly/"><ion-icon name="logo-linkedin"><ion-icon name="logo-linkedin" class="icon1"></ion-icon></a>
                       <a target="_blank" href="https://github.com/Rahul-s-007"><ion-icon name="logo-github" class="icon1"></ion-icon></a>
                     </div>
                   </div>
                  </div>
              </div>
              </div>
            </div>
    </section>
</body>
</html>