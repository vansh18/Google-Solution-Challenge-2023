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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <link rel="stylesheet" href="<?php echo ASSETS.'css/signup.css'; ?>">
    <title>SignUp</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="#">
                <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="" srcset="" >
            </a>
        </div>
    </header>
    <section>
        <div class="rocket">
            <img src="<?php echo ASSETS.'images/rocket.svg';?>" alt="">
        </div>
        <div class="login_box">
            <h1>Sign Up</h1>
            <p>Join us on the journey to better mental health. Sign up today and take the first step.</p>
            <div class="container">
                <form method="post" action="" autocomplete="off" id="signup-form">

                    <div class="input_box">
                        <span>Full Name</span>
                        <ion-icon name="person-outline" class="icon"></ion-icon>
                        <input type="text" name="full_name" id="name_box" required = "required">
                    </div>

                    <div class="input_box">
                        <span>Email</span>
                        <ion-icon name="mail-outline" class="icon"></ion-icon>
                        <input type="email" name="email" id="email_box" required = "required">
                    </div>

                    <div class="input_box">
                        <span>Password</span>
                        <div onclick="changeInputType()" id="eye" class="eye">
                            <ion-icon id="password-icon" name="eye-off-outline"></ion-icon>
                        </div>
                        <ion-icon name="key-outline" class="icon"></ion-icon>
                        <input type="password" name="password" id="password_box" required = "required">
                    </div>

                    <div class="forgot_password">
                        <span>Have an account?</span><a href="<?php echo BASE_URL."login"; ?>">Login</a>
                    </div>
                    <button type="button" class="submit_button">Get Started</button>
                    <div id="error-message" class="error-message"></div>
                </form>
            </div>
        </div>
    </section>
        <script>
            function changeInputType() 
        {
        var passwordInput = document.getElementById("password_box");
        var passwordIcon = document.getElementById("password-icon"); 
        if (passwordInput.type === "password") 
        {
            passwordInput.type = "text";
            passwordIcon.name = "eye-outline"; 
        } 
        else 
        {
            passwordInput.type = "password";
            passwordIcon.name = "eye-off-outline"; 
        }
        }

        $('.submit_button').on('click',function (event) {
            event.preventDefault();
            $("#error-message").html("");
            $("#error-message").css("display", "block");// show error message div
            var validate = true;
            var form = $("#signup-form");
            var name = $("#name_box").val();
            var email = $("#email_box").val();
            var password = $("#password_box").val();
            if (name.trim() == '') {
                $("#error-message").html("Please enter your name");
                validate = false;
                return false;
            }
            if (email.trim() == '') {
                $("#error-message").html("Please enter your email");
                validate = false;
                return;
            }
            if (password.trim() == '') {
                $("#error-message").html("Please enter a password");
                validate = false;
                return;
            }
            if (!(/^[a-zA-Z ]{1,30}$/.test(name))) {
                $("#error-message").html("Please enter a valid name.");
                validate = false;
                return;
            }
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
                $("#error-message").html("Please enter a valid email.");
                validate = false;
                return;
            }
            if (!(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/.test(password))) {
                $("#error-message").html("Please enter a password of minimum 8 characters with atleast one letter, number and special character");
                validate = false;
                return;
            }
            if (validate) {
                $(".error-message").hide();
                form.submit(); // jQuery
            }
            else{
                $("#error-message").css("display", "block");// show error message div
            }
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        });

            $('#signup-form').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var name = $("#name_box").val();
            var email = $("#email_box").val();
            var password = $("#password_box").val();
            var hashedPassword = CryptoJS.SHA256(password).toString();
            $.ajax({
                url: "<?php echo BASE_URL."register-user"; ?>",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    password: hashedPassword
                },
                success: function(response) {
                    // Handle the response from the server
                    if (response.success) {
                    // Update the UI based on the response
                    console.log("success");
                    console.log(response.email);
                    console.log(response.password);
                    // window.location.href = '<?php echo BASE_URL."home"; ?>'; // Redirect to the home page
                } 
                else {
                    $('#error-message').text("Email already registered, please try a different one!"); // Display error message
                    $(".error-message").css("display", "block");
                }
                    // console.log(response.email);
                    // console.log(response.password);
                },
                error: function() {
                    // Handle any errors that occur during the Ajax call
                    $('#error-message').text("Email already registered, please try a different one!"); // Display error message
                    $(".error-message").css("display", "block");
                    console.log("Error registering user");
                },
                dataType: "json"
        });
      });
        </script>
    </body>
</html>