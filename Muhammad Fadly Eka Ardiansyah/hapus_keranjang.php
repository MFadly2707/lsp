<?php 
session_start();

$id = $_GET["id"];
unset($_SESSION["cart"][$id]);

if (($id > 0)){
    echo " 
    <script type='text/javascript'>
        alert('Produk Telah Dihapus');
        window.location = 'keranjang.php;
    </script>
";
}else{
    echo " 
    <script type='text/javascript'>
        alert('Produk Gagal Dihapus');
        window.location = 'keranjang.php;
    </script>
";
}


if(isset($_SESSION["cart"]) < 0 ){

}
