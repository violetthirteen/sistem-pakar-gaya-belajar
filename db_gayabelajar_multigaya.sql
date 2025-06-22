
CREATE DATABASE IF NOT EXISTS db_gayabelajar;
USE db_gayabelajar;

DROP TABLE IF EXISTS gejala, gaya_belajar, basis_pengetahuan;

CREATE TABLE gejala (
  kode_gejala VARCHAR(10) PRIMARY KEY,
  nama_gejala VARCHAR(255)
);

INSERT INTO gejala VALUES
('G01', 'Lebih mudah memahami informasi melalui penjelasan verbal atau diskusi.'),
('G02', 'Lebih mudah memahami informasi melalui gambar, diagram, atau video.'),
('G03', 'Suka membuat catatan dengan gambar atau mindmap.'),
('G04', 'Lebih suka melihat demonstrasi atau contoh visual daripada hanya membaca atau mendengar.'),
('G05', 'Lebih suka belajar dengan melakukan langsung atau praktik.'),
('G06', 'Mudah mengingat informasi yang didengar.'),
('G07', 'Suka mendengarkan rekaman audio atau podcast untuk belajar.'),
('G08', 'Sering menggunakan warna, simbol, atau highlight dalam catatan.'),
('G09', 'Lebih suka melihat grafik, tabel, atau infografis untuk memahami konsep.'),
('G10', 'Suka berdiskusi dalam kelompok atau belajar melalui percakapan.'),
('G11', 'Sering mengulang informasi dengan cara membacakan keras-keras.'),
('G12', 'Suka belajar sambil bergerak, misalnya berjalan sambil membaca.'),
('G13', 'Sering menggunakan gerakan tangan atau tubuh saat menjelaskan sesuatu.'),
('G14', 'Lebih fokus saat mendengarkan penjelasan langsung dari dosen/guru.'),
('G15', 'Menyukai video pembelajaran interaktif.'),
('G16', 'Belajar lebih baik saat menulis catatan sendiri.'),
('G17', 'Menyukai praktik di laboratorium atau simulasi.'),
('G18', 'Mengingat pelajaran lebih baik dengan mendengar musik atau irama.'),
('G19', 'Membuat diagram sendiri untuk mengingat pelajaran.'),
('G20', 'Belajar efektif melalui bermain peran atau drama.');

CREATE TABLE gaya_belajar (
  kode_gaya VARCHAR(10) PRIMARY KEY,
  nama_gaya VARCHAR(100),
  deskripsi TEXT,
  rekomendasi TEXT
);

INSERT INTO gaya_belajar VALUES
('P01', 'Visual', 'Belajar lewat gambar, warna, diagram.', 'Gunakan mind map, skema warna, video pembelajaran.'),
('P02', 'Auditori', 'Belajar lewat mendengar dan berbicara.', 'Dengarkan audio, diskusi, rekaman kuliah.'),
('P03', 'Kinestetik', 'Belajar dengan bergerak dan praktik.', 'Gunakan alat bantu fisik, praktik langsung.');

CREATE TABLE basis_pengetahuan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode_gaya VARCHAR(10),
  kode_gejala VARCHAR(10),
  nilai_cf DOUBLE,
  FOREIGN KEY (kode_gaya) REFERENCES gaya_belajar(kode_gaya),
  FOREIGN KEY (kode_gejala) REFERENCES gejala(kode_gejala)
);

INSERT INTO basis_pengetahuan (kode_gaya, kode_gejala, nilai_cf) VALUES
('P01','G02',0.8),('P01','G03',0.7),('P01','G04',0.8),('P01','G08',0.7),('P01','G09',0.8),
('P01','G15',0.9),('P01','G19',0.7),
('P02','G01',0.8),('P02','G06',0.8),('P02','G07',0.7),('P02','G10',0.8),('P02','G11',0.7),
('P02','G14',0.9),('P02','G18',0.7),
('P03','G04',0.6),('P03','G05',0.9),('P03','G12',0.8),('P03','G13',0.7),('P03','G17',0.9),
('P03','G20',0.8),('P03','G01',0.6),('P03','G10',0.5),
('P01','G10',0.5),('P02','G09',0.6),('P01','G01',0.4),('P02','G04',0.4),('P03','G03',0.5),
('P03','G06',0.5);
