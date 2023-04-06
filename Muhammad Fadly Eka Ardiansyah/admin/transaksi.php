<?php
require 'functions.php';

session_start();

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if ($_SESSION["roles"] != "Admin") {
    echo "
    <script type='text/javascript'>
        alert('Mohon maaf anda bukan admin, enggak bisa masuk kesini!')
        window.location = '../login/index.php';
    </script>
    ";
}


$proses = query("SELECT * FROM transaksi WHERE status = 'Proses'");
$transaksi = query("SELECT * FROM transaksi WHERE NOT status = 'Proses'");
?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content container-fluid">
        <h1>Data Transaksi</h1>
        <hr>
        <h3>Request Transaksi</h3>
        <table class="table table-responsive table-hover mb-5">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat</th>
                    <th>Nomor Telpon</th>
                    <th>Barang</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($proses as $data) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
                    <td><?= $data["tgl_transaksi"]; ?></td>
                    <td><?= $data["nama_user"]; ?></td>
                    <td><?= $data["alamat"]; ?></td>
                    <td><?= $data["nomor_telpon"]; ?></td>
                    <td><?= $data["nama_barang"]; ?></td>
                    <td>Rp. <?= number_format($data["total_harga"], 0, ',', '.'); ?></td>
                    <td><?= $data["status"]; ?></td>
                    <td>
                        <a class="btn btn-success" href="verifikasi.php?id=<?= $data["id_transaksi"]; ?>"
                            onclick="return confirm('Apakah Anda Yakin Ingin VeriFikasi Pesanan?');"><i
                                class="fa-solid fa-check"></i></a>
                        <a class="btn btn-danger" href="tolak.php?id=<?= $data["id_transaksi"]; ?>"
                            onclick="return confirm('Apakah Anda Yakin Ingin Menolak Pesanan?');"><i
                                class="fa-solid fa-xmark"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Riwayat Transaksi</h3>
        <table class="table table-responsive table-hover mb-5">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat</th>
                    <th>Nomor Telpon</th>
                    <th>Barang</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($transaksi as $data) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
                    <td><?= $data["tgl_transaksi"]; ?></td>
                    <td><?= $data["nama_user"]; ?></td> 
                    <td><?= $data["alamat"]; ?></td>
                    <td><?= $data["nomor_telpon"]; ?></td>
                    <td><?= $data["nama_barang"]; ?></td>
                    <td>Rp. <?= number_format($data["total_harga"], 0, ',', '.'); ?></td>
                    <td><?= $data["status"]; ?></td>
                    <td><a class="btn btn-danger my-2" href="hapus_transaksi.php?id=<?= $data["id_transaksi"]; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require '../layout/footer-admin.php'; ?>