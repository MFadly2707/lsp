<?php 
// panggil koneksi
require 'functions.php';

// deklrasiin data-data apa aja yang mau kita input
$nama_user = $_POST["nama_user"];
$username = $_POST["username"];
$password = $_POST["password"];
$roles = $_POST["roles"];

// bikin sql/query-nya
$query = mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$nama_user', '$username', '$password', '$roles')");

// bikin kondisi kalo misalkan berhasil
if($query){
    echo "
        <script type='text/javascript'>
            alert('Registrasi Berhasil');
            window.location = '../login/index.php'
        </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Registrasi Gagal');
        window.location = 'index.php'
    </script>
";
}


?>