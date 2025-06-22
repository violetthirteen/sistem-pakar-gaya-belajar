<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['mahasiswa_nim'])) {
    header("Location: mahasiswa_login.php");
    exit;
}

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$nim = $_SESSION['mahasiswa_nim'];

$query = mysqli_query($koneksi, "SELECT * FROM riwayat_diagnosa WHERE id = '$id' AND nim = '$nim'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan atau bukan milik Anda.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Diagnosa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f7f9fb;
            margin: 20px;
        }
        .card {
            background: #fff;
            padding: 25px;
            max-width: 500px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            color: #3399ff;
            text-align: center;
        }
        p {
            font-size: 16px;
            margin-bottom: 8px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        a.btn {
            display: inline-block;
            margin-top: 20px;
            background: #f89abf;
            color: white;
            padding: 10px 16px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
        }
        .btn:hover {
            background: #e07ba6;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Detail Diagnosa</h2>
        <p><span class="label">Tanggal:</span> <?= $data['tanggal'] ?></p>
        <p><span class="label">Nama:</span> <?= $data['nama'] ?></p>
        <p><span class="label">NIM:</span> <?= $data['nim'] ?></p>
        <p><span class="label">Gaya Belajar:</span> <?= $data['gaya_belajar'] ?></p>
        <p><span class="label">Nilai CF:</span> <?= $data['nilai_cf'] ?></p>
        <a href="mahasiswa_dashboard.php" class="btn">⬅ Kembali ke Dashboard</a>
    </div>
</body>
</html>
