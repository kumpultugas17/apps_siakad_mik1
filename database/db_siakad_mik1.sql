-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 05:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad_mik1`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` int(11) NOT NULL,
  `kode_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `status_jurusan` char(1) NOT NULL COMMENT '0:tidak aktif, 1:aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jur`, `kode_jurusan`, `nama_jurusan`, `status_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'MIK', 'Manajemen Informatika Komputer', '0', '2023-01-02 05:22:47', NULL),
(2, 'ADP', 'Administrasi Perkantoran', '1', '2023-01-02 05:25:07', NULL),
(3, 'ITS', 'IT Support', '1', '2023-01-06 08:44:06', NULL),
(91, 'AKP', 'Akuntansi Komputer Perkantoran', '1', '2023-01-14 03:51:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kls` int(11) NOT NULL,
  `nama_kls` varchar(50) NOT NULL,
  `jumlah_mhs` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kls`, `nama_kls`, `jumlah_mhs`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'MIK1', 15, '-', '2023-01-21 07:14:37', NULL),
(2, 'ADP1', 20, '-', '2023-01-21 07:14:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('l','p') NOT NULL COMMENT 'L:Laki-laki | P:Perempuan',
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `telp_ortu` varchar(15) NOT NULL,
  `tahun_akademik` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama`, `jk`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telp`, `email`, `nama_ayah`, `nama_ibu`, `telp_ortu`, `tahun_akademik`, `status`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, '10040818', 'M. Iqbal Adenan', 'l', 'Islam', 'Kuala Kapuas', '1992-10-17', 'Palangkaraya', '085249099652', 'admin@gmail.com', '-', '-', '-', 2021, '0', 1, '2023-01-14 03:41:53', NULL),
(2, '10040819', 'Karina Amalia Putri', 'p', 'Islam', 'Kotabaru', '1993-01-31', 'Palangkaraya', '085249099652', 'admin@gmail.com', '-', '-', '-', 2020, '1', 2, '2023-01-14 03:41:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks`, `created_at`, `updated_at`) VALUES
(1, 'WB', 'Web Programming', 4, '2023-01-21 07:17:18', NULL),
(2, 'WP', 'Wordprocessing', 2, '2023-01-21 07:16:59', NULL),
(3, 'SS', 'Spreadsheet', 2, '2023-01-21 07:16:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `mhs_id` int(11) NOT NULL,
  `kls_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL COMMENT '20%',
  `nilai_uts` int(11) NOT NULL COMMENT '30%',
  `nilai_uas` int(11) NOT NULL COMMENT '50%',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `mhs_id`, `kls_id`, `matkul_id`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 90, 70, 80, '2023-01-21 07:15:10', NULL),
(2, 1, 1, 3, 60, 80, 70, '2023-01-21 07:17:30', NULL),
(3, 1, 1, 2, 80, 80, 70, '2023-01-21 07:17:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1','2') NOT NULL COMMENT '0:Admin | 1:Isntruktur | 2:Mahasiswa',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'M. Iqbal Adenan', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0', '2023-01-09 04:59:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kls`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `mhs_id` (`mhs_id`,`kls_id`,`matkul_id`),
  ADD KEY `matkul_id` (`matkul_id`),
  ADD KEY `kls_id` (`kls_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kls_id`) REFERENCES `kelas` (`id_kls`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
