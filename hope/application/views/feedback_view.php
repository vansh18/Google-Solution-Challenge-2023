<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS.'css/feedback.css';?>">
    <title>HOPE | Feedback</title>
</head>
<body>
    <div class="container">
        <h2>Your Feedback is Important To Us.</h2>
        <p>Feel free to let us know what can we do better.</p>
    </div>
    <div class="form">
        <form action="" method="post" id="feedbackForm">
            <textarea name="feedback" id="feedback" cols="25" rows="5" autofocus></textarea>
            <button type="button" onclick="check();">Send</button>
        </form>
    </div>
    <script>
        function check()
        {
            var form=document.getElementById("feedbackForm");   
            var feedback = document.getElementById("feedback").value;
            if(feedback.trim() != "")
                form.submit();
        }
    </script>
</body>
</html>