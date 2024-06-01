<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">

</head>

<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar">
            <div class="sidebar-title">Online Store</div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "'");
                $d = mysqli_fetch_object($query);
                ?>
                <form action="" method="post">
                    <h3>Add Category Data</h3>
                    <fieldset>
                        <input type="text" name="name" placeholder="Category Name" class="form-control" require>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="Sending">Submit</button>
                    </fieldset>
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES('','$name')");

                        if ($insert) {
                            echo '<script>alert("enjoy your category")</script>';
                            echo '<script>window.location="kategori_data.php"</script>';
                        } else {
                            echo 'Gagal asli ' . mysqli_error($conn);
                        }
                    }
                    ?>
            </div>
        </div>
    </div>

</body>

</html>