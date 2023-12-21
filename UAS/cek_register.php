<?php 
// Memasukkan file connection.php, yang kemungkinan berisi logika koneksi ke database
include 'login_connection.php';

// Memeriksa apakah formulir pendaftaran telah dikirimkan
if(isset($_POST["register"])){
    // Mengambil nilai-nilai dari formulir pendaftaran
    $username = strtolower(stripslashes($_POST["username"])); 
    $email = $_POST["email"];
    $password = mysqli_real_escape_string($conn,$_POST["password"]);

    // Melakukan kueri database untuk memeriksa apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");

    // Memeriksa apakah username sudah terdaftar, jika ya, tampilkan pesan peringatan
    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('username sudah terdaftar');
            </script>
        ";
        return false; // Memberhentikan eksekusi kode selanjutnya jika username sudah terdaftar
    }

    // Mengenkripsi password menggunakan md5 (harap perhatikan bahwa md5 dianggap kurang aman)
    $epassword = md5($password);

    // Menyisipkan data pengguna ke dalam database
    mysqli_query($conn, "INSERT INTO users VALUES('','$username','$email','$epassword')");

    // Memeriksa apakah data pengguna berhasil disisipkan ke dalam database
    if(mysqli_affected_rows($conn) > 0){
        echo "
        <script>
        alert('user berhasil dibuat');
        document.location.href='login.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn); // Menampilkan pesan kesalahan jika ada masalah saat menyisipkan data ke dalam database
    } 
}
?>
