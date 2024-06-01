<?php
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
    <body>
        <header>
            <div class="container">
                <h1><a href="index.php">Online Store</a></h1>
                <ul>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="produk.php">Produk</a></li>
                </ul>
            </div>
        </header>
        <!-- search -->
        <div class="search">
            <div class="container">
                <form action="produk_cari.php" method="POST">
                    <input type="text" name="search" placeholder="Search Product">
                    <input type="submit" name="submit" value="search">
                </form>
            </div>
        </div>
        <!-- category -->
        <div class="section">
            <div class="container">
                <h3>Category</h3>
                <div class="box">
                    <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if (mysqli_num_rows($kategori) > 0) {
                        while ($k = mysqli_fetch_array($kategori)) {
                            ?>
                            <a href="produk_cari.php?kat=<?php echo $k['category_id'] ?>">
                                <div class="col-5">
                                    <img src="img/menu-burger.png" width="50px" style="margin-bottom:5px;">
                                    <p>
                                        <?php echo $k['category_name'] ?>
                                    </p>
                                </div>
                            </a>
                        <?php }
                    } else { ?>
                        <p>Category not found</p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- new product -->
        <div class="section">
            <div class="container">
                <h3>Newest Products</h3>
                <div class="box">
                    <?php
                    $cari = $_POST['search'];
                    $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 AND product_name LIKE '%$cari%'
                        OR product_price LIKE '%$cari%' OR product_description LIKE '%$cari%' ORDER BY product_id DESC LIMIT 8");
                    if (mysqli_num_rows($product) > 0) {
                        while ($p = mysqli_fetch_array($product)) {


                            ?>
                             <a href="detail_produk.php?id=<?php echo $p['product_id'] ?>">
                                <div class="col-4">
                                    <img src="produk/<?php echo $p['product_image'] ?>" width="250px">
                                    <p class="nama"><?php echo substr($p['product_name'],0,30) ?></p>
                                    <table width="100%">
                                        <tr>
                                            <td align="left">
                                                <p class="name"><strong>Stock <?php echo $p['stok'] ?></strong></p>
                                            </td>
                                            <td align="right">
                                                <p class="price">Rp <?php echo number_format($p['product_price']) ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </a>
                                <?php
                        }
                    }

                    ?>
                    </div>
                </div>
            </div>
    </body>
</html>