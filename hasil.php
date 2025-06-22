<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['id_mahasiswa'])) {
    header("Location: mahasiswa_login.php");
    exit;
}

require_once 'koneksi.php';

$nim  = $_SESSION['nim'];
$nama = $_SESSION['nama'];

if (!isset($_POST['gejala'])) {
    echo "<div class='result-box'>Silakan pilih gejala terlebih dahulu.</div>";
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Diagnosa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff;
            color: #000;
            margin: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .result-box {
            background-color: #fddde6;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .result-box h3 {
            margin-top: 0;
        }
        .btn {
            background-color: #f89abf;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #e07ba6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th {
            background-color: #fddde6;
            padding: 10px;
        }
        td {
            padding: 10px;
        }
        tr:nth-child(even) {
            background-color: #e6f2ff;
        }
    </style>
</head>
<body>
    <h2>Hasil Diagnosa Gaya Belajar</h2>

    <?php
    $gejala_terpilih = $_POST['gejala'];
    $list_gejala_ya = [];
    $cf_per_gaya = [];

    foreach ($gejala_terpilih as $kode_gejala => $jawaban) {
        if ($jawaban == 'ya') {
            $q = mysqli_query($koneksi, "SELECT * FROM gejala WHERE kode_gejala='$kode_gejala'");
            $d = mysqli_fetch_assoc($q);
            $list_gejala_ya[] = $d['nama_gejala'];

            $query = mysqli_query($koneksi, "SELECT * FROM basis_pengetahuan WHERE kode_gejala='$kode_gejala'");
            while ($data = mysqli_fetch_array($query)) {
                $kode_gaya = $data['kode_gaya'];
                $cf = $data['nilai_cf'];
                if (!isset($cf_per_gaya[$kode_gaya])) {
                    $cf_per_gaya[$kode_gaya] = $cf;
                } else {
                    $cf_lama = $cf_per_gaya[$kode_gaya];
                    $cf_per_gaya[$kode_gaya] = $cf_lama + $cf * (1 - $cf_lama);
                }
            }
        }
    }

    if (empty($cf_per_gaya)) {
        echo "<div class='result-box'>Tidak ditemukan hasil karena semua jawaban adalah TIDAK.</div>";
    } else {
        arsort($cf_per_gaya);
        $tertinggi = array_key_first($cf_per_gaya);
        $cf_tertinggi = round($cf_per_gaya[$tertinggi], 3);
        $q = mysqli_query($koneksi, "SELECT * FROM gaya_belajar WHERE kode_gaya='$tertinggi'");
        $gaya = mysqli_fetch_assoc($q);

       $tanggal = date("Y-m-d H:i:s");
$gaya_belajar = $gaya['nama_gaya'];
$keterangan   = $gaya['rekomendasi'];

mysqli_query($koneksi, "INSERT INTO riwayat_diagnosa (nim, tanggal, gaya_belajar, keterangan)
VALUES ('$nim', '$tanggal', '$gaya_belajar', '$keterangan')");
        $last_id = mysqli_insert_id($koneksi);

        echo "<div class='result-box'>
            <h3>Nama: {$nama}</h3>
            <p><strong>Gaya Belajar Dominan:</strong> {$gaya['nama_gaya']}</p>
            <p><strong>Nilai CF:</strong> {$cf_tertinggi}</p>
            <p><strong>Deskripsi:</strong> {$gaya['deskripsi']}</p>
            <p><strong>Rekomendasi:</strong> {$gaya['rekomendasi']}</p>
            <a class='btn' href='cetak_pdf.php?id={$last_id}' target='_blank'>🖨 Cetak PDF</a>
        </div>";

        echo "<h4>Detail Perhitungan CF:</h4><table><tr><th>Gaya Belajar</th><th>Nilai CF</th></tr>";
        foreach ($cf_per_gaya as $kode => $cf) {
            $q = mysqli_query($koneksi, "SELECT * FROM gaya_belajar WHERE kode_gaya='$kode'");
            $r = mysqli_fetch_assoc($q);
            echo "<tr><td>{$r['nama_gaya']}</td><td>" . round($cf, 3) . "</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
