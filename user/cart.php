<?php include '../session.php'; include '../db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-[#1A1F37]">
<nav class="bg-white border-gray-200 dark:bg-[#111526]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="product.php" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Fumo Hideout</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-[#111526] dark:border-gray-700">
            <?php include 'navbar.php' ?>
        </ul>
        </div>
    </div>
</nav>
<div class="p-8 bg-gray-400 dark:bg-[#2B3459]">
    <h1 class="text-3xl mb-4 text-black dark:text-white px-[300px]">Shopping Cart</h1>
</div>


<div class="mx-24 my-8 relative overflow-x-auto border-solid border-2 border-gray-300 rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Qty.
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        $admin_id = $_SESSION['id_login'];
        $products = mysqli_query($conn, "SELECT 
            tb_cart.product_id, 
            (amt*product_price) 
            AS 
            total, 
            cart_id, 
            category_name, 
            product_name, 
            product_price, 
            product_image, 
            amt 
            FROM 
            tb_product, 
            tb_category, 
            tb_cart 
            WHERE 
            tb_category.category_id=tb_product.category_id
            AND
            tb_cart.product_id=tb_product.product_id
            AND
            admin_id = $admin_id
            ");
        while($row = mysqli_fetch_array($products)){ ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $no++ ?>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $row['product_name'] ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $row['category_name'] ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo number_format($row['product_price']) ?>
                </td>
                <td class="px-6 py-4">
                    <a href="../image/product/<?php echo $row['product_image'] ?>" target="_blank">
                        <img src="../image/product/<?php echo $row['product_image'] ?>" alt="" width="100px">
                    </a>
                </td>
                <td class="px-6 py-4">
                    <?php echo $row['amt'] ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo number_format($row['total']) ?>
                </td>
                <td class="px-6 py-4">
                    <a href="delete.php?idc=<?php echo $row['cart_id'] ?>" onclick="return confirm('Are you sure you want to delete this row?')" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                </td>
                <td class="w-4 p-4">
                    <form action="" method="post">
                        <input type="hidden" name="amt[]" value="<?php echo $row['amt']?>">
                        <input type="hidden" name="product_id[]" value="<?php echo $row['product_id'] ?>">
                        <input type="hidden" name="admin_id[]" value="<?php echo $admin_id ?>">
                        <div class="flex items-center">
                            <input id="checkbox-table-search-1" type="checkbox" name="check[]" value="<?php echo $row['cart_id'] ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="px-24">
        <button type="submit" name="checkout" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Checkout</button>
    </div>
</form>
<?php 
if(isset($_POST['checkout'])){
    $checkbox       = $_POST['check'];
    $amtt           = $_POST['amt'];
    $product_idd    = $_POST['product_id'];
    $admin_idd      = $_POST['admin_id'];
    
    for($i=0;$i<count($checkbox);$i++){
        $check_id   = $checkbox[$i];
        $amt        = $amtt[$i];
        $product_id = $product_idd[$i];
        $admin_id   = $admin_idd[$i];
        mysqli_query($conn, "INSERT INTO tb_checkout_temp VALUES (
            $check_id,
            $product_id,
            $amt,
            $admin_id
        )") or die(mysqli_error($conn));
        
        mysqli_query($conn, "DELETE FROM tb_cart WHERE cart_id=$check_id") or die(mysqli_error($conn));
    }
    
    echo '<script>alert("Checkout Succesful")</script>';
    echo '<script>window.location="checkout.php"</script>';
}
?>
<!-- feet 🤤🤤🤤 -->
<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">Fumo Hideout Doujin Circle</a>. All Rights Reserved.</span>
    </div>
</footer>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>