-- Adminer 4.8.1 MySQL 5.5.5-10.8.3-MariaDB-1:10.8.3+maria~jammy dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `space_id` bigint(20) unsigned DEFAULT NULL,
  `make` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT 1,
  `isBeingMoved` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `sale_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `spaces`;
CREATE TABLE `spaces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` bigint(20) unsigned DEFAULT NULL,
  `space_no` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `lot_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `spaces` (`id`, `car_id`, `space_no`, `status`, `lot_id`) VALUES
(1,	NULL,	1,	0,	'A'),
(2,	NULL,	2,	0,	'A'),
(3,	NULL,	3,	0,	'A'),
(4,	NULL,	4,	0,	'A'),
(5,	NULL,	5,	0,	'A'),
(6,	NULL,	6,	0,	'A'),
(7,	NULL,	7,	0,	'A'),
(8,	NULL,	8,	0,	'A'),
(9,	NULL,	9,	0,	'A'),
(10,	NULL,	10,	0,	'A'),
(11,	NULL,	1,	0,	'B'),
(12,	NULL,	2,	0,	'B'),
(13,	NULL,	3,	0,	'B'),
(14,	NULL,	4,	0,	'B'),
(15,	NULL,	5,	0,	'B'),
(16,	NULL,	6,	0,	'B'),
(17,	NULL,	7,	0,	'B'),
(18,	NULL,	8,	0,	'B'),
(19,	NULL,	9,	0,	'B'),
(20,	NULL,	10,	0,	'B'),
(21,	1,	11,	1,	'A'),
(22,	2,	12,	1,	'A'),
(23,	3,	13,	1,	'A'),
(24,	4,	14,	1,	'A'),
(25,	5,	15,	1,	'A'),
(26,	6,	16,	1,	'A'),
(27,	7,	17,	1,	'A'),
(28,	8,	18,	1,	'A'),
(29,	9,	19,	1,	'A'),
(30,	10,	20,	1,	'A'),
(31,	11,	21,	1,	'A'),
(32,	12,	22,	1,	'A'),
(33,	13,	23,	1,	'A'),
(34,	14,	24,	1,	'A'),
(35,	15,	25,	1,	'A'),
(36,	16,	26,	1,	'A'),
(37,	17,	27,	1,	'A'),
(38,	18,	28,	1,	'A'),
(39,	19,	29,	1,	'A'),
(40,	20,	30,	1,	'A'),
(41,	21,	31,	1,	'A'),
(42,	22,	32,	1,	'A'),
(43,	23,	33,	1,	'A'),
(44,	24,	34,	1,	'A'),
(45,	25,	35,	1,	'A'),
(46,	26,	36,	1,	'A'),
(47,	27,	37,	1,	'A'),
(48,	28,	38,	1,	'A'),
(49,	29,	39,	1,	'A'),
(50,	30,	40,	1,	'A'),
(51,	31,	41,	1,	'A'),
(52,	32,	42,	1,	'A'),
(53,	33,	43,	1,	'A'),
(54,	34,	44,	1,	'A'),
(55,	35,	45,	1,	'A'),
(56,	36,	46,	1,	'A'),
(57,	37,	47,	1,	'A'),
(58,	38,	48,	1,	'A'),
(59,	39,	49,	1,	'A'),
(60,	40,	50,	1,	'A'),
(61,	41,	51,	1,	'A'),
(62,	42,	52,	1,	'A'),
(63,	43,	53,	1,	'A'),
(64,	44,	54,	1,	'A'),
(65,	45,	55,	1,	'A'),
(66,	46,	56,	1,	'A'),
(67,	47,	57,	1,	'A'),
(68,	48,	58,	1,	'A'),
(69,	49,	59,	1,	'A'),
(70,	50,	60,	1,	'A'),
(71,	51,	11,	1,	'B'),
(72,	52,	12,	1,	'B'),
(73,	53,	13,	1,	'B'),
(74,	54,	14,	1,	'B'),
(75,	55,	15,	1,	'B'),
(76,	56,	16,	1,	'B'),
(77,	57,	17,	1,	'B'),
(78,	58,	18,	1,	'B'),
(79,	59,	19,	1,	'B'),
(80,	60,	20,	1,	'B'),
(81,	61,	21,	1,	'B'),
(82,	62,	22,	1,	'B'),
(83,	63,	23,	1,	'B'),
(84,	64,	24,	1,	'B'),
(85,	65,	25,	1,	'B'),
(86,	66,	26,	1,	'B'),
(87,	67,	27,	1,	'B'),
(88,	68,	28,	1,	'B'),
(89,	69,	29,	1,	'B'),
(90,	70,	30,	1,	'B'),
(91,	71,	31,	1,	'B'),
(92,	72,	32,	1,	'B'),
(93,	73,	33,	1,	'B'),
(94,	74,	34,	1,	'B'),
(95,	75,	35,	1,	'B'),
(96,	76,	36,	1,	'B'),
(97,	77,	37,	1,	'B'),
(98,	78,	38,	1,	'B'),
(99,	79,	39,	1,	'B'),
(100,	80,	40,	1,	'B'),
(101,	81,	41,	1,	'B'),
(102,	82,	42,	1,	'B'),
(103,	83,	43,	1,	'B'),
(104,	84,	44,	1,	'B'),
(105,	85,	45,	1,	'B'),
(106,	86,	46,	1,	'B'),
(107,	87,	47,	1,	'B'),
(108,	88,	48,	1,	'B'),
(109,	89,	49,	1,	'B'),
(110,	90,	50,	1,	'B'),
(111,	91,	51,	1,	'B'),
(112,	92,	52,	1,	'B'),
(113,	93,	53,	1,	'B'),
(114,	94,	54,	1,	'B'),
(115,	95,	55,	1,	'B'),
(116,	96,	56,	1,	'B'),
(117,	97,	57,	1,	'B'),
(118,	98,	58,	1,	'B'),
(119,	99,	59,	1,	'B'),
(120,	100,	60,	1,	'B');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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


-- 2023-07-05 22:21:04
