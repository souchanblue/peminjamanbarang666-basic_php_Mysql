<?php
require_once("database.php");
$id = $_GET['id'];
$sql = Delete_user("user", $id);
if ($sql) {
    header("location:data_user.php");
} else {
    echo "Hapus Gagal";
}
