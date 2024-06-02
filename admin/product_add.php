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
    <title>Add Product</title>
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
        <h1 class="text-3xl font-bold mb-4 text-black dark:text-white">Add Product</h1>
        <form class="max-w-lg" action="" method="POST" enctype="multipart/form-data">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="">Choose a Category</option>
            <?php $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
            while ($r = mysqli_fetch_array($category)) { ?>
            <option value="<?php echo $r['category_id']; ?>"><?php echo $r['category_name']; ?></option>
            <?php } ?>
            </select>
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
            <input type="text" name="name" id="base-input" placeholder="Product Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="text" name="price" id="base-input" placeholder="Rp.XXX XXX" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="description" name="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description..."></textarea>
        </div>
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
            <input type="text" name="stock" id="base-input" placeholder="Stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image File</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file">
        </div>
        <div class="pt-5">
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        </div>
        <div class="pt-5 w-5">
            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
        </form>
        <?php
                if (isset($_POST['submit'])) {
                    $kategori = $_POST['category'];
                    $nama = $_POST['name'];
                    $harga = $_POST['price'];
                    $detail = $_POST['desc'];
                    $stock = $_POST['stock'];
                    $status = $_POST['status'];

                    $filename = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];
                    $newname = 'produk' . time() . '.' . $type2;

                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'JPG', 'JPEG', 'GIF', 'webp', 'WEBP');

                    if (!in_array($type2, $tipe_diizinkan)) {
                        echo '<script>alert("File type not allowed")</script>';
                    } else {
                        move_uploaded_file($tmp_name, '../image/product/' . $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (NULL, '$kategori', '$nama', '$harga', '$detail', '$newname', '$status', '$stock')");

                        if ($insert) {
                            echo '<script>alert("Product has been added")</script>';
                            echo '<script>window.location="product.php"</script>';
                        } else {
                            echo 'SQL Error : ' . mysqli_error($conn);
                        }
                    }
                }
                ?>
    </div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>