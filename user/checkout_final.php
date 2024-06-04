<?php include'../session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
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
    <h1 class="text-3xl mb-4 text-black dark:text-white px-[300px]">Checkout</h1>
</div>
<div class="py-8">
    <div class="relative overflow-x-auto mx-24 mt-8 border-solid border-2 border-gray-400">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-e-lg">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subtotal
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $no = 1;
                $admin_id = $_SESSION['id_login'];
                $product = mysqli_query($conn, "SELECT tb_checkout_temp.product_id, (amt*product_price) AS total, cart_id, category_name, product_name, product_price, product_image, amt FROM tb_product, tb_category, tb_checkout_temp WHERE tb_category.category_id=tb_product.category_id AND tb_checkout_temp.product_id=tb_product.product_id AND admin_id=$admin_id");
                while($row = mysqli_fetch_array($product)){
            ?>
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4">
                        <?php echo $no++ ?>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['product_name'] ?>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['category_name'] ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php echo number_format($row['product_price']) ?>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="../image/product/<?php echo $row['product_image'] ?>" target="_blank"><img src="../image/product/<?php echo $row['product_image'] ?>" width="100"></a>
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $row['amt'] ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo number_format($row['total']) ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
            <?php 
            $product = mysqli_query($conn, "SELECT SUM(amt) AS amount, tb_checkout_temp.product_id, SUM(amt*product_price) AS total, cart_id, category_name, product_name, product_price, product_image, amt FROM tb_product, tb_category, tb_checkout_temp WHERE tb_category.category_id=tb_product.category_id AND tb_checkout_temp.product_id=tb_product.product_id AND admin_id=$admin_id");
            $row = mysqli_fetch_array($product)
            ?>
                <tr class="font-semibold text-gray-900 dark:text-white border-solid border-2 border-gray-400">
                    <th scope="row" colspan="5" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3"><?php echo $row['amount'] ?></td>
                    <td class="px-6 py-3">Rp <?php echo number_format($row['total']) ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Modal toggle -->
<div class="px-24">
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Checkout
    </button>
</div>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Payment 
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="" method="POST" enctype="multipart/form-data">
                    <div class="text-center">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank Accounts:</label>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BNI</label>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">BSI</label>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mandiri</label>
                    </div>
                    <div>
                        <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload transfer proof</label>
                        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    </div>
                    <button type="submit" name="process" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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
                            move_uploaded_file($tmp_name, '../image/transfers/' . $newname);
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
                                echo '<script>window.location="product.php"</script>';
                            }else{
                                echo 'Fail' . mysqli_error($conn);
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div> 

<!-- foot 🤤🤤🤤 -->
<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4 ">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">Fumo Hideout Doujin Circle</a>. All Rights Reserved.</span>
    </div>
</footer>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>