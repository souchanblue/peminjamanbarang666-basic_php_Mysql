<?php
    include_once("database.php");
    $tanggal_peminjaman = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $no_identitas = $_POST['no_identitas'];
    $kode_barang = $_POST['kode_barang'];
    $jumlah = $_POST['jumlah'];
    $keperluan = $_POST['keperluan'];
    $status = $_POST['status'];
    $id_login = $_POST['id_login'];

    $simpan = inputdata("INSERT INTO peminjaman (id,tgl_pinjam,tgl_kembali,no_identitas,kode_barang,jumlah,keperluan,status,id_login) VALUES (null,'$tanggal_peminjaman','$tanggal_kembali','$no_identitas','$kode_barang','$jumlah','$keperluan','$status','$id_login')");
    if ($simpan) {
        header("location:peminjam.php");
      } else {
        echo "Gagal memasukan data baru";
      }
?>