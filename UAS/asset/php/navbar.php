<?php
  $nav_name = $nav_pass = '';
  if (isset($_SESSION["login"])){
    $nav_name = $_SESSION['username'];
    $nav_pass = $_SESSION['userpass'];
  }
?>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-primary sticky-top">
    <div class="container">
      <a class="navbar-brand" href="mainpage.php">
        Prismatic Game
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <?php
          if ($nav_name !== ''){
            echo '<li class="nav-item">';
            echo "<a class='nav-link' href='edit.php'>Welcome, $nav_name</a>";
            echo "</li>";
          }
          ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle disabled" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Settings
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          
          <?php
            $game = str_replace('/', '', $_SERVER['PHP_SELF']);
            $url = 'tic-tac-toe';
            switch ($game){
              case "tictactoe.php":
                $url = 'tic-tac-toe';
                break;
              case "guess.php":
                $url = 'number-guess';
                break;
              case "avoid.php":
                $url = 'avoid-the-number';
                break;
            }
            $url = 'difficulty.php?game=' . $url;
            echo '<li class="nav-item">';
              echo "<a class='nav-link' href = $url >Select Difficulty</a>";
            echo "</li>";
          ?>
          <li class="nav-item">
            <a class="nav-link" href="mainpage.php">Exit</a>
          </li>

          <?php
            if(isset($_SESSION["login"])){
              echo '<li class="nav-item">';
              echo '  <a class="nav-link" href="logout.php" >Logout</a>  ';
              echo '</li>';
            } elseif(!isset($_SESSION["login"])){
              echo '<li class="nav-item">'; 
              echo '  <a class="nav-link" href="login.php">Log In</a>';
              echo '</li>';
            }
          ?>

        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar end -->