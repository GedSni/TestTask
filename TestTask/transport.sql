-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2017 at 01:07 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `journeys`
--

DROP TABLE IF EXISTS `journeys`;
CREATE TABLE IF NOT EXISTS `journeys` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exit_terminal_time` time NOT NULL,
  `speedometer_stats_before` int(10) UNSIGNED NOT NULL,
  `arrive_client_time` time NOT NULL,
  `unloading_time_minutes` int(10) UNSIGNED NOT NULL,
  `exit_client_time` time NOT NULL,
  `arrive_terminal_time` time NOT NULL,
  `speedometer_stats_after` int(10) UNSIGNED NOT NULL,
  `distance_kms` int(10) UNSIGNED NOT NULL,
  `fuel_litres` decimal(8,2) NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `journeys_vehicle_id_foreign` (`vehicle_id`),
  KEY `journeys_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journeys`
--

INSERT INTO `journeys` (`id`, `date`, `route`, `exit_terminal_time`, `speedometer_stats_before`, `arrive_client_time`, `unloading_time_minutes`, `exit_client_time`, `arrive_terminal_time`, `speedometer_stats_after`, `distance_kms`, `fuel_litres`, `vehicle_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, '2017-11-24', 'Kauno grūdai', '10:00:00', 200200, '10:55:00', 10, '11:20:00', '12:20:00', 200250, 50, '65.92', 1, 2, '2017-11-23 22:33:28', '2017-11-23 22:52:15'),
(8, '2017-11-24', 'Kaunas', '10:00:00', 200200, '10:55:00', 10, '11:20:00', '12:20:00', 200250, 50, '65.92', 1, 2, '2017-11-23 22:46:26', '2017-11-23 22:46:26'),
(9, '2017-11-24', 'Klaipėda', '10:00:00', 200200, '10:55:00', 10, '11:20:00', '12:20:00', 200250, 50, '65.92', 1, 2, '2017-11-23 22:48:38', '2017-11-23 22:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_22_102747_create_journeys_table', 1),
(4, '2017_11_23_082938_create_vehicles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `isAdmin`) VALUES
(2, 'admin', 'admin@email.com', '$2y$10$O7rlj6cOjCQqjBZzshl86e4F9KSYhdm2PF1fPZrmrDLHPeQrV0zN2', '7h1dqTvaZ0kHU4X6gjccDD9gMDuELVB17ygslSI4Siw5PvdnsEDq6ITOdref', '2017-11-23 15:33:02', '2017-11-23 15:33:02', 1),
(4, 'Antanas', 'antanas@email.com', '$2y$10$2Z4NawVlbKcUfy6ylQioEeaS82jxoCabauhj3E83jC5LxnzQrnV7G', 'foHoEImxRCSErahhEeOXXhOZOpriDHYuNLqENZwT9UxzXXBdsmRdaS8QgfXm', '2017-11-23 18:16:14', '2017-11-23 18:16:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `fuel_idle` int(10) UNSIGNED NOT NULL,
  `fuel_road` int(10) UNSIGNED NOT NULL,
  `fuel_load` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `brand`, `model`, `year`, `fuel_idle`, `fuel_road`, `fuel_load`, `created_at`, `updated_at`) VALUES
(1, 'Audi', 'A4', 2000, 5, 32, 20, '2017-11-23 13:26:35', '2017-11-23 13:31:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
