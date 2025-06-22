<?php
session_start();
require_once '../koneksi.php'; // sesuaikan path jika perlu

$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];

if ($role === 'mahasiswa') {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['mahasiswa_nim'] = $username;
        header("Location: ../mahasiswa/index.php");
        exit;
    } else {
        echo "Login mahasiswa gagal!";
    }
} elseif ($role === 'admin') {
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin_username'] = $username;
        header("Location: ../admin/index.php");
        exit;
    } else {
        echo "Login admin gagal!";
    }
} else {
    echo "Role tidak valid.";
}
?>
