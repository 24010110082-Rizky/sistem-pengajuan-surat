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