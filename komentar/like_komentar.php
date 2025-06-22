<?php
include '../koneksi.php';

$id = $_POST['id'];
mysqli_query($conn, "UPDATE komentar SET suka = suka + 1 WHERE id = '$id'");
?>
