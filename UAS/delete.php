<?php 
    session_start();
    include 'login_connection.php';

    // $id = $_GET["id"];
    $delete_name = strtolower($_SESSION['username']);
    mysqli_query($conn, "DELETE FROM users WHERE username = '$delete_name'");

    if(mysqli_affected_rows($conn)>0){
        echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href='logout.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal dihapus');
            document.location.href='logout.php';
        </script>
        ";
    }
?>