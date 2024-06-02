<?php
error_reporting(0);
include '../session.php';
include '../db.php';
$contact = mysqli_query($conn, "SELECT admin_phone, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($contact);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-800">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
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
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <?php include 'navbar.php' ?>
      </ul>
    </div>
  </div>
</nav>
<div class="p-8 bg-gray-400 dark:bg-gray-700">
  <h1 class="text-3xl mb-4 text-black dark:text-white px-[300px]">All Products</h1>
</div>
<!-- search -->
<form class="py-8 max-w-lg mx-auto">
  <?php 
  $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
  $temp_cat = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['cat']."' ORDER BY category_id DESC");
  $temper_cat = mysqli_fetch_array($temp_cat);
  ?>
    <div class="flex">
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Categories</label>
        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">
        <?php 
          if(!isset($_GET['cat'])){ 
            echo "All Categories"; 
          }else{ 
            echo $temper_cat['category_name']; 
          }
          ?> 
        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
  </svg></button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
            <li>
              <a href="product.php">
                <button  type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All Categories</button>
              </a>
            </li>
            <?php
                if (mysqli_num_rows($category) > 0) {
                while ($k = mysqli_fetch_array($category)) { ?>
            <li>
              <a href="product.php?cat=<?php echo $k['category_id'] ?>">
                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><?php echo $k['category_name'] ?></button>
              </a>
            </li>
            <?php }} else { ?>
            <p>Category Not Found</p>
            <?php } ?>
            </ul>
        </div>
        <div class="relative w-full">
            <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search for Products..." required>
            <input type="hidden" name="cat" value="<?php $_GET['cat'] ?>">
            <button type="submit" name=submit class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</form>
<div class="px-80 pt-12 grid grid-cols-4 gap-4">
<?php
  if ($_GET['search'] != '' || $_GET['cat'] != '') {
  $where = "AND product_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['cat'] . "%'";
  }
  $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
  if (mysqli_num_rows($product) > 0) {
  while ($p = mysqli_fetch_array($product)) {
?>
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="product_detail.php?id=<?php echo $p['product_id'] ?>">
      <img class="h-[300px] w-auto object-stretch p-8 rounded-lg bg-cover" src="../image/product/<?php echo $p['product_image'] ?>" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="product_detail.php?id=<?php echo $p['product_id'] ?>">
            <a class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $p['product_name'] ?></a><br>
            <a class="text-l font-semibold tracking-tight text-gray-900 dark:text-white">Stock: <?php echo $p['stock'] ?></a>
        </a>
        <div class="flex items-center justify-between my-2">
            <span class="text-xl font-bold text-gray-900 dark:text-white">Rp. <?php echo number_format($p['product_price']) ?></span>
            <form class="max-w-xs mx-auto" action="cart_process.php" method="POST">
                <input type="hidden" name="product_id" class="form-control" value="<?php echo $p['product_id'] ?>">
                <input type="hidden" name="stock" class="form-control" value="<?php echo $p['stock'] ?>">
                <input type="hidden" name="admin_id" class="form-control" value="<?php echo $_SESSION['id_login'] ?>">
                <div class="relative flex items-center max-w-[8rem]">
                    <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input type="text" value="1" name="amt" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required />
                    <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
                <input type="hidden" name="submit">
            </form>
        </div>
    </div>
</div>
<?php }
  } else {
      ?>
      <p>Product not Found</p>
  <?php
  }
?>
</div>
<!-- foot 🤤🤤🤤 -->
<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">Fumo Hideout Doujin Circle</a>. All Rights Reserved.</span>
    </div>
</footer>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>