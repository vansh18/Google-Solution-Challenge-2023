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
    <link rel="stylesheet" href="<?php echo ASSETS.'css/chatbot.css'; ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <title>ChatBot</title>
</head>
<body>
    <section>

    <div class="left-box">
            <div class="close-button">
                 <ion-icon name="close-outline" id="close-icon"></ion-icon>
             </div>
            <img src="<?php echo ASSETS.'images/LOGO.svg';?>" alt="">
            <div class="buttons">
                <button type = "button" id = "clear-btn"><ion-icon name="close-circle-outline" class="icon"></ion-icon>End Session</button>
                <button type = "button" onclick="window.location.href = '<?php echo BASE_URL.'home';?>';"><ion-icon name="caret-back-outline" class="icon"></ion-icon>Return</button>
                <button type = "button"><ion-icon name="megaphone-outline" class="icon"></ion-icon>Report an Issue</button>
            </div>
        </div>

        <div class="mob-header">
                 <div class="toggle_btn">
                     <ion-icon name="menu-outline" id="menu-icon"></ion-icon>
                 </div>
                 <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="">
        </div>

    <div class="right-box">
        <div class="chat-box" id="main-box">
            <div class="chat outgoing">
                <div class="details">
                    <p>Hi there! How are you doing today?</p>
                </div>
            </div>
        </div>

        <div class="form-container">
            <form class="typing-area">
                <input type="text" placeholder="Send a message" id="input"/>
                <input type="hidden" name="chat" value = />
                <button type="button" id="send"><ion-icon name="send-outline"></ion-icon></button>
            </form>
        </div>
    </div>
</section>
    <script>
        var menu_icon = document.getElementById("menu-icon");
        var close_icon = document.getElementById("close-icon");
        var chatBox = document.querySelector('.chat-box');
        menu_icon.addEventListener("click", function() 
        {
            if (menu_icon.name == "menu-outline") 
            {
                document.querySelector(".left-box").style.display = "flex";
            }
        });
        close_icon.addEventListener("click", function() 
        {
            if (close_icon.name == "close-outline") 
            {
                document.querySelector(".left-box").style.display = "none";
            }
        });
        function scrollChatBox() 
        {   
            chatBox.scrollTop = chatBox.scrollHeight;
        }
        window.onload = function() 
        {
            chatBox.scrollTop = chatBox.scrollHeight;
        }
        $(document).ready(function() {
        // Your code here
        $.ajax({
        type: "POST",
        url: "<?php echo BASE_URL."get-file"; ?>",
        success: function(response) {
            // Handle the response from the PHP function
            console.log(response);
            var res = (JSON.parse(response));
            if(res.status == 200)
            {
               console.log("File downloaded");
            }
            else
            {
                console.log("Error");
            }
        },
        error: function() {
            // Handle any errors that occur during the Ajax call
            console.log("Error occurred during Ajax call");
            }
        });
        });

        $("#input").on("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault(); // Prevent default form submit behavior
                scrollChatBox();
                chat();
            }
        });

        $(document).on('click', '#send', function(){
            scrollChatBox();
            chat();
    });
    
    function chat(){
        //get input from field, validate and sanatize and make ajax call
        var input = ($("#input").val()).trim();
        input = sanitizeString(input);
        if(input === ''){
            return false;
        }
        var post_data = {'input':input};
        $("#input").val(""); //clear input field content
        console.log(input); 
        $('#main-box').append('<div class="chat incoming"> <div class="details"><p>'+
        input+'</p></div></div>');
        scrollChatBox();
        //ajax call to send input to controller
        $.ajax({
        type: "POST",
        url: "<?php echo BASE_URL."get-output"; ?>",
        data: post_data,
        success: function(response) {
            // Handle the response from the PHP function
            console.log(response);
            var res = (JSON.parse(response));
            if(res.status == 200)
            {
                $('#main-box').append("<div class=\"chat outgoing\"> <div class=\"details\"><p>"+
                (res.msg).replace("\n","<br>")+"</p></div></div>");
                scrollChatBox();
            }
            else
            {
                console.log("Error");
            }
        },
        error: function() {
            // Handle any errors that occur during the Ajax call
            console.log("Error occurred during Ajax call");
            }
        });

    }

    function sanitizeString(inputString) {
        // Check if the input string is empty or not
        if (inputString.trim() === '') {
            return ''; // return an empty string if input is empty
        }

        // Remove special characters using a regular expression
        var sanitizedString = inputString.replace(/[<>#"'&{}]/g, '');

        return sanitizedString;
    }
    $('#clear-btn').on('click',function(event){
            event.preventDefault();
            $('#main-box').html("<div class='chat outgoing'> <div class='details'><p>Good Bye:)</p></div></div>");
            // ajax call to upload chat
            $.ajax({
                type: "POST",
                url: "<?php echo BASE_URL."upload-file"; ?>",
                success: function(response) {
                    // Handle the response from the PHP function
                    console.log(response);
                    var res = (JSON.parse(response));
                    if(res.status == 200)
                    {
                        console.log("Session ended, file uplaoded!");
                    }
                    else
                    {
                        console.log("Error");
                    }
                },
                error: function() {
                    // Handle any errors that occur during the Ajax call
                    console.log("Error occurred during file upload Ajax call");
                    }
            });

            // setTimeout(() => {
            //     location.reload();
            // }, 1500);
        });

    $(window).on('beforeunload', function() {
    var url = '<?php echo BASE_URL."upload-file"; ?>';
    navigator.sendBeacon(url);
    });
// });
    </script>
</body>
</html>