-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bread.breads
CREATE TABLE IF NOT EXISTS `breads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bread_info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturing_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `quantity` double(8,2) NOT NULL DEFAULT '1.00',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_generated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.breads: ~4 rows (approximately)
INSERT INTO `breads` (`id`, `bread_info`, `manufacturing_date`, `expiration_date`, `quantity`, `remarks`, `qr_generated`, `price`, `created_at`, `updated_at`) VALUES
	(2, 'Test', '2023-05-03', '2023-05-03', 500.00, NULL, 'KHu9hr9LD6c9a6iJ1683175475', 0, '2023-05-03 20:44:36', '2023-05-04 02:10:39'),
	(3, 'Test', '2023-05-11', '2023-05-26', 5000.00, NULL, 'oLS4MVqt518skYIc1683175477', 0, '2023-05-03 20:44:37', '2023-05-04 02:13:26'),
	(4, 'Test', '2023-05-25', '2023-05-09', 10.00, NULL, 'vuKxXBCgUll30KWd1683175480', 0, '2023-05-03 20:44:40', '2023-05-04 02:11:00'),
	(6, 'Testing 1', NULL, NULL, 100.00, NULL, '7WgMTHFOEl6LCf1t1683447504', 0, '2023-05-07 00:18:24', '2023-05-07 00:18:24');

-- Dumping structure for table bread.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table bread.inventories
CREATE TABLE IF NOT EXISTS `inventories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `breads_id` decimal(8,2) unsigned NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.inventories: ~0 rows (approximately)

-- Dumping structure for table bread.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_04_12_012859_create_breads_table', 1),
	(6, '2023_04_12_014157_create_inventories_table', 1),
	(7, '2023_04_12_014238_create_scan_logs_table', 1),
	(8, '2023_04_19_061718_create_settings_table', 2);

-- Dumping structure for table bread.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.password_resets: ~0 rows (approximately)

-- Dumping structure for table bread.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table bread.scan_logs
CREATE TABLE IF NOT EXISTS `scan_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `breads_id` bigint NOT NULL,
  `quantity` double(8,2) NOT NULL DEFAULT '1.00',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.scan_logs: ~12 rows (approximately)
INSERT INTO `scan_logs` (`id`, `breads_id`, `quantity`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 1.00, 'in', NULL, '2023-05-04 01:23:28', '2023-05-04 01:23:28'),
	(2, 2, 1.00, 'in', 'Completed', '2023-05-04 01:24:53', '2023-05-04 02:11:18'),
	(3, 2, 1.00, 'in', 'Completed', '2023-05-04 01:48:38', '2023-05-04 02:11:15'),
	(4, 2, 1.00, 'in', 'Completed', '2023-05-04 01:48:56', '2023-05-04 02:11:10'),
	(5, 2, 1.00, 'in', 'Completed', '2023-05-04 01:51:49', '2023-05-04 02:11:05'),
	(6, 4, 1.00, 'in', 'Completed', '2023-05-04 02:05:39', '2023-05-04 02:11:00'),
	(7, 2, 1.00, 'in', 'Completed', '2023-05-04 02:05:58', '2023-05-04 02:10:49'),
	(8, 2, 1.00, 'in', 'Completed', '2023-05-04 02:06:11', '2023-05-04 02:10:39'),
	(9, 3, 1.00, 'in', 'Completed', '2023-05-04 02:06:17', '2023-05-04 02:10:16'),
	(10, 3, 1.00, 'in', 'Completed', '2023-05-04 02:12:25', '2023-05-04 02:13:11'),
	(11, 3, 1.00, 'in', 'Completed', '2023-05-04 02:13:16', '2023-05-04 02:13:19'),
	(12, 3, 1.00, 'in', 'Completed', '2023-05-04 02:13:23', '2023-05-04 02:13:26'),
	(13, 3, 1.00, 'in', 'Completed', '2023-05-04 02:13:30', '2023-05-07 00:17:36');

-- Dumping structure for table bread.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `password_set` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'administrator',
  `scanner_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `scanner_status_out` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.settings: ~1 rows (approximately)
INSERT INTO `settings` (`id`, `password_set`, `scanner_status`, `created_at`, `updated_at`, `scanner_status_out`) VALUES
	(1, 'administrator', 'off', '2023-04-19 06:22:27', '2023-04-19 06:22:28', 'off');

-- Dumping structure for table bread.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bread.users: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
