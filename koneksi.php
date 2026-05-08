<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "crud_produk"
);

if(!$conn){
    die("Koneksi gagal");
}

?>