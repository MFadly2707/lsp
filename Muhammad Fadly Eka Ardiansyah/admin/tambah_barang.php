<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan Login Terlebih Dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if(isset($_POST["kirim"])){
    if(tambahBarang($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil Ditambahkan');
                window.location = 'barang.php';
            </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
            alert('Data Gagal Ditambahkan');
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
    <h3>Tambah Data Barang</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama_barang">Nama Barang</label><br>
        <input type="text" name="nama_barang" id="nama_barang" class="form-control"><br>

        <label for="foto">Foto</label><br>
        <input type="file" name="foto" id="foto" class="form-control"><br>

        <label for="jenis_barang">Jenis</label><br>
        <input type="text" name="jenis_barang" id="jenis_barang"class="form-control"><br>
        
        <label for="harga_satuan">Harga</label><br>
        <input type="number" name="harga_satuan" id="harga_satuan" class="form-control"><br>

        <label for="stok_barang">Stok</label><br>
        <input type="text" name="stok_barang" id="stok_barang" class="form-control"><br>

        <button class="btn btn-primary" type="submit" name="kirim">Tambah</button>
    </form>
   </div>
</div>
</div>
<?php require '../layout/footer-admin.php'; ?>
