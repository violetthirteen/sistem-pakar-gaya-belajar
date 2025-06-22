<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");

use Mpdf\Mpdf;

// Cek parameter ID
if (!isset($_GET['id'])) {
    die('ID tidak ditemukan.');
}

$id = $_GET['id'];

// Ambil data diagnosa
$q = mysqli_query($koneksi, "SELECT * FROM riwayat_diagnosa WHERE id = '$id'");
$data = mysqli_fetch_assoc($q);

// Ambil nama mahasiswa berdasarkan NIM
$nim = $data['nim'];
$getNama = mysqli_query($koneksi, "SELECT nama FROM mahasiswa WHERE nim = '$nim'");
$mahasiswa = mysqli_fetch_assoc($getNama);
$nama_mahasiswa = $mahasiswa['nama'];

// Ambil detail gaya belajar
$hasil = $data['gaya_belajar'];
$det = mysqli_query($koneksi, "SELECT * FROM gaya_belajar WHERE nama_gaya = '$hasil'");
$detail = mysqli_fetch_assoc($det);

// Format waktu diagnosa lengkap
$waktu_diagnosa = date("d/m/Y H:i:s", strtotime($data['tanggal']));

// Bangun HTML
$html = '
<html>
<head>
    <style>
        body { font-family: "Segoe UI", sans-serif; font-size: 12pt; }
        h2 { text-align: center; color: #333; margin-bottom: 10px; }
        .box { border: 1px solid #ccc; border-radius: 8px; padding: 15px; background-color: #fdf0f5; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        td { padding: 8px; vertical-align: top; }
        .label { width: 30%; font-weight: bold; background-color: #fddde6; }
        .content { background-color: #fff; }
        .section { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Hasil Diagnosa Gaya Belajar</h2>
    <div class="box">
        <table>
            <tr><td class="label">Nama Mahasiswa</td><td class="content">' . htmlspecialchars($nama_mahasiswa) . '</td></tr>
            <tr><td class="label">NIM</td><td class="content">' . htmlspecialchars($nim) . '</td></tr>
            <tr><td class="label">Waktu Diagnosa</td><td class="content">' . $waktu_diagnosa . '</td></tr>
            <tr><td class="label">Gaya Belajar</td><td class="content"><strong>' . $data['gaya_belajar'] . '</strong></td></tr>
            <tr><td class="label">Deskripsi</td><td class="content">' . $detail['deskripsi'] . '</td></tr>
            <tr><td class="label">Rekomendasi</td><td class="content">' . $detail['rekomendasi'] . '</td></tr>
        </table>
    </div>
</body>
</html>
';

// Generate PDF
$mpdf = new Mpdf(['margin_top' => 20, 'margin_bottom' => 20, 'margin_left' => 15, 'margin_right' => 15]);
$mpdf->SetTitle("Hasil Diagnosa - " . $nama_mahasiswa);
$mpdf->WriteHTML($html);
$mpdf->Output("diagnosa_{$nama_mahasiswa}.pdf", 'I');
?>
