<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit;
}
include 'login_connection.php';
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-icons/6.15.0/simpleicons.svg">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <title>Edit</title>
</head>
<body>
    <header>
       <div class="right_area">
            <i class="fa-solid fa-bars" id="btn"></i>
       </div>
    </header>

    <div class="sidebar">
        <div class="menu"><a href="logout.php" id="logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>  
        </div> 
    </div>

    <div class="content">
    <form action="cek_edit.php" method="POST" id="tambah">
        <center>
        <h1>Ubah Data</h1>
        <table width="80%" id="edit">
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="pass"></td>
            </tr>
            <tr>
                <td><a href="delete.php">Delete acc</a></td>
            </tr>
        </table>

        <button type="submit" name="ubah">Ubah</button>
        </center>
    </form>
    </div>

    <script src="script.js"></script>
</body>
</html>