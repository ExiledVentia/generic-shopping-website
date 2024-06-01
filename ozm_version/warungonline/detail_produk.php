<?php
error_reporting(1);
include 'db.php';
$contact = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($contact);

$product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($product);
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
                <?php include 'navbar.php' ?>
            </ul>
        </div>
    </header>
    <div class="search">
        <div class="container">
            <form>
                <input type="text" name="search" placeholder="Cari Produk">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <h1>Product Detail</h1>
            <div class="box">
                <div class="col-2">
                    <img src="produk/<?php echo $p->product_image ?>" width="100%">
                </div>
                <div class="col-2">
                    <h3>
                        <?php echo $p->product_name ?>
                    </h3>
                    <h4>Rp.
                        <?php echo number_format($p->product_price) ?>
                    </h4>
                    <h4>Stock
                        <?php echo number_format($p->stock) ?>
                    </h4>
                    <p>Description :<br>
                        <?php echo $p->product_description ?>
                    </p>
                    <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, Saya tertarik dengan 
                    produk anda." target="_blank">Contact via Whatsapp.</a></p>

                    <p><a href="login.php"><img src="img/shopping-cart.svg" width="70px"
                                title="Tambah Keranjang">Add to cart</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <h4>Address</h4>
            <p>
                <?php echo $a->admin_address ?>
            </p>
            <h4>Email</h4>
            <p>
                <?php echo $a->admin_email ?>
            </p>
            <h4>Phone Number</h4>
            <p>
                <?php echo $a->admin_telp ?>
            </p>
            <small>Copyright &copy; 2024 - Warung Online</small>
        </div>
    </div>
</body>

</html>