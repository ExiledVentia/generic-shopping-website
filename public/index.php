<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fumo Hideout</title>
  <link rel="stylesheet" href="../css/style.css">
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> -->
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-[#1A1F37]">
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
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
        <li>
          <a href="index.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
        </li>
        <li>
          <a href="login.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
        </li>
        <li>
          <a href="register.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
        </li>
        <!-- <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
<!-- Carousel -->

<div class="p-12">
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-[500px]">
        <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../image/src/carousel/ciruno.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../image/src/carousel/ciruno.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../image/src/carousel/ciruno.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../image/src/carousel/ciruno.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../image/src/carousel/ciruno.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
          </span>
        </button>
      </div>
    </div>
      
<div class="text-black dark:text-white">
  <div class="px-64 pb-8 pt-8 grid grid-cols-2 rounded-lg">
    <div class="h-96 bg-gray-200 dark:bg-gray-900 rounded-l-lg">
      <img class="w-full h-full rounded-l-lg" src="../image/src/cards/fumofumo.png" alt="">
    </div>
    <div class="h-96 bg-gray-200 dark:bg-gray-900 p-10 pt-28 rounded-r-lg">
      <h1 class="text-3xl font-bold">Fumos</h1><br>
      <p>We have like, the coolest fumofumo plushies imaginable.</p><br>
      <span class="pt-12 text-blue-800 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-800 transition-transform"><a href="">Buy them here ></a></span>
    </div>
  </div>
  <div class="px-64 pb-8 pt-0 grid grid-cols-2 rounded-lg">
    <div class="h-96 bg-gray-200 dark:bg-gray-900 rounded-l-lg p-10 pt-28">
      <h1 class="text-3xl font-bold">DEKA Fumo</h1><br>
      <p>Same thing, just bigger and WAY more expensive. Deka comes from the word "Dekai" (でかい) which means huge in Japanese.</p><br>
      <span class="pt-12 text-blue-800 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-800 transition-transform"><a href="">Buy them here ></a></span>
    </div>
    <div class="h-96 bg-gray-200 dark:bg-gray-900 rounded-r-lg">
      <img class="w-full h-full rounded-r-lg" src="../image/src/cards/DekaFumo.png" alt="">
    </div>
  </div>
  <div class="px-64 pb-8 pt-0 grid grid-cols-2 rounded-lg">
    <div class="h-96 rounded-l-lg bg-gray-200 dark:bg-gray-900">
      <img class="w-full h-full rounded-l-lg" src="../image/src/cards/Nesoberi.png" alt="">
    </div>
    <div class="h-96 bg-gray-200 dark:bg-gray-900 rounded-r-lg p-10 pt-28">
      <h1 class="text-3xl font-bold">Noseberi</h1><br>
      <p>No they aren't just heads the have bodies, just not as big as the head.</p><br>
      <span class="pt-12 text-blue-800 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-800 transition-transform"><a href="">Buy them here ></a></span>
    </div>
  </div>
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
