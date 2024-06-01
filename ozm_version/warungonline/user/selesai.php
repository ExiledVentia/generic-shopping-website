<?php
include 'session.php';
include '../db.php';
include 'fungsi_indotgl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="dashboard_user.php">Online Store</a></h1>
            <ul><?php include 'navbar.php' ?></ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <div class="box">
                <table class="table" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Amount</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Proof</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $admin_id = $_SESSION['id_login'];
                        $product =  mysqli_query($conn, "SELECT (amt*product_price) AS total, date, ck_id, category_name, product_name,
                            product_price, product_image, amt, proof, validation, status FROM tb_product, tb_category, tb_checkout WHERE
                            tb_category.category_id=tb_product.category_id AND tb_checkout.product_id=tb_product.product_id AND status='Finished' AND
                            admin_id=$admin_id");
                        while ($row = mysqli_fetch_array($product)) {
                        
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="../produk/<?php echo $row["product_image"] ?>" width="50px"> </a></td>
                            <td><?php echo $row['amt'] ?></td>
                            <td>Rp. <?php echo number_format($row['total']) ?></td>
                            <td>Transfer</td>
                            <td><?php echo tgl_indo($row['tgl']) ?></td>
                            <td><a href="../transfer_proof/<?php echo $row['proof'] ?>" target="_blank"> <img src="../transfer_proof/<?php echo $row['proof'] ?>" width="50px"> </a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>l