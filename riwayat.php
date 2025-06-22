<?php require_once 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Diagnosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Riwayat Diagnosa Gaya Belajar Mahasiswa</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal</th>
                        <th>Gejala Terpilih</th>
                        <th>Hasil</th>
                        <th>Nilai CF</th>
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
                            <td>{$row['hasil']}</td>
                            <td>".round($row['nilai_cf'], 3)."</td>
                        </tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <a href='diagnosa.php' class='btn btn-secondary'>Kembali ke Diagnosa</a>
        </div>
    </div>
</div>
</body>
</html>
