<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;627&family=Chelsea+Market&family=EB+Garamond:wght@400;500;600;700&family=Inter:wght@400;500;700&family=Montserrat&family=Open+Sans:wght@300;400;500;600;700;800&family=Rubik&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');
    *,*::after,*::before
    {
        margin: 0; 
        padding: 0; 
        box-sizing: border-box;
        font-family: 'Open Sans';
        /* outline: 1px solid black !important; */
    }
    body
    {
        height: 100vh;
        background: #EAF2FF;
    }
    li
    {
        list-style-type: none;
    }
    a
    {
        text-decoration: none;
        color: #1B110A;
        font-size: 1rem;
    }
    .logo a img
    {
        width: 150px;
        height: 70px;
    }
    header
    {
        position: relative;
        padding: 0 2rem;
    }
    .navbar
    {
        position: relative;
        width: 100%;
        top: 20px;
        height: 60px;
        max-width: 1200px;
        margin: 0 auto ;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .navbar .logo a
    {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .navbar .links
    {
        display: flex;
        gap: 2rem;
        font-weight: 600;
    }
    .navbar .toggle_btn
    {
        color: #000000;
        font-size: 1.5rem;
        cursor: pointer;
        display: none;
    }

    /*  DROPDOWN  */
    .dropdown_menu
    {
        display: none;
        position: relative;
        right: 2rem;
        top: 120px;
        height: 0px;
        width: 300px;
        background: #BFD8FF50;
        border-radius: 10px;
        overflow: hidden;
        transition: height 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .dropdown_menu.open
    {
        height: 240px;
    }
    .dropdown_menu li
    {
        padding: 0.7rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .background
    {
        position: absolute;
        bottom: 0;
        border: none;
        height: 80%;
        border-radius: 300px 300px 0 0;
        width: 100%;
        background: #BFD8FF;
    }
    .container
    {
        display: flex;
        justify-content: space-between;
        /* margin: 0 200px; */
        /* border: 3px solid red; */
        width: 100%;
        height: 100%;
        padding: 200px;
    }
    .container .heading
    {
        color: #FFFFFF;
        font-weight: 300;
        margin: 10px 0;

    }
    .box-1_container
    {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .box-1
    {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #1973E8;
        padding: 30px;
        border-radius: 20px;
        border: none;
    }
    .box-1 .streak
    {
        font-size: 24px;
        color: #FFFFFF;
        font-weight: 600;
    }
    .box-2_container
    {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }
    .box-2
    {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #1973E8;
        padding: 10px 50px;
        border-radius: 20px;
        border: none;
    }
    .box-2 .time_container
    {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .box-2 .time_container .date
    {
        font-size: 24px;
        color: #FFFFFF;
        font-weight: 600;
    }
    .box-2 .time_container .time
    {
        font-size: 16px;
        color: #FFFFFF;
    }
    .box-2 .time_container button
    {
        background: none;
        border: none;
        cursor: pointer;
        margin-top: 10px;
    }
    .box-2 .time_container button img
    {
        width: 20px;
    }
    .box-2_container .actions
    {
    display: flex;
    flex-direction: column;
    margin: 25px;
    }
    #add_addiction
    {
        display: flex;
        align-items: center;
        color: #1973E8;
        font-weight: 500;
        border: none;
        background: none;
        cursor: pointer;
        font-size: 16px;
    }
    .box-2_container a
    {
        display: flex;
        align-items: center;
        color: #1973E8;
        font-weight: 500;
    }
    .box-2_container .addiction_navigation
    {
        display: flex;
        flex-direction: row;
        justify-content: center;
        padding: 5px;
    }
    .box-2_container .addiction_navigation a
    {
        background: #5A9BFF;
        width: 12px;
        height: 12px;
        border-radius: 100%;
        margin: 0 5px;
        transition: .4s;
    }
    .box-2_container .addiction_navigation a:focus
    {
        background: #1973E8;
    }
    .box-3_container
    {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .box-3
    {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #1973E8;
        padding: 30px;
        border-radius: 20px;
        border: none;
    }
    .box-3 .addiction_mins
    {
        font-size: 24px;
        color: #FFFFFF;
        font-weight: 600;
    }
    #dialogoverlay
    {
        display: none;
        opacity: .8;
        position: fixed;
        top: 0px;
        left: 0px;
        background: #8C9199;
        width: 100%;
        z-index: 10;
    }
    #dialogbox
    {
        display: none;
        position: fixed;
        border: none;
        width:550px;
        z-index: 10;
    }
    #dialogbox > div
    { 
        background:#FFF;
        margin:8px; 
        border-radius: 10px;
    }
    /* #dialogbox > div > #dialogboxhead
    { 
        background: #F8F8F8; 
        color:#1B110A; 
        font-family: 'Open Sans';
        font-size: 24px;
        font-weight: 500;
    } */
    #dialogbox > div > #dialogboxbody
    {
        background: #F8F8F8; 
        padding:20px; 
        color:#1B110A; 
        font-family: 'Open Sans';
        font-size: 24px;
        font-weight: 600;
        border-radius: 10px;
        
        
    }
    #dialogbox > div > #dialogboxfoot
    { 
        background: #F8F8F8; 
        border-radius: 10px; 
        text-align:right; 
    }
    #dialogboxfoot > button
    {
        border: 2px solid #1973E8;
        background: none;
        padding: 5px 10px;
        margin: 0 10px 10px 0;
        border-radius:5px;
        font-size: 16px;
        color: #1973E8;
        font-weight: 600;
        cursor: pointer;
    }
    #dialogboxfoot > button:hover
    {
        background: #D5E5FD;
    }
    #prompt_value1
    {
        width: 100%;
        margin: 20px 30px 0 0;
        font-size: 16px;
        color: #1973E8;
        font-weight: 600;
        border-radius: 5px;
        border: 2px solid #1973E8;
        padding: 5px;
        outline: none;
    }
</style>
<body>
<div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
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
    <div class="carousel-item">
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
    <div class="carousel-item">
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
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</body>
</html>