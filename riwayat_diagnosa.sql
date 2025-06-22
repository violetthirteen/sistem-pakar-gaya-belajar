CREATE TABLE IF NOT EXISTS riwayat_diagnosa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20),
    nama VARCHAR(100),
    tanggal DATE,
    gaya_belajar VARCHAR(50),
    nilai_cf FLOAT
);

INSERT INTO riwayat_diagnosa (nim, nama, tanggal, gaya_belajar, nilai_cf)
VALUES ('12345678', 'Reni Ramadhani Sabila', CURDATE(), 'Visual', 0.85);
