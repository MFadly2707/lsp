<?php 
session_start();
require 'functions.php';

$id = $_GET["id"];
$barang = query("SELECT * FROM barang WHERE id_barang = '$id'")[0];

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan Login Terlebih Dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if(isset($_POST["kirim"])){
    if(editBarang($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data Produk Berhasil Diubah');
                window.location = 'barang.php';
            </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data Produk Gagal Diubah');
            window.location = 'barang.php';
        </script>
    ";
    }
}


?>

<?php require '../layout/sidebar.php'?>
<div id="main">
<?php require '../layout/navbar-admin.php'; ?>
<div class="content container-fluid">
    <div class="box">
    <h3>Edit Data Barang</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_barang" class="form-control" value="<?= $barang["id_barang"]; ?>">

        <label for="nama_barang">Nama Produk</label><br>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $barang["nama_barang"]; ?>"><br>

        <label for="foto">Foto</label><br>
        <input type="file" name="foto" id="foto" class="form-control" value="<?= $barang["foto"] ?>"><br>

        <label for="jenis_barang">Jenis Barang</label><br>
        <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="<?= $barang["jenis_barang"]; ?>"><br>
        
        <label for="harga_satuan">Harga</label><br>
        <input type="text" name="harga_satuan" id="harga_satuan" class="form-control" value="<?= $barang["harga_satuan"] ?>"><br>

        <label for="stok_barang">Stok</label><br>
        <input type="text" name="stok_barang" id="stok_barang" class="form-control" value="<?= $barang["stok_barang"] ?>"><br>

        <button class="btn btn-success" type="submit" name="kirim">Edit</button>
    </form>
   </div>
</div>
</div>
<?php require '../layout/footer-admin.php'; ?>
