<?php
include_once("database.php");
$id = $data["id"];
$tanggal_peminjaman = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$no_identitas = $_POST['no_identitas'];
$kode_barang = $_POST['kode_barang'];
$jumlah = $_POST['jumlah'];
$keperluan = $_POST['keperluan'];
$status = $_POST['status'];
$id_login = $_POST['id_login'];

$sql2 = update_pinjam("peminjaman",$tanggal_peminjaman,$tanggal_kembali ,$no_identitas, $kode_barang, $jumlah, $keperluan, $status, $id_login, $id);
if ($sql2) {
    header("location:peminjam.php");
}