<?php
include '../koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM komentar ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='comment-item'>";
    echo "<strong>" . htmlspecialchars($row['nama']) . "</strong><br>";
    echo nl2br(htmlspecialchars($row['isi'])) . "<br>";
    echo "<button class='like-btn' onclick='likeKomentar(" . $row['id'] . ", this)'>❤️ Like <span>" . $row['suka'] . "</span></button>";
    echo "</div>";
}
?>
