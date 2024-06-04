<?php 
include '../session.php';
include '../db.php';
include '../datefunc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Purchases</title>
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
    <h1 class="text-3xl mb-4 text-black dark:text-white px-[300px]">Completed Purchases</h1>
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
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Payment
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Proof
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            $admin_id = $_SESSION['id_login'];
            $product = mysqli_query($conn,"SELECT admin_name, admin_phone, admin_address, (amt*product_price) AS total, date, ck_id, category_name, product_name, product_price, product_image, amt, proof, validation, status FROM tb_category, tb_product, tb_checkout, tb_admin WHERE tb_category.category_id=tb_product.category_id AND tb_checkout.product_id=tb_product.product_id AND status = 'Finished' AND tb_admin.admin_id =$admin_id");
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
                    <td class="px-6 py-4">
                        Transfer
                    </td>
                    <td class="px-6 py-4">
                        <?php echo dateEn($row['date']) ?>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="../image/transfers/<?php echo $row['proof'] ?>" target="_blank"><img src="../image/transfers/<?php echo $row['proof'] ?>" width="100"></a>
                    </th>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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