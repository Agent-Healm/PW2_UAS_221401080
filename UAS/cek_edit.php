<?php
session_start();
include 'login_connection.php';
$edit_name = $_SESSION['username'];
if (isset($_POST["ubah"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = md5($_POST["password"]);

    $query = "UPDATE users SET
            username = '$username',
            email = '$email'
            WHERE username = '$edit_name '
            AND password = '$pass'";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "
        <script>
            alert('Data berhasil diubah');
            document.location.href='login.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diubah');
            document.location.href='login.php';
        </script>";
    }
}
?>
