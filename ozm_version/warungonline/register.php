<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Online Store</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.google.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body id="bg-login">
    <div class="box-login">
        <h2>Isi Data</h2>
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
            <input type="text" name="alamat" placeholder="Alamat" class="input-control" required>
            <input type="text" name="telpon" placeholder="No Telp" class="input-control" required>
            <input type="text" name="email" placeholder="Email" class="input-control" required>
            <hr> <br>
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="password" name="pass" placeholder="Password" class="input-control" required>
            <input type="submit" name="submit" value="login" class="btn">
        </form>
        <?php
        include 'db.php';
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telpon = $_POST['telpon'];
            $email = $_POST['email'];
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (null, '" . $nama . "', '" . $username . "', '" . $password . "', '" . $telpon . "', '" . $email . "', '" . $alamat . "','pelanggan')");
            if ($insert) {
                echo "<script>alert('Registrasi Berhasil! Silahkan Login')</script>";
                echo '<script type="text/javascript">window.location="login.php"</script>';
            } else {
                echo "<script>alert('Gagal, Coba Lagi')</script>";
                echo '<script type="text/javascript">window.location="register.php"</script>';
            }
        }



        ?>
    </div>
</body>

</html>