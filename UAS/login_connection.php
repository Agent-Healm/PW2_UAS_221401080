<?php 
// Informasi koneksi ke database
$server = "localhost";
$user = "root";
$pass = "";
$db = "pemain";

// Membuat koneksi ke database
$conn = mysqli_connect($server, $user, $pass, $db);

// Fungsi untuk menjalankan kueri SQL dan mengembalikan hasilnya dalam bentuk array asosiatif
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>
