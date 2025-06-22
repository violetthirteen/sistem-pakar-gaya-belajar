<?php
session_start();
require_once '../koneksi.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Diagnosa</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #fddde6;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            vertical-align: top;
        }
        tr:nth-child(even) {
            background-color: #e6f2ff;
        }
        .btn {
            background-color: #f89abf;
            color: #fff;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 6px;
        }
        .btn:hover {
            background-color: #e07ba6;
        }
    </style>
</head>
<body>
    <h2>Riwayat Diagnosa Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal</th>
                <th>Gejala Terpilih</th>
                <th>Hasil Gaya Belajar</th>
                <th>Nilai CF</th>
                <th>PDF</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM riwayat_diagnosa ORDER BY tanggal DESC");
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_mahasiswa']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['gejala']}</td>
                        <td><strong>{$row['hasil']}</strong></td>
                        <td>".round($row['nilai_cf'], 3)."</td>
                        <td><a class='btn' target='_blank' href='../cetak_pdf.php?id={$row['id']}'>PDF</a></td>
                    </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
