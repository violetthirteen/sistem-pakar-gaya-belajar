<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #fff; color: #000; margin: 20px; }
        .card { border: 1px solid #ccc; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }
        .card-header { background-color: #fddde6; padding: 15px 20px; }
        .card-body { padding: 20px; }
        ul li { margin-bottom: 10px; }
        a { text-decoration: none; color: #000; }
        a:hover { color: #e07ba6; }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h4>Dashboard Admin</h4>
    </div>
    <div class="card-body">
        <p>Selamat datang, <strong><?= $_SESSION['admin']; ?></strong>!</p>
        <ul>
            <li><a href="gejala.php">📋 Kelola Data Gejala</a></li>
            <li><a href="gaya_belajar.php">📘 Kelola Gaya Belajar</a></li>
            <li><a href="basis_pengetahuan.php">🔗 Kelola Basis Pengetahuan</a></li>
            <li><a href="riwayat.php">📜 Lihat Riwayat Diagnosa</a></li>
            <li><a href="logout.php" style="color: red;">🚪 Logout</a></li>
        </ul>
    </div>
</div>
</body>
</html>
