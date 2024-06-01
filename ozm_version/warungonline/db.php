<?php
$conn = mysqli_connect("localhost","root","","db_warungonline");

if (mysqli_connect_errno()) {
echo "Koneksi ke database GAGAL! : " . mysqli_connect_error();
}
?>