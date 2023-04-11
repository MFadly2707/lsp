<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>

    <link rel="stylesheet" href="../css/sidebar1.css">
    <link rel="stylesheet" href="../css/product1.css">
</head>
<body>
    <?php 
        
        include "../database/koneksi.php";
        
        if (isset($_GET['id'])) {
            $id = htmlspecialchars($_GET['id']);

            $query = "DELETE FROM printer_tb WHERE idPrinter='$id'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                header("Location: index.php");
            }else {
                echo "<script>alert('Produk Gagal Dihapus')</script>";
            }
        }
        
    ?>
    <div class="sidebar">
        <h3 class="sidebar-brand">Printer Market</h3>
        <ul>
            <li>
                <a href="../admin/dashboard.php"><i class="fas fa-tachometer-alt-average"></i> &nbsp;Dashboard</a>
            </li>
            <li>
                <a href="index.php"><span class="iconify icon-brand" data-icon="bi:printer-fill"></span> &nbsp;Produk</a>
            </li>
            <li>
                <a href="../transaksi"><i class="fas fa-cart-arrow-down"></i> &nbsp;Transaksi</a>
            </li>
            <li>
                <a href="../logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?')"><i class="fa-solid fa-arrow-right-from-bracket"></i> &nbsp;Logout</a>
            </li>
        </ul>
    </div>
    <main>
        <div class="section-title">
            Data Produk
        </div>
        <div class="row">
            <div class="card mt-5">
                <a href="tambah.php" class="btn btn-primary">Tambah Produk</a>
                <div class="table-responsive">
                    <table border="1px">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        <?php 
                        
                        include "../database/koneksi.php";

                        $query = "SELECT * FROM printer_tb ORDER BY idPrinter DESC";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;
                        while ($data = mysqli_fetch_array($result))  { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['NamaPrinter'] ?></td>
                                <td><?php echo $data['SpesifikasiPrinter'] ?></td>
                                <td>
                                    <?php 
                                        $harga = $data['HargaPrinter'];
                                        echo "Rp." . number_format($harga);
                                    ?>
                                </td>
                                <td>
                                    <a href="edit.php?id=<?php echo htmlspecialchars($data['idPrinter']); ?>" class="btn-edit">Edit</a>
                                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['idPrinter']; ?>" class="btn-delete" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')">Delete</a>
                                </td>
                            </tr>
                        <?php 
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b8d1f961b1.js" crossorigin="anonymous"></script>

    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
</body>
</html>