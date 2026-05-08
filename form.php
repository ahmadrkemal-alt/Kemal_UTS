<?php

include 'koneksi.php';

$id = "";
$nama = "";
$harga = "";
$stok = "";
$foto = "";

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $edit = mysqli_query($conn,
    "SELECT * FROM produk
    WHERE id='$id'");

    $row = mysqli_fetch_assoc($edit);

    $nama = $row['nama_produk'];
    $harga = $row['harga'];
    $stok = $row['stok'];
    $foto = $row['foto'];
}

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $file = $_FILES['foto'];

    if($file['name'] != ""){

        $ext = strtolower(pathinfo(
        $file['name'],
        PATHINFO_EXTENSION));

        $allowed = ['jpg','jpeg','png'];

        if(in_array($ext,$allowed)
        && $file['size'] <= 2000000){

            $namaFile =
            time().'.'.$ext;

            move_uploaded_file(
            $file['tmp_name'],
            "uploads/".$namaFile
            );

        } else {

            echo "File tidak valid";
            exit;

        }

    } else {

        $namaFile = $foto;

    }

    if($id == ""){

        mysqli_query($conn,
        "INSERT INTO produk VALUES(
        NULL,
        '$nama',
        '$harga',
        '$stok',
        '$namaFile'
        )");

    } else {

        mysqli_query($conn,
        "UPDATE produk SET

        nama_produk='$nama',
        harga='$harga',
        stok='$stok',
        foto='$namaFile'

        WHERE id='$id'
        ");
    }

    echo "
    <script>
    alert('Data berhasil disimpan');
    window.location='index.php';
    </script>
    ";
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Form Produk</title>

<link rel="stylesheet"
href="style.css">

</head>
<body>

<h1>Form Produk</h1>

<form method="POST"
enctype="multipart/form-data"
onsubmit="return validasi()">

<input type="text"
name="nama"
id="nama"
placeholder="Nama Produk"
value="<?= $nama ?>">

<br><br>

<input type="number"
name="harga"
id="harga"
placeholder="Harga"
value="<?= $harga ?>">

<br><br>

<input type="number"
name="stok"
id="stok"
placeholder="Stok"
value="<?= $stok ?>">

<br><br>

<input type="file"
name="foto"
id="foto">

<br><br>

<button type="submit"
name="simpan">

Simpan

</button>

</form>

<script src="script.js"></script>

</body>
</html>