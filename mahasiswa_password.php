<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['mahasiswa_nim'])) {
    header("Location: mahasiswa_login.php");
    exit;
}

$nim = $_SESSION['mahasiswa_nim'];
$pesan = '';

if (isset($_POST['ubah'])) {
    $lama = $_POST['lama'];
    $baru = $_POST['baru'];
    $konfirmasi = $_POST['konfirmasi'];

    $cek = mysqli_query($koneksi, "SELECT password FROM mahasiswa WHERE nim = '$nim'");
    $data = mysqli_fetch_assoc($cek);

    if (!password_verify($lama, $data['password'])) {
        $pesan = "❌ Password lama salah!";
    } elseif ($baru != $konfirmasi) {
        $pesan = "❌ Konfirmasi password baru tidak cocok!";
    } else {
        $hash = password_hash($baru, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE mahasiswa SET password='$hash' WHERE nim='$nim'");
        $pesan = "✅ Password berhasil diubah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Password</title>
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
        input[type="password"] {
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
        <h2>Ubah Password</h2>
        <?php if ($pesan): ?>
            <div class="pesan"><?= $pesan ?></div>
        <?php endif; ?>
        <form method="post">
            <input type="password" name="lama" placeholder="Password Lama" required>
            <input type="password" name="baru" placeholder="Password Baru" required>
            <input type="password" name="konfirmasi" placeholder="Konfirmasi Password Baru" required>
            <button type="submit" name="ubah">Ubah Password</button>
        </form>
    </div>
</body>
</html>
