<?php

mysqli_query($koneksi,"CREATE TABLE IF NOT EXISTS tb_log(
id_log INT AUTO_INCREMENT PRIMARY KEY,
aktivitas TEXT,id_user INT,waktu DATETIME)");

mysqli_query($koneksi,"CREATE TABLE IF NOT EXISTS tb_area(
id_area INT AUTO_INCREMENT PRIMARY KEY,
nama_area VARCHAR(100))");

mysqli_query($koneksi,"CREATE TABLE IF NOT EXISTS tb_user(
id_user INT AUTO_INCREMENT PRIMARY KEY,
nama_lengkap VARCHAR(100),
username VARCHAR(50) UNIQUE,
password VARCHAR(50),
role VARCHAR(20),
status_aktif INT)");

mysqli_query($koneksi,"INSERT IGNORE INTO tb_user VALUES
(1,'Admin','admin','123','admin',1),
(2,'Petugas','petugas','123','petugas',1)");

mysqli_query($koneksi,"CREATE TABLE IF NOT EXISTS tb_kendaraan(
id_kendaraan INT AUTO_INCREMENT PRIMARY KEY,
plat_nomor VARCHAR(20),
jenis_kendaraan VARCHAR(20)
)");

mysqli_query($koneksi,"CREATE TABLE IF NOT EXISTS tb_transaksi(
id_parkir INT AUTO_INCREMENT PRIMARY KEY,
id_kendaraan INT,
waktu_masuk DATETIME,
waktu_keluar DATETIME,
durasi_jam INT,
biaya_total INT,
status VARCHAR(20),
id_user INT,
id_owner INT,
status_bayar VARCHAR(20)
)");
?>