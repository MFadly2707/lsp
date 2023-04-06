<?php 
require 'functions.php';

session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan Login Terlebih Dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if($_SESSION["roles"] != "Admin"){
    echo "
    <script type='text/javascript'>
        alert('Mohon Maaf Anda Bukan Admin, Tidak Bisa Masuk!')
        window.location = '../login/index.php';
    </script>
    ";
}


$barang = query("SELECT * FROM barang");

?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>

    <div class="content container-fluid">
        <h1>Data Barang</h1>
        <a class="btn btn-primary my-2" href="tambah_barang.php">Tambah</a>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Foto</th>
                    <th>Jenis Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($barang as $data) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data["nama_barang"]; ?></td>
                    <td><img src="../image/<?= $data["foto"]; ?>" alt="" width="70"></td>
                    <td><?= $data["jenis_barang"]; ?></td>
                    <td>Rp. <?= number_format($data["harga_satuan"], 0, ',', '.'); ?></td>
                    <td><?= $data["stok_barang"]; ?></td>
                    <td>
                        <a class="btn btn-primary my-2" href="edit_barang.php?id=<?= $data["id_barang"]; ?>"><i class="fa-solid fa-pen"></i></a>
                        <a class="btn btn-danger my-2" href="hapus_barang.php?id=<?= $data["id_barang"]; ?>"
                            onclick="return confirm('Apakah anda yakin ingin menghapus data?');"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require '../layout/footer-admin.php'; ?>