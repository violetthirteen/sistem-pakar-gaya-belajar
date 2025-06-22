<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['id_mahasiswa'])) {
    header("Location: mahasiswa_login.php");
    exit;
}

include 'koneksi.php';

$nama = $_SESSION['nama'];
$nim = $_SESSION['nim'];

$koneksi = mysqli_connect("localhost", "root", "", "db_gayabelajar");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = mysqli_query($koneksi, "SELECT * FROM gejala");
$jumlahGejala = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Diagnosa Gaya Belajar</title>
    <style>
        #progress-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 12px 20px;
            background-color: #fff;
            border-bottom: 2px solid #eee;
            z-index: 1000;
        }

        #stepText {
            font-weight: bold;
            margin-bottom: 5px;
        }

        #progressBarContainer {
            background: #eee;
            border-radius: 10px;
            overflow: hidden;
            height: 15px;
        }

        #progressBar {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, #3399ff, #f89abf);
            transition: width 0.3s ease-out;
        }

        .card {
            margin-top: 90px;
            border: 1px solid #ddd;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff;
            color: #000;
            margin: 20px;
        }

        .card-header {
            background-color: #cce5ff;
            padding: 15px 20px;
        }

        .card-header h4 {
            margin: 0;
        }

        .card-body {
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background-color: #fddde6;
            padding: 10px;
            text-align: center;
        }

        td {
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #e6f2ff;
        }

        .form-check-inline {
            margin-right: 10px;
        }

        button {
            background-color: #f89abf;
            color: #fff;
            padding: 8px 18px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #e07ba6;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 100%;
        }

        .btn {
            text-decoration: none;
            padding: 8px 18px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 8px;
            display: inline-block;
        }

        .sticky-progress {
            position: sticky;
            top: 0;
            background-color: #fff;
            z-index: 100;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #eee;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <h4>Form Diagnosa Gaya Belajar Mahasiswa</h4>
    </div>
    <div class="card-body">
        <form method="post" action="hasil.php" id="formDiagnosa">
            <!-- Menampilkan nama mahasiswa dari session -->
            <div class="mb-4">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($nama) ?>" readonly>
            </div>

            <!-- PROGRESS BAR -->
            <div id="progress-wrapper">
                <p id="stepText">Pertanyaan 0 dari <?= $jumlahGejala ?></p>
                <div id="progressBarContainer">
                    <div id="progressBar"></div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-start">Gejala</th>
                        <th style="width:25%;">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    mysqli_data_seek($query, 0); // ulang ke awal
                    while ($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td style='text-align:center;'>{$no}</td>";
                        echo "<td>{$data['nama_gejala']}</td>";
                        echo "<td style='text-align:center;'>
                                <label class='form-check-inline'>
                                    <input type='radio' class='jawaban' name='gejala[{$data['kode_gejala']}]' value='ya' required> Ya
                                </label>
                                <label class='form-check-inline'>
                                    <input type='radio' class='jawaban' name='gejala[{$data['kode_gejala']}]' value='tidak'> Tidak
                                </label>
                              </td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

            <div style="text-align: right; margin-top: 20px;">
                <button type="submit">Lihat Hasil Diagnosa</button>
                <a href="mahasiswa_dashboard.php" class="btn" style="background-color: #ccc; margin-top: 10px;">❌ Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const radios = document.querySelectorAll('.jawaban');
        const total = <?= $jumlahGejala ?>;
        const stepText = document.getElementById("stepText");
        const bar = document.getElementById("progressBar");

        function updateProgress() {
            const answered = new Set();
            radios.forEach(r => {
                if (r.checked) {
                    answered.add(r.name);
                }
            });
            const current = answered.size;
            const percent = Math.round((current / total) * 100);
            stepText.textContent = `Pertanyaan ${current} dari ${total}`;
            bar.style.width = percent + "%";
        }

        radios.forEach(r => r.addEventListener('change', updateProgress));
        updateProgress();
    });
</script>
</body>
</html>
