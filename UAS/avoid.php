<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="asset/css/avoid.css">
    <title>Avoid the Number</title>
</head>
<body>

    <!-- navbar -->
    <?php
        include('asset/php/navbar.php');
    ?>

    <!-- top wave -->
    <?php
        include('asset/php/stalagtite.php');
    ?>

    <div class="content">
        <div class="title">
            <p>Avoid the Number!</p>
        </div>
        <div class="desc">
            <p>Play by entering a number that is not the computer generated number. Win by entering a number and avoiding the generated number for a certain amount of attempts.</p>
        </div>
        <div class="container_avoid">
            <p>Please choose a difficulty:</p>
            <div class="diff">
                <button class="button" id="beginner" onclick="button_press(this.id)">Beginner</button>
                <button class="button" id="easy" onclick="button_press(this.id)">Easy</button>
                <button class="button" id="medium" onclick="button_press(this.id)">Medium</button>
                <button class="button" id="hard" onclick="button_press(this.id)">Hard</button>
                <button class="button" id="extreme" onclick="button_press(this.id)">Extreme</button>
                <button class="button" id="impossible" onclick="button_press(this.id)">Impossible</button>
            </div>
        </div>
        <div class="game">
            <p id="difficulty"></p>
            <div class="input">
                <input type="text" name="inputbox" id="guess" placeholder="Input a number">
                <button id="check_button">Enter</button>
            </div>
            <div class="attempt">
                <p id="attempts"></p>
            </div>
        </div>
        <div class="message_box">
            <p id="message"></p>
        </div>
        <div class="reset">
            <button class="reset_button" onclick="reset()">Reset</button>
        </div>
        <footer>
            &copy; Avoid The Number
        </footer>
    </div>

    <!-- bottom wave -->
    <?php
        include('asset/php/stalagmite.php');
    ?>  

    <script src="asset/js/rgb.js"></script>
    <script src="asset/js/avoid.js"></script>
</body>
</html>
