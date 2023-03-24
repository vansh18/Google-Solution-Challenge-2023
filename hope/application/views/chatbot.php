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
            <img src="<?php echo ASSETS.'images/Logo.svg';?>" alt="">
            <div class="buttons">
                <button type = "button" id = "clear-btn"><ion-icon name="close-circle-outline" class="icon"></ion-icon>End Session</button>
                <button type = "button"><ion-icon name="caret-back-outline" class="icon"></ion-icon>Return</button>
                <button type = "button"><ion-icon name="megaphone-outline" class="icon"></ion-icon>Report an Issue</button>
            </div>
    </div>
    <div class="right-box">
        <div class="chat-box" id="main-box">
        <div class="chat outgoing">
                    <div class="details">
                        <p>Hi there! How are you doing today?</p>
                    </div>
                </div>
            
                <!-- <div class="chat incoming">
                    <div class="details">
                        <p>I am worried as I have my exams in a few weeks.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>HOPE: Hi, it sounds like you're feeling a lot of anxiety about your upcoming exams. I want to assure you that you can do this! </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>HOPE: There are a few things that you can do to help manage your anxiety around your exams. First, it is important to develop a study plan and stick to it. This will help you feel more prepared and in control. Additionally, make sure to take breaks and allow yourself time to relax.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>Thanks Hope I will follow that and will be back if I need something.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>HOPE: Always a pleasaure Vansh. Let me know if you need something.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>That's all for now. Bye!</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>HOPE: Bye Vansh, Have a nice day.</p>
                    </div>
                </div> -->
            </div>
            <form class="typing-area">
                <input type="text" placeholder="Send a message" id="input"/>
                <input type="hidden" name="chat" value = />
                <button type="button" id="send"><ion-icon name="send-outline"></ion-icon></button>
            </form>
        </div>

    </section>
    <script>
        $('#clear-btn').on('click',function(event){
            event.preventDefault();
            $('#main-box').html("<div class='chat outgoing'> <div class='details'><p>Hi there! How are you doing today?</p></div></div>");
        });
        $("#input").on("keydown", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault(); // Prevent default form submit behavior
                chat();
            }
        });
        // $("button").click(function(){
            $(document).on('click', '#send', function(){
                chat();
    });
    
    function chat(){
        // Select the chat window element
        var chatWindow = $('#main-box');
        // Check if the chat content exceeds the height of the chat window
        if (chatWindow[0].scrollHeight > chatWindow.innerHeight()) {
        // If so, scroll down to the bottom of the chat window
        chatWindow.scrollTop(chatWindow[0].scrollHeight - chatWindow.innerHeight());
        }
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
                res.msg+"</p></div></div>");
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
// });
    </script>
</body>
</html>