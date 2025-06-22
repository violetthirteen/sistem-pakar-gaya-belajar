<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$isi = $_POST['isi'];

mysqli_query($conn, "INSERT INTO komentar (nama, isi) VALUES ('$nama', '$isi')");
?>
