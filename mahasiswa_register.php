<?php
require_once 'koneksi.php';

$alert = '';
$redirect = '';

// Default nilai input
$nama = '';
$nim = '';

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    if (empty($nama) || empty($nim) || empty($password) || empty($konfirmasi)) {
        $alert = "Semua kolom harus diisi!";
    } elseif (strlen($password) < 6) {
        $alert = "Password minimal 6 karakter!";
    } elseif ($password !== $konfirmasi) {
        $alert = "Konfirmasi password tidak cocok!";
    } else {
        $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
        if (mysqli_num_rows($cek) > 0) {
            $alert = "NIM sudah terdaftar!";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, password) VALUES ('$nama', '$nim', '$hash')");
            if ($insert) {
                $alert = "Pendaftaran berhasil!";
                $redirect = "mahasiswa_login.php";
                $nama = $nim = ''; // Kosongkan form jika sukses
            } else {
                $alert = "Gagal menyimpan data. Silakan coba lagi.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Mahasiswa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #cce5ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 {
            text-align: center;
            color: #3399ff;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #f89abf;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #e07ba6;
        }
    </style>
</head>
<body>
    <form method="post" class="box">
        <h2>Registrasi Mahasiswa</h2>
        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required value="<?= htmlspecialchars($nama) ?>">
        <input type="text" name="nim" id="nim" placeholder="NIM" required value="<?= htmlspecialchars($nim) ?>">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfirmasi Password" required>
        <label><input type="checkbox" id="showPass"> Tampilkan Password</label><br><br>
        <button type="submit" name="daftar">Daftar</button>
    </form>

    <script>
    const showPassCheckbox = document.getElementById('showPass');
    const passwordFields = [
        document.getElementById('password'),
        document.getElementById('konfirmasi')
    ];

    showPassCheckbox.addEventListener('change', function () {
        passwordFields.forEach(field => {
            field.type = this.checked ? 'text' : 'password';
        });
    });
    </script>

    <?php if (!empty($alert)): ?>
    <script>
        Swal.fire({
            icon: <?= ($alert === "Pendaftaran berhasil!") ? "'success'" : "'error'" ?>,
            title: <?= json_encode($alert) ?>,
            confirmButtonText: 'OK'
        }).then((result) => {
            <?php if (!empty($redirect)): ?>
                if (result.isConfirmed) {
                    window.location.href = "<?= $redirect ?>";
                }
            <?php endif; ?>
        });
    </script>
    <?php endif; ?>
</body>
</html>
