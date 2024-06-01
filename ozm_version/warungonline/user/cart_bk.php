<?php
include 'session.php';
include '../db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Store</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Online Store</a></h1>
            <ul>
                <?php include 'navbar.php' ?>
            </ul>
        </div>
    </header>
    <!--content-->
    <div class="container">
        <h3>Cart </h3>
        <div class="box">
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width="60px">No</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Amount</th>
                        <th>Total</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $admin_id = $_SESSION['id_login'];
                    $produk = mysqli_query($conn, "SELECT 
                            tb_cart.product_id, 
                            (amt*product_price) AS 
                            total, 
                            cart_id, 
                            category_name,
                            product_name, 
                            product_price, 
                            product_image, 
                            amt FROM 
                            tb_product, 
                            tb_category, 
                            tb_cart WHERE 
                            tb_category.category_id = tb_product.category_id AND
                            admin_id=$admin_id
                            ");
                    while ($row = mysqli_fetch_array($produk)) {
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?> </td>
                            <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="../produk/<?php echo $row['product_image'] ?>
                            width=50px"> </a></td>
                            <td><?php echo $row['amt'] ?></td>
                            <td>Rp. <?php echo number_format($row['total']) ?> </td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="amt[]" value="<?php echo $row['amt'] ?>">
                                    <input type="hidden" name="product_id[]" value="<?php echo $row['product_id'] ?>">
                                    <input type="hidden" name="admin_id[]" value="<?php echo $admin_id ?>">
                                    Check Out <input types="checkbox" id="checkitem" name="check[]" value="<?php echo $row['cart_id'] ?>"> || <a href="hapus_proses.php?idc=" <?php echo $row['cart_id'] ?>" onclick="return confirm('Are you sure you want to remove?')">Delete</a>
                            </td>
                        <tr>
                        <?php }  ?>
                </tbody>
            </table><br>
            <button type="submit" class="btn" style="width:100%" name="save">Checkout</button>
            </form>
            
            <?php
        if(isset($_POST['save'])){
            $checkbox       = $_POST['check'];
            $amt           = $_POST['amt'];
            $product_idd    = $_POST['product_id'];
            $admin_idd      = $_POST['admin_id'];

            for($i=0;$i<count($checkbox); $i++){
                $check_id       = $checkbox[$i];
                $amt            = $amt[$i];
                $product_id     = $product_id[$i];
                $admin_id       = $admin_id[$i];
                mysqli_query($conn, "INSERT INTO tb_checkout_temp values (
                    $check_id,
                    $product_id,
                    $amt,
                    $admin_id
                    )")or die(mysqli_errno($conn));
            }

            echo '<script>alert("Checkout successful")</script>';
            echo '<script>window.location="checkout.php"</script>';
        }
        
        ?>
        </div>
        
    </div>
    <footer>
    <div class="container">
        <small>Copyright &copy; 2023/2024 - Online Store</small>
    </div>
</footer>
</body>



</html>