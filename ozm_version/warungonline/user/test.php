<?php 
include '../db.php';
include 'fungsi_indotgl.php';
$a = mysqli_query($conn, "SELECT date FROM tb_checkout");
while($row = mysqli_fetch_array($a)){
    echo $row['date'];
    echo '<br>';
}
?>