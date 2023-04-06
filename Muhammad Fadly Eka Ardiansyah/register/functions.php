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
?>