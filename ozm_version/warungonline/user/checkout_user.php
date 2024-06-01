<?php 
include ('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
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
                <h3>Checkout Product</h3>
                <table class="table" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Qty.</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php 
                            $no = 1;
                            $admin_id = $_SESSION['id_login'];
                            $product = mysqli_query($conn, "SELECT tb_checkout_temp.product_id, (amt*product_price) AS total, cart_id, category_name, product_name, product_price, product_image, amt FROM tb_product, tb_category, tb_checkout_temp WHERE tb_category.category_id=tb_product.category_id AND tb_checkout_temp.product_id=tb_product.product_id AND admin_id=$admin_id");
                            while($row = mysqli_fetch_array($product)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td><a href="../produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="../produk/<?php echo $row['product_image'] ?>" width="50px" alt=""></a></td>
                            <td><?php echo $row['amt'] ?></td>
                            <td>Rp. <?php echo number_format($row['total']) ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <?php 
                            $product = mysqli_query($conn, "SELECT SUM(amt) AS amount, tb_checkout_temp.product_id, SUM(amt*product_price) AS total, cart_id, category_name, product_name, product_price, product_image, amt FROM tb_product, tb_category, tb_checkout_temp WHERE tb_category.category_id=tb_product.category_id AND tb_checkout_temp.product_id=tb_product.product_id AND admin_id=$admin_id");
                            $row = mysqli_fetch_array($product)
                            ?>
                            <th colspan="5">Total</th>
                            <th><?php echo $row['amount'] ?></th>
                            <th>Rp <?php echo number_format($row['total']) ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h3>Payment</h3>
            <div class="box">
                <form action="" method="post" enctype="multipart/form-data">
                    <label>Bank accounts:</label><br>
                    <label>BNI</label><br>
                    <label>BRI</label><br>
                    <label>MANDIRI</label><br>
                    <label>BCA</label><br>
                    <label>BSI</label><br>
                    <label>Upload your transfer proof</label><br>
                    <input type="file" name="image" placeholder="Product Image" class="form_control" required>
                    <input type="submit" name="process" value="Submit" class="btn">
                </form>
                <?php 
                    if(isset($_POST['process'])){
                        $date = date('Y-m-d');
                        $filename = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];
                        
                        $newname = 'tf' . time() . '.' . $type2;
                        $allowedext = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG', 'PNG', 'GIF');
                        if(!in_array($type2, $allowedext)){
                            echo '<script>alert("Unauthorized File Extension")</script>';
                        } else {
                            move_uploaded_file($tmp_name, '../transfer_proof/' . $newname);
                            $query = mysqli_query($conn, "SELECT * FROM tb_checkout_temp NATURAL JOIN tb_product");
                            while($r = mysqli_fetch_array($query)){
                                $amt = $r['amt'];
                                $product_price = $r['product_price'];
                                $total = $amt * $product_price;
                                $insert = mysqli_query($conn, "INSERT INTO tb_checkout VALUES(null, '$r[product_id]', '$amt', '$r[admin_id]', '$total', '$newname', 'Waiting', 'Pending', '$date')");
                                mysqli_query($conn, "UPDATE tb_product SET stock = stock - '$amt' WHERE product_id = '$r[product_id]'");
                            }
                            mysqli_query($conn, "TRUNCATE tb_checkout_temp");
                            if($insert){
                                echo '<script>alert("Succesful")</script>';
                                echo '<script>window.location="produk_user.php"</script>';
                            }else{
                                echo 'Fail' . mysqli_error($conn);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>