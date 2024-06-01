<?php
include '../db.php';

?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale-I, shrink-to-fit=no">
    <title>Online Store</title>
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-title">Online Store</div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <?php
            $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id= '" . $_GET['id'] . "'");
            if (mysqli_num_rows($kategori) == 0) {
                echo '<script>window.location="admin/kategori_data.php"</script>';
            }
            $k = mysqli_fetch_object($kategori);
            ?>
            <form action="" method="post">
                <h3>Edit Category</h3>
                <fieldset>
                    <label>Category Name</label>
                    <input type="text" name="nama" value="<?php echo $k->category_name ?> " class="form-control"
                        required>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Edit</button>
                </fieldset>
            </form>
        </div>


        <?php
        if (isset($_POST['submit'])) {
            $nama = ($_POST['nama']);
            $update = mysqli_query($conn, "UPDATE tb_category SET category_name = '" . $nama . "' WHERE category_id = '" . $k->category_id . "'");

            if ($update) {
                echo '<script>alert("Edit Berhasil")</script>';
                echo '<script>window.location="kategori_data.php"</script>';
            } else {
                echo 'gagal' . mysqli_error($conn);
            }
        }
        ?>
    </div>
</body>

</html>