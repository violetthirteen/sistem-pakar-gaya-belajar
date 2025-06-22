<?php
session_start();
if (!isset($_SESSION['id_mahasiswa'])) {
    header("Location: mahasiswa_login.php");
    exit;
}

include 'koneksi.php';

$id_mahasiswa = $_SESSION['id_mahasiswa'];
$nama = $_SESSION['nama'];
$nim = $_SESSION['nim'];

$riwayat = []; // pastikan ini ada

$nim = $_SESSION['nim'];
$query = mysqli_query($koneksi, "SELECT * FROM riwayat_diagnosa WHERE nim = '$nim' ORDER BY tanggal DESC");

if ($query && mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        $riwayat[] = $row;
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #c2e9fb, #f9f9f9);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .dashboard {
            margin-top: 50px;
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 700px;
        }
        h2 {
            color: #3399ff;
            margin-bottom: 10px;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #444;
            text-align: center;
        }
        .button {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 12px 24px;
            background-color: #f89abf;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #e07ba6;
        }
        .logout {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        .logout a {
            color: #3399ff;
            text-decoration: none;
        }
        .logout a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 15px;
        }
        table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .section-title {
            margin-top: 40px;
            font-size: 18px;
            color: #333;
            font-weight: 600;
        }
        .cetak-btn {
            background-color: #3399ff;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }
        .cetak-btn:hover {
            background-color: #267acc;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h2>Selamat Datang, <?= htmlspecialchars($nama) ?>!</h2>
        <p>NIM: <?= htmlspecialchars($nim) ?></p>
        <p>Senang melihatmu kembali! Silakan mulai diagnosa untuk mengetahui gaya belajar kamu hari ini.</p>

        <a href="diagnosa.php" class="button">Mulai Diagnosa</a>

        <div class="section-title">Riwayat Diagnosa Anda</div>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Gaya Belajar</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($riwayat) > 0): ?>
                    <?php foreach ($riwayat as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['tanggal']) ?></td>
                            <td><?= htmlspecialchars($item['gaya_belajar']) ?></td>
                            <td><?= htmlspecialchars($item['keterangan']) ?></td>
                            <td>
                                <a href="cetak_pdf.php?id=<?= $item['id'] ?>" target="_blank" class="cetak-btn">🖨 Cetak PDF</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4">Belum ada riwayat diagnosa.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="logout">
            <br>Ingin keluar? <a href="logout_mahasiswa.php">Logout</a>
        </div>
    </div>
</body>
</html>
