-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_dwitadiyahpratiwi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 2 Bandung', '78.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA Kristen 1', '92.15', '250000.00', 'Reguler', 'Ilmu Komputer', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Dedi Wijaya', 'SMAN 3 Semarang', '80.40', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 5 Surabaya', '88.90', '250000.00', 'Reguler', 'Teknik Elektro', 'Kampus Barat', NULL, NULL, NULL, NULL),
(6, 'Fajar Ramadhan', 'MAN 1 Yogyakarta', '83.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 1 Cilacap', '86.75', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 2 Ungaran', '95.00', '150000.00', 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permatasari', 'SMAN 1 Purwokerto', '91.50', '150000.00', 'Prestasi', 'Sistem Informasi', 'Kampus Utama', 'Lomba Karya Ilmiah', 'Provinsi', NULL, NULL),
(10, 'Kevin Sanjaya', 'SMA Atlet Ragunan', '80.00', '150000.00', 'Prestasi', 'Manajemen Olahraga', 'Kampus Barat', 'Bulutangkis Tunggal Putra', 'Internasional', NULL, NULL),
(11, 'Laras Ati', 'SMK 1 Kebumen', '89.00', '150000.00', 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'LKS Web Technologies', 'Nasional', NULL, NULL),
(12, 'Muhammad Rizky', 'SMAN 3 Solo', '93.40', '150000.00', 'Prestasi', 'Ilmu Komputer', 'Kampus Utama', 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(13, 'Nadia Utami', 'SMAN 1 Boyolali', '90.20', '150000.00', 'Prestasi', 'Teknik Sipil', 'Kampus Barat', 'FLS2N Tari Kreasi', 'Provinsi', NULL, NULL),
(14, 'Oki Setiawan', 'SMAN 1 Magelang', '84.50', '300000.00', 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-990/IK/2026', 'Kementerian Kominfo'),
(15, 'Putri Rahayu', 'SMAN 1 Salatiga', '87.20', '300000.00', 'Kedinasan', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, 'SK-112/DINAS/2026', 'B Siber dan Sandi Negara'),
(16, 'Qomaruddin', 'MAN 2 Brebes', '82.00', '300000.00', 'Kedinasan', 'Teknik Elektro', 'Kampus Barat', NULL, NULL, 'SK-404/PERHUB/2026', 'Kementerian Perhubungan'),
(17, 'Rina Marlina', 'SMAN 1 Garut', '89.10', '300000.00', 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-771/PST/2026', 'Badan Pusat Statistik'),
(18, 'Sultan Bahtiar', 'SMAN 4 Medan', '85.00', '300000.00', 'Kedinasan', 'Ilmu Komputer', 'Kampus Utama', NULL, NULL, 'SK-005/PAN/2026', 'Kementerian PAN-RB'),
(19, 'Taufik Hidayat', 'SMAN 2 Padang', '88.30', '300000.00', 'Kedinasan', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, 'SK-312/KMN/2026', 'Kementerian Keuangan'),
(20, 'Vina Panduwinata', 'SMAN 1 Palembang', '86.00', '300000.00', 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-889/BKN/2026', 'Badan Kepegawaian Negara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
