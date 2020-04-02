<<<<<<< HEAD
-- To add table claim_new for the claims portal
-- 27/02/2020
=======
-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 06:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11
>>>>>>> a0eb8bb19d210f70346d440c9db605f8660f39c1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forge`
--

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

<<<<<<< HEAD
=======
CREATE TABLE `budget` (
  `id` int(10) UNSIGNED NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `month`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mar-19', '435640.00', '2019-12-27 13:42:09', '2020-01-29 06:55:44', NULL),
(2, 'Jun-19', '0.00', '2019-12-27 13:42:11', '2019-12-27 13:42:11', NULL),
(3, 'Dec-19', '500.00', '2019-12-27 13:42:22', '2020-01-29 06:44:47', NULL),
(4, 'Feb-20', '2100.00', '2019-12-27 13:43:50', '2020-01-21 01:52:20', NULL),
(5, 'May-19', '0.00', '2020-01-06 12:05:35', '2020-01-06 12:05:35', NULL),
(6, 'Jul-19', '0.00', '2020-01-08 06:17:03', '2020-01-08 06:17:03', NULL),
(7, 'Sep-19', '6000.00', '2020-01-09 09:49:59', '2020-01-09 09:49:59', NULL),
(8, 'Nov-19', '0.00', '2020-01-20 02:15:51', '2020-01-20 02:15:51', NULL),
(9, 'Jun-20', '0.00', '2020-01-20 06:11:44', '2020-01-20 06:11:44', NULL),
(10, 'Apr-19', '0.00', '2020-01-21 01:52:10', '2020-01-21 01:52:10', NULL),
(11, 'Jan-20', '546.00', '2020-01-21 10:40:12', '2020-01-29 06:55:52', NULL),
(12, 'Oct-19', '54640.00', '2020-01-29 06:50:41', '2020-01-29 06:50:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_hire`
--

CREATE TABLE `car_hire` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver1_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver2_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver3_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `collect` tinyint(4) NOT NULL DEFAULT 0,
  `collect_other` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` tinyint(4) NOT NULL DEFAULT 0,
  `return_other` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_21` tinyint(4) NOT NULL DEFAULT 0,
  `valid_license` tinyint(4) NOT NULL DEFAULT 0,
  `per_day` decimal(8,2) DEFAULT NULL,
  `days` decimal(8,2) DEFAULT NULL,
  `fees` decimal(8,2) DEFAULT NULL,
  `other` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `placed_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_hire`
--

INSERT INTO `car_hire` (`id`, `user_id`, `admin_id`, `order_id`, `name`, `email`, `department`, `telephone`, `driver1_name`, `driver2_name`, `driver3_name`, `start_date`, `finish_date`, `start_time`, `finish_time`, `collect`, `collect_other`, `return`, `return_other`, `special`, `min_21`, `valid_license`, `per_day`, `days`, `fees`, `other`, `total`, `placed_at`, `completed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, '99D5681302385BB7BBBF668CB27CBF48', 'Julia Roberts', 'J.Roberts@bham.ac.uk', 'Metallurgy and Materials', '4545', 'Julia Roberts', 'Amy B', NULL, '2020-02-15', '2020-02-17', '08:00:00', '08:00:00', 1, 'xx', 1, 'xx', NULL, 1, 1, '50.00', '2.00', '100.00', NULL, '200.00', '2020-01-30 11:33:30', '2020-01-30 11:33:38', '2020-01-30 07:05:46', '2020-01-30 11:33:38', NULL),
(2, 2, 2, 'EDCDA9AD075D28DA097ECFAB959680A0', 'Julia Roberts', 'J.Roberts@bham.ac.uk', 'Metallurgy and Materials', '834739', 'Julia Roberts', 'Amy B', NULL, '2020-02-15', '2020-02-17', '08:00:00', '08:00:00', 1, NULL, 1, NULL, NULL, 1, 1, '75.00', '2.00', '50.00', NULL, '200.00', '2020-01-30 11:31:05', '2020-01-30 11:32:55', '2020-01-30 07:06:47', '2020-01-30 11:32:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catalogue_orders`
--

CREATE TABLE `catalogue_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `implemented_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `requisition_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_received` int(11) DEFAULT NULL,
  `received_at` timestamp NULL DEFAULT NULL,
  `placed_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogue_orders`
--

INSERT INTO `catalogue_orders` (`id`, `order_id`, `user_id`, `item_no`, `supplier`, `description`, `qty`, `price`, `total`, `file`, `admin_id`, `implemented_at`, `completed_at`, `requisition_no`, `qty_received`, `received_at`, `placed_at`, `status_id`, `created_at`, `updated_at`, `deleted_at`, `currency`) VALUES
(45, '5A6B73632EC35A18EAC7C388971BA306', 1, '873438', 'Office Depot', 'Tassimo Coffee Machine for Office', 1, '150.00', '150.00', 'QPNTVLJIA639IDMPI9A7fw4sIQRRKRp3EUIn6wZk.pdf', 2, NULL, '2020-01-31 06:32:04', '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 12:23:48', NULL, '2020-01-30 12:22:10', '2020-01-31 06:32:04', NULL, 'GBP'),
(44, '25E007D38C157D8CCB1128C82E73690C', 2, '8347385', 'Office Depot', 'Table 1m in Pine Wood', 1, '100.00', '100.00', '7TcVrfig0GdXGNufCIWKcpKSl64bORbFH3N3jCLp.pdf', 2, NULL, NULL, '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 12:18:10', NULL, '2020-01-30 12:17:51', '2020-01-30 12:18:20', NULL, 'GBP'),
(43, 'FD66CA8C6824538E2A3DEC8F554D896A', 2, '834784', 'Fisher Scientific', 'Potassium 50%', 1, '50.00', '50.00', '76BJIMhEcxYOhnR7Z87759EoF7EtXNYnXSReQ3HM.pdf', 2, NULL, NULL, '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 12:15:58', NULL, '2020-01-30 12:15:21', '2020-01-30 12:16:13', NULL, 'GBP'),
(42, '840C5524F01ADEE2283141B6C591228D', 2, '833934', 'Fisher Scientific', 'Safety Boots Size 5', 3, '70.00', '210.00', 'dWgOhA29rgIVpIIxTlw1zQSnR0a12zM2XvQSre0B.pdf', 2, NULL, NULL, '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 12:11:58', NULL, '2020-01-30 12:11:41', '2020-01-30 12:15:17', NULL, 'GBP'),
(40, '57B0BBA429F018972BF4CB9AAE19F76F', 2, '937438', 'Office Depot', 'Sweetner Sachets x500', 1, '5.00', '5.00', '8yiV6RNbSwu8QPIk4GSFvEzbvIGNJDMi6LsWDVlm.docx', 2, NULL, '2020-01-30 10:38:16', '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 08:36:28', NULL, '2020-01-30 06:35:28', '2020-01-30 10:38:16', NULL, 'GBP'),
(41, '57B0BBA429F018972BF4CB9AAE19F76F', 2, '38473GH', 'Office Depot', 'Sugar Sachets (Brown) x500', 1, '4.99', '4.99', '8yiV6RNbSwu8QPIk4GSFvEzbvIGNJDMi6LsWDVlm.docx', 2, NULL, '2020-01-30 10:38:16', '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 08:36:28', NULL, '2020-01-30 06:35:28', '2020-01-30 10:38:16', NULL, 'GBP'),
(39, '57B0BBA429F018972BF4CB9AAE19F76F', 2, '9348GH', 'Office Depot', 'Coffee Pods for Tassimo Machine', 4, '10.00', '40.00', '8yiV6RNbSwu8QPIk4GSFvEzbvIGNJDMi6LsWDVlm.docx', 2, NULL, '2020-01-30 10:38:16', '100076483', 4, '2020-01-29 16:00:00', '2020-01-30 08:36:28', NULL, '2020-01-30 06:35:28', '2020-01-30 10:38:16', NULL, 'GBP'),
(38, '5A9EEC96F321C939A4F2210D1C99BD98', 2, '18B74YH', 'Office Depot', 'Ergonomic Foot Rest', 1, '35.00', '35.00', 'vqAtaBPaARLMEN6d1CwBKKcvYtuNmBHdsYqTDglS.pdf', 2, NULL, '2020-01-30 10:42:49', '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 08:37:40', NULL, '2020-01-30 06:33:03', '2020-01-30 10:42:49', NULL, 'GBP'),
(37, '5A9EEC96F321C939A4F2210D1C99BD98', 2, 'PN74830-10', 'Fisher Scientific', 'Vaccum Oven', 1, '1570.00', '1570.00', 'vqAtaBPaARLMEN6d1CwBKKcvYtuNmBHdsYqTDglS.pdf', 2, NULL, '2020-01-30 10:42:49', '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 08:37:40', NULL, '2020-01-30 06:33:03', '2020-01-30 10:42:49', NULL, 'GBP'),
(46, 'E80297090B3B9DC811D1C2FC2FD9511D', 2, '83438434', 'CDW', 'Lenovo Laptop', 1, '745.00', '745.00', 'BROYK2u5CtEV20UGd3Ln1ubXIrXF1CIqYW5XVqSs.pdf', 2, NULL, '2020-01-30 12:52:31', '100076483', 1, '2020-01-29 16:00:00', '2020-01-30 12:33:51', NULL, '2020-01-30 12:32:16', '2020-01-30 12:52:31', NULL, 'GBP'),
(47, 'FF04271F75F0C92DB588A5CEF02C3303', 2, '34523', '5235235', '4324325', 1, '53.00', '53.00', '9cgwdYofGGwycmD9Dj61gffNqdbwzQzHdTEyygO3.pdf', 2, NULL, NULL, '32143214', 2, '2020-01-29 16:00:00', '2020-01-30 12:54:41', NULL, '2020-01-30 12:53:21', '2020-01-30 12:56:08', NULL, 'GBP'),
(48, 'D92E3FBDCEA3C8A8F08E03D62D7D40DD', 1, '500', 'TECHDNA', 'FREDDOS CHOCOLATES', 1, '50.00', '50.00', 'lwnAlpSgmQZ1FQGdPvqS6DwSobNwQACGapLpAEFv.pdf', 2, NULL, '2020-01-31 06:31:55', '32523456', 1, '2020-01-30 16:00:00', '2020-01-31 06:17:08', 3, '2020-01-30 20:08:13', '2020-01-31 06:31:55', NULL, 'GBP'),
(49, 'D92E3FBDCEA3C8A8F08E03D62D7D40DD', 1, '501', 'ASDA', 'FLAKES 60 PK', 10, '8.00', '80.00', 'lwnAlpSgmQZ1FQGdPvqS6DwSobNwQACGapLpAEFv.pdf', 2, NULL, '2020-01-31 06:31:55', '32523456', 9, '2020-01-30 16:00:00', '2020-01-31 06:17:08', NULL, '2020-01-30 20:08:13', '2020-01-31 06:31:55', NULL, 'GBP'),
(50, '99FF4D2FBE0E3CB22C06BA7EF9E83887', 2, '8347834', 'Office Depot', '40L Storage Box', 3, '20.00', '60.00', '8UZWEyFr3a5XvwZBYrlmMxSmKhC9cakk93LA9jfi.pdf', 2, NULL, '2020-01-31 06:36:11', '100076483', 2, '2020-01-30 16:00:00', '2020-01-31 06:07:10', NULL, '2020-01-31 06:00:15', '2020-01-31 06:36:11', NULL, 'GBP'),
(51, '99FF4D2FBE0E3CB22C06BA7EF9E83887', 2, '934343', 'Office Depot', '6L Storage Box', 2, '5.00', '10.00', '8UZWEyFr3a5XvwZBYrlmMxSmKhC9cakk93LA9jfi.pdf', 2, NULL, '2020-01-31 06:36:11', '100076483', 2, '2020-01-30 16:00:00', '2020-01-31 06:07:10', NULL, '2020-01-31 06:00:15', '2020-01-31 06:36:11', NULL, 'GBP');

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `on_campus` tinyint(4) NOT NULL DEFAULT 0,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'name',
  `room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'name',
  `campus_refreshment_am1` time DEFAULT NULL,
  `campus_refreshment_am1_delegates` int(11) DEFAULT NULL,
  `campus_refreshment_am2` time DEFAULT NULL,
  `campus_refreshment_am2_delegates` int(11) DEFAULT NULL,
  `campus_lunch` time DEFAULT NULL,
  `campus_lunch_delegates` int(11) DEFAULT NULL,
  `campus_refreshment_pm1` time DEFAULT NULL,
  `campus_refreshment_pm1_delegates` int(11) DEFAULT NULL,
  `campus_refreshment_pm2` time DEFAULT NULL,
  `campus_refreshment_pm2_delegates` int(11) DEFAULT NULL,
  `campus_dinner` time DEFAULT NULL,
  `campus_dinner_delegates` int(11) DEFAULT NULL,
  `astor` tinyint(4) NOT NULL DEFAULT 0,
  `astor_lunch` time DEFAULT NULL,
  `astor_lunch_delegates` int(11) DEFAULT NULL,
  `astor_dinner` time DEFAULT NULL,
  `astor_dinner_delegates` int(11) DEFAULT NULL,
  `main` tinyint(4) NOT NULL DEFAULT 0,
  `main_breakfast` time DEFAULT NULL,
  `main_breakfast_delegates` int(11) DEFAULT NULL,
  `main_lunch` time DEFAULT NULL,
  `main_lunch_delegates` int(11) DEFAULT NULL,
  `main_dinner` time DEFAULT NULL,
  `main_dinner_delegates` int(11) DEFAULT NULL,
  `buffet` tinyint(4) NOT NULL DEFAULT 0,
  `buffet_lunch` time DEFAULT NULL,
  `buffet_lunch_delegates` int(11) DEFAULT NULL,
  `private` tinyint(4) NOT NULL DEFAULT 0,
  `private_breakfast` time DEFAULT NULL,
  `private_breakfast_delegates` int(11) DEFAULT NULL,
  `private_lunch` time DEFAULT NULL,
  `private_lunch_delegates` int(11) DEFAULT NULL,
  `private_dinner` time DEFAULT NULL,
  `private_dinner_delegates` int(11) DEFAULT NULL,
  `fresh_quote` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fresh_contract` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jacksons_quote` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jacksons_contract` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edgbaston_quote` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edgbaston_contract` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `astor_quote` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `astor_contract` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placed_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `special` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `value` decimal(15,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`id`, `user_id`, `order_id`, `event_name`, `event_date`, `on_campus`, `building_name`, `room`, `campus_refreshment_am1`, `campus_refreshment_am1_delegates`, `campus_refreshment_am2`, `campus_refreshment_am2_delegates`, `campus_lunch`, `campus_lunch_delegates`, `campus_refreshment_pm1`, `campus_refreshment_pm1_delegates`, `campus_refreshment_pm2`, `campus_refreshment_pm2_delegates`, `campus_dinner`, `campus_dinner_delegates`, `astor`, `astor_lunch`, `astor_lunch_delegates`, `astor_dinner`, `astor_dinner_delegates`, `main`, `main_breakfast`, `main_breakfast_delegates`, `main_lunch`, `main_lunch_delegates`, `main_dinner`, `main_dinner_delegates`, `buffet`, `buffet_lunch`, `buffet_lunch_delegates`, `private`, `private_breakfast`, `private_breakfast_delegates`, `private_lunch`, `private_lunch_delegates`, `private_dinner`, `private_dinner_delegates`, `fresh_quote`, `fresh_contract`, `jacksons_quote`, `jacksons_contract`, `edgbaston_quote`, `edgbaston_contract`, `astor_quote`, `astor_contract`, `placed_at`, `completed_at`, `special`, `created_at`, `updated_at`, `deleted_at`, `admin_id`, `value`) VALUES
(17, 2, 'DADD90D54AED6BB31D752E6E1A44503A', 'ReLiB Co-I Meeting', '2020-02-03', 1, 'Metallurgy & Materials', '2C30', '08:30:00', 10, NULL, NULL, '12:00:00', 10, '14:00:00', 10, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '18:00:00', 10, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-31 06:18:23', NULL, 'Bob- shellfish allergy\r\nAlice- vegetarian\r\nLuke-Vegan\r\nLaura- seafood\r\nDaniel- Vegetarian', '2020-01-30 07:23:59', '2020-01-31 06:18:23', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtr` int(11) DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`id`, `user_id`, `partner_id`, `created_at`, `updated_at`, `item`, `field`, `value`, `qtr`, `year`) VALUES
(1, 2, 13, '2020-01-29 07:39:54', '2020-01-29 07:39:54', 'A1', 'budget', '1', NULL, ''),
(2, 2, 13, '2020-01-29 07:39:54', '2020-01-29 07:39:54', 'A1', 'q1', NULL, NULL, '1'),
(3, 2, 13, '2020-01-29 07:39:54', '2020-01-29 07:39:54', 'A2', 'budget', '3', NULL, ''),
(4, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A1', 'q4', NULL, NULL, '1'),
(5, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A2', 'q4', NULL, NULL, '1'),
(6, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A3', 'q4', NULL, NULL, '1'),
(7, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A4a', 'q2', NULL, NULL, '1'),
(8, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A8', 'q5', NULL, NULL, '2'),
(9, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A8', 'q7', NULL, NULL, '2'),
(10, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A6', 'q9', NULL, NULL, '3'),
(11, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A4', 'q8', NULL, NULL, '2'),
(12, 2, 13, '2020-02-20 09:22:58', '2020-02-20 09:22:58', 'A4', 'q2', NULL, NULL, '1'),
(13, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A11', 'q1', NULL, NULL, '1'),
(14, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A11', 'q1', NULL, NULL, '1'),
(15, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A5', 'q1', '342', NULL, '1'),
(16, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A5', 'q2', NULL, NULL, '1'),
(17, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A5', 'q1', NULL, NULL, '1'),
(18, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A5', 'q1', NULL, NULL, '1'),
(19, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A1', 'q1', '10', NULL, '1'),
(20, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A1', 'q2', NULL, NULL, '1'),
(21, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A3', 'q1', NULL, NULL, '1'),
(22, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A1', 'q1', '1000', NULL, '1'),
(23, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A1', 'q2', NULL, NULL, '1'),
(24, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A3', 'q1', NULL, NULL, '1'),
(25, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A2', 'q1', '500', NULL, '1'),
(26, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A3', 'q1', '400', NULL, '1'),
(27, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A4', 'q1', '200', NULL, '1'),
(28, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A3', 'q1', '400', NULL, '1'),
(29, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A4', 'q1', '300', NULL, '1'),
(30, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A4a', 'q1', '200', NULL, '1'),
(31, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A4a', 'q2', NULL, NULL, '1'),
(32, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A5', 'q1', '100', NULL, '1'),
(33, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A6', 'q1', '150', NULL, '1'),
(34, 2, 13, '2020-02-22 21:30:29', '2020-02-22 21:30:29', 'A7', 'q1', NULL, NULL, '1'),
(35, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A11', 'q1', NULL, NULL, '1'),
(36, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A11', 'q1', NULL, NULL, '1'),
(37, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A5', 'q1', '342', NULL, '1'),
(38, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A5', 'q2', NULL, NULL, '1'),
(39, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A5', 'q1', NULL, NULL, '1'),
(40, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A5', 'q1', NULL, NULL, '1'),
(41, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A1', 'q1', '10', NULL, '1'),
(42, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A1', 'q2', NULL, NULL, '1'),
(43, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A3', 'q1', NULL, NULL, '1'),
(44, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A1', 'q1', '1000', NULL, '1'),
(45, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A1', 'q2', NULL, NULL, '1'),
(46, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A3', 'q1', NULL, NULL, '1'),
(47, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A2', 'q1', '500', NULL, '1'),
(48, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A3', 'q1', '400', NULL, '1'),
(49, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A4', 'q1', '200', NULL, '1'),
(50, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A3', 'q1', '400', NULL, '1'),
(51, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A4', 'q1', '300', NULL, '1'),
(52, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A4a', 'q1', '200', NULL, '1'),
(53, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A4a', 'q2', NULL, NULL, '1'),
(54, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A5', 'q1', '100', NULL, '1'),
(55, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A6', 'q1', '150', NULL, '1'),
(56, 2, 13, '2020-02-22 21:30:47', '2020-02-22 21:30:47', 'A7', 'q1', NULL, NULL, '1'),
(57, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A11', 'q1', NULL, NULL, '1'),
(58, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A11', 'q1', NULL, NULL, '1'),
(59, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A5', 'q1', '342', NULL, '1'),
(60, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A5', 'q2', NULL, NULL, '1'),
(61, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A5', 'q1', NULL, NULL, '1'),
(62, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A5', 'q1', NULL, NULL, '1'),
(63, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A1', 'q1', '10', NULL, '1'),
(64, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A1', 'q2', NULL, NULL, '1'),
(65, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A3', 'q1', NULL, NULL, '1'),
(66, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A1', 'q1', '1000', NULL, '1'),
(67, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A1', 'q2', NULL, NULL, '1'),
(68, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A3', 'q1', NULL, NULL, '1'),
(69, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A2', 'q1', '500', NULL, '1'),
(70, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A3', 'q1', '400', NULL, '1'),
(71, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A4', 'q1', '200', NULL, '1'),
(72, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A3', 'q1', '400', NULL, '1'),
(73, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A4', 'q1', '300', NULL, '1'),
(74, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A4a', 'q1', '200', NULL, '1'),
(75, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A4a', 'q2', NULL, NULL, '1'),
(76, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A5', 'q1', '100', NULL, '1'),
(77, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A6', 'q1', '150', NULL, '1'),
(78, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A7', 'q1', NULL, NULL, '1'),
(79, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A1', 'q2', '8989', NULL, '1'),
(80, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A2', 'q2', '909', NULL, '1'),
(81, 2, 13, '2020-02-22 21:31:23', '2020-02-22 21:31:23', 'A4', 'q2', NULL, NULL, '1'),
(82, 2, 13, '2020-02-23 09:46:18', '2020-02-23 09:46:18', 'A3', 'q3', NULL, NULL, '1'),
(83, 2, 13, '2020-02-23 09:46:18', '2020-02-23 09:46:18', 'A2', 'q2', NULL, NULL, '1'),
(84, 2, 13, '2020-02-23 09:46:18', '2020-02-23 09:46:18', 'A1', 'q1', NULL, NULL, '1'),
(85, 2, 13, '2020-02-23 09:46:18', '2020-02-23 09:46:18', 'A1', 'q1', '2555555', NULL, '1'),
(86, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A4', 'q2', NULL, NULL, '1'),
(87, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A4', 'q2', NULL, NULL, '1'),
(88, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A4', 'q2', NULL, NULL, '1'),
(89, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A4a', 'y3', NULL, NULL, ''),
(90, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A2', 'y3', NULL, NULL, ''),
(91, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A1', 'y2vari', NULL, NULL, ''),
(92, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A1', 'y2', NULL, NULL, ''),
(93, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A1', 'y1', NULL, NULL, ''),
(94, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A4', 'q9', NULL, NULL, '3'),
(95, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A4', 'q8', NULL, NULL, '2'),
(96, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A4a', 'q5', NULL, NULL, '2'),
(97, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A6', 'q2', NULL, NULL, '1'),
(98, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A11', 'q5', NULL, NULL, '2'),
(99, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A9', 'q5', NULL, NULL, '2'),
(100, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A6', 'q6', NULL, NULL, '2'),
(101, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A2', 'q5', NULL, NULL, '2'),
(102, 2, 13, '2020-02-23 09:57:26', '2020-02-23 09:57:26', 'A2', 'q5', NULL, NULL, '2'),
(103, 2, 13, '2020-02-23 10:08:08', '2020-02-23 10:08:08', 'A4', 'q2', NULL, NULL, '1'),
(104, 2, 13, '2020-02-23 10:08:08', '2020-02-23 10:08:08', 'A4', 'q2', NULL, NULL, '1'),
(105, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A4', 'q2', NULL, NULL, '1'),
(106, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A4a', 'y3', NULL, NULL, ''),
(107, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A2', 'y3', NULL, NULL, ''),
(108, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A1', 'y2vari', NULL, NULL, ''),
(109, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A1', 'y2', NULL, NULL, ''),
(110, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A1', 'y1', NULL, NULL, ''),
(111, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A4', 'q9', NULL, NULL, '3'),
(112, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A4', 'q8', NULL, NULL, '2'),
(113, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A4a', 'q5', NULL, NULL, '2'),
(114, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A6', 'q2', NULL, NULL, '1'),
(115, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A11', 'q5', NULL, NULL, '2'),
(116, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A9', 'q5', NULL, NULL, '2'),
(117, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A6', 'q6', NULL, NULL, '2'),
(118, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A2', 'q5', NULL, NULL, '2'),
(119, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A2', 'q5', NULL, NULL, '2'),
(120, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A2', 'q11', NULL, NULL, '3'),
(121, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A2', 'q11', NULL, NULL, '3'),
(122, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A4', 'q5', NULL, NULL, '2'),
(123, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A2', 'q5', NULL, NULL, '2'),
(124, 2, 13, '2020-02-23 10:08:09', '2020-02-23 10:08:09', 'A4a', 'q4', NULL, NULL, '1'),
(125, 2, 13, '2020-02-23 10:08:10', '2020-02-23 10:08:10', 'A1', 'q2', '22222222222222222222222222222222222222', NULL, '1'),
(126, 2, 13, '2020-02-23 10:08:10', '2020-02-23 10:08:10', 'A1', 'q1', '2222222222222222222222222', NULL, '1'),
(127, 2, 13, '2020-02-23 10:08:10', '2020-02-23 10:08:10', 'A1', 'q4', NULL, NULL, '1'),
(128, 2, 13, '2020-02-23 10:08:10', '2020-02-23 10:08:10', 'A1', 'q3', '22222222222222222', NULL, '1'),
(129, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A4', 'q2', NULL, NULL, '1'),
(130, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A4', 'q2', NULL, NULL, '1'),
(131, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A4', 'q2', NULL, NULL, '1'),
(132, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A4a', 'y3', NULL, NULL, ''),
(133, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A2', 'y3', NULL, NULL, ''),
(134, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A1', 'y2vari', NULL, NULL, ''),
(135, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A1', 'y2', NULL, NULL, ''),
(136, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A1', 'y1', NULL, NULL, ''),
(137, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A4', 'q9', NULL, NULL, '3'),
(138, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A4', 'q8', NULL, NULL, '2'),
(139, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A4a', 'q5', NULL, NULL, '2'),
(140, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A6', 'q2', NULL, NULL, '1'),
(141, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A11', 'q5', NULL, NULL, '2'),
(142, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A9', 'q5', NULL, NULL, '2'),
(143, 2, 13, '2020-02-23 10:12:16', '2020-02-23 10:12:16', 'A6', 'q6', NULL, NULL, '2'),
(144, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A2', 'q5', NULL, NULL, '2'),
(145, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A2', 'q5', NULL, NULL, '2'),
(146, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A2', 'q11', NULL, NULL, '3'),
(147, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A2', 'q11', NULL, NULL, '3'),
(148, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A4', 'q5', NULL, NULL, '2'),
(149, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A2', 'q5', NULL, NULL, '2'),
(150, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A4a', 'q4', NULL, NULL, '1'),
(151, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A1', 'q2', '22222222222222222222222222222222222222', NULL, '1'),
(152, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A1', 'q1', '2222222222222222222222222', NULL, '1'),
(153, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A1', 'q4', NULL, NULL, '1'),
(154, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A1', 'q3', '22222222222222222', NULL, '1'),
(155, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A4', 'q3', NULL, NULL, '1'),
(156, 2, 13, '2020-02-23 10:12:17', '2020-02-23 10:12:17', 'A4', 'q3', NULL, NULL, '1'),
(157, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A4', 'q2', NULL, NULL, '1'),
(158, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A4', 'q2', NULL, NULL, '1'),
(159, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A4', 'q2', NULL, NULL, '1'),
(160, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A4a', 'y3', NULL, NULL, ''),
(161, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A2', 'y3', NULL, NULL, ''),
(162, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A1', 'y2vari', NULL, NULL, ''),
(163, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A1', 'y2', NULL, NULL, ''),
(164, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A1', 'y1', NULL, NULL, ''),
(165, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A4', 'q9', NULL, NULL, '3'),
(166, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A4', 'q8', NULL, NULL, '2'),
(167, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A4a', 'q5', NULL, NULL, '2'),
(168, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A6', 'q2', NULL, NULL, '1'),
(169, 2, 13, '2020-02-23 10:33:14', '2020-02-23 10:33:14', 'A11', 'q5', NULL, NULL, '2'),
(170, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A9', 'q5', NULL, NULL, '2'),
(171, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A6', 'q6', NULL, NULL, '2'),
(172, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A2', 'q5', NULL, NULL, '2'),
(173, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A2', 'q5', NULL, NULL, '2'),
(174, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A2', 'q11', NULL, NULL, '3'),
(175, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A2', 'q11', NULL, NULL, '3'),
(176, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A4', 'q5', NULL, NULL, '2'),
(177, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A2', 'q5', NULL, NULL, '2'),
(178, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A4a', 'q4', NULL, NULL, '1'),
(183, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A4', 'q3', NULL, NULL, '1'),
(185, 2, 13, '2020-02-23 10:33:15', '2020-02-23 10:33:15', 'A2', 'q1', '222222', NULL, '1'),
(186, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A4', 'q2', NULL, NULL, '1'),
(187, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A4', 'q2', NULL, NULL, '1'),
(188, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A4', 'q2', NULL, NULL, '1'),
(189, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A4a', 'y3', NULL, NULL, ''),
(190, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A2', 'y3', NULL, NULL, ''),
(191, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A1', 'y2vari', NULL, NULL, ''),
(192, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A1', 'y2', NULL, NULL, ''),
(193, 2, 13, '2020-02-23 10:33:35', '2020-02-23 10:33:35', 'A1', 'y1', NULL, NULL, ''),
(194, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A4', 'q9', NULL, NULL, '3'),
(195, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A4', 'q8', NULL, NULL, '2'),
(196, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A4a', 'q5', NULL, NULL, '2'),
(197, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A6', 'q2', NULL, NULL, '1'),
(198, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A11', 'q5', NULL, NULL, '2'),
(199, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A9', 'q5', NULL, NULL, '2'),
(200, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A6', 'q6', NULL, NULL, '2'),
(201, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A2', 'q5', NULL, NULL, '2'),
(202, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A2', 'q5', NULL, NULL, '2'),
(203, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A2', 'q11', NULL, NULL, '3'),
(204, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A2', 'q11', NULL, NULL, '3'),
(205, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A4', 'q5', NULL, NULL, '2'),
(206, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A2', 'q5', NULL, NULL, '2'),
(207, 2, 13, '2020-02-23 10:33:36', '2020-02-23 10:33:36', 'A4a', 'q4', NULL, NULL, '1'),
(217, 2, 13, '2020-02-23 12:51:03', '2020-02-23 12:51:03', 'A4', 'q1', '224444', NULL, '1'),
(218, 2, 21, '2020-02-23 14:57:02', '2020-02-23 14:57:02', 'A4a', 'q2', NULL, NULL, '1'),
(219, 2, 21, '2020-02-23 14:57:02', '2020-02-23 14:57:02', 'A4a', 'q4', NULL, NULL, '1'),
(220, 2, 21, '2020-02-23 14:57:02', '2020-02-23 14:57:02', 'A2', 'q3', '34', NULL, '1'),
(221, 2, 21, '2020-02-23 14:57:02', '2020-02-23 14:57:02', 'A3', 'q3', '34', NULL, '1'),
(222, 2, 21, '2020-02-23 14:57:02', '2020-02-23 14:57:02', 'A4', 'q3', '34', NULL, '1'),
(223, 2, 21, '2020-02-23 14:57:02', '2020-02-23 14:57:02', 'A4a', 'q3', '34', NULL, '1'),
(224, 2, 21, '2020-02-23 14:59:35', '2020-02-23 14:59:35', 'A2', 'q3', '46', NULL, '1'),
(225, 2, 21, '2020-02-23 14:59:35', '2020-02-23 14:59:35', 'A3', 'q3', '46', NULL, '1'),
(226, 2, 21, '2020-02-23 14:59:35', '2020-02-23 14:59:35', 'A4', 'q3', '46', NULL, '1'),
(227, 2, 21, '2020-02-23 14:59:35', '2020-02-23 14:59:35', 'A4a', 'q3', '46', NULL, '1'),
(228, 2, 21, '2020-02-23 15:01:01', '2020-02-23 15:01:01', 'A4', 'q2', NULL, NULL, '1'),
(229, 2, 21, '2020-02-23 15:01:01', '2020-02-23 15:01:01', 'A4a', 'q4', '444', NULL, '1'),
(230, 2, 21, '2020-02-23 15:01:01', '2020-02-23 15:01:01', 'A5', 'q4', '2444', NULL, '1'),
(231, 2, 21, '2020-02-23 15:01:01', '2020-02-23 15:01:01', 'A6', 'q4', '1444', NULL, '1'),
(232, 2, 19, '2020-02-23 15:17:12', '2020-02-23 15:17:12', 'A4a', 'q3', '23', NULL, '1'),
(233, 2, 19, '2020-02-23 15:17:12', '2020-02-23 15:17:12', 'A5', 'q3', '23', NULL, '1'),
(234, 2, 19, '2020-02-23 15:17:12', '2020-02-23 15:17:12', 'A6', 'q3', '23', NULL, '1'),
(235, 2, 19, '2020-02-23 15:17:12', '2020-02-23 15:17:12', 'A7', 'q3', '23', NULL, '1'),
(236, 24, 24, '2020-02-23 15:19:29', '2020-02-23 15:19:29', 'A3', 'q3', '24', NULL, '1'),
(237, 24, 24, '2020-02-23 15:19:29', '2020-02-23 15:19:29', 'A7', 'q3', '24', NULL, '1'),
(238, 24, 24, '2020-02-23 15:19:29', '2020-02-23 15:19:29', 'A9', 'q3', '24', NULL, '1'),
(239, 24, 24, '2020-02-23 12:13:53', '2020-02-23 12:13:53', 'A4', 'q3', '24', NULL, '1'),
(240, 24, 24, '2020-02-23 12:13:53', '2020-02-23 12:13:53', 'A5', 'q3', '24', NULL, '1'),
(241, 24, 24, '2020-02-23 12:13:53', '2020-02-23 12:13:53', 'A7', 'q3', '24', NULL, '1'),
(242, 24, 24, '2020-02-23 12:13:53', '2020-02-23 12:13:53', 'A9', 'q3', '24', NULL, '1'),
(243, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A1', 'q1', '33', NULL, '1'),
(244, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A1', 'q2', '22', NULL, '1'),
(245, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A1', 'q3', '44', NULL, '1'),
(246, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A2', 'q3', '33', NULL, '1'),
(247, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A2', 'q2', '33', NULL, '1'),
(248, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A3', 'q2', '33', NULL, '1'),
(249, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A4', 'q2', '33', NULL, '1'),
(250, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A4a', 'q2', '33', NULL, '1'),
(251, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A6', 'q2', '33', NULL, '1'),
(252, 24, 24, '2020-02-23 12:22:48', '2020-02-23 12:22:48', 'A7', 'q2', '33', NULL, '1'),
(253, 2, 18, '2020-02-23 12:30:31', '2020-02-23 12:30:31', 'A1', 'q1', '33', NULL, '1'),
(254, 2, 19, '2020-02-23 12:30:42', '2020-02-23 12:30:42', 'A1', 'q1', '44', NULL, '1'),
(255, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A1', 'budget', '23', NULL, ''),
(256, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A4', 'budget', '23', NULL, ''),
(257, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A6', 'budget', '32', NULL, ''),
(258, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A7', 'budget', '32', NULL, ''),
(259, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A3', 'q1', '23', NULL, '1'),
(260, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A5', 'q1', '32', NULL, '1'),
(261, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A7', 'q1', '32', NULL, '1'),
(262, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A9', 'q1', '32', NULL, '1'),
(263, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A6', 'y1budget', '23', NULL, ''),
(264, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A8', 'y1budget', '23', NULL, ''),
(265, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A10', 'y1budget', '23', NULL, ''),
(266, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A4a', 'y1budget', '23', NULL, ''),
(267, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A3', 'y1budget', '3232', NULL, ''),
(268, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A2', 'y1budget', NULL, NULL, ''),
(269, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A5', 'y2budget', '3232', NULL, ''),
(270, 24, 24, '2020-02-24 04:18:31', '2020-02-24 04:18:31', 'A4', 'y2budget', '32', NULL, ''),
(271, 24, 24, '2020-02-24 04:36:39', '2020-02-24 04:36:39', 'A4a', 'q1', '23', NULL, '1'),
(272, 24, 24, '2020-02-24 04:36:39', '2020-02-24 04:36:39', 'A6', 'q1', '23', NULL, '1'),
(273, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A8', 'q1', '23', NULL, '1'),
(274, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A10', 'q1', '23', NULL, '1'),
(275, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A10', 'q1', '23', NULL, '1'),
(276, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A5', 'q1', NULL, NULL, '1'),
(277, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A5', 'q1', NULL, NULL, '1'),
(278, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A6', 'q3', '324', NULL, '1'),
(279, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A8', 'q3', '234', NULL, '1'),
(280, 24, 24, '2020-02-24 04:36:40', '2020-02-24 04:36:40', 'A11', 'q3', '253', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `claim_new`
--

>>>>>>> a0eb8bb19d210f70346d440c9db605f8660f39c1
CREATE TABLE `claim_new` (
  `id` int(10) UNSIGNED NOT NULL,
  `partner_id` int(11) NOT NULL,
  `cost_item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_budget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q11` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q12` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y1_budget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y2_budget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y3_budget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD



=======
--
-- Dumping data for table `claim_new`
--

INSERT INTO `claim_new` (`id`, `partner_id`, `cost_item`, `description`, `total_budget`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `y1_budget`, `y2_budget`, `y3_budget`) VALUES
(575, 22, 'A10', 'Exceptions: Travel & Subsistence', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '435', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(576, 22, 'A11', 'Exceptions: Student Internships', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '345', '0.00', '0.00', '0.00', '0.00'),
(577, 22, 'A12', 'Exceptions: Other cost', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(571, 22, 'A06', 'Directly allocated: Estates', '0.00', '0.00', '0.00', '0.00', '345', '0.00', '0.00', '345', '0.00', '5', '543', '543', '435435', '0.00', '0.00', '0.00'),
(572, 22, 'A07', 'Directly allocated: Other cost', '0.00', '0.00', '5345', '0.00', '0.00', '45', '345', '0.00', '543', '0.00', '435', '0.00', '0.00', '0.00', '34534', '0.00'),
(573, 22, 'A08', 'Indirect costs', '0.00', '0.00', '0.00', '0.00', '345', '0.00', '0.00', '0.00', '0.00', '54343', '0.00', '345', '0.00', '0.00', '0.00', '0.00'),
(574, 22, 'A09', 'Exceptions: Staff', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '435', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(567, 22, 'A03', 'Directly incurred: Equipment', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '435', '5', '0.00', '0.00', '5', '0.00', '0.00', '0.00', '0.00', '345'),
(568, 22, 'A04', 'Directly incurred: Other cost', '0.00', '0.00', '5', '0.00', '34', '0.00', '0.00', '543', '0.00', '43543', '543', '453', '3', '0.00', '5345', '345'),
(569, 22, 'A04a', 'Directly incurred: Exceptions Other', '0.00', '0.00', '0.00', '0.00', '345', '0.00', '', '0.00', '0.00', '0.00', '45', '34543', '435', '0.00', '0.00', '0.00'),
(570, 22, 'A05', 'Directly allocated: Investigators', '0.00', '0.00', '43', '3245', '0.00', '0.00', '435', '543', '0.00', '345', '0.00', '0.00', '0.00', '0.00', '534', '345'),
(565, 22, 'A01', 'Directly incurred: Staff', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(566, 22, 'A02', 'Directly incurred: Travel & subsistence', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_of_funds` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_centre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_project_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `short_name`, `code`, `project_number`, `task_number`, `activity`, `source_of_funds`, `cost_centre`, `old_project_code`, `building_name`, `address1`, `address2`, `address3`, `city`, `postcode`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Metallurgy and Materials', 'Met & Mat', NULL, '20789', '1.6', '10001', '50022', 'C058', 'FEFE RRAH20789', 'Metallurgy and Materials', 'University of birmingham', 'Edgbaston', 'Elms Road', 'Birmingham', 'B15 2SE', '2019-11-26 06:54:11', '2019-11-27 12:19:25', NULL),
(2, 'Chemistry', 'Chem', NULL, '20789', '1.1', '10001', '50022', 'C130', 'GDGD RRAH20789', 'Chemistry', 'University of Birmingham', 'Edgbaston', NULL, 'Birmingham', 'B15 2TT', '2019-11-26 07:08:56', '2019-11-27 11:57:36', NULL),
(3, 'Chemical Engineering', 'CHem Eng', NULL, '20789', '1.4', '10001', '50022', 'C247', 'FBFB RRAH20789', 'Chemical Engineering', 'University of Birmingham', 'SW Campus', 'Edgbaston', 'Birmingham', 'B15 2TT', '2019-11-27 11:59:16', '2019-11-27 11:59:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `user_id`, `order_id`, `name`, `subject`, `content`, `file`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'Test', 'testing emails', 'This is some content of the email', NULL, NULL, '2020-01-22 13:36:38', '2020-01-22 13:36:38'),
(2, 2, NULL, 'Test', 'test', 'Test again', NULL, NULL, '2020-01-29 08:34:31', '2020-01-29 08:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `eurostar`
--

CREATE TABLE `eurostar` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `from_station` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_station` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `key_travel_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eurostar`
--

INSERT INTO `eurostar` (`id`, `parent_id`, `from_station`, `to_station`, `departure_date`, `departure_time`, `return_date`, `return_time`, `key_travel_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 5, 'London Picadilly', 'Paris', '2020-04-13', '07:00:00', '2020-04-15', '10:00:00', 'KT839748347', '80.00', '2020-01-30 06:59:34', '2020-01-30 11:27:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `travel_uk` decimal(8,2) DEFAULT 0.00,
  `subsistence_uk` decimal(8,2) DEFAULT 0.00,
  `travel_overseas` decimal(8,2) DEFAULT 0.00,
  `subsistence_overseas` decimal(8,2) DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `completed_at` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GBP'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `created_at`, `updated_at`, `order_id`, `user_id`, `admin_id`, `start_date`, `description`, `travel_uk`, `subsistence_uk`, `travel_overseas`, `subsistence_overseas`, `total`, `completed_at`, `deleted_at`, `currency`) VALUES
(12, '2020-01-31 06:12:30', '2020-01-31 06:17:43', '3B4E5D9D74D95E8499C768060F9D2B9D', 1, 2, '2020-01-28', 'london confrence', '10.00', '10.00', '10.00', '10.00', '40.00', '2020-01-31', NULL, 'GBP');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `traveller_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_travel_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `parent_id`, `from`, `to`, `departure_date`, `departure_time`, `return_date`, `return_time`, `traveller_name`, `key_travel_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 4, 'Bhx', 'Berlin', '2020-03-20', '07:00:00', '2020-03-25', '17:00:00', 'Julia Roberts', 'KT839748347', '150.00', '2020-01-30 06:58:42', '2020-01-30 11:22:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `persons` int(11) NOT NULL,
  `traveller_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_travel_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `parent_id`, `location`, `checkin_date`, `checkout_date`, `persons`, `traveller_name`, `key_travel_id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Glasgow', '2020-02-15', '2020-02-17', 1, 'Julia Roberts', 'KT55667733', '90.00', '2020-01-30 06:58:02', '2020-01-30 11:15:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_travel`
--

CREATE TABLE `key_travel` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placed_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_travel`
--

INSERT INTO `key_travel` (`id`, `user_id`, `order_id`, `admin_id`, `type`, `placed_at`, `completed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'C1DC10CA04FE417B1AFE2A69691A1F8D', 2, 'Train', '2020-01-30 11:04:31', '2020-01-30 11:10:32', '2020-01-30 06:56:19', '2020-01-30 11:10:32', NULL),
(2, 2, '23F3CA90183E04C95862A61A13E485AA', 2, 'Train', '2020-01-30 11:05:03', '2020-01-30 11:09:03', '2020-01-30 06:57:14', '2020-01-30 11:09:03', NULL),
(3, 2, '87A76330135BF08F36D8FE01D56972C2', 2, 'Hotel', '2020-01-30 11:15:44', '2020-01-30 11:18:27', '2020-01-30 06:58:02', '2020-01-30 11:18:27', NULL),
(4, 2, '13B07D767239BA271129E673BF84B5AC', 2, 'Flight', '2020-01-30 11:23:46', '2020-01-30 11:24:55', '2020-01-30 06:58:42', '2020-01-30 11:24:55', NULL),
(5, 2, '1B4E20A9BD643ADEA29F436A346601DF', 2, 'Eurostar', '2020-01-30 11:28:02', '2020-01-30 11:28:27', '2020-01-30 06:59:34', '2020-01-30 11:28:27', NULL),
(6, 1, '87D440C338A34F3EF0A96A02FB29F92B', NULL, 'Train', NULL, NULL, '2020-01-31 06:13:36', '2020-01-31 06:13:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_25_164624_update_users_table', 1),
(4, '2019_10_27_022231_create_catalogue_orders_table', 1),
(5, '2019_11_01_213453_update_catalogue_orders_file_column', 1),
(6, '2019_11_02_030924_create_notes_table', 1),
(7, '2019_11_02_185129_update_cat_orders_table', 1),
(8, '2019_11_09_131543_update_users_table_add_address', 1),
(9, '2019_11_09_144853_create_order_item_status_table', 1),
(10, '2019_11_09_145218_update_cat_order_status_field', 1),
(11, '2019_11_11_185735_create_non_catalogue_orders_table', 1),
(12, '2019_11_12_145040_train_table', 1),
(13, '2019_11_12_152046_key_travel_table', 1),
(14, '2019_11_13_133610_flight_table', 1),
(15, '2019_11_13_134815_hotel_table', 1),
(16, '2019_11_13_135840_eurostar_table', 1),
(17, '2019_11_13_144227_expenses_table', 1),
(18, '2019_11_14_143045_carhire_table', 1),
(19, '2019_11_14_162032_create_training_table', 1),
(20, '2019_11_14_223459_stores_table', 1),
(21, '2019_11_17_154215_update_training_table', 1),
(22, '2019_11_18_223405_update_final_users', 1),
(23, '2019_11_18_232232_department_table', 1),
(24, '2019_11_19_152652_add_currency_column_catalogue_orders', 1),
(25, '2019_11_19_171359_update_notes_table', 1),
(26, '2019_11_19_190137_update_flight_table', 1),
(27, '2019_11_19_201127_update_departments_table', 1),
(28, '2019_11_20_152137_update_train_table_one', 1),
(29, '2019_11_20_224808_project_partners_table', 1),
(30, '2019_11_24_153039_alter_notes_table', 1),
(31, '2019_11_24_213906_alter_training_table', 1),
(32, '2019_11_25_012107_alter_non_cat2_table', 1),
(33, '2019_11_26_155859_alter_non_cat_table', 2),
(34, '2019_11_26_223452_alter_non_cat_add_currcy', 3),
(35, '2019_11_28_145219_add_catering_table', 4),
(36, '2019_11_28_175458_alter_catering_table', 4),
(37, '2019_11_29_010439_alter_catering_two', 5),
(38, '2019_11_29_115211_alter_expenses_two', 6),
(39, '2019_11_29_115720_update_alter_traing_table', 6),
(40, '2019_11_29_121221_alter_non_cat_status_id_default', 6),
(41, '2019_11_30_023521_alter_expens_table', 7),
(42, '2019_12_02_222534_alter_users_table_two', 8),
(43, '2019_12_05_211652_alter_the_user_table', 9),
(44, '2019_12_13_001628_alter_non_cat_add_type_id', 10),
(45, '2019_12_15_151201_create_security_table', 11),
(47, '2019_12_15_173636_create_partner_account_table', 12),
(48, '2019_12_18_203151_alter_catering_add_value', 12),
(49, '2019_12_22_171446_create_budget_table', 13),
(50, '2020_01_20_161346_add_start_date_field_to_project_partners_table', 14),
(51, '2020_01_21_113336_create_notifications_table', 15),
(52, '2020_01_21_144233_add_username_to_users_table', 16),
(53, '2020_01_22_201635_create_email_templates_table', 17),
(54, '2020_01_23_095923_add_url_to_notes_table', 18),
(55, '2020_01_23_112930_create_claim_table', 19),
(56, '2020_01_27_115003_add_new_fields_to_claim_table', 20),
(57, '2020_01_28_143745_add_qtr_to_claim_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `non_catalogue_orders`
--

CREATE TABLE `non_catalogue_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `implemented_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `requisition_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_received` int(11) DEFAULT NULL,
  `received_at` timestamp NULL DEFAULT NULL,
  `expenditure_type_id` int(11) DEFAULT NULL,
  `item_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `new_supplier` tinyint(4) NOT NULL DEFAULT 0,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placed_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `non_catalogue_orders`
--

INSERT INTO `non_catalogue_orders` (`id`, `order_id`, `user_id`, `item_no`, `supplier`, `description`, `qty`, `price`, `total`, `admin_id`, `implemented_at`, `completed_at`, `requisition_no`, `qty_received`, `received_at`, `expenditure_type_id`, `item_url`, `created_at`, `updated_at`, `deleted_at`, `new_supplier`, `contact_name`, `supplier_email`, `supplier_tel`, `placed_at`, `currency`, `file`, `status_id`, `type_id`) VALUES
(38, '91C69C2546467D1B5176138C2F4ABAA1', 2, '83473843', 'IX CRM', 'Instant messenger app for project', 1, '1000.00', '1000.00', 2, NULL, NULL, '100076483', NULL, NULL, NULL, NULL, '2020-01-31 06:01:40', '2020-01-31 06:14:14', NULL, 1, 'Adam Apple', 'Adam.Apple@ixcrm.com', '0121 384 43943', '2020-01-31 06:14:14', 'GBP', 'F9zPFZdSorbgBICCF2ncrVrVonui9GJxmXTBegFr.pdf', NULL, 1),
(37, '00C248DECEAEEFE5364A85DB9205748B', 1, '666', 'TECHDNA', 'KINGSTON 64GB USB STICK', 3, '50.00', '150.00', 2, NULL, '2020-01-31 06:30:21', '32523456', 3, '2020-02-01 16:00:00', NULL, 'http://www.techdna.co.uk/', '2020-01-30 20:06:48', '2020-01-31 06:30:21', NULL, 1, 'Wajid Akhtar', 'info@techdna.co.uk', '0121-655-0500', '2020-01-31 06:17:34', 'GBP', '0k7eeMBJBrTHdi9ZIo01RbCvEhm7HX6fTj1m1iib.pdf', NULL, 2),
(36, 'E4BC5CDA1A603222340EF89D09F2D813', 1, '9483493', 'Appleton Woods', 'Safety Box', 1, '50.00', '50.00', 2, NULL, '2020-01-31 06:32:19', '100076483', 1, '2019-12-31 16:00:00', NULL, 'www.appleton.com/safety_box', '2020-01-30 12:23:08', '2020-01-31 06:32:19', NULL, 0, NULL, NULL, NULL, '2020-01-30 12:24:20', 'GBP', 'dxm32B8cB451WfG2IcOa7iUpxdYSb0QqEyOB9y1m.pdf', NULL, 2),
(35, '04D10CFB5F92DF01DBFECDBDFA3591EA', 2, 'ww', 'IXCRM', 'Website x5 page', 1, '3500.00', '3500.00', 2, NULL, NULL, '100076483', 1, '2020-01-29 16:00:00', NULL, 'ww', '2020-01-30 06:54:01', '2020-01-30 12:12:03', NULL, 1, 'Ryan Reynolds', 'Ryan.Reynolds@ICRM.com', '0121 456 7383', '2020-01-30 10:49:19', 'GBP', 'Z9N4GAQniMgMoTbMWmHknBZ7hbwZO45pA0w4Ig5y.pdf', NULL, 1),
(34, '8BD1AEB1952BC4C9F1F6C2FE328A7ED4', 2, '73hGF', 'Insight Direct', 'USB 64GB', 5, '5.00', '25.00', 2, NULL, '2020-01-30 11:02:35', '100076483', 5, '2020-01-29 16:00:00', NULL, 'www.insightdirect.com/usb', '2020-01-30 06:49:06', '2020-01-30 11:02:35', NULL, 0, NULL, NULL, NULL, '2020-01-30 11:00:57', 'GBP', 'OaKoLnI9hmkiXVo2BpkFZ5J4Po6sLhdB781QGn1i.pdf', NULL, 1),
(33, '8BD1AEB1952BC4C9F1F6C2FE328A7ED4', 2, 'gh6343', 'Insight Direct', 'Hard Drive', 4, '75.00', '300.00', 2, NULL, '2020-01-30 11:02:35', '100076483', 4, '2020-01-29 16:00:00', NULL, 'www.insightdirect.com/wdpassport', '2020-01-30 06:49:06', '2020-01-30 11:02:35', NULL, 0, NULL, NULL, NULL, '2020-01-30 11:00:57', 'GBP', 'OaKoLnI9hmkiXVo2BpkFZ5J4Po6sLhdB781QGn1i.pdf', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `item_id`, `user_id`, `note`, `created_at`, `updated_at`, `deleted_at`, `order_id`, `url`) VALUES
(228, 39, 2, 'All done', '2020-01-30 10:30:49', '2020-01-30 10:30:49', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(229, 39, 2, 'All done 2', '2020-01-30 10:32:14', '2020-01-30 10:32:14', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(230, 39, 2, 'All done 3', '2020-01-30 10:33:29', '2020-01-30 10:33:29', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(215, 37, 2, 'Please ensure sit includes a shelf', '2020-01-30 06:33:03', '2020-01-30 06:33:03', NULL, '5A9EEC96F321C939A4F2210D1C99BD98', NULL),
(216, 38, 2, 'Open to alternatives', '2020-01-30 06:33:03', '2020-01-30 06:33:03', NULL, '5A9EEC96F321C939A4F2210D1C99BD98', NULL),
(217, 39, 2, 'Americano', '2020-01-30 06:35:28', '2020-01-30 06:35:28', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', NULL),
(218, 35, 2, 'As per attached quote', '2020-01-30 06:54:01', '2020-01-30 06:54:01', NULL, '04D10CFB5F92DF01DBFECDBDFA3591EA', NULL),
(219, 1, 2, 'Not flexible on outbound times', '2020-01-30 06:56:19', '2020-01-30 06:56:19', NULL, 'C1DC10CA04FE417B1AFE2A69691A1F8D', NULL),
(220, 2, 2, 'Flexible on return times by 1 hr', '2020-01-30 06:57:14', '2020-01-30 06:57:14', NULL, '23F3CA90183E04C95862A61A13E485AA', NULL),
(221, 3, 2, 'Late check in on 15th', '2020-01-30 06:58:02', '2020-01-30 06:58:02', NULL, '87A76330135BF08F36D8FE01D56972C2', NULL),
(222, 4, 2, 'Flexible on return times by 1 hr', '2020-01-30 06:58:42', '2020-01-30 06:58:42', NULL, '13B07D767239BA271129E673BF84B5AC', NULL),
(223, 1, 2, '7 seater due to passenger count', '2020-01-30 07:05:46', '2020-01-30 07:05:46', NULL, '99D5681302385BB7BBBF668CB27CBF48', NULL),
(224, 2, 2, '7 seater due to passenger count', '2020-01-30 07:06:47', '2020-01-30 07:06:47', NULL, 'EDCDA9AD075D28DA097ECFAB959680A0', NULL),
(225, 39, 2, 'No Americano so ordered Latte Pods', '2020-01-30 08:33:32', '2020-01-30 08:33:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(226, 37, 2, 'Shelf ordered with oven', '2020-01-30 08:37:31', '2020-01-30 08:37:31', NULL, '5A9EEC96F321C939A4F2210D1C99BD98', 'catalogue/5A9EEC96F321C939A4F2210D1C99BD98'),
(227, 39, 2, 'I only received 4 out of the 5 boxes', '2020-01-30 10:05:02', '2020-01-30 10:05:02', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(231, 39, 2, 'All done 4', '2020-01-30 10:33:52', '2020-01-30 10:33:52', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(232, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(233, 38, 2, 'Thank you', '2020-01-30 10:40:30', '2020-01-30 10:40:30', NULL, '5A9EEC96F321C939A4F2210D1C99BD98', 'catalogue/5A9EEC96F321C939A4F2210D1C99BD98'),
(234, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(235, 38, 2, 'Thank you', '2020-01-30 10:40:30', '2020-01-30 10:40:30', NULL, '5A9EEC96F321C939A4F2210D1C99BD98', 'catalogue/5A9EEC96F321C939A4F2210D1C99BD98'),
(236, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(237, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(238, 38, 2, 'Thank you', '2020-01-30 10:40:30', '2020-01-30 10:40:30', NULL, '5A9EEC96F321C939A4F2210D1C99BD98', 'catalogue/5A9EEC96F321C939A4F2210D1C99BD98'),
(239, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(240, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(241, 38, 2, 'Thank you', '2020-01-30 10:40:30', '2020-01-30 10:40:30', NULL, '5A9EEC96F321C939A4F2210D1C99BD98', 'catalogue/5A9EEC96F321C939A4F2210D1C99BD98'),
(242, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(243, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(244, 35, 2, 'All done- (scroll bar showing here)', '2020-01-30 10:47:09', '2020-01-30 10:47:09', NULL, '04D10CFB5F92DF01DBFECDBDFA3591EA', 'none-catalogue/04D10CFB5F92DF01DBFECDBDFA3591EA'),
(245, 34, 2, 'I can\'t authorise 10 so have placed an order for 5 USBs', '2020-01-30 10:59:20', '2020-01-30 10:59:20', NULL, '8BD1AEB1952BC4C9F1F6C2FE328A7ED4', 'none-catalogue/8BD1AEB1952BC4C9F1F6C2FE328A7ED4'),
(246, 5, 2, 'Slight variane in departure time- 7:15am instead of 7am', '2020-01-30 11:27:33', '2020-01-30 11:27:33', NULL, '1B4E20A9BD643ADEA29F436A346601DF', 'key-travel/eurostar'),
(247, 2, 2, 'Have you arranged 7 seater?', '2020-01-30 11:31:33', '2020-01-30 11:31:33', NULL, 'EDCDA9AD075D28DA097ECFAB959680A0', 'car-hire/EDCDA9AD075D28DA097ECFAB959680A0'),
(248, 39, 2, 'All done 5', '2020-01-30 10:35:32', '2020-01-30 10:35:32', NULL, '57B0BBA429F018972BF4CB9AAE19F76F', 'catalogue/57B0BBA429F018972BF4CB9AAE19F76F'),
(249, 42, 2, 'Tan brown colour please', '2020-01-30 12:11:41', '2020-01-30 12:11:41', NULL, '840C5524F01ADEE2283141B6C591228D', NULL),
(250, 45, 1, 'In red please- with x500 free pods', '2020-01-30 12:22:10', '2020-01-30 12:22:10', NULL, '5A6B73632EC35A18EAC7C388971BA306', NULL),
(251, 47, 2, '53535', '2020-01-30 12:53:21', '2020-01-30 12:53:21', NULL, 'FF04271F75F0C92DB588A5CEF02C3303', NULL),
(252, 37, 1, 'i need them for fun', '2020-01-30 20:06:48', '2020-01-30 20:06:48', NULL, '00C248DECEAEEFE5364A85DB9205748B', NULL),
(253, 48, 1, 'for the kids', '2020-01-30 20:08:13', '2020-01-30 20:08:13', NULL, 'D92E3FBDCEA3C8A8F08E03D62D7D40DD', NULL),
(254, 49, 1, 'for myself', '2020-01-30 20:08:13', '2020-01-30 20:08:13', NULL, 'D92E3FBDCEA3C8A8F08E03D62D7D40DD', NULL),
(255, 50, 2, 'Clear not black', '2020-01-31 06:00:15', '2020-01-31 06:00:15', NULL, '99FF4D2FBE0E3CB22C06BA7EF9E83887', NULL),
(256, 38, 2, 'This is bespoke package', '2020-01-31 06:01:40', '2020-01-31 06:01:40', NULL, '91C69C2546467D1B5176138C2F4ABAA1', NULL),
(257, 50, 2, 'CLEAR BOXES ORDERED AS PER REUEST', '2020-01-31 06:07:01', '2020-01-31 06:07:01', NULL, '99FF4D2FBE0E3CB22C06BA7EF9E83887', 'catalogue/99FF4D2FBE0E3CB22C06BA7EF9E83887'),
(258, 38, 2, 'Added to justification for buying team', '2020-01-31 06:09:40', '2020-01-31 06:09:40', NULL, '91C69C2546467D1B5176138C2F4ABAA1', 'none-catalogue/91C69C2546467D1B5176138C2F4ABAA1'),
(259, 12, 1, 'i went over the dinner allowence by £3', '2020-01-31 06:12:30', '2020-01-31 06:12:30', NULL, '3B4E5D9D74D95E8499C768060F9D2B9D', NULL),
(260, 2, 1, 'Urgent order', '2020-01-31 06:12:51', '2020-01-31 06:12:51', NULL, 'A3CADC7EC50FCDD50803E0B8F65F8017', NULL),
(261, 6, 1, 'Urghent booking travelling tomorrow', '2020-01-31 06:13:36', '2020-01-31 06:13:36', NULL, '87D440C338A34F3EF0A96A02FB29F92B', NULL),
(262, 48, 2, 'item not in stroick, place order in 2 days again', '2020-01-31 06:16:48', '2020-01-31 06:16:48', NULL, 'D92E3FBDCEA3C8A8F08E03D62D7D40DD', 'catalogue/D92E3FBDCEA3C8A8F08E03D62D7D40DD'),
(263, 50, 2, 'TEsting Testing', '2020-01-31 06:18:01', '2020-01-31 06:18:01', NULL, '99FF4D2FBE0E3CB22C06BA7EF9E83887', 'catalogue/99FF4D2FBE0E3CB22C06BA7EF9E83887'),
(264, 2, 1, 'no stock in stores', '2020-01-31 06:23:34', '2020-01-31 06:23:34', NULL, 'A3CADC7EC50FCDD50803E0B8F65F8017', 'stores/A3CADC7EC50FCDD50803E0B8F65F8017'),
(265, 37, 1, '1 itme was damaged', '2020-01-31 06:24:25', '2020-01-31 06:24:25', NULL, '00C248DECEAEEFE5364A85DB9205748B', 'none-catalogue/00C248DECEAEEFE5364A85DB9205748B'),
(266, 49, 2, 'item has been reoredderd', '2020-01-31 06:31:01', '2020-01-31 06:31:01', NULL, 'D92E3FBDCEA3C8A8F08E03D62D7D40DD', 'catalogue/D92E3FBDCEA3C8A8F08E03D62D7D40DD'),
(267, 3, 2, 'Urgent order', '2020-02-07 12:15:22', '2020-02-07 12:15:22', NULL, '1C8815844D35289AF94F172FC0878750', NULL),
(268, 3, 2, 'Item not in stock', '2020-02-07 12:16:53', '2020-02-07 12:16:53', NULL, '1C8815844D35289AF94F172FC0878750', 'stores/1C8815844D35289AF94F172FC0878750'),
(269, 3, 2, 'Reorder order when in stock', '2020-02-07 12:17:25', '2020-02-07 12:17:25', NULL, '1C8815844D35289AF94F172FC0878750', 'stores/1C8815844D35289AF94F172FC0878750');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_status`
--

CREATE TABLE `order_item_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_item_status`
--

INSERT INTO `order_item_status` (`id`, `text`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Confirm', '2019-11-26 06:21:03', '2019-11-26 06:21:03', NULL),
(2, 'Reject', '2019-11-26 06:21:03', '2019-11-26 06:21:03', NULL),
(3, 'Ammend', '2019-11-26 06:21:03', '2019-11-26 06:21:03', NULL),
(4, 'Not Received', '2019-11-26 06:21:03', '2019-11-26 06:21:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partner_accounts`
--

CREATE TABLE `partner_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_partners`
--

CREATE TABLE `project_partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projectnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grant_administered_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_category_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direct_dial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_partners`
--

INSERT INTO `project_partners` (`id`, `user_id`, `project_role`, `projectnumber`, `grant_administered_by`, `organisation_size`, `organisation_type`, `cost_category_type`, `organisation_name`, `address1`, `address2`, `city`, `postcode`, `project_start_date`, `telephone`, `direct_dial`, `created_at`, `updated_at`, `deleted_at`, `logo`) VALUES
(13, 16, 'owner', '231654', 'Faraday', 'Big', 'Academic', NULL, 'University of Birmingham', 'lkjd', 'lkjdl', 'lkj', 'lkj', '2018-03-01', NULL, '23456789', '2020-01-23 01:38:27', '2020-01-27 11:48:24', NULL, 'partner-logos/Birmingham.png'),
(14, 17, 'Grant Holder', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'University of Birmingham', 'Edgbaston', NULL, 'Birmingham', 'B15 2TT', '2018-03-01', NULL, '0121 414 5173', '2020-01-27 11:51:20', '2020-01-27 11:51:20', NULL, 'partner-logos/Birmingham.png'),
(15, 18, 'Collaborator', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'Newcastle University', NULL, NULL, 'Newcastle Upon Tyne', 'NE11 7RE', '2018-03-01', NULL, '0191 637 63637', '2020-01-27 11:52:56', '2020-01-27 11:52:56', NULL, 'partner-logos/Newcastle.png'),
(16, 19, 'Collaborator', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'University of Leicester', 'University Road', NULL, 'Leicester', 'LL63 8BH', '2018-03-01', NULL, '01762 736 74644', '2020-01-27 11:58:08', '2020-01-27 11:58:08', NULL, 'partner-logos/leicester.png'),
(17, 20, 'Collaborator', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'University of Liverpool', NULL, NULL, 'Liverpool', 'LI83 3HB', '2018-03-01', NULL, '0164 3746 447', '2020-01-27 12:03:00', '2020-01-27 12:03:00', NULL, 'partner-logos/Liverpool.png'),
(18, 21, 'Collaborator', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'University of Edinburgh', NULL, NULL, 'Edinburgh', 'ED6 76GH', '2018-03-01', NULL, '01736 362 2727', '2020-01-27 12:05:45', '2020-01-27 12:05:45', NULL, 'partner-logos/Edin.png'),
(19, 22, 'Collaborator', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'Oxford Brookes University', NULL, NULL, 'Oxford', 'OX82 7HJ', '2018-03-01', NULL, '01726 263 3733', '2020-01-27 12:07:14', '2020-01-27 12:07:14', NULL, 'partner-logos/Oxford.png'),
(20, 23, 'Collaborator', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'Cardiff University', NULL, NULL, 'Cardiff', 'CD8 8HG', '2018-03-01', NULL, '01283 4748 2828', '2020-01-27 12:08:55', '2020-01-27 12:08:55', NULL, 'partner-logos/cardiff.png'),
(21, 24, 'Collaborator', '231654', 'Faraday Institution', NULL, 'Academic', NULL, 'Diamond Light Source', NULL, NULL, 'Oxford', 'OX11 7RE', '2018-03-01', NULL, NULL, '2020-01-27 12:11:06', '2020-01-27 12:11:06', NULL, 'partner-logos/Diamon.png');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id`, `user_id`, `ip`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, '85.211.21.226', '2020-01-30 04:19:41', '2020-01-30 04:19:41', NULL),
(2, 2, '85.211.21.226', '2020-01-30 04:21:14', '2020-01-30 04:21:14', NULL),
(3, 2, '85.211.21.226', '2020-01-30 05:41:53', '2020-01-30 05:41:53', NULL),
(4, 2, '85.211.21.226', '2020-01-30 05:43:12', '2020-01-30 05:43:12', NULL),
(5, 17, '85.211.21.226', '2020-01-30 07:13:50', '2020-01-30 07:13:50', NULL),
(6, 2, '85.211.21.226', '2020-01-30 07:22:45', '2020-01-30 07:22:45', NULL),
(7, 17, '85.211.21.226', '2020-01-30 08:36:50', '2020-01-30 08:36:50', NULL),
(8, 17, '85.211.21.226', '2020-01-30 09:20:03', '2020-01-30 09:20:03', NULL),
(9, 2, '85.211.21.226', '2020-01-30 10:09:44', '2020-01-30 10:09:44', NULL),
(10, 2, '5.69.32.155', '2020-01-30 10:10:51', '2020-01-30 10:10:51', NULL),
(11, 2, '85.211.21.226', '2020-01-30 10:24:45', '2020-01-30 10:24:45', NULL),
(12, 2, '85.211.21.226', '2020-01-30 10:49:32', '2020-01-30 10:49:32', NULL),
(13, 2, '85.211.21.226', '2020-01-30 11:48:21', '2020-01-30 11:48:21', NULL),
(14, 2, '85.211.21.226', '2020-01-30 11:59:44', '2020-01-30 11:59:44', NULL),
(15, 2, '85.211.21.226', '2020-01-30 12:15:29', '2020-01-30 12:15:29', NULL),
(16, 2, '85.211.21.226', '2020-01-30 12:16:48', '2020-01-30 12:16:48', NULL),
(17, 2, '85.211.21.226', '2020-01-30 12:17:58', '2020-01-30 12:17:58', NULL),
(18, 1, '85.211.21.226', '2020-01-30 12:21:39', '2020-01-30 12:21:39', NULL),
(19, 2, '85.211.21.226', '2020-01-30 12:23:19', '2020-01-30 12:23:19', NULL),
(20, 1, '85.211.21.226', '2020-01-30 12:24:29', '2020-01-30 12:24:29', NULL),
(21, 2, '85.211.21.226', '2020-01-30 12:28:59', '2020-01-30 12:28:59', NULL),
(22, 2, '85.211.21.226', '2020-01-30 12:34:31', '2020-01-30 12:34:31', NULL),
(23, 2, '85.211.21.226', '2020-01-30 12:40:31', '2020-01-30 12:40:31', NULL),
(24, 2, '85.211.21.226', '2020-01-30 12:51:45', '2020-01-30 12:51:45', NULL),
(25, 1, '82.47.209.195', '2020-01-30 19:58:46', '2020-01-30 19:58:46', NULL),
(26, 2, '86.2.152.72', '2020-01-31 05:03:45', '2020-01-31 05:03:45', NULL),
(27, 2, '85.211.21.226', '2020-01-31 05:58:56', '2020-01-31 05:58:56', NULL),
(28, 2, '86.2.152.72', '2020-01-31 06:07:32', '2020-01-31 06:07:32', NULL),
(29, 1, '86.2.152.72', '2020-01-31 06:10:39', '2020-01-31 06:10:39', NULL),
(30, 2, '86.2.152.72', '2020-01-31 06:13:44', '2020-01-31 06:13:44', NULL),
(31, 1, '86.2.152.72', '2020-01-31 06:20:59', '2020-01-31 06:20:59', NULL),
(32, 2, '86.2.152.72', '2020-01-31 06:28:30', '2020-01-31 06:28:30', NULL),
(33, 1, '86.2.152.72', '2020-01-31 06:34:07', '2020-01-31 06:34:07', NULL),
(34, 2, '86.2.152.72', '2020-01-31 06:34:54', '2020-01-31 06:34:54', NULL),
(35, 2, '86.2.152.72', '2020-02-06 07:26:01', '2020-02-06 07:26:01', NULL),
(36, 2, '89.242.16.24', '2020-02-06 10:36:53', '2020-02-06 10:36:53', NULL),
(37, 17, '89.242.16.24', '2020-02-06 10:47:59', '2020-02-06 10:47:59', NULL),
(38, 2, '89.242.16.24', '2020-02-06 10:48:54', '2020-02-06 10:48:54', NULL),
(39, 2, '89.242.16.24', '2020-02-07 12:13:31', '2020-02-07 12:13:31', NULL),
(40, 2, '82.47.209.195', '2020-02-15 07:35:04', '2020-02-15 07:35:04', NULL),
(41, 2, '86.2.152.72', '2020-02-20 09:21:53', '2020-02-20 09:21:53', NULL),
(42, 2, '86.2.152.72', '2020-02-20 09:22:20', '2020-02-20 09:22:20', NULL),
(43, 18, '86.2.152.72', '2020-02-20 09:26:36', '2020-02-20 09:26:36', NULL),
(44, 2, '86.2.152.72', '2020-02-20 09:27:18', '2020-02-20 09:27:18', NULL),
(45, 2, '85.211.28.151', '2020-02-20 12:07:41', '2020-02-20 12:07:41', NULL),
(46, 2, '82.47.209.195', '2020-02-20 20:30:13', '2020-02-20 20:30:13', NULL),
(47, 2, '82.47.209.195', '2020-02-21 16:59:46', '2020-02-21 16:59:46', NULL),
(48, 2, '82.47.209.195', '2020-02-22 21:05:47', '2020-02-22 21:05:47', NULL),
(49, 2, '103.137.15.12', '2020-02-22 21:28:42', '2020-02-22 21:28:42', NULL),
(50, 24, '82.47.209.195', '2020-02-22 21:31:43', '2020-02-22 21:31:43', NULL),
(51, 24, '103.137.15.12', '2020-02-22 21:33:01', '2020-02-22 21:33:01', NULL),
(52, 2, '127.0.0.1', '2020-02-23 09:45:44', '2020-02-23 09:45:44', NULL),
(53, 24, '127.0.0.1', '2020-02-23 09:49:07', '2020-02-23 09:49:07', NULL),
(54, 2, '127.0.0.1', '2020-02-23 09:51:05', '2020-02-23 09:51:05', NULL),
(55, 2, '127.0.0.1', '2020-02-23 10:38:11', '2020-02-23 10:38:11', NULL),
(56, 24, '127.0.0.1', '2020-02-23 11:42:52', '2020-02-23 11:42:52', NULL),
(57, 2, '127.0.0.1', '2020-02-23 12:47:34', '2020-02-23 12:47:34', NULL),
(58, 24, '127.0.0.1', '2020-02-23 13:57:36', '2020-02-23 13:57:36', NULL),
(59, 2, '127.0.0.1', '2020-02-23 14:10:04', '2020-02-23 14:10:04', NULL),
(60, 24, '127.0.0.1', '2020-02-23 15:06:28', '2020-02-23 15:06:28', NULL),
(61, 24, '127.0.0.1', '2020-02-23 15:20:19', '2020-02-23 15:20:19', NULL),
(62, 2, '127.0.0.1', '2020-02-23 15:34:42', '2020-02-23 15:34:42', NULL),
(63, 2, '127.0.0.1', '2020-02-23 15:39:09', '2020-02-23 15:39:09', NULL),
(64, 2, '127.0.0.1', '2020-02-23 16:01:51', '2020-02-23 16:01:51', NULL),
(65, 2, '127.0.0.1', '2020-02-23 16:05:55', '2020-02-23 16:05:55', NULL),
(66, 24, '127.0.0.1', '2020-02-23 16:50:36', '2020-02-23 16:50:36', NULL),
(67, 2, '127.0.0.1', '2020-02-23 12:13:04', '2020-02-23 12:13:04', NULL),
(68, 24, '127.0.0.1', '2020-02-23 12:13:38', '2020-02-23 12:13:38', NULL),
(69, 2, '127.0.0.1', '2020-02-23 12:30:16', '2020-02-23 12:30:16', NULL),
(70, 24, '127.0.0.1', '2020-02-24 01:21:44', '2020-02-24 01:21:44', NULL),
(71, 2, '127.0.0.1', '2020-02-24 12:44:33', '2020-02-24 12:44:33', NULL),
(72, 24, '127.0.0.1', '2020-02-24 12:50:57', '2020-02-24 12:50:57', NULL),
(73, 2, '127.0.0.1', '2020-02-24 13:32:46', '2020-02-24 13:32:46', NULL),
(74, 2, '127.0.0.1', '2020-02-24 13:44:04', '2020-02-24 13:44:04', NULL),
(75, 24, '127.0.0.1', '2020-02-24 13:46:36', '2020-02-24 13:46:36', NULL),
(76, 24, '127.0.0.1', '2020-02-24 15:21:08', '2020-02-24 15:21:08', NULL),
(77, 24, '127.0.0.1', '2020-02-24 17:09:52', '2020-02-24 17:09:52', NULL),
(78, 2, '127.0.0.1', '2020-02-24 22:06:25', '2020-02-24 22:06:25', NULL),
(79, 24, '127.0.0.1', '2020-02-24 22:20:10', '2020-02-24 22:20:10', NULL),
(80, 24, '127.0.0.1', '2020-02-25 00:29:11', '2020-02-25 00:29:11', NULL),
(81, 24, '127.0.0.1', '2020-02-25 01:39:40', '2020-02-25 01:39:40', NULL),
(82, 2, '127.0.0.1', '2020-02-25 01:45:14', '2020-02-25 01:45:14', NULL),
(83, 24, '127.0.0.1', '2020-02-25 02:08:03', '2020-02-25 02:08:03', NULL),
(84, 24, '127.0.0.1', '2020-02-25 13:00:47', '2020-02-25 13:00:47', NULL),
(85, 2, '127.0.0.1', '2020-02-25 13:12:23', '2020-02-25 13:12:23', NULL),
(86, 24, '127.0.0.1', '2020-02-25 20:05:07', '2020-02-25 20:05:07', NULL),
(87, 24, '127.0.0.1', '2020-02-25 21:27:40', '2020-02-25 21:27:40', NULL),
(88, 2, '127.0.0.1', '2020-02-25 21:27:59', '2020-02-25 21:27:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_received` int(11) NOT NULL DEFAULT 0,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `placed_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `admin_id`, `order_id`, `item_type`, `description`, `qty`, `qty_received`, `price`, `total`, `placed_at`, `completed_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 2, 'EDA27A906DAB2D3E07BB9492E2292E3D', 'general', 'Sample bottle', 5, 4, '5.00', '20.00', '2020-01-30 12:18:54', '2020-01-30 12:21:00', '2020-01-30 07:25:38', '2020-01-30 12:21:00', NULL),
(2, 1, 2, 'A3CADC7EC50FCDD50803E0B8F65F8017', 'lab', 'acid for testing', 1, 3, '20.00', '60.00', '2020-01-31 06:18:04', '2020-01-31 06:33:21', '2020-01-31 06:12:51', '2020-01-31 06:33:21', NULL),
(3, 2, 2, '1C8815844D35289AF94F172FC0878750', 'lab', 'Acid', 4, 0, '0.00', '0.00', '2020-02-07 12:16:09', '2020-02-07 12:17:28', '2020-02-07 12:15:22', '2020-02-07 12:17:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `from_station` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_station` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `open_return` tinyint(4) NOT NULL DEFAULT 0,
  `key_travel_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ltc_14` tinyint(4) NOT NULL DEFAULT 0,
  `ltc_16` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `parent_id`, `from_station`, `to_station`, `departure_date`, `departure_time`, `return_date`, `return_time`, `open_return`, `key_travel_id`, `value`, `created_at`, `updated_at`, `deleted_at`, `ltc_14`, `ltc_16`) VALUES
(1, 1, 'Birmingham New Street', 'London Euston', '2020-02-10', '10:00:00', NULL, NULL, 1, 'KT17283638', '200.00', '2020-01-30 06:56:19', '2020-01-30 11:04:23', NULL, 1, 0),
(2, 2, 'Birmingham New Street', 'Glasgow', '2020-02-15', '10:00:00', '2020-02-17', '18:00:00', 0, 'KT2387430', '150.00', '2020-01-30 06:57:14', '2020-01-30 11:05:01', NULL, 0, 0),
(3, 6, 'bitrmingham', 'Lodon', '2020-02-01', '22:22:00', NULL, NULL, 0, NULL, '0.00', '2020-01-31 06:13:36', '2020-01-31 06:13:36', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisition_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national` tinyint(4) NOT NULL DEFAULT 0,
  `international` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `org_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` decimal(8,2) NOT NULL DEFAULT 0.00,
  `new_supplier` tinyint(4) NOT NULL DEFAULT 0,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placed_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uob_alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_department_location_id` int(11) DEFAULT NULL,
  `partner` tinyint(4) NOT NULL DEFAULT 0,
  `supplier` tinyint(4) NOT NULL DEFAULT 0,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_view` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `address`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `project_num`, `project_name`, `job_title`, `uob_alias`, `telephone`, `mobile_num`, `primary_department_location_id`, `partner`, `supplier`, `signature`, `admin_view`) VALUES
(1, 'Laura Driscoll', 'user@live.com', NULL, '', 0, NULL, '$2y$10$KmcEumv.LP5LMqV2gdaa.eO63aEUw8eISnWdwNVr7hbtFfmVzlhMC', 'cKiIowgfU96eu0abOSS8gIZu7D9FiJI2QsZKswDr0hkotgzDvee6avCBajRm', '2019-10-25 09:51:20', '2020-01-09 01:32:59', '876876', 'ReLib', 'Researcher', 'None', '0121 4458859', '07885411458', 3, 0, 0, NULL, 1),
(2, 'Julia Roberts', 'admin@live.com', NULL, '', 1, NULL, '$2y$10$KmcEumv.LP5LMqV2gdaa.eO63aEUw8eISnWdwNVr7hbtFfmVzlhMC', 'wnjIIcVugZvZq8YLM1TJYVJjZcuqmVGEynYj4rdoHwTK1iVzhrMnl6sfjSX7', '2019-10-25 09:51:20', '2020-02-23 09:48:33', '20789', 'ReLib', 'Project Manager', 'JRob', '0121 5568 7748', '07445522698', 1, 0, 0, 'PRte9TUZlPCvWY6FboCaOQBAFTQypfRoPeVzL7qA.png', 1),
(20, 'Sandra J', 'relib@liverpool.com', 'Sandra.J@liv.ac.uk', NULL, 0, NULL, '$2y$10$jEgeeXjIE0VywYVrVL2guezzrjwlEjsSi3VT7nuB.hxtUASeP9jhO', 'sdPaAOeJ13zlCEF80exGbzumFboe4tlffGjGMrlMecdc3LYXFugBShjgohdZ', '2020-01-27 12:03:00', '2020-01-27 12:03:53', '20789', 'ReLiB', 'Finance Admin', NULL, '01273 3847 474', '073847343847', NULL, 1, 0, NULL, 1),
(17, 'Amy B', 'relib@Birmingham.com', 'Amy.B@bham.ac.uk', NULL, 0, NULL, '$2y$10$EXqMkjAHfoKHJhsuicHhr.dtq8Wu1E2pzf7PN5PoGawM2PE88YxPi', 't8qUTbQw0K4LcIaq8VjKQjysBLsnVwPcevLyHu1lc4qtjv8eSjN6lNSfiBss', '2020-01-27 11:51:20', '2020-01-27 12:03:37', '20789', 'ReLiB', 'Project Admin', NULL, NULL, NULL, NULL, 1, 0, NULL, 1),
(18, 'Sarah F', 'relib@newcastle.com', 'Sarah.F@newcastle.ac.uk', NULL, 0, NULL, '$2y$10$ecXS/dyBinUVLZSiLtR3Z.GMVSPdSVdjG/EA5cDSuljPIAq/vX0n.', 'zyG12RL5Z8w42d6zAfhXqpXS3fuM8uaVYQkDyii58lRwyrxeYPkKnPXaTRAD', '2020-01-27 11:52:56', '2020-01-27 11:52:56', '20789', 'ReLiB', 'Finance Admin', NULL, '0191 765 8746', NULL, NULL, 1, 0, NULL, 1),
(19, 'Louis S', 'relib@leicester.com', 'Louis.S@leicester.ac.uk', NULL, 0, NULL, '$2y$10$PeAwEWm3sD3yQ8giv2q6ues0uIrnq8TtPK4VD6s1F4YQPheIL1gJ6', NULL, '2020-01-27 11:58:08', '2020-01-27 12:03:26', '20789', 'ReLiB', 'Finance Admin', NULL, NULL, '07898765457', NULL, 1, 0, NULL, 1),
(21, 'Bob B', 'relib@edinburgh.com', 'Bob.B@Edinburgh.ac.uk', NULL, 0, NULL, '$2y$10$SGujQDqd04GR7WNIBUdT9.b/grhK1YcYy/Tsnda3etXA9rCQWVWUe', NULL, '2020-01-27 12:05:45', '2020-01-27 12:05:45', '20789', 'ReLiB', 'Finance Admin', NULL, NULL, NULL, NULL, 1, 0, NULL, 1),
(22, 'Allan D', 'relib@obu.com', 'Allan.D@Obu.ac.uk', NULL, 0, NULL, '$2y$10$sHwkBYEJuuKf21R5DLNtheMRmZL7FDJsO/5..hJXsTuDXFdXf7qy2', NULL, '2020-01-27 12:07:14', '2020-01-27 12:07:14', '20789', 'ReLiB', 'Finance Admin', NULL, NULL, '078933728292', NULL, 1, 0, NULL, 1),
(23, 'Ali G', 'relib@cardiff.com', 'Ali.G@cardiff.ac.uk', NULL, 0, NULL, '$2y$10$sHAmQLALpEFQbYbpSu7r6upCt3niSfPM3wN4U5tBms8W641Lyo0zi', NULL, '2020-01-27 12:08:55', '2020-01-27 12:08:55', '20789', 'ReLiB', 'Finance Admin', NULL, NULL, '078392837', NULL, 1, 0, NULL, 1),
(24, 'Haych H', 'relib@dls.com', 'Haych.H@dls.ac.uk', NULL, 0, NULL, '$2y$10$KmcEumv.LP5LMqV2gdaa.eO63aEUw8eISnWdwNVr7hbtFfmVzlhMC', '88RdqABWE1K9s4ZsIpc1fZxur1PsM88HubO1Z3lMsRPgNfLXG6v1BAVPNUwy', '2020-01-27 12:11:06', '2020-01-27 12:11:06', '20789', 'ReLiB', 'Finance Admin', NULL, NULL, NULL, NULL, 1, 0, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_month_index` (`month`);

--
-- Indexes for table `car_hire`
--
ALTER TABLE `car_hire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogue_orders`
--
ALTER TABLE `catalogue_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claim_partner_id_index` (`partner_id`);

--
>>>>>>> a0eb8bb19d210f70346d440c9db605f8660f39c1
-- Indexes for table `claim_new`
--
ALTER TABLE `claim_new`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
=======
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eurostar`
--
ALTER TABLE `eurostar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_travel`
--
ALTER TABLE `key_travel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_catalogue_orders`
--
ALTER TABLE `non_catalogue_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `order_item_status`
--
ALTER TABLE `order_item_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_accounts`
--
ALTER TABLE `partner_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `project_partners`
--
ALTER TABLE `project_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
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
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `car_hire`
--
ALTER TABLE `car_hire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catalogue_orders`
--
ALTER TABLE `catalogue_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
>>>>>>> a0eb8bb19d210f70346d440c9db605f8660f39c1

--
-- AUTO_INCREMENT for table `claim_new`
--
ALTER TABLE `claim_new`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=578;

--
<<<<<<< HEAD

=======
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eurostar`
--
ALTER TABLE `eurostar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `key_travel`
--
ALTER TABLE `key_travel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `non_catalogue_orders`
--
ALTER TABLE `non_catalogue_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `order_item_status`
--
ALTER TABLE `order_item_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `partner_accounts`
--
ALTER TABLE `partner_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_partners`
--
ALTER TABLE `project_partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
>>>>>>> a0eb8bb19d210f70346d440c9db605f8660f39c1
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
