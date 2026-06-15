-- ============================================
-- DATABASE: sistem_pengajuan_surat
-- Sistem Pengajuan Surat Mahasiswa
-- Universitas Bumigora 2026
-- ============================================

CREATE DATABASE IF NOT EXISTS `sistem_pengajuan_surat`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `sistem_pengajuan_surat`;

CREATE TABLE `roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'mahasiswa');

CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role_id` INT(11) NOT NULL,
  `name` VARCHAR(150) NOT NULL,
  `nim` VARCHAR(20) DEFAULT NULL,
  `email` VARCHAR(150) DEFAULT NULL,
  `status` ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`username`, `password`, `role_id`, `name`, `nim`, `email`, `status`) VALUES
('admin', MD5('admin123'), 1, 'Administrator', NULL, 'admin@ubg.ac.id', 'aktif'),
('rizky', MD5('mahasiswa123'), 2, 'Rizky Ramadhan', '24010110082', 'rizky@student.ubg.ac.id', 'aktif'),
('dewa', MD5('mahasiswa123'), 2, 'I Dewa Gde Dannyswara', '24010110069', 'dewa@student.ubg.ac.id', 'aktif'),
('ikbal', MD5('mahasiswa123'), 2, 'Muhammad Ikbal', '24010110074', 'ikbal@student.ubg.ac.id', 'aktif');

CREATE TABLE `jenis_surat` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_surat` VARCHAR(150) NOT NULL,
  `deskripsi` TEXT DEFAULT NULL,
  `status` ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jenis_surat` (`nama_surat`, `deskripsi`, `status`) VALUES
('Surat Keterangan Aktif Kuliah', 'Surat yang menerangkan bahwa mahasiswa masih aktif kuliah di Universitas Bumigora', 'aktif'),
('Surat Keterangan Mahasiswa', 'Surat keterangan umum sebagai mahasiswa Universitas Bumigora', 'aktif'),
('Surat Rekomendasi', 'Surat rekomendasi dari kampus untuk keperluan beasiswa atau magang', 'aktif'),
('Surat Izin Penelitian', 'Surat izin untuk melakukan penelitian di instansi tertentu', 'aktif'),
('Surat Keterangan Lulus', 'Surat keterangan telah menyelesaikan studi di Universitas Bumigora', 'aktif');