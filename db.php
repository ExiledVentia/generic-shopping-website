<?php
$conn = mysqli_connect("localhost","root","","db_warungonline");

if (mysqli_connect_errno()) {
echo "Connection to database failed: " . mysqli_connect_error();
}
?>