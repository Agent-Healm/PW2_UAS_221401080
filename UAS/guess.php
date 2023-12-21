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
    <link rel="stylesheet" href="asset/css/guess.css">
    <title>Permainan Tebak Angka</title>
</head>
<body>
    <!-- navbar -->
    <?php
        include('asset/php/navbar.php');
    ?>
    <!-- stalagtite -->
    <?php
        include('asset/php/stalagtite.php');
    ?>
    <div class="content">
        <h1>Permainan Tebak Angka</h1>
        <p>Pilih Mode:</p>
        <div class="modes">
            <button class="mode-button" id="beginner">Beginner</button>
            <button class="mode-button" id="easy">Easy</button>
            <button class="mode-button" id="medium">Medium</button>
            <button class="mode-button" id="hard">Hard</button>
            <button class="mode-button" id="extreme">Extreme</button>
            <button class="mode-button" id="impossible">Impossible</button>
        </div>
        <div class="game">
            <p>Masukkan angka antara 1 dan 100:</p>
            <input type="text" id="guess" placeholder="Tebak angka">
            <button id="checkButton" disabled>Enter</button>
            <button id="resetButton">Ulangi Permainan</button>
            <p id="message"></p>
        </div>

        <footer>
            <p>Copyright &copy; 2023 Dimas Syafrizal S 221401093</p>
        </footer>
    </div>
    
        <!-- stalagmite -->
        <?php
            include('asset/php/stalagmite.php');
        ?>

    <script src="asset/js/guess.js"></script>
    <script src="asset/js/rgb.js"></script>
</body>
</html>
