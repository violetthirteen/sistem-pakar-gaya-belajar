<?php
session_start();
include '../koneksi.php';

$nim = $_POST['nim'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_assoc($query);

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['id_mahasiswa'] = $data['id'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['nim'] = $data['nim'];
    header("Location: mahasiswa_dashboard.php");
    exit;
} else {
    // Kirim balik ke halaman login dengan parameter nim
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Gagal</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'NIM atau Password salah!',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'mahasiswa_login.php?nim=<?= urlencode($nim) ?>';
                }
            });
        </script>
    </body>
    </html>
    <?php
    exit;
}
?>
