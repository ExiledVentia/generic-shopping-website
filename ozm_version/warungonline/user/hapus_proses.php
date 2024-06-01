<?php
include '../db.php';

if (isset($_GET['idc'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_cart WHERE cart_id ='" . $_GET['idc'] . "'");
    echo '<script>window.location="cart.php"</script>';
}