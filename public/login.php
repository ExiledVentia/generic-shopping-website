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
<body class="bg-gray-100 dark:bg-[#1A1F37]">
<div class="flex items-center justify-center h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-[#242C48] dark:border-gray-700">
        <form class="space-y-6" action="" method="post">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Log In</h5>
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
                <input type="username" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Username" required />
            </div>
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
            </div>
            <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Not registered? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
            </div>
        </form>
        <?php
        include('../db.php');
        if (isset($_POST["submit"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'") or die(mysqli_error($conn));
            if (mysqli_num_rows($sql) == 0) {
                echo "<script>alert('Your Username or Password Is Incorrect')</script>";
                echo '<script type="text/javascript">window.location="login.php"</script>';
            } else {
                session_start();
                $row = mysqli_fetch_assoc($sql);
                $_SESSION['id_login'] = $row['admin_id'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['status_login'] = true;
                if ($row['level'] == 'admin') {
                    echo "<script>alert('Login Successful!')</script>";
                    echo '<script type="text/javascript">window.location="../admin/dashboard.php"</script>';
                } elseif ($row['level'] == 'user') {
                    echo "<script>alert('Login Successful!')</script>";
                    echo '<script type="text/javascript">window.location="../user/dashboard.php"</script>';
                } else {
                    header('location:index.php');
                }
            }
        }
        ?>
    </div>
</div>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> -->
</body>
</html>