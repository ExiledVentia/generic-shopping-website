<?php include 'session.php'; ?>
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
        <div class="header">

        </div>
        <div class="sidebar">
            <div class="sidebar-title">Online Store</div>
            <ul>
                <?php include 'sidebar.php'; ?>
            </ul>
        </div>
        <div class="section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
                $d = mysqli_fetch_object($query);
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Add Product</h3>
                    <fieldset>
                        <label>Category</label>
                        <select class="form-control" name="kategori" required>
                            <option value="">--Choose--</option>
                            <?php $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while ($r = mysqli_fetch_array($kategori)) { ?>
                                <option value="<?php echo $r['category_id'] ?>">
                                    <?php echo $r['category_name'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </fieldset>
                    <fieldset>
                        <label>Product Name</label>
                        <input type="text" name="nama" placeholder="Product Name" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Price</label>
                        <input type="text" name="harga" placeholder="Price" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Description</label>
                        <textarea type="text" name="detail" placeholder="Description" class="form-control" required></textarea>
                    </fieldset>
                    <fieldset>
                        <label>Stock</label>
                        <input type="text" name="stok" placeholder="Stock" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Product Image</label>
                        <input type="file" name="gambar" placeholder="Image" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="">Pilih</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="Sending">Add</button>
                    </fieldset>

                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $detail = $_POST['detail'];
                    $stok = $_POST['stok'];
                    $status = $_POST['status'];

                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];
                    $newname = 'produk' . time() . '.' . $type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF', 'webp', 'WEBP');

                    if (!in_array($type2, $tipe_diizinkan)) {
                        echo '<script>alert("Format file ditolak")</script>';
                    } else {
                        move_uploaded_file($tmp_name, '../produk/' . $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (NULL, '$kategori', '$nama', '$harga', '$detail', '$newname', '$status', '$stok')");

                        if ($insert) {
                            echo '<script>alert("tambah data berhasil")</script>';
                            echo '<script>window.location="produk_data.php"</script>';
                        } else {
                            echo 'Ada kegagalan' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>