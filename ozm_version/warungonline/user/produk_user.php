<?php
error_reporting(0);
include 'session.php';
include '../db.php';
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
<header>
        <div class="container">
            <h1><a href="dashboard_user.php">Online Store</a></h1>
            <ul><?php include 'navbar.php' ?></ul>
        </div>
    </header>

    <div class="search">
        <div class="container">
            <form action="produk_user.php">
                <input type="text" name="search" placeholder="Search" value="<?php echo $_GET['$search'] ?>">
                <input type="hidden" name="cat" value="<?php $_GET['$cat'] ?>">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Category</h3>
            <div class="box">
                <?php
                $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($category) > 0) {
                    while ($k = mysqli_fetch_array($category)) { ?>
                        <a href="produk_user.php?cat=<?php echo $k['category_id'] ?>">
                            <div class="col-5">
                                <img src="../img/menu-burger.png" width="50px" style="margin-bottom: 5px;" alt="">
                                <p><?php echo $k['category_name'] ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Category Not Found</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h3>Product</h3>
            <div class="box">
                <?php
                if ($_GET['search'] != '' || $_GET['cat'] != '') {
                    $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['cat'] . "%'";
                }

                $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
                if (mysqli_num_rows($product) > 0) {
                    while ($p = mysqli_fetch_array($product)) {
                ?>

                        <div class="col-4">
                            <a href="detail_produk_user.php?id=<?php echo $p['product_id'] ?>" title="Product Detail">
                                <img src="../produk/<?php echo $p['product_image']; ?>"width="250px">
                                <p class="name"><?php echo substr($p['product_name'],0,30)?></p>
                                <p class="price">Rp. <?php echo number_format($p['product_price']) ?> Stock <?php echo number_format($p['stock']) ?></p>
                            </a>
                            <form action="cart_process.php" method="POST">
                                <input type="hidden" name="product_id" class="form-control" value="<?php echo $p['product_id'] ?>">
                                <input type="hidden" name="stock" class="form-control" value="<?php echo $p['stock'] ?>">
                                <input type="hidden" name="admin_id" class="form-control" value="<?php echo $_SESSION['id_login'] ?>">
                                <input type="number" name="amt" style="width: 40px;" autofocus required min="1">
                                <button type="submit" name="submit" title="add">+</button>
                            </form>
                        </div>
                    <?php }
                } else {
                    ?>
                    <p>product not found</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <h4>Address</h4>
            <p><?php echo $a->admin_address ?></p>
            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>
            <h4>Phone Number</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2024 - Warung Online</small>
        </div>
    </div>
</body>

</html>