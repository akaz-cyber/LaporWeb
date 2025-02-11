-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `role_id`, `username`, `email`, `password`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `post_lapor`
--

CREATE TABLE `post_lapor` (
  `id_laporan` int(11) NOT NULL,
  `judul_laporan` varchar(100) NOT NULL,
  `isi_laporan` text NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `jenis_laporan` varchar(50) DEFAULT NULL,
  `lokasi_kejadian` varchar(100) DEFAULT NULL,
  `instansi_tujuan` varchar(100) DEFAULT NULL,
  `kategori_laporan` varchar(50) DEFAULT NULL,
  `status` enum('Pending','Disetujui','Ditolak','Selesai') DEFAULT 'Pending',
  `alasan_ditolak` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `dibuat_kapan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_lapor`
--

INSERT INTO `post_lapor` (`id_laporan`, `judul_laporan`, `isi_laporan`, `tanggal_kejadian`, `jenis_laporan`, `lokasi_kejadian`, `instansi_tujuan`, `kategori_laporan`, `status`, `alasan_ditolak`, `id_user`, `admin_id`, `dibuat_kapan`) VALUES
(43, 'Enim aut quae ut pos', 'Voluptatum tempore ', '1994-05-12', 'Pengaduan', 'Ad nesciunt ut in e', 'Anim earum repudiand', 'Consequat Perferend', 'Ditolak', 'tidak masuk di akal', 2, NULL, '2025-01-25 17:56:18'),
(45, 'Id quod ut voluptate', 'Ad nostrud rerum sed', '2022-05-05', 'Pengaduan', 'Quia similique sequi', 'Ut aut quia eligendi', 'Ut laudantium disti', 'Ditolak', 'Tidak bisa di terima', 2, NULL, '2025-02-11 16:51:13'),
(46, 'Jalan rusah di cikedul', 'jalan rusak bolong-bolong di kabupaten kami', '2024-01-18', 'Aspirasi', 'kabupaten bandung tenggara barat desa cikedus jln berem', 'pemerintah kabupaten bandung', 'aduan masyarakat', 'Selesai', NULL, 2, NULL, '2025-02-11 16:57:52'),
(47, 'aspirasi pemerintah galon itu nyata', 'galon le mineral itu nyata coy', '2025-02-11', 'Aspirasi', 'Recusandae Dolor et', 'pemerintah kabupaten bandung', 'aspirasi ', 'Ditolak', 'aneh bwang ', 32, NULL, '2025-02-11 17:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tempat_tinggal` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `penyandang_disabilitas` enum('ya','tidak') DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dibuat_kapan` datetime DEFAULT current_timestamp(),
  `alamat` text DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `nik`, `nama_lengkap`, `tempat_tinggal`, `no_telp`, `penyandang_disabilitas`, `jenis_kelamin`, `pekerjaan`, `tanggal_lahir`, `password`, `dibuat_kapan`, `alamat`, `role_id`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567890123456', 'Sayaadmin', 'Jakarta', '081234567890', 'tidak', 'Laki-laki', 'Administrator', '1985-05-01', '0192023a7bbd73250516f069df18b500', '2025-01-14 09:59:59', 'Jl. Sudirman No.1', 1),
(2, 'user', 'user@gmail.com', '6543210987654321', 'ajri muhammad sidiq', 'bandung', '089876543210', 'ya', 'Perempuan', 'Mahasiswa', '2000-12-12', '6ad14ba9986e3615423dfca256d04e3f', '2025-01-14 09:59:59', 'Jl. Hergamanah', 2),
(32, 'oki', 'oki@gmail.com', '1234567890123456', 'oki septian', 'cembuil', '0895347086501', 'tidak', 'Laki-laki', 'mahasigma', '2009-01-11', '$2y$10$gf9qYmSJwGZKZjrSvIndhu4nhajYbNDUzCq1nuJVRuKRhCNdefk4y', '2025-02-11 17:26:21', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `post_lapor`
--
ALTER TABLE `post_lapor`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_lapor`
--
ALTER TABLE `post_lapor`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `post_lapor`
--
ALTER TABLE `post_lapor`
  ADD CONSTRAINT `post_lapor_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `post_lapor_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
