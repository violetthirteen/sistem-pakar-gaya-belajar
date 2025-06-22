-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2025 at 01:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gayabelajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `id` int NOT NULL,
  `kode_gaya` varchar(10) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `nilai_cf` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`id`, `kode_gaya`, `kode_gejala`, `nilai_cf`) VALUES
(1, 'P01', 'G02', 0.8),
(2, 'P01', 'G03', 0.7),
(3, 'P01', 'G04', 0.8),
(4, 'P01', 'G08', 0.7),
(5, 'P01', 'G09', 0.8),
(6, 'P01', 'G15', 0.9),
(7, 'P01', 'G19', 0.7),
(8, 'P02', 'G01', 0.8),
(9, 'P02', 'G06', 0.8),
(10, 'P02', 'G07', 0.7),
(11, 'P02', 'G10', 0.8),
(12, 'P02', 'G11', 0.7),
(13, 'P02', 'G14', 0.9),
(14, 'P02', 'G18', 0.7),
(15, 'P03', 'G04', 0.6),
(16, 'P03', 'G05', 0.9),
(17, 'P03', 'G12', 0.8),
(18, 'P03', 'G13', 0.7),
(19, 'P03', 'G17', 0.9),
(20, 'P03', 'G20', 0.8),
(21, 'P03', 'G01', 0.6),
(22, 'P03', 'G10', 0.5),
(23, 'P01', 'G10', 0.5),
(24, 'P02', 'G09', 0.6),
(25, 'P01', 'G01', 0.4),
(26, 'P02', 'G04', 0.4),
(27, 'P03', 'G03', 0.5),
(28, 'P03', 'G06', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `gaya_belajar`
--

CREATE TABLE `gaya_belajar` (
  `kode_gaya` varchar(10) NOT NULL,
  `nama_gaya` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `rekomendasi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gaya_belajar`
--

INSERT INTO `gaya_belajar` (`kode_gaya`, `nama_gaya`, `deskripsi`, `rekomendasi`) VALUES
('P01', 'Visual', 'Belajar lewat gambar, warna, diagram.', 'Gunakan mind map, skema warna, video pembelajaran.'),
('P02', 'Auditori', 'Belajar lewat mendengar dan berbicara.', 'Dengarkan audio, diskusi, rekaman kuliah.'),
('P03', 'Kinestetik', 'Belajar dengan bergerak dan praktik.', 'Gunakan alat bantu fisik, praktik langsung.');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `isi` text,
  `jumlah_like` int DEFAULT '0',
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `suka` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `isi`, `jumlah_like`, `tanggal`, `suka`) VALUES
(1, 'bobob', 'i love you Reni Ramadhani Sabila\r\n', 0, '2025-06-21 11:50:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `password`) VALUES
(1, 'Reni Ramadhani Sabila ', '23040005', '$2y$10$6Xm4EL226SMfKcFCH/CTN.9FUPmqfIrqwfcQAitsljpU5ZbUTSIy.'),
(2, 'Ahmad Syahril Ramadhan', '21041010', '$2y$10$0QJINfwabwV/fVC.NX27SuixSeS2fb/EQqnnQc4hFG5lhzSRFCKDC'),
(3, 'Reni Ramadhani Sabila ', '230400051', '$2y$10$rZlkD.qnrSD4GRrlVrMnn.Sn4YD5JeyW2sZjL8S/2rJLSrAjZ2PtK'),
(4, 'Reni Ramadhani Sabila ', '2304000512', '$2y$10$mc3PObmKSvC3TTjErBSPQOFKcsIVxG45olGYYyqfWggDDc624du6C'),
(5, 'Reni Ramadhani Sabila ', '23040005123', '$2y$10$6KK2qWMecm0lTxZ03LDeNeeOKNvtbIBqlTJe/EQjzde3ZwGWRAceS'),
(6, 'Reni Ramadhani Sabila ', '2304000512345', '$2y$10$I0B.0vzTvk.ORGvbf18qrOmy74rP//ejbD.GYSra5q7RY/dr42k6y'),
(7, 'Reni Ramadhani Sabila ', '2304000577', '$2y$10$D9mwYj8P5y1w3WVTkdPWYOxfxEajVYggpYJORRFg7phFAap77z5Le'),
(8, 'Ahmad Syahril Ramadhan', '23040005778', '$2y$10$P2z8raNZURW8Fobe925k1.pGwFEsvS3qJAX/MMGufaZYoA52WC8q2'),
(9, 'Reni Ramadhani Sabila ', '2304005', '$2y$10$16zClFA07AA0WPbJL5oBX.49smS7I5XBJltM4X1LVR1ImllwpK5OS'),
(10, 'Reni Ramadhani Sabila ', '2304000589', '$2y$10$6hDp7mwcoStjo5b20cFgJeAFq0IBWYPISEa4vI1UQGwGL7w1htvy6'),
(11, 'Reni Ramadhani Sabila ', '23040005111', '$2y$10$5P/L9ggTztZU/ElDMIiVkeHw4lSPlWft9yjaH2N34v8d6GZSa7urK'),
(12, 'Ahmad Syahril Ramadhan', '210410101', '$2y$10$NBRxooTbXFqBipFaHASacOyaJsoJtRxgYUjWiwYhTxnSz4TL.GJP.'),
(13, 'syahril', '2104101090', '$2y$10$QNq9HZsMrNqv1Bdryx9Zc.wCBGj5Na7wZ54jmw97PvVNgRa8SSa2a');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_diagnosa`
--

CREATE TABLE `riwayat_diagnosa` (
  `id` int NOT NULL,
  `nim` varchar(20) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `gaya_belajar` varchar(50) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `riwayat_diagnosa`
--

INSERT INTO `riwayat_diagnosa` (`id`, `nim`, `tanggal`, `gaya_belajar`, `keterangan`) VALUES
(1, '210410101', '2025-06-22 00:00:00', 'Kinestetik', 'Gunakan alat bantu fisik, praktik langsung.'),
(2, '210410101', '2025-06-22 00:00:00', 'Kinestetik', 'Gunakan alat bantu fisik, praktik langsung.'),
(3, '210410101', '2025-06-22 00:00:00', 'Kinestetik', 'Gunakan alat bantu fisik, praktik langsung.'),
(4, '210410101', '2025-06-22 13:19:09', 'Kinestetik', 'Gunakan alat bantu fisik, praktik langsung.'),
(5, '23040005', '2025-06-22 18:15:32', 'Kinestetik', 'Gunakan alat bantu fisik, praktik langsung.'),
(6, '2104101090', '2025-06-22 18:26:35', 'Kinestetik', 'Gunakan alat bantu fisik, praktik langsung.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_gaya` (`kode_gaya`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `gaya_belajar`
--
ALTER TABLE `gaya_belajar`
  ADD PRIMARY KEY (`kode_gaya`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD CONSTRAINT `basis_pengetahuan_ibfk_1` FOREIGN KEY (`kode_gaya`) REFERENCES `gaya_belajar` (`kode_gaya`),
  ADD CONSTRAINT `basis_pengetahuan_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`);

--
-- Constraints for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  ADD CONSTRAINT `riwayat_diagnosa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
