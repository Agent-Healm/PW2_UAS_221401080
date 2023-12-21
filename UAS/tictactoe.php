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
    <link rel="stylesheet" href="asset/css/tictactoe.css">
    <title>Healm</title>
</head>
<body>
    <!-- navbar -->
    <?php
      include("asset/php/navbar.php");
    ?>

    <!-- top wave -->
    <?php
        include('asset/php/stalagtite.php');
    ?>

    <!-- tictactoe -->
    <div class="content">
        <table class="main">
            <tbody>
                <tr>
                    <td class="border1" colspan="3" >Ini adalah tictactoe</td>
                </tr>
                <tr>
                    <td class = 'tile border1' id="tile1"></td>
                    <td class = 'tile border1' id="tile2"></td>
                    <td class = 'tile border1' id="tile3"></td>
                </tr>
                <tr>
                    <td class = 'tile border1' id="tile4"></td>
                    <td class = 'tile border1' id="tile5"></td>
                    <td class = 'tile border1' id="tile6"></td>
                </tr>
                <tr>
                    <td class = 'tile border1' id="tile7"></td>
                    <td class = 'tile border1' id="tile8"></td>
                    <td class = 'tile border1' id="tile9"></td>
                </tr>
                <tr>
                    <td class="info-tile border1" colspan = '2' id="winner"></td>
                    <td class='info-tile border1' id="restart"></td>
                </tr>
            </tbody>
        </table>

        <footer>
            &copy Healm | 221401080
        </footer>
    </div>
    <!-- tictactoe end -->

    <!-- wave end -->
    <?php
        include('asset/php/stalagmite.php');
    ?>

    <script src="asset/js/rgb.js"></script>
    <script src="asset/js/tictactoe.js"></script>

</body>
</html>