<?php
require_once("database.php");
$id = $_POST['id'];
$kode_barang = $_POST['kode_barang'];
$namabarang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$merk = $_POST['merk'];
$jumlah = $_POST['jumlah'];

$sql2 = update("barang", $kode_barang, $namabarang, $kategori, $merk, $jumlah, $id);
if ($sql2) {
    header("location:data_barang.php");
}
