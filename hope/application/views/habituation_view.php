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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/habituation.css';?>">
    <link rel="icon" type="image/x-icon" href="<?php echo ASSETS.'images/favicon-32x32.png';?>">
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
                                <p class="heading">Max Streak</p>
                                <p class="streak"><?php echo $myhabit['max_streak']." days";?></p>
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
                                <p class="streak"><?php echo $myhabit['max_streak']." days";?></p>
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
