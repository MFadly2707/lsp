<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'printer1');

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function checkoutBarang($data)
{
    global $conn;

    foreach ($_SESSION['cart'] as $barang_id => $result) :
?>
        <?php
        $barang = query("SELECT * FROM barang WHERE id_barang = '$barang_id'")[0];

        $totalHarga = $result * $barang["harga_satuan"];
        $tanggal = $data["tgl_transaksi"];
        $alamat = $data["alamat"];
        $nomor_telpon = $data["nomor_telpon"];
        $nama_user = $_SESSION["nama_user"];
        $nama_barang = $data["nama_barang"];
        $price = $totalHarga;
        $stok = $barang["stok_barang"];
        $sisa = $stok - $result;
        $foto = $barang["foto"];
        $st = 'proses';

        // masukan ke database
        $queryCheckout = "INSERT INTO transaksi VALUES(
            NULL,
            '$tanggal',
            '$nama_user',
            '$alamat',
            '$nomor_telpon',
            '$nama_barang',
            '$price',
            '$foto',
            '$st')";
        // masukan ke database
        unset($_SESSION['cart']);
        mysqli_query($conn, $queryCheckout);
        if ($queryCheckout) {
            $updateStok = mysqli_query($conn, "UPDATE barang SET stok_barang = '$sisa'
            WHERE id_barang = '$barang_id'");
        }
        ?>
        <?php
    endforeach;
    return mysqli_affected_rows($conn);
}
?>