<?php
include "koneksi.php";

// Pastikan kolomnya benar, misalnya: gaya_belajar
$query = mysqli_query($koneksi, "SELECT gaya_belajar AS label, COUNT(*) as jumlah FROM riwayat_diagnosa GROUP BY gaya_belajar");

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
  $data[] = [
    'label' => $row['label'],
    'jumlah' => (int)$row['jumlah']
  ];
}

header('Content-Type: application/json');
echo json_encode($data);
?>
