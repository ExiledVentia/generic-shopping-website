<? 
include 'session.php';
include 'fungsi_indotgl.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
        </div>
        <div class="sidebar">
            <div class="sidebar-title"><b>Online Store</b></div>
            <ul>
                <? 
                include 'sidebar.php';
                ?>
            </ul>
        </div>
        <div class="section">
            <h5 class="card-title">Checkout Data awaiting validation.</h5>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Proof</th>
                    <th>Validation</th>
                    <th>Delivery</th>
                    <th>Buyer</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                </tr>
                <?
                $no = 1;
                $admin_id = $_SESSION['id_login'];
                $product = mysqli_query($conn, "SELECT admin_name, admin_telp, admin_address, (amt*product_price) AS total, tgl, ck_id, product_name, 
                product_price, product_image, amt, proof, validation, status FROM tb_product, tb_checkout, tb_admin WHERE tb_admin.admin_id=tb_checkout.admin_id
                AND tb_checkout.product_id=tb_product.product_id AND status != 'Done' AND status != 'Cancel'");
                while ($row = mysqli_fetch_array($product)) {}
                ?>
                <tr>
                    
                </tr>
            </table>
        </div>
    </div>
</body>
</html>