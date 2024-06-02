<?php include '../session.php'; 
if (!(trim($_SESSION['id_login']) == '1')) {
    ?>
    <script>
        alert('You are not authorized to access this page');
        window.location = "../public/login.php";
    </script>
    <?php
}
include '../datefunc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
<button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
    </button>
    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <a href="../public/index.php" class="flex items-center ps-2.5 mb-5">
            <span class="pl-3 text-xl font-semibold whitespace-nowrap dark:text-white">Fumo</span>
        </a>
        <ul class="space-y-2 font-medium">
            <?php include 'sidebar.php'; ?>
        </ul>
    </div>
</aside>
<div class="p-8 sm:ml-64">
    <h1 class="text-3xl font-bold mb-4 text-black dark:text-white">Carts</h1>
</div>
    <div class="px-8 pb-8 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Proof
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Validation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delivery
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Address
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone no.
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php include '../db.php';
                $no = 1;
                $admin_id = $_SESSION['id_login'];
                $product = mysqli_query($conn,"SELECT admin_name, admin_phone, admin_address, (amt*product_price) AS total, date, ck_id, product_name, product_price, product_image, amt, proof, validation, status FROM tb_product, tb_checkout, tb_admin WHERE tb_admin.admin_id=tb_checkout.admin_id AND tb_checkout.product_id=tb_product.product_id AND status != 'Finished' AND status != 'Cancelled'");
                if(mysqli_num_rows($product) > 0){
                while($row = mysqli_fetch_array($product)){
                    ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $row['product_name'] ?>
                        </td>
                        <td class="px-6 py-4">
                            Rp <?php echo number_format($row['product_price'])?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="../image/product/<?php echo $row['product_image'] ?>" target="_blank">
                                <img width="100px" height="100px" src="../image/product/<?php echo $row['product_image'] ?>" width="100px">
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row['amt'] ?>
                        </td>
                        <td class="px-6 py-4">
                            Rp <?php echo number_format($row['total']) ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo dateEn($row['date']) ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="../image/transfers/<?php echo $row['proof']; ?>" target="_blank">
                                <img width="100px" height="100px" src="../image/transfers/<?php echo $row['proof'] ?>" width="100px">
                            </a>
                        </td>
                        <?php if ($row['validation'] == 'Waiting') { ?>
                        <td class="px-6 py-4">
                            <?php echo $row['validation'] ?>
                            <a href="validation.php?id=<?php echo $row['ck_id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')" >Valid</a> || 
                            <a href="invalid_validation.php?id=<?php echo $row['ck_id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')" >Invalid</a>
                        </td>
                        <?php }else{ ?>
                        <td class="px-6 py-4">
                            <?php echo $row['validation'] ?>
                        </td>
                        <?php } ?>
                        <td class="px-6 py-4">
                            <?php echo $row['status'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row['admin_name'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row['admin_address'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php echo $row['admin_phone'] ?>
                        </td>
                    </tr>
                    <?php }}else{ echo '<tr><td colspan="8">No Data</td></tr>'; } ?>
                </tbody>
            </table>
        </div>
    </div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>