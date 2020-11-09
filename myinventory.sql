-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2020 at 01:44 PM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_contractors`
--

CREATE TABLE `inventory_contractors` (
  `id` bigint UNSIGNED NOT NULL,
  `fk_stage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_contractors`
--

INSERT INTO `inventory_contractors` (`id`, `fk_stage`, `name`, `created_at`, `updated_at`) VALUES
(6, '1', 'جلیلی', '2020-09-17 13:01:04', '2020-09-17 13:01:04'),
(7, '1', 'یاوری', '2020-09-17 13:01:45', '2020-09-17 13:01:45'),
(8, '2', 'حیدری', '2020-09-17 13:09:24', '2020-09-17 13:09:24'),
(9, '7', 'جلیلی', '2020-09-17 13:10:11', '2020-09-17 13:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_contracts`
--

CREATE TABLE `inventory_contracts` (
  `id` bigint UNSIGNED NOT NULL,
  `contract_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prepayment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_piece` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `circulation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('current','cleared') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'current',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_contracts`
--

INSERT INTO `inventory_contracts` (`id`, `contract_number`, `fk_customer`, `date`, `total_amount`, `prepayment`, `fk_piece`, `circulation`, `fixed_price`, `sales_price`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(28, '1399/06/01-1', '1', '2020-08-21 19:30:00', '250000000', '35000000', '2', '100000', '2850', '5000', 'current', NULL, '2020-09-14 16:02:29', '2020-09-14 16:02:29'),
(29, '1399/06/01-2', '1', '2020-08-21 19:30:00', '250000000', '35000000', '2', '50000', '2850', '5000', 'current', NULL, '2020-09-14 16:05:13', '2020-09-15 06:05:42'),
(31, '1399/06/02-1', '2', '2020-08-22 19:30:00', '6000000000', '35000000', '3', '100000', '2850', '5100', 'current', NULL, '2020-09-16 08:05:39', '2020-09-16 08:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_customers`
--

CREATE TABLE `inventory_customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_customers`
--

INSERT INTO `inventory_customers` (`id`, `name`, `tel`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'شارق توس', '05136050112', '09123456789', '2020-09-14 06:06:27', '2020-09-14 06:06:35'),
(2, 'مروارید سوز', '05136050101', '09123456789', '2020-09-14 06:32:32', '2020-09-14 06:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_pieces`
--

CREATE TABLE `inventory_pieces` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_pieces`
--

INSERT INTO `inventory_pieces` (`id`, `name`, `material`, `weight`, `created_at`, `updated_at`) VALUES
(2, 'سرشیلنگی', 'آلومینیوم', 16, '2020-09-14 06:06:05', '2020-09-14 06:06:13'),
(3, 'زانویی', 'آلومینیوم', 20, '2020-09-14 06:31:37', '2020-09-14 06:31:37'),
(4, 'گل', 'آلومینیوم', 25, '2020-09-14 06:31:55', '2020-09-15 05:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_production_stages`
--

CREATE TABLE `inventory_production_stages` (
  `id` bigint UNSIGNED NOT NULL,
  `fk_contract` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_repository` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_production_stages`
--

INSERT INTO `inventory_production_stages` (`id`, `fk_contract`, `fk_repository`, `created_at`, `updated_at`) VALUES
(1, '28', '1', '2020-09-15 13:52:55', '2020-09-15 13:52:55'),
(2, '28', '2', '2020-09-16 07:06:49', '2020-09-16 07:06:49'),
(3, '28', '5', '2020-09-16 07:07:05', '2020-09-16 07:07:05'),
(4, '28', '8', '2020-09-16 07:07:09', '2020-09-16 07:07:09'),
(7, '29', '1', '2020-09-16 07:41:52', '2020-09-16 07:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_repositories`
--

CREATE TABLE `inventory_repositories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_repositories`
--

INSERT INTO `inventory_repositories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'دایکست', '2020-09-14 13:15:37', '2020-09-14 13:15:37'),
(2, 'جدا سازی اولیه', '2020-09-14 13:18:51', '2020-09-14 13:18:51'),
(5, 'ماشینکاری رولینگ', '2020-09-14 14:46:36', '2020-09-15 06:03:39'),
(8, 'جدا سازی ثانویه', '2020-09-15 13:15:33', '2020-09-15 13:15:33'),
(9, 'بنزین شویی', '2020-09-15 13:15:47', '2020-09-15 13:15:47'),
(10, 'اورینگ', '2020-09-15 13:15:54', '2020-09-15 13:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_13_173318_create_inventory_customers_table', 1),
(5, '2020_09_13_181009_create_inventory_contracts_table', 1),
(6, '2020_09_14_010805_create_inventory_pieces_table', 2),
(7, '2020_09_14_141019_create_inventory_repositories_table', 3),
(9, '2020_09_15_121245_create_inventory_production_stages_table', 4),
(10, '2020_09_16_125050_create_inventory_contractors_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'majid', 'milaad@gmail.com', NULL, '$2y$10$U5IWcSr7SFybndlVULUWg.qAKGndo6z9chWTIK2UzJ4OvgSV2F1kO', NULL, '2020-09-13 20:44:00', '2020-09-13 20:44:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_contractors`
--
ALTER TABLE `inventory_contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_contracts`
--
ALTER TABLE `inventory_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_customers`
--
ALTER TABLE `inventory_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_pieces`
--
ALTER TABLE `inventory_pieces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_production_stages`
--
ALTER TABLE `inventory_production_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_repositories`
--
ALTER TABLE `inventory_repositories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_contractors`
--
ALTER TABLE `inventory_contractors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inventory_contracts`
--
ALTER TABLE `inventory_contracts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inventory_customers`
--
ALTER TABLE `inventory_customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory_pieces`
--
ALTER TABLE `inventory_pieces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory_production_stages`
--
ALTER TABLE `inventory_production_stages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventory_repositories`
--
ALTER TABLE `inventory_repositories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
