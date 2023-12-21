<?php 
// Memulai atau mereset sesi
session_start();

// Mengosongkan semua variabel sesi
$_SESSION = [];

// Menghapus semua data yang terkait dengan sesi
session_unset();

// Menghancurkan sesi
session_destroy();

// Redirect ke halaman login setelah logout
header("location:mainpage.php");
exit;
?>
