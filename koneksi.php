<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_gayabelajar");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
