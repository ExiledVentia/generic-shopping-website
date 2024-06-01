<?php
include 'session.php';
include 'fungsi_indotgl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Online</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
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
            <h5 class="card-title">Checkout Successful</h5>
            <table class="table1">
                <tr>
                </tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Proof</th>
                    <th>Customer</th>
                    <th>Address</th>
                    <th>Phone</th>
                </tr>
                <?php
                $no = 1;
                $admin_id = $_SESSION['id_login'];
                $product =  mysqli_query($conn, "SELECT admin_name, admin_telp, admin_address, (amt*product_price) AS total, tgl, ck_id, product_name,
                product_price, product_image, amt, proof, validation, status FROM tb_product, tb_checkout, tb_admin WHERE tb_admin.admin_id=tb_checkout.admin_id AND
                tb_checkout.product_id=tb_product.product_id AND status = 'Done'");
                while ($row = mysqli_fetch_array($product)) {
                ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                    <td><a href="../produk/<?php echo $row['product_image']?>" target="_blank"> <img src="../produk/<?php echo $row['product_image']?>" width="50px"> </a></td>
                    <td><?php echo $row['amt'] ?></td>
                    <td>Rp. <?php echo number_format($row['total']) ?></td>
                    <td><?php echo tgl_indo($row['date']) ?></td>
                    <td><a href="../transfer_proof/<?php echo $row['proof']?>" target="_blank"> <img src="../transfer_proof/<?php echo $row['proof']?>" width="50px"> </a></td>
                    <td><?php echo $row['admin_name']?></td>
                    <td><?php echo $row['admin_address']?></td>
                    <td><?php echo $row['admin_telp']?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>