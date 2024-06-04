<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> -->
</head>
<body class="bg-gray-100 dark:bg-gray-800">
<div class="flex items-center justify-center h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="" method="post">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Register</h5>
            <div>
                <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                <input type="fullname" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Full Name" required />
            </div>
            <div>
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <input type="address" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Address" required />
            </div>
            <div>
                <label for="phoneno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                <input type="phoneno" name="phoneno" id="phoneno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Phone Number" required />
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email" required />
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                <input type="username" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Username" required />
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
            <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Account</button>
        </form>
        <?php
        include('../db.php');
        if (isset($_POST["submit"])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phoneno = $_POST['phoneno'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = mysqli_query($conn, "INSERT INTO tb_admin VALUES (null, '".$fullname."', '".$username."', '".$password."', '".$phoneno."', '".$email."', '".$address."', 'user')");
            if ($sql) {
                echo "<script>alert('Registeration Successful!')</script>";
                echo '<script type="text/javascript">window.location="login.php"</script>';
            } else {
                echo "<script>alert('Registeration Failed, Please Try Again')</script>";
                echo '<script type="text/javascript">window.location="register.php"</script>';
            }
        }
        ?>
    </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> -->
</body>
</html>