<?php include('db.php');
session_start();
if (!isset($_SESSION['id_login']) || (trim($_SESSION['id_login']) == "")) {
    ?>
    <script>
        alert('Please Login Before You Continue')
        window.location = "public/login.php";
    </script>
    <?php
}
$session_id = $_SESSION['id_login'];

$user_query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id= '$session_id'") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($user_query);
?>