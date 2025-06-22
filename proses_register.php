<?php
// proses_register.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Cek apakah NIM sudah digunakan
$cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
if (mysqli_num_rows($cek) > 0) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    Swal.fire({
        title: 'Gagal!',
        text: 'NIM sudah terdaftar!',
        icon: 'error',
        confirmButtonColor: '#f89abf',
        confirmButtonText: 'Kembali'
    }).then(() => {
        window.location='mahasiswa_register.php';
    });
    </script>";
    exit;
}

// Simpan data
$simpan = mysqli_query($koneksi, "INSERT INTO mahasiswa (nama, nim, password) VALUES ('$nama', '$nim', '$password')");

if ($simpan) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Pendaftaran berhasil! Silakan login.',
        icon: 'success',
        confirmButtonColor: '#f89abf',
        confirmButtonText: 'Siap Login'
    }).then(() => {
        window.location='mahasiswa_login.php';
    });
    </script>";
} else {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
    Swal.fire({
        title: 'Oops!',
        text: 'Gagal daftar. Coba lagi!',
        icon: 'error',
        confirmButtonColor: '#f89abf',
        confirmButtonText: 'Ulangi'
    }).then(() => {
        window.location='mahasiswa_register.php';
    });
    </script>";
}
?>
