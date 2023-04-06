<?php include 'layout/navbar.php'; ?>

<?php
if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo " 
    <script type='text/javascript'>
        alert('Keranjang Anda Masih Kosong, Silahkan Belanja Terlebih Dahulu');
        window.location= 'index.php'
    </script>
    ";
}
?>

<div class="checkout container my-3">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="tgl_transaksi">Tanggal Transaksi</label><br>
                    <input class="form-control" type="date" name="tgl_transaksi" id="tgl_transaksi"
                        value="<?= date('Y-m-d'); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="alamat">Alamat</label><br>
                    <input class="form-control" type="text" name="alamat" id="alamat">
                </div>
                <div class="row">
                        <div class="mb-3">
                            <label class="form-label" for="nomor_telpon">No Telepon</label><br>
                            <input class="form-control" type="number" name="nomor_telpon" id="nomor_telpon">
                        </div>
                </div>
                <div class="row">
                        <div class="mb-3" hidden>
                            <label class="form-label" for="nama_user">Nama Penerima</label><br>
                            <input class="form-control" type="text" name="nama_user" id="nama_user" value="<?= $_SESSION["nama_user"]; ?>">
                        </div>
                </div>

                <?php foreach ($_SESSION["cart"] as $id_barang => $kuantitas) : ?>
                <?php
                $data = query("SELECT * FROM barang WHERE id_barang = '$id_barang'")[0];
                $subTotal = $data["harga_satuan"] * $kuantitas;
                ?>
                <div class="row" hidden>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="nama_barang">Nama Produk</label><br>
                            <input class="form-control" type="text" name="nama_barang" id="nama_barang"
                                value="<?= $data["nama_barang"]; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label" for="total_harga">Sub Total Harga</label><br>
                            <input class="form-control" type="text" name="total_harga" id="total_harga"
                                value="Rp.<?= number_format($subTotal , 0, ',', '.'); ?>">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="foto" value="<?= $data["foto"]; ?>">
                <?php endforeach; ?>
                <button class="btn btn-success" type="submit" name="checkout">Checkout</button>
            </form>
        </div>
    </div>
</div>

<!-- fungsi cekout -->
<?php
if (isset($_POST['checkout'])) {
    if (checkoutBarang($_POST) > 0) {
        echo "
        <script type = 'text/javascript'>
        alert('Barang Berhasil Di Checkout!');
        window.location='index.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!-- fungsi cekout -->
<?php include 'layout/footer.php'; ?>