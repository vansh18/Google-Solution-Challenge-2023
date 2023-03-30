<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- <link rel="stylesheet" href="<?php //echo ASSETS.'css/habituation.css';?>"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;627&family=Chelsea+Market&family=EB+Garamond:wght@400;500;600;700&family=Inter:wght@400;500;700&family=Montserrat&family=Open+Sans:wght@300;400;500;600;700;800&family=Rubik&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans';
            /* outline: 1px solid black !important; */
        }
        
        body 
        {
            font-family: 'Open Sans';
            font-size: 16px;
            line-height: 1.5;
        }
        
        a 
        {
            text-decoration: none;
            font-weight: 600;
            color: #3C2A21;
        }
        
        ul 
        {
            list-style: none;
        }
        
        /* HEADER */
        
        header 
        {
            padding: 1rem;
        }
        
        .navbar 
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo img 
        {
            height: 50px;
        }
        
        .links
        {
        margin: 0;
        }

        .links li 
        {
            display: inline-block;
            margin-right: 1rem;
        }
        
        .logout_btn 
        {
            display: inline-block;
            color: #3C2A21;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin-right: 1rem;
        }

        .toggle_btn 
        {
            display: none;
        }

        .carousel-item 
        {
            height: calc(100vh - 155px);
            background: #BFD8FF;
            border-radius: 300px 300px 0 0;
            position: relative;
            color: white;
        }

        .carousel-indicators [data-bs-target] 
        {
            box-sizing: content-box;
            flex: 0 1 auto;
            width: 30px;
            height: 3px;
            padding: 0;
            margin-right: 3px;
            margin-left: 3px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #1973E8;
            background-clip: padding-box;
            border: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            opacity: .5;
            transition: opacity .6s ease;
        }

        .carousel-indicators .active 
        {
            opacity: 1;
        }

        .container
        {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-wrap: wrap;
            padding: 100px;
        }

        .container .heading
        {
            color: #FFFFFF;
            font-weight: 300;
            margin: 10px 0;

        }

        .box-container
        {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content:space-between;
        }

        .box-1
        {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: #1973E8;
            padding: 30px 40px;
            border-radius: 20px;
            border: none;
        }

        .box-1 .streak
        {
            font-size: 24px;
            color: #FFFFFF;
            font-weight: 600;
        }

        .box-container
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
            padding: 10px 40px;
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
            margin: 0;
        }

        .box-2 .time_container .time
        {
            font-size: 16px;
            color: #FFFFFF;
            margin: 0;
        }

        .box-2 .time_container button
        {
            background: none;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        .box-2 .time_container button img
        {
            width: 20px;
        }

        .section-action
        {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .actions
        {
            display: flex;
            flex-direction: row;
            position: relative;
            z-index: 10;
        }

        .action-btn
        {
            display: flex;
            align-items: center;
            color: #1973E8;
            font-weight: 600;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 18px;
            margin: 15px;
        }

        .box-container a
        {
            display: flex;
            align-items: center;
            color: #1973E8;
            font-weight: 500;
        }

        .box-container .addiction_navigation
        {
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 5px;
        }

        .box-container .addiction_navigation a
        {
            background: #5A9BFF;
            width: 12px;
            height: 12px;
            border-radius: 100%;
            margin: 0 5px;
            transition: .4s;
        }

        .box-container .addiction_navigation a:focus
        {
            background: #1973E8;
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

        /* ----- RESPONSIVENESS ----- */

        @media only screen and (max-width: 500px) 
        {
            #dialogbox > div > #dialogboxbody
            {
                padding:10px; 
                font-size: 16px;
            }

            #dialogbox
            {
                width: 300px;
                transform: translateX(40%);
            }
        }


        @media only screen and (max-width: 576px) 
        {
            .carousel-item
            {
                border-radius: 50px 100px 0 0;
            }
        }


        @media only screen and (max-width: 600px) 
        {

            ul
            {
                display: none;
            }
            
            .logout_btn
            {
                display: none;
            }

            .active1
            {
                position: absolute;
                background: #5A9BFF;
                border-radius: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                top: 80px;
                right: 35px;
                width: 80%;
                margin: 0 auto;
                padding: 30px;
                z-index: 1000;
            }
            
            .active1 li a 
            {
                color: #FFF;
            }
        
            .toggle_btn 
            {
            display: block;
            font-size: 1.5rem;
            cursor: pointer;
            }
        
            .links li 
            {
            display: block;
            margin-right: 0;
            margin-bottom: 1rem;
            }

            .carousel-item
            {
                border-radius: 50px 50px 0 0;
            }
        }

        @media only screen and (max-width: 768px) 
        {
            .carousel-item
            {
                border-radius: 150px 150px 0 0;
            }

            .container
            {
                margin: 0 auto;
                gap: 30px;
            }

            .box 
            {
                width: 200px;
            }

            .box-3
            {
                padding:30px 20px;
            }
        }

        @media only screen and (max-width: 992px) 
        {
            .carousel-item
            {
                border-radius: 150px 150px 0 0;
            }

            .container
            {
                padding: 60px 20px;
            }

            .box .heading
            {
                text-align: center;
            }

            .box .streak
            {
                font-size: 16px;
            }
            
            .box-2 .time_container .date
            {
                font-size: 16px;
            }
            
            .box-3 .addiction_mins
            {
                font-size: 16px;
            }

        }

    </style>
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
    <section class="section-action">
        <div class="actions">
            <button id='add_addiction' class="action-btn" onclick="Prompt.render('What addiction you want to add?','changeText')">
                <ion-icon name="add-outline"></ion-icon>
                Add Addiction
            </button>
            <button id="remove_button" class="action-btn"><ion-icon name="remove-outline"></ion-icon>Remove</button>
        </div>
    </section>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <?php 
                $ctr = 0;
                foreach($habits as $myhabit)
                {
                     if($ctr == 0)
                     {
            ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $ctr;?>" class="active" aria-current="true" aria-label="Slide <?php echo ($ctr+1);?>"></button>
            <?php
                    }
                    else
                    {
            ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $ctr;?>" aria-label="Slide <?php echo ($ctr+1);?>"></button>
            <?php
                    }
                    $ctr++;

                }
            ?>
        </div>
            <div class="carousel-inner"> <!-- replicate this -->
           <?php 
            $ctr = 1;
           foreach($habits as $myhabit)
           {
                if($ctr == 1)
                {
            ?>
                        <div class="carousel-item active" habit-id="<?php echo $myhabit['addiction_id'];?>">
                    <div class="container">
                        <div class="box-container">
                            <div class="box box-1">
                                <p class="heading">Streak</p>
                                <p class="streak"><?php echo $myhabit['streak']." days";?></p>
                            </div>
                        </div>
                        <div class="box-container">
                            <div class="box box-2">
                                <p class="heading">My Start Date</p>
                                <div class="time_container">
                                    <p class="date"><?php echo $myhabit['start_time'];?></p>
                                    <p class="time"><?php echo $myhabit['start_time'];?></p>
                                    <button id="reset-habit" onclick="reset_habit();"><img src="<?php echo ASSETS.'images/icons/reset.svg';?>" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="box-container">
                            <div class="box box-3">
                                <p class="heading"><?php echo $myhabit['addiction'];?> Free Since</p>
                                <p class="addiction_mins"><?php echo $myhabit['elapsed'];?></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- till here  -->
            <?php
                }
                else
                {
            ?>
                    <div class="carousel-item" habit-id="<?php echo $myhabit['addiction_id'];?>">
                    <div class="container">
                        <div class="box-container">
                            <div class="box box-1">
                                <p class="heading">Max Streak</p>
                                <p class="streak"><?php echo $myhabit['streak']." days";?></p>
                            </div>
                        </div>
                        <div class="box-container">
                            <div class="box box-2">
                                <p class="heading">My Start Date</p>
                                <div class="time_container">
                                    <p class="date"><?php echo $myhabit['start_time'];?></p>
                                    <p class="time"><?php echo $myhabit['start_time'];?></p>
                                    <button id="reset-habit" onclick="reset_habit();"><img src="<?php echo ASSETS.'images/icons/reset.svg';?>" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="box-container">
                            <div class="box box-3">
                                <p class="heading"><?php echo $myhabit['addiction'];?> Free Since</p>
                                <p class="addiction_mins"><?php echo $myhabit['elapsed'];?></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- till here -->

            <?php
                }
                $ctr++;
           }
           ?>
            
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
    <div id="dialogoverlay"></div>
    <div id="dialogbox"><div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="<?php echo ASSETS.'js/habituation.js';?>"></script>

    <script>
        function add_habit(habit){
            console.log(habit);
            $.ajax({
                url: "<?php echo BASE_URL."add-habit"; ?>",
                type: "POST",
                data: {
                    habit:habit
                },
                success: function(response) {
                    console.log(response.reply);
                    setTimeout(() => {
                        location.reload();
                    }, 200);
                },
                error: function() {
                    console.log("Error occurred during add Ajax call");
                },
                dataType: "json"
            });
        }

        $('#remove_button').click(function(){
            var habitId = $('.carousel-item.active').attr('habit-id'); //deletes active class habit
            // console.log(habitId);
            $.ajax({
                url: "<?php echo BASE_URL."delete-habit"; ?>",
                type: "POST",
                data: {
                    habit:habitId
                },
                success: function(response) {
                    console.log(response.reply);
                    setTimeout(() => {
                        location.reload();
                    }, 200);
                },
                error: function() {
                    console.log("Error occurred during delete Ajax call");
                },
                dataType: "json"
            });
        });
        
            function reset_habit(){
                console.log("button clicked!");
                var habitId = $('.carousel-item.active').attr('habit-id'); //resets active class habit
                console.log(habitId);
                $.ajax({
                    url: "<?php echo BASE_URL."reset-habit"; ?>",
                    type: "POST",
                    data: {
                        habit:habitId
                    },
                    success: function(response) {
                        console.log(response.reply);
                        location.reload();
                    },
                    error: function() {
                        console.log("Error occurred during reset Ajax call");
                    },
                    dataType: "json"
                });
            }
 
            // Get the element with the class "date" inside the active carousel item
            $('.carousel-item .date').each(function() {
                let dateElement = $(this);
                dateElement.text(getLocalDate(dateElement.text()));
            });
            $('.carousel-item .time').each(function() {
                let dateElement = $(this);
                dateElement.text(getLocalTime(dateElement.text()));
            });
        
        function getLocalDate(utcTime)
        {
            // Create a new Date object from the datetime string
            let datetimeString = utcTime;
            let datetime = new Date(datetimeString);

            // Get the user's local timezone offset in minutes
            let timezoneOffset = new Date().getTimezoneOffset();

            // Convert the datetime to the user's local time by adding the timezone offset in minutes
            datetime.setMinutes(datetime.getMinutes() - timezoneOffset);

            // Format the datetime into a string with the user's local time
            let formattedDatetime = datetime.toLocaleString();
            // console.log(formattedDatetime);
            let parts = formattedDatetime.split(',');
            let datePart = parts[0];
            let timePart = parts[1];
            let monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            let dateParts = datePart.split('/');
            let dayNumber = dateParts[0];
            let monthNumber = dateParts[1];
            let yearNumber = dateParts[2];
            let monthName = monthNames[monthNumber-1];
            let daySuffix;
            switch (dayNumber) {
            case 1:
            case 21:
            case 31:
                daySuffix = 'st';
                break;
            case 2:
            case 22:
                daySuffix = 'nd';
                break;
            case 3:
            case 23:
                daySuffix = 'rd';
                break;
            default:
                daySuffix = 'th';
                break;
            }
            let finalDate = monthName + ' ' + dayNumber + daySuffix;
            return finalDate;
            // Output the formatted datetime string
        }
        function getLocalTime(utcTime)
        {
            // Create a new Date object from the datetime string
            let datetimeString = utcTime;
            let datetime = new Date(datetimeString);

            // Get the user's local timezone offset in minutes
            let timezoneOffset = new Date().getTimezoneOffset();

            // Convert the datetime to the user's local time by adding the timezone offset in minutes
            datetime.setMinutes(datetime.getMinutes() - timezoneOffset);

            // Format the datetime into a string with the user's local time
            let formattedDatetime = datetime.toLocaleString();
            // console.log(formattedDatetime);
            let parts = formattedDatetime.split(',');
            let datePart = parts[0];
            let timePart = parts[1];
            let timeParts = timePart.split(':');
            let hour = timeParts[0]
            let minute = timeParts[1]
            let suffix = timeParts[2].split(' ')[1];
            let finalTime = hour + ": "+minute + ' ' + suffix;
            return finalTime;
        }
    </script>
  </body>
</html>
