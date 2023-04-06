<?php 

require 'functions.php';

$id = $_GET["id"];

if(hapusBarang($id) > 0 ){
    echo "
        <script type='text/javascript'>
            alert('Data Produk Berhasil Dihapus');
            window.location = 'barang.php';
        </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Data Produk Gagal Dihapus');
        window.location = 'barang.php';
    </script>
";
}
