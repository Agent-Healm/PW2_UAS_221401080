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
    <style>

      .card {
          color: black;
          background-color: rgba(0,0,0,0);
          border-width: 0rem;
      } 

      .dif {
        /* background-color: transparent; */
        background-color: rgba(23, 18, 18, 0.3);
        border-width: 0rem;
        font-size: 30px;
      }
      
      .dif:hover {
        /* background-color: transparent; */
        background-color: rgba(23, 18, 18, 0.9);
        border-width: 0rem;
      }
      
      .dif.btn-primary:active {
        background-color: transparent;
        /* --bs-btn-active-color : red; */
      }

      #beginner {
        color: rgb(26, 244, 244);
      }

      #easy {
        color: rgb(7, 253, 7);
      }

      #medium {
        color: rgb(255, 230, 0);
      }

      #hard {
        color: rgb(136, 101, 5);
      }

      #extreme {
        color : rgb(208, 0, 0);
      }

      #impossible {
        color: rgb(7, 7, 165);
      }

      .content {
        margin-top: 120px;
        height : 170px;
      }

    </style>
    <title>Difficulty</title>
</head>

<?php
  $link = 'tictactoe.php';
  if(isset($_GET['game'])){
    if($_GET['game'] == 'tic-tac-toe'){
      $link = "tictactoe.php";
    }elseif($_GET['game'] == 'number-guess'){
      $link = "guess.php";
    }elseif($_GET['game'] == 'avoid-the-number'){
      $link = "avoid.php";
    }
  } else {
    header('location:mainpage.php');
  }
?>

<body>
    
    <!-- navbar -->
    <?php
      include("asset/php/navbar.php");
    ?>
    
    <!-- top wave -->
    <?php
    include("asset/php/stalagtite.php");
    ?>

    <div class="container text-center content">
        <div class="row ">
            <div class="col">
                <h1>Choose Difficulty</h1>
            </div>
        </div>

        <div class="row">
          
          <!-- opsi 0 -->
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <a href=<?php echo $link, "?dif=beginner" ;?>
                class="btn btn-primary dif" id="beginner">Play Beginner</a>
                </div>
            </div>
          </div>

          <!-- opsi 1 -->
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <a href=<?php echo $link, "?dif=easy" ;?>
                class="btn btn-primary dif" id="easy">Play Easy</a>
              </div>
            </div>
          </div>
          
          <!-- opsi 2 -->
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <a href=<?php echo $link, "?dif=medium" ;?>
                class="btn btn-primary dif" id="medium">Play Medium</a>
              </div>
            </div>
          </div>
        </div>  

        <div class="row">
          <!-- opsi 3 -->
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <a href=<?php echo $link, "?dif=hard" ;?>
                class="btn btn-primary dif" id="hard">Play Hard</a>
              </div>
            </div>
          </div>
        

          <!-- opsi 4 -->
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <a href=<?php echo $link, "?dif=extreme" ;?>
                class="btn btn-primary dif" id="extreme">Play Extreme</a>
              </div>
            </div>
          </div>
          
          <!-- opsi 5 -->
          <div class="col">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <a href=<?php echo $link, "?dif=impossible" ;?>
                class="btn btn-primary dif" id="impossible">Play Impossible</a>
              </div>
            </div>
          </div>

        </div>
      </div>

    <!-- bottom wave -->
    <?php
    include('asset/php/stalagmite.php');
    ?>
      <!-- bottom wave end -->

  <script src="asset/js/rgb.js"></script>
</body>
</html>