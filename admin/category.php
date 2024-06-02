<?php include'../session.php';
if (!(trim($_SESSION['id_login']) == '1')) {
?>
    <script>
        alert('You are not authorized to access this page');
        window.location = "../public/login.php";
    </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
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
        <h1 class="text-3xl font-bold mb-4 text-black dark:text-white">Categories</h1>
        <a class="text-blue-600 dark:text-blue-500 hover:underline" href="category_add.php">Add New Category</a>
</div><div class="px-8 pb-8 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php include '../db.php';
                    $no = 1;
                    $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                    if(mysqli_num_rows ($category) > 0) {
                        while($row = mysqli_fetch_array($category)) {
                    ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php echo $no++ ?>
                        </th>
                        <td class="px-6 py-4">
                            <?php echo $row['category_name'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <a href="category_edit.php?id=<?php echo $row['category_id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> || 
                            <a href="delete.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Are you sure you want to delete this category?')" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>