<?php
header('Content-Type: application/json');
include '../koneksi.php'; // Perbaikan path relatif

$labels = ["Visual", "Auditory", "Kinestetik"];
$counts = [];

foreach ($labels as $label) {
  $query = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM riwayat_diagnosa WHERE hasil='$label'");
  $row = mysqli_fetch_assoc($query);
  $counts[] = (int)$row['total'];
}

echo json_encode([
  "labels" => $labels,
  "counts" => $counts
]);
?>
