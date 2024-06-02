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
    <title>Profile</title>
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
        <h1 class="text-3xl font-bold mb-4 text-black dark:text-white">Change Profile</h1>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION["id_login"] . "' ");
        $d = mysqli_fetch_object($query);
        ?>
        <form class="max-w-lg" action="" method="POST" enctype="multipart/form-data">
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" name="name" id="base-input" value="<?php echo $d->admin_name; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
            <input type="text" name="user" id="base-input" value="<?php echo $d->username; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
            <input type="text" name="phone" id="base-input" value="<?php echo $d->admin_phone; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="text" name="email" id="base-input" value="<?php echo $d->admin_email; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
            <textarea id="description" name="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ><?php echo $d->admin_address; ?></textarea>
        </div>
        <div class="pt-5 w-5">
            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            $name = ($_POST['name']);
            $user = $_POST['user'];
            $hp = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['desc'];
            $update = mysqli_query(
                $conn,
                'UPDATE tb_admin SET
                    admin_name = "' . $name . '",
                    username = "' . $user . '",
                    admin_phone = "' . $hp . '",
                    admin_email = "' . $email . '",
                    admin_address = "' . $address . '"
                    WHERE admin_id = "' . $d->admin_id . '" ');
            if ($update) {
                echo '<script>alert("Update Successful")</script>';
                echo '<script>window.location"dashboard.php"</script>';
            } else {
                echo 'Failed to Update. ' . mysqli_error($conn);
            }
        }
        ?>
        <?php

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
$d = mysqli_fetch_object($query);

?>
        <h1 class="text-3xl font-bold mb-4 text-black dark:text-white pt-12">Change Password</h1>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION["id_login"] . "' ");
        $d = mysqli_fetch_object($query);
        ?>
        <form class="max-w-lg" action="" method="POST" enctype="multipart/form-data">
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
            <input type="password" name="pass" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm New Password</label>
            <input type="password" name="conf" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="pt-5 w-5">
            <button type="submit" name="change_password" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
        </form>
        <?php

                if (isset($_POST["change_password"])) {

                    $pass1 = $_POST['pass'];
                    $pass2 = $_POST['conf'];

                    if ($pass2 != $pass1) {
                        echo "<script>alert('Password doesn't match.')</script>";
                    } else {
                        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET password ='".$pass1."' 
                        WHERE admin_id = '".$d->admin_id."'");
                        if ($u_pass) {
                            echo '<script>alert("Password Updated")</script>';
                            echo '<script>window.location="profile.php"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }

                }

                ?>
    </div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>