<?php
require_once 'koneksi.php';
$pesan = '';

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];

    $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
    if (mysqli_num_rows($cek) > 0) {
        $pesan = "NIM sudah terdaftar!";
    } elseif ($password !== $konfirmasi) {
        $pesan = "Konfirmasi password tidak cocok!";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, password) VALUES ('$nama', '$nim', '$hash')");
        header("Location: daftar_berhasil.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Mahasiswa</title>
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
        .pesan {
            text-align: center;
            margin-bottom: 10px;
            font-weight: bold;
            color: #e07ba6;
        }
    </style>

<style>
.swal2-popup-custom {
    border-radius: 14px !important;
    border: 2px solid #f89abf;
    animation: fadeInUp 0.4s ease;
}
@keyframes fadeInUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>

</head>
<body>
    <form method="post" class="box" onsubmit="return cekPassword()">
        <h2>Registrasi Mahasiswa</h2>
        <?php if (!empty($pesan)): ?>
            <div class="pesan"><?= $pesan ?></div>
        <?php endif; ?>
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="konfirmasi" placeholder="Konfirmasi Password" required>
        <label><input type="checkbox" onclick="togglePass()"> Tampilkan Password</label><br><br>
<button type="submit" name="daftar">Daftar</button>
    </form>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function togglePass() {
    let pwFields = document.querySelectorAll('input[type="password"]');
    pwFields.forEach(p => {
        p.type = p.type === "password" ? "text" : "password";
    });
}

function cekPassword() {
    let pass = document.querySelector('input[name="password"]').value;
    if (pass.length < 6) {
        Swal.fire({
        background: '#fff',
        customClass: {
            popup: 'swal2-popup-custom'
        },
        icon: 'warning',
        title: 'Oops...',
        text: 'Password minimal 6 karakter!',
        confirmButtonColor: '#f89abf'
    });
        return false;
    }
    return true;
}
</script>
<?php if (!empty($pesan)): ?>
<script>
Swal.fire({
  icon: 'error',
  title: 'Oops!',
  text: '<?= addslashes($pesan) ?>',
  confirmButtonColor: '#f89abf',
  customClass: {
    popup: 'swal2-popup-custom'
  }
});
</script>
<?php endif; ?>

