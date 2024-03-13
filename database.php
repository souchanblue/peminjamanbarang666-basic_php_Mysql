<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bayusts');
$koneksi = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Gagal terhubung dengan Database: " . mysqli_error($dbconnect));

function cek_login($username, $password)
{
    global $koneksi;

    $uname = $username;
    $pass = $password;

    $sqls = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$uname' AND password = MD5('$pass')");
    $result = mysqli_num_rows($sqls);
    if ($result > 0) {
        $sql = mysqli_fetch_assoc($sqls);
        $_SESSION['id'] = $sql['id'];
        $_SESSION["username"] = $sql['username'];
        $_SESSION["role"] = $sql['role'];
        return true;
    } else {
        return false;
    }
}

function tampildata($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    }
    return $rows;
}


// tambah data
function inputdata($data)
{
    global $koneksi;
    $sql = mysqli_query($koneksi, $data);
    return $sql;
}

// Hapus data
function Delete($tabel, $id)
{
    global $koneksi;
    $sql = mysqli_query($koneksi, "DELETE FROM $tabel WHERE id = '$id'");
    return $sql;
}

function Delete_user($tabel, $id)
{
    global $koneksi;
    $sql = mysqli_query($koneksi, "DELETE FROM $tabel WHERE id = '$id'");
    return $sql;
}

function Delete_peminjam($tabel, $id)
{
    global $koneksi;
    $sql = mysqli_query($koneksi, "DELETE FROM $tabel WHERE id = '$id'");
    return $sql;
}

// Edit data
function edit($tabel, $id)
{
    global $koneksi;
    $sql = mysqli_query($koneksi, "SELECT * FROM $tabel WHERE id = '$id'");
    return $sql;
}
function update($tabel, $kode_barang, $namabarang, $kategori, $merk, $jumlah, $id)
{
    global $koneksi;
    $query = "UPDATE $tabel SET kode_barang = '$kode_barang', nama_barang = '$namabarang', kategori = '$kategori', merk = '$merk', jumlah = $jumlah WHERE id = '$id'";
    $hasil = mysqli_query($koneksi, $query);
    return $hasil;
}

function update_user($tabel, $no_identitas, $nama, $status, $username, $password, $role, $id)
{
    global $koneksi;
    $qeury = "UPDATE $tabel SET no_identitas = '$no_identitas', nama = '$nama', status = '$status', username = '$username', password = '$password', role = '$role' WHERE id = '$id'";
    $hasil = mysqli_query($koneksi, $qeury);
    return $hasil;
}

function update_pinjam($tabel, $tanggal_peminjaman, $tanggal_kembali, $no_identitas, $kode_barang, $jumlah, $keperluan, $status, $id_login, $id)
{
    global $koneksi;
    $qeury = "UPDATE $tabel SET tgl_pinjam = '$tanggal_peminjaman', tgl_kembali = '$tanggal_kembali', no_identitas = '$no_identitas', kode_barang = '$kode_barang', jumlah = $jumlah, keperluan = '$keperluan', status = '$status', id_login = '$id_login' WHERE id = '$id'";
    $hasil = mysqli_query($koneksi, $qeury);
    return $hasil;
}
