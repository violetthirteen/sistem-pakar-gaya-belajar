<?php
session_start();
require_once '../koneksi.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $rekomendasi = $_POST['rekomendasi'];
    mysqli_query($koneksi, "INSERT INTO gaya_belajar (kode_gaya, nama_gaya, deskripsi, rekomendasi) 
                            VALUES ('$kode', '$nama', '$deskripsi', '$rekomendasi')");
    header("Location: gaya_belajar.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gaya Belajar</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #fff;
            color: #000;
            margin: 20px;
        }
        h2 {
            margin-bottom: 15px;
        }
        form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            border: 1px solid #f89abf;
            border-radius: 8px;
            width: calc(25% - 12px);
            box-sizing: border-box;
        }
        button {
            background-color: #f89abf;
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #e07ba6;
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
        }
        tr:nth-child(even) {
            background-color: #e6f2ff;
        }
    </style>
</head>
<body>
    <h2>Gaya Belajar</h2>
    <form method="post">
        <input type="text" name="kode" placeholder="Kode" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="deskripsi" placeholder="Deskripsi" required>
        <input type="text" name="rekomendasi" placeholder="Rekomendasi" required>
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Rekomendasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM gaya_belajar ORDER BY kode_gaya");
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>{$data['kode_gaya']}</td>
                        <td>{$data['nama_gaya']}</td>
                        <td>{$data['deskripsi']}</td>
                        <td>{$data['rekomendasi']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
