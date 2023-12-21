<?php 
// Memulai sesi untuk mengelola status login pengguna
session_start();

// Memeriksa apakah pengguna sudah login, jika ya, redirect ke mainpage
if(isset($_SESSION["login"])){
    header("location:mainpage.php");
    exit;
}

// Memasukkan file connection.php, yang kemungkinan berisi logika koneksi ke database
include 'login_connection.php';

// Memeriksa apakah formulir login telah dikirimkan
if(isset($_POST["login"])){
    // Mengambil username dan password yang dimasukkan dari formulir
    $username = $_POST["username"];
    $userpass = $_POST["password"];

    // Menjalankan kueri database untuk mengambil detail pengguna berdasarkan username yang dimasukkan
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $simpan = mysqli_fetch_assoc($result);

    // Memeriksa apakah ada pengguna dengan username yang dimasukkan dalam database
    if(mysqli_num_rows($result)===1){
        // Memeriksa apakah password yang dimasukkan cocok dengan password terenkripsi yang tersimpan di database
        if(md5($userpass)===$simpan["password"]){
            // Mengatur variabel sesi untuk menandakan bahwa pengguna sudah login
            $_SESSION["login"] = TRUE;
            $_SESSION['username'] = $username;
            $_SESSION['userpass'] = $userpass;
            // Redirect ke halaman pengguna setelah login berhasil
            header("location:mainpage.php");
        }else {
            // Menampilkan peringatan dan redirect jika password salah
            echo "<script>alert('password atau username salah');
            document.location.href='login.php'</script>";
        }
    } else {
        // Menampilkan peringatan dan redirect jika username tidak ditemukan dalam database
        echo "<script>alert('password atau username salah');
        document.location.href='login.php';</script>";
    }
}

?>
