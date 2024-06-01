<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
</head>

<body>
    <div class=wrapper>
        <div class="header"></div>
        <div class="sidebar">
            <div class="sidebar-title">Online Store</div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>
        <div class="section">
            <h5 class="card-title">Category</h5>
            <p><a class="tombol-tambah" href="kategori_tambah.php">Add Data +</a></p>
            <table class="table1" width="50%">
                <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Options</th>
                </tr>
                <?php
                $no = 1;
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if ($kategori->num_rows > 0) {
                    while ($row = mysqli_fetch_array($kategori)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $no++ ?>
                            </td>
                            <td>
                                <?php echo $row['category_name'] ?>
                            </td>
                            <td>
                                <a href="kategori_edit.php?id=<?php echo $row['category_id']; ?>">Edit</a> ||
                                <a href="hapus_proses.php?idk=<?php echo $row['category_id']; ?>"
                                    onclick="return confirm('ARE YOU SUREEEE?!?!??!?')">Delete</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="3"> No data found </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>