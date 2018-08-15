-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 11:25 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_inventory`
--

CREATE TABLE `category_inventory` (
  `category_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nim` int(11) NOT NULL,
  `lembaga` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `berhasil` int(11) NOT NULL,
  `gagal` int(11) NOT NULL,
  `status` enum('clear','banned') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_tlp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `penalty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nim`, `name`, `email`, `no_tlp`, `penalty`, `created_at`, `updated_at`) VALUES
(1, 13214138, 'Naufalino Fadel Hutomo', 'naufalinofadel@gmail.com', '081297841393', 0, '2018-01-18 03:29:40', '2018-01-18 03:29:40'),
(2, 0, '', '', '', 0, '2018-01-19 23:57:41', '2018-01-19 23:57:41'),
(3, 13214132, 'nyoman Abiwinanda', 'abiwinanda@outlook.com', '08129319238', 0, '2018-01-21 10:45:08', '2018-01-21 10:45:08'),
(4, 131414, 'Abi', 'naufalinofadel@gmail.com', '081297841393', 0, '2018-01-23 22:01:12', '2018-01-23 22:01:12'),
(5, 132114123, 'Nama', 'abiwinanda@outlook.com', '0812391842t', 0, '2018-01-24 02:42:40', '2018-01-24 02:42:40'),
(6, 13214000, 'asdf', 'aaa@gmail.com', '089652111111', 0, '2018-01-26 01:42:57', '2018-01-26 01:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `customer_organization`
--

CREATE TABLE `customer_organization` (
  `customer_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_organization`
--

INSERT INTO `customer_organization` (`customer_id`, `organization_id`) VALUES
(3, 1),
(4, 2),
(5, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `inventory_id`, `log_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2018-01-18 12:56:32', '2018-01-18 12:56:32'),
(2, 2, 1, 1, '2018-01-18 12:56:16', '2018-01-18 12:56:16'),
(3, 5, 2, 2, NULL, NULL),
(4, 9, 3, 1, NULL, NULL),
(5, 4, 4, 1, NULL, NULL),
(6, 5, 5, 2, NULL, NULL),
(7, 9, 6, 1, NULL, NULL),
(8, 11, 6, 1, NULL, NULL),
(9, 5, 7, 1, NULL, NULL),
(10, 1, 8, 1, '2018-01-21 10:45:08', '2018-01-21 10:45:08'),
(11, 2, 8, 1, '2018-01-21 10:45:08', '2018-01-21 10:45:08'),
(12, 3, 10, 2, '2018-01-24 02:42:41', '2018-01-24 02:42:41'),
(13, 9, 10, 1, '2018-01-24 02:42:41', '2018-01-24 02:42:41'),
(14, 11, 10, 1, '2018-01-24 02:42:41', '2018-01-24 02:42:41'),
(15, 10, 11, 1, '2018-01-26 01:42:58', '2018-01-26 01:42:58');

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

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pickup_time` datetime NOT NULL,
  `prom_return_time` datetime NOT NULL,
  `actual_return_time` datetime NOT NULL,
  `status` enum('tagged','picked','returned') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `customer_id`, `pickup_time`, `prom_return_time`, `actual_return_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-01-20 09:00:00', '2018-01-21 10:00:00', '0000-00-00 00:00:00', 'tagged', '2018-01-18 03:34:54', '2018-01-18 03:34:54'),
(2, 1, '2018-01-21 12:00:00', '2018-01-22 00:00:00', '0000-00-00 00:00:00', 'tagged', '2018-01-18 13:00:48', '2018-01-18 13:00:48'),
(3, 1, '2018-01-19 09:00:00', '2018-01-20 07:00:00', '0000-00-00 00:00:00', 'tagged', '2018-01-18 13:02:13', '2018-01-18 13:02:13'),
(4, 1, '2018-01-19 20:00:00', '2018-01-20 13:00:00', '0000-00-00 00:00:00', 'tagged', '2018-01-18 13:02:13', '2018-01-18 13:02:13'),
(5, 1, '2018-01-20 20:00:00', '2018-01-23 00:00:00', '0000-00-00 00:00:00', 'tagged', '2018-01-18 13:03:32', '2018-01-18 13:03:32'),
(6, 1, '2018-01-19 15:00:00', '2018-01-21 13:00:00', '0000-00-00 00:00:00', 'tagged', '2018-01-18 13:03:32', '2018-01-18 13:03:32'),
(7, 1, '2018-01-20 15:00:00', '2018-01-20 19:00:00', '0000-00-00 00:00:00', '', NULL, NULL),
(8, 3, '2018-01-24 12:59:00', '2018-01-25 12:59:00', '0000-00-00 00:00:00', 'tagged', '2018-01-21 10:45:08', '2018-01-21 10:45:08'),
(9, 4, '2018-01-31 01:01:00', '2018-01-31 01:02:00', '0000-00-00 00:00:00', 'tagged', '2018-01-23 22:01:12', '2018-01-23 22:01:12'),
(10, 5, '2018-01-25 00:00:00', '2018-01-28 01:01:00', '0000-00-00 00:00:00', 'tagged', '2018-01-24 02:42:41', '2018-01-24 02:42:41'),
(11, 6, '2018-01-30 06:12:00', '2018-01-31 02:13:00', '0000-00-00 00:00:00', 'tagged', '2018-01-26 01:42:57', '2018-01-26 01:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `log_services`
--

CREATE TABLE `log_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `log_id` int(11) NOT NULL,
  `pickup_nim` int(11) NOT NULL,
  `return_nim` int(11) NOT NULL,
  `revenue` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_12_01_073351_create_posts_table', 1),
('2017_12_13_221045_create_logs_table', 1),
('2017_12_13_233220_create_clients_table', 1),
('2017_12_22_105652_create_inventories_table', 1),
('2017_12_22_105745_create_rent_prices_table', 1),
('2017_12_22_105816_create_customers_table', 1),
('2017_12_22_110158_create_organizations_table', 1),
('2017_12_22_110638_create_log_services_table', 1),
('2018_01_05_142648_create_goods_table', 1),
('2018_01_05_142830_create_categories_table', 1),
('2018_01_05_143312_create_category_inventory_table', 1),
('2018_01_05_143635_create_customer_organization_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'uro', '2018-01-21 10:45:08', '2018-01-21 10:45:08'),
(2, 'hme', '2018-01-23 22:01:12', '2018-01-23 22:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_prices`
--

CREATE TABLE `rent_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `price_per_3hour` int(11) NOT NULL,
  `price_per_day` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_services`
--
ALTER TABLE `log_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_prices`
--
ALTER TABLE `rent_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log_services`
--
ALTER TABLE `log_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_prices`
--
ALTER TABLE `rent_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
