
USE db_gayabelajar;

CREATE TABLE IF NOT EXISTS riwayat_diagnosa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_mahasiswa VARCHAR(100),
  tanggal DATETIME,
  gejala TEXT,
  hasil VARCHAR(100),
  nilai_cf DOUBLE
);
