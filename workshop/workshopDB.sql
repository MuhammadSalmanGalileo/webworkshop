-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 09:11 PM
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
-- Database: `workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `rent_prices`
--

--
-- Dumping data for table `rent_prices`
--

INSERT INTO `rent_prices` (`id`, `inventory_id`, `price_per_3hour`, `price_per_day`, `created_at`, `updated_at`) VALUES
(1, 1, 25000, 100000, '2018-01-17 19:28:18', '2018-01-17 19:28:18'),
(2, 2, 5000, 30000, '2018-01-17 19:28:30', '2018-01-17 19:28:30'),
(3, 3, 0, 10000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(4, 4, 0, 30000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(5, 5, 0, 15000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(6, 6, 0, 15000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(7, 7, 0, 10000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(8, 8, 0, 15000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(9, 9, 0, 30000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(10, 10, 0, 100000, '2018-01-17 19:31:42', '2018-01-18 02:31:42'),
(11, 11, 0, 10000, '2018-01-18 05:25:47', '2018-01-18 05:25:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rent_prices`
--
ALTER TABLE `rent_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rent_prices`
--
ALTER TABLE `rent_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
