<?php 
include 'db.php';
$contact = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($contact);
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
    <!-- Header -->
    <header>
        <div class="container">
            <h1><a href="#">Online Store</a></h1>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="product.php">Product</a></li>
            </ul>
        </div>
    </header>
    <div class="search">
        <div class="container">
            <form action="produk_cari.php" method="POST">
                <input type="text" name="search" placeholder="Search Product">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
    </div>
    <!-- should be a modal, probably -->
    <div class="search">
        <div class="container">
            <p>Please login before continuing</p><a href="login.php"><strong>Login</strong></a>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h3>Category</h3>
            <div class="box">
                <?php 
                    $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if(mysqli_num_rows($category) > 0){
                        while($k = mysqli_fetch_array($category)){ ?>
                            <a href="index.php?cat=<?php echo $k['category_id'] ?>">
                                <div class="col-5">
                                    <img src="img/menu-burger.png" width="50px" style="margin-bottom: 5px;" alt="">
                                    <p><?php echo $k['category_name'] ?></p>
                                </div>
                            </a>
                <?php } } else { ?>
                            <p>Category Not Found</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h3>Newest Product</h3>
            <div class="box">
                <?php 
                    ini_set('error_reporting', 0);
                    if($_GET['cat']==''){
                        $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                    }else{
                        $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE category_id = $_GET[cat] AND product_status = 1 ORDER BY product_id DESC LIMIT 8");
                    }
                    if(mysqli_num_rows($product) > 0 ){
                        while($p = mysqli_fetch_array($product)){ ?>
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
                    <?php }}else{ ?>
                        <p>No Products Available</p>
                    <?php } ?>
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