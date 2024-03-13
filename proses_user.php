<?php
require_once("database.php");
$no_identitas = $_POST['no_identitas'];
$nama = $_POST['nama'];
$status = $_POST['status'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwordMD5 = md5($password);
$role = $_POST['role'];
$simpan = inputdata("INSERT INTO user (id,no_identitas,nama,status,username,password,role) VALUES (null,'$no_identitas','$nama','$status','$username','$passwordMD5','$role')");
if ($simpan) {
    header("location:data_user.php");
} else {
    echo "Gagal memasukan data baru";
}
