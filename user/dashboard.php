<?php 
    include'../session.php';
    include'../db.php';
    $contact = mysqli_query($conn, "SELECT admin_phone, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
    $a = mysqli_fetch_object($contact);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
  <h1 class="text-3xl mb-4 text-black dark:text-white px-[300px]">Welcome to the Dashboard, <?php echo $user_row['admin_name'] ?></h1>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>