<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link href="asset/css/mainpage.css" rel="stylesheet">

    <title>Main Document</title>
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
  <!-- top wave end -->

  
    <!-- game option -->
    <div class="container text-center content">
      <div class="row">
        <!-- opsi 1 -->
        <div class="col">
          <div class="card " style="width: 18rem;">
            <img src="..." class="card-img-top" alt="gambar tiktaktuk . png">
            <div class="card-body">
              <h5 class="card-title">Tic ~ Tac ~ Toe</h5>
              <a href="difficulty.php?game=tic-tac-toe" class="btn btn-primary " id="play">Play</a>
            </div>
          </div>
        </div>

        <!-- opsi 2 -->
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="gambar number guess . png">
            <div class="card-body">
              <h5 class="card-title">Number Guess</h5>
              <a href="difficulty.php?game=number-guess" class="btn btn-primary" id="play">Play</a>
            </div>
          </div>
        </div>
      </div>
        
      <div class="row">
        <!-- opsi 3 -->
        <div class="col">
          <div class="card " style="width: 18rem;">
            <img src="..." class="card-img-top" alt="gambar avoid the number . png">
            <div class="card-body">
              <h5 class="card-title">Avoid `De Number</h5>
              <a href="difficulty.php?game=avoid-the-number" class="btn btn-primary" id="play">Play</a>
            </div>
          </div>
        </div>
        
        <!-- opsi 4 -->
        <div class="col">
          <div class="card " style="width: 18rem;">
            <img src="..." class="card-img-top" alt="gambar . png">
            <div class="card-body">
              <h5 class="card-title">Coming Soon</h5>
              <a href="#" class="btn btn-primary " id="play">Play</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- game option end-->

      <!-- bottom wave -->
      <?php
        include('asset/php/stalagmite.php');
      ?>
      <!-- bottom wave end -->
      
      <script src="asset/js/rgb.js"></script>
</body>
</html>