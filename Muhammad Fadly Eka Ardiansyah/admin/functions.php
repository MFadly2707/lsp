<?php

$conn = mysqli_connect('localhost', 'root', '', 'printer1');

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function tambahUser($data){
    global $conn;
    
    $nama_user = htmlspecialchars($data["nama_user"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $roles = htmlspecialchars($data["roles"]);

    $query = "INSERT INTO user VALUES(NULL, '$nama_user', '$username', '$password', '$roles')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function hapusUser($id){
    global $conn;
    
    $query = "DELETE FROM user WHERE id_user = '$id'";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function updateUser($data){
    global $conn;
    
    $id = htmlspecialchars($data["id_user"]);
    $nama_user = htmlspecialchars($data["nama_user"]);
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $roles = htmlspecialchars($data["roles"]);

        $query = "UPDATE user SET
        nama_user = '$nama_user',
        username = '$username',
        password = '$password',
        roles = '$roles' WHERE id_user = '$id'";
    
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
}

function tambahBarang($data){
    global $conn;

    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $jenis = htmlspecialchars($data["jenis_barang"]);
    $harga  = htmlspecialchars($data["harga_satuan"]);
    $stok = htmlspecialchars($data["stok_barang"]);

    $query = "INSERT INTO barang VALUES(NULL, '$nama_barang', '$foto', '$jenis', '$harga', '$stok')";

    move_uploaded_file($files, "../image/".$foto);
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusBarang($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM barang WHERE id_barang = '$id'");
    return mysqli_affected_rows($conn);
}

function hapusTransaksi($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id'");
    return mysqli_affected_rows($conn);
}

function tolakBarang($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'ditolak' WHERE id_transaksi = '$id' ");
}

function terimaBarang($id){
    global $conn;
    mysqli_query($conn, "UPDATE transaksi SET status = 'terverifikasi' WHERE id_transaksi = '$id' ");
}


function editbarang($data){
    global $conn;

    $id = htmlspecialchars($data["id_barang"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $foto = $_FILES["foto"]["name"];
    $files = $_FILES["foto"]["tmp_name"];
    $jenis = htmlspecialchars($data["jenis_barang"]);
    $harga = htmlspecialchars($data["harga_satuan"]);
    $stok = htmlspecialchars($data["stok_barang"]);

    if(empty($foto)){
        $query = "UPDATE barang SET
        nama_barang = '$nama_barang',
        jenis_barang = '$jenis',
        harga_satuan = '$harga',
        stok_barang = '$stok' WHERE id_barang = '$id'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }else{
        $query = "UPDATE barang SET
        nama_barang = '$nama_barang',
        foto = '$foto',
        jenis_barang = '$jenis',
        harga_satuan = '$harga',
        stok_barang = '$stok' WHERE id_barang = '$id'";

        move_uploaded_file($files, "../image/".$foto);
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

}

?>