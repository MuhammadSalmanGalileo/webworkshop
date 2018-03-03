-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 11:19 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ws`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity_ready` int(11) NOT NULL,
  `quantity_broken` int(11) NOT NULL,
  `meta` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `name`, `quantity_ready`, `quantity_broken`, `meta`, `created_at`, `updated_at`) VALUES
(1, 'Proyektor', 2, 1, 'Proyektor terbaik yang cocok untuk keperluan acaramu baik indoor maupun outdoor\r\n                    <br><h5>Spesifikasi</h5>\r\n                    <ul>\r\n                    <li>Merk : Viewsonic, Sony</li>\r\n                    <li>Intensitas : 2200, 4000 lumens</li>\r\n                  </ul>', '2018-01-16 23:26:53', '2018-01-16 23:26:53'),
(2, 'Layar Proyektor', 2, 2, 'Layar proyektor berdiri disertai tripod\r\n                    <br><h5>Spesifikasi</h5>\r\n                    <ul>\r\n                    <li>Dimensi : 70 inch</li>\r\n                  </ul>', '2018-01-16 23:27:03', '2018-01-16 23:27:03'),
(3, 'Microphone Kabel', 5, 1, 'Microphone dengan harga terjangkau untuk keperluan acara, kelas, atau musik', '2018-01-16 23:28:12', '2018-01-16 23:28:12'),
(4, 'Microphone Wireless', 1, 0, 'Microphone wireless satu set terdiri dari 2 mic. Cocok untuk keperluan acara di ruangang besar.', '2018-01-16 23:28:12', '2018-01-16 23:28:12'),
(5, 'Halogen', 6, 0, 'Lampu sorot halogen yang sangat terang. Cocok dipakai untuk berbagai kegiatan malam hari\r\n    <br><h5>Spesifikasi</h5>\r\n    <ul>\r\n        <li>Daya : 500 W</li>\r\n        <li>Cahaya : Kuning</li>\r\n    </ul>', '2018-01-16 23:28:54', '2018-01-16 23:28:54'),
(6, 'Halogen LED', 0, 2, 'Lampu sorot LED yang sangat terang. Cocok dipakai untuk berbagai kegiatan malam hari\r\n    <br><h5>Spesifikasi</h5>\r\n    <ul>\r\n        <li>Daya : 50 W</li>\r\n        <li>Cahaya : Putih</li>\r\n    </ul>\r\n', '2018-01-16 23:28:54', '2018-01-16 23:28:54'),
(7, 'Terminal Kabel', 2, 0, 'Terminal untuk keperluan kelistrikan. Panjang kabel antara 7-10m.', '2018-01-16 23:30:45', '2018-01-16 23:30:45'),
(8, 'Terminal Kabel Panjang', 1, 0, 'Terminal untuk keperluan kelistrikan. Panjang kabel 15 m.', '2018-01-16 23:30:45', '2018-01-16 23:30:45'),
(9, 'Speaker Indoor', 2, 0, 'Speaker sebagai pengeras suara untuk acara dalam ruangan', '2018-01-16 23:31:39', '2018-01-16 23:31:39'),
(10, 'Speaker Outdoor', 1, 0, 'Speaker sebagai pengeras suara untuk luar ruangan. Sangat baik untuk keperluan musik outdoor.', '2018-01-16 23:31:39', '2018-01-16 23:31:39'),
(11, 'Mixer', 1, 0, 'Mixer sebagai alat penghubung banyak masukan suara seperti mic atau sumber suara lain ke speaker.', '2018-01-18 05:11:22', '2018-01-18 05:11:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
