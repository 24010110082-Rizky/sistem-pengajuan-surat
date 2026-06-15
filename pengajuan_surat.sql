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