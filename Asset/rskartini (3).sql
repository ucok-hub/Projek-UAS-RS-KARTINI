-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 05:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rskartini`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `spesialisasi` varchar(255) NOT NULL,
  `keahlian` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `spesialisasi`, `keahlian`, `foto`) VALUES
(1, 'dr. Amelia Wahyuni, Sp.OG', 'Kandungan', '-', 'dr. Amelia Wahyuni, Sp.OG.jpg'),
(2, 'dr. Natasya Prameswari, Sp.OG', 'Kandungan', '', 'dr. Natasya Prameswari, Sp.OG.png'),
(3, 'dr. Tri Yuniarti, Sp.OG', 'Kandungan', '-', 'dr. Tri Yuniarti, Sp.OG.jpg'),
(4, 'dr. June Elita Rahardiyanti, Sp.PD', 'Penyakit Dalam', '', 'dr. June Elita Rahardiyanti, Sp.PD.webp'),
(5, 'dr. Laila Miftakhul Jannah, Sp.PD', 'Penyakit Dalam', '', 'dr. Laila Miftakhul Jannah, Sp.PD.jpeg'),
(6, 'dr. Daisy Widiastuti , SpA', 'Anak', '', 'dr. Daisy Widiastuti , SpA.jpg'),
(7, 'drg. Anna Purnamaningsih', 'Gigi', '', 'drg. Anna Purnamaningsih.jpeg'),
(8, 'drg. Rustiana Tri Widijanti', 'Gigi', '', 'drg. Rustiana Tri Widijanti.jpg'),
(9, 'dr. Asian Edward Sagala, Sp.B', 'Penyakit Bedah', '', 'dr. Asian Edward Sagala, Sp.B.png'),
(10, 'dr. Andoko Budiwisesa, Sp.B', 'Penyakit Bedah', '', 'dr. Andoko Budiwisesa, Sp.B.png');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id`, `dokter_id`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 1, 'Senin', '12:00:00', '14:00:00'),
(2, 1, 'Rabu', '15:00:00', '17:00:00'),
(4, 1, 'Kamis', '12:00:00', '14:00:00'),
(6, 2, 'Sabtu', '13:00:00', '15:00:00'),
(7, 2, 'Minggu', '13:00:00', '15:00:00'),
(10, 3, 'Selasa', '12:00:00', '14:00:00'),
(11, 3, 'Jumat', '12:00:00', '14:30:00'),
(12, 3, 'Sabtu', '15:00:00', '17:00:00'),
(13, 5, 'Senin', '10:00:00', '15:00:00'),
(14, 5, 'Selasa', '10:00:00', '15:00:00'),
(15, 5, 'Rabu', '10:00:00', '15:00:00'),
(16, 5, 'Kamis', '10:00:00', '15:00:00'),
(17, 5, 'Jumat', '08:00:00', '13:00:00'),
(18, 6, 'Senin', '16:00:00', '21:00:00'),
(19, 6, 'Selasa', '16:00:00', '21:00:00'),
(20, 6, 'Rabu', '16:00:00', '21:00:00'),
(21, 6, 'Kamis', '16:00:00', '21:00:00'),
(22, 6, 'Jumat', '16:00:00', '21:00:00'),
(23, 6, 'Sabtu', '10:00:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `hari_janji` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `status` varchar(20) DEFAULT 'aktif',
  `created_at` datetime DEFAULT current_timestamp(),
  `edited` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `email`, `dokter_id`, `nama_dokter`, `hari_janji`, `jam_mulai`, `jam_selesai`, `status`, `created_at`, `edited`) VALUES
(1, '2307431004', 'Desna Romarta Tambun', 'Perempuan', 'jakarta', '2025-05-28', '08848434232', 'desnaromarta@gmail.com', 1, 'dr. Amelia Wahyuni, Sp.OG', 'Rabu', '13:00:00', '15:00:00', 'selesai', '2025-05-28 21:06:11', 0),
(4, '3177512393018313', 'peter moses', 'Laki-laki', 'jakarta', '2025-05-28', '08848434232', 'peter@gmail.com', 1, 'dr. Amelia Wahyuni, Sp.OG', 'Senin', '12:00:00', '14:00:00', 'aktif', '2025-05-28 21:30:56', 1),
(5, '2307431004', 'Desna Romarta Tambun', 'Perempuan', 'jakarta', '2025-05-28', '0989813', 'desnaromarta@gmail.com', 1, 'dr. Amelia Wahyuni, Sp.OG', 'Kamis', '12:00:00', '14:00:00', 'aktif', '2025-05-28 22:06:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `nik`) VALUES
(3, 'desna romarta tambun', 'desna', 'desnaromarta@gmail.com', '$2y$10$czY7gsAtckVbauJWVlyYOu..JQ/WvDHIi7pqMBwm.AS5zX3sgUYGO', '2307431004'),
(4, 'Administrator', 'admin', 'admin@email.com', '', ''),
(5, 'Peter Moses', 'peter', 'peter@gmail.com', '$2y$10$aJazwZe.FJIrOpPZSPfAd.CV9RgO.93Dxq.Feu5x7wu9T3bM5v.ui', '3177512393018313');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
