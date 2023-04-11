<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="../css/dashboard1.css">
    <link rel="stylesheet" href="../css/sidebar1.css">
</head>
<body>
    <div class="sidebar">
        <h3 class="sidebar-brand">Printer Market</h3>
        <ul>
            <li>
                <a href="dashboard.php"><i class="fas fa-tachometer-alt-average"></i> &nbsp;Dashboard</a>
            </li>
            <li>
                <a href="../product/index.php"><span class="iconify icon-brand" data-icon="bi:printer-fill"></span> &nbsp;Produk</a>
            </li>
            <li>
                <a href="../transaksi"><i class="fas fa-cart-arrow-down"></i> &nbsp;Transaksi</a>
            </li>
            <li>
                <a href="../logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?')"> <i class="fa-solid fa-arrow-right-from-bracket"></i> &nbsp;Logout</a>
            </li>
        </ul>
    </div>
    <main>
        <div class="section-title mt-2">
            Riwayat Transaksi
        </div>
        <div class="card-notif">
        <table>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php 
            
            include '../database/koneksi.php';

            $query = "SELECT transaksi.subtotal, transaksi.Jumlah, transaksi.idTransaksi, transaksi.status ,  transaksi.UserIdUser2, user.Username, printer_tb.NamaPrinter, printer_tb.HargaPrinter FROM transaksi INNER JOIN user ON transaksi.UserIdUser2 = user.idUser INNER JOIN printer_tb ON transaksi.Printer_tblIdPrinter = printer_tb.idPrinter"; 
            $result = mysqli_query($koneksi, $query);
            $no = 1;
                while ($data=mysqli_fetch_object($result)) {
                if ($data->status == 1) {
                        # code...
            ?>

            <tr>     
                <td><?= $no++ ?></td>
                <td><?= $data->NamaPrinter ?></td>
                <td><?= $data->Username ?></td>
                <td><?= $data->Jumlah ?></td>
                <td><?= number_format($data->HargaPrinter) ?></td>
                <td><?= number_format($data->subtotal) ?></td>
                <td><span>Menunggu Konfirmasi</span></td>
                <td>
                    <a href="dashboard.php?id=<?= $data->idTransaksi ?>" class="btn-info" onclick="return confirm('Apakah Anda Yakin Ingin Konfirmasi?')">Konfirmasi</a>
                </td>
            </tr>

            <?php } } ?>
            
        </table>
        </div>
    </main>

    <?php 
    
    if (isset($_GET['id'])) {
        
        include '../database/koneksi.php';

        $id = $_GET['id'];
        $status = 2;

        $query = "UPDATE transaksi SET status='$status' WHERE idTransaksi = '$id'";
        $run = mysqli_query($koneksi, $query);

        if ($run) {
            header("location:dashboard.php");
        }

    }
    
    ?>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/b8d1f961b1.js" crossorigin="anonymous"></script>

    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
</body>
</html>