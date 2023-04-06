<?php
include 'layout/navbar.php';

$id = $_GET["id"];
$barang = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

?>
<div id="detail" class="container mt-3">
    <form action="" method="post">
        <div class="row d-flex justify-content-center">
        <div class="col-md-4">
        <img src="image/<?= $barang["foto"]; ?>" class="w-100">
        </div>
        <div class="col-md-6">
            <div class="detail-container">
                <h1><?= $barang["nama_barang"]; ?></h1>
                <hr>
                <h4>Rp. <?= number_format($barang["harga_satuan"], 0, ',', '.'); ?></h4>
                <div class="text-secondary">Tersisa : <?= $barang["stok_barang"]; ?></div>
                <div>Tipe : <?= $barang["jenis_barang"]; ?></div>
                <div class="mt-3">
                    <label for="qty">Masukkan Jumlah Produk Yang Ingin Dibeli</label>
                    <input class="form-control" type="number" name="qty" id="qty">
                </div>
                <div class="mt-3">
                    <button class="btn btn-success" type="submit" name="beli">Masukkan Ke Keranjang</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<?php

if (isset($_POST["beli"])) {
    $qty = $_POST["qty"];
    $_SESSION["cart"][$id] = $qty;
    echo "
    <script type='text/javascript'>
        window.location= 'keranjang.php';
    </script>
    ";
}
?>
<?php include 'layout/footer.php'; ?>