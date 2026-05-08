CREATE DATABASE crud_produk;

USE crud_produk;

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    stok INT,
    foto VARCHAR(255)
);