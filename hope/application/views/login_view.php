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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <link rel="stylesheet" href="<?php echo ASSETS.'css/login.css'; ?>">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Login</title>
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
            <h1>Welcome Back</h1>
            <p>We are always ready to serve you better.</p>
            <div class="container">
                <form method="post" action="" autocomplete="off" id="login-form">

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
                        <a href="#">Forgot Password?</a>
                        <a href="<?php echo BASE_URL."signup"; ?>">Don't have an account</a>
                    </div>
                    <button type="submit" class="submit_button">Login</button>
                    <div id="error-message" class="error-message"></div>
                </form>
            </div>
        </div>
    </section>
</body>
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

// Attach an event listener to the form's submit event
$('#login-form').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        var email = $("#email_box").val();
        var password = $("#password_box").val();
        var hashedPassword = CryptoJS.SHA256(password).toString();
        $.ajax({
            url: "<?php echo BASE_URL."validate-user"; ?>",
            type: "POST",
            data: {
                email: email,
                password: hashedPassword
            },
            success: function(response) {
                // Handle the response from the server
                if (response.success) {
                // Update the UI based on the response
                console.log("Login successful");
                window.location.href = '<?php echo BASE_URL."home"; ?>'; // Redirect to the main page
              } 
              else {
                $('#error-message').text("Invalid email or password. Please try again."); // Display error message
                $(".error-message").css("display", "block");
              }
                // console.log(response.email);
                // console.log(response.password);
            },
            error: function() {
                // Handle any errors that occur during the Ajax call
                $('#error-message').text("Invalid email or password. Please try again."); // Display error message
                $(".error-message").css("display", "block");
                console.log("Error occurred during Ajax call");
            },
            dataType: "json"
        });
      });

  </script>
</html>

