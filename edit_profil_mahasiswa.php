<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['mahasiswa_nim'])) {
    header("Location: mahasiswa_login.php");
    exit;
}

$nim = $_SESSION['mahasiswa_nim'];
$pesan = '';

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['simpan'])) {
    $nama_baru = $_POST['nama'];
    if (!empty($nama_baru)) {
        mysqli_query($koneksi, "UPDATE mahasiswa SET nama = '$nama_baru' WHERE nim = '$nim'");
        $_SESSION['mahasiswa_nama'] = $nama_baru;
        $pesan = "✅ Profil berhasil diperbarui!";
        $data['nama'] = $nama_baru;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f0f0;
            padding: 40px;
        }
        .box {
            max-width: 400px;
            background: #fff;
            padding: 25px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #3399ff;
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            background: #f89abf;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-weight: bold;
        }
        .pesan {
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
            color: #e07ba6;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Edit Profil</h2>
        <?php if ($pesan): ?>
            <div class="pesan"><?= $pesan ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            <button type="submit" name="simpan">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
