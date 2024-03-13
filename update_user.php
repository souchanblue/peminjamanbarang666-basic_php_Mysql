<?php
require_once("database.php");
$id = $_POST['id'];
$no_identitas = $_POST['no_identitas'];
$nama = $_POST['nama'];
$status = $_POST['status'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwordMD5 = md5($password);
$role = $_POST['role'];

$sql2 = update_user("user", $no_identitas, $nama, $status, $username, $passwordMD5, $role, $id);
if ($sql2) {
    header("location:data_user.php");
}
