<?php
require_once '../koneksi.php'; // sesuaikan path jika perlu

$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];

if ($role === 'mahasiswa') {
    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, password) VALUES ('$username', '$nama', '$password')");
    if ($query) {
        header("Location: login_register.php?pesan=daftar_berhasil");
    } else {
        echo "Gagal daftar mahasiswa.";
    }
} elseif ($role === 'admin') {
    $query = mysqli_query($koneksi, "INSERT INTO admin (username, password, nama) VALUES ('$username', '$password', '$nama')");
    if ($query) {
        header("Location: login_register.php?pesan=daftar_berhasil");
    } else {
        echo "Gagal daftar admin.";
    }
} else {
    echo "Role tidak valid.";
}
?>
