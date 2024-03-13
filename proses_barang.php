<?php
require_once("database.php");
$kode_barang = $_POST['kode_barang'];
$namabarang = $_POST['nama_barang'];
$kategori = $_POST['kategori'];
$merk = $_POST['merk'];
$jumlah = $_POST['jumlah'];
$simpan = inputdata("INSERT INTO barang (id,kode_barang,nama_barang,kategori,merk,jumlah) VALUES (null,'$kode_barang','$namabarang','$kategori','$merk',$jumlah)");
if ($simpan) {
  header("location:data_barang.php");
} else {
  echo "Gagal memasukan data baru";
}