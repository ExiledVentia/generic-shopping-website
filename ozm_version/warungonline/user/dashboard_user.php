<?php
include '../db.php';
include 'session.php';
$contact = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($contact);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <h1><a href="dashboard_user.php">Online Store</a></h1>
            <ul><?php include 'navbar.php' ?></ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <div class="box">
                Welcome
                <?php echo $user_row["admin_name"] ?>
                <h4>^ Please checkout your purchases ^</h4>
            </div>
        </div>
    </div>


</body>

</html>