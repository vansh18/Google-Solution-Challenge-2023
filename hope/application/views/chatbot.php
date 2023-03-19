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
    <title>ChatBot</title>
</head>
<body>
    <section>
        <div class="left-box">
            <img src="<?php echo ASSETS.'images/Logo.svg';?>" alt="">
        </div>
        <div class="right-box">
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>HOPE: Hi Vansh, How can I help you today.</p>
                    </div>
                </div>
                <div class="chat incoming">
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
                </div>
            </div>
            <form action="#" class="typing-area">
                <input type="text" placeholder="">
                <button><ion-icon name="send-outline"></ion-icon></button>
            </form>
        </div>
    </section>
</body>
</html>