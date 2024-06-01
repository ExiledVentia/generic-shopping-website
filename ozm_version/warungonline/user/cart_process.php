<?php 
include '../db.php';
if(isset($_POST['submit'])){
    $amt = $_POST['amt'];
    $product_id = $_POST['product_id'];
    $admin_id = $_POST['admin_id'];
    $stock = $_POST['stock'];

    if($stock < $amt) {
        echo '<script>alert("Unable to add more")</script>';
        echo '<script>window.location="produk_user.php"</script>';
    }elseif($stock == '0'){
        echo '<script>alert("Out of Stock)"</script>';
        echo '<script>window.location="produk_user.php"</script>';
    }else{
        $insert = mysqli_query($conn, "INSERT INTO tb_cart VALUES (null, '". $product_id . "', '". $amt . "', '". $admin_id . "') ");
    }
    if ($insert) {
        echo '<script>alert("Added to cart")</script>';
        echo '<script>window.location="produk_user.php"</script>';
    }else{
        echo 'failed' . mysqli_errno($conn);
    }
}
?>