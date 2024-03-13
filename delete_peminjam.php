<?php
require_once("database.php");
$id = $_GET['id'];
$sql = Delete_peminjam("peminjaman", $id);
if ($sql) {
    header("location:peminjam.php");
} else {
    echo "Hapus Gagal";
}