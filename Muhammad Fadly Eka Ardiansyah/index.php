<?php 
include 'layout/navbar.php';
?>
<?php $barang = query("SELECT * FROM barang WHERE stok_barang > 0"); ?>

<div id="home" class="produk container">
    <h2 class="my-3">Produk Yang Tersedia</h2>
    <div class="row">
        <?php $i = 1;?>
        <?php foreach($barang as $data) : ?>
        <div class="col-md-3 mb-3">
            <div class="card">
            <img src="image/<?= $data['foto']; ?>" class="card-img-top" alt="<?= $data['nama_barang']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['nama_barang']; ?></h5>
                    <p class="card-text"><?= $data['jenis_barang']; ?></p>
                    <hr>
                    <h6 class="card-text"><b>Harga :</b> Rp. <?= number_format($data['harga_satuan'], 0, ',', '.'); ?></h6>
                    <p class="text-secondary">Tersisa : <?= $data['stok_barang']; ?></p>
                    <a href="detail.php?id=<?= $data["id_barang"]; ?>" class="btn btn-success">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'layout/footer.php'; ?>