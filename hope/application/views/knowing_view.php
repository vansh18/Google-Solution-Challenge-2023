<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOPE - Knowing You Better</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon-32x32.png">
    <link rel="stylesheet" href="<?php echo ASSETS.'css/knowing.css';?>">
</head>
<body>
    <header>
        <div class="logo">
            <a href="<?php echo BASE_URL."home";?>">
                    <img src="<?php echo ASSETS.'images/LOGO_HOME.svg';?>" alt="" srcset="" >
            </a>
        </div>
    </header>
    <div class="info-message">
        <h1>Knowing You Better</h1>
        <p>This helps us to serve you even better, we care about your privacy so your chats perfectly safe with us.</p>
    </div>
    <section class="problems">
        <div class="tile">
            <input type="checkbox" name="problem" id="Anxiety">
            <label for="Anxiety">
                <h6>Anxiety</h6>
            </label>
        </div>
        <div class="tile">
            <input type="checkbox" name="problem" id="Depression">
            <label for="Depression">
                <h6>Depression</h6>
            </label>
        </div>
        <div class="tile">
            <input type="checkbox" name="problem" id="WorkStress">
            <label for="WorkStress">
                <h6>Work Stress</h6>
            </label>
        </div>
        <div class="tile">
            <input type="checkbox" name="problem" id="ExamStress">
            <label for="ExamStress">
                <h6>Exam Stress</h6>
            </label>
        </div>
        <div class="tile">
            <input type="checkbox" name="problem" id="Relationships">
            <label for="Relationships">
                <h6>Relationships</h6>
            </label>
        </div>
        <div class="tile">
            <input type="checkbox" name="problem" id="Trauma">
            <label for="Trauma">
                <h6>Trauma</h6>
            </label>
        </div>
        <div class="tile">
            <input type="checkbox" name="problem" id="SleepDisorder">
            <label for="SleepDisorder">
                <h6>Sleep Disorder</h6>
            </label>
        </div>
    </section>
    <div class="button">
        <button type="button" onclick="window.location.href = '<?php echo BASE_URL.'login'; ?>'">Continue</button>
    </div>
</body>
</html>