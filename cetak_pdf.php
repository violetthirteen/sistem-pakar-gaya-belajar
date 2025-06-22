<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'koneksi.php';
date_default_timezone_set("Asia/Jakarta");

use Mpdf\Mpdf;

if (!isset($_GET['id'])) {
    die('ID tidak ditemukan.');
}
$id = $_GET['id'];
$q = mysqli_query($koneksi, "SELECT * FROM riwayat_diagnosa WHERE id = '$id'");
$data = mysqli_fetch_assoc($q);

// Ambil rekomendasi berdasarkan hasil
$hasil = $data['hasil'];
$det = mysqli_query($koneksi, "SELECT * FROM gaya_belajar WHERE nama_gaya = '$hasil'");
$detail = mysqli_fetch_assoc($det);

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
            <tr><td class="label">Nama Mahasiswa</td><td class="content">' . $data['nama_mahasiswa'] . '</td></tr>
            <tr><td class="label">Tanggal Diagnosa</td><td class="content">' . $data['tanggal'] . '</td></tr>
            <tr><td class="label">Gejala Terpilih</td><td class="content">' . nl2br($data['gejala']) . '</td></tr>
            <tr><td class="label">Hasil Gaya Belajar</td><td class="content"><strong>' . $data['hasil'] . '</strong></td></tr>
            <tr><td class="label">Nilai CF</td><td class="content">' . round($data['nilai_cf'], 3) . '</td></tr>
            <tr><td class="label">Rekomendasi</td><td class="content">' . $detail['rekomendasi'] . '</td></tr>
        </table>
    </div>
</body>
</html>';

$mpdf = new Mpdf(['margin_top' => 20, 'margin_bottom' => 20, 'margin_left' => 15, 'margin_right' => 15]);
$mpdf->SetTitle("Hasil Diagnosa - " . $data['nama_mahasiswa']);
$mpdf->WriteHTML($html);
$mpdf->Output("diagnosa_{$data['nama_mahasiswa']}.pdf", 'I');
?>
