<?php
session_start();
require_once '../koneksi.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['tambah'])) {
    $gaya = $_POST['gaya'];
    $gejala = $_POST['gejala'];
    $cf = $_POST['cf'];
    mysqli_query($koneksi, "INSERT INTO basis_pengetahuan (kode_gaya, kode_gejala, nilai_cf) 
                            VALUES ('$gaya', '$gejala', '$cf')");
    header("Location: basis_pengetahuan.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM basis_pengetahuan WHERE id='$id'");
    header("Location: basis_pengetahuan.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Basis Pengetahuan</title>
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
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 25px;
            align-items: center;
        }
        select, input[type="number"] {
            padding: 8px;
            border: 1px solid #f89abf;
            border-radius: 8px;
            font-size: 14px;
        }
        input[type="number"] {
            width: 80px;
        }
        button {
            background-color: #f89abf;
            color: white;
            border: none;
            padding: 8px 16px;
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
    <h2>Basis Pengetahuan</h2>
    <form method="post">
        <select name="gaya" required>
            <option value="">Pilih Gaya Belajar</option>
            <?php
            $q = mysqli_query($koneksi, "SELECT * FROM gaya_belajar");
            while ($r = mysqli_fetch_array($q)) {
                echo "<option value='{$r['kode_gaya']}'>{$r['nama_gaya']}</option>";
            }
            ?>
        </select>
        <select name="gejala" required>
            <option value="">Pilih Gejala</option>
            <?php
            $q = mysqli_query($koneksi, "SELECT * FROM gejala");
            while ($r = mysqli_fetch_array($q)) {
                echo "<option value='{$r['kode_gejala']}'>{$r['nama_gejala']}</option>";
            }
            ?>
        </select>
        <input type="number" name="cf" step="0.1" min="0" max="1" placeholder="Nilai CF" required>
        <button type="submit" name="tambah">Tambah</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Gaya Belajar</th>
                <th>Gejala</th>
                <th>CF</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "
                SELECT bp.id, g.nama_gaya, gj.nama_gejala, bp.nilai_cf
                FROM basis_pengetahuan bp
                JOIN gaya_belajar g ON bp.kode_gaya = g.kode_gaya
                JOIN gejala gj ON bp.kode_gejala = gj.kode_gejala
                ORDER BY g.nama_gaya, gj.nama_gejala
            ");
            while ($data = mysqli_fetch_array($query)) {
                echo "<tr>
                        <td>{$data['nama_gaya']}</td>
                        <td>{$data['nama_gejala']}</td>
                        <td>{$data['nilai_cf']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
