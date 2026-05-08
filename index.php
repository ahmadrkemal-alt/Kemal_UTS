<?php
include 'koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Produk</title>

    <link rel="stylesheet"
    href="style.css">

</head>
<body>

<h1>Data Produk</h1>

<a href="form.php">
    <button>Tambah Data</button>
</a>

<br><br>

<table>

<tr>
    <th>No</th>
    <th>Foto</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>

<td>
<img src="uploads/<?= $row['foto'] ?>"
width="80">
</td>

<td><?= $row['nama_produk'] ?></td>

<td><?= $row['harga'] ?></td>

<td><?= $row['stok'] ?></td>

<td>

<a href="form.php?id=<?= $row['id'] ?>">
<button>Edit</button>
</a>

<a href="hapus.php?id=<?= $row['id'] ?>"
onclick="return confirm('Yakin hapus data?')">

<button>Hapus</button>

</a>

</td>

</tr>

<?php } ?>

</table>

<script src="script.js"></script>

</body>
</html>