<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
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
            <div class="card-title">Customer Cart</div>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Amount</th>
                    <th>Total</th>
                </tr>
                <?php
                $no = 1;
                $produk = mysqli_query($conn, "SELECT admin_name, (amt*product_price) AS total, cart_id, category_name, product_name,
                    product_price, product_image, amt FROM tb_product, tb_category, tb_cart, tb_admin WHERE 
                    tb_category.category_id=tb_product.product_id AND tb_admin.admin_id=tb_cart.admin_id");
                while ($row = mysqli_fetch_array($produk)) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $no++ ?>
                        </td>
                        <td>
                            <?php echo $row['admin_name'] ?>
                        </td>
                        <td>
                            <?php echo $row['category_name'] ?>
                        </td>
                        <td>
                            <?php echo $row['product_name'] ?>
                        </td>
                        <td>Rp.
                            <?php echo number_format($row['product_price']) ?>
                        </td>
                        <td><a href="../produk?<?php echo $row['product_image'] ?>" target="_blank"> <img src="../
                            produk/<?php echo $row['product_image'] ?>" width="50px"> </a></td>
                        <td>
                            <?php echo $row['amt'] ?>
                        </td>
                        <td>Rp.
                            <?php echo number_format($row['total']) ?>
                        </td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>