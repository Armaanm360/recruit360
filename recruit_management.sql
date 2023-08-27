-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 05:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruit_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` bigint(20) DEFAULT NULL,
  `account_bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` bigint(20) DEFAULT NULL,
  `account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_type`, `account_number`, `account_bank_name`, `account_branch_name`, `account_balance`, `account_status`, `account_create_date`, `account_has_deleted`, `created_at`, `updated_at`) VALUES
(1, 'EBL', 'CASH', 1588484, 'Ebl', 'Uttara', '90000', 1, '2022-12-11', 'NO', '2022-11-20 03:13:53', '2022-12-11 03:28:58'),
(2, 'Western Bank', 'CASH', 54115151, 'Western Bank', 'Banani', '500000000', 1, '2022-12-11', 'NO', '2022-11-20 03:15:25', '2022-12-11 03:29:23'),
(3, 'NRBC Bank Limited', 'CASH', 441515415, 'NRBC Bank Limited', 'NRBC Bank Limited', NULL, 1, '2022-12-14', 'YES', '2022-12-13 22:19:13', '2022-12-13 22:32:46'),
(4, 'Premier Bank', 'CASH', 12511, 'Premier Bank', 'Premier Bank', NULL, 1, '2022-12-14', 'YES', '2022-12-13 22:22:58', '2022-12-13 22:32:42'),
(5, 'SouthEast Bank', 'CASH', 51051, 'SouthEast Bank', 'SouthEast Bank', NULL, 1, '2022-12-14', 'NO', '2022-12-13 22:33:09', '2022-12-13 22:33:09'),
(6, 'Zinia', 'CASH', 14515, 'Zinia', 'Zinia', NULL, 1, '2022-12-14', 'NO', '2022-12-13 23:50:50', '2022-12-13 23:50:50'),
(7, 'test account', 'CASH', 41145251155, 'test50000', 'test50000', NULL, 1, '2022-12-18', 'NO', '2022-12-17 21:30:25', '2022-12-17 21:30:25'),
(8, 'afffaaf', 'BANK', 5151515, 'fafafafa', 'faaffaaf', NULL, 1, '2023-05-09', 'NO', '2023-05-08 22:57:29', '2023-05-08 22:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `account_trasections`
--

CREATE TABLE `account_trasections` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'DEBIT OR CREDIT',
  `transaction_account_id` bigint(20) DEFAULT NULL,
  `transaction_client_id` bigint(20) DEFAULT NULL,
  `transaction_agent_id` int(11) DEFAULT NULL,
  `transaction_sponsor_id` int(11) DEFAULT NULL,
  `transaction_deligate_id` int(11) DEFAULT NULL,
  `transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_opening_balance` bigint(20) DEFAULT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `transaction_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_trasections`
--

INSERT INTO `account_trasections` (`transaction_id`, `transaction_type`, `transaction_account_id`, `transaction_client_id`, `transaction_agent_id`, `transaction_sponsor_id`, `transaction_deligate_id`, `transaction_amount`, `transaction_last_balance`, `transaction_opening_balance`, `transaction_date`, `transaction_note`, `transaction_create_date`, `transaction_has_deleted`, `transaction_deleted_by`, `created_at`, `updated_at`) VALUES
(3, 'advance', NULL, NULL, 13, NULL, NULL, '850008', NULL, NULL, '2022/11/17', NULL, '2022/11/17', 'NO', NULL, '2022-11-17 05:39:36', '2022-11-17 05:39:36'),
(4, 'ebc', NULL, NULL, 14, NULL, NULL, '5500', NULL, NULL, '2022/11/17', NULL, '2022/11/17', 'NO', NULL, '2022-11-17 05:46:41', '2022-11-17 05:46:41'),
(5, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 00:51:26', '2022-12-01 00:51:26'),
(6, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 00:53:38', '2022-12-01 00:53:38'),
(7, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 00:54:49', '2022-12-01 00:54:49'),
(8, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 00:55:03', '2022-12-01 00:55:03'),
(9, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 00:55:37', '2022-12-01 00:55:37'),
(10, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 00:56:06', '2022-12-01 00:56:06'),
(11, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 00:56:32', '2022-12-01 00:56:32'),
(12, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 01:00:03', '2022-12-01 01:00:03'),
(13, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 01:03:49', '2022-12-01 01:03:49'),
(14, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 01:04:31', '2022-12-01 01:04:31'),
(15, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 01:05:14', '2022-12-01 01:05:14'),
(16, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 01:08:14', '2022-12-01 01:08:14'),
(17, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 01:08:43', '2022-12-01 01:08:43'),
(18, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 01:10:39', '2022-12-01 01:10:39'),
(19, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', NULL, NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 02:18:53', '2022-12-01 02:18:53'),
(20, 'CREDIT', 1, 47, NULL, NULL, NULL, '550', '8800', NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 02:20:39', '2022-12-01 02:20:40'),
(21, 'CREDIT', 1, 45, NULL, NULL, NULL, '1000', '9800', NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 03:24:27', '2022-12-01 03:24:27'),
(22, 'CREDIT', 1, 42, NULL, NULL, NULL, '1500', '11300', NULL, '2022-12-01', NULL, '2022-12-01', 'NO', NULL, '2022-12-01 03:51:16', '2022-12-01 03:51:16'),
(23, 'CREDIT', 1, NULL, NULL, NULL, NULL, '1200', '12500', NULL, '2022-12-04', NULL, '2022-12-04', 'NO', NULL, '2022-12-03 23:00:11', '2022-12-03 23:00:11'),
(24, 'CREDIT', 1, NULL, NULL, NULL, NULL, '1200', '13700', NULL, '2022-12-04', NULL, '2022-12-04', 'NO', NULL, '2022-12-03 23:00:58', '2022-12-03 23:00:58'),
(25, 'CREDIT', 1, 42, NULL, NULL, NULL, '1500', '15200', NULL, '2022-12-04', NULL, '2022-12-04', 'NO', NULL, '2022-12-03 23:33:54', '2022-12-03 23:33:54'),
(26, 'CREDIT', 1, 42, NULL, NULL, NULL, '1500', '16700', NULL, '2022-12-04', NULL, '2022-12-04', 'NO', NULL, '2022-12-03 23:35:04', '2022-12-03 23:35:04'),
(27, 'CREDIT', 1, 42, NULL, NULL, NULL, '1500', '18200', NULL, '2022-12-04', NULL, '2022-12-04', 'NO', NULL, '2022-12-03 23:36:00', '2022-12-03 23:36:00'),
(28, 'CREDIT', 1, 42, NULL, NULL, NULL, '1500', '19700', NULL, '2022-12-04', NULL, '2022-12-04', 'NO', NULL, '2022-12-03 23:52:54', '2022-12-03 23:52:54'),
(29, 'CREDIT', 1, 41, NULL, NULL, NULL, '350', '20050', NULL, '2022-12-05', NULL, '2022-12-05', 'NO', NULL, '2022-12-04 22:19:12', '2022-12-04 22:19:12'),
(30, 'CREDIT', 1, 41, NULL, NULL, NULL, '750', '20800', NULL, '2022-12-05', NULL, '2022-12-05', 'NO', NULL, '2022-12-05 00:52:52', '2022-12-05 00:52:52'),
(31, 'CREDIT', 1, 43, NULL, NULL, NULL, '550', '21350', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:11:06', '2022-12-07 22:11:06'),
(32, 'CREDIT', 1, 43, NULL, NULL, NULL, '550', '21900', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:12:58', '2022-12-07 22:12:58'),
(33, 'CREDIT', 1, 42, NULL, NULL, NULL, '80', '21980', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 06:12:18', '2022-12-08 06:12:18'),
(34, 'CREDIT', 1, 43, NULL, NULL, NULL, '475', '22455', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 06:53:32', '2022-12-08 06:53:32'),
(35, 'CREDIT', 1, 89, NULL, NULL, NULL, '14000', '36455', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 20:58:15', '2022-12-10 20:58:15'),
(36, 'CREDIT', 1, 90, NULL, NULL, NULL, '8000', '44455', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:02:06', '2022-12-10 21:02:06'),
(37, 'CREDIT', 2, 91, NULL, NULL, NULL, '11000', '11000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:16:42', '2022-12-10 21:16:42'),
(38, 'CREDIT', 1, 92, NULL, NULL, NULL, '2000', '46455', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 23:25:31', '2022-12-10 23:25:31'),
(39, 'CREDIT', 1, 93, NULL, NULL, NULL, '2500', '48955', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 02:12:39', '2022-12-11 02:12:39'),
(40, 'CREDIT', 1, 94, NULL, NULL, NULL, '250', '49205', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:02:48', '2022-12-11 03:02:48'),
(41, 'CREDIT', 1, 95, NULL, NULL, NULL, '200', '49405', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:07:02', '2022-12-11 03:07:02'),
(42, 'CREDIT', 1, 96, NULL, NULL, NULL, '400', '49805', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:17:32', '2022-12-11 03:17:32'),
(43, 'CREDIT', 1, 97, NULL, NULL, NULL, '400', '50205', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:28:34', '2022-12-11 03:28:34'),
(44, 'CREDIT', 1, 97, NULL, NULL, NULL, '250', '50455', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:30:35', '2022-12-11 03:30:35'),
(45, 'CREDIT', 1, 98, NULL, NULL, NULL, '250', '50705', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:34:32', '2022-12-11 03:34:32'),
(46, 'CREDIT', 1, 99, NULL, NULL, NULL, '350', '51055', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:56:12', '2022-12-11 03:56:12'),
(47, 'CREDIT', 1, 99, NULL, NULL, NULL, '30', '51085', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:58:49', '2022-12-11 03:58:49'),
(48, 'CREDIT', 1, 99, NULL, NULL, NULL, '80', '51165', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 04:03:17', '2022-12-11 04:03:17'),
(49, 'CREDIT', 1, 99, NULL, NULL, NULL, '50', '51215', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 04:05:01', '2022-12-11 04:05:01'),
(50, 'CREDIT', 1, 100, NULL, NULL, NULL, '5000', '56215', NULL, '2022-12-12', NULL, '2022-12-12', 'NO', NULL, '2022-12-12 00:19:10', '2022-12-12 00:19:10'),
(51, 'CREDIT', 1, 100, NULL, NULL, NULL, '1000', '57215', NULL, '2022-12-12', NULL, '2022-12-12', 'NO', NULL, '2022-12-12 00:19:41', '2022-12-12 00:19:41'),
(52, 'CREDIT', 1, NULL, 37, NULL, NULL, '5000', '0', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:57:32', '2022-12-12 21:57:32'),
(53, 'CREDIT', 1, NULL, 29, NULL, NULL, '845700', '0', NULL, '2022-12-14', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 22:06:41', '2022-12-12 22:06:41'),
(54, 'CREDIT', 1, NULL, 29, NULL, NULL, '845700', '0', NULL, '2022-12-14', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 22:09:41', '2022-12-12 22:09:41'),
(55, 'CREDIT', 1, NULL, 29, NULL, NULL, '845700', '0', NULL, '2022-12-14', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 22:15:36', '2022-12-12 22:15:36'),
(56, 'CREDIT', 1, 101, NULL, NULL, NULL, '4000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 23:28:27', '2022-12-12 23:28:27'),
(57, 'CREDIT', 1, NULL, 40, NULL, NULL, '40000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 23:38:47', '2022-12-12 23:38:47'),
(58, 'CREDIT', 1, NULL, 35, NULL, NULL, '45800', '0', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 23:57:39', '2022-12-12 23:57:39'),
(59, 'CREDIT', 1, NULL, 35, NULL, NULL, '8600', '0', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:07:42', '2022-12-13 00:07:42'),
(60, 'CREDIT', 1, NULL, 40, NULL, NULL, '8506509', '0', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:17:20', '2022-12-13 00:17:20'),
(61, 'CREDIT', 1, NULL, 38, NULL, NULL, '95000', '0', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:48:01', '2022-12-13 00:48:01'),
(62, 'CREDIT', 1, NULL, 38, NULL, NULL, '485000', '0', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:51:25', '2022-12-13 00:51:25'),
(63, 'CREDIT', 1, NULL, 37, NULL, NULL, '7000', '0', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 03:36:58', '2022-12-13 03:36:58'),
(64, 'CREDIT', 1, NULL, 42, NULL, NULL, '17500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:16:50', '2022-12-13 22:16:50'),
(65, 'CREDIT', 3, NULL, 43, NULL, NULL, '70000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:20:06', '2022-12-13 22:20:06'),
(66, 'CREDIT', 4, NULL, 44, NULL, NULL, '50000', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:23:41', '2022-12-13 22:24:48'),
(67, 'CREDIT', 5, NULL, 46, NULL, NULL, '1000', '1000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:43:07', '2022-12-13 22:43:40'),
(68, 'CREDIT', 5, NULL, NULL, 4, NULL, '50000', '118586', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:17:05', '2022-12-14 05:42:12'),
(69, 'CREDIT', 5, NULL, NULL, 4, NULL, '50000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:18:24', '2022-12-13 23:18:24'),
(70, 'CREDIT', 5, NULL, NULL, 4, NULL, '8450', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:27:38', '2022-12-13 23:27:38'),
(71, 'CREDIT', 5, NULL, NULL, 4, NULL, '1136', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:32:26', '2022-12-13 23:32:26'),
(72, 'CREDIT', 2, NULL, NULL, 4, NULL, '4500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:33:42', '2022-12-13 23:33:42'),
(73, 'CREDIT', 1, NULL, NULL, 4, NULL, '4000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:35:09', '2022-12-13 23:35:09'),
(74, 'CREDIT', 1, NULL, NULL, 4, NULL, '436', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:36:37', '2022-12-13 23:36:37'),
(75, 'CREDIT', 2, NULL, NULL, 4, NULL, '44500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:37:32', '2022-12-13 23:37:32'),
(76, 'CREDIT', 1, NULL, NULL, 4, NULL, '48500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:39:39', '2022-12-13 23:39:39'),
(77, 'CREDIT', 2, NULL, NULL, 4, NULL, '48500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:40:29', '2022-12-13 23:40:29'),
(78, 'CREDIT', 1, NULL, NULL, 4, NULL, '5149', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:42:34', '2022-12-13 23:42:34'),
(79, 'CREDIT', 5, NULL, NULL, 4, NULL, '4000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:44:51', '2022-12-13 23:44:51'),
(80, 'CREDIT', 6, 102, NULL, NULL, NULL, '700', '700', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:52:56', '2022-12-13 23:52:56'),
(81, 'CREDIT', 6, NULL, NULL, 4, NULL, '800', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:33:46', '2022-12-14 00:33:46'),
(82, 'CREDIT', 6, NULL, NULL, 4, NULL, '800', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:33:58', '2022-12-14 00:33:58'),
(83, 'CREDIT', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:38:47', '2022-12-14 00:38:47'),
(84, 'CREDIT', 2, NULL, NULL, 4, NULL, '5775', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:39:07', '2022-12-14 00:39:07'),
(85, 'CREDIT', 2, NULL, NULL, 4, NULL, '1000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:39:30', '2022-12-14 00:39:30'),
(86, 'CREDIT', 1, NULL, NULL, 4, NULL, '-40000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:43:01', '2022-12-14 00:43:01'),
(87, 'CREDIT', 2, NULL, NULL, 4, NULL, '4000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:43:36', '2022-12-14 00:43:36'),
(88, 'CREDIT', 2, NULL, NULL, 4, NULL, '1000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:47:08', '2022-12-14 00:47:08'),
(89, 'CREDIT', 5, NULL, NULL, 4, NULL, '4000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 00:57:47', '2022-12-14 00:57:47'),
(90, 'CREDIT', 2, NULL, NULL, 4, NULL, '4000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 05:38:27', '2022-12-14 05:38:27'),
(91, 'CREDIT', 1, NULL, NULL, 4, NULL, '430', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 05:58:38', '2022-12-14 05:58:38'),
(92, 'CREDIT', 6, NULL, NULL, 3, NULL, '500', '2800', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 06:03:34', '2022-12-14 06:03:58'),
(93, 'CREDIT', 2, NULL, NULL, NULL, 2, '400', '124675', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 06:34:29', '2022-12-14 06:34:45'),
(94, 'CREDIT', 5, NULL, NULL, NULL, 1, '482', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 06:38:52', '2022-12-14 06:38:52'),
(95, 'CREDIT', 1, NULL, NULL, NULL, 3, '9000', '11836239', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-14 06:42:04', '2022-12-14 06:42:20'),
(96, 'CREDIT', 1, NULL, NULL, 6, NULL, '44481', '0', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, '2022-12-16 21:01:16', '2022-12-16 21:01:16'),
(97, 'CREDIT', 1, NULL, NULL, 6, NULL, '22000', '0', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, '2022-12-16 21:50:23', '2022-12-16 21:50:23'),
(98, 'CREDIT', 5, NULL, NULL, 5, NULL, '85000', '0', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, '2022-12-16 21:53:04', '2022-12-16 21:53:04'),
(99, 'CREDIT', 2, NULL, NULL, 6, NULL, '180', '0', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, '2022-12-16 21:54:26', '2022-12-16 21:54:26'),
(100, 'CREDIT', 2, NULL, NULL, 6, NULL, '730', '0', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, '2022-12-16 21:59:08', '2022-12-16 21:59:08'),
(101, 'CREDIT', 2, NULL, NULL, NULL, 4, '8000', '0', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, '2022-12-17 02:00:52', '2022-12-17 02:00:52'),
(102, 'CREDIT', 1, NULL, NULL, NULL, 5, '46000', '0', NULL, '2022-12-15', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 20:38:09', '2022-12-17 20:38:10'),
(103, 'CREDIT', 1, NULL, NULL, NULL, 5, '13000', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 20:38:34', '2022-12-17 20:38:34'),
(104, 'CREDIT', 6, 104, NULL, NULL, NULL, '1200', '4000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:10:16', '2022-12-17 21:10:16'),
(105, 'CREDIT', 6, 104, NULL, NULL, NULL, '100', '4100', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:11:16', '2022-12-17 21:11:16'),
(106, 'CREDIT', 6, 105, NULL, NULL, NULL, '400', '4500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:14:00', '2022-12-17 21:14:00'),
(107, 'CREDIT', 6, 105, NULL, NULL, NULL, '100', '4600', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:21:00', '2022-12-17 21:21:00'),
(108, 'DEBIT', 6, 105, NULL, NULL, NULL, '50', '4550', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:28:54', '2022-12-17 21:28:54'),
(109, 'CREDIT', 7, 106, NULL, NULL, NULL, '500', '500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:31:30', '2022-12-17 21:31:30'),
(110, 'DEBIT', 7, 106, NULL, NULL, NULL, '400', '100', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:33:49', '2022-12-17 21:33:49'),
(111, 'CREDIT', 7, 107, NULL, NULL, NULL, '500', '600', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:45:36', '2022-12-17 21:45:36'),
(112, 'DEBIT', 7, 107, NULL, NULL, NULL, '350', '250', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:46:36', '2022-12-17 21:46:36'),
(113, 'CREDIT', 7, 107, NULL, NULL, NULL, '1750', '2000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:48:51', '2022-12-17 21:48:51'),
(114, 'CREDIT', 7, 107, NULL, NULL, NULL, '1500', '3500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:05:40', '2022-12-17 22:05:40'),
(115, 'CREDIT', 7, 107, NULL, NULL, NULL, '3000', '6500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:12:35', '2022-12-17 22:12:35'),
(116, 'CREDIT', 7, 107, NULL, NULL, NULL, '3000', '9500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:15:35', '2022-12-17 22:15:35'),
(117, 'CREDIT', 1, NULL, NULL, NULL, 3, '4950', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:53:41', '2022-12-17 22:53:41'),
(118, 'CREDIT', 1, NULL, 45, NULL, NULL, '8050', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:54:15', '2022-12-17 22:54:15'),
(119, 'CREDIT', 1, NULL, 45, NULL, NULL, '7650', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:54:45', '2022-12-17 22:54:45'),
(120, 'CREDIT', 2, NULL, 29, NULL, NULL, '80000', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:56:42', '2022-12-17 22:56:42'),
(121, 'CREDIT', 6, NULL, NULL, NULL, 2, '845000', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:57:29', '2022-12-17 22:57:29'),
(122, 'CREDIT', 7, NULL, NULL, 6, NULL, '8950815599', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:57:56', '2022-12-17 22:57:56'),
(123, 'CREDIT', 1, NULL, 33, NULL, NULL, '110', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:13:42', '2022-12-17 23:13:42'),
(124, 'CREDIT', 1, NULL, 43, NULL, NULL, '584980', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:15:27', '2022-12-17 23:15:27'),
(125, 'CREDIT', 1, NULL, 32, NULL, NULL, '8596257999', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:16:56', '2022-12-17 23:16:56'),
(126, 'CREDIT', 2, NULL, 32, NULL, NULL, '1498', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:18:05', '2022-12-17 23:18:05'),
(127, 'CREDIT', 1, NULL, 30, NULL, NULL, '4750', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:35:37', '2022-12-17 23:35:37'),
(128, 'CREDIT', 5, NULL, NULL, NULL, 2, '49950', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:36:04', '2022-12-17 23:36:04'),
(129, 'CREDIT', 2, NULL, NULL, 5, NULL, '42500', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:36:29', '2022-12-17 23:36:29'),
(130, 'CREDIT', 5, NULL, NULL, NULL, 4, '48460', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-18 00:54:27', '2022-12-18 00:54:27'),
(131, 'CREDIT', 7, 107, NULL, NULL, NULL, '19000', '8950844099', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-18 21:27:57', '2022-12-18 21:27:57'),
(132, 'CREDIT', 7, 105, NULL, NULL, NULL, '2700', '8950846799', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-18 21:39:03', '2022-12-18 21:39:03'),
(133, 'DEBIT', 7, 105, NULL, NULL, NULL, '2578', '8950844221', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 02:16:21', '2022-12-19 02:16:21'),
(134, 'CREDIT', 7, 105, NULL, NULL, NULL, '3200', '8950847421', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:01:44', '2022-12-19 04:01:44'),
(135, 'DEBIT', 7, 105, NULL, NULL, NULL, '1870', '8950845551', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:02:38', '2022-12-19 04:02:38'),
(136, 'CREDIT', 7, 105, NULL, NULL, NULL, '1600', '8950847151', NULL, '2022-12-16', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:05:11', '2022-12-19 04:05:11'),
(137, 'DEBIT', 7, 105, NULL, NULL, NULL, '490', '8950846661', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:05:54', '2022-12-19 04:05:54'),
(138, 'CREDIT', 7, 105, NULL, NULL, NULL, '380', '8950847041', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:07:40', '2022-12-19 04:07:40'),
(139, 'DEBIT', 7, 105, NULL, NULL, NULL, '260', '8950846781', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:08:12', '2022-12-19 04:08:12'),
(140, 'CREDIT', 6, 108, NULL, NULL, NULL, '500', '850050', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:18:44', '2022-12-19 04:18:44'),
(141, 'DEBIT', 7, 108, NULL, NULL, NULL, '450', '8950846331', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:19:31', '2022-12-19 04:19:31'),
(142, 'CREDIT', 7, 108, NULL, NULL, NULL, '3500', '8950849831', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:22:41', '2022-12-19 04:22:41'),
(143, 'DEBIT', 7, 108, NULL, NULL, NULL, '2000', '8950847831', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:24:58', '2022-12-19 04:24:58'),
(144, 'CREDIT', 6, 108, NULL, NULL, NULL, '3300', '853350', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:35:44', '2022-12-19 04:35:44'),
(145, 'DEBIT', 7, 108, NULL, NULL, NULL, '2100', '8950845731', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:36:29', '2022-12-19 04:36:29'),
(146, 'DEBIT', 7, 108, NULL, NULL, NULL, '1030', '8950844701', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:37:13', '2022-12-19 04:37:13'),
(147, 'CREDIT', 5, 108, NULL, NULL, NULL, '8100', '310578', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:42:16', '2022-12-19 04:42:16'),
(148, 'DEBIT', 6, 108, NULL, NULL, NULL, '5010', '848340', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:43:41', '2022-12-19 04:43:41'),
(149, 'DEBIT', 7, 108, NULL, NULL, NULL, '2460', '8950842241', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 05:18:11', '2022-12-19 05:18:11'),
(150, 'CREDIT', 6, NULL, 47, NULL, NULL, '4500', '0', NULL, '2022-12-20', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 21:19:28', '2022-12-19 21:19:28'),
(151, 'CREDIT', 7, NULL, 48, NULL, NULL, '2000', '0', NULL, '2022-12-13', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 21:29:41', '2022-12-19 21:29:41'),
(152, 'CREDIT', 6, NULL, 48, NULL, NULL, '4950', '0', NULL, '2022-12-09', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:13:00', '2022-12-19 22:13:00'),
(153, 'CREDIT', 7, NULL, 48, NULL, NULL, '1260', '0', NULL, '2022-12-10', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:14:34', '2022-12-19 22:14:34'),
(154, 'CREDIT', 6, NULL, 48, NULL, NULL, '3750', '0', NULL, '2022-12-20', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:15:16', '2022-12-19 22:15:16'),
(155, 'CREDIT', 6, NULL, 48, NULL, NULL, '8000', '0', NULL, '2022-12-08', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:16:38', '2022-12-19 22:16:38'),
(156, 'CREDIT', 6, NULL, 48, NULL, NULL, '8000', '0', NULL, '2022-12-08', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:16:39', '2022-12-19 22:16:39'),
(157, 'CREDIT', 7, NULL, 48, NULL, NULL, '3980', '0', NULL, '2022-12-15', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:17:08', '2022-12-19 22:17:08'),
(158, 'CREDIT', 6, NULL, 48, NULL, NULL, '1960', '0', NULL, '2022-12-11', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:18:03', '2022-12-19 22:18:03'),
(159, 'CREDIT', 7, NULL, 48, NULL, NULL, '16500', '0', NULL, '2022-12-07', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:19:15', '2022-12-19 22:19:15'),
(160, 'CREDIT', 1, 109, NULL, NULL, NULL, '1000', NULL, NULL, '2022-12-20', NULL, '2022-12-20', 'NO', NULL, '2022-12-20 05:12:39', '2022-12-20 05:12:39'),
(161, 'CREDIT', 1, 110, NULL, NULL, NULL, '10000', NULL, NULL, '2023-01-26', NULL, '2023-01-26', 'NO', NULL, '2023-01-25 21:28:04', '2023-01-25 21:28:04'),
(162, 'CREDIT', 1, 112, NULL, NULL, NULL, '1000', NULL, NULL, '2023-03-09', NULL, '2023-03-09', 'NO', NULL, '2023-03-08 21:43:38', '2023-03-08 21:43:38'),
(163, 'CREDIT', 1, 65, NULL, NULL, NULL, '800', '8608843009', NULL, '2023-04-06', NULL, '2023-04-06', 'NO', NULL, '2023-04-05 21:02:26', '2023-04-05 21:02:26'),
(164, 'CREDIT', 1, NULL, 50, NULL, NULL, '1000', NULL, NULL, '2023-05-15', NULL, '2023-05-15', 'NO', NULL, '2023-05-14 23:51:28', '2023-05-14 23:51:28'),
(165, 'CREDIT', 1, NULL, 51, NULL, NULL, '1000', NULL, NULL, '2023-05-15', NULL, '2023-05-15', 'NO', NULL, '2023-05-15 00:00:52', '2023-05-15 00:00:52'),
(166, 'CREDIT', 1, 115, NULL, NULL, NULL, '10000', NULL, NULL, '2023-05-15', NULL, '2023-05-15', 'NO', NULL, '2023-05-15 07:14:39', '2023-05-15 07:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `agent_id` int(10) UNSIGNED NOT NULL,
  `agent_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_nid` bigint(20) DEFAULT NULL,
  `agent_birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_nid_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_nid_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_phone` bigint(20) DEFAULT NULL,
  `agent_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_opening_balance` int(11) DEFAULT NULL,
  `agent_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_status` bigint(20) DEFAULT NULL,
  `agent_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `agent_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_id`, `agent_entry_id`, `agent_name`, `agent_nid`, `agent_birthdate`, `agent_nid_front`, `agent_nid_back`, `agent_phone`, `agent_email`, `agent_address`, `agent_opening_balance`, `agent_picture`, `agent_status`, `agent_has_deleted`, `agent_create_date`, `created_at`, `updated_at`) VALUES
(28, 'Armaan20825', 'Armaan', 987654321, NULL, NULL, NULL, 1401033443, 'armaan.codecyber@gmail.com', '124 North Dakshinkhan,Uttara', 85000, NULL, 0, 'YES', NULL, '2022-11-20 04:18:56', '2022-11-20 23:31:52'),
(29, 'Nuhash97162', 'Nuhash', 8458484844848, NULL, NULL, NULL, 1521326072, 'nuhash@gmail.com', 'North City', 50000, NULL, 0, 'YES', NULL, '2022-11-20 07:50:52', '2022-11-20 23:31:47'),
(30, 'Armaankhabo82721', 'Armaankhabo', 54154515, NULL, NULL, NULL, 1401033443, 'shimba@gmail.com', 'bgfyhff', 500000, NULL, 0, 'YES', NULL, '2022-11-20 22:13:59', '2022-11-20 23:31:43'),
(31, 'Armaankhabo82721', 'Armaankhabo', 54154515, NULL, NULL, NULL, 1401033443, 'shimba@gmail.com', 'bgfyhff', 500000, NULL, 0, 'YES', NULL, '2022-11-20 22:14:26', '2022-11-20 23:29:01'),
(32, 'kindas31540', 'faafaffa', 54151515, NULL, NULL, NULL, 1401033545, 'sj@gmail.com', 'bafabfab', 950000, NULL, 0, 'YES', NULL, '2022-11-20 22:14:59', '2022-11-20 23:27:47'),
(33, 'afafaefaef48757', 'afafaefaef', 45584784784, NULL, NULL, NULL, 1401033445, 'bfh@gmail.com', 'fahufayhbfah', 958000, NULL, 0, 'YES', NULL, '2022-11-20 23:33:12', '2022-11-20 23:36:09'),
(34, 'Armaan22669', 'Armaan', 987654321, NULL, NULL, NULL, 1720947567, 'armaan@gmail.com', 'afinfajfna', 50000, NULL, 1, 'NO', NULL, '2022-11-20 23:37:14', '2022-11-20 23:37:14'),
(35, 'Hamindas7325', 'Hamindas', 789456123, NULL, NULL, NULL, 1521326072, 'hamid@gmail.com', 'afhuifanfajn', 458000, NULL, 1, 'NO', NULL, '2022-11-21 00:36:28', '2022-11-21 00:36:28'),
(36, 'fqebnfejfe60560', 'fqebnfejfe', 151515, NULL, NULL, NULL, 10201505, 'afaf@gmail.com', '541af41af', 47500, NULL, 1, 'NO', NULL, '2022-11-21 00:39:30', '2022-11-21 00:39:30'),
(37, 'joynal baya94898', 'joynal baya', 54511651, NULL, NULL, NULL, 185075095, 'joynal@gmail.com', 'abfhaf', 95000, NULL, 1, 'NO', NULL, '2022-11-21 02:11:14', '2022-11-21 02:11:14'),
(38, 'Binishuta2094', 'Binishuta', 45511515151, NULL, NULL, NULL, 15151515, 'bini@gmail.com', 'fbiabfhj', 950000, NULL, 1, 'NO', NULL, '2022-11-24 02:14:55', '2022-11-24 02:14:55'),
(39, 'dftvuyh58102', 'dftvuyh', 441451, NULL, NULL, NULL, 41515, 'nf@gmail.com', 'bjaaafjbh', NULL, NULL, 0, 'YES', NULL, '2022-12-12 22:28:41', '2022-12-12 22:28:51'),
(40, 'Rumki54340', 'Rumki', 145151, NULL, NULL, NULL, 1158151, 'atom@gmail.com', 'fnnaffj', 40000, NULL, 1, 'NO', NULL, '2022-12-12 23:38:47', '2022-12-12 23:38:47'),
(41, 'Shawon26314', 'Shawon', 11451, NULL, NULL, NULL, 45454, 'shawon@gmailcom', 'afafaf', NULL, NULL, 1, 'NO', NULL, '2022-12-13 22:00:04', '2022-12-13 22:00:04'),
(42, 'Kamal80893', 'Kamal', 265151, NULL, NULL, NULL, 151515, 'kamal@gmail.com', 'bfhafhb', NULL, NULL, 1, 'NO', NULL, '2022-12-13 22:15:41', '2022-12-13 22:15:41'),
(43, 'Farabi21342', 'Farabi', 912515, NULL, NULL, NULL, 151515, 'farabi@gmail.com', 'fnjanjaf', NULL, NULL, 1, 'NO', NULL, '2022-12-13 22:19:33', '2022-12-13 22:19:33'),
(44, 'Vanu Miah76697', 'Vanu Miah', 4151, NULL, NULL, NULL, 51515151, 'vanu@gmail.com', 'nfajafnj', NULL, NULL, 1, 'NO', NULL, '2022-12-13 22:22:10', '2022-12-13 22:22:10'),
(45, 'Jubayer48800', 'Jubayer', 4151, NULL, NULL, NULL, 1515, 'juba@gmail.com', 'bafabjhafbj', NULL, NULL, 1, 'NO', NULL, '2022-12-13 22:32:06', '2022-12-13 22:32:06'),
(46, 'Nahian90821', 'Nahian', 511, NULL, NULL, NULL, 1515, 'nahian@gmail.com', 'bnafnnjfa', NULL, NULL, 1, 'NO', NULL, '2022-12-13 22:42:09', '2022-12-13 22:42:09'),
(47, 'hamid71166', 'hamid', 235151, NULL, NULL, NULL, 5151, 'hamid@gmail.com', 'fa4faafa', NULL, NULL, 1, 'NO', NULL, '2022-12-19 21:18:48', '2022-12-19 21:18:48'),
(48, 'Nahid83125', 'Nahid', 151515, NULL, NULL, NULL, 15151, 'nahid@gmail.com', 'fbajhafh', NULL, NULL, 1, 'NO', NULL, '2022-12-19 21:28:55', '2022-12-19 21:28:55'),
(49, 'nahid agent 2971', 'nahid agent', 677453, NULL, NULL, NULL, 789192789, NULL, NULL, NULL, NULL, 0, 'YES', NULL, '2023-02-08 21:10:55', '2023-05-23 02:18:35'),
(50, 'agent-25389', 'Arnx Test Agent', 23697845, '2023-05-15', '1684129888.jpg', '1684129888.jpg', 198741335545, 'ssk.m360ict@gmail.com', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 1000, '1684129888.png', 0, 'YES', NULL, '2023-05-14 23:51:28', '2023-05-14 23:59:40'),
(51, 'agent-21372', 'Shadman Sakib', 664564654121, '2023-05-17', '1684130540-nid-front.jpg', '1684130540-nid-back.png', 56654561, 'ssk.m360ict@gmail.com', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 1000, '1684130540-picture.png', 1, 'NO', NULL, '2023-05-15 00:00:52', '2023-05-14 18:00:00'),
(52, 'agent-8246', 'armaaan the agent', 84848, '2023-05-17', '/uploads/1684309959-nid-front.jpg', '/uploads/1684309959-nid-back.jpg', 1401033443, 'fako@gmail.com', '521f5fa15faf', NULL, '/uploads/1684309959-picture.jpg', 1, 'NO', NULL, '2023-05-17 01:52:40', '2023-05-17 01:52:40'),
(53, 'agent-64805', 'nahid agent', NULL, '1996-03-13', '/uploads/1684828013-nid-front.png', '/uploads/1684828013-nid-back.png', NULL, NULL, NULL, NULL, '/uploads/1684828013-picture.png', 1, 'NO', NULL, '2023-05-23 01:46:53', '2023-05-23 01:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `agents_ledgers`
--

CREATE TABLE `agents_ledgers` (
  `agent_ledger_id` int(10) UNSIGNED NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `agent_account_id` bigint(20) DEFAULT NULL,
  `agent_transaction_id` bigint(20) DEFAULT NULL,
  `agent_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `agent_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `agent_ledger_refund_id` bigint(20) DEFAULT NULL,
  `agent_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_last_balance` bigint(20) DEFAULT NULL,
  `agent_ledger_dr` bigint(20) DEFAULT NULL,
  `agent_ledger_cr` bigint(20) DEFAULT NULL,
  `agent_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents_ledgers`
--

INSERT INTO `agents_ledgers` (`agent_ledger_id`, `agent_id`, `agent_account_id`, `agent_transaction_id`, `agent_ledger_type`, `agent_ledger_invoice_id`, `agent_ledger_money_receipt_id`, `agent_ledger_refund_id`, `agent_ledger_status`, `agent_ledger_last_balance`, `agent_ledger_dr`, `agent_ledger_cr`, `agent_ledger_date`, `agent_ledger_create_date`, `agent_ledger_prepared_by`, `created_at`, `updated_at`) VALUES
(45, 48, NULL, 65, 'AGENT_PAYMENT', NULL, NULL, NULL, '1', 2500, NULL, 2500, '2022-12-13', '2022-12-20', '127', '2022-12-20 03:29:41', '2022-12-19 21:29:41'),
(46, 48, NULL, 66, 'AGENT_PAYMENT', NULL, NULL, NULL, '1', 7500, NULL, 5000, '2022-12-09', '2022-12-20', '127', '2022-12-20 04:13:00', '2022-12-19 22:13:00'),
(47, 48, NULL, 67, 'AGENT_PAYMENT', NULL, NULL, NULL, '1', 8911, NULL, 1411, '2022-12-10', '2022-12-20', '127', '2022-12-20 04:14:34', '2022-12-19 22:14:34'),
(48, 48, NULL, 68, 'AGENT_PAYMENT', NULL, NULL, NULL, '1', 12911, NULL, 4000, '2022-12-20', '2022-12-20', '127', '2022-12-20 04:15:16', '2022-12-19 22:15:16'),
(49, 48, NULL, 72, 'AGENT_PAYMENT', NULL, NULL, NULL, '1', 36411, NULL, 2500, '2022-12-11', '2022-12-20', '127', '2022-12-20 04:18:03', '2022-12-19 22:18:03'),
(50, 48, NULL, 73, 'AGENT_PAYMENT', NULL, 108, NULL, '1', 61411, NULL, 25000, '2022-12-07', '2022-12-20', '127', '2022-12-20 04:19:15', '2022-12-19 22:19:15'),
(51, 50, NULL, NULL, 'opening_balance', NULL, NULL, NULL, '1', 0, 0, 1000, '2023/05/15', '2023/05/15', '127', '2023-05-15 05:51:28', '2023-05-14 23:51:28'),
(52, 51, NULL, NULL, 'opening_balance', NULL, NULL, NULL, '1', 0, 0, 1000, '2023/05/15', '2023/05/15', '127', '2023-05-15 06:00:52', '2023-05-15 00:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `agent_ledgers`
--

CREATE TABLE `agent_ledgers` (
  `agent_ledger_id` int(10) UNSIGNED NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `agent_account_id` bigint(20) DEFAULT NULL,
  `agent_transaction_id` bigint(20) DEFAULT NULL,
  `agent_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `agent_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `agent_ledger_refund_id` bigint(20) DEFAULT NULL,
  `agent_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_last_balance` bigint(20) DEFAULT NULL,
  `agent_ledger_dr` bigint(20) DEFAULT NULL,
  `agent_ledger_cr` bigint(20) DEFAULT NULL,
  `agent_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_ledgers`
--

INSERT INTO `agent_ledgers` (`agent_ledger_id`, `agent_id`, `agent_account_id`, `agent_transaction_id`, `agent_ledger_type`, `agent_ledger_invoice_id`, `agent_ledger_money_receipt_id`, `agent_ledger_refund_id`, `agent_ledger_status`, `agent_ledger_last_balance`, `agent_ledger_dr`, `agent_ledger_cr`, `agent_ledger_date`, `agent_ledger_create_date`, `agent_ledger_prepared_by`, `created_at`, `updated_at`) VALUES
(1, 16, NULL, 11, 'opening_balance', NULL, NULL, NULL, '1', 0, 0, 458000, '2022/11/20', '2022/11/20', '124', '2022-11-20 00:41:26', '2022-11-20 00:41:26'),
(2, 17, NULL, 12, 'opening_balance', NULL, NULL, NULL, '1', 0, NULL, NULL, '2022/11/20', '2022/11/20', '124', '2022-11-20 00:43:03', '2022-11-20 00:43:03'),
(3, 18, NULL, 13, 'opening_balance', NULL, NULL, NULL, '1', 0, 0, 85000, '2022/11/20', '2022/11/20', '124', '2022-11-20 00:45:36', '2022-11-20 00:45:36'),
(4, NULL, NULL, NULL, 'opening_balance', NULL, NULL, NULL, '1', 0, 0, 80000, '2022/11/20', '2022/11/20', '124', '2022-11-20 00:46:48', '2022-11-20 00:46:48'),
(5, NULL, NULL, NULL, 'opening_balance', NULL, NULL, NULL, '1', 0, 0, 45000, '2022/11/20', '2022/11/20', '124', '2022-11-20 01:04:16', '2022-11-20 01:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `agent_transections`
--

CREATE TABLE `agent_transections` (
  `agent_transaction_id` int(10) UNSIGNED NOT NULL,
  `agent_transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_transaction_account_id` bigint(20) DEFAULT NULL,
  `agent_transaction_client_id` bigint(20) DEFAULT NULL,
  `agent_transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_transaction_opening_balance` bigint(20) DEFAULT NULL,
  `agent_transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_account_has_deleted` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_myanmar_ci DEFAULT 'NO',
  `agent_account_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_transections`
--

INSERT INTO `agent_transections` (`agent_transaction_id`, `agent_transaction_type`, `agent_transaction_account_id`, `agent_transaction_client_id`, `agent_transaction_amount`, `agent_transaction_last_balance`, `agent_transaction_opening_balance`, `agent_transaction_date`, `agent_transaction_note`, `agent_account_create_date`, `agent_account_has_deleted`, `agent_account_deleted_by`, `created_at`, `updated_at`) VALUES
(23, 'advance', 28, NULL, '85000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-20 04:18:56', '2022-11-20 04:18:56'),
(24, 'advance', 29, NULL, '50000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-20 07:50:52', '2022-11-20 07:50:52'),
(25, 'advance', 30, NULL, '500000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-20 22:13:59', '2022-11-20 22:13:59'),
(26, 'advance', 31, NULL, '500000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-20 22:14:26', '2022-11-20 22:14:26'),
(27, 'advance', 32, NULL, '950000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-20 22:14:59', '2022-11-20 22:14:59'),
(28, 'advance', 33, NULL, '958000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-20 23:33:12', '2022-11-20 23:33:12'),
(29, 'advance', 34, NULL, '50000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-20 23:37:14', '2022-11-20 23:37:14'),
(30, 'advance', 35, NULL, '458000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-21 00:36:28', '2022-11-21 00:36:28'),
(31, 'advance', 36, NULL, '47500', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-21 00:39:30', '2022-11-21 00:39:30'),
(32, 'advance', 37, NULL, '95000', NULL, NULL, '2022/11/21', NULL, '2022/11/21', 'NO', NULL, '2022-11-21 02:11:14', '2022-11-21 02:11:14'),
(33, 'advance', 38, NULL, '950000', NULL, NULL, '2022/11/24', NULL, '2022/11/24', 'NO', NULL, '2022-11-24 02:14:55', '2022-11-24 02:14:55'),
(34, 'CREDIT', NULL, 37, '5000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:37:22', '2022-12-12 21:37:22'),
(35, 'CREDIT', NULL, 37, '5000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:38:57', '2022-12-12 21:38:57'),
(36, 'CREDIT', NULL, 37, '5000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:40:53', '2022-12-12 21:40:53'),
(37, 'CREDIT', NULL, 37, '5000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:41:33', '2022-12-12 21:41:33'),
(38, 'CREDIT', NULL, 37, '5000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:54:04', '2022-12-12 21:54:04'),
(39, 'CREDIT', NULL, 37, '5000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:55:38', '2022-12-12 21:55:38'),
(40, 'CREDIT', NULL, 37, '5000', NULL, NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:56:26', '2022-12-12 21:56:26'),
(41, 'CREDIT', NULL, 37, '5000', '40000', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 21:57:32', '2022-12-12 21:57:32'),
(42, 'CREDIT', NULL, 29, '48000', '48000', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 22:06:41', '2022-12-12 22:06:41'),
(43, 'CREDIT', NULL, 29, '12000', '60000', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 22:09:41', '2022-12-12 22:09:41'),
(44, 'CREDIT', NULL, 29, '65000', '125000', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 22:15:36', '2022-12-12 22:15:36'),
(45, 'advance', 40, NULL, '40000', NULL, NULL, '2022/12/13', NULL, '2022/12/13', 'NO', NULL, '2022-12-12 23:38:47', '2022-12-12 23:38:47'),
(46, 'CREDIT', NULL, 35, '45800', '45800', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 23:57:39', '2022-12-12 23:57:39'),
(47, 'CREDIT', NULL, 35, '8600', '54400', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:07:42', '2022-12-13 00:07:42'),
(48, 'CREDIT', NULL, 40, '8506509', '8506509', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:17:20', '2022-12-13 00:17:20'),
(49, 'CREDIT', NULL, 38, '95000', '95000', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:48:01', '2022-12-13 00:48:01'),
(50, 'CREDIT', NULL, 38, '485000', '580000', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 00:51:25', '2022-12-13 00:51:25'),
(51, 'CREDIT', NULL, 37, '7000', '47000', NULL, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-13 03:36:58', '2022-12-13 03:36:58'),
(52, 'CREDIT', NULL, 42, '17500', '17500', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:16:50', '2022-12-13 22:16:50'),
(53, 'CREDIT', NULL, 43, '70000', '70000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:20:06', '2022-12-13 22:20:06'),
(54, 'CREDIT', NULL, 44, '50000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:23:41', '2022-12-13 22:24:48'),
(55, 'CREDIT', NULL, 46, '2500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 22:43:07', '2022-12-13 22:43:40'),
(56, 'CREDIT', NULL, 45, '8500', '8500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:54:15', '2022-12-17 22:54:15'),
(57, 'CREDIT', NULL, 45, '8500', '17000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:54:45', '2022-12-17 22:54:45'),
(58, 'CREDIT', NULL, 29, '85000', '210000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:56:42', '2022-12-17 22:56:42'),
(59, 'CREDIT', NULL, 33, '111', '111', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:13:42', '2022-12-17 23:13:42'),
(60, 'CREDIT', NULL, 43, '585000', '655000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:15:27', '2022-12-17 23:15:27'),
(61, 'CREDIT', NULL, 32, '8596258000', '8596258000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:16:56', '2022-12-17 23:16:56'),
(62, 'CREDIT', NULL, 32, '1500', '8596259500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:18:05', '2022-12-17 23:18:05'),
(63, 'CREDIT', NULL, 30, '5000', '5000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 23:35:37', '2022-12-17 23:35:37'),
(64, 'CREDIT', NULL, 47, '4511', '4511', NULL, '2022-12-20', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 21:19:28', '2022-12-19 21:19:28'),
(65, 'CREDIT', NULL, 48, '2500', '2500', NULL, '2022-12-13', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 21:29:41', '2022-12-19 21:29:41'),
(66, 'CREDIT', NULL, 48, '5000', '7500', NULL, '2022-12-09', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:13:00', '2022-12-19 22:13:00'),
(67, 'CREDIT', NULL, 48, '1411', '8911', NULL, '2022-12-10', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:14:34', '2022-12-19 22:14:34'),
(68, 'CREDIT', NULL, 48, '4000', '12911', NULL, '2022-12-20', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:15:16', '2022-12-19 22:15:16'),
(69, 'CREDIT', NULL, 48, '8500', '21411', NULL, '2022-12-08', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:16:38', '2022-12-19 22:16:38'),
(70, 'CREDIT', NULL, 48, '8500', '29911', NULL, '2022-12-08', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:16:39', '2022-12-19 22:16:39'),
(71, 'CREDIT', NULL, 48, '4000', '33911', NULL, '2022-12-15', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:17:08', '2022-12-19 22:17:08'),
(72, 'CREDIT', NULL, 48, '2500', '36411', NULL, '2022-12-11', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:18:03', '2022-12-19 22:18:03'),
(73, 'CREDIT', NULL, 48, '25000', '61411', NULL, '2022-12-07', NULL, '2022-12-20', 'NO', NULL, '2022-12-19 22:19:15', '2022-12-19 22:19:15'),
(74, 'advance', 50, NULL, '1000', NULL, NULL, '2023/05/15', NULL, '2023/05/15', 'NO', NULL, '2023-05-14 23:51:28', '2023-05-14 23:51:28'),
(75, 'advance', 51, NULL, '1000', NULL, NULL, '2023/05/15', NULL, '2023/05/15', 'NO', NULL, '2023-05-15 00:00:52', '2023-05-15 00:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(10) UNSIGNED NOT NULL,
  `client_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_nid` bigint(20) DEFAULT NULL,
  `client_nid_back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_nid_front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_gender` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `musaned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `musaned_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `musaned_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `musaned_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `martial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_job_type` int(11) DEFAULT NULL,
  `village_house` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_tc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mofa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_chek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_person_contact_no` int(11) DEFAULT NULL,
  `client_status` bigint(20) DEFAULT NULL,
  `client_opening_balance` int(11) DEFAULT NULL,
  `client_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_entry_id`, `client_name`, `client_phone`, `client_address`, `client_email`, `client_date_of_birth`, `present_age`, `client_nid`, `client_nid_back`, `client_nid_front`, `client_picture`, `client_gender`, `musaned`, `musaned_number`, `musaned_date`, `musaned_file`, `father_name`, `mother_name`, `spouse_name`, `martial_status`, `target_country`, `visa_type`, `client_job_type`, `village_house`, `ward`, `district`, `police_station`, `religion`, `remarks`, `exp_tc`, `mofa`, `e_chek`, `emergency_person_contact_no`, `client_status`, `client_opening_balance`, `client_create_date`, `client_has_deleted`, `created_at`, `updated_at`) VALUES
(65, 'Armaan12454', 'Armaan', '54115415', 'bfajhfajna', 'armaan@gmail.com', NULL, NULL, 15154, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, NULL, '2022/12/07', 'YES', '2022-12-07 03:51:34', '2022-12-07 06:08:35'),
(67, 'leo messi48547', 'leo messi', '115151', 'fan', 'leo@gmail.com', NULL, NULL, 151515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 5000, '2022-12-07', 'YES', '2022-12-07 05:56:11', '2022-12-07 06:08:37'),
(68, 'Messi2169', 'Messi', '15415', 'barhafh', 'messi@gmail.com', NULL, NULL, 1215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 8000, '2022-12-07', 'YES', '2022-12-07 06:02:52', '2022-12-07 06:08:40'),
(69, 'Messi30842', 'Messi', '4415415', 'nmafmkfam', 'messi@gmai.com', NULL, NULL, 54151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 5000, '2022-12-07', 'YES', '2022-12-07 06:09:11', '2022-12-07 21:02:09'),
(70, 'Nazmul80394', 'Nazmul', '15155', 'hbfhbfhf', 'nazmul@gmail.com', NULL, NULL, 11515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 45000, '2022-12-07', 'YES', '2022-12-07 06:26:52', '2022-12-07 21:02:06'),
(71, 'Armaan Due12329', 'Armaan Due', '114144', 'afhfahf', 'armaandue@gmail.com', NULL, NULL, 4141, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 1000, '2022-12-07', 'YES', '2022-12-07 06:41:51', '2022-12-07 21:02:11'),
(72, 'Lisha53252', 'Lisha', '5155', 'nfajnfjan', 'lisha@gmail.com', NULL, NULL, 15151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 4000, '2022-12-08', 'NO', '2022-12-07 21:02:39', '2022-12-07 21:02:39'),
(73, 'Shahed6160', 'Shahed', '41151515', 'bfhabfha', 'ki@gmail.com', NULL, NULL, 151515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 80000, '2022-12-08', 'NO', '2022-12-07 21:25:09', '2022-12-07 21:25:09'),
(74, 'Mithila97131', 'Mithila', '215115', 'jhbghsgjng', 'mithila@gmail.com', NULL, NULL, 115151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 10000, '2022-12-08', 'YES', '2022-12-07 22:18:44', '2022-12-07 23:01:38'),
(75, 'shanta60750', 'shanta', '515151', 'fnnfaufan', 'shanta@gmail.com', NULL, NULL, 25151514, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 1000, '2022-12-08', 'YES', '2022-12-07 22:40:52', '2022-12-07 22:41:06'),
(76, 'manta57043', 'manta', '415415', 'ngfujhbgnjn', 'manta@gmail.com', NULL, NULL, 44545, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 1000, '2022-12-08', 'YES', '2022-12-07 22:41:33', '2022-12-07 22:41:46'),
(77, 'Bahrain49461', 'Bahrain', '151515', 'fhaufah', 'bah@gmail.com', NULL, NULL, 1515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 10000, '2022-12-08', 'YES', '2022-12-07 22:43:40', '2022-12-07 23:01:34'),
(78, 'gsggaga12730', 'gsggaga', '54151515', 'nsgjgsn', 'afaf@gmail.com', NULL, NULL, 55815, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 5000, '2022-12-08', 'YES', '2022-12-07 22:52:24', '2022-12-07 23:01:28'),
(79, 'affafa89575', 'affafa', '5151', 'ghjsgnjgsnj', '15@gmail.com', NULL, NULL, 541, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 500, '2022-12-08', 'YES', '2022-12-07 22:52:54', '2022-12-07 23:01:24'),
(80, 'Nahid14626', 'Nahid', '14151', 'ngssgjngs', 'nahid@gmail.com', NULL, NULL, 484151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 10000, '2022-12-08', 'NO', '2022-12-07 23:02:13', '2022-12-07 23:02:13'),
(81, 'Neymar30989', 'Neymar', '5151', 'bhfyhafbujh', 'neymar@gmail.com', NULL, NULL, 1151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 10000, '2022-12-08', 'NO', '2022-12-07 23:28:33', '2022-12-07 23:28:33'),
(82, 'mbappe46538', 'mbappe', '51151551', '14af554a', 'mbpee@gmail.com', NULL, NULL, 4154151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 10000, '2022-12-08', 'NO', '2022-12-07 23:53:45', '2022-12-07 23:53:45'),
(83, 'piyal36396', 'piyal', '115', 'bgffbahfbh', 'pi@gmail.com', NULL, NULL, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 10000, '2022-12-08', 'NO', '2022-12-08 00:17:09', '2022-12-08 00:17:09'),
(84, 'shimit62384', 'shimit', '151515', 'nafan', 'shimit@gmail.com', NULL, NULL, 15151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 10000, '2022-12-08', 'NO', '2022-12-08 02:55:09', '2022-12-08 02:55:09'),
(85, 'Rakib80618', 'Rakib', '551551', 'fbabaf', 'rakib@gmail.com', NULL, NULL, 515151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 10000, '2022-12-08', 'NO', '2022-12-08 02:58:27', '2022-12-08 02:58:27'),
(86, 'Test2577', 'Test', '654684654', 'ytutyityiyti', 's@gmail.com', NULL, NULL, 5641, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-08', 'NO', '2022-12-08 03:13:47', '2022-12-08 03:13:47'),
(87, 'Test 234507', 'Test 2', '87687968976978', 'reteryery', 'arman@gmail.com', NULL, NULL, 7896786987, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-08', 'NO', '2022-12-08 03:17:12', '2022-12-08 03:17:12'),
(88, 'kana44837', 'kana', '5151515', 'bfhyfbhaf', 'kana@gmail.com', NULL, NULL, 5115151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-08', 'NO', '2022-12-08 03:26:21', '2022-12-08 03:26:21'),
(89, 'Masud69371', 'Masud', '1551515', 'fhafnjfjn', 'masud@gmail.com', NULL, NULL, 2155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-10 20:34:08', '2022-12-10 20:34:08'),
(90, 'Riyad52831', 'Riyad', '15151', 'fajnfaj', 'riyad@gmail.com', NULL, NULL, 41455, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-10 21:01:01', '2022-12-10 21:01:01'),
(91, 'Shuvro75046', 'Shuvro', '1515', 'afaffafe', 'shuvro@gmail.com', NULL, NULL, 1115151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-10 21:15:43', '2022-12-10 21:15:43'),
(92, 'swift84364', 'swift', '515151', 'bfhabhf', 'swift@gmail.com', NULL, NULL, 15151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-10 23:23:44', '2022-12-10 23:23:44'),
(93, 'kakoli54838', 'kakoli', '51515', 'ah fba', 'kakoli@gmail.com', NULL, NULL, 44151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-11 02:10:36', '2022-12-11 02:10:36'),
(94, 'totla38520', 'totla', '515', 'bahfhyabh', 'totla@gmail.com', NULL, NULL, 10051451, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-11 03:01:58', '2022-12-11 03:01:58'),
(95, 'Booo66752', 'Booo', '15151', 'nfjnfaj', 'bo@gmail.com', NULL, NULL, 11515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-11 03:06:07', '2022-12-11 03:06:07'),
(96, 'joynal baye39419', 'joynal baye', '4844', 'fafafa', 'joynal@gmail.com', NULL, NULL, 4451884, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-11 03:15:23', '2022-12-11 03:15:23'),
(97, 'pavan66638', 'pavan', '151515', 'bvfahbjfabh', 'pavan@gmail.com', NULL, NULL, 1511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-11 03:27:36', '2022-12-11 03:27:36'),
(98, 'clark94690', 'clark', '15154', 'afaff', 'clark@gmail.com', NULL, NULL, 4151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-11 03:33:21', '2022-12-11 03:33:21'),
(99, 'Moon20259', 'Moon', '151515', 'nhnsj', 'moon@gmail.com', NULL, NULL, 15151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-11', 'NO', '2022-12-11 03:54:44', '2022-12-11 03:54:44'),
(100, 'meow24385', 'meow', '1541515', 'bfayhbhfa', 'meow@gmail.com', NULL, NULL, 12215, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-12', 'NO', '2022-12-12 00:18:15', '2022-12-12 00:18:15'),
(101, 'manami69602', 'manami', '105105', 'fabafbah', 'manami@gmail.com', NULL, NULL, 151515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 4000, '2022-12-13', 'NO', '2022-12-12 23:28:27', '2022-12-12 23:28:27'),
(102, 'mahmud58333', 'mahmud', '45454', '415151', 'mahmud@gmail.com', NULL, NULL, 545, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-14', 'NO', '2022-12-13 23:51:19', '2022-12-13 23:51:19'),
(103, 'nibash11494', 'nibash', '1515155', 'jfna115gs1', 'nibash@gmail.com', NULL, NULL, 561515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-18', 'NO', '2022-12-17 21:01:43', '2022-12-17 21:01:43'),
(104, 'Mahima39869', 'Mahima', '151515', 'hfaufuabah', 'mahima@gmail.com', NULL, NULL, 151515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-18', 'NO', '2022-12-17 21:08:49', '2022-12-17 21:08:49'),
(105, 'lal22607', 'lal', '48484', 'bfahjbfjhafk', 'lal@gmail.com', NULL, NULL, 15151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-18', 'NO', '2022-12-17 21:13:00', '2022-12-17 21:13:00'),
(106, 'shahedss86356', 'shahedss', '1515158', '54151', 'shahed@gmail.com', NULL, NULL, 54145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-18', 'NO', '2022-12-17 21:29:37', '2022-12-17 21:29:37'),
(107, 'afnan23230', 'afnan', '1515', 'bfahbfahfab', 'afnan@gmail.com', NULL, NULL, 1561511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-18', 'NO', '2022-12-17 21:44:11', '2022-12-17 21:44:11'),
(108, 'newclient4041789', 'newclient404', '52212', 'bssnfjhn', 'newclient404@gmail.com', NULL, NULL, 588511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-19', 'NO', '2022-12-19 04:18:02', '2022-12-19 04:18:02'),
(109, 'Shadman Sakib27124', 'Shadman Sakib', '1212121212', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 'ssk.m360ict@gmail.com', NULL, NULL, 1213123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 1000, '2022-12-20', 'NO', '2022-12-20 05:12:39', '2022-12-20 05:12:39'),
(110, 'Latest Test Client1511', 'Latest Test Client', '0197894561', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 'ssk.m360ict@gmail.com', '1988-05-26', '34', 123587946, NULL, NULL, NULL, NULL, 'DONE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'EXP', '12358896', 'NEGATIVE', NULL, 1, 10000, '2023-01-26', 'NO', '2023-01-25 21:28:04', '2023-01-25 21:28:04'),
(111, 'nahid client 47704', 'nahid client', '0289382903920', NULL, NULL, '1998-01-11', '25', 79287398273982, NULL, NULL, NULL, 'MALE', 'DONE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'EXP', NULL, 'POSITIVE', NULL, 1, NULL, '2023-02-09', 'NO', '2023-02-08 21:09:36', '2023-02-08 21:09:36'),
(112, 'Shadman Sakib33544', 'Shadman Sakib', '01612345678', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 'ssk.m360ict@gmail.com', '2023-03-03', '0', 123456789, NULL, NULL, '/uploads/IZ9KX1678333418.png', 'MALE', 'DONE', '65465465465', '65465465465', '/uploads/yTRV31678333418.png', 'test', 'testy', 'tesrt', 'MARRIED', 'testcountry', 'test visa', NULL, 'test house', 'test ward', 'test district', 'test sraation', 'test reli', 'tst', 'EXP', '4565465465', 'POSITIVE', NULL, 1, NULL, '2023/03/09', 'NO', '2023-03-08 21:43:38', '2023-03-08 18:00:00'),
(113, 'armaan82121', 'armaan', '01401033443', 'af4fa15', 'no@gmail.com', '2022-12-02', '0', 515151, NULL, NULL, '/uploads/fLGVP1678769425.png', 'MALE', 'DONE', 'fa15fa1f5a', '2023-03-14', '/uploads/qhfCZ1678769425.png', 'a1f5fa15', 'fa15af15', '15fa515', 'MARRIED', 'bangladesh', 'working', 2, 'fafafea', 'faaf', 'afaffa', 'faaffa', 'afaffa', 'affa', 'EXP', '41f85a1a5f', 'POSITIVE', 51551515, 1, NULL, '2023-03-14', 'NO', '2023-03-13 22:50:25', '2023-03-13 22:50:25'),
(114, 'shofiqul35933', 'shofiqul', '01401033554', 'affaefefef', 'armaan@gmail.com', '2023-05-09', '25', 5515151, NULL, NULL, '/uploads/xUV8J1683625792.jpg', 'MALE', 'DONE', '41515', '2023-05-09', '/uploads/', 'fefeafe', 'faeeffe', 'afefaefe', 'UNMARRIED', 'Saudi', 'nope', 2, 'fqqeffeqfeq', 'fqefqeef', 'qfeqeffefe', 'feqfeqf', 'fqfef', 'fqefefeq', NULL, NULL, 'POSITIVE', NULL, 1, NULL, '2023-05-09', 'NO', '2023-05-09 03:49:52', '2023-05-09 03:49:52'),
(115, 'client-61018', 'Test Client Arnab 1', '14453453', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 'ssk.m360ict@gmail.com', '2023-05-11', '0', 124234534, '/uploads/1684212541-client-nid-back.jpg', '/uploads/1684212541-client-nid-front.jpg', '/uploads/gdBKP1684156478.pdf', 'FEMALE', 'DONE', 'sdfgdsgs', '2023-05-16', '/uploads/fAqcn1684156478.pdf', 'test', 'fdfhdfh', 'sxdgsdgs', 'MARRIED', 'Bangladesh', 'sdgsdgsdg', 2, 'sdsfgsdgsd', 'sfdsfs', 'sgdsfgfs', 'dgsgd', 'sdgsdg', 'dgsdfgsdg', 'EXP', '12358896', 'NEGATIVE', 54365434, 1, NULL, '2023-05-15', 'NO', '2023-05-15 07:14:39', '2023-05-15 18:00:00'),
(116, 'client-85167', 'Shadman Sakib', NULL, 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 'ssk.m360ict@gmail.com', NULL, NULL, NULL, '/uploads/', '/uploads/', '/uploads/', NULL, NULL, NULL, NULL, '/uploads/', NULL, NULL, NULL, NULL, 'Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-23', 'NO', '2023-05-23 02:39:54', '2023-05-23 02:39:54'),
(117, 'client-9062', 'nahid client', NULL, 'e4rfzwf', 'terfg@gmail.com', NULL, NULL, 5464524, '/uploads/1684833854-nid-back.jpg', '/uploads/1684833854-nid-front.jpg', '/uploads/E9bYE1684833854.jpg', 'MALE', NULL, NULL, NULL, '/uploads/', NULL, NULL, NULL, 'MARRIED', 'Uganda', 'Work visa', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2023-05-23', 'NO', '2023-05-23 03:24:14', '2023-05-23 03:24:14'),
(118, 'client-45299', 'habib', '01401033445', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', 'ssk.m360ict@gmail.com', '2023-05-17', '0', 7414515415415, '/uploads/1684835013-nid-back.jpg', '/uploads/1684835013-nid-front.jpg', '/uploads/yLPea1684835013.jpg', 'MALE', 'DONE', 'feaffefe', '2023-05-23', '/uploads/71laD1684835013.jpg', 'test', 'testy', 'tesrt', NULL, 'Bangladesh', 'sdgsdgsdg', NULL, 'afaff', 'test ward', 'test district', 'aefaffe', 'feafeaf', 'feaafefe', 'TC', '12358896', 'POSITIVE', 54365434, 1, NULL, '2023-05-23', 'NO', '2023-05-23 03:43:33', '2023-05-23 03:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `client_agents`
--

CREATE TABLE `client_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_agents`
--

INSERT INTO `client_agents` (`id`, `client_id`, `agent_id`, `created_at`, `updated_at`) VALUES
(1, 115, 34, '2023-05-15 07:14:39', '2023-05-15 22:49:01'),
(2, 116, 53, '2023-05-23 02:39:54', '2023-05-23 02:39:54'),
(3, 117, 53, '2023-05-23 03:24:14', '2023-05-23 03:24:14'),
(4, 118, 52, '2023-05-23 03:43:33', '2023-05-23 03:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `client_ledgers`
--

CREATE TABLE `client_ledgers` (
  `client_ledger_id` int(10) UNSIGNED NOT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `client_account_id` bigint(20) DEFAULT NULL,
  `client_transaction_id` bigint(20) DEFAULT NULL,
  `client_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `client_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `client_ledger_refund_id` bigint(20) DEFAULT NULL,
  `client_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_last_balance` bigint(20) DEFAULT NULL,
  `client_ledger_dr` bigint(20) DEFAULT NULL,
  `client_ledger_cr` bigint(20) DEFAULT NULL,
  `client_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_ledgers`
--

INSERT INTO `client_ledgers` (`client_ledger_id`, `client_id`, `client_account_id`, `client_transaction_id`, `client_ledger_type`, `client_ledger_invoice_id`, `client_ledger_money_receipt_id`, `client_ledger_refund_id`, `client_ledger_status`, `client_ledger_last_balance`, `client_ledger_dr`, `client_ledger_cr`, `client_ledger_date`, `client_ledger_create_date`, `client_ledger_prepared_by`, `created_at`, `updated_at`) VALUES
(112, 67, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 5000, 0, 5000, '2022-12-07', '2022-12-07', '127', '2022-12-07 05:56:11', '2022-12-07 05:56:11'),
(113, 65, NULL, NULL, 'SALE', 25, NULL, NULL, '1', -5600, 5600, NULL, '2022-12-07', '2022-12-07', '127', '2022-12-07 05:56:55', '2022-12-07 05:56:55'),
(114, 67, NULL, NULL, 'SALE', 26, NULL, NULL, '1', 3600, 1400, NULL, '2022-12-07', '2022-12-07', '127', '2022-12-07 05:58:23', '2022-12-07 05:58:23'),
(115, 67, NULL, NULL, 'REFUND', 26, NULL, 16, NULL, NULL, NULL, 400, '2022-12-07', '2022-12-07', '127', '2022-12-07 05:59:42', '2022-12-07 05:59:42'),
(116, 67, NULL, NULL, 'REFUND', 26, NULL, 17, NULL, NULL, NULL, 400, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:00:55', '2022-12-07 06:00:55'),
(117, 68, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 8000, 0, 8000, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:02:52', '2022-12-07 06:02:52'),
(118, 68, NULL, NULL, 'SALE', 27, NULL, NULL, '1', 4000, 4000, NULL, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:04:17', '2022-12-07 06:04:17'),
(119, 68, NULL, NULL, 'REFUND', 27, NULL, 18, NULL, NULL, NULL, 1700, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:05:31', '2022-12-07 06:05:31'),
(120, 69, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 5000, 0, 5000, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:09:11', '2022-12-07 06:09:11'),
(121, 69, NULL, NULL, 'SALE', 28, NULL, NULL, '1', 2600, 2400, NULL, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:10:59', '2022-12-07 06:10:59'),
(122, 69, NULL, NULL, 'REFUND', 28, NULL, 19, NULL, NULL, NULL, 1000, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:22:23', '2022-12-07 06:22:23'),
(123, 70, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 45000, 0, 45000, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:26:52', '2022-12-07 06:26:52'),
(124, 70, NULL, NULL, 'SALE', 29, NULL, NULL, '1', 4500, 40500, NULL, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:27:59', '2022-12-07 06:27:59'),
(125, 70, NULL, NULL, 'REFUND', 29, NULL, 20, NULL, NULL, NULL, 35500, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:30:29', '2022-12-07 06:30:29'),
(126, 71, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', -1000, 1000, 0, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:41:51', '2022-12-07 06:41:51'),
(127, 71, NULL, NULL, 'SALE', 30, NULL, NULL, '1', -2200, 1200, NULL, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:43:04', '2022-12-07 06:43:04'),
(128, 71, NULL, NULL, 'REFUND', 30, NULL, 21, NULL, -1400, NULL, 800, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:44:04', '2022-12-07 06:44:04'),
(129, 71, NULL, NULL, 'REFUND', 30, NULL, 22, NULL, -1150, NULL, 250, '2022-12-07', '2022-12-07', '127', '2022-12-07 06:47:19', '2022-12-07 06:47:19'),
(130, 72, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 4000, 0, 4000, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:02:39', '2022-12-07 21:02:39'),
(131, 72, NULL, NULL, 'SALE', 31, NULL, NULL, '1', -1000, 5000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:04:43', '2022-12-07 21:04:43'),
(132, 72, NULL, NULL, 'REFUND', 31, NULL, 23, NULL, 3400, NULL, 4400, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:09:24', '2022-12-07 21:09:24'),
(133, 72, NULL, NULL, 'SALE', 32, NULL, NULL, '1', -800, 4200, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:11:32', '2022-12-07 21:11:32'),
(134, 72, NULL, 183, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 2700, NULL, 3500, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:19:54', '2022-12-07 21:19:54'),
(135, 73, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 80000, 0, 80000, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:25:09', '2022-12-07 21:25:09'),
(136, 73, NULL, NULL, 'SALE', 33, NULL, NULL, '1', 8000, 72000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:28:25', '2022-12-07 21:28:25'),
(137, 73, NULL, NULL, 'REFUND', 33, NULL, 24, NULL, NULL, NULL, 55000, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:33:24', '2022-12-07 21:33:24'),
(138, 73, NULL, NULL, 'REFUND', 33, NULL, 25, NULL, NULL, NULL, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:41:19', '2022-12-07 21:41:19'),
(139, 73, NULL, NULL, 'SALE', 34, NULL, NULL, '1', 4000, 69000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 21:43:24', '2022-12-07 21:43:24'),
(140, 73, NULL, NULL, 'REFUND', 34, NULL, 26, NULL, NULL, NULL, 64000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:07:17', '2022-12-07 22:07:17'),
(141, 73, NULL, NULL, 'SALE', 35, NULL, NULL, '1', 54000, 19000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:10:15', '2022-12-07 22:10:15'),
(142, 73, NULL, NULL, 'REFUND', 35, NULL, 27, NULL, NULL, NULL, 15000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:15:54', '2022-12-07 22:15:54'),
(143, 74, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:18:44', '2022-12-07 22:18:44'),
(144, 74, NULL, NULL, 'SALE', 36, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:19:31', '2022-12-07 22:19:31'),
(145, 74, NULL, NULL, 'REFUND', 36, NULL, 28, NULL, NULL, NULL, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:39:31', '2022-12-07 22:39:31'),
(146, 75, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 1000, 0, 1000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:40:52', '2022-12-07 22:40:52'),
(147, 76, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 1000, 0, 1000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:41:33', '2022-12-07 22:41:33'),
(148, 77, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:43:40', '2022-12-07 22:43:40'),
(149, 77, NULL, NULL, 'SALE', 37, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:44:38', '2022-12-07 22:44:38'),
(150, 77, NULL, NULL, 'REFUND', 37, NULL, 29, NULL, NULL, NULL, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:47:29', '2022-12-07 22:47:29'),
(151, 78, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 5000, 0, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:52:24', '2022-12-07 22:52:24'),
(152, 79, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 500, 0, 500, '2022-12-08', '2022-12-08', '127', '2022-12-07 22:52:54', '2022-12-07 22:52:54'),
(153, 80, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:02:13', '2022-12-07 23:02:13'),
(154, 80, NULL, NULL, 'SALE', 38, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:06:20', '2022-12-07 23:06:20'),
(155, 80, NULL, NULL, 'REFUND', 38, NULL, 30, NULL, NULL, NULL, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:21:07', '2022-12-07 23:21:07'),
(156, 81, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:28:33', '2022-12-07 23:28:33'),
(157, 81, NULL, NULL, 'SALE', 39, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:30:38', '2022-12-07 23:30:38'),
(159, 82, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:53:45', '2022-12-07 23:53:45'),
(160, 82, NULL, NULL, 'SALE', 40, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:54:53', '2022-12-07 23:54:53'),
(161, 82, NULL, NULL, 'REFUND', 40, NULL, 32, NULL, NULL, NULL, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-07 23:59:00', '2022-12-07 23:59:00'),
(162, 83, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-08 00:17:09', '2022-12-08 00:17:09'),
(163, 83, NULL, NULL, 'SALE', 41, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-08 00:18:21', '2022-12-08 00:18:21'),
(164, 83, NULL, NULL, 'REFUND', 41, NULL, 33, NULL, NULL, NULL, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-08 00:22:55', '2022-12-08 00:22:55'),
(165, 83, NULL, NULL, 'REFUND', 41, NULL, 34, NULL, NULL, NULL, 2000, '2022-12-08', '2022-12-08', '127', '2022-12-08 00:23:41', '2022-12-08 00:23:41'),
(166, 84, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-08 02:55:09', '2022-12-08 02:55:09'),
(167, 84, NULL, NULL, 'SALE', 42, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-08 02:55:47', '2022-12-08 02:55:47'),
(168, 84, NULL, NULL, 'REFUND', 42, NULL, 35, NULL, NULL, NULL, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-08 02:56:37', '2022-12-08 02:56:37'),
(169, 85, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2022-12-08', '2022-12-08', '127', '2022-12-08 02:58:27', '2022-12-08 02:58:27'),
(170, 85, NULL, NULL, 'SALE', 43, NULL, NULL, '1', 1000, 9000, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-08 02:59:33', '2022-12-08 02:59:33'),
(171, 85, NULL, NULL, 'REFUND', 43, NULL, 36, NULL, NULL, NULL, 5000, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:00:15', '2022-12-08 03:00:15'),
(172, 85, NULL, NULL, 'REFUND', 43, NULL, 37, NULL, NULL, NULL, 2000, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:01:26', '2022-12-08 03:01:26'),
(173, 86, NULL, NULL, 'SALE', 44, NULL, NULL, '1', -500, 500, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:14:34', '2022-12-08 03:14:34'),
(174, 86, NULL, 223, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 500, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:15:11', '2022-12-08 03:15:11'),
(175, 86, NULL, NULL, 'REFUND', 44, NULL, 38, NULL, NULL, NULL, 450, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:15:57', '2022-12-08 03:15:57'),
(176, 87, NULL, NULL, 'SALE', 45, NULL, NULL, '1', -600, 600, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:18:03', '2022-12-08 03:18:03'),
(177, 87, NULL, NULL, 'REFUND', 45, NULL, 39, NULL, NULL, NULL, 550, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:18:35', '2022-12-08 03:18:35'),
(178, 88, NULL, NULL, 'SALE', 46, NULL, NULL, '1', -900, 900, NULL, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:27:14', '2022-12-08 03:27:14'),
(179, 88, NULL, 228, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 900, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:27:37', '2022-12-08 03:27:37'),
(180, 88, NULL, NULL, 'REFUND', 46, NULL, 40, NULL, NULL, NULL, 500, '2022-12-08', '2022-12-08', '127', '2022-12-08 03:30:45', '2022-12-08 03:30:45'),
(181, 89, NULL, NULL, 'SALE', 98, NULL, NULL, '1', -15000, 15000, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-10 20:58:01', '2022-12-10 20:58:01'),
(182, 89, NULL, 231, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -1000, NULL, 14000, '2022-12-11', '2022-12-11', '127', '2022-12-10 20:58:15', '2022-12-10 20:58:15'),
(183, 89, NULL, 230, 'SALE UPDATED', 98, NULL, NULL, '1', -8000, 22000, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-10 20:59:53', '2022-12-10 20:59:53'),
(184, 89, NULL, 231, 'CLIENT_PAYMENT_UPDATE', NULL, NULL, NULL, '1', -1000, NULL, 21000, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:00:08', '2022-12-10 21:00:08'),
(185, 90, NULL, NULL, 'SALE', 99, NULL, NULL, '1', -9000, 9000, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:01:46', '2022-12-10 21:01:46'),
(186, 90, NULL, 233, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -1000, NULL, 8000, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:02:06', '2022-12-10 21:02:06'),
(187, 90, NULL, NULL, 'REFUND', 99, NULL, 41, NULL, NULL, NULL, 0, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:12:11', '2022-12-10 21:12:11'),
(188, 90, NULL, NULL, 'REFUND', 99, NULL, 42, NULL, NULL, NULL, 0, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:15:07', '2022-12-10 21:15:07'),
(189, 91, NULL, NULL, 'SALE', 100, NULL, NULL, '1', -12000, 12000, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:16:28', '2022-12-10 21:16:28'),
(190, 91, NULL, 237, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -1000, NULL, 11000, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:16:42', '2022-12-10 21:16:42'),
(191, 91, NULL, NULL, 'REFUND', 100, NULL, 43, NULL, NULL, NULL, 7000, '2022-12-11', '2022-12-11', '127', '2022-12-10 21:17:22', '2022-12-10 21:17:22'),
(192, 92, NULL, NULL, 'SALE', 101, NULL, NULL, '1', -3000, 3000, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-10 23:25:05', '2022-12-10 23:25:05'),
(193, 92, NULL, 240, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -1000, NULL, 2000, '2022-12-11', '2022-12-11', '127', '2022-12-10 23:25:31', '2022-12-10 23:25:31'),
(194, 92, NULL, NULL, 'REFUND', 101, NULL, 44, NULL, NULL, NULL, 2000, '2022-12-11', '2022-12-11', '127', '2022-12-10 23:26:28', '2022-12-10 23:26:28'),
(195, 93, NULL, NULL, 'SALE', 102, NULL, NULL, '1', -3000, 3000, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 02:12:23', '2022-12-11 02:12:23'),
(196, 93, NULL, 243, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -500, NULL, 2500, '2022-12-11', '2022-12-11', '127', '2022-12-11 02:12:39', '2022-12-11 02:12:39'),
(197, 93, NULL, NULL, 'REFUND', 102, NULL, 45, NULL, NULL, NULL, 2300, '2022-12-11', '2022-12-11', '127', '2022-12-11 02:13:22', '2022-12-11 02:13:22'),
(198, 94, NULL, NULL, 'SALE', 103, NULL, NULL, '1', -300, 300, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:02:35', '2022-12-11 03:02:35'),
(199, 94, NULL, 246, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -50, NULL, 250, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:02:48', '2022-12-11 03:02:48'),
(200, 94, NULL, NULL, 'REFUND', 103, NULL, 46, NULL, NULL, NULL, 280, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:05:28', '2022-12-11 03:05:28'),
(201, 95, NULL, NULL, 'SALE', 104, NULL, NULL, '1', -250, 250, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:06:50', '2022-12-11 03:06:50'),
(202, 95, NULL, 249, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -50, NULL, 200, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:07:02', '2022-12-11 03:07:02'),
(203, 95, NULL, NULL, 'REFUND', 104, NULL, 47, NULL, NULL, NULL, 220, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:07:39', '2022-12-11 03:07:39'),
(204, 96, NULL, NULL, 'SALE', 105, NULL, NULL, '1', -500, 500, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:16:56', '2022-12-11 03:16:56'),
(205, 96, NULL, 252, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -100, NULL, 400, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:17:32', '2022-12-11 03:17:32'),
(206, 96, NULL, NULL, 'REFUND', 105, NULL, 48, NULL, NULL, NULL, 410, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:18:38', '2022-12-11 03:18:38'),
(207, 97, NULL, NULL, 'SALE', 106, NULL, NULL, '1', -600, 600, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:28:17', '2022-12-11 03:28:17'),
(208, 97, NULL, 255, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -200, NULL, 400, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:28:34', '2022-12-11 03:28:34'),
(209, 97, NULL, NULL, 'REFUND', 106, NULL, 49, NULL, NULL, NULL, 350, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:30:35', '2022-12-11 03:30:35'),
(210, 98, NULL, NULL, 'SALE', 107, NULL, NULL, '1', -1000, 1000, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:34:13', '2022-12-11 03:34:13'),
(211, 98, NULL, 258, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -750, NULL, 250, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:34:32', '2022-12-11 03:34:32'),
(212, 98, NULL, NULL, 'REFUND', 107, NULL, 50, NULL, NULL, NULL, 750, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:36:02', '2022-12-11 03:36:02'),
(213, 99, NULL, NULL, 'SALE', 108, NULL, NULL, '1', -400, 400, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:55:46', '2022-12-11 03:55:46'),
(214, 99, NULL, 261, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -50, NULL, 350, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:56:12', '2022-12-11 03:56:12'),
(215, 99, NULL, NULL, 'REFUND', 108, NULL, 51, NULL, NULL, NULL, 370, '2022-12-11', '2022-12-11', '127', '2022-12-11 03:58:49', '2022-12-11 03:58:49'),
(216, 99, NULL, NULL, 'SALE', 109, NULL, NULL, '1', -380, 300, NULL, '2022-12-11', '2022-12-11', '127', '2022-12-11 04:02:45', '2022-12-11 04:02:45'),
(217, 99, NULL, 264, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -300, NULL, 80, '2022-12-11', '2022-12-11', '127', '2022-12-11 04:03:17', '2022-12-11 04:03:17'),
(218, 99, NULL, NULL, 'REFUND', 109, NULL, 52, NULL, NULL, NULL, 250, '2022-12-11', '2022-12-11', '127', '2022-12-11 04:05:01', '2022-12-11 04:05:01'),
(219, 67, NULL, 266, 'Expense Created', NULL, NULL, NULL, NULL, -21400, 25000, NULL, '2022-12-12', '2022-12-12', '127', '2022-12-11 22:10:25', '2022-12-11 22:10:25'),
(220, 100, NULL, NULL, 'SALE', 110, NULL, NULL, '1', -5000, 5000, NULL, '2022-12-12', '2022-12-12', '127', '2022-12-12 00:18:50', '2022-12-12 00:18:50'),
(221, 100, NULL, 268, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 5000, '2022-12-12', '2022-12-12', '127', '2022-12-12 00:19:10', '2022-12-12 00:19:10'),
(222, 100, NULL, NULL, 'REFUND', 110, NULL, 53, NULL, -1000, NULL, 4000, '2022-12-12', '2022-12-12', '127', '2022-12-12 00:19:41', '2022-12-12 00:19:41'),
(223, 101, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 4000, 0, 4000, '2022-12-13', '2022-12-13', '127', '2022-12-12 23:28:27', '2022-12-12 23:28:27'),
(224, 102, NULL, 271, 'SALE', 111, NULL, NULL, '1', -1200, 1200, NULL, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:52:30', '2022-12-13 23:52:30'),
(225, 102, NULL, 272, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -500, NULL, 700, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:52:56', '2022-12-13 23:52:56'),
(226, 77, NULL, 273, 'EXPENSE_CREATED', NULL, NULL, NULL, NULL, -79000, 85000, NULL, '2022-12-17', '2022-12-17', '127', '2022-12-16 21:34:14', '2022-12-16 21:34:14'),
(227, 103, NULL, 274, 'SALE', 112, NULL, NULL, '1', -1500, 1500, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:02:39', '2022-12-17 21:02:39'),
(228, 104, NULL, 275, 'SALE', 113, NULL, NULL, '1', -700, 700, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:09:38', '2022-12-17 21:09:38'),
(229, 104, NULL, 276, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 500, NULL, 1200, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:10:16', '2022-12-17 21:10:16'),
(230, 104, NULL, NULL, 'REFUND', 113, NULL, 54, NULL, -100, NULL, 600, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:11:16', '2022-12-17 21:11:16'),
(231, 105, NULL, 278, 'SALE', 114, NULL, NULL, '1', -400, 400, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:13:47', '2022-12-17 21:13:47'),
(232, 105, NULL, 279, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 400, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:14:00', '2022-12-17 21:14:00'),
(233, 105, NULL, 280, 'SALE', 115, NULL, NULL, '1', -100, 100, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:17:29', '2022-12-17 21:17:29'),
(234, 105, NULL, 281, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 100, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:21:00', '2022-12-17 21:21:00'),
(235, 105, NULL, NULL, 'REFUND', 115, NULL, 55, NULL, -50, NULL, 50, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:28:54', '2022-12-17 21:28:54'),
(236, 106, NULL, 283, 'SALE', 116, NULL, NULL, '1', -500, 500, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:31:14', '2022-12-17 21:31:14'),
(237, 106, NULL, 284, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 500, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:31:30', '2022-12-17 21:31:30'),
(238, 106, NULL, NULL, 'REFUND', 116, NULL, 56, NULL, -100, NULL, 400, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:33:49', '2022-12-17 21:33:49'),
(239, 107, NULL, 286, 'SALE', 117, NULL, NULL, '1', -500, 500, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:45:22', '2022-12-17 21:45:22'),
(240, 107, NULL, 287, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 500, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:45:36', '2022-12-17 21:45:36'),
(241, 107, NULL, NULL, 'REFUND', 117, NULL, 57, NULL, 0, NULL, 350, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:46:36', '2022-12-17 21:46:36'),
(242, 107, NULL, 289, 'SALE', 118, NULL, NULL, '1', -1750, 1750, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:48:30', '2022-12-17 21:48:30'),
(243, 107, NULL, 290, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 1750, '2022-12-18', '2022-12-18', '127', '2022-12-17 21:48:51', '2022-12-17 21:48:51'),
(244, 107, NULL, 291, 'SALE', 119, NULL, NULL, '1', -1500, 1500, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:05:14', '2022-12-17 22:05:14'),
(245, 107, NULL, 292, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 1500, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:05:40', '2022-12-17 22:05:40'),
(246, 107, NULL, 293, 'SALE', 120, NULL, NULL, '1', -3000, 3000, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:12:21', '2022-12-17 22:12:21'),
(247, 107, NULL, 294, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 3000, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:12:35', '2022-12-17 22:12:35'),
(248, 107, NULL, 295, 'SALE', 121, NULL, NULL, '1', -3000, 3000, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:15:11', '2022-12-17 22:15:11'),
(249, 107, NULL, 296, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 3000, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:15:35', '2022-12-17 22:15:35'),
(250, 107, NULL, 295, 'SALE UPDATED', 121, NULL, NULL, '1', 0, 3000, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:28:07', '2022-12-17 22:28:07'),
(251, 107, NULL, 295, 'SALE UPDATED', 121, NULL, NULL, '1', 0, 3000, NULL, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:37:42', '2022-12-17 22:37:42'),
(252, 107, NULL, NULL, 'REFUND', 121, NULL, 58, NULL, NULL, NULL, 2880, '2022-12-18', '2022-12-18', '127', '2022-12-18 04:44:13', '2022-12-18 04:44:13'),
(253, 107, NULL, 295, 'SALE UPDATED', 121, NULL, NULL, '1', 2880, 3000, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-18 21:18:15', '2022-12-18 21:18:15'),
(254, 107, NULL, 298, 'SALE', 122, NULL, NULL, '1', -16170, 19050, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-18 21:27:25', '2022-12-18 21:27:25'),
(255, 107, NULL, 299, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 2880, NULL, 19050, '2022-12-19', '2022-12-19', '127', '2022-12-18 21:27:57', '2022-12-18 21:27:57'),
(256, 105, NULL, 300, 'SALE', 123, NULL, NULL, '1', -2750, 2700, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(257, 105, NULL, 301, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -50, NULL, 2700, '2022-12-19', '2022-12-19', '127', '2022-12-18 21:39:03', '2022-12-18 21:39:03'),
(258, 105, NULL, NULL, 'REFUND', 123, NULL, 59, NULL, -172, NULL, 2578, '2022-12-19', '2022-12-19', '127', '2022-12-19 02:16:21', '2022-12-19 02:16:21'),
(259, 105, NULL, 303, 'SALE', 124, NULL, NULL, '1', -3372, 3200, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:01:30', '2022-12-19 04:01:30'),
(260, 105, NULL, 304, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -172, NULL, 3200, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:01:44', '2022-12-19 04:01:44'),
(261, 105, NULL, NULL, 'REFUND', 124, NULL, 60, NULL, -602, NULL, 1870, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:02:38', '2022-12-19 04:02:38'),
(262, 105, NULL, 306, 'SALE', 125, NULL, NULL, '1', -2202, 1600, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:04:53', '2022-12-19 04:04:53'),
(263, 105, NULL, 307, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -602, NULL, 1600, '2022-12-16', '2022-12-19', '127', '2022-12-19 04:05:11', '2022-12-19 04:05:11'),
(264, 105, NULL, NULL, 'REFUND', 125, NULL, 61, NULL, -712, NULL, 490, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:05:54', '2022-12-19 04:05:54'),
(265, 105, NULL, 309, 'SALE', 126, NULL, NULL, '1', -1092, 380, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:07:25', '2022-12-19 04:07:25'),
(266, 105, NULL, 310, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -712, NULL, 380, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:07:40', '2022-12-19 04:07:40'),
(267, 105, NULL, NULL, 'REFUND', 126, NULL, 62, NULL, -792, NULL, 260, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:08:12', '2022-12-19 04:08:12'),
(268, 108, NULL, 312, 'SALE', 127, NULL, NULL, '1', -500, 500, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:18:33', '2022-12-19 04:18:33'),
(269, 108, NULL, 313, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 500, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:18:44', '2022-12-19 04:18:44'),
(270, 108, NULL, NULL, 'REFUND', 127, NULL, 63, NULL, 0, NULL, 450, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:19:31', '2022-12-19 04:19:31'),
(271, 108, NULL, 315, 'SALE', 128, NULL, NULL, '1', -3500, 3500, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:22:16', '2022-12-19 04:22:16'),
(272, 108, NULL, 316, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 3500, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:22:41', '2022-12-19 04:22:41'),
(273, 108, NULL, NULL, 'REFUND', 128, NULL, 64, NULL, 0, NULL, 2000, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:24:58', '2022-12-19 04:24:58'),
(274, 108, NULL, 318, 'SALE', 129, NULL, NULL, '1', -3300, 3300, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:35:29', '2022-12-19 04:35:29'),
(275, 108, NULL, 319, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 3300, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:35:44', '2022-12-19 04:35:44'),
(276, 108, NULL, NULL, 'REFUND', 129, NULL, 65, NULL, 0, NULL, 2100, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:36:29', '2022-12-19 04:36:29'),
(277, 108, NULL, NULL, 'REFUND', 129, NULL, 66, NULL, 0, NULL, 1030, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:37:13', '2022-12-19 04:37:13'),
(278, 108, NULL, 322, 'SALE', 130, NULL, NULL, '1', -8100, 8100, NULL, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:42:06', '2022-12-19 04:42:06'),
(279, 108, NULL, 323, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 8100, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:42:16', '2022-12-19 04:42:16'),
(280, 108, NULL, NULL, 'REFUND', 130, NULL, 67, NULL, 0, NULL, 5010, '2022-12-19', '2022-12-19', '127', '2022-12-19 04:43:41', '2022-12-19 04:43:41'),
(281, 108, NULL, NULL, 'REFUND', 130, NULL, 68, NULL, 0, NULL, 2460, '2022-12-19', '2022-12-19', '127', '2022-12-19 05:18:11', '2022-12-19 05:18:11'),
(282, 109, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 1000, 0, 1000, '2022-12-20', '2022-12-20', '127', '2022-12-20 05:12:39', '2022-12-20 05:12:39'),
(283, 86, NULL, 327, 'SALE', 131, NULL, NULL, '1', -4548, 4998, NULL, '2022-12-27', '2022-12-27', '127', '2022-12-27 01:16:14', '2022-12-27 01:16:14'),
(284, 75, NULL, 328, 'SALE', 132, NULL, NULL, '1', -4666, 5666, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-24 21:15:37', '2023-01-24 21:15:37'),
(285, 74, NULL, 329, 'SALE', 133, NULL, NULL, '1', -54000, 60000, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-24 21:24:20', '2023-01-24 21:24:20'),
(286, 74, NULL, 330, 'SALE', 134, NULL, NULL, '1', -58000, 4000, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-24 22:08:01', '2023-01-24 22:08:01'),
(287, 84, NULL, 331, 'SALE', 135, NULL, NULL, '1', 5998, 2, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-24 22:38:03', '2023-01-24 22:38:03'),
(288, 87, NULL, 332, 'SALE', 136, NULL, NULL, '1', -13450, 13400, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-24 23:52:46', '2023-01-24 23:52:46'),
(289, 74, NULL, 333, 'SALE', 137, NULL, NULL, '1', -73500, 15500, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-25 04:56:40', '2023-01-25 04:56:40'),
(290, 75, NULL, 334, 'SALE', 138, NULL, NULL, '1', -124666, 120000, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-25 05:04:28', '2023-01-25 05:04:28'),
(291, 84, NULL, 335, 'SALE', 139, NULL, NULL, '1', 5448, 550, NULL, '2023-01-25', '2023-01-25', '127', '2023-01-25 05:10:18', '2023-01-25 05:10:18'),
(292, 92, NULL, 336, 'SALE', 140, NULL, NULL, '1', -22500, 18500, NULL, '2023-01-26', '2023-01-26', '127', '2023-01-25 21:03:21', '2023-01-25 21:03:21'),
(293, 74, NULL, 337, 'SALE', 141, NULL, NULL, '1', -83500, 10000, NULL, '2023-01-26', '2023-01-26', '127', '2023-01-25 21:14:33', '2023-01-25 21:14:33'),
(294, 110, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, 0, 10000, '2023-01-26', '2023-01-26', '127', '2023-01-25 21:28:04', '2023-01-25 21:28:04'),
(295, 112, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 1000, NULL, 0, '2023-03-09', '2023-03-09', '127', '2023-03-08 21:43:38', '2023-03-08 21:43:38'),
(296, 65, NULL, 340, 'SALE', 142, NULL, NULL, '1', -6200, 600, NULL, '2023-04-06', '2023-04-06', '129', '2023-04-05 21:00:31', '2023-04-05 21:00:31'),
(297, 65, NULL, 341, 'SALE', 143, NULL, NULL, '1', -7000, 800, NULL, '2023-04-06', '2023-04-06', '129', '2023-04-05 21:01:38', '2023-04-05 21:01:38'),
(298, 65, NULL, 342, 'CLIENT_PAYMENT', NULL, NULL, NULL, '1', -6200, NULL, 800, '2023-04-06', '2023-04-06', '129', '2023-04-05 21:02:26', '2023-04-05 21:02:26'),
(299, 115, NULL, NULL, 'OPENING_BALANCE', NULL, NULL, NULL, '1', 10000, NULL, 0, '2023-05-15', '2023/05/16', '127', '2023-05-15 07:14:39', '2023-05-15 07:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `client_over_alls`
--

CREATE TABLE `client_over_alls` (
  `client_overall_id` int(10) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mofa_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mofa_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fingur_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fingur_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_statement_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_statement_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bmet_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bmet_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_airline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flight_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_over_alls_created_by` bigint(20) DEFAULT NULL,
  `client_over_alls_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `client_over_alls_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_over_alls_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_over_alls_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_over_alls`
--

INSERT INTO `client_over_alls` (`client_overall_id`, `client_id`, `mofa_number`, `mofa_file`, `fingur_status`, `fingur_file`, `bank_statement_status`, `bank_statement_file`, `bmet_status`, `bmet_file`, `flight_airline`, `flight_date`, `flight_number`, `flight_ticket_number`, `flight_file`, `client_over_alls_created_by`, `client_over_alls_has_deleted`, `client_over_alls_updated_by`, `client_over_alls_deleted_by`, `client_over_alls_create_date`, `created_at`, `updated_at`) VALUES
(1, '65', '12345678910', '/uploads/vclLQ167575241965.pdf', 'YES', '/uploads/J8hpH167575241965.pdf', 'YES', '/uploads/LQwTf167575241965.pdf', 'YES', '/uploads/6cg08167575241965.pdf', '12457810', '2023-02-19', '1237996410', '12467910', '/uploads/3q8GQ167575241965.pdf', 127, 'NO', NULL, NULL, '2023/02/07', '2023-02-07 00:46:59', '2023-02-07 00:46:59'),
(2, '111', '123456', '/uploads/wV55Z1675924146111.jpg', 'YES', '/uploads/', 'YES', '/uploads/FgW8m1675924146111.jpg', 'YES', '/uploads/G6aAv1675924146111.jpg', '849902', NULL, NULL, NULL, '/uploads/6BsDy1675924146111.jpg', 126, 'NO', '126', NULL, '2023/02/09', '2023-02-09 00:29:06', '2023-02-08 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_transactions`
--

CREATE TABLE `client_transactions` (
  `client_transaction_id` int(10) UNSIGNED NOT NULL,
  `client_transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_account_id` bigint(20) DEFAULT NULL,
  `client_transaction_client_id` bigint(20) DEFAULT NULL,
  `client_transaction_invoice_id` int(11) DEFAULT NULL,
  `client_transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_opening_balance` bigint(20) DEFAULT NULL,
  `client_transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_transaction_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `client_transaction_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_transactions`
--

INSERT INTO `client_transactions` (`client_transaction_id`, `client_transaction_type`, `client_transaction_account_id`, `client_transaction_client_id`, `client_transaction_invoice_id`, `client_transaction_amount`, `client_transaction_last_balance`, `client_transaction_opening_balance`, `client_transaction_date`, `client_transaction_note`, `client_transaction_create_date`, `client_transaction_has_deleted`, `client_transaction_deleted_by`, `created_at`, `updated_at`) VALUES
(161, 'CREDIT', 67, 67, NULL, '5000', '5000', 5000, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 05:56:11', '2022-12-07 05:56:11'),
(162, 'DEBIT', NULL, 65, NULL, '5600', '-5600', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 05:56:55', '2022-12-07 05:56:55'),
(163, 'DEBIT', NULL, 67, NULL, '1400', '3600', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 05:58:23', '2022-12-07 05:58:23'),
(164, NULL, 67, 67, NULL, NULL, '3600', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 05:59:42', '2022-12-07 05:59:42'),
(165, NULL, 67, 67, NULL, NULL, '3600', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:00:55', '2022-12-07 06:00:55'),
(166, 'CREDIT', 68, 68, NULL, '8000', '8000', 8000, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:02:52', '2022-12-07 06:02:52'),
(167, 'DEBIT', NULL, 68, NULL, '4000', '4000', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:04:17', '2022-12-07 06:04:17'),
(168, NULL, 68, 68, NULL, NULL, '4000', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:05:31', '2022-12-07 06:05:31'),
(169, 'CREDIT', 69, 69, NULL, '5000', '5000', 5000, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:09:11', '2022-12-07 06:09:11'),
(170, 'DEBIT', NULL, 69, NULL, '2400', '2600', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:10:59', '2022-12-07 06:10:59'),
(171, NULL, 69, 69, NULL, NULL, '2600', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:22:23', '2022-12-07 06:22:23'),
(172, 'CREDIT', 70, 70, NULL, '45000', '45000', 45000, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:26:52', '2022-12-07 06:26:52'),
(173, 'DEBIT', NULL, 70, NULL, '40500', '4500', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:27:59', '2022-12-07 06:27:59'),
(174, 'CREDIT', 70, 70, NULL, '35500', '40000', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:30:29', '2022-12-07 06:30:29'),
(175, 'DEBIT', 71, 71, NULL, '1000', '-1000', 1000, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:41:51', '2022-12-07 06:41:51'),
(176, 'DEBIT', NULL, 71, NULL, '1200', '-2200', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:43:04', '2022-12-07 06:43:04'),
(177, 'CREDIT', 71, 71, NULL, '800', '-1400', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:44:04', '2022-12-07 06:44:04'),
(178, 'CREDIT', 71, 71, NULL, '250', '-1150', NULL, '2022-12-07', NULL, '2022-12-07', 'NO', NULL, '2022-12-07 06:47:19', '2022-12-07 06:47:19'),
(179, 'CREDIT', 72, 72, NULL, '4000', '4000', 4000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:02:39', '2022-12-07 21:02:39'),
(180, 'DEBIT', NULL, 72, NULL, '5000', '-1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:04:43', '2022-12-07 21:04:43'),
(181, 'CREDIT', 72, 72, NULL, '4400', '3400', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:09:24', '2022-12-07 21:09:24'),
(182, 'DEBIT', NULL, 72, NULL, '4200', '-800', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:11:32', '2022-12-07 21:11:32'),
(183, 'CREDIT', NULL, 72, NULL, '3500', '2700', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:19:54', '2022-12-07 21:19:54'),
(184, 'CREDIT', 73, 73, NULL, '80000', '80000', 80000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:25:09', '2022-12-07 21:25:09'),
(185, 'DEBIT', NULL, 73, NULL, '72000', '8000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:28:25', '2022-12-07 21:28:25'),
(186, 'CREDIT', 73, 73, NULL, '55000', '63000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:33:24', '2022-12-07 21:33:24'),
(187, 'CREDIT', 73, 73, NULL, '10000', '73000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:41:19', '2022-12-07 21:41:19'),
(188, 'DEBIT', NULL, 73, NULL, '69000', '4000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 21:43:24', '2022-12-07 21:43:24'),
(189, 'CREDIT', 73, 73, NULL, '69000', '73000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:07:17', '2022-12-07 22:07:17'),
(190, 'DEBIT', NULL, 73, NULL, '19000', '54000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:10:15', '2022-12-07 22:10:15'),
(191, 'DEBIT', 73, 73, NULL, '19000', '35000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:15:54', '2022-12-07 22:15:54'),
(192, 'CREDIT', 74, 74, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:18:44', '2022-12-07 22:18:44'),
(193, 'DEBIT', NULL, 74, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:19:31', '2022-12-07 22:19:31'),
(194, 'CREDIT', 74, 74, NULL, '5000', '6000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:39:31', '2022-12-07 22:39:31'),
(195, 'CREDIT', 75, 75, NULL, '1000', '1000', 1000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:40:52', '2022-12-07 22:40:52'),
(196, 'CREDIT', 76, 76, NULL, '1000', '1000', 1000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:41:33', '2022-12-07 22:41:33'),
(197, 'CREDIT', 77, 77, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:43:40', '2022-12-07 22:43:40'),
(198, 'DEBIT', NULL, 77, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:44:38', '2022-12-07 22:44:38'),
(199, 'CREDIT', 77, 77, NULL, '5000', '6000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:47:29', '2022-12-07 22:47:29'),
(200, 'CREDIT', 78, 78, NULL, '5000', '5000', 5000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:52:24', '2022-12-07 22:52:24'),
(201, 'CREDIT', 79, 79, NULL, '500', '500', 500, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 22:52:54', '2022-12-07 22:52:54'),
(202, 'CREDIT', 80, 80, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:02:13', '2022-12-07 23:02:13'),
(203, 'DEBIT', NULL, 80, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:06:20', '2022-12-07 23:06:20'),
(204, 'CREDIT', 80, 80, NULL, '5000', '6000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:21:07', '2022-12-07 23:21:07'),
(205, 'CREDIT', 81, 81, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:28:33', '2022-12-07 23:28:33'),
(206, 'DEBIT', NULL, 81, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:30:38', '2022-12-07 23:30:38'),
(208, 'CREDIT', 82, 82, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:53:45', '2022-12-07 23:53:45'),
(209, 'DEBIT', NULL, 82, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:54:53', '2022-12-07 23:54:53'),
(210, 'CREDIT', 82, 82, NULL, '5000', '6000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-07 23:59:00', '2022-12-07 23:59:00'),
(211, 'CREDIT', 83, 83, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 00:17:09', '2022-12-08 00:17:09'),
(212, 'DEBIT', NULL, 83, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 00:18:21', '2022-12-08 00:18:21'),
(213, 'CREDIT', 83, 83, NULL, '5000', '6000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 00:22:55', '2022-12-08 00:22:55'),
(214, 'CREDIT', 83, 83, NULL, '2000', '8000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 00:23:41', '2022-12-08 00:23:41'),
(215, 'CREDIT', 84, 84, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 02:55:09', '2022-12-08 02:55:09'),
(216, 'DEBIT', NULL, 84, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 02:55:47', '2022-12-08 02:55:47'),
(217, 'CREDIT', 84, 84, NULL, '5000', '6000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 02:56:37', '2022-12-08 02:56:37'),
(218, 'CREDIT', 85, 85, NULL, '10000', '10000', 10000, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 02:58:27', '2022-12-08 02:58:27'),
(219, 'DEBIT', NULL, 85, NULL, '9000', '1000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 02:59:32', '2022-12-08 02:59:33'),
(220, 'CREDIT', 85, 85, NULL, '5000', '6000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:00:15', '2022-12-08 03:00:15'),
(221, 'CREDIT', 85, 85, NULL, '2000', '8000', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:01:26', '2022-12-08 03:01:26'),
(222, 'DEBIT', NULL, 86, NULL, '500', '-500', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:14:34', '2022-12-08 03:14:34'),
(223, 'CREDIT', NULL, 86, NULL, '500', '0', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:15:11', '2022-12-08 03:15:11'),
(224, 'CREDIT', 86, 86, NULL, '450', '450', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:15:57', '2022-12-08 03:15:57'),
(225, 'DEBIT', NULL, 87, NULL, '600', '-600', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:18:03', '2022-12-08 03:18:03'),
(226, 'CREDIT', 87, 87, NULL, '550', '-50', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:18:35', '2022-12-08 03:18:35'),
(227, 'DEBIT', NULL, 88, NULL, '900', '-900', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:27:14', '2022-12-08 03:27:14'),
(228, 'CREDIT', NULL, 88, NULL, '900', '0', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:27:37', '2022-12-08 03:27:37'),
(229, 'DEBIT', 88, 88, NULL, '600', '-600', NULL, '2022-12-08', NULL, '2022-12-08', 'NO', NULL, '2022-12-08 03:30:45', '2022-12-08 03:30:45'),
(230, 'DEBIT', NULL, 89, 98, '22000', '-8000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 20:58:01', '2022-12-10 20:59:53'),
(231, 'CREDIT', NULL, 89, NULL, '21000', '-1000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 20:58:15', '2022-12-10 21:00:08'),
(232, 'DEBIT', NULL, 90, 99, '9000', '-9000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:01:46', '2022-12-10 21:01:46'),
(233, 'CREDIT', NULL, 90, NULL, '8000', '-1000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:02:06', '2022-12-10 21:02:06'),
(234, 'DEBIT', 90, 90, NULL, '0', '-1000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:12:11', '2022-12-10 21:12:11'),
(235, 'DEBIT', 90, 90, NULL, '0', '-1000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:15:07', '2022-12-10 21:15:07'),
(236, 'DEBIT', NULL, 91, 100, '12000', '-12000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:16:28', '2022-12-10 21:16:28'),
(237, 'CREDIT', NULL, 91, NULL, '11000', '-1000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:16:42', '2022-12-10 21:16:42'),
(238, 'DEBIT', 91, 91, NULL, '8000', '-9000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 21:17:22', '2022-12-10 21:17:22'),
(239, 'DEBIT', NULL, 92, 101, '3000', '-3000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 23:25:05', '2022-12-10 23:25:05'),
(240, 'CREDIT', NULL, 92, NULL, '2000', '-1000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 23:25:31', '2022-12-10 23:25:31'),
(241, 'DEBIT', 92, 92, NULL, '3000', '-4000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-10 23:26:28', '2022-12-10 23:26:28'),
(242, 'DEBIT', NULL, 93, 102, '3000', '-3000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 02:12:23', '2022-12-11 02:12:23'),
(243, 'CREDIT', NULL, 93, NULL, '2500', '-500', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 02:12:39', '2022-12-11 02:12:39'),
(244, 'DEBIT', 93, 93, NULL, '3000', '-3500', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 02:13:22', '2022-12-11 02:13:22'),
(245, 'DEBIT', NULL, 94, 103, '300', '-300', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:02:35', '2022-12-11 03:02:35'),
(246, 'CREDIT', NULL, 94, NULL, '250', '-50', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:02:48', '2022-12-11 03:02:48'),
(247, 'CREDIT', 94, 94, NULL, '20', '-30', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:05:28', '2022-12-11 03:05:28'),
(248, 'DEBIT', NULL, 95, 104, '250', '-250', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:06:50', '2022-12-11 03:06:50'),
(249, 'CREDIT', NULL, 95, NULL, '200', '-50', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:07:02', '2022-12-11 03:07:02'),
(250, 'DEBIT', 95, 95, NULL, '30', '-80', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:07:39', '2022-12-11 03:07:39'),
(251, 'DEBIT', NULL, 96, 105, '500', '-500', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:16:56', '2022-12-11 03:16:56'),
(252, 'CREDIT', NULL, 96, NULL, '400', '-100', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:17:32', '2022-12-11 03:17:32'),
(253, 'DEBIT', 96, 96, NULL, '90', '-190', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:18:38', '2022-12-11 03:18:38'),
(254, 'DEBIT', NULL, 97, 106, '600', '-600', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:28:17', '2022-12-11 03:28:17'),
(255, 'CREDIT', NULL, 97, NULL, '400', '-200', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:28:34', '2022-12-11 03:28:34'),
(256, 'DEBIT', 97, 97, NULL, '250', '-450', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:30:35', '2022-12-11 03:30:35'),
(257, 'DEBIT', NULL, 98, 107, '1000', '-1000', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:34:13', '2022-12-11 03:34:13'),
(258, 'CREDIT', NULL, 98, NULL, '250', '-750', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:34:32', '2022-12-11 03:34:32'),
(259, 'CREDIT', 98, 98, NULL, '750', '0', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:36:02', '2022-12-11 03:36:02'),
(260, 'DEBIT', NULL, 99, 108, '400', '-400', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:55:46', '2022-12-11 03:55:46'),
(261, 'CREDIT', NULL, 99, NULL, '350', '-50', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:56:12', '2022-12-11 03:56:12'),
(262, 'DEBIT', 99, 99, NULL, '30', '-80', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 03:58:49', '2022-12-11 03:58:49'),
(263, 'DEBIT', NULL, 99, 109, '300', '-380', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 04:02:45', '2022-12-11 04:02:45'),
(264, 'CREDIT', NULL, 99, NULL, '80', '-300', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 04:03:17', '2022-12-11 04:03:17'),
(265, 'DEBIT', 99, 99, NULL, '50', '-350', NULL, '2022-12-11', NULL, '2022-12-11', 'NO', NULL, '2022-12-11 04:05:01', '2022-12-11 04:05:01'),
(266, 'DEBIT', NULL, 67, NULL, '25000', '-21400', NULL, '2022-12-12', NULL, NULL, 'NO', NULL, '2022-12-11 22:10:25', '2022-12-11 22:10:25'),
(267, 'DEBIT', NULL, 100, 110, '5000', '-5000', NULL, '2022-12-12', NULL, '2022-12-12', 'NO', NULL, '2022-12-12 00:18:50', '2022-12-12 00:18:50'),
(268, 'CREDIT', NULL, 100, NULL, '5000', '0', NULL, '2022-12-12', NULL, '2022-12-12', 'NO', NULL, '2022-12-12 00:19:10', '2022-12-12 00:19:10'),
(269, 'DEBIT', 100, 100, NULL, '1000', '-1000', NULL, '2022-12-12', NULL, '2022-12-12', 'NO', NULL, '2022-12-12 00:19:40', '2022-12-12 00:19:40'),
(270, 'CREDIT', 101, 101, NULL, '4000', '4000', 4000, '2022-12-13', NULL, '2022-12-13', 'NO', NULL, '2022-12-12 23:28:27', '2022-12-12 23:28:27'),
(271, 'DEBIT', NULL, 102, 111, '1200', '-1200', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:52:30', '2022-12-13 23:52:30'),
(272, 'CREDIT', NULL, 102, NULL, '700', '-500', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, '2022-12-13 23:52:56', '2022-12-13 23:52:56'),
(273, 'DEBIT', NULL, 77, NULL, '85000', '-79000', NULL, '2022-12-17', NULL, NULL, 'NO', NULL, '2022-12-16 21:34:14', '2022-12-16 21:34:14'),
(274, 'DEBIT', NULL, 103, 112, '1500', '-1500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:02:39', '2022-12-17 21:02:39'),
(275, 'DEBIT', NULL, 104, 113, '700', '-700', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:09:38', '2022-12-17 21:09:38'),
(276, 'CREDIT', NULL, 104, NULL, '1200', '500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:10:16', '2022-12-17 21:10:16'),
(277, 'DEBIT', 104, 104, NULL, '600', '-100', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:11:16', '2022-12-17 21:11:16'),
(278, 'DEBIT', NULL, 105, 114, '400', '-400', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:13:47', '2022-12-17 21:13:47'),
(279, 'CREDIT', NULL, 105, NULL, '400', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:14:00', '2022-12-17 21:14:00'),
(280, 'DEBIT', NULL, 105, 115, '100', '-100', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:17:29', '2022-12-17 21:17:29'),
(281, 'CREDIT', NULL, 105, NULL, '100', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:21:00', '2022-12-17 21:21:00'),
(282, 'DEBIT', 105, 105, NULL, '50', '-50', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:28:54', '2022-12-17 21:28:54'),
(283, 'DEBIT', NULL, 106, 116, '500', '-500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:31:14', '2022-12-17 21:31:14'),
(284, 'CREDIT', NULL, 106, NULL, '500', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:31:30', '2022-12-17 21:31:30'),
(285, 'DEBIT', 106, 106, NULL, '100', '-100', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:33:49', '2022-12-17 21:33:49'),
(286, 'DEBIT', NULL, 107, 117, '500', '-500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:45:22', '2022-12-17 21:45:22'),
(287, 'CREDIT', NULL, 107, NULL, '500', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:45:36', '2022-12-17 21:45:36'),
(288, 'DEBIT', 107, 107, NULL, '0', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:46:36', '2022-12-17 21:46:36'),
(289, 'DEBIT', NULL, 107, 118, '1750', '-1750', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:48:30', '2022-12-17 21:48:30'),
(290, 'CREDIT', NULL, 107, NULL, '1750', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 21:48:51', '2022-12-17 21:48:51'),
(291, 'DEBIT', NULL, 107, 119, '1500', '-1500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:05:14', '2022-12-17 22:05:14'),
(292, 'CREDIT', NULL, 107, NULL, '1500', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:05:40', '2022-12-17 22:05:40'),
(293, 'DEBIT', NULL, 107, 120, '3000', '-3000', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:12:21', '2022-12-17 22:12:21'),
(294, 'CREDIT', NULL, 107, NULL, '3000', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:12:35', '2022-12-17 22:12:35'),
(295, 'DEBIT', NULL, 107, 121, '3000', '2880', NULL, NULL, NULL, '2022-12-19', 'NO', NULL, '2022-12-17 22:15:11', '2022-12-18 21:18:15'),
(296, 'CREDIT', NULL, 107, NULL, '3000', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-17 22:15:35', '2022-12-17 22:15:35'),
(297, 'CREDIT', 107, 107, NULL, '2880', '2880', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, '2022-12-18 04:44:13', '2022-12-18 04:44:13'),
(298, 'DEBIT', NULL, 107, 122, '19050', '-16170', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-18 21:27:25', '2022-12-18 21:27:25'),
(299, 'CREDIT', NULL, 107, NULL, '19050', '2880', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-18 21:27:57', '2022-12-18 21:27:57'),
(300, 'DEBIT', NULL, 105, 123, '2700', '-2750', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(301, 'CREDIT', NULL, 105, NULL, '2700', '-50', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-18 21:39:03', '2022-12-18 21:39:03'),
(302, 'DEBIT', 105, 105, NULL, '122', '-172', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 02:16:21', '2022-12-19 02:16:21'),
(303, 'DEBIT', NULL, 105, 124, '3200', '-3372', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:01:30', '2022-12-19 04:01:30'),
(304, 'CREDIT', NULL, 105, NULL, '3200', '-172', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:01:44', '2022-12-19 04:01:44'),
(305, 'DEBIT', 105, 105, NULL, '430', '-602', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:02:38', '2022-12-19 04:02:38'),
(306, 'DEBIT', NULL, 105, 125, '1600', '-2202', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:04:53', '2022-12-19 04:04:53'),
(307, 'CREDIT', NULL, 105, NULL, '1600', '-602', NULL, '2022-12-16', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:05:11', '2022-12-19 04:05:11'),
(308, 'DEBIT', 105, 105, NULL, '110', '-712', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:05:54', '2022-12-19 04:05:54'),
(309, 'DEBIT', NULL, 105, 126, '380', '-1092', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:07:24', '2022-12-19 04:07:25'),
(310, 'CREDIT', NULL, 105, NULL, '380', '-712', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:07:40', '2022-12-19 04:07:40'),
(311, 'DEBIT', 105, 105, NULL, '80', '-792', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:08:12', '2022-12-19 04:08:12'),
(312, 'DEBIT', NULL, 108, 127, '500', '-500', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:18:33', '2022-12-19 04:18:33'),
(313, 'CREDIT', NULL, 108, NULL, '500', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:18:44', '2022-12-19 04:18:44'),
(314, 'DEBIT', 108, 108, NULL, '0', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:19:31', '2022-12-19 04:19:31'),
(315, 'DEBIT', NULL, 108, 128, '3500', '-3500', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:22:16', '2022-12-19 04:22:16'),
(316, 'CREDIT', NULL, 108, NULL, '3500', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:22:41', '2022-12-19 04:22:41'),
(317, 'DEBIT', 108, 108, NULL, '0', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:24:58', '2022-12-19 04:24:58'),
(318, 'DEBIT', NULL, 108, 129, '3300', '-3300', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:35:29', '2022-12-19 04:35:29'),
(319, 'CREDIT', NULL, 108, NULL, '3300', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:35:44', '2022-12-19 04:35:44'),
(320, 'DEBIT', 108, 108, NULL, '0', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:36:29', '2022-12-19 04:36:29'),
(321, 'DEBIT', 108, 108, NULL, '0', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:37:13', '2022-12-19 04:37:13'),
(322, 'DEBIT', NULL, 108, 130, '8100', '-8100', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:42:06', '2022-12-19 04:42:06'),
(323, 'CREDIT', NULL, 108, NULL, '8100', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:42:16', '2022-12-19 04:42:16'),
(324, 'DEBIT', 108, 108, NULL, '0', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 04:43:41', '2022-12-19 04:43:41'),
(325, 'DEBIT', 108, 108, NULL, '0', '0', NULL, '2022-12-19', NULL, '2022-12-19', 'NO', NULL, '2022-12-19 05:18:11', '2022-12-19 05:18:11'),
(326, 'CREDIT', 109, 109, NULL, '1000', '1000', 1000, '2022-12-20', NULL, '2022-12-20', 'NO', NULL, '2022-12-20 05:12:39', '2022-12-20 05:12:39'),
(327, 'DEBIT', NULL, 86, 131, '4998', '-4548', NULL, '2022-12-27', NULL, '2022-12-27', 'NO', NULL, '2022-12-27 01:16:14', '2022-12-27 01:16:14'),
(328, 'DEBIT', NULL, 75, 132, '5666', '-4666', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-24 21:15:37', '2023-01-24 21:15:37'),
(329, 'DEBIT', NULL, 74, 133, '60000', '-54000', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-24 21:24:20', '2023-01-24 21:24:20'),
(330, 'DEBIT', NULL, 74, 134, '4000', '-58000', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-24 22:08:01', '2023-01-24 22:08:01'),
(331, 'DEBIT', NULL, 84, 135, '2', '5998', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-24 22:38:03', '2023-01-24 22:38:03'),
(332, 'DEBIT', NULL, 87, 136, '13400', '-13450', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-24 23:52:46', '2023-01-24 23:52:46'),
(333, 'DEBIT', NULL, 74, 137, '15500', '-73500', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-25 04:56:40', '2023-01-25 04:56:40'),
(334, 'DEBIT', NULL, 75, 138, '120000', '-124666', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-25 05:04:28', '2023-01-25 05:04:28'),
(335, 'DEBIT', NULL, 84, 139, '550', '5448', NULL, '2023-01-25', NULL, '2023-01-25', 'NO', NULL, '2023-01-25 05:10:18', '2023-01-25 05:10:18'),
(336, 'DEBIT', NULL, 92, 140, '18500', '-22500', NULL, '2023-01-26', NULL, '2023-01-26', 'NO', NULL, '2023-01-25 21:03:20', '2023-01-25 21:03:20'),
(337, 'DEBIT', NULL, 74, 141, '10000', '-83500', NULL, '2023-01-26', NULL, '2023-01-26', 'NO', NULL, '2023-01-25 21:14:33', '2023-01-25 21:14:33'),
(338, 'CREDIT', 110, 110, NULL, '10000', '10000', 10000, '2023-01-26', NULL, '2023-01-26', 'NO', NULL, '2023-01-25 21:28:04', '2023-01-25 21:28:04'),
(339, NULL, 112, 112, NULL, NULL, '1000', 1000, '2023/03/09', NULL, '2023-03-09', 'NO', NULL, '2023-03-08 21:43:38', '2023-03-08 21:43:38'),
(340, 'DEBIT', NULL, 65, 142, '600', '-6200', NULL, '2023-04-06', NULL, '2023-04-06', 'NO', NULL, '2023-04-05 21:00:31', '2023-04-05 21:00:31'),
(341, 'DEBIT', NULL, 65, 143, '800', '-7000', NULL, '2023-04-06', NULL, '2023-04-06', 'NO', NULL, '2023-04-05 21:01:38', '2023-04-05 21:01:38'),
(342, 'CREDIT', NULL, 65, NULL, '800', '-6200', NULL, '2023-04-06', NULL, '2023-04-06', 'NO', NULL, '2023-04-05 21:02:26', '2023-04-05 21:02:26'),
(343, NULL, 115, 115, NULL, NULL, '10000', 10000, '2023/05/16', NULL, '2023-05-15', 'NO', NULL, '2023-05-15 07:14:39', '2023-05-15 07:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_facebook_page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_database_backup_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_passport_limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_user_limit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo_width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`company_id`, `company_name`, `company_phone`, `company_email`, `company_website`, `company_facebook_page`, `company_currency`, `company_database_backup_email`, `company_passport_limit`, `company_user_limit`, `company_address`, `company_logo_width`, `company_logo_height`, `company_logo`, `company_status`, `created_by`, `updated_by`, `deleted_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Test Company2222', '01612345678', 'ssk.m360ict@gmail.com', 'V23TV', 'T2V4V', '2TVTV', 'ssk.m360ict@gmail.com', '2', '2', '2V4V', '24V4', '4RT2V', '/company_image/1669010397.png', '0', NULL, NULL, '126', 'YES', '2022-11-20 23:59:57', '2022-11-21 02:40:11'),
(2, 'Test Company', '0161234567843', 'ssk.m360ic345t@gmail.com', 'V23TV', '334', '354534', '35435', '23545', '324534', '343', '3453', '34535', '/company_image/1669013215.png', '1', '126', NULL, NULL, 'NO', '2022-11-21 00:46:55', '2022-11-21 00:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numeric_code` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso2` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tld` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subregion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `translations` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `emoji` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emojiU` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `wikiDataId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Rapid API GeoDB Cities'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `wikiDataId`) VALUES
(1, 'Afghanistan', 'AFG', '004', 'AF', '93', 'Kabul', 'AFN', 'Afghan afghani', '؋', '.af', 'افغانستان', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Kabul\",\"gmtOffset\":16200,\"gmtOffsetName\":\"UTC+04:30\",\"abbreviation\":\"AFT\",\"tzName\":\"Afghanistan Time\"}]', '{\"kr\":\"아프가니스탄\",\"pt-BR\":\"Afeganistão\",\"pt\":\"Afeganistão\",\"nl\":\"Afghanistan\",\"hr\":\"Afganistan\",\"fa\":\"افغانستان\",\"de\":\"Afghanistan\",\"es\":\"Afganistán\",\"fr\":\"Afghanistan\",\"ja\":\"アフガニスタン\",\"it\":\"Afghanistan\",\"cn\":\"阿富汗\",\"tr\":\"Afganistan\"}', '33.00000000', '65.00000000', '🇦🇫', 'U+1F1E6 U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q889'),
(2, 'Aland Islands', 'ALA', '248', 'AX', '+358-18', 'Mariehamn', 'EUR', 'Euro', '€', '.ax', 'Åland', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Mariehamn\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"올란드 제도\",\"pt-BR\":\"Ilhas de Aland\",\"pt\":\"Ilhas de Aland\",\"nl\":\"Ålandeilanden\",\"hr\":\"Ålandski otoci\",\"fa\":\"جزایر الند\",\"de\":\"Åland\",\"es\":\"Alandia\",\"fr\":\"Åland\",\"ja\":\"オーランド諸島\",\"it\":\"Isole Aland\",\"cn\":\"奥兰群岛\",\"tr\":\"Åland Adalari\"}', '60.11666700', '19.90000000', '🇦🇽', 'U+1F1E6 U+1F1FD', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, NULL),
(3, 'Albania', 'ALB', '008', 'AL', '355', 'Tirana', 'ALL', 'Albanian lek', 'Lek', '.al', 'Shqipëria', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Tirane\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"알바니아\",\"pt-BR\":\"Albânia\",\"pt\":\"Albânia\",\"nl\":\"Albanië\",\"hr\":\"Albanija\",\"fa\":\"آلبانی\",\"de\":\"Albanien\",\"es\":\"Albania\",\"fr\":\"Albanie\",\"ja\":\"アルバニア\",\"it\":\"Albania\",\"cn\":\"阿尔巴尼亚\",\"tr\":\"Arnavutluk\"}', '41.00000000', '20.00000000', '🇦🇱', 'U+1F1E6 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q222'),
(4, 'Algeria', 'DZA', '012', 'DZ', '213', 'Algiers', 'DZD', 'Algerian dinar', 'دج', '.dz', 'الجزائر', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Algiers\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"알제리\",\"pt-BR\":\"Argélia\",\"pt\":\"Argélia\",\"nl\":\"Algerije\",\"hr\":\"Alžir\",\"fa\":\"الجزایر\",\"de\":\"Algerien\",\"es\":\"Argelia\",\"fr\":\"Algérie\",\"ja\":\"アルジェリア\",\"it\":\"Algeria\",\"cn\":\"阿尔及利亚\",\"tr\":\"Cezayir\"}', '28.00000000', '3.00000000', '🇩🇿', 'U+1F1E9 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q262'),
(5, 'American Samoa', 'ASM', '016', 'AS', '+1-684', 'Pago Pago', 'USD', 'US Dollar', '$', '.as', 'American Samoa', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Pago_Pago\",\"gmtOffset\":-39600,\"gmtOffsetName\":\"UTC-11:00\",\"abbreviation\":\"SST\",\"tzName\":\"Samoa Standard Time\"}]', '{\"kr\":\"아메리칸사모아\",\"pt-BR\":\"Samoa Americana\",\"pt\":\"Samoa Americana\",\"nl\":\"Amerikaans Samoa\",\"hr\":\"Američka Samoa\",\"fa\":\"ساموآی آمریکا\",\"de\":\"Amerikanisch-Samoa\",\"es\":\"Samoa Americana\",\"fr\":\"Samoa américaines\",\"ja\":\"アメリカ領サモア\",\"it\":\"Samoa Americane\",\"cn\":\"美属萨摩亚\",\"tr\":\"Amerikan Samoasi\"}', '-14.33333333', '-170.00000000', '🇦🇸', 'U+1F1E6 U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, NULL),
(6, 'Andorra', 'AND', '020', 'AD', '376', 'Andorra la Vella', 'EUR', 'Euro', '€', '.ad', 'Andorra', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Andorra\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"안도라\",\"pt-BR\":\"Andorra\",\"pt\":\"Andorra\",\"nl\":\"Andorra\",\"hr\":\"Andora\",\"fa\":\"آندورا\",\"de\":\"Andorra\",\"es\":\"Andorra\",\"fr\":\"Andorre\",\"ja\":\"アンドラ\",\"it\":\"Andorra\",\"cn\":\"安道尔\",\"tr\":\"Andorra\"}', '42.50000000', '1.50000000', '🇦🇩', 'U+1F1E6 U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q228'),
(7, 'Angola', 'AGO', '024', 'AO', '244', 'Luanda', 'AOA', 'Angolan kwanza', 'Kz', '.ao', 'Angola', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Luanda\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"앙골라\",\"pt-BR\":\"Angola\",\"pt\":\"Angola\",\"nl\":\"Angola\",\"hr\":\"Angola\",\"fa\":\"آنگولا\",\"de\":\"Angola\",\"es\":\"Angola\",\"fr\":\"Angola\",\"ja\":\"アンゴラ\",\"it\":\"Angola\",\"cn\":\"安哥拉\",\"tr\":\"Angola\"}', '-12.50000000', '18.50000000', '🇦🇴', 'U+1F1E6 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q916'),
(8, 'Anguilla', 'AIA', '660', 'AI', '+1-264', 'The Valley', 'XCD', 'East Caribbean dollar', '$', '.ai', 'Anguilla', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Anguilla\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"앵귈라\",\"pt-BR\":\"Anguila\",\"pt\":\"Anguila\",\"nl\":\"Anguilla\",\"hr\":\"Angvila\",\"fa\":\"آنگویلا\",\"de\":\"Anguilla\",\"es\":\"Anguilla\",\"fr\":\"Anguilla\",\"ja\":\"アンギラ\",\"it\":\"Anguilla\",\"cn\":\"安圭拉\",\"tr\":\"Anguilla\"}', '18.25000000', '-63.16666666', '🇦🇮', 'U+1F1E6 U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, NULL),
(9, 'Antarctica', 'ATA', '010', 'AQ', '672', '', 'AAD', 'Antarctican dollar', '$', '.aq', 'Antarctica', 'Polar', '', '[{\"zoneName\":\"Antarctica/Casey\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AWST\",\"tzName\":\"Australian Western Standard Time\"},{\"zoneName\":\"Antarctica/Davis\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"DAVT\",\"tzName\":\"Davis Time\"},{\"zoneName\":\"Antarctica/DumontDUrville\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"DDUT\",\"tzName\":\"Dumont d\'Urville Time\"},{\"zoneName\":\"Antarctica/Mawson\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"MAWT\",\"tzName\":\"Mawson Station Time\"},{\"zoneName\":\"Antarctica/McMurdo\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"NZDT\",\"tzName\":\"New Zealand Daylight Time\"},{\"zoneName\":\"Antarctica/Palmer\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"CLST\",\"tzName\":\"Chile Summer Time\"},{\"zoneName\":\"Antarctica/Rothera\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ROTT\",\"tzName\":\"Rothera Research Station Time\"},{\"zoneName\":\"Antarctica/Syowa\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"SYOT\",\"tzName\":\"Showa Station Time\"},{\"zoneName\":\"Antarctica/Troll\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"},{\"zoneName\":\"Antarctica/Vostok\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"VOST\",\"tzName\":\"Vostok Station Time\"}]', '{\"kr\":\"남극\",\"pt-BR\":\"Antártida\",\"pt\":\"Antárctida\",\"nl\":\"Antarctica\",\"hr\":\"Antarktika\",\"fa\":\"جنوبگان\",\"de\":\"Antarktika\",\"es\":\"Antártida\",\"fr\":\"Antarctique\",\"ja\":\"南極大陸\",\"it\":\"Antartide\",\"cn\":\"南极洲\",\"tr\":\"Antartika\"}', '-74.65000000', '4.48000000', '🇦🇶', 'U+1F1E6 U+1F1F6', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, NULL),
(10, 'Antigua And Barbuda', 'ATG', '028', 'AG', '+1-268', 'St. John\'s', 'XCD', 'Eastern Caribbean dollar', '$', '.ag', 'Antigua and Barbuda', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Antigua\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"앤티가 바부다\",\"pt-BR\":\"Antígua e Barbuda\",\"pt\":\"Antígua e Barbuda\",\"nl\":\"Antigua en Barbuda\",\"hr\":\"Antigva i Barbuda\",\"fa\":\"آنتیگوا و باربودا\",\"de\":\"Antigua und Barbuda\",\"es\":\"Antigua y Barbuda\",\"fr\":\"Antigua-et-Barbuda\",\"ja\":\"アンティグア・バーブーダ\",\"it\":\"Antigua e Barbuda\",\"cn\":\"安提瓜和巴布达\",\"tr\":\"Antigua Ve Barbuda\"}', '17.05000000', '-61.80000000', '🇦🇬', 'U+1F1E6 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q781'),
(11, 'Argentina', 'ARG', '032', 'AR', '54', 'Buenos Aires', 'ARS', 'Argentine peso', '$', '.ar', 'Argentina', 'Americas', 'South America', '[{\"zoneName\":\"America/Argentina/Buenos_Aires\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Catamarca\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Cordoba\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Jujuy\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/La_Rioja\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Mendoza\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Rio_Gallegos\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Salta\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/San_Juan\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/San_Luis\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Tucuman\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"},{\"zoneName\":\"America/Argentina/Ushuaia\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"ART\",\"tzName\":\"Argentina Time\"}]', '{\"kr\":\"아르헨티나\",\"pt-BR\":\"Argentina\",\"pt\":\"Argentina\",\"nl\":\"Argentinië\",\"hr\":\"Argentina\",\"fa\":\"آرژانتین\",\"de\":\"Argentinien\",\"es\":\"Argentina\",\"fr\":\"Argentine\",\"ja\":\"アルゼンチン\",\"it\":\"Argentina\",\"cn\":\"阿根廷\",\"tr\":\"Arjantin\"}', '-34.00000000', '-64.00000000', '🇦🇷', 'U+1F1E6 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q414'),
(12, 'Armenia', 'ARM', '051', 'AM', '374', 'Yerevan', 'AMD', 'Armenian dram', '֏', '.am', 'Հայաստան', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Yerevan\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Armenia Time\"}]', '{\"kr\":\"아르메니아\",\"pt-BR\":\"Armênia\",\"pt\":\"Arménia\",\"nl\":\"Armenië\",\"hr\":\"Armenija\",\"fa\":\"ارمنستان\",\"de\":\"Armenien\",\"es\":\"Armenia\",\"fr\":\"Arménie\",\"ja\":\"アルメニア\",\"it\":\"Armenia\",\"cn\":\"亚美尼亚\",\"tr\":\"Ermenistan\"}', '40.00000000', '45.00000000', '🇦🇲', 'U+1F1E6 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q399'),
(13, 'Aruba', 'ABW', '533', 'AW', '297', 'Oranjestad', 'AWG', 'Aruban florin', 'ƒ', '.aw', 'Aruba', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Aruba\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"아루바\",\"pt-BR\":\"Aruba\",\"pt\":\"Aruba\",\"nl\":\"Aruba\",\"hr\":\"Aruba\",\"fa\":\"آروبا\",\"de\":\"Aruba\",\"es\":\"Aruba\",\"fr\":\"Aruba\",\"ja\":\"アルバ\",\"it\":\"Aruba\",\"cn\":\"阿鲁巴\",\"tr\":\"Aruba\"}', '12.50000000', '-69.96666666', '🇦🇼', 'U+1F1E6 U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, NULL),
(14, 'Australia', 'AUS', '036', 'AU', '61', 'Canberra', 'AUD', 'Australian dollar', '$', '.au', 'Australia', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Antarctica/Macquarie\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"MIST\",\"tzName\":\"Macquarie Island Station Time\"},{\"zoneName\":\"Australia/Adelaide\",\"gmtOffset\":37800,\"gmtOffsetName\":\"UTC+10:30\",\"abbreviation\":\"ACDT\",\"tzName\":\"Australian Central Daylight Saving Time\"},{\"zoneName\":\"Australia/Brisbane\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"AEST\",\"tzName\":\"Australian Eastern Standard Time\"},{\"zoneName\":\"Australia/Broken_Hill\",\"gmtOffset\":37800,\"gmtOffsetName\":\"UTC+10:30\",\"abbreviation\":\"ACDT\",\"tzName\":\"Australian Central Daylight Saving Time\"},{\"zoneName\":\"Australia/Currie\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"},{\"zoneName\":\"Australia/Darwin\",\"gmtOffset\":34200,\"gmtOffsetName\":\"UTC+09:30\",\"abbreviation\":\"ACST\",\"tzName\":\"Australian Central Standard Time\"},{\"zoneName\":\"Australia/Eucla\",\"gmtOffset\":31500,\"gmtOffsetName\":\"UTC+08:45\",\"abbreviation\":\"ACWST\",\"tzName\":\"Australian Central Western Standard Time (Unofficial)\"},{\"zoneName\":\"Australia/Hobart\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"},{\"zoneName\":\"Australia/Lindeman\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"AEST\",\"tzName\":\"Australian Eastern Standard Time\"},{\"zoneName\":\"Australia/Lord_Howe\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"LHST\",\"tzName\":\"Lord Howe Summer Time\"},{\"zoneName\":\"Australia/Melbourne\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"},{\"zoneName\":\"Australia/Perth\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"AWST\",\"tzName\":\"Australian Western Standard Time\"},{\"zoneName\":\"Australia/Sydney\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"AEDT\",\"tzName\":\"Australian Eastern Daylight Saving Time\"}]', '{\"kr\":\"호주\",\"pt-BR\":\"Austrália\",\"pt\":\"Austrália\",\"nl\":\"Australië\",\"hr\":\"Australija\",\"fa\":\"استرالیا\",\"de\":\"Australien\",\"es\":\"Australia\",\"fr\":\"Australie\",\"ja\":\"オーストラリア\",\"it\":\"Australia\",\"cn\":\"澳大利亚\",\"tr\":\"Avustralya\"}', '-27.00000000', '133.00000000', '🇦🇺', 'U+1F1E6 U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q408'),
(15, 'Austria', 'AUT', '040', 'AT', '43', 'Vienna', 'EUR', 'Euro', '€', '.at', 'Österreich', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Vienna\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"오스트리아\",\"pt-BR\":\"áustria\",\"pt\":\"áustria\",\"nl\":\"Oostenrijk\",\"hr\":\"Austrija\",\"fa\":\"اتریش\",\"de\":\"Österreich\",\"es\":\"Austria\",\"fr\":\"Autriche\",\"ja\":\"オーストリア\",\"it\":\"Austria\",\"cn\":\"奥地利\",\"tr\":\"Avusturya\"}', '47.33333333', '13.33333333', '🇦🇹', 'U+1F1E6 U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q40'),
(16, 'Azerbaijan', 'AZE', '031', 'AZ', '994', 'Baku', 'AZN', 'Azerbaijani manat', 'm', '.az', 'Azərbaycan', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Baku\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"AZT\",\"tzName\":\"Azerbaijan Time\"}]', '{\"kr\":\"아제르바이잔\",\"pt-BR\":\"Azerbaijão\",\"pt\":\"Azerbaijão\",\"nl\":\"Azerbeidzjan\",\"hr\":\"Azerbajdžan\",\"fa\":\"آذربایجان\",\"de\":\"Aserbaidschan\",\"es\":\"Azerbaiyán\",\"fr\":\"Azerbaïdjan\",\"ja\":\"アゼルバイジャン\",\"it\":\"Azerbaijan\",\"cn\":\"阿塞拜疆\",\"tr\":\"Azerbaycan\"}', '40.50000000', '47.50000000', '🇦🇿', 'U+1F1E6 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q227'),
(17, 'The Bahamas', 'BHS', '044', 'BS', '+1-242', 'Nassau', 'BSD', 'Bahamian dollar', 'B$', '.bs', 'Bahamas', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Nassau\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America)\"}]', '{\"kr\":\"바하마\",\"pt-BR\":\"Bahamas\",\"pt\":\"Baamas\",\"nl\":\"Bahama’s\",\"hr\":\"Bahami\",\"fa\":\"باهاما\",\"de\":\"Bahamas\",\"es\":\"Bahamas\",\"fr\":\"Bahamas\",\"ja\":\"バハマ\",\"it\":\"Bahamas\",\"cn\":\"巴哈马\",\"tr\":\"Bahamalar\"}', '24.25000000', '-76.00000000', '🇧🇸', 'U+1F1E7 U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:06:00', 1, 'Q778'),
(18, 'Bahrain', 'BHR', '048', 'BH', '973', 'Manama', 'BHD', 'Bahraini dinar', '.د.ب', '.bh', '‏البحرين', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Bahrain\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"바레인\",\"pt-BR\":\"Bahrein\",\"pt\":\"Barém\",\"nl\":\"Bahrein\",\"hr\":\"Bahrein\",\"fa\":\"بحرین\",\"de\":\"Bahrain\",\"es\":\"Bahrein\",\"fr\":\"Bahreïn\",\"ja\":\"バーレーン\",\"it\":\"Bahrein\",\"cn\":\"巴林\",\"tr\":\"Bahreyn\"}', '26.00000000', '50.55000000', '🇧🇭', 'U+1F1E7 U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q398'),
(19, 'Bangladesh', 'BGD', '050', 'BD', '880', 'Dhaka', 'BDT', 'Bangladeshi taka', '৳', '.bd', 'Bangladesh', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Dhaka\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"BDT\",\"tzName\":\"Bangladesh Standard Time\"}]', '{\"kr\":\"방글라데시\",\"pt-BR\":\"Bangladesh\",\"pt\":\"Bangladeche\",\"nl\":\"Bangladesh\",\"hr\":\"Bangladeš\",\"fa\":\"بنگلادش\",\"de\":\"Bangladesch\",\"es\":\"Bangladesh\",\"fr\":\"Bangladesh\",\"ja\":\"バングラデシュ\",\"it\":\"Bangladesh\",\"cn\":\"孟加拉\",\"tr\":\"Bangladeş\"}', '24.00000000', '90.00000000', '🇧🇩', 'U+1F1E7 U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q902'),
(20, 'Barbados', 'BRB', '052', 'BB', '+1-246', 'Bridgetown', 'BBD', 'Barbadian dollar', 'Bds$', '.bb', 'Barbados', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Barbados\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"바베이도스\",\"pt-BR\":\"Barbados\",\"pt\":\"Barbados\",\"nl\":\"Barbados\",\"hr\":\"Barbados\",\"fa\":\"باربادوس\",\"de\":\"Barbados\",\"es\":\"Barbados\",\"fr\":\"Barbade\",\"ja\":\"バルバドス\",\"it\":\"Barbados\",\"cn\":\"巴巴多斯\",\"tr\":\"Barbados\"}', '13.16666666', '-59.53333333', '🇧🇧', 'U+1F1E7 U+1F1E7', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q244'),
(21, 'Belarus', 'BLR', '112', 'BY', '375', 'Minsk', 'BYN', 'Belarusian ruble', 'Br', '.by', 'Белару́сь', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Minsk\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"}]', '{\"kr\":\"벨라루스\",\"pt-BR\":\"Bielorrússia\",\"pt\":\"Bielorrússia\",\"nl\":\"Wit-Rusland\",\"hr\":\"Bjelorusija\",\"fa\":\"بلاروس\",\"de\":\"Weißrussland\",\"es\":\"Bielorrusia\",\"fr\":\"Biélorussie\",\"ja\":\"ベラルーシ\",\"it\":\"Bielorussia\",\"cn\":\"白俄罗斯\",\"tr\":\"Belarus\"}', '53.00000000', '28.00000000', '🇧🇾', 'U+1F1E7 U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q184'),
(22, 'Belgium', 'BEL', '056', 'BE', '32', 'Brussels', 'EUR', 'Euro', '€', '.be', 'België', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Brussels\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"벨기에\",\"pt-BR\":\"Bélgica\",\"pt\":\"Bélgica\",\"nl\":\"België\",\"hr\":\"Belgija\",\"fa\":\"بلژیک\",\"de\":\"Belgien\",\"es\":\"Bélgica\",\"fr\":\"Belgique\",\"ja\":\"ベルギー\",\"it\":\"Belgio\",\"cn\":\"比利时\",\"tr\":\"Belçika\"}', '50.83333333', '4.00000000', '🇧🇪', 'U+1F1E7 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q31'),
(23, 'Belize', 'BLZ', '084', 'BZ', '501', 'Belmopan', 'BZD', 'Belize dollar', '$', '.bz', 'Belize', 'Americas', 'Central America', '[{\"zoneName\":\"America/Belize\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America)\"}]', '{\"kr\":\"벨리즈\",\"pt-BR\":\"Belize\",\"pt\":\"Belize\",\"nl\":\"Belize\",\"hr\":\"Belize\",\"fa\":\"بلیز\",\"de\":\"Belize\",\"es\":\"Belice\",\"fr\":\"Belize\",\"ja\":\"ベリーズ\",\"it\":\"Belize\",\"cn\":\"伯利兹\",\"tr\":\"Belize\"}', '17.25000000', '-88.75000000', '🇧🇿', 'U+1F1E7 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q242'),
(24, 'Benin', 'BEN', '204', 'BJ', '229', 'Porto-Novo', 'XOF', 'West African CFA franc', 'CFA', '.bj', 'Bénin', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Porto-Novo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"베냉\",\"pt-BR\":\"Benin\",\"pt\":\"Benim\",\"nl\":\"Benin\",\"hr\":\"Benin\",\"fa\":\"بنین\",\"de\":\"Benin\",\"es\":\"Benín\",\"fr\":\"Bénin\",\"ja\":\"ベナン\",\"it\":\"Benin\",\"cn\":\"贝宁\",\"tr\":\"Benin\"}', '9.50000000', '2.25000000', '🇧🇯', 'U+1F1E7 U+1F1EF', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q962'),
(25, 'Bermuda', 'BMU', '060', 'BM', '+1-441', 'Hamilton', 'BMD', 'Bermudian dollar', '$', '.bm', 'Bermuda', 'Americas', 'Northern America', '[{\"zoneName\":\"Atlantic/Bermuda\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"버뮤다\",\"pt-BR\":\"Bermudas\",\"pt\":\"Bermudas\",\"nl\":\"Bermuda\",\"hr\":\"Bermudi\",\"fa\":\"برمودا\",\"de\":\"Bermuda\",\"es\":\"Bermudas\",\"fr\":\"Bermudes\",\"ja\":\"バミューダ\",\"it\":\"Bermuda\",\"cn\":\"百慕大\",\"tr\":\"Bermuda\"}', '32.33333333', '-64.75000000', '🇧🇲', 'U+1F1E7 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, NULL),
(26, 'Bhutan', 'BTN', '064', 'BT', '975', 'Thimphu', 'BTN', 'Bhutanese ngultrum', 'Nu.', '.bt', 'ʼbrug-yul', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Thimphu\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"BTT\",\"tzName\":\"Bhutan Time\"}]', '{\"kr\":\"부탄\",\"pt-BR\":\"Butão\",\"pt\":\"Butão\",\"nl\":\"Bhutan\",\"hr\":\"Butan\",\"fa\":\"بوتان\",\"de\":\"Bhutan\",\"es\":\"Bután\",\"fr\":\"Bhoutan\",\"ja\":\"ブータン\",\"it\":\"Bhutan\",\"cn\":\"不丹\",\"tr\":\"Butan\"}', '27.50000000', '90.50000000', '🇧🇹', 'U+1F1E7 U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q917'),
(27, 'Bolivia', 'BOL', '068', 'BO', '591', 'Sucre', 'BOB', 'Bolivian boliviano', 'Bs.', '.bo', 'Bolivia', 'Americas', 'South America', '[{\"zoneName\":\"America/La_Paz\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"BOT\",\"tzName\":\"Bolivia Time\"}]', '{\"kr\":\"볼리비아\",\"pt-BR\":\"Bolívia\",\"pt\":\"Bolívia\",\"nl\":\"Bolivia\",\"hr\":\"Bolivija\",\"fa\":\"بولیوی\",\"de\":\"Bolivien\",\"es\":\"Bolivia\",\"fr\":\"Bolivie\",\"ja\":\"ボリビア多民族国\",\"it\":\"Bolivia\",\"cn\":\"玻利维亚\",\"tr\":\"Bolivya\"}', '-17.00000000', '-65.00000000', '🇧🇴', 'U+1F1E7 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q750'),
(28, 'Bosnia and Herzegovina', 'BIH', '070', 'BA', '387', 'Sarajevo', 'BAM', 'Bosnia and Herzegovina convertible mark', 'KM', '.ba', 'Bosna i Hercegovina', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Sarajevo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"보스니아 헤르체고비나\",\"pt-BR\":\"Bósnia e Herzegovina\",\"pt\":\"Bósnia e Herzegovina\",\"nl\":\"Bosnië en Herzegovina\",\"hr\":\"Bosna i Hercegovina\",\"fa\":\"بوسنی و هرزگوین\",\"de\":\"Bosnien und Herzegowina\",\"es\":\"Bosnia y Herzegovina\",\"fr\":\"Bosnie-Herzégovine\",\"ja\":\"ボスニア・ヘルツェゴビナ\",\"it\":\"Bosnia ed Erzegovina\",\"cn\":\"波斯尼亚和黑塞哥维那\",\"tr\":\"Bosna Hersek\"}', '44.00000000', '18.00000000', '🇧🇦', 'U+1F1E7 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q225'),
(29, 'Botswana', 'BWA', '072', 'BW', '267', 'Gaborone', 'BWP', 'Botswana pula', 'P', '.bw', 'Botswana', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Gaborone\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"보츠와나\",\"pt-BR\":\"Botsuana\",\"pt\":\"Botsuana\",\"nl\":\"Botswana\",\"hr\":\"Bocvana\",\"fa\":\"بوتسوانا\",\"de\":\"Botswana\",\"es\":\"Botswana\",\"fr\":\"Botswana\",\"ja\":\"ボツワナ\",\"it\":\"Botswana\",\"cn\":\"博茨瓦纳\",\"tr\":\"Botsvana\"}', '-22.00000000', '24.00000000', '🇧🇼', 'U+1F1E7 U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q963'),
(30, 'Bouvet Island', 'BVT', '074', 'BV', '0055', '', 'NOK', 'Norwegian Krone', 'kr', '.bv', 'Bouvetøya', '', '', '[{\"zoneName\":\"Europe/Oslo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"부벳 섬\",\"pt-BR\":\"Ilha Bouvet\",\"pt\":\"Ilha Bouvet\",\"nl\":\"Bouveteiland\",\"hr\":\"Otok Bouvet\",\"fa\":\"جزیره بووه\",\"de\":\"Bouvetinsel\",\"es\":\"Isla Bouvet\",\"fr\":\"Île Bouvet\",\"ja\":\"ブーベ島\",\"it\":\"Isola Bouvet\",\"cn\":\"布维岛\",\"tr\":\"Bouvet Adasi\"}', '-54.43333333', '3.40000000', '🇧🇻', 'U+1F1E7 U+1F1FB', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, NULL),
(31, 'Brazil', 'BRA', '076', 'BR', '55', 'Brasilia', 'BRL', 'Brazilian real', 'R$', '.br', 'Brasil', 'Americas', 'South America', '[{\"zoneName\":\"America/Araguaina\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Bahia\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Belem\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Boa_Vista\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)[3\"},{\"zoneName\":\"America/Campo_Grande\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)[3\"},{\"zoneName\":\"America/Cuiaba\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasilia Time\"},{\"zoneName\":\"America/Eirunepe\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"ACT\",\"tzName\":\"Acre Time\"},{\"zoneName\":\"America/Fortaleza\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Maceio\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Manaus\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)\"},{\"zoneName\":\"America/Noronha\",\"gmtOffset\":-7200,\"gmtOffsetName\":\"UTC-02:00\",\"abbreviation\":\"FNT\",\"tzName\":\"Fernando de Noronha Time\"},{\"zoneName\":\"America/Porto_Velho\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AMT\",\"tzName\":\"Amazon Time (Brazil)[3\"},{\"zoneName\":\"America/Recife\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Rio_Branco\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"ACT\",\"tzName\":\"Acre Time\"},{\"zoneName\":\"America/Santarem\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"},{\"zoneName\":\"America/Sao_Paulo\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"BRT\",\"tzName\":\"Brasília Time\"}]', '{\"kr\":\"브라질\",\"pt-BR\":\"Brasil\",\"pt\":\"Brasil\",\"nl\":\"Brazilië\",\"hr\":\"Brazil\",\"fa\":\"برزیل\",\"de\":\"Brasilien\",\"es\":\"Brasil\",\"fr\":\"Brésil\",\"ja\":\"ブラジル\",\"it\":\"Brasile\",\"cn\":\"巴西\",\"tr\":\"Brezilya\"}', '-10.00000000', '-55.00000000', '🇧🇷', 'U+1F1E7 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q155'),
(32, 'British Indian Ocean Territory', 'IOT', '086', 'IO', '246', 'Diego Garcia', 'USD', 'United States dollar', '$', '.io', 'British Indian Ocean Territory', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Chagos\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"IOT\",\"tzName\":\"Indian Ocean Time\"}]', '{\"kr\":\"영국령 인도양 지역\",\"pt-BR\":\"Território Britânico do Oceano íÍdico\",\"pt\":\"Território Britânico do Oceano Índico\",\"nl\":\"Britse Gebieden in de Indische Oceaan\",\"hr\":\"Britanski Indijskooceanski teritorij\",\"fa\":\"قلمرو بریتانیا در اقیانوس هند\",\"de\":\"Britisches Territorium im Indischen Ozean\",\"es\":\"Territorio Británico del Océano Índico\",\"fr\":\"Territoire britannique de l\'océan Indien\",\"ja\":\"イギリス領インド洋地域\",\"it\":\"Territorio britannico dell\'oceano indiano\",\"cn\":\"英属印度洋领地\",\"tr\":\"Britanya Hint Okyanusu Topraklari\"}', '-6.00000000', '71.50000000', '🇮🇴', 'U+1F1EE U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, NULL),
(33, 'Brunei', 'BRN', '096', 'BN', '673', 'Bandar Seri Begawan', 'BND', 'Brunei dollar', 'B$', '.bn', 'Negara Brunei Darussalam', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Brunei\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"BNT\",\"tzName\":\"Brunei Darussalam Time\"}]', '{\"kr\":\"브루나이\",\"pt-BR\":\"Brunei\",\"pt\":\"Brunei\",\"nl\":\"Brunei\",\"hr\":\"Brunej\",\"fa\":\"برونئی\",\"de\":\"Brunei\",\"es\":\"Brunei\",\"fr\":\"Brunei\",\"ja\":\"ブルネイ・ダルサラーム\",\"it\":\"Brunei\",\"cn\":\"文莱\",\"tr\":\"Brunei\"}', '4.50000000', '114.66666666', '🇧🇳', 'U+1F1E7 U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q921'),
(34, 'Bulgaria', 'BGR', '100', 'BG', '359', 'Sofia', 'BGN', 'Bulgarian lev', 'Лв.', '.bg', 'България', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Sofia\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"불가리아\",\"pt-BR\":\"Bulgária\",\"pt\":\"Bulgária\",\"nl\":\"Bulgarije\",\"hr\":\"Bugarska\",\"fa\":\"بلغارستان\",\"de\":\"Bulgarien\",\"es\":\"Bulgaria\",\"fr\":\"Bulgarie\",\"ja\":\"ブルガリア\",\"it\":\"Bulgaria\",\"cn\":\"保加利亚\",\"tr\":\"Bulgaristan\"}', '43.00000000', '25.00000000', '🇧🇬', 'U+1F1E7 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q219'),
(35, 'Burkina Faso', 'BFA', '854', 'BF', '226', 'Ouagadougou', 'XOF', 'West African CFA franc', 'CFA', '.bf', 'Burkina Faso', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Ouagadougou\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"부르키나 파소\",\"pt-BR\":\"Burkina Faso\",\"pt\":\"Burquina Faso\",\"nl\":\"Burkina Faso\",\"hr\":\"Burkina Faso\",\"fa\":\"بورکینافاسو\",\"de\":\"Burkina Faso\",\"es\":\"Burkina Faso\",\"fr\":\"Burkina Faso\",\"ja\":\"ブルキナファソ\",\"it\":\"Burkina Faso\",\"cn\":\"布基纳法索\",\"tr\":\"Burkina Faso\"}', '13.00000000', '-2.00000000', '🇧🇫', 'U+1F1E7 U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q965'),
(36, 'Burundi', 'BDI', '108', 'BI', '257', 'Bujumbura', 'BIF', 'Burundian franc', 'FBu', '.bi', 'Burundi', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Bujumbura\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"부룬디\",\"pt-BR\":\"Burundi\",\"pt\":\"Burúndi\",\"nl\":\"Burundi\",\"hr\":\"Burundi\",\"fa\":\"بوروندی\",\"de\":\"Burundi\",\"es\":\"Burundi\",\"fr\":\"Burundi\",\"ja\":\"ブルンジ\",\"it\":\"Burundi\",\"cn\":\"布隆迪\",\"tr\":\"Burundi\"}', '-3.50000000', '30.00000000', '🇧🇮', 'U+1F1E7 U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q967'),
(37, 'Cambodia', 'KHM', '116', 'KH', '855', 'Phnom Penh', 'KHR', 'Cambodian riel', 'KHR', '.kh', 'Kâmpŭchéa', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Phnom_Penh\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"캄보디아\",\"pt-BR\":\"Camboja\",\"pt\":\"Camboja\",\"nl\":\"Cambodja\",\"hr\":\"Kambodža\",\"fa\":\"کامبوج\",\"de\":\"Kambodscha\",\"es\":\"Camboya\",\"fr\":\"Cambodge\",\"ja\":\"カンボジア\",\"it\":\"Cambogia\",\"cn\":\"柬埔寨\",\"tr\":\"Kamboçya\"}', '13.00000000', '105.00000000', '🇰🇭', 'U+1F1F0 U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q424'),
(38, 'Cameroon', 'CMR', '120', 'CM', '237', 'Yaounde', 'XAF', 'Central African CFA franc', 'FCFA', '.cm', 'Cameroon', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Douala\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"카메룬\",\"pt-BR\":\"Camarões\",\"pt\":\"Camarões\",\"nl\":\"Kameroen\",\"hr\":\"Kamerun\",\"fa\":\"کامرون\",\"de\":\"Kamerun\",\"es\":\"Camerún\",\"fr\":\"Cameroun\",\"ja\":\"カメルーン\",\"it\":\"Camerun\",\"cn\":\"喀麦隆\",\"tr\":\"Kamerun\"}', '6.00000000', '12.00000000', '🇨🇲', 'U+1F1E8 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q1009'),
(39, 'Canada', 'CAN', '124', 'CA', '1', 'Ottawa', 'CAD', 'Canadian dollar', '$', '.ca', 'Canada', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Atikokan\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America)\"},{\"zoneName\":\"America/Blanc-Sablon\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Cambridge_Bay\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Creston\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Dawson\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Dawson_Creek\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Edmonton\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Fort_Nelson\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America)\"},{\"zoneName\":\"America/Glace_Bay\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Goose_Bay\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Halifax\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Inuvik\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Iqaluit\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Moncton\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"},{\"zoneName\":\"America/Nipigon\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Pangnirtung\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Rainy_River\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Rankin_Inlet\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Regina\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Resolute\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/St_Johns\",\"gmtOffset\":-12600,\"gmtOffsetName\":\"UTC-03:30\",\"abbreviation\":\"NST\",\"tzName\":\"Newfoundland Standard Time\"},{\"zoneName\":\"America/Swift_Current\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Thunder_Bay\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Toronto\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Vancouver\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"},{\"zoneName\":\"America/Whitehorse\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Winnipeg\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Yellowknife\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"}]', '{\"kr\":\"캐나다\",\"pt-BR\":\"Canadá\",\"pt\":\"Canadá\",\"nl\":\"Canada\",\"hr\":\"Kanada\",\"fa\":\"کانادا\",\"de\":\"Kanada\",\"es\":\"Canadá\",\"fr\":\"Canada\",\"ja\":\"カナダ\",\"it\":\"Canada\",\"cn\":\"加拿大\",\"tr\":\"Kanada\"}', '60.00000000', '-95.00000000', '🇨🇦', 'U+1F1E8 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q16'),
(40, 'Cape Verde', 'CPV', '132', 'CV', '238', 'Praia', 'CVE', 'Cape Verdean escudo', '$', '.cv', 'Cabo Verde', 'Africa', 'Western Africa', '[{\"zoneName\":\"Atlantic/Cape_Verde\",\"gmtOffset\":-3600,\"gmtOffsetName\":\"UTC-01:00\",\"abbreviation\":\"CVT\",\"tzName\":\"Cape Verde Time\"}]', '{\"kr\":\"카보베르데\",\"pt-BR\":\"Cabo Verde\",\"pt\":\"Cabo Verde\",\"nl\":\"Kaapverdië\",\"hr\":\"Zelenortska Republika\",\"fa\":\"کیپ ورد\",\"de\":\"Kap Verde\",\"es\":\"Cabo Verde\",\"fr\":\"Cap Vert\",\"ja\":\"カーボベルデ\",\"it\":\"Capo Verde\",\"cn\":\"佛得角\",\"tr\":\"Cabo Verde\"}', '16.00000000', '-24.00000000', '🇨🇻', 'U+1F1E8 U+1F1FB', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q1011'),
(41, 'Cayman Islands', 'CYM', '136', 'KY', '+1-345', 'George Town', 'KYD', 'Cayman Islands dollar', '$', '.ky', 'Cayman Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Cayman\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"케이먼 제도\",\"pt-BR\":\"Ilhas Cayman\",\"pt\":\"Ilhas Caimão\",\"nl\":\"Caymaneilanden\",\"hr\":\"Kajmanski otoci\",\"fa\":\"جزایر کیمن\",\"de\":\"Kaimaninseln\",\"es\":\"Islas Caimán\",\"fr\":\"Îles Caïmans\",\"ja\":\"ケイマン諸島\",\"it\":\"Isole Cayman\",\"cn\":\"开曼群岛\",\"tr\":\"Cayman Adalari\"}', '19.50000000', '-80.50000000', '🇰🇾', 'U+1F1F0 U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, NULL),
(42, 'Central African Republic', 'CAF', '140', 'CF', '236', 'Bangui', 'XAF', 'Central African CFA franc', 'FCFA', '.cf', 'Ködörösêse tî Bêafrîka', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Bangui\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"중앙아프리카 공화국\",\"pt-BR\":\"República Centro-Africana\",\"pt\":\"República Centro-Africana\",\"nl\":\"Centraal-Afrikaanse Republiek\",\"hr\":\"Srednjoafrička Republika\",\"fa\":\"جمهوری آفریقای مرکزی\",\"de\":\"Zentralafrikanische Republik\",\"es\":\"República Centroafricana\",\"fr\":\"République centrafricaine\",\"ja\":\"中央アフリカ共和国\",\"it\":\"Repubblica Centrafricana\",\"cn\":\"中非\",\"tr\":\"Orta Afrika Cumhuriyeti\"}', '7.00000000', '21.00000000', '🇨🇫', 'U+1F1E8 U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q929'),
(43, 'Chad', 'TCD', '148', 'TD', '235', 'N\'Djamena', 'XAF', 'Central African CFA franc', 'FCFA', '.td', 'Tchad', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Ndjamena\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"차드\",\"pt-BR\":\"Chade\",\"pt\":\"Chade\",\"nl\":\"Tsjaad\",\"hr\":\"Čad\",\"fa\":\"چاد\",\"de\":\"Tschad\",\"es\":\"Chad\",\"fr\":\"Tchad\",\"ja\":\"チャド\",\"it\":\"Ciad\",\"cn\":\"乍得\",\"tr\":\"Çad\"}', '15.00000000', '19.00000000', '🇹🇩', 'U+1F1F9 U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q657'),
(44, 'Chile', 'CHL', '152', 'CL', '56', 'Santiago', 'CLP', 'Chilean peso', '$', '.cl', 'Chile', 'Americas', 'South America', '[{\"zoneName\":\"America/Punta_Arenas\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"CLST\",\"tzName\":\"Chile Summer Time\"},{\"zoneName\":\"America/Santiago\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"CLST\",\"tzName\":\"Chile Summer Time\"},{\"zoneName\":\"Pacific/Easter\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EASST\",\"tzName\":\"Easter Island Summer Time\"}]', '{\"kr\":\"칠리\",\"pt-BR\":\"Chile\",\"pt\":\"Chile\",\"nl\":\"Chili\",\"hr\":\"Čile\",\"fa\":\"شیلی\",\"de\":\"Chile\",\"es\":\"Chile\",\"fr\":\"Chili\",\"ja\":\"チリ\",\"it\":\"Cile\",\"cn\":\"智利\",\"tr\":\"Şili\"}', '-30.00000000', '-71.00000000', '🇨🇱', 'U+1F1E8 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q298'),
(45, 'China', 'CHN', '156', 'CN', '86', 'Beijing', 'CNY', 'Chinese yuan', '¥', '.cn', '中国', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Shanghai\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CST\",\"tzName\":\"China Standard Time\"},{\"zoneName\":\"Asia/Urumqi\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"XJT\",\"tzName\":\"China Standard Time\"}]', '{\"kr\":\"중국\",\"pt-BR\":\"China\",\"pt\":\"China\",\"nl\":\"China\",\"hr\":\"Kina\",\"fa\":\"چین\",\"de\":\"China\",\"es\":\"China\",\"fr\":\"Chine\",\"ja\":\"中国\",\"it\":\"Cina\",\"cn\":\"中国\",\"tr\":\"Çin\"}', '35.00000000', '105.00000000', '🇨🇳', 'U+1F1E8 U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q148'),
(46, 'Christmas Island', 'CXR', '162', 'CX', '61', 'Flying Fish Cove', 'AUD', 'Australian dollar', '$', '.cx', 'Christmas Island', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Indian/Christmas\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"CXT\",\"tzName\":\"Christmas Island Time\"}]', '{\"kr\":\"크리스마스 섬\",\"pt-BR\":\"Ilha Christmas\",\"pt\":\"Ilha do Natal\",\"nl\":\"Christmaseiland\",\"hr\":\"Božićni otok\",\"fa\":\"جزیره کریسمس\",\"de\":\"Weihnachtsinsel\",\"es\":\"Isla de Navidad\",\"fr\":\"Île Christmas\",\"ja\":\"クリスマス島\",\"it\":\"Isola di Natale\",\"cn\":\"圣诞岛\",\"tr\":\"Christmas Adasi\"}', '-10.50000000', '105.66666666', '🇨🇽', 'U+1F1E8 U+1F1FD', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, NULL),
(47, 'Cocos (Keeling) Islands', 'CCK', '166', 'CC', '61', 'West Island', 'AUD', 'Australian dollar', '$', '.cc', 'Cocos (Keeling) Islands', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Indian/Cocos\",\"gmtOffset\":23400,\"gmtOffsetName\":\"UTC+06:30\",\"abbreviation\":\"CCT\",\"tzName\":\"Cocos Islands Time\"}]', '{\"kr\":\"코코스 제도\",\"pt-BR\":\"Ilhas Cocos\",\"pt\":\"Ilhas dos Cocos\",\"nl\":\"Cocoseilanden\",\"hr\":\"Kokosovi Otoci\",\"fa\":\"جزایر کوکوس\",\"de\":\"Kokosinseln\",\"es\":\"Islas Cocos o Islas Keeling\",\"fr\":\"Îles Cocos\",\"ja\":\"ココス（キーリング）諸島\",\"it\":\"Isole Cocos e Keeling\",\"cn\":\"科科斯（基林）群岛\",\"tr\":\"Cocos Adalari\"}', '-12.50000000', '96.83333333', '🇨🇨', 'U+1F1E8 U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, NULL),
(48, 'Colombia', 'COL', '170', 'CO', '57', 'Bogotá', 'COP', 'Colombian peso', '$', '.co', 'Colombia', 'Americas', 'South America', '[{\"zoneName\":\"America/Bogota\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"COT\",\"tzName\":\"Colombia Time\"}]', '{\"kr\":\"콜롬비아\",\"pt-BR\":\"Colômbia\",\"pt\":\"Colômbia\",\"nl\":\"Colombia\",\"hr\":\"Kolumbija\",\"fa\":\"کلمبیا\",\"de\":\"Kolumbien\",\"es\":\"Colombia\",\"fr\":\"Colombie\",\"ja\":\"コロンビア\",\"it\":\"Colombia\",\"cn\":\"哥伦比亚\",\"tr\":\"Kolombiya\"}', '4.00000000', '-72.00000000', '🇨🇴', 'U+1F1E8 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q739'),
(49, 'Comoros', 'COM', '174', 'KM', '269', 'Moroni', 'KMF', 'Comorian franc', 'CF', '.km', 'Komori', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Comoro\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"코모로\",\"pt-BR\":\"Comores\",\"pt\":\"Comores\",\"nl\":\"Comoren\",\"hr\":\"Komori\",\"fa\":\"کومور\",\"de\":\"Union der Komoren\",\"es\":\"Comoras\",\"fr\":\"Comores\",\"ja\":\"コモロ\",\"it\":\"Comore\",\"cn\":\"科摩罗\",\"tr\":\"Komorlar\"}', '-12.16666666', '44.25000000', '🇰🇲', 'U+1F1F0 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q970'),
(50, 'Congo', 'COG', '178', 'CG', '242', 'Brazzaville', 'XAF', 'Central African CFA franc', 'FC', '.cg', 'République du Congo', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Brazzaville\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"콩고\",\"pt-BR\":\"Congo\",\"pt\":\"Congo\",\"nl\":\"Congo [Republiek]\",\"hr\":\"Kongo\",\"fa\":\"کنگو\",\"de\":\"Kongo\",\"es\":\"Congo\",\"fr\":\"Congo\",\"ja\":\"コンゴ共和国\",\"it\":\"Congo\",\"cn\":\"刚果\",\"tr\":\"Kongo\"}', '-1.00000000', '15.00000000', '🇨🇬', 'U+1F1E8 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:11:20', 1, 'Q971'),
(51, 'Democratic Republic of the Congo', 'COD', '180', 'CD', '243', 'Kinshasa', 'CDF', 'Congolese Franc', 'FC', '.cd', 'République démocratique du Congo', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Kinshasa\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"},{\"zoneName\":\"Africa/Lubumbashi\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"콩고 민주 공화국\",\"pt-BR\":\"RD Congo\",\"pt\":\"RD Congo\",\"nl\":\"Congo [DRC]\",\"hr\":\"Kongo, Demokratska Republika\",\"fa\":\"جمهوری کنگو\",\"de\":\"Kongo (Dem. Rep.)\",\"es\":\"Congo (Rep. Dem.)\",\"fr\":\"Congo (Rép. dém.)\",\"ja\":\"コンゴ民主共和国\",\"it\":\"Congo (Rep. Dem.)\",\"cn\":\"刚果（金）\",\"tr\":\"Kongo Demokratik Cumhuriyeti\"}', '0.00000000', '25.00000000', '🇨🇩', 'U+1F1E8 U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q974'),
(52, 'Cook Islands', 'COK', '184', 'CK', '682', 'Avarua', 'NZD', 'Cook Islands dollar', '$', '.ck', 'Cook Islands', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Rarotonga\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"CKT\",\"tzName\":\"Cook Island Time\"}]', '{\"kr\":\"쿡 제도\",\"pt-BR\":\"Ilhas Cook\",\"pt\":\"Ilhas Cook\",\"nl\":\"Cookeilanden\",\"hr\":\"Cookovo Otočje\",\"fa\":\"جزایر کوک\",\"de\":\"Cookinseln\",\"es\":\"Islas Cook\",\"fr\":\"Îles Cook\",\"ja\":\"クック諸島\",\"it\":\"Isole Cook\",\"cn\":\"库克群岛\",\"tr\":\"Cook Adalari\"}', '-21.23333333', '-159.76666666', '🇨🇰', 'U+1F1E8 U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q26988'),
(53, 'Costa Rica', 'CRI', '188', 'CR', '506', 'San Jose', 'CRC', 'Costa Rican colón', '₡', '.cr', 'Costa Rica', 'Americas', 'Central America', '[{\"zoneName\":\"America/Costa_Rica\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"코스타리카\",\"pt-BR\":\"Costa Rica\",\"pt\":\"Costa Rica\",\"nl\":\"Costa Rica\",\"hr\":\"Kostarika\",\"fa\":\"کاستاریکا\",\"de\":\"Costa Rica\",\"es\":\"Costa Rica\",\"fr\":\"Costa Rica\",\"ja\":\"コスタリカ\",\"it\":\"Costa Rica\",\"cn\":\"哥斯达黎加\",\"tr\":\"Kosta Rika\"}', '10.00000000', '-84.00000000', '🇨🇷', 'U+1F1E8 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q800'),
(54, 'Cote D\'Ivoire (Ivory Coast)', 'CIV', '384', 'CI', '225', 'Yamoussoukro', 'XOF', 'West African CFA franc', 'CFA', '.ci', NULL, 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Abidjan\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"코트디부아르\",\"pt-BR\":\"Costa do Marfim\",\"pt\":\"Costa do Marfim\",\"nl\":\"Ivoorkust\",\"hr\":\"Obala Bjelokosti\",\"fa\":\"ساحل عاج\",\"de\":\"Elfenbeinküste\",\"es\":\"Costa de Marfil\",\"fr\":\"Côte d\'Ivoire\",\"ja\":\"コートジボワール\",\"it\":\"Costa D\'Avorio\",\"cn\":\"科特迪瓦\",\"tr\":\"Kotdivuar\"}', '8.00000000', '-5.00000000', '🇨🇮', 'U+1F1E8 U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q1008'),
(55, 'Croatia', 'HRV', '191', 'HR', '385', 'Zagreb', 'HRK', 'Croatian kuna', 'kn', '.hr', 'Hrvatska', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Zagreb\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"크로아티아\",\"pt-BR\":\"Croácia\",\"pt\":\"Croácia\",\"nl\":\"Kroatië\",\"hr\":\"Hrvatska\",\"fa\":\"کرواسی\",\"de\":\"Kroatien\",\"es\":\"Croacia\",\"fr\":\"Croatie\",\"ja\":\"クロアチア\",\"it\":\"Croazia\",\"cn\":\"克罗地亚\",\"tr\":\"Hirvatistan\"}', '45.16666666', '15.50000000', '🇭🇷', 'U+1F1ED U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q224');
INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `wikiDataId`) VALUES
(56, 'Cuba', 'CUB', '192', 'CU', '53', 'Havana', 'CUP', 'Cuban peso', '$', '.cu', 'Cuba', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Havana\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"CST\",\"tzName\":\"Cuba Standard Time\"}]', '{\"kr\":\"쿠바\",\"pt-BR\":\"Cuba\",\"pt\":\"Cuba\",\"nl\":\"Cuba\",\"hr\":\"Kuba\",\"fa\":\"کوبا\",\"de\":\"Kuba\",\"es\":\"Cuba\",\"fr\":\"Cuba\",\"ja\":\"キューバ\",\"it\":\"Cuba\",\"cn\":\"古巴\",\"tr\":\"Küba\"}', '21.50000000', '-80.00000000', '🇨🇺', 'U+1F1E8 U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q241'),
(57, 'Cyprus', 'CYP', '196', 'CY', '357', 'Nicosia', 'EUR', 'Euro', '€', '.cy', 'Κύπρος', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Asia/Famagusta\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Asia/Nicosia\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"키프로스\",\"pt-BR\":\"Chipre\",\"pt\":\"Chipre\",\"nl\":\"Cyprus\",\"hr\":\"Cipar\",\"fa\":\"قبرس\",\"de\":\"Zypern\",\"es\":\"Chipre\",\"fr\":\"Chypre\",\"ja\":\"キプロス\",\"it\":\"Cipro\",\"cn\":\"塞浦路斯\",\"tr\":\"Kuzey Kıbrıs Türk Cumhuriyeti\"}', '35.00000000', '33.00000000', '🇨🇾', 'U+1F1E8 U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q229'),
(58, 'Czech Republic', 'CZE', '203', 'CZ', '420', 'Prague', 'CZK', 'Czech koruna', 'Kč', '.cz', 'Česká republika', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Prague\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"체코\",\"pt-BR\":\"República Tcheca\",\"pt\":\"República Checa\",\"nl\":\"Tsjechië\",\"hr\":\"Češka\",\"fa\":\"جمهوری چک\",\"de\":\"Tschechische Republik\",\"es\":\"República Checa\",\"fr\":\"République tchèque\",\"ja\":\"チェコ\",\"it\":\"Repubblica Ceca\",\"cn\":\"捷克\",\"tr\":\"Çekya\"}', '49.75000000', '15.50000000', '🇨🇿', 'U+1F1E8 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q213'),
(59, 'Denmark', 'DNK', '208', 'DK', '45', 'Copenhagen', 'DKK', 'Danish krone', 'Kr.', '.dk', 'Danmark', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Copenhagen\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"덴마크\",\"pt-BR\":\"Dinamarca\",\"pt\":\"Dinamarca\",\"nl\":\"Denemarken\",\"hr\":\"Danska\",\"fa\":\"دانمارک\",\"de\":\"Dänemark\",\"es\":\"Dinamarca\",\"fr\":\"Danemark\",\"ja\":\"デンマーク\",\"it\":\"Danimarca\",\"cn\":\"丹麦\",\"tr\":\"Danimarka\"}', '56.00000000', '10.00000000', '🇩🇰', 'U+1F1E9 U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:13:35', 1, 'Q35'),
(60, 'Djibouti', 'DJI', '262', 'DJ', '253', 'Djibouti', 'DJF', 'Djiboutian franc', 'Fdj', '.dj', 'Djibouti', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Djibouti\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"지부티\",\"pt-BR\":\"Djibuti\",\"pt\":\"Djibuti\",\"nl\":\"Djibouti\",\"hr\":\"Džibuti\",\"fa\":\"جیبوتی\",\"de\":\"Dschibuti\",\"es\":\"Yibuti\",\"fr\":\"Djibouti\",\"ja\":\"ジブチ\",\"it\":\"Gibuti\",\"cn\":\"吉布提\",\"tr\":\"Cibuti\"}', '11.50000000', '43.00000000', '🇩🇯', 'U+1F1E9 U+1F1EF', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q977'),
(61, 'Dominica', 'DMA', '212', 'DM', '+1-767', 'Roseau', 'XCD', 'Eastern Caribbean dollar', '$', '.dm', 'Dominica', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Dominica\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"도미니카 연방\",\"pt-BR\":\"Dominica\",\"pt\":\"Dominica\",\"nl\":\"Dominica\",\"hr\":\"Dominika\",\"fa\":\"دومینیکا\",\"de\":\"Dominica\",\"es\":\"Dominica\",\"fr\":\"Dominique\",\"ja\":\"ドミニカ国\",\"it\":\"Dominica\",\"cn\":\"多米尼加\",\"tr\":\"Dominika\"}', '15.41666666', '-61.33333333', '🇩🇲', 'U+1F1E9 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q784'),
(62, 'Dominican Republic', 'DOM', '214', 'DO', '+1-809 and 1-829', 'Santo Domingo', 'DOP', 'Dominican peso', '$', '.do', 'República Dominicana', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Santo_Domingo\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"도미니카 공화국\",\"pt-BR\":\"República Dominicana\",\"pt\":\"República Dominicana\",\"nl\":\"Dominicaanse Republiek\",\"hr\":\"Dominikanska Republika\",\"fa\":\"جمهوری دومینیکن\",\"de\":\"Dominikanische Republik\",\"es\":\"República Dominicana\",\"fr\":\"République dominicaine\",\"ja\":\"ドミニカ共和国\",\"it\":\"Repubblica Dominicana\",\"cn\":\"多明尼加共和国\",\"tr\":\"Dominik Cumhuriyeti\"}', '19.00000000', '-70.66666666', '🇩🇴', 'U+1F1E9 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q786'),
(63, 'East Timor', 'TLS', '626', 'TL', '670', 'Dili', 'USD', 'United States dollar', '$', '.tl', 'Timor-Leste', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Dili\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"TLT\",\"tzName\":\"Timor Leste Time\"}]', '{\"kr\":\"동티모르\",\"pt-BR\":\"Timor Leste\",\"pt\":\"Timor Leste\",\"nl\":\"Oost-Timor\",\"hr\":\"Istočni Timor\",\"fa\":\"تیمور شرقی\",\"de\":\"Timor-Leste\",\"es\":\"Timor Oriental\",\"fr\":\"Timor oriental\",\"ja\":\"東ティモール\",\"it\":\"Timor Est\",\"cn\":\"东帝汶\",\"tr\":\"Doğu Timor\"}', '-8.83333333', '125.91666666', '🇹🇱', 'U+1F1F9 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q574'),
(64, 'Ecuador', 'ECU', '218', 'EC', '593', 'Quito', 'USD', 'United States dollar', '$', '.ec', 'Ecuador', 'Americas', 'South America', '[{\"zoneName\":\"America/Guayaquil\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"ECT\",\"tzName\":\"Ecuador Time\"},{\"zoneName\":\"Pacific/Galapagos\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"GALT\",\"tzName\":\"Galápagos Time\"}]', '{\"kr\":\"에콰도르\",\"pt-BR\":\"Equador\",\"pt\":\"Equador\",\"nl\":\"Ecuador\",\"hr\":\"Ekvador\",\"fa\":\"اکوادور\",\"de\":\"Ecuador\",\"es\":\"Ecuador\",\"fr\":\"Équateur\",\"ja\":\"エクアドル\",\"it\":\"Ecuador\",\"cn\":\"厄瓜多尔\",\"tr\":\"Ekvator\"}', '-2.00000000', '-77.50000000', '🇪🇨', 'U+1F1EA U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q736'),
(65, 'Egypt', 'EGY', '818', 'EG', '20', 'Cairo', 'EGP', 'Egyptian pound', 'ج.م', '.eg', 'مصر‎', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Cairo\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"이집트\",\"pt-BR\":\"Egito\",\"pt\":\"Egipto\",\"nl\":\"Egypte\",\"hr\":\"Egipat\",\"fa\":\"مصر\",\"de\":\"Ägypten\",\"es\":\"Egipto\",\"fr\":\"Égypte\",\"ja\":\"エジプト\",\"it\":\"Egitto\",\"cn\":\"埃及\",\"tr\":\"Mısır\"}', '27.00000000', '30.00000000', '🇪🇬', 'U+1F1EA U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q79'),
(66, 'El Salvador', 'SLV', '222', 'SV', '503', 'San Salvador', 'USD', 'United States dollar', '$', '.sv', 'El Salvador', 'Americas', 'Central America', '[{\"zoneName\":\"America/El_Salvador\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"엘살바도르\",\"pt-BR\":\"El Salvador\",\"pt\":\"El Salvador\",\"nl\":\"El Salvador\",\"hr\":\"Salvador\",\"fa\":\"السالوادور\",\"de\":\"El Salvador\",\"es\":\"El Salvador\",\"fr\":\"Salvador\",\"ja\":\"エルサルバドル\",\"it\":\"El Salvador\",\"cn\":\"萨尔瓦多\",\"tr\":\"El Salvador\"}', '13.83333333', '-88.91666666', '🇸🇻', 'U+1F1F8 U+1F1FB', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q792'),
(67, 'Equatorial Guinea', 'GNQ', '226', 'GQ', '240', 'Malabo', 'XAF', 'Central African CFA franc', 'FCFA', '.gq', 'Guinea Ecuatorial', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Malabo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"적도 기니\",\"pt-BR\":\"Guiné Equatorial\",\"pt\":\"Guiné Equatorial\",\"nl\":\"Equatoriaal-Guinea\",\"hr\":\"Ekvatorijalna Gvineja\",\"fa\":\"گینه استوایی\",\"de\":\"Äquatorial-Guinea\",\"es\":\"Guinea Ecuatorial\",\"fr\":\"Guinée-Équatoriale\",\"ja\":\"赤道ギニア\",\"it\":\"Guinea Equatoriale\",\"cn\":\"赤道几内亚\",\"tr\":\"Ekvator Ginesi\"}', '2.00000000', '10.00000000', '🇬🇶', 'U+1F1EC U+1F1F6', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q983'),
(68, 'Eritrea', 'ERI', '232', 'ER', '291', 'Asmara', 'ERN', 'Eritrean nakfa', 'Nfk', '.er', 'ኤርትራ', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Asmara\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"에리트레아\",\"pt-BR\":\"Eritreia\",\"pt\":\"Eritreia\",\"nl\":\"Eritrea\",\"hr\":\"Eritreja\",\"fa\":\"اریتره\",\"de\":\"Eritrea\",\"es\":\"Eritrea\",\"fr\":\"Érythrée\",\"ja\":\"エリトリア\",\"it\":\"Eritrea\",\"cn\":\"厄立特里亚\",\"tr\":\"Eritre\"}', '15.00000000', '39.00000000', '🇪🇷', 'U+1F1EA U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q986'),
(69, 'Estonia', 'EST', '233', 'EE', '372', 'Tallinn', 'EUR', 'Euro', '€', '.ee', 'Eesti', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Tallinn\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"에스토니아\",\"pt-BR\":\"Estônia\",\"pt\":\"Estónia\",\"nl\":\"Estland\",\"hr\":\"Estonija\",\"fa\":\"استونی\",\"de\":\"Estland\",\"es\":\"Estonia\",\"fr\":\"Estonie\",\"ja\":\"エストニア\",\"it\":\"Estonia\",\"cn\":\"爱沙尼亚\",\"tr\":\"Estonya\"}', '59.00000000', '26.00000000', '🇪🇪', 'U+1F1EA U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:17:53', 1, 'Q191'),
(70, 'Ethiopia', 'ETH', '231', 'ET', '251', 'Addis Ababa', 'ETB', 'Ethiopian birr', 'Nkf', '.et', 'ኢትዮጵያ', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Addis_Ababa\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"에티오피아\",\"pt-BR\":\"Etiópia\",\"pt\":\"Etiópia\",\"nl\":\"Ethiopië\",\"hr\":\"Etiopija\",\"fa\":\"اتیوپی\",\"de\":\"Äthiopien\",\"es\":\"Etiopía\",\"fr\":\"Éthiopie\",\"ja\":\"エチオピア\",\"it\":\"Etiopia\",\"cn\":\"埃塞俄比亚\",\"tr\":\"Etiyopya\"}', '8.00000000', '38.00000000', '🇪🇹', 'U+1F1EA U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q115'),
(71, 'Falkland Islands', 'FLK', '238', 'FK', '500', 'Stanley', 'FKP', 'Falkland Islands pound', '£', '.fk', 'Falkland Islands', 'Americas', 'South America', '[{\"zoneName\":\"Atlantic/Stanley\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"FKST\",\"tzName\":\"Falkland Islands Summer Time\"}]', '{\"kr\":\"포클랜드 제도\",\"pt-BR\":\"Ilhas Malvinas\",\"pt\":\"Ilhas Falkland\",\"nl\":\"Falklandeilanden [Islas Malvinas]\",\"hr\":\"Falklandski Otoci\",\"fa\":\"جزایر فالکلند\",\"de\":\"Falklandinseln\",\"es\":\"Islas Malvinas\",\"fr\":\"Îles Malouines\",\"ja\":\"フォークランド（マルビナス）諸島\",\"it\":\"Isole Falkland o Isole Malvine\",\"cn\":\"福克兰群岛\",\"tr\":\"Falkland Adalari\"}', '-51.75000000', '-59.00000000', '🇫🇰', 'U+1F1EB U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(72, 'Faroe Islands', 'FRO', '234', 'FO', '298', 'Torshavn', 'DKK', 'Danish krone', 'Kr.', '.fo', 'Føroyar', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Atlantic/Faroe\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"}]', '{\"kr\":\"페로 제도\",\"pt-BR\":\"Ilhas Faroé\",\"pt\":\"Ilhas Faroé\",\"nl\":\"Faeröer\",\"hr\":\"Farski Otoci\",\"fa\":\"جزایر فارو\",\"de\":\"Färöer-Inseln\",\"es\":\"Islas Faroe\",\"fr\":\"Îles Féroé\",\"ja\":\"フェロー諸島\",\"it\":\"Isole Far Oer\",\"cn\":\"法罗群岛\",\"tr\":\"Faroe Adalari\"}', '62.00000000', '-7.00000000', '🇫🇴', 'U+1F1EB U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(73, 'Fiji Islands', 'FJI', '242', 'FJ', '679', 'Suva', 'FJD', 'Fijian dollar', 'FJ$', '.fj', 'Fiji', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Fiji\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"FJT\",\"tzName\":\"Fiji Time\"}]', '{\"kr\":\"피지\",\"pt-BR\":\"Fiji\",\"pt\":\"Fiji\",\"nl\":\"Fiji\",\"hr\":\"Fiđi\",\"fa\":\"فیجی\",\"de\":\"Fidschi\",\"es\":\"Fiyi\",\"fr\":\"Fidji\",\"ja\":\"フィジー\",\"it\":\"Figi\",\"cn\":\"斐济\",\"tr\":\"Fiji\"}', '-18.00000000', '175.00000000', '🇫🇯', 'U+1F1EB U+1F1EF', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q712'),
(74, 'Finland', 'FIN', '246', 'FI', '358', 'Helsinki', 'EUR', 'Euro', '€', '.fi', 'Suomi', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Helsinki\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"핀란드\",\"pt-BR\":\"Finlândia\",\"pt\":\"Finlândia\",\"nl\":\"Finland\",\"hr\":\"Finska\",\"fa\":\"فنلاند\",\"de\":\"Finnland\",\"es\":\"Finlandia\",\"fr\":\"Finlande\",\"ja\":\"フィンランド\",\"it\":\"Finlandia\",\"cn\":\"芬兰\",\"tr\":\"Finlandiya\"}', '64.00000000', '26.00000000', '🇫🇮', 'U+1F1EB U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q33'),
(75, 'France', 'FRA', '250', 'FR', '33', 'Paris', 'EUR', 'Euro', '€', '.fr', 'France', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Paris\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"프랑스\",\"pt-BR\":\"França\",\"pt\":\"França\",\"nl\":\"Frankrijk\",\"hr\":\"Francuska\",\"fa\":\"فرانسه\",\"de\":\"Frankreich\",\"es\":\"Francia\",\"fr\":\"France\",\"ja\":\"フランス\",\"it\":\"Francia\",\"cn\":\"法国\",\"tr\":\"Fransa\"}', '46.00000000', '2.00000000', '🇫🇷', 'U+1F1EB U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q142'),
(76, 'French Guiana', 'GUF', '254', 'GF', '594', 'Cayenne', 'EUR', 'Euro', '€', '.gf', 'Guyane française', 'Americas', 'South America', '[{\"zoneName\":\"America/Cayenne\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"GFT\",\"tzName\":\"French Guiana Time\"}]', '{\"kr\":\"프랑스령 기아나\",\"pt-BR\":\"Guiana Francesa\",\"pt\":\"Guiana Francesa\",\"nl\":\"Frans-Guyana\",\"hr\":\"Francuska Gvajana\",\"fa\":\"گویان فرانسه\",\"de\":\"Französisch Guyana\",\"es\":\"Guayana Francesa\",\"fr\":\"Guayane\",\"ja\":\"フランス領ギアナ\",\"it\":\"Guyana francese\",\"cn\":\"法属圭亚那\",\"tr\":\"Fransiz Guyanasi\"}', '4.00000000', '-53.00000000', '🇬🇫', 'U+1F1EC U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(77, 'French Polynesia', 'PYF', '258', 'PF', '689', 'Papeete', 'XPF', 'CFP franc', '₣', '.pf', 'Polynésie française', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Gambier\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"GAMT\",\"tzName\":\"Gambier Islands Time\"},{\"zoneName\":\"Pacific/Marquesas\",\"gmtOffset\":-34200,\"gmtOffsetName\":\"UTC-09:30\",\"abbreviation\":\"MART\",\"tzName\":\"Marquesas Islands Time\"},{\"zoneName\":\"Pacific/Tahiti\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"TAHT\",\"tzName\":\"Tahiti Time\"}]', '{\"kr\":\"프랑스령 폴리네시아\",\"pt-BR\":\"Polinésia Francesa\",\"pt\":\"Polinésia Francesa\",\"nl\":\"Frans-Polynesië\",\"hr\":\"Francuska Polinezija\",\"fa\":\"پلی‌نزی فرانسه\",\"de\":\"Französisch-Polynesien\",\"es\":\"Polinesia Francesa\",\"fr\":\"Polynésie française\",\"ja\":\"フランス領ポリネシア\",\"it\":\"Polinesia Francese\",\"cn\":\"法属波利尼西亚\",\"tr\":\"Fransiz Polinezyasi\"}', '-15.00000000', '-140.00000000', '🇵🇫', 'U+1F1F5 U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(78, 'French Southern Territories', 'ATF', '260', 'TF', '262', 'Port-aux-Francais', 'EUR', 'Euro', '€', '.tf', 'Territoire des Terres australes et antarctiques fr', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Indian/Kerguelen\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TFT\",\"tzName\":\"French Southern and Antarctic Time\"}]', '{\"kr\":\"프랑스령 남방 및 남극\",\"pt-BR\":\"Terras Austrais e Antárticas Francesas\",\"pt\":\"Terras Austrais e Antárticas Francesas\",\"nl\":\"Franse Gebieden in de zuidelijke Indische Oceaan\",\"hr\":\"Francuski južni i antarktički teritoriji\",\"fa\":\"سرزمین‌های جنوبی و جنوبگانی فرانسه\",\"de\":\"Französische Süd- und Antarktisgebiete\",\"es\":\"Tierras Australes y Antárticas Francesas\",\"fr\":\"Terres australes et antarctiques françaises\",\"ja\":\"フランス領南方・南極地域\",\"it\":\"Territori Francesi del Sud\",\"cn\":\"法属南部领地\",\"tr\":\"Fransiz Güney Topraklari\"}', '-49.25000000', '69.16700000', '🇹🇫', 'U+1F1F9 U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(79, 'Gabon', 'GAB', '266', 'GA', '241', 'Libreville', 'XAF', 'Central African CFA franc', 'FCFA', '.ga', 'Gabon', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Libreville\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"가봉\",\"pt-BR\":\"Gabão\",\"pt\":\"Gabão\",\"nl\":\"Gabon\",\"hr\":\"Gabon\",\"fa\":\"گابن\",\"de\":\"Gabun\",\"es\":\"Gabón\",\"fr\":\"Gabon\",\"ja\":\"ガボン\",\"it\":\"Gabon\",\"cn\":\"加蓬\",\"tr\":\"Gabon\"}', '-1.00000000', '11.75000000', '🇬🇦', 'U+1F1EC U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q1000'),
(80, 'Gambia The', 'GMB', '270', 'GM', '220', 'Banjul', 'GMD', 'Gambian dalasi', 'D', '.gm', 'Gambia', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Banjul\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"감비아\",\"pt-BR\":\"Gâmbia\",\"pt\":\"Gâmbia\",\"nl\":\"Gambia\",\"hr\":\"Gambija\",\"fa\":\"گامبیا\",\"de\":\"Gambia\",\"es\":\"Gambia\",\"fr\":\"Gambie\",\"ja\":\"ガンビア\",\"it\":\"Gambia\",\"cn\":\"冈比亚\",\"tr\":\"Gambiya\"}', '13.46666666', '-16.56666666', '🇬🇲', 'U+1F1EC U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q1005'),
(81, 'Georgia', 'GEO', '268', 'GE', '995', 'Tbilisi', 'GEL', 'Georgian lari', 'ლ', '.ge', 'საქართველო', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Tbilisi\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"GET\",\"tzName\":\"Georgia Standard Time\"}]', '{\"kr\":\"조지아\",\"pt-BR\":\"Geórgia\",\"pt\":\"Geórgia\",\"nl\":\"Georgië\",\"hr\":\"Gruzija\",\"fa\":\"گرجستان\",\"de\":\"Georgien\",\"es\":\"Georgia\",\"fr\":\"Géorgie\",\"ja\":\"グルジア\",\"it\":\"Georgia\",\"cn\":\"格鲁吉亚\",\"tr\":\"Gürcistan\"}', '42.00000000', '43.50000000', '🇬🇪', 'U+1F1EC U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q230'),
(82, 'Germany', 'DEU', '276', 'DE', '49', 'Berlin', 'EUR', 'Euro', '€', '.de', 'Deutschland', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Berlin\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"},{\"zoneName\":\"Europe/Busingen\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"독일\",\"pt-BR\":\"Alemanha\",\"pt\":\"Alemanha\",\"nl\":\"Duitsland\",\"hr\":\"Njemačka\",\"fa\":\"آلمان\",\"de\":\"Deutschland\",\"es\":\"Alemania\",\"fr\":\"Allemagne\",\"ja\":\"ドイツ\",\"it\":\"Germania\",\"cn\":\"德国\",\"tr\":\"Almanya\"}', '51.00000000', '9.00000000', '🇩🇪', 'U+1F1E9 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q183'),
(83, 'Ghana', 'GHA', '288', 'GH', '233', 'Accra', 'GHS', 'Ghanaian cedi', 'GH₵', '.gh', 'Ghana', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Accra\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"가나\",\"pt-BR\":\"Gana\",\"pt\":\"Gana\",\"nl\":\"Ghana\",\"hr\":\"Gana\",\"fa\":\"غنا\",\"de\":\"Ghana\",\"es\":\"Ghana\",\"fr\":\"Ghana\",\"ja\":\"ガーナ\",\"it\":\"Ghana\",\"cn\":\"加纳\",\"tr\":\"Gana\"}', '8.00000000', '-2.00000000', '🇬🇭', 'U+1F1EC U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q117'),
(84, 'Gibraltar', 'GIB', '292', 'GI', '350', 'Gibraltar', 'GIP', 'Gibraltar pound', '£', '.gi', 'Gibraltar', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Gibraltar\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"지브롤터\",\"pt-BR\":\"Gibraltar\",\"pt\":\"Gibraltar\",\"nl\":\"Gibraltar\",\"hr\":\"Gibraltar\",\"fa\":\"جبل‌طارق\",\"de\":\"Gibraltar\",\"es\":\"Gibraltar\",\"fr\":\"Gibraltar\",\"ja\":\"ジブラルタル\",\"it\":\"Gibilterra\",\"cn\":\"直布罗陀\",\"tr\":\"Cebelitarik\"}', '36.13333333', '-5.35000000', '🇬🇮', 'U+1F1EC U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(85, 'Greece', 'GRC', '300', 'GR', '30', 'Athens', 'EUR', 'Euro', '€', '.gr', 'Ελλάδα', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Athens\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"그리스\",\"pt-BR\":\"Grécia\",\"pt\":\"Grécia\",\"nl\":\"Griekenland\",\"hr\":\"Grčka\",\"fa\":\"یونان\",\"de\":\"Griechenland\",\"es\":\"Grecia\",\"fr\":\"Grèce\",\"ja\":\"ギリシャ\",\"it\":\"Grecia\",\"cn\":\"希腊\",\"tr\":\"Yunanistan\"}', '39.00000000', '22.00000000', '🇬🇷', 'U+1F1EC U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q41'),
(86, 'Greenland', 'GRL', '304', 'GL', '299', 'Nuuk', 'DKK', 'Danish krone', 'Kr.', '.gl', 'Kalaallit Nunaat', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Danmarkshavn\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"},{\"zoneName\":\"America/Nuuk\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"WGT\",\"tzName\":\"West Greenland Time\"},{\"zoneName\":\"America/Scoresbysund\",\"gmtOffset\":-3600,\"gmtOffsetName\":\"UTC-01:00\",\"abbreviation\":\"EGT\",\"tzName\":\"Eastern Greenland Time\"},{\"zoneName\":\"America/Thule\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"그린란드\",\"pt-BR\":\"Groelândia\",\"pt\":\"Gronelândia\",\"nl\":\"Groenland\",\"hr\":\"Grenland\",\"fa\":\"گرینلند\",\"de\":\"Grönland\",\"es\":\"Groenlandia\",\"fr\":\"Groenland\",\"ja\":\"グリーンランド\",\"it\":\"Groenlandia\",\"cn\":\"格陵兰岛\",\"tr\":\"Grönland\"}', '72.00000000', '-40.00000000', '🇬🇱', 'U+1F1EC U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(87, 'Grenada', 'GRD', '308', 'GD', '+1-473', 'St. George\'s', 'XCD', 'Eastern Caribbean dollar', '$', '.gd', 'Grenada', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Grenada\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"그레나다\",\"pt-BR\":\"Granada\",\"pt\":\"Granada\",\"nl\":\"Grenada\",\"hr\":\"Grenada\",\"fa\":\"گرنادا\",\"de\":\"Grenada\",\"es\":\"Grenada\",\"fr\":\"Grenade\",\"ja\":\"グレナダ\",\"it\":\"Grenada\",\"cn\":\"格林纳达\",\"tr\":\"Grenada\"}', '12.11666666', '-61.66666666', '🇬🇩', 'U+1F1EC U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q769'),
(88, 'Guadeloupe', 'GLP', '312', 'GP', '590', 'Basse-Terre', 'EUR', 'Euro', '€', '.gp', 'Guadeloupe', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Guadeloupe\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"과들루프\",\"pt-BR\":\"Guadalupe\",\"pt\":\"Guadalupe\",\"nl\":\"Guadeloupe\",\"hr\":\"Gvadalupa\",\"fa\":\"جزیره گوادلوپ\",\"de\":\"Guadeloupe\",\"es\":\"Guadalupe\",\"fr\":\"Guadeloupe\",\"ja\":\"グアドループ\",\"it\":\"Guadeloupa\",\"cn\":\"瓜德罗普岛\",\"tr\":\"Guadeloupe\"}', '16.25000000', '-61.58333300', '🇬🇵', 'U+1F1EC U+1F1F5', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(89, 'Guam', 'GUM', '316', 'GU', '+1-671', 'Hagatna', 'USD', 'US Dollar', '$', '.gu', 'Guam', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Guam\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"CHST\",\"tzName\":\"Chamorro Standard Time\"}]', '{\"kr\":\"괌\",\"pt-BR\":\"Guam\",\"pt\":\"Guame\",\"nl\":\"Guam\",\"hr\":\"Guam\",\"fa\":\"گوام\",\"de\":\"Guam\",\"es\":\"Guam\",\"fr\":\"Guam\",\"ja\":\"グアム\",\"it\":\"Guam\",\"cn\":\"关岛\",\"tr\":\"Guam\"}', '13.46666666', '144.78333333', '🇬🇺', 'U+1F1EC U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, NULL),
(90, 'Guatemala', 'GTM', '320', 'GT', '502', 'Guatemala City', 'GTQ', 'Guatemalan quetzal', 'Q', '.gt', 'Guatemala', 'Americas', 'Central America', '[{\"zoneName\":\"America/Guatemala\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"과테말라\",\"pt-BR\":\"Guatemala\",\"pt\":\"Guatemala\",\"nl\":\"Guatemala\",\"hr\":\"Gvatemala\",\"fa\":\"گواتمالا\",\"de\":\"Guatemala\",\"es\":\"Guatemala\",\"fr\":\"Guatemala\",\"ja\":\"グアテマラ\",\"it\":\"Guatemala\",\"cn\":\"危地马拉\",\"tr\":\"Guatemala\"}', '15.50000000', '-90.25000000', '🇬🇹', 'U+1F1EC U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:20:25', 1, 'Q774'),
(91, 'Guernsey and Alderney', 'GGY', '831', 'GG', '+44-1481', 'St Peter Port', 'GBP', 'British pound', '£', '.gg', 'Guernsey', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Guernsey\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"건지, 올더니\",\"pt-BR\":\"Guernsey\",\"pt\":\"Guernsey\",\"nl\":\"Guernsey\",\"hr\":\"Guernsey\",\"fa\":\"گرنزی\",\"de\":\"Guernsey\",\"es\":\"Guernsey\",\"fr\":\"Guernesey\",\"ja\":\"ガーンジー\",\"it\":\"Guernsey\",\"cn\":\"根西岛\",\"tr\":\"Alderney\"}', '49.46666666', '-2.58333333', '🇬🇬', 'U+1F1EC U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(92, 'Guinea', 'GIN', '324', 'GN', '224', 'Conakry', 'GNF', 'Guinean franc', 'FG', '.gn', 'Guinée', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Conakry\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"기니\",\"pt-BR\":\"Guiné\",\"pt\":\"Guiné\",\"nl\":\"Guinee\",\"hr\":\"Gvineja\",\"fa\":\"گینه\",\"de\":\"Guinea\",\"es\":\"Guinea\",\"fr\":\"Guinée\",\"ja\":\"ギニア\",\"it\":\"Guinea\",\"cn\":\"几内亚\",\"tr\":\"Gine\"}', '11.00000000', '-10.00000000', '🇬🇳', 'U+1F1EC U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1006'),
(93, 'Guinea-Bissau', 'GNB', '624', 'GW', '245', 'Bissau', 'XOF', 'West African CFA franc', 'CFA', '.gw', 'Guiné-Bissau', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Bissau\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"기니비사우\",\"pt-BR\":\"Guiné-Bissau\",\"pt\":\"Guiné-Bissau\",\"nl\":\"Guinee-Bissau\",\"hr\":\"Gvineja Bisau\",\"fa\":\"گینه بیسائو\",\"de\":\"Guinea-Bissau\",\"es\":\"Guinea-Bisáu\",\"fr\":\"Guinée-Bissau\",\"ja\":\"ギニアビサウ\",\"it\":\"Guinea-Bissau\",\"cn\":\"几内亚比绍\",\"tr\":\"Gine-bissau\"}', '12.00000000', '-15.00000000', '🇬🇼', 'U+1F1EC U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1007'),
(94, 'Guyana', 'GUY', '328', 'GY', '592', 'Georgetown', 'GYD', 'Guyanese dollar', '$', '.gy', 'Guyana', 'Americas', 'South America', '[{\"zoneName\":\"America/Guyana\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"GYT\",\"tzName\":\"Guyana Time\"}]', '{\"kr\":\"가이아나\",\"pt-BR\":\"Guiana\",\"pt\":\"Guiana\",\"nl\":\"Guyana\",\"hr\":\"Gvajana\",\"fa\":\"گویان\",\"de\":\"Guyana\",\"es\":\"Guyana\",\"fr\":\"Guyane\",\"ja\":\"ガイアナ\",\"it\":\"Guyana\",\"cn\":\"圭亚那\",\"tr\":\"Guyana\"}', '5.00000000', '-59.00000000', '🇬🇾', 'U+1F1EC U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q734'),
(95, 'Haiti', 'HTI', '332', 'HT', '509', 'Port-au-Prince', 'HTG', 'Haitian gourde', 'G', '.ht', 'Haïti', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Port-au-Prince\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"아이티\",\"pt-BR\":\"Haiti\",\"pt\":\"Haiti\",\"nl\":\"Haïti\",\"hr\":\"Haiti\",\"fa\":\"هائیتی\",\"de\":\"Haiti\",\"es\":\"Haiti\",\"fr\":\"Haïti\",\"ja\":\"ハイチ\",\"it\":\"Haiti\",\"cn\":\"海地\",\"tr\":\"Haiti\"}', '19.00000000', '-72.41666666', '🇭🇹', 'U+1F1ED U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q790'),
(96, 'Heard Island and McDonald Islands', 'HMD', '334', 'HM', '672', '', 'AUD', 'Australian dollar', '$', '.hm', 'Heard Island and McDonald Islands', '', '', '[{\"zoneName\":\"Indian/Kerguelen\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TFT\",\"tzName\":\"French Southern and Antarctic Time\"}]', '{\"kr\":\"허드 맥도날드 제도\",\"pt-BR\":\"Ilha Heard e Ilhas McDonald\",\"pt\":\"Ilha Heard e Ilhas McDonald\",\"nl\":\"Heard- en McDonaldeilanden\",\"hr\":\"Otok Heard i otočje McDonald\",\"fa\":\"جزیره هرد و جزایر مک‌دونالد\",\"de\":\"Heard und die McDonaldinseln\",\"es\":\"Islas Heard y McDonald\",\"fr\":\"Îles Heard-et-MacDonald\",\"ja\":\"ハード島とマクドナルド諸島\",\"it\":\"Isole Heard e McDonald\",\"cn\":\"赫德·唐纳岛及麦唐纳岛\",\"tr\":\"Heard Adasi Ve Mcdonald Adalari\"}', '-53.10000000', '72.51666666', '🇭🇲', 'U+1F1ED U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(97, 'Honduras', 'HND', '340', 'HN', '504', 'Tegucigalpa', 'HNL', 'Honduran lempira', 'L', '.hn', 'Honduras', 'Americas', 'Central America', '[{\"zoneName\":\"America/Tegucigalpa\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"온두라스\",\"pt-BR\":\"Honduras\",\"pt\":\"Honduras\",\"nl\":\"Honduras\",\"hr\":\"Honduras\",\"fa\":\"هندوراس\",\"de\":\"Honduras\",\"es\":\"Honduras\",\"fr\":\"Honduras\",\"ja\":\"ホンジュラス\",\"it\":\"Honduras\",\"cn\":\"洪都拉斯\",\"tr\":\"Honduras\"}', '15.00000000', '-86.50000000', '🇭🇳', 'U+1F1ED U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q783'),
(98, 'Hong Kong S.A.R.', 'HKG', '344', 'HK', '852', 'Hong Kong', 'HKD', 'Hong Kong dollar', '$', '.hk', '香港', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Hong_Kong\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"HKT\",\"tzName\":\"Hong Kong Time\"}]', '{\"kr\":\"홍콩\",\"pt-BR\":\"Hong Kong\",\"pt\":\"Hong Kong\",\"nl\":\"Hongkong\",\"hr\":\"Hong Kong\",\"fa\":\"هنگ‌کنگ\",\"de\":\"Hong Kong\",\"es\":\"Hong Kong\",\"fr\":\"Hong Kong\",\"ja\":\"香港\",\"it\":\"Hong Kong\",\"cn\":\"中国香港\",\"tr\":\"Hong Kong\"}', '22.25000000', '114.16666666', '🇭🇰', 'U+1F1ED U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q8646'),
(99, 'Hungary', 'HUN', '348', 'HU', '36', 'Budapest', 'HUF', 'Hungarian forint', 'Ft', '.hu', 'Magyarország', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Budapest\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"헝가리\",\"pt-BR\":\"Hungria\",\"pt\":\"Hungria\",\"nl\":\"Hongarije\",\"hr\":\"Mađarska\",\"fa\":\"مجارستان\",\"de\":\"Ungarn\",\"es\":\"Hungría\",\"fr\":\"Hongrie\",\"ja\":\"ハンガリー\",\"it\":\"Ungheria\",\"cn\":\"匈牙利\",\"tr\":\"Macaristan\"}', '47.00000000', '20.00000000', '🇭🇺', 'U+1F1ED U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q28'),
(100, 'Iceland', 'ISL', '352', 'IS', '354', 'Reykjavik', 'ISK', 'Icelandic króna', 'kr', '.is', 'Ísland', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Atlantic/Reykjavik\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"아이슬란드\",\"pt-BR\":\"Islândia\",\"pt\":\"Islândia\",\"nl\":\"IJsland\",\"hr\":\"Island\",\"fa\":\"ایسلند\",\"de\":\"Island\",\"es\":\"Islandia\",\"fr\":\"Islande\",\"ja\":\"アイスランド\",\"it\":\"Islanda\",\"cn\":\"冰岛\",\"tr\":\"İzlanda\"}', '65.00000000', '-18.00000000', '🇮🇸', 'U+1F1EE U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q189'),
(101, 'India', 'IND', '356', 'IN', '91', 'New Delhi', 'INR', 'Indian rupee', '₹', '.in', 'भारत', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Kolkata\",\"gmtOffset\":19800,\"gmtOffsetName\":\"UTC+05:30\",\"abbreviation\":\"IST\",\"tzName\":\"Indian Standard Time\"}]', '{\"kr\":\"인도\",\"pt-BR\":\"Índia\",\"pt\":\"Índia\",\"nl\":\"India\",\"hr\":\"Indija\",\"fa\":\"هند\",\"de\":\"Indien\",\"es\":\"India\",\"fr\":\"Inde\",\"ja\":\"インド\",\"it\":\"India\",\"cn\":\"印度\",\"tr\":\"Hindistan\"}', '20.00000000', '77.00000000', '🇮🇳', 'U+1F1EE U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q668'),
(102, 'Indonesia', 'IDN', '360', 'ID', '62', 'Jakarta', 'IDR', 'Indonesian rupiah', 'Rp', '.id', 'Indonesia', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Jakarta\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"WIB\",\"tzName\":\"Western Indonesian Time\"},{\"zoneName\":\"Asia/Jayapura\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"WIT\",\"tzName\":\"Eastern Indonesian Time\"},{\"zoneName\":\"Asia/Makassar\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"WITA\",\"tzName\":\"Central Indonesia Time\"},{\"zoneName\":\"Asia/Pontianak\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"WIB\",\"tzName\":\"Western Indonesian Time\"}]', '{\"kr\":\"인도네시아\",\"pt-BR\":\"Indonésia\",\"pt\":\"Indonésia\",\"nl\":\"Indonesië\",\"hr\":\"Indonezija\",\"fa\":\"اندونزی\",\"de\":\"Indonesien\",\"es\":\"Indonesia\",\"fr\":\"Indonésie\",\"ja\":\"インドネシア\",\"it\":\"Indonesia\",\"cn\":\"印度尼西亚\",\"tr\":\"Endonezya\"}', '-5.00000000', '120.00000000', '🇮🇩', 'U+1F1EE U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q252'),
(103, 'Iran', 'IRN', '364', 'IR', '98', 'Tehran', 'IRR', 'Iranian rial', '﷼', '.ir', 'ایران', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Tehran\",\"gmtOffset\":12600,\"gmtOffsetName\":\"UTC+03:30\",\"abbreviation\":\"IRDT\",\"tzName\":\"Iran Daylight Time\"}]', '{\"kr\":\"이란\",\"pt-BR\":\"Irã\",\"pt\":\"Irão\",\"nl\":\"Iran\",\"hr\":\"Iran\",\"fa\":\"ایران\",\"de\":\"Iran\",\"es\":\"Iran\",\"fr\":\"Iran\",\"ja\":\"イラン・イスラム共和国\",\"cn\":\"伊朗\",\"tr\":\"İran\"}', '32.00000000', '53.00000000', '🇮🇷', 'U+1F1EE U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q794'),
(104, 'Iraq', 'IRQ', '368', 'IQ', '964', 'Baghdad', 'IQD', 'Iraqi dinar', 'د.ع', '.iq', 'العراق', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Baghdad\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"이라크\",\"pt-BR\":\"Iraque\",\"pt\":\"Iraque\",\"nl\":\"Irak\",\"hr\":\"Irak\",\"fa\":\"عراق\",\"de\":\"Irak\",\"es\":\"Irak\",\"fr\":\"Irak\",\"ja\":\"イラク\",\"it\":\"Iraq\",\"cn\":\"伊拉克\",\"tr\":\"Irak\"}', '33.00000000', '44.00000000', '🇮🇶', 'U+1F1EE U+1F1F6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q796'),
(105, 'Ireland', 'IRL', '372', 'IE', '353', 'Dublin', 'EUR', 'Euro', '€', '.ie', 'Éire', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Dublin\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"아일랜드\",\"pt-BR\":\"Irlanda\",\"pt\":\"Irlanda\",\"nl\":\"Ierland\",\"hr\":\"Irska\",\"fa\":\"ایرلند\",\"de\":\"Irland\",\"es\":\"Irlanda\",\"fr\":\"Irlande\",\"ja\":\"アイルランド\",\"it\":\"Irlanda\",\"cn\":\"爱尔兰\",\"tr\":\"İrlanda\"}', '53.00000000', '-8.00000000', '🇮🇪', 'U+1F1EE U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q27'),
(106, 'Israel', 'ISR', '376', 'IL', '972', 'Jerusalem', 'ILS', 'Israeli new shekel', '₪', '.il', 'יִשְׂרָאֵל', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Jerusalem\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"IST\",\"tzName\":\"Israel Standard Time\"}]', '{\"kr\":\"이스라엘\",\"pt-BR\":\"Israel\",\"pt\":\"Israel\",\"nl\":\"Israël\",\"hr\":\"Izrael\",\"fa\":\"اسرائیل\",\"de\":\"Israel\",\"es\":\"Israel\",\"fr\":\"Israël\",\"ja\":\"イスラエル\",\"it\":\"Israele\",\"cn\":\"以色列\",\"tr\":\"İsrail\"}', '31.50000000', '34.75000000', '🇮🇱', 'U+1F1EE U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q801'),
(107, 'Italy', 'ITA', '380', 'IT', '39', 'Rome', 'EUR', 'Euro', '€', '.it', 'Italia', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Rome\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"이탈리아\",\"pt-BR\":\"Itália\",\"pt\":\"Itália\",\"nl\":\"Italië\",\"hr\":\"Italija\",\"fa\":\"ایتالیا\",\"de\":\"Italien\",\"es\":\"Italia\",\"fr\":\"Italie\",\"ja\":\"イタリア\",\"it\":\"Italia\",\"cn\":\"意大利\",\"tr\":\"İtalya\"}', '42.83333333', '12.83333333', '🇮🇹', 'U+1F1EE U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q38'),
(108, 'Jamaica', 'JAM', '388', 'JM', '+1-876', 'Kingston', 'JMD', 'Jamaican dollar', 'J$', '.jm', 'Jamaica', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Jamaica\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"자메이카\",\"pt-BR\":\"Jamaica\",\"pt\":\"Jamaica\",\"nl\":\"Jamaica\",\"hr\":\"Jamajka\",\"fa\":\"جامائیکا\",\"de\":\"Jamaika\",\"es\":\"Jamaica\",\"fr\":\"Jamaïque\",\"ja\":\"ジャマイカ\",\"it\":\"Giamaica\",\"cn\":\"牙买加\",\"tr\":\"Jamaika\"}', '18.25000000', '-77.50000000', '🇯🇲', 'U+1F1EF U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q766'),
(109, 'Japan', 'JPN', '392', 'JP', '81', 'Tokyo', 'JPY', 'Japanese yen', '¥', '.jp', '日本', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Tokyo\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"JST\",\"tzName\":\"Japan Standard Time\"}]', '{\"kr\":\"일본\",\"pt-BR\":\"Japão\",\"pt\":\"Japão\",\"nl\":\"Japan\",\"hr\":\"Japan\",\"fa\":\"ژاپن\",\"de\":\"Japan\",\"es\":\"Japón\",\"fr\":\"Japon\",\"ja\":\"日本\",\"it\":\"Giappone\",\"cn\":\"日本\",\"tr\":\"Japonya\"}', '36.00000000', '138.00000000', '🇯🇵', 'U+1F1EF U+1F1F5', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q17'),
(110, 'Jersey', 'JEY', '832', 'JE', '+44-1534', 'Saint Helier', 'GBP', 'British pound', '£', '.je', 'Jersey', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Jersey\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"저지 섬\",\"pt-BR\":\"Jersey\",\"pt\":\"Jersey\",\"nl\":\"Jersey\",\"hr\":\"Jersey\",\"fa\":\"جرزی\",\"de\":\"Jersey\",\"es\":\"Jersey\",\"fr\":\"Jersey\",\"ja\":\"ジャージー\",\"it\":\"Isola di Jersey\",\"cn\":\"泽西岛\",\"tr\":\"Jersey\"}', '49.25000000', '-2.16666666', '🇯🇪', 'U+1F1EF U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q785'),
(111, 'Jordan', 'JOR', '400', 'JO', '962', 'Amman', 'JOD', 'Jordanian dinar', 'ا.د', '.jo', 'الأردن', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Amman\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"요르단\",\"pt-BR\":\"Jordânia\",\"pt\":\"Jordânia\",\"nl\":\"Jordanië\",\"hr\":\"Jordan\",\"fa\":\"اردن\",\"de\":\"Jordanien\",\"es\":\"Jordania\",\"fr\":\"Jordanie\",\"ja\":\"ヨルダン\",\"it\":\"Giordania\",\"cn\":\"约旦\",\"tr\":\"Ürdün\"}', '31.00000000', '36.00000000', '🇯🇴', 'U+1F1EF U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q810'),
(112, 'Kazakhstan', 'KAZ', '398', 'KZ', '7', 'Astana', 'KZT', 'Kazakhstani tenge', 'лв', '.kz', 'Қазақстан', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Almaty\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"ALMT\",\"tzName\":\"Alma-Ata Time[1\"},{\"zoneName\":\"Asia/Aqtau\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"AQTT\",\"tzName\":\"Aqtobe Time\"},{\"zoneName\":\"Asia/Aqtobe\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"AQTT\",\"tzName\":\"Aqtobe Time\"},{\"zoneName\":\"Asia/Atyrau\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"MSD+1\",\"tzName\":\"Moscow Daylight Time+1\"},{\"zoneName\":\"Asia/Oral\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"ORAT\",\"tzName\":\"Oral Time\"},{\"zoneName\":\"Asia/Qostanay\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"QYZST\",\"tzName\":\"Qyzylorda Summer Time\"},{\"zoneName\":\"Asia/Qyzylorda\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"QYZT\",\"tzName\":\"Qyzylorda Summer Time\"}]', '{\"kr\":\"카자흐스탄\",\"pt-BR\":\"Cazaquistão\",\"pt\":\"Cazaquistão\",\"nl\":\"Kazachstan\",\"hr\":\"Kazahstan\",\"fa\":\"قزاقستان\",\"de\":\"Kasachstan\",\"es\":\"Kazajistán\",\"fr\":\"Kazakhstan\",\"ja\":\"カザフスタン\",\"it\":\"Kazakistan\",\"cn\":\"哈萨克斯坦\",\"tr\":\"Kazakistan\"}', '48.00000000', '68.00000000', '🇰🇿', 'U+1F1F0 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q232'),
(113, 'Kenya', 'KEN', '404', 'KE', '254', 'Nairobi', 'KES', 'Kenyan shilling', 'KSh', '.ke', 'Kenya', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Nairobi\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"케냐\",\"pt-BR\":\"Quênia\",\"pt\":\"Quénia\",\"nl\":\"Kenia\",\"hr\":\"Kenija\",\"fa\":\"کنیا\",\"de\":\"Kenia\",\"es\":\"Kenia\",\"fr\":\"Kenya\",\"ja\":\"ケニア\",\"it\":\"Kenya\",\"cn\":\"肯尼亚\",\"tr\":\"Kenya\"}', '1.00000000', '38.00000000', '🇰🇪', 'U+1F1F0 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q114'),
(114, 'Kiribati', 'KIR', '296', 'KI', '686', 'Tarawa', 'AUD', 'Australian dollar', '$', '.ki', 'Kiribati', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Enderbury\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"PHOT\",\"tzName\":\"Phoenix Island Time\"},{\"zoneName\":\"Pacific/Kiritimati\",\"gmtOffset\":50400,\"gmtOffsetName\":\"UTC+14:00\",\"abbreviation\":\"LINT\",\"tzName\":\"Line Islands Time\"},{\"zoneName\":\"Pacific/Tarawa\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"GILT\",\"tzName\":\"Gilbert Island Time\"}]', '{\"kr\":\"키리바시\",\"pt-BR\":\"Kiribati\",\"pt\":\"Quiribáti\",\"nl\":\"Kiribati\",\"hr\":\"Kiribati\",\"fa\":\"کیریباتی\",\"de\":\"Kiribati\",\"es\":\"Kiribati\",\"fr\":\"Kiribati\",\"ja\":\"キリバス\",\"it\":\"Kiribati\",\"cn\":\"基里巴斯\",\"tr\":\"Kiribati\"}', '1.41666666', '173.00000000', '🇰🇮', 'U+1F1F0 U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q710'),
(115, 'North Korea', 'PRK', '408', 'KP', '850', 'Pyongyang', 'KPW', 'North Korean Won', '₩', '.kp', '북한', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Pyongyang\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"KST\",\"tzName\":\"Korea Standard Time\"}]', '{\"kr\":\"조선민주주의인민공화국\",\"pt-BR\":\"Coreia do Norte\",\"pt\":\"Coreia do Norte\",\"nl\":\"Noord-Korea\",\"hr\":\"Sjeverna Koreja\",\"fa\":\"کره جنوبی\",\"de\":\"Nordkorea\",\"es\":\"Corea del Norte\",\"fr\":\"Corée du Nord\",\"ja\":\"朝鮮民主主義人民共和国\",\"it\":\"Corea del Nord\",\"cn\":\"朝鲜\",\"tr\":\"Kuzey Kore\"}', '40.00000000', '127.00000000', '🇰🇵', 'U+1F1F0 U+1F1F5', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q423'),
(116, 'South Korea', 'KOR', '410', 'KR', '82', 'Seoul', 'KRW', 'Won', '₩', '.kr', '대한민국', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Seoul\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"KST\",\"tzName\":\"Korea Standard Time\"}]', '{\"kr\":\"대한민국\",\"pt-BR\":\"Coreia do Sul\",\"pt\":\"Coreia do Sul\",\"nl\":\"Zuid-Korea\",\"hr\":\"Južna Koreja\",\"fa\":\"کره شمالی\",\"de\":\"Südkorea\",\"es\":\"Corea del Sur\",\"fr\":\"Corée du Sud\",\"ja\":\"大韓民国\",\"it\":\"Corea del Sud\",\"cn\":\"韩国\",\"tr\":\"Güney Kore\"}', '37.00000000', '127.50000000', '🇰🇷', 'U+1F1F0 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q884'),
(117, 'Kuwait', 'KWT', '414', 'KW', '965', 'Kuwait City', 'KWD', 'Kuwaiti dinar', 'ك.د', '.kw', 'الكويت', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Kuwait\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"쿠웨이트\",\"pt-BR\":\"Kuwait\",\"pt\":\"Kuwait\",\"nl\":\"Koeweit\",\"hr\":\"Kuvajt\",\"fa\":\"کویت\",\"de\":\"Kuwait\",\"es\":\"Kuwait\",\"fr\":\"Koweït\",\"ja\":\"クウェート\",\"it\":\"Kuwait\",\"cn\":\"科威特\",\"tr\":\"Kuveyt\"}', '29.50000000', '45.75000000', '🇰🇼', 'U+1F1F0 U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q817'),
(118, 'Kyrgyzstan', 'KGZ', '417', 'KG', '996', 'Bishkek', 'KGS', 'Kyrgyzstani som', 'лв', '.kg', 'Кыргызстан', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Bishkek\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"KGT\",\"tzName\":\"Kyrgyzstan Time\"}]', '{\"kr\":\"키르기스스탄\",\"pt-BR\":\"Quirguistão\",\"pt\":\"Quirguizistão\",\"nl\":\"Kirgizië\",\"hr\":\"Kirgistan\",\"fa\":\"قرقیزستان\",\"de\":\"Kirgisistan\",\"es\":\"Kirguizistán\",\"fr\":\"Kirghizistan\",\"ja\":\"キルギス\",\"it\":\"Kirghizistan\",\"cn\":\"吉尔吉斯斯坦\",\"tr\":\"Kirgizistan\"}', '41.00000000', '75.00000000', '🇰🇬', 'U+1F1F0 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q813'),
(119, 'Laos', 'LAO', '418', 'LA', '856', 'Vientiane', 'LAK', 'Lao kip', '₭', '.la', 'ສປປລາວ', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Vientiane\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"라오스\",\"pt-BR\":\"Laos\",\"pt\":\"Laos\",\"nl\":\"Laos\",\"hr\":\"Laos\",\"fa\":\"لائوس\",\"de\":\"Laos\",\"es\":\"Laos\",\"fr\":\"Laos\",\"ja\":\"ラオス人民民主共和国\",\"it\":\"Laos\",\"cn\":\"寮人民民主共和国\",\"tr\":\"Laos\"}', '18.00000000', '105.00000000', '🇱🇦', 'U+1F1F1 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q819'),
(120, 'Latvia', 'LVA', '428', 'LV', '371', 'Riga', 'EUR', 'Euro', '€', '.lv', 'Latvija', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Riga\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"라트비아\",\"pt-BR\":\"Letônia\",\"pt\":\"Letónia\",\"nl\":\"Letland\",\"hr\":\"Latvija\",\"fa\":\"لتونی\",\"de\":\"Lettland\",\"es\":\"Letonia\",\"fr\":\"Lettonie\",\"ja\":\"ラトビア\",\"it\":\"Lettonia\",\"cn\":\"拉脱维亚\",\"tr\":\"Letonya\"}', '57.00000000', '25.00000000', '🇱🇻', 'U+1F1F1 U+1F1FB', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q211'),
(121, 'Lebanon', 'LBN', '422', 'LB', '961', 'Beirut', 'LBP', 'Lebanese pound', '£', '.lb', 'لبنان', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Beirut\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"레바논\",\"pt-BR\":\"Líbano\",\"pt\":\"Líbano\",\"nl\":\"Libanon\",\"hr\":\"Libanon\",\"fa\":\"لبنان\",\"de\":\"Libanon\",\"es\":\"Líbano\",\"fr\":\"Liban\",\"ja\":\"レバノン\",\"it\":\"Libano\",\"cn\":\"黎巴嫩\",\"tr\":\"Lübnan\"}', '33.83333333', '35.83333333', '🇱🇧', 'U+1F1F1 U+1F1E7', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q822'),
(122, 'Lesotho', 'LSO', '426', 'LS', '266', 'Maseru', 'LSL', 'Lesotho loti', 'L', '.ls', 'Lesotho', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Maseru\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"SAST\",\"tzName\":\"South African Standard Time\"}]', '{\"kr\":\"레소토\",\"pt-BR\":\"Lesoto\",\"pt\":\"Lesoto\",\"nl\":\"Lesotho\",\"hr\":\"Lesoto\",\"fa\":\"لسوتو\",\"de\":\"Lesotho\",\"es\":\"Lesotho\",\"fr\":\"Lesotho\",\"ja\":\"レソト\",\"it\":\"Lesotho\",\"cn\":\"莱索托\",\"tr\":\"Lesotho\"}', '-29.50000000', '28.50000000', '🇱🇸', 'U+1F1F1 U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1013'),
(123, 'Liberia', 'LBR', '430', 'LR', '231', 'Monrovia', 'LRD', 'Liberian dollar', '$', '.lr', 'Liberia', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Monrovia\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"라이베리아\",\"pt-BR\":\"Libéria\",\"pt\":\"Libéria\",\"nl\":\"Liberia\",\"hr\":\"Liberija\",\"fa\":\"لیبریا\",\"de\":\"Liberia\",\"es\":\"Liberia\",\"fr\":\"Liberia\",\"ja\":\"リベリア\",\"it\":\"Liberia\",\"cn\":\"利比里亚\",\"tr\":\"Liberya\"}', '6.50000000', '-9.50000000', '🇱🇷', 'U+1F1F1 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1014'),
(124, 'Libya', 'LBY', '434', 'LY', '218', 'Tripolis', 'LYD', 'Libyan dinar', 'د.ل', '.ly', '‏ليبيا', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Tripoli\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"리비아\",\"pt-BR\":\"Líbia\",\"pt\":\"Líbia\",\"nl\":\"Libië\",\"hr\":\"Libija\",\"fa\":\"لیبی\",\"de\":\"Libyen\",\"es\":\"Libia\",\"fr\":\"Libye\",\"ja\":\"リビア\",\"it\":\"Libia\",\"cn\":\"利比亚\",\"tr\":\"Libya\"}', '25.00000000', '17.00000000', '🇱🇾', 'U+1F1F1 U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1016'),
(125, 'Liechtenstein', 'LIE', '438', 'LI', '423', 'Vaduz', 'CHF', 'Swiss franc', 'CHf', '.li', 'Liechtenstein', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Vaduz\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"리히텐슈타인\",\"pt-BR\":\"Liechtenstein\",\"pt\":\"Listenstaine\",\"nl\":\"Liechtenstein\",\"hr\":\"Lihtenštajn\",\"fa\":\"لیختن‌اشتاین\",\"de\":\"Liechtenstein\",\"es\":\"Liechtenstein\",\"fr\":\"Liechtenstein\",\"ja\":\"リヒテンシュタイン\",\"it\":\"Liechtenstein\",\"cn\":\"列支敦士登\",\"tr\":\"Lihtenştayn\"}', '47.26666666', '9.53333333', '🇱🇮', 'U+1F1F1 U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q347');
INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `wikiDataId`) VALUES
(126, 'Lithuania', 'LTU', '440', 'LT', '370', 'Vilnius', 'EUR', 'Euro', '€', '.lt', 'Lietuva', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Vilnius\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"리투아니아\",\"pt-BR\":\"Lituânia\",\"pt\":\"Lituânia\",\"nl\":\"Litouwen\",\"hr\":\"Litva\",\"fa\":\"لیتوانی\",\"de\":\"Litauen\",\"es\":\"Lituania\",\"fr\":\"Lituanie\",\"ja\":\"リトアニア\",\"it\":\"Lituania\",\"cn\":\"立陶宛\",\"tr\":\"Litvanya\"}', '56.00000000', '24.00000000', '🇱🇹', 'U+1F1F1 U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q37'),
(127, 'Luxembourg', 'LUX', '442', 'LU', '352', 'Luxembourg', 'EUR', 'Euro', '€', '.lu', 'Luxembourg', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Luxembourg\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"룩셈부르크\",\"pt-BR\":\"Luxemburgo\",\"pt\":\"Luxemburgo\",\"nl\":\"Luxemburg\",\"hr\":\"Luksemburg\",\"fa\":\"لوکزامبورگ\",\"de\":\"Luxemburg\",\"es\":\"Luxemburgo\",\"fr\":\"Luxembourg\",\"ja\":\"ルクセンブルク\",\"it\":\"Lussemburgo\",\"cn\":\"卢森堡\",\"tr\":\"Lüksemburg\"}', '49.75000000', '6.16666666', '🇱🇺', 'U+1F1F1 U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q32'),
(128, 'Macau S.A.R.', 'MAC', '446', 'MO', '853', 'Macao', 'MOP', 'Macanese pataca', '$', '.mo', '澳門', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Macau\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CST\",\"tzName\":\"China Standard Time\"}]', '{\"kr\":\"마카오\",\"pt-BR\":\"Macau\",\"pt\":\"Macau\",\"nl\":\"Macao\",\"hr\":\"Makao\",\"fa\":\"مکائو\",\"de\":\"Macao\",\"es\":\"Macao\",\"fr\":\"Macao\",\"ja\":\"マカオ\",\"it\":\"Macao\",\"cn\":\"中国澳门\",\"tr\":\"Makao\"}', '22.16666666', '113.55000000', '🇲🇴', 'U+1F1F2 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(129, 'Macedonia', 'MKD', '807', 'MK', '389', 'Skopje', 'MKD', 'Denar', 'ден', '.mk', 'Северна Македонија', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Skopje\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"마케도니아\",\"pt-BR\":\"Macedônia\",\"pt\":\"Macedónia\",\"nl\":\"Macedonië\",\"hr\":\"Makedonija\",\"fa\":\"\",\"de\":\"Mazedonien\",\"es\":\"Macedonia\",\"fr\":\"Macédoine\",\"ja\":\"マケドニア旧ユーゴスラビア共和国\",\"it\":\"Macedonia\",\"cn\":\"马其顿\",\"tr\":\"Kuzey Makedonya\"}', '41.83333333', '22.00000000', '🇲🇰', 'U+1F1F2 U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q221'),
(130, 'Madagascar', 'MDG', '450', 'MG', '261', 'Antananarivo', 'MGA', 'Malagasy ariary', 'Ar', '.mg', 'Madagasikara', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Antananarivo\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"마다가스카르\",\"pt-BR\":\"Madagascar\",\"pt\":\"Madagáscar\",\"nl\":\"Madagaskar\",\"hr\":\"Madagaskar\",\"fa\":\"ماداگاسکار\",\"de\":\"Madagaskar\",\"es\":\"Madagascar\",\"fr\":\"Madagascar\",\"ja\":\"マダガスカル\",\"it\":\"Madagascar\",\"cn\":\"马达加斯加\",\"tr\":\"Madagaskar\"}', '-20.00000000', '47.00000000', '🇲🇬', 'U+1F1F2 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1019'),
(131, 'Malawi', 'MWI', '454', 'MW', '265', 'Lilongwe', 'MWK', 'Malawian kwacha', 'MK', '.mw', 'Malawi', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Blantyre\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"말라위\",\"pt-BR\":\"Malawi\",\"pt\":\"Malávi\",\"nl\":\"Malawi\",\"hr\":\"Malavi\",\"fa\":\"مالاوی\",\"de\":\"Malawi\",\"es\":\"Malawi\",\"fr\":\"Malawi\",\"ja\":\"マラウイ\",\"it\":\"Malawi\",\"cn\":\"马拉维\",\"tr\":\"Malavi\"}', '-13.50000000', '34.00000000', '🇲🇼', 'U+1F1F2 U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1020'),
(132, 'Malaysia', 'MYS', '458', 'MY', '60', 'Kuala Lumpur', 'MYR', 'Malaysian ringgit', 'RM', '.my', 'Malaysia', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Kuala_Lumpur\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"MYT\",\"tzName\":\"Malaysia Time\"},{\"zoneName\":\"Asia/Kuching\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"MYT\",\"tzName\":\"Malaysia Time\"}]', '{\"kr\":\"말레이시아\",\"pt-BR\":\"Malásia\",\"pt\":\"Malásia\",\"nl\":\"Maleisië\",\"hr\":\"Malezija\",\"fa\":\"مالزی\",\"de\":\"Malaysia\",\"es\":\"Malasia\",\"fr\":\"Malaisie\",\"ja\":\"マレーシア\",\"it\":\"Malesia\",\"cn\":\"马来西亚\",\"tr\":\"Malezya\"}', '2.50000000', '112.50000000', '🇲🇾', 'U+1F1F2 U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q833'),
(133, 'Maldives', 'MDV', '462', 'MV', '960', 'Male', 'MVR', 'Maldivian rufiyaa', 'Rf', '.mv', 'Maldives', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Indian/Maldives\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"MVT\",\"tzName\":\"Maldives Time\"}]', '{\"kr\":\"몰디브\",\"pt-BR\":\"Maldivas\",\"pt\":\"Maldivas\",\"nl\":\"Maldiven\",\"hr\":\"Maldivi\",\"fa\":\"مالدیو\",\"de\":\"Malediven\",\"es\":\"Maldivas\",\"fr\":\"Maldives\",\"ja\":\"モルディブ\",\"it\":\"Maldive\",\"cn\":\"马尔代夫\",\"tr\":\"Maldivler\"}', '3.25000000', '73.00000000', '🇲🇻', 'U+1F1F2 U+1F1FB', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q826'),
(134, 'Mali', 'MLI', '466', 'ML', '223', 'Bamako', 'XOF', 'West African CFA franc', 'CFA', '.ml', 'Mali', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Bamako\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"말리\",\"pt-BR\":\"Mali\",\"pt\":\"Mali\",\"nl\":\"Mali\",\"hr\":\"Mali\",\"fa\":\"مالی\",\"de\":\"Mali\",\"es\":\"Mali\",\"fr\":\"Mali\",\"ja\":\"マリ\",\"it\":\"Mali\",\"cn\":\"马里\",\"tr\":\"Mali\"}', '17.00000000', '-4.00000000', '🇲🇱', 'U+1F1F2 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q912'),
(135, 'Malta', 'MLT', '470', 'MT', '356', 'Valletta', 'EUR', 'Euro', '€', '.mt', 'Malta', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Malta\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"몰타\",\"pt-BR\":\"Malta\",\"pt\":\"Malta\",\"nl\":\"Malta\",\"hr\":\"Malta\",\"fa\":\"مالت\",\"de\":\"Malta\",\"es\":\"Malta\",\"fr\":\"Malte\",\"ja\":\"マルタ\",\"it\":\"Malta\",\"cn\":\"马耳他\",\"tr\":\"Malta\"}', '35.83333333', '14.58333333', '🇲🇹', 'U+1F1F2 U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q233'),
(136, 'Man (Isle of)', 'IMN', '833', 'IM', '+44-1624', 'Douglas, Isle of Man', 'GBP', 'British pound', '£', '.im', 'Isle of Man', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Isle_of_Man\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"맨 섬\",\"pt-BR\":\"Ilha de Man\",\"pt\":\"Ilha de Man\",\"nl\":\"Isle of Man\",\"hr\":\"Otok Man\",\"fa\":\"جزیره من\",\"de\":\"Insel Man\",\"es\":\"Isla de Man\",\"fr\":\"Île de Man\",\"ja\":\"マン島\",\"it\":\"Isola di Man\",\"cn\":\"马恩岛\",\"tr\":\"Man Adasi\"}', '54.25000000', '-4.50000000', '🇮🇲', 'U+1F1EE U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(137, 'Marshall Islands', 'MHL', '584', 'MH', '692', 'Majuro', 'USD', 'United States dollar', '$', '.mh', 'M̧ajeļ', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Kwajalein\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"MHT\",\"tzName\":\"Marshall Islands Time\"},{\"zoneName\":\"Pacific/Majuro\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"MHT\",\"tzName\":\"Marshall Islands Time\"}]', '{\"kr\":\"마셜 제도\",\"pt-BR\":\"Ilhas Marshall\",\"pt\":\"Ilhas Marshall\",\"nl\":\"Marshalleilanden\",\"hr\":\"Maršalovi Otoci\",\"fa\":\"جزایر مارشال\",\"de\":\"Marshallinseln\",\"es\":\"Islas Marshall\",\"fr\":\"Îles Marshall\",\"ja\":\"マーシャル諸島\",\"it\":\"Isole Marshall\",\"cn\":\"马绍尔群岛\",\"tr\":\"Marşal Adalari\"}', '9.00000000', '168.00000000', '🇲🇭', 'U+1F1F2 U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q709'),
(138, 'Martinique', 'MTQ', '474', 'MQ', '596', 'Fort-de-France', 'EUR', 'Euro', '€', '.mq', 'Martinique', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Martinique\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"마르티니크\",\"pt-BR\":\"Martinica\",\"pt\":\"Martinica\",\"nl\":\"Martinique\",\"hr\":\"Martinique\",\"fa\":\"مونتسرات\",\"de\":\"Martinique\",\"es\":\"Martinica\",\"fr\":\"Martinique\",\"ja\":\"マルティニーク\",\"it\":\"Martinica\",\"cn\":\"马提尼克岛\",\"tr\":\"Martinik\"}', '14.66666700', '-61.00000000', '🇲🇶', 'U+1F1F2 U+1F1F6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(139, 'Mauritania', 'MRT', '478', 'MR', '222', 'Nouakchott', 'MRO', 'Mauritanian ouguiya', 'MRU', '.mr', 'موريتانيا', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Nouakchott\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"모리타니\",\"pt-BR\":\"Mauritânia\",\"pt\":\"Mauritânia\",\"nl\":\"Mauritanië\",\"hr\":\"Mauritanija\",\"fa\":\"موریتانی\",\"de\":\"Mauretanien\",\"es\":\"Mauritania\",\"fr\":\"Mauritanie\",\"ja\":\"モーリタニア\",\"it\":\"Mauritania\",\"cn\":\"毛里塔尼亚\",\"tr\":\"Moritanya\"}', '20.00000000', '-12.00000000', '🇲🇷', 'U+1F1F2 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1025'),
(140, 'Mauritius', 'MUS', '480', 'MU', '230', 'Port Louis', 'MUR', 'Mauritian rupee', '₨', '.mu', 'Maurice', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Mauritius\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"MUT\",\"tzName\":\"Mauritius Time\"}]', '{\"kr\":\"모리셔스\",\"pt-BR\":\"Maurício\",\"pt\":\"Maurícia\",\"nl\":\"Mauritius\",\"hr\":\"Mauricijus\",\"fa\":\"موریس\",\"de\":\"Mauritius\",\"es\":\"Mauricio\",\"fr\":\"Île Maurice\",\"ja\":\"モーリシャス\",\"it\":\"Mauritius\",\"cn\":\"毛里求斯\",\"tr\":\"Morityus\"}', '-20.28333333', '57.55000000', '🇲🇺', 'U+1F1F2 U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1027'),
(141, 'Mayotte', 'MYT', '175', 'YT', '262', 'Mamoudzou', 'EUR', 'Euro', '€', '.yt', 'Mayotte', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Mayotte\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"마요트\",\"pt-BR\":\"Mayotte\",\"pt\":\"Mayotte\",\"nl\":\"Mayotte\",\"hr\":\"Mayotte\",\"fa\":\"مایوت\",\"de\":\"Mayotte\",\"es\":\"Mayotte\",\"fr\":\"Mayotte\",\"ja\":\"マヨット\",\"it\":\"Mayotte\",\"cn\":\"马约特\",\"tr\":\"Mayotte\"}', '-12.83333333', '45.16666666', '🇾🇹', 'U+1F1FE U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(142, 'Mexico', 'MEX', '484', 'MX', '52', 'Ciudad de México', 'MXN', 'Mexican peso', '$', '.mx', 'México', 'Americas', 'Central America', '[{\"zoneName\":\"America/Bahia_Banderas\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Cancun\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Chihuahua\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Hermosillo\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Matamoros\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Mazatlan\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Merida\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Mexico_City\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Monterrey\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Ojinaga\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Tijuana\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"}]', '{\"kr\":\"멕시코\",\"pt-BR\":\"México\",\"pt\":\"México\",\"nl\":\"Mexico\",\"hr\":\"Meksiko\",\"fa\":\"مکزیک\",\"de\":\"Mexiko\",\"es\":\"México\",\"fr\":\"Mexique\",\"ja\":\"メキシコ\",\"it\":\"Messico\",\"cn\":\"墨西哥\",\"tr\":\"Meksika\"}', '23.00000000', '-102.00000000', '🇲🇽', 'U+1F1F2 U+1F1FD', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q96'),
(143, 'Micronesia', 'FSM', '583', 'FM', '691', 'Palikir', 'USD', 'United States dollar', '$', '.fm', 'Micronesia', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Chuuk\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"CHUT\",\"tzName\":\"Chuuk Time\"},{\"zoneName\":\"Pacific/Kosrae\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"KOST\",\"tzName\":\"Kosrae Time\"},{\"zoneName\":\"Pacific/Pohnpei\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"PONT\",\"tzName\":\"Pohnpei Standard Time\"}]', '{\"kr\":\"미크로네시아 연방\",\"pt-BR\":\"Micronésia\",\"pt\":\"Micronésia\",\"nl\":\"Micronesië\",\"hr\":\"Mikronezija\",\"fa\":\"ایالات فدرال میکرونزی\",\"de\":\"Mikronesien\",\"es\":\"Micronesia\",\"fr\":\"Micronésie\",\"ja\":\"ミクロネシア連邦\",\"it\":\"Micronesia\",\"cn\":\"密克罗尼西亚\",\"tr\":\"Mikronezya\"}', '6.91666666', '158.25000000', '🇫🇲', 'U+1F1EB U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q702'),
(144, 'Moldova', 'MDA', '498', 'MD', '373', 'Chisinau', 'MDL', 'Moldovan leu', 'L', '.md', 'Moldova', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Chisinau\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"몰도바\",\"pt-BR\":\"Moldávia\",\"pt\":\"Moldávia\",\"nl\":\"Moldavië\",\"hr\":\"Moldova\",\"fa\":\"مولداوی\",\"de\":\"Moldawie\",\"es\":\"Moldavia\",\"fr\":\"Moldavie\",\"ja\":\"モルドバ共和国\",\"it\":\"Moldavia\",\"cn\":\"摩尔多瓦\",\"tr\":\"Moldova\"}', '47.00000000', '29.00000000', '🇲🇩', 'U+1F1F2 U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q217'),
(145, 'Monaco', 'MCO', '492', 'MC', '377', 'Monaco', 'EUR', 'Euro', '€', '.mc', 'Monaco', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Monaco\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"모나코\",\"pt-BR\":\"Mônaco\",\"pt\":\"Mónaco\",\"nl\":\"Monaco\",\"hr\":\"Monako\",\"fa\":\"موناکو\",\"de\":\"Monaco\",\"es\":\"Mónaco\",\"fr\":\"Monaco\",\"ja\":\"モナコ\",\"it\":\"Principato di Monaco\",\"cn\":\"摩纳哥\",\"tr\":\"Monako\"}', '43.73333333', '7.40000000', '🇲🇨', 'U+1F1F2 U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q235'),
(146, 'Mongolia', 'MNG', '496', 'MN', '976', 'Ulan Bator', 'MNT', 'Mongolian tögrög', '₮', '.mn', 'Монгол улс', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Choibalsan\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CHOT\",\"tzName\":\"Choibalsan Standard Time\"},{\"zoneName\":\"Asia/Hovd\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"HOVT\",\"tzName\":\"Hovd Time\"},{\"zoneName\":\"Asia/Ulaanbaatar\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"ULAT\",\"tzName\":\"Ulaanbaatar Standard Time\"}]', '{\"kr\":\"몽골\",\"pt-BR\":\"Mongólia\",\"pt\":\"Mongólia\",\"nl\":\"Mongolië\",\"hr\":\"Mongolija\",\"fa\":\"مغولستان\",\"de\":\"Mongolei\",\"es\":\"Mongolia\",\"fr\":\"Mongolie\",\"ja\":\"モンゴル\",\"it\":\"Mongolia\",\"cn\":\"蒙古\",\"tr\":\"Moğolistan\"}', '46.00000000', '105.00000000', '🇲🇳', 'U+1F1F2 U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q711'),
(147, 'Montenegro', 'MNE', '499', 'ME', '382', 'Podgorica', 'EUR', 'Euro', '€', '.me', 'Црна Гора', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Podgorica\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"몬테네그로\",\"pt-BR\":\"Montenegro\",\"pt\":\"Montenegro\",\"nl\":\"Montenegro\",\"hr\":\"Crna Gora\",\"fa\":\"مونته‌نگرو\",\"de\":\"Montenegro\",\"es\":\"Montenegro\",\"fr\":\"Monténégro\",\"ja\":\"モンテネグロ\",\"it\":\"Montenegro\",\"cn\":\"黑山\",\"tr\":\"Karadağ\"}', '42.50000000', '19.30000000', '🇲🇪', 'U+1F1F2 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q236'),
(148, 'Montserrat', 'MSR', '500', 'MS', '+1-664', 'Plymouth', 'XCD', 'Eastern Caribbean dollar', '$', '.ms', 'Montserrat', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Montserrat\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"몬트세랫\",\"pt-BR\":\"Montserrat\",\"pt\":\"Monserrate\",\"nl\":\"Montserrat\",\"hr\":\"Montserrat\",\"fa\":\"مایوت\",\"de\":\"Montserrat\",\"es\":\"Montserrat\",\"fr\":\"Montserrat\",\"ja\":\"モントセラト\",\"it\":\"Montserrat\",\"cn\":\"蒙特塞拉特\",\"tr\":\"Montserrat\"}', '16.75000000', '-62.20000000', '🇲🇸', 'U+1F1F2 U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(149, 'Morocco', 'MAR', '504', 'MA', '212', 'Rabat', 'MAD', 'Moroccan dirham', 'DH', '.ma', 'المغرب', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Casablanca\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WEST\",\"tzName\":\"Western European Summer Time\"}]', '{\"kr\":\"모로코\",\"pt-BR\":\"Marrocos\",\"pt\":\"Marrocos\",\"nl\":\"Marokko\",\"hr\":\"Maroko\",\"fa\":\"مراکش\",\"de\":\"Marokko\",\"es\":\"Marruecos\",\"fr\":\"Maroc\",\"ja\":\"モロッコ\",\"it\":\"Marocco\",\"cn\":\"摩洛哥\",\"tr\":\"Fas\"}', '32.00000000', '-5.00000000', '🇲🇦', 'U+1F1F2 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1028'),
(150, 'Mozambique', 'MOZ', '508', 'MZ', '258', 'Maputo', 'MZN', 'Mozambican metical', 'MT', '.mz', 'Moçambique', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Maputo\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"모잠비크\",\"pt-BR\":\"Moçambique\",\"pt\":\"Moçambique\",\"nl\":\"Mozambique\",\"hr\":\"Mozambik\",\"fa\":\"موزامبیک\",\"de\":\"Mosambik\",\"es\":\"Mozambique\",\"fr\":\"Mozambique\",\"ja\":\"モザンビーク\",\"it\":\"Mozambico\",\"cn\":\"莫桑比克\",\"tr\":\"Mozambik\"}', '-18.25000000', '35.00000000', '🇲🇿', 'U+1F1F2 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1029'),
(151, 'Myanmar', 'MMR', '104', 'MM', '95', 'Nay Pyi Taw', 'MMK', 'Burmese kyat', 'K', '.mm', 'မြန်မာ', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Yangon\",\"gmtOffset\":23400,\"gmtOffsetName\":\"UTC+06:30\",\"abbreviation\":\"MMT\",\"tzName\":\"Myanmar Standard Time\"}]', '{\"kr\":\"미얀마\",\"pt-BR\":\"Myanmar\",\"pt\":\"Myanmar\",\"nl\":\"Myanmar\",\"hr\":\"Mijanmar\",\"fa\":\"میانمار\",\"de\":\"Myanmar\",\"es\":\"Myanmar\",\"fr\":\"Myanmar\",\"ja\":\"ミャンマー\",\"it\":\"Birmania\",\"cn\":\"缅甸\",\"tr\":\"Myanmar\"}', '22.00000000', '98.00000000', '🇲🇲', 'U+1F1F2 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q836'),
(152, 'Namibia', 'NAM', '516', 'NA', '264', 'Windhoek', 'NAD', 'Namibian dollar', '$', '.na', 'Namibia', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Windhoek\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"WAST\",\"tzName\":\"West Africa Summer Time\"}]', '{\"kr\":\"나미비아\",\"pt-BR\":\"Namíbia\",\"pt\":\"Namíbia\",\"nl\":\"Namibië\",\"hr\":\"Namibija\",\"fa\":\"نامیبیا\",\"de\":\"Namibia\",\"es\":\"Namibia\",\"fr\":\"Namibie\",\"ja\":\"ナミビア\",\"it\":\"Namibia\",\"cn\":\"纳米比亚\",\"tr\":\"Namibya\"}', '-22.00000000', '17.00000000', '🇳🇦', 'U+1F1F3 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1030'),
(153, 'Nauru', 'NRU', '520', 'NR', '674', 'Yaren', 'AUD', 'Australian dollar', '$', '.nr', 'Nauru', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Nauru\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"NRT\",\"tzName\":\"Nauru Time\"}]', '{\"kr\":\"나우루\",\"pt-BR\":\"Nauru\",\"pt\":\"Nauru\",\"nl\":\"Nauru\",\"hr\":\"Nauru\",\"fa\":\"نائورو\",\"de\":\"Nauru\",\"es\":\"Nauru\",\"fr\":\"Nauru\",\"ja\":\"ナウル\",\"it\":\"Nauru\",\"cn\":\"瑙鲁\",\"tr\":\"Nauru\"}', '-0.53333333', '166.91666666', '🇳🇷', 'U+1F1F3 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q697'),
(154, 'Nepal', 'NPL', '524', 'NP', '977', 'Kathmandu', 'NPR', 'Nepalese rupee', '₨', '.np', 'नपल', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Kathmandu\",\"gmtOffset\":20700,\"gmtOffsetName\":\"UTC+05:45\",\"abbreviation\":\"NPT\",\"tzName\":\"Nepal Time\"}]', '{\"kr\":\"네팔\",\"pt-BR\":\"Nepal\",\"pt\":\"Nepal\",\"nl\":\"Nepal\",\"hr\":\"Nepal\",\"fa\":\"نپال\",\"de\":\"Népal\",\"es\":\"Nepal\",\"fr\":\"Népal\",\"ja\":\"ネパール\",\"it\":\"Nepal\",\"cn\":\"尼泊尔\",\"tr\":\"Nepal\"}', '28.00000000', '84.00000000', '🇳🇵', 'U+1F1F3 U+1F1F5', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q837'),
(155, 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'BQ', '599', 'Kralendijk', 'USD', 'United States dollar', '$', '.an', 'Caribisch Nederland', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Anguilla\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"보네르 섬\",\"pt-BR\":\"Bonaire\",\"pt\":\"Bonaire\",\"fa\":\"بونیر\",\"de\":\"Bonaire, Sint Eustatius und Saba\",\"fr\":\"Bonaire, Saint-Eustache et Saba\",\"it\":\"Bonaire, Saint-Eustache e Saba\",\"cn\":\"博内尔岛、圣尤斯特歇斯和萨巴岛\",\"tr\":\"Karayip Hollandasi\"}', '12.15000000', '-68.26666700', '🇧🇶', 'U+1F1E7 U+1F1F6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q27561'),
(156, 'Netherlands', 'NLD', '528', 'NL', '31', 'Amsterdam', 'EUR', 'Euro', '€', '.nl', 'Nederland', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Amsterdam\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"네덜란드 \",\"pt-BR\":\"Holanda\",\"pt\":\"Países Baixos\",\"nl\":\"Nederland\",\"hr\":\"Nizozemska\",\"fa\":\"پادشاهی هلند\",\"de\":\"Niederlande\",\"es\":\"Países Bajos\",\"fr\":\"Pays-Bas\",\"ja\":\"オランダ\",\"it\":\"Paesi Bassi\",\"cn\":\"荷兰\",\"tr\":\"Hollanda\"}', '52.50000000', '5.75000000', '🇳🇱', 'U+1F1F3 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q55'),
(157, 'New Caledonia', 'NCL', '540', 'NC', '687', 'Noumea', 'XPF', 'CFP franc', '₣', '.nc', 'Nouvelle-Calédonie', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Noumea\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"NCT\",\"tzName\":\"New Caledonia Time\"}]', '{\"kr\":\"누벨칼레도니\",\"pt-BR\":\"Nova Caledônia\",\"pt\":\"Nova Caledónia\",\"nl\":\"Nieuw-Caledonië\",\"hr\":\"Nova Kaledonija\",\"fa\":\"کالدونیای جدید\",\"de\":\"Neukaledonien\",\"es\":\"Nueva Caledonia\",\"fr\":\"Nouvelle-Calédonie\",\"ja\":\"ニューカレドニア\",\"it\":\"Nuova Caledonia\",\"cn\":\"新喀里多尼亚\",\"tr\":\"Yeni Kaledonya\"}', '-21.50000000', '165.50000000', '🇳🇨', 'U+1F1F3 U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(158, 'New Zealand', 'NZL', '554', 'NZ', '64', 'Wellington', 'NZD', 'New Zealand dollar', '$', '.nz', 'New Zealand', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Pacific/Auckland\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"NZDT\",\"tzName\":\"New Zealand Daylight Time\"},{\"zoneName\":\"Pacific/Chatham\",\"gmtOffset\":49500,\"gmtOffsetName\":\"UTC+13:45\",\"abbreviation\":\"CHAST\",\"tzName\":\"Chatham Standard Time\"}]', '{\"kr\":\"뉴질랜드\",\"pt-BR\":\"Nova Zelândia\",\"pt\":\"Nova Zelândia\",\"nl\":\"Nieuw-Zeeland\",\"hr\":\"Novi Zeland\",\"fa\":\"نیوزیلند\",\"de\":\"Neuseeland\",\"es\":\"Nueva Zelanda\",\"fr\":\"Nouvelle-Zélande\",\"ja\":\"ニュージーランド\",\"it\":\"Nuova Zelanda\",\"cn\":\"新西兰\",\"tr\":\"Yeni Zelanda\"}', '-41.00000000', '174.00000000', '🇳🇿', 'U+1F1F3 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q664'),
(159, 'Nicaragua', 'NIC', '558', 'NI', '505', 'Managua', 'NIO', 'Nicaraguan córdoba', 'C$', '.ni', 'Nicaragua', 'Americas', 'Central America', '[{\"zoneName\":\"America/Managua\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"}]', '{\"kr\":\"니카라과\",\"pt-BR\":\"Nicarágua\",\"pt\":\"Nicarágua\",\"nl\":\"Nicaragua\",\"hr\":\"Nikaragva\",\"fa\":\"نیکاراگوئه\",\"de\":\"Nicaragua\",\"es\":\"Nicaragua\",\"fr\":\"Nicaragua\",\"ja\":\"ニカラグア\",\"it\":\"Nicaragua\",\"cn\":\"尼加拉瓜\",\"tr\":\"Nikaragua\"}', '13.00000000', '-85.00000000', '🇳🇮', 'U+1F1F3 U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q811'),
(160, 'Niger', 'NER', '562', 'NE', '227', 'Niamey', 'XOF', 'West African CFA franc', 'CFA', '.ne', 'Niger', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Niamey\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"니제르\",\"pt-BR\":\"Níger\",\"pt\":\"Níger\",\"nl\":\"Niger\",\"hr\":\"Niger\",\"fa\":\"نیجر\",\"de\":\"Niger\",\"es\":\"Níger\",\"fr\":\"Niger\",\"ja\":\"ニジェール\",\"it\":\"Niger\",\"cn\":\"尼日尔\",\"tr\":\"Nijer\"}', '16.00000000', '8.00000000', '🇳🇪', 'U+1F1F3 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1032'),
(161, 'Nigeria', 'NGA', '566', 'NG', '234', 'Abuja', 'NGN', 'Nigerian naira', '₦', '.ng', 'Nigeria', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Lagos\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WAT\",\"tzName\":\"West Africa Time\"}]', '{\"kr\":\"나이지리아\",\"pt-BR\":\"Nigéria\",\"pt\":\"Nigéria\",\"nl\":\"Nigeria\",\"hr\":\"Nigerija\",\"fa\":\"نیجریه\",\"de\":\"Nigeria\",\"es\":\"Nigeria\",\"fr\":\"Nigéria\",\"ja\":\"ナイジェリア\",\"it\":\"Nigeria\",\"cn\":\"尼日利亚\",\"tr\":\"Nijerya\"}', '10.00000000', '8.00000000', '🇳🇬', 'U+1F1F3 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1033'),
(162, 'Niue', 'NIU', '570', 'NU', '683', 'Alofi', 'NZD', 'New Zealand dollar', '$', '.nu', 'Niuē', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Niue\",\"gmtOffset\":-39600,\"gmtOffsetName\":\"UTC-11:00\",\"abbreviation\":\"NUT\",\"tzName\":\"Niue Time\"}]', '{\"kr\":\"니우에\",\"pt-BR\":\"Niue\",\"pt\":\"Niue\",\"nl\":\"Niue\",\"hr\":\"Niue\",\"fa\":\"نیووی\",\"de\":\"Niue\",\"es\":\"Niue\",\"fr\":\"Niue\",\"ja\":\"ニウエ\",\"it\":\"Niue\",\"cn\":\"纽埃\",\"tr\":\"Niue\"}', '-19.03333333', '-169.86666666', '🇳🇺', 'U+1F1F3 U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q34020'),
(163, 'Norfolk Island', 'NFK', '574', 'NF', '672', 'Kingston', 'AUD', 'Australian dollar', '$', '.nf', 'Norfolk Island', 'Oceania', 'Australia and New Zealand', '[{\"zoneName\":\"Pacific/Norfolk\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"NFT\",\"tzName\":\"Norfolk Time\"}]', '{\"kr\":\"노퍽 섬\",\"pt-BR\":\"Ilha Norfolk\",\"pt\":\"Ilha Norfolk\",\"nl\":\"Norfolkeiland\",\"hr\":\"Otok Norfolk\",\"fa\":\"جزیره نورفک\",\"de\":\"Norfolkinsel\",\"es\":\"Isla de Norfolk\",\"fr\":\"Île de Norfolk\",\"ja\":\"ノーフォーク島\",\"it\":\"Isola Norfolk\",\"cn\":\"诺福克岛\",\"tr\":\"Norfolk Adasi\"}', '-29.03333333', '167.95000000', '🇳🇫', 'U+1F1F3 U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(164, 'Northern Mariana Islands', 'MNP', '580', 'MP', '+1-670', 'Saipan', 'USD', 'United States dollar', '$', '.mp', 'Northern Mariana Islands', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Saipan\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"ChST\",\"tzName\":\"Chamorro Standard Time\"}]', '{\"kr\":\"북마리아나 제도\",\"pt-BR\":\"Ilhas Marianas\",\"pt\":\"Ilhas Marianas\",\"nl\":\"Noordelijke Marianeneilanden\",\"hr\":\"Sjevernomarijanski otoci\",\"fa\":\"جزایر ماریانای شمالی\",\"de\":\"Nördliche Marianen\",\"es\":\"Islas Marianas del Norte\",\"fr\":\"Îles Mariannes du Nord\",\"ja\":\"北マリアナ諸島\",\"it\":\"Isole Marianne Settentrionali\",\"cn\":\"北马里亚纳群岛\",\"tr\":\"Kuzey Mariana Adalari\"}', '15.20000000', '145.75000000', '🇲🇵', 'U+1F1F2 U+1F1F5', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(165, 'Norway', 'NOR', '578', 'NO', '47', 'Oslo', 'NOK', 'Norwegian krone', 'kr', '.no', 'Norge', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Oslo\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"노르웨이\",\"pt-BR\":\"Noruega\",\"pt\":\"Noruega\",\"nl\":\"Noorwegen\",\"hr\":\"Norveška\",\"fa\":\"نروژ\",\"de\":\"Norwegen\",\"es\":\"Noruega\",\"fr\":\"Norvège\",\"ja\":\"ノルウェー\",\"it\":\"Norvegia\",\"cn\":\"挪威\",\"tr\":\"Norveç\"}', '62.00000000', '10.00000000', '🇳🇴', 'U+1F1F3 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q20'),
(166, 'Oman', 'OMN', '512', 'OM', '968', 'Muscat', 'OMR', 'Omani rial', '.ع.ر', '.om', 'عمان', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Muscat\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"GST\",\"tzName\":\"Gulf Standard Time\"}]', '{\"kr\":\"오만\",\"pt-BR\":\"Omã\",\"pt\":\"Omã\",\"nl\":\"Oman\",\"hr\":\"Oman\",\"fa\":\"عمان\",\"de\":\"Oman\",\"es\":\"Omán\",\"fr\":\"Oman\",\"ja\":\"オマーン\",\"it\":\"oman\",\"cn\":\"阿曼\",\"tr\":\"Umman\"}', '21.00000000', '57.00000000', '🇴🇲', 'U+1F1F4 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q842'),
(167, 'Pakistan', 'PAK', '586', 'PK', '92', 'Islamabad', 'PKR', 'Pakistani rupee', '₨', '.pk', 'Pakistan', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Karachi\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"PKT\",\"tzName\":\"Pakistan Standard Time\"}]', '{\"kr\":\"파키스탄\",\"pt-BR\":\"Paquistão\",\"pt\":\"Paquistão\",\"nl\":\"Pakistan\",\"hr\":\"Pakistan\",\"fa\":\"پاکستان\",\"de\":\"Pakistan\",\"es\":\"Pakistán\",\"fr\":\"Pakistan\",\"ja\":\"パキスタン\",\"it\":\"Pakistan\",\"cn\":\"巴基斯坦\",\"tr\":\"Pakistan\"}', '30.00000000', '70.00000000', '🇵🇰', 'U+1F1F5 U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q843'),
(168, 'Palau', 'PLW', '585', 'PW', '680', 'Melekeok', 'USD', 'United States dollar', '$', '.pw', 'Palau', 'Oceania', 'Micronesia', '[{\"zoneName\":\"Pacific/Palau\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"PWT\",\"tzName\":\"Palau Time\"}]', '{\"kr\":\"팔라우\",\"pt-BR\":\"Palau\",\"pt\":\"Palau\",\"nl\":\"Palau\",\"hr\":\"Palau\",\"fa\":\"پالائو\",\"de\":\"Palau\",\"es\":\"Palau\",\"fr\":\"Palaos\",\"ja\":\"パラオ\",\"it\":\"Palau\",\"cn\":\"帕劳\",\"tr\":\"Palau\"}', '7.50000000', '134.50000000', '🇵🇼', 'U+1F1F5 U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q695'),
(169, 'Palestinian Territory Occupied', 'PSE', '275', 'PS', '970', 'East Jerusalem', 'ILS', 'Israeli new shekel', '₪', '.ps', 'فلسطين', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Gaza\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Asia/Hebron\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"팔레스타인 영토\",\"pt-BR\":\"Palestina\",\"pt\":\"Palestina\",\"nl\":\"Palestijnse gebieden\",\"hr\":\"Palestina\",\"fa\":\"فلسطین\",\"de\":\"Palästina\",\"es\":\"Palestina\",\"fr\":\"Palestine\",\"ja\":\"パレスチナ\",\"it\":\"Palestina\",\"cn\":\"巴勒斯坦\",\"tr\":\"Filistin\"}', '31.90000000', '35.20000000', '🇵🇸', 'U+1F1F5 U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(170, 'Panama', 'PAN', '591', 'PA', '507', 'Panama City', 'PAB', 'Panamanian balboa', 'B/.', '.pa', 'Panamá', 'Americas', 'Central America', '[{\"zoneName\":\"America/Panama\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"파나마\",\"pt-BR\":\"Panamá\",\"pt\":\"Panamá\",\"nl\":\"Panama\",\"hr\":\"Panama\",\"fa\":\"پاناما\",\"de\":\"Panama\",\"es\":\"Panamá\",\"fr\":\"Panama\",\"ja\":\"パナマ\",\"it\":\"Panama\",\"cn\":\"巴拿马\",\"tr\":\"Panama\"}', '9.00000000', '-80.00000000', '🇵🇦', 'U+1F1F5 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q804'),
(171, 'Papua new Guinea', 'PNG', '598', 'PG', '675', 'Port Moresby', 'PGK', 'Papua New Guinean kina', 'K', '.pg', 'Papua Niugini', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Bougainville\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"BST\",\"tzName\":\"Bougainville Standard Time[6\"},{\"zoneName\":\"Pacific/Port_Moresby\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"PGT\",\"tzName\":\"Papua New Guinea Time\"}]', '{\"kr\":\"파푸아뉴기니\",\"pt-BR\":\"Papua Nova Guiné\",\"pt\":\"Papua Nova Guiné\",\"nl\":\"Papoea-Nieuw-Guinea\",\"hr\":\"Papua Nova Gvineja\",\"fa\":\"پاپوآ گینه نو\",\"de\":\"Papua-Neuguinea\",\"es\":\"Papúa Nueva Guinea\",\"fr\":\"Papouasie-Nouvelle-Guinée\",\"ja\":\"パプアニューギニア\",\"it\":\"Papua Nuova Guinea\",\"cn\":\"巴布亚新几内亚\",\"tr\":\"Papua Yeni Gine\"}', '-6.00000000', '147.00000000', '🇵🇬', 'U+1F1F5 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q691'),
(172, 'Paraguay', 'PRY', '600', 'PY', '595', 'Asuncion', 'PYG', 'Paraguayan guarani', '₲', '.py', 'Paraguay', 'Americas', 'South America', '[{\"zoneName\":\"America/Asuncion\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"PYST\",\"tzName\":\"Paraguay Summer Time\"}]', '{\"kr\":\"파라과이\",\"pt-BR\":\"Paraguai\",\"pt\":\"Paraguai\",\"nl\":\"Paraguay\",\"hr\":\"Paragvaj\",\"fa\":\"پاراگوئه\",\"de\":\"Paraguay\",\"es\":\"Paraguay\",\"fr\":\"Paraguay\",\"ja\":\"パラグアイ\",\"it\":\"Paraguay\",\"cn\":\"巴拉圭\",\"tr\":\"Paraguay\"}', '-23.00000000', '-58.00000000', '🇵🇾', 'U+1F1F5 U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q733'),
(173, 'Peru', 'PER', '604', 'PE', '51', 'Lima', 'PEN', 'Peruvian sol', 'S/.', '.pe', 'Perú', 'Americas', 'South America', '[{\"zoneName\":\"America/Lima\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"PET\",\"tzName\":\"Peru Time\"}]', '{\"kr\":\"페루\",\"pt-BR\":\"Peru\",\"pt\":\"Peru\",\"nl\":\"Peru\",\"hr\":\"Peru\",\"fa\":\"پرو\",\"de\":\"Peru\",\"es\":\"Perú\",\"fr\":\"Pérou\",\"ja\":\"ペルー\",\"it\":\"Perù\",\"cn\":\"秘鲁\",\"tr\":\"Peru\"}', '-10.00000000', '-76.00000000', '🇵🇪', 'U+1F1F5 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q419'),
(174, 'Philippines', 'PHL', '608', 'PH', '63', 'Manila', 'PHP', 'Philippine peso', '₱', '.ph', 'Pilipinas', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Manila\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"PHT\",\"tzName\":\"Philippine Time\"}]', '{\"kr\":\"필리핀\",\"pt-BR\":\"Filipinas\",\"pt\":\"Filipinas\",\"nl\":\"Filipijnen\",\"hr\":\"Filipini\",\"fa\":\"جزایر الندفیلیپین\",\"de\":\"Philippinen\",\"es\":\"Filipinas\",\"fr\":\"Philippines\",\"ja\":\"フィリピン\",\"it\":\"Filippine\",\"cn\":\"菲律宾\",\"tr\":\"Filipinler\"}', '13.00000000', '122.00000000', '🇵🇭', 'U+1F1F5 U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q928'),
(175, 'Pitcairn Island', 'PCN', '612', 'PN', '870', 'Adamstown', 'NZD', 'New Zealand dollar', '$', '.pn', 'Pitcairn Islands', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Pitcairn\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"}]', '{\"kr\":\"핏케언 제도\",\"pt-BR\":\"Ilhas Pitcairn\",\"pt\":\"Ilhas Picárnia\",\"nl\":\"Pitcairneilanden\",\"hr\":\"Pitcairnovo otočje\",\"fa\":\"پیتکرن\",\"de\":\"Pitcairn\",\"es\":\"Islas Pitcairn\",\"fr\":\"Îles Pitcairn\",\"ja\":\"ピトケアン\",\"it\":\"Isole Pitcairn\",\"cn\":\"皮特凯恩群岛\",\"tr\":\"Pitcairn Adalari\"}', '-25.06666666', '-130.10000000', '🇵🇳', 'U+1F1F5 U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(176, 'Poland', 'POL', '616', 'PL', '48', 'Warsaw', 'PLN', 'Polish złoty', 'zł', '.pl', 'Polska', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Warsaw\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"폴란드\",\"pt-BR\":\"Polônia\",\"pt\":\"Polónia\",\"nl\":\"Polen\",\"hr\":\"Poljska\",\"fa\":\"لهستان\",\"de\":\"Polen\",\"es\":\"Polonia\",\"fr\":\"Pologne\",\"ja\":\"ポーランド\",\"it\":\"Polonia\",\"cn\":\"波兰\",\"tr\":\"Polonya\"}', '52.00000000', '20.00000000', '🇵🇱', 'U+1F1F5 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q36'),
(177, 'Portugal', 'PRT', '620', 'PT', '351', 'Lisbon', 'EUR', 'Euro', '€', '.pt', 'Portugal', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Atlantic/Azores\",\"gmtOffset\":-3600,\"gmtOffsetName\":\"UTC-01:00\",\"abbreviation\":\"AZOT\",\"tzName\":\"Azores Standard Time\"},{\"zoneName\":\"Atlantic/Madeira\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"},{\"zoneName\":\"Europe/Lisbon\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"}]', '{\"kr\":\"포르투갈\",\"pt-BR\":\"Portugal\",\"pt\":\"Portugal\",\"nl\":\"Portugal\",\"hr\":\"Portugal\",\"fa\":\"پرتغال\",\"de\":\"Portugal\",\"es\":\"Portugal\",\"fr\":\"Portugal\",\"ja\":\"ポルトガル\",\"it\":\"Portogallo\",\"cn\":\"葡萄牙\",\"tr\":\"Portekiz\"}', '39.50000000', '-8.00000000', '🇵🇹', 'U+1F1F5 U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q45'),
(178, 'Puerto Rico', 'PRI', '630', 'PR', '+1-787 and 1-939', 'San Juan', 'USD', 'United States dollar', '$', '.pr', 'Puerto Rico', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Puerto_Rico\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"푸에르토리코\",\"pt-BR\":\"Porto Rico\",\"pt\":\"Porto Rico\",\"nl\":\"Puerto Rico\",\"hr\":\"Portoriko\",\"fa\":\"پورتو ریکو\",\"de\":\"Puerto Rico\",\"es\":\"Puerto Rico\",\"fr\":\"Porto Rico\",\"ja\":\"プエルトリコ\",\"it\":\"Porto Rico\",\"cn\":\"波多黎各\",\"tr\":\"Porto Riko\"}', '18.25000000', '-66.50000000', '🇵🇷', 'U+1F1F5 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(179, 'Qatar', 'QAT', '634', 'QA', '974', 'Doha', 'QAR', 'Qatari riyal', 'ق.ر', '.qa', 'قطر', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Qatar\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"카타르\",\"pt-BR\":\"Catar\",\"pt\":\"Catar\",\"nl\":\"Qatar\",\"hr\":\"Katar\",\"fa\":\"قطر\",\"de\":\"Katar\",\"es\":\"Catar\",\"fr\":\"Qatar\",\"ja\":\"カタール\",\"it\":\"Qatar\",\"cn\":\"卡塔尔\",\"tr\":\"Katar\"}', '25.50000000', '51.25000000', '🇶🇦', 'U+1F1F6 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q846'),
(180, 'Reunion', 'REU', '638', 'RE', '262', 'Saint-Denis', 'EUR', 'Euro', '€', '.re', 'La Réunion', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Reunion\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"RET\",\"tzName\":\"Réunion Time\"}]', '{\"kr\":\"레위니옹\",\"pt-BR\":\"Reunião\",\"pt\":\"Reunião\",\"nl\":\"Réunion\",\"hr\":\"Réunion\",\"fa\":\"رئونیون\",\"de\":\"Réunion\",\"es\":\"Reunión\",\"fr\":\"Réunion\",\"ja\":\"レユニオン\",\"it\":\"Riunione\",\"cn\":\"留尼汪岛\",\"tr\":\"Réunion\"}', '-21.15000000', '55.50000000', '🇷🇪', 'U+1F1F7 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(181, 'Romania', 'ROU', '642', 'RO', '40', 'Bucharest', 'RON', 'Romanian leu', 'lei', '.ro', 'România', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Bucharest\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"루마니아\",\"pt-BR\":\"Romênia\",\"pt\":\"Roménia\",\"nl\":\"Roemenië\",\"hr\":\"Rumunjska\",\"fa\":\"رومانی\",\"de\":\"Rumänien\",\"es\":\"Rumania\",\"fr\":\"Roumanie\",\"ja\":\"ルーマニア\",\"it\":\"Romania\",\"cn\":\"罗马尼亚\",\"tr\":\"Romanya\"}', '46.00000000', '25.00000000', '🇷🇴', 'U+1F1F7 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q218'),
(182, 'Russia', 'RUS', '643', 'RU', '7', 'Moscow', 'RUB', 'Russian ruble', '₽', '.ru', 'Россия', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Asia/Anadyr\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"ANAT\",\"tzName\":\"Anadyr Time[4\"},{\"zoneName\":\"Asia/Barnaul\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"KRAT\",\"tzName\":\"Krasnoyarsk Time\"},{\"zoneName\":\"Asia/Chita\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"YAKT\",\"tzName\":\"Yakutsk Time\"},{\"zoneName\":\"Asia/Irkutsk\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"IRKT\",\"tzName\":\"Irkutsk Time\"},{\"zoneName\":\"Asia/Kamchatka\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"PETT\",\"tzName\":\"Kamchatka Time\"},{\"zoneName\":\"Asia/Khandyga\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"YAKT\",\"tzName\":\"Yakutsk Time\"},{\"zoneName\":\"Asia/Krasnoyarsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"KRAT\",\"tzName\":\"Krasnoyarsk Time\"},{\"zoneName\":\"Asia/Magadan\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"MAGT\",\"tzName\":\"Magadan Time\"},{\"zoneName\":\"Asia/Novokuznetsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"KRAT\",\"tzName\":\"Krasnoyarsk Time\"},{\"zoneName\":\"Asia/Novosibirsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"NOVT\",\"tzName\":\"Novosibirsk Time\"},{\"zoneName\":\"Asia/Omsk\",\"gmtOffset\":21600,\"gmtOffsetName\":\"UTC+06:00\",\"abbreviation\":\"OMST\",\"tzName\":\"Omsk Time\"},{\"zoneName\":\"Asia/Sakhalin\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"SAKT\",\"tzName\":\"Sakhalin Island Time\"},{\"zoneName\":\"Asia/Srednekolymsk\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"SRET\",\"tzName\":\"Srednekolymsk Time\"},{\"zoneName\":\"Asia/Tomsk\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"MSD+3\",\"tzName\":\"Moscow Daylight Time+3\"},{\"zoneName\":\"Asia/Ust-Nera\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"VLAT\",\"tzName\":\"Vladivostok Time\"},{\"zoneName\":\"Asia/Vladivostok\",\"gmtOffset\":36000,\"gmtOffsetName\":\"UTC+10:00\",\"abbreviation\":\"VLAT\",\"tzName\":\"Vladivostok Time\"},{\"zoneName\":\"Asia/Yakutsk\",\"gmtOffset\":32400,\"gmtOffsetName\":\"UTC+09:00\",\"abbreviation\":\"YAKT\",\"tzName\":\"Yakutsk Time\"},{\"zoneName\":\"Asia/Yekaterinburg\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"YEKT\",\"tzName\":\"Yekaterinburg Time\"},{\"zoneName\":\"Europe/Astrakhan\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SAMT\",\"tzName\":\"Samara Time\"},{\"zoneName\":\"Europe/Kaliningrad\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Europe/Kirov\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"},{\"zoneName\":\"Europe/Moscow\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"},{\"zoneName\":\"Europe/Samara\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SAMT\",\"tzName\":\"Samara Time\"},{\"zoneName\":\"Europe/Saratov\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"MSD\",\"tzName\":\"Moscow Daylight Time+4\"},{\"zoneName\":\"Europe/Ulyanovsk\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SAMT\",\"tzName\":\"Samara Time\"},{\"zoneName\":\"Europe/Volgograd\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Standard Time\"}]', '{\"kr\":\"러시아\",\"pt-BR\":\"Rússia\",\"pt\":\"Rússia\",\"nl\":\"Rusland\",\"hr\":\"Rusija\",\"fa\":\"روسیه\",\"de\":\"Russland\",\"es\":\"Rusia\",\"fr\":\"Russie\",\"ja\":\"ロシア連邦\",\"it\":\"Russia\",\"cn\":\"俄罗斯联邦\",\"tr\":\"Rusya\"}', '60.00000000', '100.00000000', '🇷🇺', 'U+1F1F7 U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q159'),
(183, 'Rwanda', 'RWA', '646', 'RW', '250', 'Kigali', 'RWF', 'Rwandan franc', 'FRw', '.rw', 'Rwanda', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Kigali\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"르완다\",\"pt-BR\":\"Ruanda\",\"pt\":\"Ruanda\",\"nl\":\"Rwanda\",\"hr\":\"Ruanda\",\"fa\":\"رواندا\",\"de\":\"Ruanda\",\"es\":\"Ruanda\",\"fr\":\"Rwanda\",\"ja\":\"ルワンダ\",\"it\":\"Ruanda\",\"cn\":\"卢旺达\",\"tr\":\"Ruanda\"}', '-2.00000000', '30.00000000', '🇷🇼', 'U+1F1F7 U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q1037'),
(184, 'Saint Helena', 'SHN', '654', 'SH', '290', 'Jamestown', 'SHP', 'Saint Helena pound', '£', '.sh', 'Saint Helena', 'Africa', 'Western Africa', '[{\"zoneName\":\"Atlantic/St_Helena\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"세인트헬레나\",\"pt-BR\":\"Santa Helena\",\"pt\":\"Santa Helena\",\"nl\":\"Sint-Helena\",\"hr\":\"Sveta Helena\",\"fa\":\"سنت هلنا، اسنشن و تریستان دا کونا\",\"de\":\"Sankt Helena\",\"es\":\"Santa Helena\",\"fr\":\"Sainte-Hélène\",\"ja\":\"セントヘレナ・アセンションおよびトリスタンダクーニャ\",\"it\":\"Sant\'Elena\",\"cn\":\"圣赫勒拿\",\"tr\":\"Saint Helena\"}', '-15.95000000', '-5.70000000', '🇸🇭', 'U+1F1F8 U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(185, 'Saint Kitts And Nevis', 'KNA', '659', 'KN', '+1-869', 'Basseterre', 'XCD', 'Eastern Caribbean dollar', '$', '.kn', 'Saint Kitts and Nevis', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Kitts\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트키츠 네비스\",\"pt-BR\":\"São Cristóvão e Neves\",\"pt\":\"São Cristóvão e Neves\",\"nl\":\"Saint Kitts en Nevis\",\"hr\":\"Sveti Kristof i Nevis\",\"fa\":\"سنت کیتس و نویس\",\"de\":\"St. Kitts und Nevis\",\"es\":\"San Cristóbal y Nieves\",\"fr\":\"Saint-Christophe-et-Niévès\",\"ja\":\"セントクリストファー・ネイビス\",\"it\":\"Saint Kitts e Nevis\",\"cn\":\"圣基茨和尼维斯\",\"tr\":\"Saint Kitts Ve Nevis\"}', '17.33333333', '-62.75000000', '🇰🇳', 'U+1F1F0 U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q763'),
(186, 'Saint Lucia', 'LCA', '662', 'LC', '+1-758', 'Castries', 'XCD', 'Eastern Caribbean dollar', '$', '.lc', 'Saint Lucia', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Lucia\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트루시아\",\"pt-BR\":\"Santa Lúcia\",\"pt\":\"Santa Lúcia\",\"nl\":\"Saint Lucia\",\"hr\":\"Sveta Lucija\",\"fa\":\"سنت لوسیا\",\"de\":\"Saint Lucia\",\"es\":\"Santa Lucía\",\"fr\":\"Saint-Lucie\",\"ja\":\"セントルシア\",\"it\":\"Santa Lucia\",\"cn\":\"圣卢西亚\",\"tr\":\"Saint Lucia\"}', '13.88333333', '-60.96666666', '🇱🇨', 'U+1F1F1 U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, 'Q760'),
(187, 'Saint Pierre and Miquelon', 'SPM', '666', 'PM', '508', 'Saint-Pierre', 'EUR', 'Euro', '€', '.pm', 'Saint-Pierre-et-Miquelon', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Miquelon\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"PMDT\",\"tzName\":\"Pierre & Miquelon Daylight Time\"}]', '{\"kr\":\"생피에르 미클롱\",\"pt-BR\":\"Saint-Pierre e Miquelon\",\"pt\":\"São Pedro e Miquelon\",\"nl\":\"Saint Pierre en Miquelon\",\"hr\":\"Sveti Petar i Mikelon\",\"fa\":\"سن پیر و میکلن\",\"de\":\"Saint-Pierre und Miquelon\",\"es\":\"San Pedro y Miquelón\",\"fr\":\"Saint-Pierre-et-Miquelon\",\"ja\":\"サンピエール島・ミクロン島\",\"it\":\"Saint-Pierre e Miquelon\",\"cn\":\"圣皮埃尔和密克隆\",\"tr\":\"Saint Pierre Ve Miquelon\"}', '46.83333333', '-56.33333333', '🇵🇲', 'U+1F1F5 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:32:07', 1, NULL),
(188, 'Saint Vincent And The Grenadines', 'VCT', '670', 'VC', '+1-784', 'Kingstown', 'XCD', 'Eastern Caribbean dollar', '$', '.vc', 'Saint Vincent and the Grenadines', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Vincent\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트빈센트 그레나딘\",\"pt-BR\":\"São Vicente e Granadinas\",\"pt\":\"São Vicente e Granadinas\",\"nl\":\"Saint Vincent en de Grenadines\",\"hr\":\"Sveti Vincent i Grenadini\",\"fa\":\"سنت وینسنت و گرنادین‌ها\",\"de\":\"Saint Vincent und die Grenadinen\",\"es\":\"San Vicente y Granadinas\",\"fr\":\"Saint-Vincent-et-les-Grenadines\",\"ja\":\"セントビンセントおよびグレナディーン諸島\",\"it\":\"Saint Vincent e Grenadine\",\"cn\":\"圣文森特和格林纳丁斯\",\"tr\":\"Saint Vincent Ve Grenadinler\"}', '13.25000000', '-61.20000000', '🇻🇨', 'U+1F1FB U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q757');
INSERT INTO `countries` (`id`, `name`, `iso3`, `numeric_code`, `iso2`, `phonecode`, `capital`, `currency`, `currency_name`, `currency_symbol`, `tld`, `native`, `region`, `subregion`, `timezones`, `translations`, `latitude`, `longitude`, `emoji`, `emojiU`, `created_at`, `updated_at`, `flag`, `wikiDataId`) VALUES
(189, 'Saint-Barthelemy', 'BLM', '652', 'BL', '590', 'Gustavia', 'EUR', 'Euro', '€', '.bl', 'Saint-Barthélemy', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Barthelemy\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"생바르텔레미\",\"pt-BR\":\"São Bartolomeu\",\"pt\":\"São Bartolomeu\",\"nl\":\"Saint Barthélemy\",\"hr\":\"Saint Barthélemy\",\"fa\":\"سن-بارتلمی\",\"de\":\"Saint-Barthélemy\",\"es\":\"San Bartolomé\",\"fr\":\"Saint-Barthélemy\",\"ja\":\"サン・バルテルミー\",\"it\":\"Antille Francesi\",\"cn\":\"圣巴泰勒米\",\"tr\":\"Saint Barthélemy\"}', '18.50000000', '-63.41666666', '🇧🇱', 'U+1F1E7 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(190, 'Saint-Martin (French part)', 'MAF', '663', 'MF', '590', 'Marigot', 'EUR', 'Euro', '€', '.mf', 'Saint-Martin', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Marigot\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"세인트마틴 섬\",\"pt-BR\":\"Saint Martin\",\"pt\":\"Ilha São Martinho\",\"nl\":\"Saint-Martin\",\"hr\":\"Sveti Martin\",\"fa\":\"سینت مارتن\",\"de\":\"Saint Martin\",\"es\":\"Saint Martin\",\"fr\":\"Saint-Martin\",\"ja\":\"サン・マルタン（フランス領）\",\"it\":\"Saint Martin\",\"cn\":\"密克罗尼西亚\",\"tr\":\"Saint Martin\"}', '18.08333333', '-63.95000000', '🇲🇫', 'U+1F1F2 U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(191, 'Samoa', 'WSM', '882', 'WS', '685', 'Apia', 'WST', 'Samoan tālā', 'SAT', '.ws', 'Samoa', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Apia\",\"gmtOffset\":50400,\"gmtOffsetName\":\"UTC+14:00\",\"abbreviation\":\"WST\",\"tzName\":\"West Samoa Time\"}]', '{\"kr\":\"사모아\",\"pt-BR\":\"Samoa\",\"pt\":\"Samoa\",\"nl\":\"Samoa\",\"hr\":\"Samoa\",\"fa\":\"ساموآ\",\"de\":\"Samoa\",\"es\":\"Samoa\",\"fr\":\"Samoa\",\"ja\":\"サモア\",\"it\":\"Samoa\",\"cn\":\"萨摩亚\",\"tr\":\"Samoa\"}', '-13.58333333', '-172.33333333', '🇼🇸', 'U+1F1FC U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q683'),
(192, 'San Marino', 'SMR', '674', 'SM', '378', 'San Marino', 'EUR', 'Euro', '€', '.sm', 'San Marino', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/San_Marino\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"산마리노\",\"pt-BR\":\"San Marino\",\"pt\":\"São Marinho\",\"nl\":\"San Marino\",\"hr\":\"San Marino\",\"fa\":\"سان مارینو\",\"de\":\"San Marino\",\"es\":\"San Marino\",\"fr\":\"Saint-Marin\",\"ja\":\"サンマリノ\",\"it\":\"San Marino\",\"cn\":\"圣马力诺\",\"tr\":\"San Marino\"}', '43.76666666', '12.41666666', '🇸🇲', 'U+1F1F8 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q238'),
(193, 'Sao Tome and Principe', 'STP', '678', 'ST', '239', 'Sao Tome', 'STD', 'Dobra', 'Db', '.st', 'São Tomé e Príncipe', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Sao_Tome\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"상투메 프린시페\",\"pt-BR\":\"São Tomé e Príncipe\",\"pt\":\"São Tomé e Príncipe\",\"nl\":\"Sao Tomé en Principe\",\"hr\":\"Sveti Toma i Princip\",\"fa\":\"کواترو دو فرویرو\",\"de\":\"São Tomé und Príncipe\",\"es\":\"Santo Tomé y Príncipe\",\"fr\":\"Sao Tomé-et-Principe\",\"ja\":\"サントメ・プリンシペ\",\"it\":\"São Tomé e Príncipe\",\"cn\":\"圣多美和普林西比\",\"tr\":\"Sao Tome Ve Prinsipe\"}', '1.00000000', '7.00000000', '🇸🇹', 'U+1F1F8 U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1039'),
(194, 'Saudi Arabia', 'SAU', '682', 'SA', '966', 'Riyadh', 'SAR', 'Saudi riyal', '﷼', '.sa', 'المملكة العربية السعودية', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Riyadh\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"사우디아라비아\",\"pt-BR\":\"Arábia Saudita\",\"pt\":\"Arábia Saudita\",\"nl\":\"Saoedi-Arabië\",\"hr\":\"Saudijska Arabija\",\"fa\":\"عربستان سعودی\",\"de\":\"Saudi-Arabien\",\"es\":\"Arabia Saudí\",\"fr\":\"Arabie Saoudite\",\"ja\":\"サウジアラビア\",\"it\":\"Arabia Saudita\",\"cn\":\"沙特阿拉伯\",\"tr\":\"Suudi Arabistan\"}', '25.00000000', '45.00000000', '🇸🇦', 'U+1F1F8 U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q851'),
(195, 'Senegal', 'SEN', '686', 'SN', '221', 'Dakar', 'XOF', 'West African CFA franc', 'CFA', '.sn', 'Sénégal', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Dakar\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"세네갈\",\"pt-BR\":\"Senegal\",\"pt\":\"Senegal\",\"nl\":\"Senegal\",\"hr\":\"Senegal\",\"fa\":\"سنگال\",\"de\":\"Senegal\",\"es\":\"Senegal\",\"fr\":\"Sénégal\",\"ja\":\"セネガル\",\"it\":\"Senegal\",\"cn\":\"塞内加尔\",\"tr\":\"Senegal\"}', '14.00000000', '-14.00000000', '🇸🇳', 'U+1F1F8 U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1041'),
(196, 'Serbia', 'SRB', '688', 'RS', '381', 'Belgrade', 'RSD', 'Serbian dinar', 'din', '.rs', 'Србија', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Belgrade\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"세르비아\",\"pt-BR\":\"Sérvia\",\"pt\":\"Sérvia\",\"nl\":\"Servië\",\"hr\":\"Srbija\",\"fa\":\"صربستان\",\"de\":\"Serbien\",\"es\":\"Serbia\",\"fr\":\"Serbie\",\"ja\":\"セルビア\",\"it\":\"Serbia\",\"cn\":\"塞尔维亚\",\"tr\":\"Sirbistan\"}', '44.00000000', '21.00000000', '🇷🇸', 'U+1F1F7 U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q403'),
(197, 'Seychelles', 'SYC', '690', 'SC', '248', 'Victoria', 'SCR', 'Seychellois rupee', 'SRe', '.sc', 'Seychelles', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Indian/Mahe\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"SCT\",\"tzName\":\"Seychelles Time\"}]', '{\"kr\":\"세이셸\",\"pt-BR\":\"Seicheles\",\"pt\":\"Seicheles\",\"nl\":\"Seychellen\",\"hr\":\"Sejšeli\",\"fa\":\"سیشل\",\"de\":\"Seychellen\",\"es\":\"Seychelles\",\"fr\":\"Seychelles\",\"ja\":\"セーシェル\",\"it\":\"Seychelles\",\"cn\":\"塞舌尔\",\"tr\":\"Seyşeller\"}', '-4.58333333', '55.66666666', '🇸🇨', 'U+1F1F8 U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1042'),
(198, 'Sierra Leone', 'SLE', '694', 'SL', '232', 'Freetown', 'SLL', 'Sierra Leonean leone', 'Le', '.sl', 'Sierra Leone', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Freetown\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"시에라리온\",\"pt-BR\":\"Serra Leoa\",\"pt\":\"Serra Leoa\",\"nl\":\"Sierra Leone\",\"hr\":\"Sijera Leone\",\"fa\":\"سیرالئون\",\"de\":\"Sierra Leone\",\"es\":\"Sierra Leone\",\"fr\":\"Sierra Leone\",\"ja\":\"シエラレオネ\",\"it\":\"Sierra Leone\",\"cn\":\"塞拉利昂\",\"tr\":\"Sierra Leone\"}', '8.50000000', '-11.50000000', '🇸🇱', 'U+1F1F8 U+1F1F1', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1044'),
(199, 'Singapore', 'SGP', '702', 'SG', '65', 'Singapur', 'SGD', 'Singapore dollar', '$', '.sg', 'Singapore', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Singapore\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"SGT\",\"tzName\":\"Singapore Time\"}]', '{\"kr\":\"싱가포르\",\"pt-BR\":\"Singapura\",\"pt\":\"Singapura\",\"nl\":\"Singapore\",\"hr\":\"Singapur\",\"fa\":\"سنگاپور\",\"de\":\"Singapur\",\"es\":\"Singapur\",\"fr\":\"Singapour\",\"ja\":\"シンガポール\",\"it\":\"Singapore\",\"cn\":\"新加坡\",\"tr\":\"Singapur\"}', '1.36666666', '103.80000000', '🇸🇬', 'U+1F1F8 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q334'),
(200, 'Slovakia', 'SVK', '703', 'SK', '421', 'Bratislava', 'EUR', 'Euro', '€', '.sk', 'Slovensko', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Bratislava\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"슬로바키아\",\"pt-BR\":\"Eslováquia\",\"pt\":\"Eslováquia\",\"nl\":\"Slowakije\",\"hr\":\"Slovačka\",\"fa\":\"اسلواکی\",\"de\":\"Slowakei\",\"es\":\"República Eslovaca\",\"fr\":\"Slovaquie\",\"ja\":\"スロバキア\",\"it\":\"Slovacchia\",\"cn\":\"斯洛伐克\",\"tr\":\"Slovakya\"}', '48.66666666', '19.50000000', '🇸🇰', 'U+1F1F8 U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q214'),
(201, 'Slovenia', 'SVN', '705', 'SI', '386', 'Ljubljana', 'EUR', 'Euro', '€', '.si', 'Slovenija', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Ljubljana\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"슬로베니아\",\"pt-BR\":\"Eslovênia\",\"pt\":\"Eslovénia\",\"nl\":\"Slovenië\",\"hr\":\"Slovenija\",\"fa\":\"اسلوونی\",\"de\":\"Slowenien\",\"es\":\"Eslovenia\",\"fr\":\"Slovénie\",\"ja\":\"スロベニア\",\"it\":\"Slovenia\",\"cn\":\"斯洛文尼亚\",\"tr\":\"Slovenya\"}', '46.11666666', '14.81666666', '🇸🇮', 'U+1F1F8 U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q215'),
(202, 'Solomon Islands', 'SLB', '090', 'SB', '677', 'Honiara', 'SBD', 'Solomon Islands dollar', 'Si$', '.sb', 'Solomon Islands', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Guadalcanal\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"SBT\",\"tzName\":\"Solomon Islands Time\"}]', '{\"kr\":\"솔로몬 제도\",\"pt-BR\":\"Ilhas Salomão\",\"pt\":\"Ilhas Salomão\",\"nl\":\"Salomonseilanden\",\"hr\":\"Solomonski Otoci\",\"fa\":\"جزایر سلیمان\",\"de\":\"Salomonen\",\"es\":\"Islas Salomón\",\"fr\":\"Îles Salomon\",\"ja\":\"ソロモン諸島\",\"it\":\"Isole Salomone\",\"cn\":\"所罗门群岛\",\"tr\":\"Solomon Adalari\"}', '-8.00000000', '159.00000000', '🇸🇧', 'U+1F1F8 U+1F1E7', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q685'),
(203, 'Somalia', 'SOM', '706', 'SO', '252', 'Mogadishu', 'SOS', 'Somali shilling', 'Sh.so.', '.so', 'Soomaaliya', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Mogadishu\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"소말리아\",\"pt-BR\":\"Somália\",\"pt\":\"Somália\",\"nl\":\"Somalië\",\"hr\":\"Somalija\",\"fa\":\"سومالی\",\"de\":\"Somalia\",\"es\":\"Somalia\",\"fr\":\"Somalie\",\"ja\":\"ソマリア\",\"it\":\"Somalia\",\"cn\":\"索马里\",\"tr\":\"Somali\"}', '10.00000000', '49.00000000', '🇸🇴', 'U+1F1F8 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1045'),
(204, 'South Africa', 'ZAF', '710', 'ZA', '27', 'Pretoria', 'ZAR', 'South African rand', 'R', '.za', 'South Africa', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Johannesburg\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"SAST\",\"tzName\":\"South African Standard Time\"}]', '{\"kr\":\"남아프리카 공화국\",\"pt-BR\":\"República Sul-Africana\",\"pt\":\"República Sul-Africana\",\"nl\":\"Zuid-Afrika\",\"hr\":\"Južnoafrička Republika\",\"fa\":\"آفریقای جنوبی\",\"de\":\"Republik Südafrika\",\"es\":\"República de Sudáfrica\",\"fr\":\"Afrique du Sud\",\"ja\":\"南アフリカ\",\"it\":\"Sud Africa\",\"cn\":\"南非\",\"tr\":\"Güney Afrika Cumhuriyeti\"}', '-29.00000000', '24.00000000', '🇿🇦', 'U+1F1FF U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q258'),
(205, 'South Georgia', 'SGS', '239', 'GS', '500', 'Grytviken', 'GBP', 'British pound', '£', '.gs', 'South Georgia', 'Americas', 'South America', '[{\"zoneName\":\"Atlantic/South_Georgia\",\"gmtOffset\":-7200,\"gmtOffsetName\":\"UTC-02:00\",\"abbreviation\":\"GST\",\"tzName\":\"South Georgia and the South Sandwich Islands Time\"}]', '{\"kr\":\"사우스조지아\",\"pt-BR\":\"Ilhas Geórgias do Sul e Sandwich do Sul\",\"pt\":\"Ilhas Geórgia do Sul e Sanduíche do Sul\",\"nl\":\"Zuid-Georgia en Zuidelijke Sandwicheilanden\",\"hr\":\"Južna Georgija i otočje Južni Sandwich\",\"fa\":\"جزایر جورجیای جنوبی و ساندویچ جنوبی\",\"de\":\"Südgeorgien und die Südlichen Sandwichinseln\",\"es\":\"Islas Georgias del Sur y Sandwich del Sur\",\"fr\":\"Géorgie du Sud-et-les Îles Sandwich du Sud\",\"ja\":\"サウスジョージア・サウスサンドウィッチ諸島\",\"it\":\"Georgia del Sud e Isole Sandwich Meridionali\",\"cn\":\"南乔治亚\",\"tr\":\"Güney Georgia\"}', '-54.50000000', '-37.00000000', '🇬🇸', 'U+1F1EC U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(206, 'South Sudan', 'SSD', '728', 'SS', '211', 'Juba', 'SSP', 'South Sudanese pound', '£', '.ss', 'South Sudan', 'Africa', 'Middle Africa', '[{\"zoneName\":\"Africa/Juba\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"남수단\",\"pt-BR\":\"Sudão do Sul\",\"pt\":\"Sudão do Sul\",\"nl\":\"Zuid-Soedan\",\"hr\":\"Južni Sudan\",\"fa\":\"سودان جنوبی\",\"de\":\"Südsudan\",\"es\":\"Sudán del Sur\",\"fr\":\"Soudan du Sud\",\"ja\":\"南スーダン\",\"it\":\"Sudan del sud\",\"cn\":\"南苏丹\",\"tr\":\"Güney Sudan\"}', '7.00000000', '30.00000000', '🇸🇸', 'U+1F1F8 U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q958'),
(207, 'Spain', 'ESP', '724', 'ES', '34', 'Madrid', 'EUR', 'Euro', '€', '.es', 'España', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Africa/Ceuta\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"},{\"zoneName\":\"Atlantic/Canary\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"WET\",\"tzName\":\"Western European Time\"},{\"zoneName\":\"Europe/Madrid\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스페인\",\"pt-BR\":\"Espanha\",\"pt\":\"Espanha\",\"nl\":\"Spanje\",\"hr\":\"Španjolska\",\"fa\":\"اسپانیا\",\"de\":\"Spanien\",\"es\":\"España\",\"fr\":\"Espagne\",\"ja\":\"スペイン\",\"it\":\"Spagna\",\"cn\":\"西班牙\",\"tr\":\"İspanya\"}', '40.00000000', '-4.00000000', '🇪🇸', 'U+1F1EA U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q29'),
(208, 'Sri Lanka', 'LKA', '144', 'LK', '94', 'Colombo', 'LKR', 'Sri Lankan rupee', 'Rs', '.lk', 'śrī laṃkāva', 'Asia', 'Southern Asia', '[{\"zoneName\":\"Asia/Colombo\",\"gmtOffset\":19800,\"gmtOffsetName\":\"UTC+05:30\",\"abbreviation\":\"IST\",\"tzName\":\"Indian Standard Time\"}]', '{\"kr\":\"스리랑카\",\"pt-BR\":\"Sri Lanka\",\"pt\":\"Sri Lanka\",\"nl\":\"Sri Lanka\",\"hr\":\"Šri Lanka\",\"fa\":\"سری‌لانکا\",\"de\":\"Sri Lanka\",\"es\":\"Sri Lanka\",\"fr\":\"Sri Lanka\",\"ja\":\"スリランカ\",\"it\":\"Sri Lanka\",\"cn\":\"斯里兰卡\",\"tr\":\"Sri Lanka\"}', '7.00000000', '81.00000000', '🇱🇰', 'U+1F1F1 U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q854'),
(209, 'Sudan', 'SDN', '729', 'SD', '249', 'Khartoum', 'SDG', 'Sudanese pound', '.س.ج', '.sd', 'السودان', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Khartoum\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EAT\",\"tzName\":\"Eastern African Time\"}]', '{\"kr\":\"수단\",\"pt-BR\":\"Sudão\",\"pt\":\"Sudão\",\"nl\":\"Soedan\",\"hr\":\"Sudan\",\"fa\":\"سودان\",\"de\":\"Sudan\",\"es\":\"Sudán\",\"fr\":\"Soudan\",\"ja\":\"スーダン\",\"it\":\"Sudan\",\"cn\":\"苏丹\",\"tr\":\"Sudan\"}', '15.00000000', '30.00000000', '🇸🇩', 'U+1F1F8 U+1F1E9', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1049'),
(210, 'Suriname', 'SUR', '740', 'SR', '597', 'Paramaribo', 'SRD', 'Surinamese dollar', '$', '.sr', 'Suriname', 'Americas', 'South America', '[{\"zoneName\":\"America/Paramaribo\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"SRT\",\"tzName\":\"Suriname Time\"}]', '{\"kr\":\"수리남\",\"pt-BR\":\"Suriname\",\"pt\":\"Suriname\",\"nl\":\"Suriname\",\"hr\":\"Surinam\",\"fa\":\"سورینام\",\"de\":\"Suriname\",\"es\":\"Surinam\",\"fr\":\"Surinam\",\"ja\":\"スリナム\",\"it\":\"Suriname\",\"cn\":\"苏里南\",\"tr\":\"Surinam\"}', '4.00000000', '-56.00000000', '🇸🇷', 'U+1F1F8 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q730'),
(211, 'Svalbard And Jan Mayen Islands', 'SJM', '744', 'SJ', '47', 'Longyearbyen', 'NOK', 'Norwegian Krone', 'kr', '.sj', 'Svalbard og Jan Mayen', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Arctic/Longyearbyen\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스발바르 얀마옌 제도\",\"pt-BR\":\"Svalbard\",\"pt\":\"Svalbard\",\"nl\":\"Svalbard en Jan Mayen\",\"hr\":\"Svalbard i Jan Mayen\",\"fa\":\"سوالبارد و یان ماین\",\"de\":\"Svalbard und Jan Mayen\",\"es\":\"Islas Svalbard y Jan Mayen\",\"fr\":\"Svalbard et Jan Mayen\",\"ja\":\"スヴァールバル諸島およびヤンマイエン島\",\"it\":\"Svalbard e Jan Mayen\",\"cn\":\"斯瓦尔巴和扬马延群岛\",\"tr\":\"Svalbard Ve Jan Mayen\"}', '78.00000000', '20.00000000', '🇸🇯', 'U+1F1F8 U+1F1EF', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(212, 'Swaziland', 'SWZ', '748', 'SZ', '268', 'Mbabane', 'SZL', 'Lilangeni', 'E', '.sz', 'Swaziland', 'Africa', 'Southern Africa', '[{\"zoneName\":\"Africa/Mbabane\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"SAST\",\"tzName\":\"South African Standard Time\"}]', '{\"kr\":\"에스와티니\",\"pt-BR\":\"Suazilândia\",\"pt\":\"Suazilândia\",\"nl\":\"Swaziland\",\"hr\":\"Svazi\",\"fa\":\"سوازیلند\",\"de\":\"Swasiland\",\"es\":\"Suazilandia\",\"fr\":\"Swaziland\",\"ja\":\"スワジランド\",\"it\":\"Swaziland\",\"cn\":\"斯威士兰\",\"tr\":\"Esvatini\"}', '-26.50000000', '31.50000000', '🇸🇿', 'U+1F1F8 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1050'),
(213, 'Sweden', 'SWE', '752', 'SE', '46', 'Stockholm', 'SEK', 'Swedish krona', 'kr', '.se', 'Sverige', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/Stockholm\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스웨덴\",\"pt-BR\":\"Suécia\",\"pt\":\"Suécia\",\"nl\":\"Zweden\",\"hr\":\"Švedska\",\"fa\":\"سوئد\",\"de\":\"Schweden\",\"es\":\"Suecia\",\"fr\":\"Suède\",\"ja\":\"スウェーデン\",\"it\":\"Svezia\",\"cn\":\"瑞典\",\"tr\":\"İsveç\"}', '62.00000000', '15.00000000', '🇸🇪', 'U+1F1F8 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q34'),
(214, 'Switzerland', 'CHE', '756', 'CH', '41', 'Bern', 'CHF', 'Swiss franc', 'CHf', '.ch', 'Schweiz', 'Europe', 'Western Europe', '[{\"zoneName\":\"Europe/Zurich\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"스위스\",\"pt-BR\":\"Suíça\",\"pt\":\"Suíça\",\"nl\":\"Zwitserland\",\"hr\":\"Švicarska\",\"fa\":\"سوئیس\",\"de\":\"Schweiz\",\"es\":\"Suiza\",\"fr\":\"Suisse\",\"ja\":\"スイス\",\"it\":\"Svizzera\",\"cn\":\"瑞士\",\"tr\":\"İsviçre\"}', '47.00000000', '8.00000000', '🇨🇭', 'U+1F1E8 U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q39'),
(215, 'Syria', 'SYR', '760', 'SY', '963', 'Damascus', 'SYP', 'Syrian pound', 'LS', '.sy', 'سوريا', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Damascus\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"시리아\",\"pt-BR\":\"Síria\",\"pt\":\"Síria\",\"nl\":\"Syrië\",\"hr\":\"Sirija\",\"fa\":\"سوریه\",\"de\":\"Syrien\",\"es\":\"Siria\",\"fr\":\"Syrie\",\"ja\":\"シリア・アラブ共和国\",\"it\":\"Siria\",\"cn\":\"叙利亚\",\"tr\":\"Suriye\"}', '35.00000000', '38.00000000', '🇸🇾', 'U+1F1F8 U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q858'),
(216, 'Taiwan', 'TWN', '158', 'TW', '886', 'Taipei', 'TWD', 'New Taiwan dollar', '$', '.tw', '臺灣', 'Asia', 'Eastern Asia', '[{\"zoneName\":\"Asia/Taipei\",\"gmtOffset\":28800,\"gmtOffsetName\":\"UTC+08:00\",\"abbreviation\":\"CST\",\"tzName\":\"China Standard Time\"}]', '{\"kr\":\"대만\",\"pt-BR\":\"Taiwan\",\"pt\":\"Taiwan\",\"nl\":\"Taiwan\",\"hr\":\"Tajvan\",\"fa\":\"تایوان\",\"de\":\"Taiwan\",\"es\":\"Taiwán\",\"fr\":\"Taïwan\",\"ja\":\"台湾（中華民国）\",\"it\":\"Taiwan\",\"cn\":\"中国台湾\",\"tr\":\"Tayvan\"}', '23.50000000', '121.00000000', '🇹🇼', 'U+1F1F9 U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q865'),
(217, 'Tajikistan', 'TJK', '762', 'TJ', '992', 'Dushanbe', 'TJS', 'Tajikistani somoni', 'SM', '.tj', 'Тоҷикистон', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Dushanbe\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TJT\",\"tzName\":\"Tajikistan Time\"}]', '{\"kr\":\"타지키스탄\",\"pt-BR\":\"Tajiquistão\",\"pt\":\"Tajiquistão\",\"nl\":\"Tadzjikistan\",\"hr\":\"Tađikistan\",\"fa\":\"تاجیکستان\",\"de\":\"Tadschikistan\",\"es\":\"Tayikistán\",\"fr\":\"Tadjikistan\",\"ja\":\"タジキスタン\",\"it\":\"Tagikistan\",\"cn\":\"塔吉克斯坦\",\"tr\":\"Tacikistan\"}', '39.00000000', '71.00000000', '🇹🇯', 'U+1F1F9 U+1F1EF', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q863'),
(218, 'Tanzania', 'TZA', '834', 'TZ', '255', 'Dodoma', 'TZS', 'Tanzanian shilling', 'TSh', '.tz', 'Tanzania', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Dar_es_Salaam\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"탄자니아\",\"pt-BR\":\"Tanzânia\",\"pt\":\"Tanzânia\",\"nl\":\"Tanzania\",\"hr\":\"Tanzanija\",\"fa\":\"تانزانیا\",\"de\":\"Tansania\",\"es\":\"Tanzania\",\"fr\":\"Tanzanie\",\"ja\":\"タンザニア\",\"it\":\"Tanzania\",\"cn\":\"坦桑尼亚\",\"tr\":\"Tanzanya\"}', '-6.00000000', '35.00000000', '🇹🇿', 'U+1F1F9 U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q924'),
(219, 'Thailand', 'THA', '764', 'TH', '66', 'Bangkok', 'THB', 'Thai baht', '฿', '.th', 'ประเทศไทย', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Bangkok\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"태국\",\"pt-BR\":\"Tailândia\",\"pt\":\"Tailândia\",\"nl\":\"Thailand\",\"hr\":\"Tajland\",\"fa\":\"تایلند\",\"de\":\"Thailand\",\"es\":\"Tailandia\",\"fr\":\"Thaïlande\",\"ja\":\"タイ\",\"it\":\"Tailandia\",\"cn\":\"泰国\",\"tr\":\"Tayland\"}', '15.00000000', '100.00000000', '🇹🇭', 'U+1F1F9 U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q869'),
(220, 'Togo', 'TGO', '768', 'TG', '228', 'Lome', 'XOF', 'West African CFA franc', 'CFA', '.tg', 'Togo', 'Africa', 'Western Africa', '[{\"zoneName\":\"Africa/Lome\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"토고\",\"pt-BR\":\"Togo\",\"pt\":\"Togo\",\"nl\":\"Togo\",\"hr\":\"Togo\",\"fa\":\"توگو\",\"de\":\"Togo\",\"es\":\"Togo\",\"fr\":\"Togo\",\"ja\":\"トーゴ\",\"it\":\"Togo\",\"cn\":\"多哥\",\"tr\":\"Togo\"}', '8.00000000', '1.16666666', '🇹🇬', 'U+1F1F9 U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q945'),
(221, 'Tokelau', 'TKL', '772', 'TK', '690', '', 'NZD', 'New Zealand dollar', '$', '.tk', 'Tokelau', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Fakaofo\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"TKT\",\"tzName\":\"Tokelau Time\"}]', '{\"kr\":\"토켈라우\",\"pt-BR\":\"Tokelau\",\"pt\":\"Toquelau\",\"nl\":\"Tokelau\",\"hr\":\"Tokelau\",\"fa\":\"توکلائو\",\"de\":\"Tokelau\",\"es\":\"Islas Tokelau\",\"fr\":\"Tokelau\",\"ja\":\"トケラウ\",\"it\":\"Isole Tokelau\",\"cn\":\"托克劳\",\"tr\":\"Tokelau\"}', '-9.00000000', '-172.00000000', '🇹🇰', 'U+1F1F9 U+1F1F0', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(222, 'Tonga', 'TON', '776', 'TO', '676', 'Nuku\'alofa', 'TOP', 'Tongan paʻanga', '$', '.to', 'Tonga', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Tongatapu\",\"gmtOffset\":46800,\"gmtOffsetName\":\"UTC+13:00\",\"abbreviation\":\"TOT\",\"tzName\":\"Tonga Time\"}]', '{\"kr\":\"통가\",\"pt-BR\":\"Tonga\",\"pt\":\"Tonga\",\"nl\":\"Tonga\",\"hr\":\"Tonga\",\"fa\":\"تونگا\",\"de\":\"Tonga\",\"es\":\"Tonga\",\"fr\":\"Tonga\",\"ja\":\"トンガ\",\"it\":\"Tonga\",\"cn\":\"汤加\",\"tr\":\"Tonga\"}', '-20.00000000', '-175.00000000', '🇹🇴', 'U+1F1F9 U+1F1F4', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q678'),
(223, 'Trinidad And Tobago', 'TTO', '780', 'TT', '+1-868', 'Port of Spain', 'TTD', 'Trinidad and Tobago dollar', '$', '.tt', 'Trinidad and Tobago', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Port_of_Spain\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"트리니다드 토바고\",\"pt-BR\":\"Trinidad e Tobago\",\"pt\":\"Trindade e Tobago\",\"nl\":\"Trinidad en Tobago\",\"hr\":\"Trinidad i Tobago\",\"fa\":\"ترینیداد و توباگو\",\"de\":\"Trinidad und Tobago\",\"es\":\"Trinidad y Tobago\",\"fr\":\"Trinité et Tobago\",\"ja\":\"トリニダード・トバゴ\",\"it\":\"Trinidad e Tobago\",\"cn\":\"特立尼达和多巴哥\",\"tr\":\"Trinidad Ve Tobago\"}', '11.00000000', '-61.00000000', '🇹🇹', 'U+1F1F9 U+1F1F9', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q754'),
(224, 'Tunisia', 'TUN', '788', 'TN', '216', 'Tunis', 'TND', 'Tunisian dinar', 'ت.د', '.tn', 'تونس', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/Tunis\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"튀니지\",\"pt-BR\":\"Tunísia\",\"pt\":\"Tunísia\",\"nl\":\"Tunesië\",\"hr\":\"Tunis\",\"fa\":\"تونس\",\"de\":\"Tunesien\",\"es\":\"Túnez\",\"fr\":\"Tunisie\",\"ja\":\"チュニジア\",\"it\":\"Tunisia\",\"cn\":\"突尼斯\",\"tr\":\"Tunus\"}', '34.00000000', '9.00000000', '🇹🇳', 'U+1F1F9 U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q948'),
(225, 'Turkey', 'TUR', '792', 'TR', '90', 'Ankara', 'TRY', 'Turkish lira', '₺', '.tr', 'Türkiye', 'Asia', 'Western Asia', '[{\"zoneName\":\"Europe/Istanbul\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"터키\",\"pt-BR\":\"Turquia\",\"pt\":\"Turquia\",\"nl\":\"Turkije\",\"hr\":\"Turska\",\"fa\":\"ترکیه\",\"de\":\"Türkei\",\"es\":\"Turquía\",\"fr\":\"Turquie\",\"ja\":\"トルコ\",\"it\":\"Turchia\",\"cn\":\"土耳其\",\"tr\":\"Türkiye\"}', '39.00000000', '35.00000000', '🇹🇷', 'U+1F1F9 U+1F1F7', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q43'),
(226, 'Turkmenistan', 'TKM', '795', 'TM', '993', 'Ashgabat', 'TMT', 'Turkmenistan manat', 'T', '.tm', 'Türkmenistan', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Ashgabat\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"TMT\",\"tzName\":\"Turkmenistan Time\"}]', '{\"kr\":\"투르크메니스탄\",\"pt-BR\":\"Turcomenistão\",\"pt\":\"Turquemenistão\",\"nl\":\"Turkmenistan\",\"hr\":\"Turkmenistan\",\"fa\":\"ترکمنستان\",\"de\":\"Turkmenistan\",\"es\":\"Turkmenistán\",\"fr\":\"Turkménistan\",\"ja\":\"トルクメニスタン\",\"it\":\"Turkmenistan\",\"cn\":\"土库曼斯坦\",\"tr\":\"Türkmenistan\"}', '40.00000000', '60.00000000', '🇹🇲', 'U+1F1F9 U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q874'),
(227, 'Turks And Caicos Islands', 'TCA', '796', 'TC', '+1-649', 'Cockburn Town', 'USD', 'United States dollar', '$', '.tc', 'Turks and Caicos Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Grand_Turk\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"}]', '{\"kr\":\"터크스 케이커스 제도\",\"pt-BR\":\"Ilhas Turcas e Caicos\",\"pt\":\"Ilhas Turcas e Caicos\",\"nl\":\"Turks- en Caicoseilanden\",\"hr\":\"Otoci Turks i Caicos\",\"fa\":\"جزایر تورکس و کایکوس\",\"de\":\"Turks- und Caicosinseln\",\"es\":\"Islas Turks y Caicos\",\"fr\":\"Îles Turques-et-Caïques\",\"ja\":\"タークス・カイコス諸島\",\"it\":\"Isole Turks e Caicos\",\"cn\":\"特克斯和凯科斯群岛\",\"tr\":\"Turks Ve Caicos Adalari\"}', '21.75000000', '-71.58333333', '🇹🇨', 'U+1F1F9 U+1F1E8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(228, 'Tuvalu', 'TUV', '798', 'TV', '688', 'Funafuti', 'AUD', 'Australian dollar', '$', '.tv', 'Tuvalu', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Funafuti\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"TVT\",\"tzName\":\"Tuvalu Time\"}]', '{\"kr\":\"투발루\",\"pt-BR\":\"Tuvalu\",\"pt\":\"Tuvalu\",\"nl\":\"Tuvalu\",\"hr\":\"Tuvalu\",\"fa\":\"تووالو\",\"de\":\"Tuvalu\",\"es\":\"Tuvalu\",\"fr\":\"Tuvalu\",\"ja\":\"ツバル\",\"it\":\"Tuvalu\",\"cn\":\"图瓦卢\",\"tr\":\"Tuvalu\"}', '-8.00000000', '178.00000000', '🇹🇻', 'U+1F1F9 U+1F1FB', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q672'),
(229, 'Uganda', 'UGA', '800', 'UG', '256', 'Kampala', 'UGX', 'Ugandan shilling', 'USh', '.ug', 'Uganda', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Kampala\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"EAT\",\"tzName\":\"East Africa Time\"}]', '{\"kr\":\"우간다\",\"pt-BR\":\"Uganda\",\"pt\":\"Uganda\",\"nl\":\"Oeganda\",\"hr\":\"Uganda\",\"fa\":\"اوگاندا\",\"de\":\"Uganda\",\"es\":\"Uganda\",\"fr\":\"Uganda\",\"ja\":\"ウガンダ\",\"it\":\"Uganda\",\"cn\":\"乌干达\",\"tr\":\"Uganda\"}', '1.00000000', '32.00000000', '🇺🇬', 'U+1F1FA U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q1036'),
(230, 'Ukraine', 'UKR', '804', 'UA', '380', 'Kiev', 'UAH', 'Ukrainian hryvnia', '₴', '.ua', 'Україна', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Kiev\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Europe/Simferopol\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"MSK\",\"tzName\":\"Moscow Time\"},{\"zoneName\":\"Europe/Uzhgorod\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"},{\"zoneName\":\"Europe/Zaporozhye\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"EET\",\"tzName\":\"Eastern European Time\"}]', '{\"kr\":\"우크라이나\",\"pt-BR\":\"Ucrânia\",\"pt\":\"Ucrânia\",\"nl\":\"Oekraïne\",\"hr\":\"Ukrajina\",\"fa\":\"وکراین\",\"de\":\"Ukraine\",\"es\":\"Ucrania\",\"fr\":\"Ukraine\",\"ja\":\"ウクライナ\",\"it\":\"Ucraina\",\"cn\":\"乌克兰\",\"tr\":\"Ukrayna\"}', '49.00000000', '32.00000000', '🇺🇦', 'U+1F1FA U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q212'),
(231, 'United Arab Emirates', 'ARE', '784', 'AE', '971', 'Abu Dhabi', 'AED', 'United Arab Emirates dirham', 'إ.د', '.ae', 'دولة الإمارات العربية المتحدة', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Dubai\",\"gmtOffset\":14400,\"gmtOffsetName\":\"UTC+04:00\",\"abbreviation\":\"GST\",\"tzName\":\"Gulf Standard Time\"}]', '{\"kr\":\"아랍에미리트\",\"pt-BR\":\"Emirados árabes Unidos\",\"pt\":\"Emirados árabes Unidos\",\"nl\":\"Verenigde Arabische Emiraten\",\"hr\":\"Ujedinjeni Arapski Emirati\",\"fa\":\"امارات متحده عربی\",\"de\":\"Vereinigte Arabische Emirate\",\"es\":\"Emiratos Árabes Unidos\",\"fr\":\"Émirats arabes unis\",\"ja\":\"アラブ首長国連邦\",\"it\":\"Emirati Arabi Uniti\",\"cn\":\"阿拉伯联合酋长国\",\"tr\":\"Birleşik Arap Emirlikleri\"}', '24.00000000', '54.00000000', '🇦🇪', 'U+1F1E6 U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q878'),
(232, 'United Kingdom', 'GBR', '826', 'GB', '44', 'London', 'GBP', 'British pound', '£', '.uk', 'United Kingdom', 'Europe', 'Northern Europe', '[{\"zoneName\":\"Europe/London\",\"gmtOffset\":0,\"gmtOffsetName\":\"UTC±00\",\"abbreviation\":\"GMT\",\"tzName\":\"Greenwich Mean Time\"}]', '{\"kr\":\"영국\",\"pt-BR\":\"Reino Unido\",\"pt\":\"Reino Unido\",\"nl\":\"Verenigd Koninkrijk\",\"hr\":\"Ujedinjeno Kraljevstvo\",\"fa\":\"بریتانیای کبیر و ایرلند شمالی\",\"de\":\"Vereinigtes Königreich\",\"es\":\"Reino Unido\",\"fr\":\"Royaume-Uni\",\"ja\":\"イギリス\",\"it\":\"Regno Unito\",\"cn\":\"英国\",\"tr\":\"Birleşik Krallik\"}', '54.00000000', '-2.00000000', '🇬🇧', 'U+1F1EC U+1F1E7', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q145'),
(233, 'United States', 'USA', '840', 'US', '1', 'Washington', 'USD', 'United States dollar', '$', '.us', 'United States', 'Americas', 'Northern America', '[{\"zoneName\":\"America/Adak\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"HST\",\"tzName\":\"Hawaii–Aleutian Standard Time\"},{\"zoneName\":\"America/Anchorage\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/Boise\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Chicago\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Denver\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Detroit\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Indianapolis\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Knox\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Marengo\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Petersburg\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Tell_City\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Vevay\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Vincennes\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Indiana/Winamac\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Juneau\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/Kentucky/Louisville\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Kentucky/Monticello\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Los_Angeles\",\"gmtOffset\":-28800,\"gmtOffsetName\":\"UTC-08:00\",\"abbreviation\":\"PST\",\"tzName\":\"Pacific Standard Time (North America\"},{\"zoneName\":\"America/Menominee\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Metlakatla\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/New_York\",\"gmtOffset\":-18000,\"gmtOffsetName\":\"UTC-05:00\",\"abbreviation\":\"EST\",\"tzName\":\"Eastern Standard Time (North America\"},{\"zoneName\":\"America/Nome\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/North_Dakota/Beulah\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/North_Dakota/Center\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/North_Dakota/New_Salem\",\"gmtOffset\":-21600,\"gmtOffsetName\":\"UTC-06:00\",\"abbreviation\":\"CST\",\"tzName\":\"Central Standard Time (North America\"},{\"zoneName\":\"America/Phoenix\",\"gmtOffset\":-25200,\"gmtOffsetName\":\"UTC-07:00\",\"abbreviation\":\"MST\",\"tzName\":\"Mountain Standard Time (North America\"},{\"zoneName\":\"America/Sitka\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"America/Yakutat\",\"gmtOffset\":-32400,\"gmtOffsetName\":\"UTC-09:00\",\"abbreviation\":\"AKST\",\"tzName\":\"Alaska Standard Time\"},{\"zoneName\":\"Pacific/Honolulu\",\"gmtOffset\":-36000,\"gmtOffsetName\":\"UTC-10:00\",\"abbreviation\":\"HST\",\"tzName\":\"Hawaii–Aleutian Standard Time\"}]', '{\"kr\":\"미국\",\"pt-BR\":\"Estados Unidos\",\"pt\":\"Estados Unidos\",\"nl\":\"Verenigde Staten\",\"hr\":\"Sjedinjene Američke Države\",\"fa\":\"ایالات متحده آمریکا\",\"de\":\"Vereinigte Staaten von Amerika\",\"es\":\"Estados Unidos\",\"fr\":\"États-Unis\",\"ja\":\"アメリカ合衆国\",\"it\":\"Stati Uniti D\'America\",\"cn\":\"美国\",\"tr\":\"Amerika\"}', '38.00000000', '-97.00000000', '🇺🇸', 'U+1F1FA U+1F1F8', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q30'),
(234, 'United States Minor Outlying Islands', 'UMI', '581', 'UM', '1', '', 'USD', 'United States dollar', '$', '.us', 'United States Minor Outlying Islands', 'Americas', 'Northern America', '[{\"zoneName\":\"Pacific/Midway\",\"gmtOffset\":-39600,\"gmtOffsetName\":\"UTC-11:00\",\"abbreviation\":\"SST\",\"tzName\":\"Samoa Standard Time\"},{\"zoneName\":\"Pacific/Wake\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"WAKT\",\"tzName\":\"Wake Island Time\"}]', '{\"kr\":\"미국령 군소 제도\",\"pt-BR\":\"Ilhas Menores Distantes dos Estados Unidos\",\"pt\":\"Ilhas Menores Distantes dos Estados Unidos\",\"nl\":\"Kleine afgelegen eilanden van de Verenigde Staten\",\"hr\":\"Mali udaljeni otoci SAD-a\",\"fa\":\"جزایر کوچک حاشیه‌ای ایالات متحده آمریکا\",\"de\":\"Kleinere Inselbesitzungen der Vereinigten Staaten\",\"es\":\"Islas Ultramarinas Menores de Estados Unidos\",\"fr\":\"Îles mineures éloignées des États-Unis\",\"ja\":\"合衆国領有小離島\",\"it\":\"Isole minori esterne degli Stati Uniti d\'America\",\"cn\":\"美国本土外小岛屿\",\"tr\":\"Abd Küçük Harici Adalari\"}', '0.00000000', '0.00000000', '🇺🇲', 'U+1F1FA U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(235, 'Uruguay', 'URY', '858', 'UY', '598', 'Montevideo', 'UYU', 'Uruguayan peso', '$', '.uy', 'Uruguay', 'Americas', 'South America', '[{\"zoneName\":\"America/Montevideo\",\"gmtOffset\":-10800,\"gmtOffsetName\":\"UTC-03:00\",\"abbreviation\":\"UYT\",\"tzName\":\"Uruguay Standard Time\"}]', '{\"kr\":\"우루과이\",\"pt-BR\":\"Uruguai\",\"pt\":\"Uruguai\",\"nl\":\"Uruguay\",\"hr\":\"Urugvaj\",\"fa\":\"اروگوئه\",\"de\":\"Uruguay\",\"es\":\"Uruguay\",\"fr\":\"Uruguay\",\"ja\":\"ウルグアイ\",\"it\":\"Uruguay\",\"cn\":\"乌拉圭\",\"tr\":\"Uruguay\"}', '-33.00000000', '-56.00000000', '🇺🇾', 'U+1F1FA U+1F1FE', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q77'),
(236, 'Uzbekistan', 'UZB', '860', 'UZ', '998', 'Tashkent', 'UZS', 'Uzbekistani soʻm', 'лв', '.uz', 'O‘zbekiston', 'Asia', 'Central Asia', '[{\"zoneName\":\"Asia/Samarkand\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"UZT\",\"tzName\":\"Uzbekistan Time\"},{\"zoneName\":\"Asia/Tashkent\",\"gmtOffset\":18000,\"gmtOffsetName\":\"UTC+05:00\",\"abbreviation\":\"UZT\",\"tzName\":\"Uzbekistan Time\"}]', '{\"kr\":\"우즈베키스탄\",\"pt-BR\":\"Uzbequistão\",\"pt\":\"Usbequistão\",\"nl\":\"Oezbekistan\",\"hr\":\"Uzbekistan\",\"fa\":\"ازبکستان\",\"de\":\"Usbekistan\",\"es\":\"Uzbekistán\",\"fr\":\"Ouzbékistan\",\"ja\":\"ウズベキスタン\",\"it\":\"Uzbekistan\",\"cn\":\"乌兹别克斯坦\",\"tr\":\"Özbekistan\"}', '41.00000000', '64.00000000', '🇺🇿', 'U+1F1FA U+1F1FF', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q265'),
(237, 'Vanuatu', 'VUT', '548', 'VU', '678', 'Port Vila', 'VUV', 'Vanuatu vatu', 'VT', '.vu', 'Vanuatu', 'Oceania', 'Melanesia', '[{\"zoneName\":\"Pacific/Efate\",\"gmtOffset\":39600,\"gmtOffsetName\":\"UTC+11:00\",\"abbreviation\":\"VUT\",\"tzName\":\"Vanuatu Time\"}]', '{\"kr\":\"바누아투\",\"pt-BR\":\"Vanuatu\",\"pt\":\"Vanuatu\",\"nl\":\"Vanuatu\",\"hr\":\"Vanuatu\",\"fa\":\"وانواتو\",\"de\":\"Vanuatu\",\"es\":\"Vanuatu\",\"fr\":\"Vanuatu\",\"ja\":\"バヌアツ\",\"it\":\"Vanuatu\",\"cn\":\"瓦努阿图\",\"tr\":\"Vanuatu\"}', '-16.00000000', '167.00000000', '🇻🇺', 'U+1F1FB U+1F1FA', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q686'),
(238, 'Vatican City State (Holy See)', 'VAT', '336', 'VA', '379', 'Vatican City', 'EUR', 'Euro', '€', '.va', 'Vaticano', 'Europe', 'Southern Europe', '[{\"zoneName\":\"Europe/Vatican\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"바티칸 시국\",\"pt-BR\":\"Vaticano\",\"pt\":\"Vaticano\",\"nl\":\"Heilige Stoel\",\"hr\":\"Sveta Stolica\",\"fa\":\"سریر مقدس\",\"de\":\"Heiliger Stuhl\",\"es\":\"Santa Sede\",\"fr\":\"voir Saint\",\"ja\":\"聖座\",\"it\":\"Santa Sede\",\"cn\":\"梵蒂冈\",\"tr\":\"Vatikan\"}', '41.90000000', '12.45000000', '🇻🇦', 'U+1F1FB U+1F1E6', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q237'),
(239, 'Venezuela', 'VEN', '862', 'VE', '58', 'Caracas', 'VEF', 'Bolívar', 'Bs', '.ve', 'Venezuela', 'Americas', 'South America', '[{\"zoneName\":\"America/Caracas\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"VET\",\"tzName\":\"Venezuelan Standard Time\"}]', '{\"kr\":\"베네수엘라\",\"pt-BR\":\"Venezuela\",\"pt\":\"Venezuela\",\"nl\":\"Venezuela\",\"hr\":\"Venezuela\",\"fa\":\"ونزوئلا\",\"de\":\"Venezuela\",\"es\":\"Venezuela\",\"fr\":\"Venezuela\",\"ja\":\"ベネズエラ・ボリバル共和国\",\"it\":\"Venezuela\",\"cn\":\"委内瑞拉\",\"tr\":\"Venezuela\"}', '8.00000000', '-66.00000000', '🇻🇪', 'U+1F1FB U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q717'),
(240, 'Vietnam', 'VNM', '704', 'VN', '84', 'Hanoi', 'VND', 'Vietnamese đồng', '₫', '.vn', 'Việt Nam', 'Asia', 'South-Eastern Asia', '[{\"zoneName\":\"Asia/Ho_Chi_Minh\",\"gmtOffset\":25200,\"gmtOffsetName\":\"UTC+07:00\",\"abbreviation\":\"ICT\",\"tzName\":\"Indochina Time\"}]', '{\"kr\":\"베트남\",\"pt-BR\":\"Vietnã\",\"pt\":\"Vietname\",\"nl\":\"Vietnam\",\"hr\":\"Vijetnam\",\"fa\":\"ویتنام\",\"de\":\"Vietnam\",\"es\":\"Vietnam\",\"fr\":\"Viêt Nam\",\"ja\":\"ベトナム\",\"it\":\"Vietnam\",\"cn\":\"越南\",\"tr\":\"Vietnam\"}', '16.16666666', '107.83333333', '🇻🇳', 'U+1F1FB U+1F1F3', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q881'),
(241, 'Virgin Islands (British)', 'VGB', '092', 'VG', '+1-284', 'Road Town', 'USD', 'United States dollar', '$', '.vg', 'British Virgin Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Tortola\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"영국령 버진아일랜드\",\"pt-BR\":\"Ilhas Virgens Britânicas\",\"pt\":\"Ilhas Virgens Britânicas\",\"nl\":\"Britse Maagdeneilanden\",\"hr\":\"Britanski Djevičanski Otoci\",\"fa\":\"جزایر ویرجین بریتانیا\",\"de\":\"Britische Jungferninseln\",\"es\":\"Islas Vírgenes del Reino Unido\",\"fr\":\"Îles Vierges britanniques\",\"ja\":\"イギリス領ヴァージン諸島\",\"it\":\"Isole Vergini Britanniche\",\"cn\":\"圣文森特和格林纳丁斯\",\"tr\":\"Britanya Virjin Adalari\"}', '18.43138300', '-64.62305000', '🇻🇬', 'U+1F1FB U+1F1EC', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(242, 'Virgin Islands (US)', 'VIR', '850', 'VI', '+1-340', 'Charlotte Amalie', 'USD', 'United States dollar', '$', '.vi', 'United States Virgin Islands', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/St_Thomas\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"미국령 버진아일랜드\",\"pt-BR\":\"Ilhas Virgens Americanas\",\"pt\":\"Ilhas Virgens Americanas\",\"nl\":\"Verenigde Staten Maagdeneilanden\",\"fa\":\"جزایر ویرجین آمریکا\",\"de\":\"Amerikanische Jungferninseln\",\"es\":\"Islas Vírgenes de los Estados Unidos\",\"fr\":\"Îles Vierges des États-Unis\",\"ja\":\"アメリカ領ヴァージン諸島\",\"it\":\"Isole Vergini americane\",\"cn\":\"维尔京群岛（美国）\",\"tr\":\"Abd Virjin Adalari\"}', '18.34000000', '-64.93000000', '🇻🇮', 'U+1F1FB U+1F1EE', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(243, 'Wallis And Futuna Islands', 'WLF', '876', 'WF', '681', 'Mata Utu', 'XPF', 'CFP franc', '₣', '.wf', 'Wallis et Futuna', 'Oceania', 'Polynesia', '[{\"zoneName\":\"Pacific/Wallis\",\"gmtOffset\":43200,\"gmtOffsetName\":\"UTC+12:00\",\"abbreviation\":\"WFT\",\"tzName\":\"Wallis & Futuna Time\"}]', '{\"kr\":\"왈리스 푸투나\",\"pt-BR\":\"Wallis e Futuna\",\"pt\":\"Wallis e Futuna\",\"nl\":\"Wallis en Futuna\",\"hr\":\"Wallis i Fortuna\",\"fa\":\"والیس و فوتونا\",\"de\":\"Wallis und Futuna\",\"es\":\"Wallis y Futuna\",\"fr\":\"Wallis-et-Futuna\",\"ja\":\"ウォリス・フツナ\",\"it\":\"Wallis e Futuna\",\"cn\":\"瓦利斯群岛和富图纳群岛\",\"tr\":\"Wallis Ve Futuna\"}', '-13.30000000', '-176.20000000', '🇼🇫', 'U+1F1FC U+1F1EB', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(244, 'Western Sahara', 'ESH', '732', 'EH', '212', 'El-Aaiun', 'MAD', 'Moroccan Dirham', 'MAD', '.eh', 'الصحراء الغربية', 'Africa', 'Northern Africa', '[{\"zoneName\":\"Africa/El_Aaiun\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"WEST\",\"tzName\":\"Western European Summer Time\"}]', '{\"kr\":\"서사하라\",\"pt-BR\":\"Saara Ocidental\",\"pt\":\"Saara Ocidental\",\"nl\":\"Westelijke Sahara\",\"hr\":\"Zapadna Sahara\",\"fa\":\"جمهوری دموکراتیک عربی صحرا\",\"de\":\"Westsahara\",\"es\":\"Sahara Occidental\",\"fr\":\"Sahara Occidental\",\"ja\":\"西サハラ\",\"it\":\"Sahara Occidentale\",\"cn\":\"西撒哈拉\",\"tr\":\"Bati Sahra\"}', '24.50000000', '-13.00000000', '🇪🇭', 'U+1F1EA U+1F1ED', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, NULL),
(245, 'Yemen', 'YEM', '887', 'YE', '967', 'Sanaa', 'YER', 'Yemeni rial', '﷼', '.ye', 'اليَمَن', 'Asia', 'Western Asia', '[{\"zoneName\":\"Asia/Aden\",\"gmtOffset\":10800,\"gmtOffsetName\":\"UTC+03:00\",\"abbreviation\":\"AST\",\"tzName\":\"Arabia Standard Time\"}]', '{\"kr\":\"예멘\",\"pt-BR\":\"Iêmen\",\"pt\":\"Iémen\",\"nl\":\"Jemen\",\"hr\":\"Jemen\",\"fa\":\"یمن\",\"de\":\"Jemen\",\"es\":\"Yemen\",\"fr\":\"Yémen\",\"ja\":\"イエメン\",\"it\":\"Yemen\",\"cn\":\"也门\",\"tr\":\"Yemen\"}', '15.00000000', '48.00000000', '🇾🇪', 'U+1F1FE U+1F1EA', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q805'),
(246, 'Zambia', 'ZMB', '894', 'ZM', '260', 'Lusaka', 'ZMW', 'Zambian kwacha', 'ZK', '.zm', 'Zambia', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Lusaka\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"잠비아\",\"pt-BR\":\"Zâmbia\",\"pt\":\"Zâmbia\",\"nl\":\"Zambia\",\"hr\":\"Zambija\",\"fa\":\"زامبیا\",\"de\":\"Sambia\",\"es\":\"Zambia\",\"fr\":\"Zambie\",\"ja\":\"ザンビア\",\"it\":\"Zambia\",\"cn\":\"赞比亚\",\"tr\":\"Zambiya\"}', '-15.00000000', '30.00000000', '🇿🇲', 'U+1F1FF U+1F1F2', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q953'),
(247, 'Zimbabwe', 'ZWE', '716', 'ZW', '263', 'Harare', 'ZWL', 'Zimbabwe Dollar', '$', '.zw', 'Zimbabwe', 'Africa', 'Eastern Africa', '[{\"zoneName\":\"Africa/Harare\",\"gmtOffset\":7200,\"gmtOffsetName\":\"UTC+02:00\",\"abbreviation\":\"CAT\",\"tzName\":\"Central Africa Time\"}]', '{\"kr\":\"짐바브웨\",\"pt-BR\":\"Zimbabwe\",\"pt\":\"Zimbabué\",\"nl\":\"Zimbabwe\",\"hr\":\"Zimbabve\",\"fa\":\"زیمباوه\",\"de\":\"Simbabwe\",\"es\":\"Zimbabue\",\"fr\":\"Zimbabwe\",\"ja\":\"ジンバブエ\",\"it\":\"Zimbabwe\",\"cn\":\"津巴布韦\",\"tr\":\"Zimbabve\"}', '-20.00000000', '30.00000000', '🇿🇼', 'U+1F1FF U+1F1FC', '2018-07-21 01:11:03', '2022-05-21 15:39:27', 1, 'Q954'),
(248, 'Kosovo', 'XKX', '926', 'XK', '383', 'Pristina', 'EUR', 'Euro', '€', '.xk', 'Republika e Kosovës', 'Europe', 'Eastern Europe', '[{\"zoneName\":\"Europe/Belgrade\",\"gmtOffset\":3600,\"gmtOffsetName\":\"UTC+01:00\",\"abbreviation\":\"CET\",\"tzName\":\"Central European Time\"}]', '{\"kr\":\"코소보\",\"cn\":\"科索沃\",\"tr\":\"Kosova\"}', '42.56129090', '20.34030350', '🇽🇰', 'U+1F1FD U+1F1F0', '2020-08-15 20:33:50', '2022-05-21 15:39:27', 1, 'Q1246'),
(249, 'Curaçao', 'CUW', '531', 'CW', '599', 'Willemstad', 'ANG', 'Netherlands Antillean guilder', 'ƒ', '.cw', 'Curaçao', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Curacao\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"퀴라소\",\"pt-BR\":\"Curaçao\",\"pt\":\"Curaçao\",\"nl\":\"Curaçao\",\"fa\":\"کوراسائو\",\"de\":\"Curaçao\",\"fr\":\"Curaçao\",\"it\":\"Curaçao\",\"cn\":\"库拉索\",\"tr\":\"Curaçao\"}', '12.11666700', '-68.93333300', '🇨🇼', 'U+1F1E8 U+1F1FC', '2020-10-25 19:54:20', '2022-05-21 15:39:27', 1, 'Q25279'),
(250, 'Sint Maarten (Dutch part)', 'SXM', '534', 'SX', '1721', 'Philipsburg', 'ANG', 'Netherlands Antillean guilder', 'ƒ', '.sx', 'Sint Maarten', 'Americas', 'Caribbean', '[{\"zoneName\":\"America/Anguilla\",\"gmtOffset\":-14400,\"gmtOffsetName\":\"UTC-04:00\",\"abbreviation\":\"AST\",\"tzName\":\"Atlantic Standard Time\"}]', '{\"kr\":\"신트마르턴\",\"pt-BR\":\"Sint Maarten\",\"pt\":\"São Martinho\",\"nl\":\"Sint Maarten\",\"fa\":\"سینت مارتن\",\"de\":\"Sint Maarten (niederl. Teil)\",\"fr\":\"Saint Martin (partie néerlandaise)\",\"it\":\"Saint Martin (parte olandese)\",\"cn\":\"圣马丁岛（荷兰部分）\",\"tr\":\"Sint Maarten\"}', '18.03333300', '-63.05000000', '🇸🇽', 'U+1F1F8 U+1F1FD', '2020-12-05 18:03:39', '2022-05-21 15:39:27', 1, 'Q26273');

-- --------------------------------------------------------

--
-- Table structure for table `deligates`
--

CREATE TABLE `deligates` (
  `deligate_id` int(10) UNSIGNED NOT NULL,
  `deligate_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_country_id` bigint(20) DEFAULT NULL,
  `deligate_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_licence_no` bigint(20) DEFAULT NULL,
  `deligate_licence_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_status` bigint(20) DEFAULT NULL,
  `deligate_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `deligate_created_by` int(11) DEFAULT NULL,
  `deligate_updated_by` int(11) DEFAULT NULL,
  `deligate_deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deligates`
--

INSERT INTO `deligates` (`deligate_id`, `deligate_entry_id`, `deligate_country_name`, `deligate_country_id`, `deligate_name`, `deligate_phone`, `deligate_email`, `deligate_licence_no`, `deligate_licence_file`, `deligate_picture`, `deligate_status`, `deligate_create_date`, `deligate_has_deleted`, `deligate_created_by`, `deligate_updated_by`, `deligate_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Shadman Sakib12616', 'Bangladesh', 19, 'Shadman Sakib', '01623322584', 'ssk.m360ict@gmail.com', 8945654656, '/uploads/1669180938.pdf', '/uploads/1669180938.png', 1, '2022/11/23', 'NO', 131, NULL, NULL, '2022-11-22 23:22:18', '2022-11-22 23:22:18'),
(2, 'Shadman Sakib111196430', 'Bangladesh', 19, 'Shadman Sakib33333', '16478794552', 'ssk.m360ic1t@gmail.com', 454545454, '/uploads/1669181215.pdf', '/uploads/1669181215.png', 0, '2022/11/23', 'YES', 131, NULL, 131, '2022-11-22 23:26:55', '2022-11-23 03:43:27'),
(3, 'Delir Maya21763', 'Aland Islands', 2, 'Delir Maya', '01523135458', 'delirmaya@gmail.com', 76767, '/uploads/1669278310.png', '/uploads/1669278310.png', 1, '2022/11/24', 'NO', 127, NULL, NULL, '2022-11-24 02:25:10', '2022-11-24 02:25:10'),
(4, 'Lubaba38942', 'Anguilla', 8, 'Lubaba', '01451515', 'lubaba@gmail.com', 45454, '/uploads/', '/uploads/', 1, '2022/12/17', 'NO', 127, NULL, NULL, '2022-12-17 01:59:50', '2022-12-17 01:59:50'),
(5, 'mizan13732', 'El Salvador', 66, 'mizan', '514515', 'elsalv@gmail.com', 151151, '/uploads/', '/uploads/', 1, '2022/12/18', 'NO', 127, NULL, NULL, '2022-12-17 20:37:15', '2022-12-17 20:37:15'),
(6, 'Nahid delegate18723', 'Saudi Arabia', 194, 'Nahid delegate', '0298919177', NULL, NULL, '/uploads/', '/uploads/', 1, '2023/02/09', 'NO', 126, NULL, NULL, '2023-02-08 21:16:54', '2023-02-08 21:16:54'),
(7, 'Nahid delegate37417', 'Brazil', 31, 'Nahid delegate', NULL, NULL, NULL, '/uploads/', '/uploads/', 1, '2023/05/23', 'NO', 129, NULL, NULL, '2023-05-23 03:26:27', '2023-05-23 03:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `deligate_ledgers`
--

CREATE TABLE `deligate_ledgers` (
  `deligate_ledger_id` int(10) UNSIGNED NOT NULL,
  `deligate_id` bigint(20) DEFAULT NULL,
  `deligate_account_id` bigint(20) DEFAULT NULL,
  `deligate_transaction_id` bigint(20) DEFAULT NULL,
  `deligate_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `deligate_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `deligate_ledger_refund_id` bigint(20) DEFAULT NULL,
  `deligate_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_ledger_last_balance` bigint(20) DEFAULT NULL,
  `deligate_ledger_dr` bigint(20) DEFAULT NULL,
  `deligate_ledger_cr` bigint(20) DEFAULT NULL,
  `deligate_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_ledger_updated_by` int(11) DEFAULT NULL,
  `deligate_ledger_deleted_by` int(11) DEFAULT NULL,
  `deligate_ledger_is_deleted` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deligate_ledgers`
--

INSERT INTO `deligate_ledgers` (`deligate_ledger_id`, `deligate_id`, `deligate_account_id`, `deligate_transaction_id`, `deligate_ledger_type`, `deligate_ledger_invoice_id`, `deligate_ledger_money_receipt_id`, `deligate_ledger_refund_id`, `deligate_ledger_status`, `deligate_ledger_last_balance`, `deligate_ledger_dr`, `deligate_ledger_cr`, `deligate_ledger_date`, `deligate_ledger_create_date`, `deligate_ledger_prepared_by`, `deligate_ledger_updated_by`, `deligate_ledger_deleted_by`, `deligate_ledger_is_deleted`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 'opening_balance', NULL, NULL, NULL, '0', 0, 0, 10000, '2022/11/23', '2022/11/23', '131', NULL, NULL, 'YES', '2022-11-23 05:26:55', '2022-11-23 05:26:55'),
(3, 2, NULL, 5, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 450, '2022-12-14', '2022-12-14', '127', NULL, NULL, NULL, '2022-12-14 12:34:29', '2022-12-14 12:34:29'),
(4, NULL, NULL, 5, 'deligate_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 750, '2022-12-14', NULL, '127', NULL, NULL, NULL, '2022-12-14 12:34:45', '2022-12-14 12:34:45'),
(5, 1, NULL, 6, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 547, '2022-12-14', '2022-12-14', '127', NULL, NULL, NULL, '2022-12-14 12:38:52', '2022-12-14 12:38:52'),
(6, 3, NULL, 7, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 450, NULL, 9901, '2022-12-14', '2022-12-14', '127', NULL, NULL, NULL, '2022-12-14 12:42:04', '2022-12-14 12:42:04'),
(7, NULL, NULL, 7, 'deligate_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 9901, '2022-12-14', NULL, '127', NULL, NULL, NULL, '2022-12-14 12:42:20', '2022-12-14 12:42:20'),
(8, 4, NULL, 8, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 450, NULL, 8500, '2022-12-17', '2022-12-17', '127', NULL, NULL, NULL, '2022-12-17 08:00:52', '2022-12-17 08:00:52'),
(9, 5, NULL, 9, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 450, NULL, 47500, '2022-12-15', '2022-12-18', '127', NULL, NULL, NULL, '2022-12-18 02:38:10', '2022-12-18 02:38:10'),
(10, 5, NULL, 10, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 450, NULL, 13500, '2022-12-18', '2022-12-18', '127', NULL, NULL, NULL, '2022-12-18 02:38:34', '2022-12-18 02:38:34'),
(11, 3, NULL, 11, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 450, NULL, 5000, '2022-12-18', '2022-12-18', '127', NULL, NULL, NULL, '2022-12-18 04:53:41', '2022-12-18 04:53:41'),
(12, 2, NULL, 12, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 850000, '2022-12-18', '2022-12-18', '127', NULL, NULL, NULL, '2022-12-18 04:57:29', '2022-12-18 04:57:29'),
(13, 2, NULL, 13, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, 50000, '2022-12-18', '2022-12-18', '127', NULL, NULL, NULL, '2022-12-18 05:36:04', '2022-12-18 05:36:04'),
(14, 4, NULL, 14, 'deligate_PAYMENT', NULL, NULL, NULL, '1', 450, NULL, 48500, '2022-12-18', '2022-12-18', '127', NULL, NULL, NULL, '2022-12-18 06:54:27', '2022-12-18 06:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `deligate_transactions`
--

CREATE TABLE `deligate_transactions` (
  `deligate_transaction_id` int(10) UNSIGNED NOT NULL,
  `deligate_transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_transaction_account_id` bigint(20) DEFAULT NULL,
  `deligate_transaction_client_id` bigint(20) DEFAULT NULL,
  `deligate_transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_transaction_opening_balance` bigint(20) DEFAULT NULL,
  `deligate_transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_account_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `deligate_account_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_account_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_account_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deligate_account_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deligate_transactions`
--

INSERT INTO `deligate_transactions` (`deligate_transaction_id`, `deligate_transaction_type`, `deligate_transaction_account_id`, `deligate_transaction_client_id`, `deligate_transaction_amount`, `deligate_transaction_last_balance`, `deligate_transaction_opening_balance`, `deligate_transaction_date`, `deligate_transaction_note`, `deligate_account_create_date`, `deligate_account_has_deleted`, `deligate_account_deleted_by`, `deligate_account_created_by`, `deligate_account_updated_by`, `deligate_account_status`, `created_at`, `updated_at`) VALUES
(1, 'advance', 2, 2, NULL, NULL, 10000, '2022/11/23', NULL, '2022/11/23', 'YES', '131', '131', NULL, '0', '2022-11-22 23:26:55', '2022-11-22 23:26:55'),
(2, 'credit', 3, 3, NULL, NULL, 96500, '2022/11/24', NULL, '2022/11/24', 'NO', NULL, '127', NULL, '1', '2022-11-24 02:25:10', '2022-11-24 02:25:10'),
(3, 'CREDIT', NULL, 2, '450', NULL, NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 06:32:58', '2022-12-14 06:32:58'),
(4, 'CREDIT', NULL, 2, '450', NULL, NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 06:33:30', '2022-12-14 06:33:30'),
(5, 'CREDIT', NULL, 2, '450', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 06:34:29', '2022-12-14 06:34:29'),
(6, 'CREDIT', NULL, 1, '547', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 06:38:52', '2022-12-14 06:38:52'),
(7, 'CREDIT', NULL, 3, '9901', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 06:42:04', '2022-12-14 06:42:20'),
(8, 'CREDIT', NULL, 4, '8500', '450', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, NULL, NULL, '1', '2022-12-17 02:00:52', '2022-12-17 02:00:52'),
(9, 'CREDIT', NULL, 5, '47500', '450', NULL, '2022-12-15', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-17 20:38:09', '2022-12-17 20:38:09'),
(10, 'CREDIT', NULL, 5, '13500', '450', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-17 20:38:34', '2022-12-17 20:38:34'),
(11, 'CREDIT', NULL, 3, '5000', '450', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-17 22:53:41', '2022-12-17 22:53:41'),
(12, 'CREDIT', NULL, 2, '850000', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-17 22:57:29', '2022-12-17 22:57:29'),
(13, 'CREDIT', NULL, 2, '50000', '0', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-17 23:36:04', '2022-12-17 23:36:04'),
(14, 'CREDIT', NULL, 4, '48500', '450', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-18 00:54:27', '2022-12-18 00:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(10) UNSIGNED NOT NULL,
  `expense_head_id` bigint(20) DEFAULT NULL,
  `expense_head_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_sub_head_id` int(11) DEFAULT NULL,
  `expense_sub_head_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_client_id` int(11) DEFAULT NULL,
  `expense_client_transection_id` int(11) DEFAULT NULL,
  `expense_trasection_id` bigint(20) DEFAULT NULL,
  `expense_accounts_id` bigint(20) DEFAULT NULL,
  `expense_amount` bigint(20) DEFAULT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_created_by` int(255) DEFAULT NULL,
  `expense_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_head_id`, `expense_head_name`, `expense_sub_head_id`, `expense_sub_head_name`, `expense_client_id`, `expense_client_transection_id`, `expense_trasection_id`, `expense_accounts_id`, `expense_amount`, `expense_date`, `expense_note`, `expense_created_by`, `expense_create_date`, `expense_has_deleted`, `created_at`, `updated_at`) VALUES
(49, 3, 'Client', NULL, 'Police Clearence', 41, 86, NULL, NULL, 5000, '2022-11-28', NULL, NULL, '2022-11-28', 'NO', '2022-11-27 22:03:04', '2022-11-27 22:06:50'),
(50, 3, 'Client', 8, 'Passport', 42, 88, NULL, NULL, 5000, '2022-11-28', NULL, NULL, '2022-11-28', 'NO', '2022-11-27 22:12:45', '2022-11-27 22:13:32'),
(51, 3, '7', 7, '7', 42, 96, NULL, NULL, 80000, '2022-11-28', NULL, NULL, '2022-11-28', 'NO', '2022-11-28 05:39:25', '2022-11-28 05:39:25'),
(52, 3, '9', 9, 'Visa', 42, 97, NULL, NULL, 9000, '2022-11-28', NULL, NULL, '2022-11-28', 'NO', '2022-11-28 05:45:25', '2022-11-28 05:45:25'),
(53, 3, '7', 7, 'Police Clearence', 42, 99, NULL, NULL, 85000, '2022-11-28', 'agfhbaf', NULL, '2022-11-28', 'NO', '2022-11-28 06:58:36', '2022-11-28 06:58:36'),
(54, 2, 'Office', 11, 'Bazar Purpose', 42, 100, NULL, NULL, 140000000, '2022-11-28', 'agfhbaf', NULL, '2022-11-28', 'NO', '2022-11-28 07:07:18', '2022-11-28 23:06:45'),
(55, 3, 'Client', 10, 'Manpower', 41, 101, NULL, NULL, 80000, '2022-11-29', 'af5fa4fa5', NULL, '2022-11-29', 'NO', '2022-11-28 20:27:53', '2022-11-28 20:27:53'),
(56, 3, 'Client', NULL, 'Medical Test', 42, 102, NULL, NULL, 920005, '2022-11-29', '4af4fa', NULL, '2022-11-29', 'NO', '2022-11-28 21:50:19', '2022-11-28 21:50:35'),
(57, 3, 'Client', 6, 'Medical Test', 43, 104, NULL, NULL, 75000, '2022-11-30', NULL, NULL, '2022-11-30', 'NO', '2022-11-29 23:11:39', '2022-11-29 23:11:39'),
(58, 3, 'Client', 10, 'Manpower', 67, 266, NULL, NULL, 25000, '2022-12-12', 'this is not fair', NULL, '2022-12-12', 'NO', '2022-12-11 22:10:25', '2022-12-11 22:10:25'),
(59, 3, 'Client', 6, 'Medical Test', 77, 273, NULL, NULL, 85000, '2022-12-17', 'afaf15aff', NULL, '2022-12-17', 'NO', '2022-12-16 21:34:14', '2022-12-16 21:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_medical_test`
--

CREATE TABLE `final_medical_test` (
  `final_medical_test_id` int(10) UNSIGNED NOT NULL,
  `final_medical_test_vendor_id` int(20) DEFAULT NULL,
  `final_medical_test_client_id` bigint(20) NOT NULL,
  `final_medical_test_client_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicaltest_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_medical_test_processing_cost` bigint(20) DEFAULT NULL,
  `final_medical_test_created_by` bigint(20) DEFAULT NULL,
  `final_medical_test_has_deleted` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `final_medical_test_updated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_medical_test_create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `final_medical_test`
--

INSERT INTO `final_medical_test` (`final_medical_test_id`, `final_medical_test_vendor_id`, `final_medical_test_client_id`, `final_medical_test_client_status`, `medicaltest_file`, `final_medical_test_processing_cost`, `final_medical_test_created_by`, `final_medical_test_has_deleted`, `final_medical_test_updated`, `note`, `final_medical_test_create_date`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 'fit', NULL, NULL, 131, '0', NULL, NULL, '2022-11-29', '2022-11-29 06:23:43', '2022-11-29 06:23:43'),
(2, 1, 14, 'fit', NULL, NULL, 131, 'YES', NULL, NULL, '2022-11-29', '2022-11-29 06:35:01', '2022-11-29 06:36:00'),
(3, 1, 70, 'fit', NULL, 3000, 127, 'NO', NULL, NULL, '2022-12-21', '2022-12-20 04:53:25', '2022-12-21 01:24:59'),
(4, 1, 71, 'fit', NULL, NULL, 127, 'YES', NULL, NULL, '2022-12-21', '2022-12-21 00:22:48', '2022-12-21 00:23:27'),
(5, 1, 65, 'unfit', NULL, 2000, 127, 'NO', NULL, NULL, '2022-12-21', '2022-12-21 01:25:38', '2022-12-21 01:25:38'),
(6, 1, 65, 'fit', 'C:\\xamppnew\\tmp\\phpF279.tmp', NULL, 129, 'NO', NULL, NULL, '2023-03-16', '2023-03-16 02:12:39', '2023-03-16 02:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `head_models`
--

CREATE TABLE `head_models` (
  `head_id` int(10) UNSIGNED NOT NULL,
  `head_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_models`
--

INSERT INTO `head_models` (`head_id`, `head_name`, `head_slug`, `created_at`, `updated_at`) VALUES
(2, 'Office', 'Office', '2022-11-23 21:20:13', '2022-11-23 21:20:13'),
(3, 'Client', 'Client', '2022-11-23 21:20:20', '2022-11-23 21:20:20'),
(4, 'Agent', 'Agent', '2022-11-23 21:20:32', '2022-11-23 21:20:32'),
(5, 'Sponsor', 'Sponsor', '2022-11-23 21:20:37', '2022-11-23 21:20:37'),
(6, 'Deligate', 'Deligate', '2022-11-23 21:20:41', '2022-11-23 21:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `invoice_no` bigint(20) DEFAULT NULL,
  `invoice_client_id` bigint(20) DEFAULT NULL,
  `invoice_agent_id` bigint(20) DEFAULT NULL,
  `invoice_delegate_id` bigint(20) DEFAULT NULL,
  `invoice_sponsor_id` bigint(20) DEFAULT NULL,
  `invoice_subtotal` bigint(20) DEFAULT NULL,
  `invoice_net_total` bigint(20) DEFAULT NULL,
  `invoice_terms` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_discount` int(11) DEFAULT NULL,
  `invoice_client_previous_balance` bigint(20) DEFAULT NULL,
  `invoice_total_profit` bigint(20) DEFAULT NULL,
  `invoice_total_cost` bigint(20) DEFAULT NULL,
  `invoice_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_sales_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_status` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `invoice_created_by` bigint(20) DEFAULT NULL,
  `invoice_updated_by` bigint(20) DEFAULT NULL,
  `invoice_deleted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `invoice_no`, `invoice_client_id`, `invoice_agent_id`, `invoice_delegate_id`, `invoice_sponsor_id`, `invoice_subtotal`, `invoice_net_total`, `invoice_terms`, `invoice_discount`, `invoice_client_previous_balance`, `invoice_total_profit`, `invoice_total_cost`, `invoice_date`, `invoice_sales_date`, `invoice_note`, `invoice_status`, `invoice_has_deleted`, `invoice_created_by`, `invoice_updated_by`, `invoice_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 22112401, 14, 30, 1, 1, 900000, 890000, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-26', NULL, NULL, 'NO', 127, NULL, NULL, '2022-11-24 02:32:43', '2022-11-24 02:32:43'),
(2, 22112401, 14, 30, 1, 1, 900000, 890000, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-26', NULL, NULL, 'NO', 127, NULL, NULL, '2022-11-24 02:33:54', '2022-11-24 02:33:54'),
(3, 22112401, 14, 30, 1, 1, 900000, 890000, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-26', NULL, NULL, 'NO', 127, NULL, NULL, '2022-11-24 02:36:04', '2022-11-24 02:36:04'),
(4, 22112401, 18, 29, 3, 1, 25000, 22600, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-26', NULL, NULL, 'NO', 127, NULL, NULL, '2022-11-24 03:09:22', '2022-11-24 03:09:22'),
(5, 22113001, 43, 28, 1, NULL, 40000, 40000, NULL, NULL, NULL, NULL, NULL, '2022-11-30', '2022-11-29', NULL, NULL, 'NO', 127, NULL, NULL, '2022-11-29 23:14:44', '2022-11-29 23:14:44'),
(6, 22120101, 44, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-02', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 21:45:40', '2022-11-30 21:45:40'),
(7, 22120101, 44, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-02', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 21:47:24', '2022-11-30 21:47:24'),
(8, 22120101, 44, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-02', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 21:48:02', '2022-11-30 21:48:02'),
(9, 22120101, 44, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-02', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 21:50:01', '2022-11-30 21:50:01'),
(10, 22120101, 44, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-02', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 21:51:13', '2022-11-30 21:51:13'),
(11, 22120106, 44, 28, 2, 4, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 21:54:19', '2022-11-30 21:54:19'),
(12, 22120107, 44, 28, 2, 4, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 21:58:49', '2022-11-30 21:58:49'),
(13, 22120108, 44, 28, 2, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:20:06', '2022-11-30 22:20:06'),
(14, 22120108, 44, 28, 2, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:20:54', '2022-11-30 22:20:54'),
(15, 22120108, 44, 28, 2, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:21:52', '2022-11-30 22:21:52'),
(16, 22120111, 47, 28, 1, 5, 350, 350, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:23:27', '2022-11-30 22:23:27'),
(17, 22120112, 44, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:36:30', '2022-11-30 22:36:30'),
(18, 22120113, 44, 28, 1, 4, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:39:50', '2022-11-30 22:39:50'),
(19, 22120113, 44, 28, 1, 4, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:40:12', '2022-11-30 22:40:12'),
(20, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:45:55', '2022-11-30 22:45:55'),
(21, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:46:40', '2022-11-30 22:46:40'),
(22, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:47:39', '2022-11-30 22:47:39'),
(23, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:47:39', '2022-11-30 22:47:39'),
(24, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:48:30', '2022-11-30 22:48:30'),
(25, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:48:30', '2022-11-30 22:48:30'),
(26, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:48:30', '2022-11-30 22:48:30'),
(27, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(28, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(29, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(30, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(31, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(32, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(33, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(34, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(35, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(36, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(37, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(38, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(39, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(40, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(41, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(42, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(43, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(44, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(45, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(46, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(47, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(48, 22120115, 44, 28, 1, 5, 900, 900, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(49, 22120144, 45, 28, 1, 4, 350, 350, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:18:28', '2022-11-30 23:18:28'),
(50, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:33:36', '2022-11-30 23:33:36'),
(51, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:34:28', '2022-11-30 23:34:28'),
(52, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:34:28', '2022-11-30 23:34:28'),
(53, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:36:04', '2022-11-30 23:36:04'),
(54, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:36:04', '2022-11-30 23:36:04'),
(55, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:36:04', '2022-11-30 23:36:04'),
(56, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(57, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(58, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(59, 22120145, 45, 28, 1, 5, 500, 500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(60, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(61, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(62, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(63, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(64, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(65, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(66, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(67, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(68, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(69, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(70, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(71, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(72, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(73, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(74, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(75, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(76, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(77, 22120145, 45, 28, 1, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(78, 22120173, 45, 28, 1, 5, 700, 700, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:52:33', '2022-11-30 23:52:33'),
(79, 22120174, 45, 28, 2, 5, 2250, 2250, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:57:44', '2022-11-30 23:57:44'),
(80, 22120175, 47, 28, 2, 5, 1400, 1400, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-11-30 23:58:53', '2022-11-30 23:58:53'),
(81, 22120176, 45, 28, 2, 5, 4000, 4000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-01 00:02:46', '2022-12-01 00:02:46'),
(82, 22120177, 44, 28, 2, 5, 690, 690, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-01 00:09:40', '2022-12-01 00:09:40'),
(83, 22120178, 47, 28, 1, 5, 550, 550, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-01 00:51:10', '2022-12-01 00:51:10'),
(84, 22120179, 45, 28, 2, 5, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-01 03:24:11', '2022-12-01 03:24:11'),
(85, 22120180, 42, 28, 2, 5, 1500, 1500, NULL, NULL, NULL, NULL, NULL, '2022-12-01', '2022-12-01', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-01 03:50:47', '2022-12-01 03:50:47'),
(86, 22120501, 41, 28, 1, 1, 350, 350, NULL, NULL, NULL, NULL, NULL, '2022-12-05', '2022-12-05', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-04 22:18:43', '2022-12-04 22:18:43'),
(87, 22120502, 41, 28, 1, 1, 750, 750, 'dffstgdtg', NULL, NULL, NULL, NULL, '2022-12-05', '2022-12-05', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-05 00:52:31', '2022-12-05 00:52:31'),
(88, 22120801, 43, 28, 1, 4, 550, 550, NULL, NULL, NULL, NULL, NULL, '2022-12-08', '2022-12-08', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-07 22:09:51', '2022-12-07 22:09:51'),
(89, 22120801, 43, 28, 1, 4, 550, 550, NULL, NULL, NULL, NULL, NULL, '2022-12-08', '2022-12-08', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-07 22:10:05', '2022-12-07 22:10:05'),
(90, 22120801, 43, 28, 1, 4, 550, 550, NULL, NULL, NULL, NULL, NULL, '2022-12-08', '2022-12-08', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-07 22:10:48', '2022-12-07 22:10:48'),
(91, 22120804, 43, 28, 1, 4, 550, 550, NULL, NULL, NULL, NULL, NULL, '2022-12-08', '2022-12-08', NULL, NULL, 'NO', 126, NULL, NULL, '2022-12-07 22:12:45', '2022-12-07 22:12:45'),
(92, 22120804, 43, 28, 1, 4, 550, 550, NULL, NULL, NULL, NULL, NULL, '2022-12-08', NULL, NULL, NULL, 'NO', NULL, 126, NULL, '2022-12-08 04:36:27', '2022-12-08 04:36:27'),
(93, 22120804, 43, 28, 1, 4, 1200, 1200, NULL, NULL, NULL, NULL, NULL, '2022-12-08', '2022-12-08', NULL, NULL, 'NO', NULL, 126, NULL, '2022-12-08 04:37:59', '2022-12-08 04:37:59'),
(94, 22120804, 43, 28, 1, 4, 4500, 4500, NULL, NULL, NULL, NULL, NULL, '2022-12-08', '2022-12-08', NULL, NULL, 'NO', NULL, 126, NULL, '2022-12-08 04:40:53', '2022-12-08 05:51:13'),
(95, 22120808, 42, 28, 3, 5, 665, 665, NULL, NULL, NULL, NULL, NULL, '2022-12-08', NULL, NULL, NULL, 'NO', 126, 126, NULL, '2022-12-08 06:11:55', '2022-12-08 06:48:43'),
(96, 22120809, 43, 28, 3, 5, 480, 480, NULL, NULL, NULL, NULL, NULL, '2022-12-08', NULL, NULL, NULL, 'NO', 126, 126, NULL, '2022-12-08 06:53:18', '2022-12-08 07:11:46'),
(97, 22121101, 89, 30, 3, 3, 15000, 15000, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-10 20:56:50', '2022-12-10 20:56:50'),
(98, 22121101, 89, 30, 3, 3, 22000, 22000, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, NULL, 'NO', 127, 127, NULL, '2022-12-10 20:58:01', '2022-12-10 20:59:53'),
(99, 22121103, 90, 31, 3, 1, 9000, 9000, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-10 21:01:46', '2022-12-10 21:15:07'),
(100, 22121104, 91, 28, 3, 3, 12000, 12000, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-22', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-10 21:16:28', '2022-12-10 21:17:22'),
(101, 22121105, 92, 32, 1, 1, 3000, 3000, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-10 23:25:05', '2022-12-10 23:26:29'),
(102, 22121106, 93, 35, 2, 2, 3000, 3000, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 02:12:23', '2022-12-11 02:13:22'),
(103, 22121107, 94, 28, 1, 3, 300, 300, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 03:02:35', '2022-12-11 03:05:28'),
(104, 22121108, 95, 32, 3, 3, 250, 250, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 03:06:50', '2022-12-11 03:07:39'),
(105, 22121109, 96, 37, 3, 3, 500, 500, 'this is mf loan', NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 03:16:56', '2022-12-11 03:18:38'),
(106, 22121110, 97, 35, 3, 3, 600, 600, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 03:28:17', '2022-12-11 03:30:35'),
(107, 22121111, 98, 37, 3, 3, 1000, 1000, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 03:34:13', '2022-12-11 03:36:02'),
(108, 22121112, 99, 30, 3, 1, 400, 400, 'this is moon\'s fair', NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 03:55:46', '2022-12-11 03:58:49'),
(109, 22121113, 99, 28, 1, 1, 300, 300, NULL, NULL, NULL, NULL, NULL, '2022-12-11', '2022-12-11', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-11 04:02:45', '2022-12-11 04:05:01'),
(110, 22121201, 100, 33, 3, 3, 5000, 5000, NULL, NULL, NULL, NULL, NULL, '2022-12-12', '2022-12-12', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-12 00:18:50', '2022-12-12 00:19:41'),
(111, 22121401, 102, 46, 1, 4, 1200, 1200, NULL, NULL, NULL, 200, 1000, '2022-12-14', '2022-12-14', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-13 23:52:30', '2022-12-13 23:52:30'),
(112, 22121801, 103, 29, 5, 4, 1500, 1500, NULL, NULL, NULL, 50, 450, '2022-12-18', '2022-12-19', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-17 21:02:39', '2022-12-17 21:02:39'),
(113, 22121802, 104, 43, 2, 5, 700, 700, NULL, NULL, NULL, 250, 450, '2022-12-18', '2022-12-18', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-17 21:09:38', '2022-12-17 21:11:16'),
(114, 22121803, 105, 29, 2, 5, 400, 400, NULL, NULL, NULL, 350, 50, '2022-12-18', '2022-12-18', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-17 21:13:46', '2022-12-17 21:13:46'),
(115, 22121804, 105, 46, 4, 4, 100, 100, NULL, NULL, NULL, 50, 50, '2022-12-18', '2022-12-01', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-17 21:17:29', '2022-12-17 21:28:54'),
(116, 22121805, 106, 29, 2, 6, 500, 500, 'afafafaf', NULL, NULL, 50, 450, '2022-12-18', NULL, NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-17 21:31:14', '2022-12-17 21:33:49'),
(117, 22121806, 107, 32, 1, 5, 500, 500, NULL, NULL, NULL, 50, 450, '2022-12-18', '2022-12-18', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-17 21:45:22', '2022-12-17 21:46:36'),
(118, 22121807, 107, 43, 2, 5, 1750, 1750, NULL, NULL, NULL, 100, 650, '2022-12-18', '2022-12-18', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-17 21:48:30', '2022-12-17 21:48:30'),
(119, 22121808, 107, 31, 3, 5, 1500, 1500, NULL, NULL, NULL, 0, 500, '2022-12-18', '2022-12-18', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-17 22:05:14', '2022-12-17 22:05:14'),
(120, 22121809, 107, 28, 1, 4, 3000, 3000, NULL, NULL, NULL, 500, 500, '2022-12-18', '2022-12-18', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-17 22:12:21', '2022-12-17 22:12:21'),
(121, 22121810, 107, 30, 1, 5, 3000, 3000, NULL, NULL, NULL, 1500, 1500, '2022-12-19', NULL, NULL, 'refunded', 'NO', 127, 127, NULL, '2022-12-17 22:15:11', '2022-12-18 21:18:15'),
(122, 22121902, 107, 28, 1, 6, 19050, 19050, 'this is fair', NULL, NULL, 2500, 1400, '2022-12-19', '2022-12-19', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-18 21:27:25', '2022-12-18 21:27:25'),
(123, 22121903, 105, 42, 3, 5, 2700, 2700, 'special client package', NULL, NULL, 950, 1750, '2022-12-19', '2022-12-19', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(124, 22121904, 105, 29, 3, 6, 3200, 3200, NULL, NULL, NULL, 100, 1300, '2022-12-19', '2022-12-30', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-19 04:01:30', '2022-12-19 04:01:30'),
(125, 22121905, 105, 31, 2, 5, 1600, 1600, NULL, NULL, NULL, 500, 100, '2022-12-19', '2022-12-19', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-19 04:04:53', '2022-12-19 04:04:53'),
(126, 22121906, 105, 33, 5, 6, 380, 380, NULL, NULL, NULL, 70, 60, '2022-12-19', '2022-12-19', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-19 04:07:24', '2022-12-19 04:08:12'),
(127, 22121907, 108, 33, 2, 5, 500, 500, NULL, NULL, NULL, 200, 300, '2022-12-19', '2022-12-19', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-19 04:18:33', '2022-12-19 04:19:31'),
(128, 22121908, 108, 31, 1, 5, 3500, 3500, 'deff', NULL, NULL, 200, 500, '2022-12-19', '2022-12-19', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-19 04:22:16', '2022-12-19 04:24:58'),
(129, 22121909, 108, 46, 5, 6, 3300, 3300, NULL, NULL, NULL, 500, 600, '2022-12-19', '2022-12-19', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-19 04:35:29', '2022-12-19 04:37:13'),
(130, 22121910, 108, 36, 2, 5, 8100, 8100, NULL, NULL, NULL, 2400, 300, '2022-12-19', '2022-12-19', NULL, 'refunded', 'NO', 127, 1, NULL, '2022-12-19 04:42:06', '2022-12-19 05:18:11'),
(131, 22122701, 86, 38, 1, 4, 5000, 4998, 'test', 2, NULL, 2000, 3000, '2022-12-27', '2022-12-27', NULL, NULL, 'NO', 127, NULL, NULL, '2022-12-27 01:16:14', '2022-12-27 01:16:14'),
(132, 23012501, 75, 38, NULL, 5, 6666, 5666, 'test', 1000, NULL, 1333, 2000, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-24 21:15:37', '2023-01-24 21:15:37'),
(133, 23012502, 74, 38, NULL, 4, 60000, 60000, 'test', NULL, NULL, 0, 25000, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-24 21:24:20', '2023-01-24 21:24:20'),
(134, 23012503, 74, 39, NULL, 6, 4000, 4000, 'tesyt', NULL, NULL, -2996, 3000, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-24 22:08:01', '2023-01-24 22:08:01'),
(135, 23012504, 84, 39, NULL, 4, 2, 2, NULL, NULL, NULL, 0, 2, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-24 22:38:03', '2023-01-24 22:38:03'),
(136, 23012505, 87, 39, NULL, 5, 14000, 13400, 'test', 600, NULL, 6000, 1000, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-24 23:52:46', '2023-01-24 23:52:46'),
(137, 23012506, 74, 38, NULL, 5, 15500, 15500, 'test', NULL, NULL, 0, 1500, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-25 04:56:40', '2023-01-25 04:56:40'),
(138, 23012507, 75, 38, NULL, 5, 120000, 120000, 'test', NULL, NULL, 40000, 20000, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-25 05:04:28', '2023-01-25 05:04:28'),
(139, 23012508, 84, 38, NULL, 5, 550, 550, NULL, NULL, NULL, -550, 1100, '2023-01-25', '2023-01-25', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-25 05:10:18', '2023-01-25 05:10:18'),
(140, 23012601, 92, 38, NULL, 5, 19000, 18500, 'test', 500, NULL, 6000, 2000, '2023-01-26', '2023-01-26', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-25 21:03:20', '2023-01-25 21:03:20'),
(141, 23012602, 74, 38, NULL, 5, 11000, 10000, 'test', 1000, NULL, 6000, 2000, '2023-01-26', '2023-01-26', NULL, NULL, 'NO', 127, NULL, NULL, '2023-01-25 21:14:33', '2023-01-25 21:14:33'),
(142, 23040601, 65, 28, 1, 4, 600, 600, NULL, NULL, NULL, 50, 250, '2023-04-06', '2023-04-06', NULL, NULL, 'NO', 129, NULL, NULL, '2023-04-05 21:00:31', '2023-04-05 21:00:31'),
(143, 23040602, 65, 28, 2, 5, 800, 800, NULL, NULL, NULL, 100, 300, '2023-04-06', '2023-04-06', NULL, NULL, 'NO', 129, NULL, NULL, '2023-04-05 21:01:38', '2023-04-05 21:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_billing_infos`
--

CREATE TABLE `invoice_billing_infos` (
  `billing_id` int(10) UNSIGNED NOT NULL,
  `billing_invoice_id` bigint(20) DEFAULT NULL,
  `billing_product` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_vendor` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_quantity` bigint(20) DEFAULT NULL,
  `billing_unit_price` bigint(20) DEFAULT NULL,
  `billing_subtotal` bigint(20) DEFAULT NULL,
  `billing_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_cost_price` int(11) DEFAULT NULL,
  `billing_sale_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_billing_infos`
--

INSERT INTO `invoice_billing_infos` (`billing_id`, `billing_invoice_id`, `billing_product`, `billing_vendor`, `billing_quantity`, `billing_unit_price`, `billing_subtotal`, `billing_status`, `billing_date`, `billing_description`, `billing_cost_price`, `billing_sale_price`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, 10, 90000, NULL, '1', '2022-11-24', NULL, 83000, 90000, '2022-11-24 02:33:54', '2022-11-24 02:33:54'),
(2, 3, NULL, NULL, 10, 90000, NULL, '1', '2022-11-24', NULL, 83000, 90000, '2022-11-24 02:36:04', '2022-11-24 02:36:04'),
(3, 4, NULL, NULL, 100, 250, NULL, '1', '2022-11-24', NULL, 500, 250, '2022-11-24 03:09:22', '2022-11-24 03:09:22'),
(4, 5, NULL, NULL, 1, 5000, NULL, '1', '2022-11-30', NULL, 4000, 5000, '2022-11-29 23:14:44', '2022-11-29 23:14:44'),
(5, 6, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 21:45:40', '2022-11-30 21:45:40'),
(6, 7, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 21:47:24', '2022-11-30 21:47:24'),
(7, 8, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 21:48:02', '2022-11-30 21:48:02'),
(8, 9, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 21:50:01', '2022-11-30 21:50:01'),
(9, 10, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 21:51:13', '2022-11-30 21:51:13'),
(10, 11, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 360, 500, '2022-11-30 21:54:19', '2022-11-30 21:54:19'),
(11, 12, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 380, 500, '2022-11-30 21:58:49', '2022-11-30 21:58:49'),
(12, 13, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 240, 500, '2022-11-30 22:20:06', '2022-11-30 22:20:06'),
(13, 14, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 240, 500, '2022-11-30 22:20:54', '2022-11-30 22:20:54'),
(14, 15, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 240, 500, '2022-11-30 22:21:52', '2022-11-30 22:21:52'),
(15, 16, NULL, NULL, 1, 350, NULL, '1', '2022-12-01', NULL, 240, 350, '2022-11-30 22:23:27', '2022-11-30 22:23:27'),
(16, 17, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 290, 500, '2022-11-30 22:36:30', '2022-11-30 22:36:30'),
(17, 18, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 360, 500, '2022-11-30 22:39:50', '2022-11-30 22:39:50'),
(18, 19, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 360, 500, '2022-11-30 22:40:12', '2022-11-30 22:40:12'),
(19, 20, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:45:55', '2022-11-30 22:45:55'),
(20, 21, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:46:40', '2022-11-30 22:46:40'),
(21, 22, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:47:39', '2022-11-30 22:47:39'),
(22, 23, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:47:39', '2022-11-30 22:47:39'),
(23, 24, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:48:30', '2022-11-30 22:48:30'),
(24, 25, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:48:30', '2022-11-30 22:48:30'),
(25, 26, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:48:30', '2022-11-30 22:48:30'),
(26, 27, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(27, 28, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(28, 29, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(29, 30, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:49:01', '2022-11-30 22:49:01'),
(30, 31, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(31, 32, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(32, 33, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(33, 34, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(34, 35, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:51:30', '2022-11-30 22:51:30'),
(35, 36, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(36, 37, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(37, 38, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(38, 39, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(39, 40, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(40, 41, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:27', '2022-11-30 22:52:27'),
(41, 42, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(42, 43, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(43, 44, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(44, 45, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(45, 46, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(46, 47, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(47, 48, NULL, NULL, 1, 900, NULL, '1', '2022-12-01', NULL, 500, 900, '2022-11-30 22:52:49', '2022-11-30 22:52:49'),
(48, 49, NULL, NULL, 1, 350, NULL, '1', '2022-12-01', NULL, 250, 350, '2022-11-30 23:18:28', '2022-11-30 23:18:28'),
(49, 50, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:33:36', '2022-11-30 23:33:36'),
(50, 51, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:34:28', '2022-11-30 23:34:28'),
(51, 52, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:34:28', '2022-11-30 23:34:28'),
(52, 53, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:36:04', '2022-11-30 23:36:04'),
(53, 54, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:36:04', '2022-11-30 23:36:04'),
(54, 55, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:36:04', '2022-11-30 23:36:04'),
(55, 56, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(56, 57, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(57, 58, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(58, 59, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:36:24', '2022-11-30 23:36:24'),
(59, 60, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(60, 61, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(61, 62, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(62, 63, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(63, 64, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:37:56', '2022-11-30 23:37:56'),
(64, 65, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(65, 66, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(66, 67, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(67, 68, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(68, 69, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(69, 70, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:49:57', '2022-11-30 23:49:57'),
(70, 71, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(71, 72, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(72, 73, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(73, 74, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(74, 75, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(75, 76, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(76, 77, NULL, NULL, 1, 500, NULL, '1', '2022-12-01', NULL, 250, 500, '2022-11-30 23:51:09', '2022-11-30 23:51:09'),
(77, 78, NULL, NULL, 2, 350, NULL, '1', '2022-12-01', NULL, 340, 350, '2022-11-30 23:52:33', '2022-11-30 23:52:33'),
(78, 79, NULL, NULL, 5, 450, NULL, '1', '2022-12-01', NULL, 350, 450, '2022-11-30 23:57:44', '2022-11-30 23:57:44'),
(79, 80, NULL, NULL, 4, 350, NULL, '1', '2022-12-01', NULL, 250, 350, '2022-11-30 23:58:53', '2022-11-30 23:58:53'),
(80, 81, NULL, NULL, 5, 800, NULL, '1', '2022-12-01', NULL, 500, 800, '2022-12-01 00:02:46', '2022-12-01 00:02:46'),
(81, 82, NULL, 'afffg', 1, 690, NULL, '1', '2022-12-01', NULL, 360, 690, '2022-12-01 00:09:40', '2022-12-01 00:09:40'),
(82, 83, NULL, 'dsgg', 1, 550, NULL, '1', '2022-12-01', 'dsf', 350, 550, '2022-12-01 00:51:10', '2022-12-01 00:51:10'),
(83, 84, NULL, NULL, 1, 1000, NULL, '1', '2022-12-01', NULL, 150, 1000, '2022-12-01 03:24:11', '2022-12-01 03:24:11'),
(84, 85, NULL, NULL, 1, 1500, NULL, '1', '2022-12-01', NULL, 500, 1500, '2022-12-01 03:50:47', '2022-12-01 03:50:47'),
(85, 86, NULL, NULL, 1, 350, NULL, '1', '2022-12-05', NULL, 250, 350, '2022-12-04 22:18:43', '2022-12-04 22:18:43'),
(86, 87, NULL, 'fddh', 1, 350, NULL, '1', '2022-12-05', 'fdgfdg', 250, 350, '2022-12-05 00:52:31', '2022-12-05 00:52:31'),
(87, NULL, 'PASSPORT', 'dgsgsdg', 1, 550, NULL, '1', '2022-12-08', 'dfdg', 430, 550, '2022-12-07 22:10:48', '2022-12-07 22:10:48'),
(88, 91, 'PASSPORT', 'asdgasg', 1, 550, NULL, '1', '2022-12-08', 'agsag', 420, 550, '2022-12-07 22:12:45', '2022-12-07 22:12:45'),
(89, 92, NULL, 'asdgasg', 1, 550, NULL, '1', '2022-12-08', 'agsag', 420, 550, '2022-12-08 04:36:27', '2022-12-08 04:36:27'),
(90, 93, NULL, 'asdgasg', 2, 600, NULL, '1', '2022-12-08', 'agsag', 420, 600, '2022-12-08 04:37:59', '2022-12-08 04:37:59'),
(91, 94, NULL, 'asdgasg', 5, 800, NULL, '1', '2022-12-08', 'agsag', 420, 800, '2022-12-08 04:40:53', '2022-12-08 04:40:53'),
(92, 95, NULL, 'dsafasf', 7, 95, NULL, '1', NULL, 'sdgsdgg', 50, 95, '2022-12-08 06:11:55', '2022-12-08 06:50:36'),
(93, 96, NULL, 'dfhshg', 5, 96, NULL, '1', NULL, 'fgh', 55, 96, '2022-12-08 06:53:18', '2022-12-08 07:11:46'),
(94, 97, 'PASSPORT', 'faaff', 3, 5000, NULL, '1', '2022-12-11', 'fafa', 4500, 5000, '2022-12-10 20:56:50', '2022-12-10 20:56:50'),
(95, 98, 'PASSPORT', 'faaff', 4, 5500, NULL, '1', '2022-12-11', 'fafa', 4500, 5500, '2022-12-10 20:58:01', '2022-12-10 20:59:53'),
(96, 99, 'PASSPORT', '11fe45ef1', 3, 3000, 9000, '1', '2022-12-11', 'fafaeffa', 2500, 3000, '2022-12-10 21:01:46', '2022-12-10 21:15:07'),
(97, 100, 'MEDICAL_TEST', 'fafafa', 1, 4000, 4000, '1', '2022-12-11', 'faf', 2500, 4000, '2022-12-10 21:16:28', '2022-12-10 21:17:22'),
(98, 101, 'PASSPORT', 'fafafa', 0, 3000, 0, '1', '2022-12-11', 'faaf', 1000, 3000, '2022-12-10 23:25:05', '2022-12-10 23:26:29'),
(99, 102, 'PASSPORT', 'faafaf', 0, 3000, 0, '1', '2022-12-11', 'afaf', 2500, 3000, '2022-12-11 02:12:23', '2022-12-11 02:13:22'),
(100, 103, 'PASSPORT', 'fafaaf', 0, 300, 0, '1', '2022-12-11', 'faag', 250, 300, '2022-12-11 03:02:35', '2022-12-11 03:05:28'),
(101, 104, 'MANPOWER', NULL, 0, 250, 0, '1', '2022-12-11', NULL, 120, 250, '2022-12-11 03:06:50', '2022-12-11 03:07:39'),
(102, 105, 'MEDICAL_TEST', 'bafhaf', 0, 500, 0, '1', '2022-12-11', 'fab', 400, 500, '2022-12-11 03:16:56', '2022-12-11 03:18:38'),
(103, 106, 'POLICE_CLEARENCE', 'gagaag', 0, 600, 0, '1', '2022-12-11', 'agag', 250, 600, '2022-12-11 03:28:17', '2022-12-11 03:30:35'),
(104, 107, 'PASSPORT', 'affafdfa', 0, 1000, 0, '1', '2022-12-11', 'faffa', 500, 1000, '2022-12-11 03:34:13', '2022-12-11 03:36:02'),
(105, 108, 'PASSPORT', 'bhfbah', 0, 400, 0, '1', '2022-12-11', 'fahb', 250, 400, '2022-12-11 03:55:46', '2022-12-11 03:58:49'),
(106, 109, 'PASSPORT', 'sasfsfg', 0, 300, 0, '1', '2022-12-11', 'DXCFVBGhnj', 200, 300, '2022-12-11 04:02:45', '2022-12-11 04:05:01'),
(107, 110, 'VISA', NULL, 0, 5000, 0, '1', '2022-12-12', NULL, 2500, 5000, '2022-12-12 00:18:50', '2022-12-12 00:19:41'),
(108, 111, 'PASSPORT', 'fafaaf', 1, 1200, NULL, '1', '2022-12-14', 'afaf', 1000, 1200, '2022-12-13 23:52:30', '2022-12-13 23:52:30'),
(109, 112, 'PASSPORT', 'feaeffefae', 3, 500, NULL, '1', '2022-12-18', 'feafefa', 450, 500, '2022-12-17 21:02:39', '2022-12-17 21:02:39'),
(110, 113, 'PASSPORT', 'fefefe', 0, 700, 0, '1', '2022-12-18', 'affe', 450, 700, '2022-12-17 21:09:38', '2022-12-17 21:11:16'),
(111, 114, 'VISA', '1af1af4', 1, 400, NULL, '1', '2022-12-18', '7f41afa', 50, 400, '2022-12-17 21:13:46', '2022-12-17 21:13:46'),
(112, 115, 'PASSPORT', 'faaff', 0, 100, 0, '1', '2022-12-18', 'faf', 50, 100, '2022-12-17 21:17:29', '2022-12-17 21:28:54'),
(113, 116, 'VISA', 'fafaaf', 0, 500, 0, '1', '2022-12-18', 'affaf', 450, 500, '2022-12-17 21:31:14', '2022-12-17 21:33:49'),
(114, 117, 'PASSPORT', 'fefefefe', 0, 500, 0, '1', '2022-12-18', 'effef', 450, 500, '2022-12-17 21:45:22', '2022-12-17 21:46:36'),
(115, 118, 'PASSPORT', '121152112', 1, 750, NULL, '1', '2022-12-18', '4151', 650, 750, '2022-12-17 21:48:30', '2022-12-17 21:48:30'),
(116, 119, 'PASSPORT', 'AFAFAF', 1, 500, NULL, '1', '2022-12-18', 'AFAF', 500, 500, '2022-12-17 22:05:14', '2022-12-17 22:05:14'),
(117, 120, 'PASSPORT', 'affafa', 1, 1000, NULL, '1', '2022-12-18', 'faffa', 500, 1000, '2022-12-17 22:12:21', '2022-12-17 22:12:21'),
(118, 121, 'PASSPORT', 'fafafa', 1, 2000, NULL, '1', NULL, 'fafaaf', 500, 2000, '2022-12-17 22:15:11', '2022-12-18 21:18:15'),
(119, 121, 'PASSPORT', '1fa4fa14fa', 1, 3000, NULL, '1', NULL, 'af14fa1fa4', 1000, 3000, '2022-12-17 22:15:11', '2022-12-18 21:18:15'),
(120, 122, 'PASSPORT', '1415', 2, 1650, 3300, '1', '2022-12-19', '200000', 850, 1650, '2022-12-18 21:27:25', '2022-12-18 21:27:25'),
(121, 122, 'POLICE_CLEARENCE', '15faf515', 7, 2250, 15750, '1', '2022-12-19', '85151afs1af5', 550, 2250, '2022-12-18 21:27:25', '2022-12-18 21:27:25'),
(122, 123, 'PASSPORT', 'eafffe', 1, 900, 900, '1', '2022-12-19', 'fafe', 850, 900, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(123, 123, 'TRAINING_CARD', 'bfabfh', 1, 100, 100, '1', '2022-12-19', 'baaf', 50, 100, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(124, 123, 'POLICE_CLEARENCE', 'fnajanfj', 1, 200, 200, '1', '2022-12-19', 'avbfhfabh', 100, 200, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(125, 123, 'MEDICAL_TEST', 'fhabfheb', 1, 300, 300, '1', '2022-12-19', 'efaehbfaeyb', 150, 300, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(126, 123, 'MANPOWER', 'faeefe', 1, 500, 500, '1', '2022-12-19', 'efafeefa', 250, 500, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(127, 123, 'VISA', 'efaaefafe', 1, 700, 700, '1', '2022-12-19', 'fefeae', 350, 700, '2022-12-18 21:38:49', '2022-12-18 21:38:49'),
(128, 124, 'PASSPORT', 'feeffefe', 1, 500, 500, '1', '2022-12-19', 'fefefe', 450, 500, '2022-12-19 04:01:30', '2022-12-19 04:01:30'),
(129, 124, 'POLICE_CLEARENCE', 'fnjfnfjheje', 3, 900, 2700, '1', '2022-12-19', 'nbgjggrn', 850, 900, '2022-12-19 04:01:30', '2022-12-19 04:01:30'),
(130, 125, 'PASSPORT', 'wssss', 2, 200, 400, '1', '2022-12-19', 'feefef', 80, 200, '2022-12-19 04:04:53', '2022-12-19 04:04:53'),
(131, 125, 'POLICE_CLEARENCE', 'fefeee', 3, 400, 1200, '1', '2022-12-19', 'afefafe', 20, 400, '2022-12-19 04:04:53', '2022-12-19 04:04:53'),
(132, 126, 'MANPOWER', 'efeffe', 0, 40, 200, '1', '2022-12-19', 'aff', 20, 40, '2022-12-19 04:07:24', '2022-12-19 04:08:12'),
(133, 126, 'TRAINING_CARD', 'wfwf', 0, 90, 180, '1', '2022-12-19', 'fefefew', 40, 90, '2022-12-19 04:07:24', '2022-12-19 04:08:12'),
(134, 127, 'PASSPORT', 'feefefe', 0, 500, 500, '1', '2022-12-19', 'afdaeffe', 300, 500, '2022-12-19 04:18:33', '2022-12-19 04:19:31'),
(135, 128, 'PASSPORT', '1af5af1fa5', 1, 700, 3500, '1', '2022-12-19', 'fa4affa1f', 500, 700, '2022-12-19 04:22:16', '2022-12-19 04:24:58'),
(136, 129, 'POLICE_CLEARENCE', 'efffefe', 0, 500, 1500, '1', '2022-12-19', 'fef', 350, 500, '2022-12-19 04:35:29', '2022-12-19 04:37:13'),
(137, 129, 'TRAINING_CARD', 'fa1af1', 0, 600, 1800, '1', '2022-12-19', '1fe1', 250, 600, '2022-12-19 04:35:29', '2022-12-19 04:37:13'),
(138, 130, 'PASSPORT', 'af', 0, 200, 600, '1', '2022-12-19', 'fa', 50, 200, '2022-12-19 04:42:06', '2022-12-19 05:18:11'),
(139, 130, 'TRAINING_CARD', 'fa', 0, 700, 2100, '1', '2022-12-19', 'fa', 50, 700, '2022-12-19 04:42:06', '2022-12-19 05:18:11'),
(140, 130, 'POLICE_CLEARENCE', 'fa', 0, 600, 1800, '1', '2022-12-19', 'fa', 50, 600, '2022-12-19 04:42:06', '2022-12-19 05:18:11'),
(141, 130, 'MEDICAL_TEST', 'fa', 0, 500, 1500, '1', '2022-12-19', 'fa', 50, 500, '2022-12-19 04:42:06', '2022-12-19 05:18:11'),
(142, 130, 'MANPOWER', 'fa', 0, 400, 1200, '1', '2022-12-19', 'fa', 50, 400, '2022-12-19 04:42:06', '2022-12-19 05:18:11'),
(143, 130, 'VISA', 'fa', 0, 300, 900, '1', '2022-12-19', 'fa', 50, 300, '2022-12-19 04:42:06', '2022-12-19 05:18:11'),
(144, 131, 'PASSPORT', 'test', 1, 2000, 2000, '1', '2022-12-27', 'test', 1000, 2000, '2022-12-27 01:16:14', '2022-12-27 01:16:14'),
(145, 131, 'VISA', 'tst', 1, 3000, 3000, '1', '2022-12-27', 'test', 2000, 3000, '2022-12-27 01:16:14', '2022-12-27 01:16:14'),
(146, 132, '2', NULL, 2, 1111, 2222, '1', '2023-01-25', 'test', 1000, 1111, '2023-01-24 21:15:37', '2023-01-24 21:15:37'),
(147, 132, NULL, NULL, 2, 2222, 4444, '1', '2023-01-25', 'tessse', 1000, 2222, '2023-01-24 21:15:37', '2023-01-24 21:15:37'),
(148, 133, '2', '1', 3, 10000, 30000, '1', '2023-01-25', NULL, 10000, 10000, '2023-01-24 21:24:20', '2023-01-24 21:24:20'),
(149, 133, NULL, NULL, 2, 15000, 30000, '1', '2023-01-25', NULL, 15000, 15000, '2023-01-24 21:24:20', '2023-01-24 21:24:20'),
(150, 134, '2', '1', 1000, 2, 2000, '1', '2023-01-25', NULL, 1000, 2, '2023-01-24 22:08:01', '2023-01-24 22:08:01'),
(151, 134, NULL, NULL, 1000, 2, 2000, '1', '2023-01-25', NULL, 2000, 2, '2023-01-24 22:08:01', '2023-01-24 22:08:01'),
(152, 135, '2', NULL, 1, 1, 1, '1', '2023-01-25', NULL, 1, 1, '2023-01-24 22:38:03', '2023-01-24 22:38:03'),
(153, 135, NULL, NULL, 1, 1, 1, '1', '2023-01-25', NULL, 1, 1, '2023-01-24 22:38:03', '2023-01-24 22:38:03'),
(154, 136, '3', '1', 2, 7000, 14000, '1', '2023-01-25', 't', 1000, 7000, '2023-01-24 23:52:46', '2023-01-24 23:52:46'),
(155, 137, '3', '1', 15, 1000, NULL, '1', '2023-01-25', 'test', 1000, 1000, '2023-01-25 04:56:40', '2023-01-25 04:56:40'),
(156, 137, NULL, NULL, 1, 500, NULL, '1', '2023-01-25', 'test', 500, 500, '2023-01-25 04:56:40', '2023-01-25 04:56:40'),
(157, 138, '3', '1', 2, 10000, NULL, '1', '2023-01-25', 't', 10000, 10000, '2023-01-25 05:04:28', '2023-01-25 05:04:28'),
(158, 138, NULL, NULL, 2, 50000, NULL, '1', '2023-01-25', 'y', 10000, 50000, '2023-01-25 05:04:28', '2023-01-25 05:04:28'),
(159, 139, '2', '1', 1, 500, NULL, '1', '2023-01-25', 'test', 1000, 500, '2023-01-25 05:10:18', '2023-01-25 05:10:18'),
(160, 139, NULL, NULL, 1, 50, NULL, '1', '2023-01-25', 't', 100, 50, '2023-01-25 05:10:18', '2023-01-25 05:10:18'),
(161, 140, '2', '1', 2, 5000, NULL, '1', '2023-01-26', NULL, 1000, 5000, '2023-01-25 21:03:20', '2023-01-25 21:03:20'),
(162, 140, '3', NULL, 3, 3000, NULL, '1', '2023-01-26', NULL, 1000, 3000, '2023-01-25 21:03:20', '2023-01-25 21:03:20'),
(163, 141, '3', '1', 1, 5000, NULL, '1', '2023-01-26', 't', 1000, 5000, '2023-01-25 21:14:33', '2023-01-25 21:14:33'),
(164, 141, '2', '1', 2, 3000, NULL, '1', '2023-01-26', 't', 1000, 3000, '2023-01-25 21:14:33', '2023-01-25 21:14:33'),
(165, 142, '3', NULL, 2, 300, NULL, '1', '2023-04-06', NULL, 250, 300, '2023-04-05 21:00:31', '2023-04-05 21:00:31'),
(166, 143, '4', '2', 2, 400, NULL, '1', '2023-04-06', NULL, 300, 400, '2023-04-05 21:01:38', '2023-04-05 21:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_history`
--

CREATE TABLE `invoice_history` (
  `history_id` int(10) UNSIGNED NOT NULL,
  `history_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history_invoice_id` bigint(20) DEFAULT NULL,
  `history_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history_created_by` bigint(20) DEFAULT NULL,
  `history_updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `jobtype_id` int(11) NOT NULL,
  `jobtype` text DEFAULT NULL,
  `jobtype_status` tinyint(1) NOT NULL DEFAULT 1,
  `jobtype_create_date` text DEFAULT NULL,
  `jobtype_created_by` int(11) DEFAULT NULL,
  `job_type_has_deleted` varchar(255) NOT NULL DEFAULT 'NO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`jobtype_id`, `jobtype`, `jobtype_status`, `jobtype_create_date`, `jobtype_created_by`, `job_type_has_deleted`, `created_at`, `updated_at`) VALUES
(2, 'weldingfafae', 1, '2023-03-14', 129, 'NO', '2023-03-13 22:12:17', '2023-03-13 22:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `manpowers`
--

CREATE TABLE `manpowers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manpower_client_id` int(255) DEFAULT NULL,
  `manpower_vendor_id` int(11) DEFAULT NULL,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_status` int(255) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manpowers`
--

INSERT INTO `manpowers` (`id`, `manpower_client_id`, `manpower_vendor_id`, `office_name`, `office_address`, `job_type`, `comment`, `processing_cost`, `office_status`, `note`, `created_by`, `deleted_by`, `updated_by`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Test Office', 'Tesst Address', 'Test Job', 'Test Comment', '1212121', 1, NULL, NULL, NULL, '126', '0', '2022-11-20 03:39:19', '2022-11-19 18:00:00'),
(2, NULL, NULL, 'Test Office111212', 'Tesst Address11', 'Test Job11', '12123123', '111111', 0, NULL, NULL, '126', NULL, '1', '2022-11-20 03:43:39', '2022-11-20 04:50:12'),
(3, NULL, NULL, 'Test OfficeArmaa', 'Tesst Address12312321321', 'Test Job123123123', '12312423443513451', '12121321', 1, NULL, '126', NULL, '126', '0', '2022-11-20 04:46:24', '2022-11-19 18:00:00'),
(4, NULL, NULL, 'Test OfficeArmaao', '123213412423', '12312312', '1231231231', '1231231', 0, NULL, '126', '126', '126', '1', '2022-11-20 04:55:07', '2022-11-20 04:56:27'),
(5, NULL, NULL, 'Test Office', 'Tesst Address', 'Test Job1111', '123123123', '1212121', 0, NULL, '126', '126', '126', '1', '2022-11-20 22:54:32', '2022-11-20 22:55:55'),
(6, 70, NULL, 'Test Office', 'dhaka', 'Test Job', NULL, '1200', 1, NULL, '127', NULL, '127', 'NO', '2022-12-20 03:02:04', '2022-12-19 18:00:00'),
(7, 109, 1, 'Test Office', 'Tesst Address', 'Test Job', NULL, '1200', 1, NULL, '127', NULL, '127', 'NO', '2022-12-20 06:06:07', '2022-12-20 18:00:00'),
(8, 72, NULL, NULL, NULL, 'work visa', NULL, NULL, 1, 'bh hgfdrtfgvb', '129', NULL, NULL, 'NO', '2023-03-14 21:55:31', '2023-03-14 21:55:31'),
(9, 72, NULL, NULL, NULL, 'work visa', NULL, NULL, 1, 'bh hgfdrtfgvb', '129', NULL, NULL, 'NO', '2023-03-14 21:55:40', '2023-03-14 21:55:40'),
(10, 72, NULL, NULL, NULL, 'work visa', NULL, NULL, 1, 'bh hgfdrtfgvb', '129', NULL, NULL, 'NO', '2023-03-14 21:55:42', '2023-03-14 21:55:42'),
(11, 71, 2, 'vafubfjaf', 'bfayhabhjf', 'nafjnaf', 'afaf4f4afa', '5000', 1, 'f15fa1a5faf', '129', NULL, NULL, 'NO', '2023-04-25 21:39:04', '2023-04-25 21:39:04'),
(12, 81, 2, '41a1ffa51a5f1', '5f1af5f1a5', '0f1fa5af', '5814q5f1fq', '40000', 1, '21fa1afaf', '129', NULL, NULL, 'NO', '2023-04-25 21:40:27', '2023-04-25 21:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `medicals`
--

CREATE TABLE `medicals` (
  `medical_id` int(10) UNSIGNED NOT NULL,
  `medical_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_cost_amount` bigint(20) DEFAULT NULL,
  `medical_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_created_by` bigint(20) DEFAULT NULL,
  `medical_has_deleted` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'No',
  `medical_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicals`
--

INSERT INTO `medicals` (`medical_id`, `medical_name`, `medical_phone`, `medical_remarks`, `medical_cost_amount`, `medical_status`, `medical_created_by`, `medical_has_deleted`, `medical_create_date`, `created_at`, `updated_at`) VALUES
(1, 'Test Medical', '018123456789', 'Test', 5000, '1', 127, 'No', '2022-12-20', '2022-12-20 04:46:21', '2022-12-20 04:46:21'),
(2, 'Gamca Medical', '087309274092309', NULL, NULL, '1', 126, 'No', '2023-02-09', '2023-02-08 22:29:02', '2023-02-08 22:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `medical_test`
--

CREATE TABLE `medical_test` (
  `medical_test_id` int(10) UNSIGNED NOT NULL,
  `medical_test_vendor_id` int(20) DEFAULT NULL,
  `medical_test_client_id` bigint(20) DEFAULT NULL,
  `medical_test_client_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_test_processing_cost` bigint(20) DEFAULT NULL,
  `medical_test_issue_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_test_expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_test_created_by` bigint(20) DEFAULT NULL,
  `medical_test_has_deleted` bigint(20) DEFAULT NULL,
  `medicaltest_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_test_updated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_test_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_test`
--

INSERT INTO `medical_test` (`medical_test_id`, `medical_test_vendor_id`, `medical_test_client_id`, `medical_test_client_status`, `medical_test_processing_cost`, `medical_test_issue_date`, `medical_test_expiry_date`, `medical_test_created_by`, `medical_test_has_deleted`, `medicaltest_file`, `note`, `medical_test_updated`, `medical_test_create_date`, `created_at`, `updated_at`) VALUES
(1, 1, 70, 'fit', 3000, NULL, NULL, 127, 0, NULL, NULL, NULL, '2022-12-21', '2022-12-20 04:52:34', '2022-12-21 01:05:54'),
(2, 1, 74, 'fit', NULL, NULL, NULL, 127, 0, NULL, NULL, NULL, '2022-12-21', '2022-12-21 00:02:46', '2022-12-21 00:02:46'),
(3, 1, 65, 'unfit', 2000, NULL, NULL, 127, 0, NULL, NULL, NULL, '2022-12-21', '2022-12-21 01:06:37', '2022-12-21 01:07:49'),
(4, 1, 111, 'fit', 10000, NULL, NULL, 126, 0, NULL, NULL, NULL, '2023-02-09', '2023-02-09 00:21:27', '2023-02-09 00:21:27'),
(5, 1, 70, 'fit', 4000, '2023-03-01', '2023-03-20', 129, 0, '/uploads/1678949864.jpg', 'nfajnafjf', NULL, '2023-03-16', '2023-03-16 00:57:44', '2023-03-16 00:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2022_11_16_060006_create_clients_table', 2),
(7, '2022_11_16_060751_create_deligates_table', 3),
(8, '2022_11_16_061436_create_sponsors_table', 4),
(9, '2022_11_16_062936_create_accounts_table', 5),
(10, '2022_11_16_063459_create_account_trasections_table', 6),
(11, '2022_11_16_064610_create_expenses_table', 7),
(13, '2022_11_16_081202_create_client_ledgers_table', 9),
(14, '2022_11_16_081439_create_deligate_ledgers_table', 10),
(15, '2022_11_16_081548_create_sponsor_ledgers_table', 11),
(16, '2022_11_16_082609_create_company_infos_table', 12),
(17, '2022_11_16_053350_create_agents_table', 13),
(18, '2022_11_20_050726_create_agent_transections_table', 13),
(20, '2022_11_20_062955_create_agent_ledgers_table', 14),
(21, '2022_11_21_042101_create_medicals_table', 15),
(22, '2022_11_21_080112_create_client_transections_table', 16),
(23, '2022_11_23_045448_create_invoices_table', 17),
(24, '2022_11_23_045549_create_billing_infos_table', 18),
(25, '2022_11_23_045610_create_invoice_history_table', 19),
(26, '2022_11_24_024927_create_head_models_table', 20),
(27, '2022_11_24_032908_create_police_clearence_table', 21),
(28, '2022_11_24_041422_create_subheads_table', 22),
(29, '2022_11_30_054202_create_money_reciept_table', 23),
(30, '2022_11_29_054258_create_refunds_table', 24),
(31, '2022_12_19_034821_create_refund_items_table', 25),
(32, '2022_12_20_030650_create_vendor_table', 26),
(33, '2022_12_20_031202_create_vendors_table', 27),
(34, '2023_01_24_062944_create_products_table', 28),
(35, '2023_02_07_032519_create_client_over_alls_table', 29),
(36, '2023_05_15_060431_create_client_agents_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `money_reciept`
--

CREATE TABLE `money_reciept` (
  `money_reciept_id` int(10) UNSIGNED NOT NULL,
  `money_reciept_account_transaction_id` bigint(20) DEFAULT NULL,
  `money_reciept_voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_reciept_client_id` bigint(20) DEFAULT NULL,
  `money_reciept_client_transaction_id` bigint(20) DEFAULT NULL,
  `money_reciept_agent_id` bigint(20) DEFAULT NULL,
  `money_reciept_agent_transaction_id` bigint(20) DEFAULT NULL,
  `money_reciept_invoice_no` int(11) DEFAULT NULL,
  `money_reciept_deligate_id` bigint(20) DEFAULT NULL,
  `money_reciept_deligate_transaction_id` bigint(20) DEFAULT NULL,
  `money_reciept_sponsor_id` bigint(20) DEFAULT NULL,
  `money_reciept_sponsor_transaction_id` bigint(20) DEFAULT NULL,
  `money_reciept_payment_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_reciept_total_amount` bigint(20) DEFAULT NULL,
  `money_reciept_total_discount` bigint(20) DEFAULT NULL,
  `money_reciept_payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_reciept_payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_reciept_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_reciept_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_reciept_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `money_reciept_deleted_by` bigint(20) DEFAULT NULL,
  `money_reciept_created_by` bigint(20) DEFAULT NULL,
  `money_reciept_updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `money_reciept`
--

INSERT INTO `money_reciept` (`money_reciept_id`, `money_reciept_account_transaction_id`, `money_reciept_voucher_no`, `money_reciept_client_id`, `money_reciept_client_transaction_id`, `money_reciept_agent_id`, `money_reciept_agent_transaction_id`, `money_reciept_invoice_no`, `money_reciept_deligate_id`, `money_reciept_deligate_transaction_id`, `money_reciept_sponsor_id`, `money_reciept_sponsor_transaction_id`, `money_reciept_payment_to`, `money_reciept_total_amount`, `money_reciept_total_discount`, `money_reciept_payment_type`, `money_reciept_payment_date`, `money_reciept_note`, `money_reciept_payment_status`, `money_reciept_has_deleted`, `money_reciept_deleted_by`, `money_reciept_created_by`, `money_reciept_updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, '22120401', NULL, 141, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLIENT', 7000, NULL, 'CLIENT_PAYMENT', '2022-12-05', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-03 23:21:56', '2022-12-03 23:21:56'),
(2, NULL, '22120401', 57, 143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLIENT', 10000, NULL, 'CLIENT_PAYMENT', '2022-12-14', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-03 23:24:38', '2022-12-03 23:24:38'),
(3, NULL, '22120401', 60, 149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLIENT', 6000, NULL, 'CLIENT_PAYMENT', '2022-12-04', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-04 00:04:56', '2022-12-04 00:04:56'),
(4, NULL, '22120502', 63, 155, NULL, NULL, 22120501, NULL, NULL, NULL, NULL, 'CLIENT', 3000, NULL, 'CLIENT_PAYMENT', '2022-12-07', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-04 21:28:34', '2022-12-04 21:28:34'),
(5, NULL, '22120801', 72, 183, NULL, NULL, 22120802, NULL, NULL, NULL, NULL, 'CLIENT', 3500, NULL, 'CLIENT_PAYMENT', '2022-12-08', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-07 21:19:54', '2022-12-07 21:19:54'),
(6, NULL, '22120802', 86, 223, NULL, NULL, 22120814, NULL, NULL, NULL, NULL, 'CLIENT', 500, NULL, 'CLIENT_PAYMENT', '2022-12-08', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-08 03:15:11', '2022-12-08 03:15:11'),
(7, NULL, '22120803', 88, 228, NULL, NULL, 22120816, NULL, NULL, NULL, NULL, 'CLIENT', 900, NULL, 'CLIENT_PAYMENT', '2022-12-08', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-08 03:27:37', '2022-12-08 03:27:37'),
(8, 35, '22121102', 89, 231, NULL, NULL, 22121101, NULL, NULL, NULL, NULL, 'CLIENT', 21000, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, 127, '2022-12-10 20:58:15', '2022-12-10 21:00:08'),
(9, 36, '22121102', 90, 233, NULL, NULL, 22121103, NULL, NULL, NULL, NULL, 'CLIENT', 8000, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-10 21:02:06', '2022-12-10 21:02:06'),
(10, 37, '22121103', 91, 237, NULL, NULL, 22121104, NULL, NULL, NULL, NULL, 'CLIENT', 11000, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-10 21:16:42', '2022-12-10 21:16:42'),
(11, 38, '22121104', 92, 240, NULL, NULL, 22121105, NULL, NULL, NULL, NULL, 'CLIENT', 2000, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-10 23:25:31', '2022-12-10 23:25:31'),
(12, 39, '22121105', 93, 243, NULL, NULL, 22121106, NULL, NULL, NULL, NULL, 'CLIENT', 2500, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 02:12:39', '2022-12-11 02:12:39'),
(13, 40, '22121106', 94, 246, NULL, NULL, 22121107, NULL, NULL, NULL, NULL, 'CLIENT', 250, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 03:02:48', '2022-12-11 03:02:48'),
(14, 41, '22121107', 95, 249, NULL, NULL, 22121108, NULL, NULL, NULL, NULL, 'CLIENT', 200, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 03:07:02', '2022-12-11 03:07:02'),
(15, 42, '22121108', 96, 252, NULL, NULL, 22121109, NULL, NULL, NULL, NULL, 'CLIENT', 400, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 03:17:32', '2022-12-11 03:17:32'),
(16, 43, '22121109', 97, 255, NULL, NULL, 22121110, NULL, NULL, NULL, NULL, 'CLIENT', 400, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 03:28:34', '2022-12-11 03:28:34'),
(17, 45, '22121110', 98, 258, NULL, NULL, 22121111, NULL, NULL, NULL, NULL, 'CLIENT', 250, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 03:34:32', '2022-12-11 03:34:32'),
(18, 46, '22121111', 99, 261, NULL, NULL, 22121112, NULL, NULL, NULL, NULL, 'CLIENT', 350, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 03:56:12', '2022-12-11 03:56:12'),
(19, 48, '22121112', 99, 264, NULL, NULL, 22121113, NULL, NULL, NULL, NULL, 'CLIENT', 80, NULL, 'CLIENT_PAYMENT', '2022-12-11', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-11 04:03:17', '2022-12-11 04:03:17'),
(20, 50, '22121201', 100, 268, NULL, NULL, 22121201, NULL, NULL, NULL, NULL, 'CLIENT', 5000, NULL, 'CLIENT_PAYMENT', '2022-12-12', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-12 00:19:10', '2022-12-12 00:19:10'),
(21, 55, '22121301', NULL, NULL, 29, 44, NULL, NULL, NULL, NULL, NULL, 'AGENT', 845700, 50, 'AGENT_PAYMENT', '2022-12-13', 'wow another meow', '1', 'NO', NULL, 127, 127, '2022-12-12 22:15:36', '2022-12-13 21:29:51'),
(22, 58, '22121302', NULL, NULL, 35, 46, NULL, NULL, NULL, NULL, NULL, 'AGENT', 45000, 800, 'AGENT_PAYMENT', '2022-12-13', 'bfgahbfjaf', '0', 'YES', NULL, 127, NULL, '2022-12-12 23:57:39', '2022-12-13 07:13:04'),
(23, 59, '22121303', NULL, NULL, 35, 47, NULL, NULL, NULL, NULL, NULL, 'AGENT', 8600, 1600, 'AGENT_PAYMENT', '2022-12-13', 'this is not', '0', 'YES', NULL, 127, NULL, '2022-12-13 00:07:42', '2022-12-13 07:13:00'),
(24, 60, '22121304', NULL, NULL, 40, 48, NULL, NULL, NULL, NULL, NULL, 'AGENT', 8506509, 4111, 'AGENT_PAYMENT', '2022-12-13', 'f1a15', '0', 'YES', NULL, 127, NULL, '2022-12-13 00:17:20', '2022-12-13 07:12:47'),
(25, 61, '22121305', NULL, NULL, 38, 49, NULL, NULL, NULL, NULL, NULL, 'AGENT', 95000, 45000, 'AGENT_PAYMENT', '2022-12-13', 'this 45000', '0', 'YES', NULL, 127, NULL, '2022-12-13 00:48:01', '2022-12-13 07:12:38'),
(26, 62, '22121306', NULL, NULL, 38, 50, NULL, NULL, NULL, NULL, NULL, 'AGENT', 485000, 9545, 'AGENT_PAYMENT', '2022-12-13', NULL, '0', 'YES', NULL, 127, NULL, '2022-12-13 00:51:25', '2022-12-13 07:12:34'),
(27, 63, '22121307', NULL, NULL, 37, 51, NULL, NULL, NULL, NULL, NULL, 'AGENT', 7000, 650, 'AGENT_PAYMENT', '2022-12-13', '8411', '0', 'YES', NULL, 127, NULL, '2022-12-13 03:36:58', '2022-12-13 07:12:30'),
(28, 64, '22121402', NULL, NULL, 42, 52, NULL, NULL, NULL, NULL, NULL, 'AGENT', 17500, 850, 'AGENT_PAYMENT', '2022-12-14', 'this kamals first transection', '1', 'NO', NULL, 127, NULL, '2022-12-13 22:16:50', '2022-12-13 22:16:50'),
(29, 65, '22121403', NULL, NULL, 43, 53, NULL, NULL, NULL, NULL, NULL, 'AGENT', 70000, 5000, 'AGENT_PAYMENT', '2022-12-14', 'faaeffe', '0', 'YES', NULL, 127, NULL, '2022-12-13 22:20:06', '2022-12-13 22:21:37'),
(30, 66, '22121404', NULL, NULL, 44, 54, NULL, NULL, NULL, NULL, NULL, 'AGENT', 50000, 4000, 'AGENT_PAYMENT', '2022-12-14', 'this for client purpose', '1', 'NO', NULL, 127, 127, '2022-12-13 22:23:41', '2022-12-13 22:26:01'),
(31, 67, '22121405', NULL, NULL, 46, 55, NULL, NULL, NULL, NULL, NULL, 'AGENT', 3500, 2500, 'AGENT_PAYMENT', '2022-12-14', 'this sb', '1', 'NO', NULL, 127, 127, '2022-12-13 22:43:07', '2022-12-13 22:43:40'),
(43, 80, '22121417', 102, 272, NULL, NULL, 22121401, NULL, NULL, NULL, NULL, 'CLIENT', 700, NULL, 'CLIENT_PAYMENT', '2022-12-14', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-13 23:52:56', '2022-12-13 23:52:56'),
(53, 90, '22121407', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 24, 'SPONSOR', 4500, 500, 'SPONSOR_PAYMENT', '2022-12-14', 'afaffafaa', '1', 'NO', NULL, 127, NULL, '2022-12-14 05:38:27', '2022-12-14 05:38:27'),
(54, 91, '22121408', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 25, 'SPONSOR', 450, 20, 'SPONSOR_PAYMENT', '2022-12-14', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-14 05:58:38', '2022-12-14 05:58:38'),
(55, 92, '22121409', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 26, 'SPONSOR', 1000, 500, 'SPONSOR_PAYMENT', '2022-12-14', NULL, '1', 'NO', NULL, 127, 127, '2022-12-14 06:03:34', '2022-12-14 06:03:58'),
(56, 93, '22121410', NULL, NULL, NULL, NULL, NULL, 2, 5, NULL, NULL, 'deligate', 750, 350, 'deligate_PAYMENT', '2022-12-14', 'fqfeefqefq', '1', 'NO', NULL, 127, 127, '2022-12-14 06:34:29', '2022-12-14 06:34:45'),
(57, 94, '22121411', NULL, NULL, NULL, NULL, NULL, 1, 6, NULL, NULL, 'deligate', 547, 65, 'deligate_PAYMENT', '2022-12-14', 'fafaeafe', '1', 'NO', NULL, 127, NULL, '2022-12-14 06:38:52', '2022-12-14 06:38:52'),
(58, 95, '22121412', NULL, NULL, NULL, NULL, NULL, 3, 7, NULL, NULL, 'deligate', 9901, 901, 'deligate_PAYMENT', '2022-12-14', 'fafaeffae', '1', 'NO', NULL, 127, 127, '2022-12-14 06:42:04', '2022-12-14 06:42:20'),
(59, 96, '22121701', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 27, 'SPONSOR', 45000, 519, 'SPONSOR_PAYMENT', '2022-12-17', 'this is frist', '1', 'NO', NULL, 127, NULL, '2022-12-16 21:01:16', '2022-12-16 21:01:16'),
(60, 97, '22121702', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 28, 'SPONSOR', 80000, 58000, 'SPONSOR_PAYMENT', '2022-12-17', 'faaffefe', '1', 'NO', NULL, 127, NULL, '2022-12-16 21:50:23', '2022-12-16 21:50:23'),
(61, 98, '22121703', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 29, 'SPONSOR', 89500, 4500, 'SPONSOR_PAYMENT', '2022-12-17', 'fefefeeffe', '1', 'NO', NULL, 127, NULL, '2022-12-16 21:53:04', '2022-12-16 21:53:04'),
(62, 99, '22121704', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 30, 'SPONSOR', 200, 20, 'SPONSOR_PAYMENT', '2022-12-17', 'fafefef', '1', 'NO', NULL, 127, NULL, '2022-12-16 21:54:26', '2022-12-16 21:54:26'),
(63, 100, '22121705', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 31, 'SPONSOR', 800, 70, 'SPONSOR_PAYMENT', '2022-12-17', 'this is not fair', '1', 'NO', NULL, 127, NULL, '2022-12-16 21:59:08', '2022-12-16 21:59:08'),
(64, 101, '22121706', NULL, NULL, NULL, NULL, NULL, 4, 8, NULL, NULL, 'deligate', 8500, 500, 'deligate_PAYMENT', '2022-12-17', 'afeffeafe', '1', 'NO', NULL, 127, NULL, '2022-12-17 02:00:52', '2022-12-17 02:00:52'),
(65, 102, '22121801', NULL, NULL, NULL, NULL, NULL, 5, 9, NULL, NULL, 'deligate', 47500, 1500, 'deligate_PAYMENT', '2022-12-15', 'this is  not fair', '1', 'NO', NULL, 127, NULL, '2022-12-17 20:38:10', '2022-12-17 20:38:10'),
(66, 103, '22121801', NULL, NULL, NULL, NULL, NULL, 5, 10, NULL, NULL, 'deligate', 13500, 500, 'deligate_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 20:38:34', '2022-12-17 20:38:34'),
(67, 104, '22121802', 104, 276, NULL, NULL, 22121802, NULL, NULL, NULL, NULL, 'CLIENT', 1200, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 21:10:16', '2022-12-17 21:10:16'),
(68, 106, '22121803', 105, 279, NULL, NULL, 22121803, NULL, NULL, NULL, NULL, 'CLIENT', 400, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 21:14:00', '2022-12-17 21:14:00'),
(69, 107, '22121804', 105, 281, NULL, NULL, 22121804, NULL, NULL, NULL, NULL, 'CLIENT', 100, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 21:21:00', '2022-12-17 21:21:00'),
(70, 109, '22121805', 106, 284, NULL, NULL, 22121805, NULL, NULL, NULL, NULL, 'CLIENT', 500, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 21:31:30', '2022-12-17 21:31:30'),
(71, 111, '22121806', 107, 287, NULL, NULL, 22121806, NULL, NULL, NULL, NULL, 'CLIENT', 500, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 21:45:36', '2022-12-17 21:45:36'),
(72, 113, '22121807', 107, 290, NULL, NULL, 22121807, NULL, NULL, NULL, NULL, 'CLIENT', 1750, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 21:48:51', '2022-12-17 21:48:51'),
(73, 114, '22121808', 107, 292, NULL, NULL, 22121808, NULL, NULL, NULL, NULL, 'CLIENT', 1500, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 22:05:40', '2022-12-17 22:05:40'),
(74, 115, '22121809', 107, 294, NULL, NULL, 22121809, NULL, NULL, NULL, NULL, 'CLIENT', 3000, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 22:12:35', '2022-12-17 22:12:35'),
(75, 116, '22121810', 107, 296, NULL, NULL, 22121810, NULL, NULL, NULL, NULL, 'CLIENT', 3000, NULL, 'CLIENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 22:15:35', '2022-12-17 22:15:35'),
(76, 117, '22121811', NULL, NULL, NULL, NULL, NULL, 3, 11, NULL, NULL, 'deligate', 5000, 50, 'deligate_PAYMENT', '2022-12-18', 'affaafaf', '1', 'NO', NULL, 127, NULL, '2022-12-17 22:53:41', '2022-12-17 22:53:41'),
(77, 118, '22121812', NULL, NULL, 45, 56, NULL, NULL, NULL, NULL, NULL, 'AGENT', 8500, 450, 'AGENT_PAYMENT', '2022-12-18', 'effefefef', '1', 'NO', NULL, 127, NULL, '2022-12-17 22:54:15', '2022-12-17 22:54:15'),
(78, 119, '22121813', NULL, NULL, 45, 57, NULL, NULL, NULL, NULL, NULL, 'AGENT', 8500, 850, 'AGENT_PAYMENT', '2022-12-18', 'faaefef', '1', 'NO', NULL, 127, NULL, '2022-12-17 22:54:45', '2022-12-17 22:54:45'),
(79, 120, '22121814', NULL, NULL, 29, 58, NULL, NULL, NULL, NULL, NULL, 'AGENT', 85000, 5000, 'AGENT_PAYMENT', '2022-12-18', 'faffeaef', '1', 'NO', NULL, 127, NULL, '2022-12-17 22:56:42', '2022-12-17 22:56:42'),
(80, 121, '22121815', NULL, NULL, NULL, NULL, NULL, 2, 12, NULL, NULL, 'deligate', 850000, 5000, 'deligate_PAYMENT', '2022-12-18', 'afeeffaefea', '1', 'NO', NULL, 127, NULL, '2022-12-17 22:57:29', '2022-12-17 22:57:29'),
(81, 122, '22121816', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 32, 'SPONSOR', 8950821414, 5815, 'SPONSOR_PAYMENT', '2022-12-18', 'feafefeafae', '1', 'NO', NULL, 127, NULL, '2022-12-17 22:57:56', '2022-12-17 22:57:56'),
(82, 123, '22121817', NULL, NULL, 33, 59, NULL, NULL, NULL, NULL, NULL, 'AGENT', 111, 1, 'AGENT_PAYMENT', '2022-12-18', 'faafefeaewfa', '1', 'NO', NULL, 127, NULL, '2022-12-17 23:13:42', '2022-12-17 23:13:42'),
(83, 124, '22121818', NULL, NULL, 43, 60, NULL, NULL, NULL, NULL, NULL, 'AGENT', 585000, 20, 'AGENT_PAYMENT', '2022-12-18', 'feaaffae', '1', 'NO', NULL, 127, NULL, '2022-12-17 23:15:27', '2022-12-17 23:15:27'),
(84, 125, '22121819', NULL, NULL, 32, 61, NULL, NULL, NULL, NULL, NULL, 'AGENT', 8596258000, 1, 'AGENT_PAYMENT', '2022-12-18', 'adffaaefef', '1', 'NO', NULL, 127, NULL, '2022-12-17 23:16:56', '2022-12-17 23:16:56'),
(85, 126, '22121820', NULL, NULL, 32, 62, NULL, NULL, NULL, NULL, NULL, 'AGENT', 1500, 2, 'AGENT_PAYMENT', '2022-12-18', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-17 23:18:05', '2022-12-17 23:18:05'),
(86, 127, '22121821', NULL, NULL, 30, 63, NULL, NULL, NULL, NULL, NULL, 'AGENT', 5000, 250, 'AGENT_PAYMENT', '2022-12-18', 'afeffae', '1', 'NO', NULL, 127, NULL, '2022-12-17 23:35:37', '2022-12-17 23:35:37'),
(87, 128, '22121822', NULL, NULL, NULL, NULL, NULL, 2, 13, NULL, NULL, 'deligate', 50000, 50, 'deligate_PAYMENT', '2022-12-18', 'feefafae', '1', 'NO', NULL, 127, NULL, '2022-12-17 23:36:04', '2022-12-17 23:36:04'),
(88, 129, '22121823', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 33, 'SPONSOR', 45000, 2500, 'SPONSOR_PAYMENT', '2022-12-18', 'fe4ffefeafe', '1', 'NO', NULL, 127, NULL, '2022-12-17 23:36:29', '2022-12-17 23:36:29'),
(89, 130, '22121824', NULL, NULL, NULL, NULL, NULL, 4, 14, NULL, NULL, 'deligate', 48500, 40, 'deligate_PAYMENT', '2022-12-18', 'fgfa11feef', '0', 'YES', NULL, 127, NULL, '2022-12-18 00:54:27', '2022-12-18 00:54:40'),
(90, 131, '22121901', 107, 299, NULL, NULL, 22121902, NULL, NULL, NULL, NULL, 'CLIENT', 19000, 50, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-18 21:27:57', '2022-12-18 21:27:57'),
(91, 132, '22121902', 105, 301, NULL, NULL, 22121903, NULL, NULL, NULL, NULL, 'CLIENT', 2700, NULL, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-18 21:39:03', '2022-12-18 21:39:03'),
(92, 134, '22121903', 105, 304, NULL, NULL, 22121904, NULL, NULL, NULL, NULL, 'CLIENT', 3200, NULL, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-19 04:01:44', '2022-12-19 04:01:44'),
(93, 136, '22121904', 105, 307, NULL, NULL, 22121905, NULL, NULL, NULL, NULL, 'CLIENT', 1600, NULL, 'CLIENT_PAYMENT', '2022-12-16', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-19 04:05:11', '2022-12-19 04:05:11'),
(94, 138, '22121904', 105, 310, NULL, NULL, 22121906, NULL, NULL, NULL, NULL, 'CLIENT', 380, NULL, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-19 04:07:40', '2022-12-19 04:07:40'),
(95, 140, '22121905', 108, 313, NULL, NULL, 22121907, NULL, NULL, NULL, NULL, 'CLIENT', 500, NULL, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-19 04:18:44', '2022-12-19 04:18:44'),
(96, 142, '22121906', 108, 316, NULL, NULL, 22121908, NULL, NULL, NULL, NULL, 'CLIENT', 3500, NULL, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-19 04:22:41', '2022-12-19 04:22:41'),
(97, 144, '22121907', 108, 319, NULL, NULL, 22121909, NULL, NULL, NULL, NULL, 'CLIENT', 3300, NULL, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-19 04:35:44', '2022-12-19 04:35:44'),
(98, 147, '22121908', 108, 323, NULL, NULL, 22121910, NULL, NULL, NULL, NULL, 'CLIENT', 8100, NULL, 'CLIENT_PAYMENT', '2022-12-19', NULL, '1', 'NO', NULL, 127, NULL, '2022-12-19 04:42:16', '2022-12-19 04:42:16'),
(99, 150, '22122001', NULL, NULL, 47, 64, NULL, NULL, NULL, NULL, NULL, 'AGENT', 4511, 11, 'AGENT_PAYMENT', '2022-12-20', 'wtgeef', '1', 'NO', NULL, 127, NULL, '2022-12-19 21:19:28', '2022-12-19 21:19:28'),
(100, 151, '22122002', NULL, NULL, 48, 65, NULL, NULL, NULL, NULL, NULL, 'AGENT', 2500, 500, 'AGENT_PAYMENT', '2022-12-13', 'fefeefafe', '1', 'NO', NULL, 127, NULL, '2022-12-19 21:29:41', '2022-12-19 21:29:41'),
(101, 152, '22122002', NULL, NULL, 48, 66, NULL, NULL, NULL, NULL, NULL, 'AGENT', 5000, 50, 'AGENT_PAYMENT', '2022-12-09', 'fefeaffe', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:13:00', '2022-12-19 22:13:00'),
(102, 153, '22122002', NULL, NULL, 48, 67, NULL, NULL, NULL, NULL, NULL, 'AGENT', 1411, 151, 'AGENT_PAYMENT', '2022-12-10', 'fafeffea', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:14:34', '2022-12-19 22:14:34'),
(103, 154, '22122002', NULL, NULL, 48, 68, NULL, NULL, NULL, NULL, NULL, 'AGENT', 4000, 250, 'AGENT_PAYMENT', '2022-12-20', 'efefeffe', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:15:16', '2022-12-19 22:15:16'),
(104, 155, '22122003', NULL, NULL, 48, 69, NULL, NULL, NULL, NULL, NULL, 'AGENT', 8500, 500, 'AGENT_PAYMENT', '2022-12-08', 'feeffefe', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:16:38', '2022-12-19 22:16:38'),
(105, 156, '22122003', NULL, NULL, 48, 70, NULL, NULL, NULL, NULL, NULL, 'AGENT', 8500, 500, 'AGENT_PAYMENT', '2022-12-08', 'feeffefe', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:16:39', '2022-12-19 22:16:39'),
(106, 157, '22122003', NULL, NULL, 48, 71, NULL, NULL, NULL, NULL, NULL, 'AGENT', 4000, 20, 'AGENT_PAYMENT', '2022-12-15', 'feefaeffe', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:17:08', '2022-12-19 22:17:08'),
(107, 158, '22122003', NULL, NULL, 48, 72, NULL, NULL, NULL, NULL, NULL, 'AGENT', 2500, 540, 'AGENT_PAYMENT', '2022-12-11', 'fefafefef', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:18:03', '2022-12-19 22:18:03'),
(108, 159, '22122003', NULL, NULL, 48, 73, NULL, NULL, NULL, NULL, NULL, 'AGENT', 25000, 8500, 'AGENT_PAYMENT', '2022-12-07', 'feaeffefae', '1', 'NO', NULL, 127, NULL, '2022-12-19 22:19:15', '2022-12-19 22:19:15'),
(109, 163, '23040601', 65, 342, NULL, NULL, 23040602, NULL, NULL, NULL, NULL, 'CLIENT', 800, NULL, 'CLIENT_PAYMENT', '2023-04-06', NULL, '1', 'NO', NULL, 129, NULL, '2023-04-05 21:02:26', '2023-04-05 21:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `passports`
--

CREATE TABLE `passports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `passport_client_id` int(11) DEFAULT NULL,
  `passport_vendor_id` int(11) DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_passport_issue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_passport_expiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_receive_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_attached_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_clearance_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_creation_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passports`
--

INSERT INTO `passports` (`id`, `passport_client_id`, `passport_vendor_id`, `passport_no`, `passport_name`, `mobile_number`, `date_of_birth`, `date_of_passport_issue`, `date_of_passport_expiry`, `duration_left`, `email`, `passport_reference`, `passport_amount`, `passport_delivery_date`, `passport_receive_date`, `passport_attached_date`, `police_clearance_file`, `office_name`, `status`, `note`, `created_by`, `deleted_by`, `passport_creation_date`, `passport_document`, `passport_has_deleted`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '1234567', 'Shadman', '0161234567812', '2022-11-20', '2022-11-20', NULL, NULL, 'ssk.m360ict@gmail.com', '12314565', '1222', NULL, NULL, NULL, NULL, NULL, '0', NULL, '126', '126', '2022/11/20', NULL, NULL, '2022-11-20 00:58:55', '2022-11-20 02:28:54'),
(2, NULL, NULL, '123456712', 'Shadman12', '0161234567812', '2022-11-09', '2022-11-02', NULL, NULL, 'ssk.m360ict@gmail.com', '12314565', '1212121', NULL, NULL, NULL, NULL, NULL, '0', NULL, '126', '126', '2022/11/20', NULL, NULL, '2022-11-20 02:18:17', '2022-11-20 04:15:56'),
(3, NULL, NULL, 'shadman', '1212', '01612345678', '2022-11-20', '2022-11-21', NULL, NULL, 'ssk.m360ict@gmail.com', '12121', '121212', NULL, NULL, NULL, NULL, NULL, '0', NULL, '126', '126', '2022/11/20', NULL, NULL, '2022-11-20 02:34:32', '2022-11-20 02:34:57'),
(4, NULL, NULL, 'test passport1', 'Shadman1', '01612345678', '2022-11-22', '2022-11-15', NULL, NULL, 'ssk.m360ict@gmail.com', '12314565', '1222', NULL, NULL, NULL, NULL, NULL, '0', NULL, '126', '126', '2022/11/20', NULL, NULL, '2022-11-20 03:42:00', '2022-11-20 03:42:18'),
(5, NULL, NULL, '1234567', 'Shadman121212', '01612345678111', '2022-11-14', '2022-11-20', '2022-11-25', '21', 'ssk.m360ict@gmail.com', '12314565', '12223', NULL, NULL, NULL, NULL, NULL, '1', NULL, '126', NULL, '2022/11/20', NULL, NULL, '2022-11-20 04:14:14', '2022-11-19 18:00:00'),
(8, NULL, NULL, '1234567', 'Shadman', '01612345678', '2022-11-01', '2022-11-10', '2022-11-29', '22', 'ssk.m360ict@gmail.com', '12314565', '1222', NULL, NULL, NULL, NULL, NULL, '1', NULL, '126', NULL, '2022/11/21', '/uploads/1669005694.pdf', NULL, '2022-11-20 22:38:39', '2022-11-20 18:00:00'),
(9, NULL, NULL, '1234567', 'Shadman', '0161234567821212121', '2022-11-01', '2022-11-01', '2022-11-30', '22', 'ssk.m360ict@gmail.com', '12121212', '1222', NULL, NULL, NULL, NULL, NULL, '1', NULL, '126', NULL, '2022/11/21', '/uploads/1669005859.jpg', NULL, '2022-11-20 22:43:38', '2022-11-20 18:00:00'),
(10, NULL, NULL, '1234567', 'Shadman', '01612345678', '2022-11-03', '2022-11-17', '2022-11-30', NULL, 'ssk.m360ict@gmail.com', '12314565', '1222', '2023-01-01', '2023-01-06', '2023-01-08', NULL, 'Test Office', '1', NULL, '126', NULL, '2022/11/21', '/uploads/1678937716.jpg', 'NO', '2022-11-21 05:00:48', '2023-03-15 18:00:00'),
(11, 7, NULL, '123456711', 'Shadman', '01612345678', '2022-11-02', '2022-11-23', '2022-11-26', '3', 'ssk.m360ict@gmail.com', '12314565', '1222', NULL, NULL, NULL, NULL, NULL, '1', NULL, '126', NULL, '2022/11/22', '/uploads/1669095760.png', 'NO', '2022-11-21 23:42:40', '2022-11-21 18:00:00'),
(12, 70, NULL, '1234567', 'Nazmul', '01623322587', '2022-12-01', '2022-12-24', '2022-12-31', '7', 'ssk.m360ict@gmail.com', '12314565', '20000', NULL, NULL, NULL, NULL, NULL, '1', NULL, '127', NULL, '2022/12/20', '/uploads/1671528085.png', 'NO', '2022-12-20 03:21:25', '2022-12-20 03:21:25'),
(13, 109, 1, '1234567', 'Shadman 1', '12121212', '2022-12-01', '2022-12-01', '2022-12-24', '23', 'ssk.m360ict@gmail.com', '12314565', '5000', NULL, NULL, NULL, NULL, NULL, '1', NULL, '127', NULL, '2022/12/20', '/uploads/1671536097.png', 'NO', '2022-12-20 05:34:57', '2022-12-20 18:00:00'),
(14, 76, 1, '12345672323', 'Shadman122323232', '01612345678', '2023-01-08', '2023-01-07', '2023-01-08', '1', 'ssk.m360ict222@gmail.com', '4', '5000', '2023-01-01', '2023-01-07', '2023-01-04', NULL, 'Test Office11', '1', NULL, '127', NULL, '2023/01/08', '/uploads/1673159734.png', 'NO', '2023-01-08 00:35:34', '2023-01-07 18:00:00'),
(15, 74, 1, 'A1023', 'sdfva', '75878577', '2023-01-04', '2023-01-01', '2023-01-19', '18', 'ssk.m360ict@gmail.com', 'ggbnsfg', '1000', '2023-01-17', '2023-01-15', '2023-01-07', NULL, NULL, '1', NULL, '127', NULL, '2023/01/09', '/uploads/1673233172.png', 'NO', '2023-01-08 20:59:32', '2023-01-08 20:59:32'),
(16, 74, 1, '1234567', 'Shadman', '01612345678', '2023-01-24', '2023-01-28', '2023-01-28', '0', 'ssk.m360ict@gmail.com', '12314565', '1000', '2023-01-25', '2023-01-28', '2023-01-31', NULL, 'Test Office', '1', NULL, '127', NULL, '2023/01/25', '/uploads/', 'NO', '2023-01-24 21:56:00', '2023-01-24 21:56:00'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '127', '127', '2023/01/25', '/uploads/', 'YES', '2023-01-24 21:59:01', '2023-01-24 21:59:08'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '127', '127', '2023/01/25', '/uploads/', 'YES', '2023-01-24 21:59:32', '2023-01-24 21:59:38'),
(19, 111, NULL, 'A1673873', 'nahid islam', '0213892749374', NULL, '2022-11-01', '2028-01-09', '1895', NULL, NULL, NULL, '2023-02-09', '2023-02-01', NULL, NULL, NULL, '1', NULL, '126', NULL, '2023/02/09', '/uploads/1675922825.jpg', 'NO', '2023-02-09 00:07:05', '2023-02-08 18:00:00'),
(20, 106, 1, '484784145', 'eows', '01401033443', NULL, '2023-03-10', '2023-03-15', '19430', 'armaan@gmail.com', 'feafefeafea', '20000', '2023-03-23', '2023-03-24', '2023-03-03', NULL, 'faff', '1', NULL, '129', NULL, '2023/03/14', '/uploads/1678784211.jpg', 'NO', '2023-03-14 02:56:51', '2023-03-14 02:56:51'),
(21, 96, 1, '41411', 'anfjnafjfn', '0140103345', '2023-03-10', '2023-03-15', '2023-03-20', '5', 'armaan.m360ict@gmail.com', 'fafa44a7f', '400', '2023-03-14', '2023-03-15', '2023-03-16', NULL, 'faeffafae', '1', 'this is not fair', '129', NULL, '2023/03/14', '/uploads/1678784527.png', 'NO', '2023-03-14 03:02:07', '2023-03-14 03:02:07'),
(22, 72, NULL, 'B029382989', 'jusus', '0189721', '1990-09-11', '2021-03-01', '2028-09-12', '0', 'nahid.m360ict@gmail.com', NULL, NULL, '2023-03-01', '2023-03-23', NULL, NULL, NULL, '1', NULL, '129', NULL, '2023/03/15', '/uploads/', 'NO', '2023-03-14 21:52:24', '2023-03-14 21:52:24'),
(23, 65, 1, '1415415', 'afeaeff', '01401033443', '2023-03-02', '2023-03-02', '2023-03-17', '15', 'armaan@gmail.com', 'fafaf', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '129', NULL, '2023/03/16', '/uploads/', 'NO', '2023-03-16 02:50:45', '2023-03-16 02:50:45'),
(24, 65, 1, 'a144141', 'rw4ws', '4412', '2023-03-07', '2023-05-19', '2023-12-28', '223', 'ahamedriad0@gmail.com', 'e4rewr4', '100000', '2023-05-29', '2023-05-08', '2023-05-23', NULL, 'erse', '1', 'sxssese', '129', NULL, '2023/05/08', '/uploads/1683522092.jpg', 'NO', '2023-05-07 23:01:32', '2023-05-07 23:01:32');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `section_name`, `name`, `institution_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'User', 'Add User', NULL, 'add-user', '2021-10-17 03:38:31', '2021-11-01 22:33:16'),
(2, 'User', 'Edit User', NULL, 'edit-user', '2021-10-17 03:38:31', '2021-10-17 03:38:31'),
(3, 'User', 'View User', NULL, 'view-user', '2021-10-17 03:38:31', '2021-10-17 03:38:31'),
(4, 'User', 'Delete User', NULL, 'delete-user', '2021-10-17 03:38:31', '2021-10-17 03:38:31'),
(9, 'Permission', 'Add Permission', NULL, 'add-permission', '2021-10-19 03:11:20', '2021-10-19 03:11:20'),
(10, 'Permission', 'View Permission', NULL, 'view-permission', '2021-10-19 03:11:20', '2021-10-19 03:11:20'),
(11, 'Permission', 'Edit Permission', NULL, 'edit-permission', '2021-10-19 03:11:20', '2021-10-19 03:11:20'),
(12, 'Permission', 'Delete Permission', NULL, 'delete-permission', '2021-10-19 03:11:20', '2021-10-19 03:11:20'),
(13, 'Role', 'Add Role', NULL, 'add-role', '2021-10-19 03:11:55', '2021-10-19 03:11:55'),
(14, 'Role', 'Edit Role', NULL, 'edit-role', '2021-10-19 03:11:55', '2021-10-19 03:11:55'),
(15, 'Role', 'Delete Role', NULL, 'delete-role', '2021-10-19 03:11:55', '2021-10-19 03:11:55'),
(16, 'Role', 'View Role', NULL, 'view-role', '2021-10-19 03:11:56', '2021-10-19 03:11:56'),
(21, 'Designations', 'View Designations', NULL, 'view-designations', '2021-11-01 22:12:50', '2021-11-01 22:12:50'),
(22, 'Designations', 'Add Designations', NULL, 'add-designations', '2021-11-01 22:12:51', '2021-11-01 22:12:51'),
(23, 'Designations', 'Edit Designations', NULL, 'edit-designations', '2021-11-01 22:12:51', '2021-11-01 22:12:51'),
(24, 'Designations', 'Delete Designations', NULL, 'delete-designations', '2021-11-01 22:12:51', '2021-11-01 22:12:51'),
(25, 'Report', 'View today leaves', NULL, 'view-today-leaves', '2021-11-10 04:26:30', '2021-11-10 04:29:37'),
(26, 'Govt Leave', 'View Govt Leave', NULL, 'view-govt-leave', '2021-11-23 05:18:58', '2021-11-23 05:18:58'),
(27, 'User', 'N o User', 1, 'n-o-user', '2021-12-14 10:13:59', '2021-12-14 10:13:59'),
(28, 'User', 'Add  User', 1, 'add--user', '2021-12-14 11:31:47', '2021-12-14 11:31:47'),
(29, 'User', 'Edit User', 1, 'edit-user', '2021-12-14 11:31:47', '2021-12-14 11:31:47'),
(30, 'User', 'Delete User', 1, 'delete-user', '2021-12-14 11:31:47', '2021-12-14 11:31:47'),
(31, 'User', 'View User', 1, 'view-user', '2021-12-14 11:31:47', '2021-12-14 11:31:47'),
(32, 'Test', 'View Test', NULL, 'view-test', '2021-12-19 09:33:55', '2021-12-19 09:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `police_clearances`
--

CREATE TABLE `police_clearances` (
  `police_clearance_id` int(10) UNSIGNED NOT NULL,
  `police_clearance_client_id` bigint(20) NOT NULL,
  `police_clearance_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_clearance_vendor_id` int(11) DEFAULT NULL,
  `police_clearance_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `police_clearance_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_clearence_processing_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_clearance_created_by` bigint(20) DEFAULT NULL,
  `police_clearance_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `police_clearance_updated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_clearance_create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `police_clearances`
--

INSERT INTO `police_clearances` (`police_clearance_id`, `police_clearance_client_id`, `police_clearance_no`, `police_clearance_vendor_id`, `police_clearance_status`, `police_clearance_file`, `note`, `police_clearence_processing_cost`, `police_clearance_created_by`, `police_clearance_has_deleted`, `police_clearance_updated`, `police_clearance_create_date`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, NULL, 'no', NULL, NULL, NULL, 131, 'YES', NULL, '2022-11-30', '2022-11-30 02:28:41', '2022-11-30 03:05:55'),
(2, 15, NULL, NULL, 'no', '/uploads/1669801132.jpg', NULL, NULL, 131, 'NO', NULL, '2022-11-30', '2022-11-30 03:38:52', '2022-11-30 03:38:52'),
(3, 14, NULL, NULL, 'no', '/uploads/1669801433.jpg', NULL, NULL, 131, 'NO', NULL, '2022-11-30', '2022-11-30 03:43:53', '2022-11-30 03:45:18'),
(4, 70, NULL, NULL, 'yes', '/uploads/1671527843.png', NULL, NULL, 127, 'NO', NULL, '2022-12-20', '2022-12-20 03:17:23', '2022-12-20 03:17:23'),
(5, 109, NULL, 1, 'yes', '/uploads/1671537909.png', NULL, '3000', 127, 'NO', NULL, '2022-12-21', '2022-12-20 06:05:09', '2022-12-21 01:33:57'),
(6, 75, NULL, 1, 'yes', '/uploads/1671608071.png', NULL, '2000', 127, 'NO', NULL, '2022-12-21', '2022-12-21 01:34:31', '2022-12-21 01:34:31'),
(7, 111, NULL, NULL, 'yes', '/uploads/1675923731.jpg', NULL, '2000', 126, 'NO', NULL, '2023-02-09', '2023-02-09 00:22:11', '2023-02-09 00:22:11'),
(8, 80, '15415151', NULL, 'yes', '/uploads/1678947819.jpg', 'meow', '25000', 129, 'NO', NULL, '2023-03-16', '2023-03-16 00:23:39', '2023-03-16 00:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `product_created_by` bigint(20) DEFAULT NULL,
  `product_has_deleted` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_deleted_by` bigint(20) DEFAULT NULL,
  `product_updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_entry_id`, `product_status`, `product_created_by`, `product_has_deleted`, `product_deleted_by`, `product_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Trabill 1', 'Trabill96678', '0', 127, 'YES', 127, 127, '2023-01-23 18:00:00', '2023-01-24 02:01:15'),
(2, 'Trabill', 'Trabill99911', '1', 127, 'NO', NULL, NULL, '2023-01-23 18:00:00', '2023-01-24 02:07:41'),
(3, 'Dokani', 'Dokani45550', '1', 127, 'NO', NULL, NULL, '2023-01-23 18:00:00', '2023-01-24 02:07:49'),
(4, 'Manpower', 'Manpower50230', '1', 129, 'NO', NULL, NULL, '2023-03-22 18:00:00', '2023-03-22 21:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

CREATE TABLE `refunds` (
  `refund_id` int(10) UNSIGNED NOT NULL,
  `refund_invoice_id` bigint(20) DEFAULT NULL,
  `refund_client_id` bigint(20) DEFAULT NULL,
  `refund_client_transaction_id` bigint(20) DEFAULT NULL,
  `refund_agent_id` bigint(20) DEFAULT NULL,
  `refund_agent_transaction_id` bigint(20) DEFAULT NULL,
  `refund_deligate_id` bigint(20) DEFAULT NULL,
  `refund_deligate_transaction_id` bigint(20) DEFAULT NULL,
  `refund_sponsor_id` bigint(20) DEFAULT NULL,
  `refund_sponsor_transaction_id` bigint(20) DEFAULT NULL,
  `refund_quantity` bigint(20) DEFAULT NULL,
  `refund_charge` bigint(20) DEFAULT NULL,
  `refund_return_price` bigint(20) DEFAULT NULL,
  `refund_note` bigint(20) DEFAULT NULL,
  `refund_status` bigint(20) DEFAULT NULL,
  `refund_type` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `refund_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refund_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`refund_id`, `refund_invoice_id`, `refund_client_id`, `refund_client_transaction_id`, `refund_agent_id`, `refund_agent_transaction_id`, `refund_deligate_id`, `refund_deligate_transaction_id`, `refund_sponsor_id`, `refund_sponsor_transaction_id`, `refund_quantity`, `refund_charge`, `refund_return_price`, `refund_note`, `refund_status`, `refund_type`, `refund_date`, `refund_create_date`, `refund_has_deleted`, `refund_deleted_by`, `refund_created_by`, `refund_updated_by`, `created_at`, `updated_at`) VALUES
(6, 7, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 198, NULL, NULL, NULL, NULL, '2022-12-01', 'NO', NULL, '127', NULL, '2022-12-01 08:57:45', '2022-12-01 08:57:45'),
(7, 8, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 30, 40, NULL, NULL, NULL, NULL, '2022-12-01', 'NO', NULL, '127', NULL, '2022-12-01 09:00:50', '2022-12-01 09:00:50'),
(8, 13, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 300, 100, NULL, NULL, NULL, NULL, '2022-12-01', 'NO', NULL, '127', NULL, '2022-12-01 09:16:31', '2022-12-01 09:16:31'),
(9, 15, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 500, 500, NULL, NULL, NULL, NULL, '2022-12-01', 'NO', NULL, '127', NULL, '2022-12-01 09:43:13', '2022-12-01 09:43:13'),
(10, 14, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 1500, NULL, NULL, NULL, NULL, '2022-12-01', 'NO', NULL, '127', NULL, '2022-12-01 09:45:07', '2022-12-01 09:45:07'),
(11, 15, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1800, 200, NULL, NULL, NULL, NULL, '2022-12-01', 'NO', NULL, '127', NULL, '2022-12-01 09:50:46', '2022-12-01 09:50:46'),
(12, 16, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 400, 1000, NULL, NULL, NULL, NULL, '2022-12-04', 'NO', NULL, '127', NULL, '2022-12-03 20:52:21', '2022-12-03 20:52:21'),
(13, 17, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 100, 500, NULL, NULL, NULL, NULL, '2022-12-04', 'NO', NULL, '127', NULL, '2022-12-03 21:14:29', '2022-12-03 21:14:29'),
(14, 24, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 400, 400, NULL, NULL, NULL, NULL, '2022-12-07', 'NO', NULL, '127', NULL, '2022-12-07 04:36:14', '2022-12-07 04:36:14'),
(15, 24, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 50, 350, NULL, NULL, NULL, NULL, '2022-12-07', 'NO', NULL, '127', NULL, '2022-12-07 05:40:58', '2022-12-07 05:40:58'),
(16, 26, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 300, 400, NULL, NULL, NULL, NULL, '2022-12-07', 'YES', NULL, '127', NULL, '2022-12-07 05:59:42', '2022-12-08 03:46:25'),
(17, 26, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 300, 400, NULL, NULL, NULL, NULL, '2022-12-07', 'YES', NULL, '127', NULL, '2022-12-07 06:00:55', '2022-12-08 03:47:04'),
(18, 27, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 300, 1700, NULL, NULL, NULL, NULL, '2022-12-07', 'YES', NULL, '127', NULL, '2022-12-07 06:05:31', '2022-12-08 03:46:32'),
(19, 28, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 200, 1000, NULL, NULL, NULL, NULL, '2022-12-07', 'YES', NULL, '127', NULL, '2022-12-07 06:22:23', '2022-12-08 03:46:39'),
(20, 29, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 40, 500, 35500, NULL, NULL, 'Advance', NULL, '2022-12-07', 'YES', NULL, '127', NULL, '2022-12-07 06:30:29', '2022-12-08 03:47:45'),
(21, 30, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 100, 800, NULL, NULL, 'due_adjustment', NULL, '2022-12-07', 'NO', NULL, '127', NULL, '2022-12-07 06:44:04', '2022-12-07 06:44:04'),
(22, 30, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 50, 250, NULL, NULL, 'due_adjustment', NULL, '2022-12-07', 'YES', NULL, '127', NULL, '2022-12-07 06:47:19', '2022-12-08 03:47:50'),
(23, 31, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 600, 4400, NULL, NULL, 'due_adjustment', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-07 21:09:24', '2022-12-07 21:09:24'),
(24, 33, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5000, 55000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-07 21:33:24', '2022-12-07 21:33:24'),
(25, 33, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2000, 10000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'YES', NULL, '127', NULL, '2022-12-07 21:41:19', '2022-12-08 03:46:17'),
(26, 34, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5000, 64000, NULL, NULL, 'money_return', NULL, '2022-12-08', 'YES', NULL, '127', NULL, '2022-12-07 22:07:17', '2022-12-08 03:46:06'),
(27, 35, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4000, 15000, NULL, NULL, 'money_return', NULL, '2022-12-08', 'YES', NULL, '127', NULL, '2022-12-07 22:15:54', '2022-12-08 03:46:01'),
(28, 36, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 5000, NULL, NULL, NULL, NULL, '2022-12-08', 'YES', NULL, '127', NULL, '2022-12-07 22:39:31', '2022-12-08 03:45:57'),
(29, 37, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 5000, NULL, NULL, NULL, NULL, '2022-12-08', 'YES', NULL, '127', NULL, '2022-12-07 22:47:29', '2022-12-08 03:46:10'),
(30, 38, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 5000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-07 23:21:07', '2022-12-07 23:21:07'),
(32, 40, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 5000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-07 23:59:00', '2022-12-07 23:59:00'),
(33, 41, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 5000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-08 00:22:55', '2022-12-08 00:22:55'),
(34, 41, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1000, 2000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-08 00:23:41', '2022-12-08 00:23:41'),
(35, 42, 84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 5000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-08 02:56:37', '2022-12-08 02:56:37'),
(36, 43, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 5000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'YES', NULL, '127', NULL, '2022-12-08 03:00:15', '2022-12-08 03:20:15'),
(37, 43, 85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1000, 2000, NULL, NULL, 'Advance', NULL, '2022-12-08', 'YES', NULL, '127', NULL, '2022-12-08 03:01:26', '2022-12-08 03:20:11'),
(38, 44, 86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 50, 450, NULL, NULL, 'due_adjustment', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-08 03:15:57', '2022-12-08 03:15:57'),
(39, 45, 87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 50, 550, NULL, NULL, 'due_adjustment', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-08 03:18:35', '2022-12-08 03:18:35'),
(40, 46, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 100, 500, NULL, NULL, 'money_return', NULL, '2022-12-08', 'NO', NULL, '127', NULL, '2022-12-08 03:30:45', '2022-12-08 03:30:45'),
(41, 99, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'money_return', NULL, '2022-12-11', 'YES', NULL, '127', NULL, '2022-12-10 21:12:11', '2022-12-10 21:18:04'),
(42, 99, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 'money_return', NULL, '2022-12-11', 'YES', NULL, '127', NULL, '2022-12-10 21:15:07', '2022-12-10 21:18:08'),
(43, 100, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1000, 7000, NULL, NULL, 'money_return', NULL, '2022-12-11', 'NO', NULL, '127', NULL, '2022-12-10 21:17:22', '2022-12-10 21:17:22'),
(44, 101, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1000, 2000, NULL, NULL, 'money_return', NULL, '2022-12-11', 'NO', NULL, '127', NULL, '2022-12-10 23:26:28', '2022-12-10 23:26:28'),
(45, 102, 93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 700, 2300, NULL, NULL, 'money_return', NULL, '2022-12-11', 'YES', NULL, '127', NULL, '2022-12-11 02:13:22', '2022-12-19 02:24:31'),
(46, 103, 94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 20, 280, NULL, NULL, 'money_return', NULL, '2022-12-11', 'YES', NULL, '127', NULL, '2022-12-11 03:05:28', '2022-12-19 02:24:28'),
(47, 104, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 30, 220, NULL, NULL, 'money_return', NULL, '2022-12-11', 'NO', NULL, '127', NULL, '2022-12-11 03:07:39', '2022-12-11 03:07:39'),
(48, 105, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 90, 410, NULL, NULL, 'money_return', NULL, '2022-12-11', 'NO', NULL, '127', NULL, '2022-12-11 03:18:38', '2022-12-11 03:18:38'),
(49, 106, 97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 250, 350, NULL, NULL, 'money_return', NULL, '2022-12-11', 'NO', NULL, '127', NULL, '2022-12-11 03:30:35', '2022-12-11 03:30:35'),
(50, 107, 98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 250, 750, NULL, NULL, 'due_adjustment', NULL, '2022-12-11', 'NO', NULL, '127', NULL, '2022-12-11 03:36:02', '2022-12-11 03:36:02'),
(51, 108, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 30, 370, NULL, NULL, 'money_return', NULL, '2022-12-11', 'YES', NULL, '127', NULL, '2022-12-11 03:58:49', '2022-12-11 04:00:50'),
(52, 109, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 50, 250, NULL, NULL, 'money_return', NULL, '2022-12-11', 'NO', NULL, '127', NULL, '2022-12-11 04:05:01', '2022-12-11 04:05:01'),
(53, 110, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1000, 4000, NULL, NULL, 'money_return', NULL, '2022-12-12', 'NO', NULL, '127', NULL, '2022-12-12 00:19:40', '2022-12-12 00:19:40'),
(54, 113, 104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 100, 600, NULL, NULL, 'money_return', NULL, '2022-12-18', 'NO', NULL, '127', NULL, '2022-12-17 21:11:16', '2022-12-17 21:11:16'),
(55, 115, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 50, 50, NULL, NULL, 'money_return', NULL, '2022-12-18', 'NO', NULL, '127', NULL, '2022-12-17 21:28:54', '2022-12-17 21:28:54'),
(56, 116, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 100, 400, NULL, NULL, 'money_return', NULL, '2022-12-18', 'YES', NULL, '127', NULL, '2022-12-17 21:33:49', '2022-12-19 02:23:43'),
(57, 117, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 150, 350, NULL, NULL, 'money_return', NULL, '2022-12-18', 'NO', NULL, '127', NULL, '2022-12-17 21:46:36', '2022-12-17 21:46:36'),
(58, 121, 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 120, 2880, NULL, NULL, NULL, NULL, '2022-12-18', 'YES', NULL, '127', NULL, '2022-12-18 04:44:13', '2022-12-18 21:23:03'),
(59, 123, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 122, 2578, NULL, NULL, 'money_return', NULL, '2022-12-19', 'YES', NULL, '127', NULL, '2022-12-19 02:16:21', '2022-12-19 02:23:39'),
(60, 124, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 430, 1870, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:02:38', '2022-12-19 04:02:38'),
(61, 125, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 110, 490, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:05:54', '2022-12-19 04:05:54'),
(62, 126, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 80, 260, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:08:12', '2022-12-19 04:08:12'),
(63, 127, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 50, 450, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:19:31', '2022-12-19 04:19:31'),
(64, 128, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 800, 2000, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:24:58', '2022-12-19 04:24:58'),
(65, 129, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 100, 2100, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:36:29', '2022-12-19 04:36:29'),
(66, 129, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 70, 1030, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:37:13', '2022-12-19 04:37:13'),
(67, 130, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 390, 5010, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 04:43:41', '2022-12-19 04:43:41'),
(68, 130, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, 240, 2460, NULL, NULL, 'money_return', NULL, '2022-12-19', 'NO', NULL, '127', NULL, '2022-12-19 05:18:11', '2022-12-19 05:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `refund_items`
--

CREATE TABLE `refund_items` (
  `refund_item_id` int(10) UNSIGNED NOT NULL,
  `refund_product_id` bigint(20) DEFAULT NULL,
  `refund_invoice_quantity` bigint(20) DEFAULT NULL,
  `refund_remaining_quantity` bigint(20) DEFAULT NULL,
  `refund_quantity` bigint(20) DEFAULT NULL,
  `refund_charge` bigint(20) DEFAULT NULL,
  `refund_unit_price` bigint(20) DEFAULT NULL,
  `refund_single_product_total_price` bigint(20) DEFAULT NULL,
  `refund_amount` bigint(20) DEFAULT NULL,
  `refund_return_price` bigint(20) DEFAULT NULL,
  `refund_total` bigint(20) DEFAULT NULL,
  `refund_net_charge_total` bigint(20) DEFAULT NULL,
  `refund_total_price` bigint(20) DEFAULT NULL,
  `refund_item_created_by` bigint(20) DEFAULT NULL,
  `refund_item_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `institution_id`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super-admin', NULL, '2021-10-17 03:37:59', '2021-10-17 03:37:59'),
(2, 'Settings', 'settings', NULL, '2021-10-18 05:43:55', '2021-10-18 05:43:55'),
(3, 'Employee', 'employee', NULL, '2021-11-01 22:14:55', '2021-11-01 22:14:55'),
(4, 'Bangladesh Bank Admin', 'bangladesh-bank-admin', 1, '2021-12-14 09:37:51', '2021-12-14 10:01:36'),
(5, 'Bangladesh Bank User', 'bangladesh-bank-user', NULL, '2021-12-14 09:40:27', '2021-12-14 09:40:27'),
(6, 'Estern Bank Admin', 'estern-bank-admin', 3, '2021-12-14 09:56:33', '2021-12-14 09:57:30'),
(7, 'Bangladesh Bank Employee', 'bangladesh-bank-employee', 1, '2021-12-14 10:05:45', '2021-12-14 10:05:45'),
(8, 'New Bangladesh Bank User', 'new-bangladesh-bank-user', 1, '2021-12-14 11:32:08', '2021-12-14 11:41:41'),
(9, 'Admin', 'admin', 1, '2022-01-02 11:26:07', '2022-01-02 11:26:07'),
(10, 'NRBC Head Man', 'nrbc-head-man', 5, '2022-02-03 06:02:52', '2022-02-03 06:02:52'),
(11, 'Sub Admin', 'sub-admin', 1, '2022-06-26 05:51:15', '2022-06-26 05:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(2, 4),
(3, 3),
(3, 25),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 14),
(4, 15),
(4, 16),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 3),
(8, 28),
(8, 29),
(8, 30),
(8, 31),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 21),
(9, 22),
(9, 23),
(9, 24),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 13),
(10, 21),
(10, 22),
(10, 23),
(10, 24),
(10, 25),
(10, 26),
(10, 32),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 21),
(11, 22),
(11, 23),
(11, 24);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int(10) UNSIGNED NOT NULL,
  `sponsor_entry_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_country_id` bigint(20) DEFAULT NULL,
  `sponsor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_nid` bigint(20) DEFAULT NULL,
  `sponsor_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_status` bigint(20) DEFAULT NULL,
  `sponsor_licence_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_licence_no` bigint(20) DEFAULT NULL,
  `sponsor_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `sponsor_create_by` int(11) DEFAULT NULL,
  `sponsor_created_by` int(11) DEFAULT NULL,
  `sponsor_updated_by` int(11) DEFAULT NULL,
  `sponsor_deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_entry_id`, `sponsor_country_name`, `sponsor_country_id`, `sponsor_name`, `sponsor_phone`, `sponsor_email`, `sponsor_nid`, `sponsor_picture`, `sponsor_status`, `sponsor_licence_file`, `sponsor_licence_no`, `sponsor_create_date`, `sponsor_has_deleted`, `sponsor_create_by`, `sponsor_created_by`, `sponsor_updated_by`, `sponsor_deleted_by`, `created_at`, `updated_at`) VALUES
(1, 'Meow88573', 'Aland Islands', 2, 'Meow', '45448', 'meow@gmail.com', NULL, '/uploads/', 1, '/uploads/', 1515151, '2022/11/30', 'NO', NULL, 127, NULL, NULL, '2022-11-29 23:13:15', '2022-11-29 23:13:15'),
(2, 'Meow88573', 'Aland Islands', 2, 'Meow', '45448', 'meow@gmail.com', NULL, '/uploads/', 1, '/uploads/', 1515151, '2022/11/30', 'NO', NULL, 127, NULL, NULL, '2022-11-29 23:13:16', '2022-11-29 23:13:16'),
(3, 'Meow88573', 'Aland Islands', 2, 'Meow', '45448', 'meow@gmail.com', NULL, '/uploads/', 1, '/uploads/', 1515151, '2022/11/30', 'NO', NULL, 127, NULL, NULL, '2022-11-29 23:13:21', '2022-11-29 23:13:21'),
(4, 'David Vila93559', 'Afghanistan', 1, 'David Vila', '510515', 'david@gmail.com', NULL, '/uploads/', 1, '/uploads/', 203615615, '2022/12/14', 'NO', NULL, 127, NULL, NULL, '2022-12-13 23:15:16', '2022-12-13 23:15:16'),
(5, 'Praveen Kumar9227', 'New Zealand', 158, 'Praveen Kumar', '11515151', 'praveen@gmail.com', NULL, '/uploads/', 1, '/uploads/', 415151, '2022/12/14', 'NO', NULL, 127, NULL, NULL, '2022-12-14 04:40:11', '2022-12-14 04:40:11'),
(6, 'Ramin46197', 'Afghanistan', 1, 'Ramin', '015213206072', 'ramin@gmail.com', NULL, '/uploads/', 1, '/uploads/1671246028.png', 44151051, '2022/12/17', 'NO', NULL, 127, NULL, NULL, '2022-12-16 21:00:28', '2022-12-16 21:00:28'),
(7, 'Nahid sponsor 4587', 'Saudi Arabia', 194, 'Nahid sponsor', NULL, NULL, NULL, '/uploads/', 1, '/uploads/', 434, '2023/02/09', 'NO', NULL, 126, NULL, NULL, '2023-02-08 21:17:42', '2023-02-08 21:17:42'),
(8, 'Nahid sponsor 4587', 'Saudi Arabia', 194, 'Nahid sponsor', NULL, NULL, NULL, '/uploads/', 1, '/uploads/', 434, '2023/02/09', 'NO', NULL, 126, NULL, NULL, '2023-02-08 21:19:43', '2023-02-08 21:19:43'),
(9, 'Nahid sponsor 4587', 'Saudi Arabia', 194, 'Nahid sponsor', NULL, NULL, NULL, '/uploads/', 1, '/uploads/', 434, '2023/02/09', 'NO', NULL, 126, NULL, NULL, '2023-02-08 21:19:47', '2023-02-08 21:19:47'),
(10, 'Nahid sponsor 4587', 'Saudi Arabia', 194, 'Nahid sponsor', NULL, NULL, NULL, '/uploads/', 1, '/uploads/', 434, '2023/02/09', 'NO', NULL, 126, NULL, NULL, '2023-02-08 21:19:49', '2023-02-08 21:19:49'),
(11, 'Nahid sponsor 88769', 'Azerbaijan', 16, 'Nahid sponsor', NULL, NULL, NULL, '/uploads/', 1, '/uploads/', NULL, '2023/05/23', 'NO', NULL, 129, NULL, NULL, '2023-05-23 03:27:30', '2023-05-23 03:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_ledgers`
--

CREATE TABLE `sponsor_ledgers` (
  `sponsor_ledger_id` int(10) UNSIGNED NOT NULL,
  `sponsor_id` bigint(20) DEFAULT NULL,
  `sponsor_account_id` bigint(20) DEFAULT NULL,
  `sponsor_transaction_id` bigint(20) DEFAULT NULL,
  `sponsor_ledger_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_ledger_invoice_id` bigint(20) DEFAULT NULL,
  `sponsor_ledger_money_receipt_id` bigint(20) DEFAULT NULL,
  `sponsor_ledger_refund_id` bigint(20) DEFAULT NULL,
  `sponsor_ledger_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_ledger_last_balance` bigint(20) DEFAULT NULL,
  `sponsor_ledger_dr` bigint(20) DEFAULT NULL,
  `sponsor_ledger_cr` bigint(20) DEFAULT NULL,
  `sponsor_ledger_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_ledger_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_ledger_prepared_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor_ledgers`
--

INSERT INTO `sponsor_ledgers` (`sponsor_ledger_id`, `sponsor_id`, `sponsor_account_id`, `sponsor_transaction_id`, `sponsor_ledger_type`, `sponsor_ledger_invoice_id`, `sponsor_ledger_money_receipt_id`, `sponsor_ledger_refund_id`, `sponsor_ledger_status`, `sponsor_ledger_last_balance`, `sponsor_ledger_dr`, `sponsor_ledger_cr`, `sponsor_ledger_date`, `sponsor_ledger_create_date`, `sponsor_ledger_prepared_by`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 4, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 50000, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:18:24', '2022-12-13 23:18:24'),
(2, 4, NULL, 5, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 8500, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:27:38', '2022-12-13 23:27:38'),
(3, 4, NULL, 6, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 1151, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:32:26', '2022-12-13 23:32:26'),
(4, 4, NULL, 8, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 4500, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:35:09', '2022-12-13 23:35:09'),
(5, 4, NULL, 9, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 451, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:36:37', '2022-12-13 23:36:37'),
(6, 4, NULL, 10, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 45000, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:37:32', '2022-12-13 23:37:32'),
(7, 4, NULL, 11, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 48500, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:39:39', '2022-12-13 23:39:39'),
(8, 4, NULL, 12, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 48500, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:40:29', '2022-12-13 23:40:29'),
(9, 4, NULL, 13, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 5151, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:42:34', '2022-12-13 23:42:34'),
(10, 4, NULL, 14, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 8500, '2022-12-14', '2022-12-14', '127', '2022-12-13 23:44:51', '2022-12-13 23:44:51'),
(11, 4, NULL, 15, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 850, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:33:46', '2022-12-14 00:33:46'),
(12, 4, NULL, 16, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 850, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:33:58', '2022-12-14 00:33:58'),
(13, NULL, NULL, 17, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, '2022-12-14', '127', '2022-12-14 00:38:47', '2022-12-14 00:38:47'),
(14, 4, NULL, 18, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 5800, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:39:07', '2022-12-14 00:39:07'),
(15, 4, NULL, 19, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 5000, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:39:30', '2022-12-14 00:39:30'),
(16, 4, NULL, 20, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 5000, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:43:01', '2022-12-14 00:43:01'),
(17, 4, NULL, 21, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 4500, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:43:36', '2022-12-14 00:43:36'),
(18, 4, NULL, 22, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 5000, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:47:08', '2022-12-14 00:47:08'),
(19, 4, NULL, 23, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 4800, '2022-12-14', '2022-12-14', '127', '2022-12-14 00:57:47', '2022-12-14 00:57:47'),
(20, NULL, NULL, 3, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 50000, '2022-12-14', NULL, '127', '2022-12-14 04:22:15', '2022-12-14 04:22:15'),
(21, NULL, NULL, 3, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 50, '2022-12-14', NULL, '127', '2022-12-14 04:22:42', '2022-12-14 04:22:42'),
(22, NULL, NULL, 5, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 85, '2022-12-14', NULL, '127', '2022-12-14 04:23:18', '2022-12-14 04:23:18'),
(23, NULL, NULL, 5, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 80, '2022-12-14', NULL, '127', '2022-12-14 04:29:05', '2022-12-14 04:29:05'),
(24, 4, NULL, 24, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 4500, '2022-12-14', '2022-12-14', '127', '2022-12-14 05:38:27', '2022-12-14 05:38:27'),
(25, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 4000, '2022-12-14', NULL, '127', '2022-12-14 05:42:12', '2022-12-14 05:42:12'),
(26, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 3500, '2022-12-14', NULL, '127', '2022-12-14 05:42:51', '2022-12-14 05:42:51'),
(27, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 40000, '2022-12-14', NULL, '127', '2022-12-14 05:47:51', '2022-12-14 05:47:51'),
(28, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 50000, '2022-12-14', NULL, '127', '2022-12-14 05:48:14', '2022-12-14 05:48:14'),
(29, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 40000, '2022-12-14', NULL, '127', '2022-12-14 05:49:15', '2022-12-14 05:49:15'),
(30, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 90000, '2022-12-14', NULL, '127', '2022-12-14 05:49:51', '2022-12-14 05:49:51'),
(31, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 4500, '2022-12-14', NULL, '127', '2022-12-14 05:50:14', '2022-12-14 05:50:14'),
(32, NULL, NULL, 24, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 958541, '2022-12-14', NULL, '127', '2022-12-14 05:56:51', '2022-12-14 05:56:51'),
(33, 4, NULL, 25, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 450, '2022-12-14', '2022-12-14', '127', '2022-12-14 05:58:38', '2022-12-14 05:58:38'),
(34, 3, NULL, 26, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 50000, NULL, 112512, '2022-12-14', '2022-12-14', '127', '2022-12-14 06:03:34', '2022-12-14 06:03:34'),
(35, NULL, NULL, 26, 'SPONSOR_PAYMENT_UPDATED', NULL, NULL, NULL, '1', 0, NULL, 1000, '2022-12-14', NULL, '127', '2022-12-14 06:03:58', '2022-12-14 06:03:58'),
(36, 6, NULL, 27, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 1151, NULL, 45000, '2022-12-17', '2022-12-17', '127', '2022-12-16 21:01:16', '2022-12-16 21:01:16'),
(37, 6, NULL, 28, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 1151, NULL, 80000, '2022-12-17', '2022-12-17', '127', '2022-12-16 21:50:23', '2022-12-16 21:50:23'),
(38, 5, NULL, 29, 'SPONSOR_PAYMENT', NULL, NULL, NULL, '1', 8500, NULL, 89500, '2022-12-17', '2022-12-17', '127', '2022-12-16 21:53:04', '2022-12-16 21:53:04'),
(39, 6, NULL, 30, 'SPONSOR_PAYMENT', NULL, 62, NULL, '1', 1151, NULL, 200, '2022-12-17', '2022-12-17', '127', '2022-12-16 21:54:26', '2022-12-16 21:54:26'),
(40, 6, NULL, 31, 'SPONSOR_PAYMENT', NULL, 63, NULL, '1', 1151, NULL, 800, '2022-12-17', '2022-12-17', '127', '2022-12-16 21:59:08', '2022-12-16 21:59:08'),
(41, 6, NULL, 32, 'SPONSOR_PAYMENT', NULL, 81, NULL, '1', 1151, NULL, 8950821414, '2022-12-18', '2022-12-18', '127', '2022-12-17 22:57:56', '2022-12-17 22:57:56'),
(42, 5, NULL, 33, 'SPONSOR_PAYMENT', NULL, 88, NULL, '1', 8500, NULL, 45000, '2022-12-18', '2022-12-18', '127', '2022-12-17 23:36:29', '2022-12-17 23:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_transactions`
--

CREATE TABLE `sponsor_transactions` (
  `sponsor_transaction_id` int(10) UNSIGNED NOT NULL,
  `sponsor_transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_transaction_account_id` bigint(20) DEFAULT NULL,
  `sponsor_transaction_client_id` bigint(20) DEFAULT NULL,
  `sponsor_transaction_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_transaction_last_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_transaction_opening_balance` bigint(20) DEFAULT NULL,
  `sponsor_transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_transaction_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_account_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_account_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `sponsor_account_deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_account_created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_account_updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_account_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsor_transactions`
--

INSERT INTO `sponsor_transactions` (`sponsor_transaction_id`, `sponsor_transaction_type`, `sponsor_transaction_account_id`, `sponsor_transaction_client_id`, `sponsor_transaction_amount`, `sponsor_transaction_last_balance`, `sponsor_transaction_opening_balance`, `sponsor_transaction_date`, `sponsor_transaction_note`, `sponsor_account_create_date`, `sponsor_account_has_deleted`, `sponsor_account_deleted_by`, `sponsor_account_created_by`, `sponsor_account_updated_by`, `sponsor_account_status`, `created_at`, `updated_at`) VALUES
(3, 'CREDIT', NULL, 4, '50000', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:17:05', '2022-12-13 23:17:05'),
(4, 'CREDIT', NULL, 4, '50000', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:18:24', '2022-12-13 23:18:24'),
(5, 'CREDIT', NULL, 4, '8500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:27:38', '2022-12-14 04:23:18'),
(6, 'CREDIT', NULL, 4, '1151', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:32:26', '2022-12-13 23:32:26'),
(7, 'CREDIT', NULL, 4, '4500', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:33:42', '2022-12-13 23:33:42'),
(8, 'CREDIT', NULL, 4, '4500', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:35:09', '2022-12-13 23:35:09'),
(9, 'CREDIT', NULL, 4, '451', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:36:37', '2022-12-13 23:36:37'),
(10, 'CREDIT', NULL, 4, '45000', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:37:32', '2022-12-13 23:37:32'),
(11, 'CREDIT', NULL, 4, '48500', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:39:39', '2022-12-13 23:39:39'),
(12, 'CREDIT', NULL, 4, '48500', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:40:29', '2022-12-13 23:40:29'),
(13, 'CREDIT', NULL, 4, '5151', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:42:34', '2022-12-13 23:42:34'),
(14, 'CREDIT', NULL, 4, '8500', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-13 23:44:51', '2022-12-13 23:44:51'),
(15, 'CREDIT', NULL, 4, '850', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:33:46', '2022-12-14 00:33:46'),
(16, 'CREDIT', NULL, 4, '850', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:33:58', '2022-12-14 00:33:58'),
(17, 'CREDIT', NULL, NULL, NULL, '0', NULL, NULL, NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:38:47', '2022-12-14 00:38:47'),
(18, 'CREDIT', NULL, 4, '5800', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:39:07', '2022-12-14 00:39:07'),
(19, 'CREDIT', NULL, 4, '5000', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:39:30', '2022-12-14 00:39:30'),
(20, 'CREDIT', NULL, 4, '5000', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:43:01', '2022-12-14 00:43:01'),
(21, 'CREDIT', NULL, 4, '4500', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:43:36', '2022-12-14 00:43:36'),
(22, 'CREDIT', NULL, 4, '5000', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:47:08', '2022-12-14 00:47:08'),
(23, 'CREDIT', NULL, 4, '4800', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 00:57:47', '2022-12-14 00:57:47'),
(24, 'CREDIT', NULL, 4, '4500', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 05:38:27', '2022-12-14 05:42:12'),
(25, 'CREDIT', NULL, 4, '450', '50000', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 05:58:38', '2022-12-14 05:58:38'),
(26, 'CREDIT', NULL, 3, '112512', '0', NULL, '2022-12-14', NULL, '2022-12-14', 'NO', NULL, NULL, NULL, '1', '2022-12-14 06:03:34', '2022-12-14 06:03:58'),
(27, 'CREDIT', NULL, 6, '45000', '1151', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, NULL, NULL, '1', '2022-12-16 21:01:16', '2022-12-16 21:01:16'),
(28, 'CREDIT', NULL, 6, '80000', '1151', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, NULL, NULL, '1', '2022-12-16 21:50:23', '2022-12-16 21:50:23'),
(29, 'CREDIT', NULL, 5, '89500', '8500', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, NULL, NULL, '1', '2022-12-16 21:53:04', '2022-12-16 21:53:04'),
(30, 'CREDIT', NULL, 6, '200', '1151', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, NULL, NULL, '1', '2022-12-16 21:54:26', '2022-12-16 21:54:26'),
(31, 'CREDIT', NULL, 6, '800', '1151', NULL, '2022-12-17', NULL, '2022-12-17', 'NO', NULL, NULL, NULL, '1', '2022-12-16 21:59:08', '2022-12-16 21:59:08'),
(32, 'CREDIT', NULL, 6, '8950821414', '1151', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-17 22:57:56', '2022-12-17 22:57:56'),
(33, 'CREDIT', NULL, 5, '45000', '8500', NULL, '2022-12-18', NULL, '2022-12-18', 'NO', NULL, NULL, NULL, '1', '2022-12-17 23:36:29', '2022-12-17 23:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `subheads`
--

CREATE TABLE `subheads` (
  `subhead_id` int(10) UNSIGNED NOT NULL,
  `head_id` int(20) DEFAULT NULL,
  `sub_head_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_head_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subheads`
--

INSERT INTO `subheads` (`subhead_id`, `head_id`, `sub_head_name`, `sub_head_slug`, `created_at`, `updated_at`) VALUES
(6, 3, 'Medical Test', 'Medical Test', '2022-11-23 22:46:51', '2022-11-23 22:46:51'),
(7, 3, 'Police Clearence', 'Police Clearence', '2022-11-23 22:47:04', '2022-11-23 22:47:04'),
(8, 3, 'Passport', 'Passport', '2022-11-23 22:47:23', '2022-11-23 22:47:23'),
(9, 3, 'Visa', 'Visa', '2022-11-23 22:47:31', '2022-11-23 22:47:31'),
(10, 3, 'Manpower', 'Manpower', '2022-11-23 22:47:41', '2022-11-23 22:47:41'),
(11, 2, 'Bazar Purpose', 'Bazar Purpose', '2022-11-24 04:32:05', '2022-11-24 04:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `training_cards`
--

CREATE TABLE `training_cards` (
  `training_card_id` int(10) UNSIGNED NOT NULL,
  `training_card_client_id` bigint(20) NOT NULL,
  `training_card_vendor_id` int(11) DEFAULT NULL,
  `training_card_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_card_processing_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_card_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_card_created_by` bigint(20) DEFAULT NULL,
  `training_card_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `training_card_updated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `training_card_create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_cards`
--

INSERT INTO `training_cards` (`training_card_id`, `training_card_client_id`, `training_card_vendor_id`, `training_card_status`, `training_card_processing_cost`, `training_card_file`, `note`, `training_card_created_by`, `training_card_has_deleted`, `training_card_updated`, `training_card_create_date`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, 'no', NULL, '/uploads/1669890595.png', NULL, 131, 'YES', NULL, '2022-12-01', '2022-12-01 04:29:55', '2022-12-01 04:59:48'),
(2, 70, 1, 'yes', '3000', '/uploads/1671527880.png', NULL, 127, 'NO', NULL, '2022-12-21', '2022-12-20 03:18:00', '2022-12-21 01:37:39'),
(3, 65, 1, 'yes', '2000', '/uploads/1671608291.png', NULL, 127, 'NO', NULL, '2022-12-21', '2022-12-21 01:38:11', '2022-12-21 01:38:11'),
(4, 111, NULL, 'yes', '2000', '/uploads/1675923768.jpg', NULL, 126, 'NO', NULL, '2023-02-09', '2023-02-09 00:22:48', '2023-02-09 00:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '6',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(7) NOT NULL DEFAULT 1 COMMENT '1 active 0 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `email`, `description`, `slug`, `image`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `phone`, `address`, `user_type`, `status`) VALUES
(126, NULL, 'shahed', 'shahed@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$vQ1KO2wt/7uwszfevlO0LuGjPRyj0YLfEuLGt6ql7/Y/f3Q/Prb86', '1', NULL, '2022-11-20 20:40:15', '2022-11-20 20:43:52', '01957026832', NULL, NULL, 1),
(127, NULL, 'shadman', 'shadman@gmail.com', NULL, 'shadman', NULL, NULL, '$2y$10$ci20B9yrlcmu.kKVlC8xjO74D2AsTpXpziT.32IfYRzNO50/oc99i', '1', NULL, '2022-11-20 20:41:20', '2022-11-20 20:41:20', '01521326075', NULL, NULL, 1),
(128, NULL, 'shafiq', 'shafiq@gmail.com', NULL, 'shafiq', NULL, NULL, '$2y$10$phtW4JFEROX/frprvRiMqezrKWJ01v2CdNdlWDDJHnXlO3vs8VHkm', '1', NULL, '2022-11-20 20:41:59', '2022-11-20 20:41:59', '01521326062', NULL, NULL, 1),
(129, NULL, 'armaan', 'armaan@gmail.com', NULL, 'armaan', NULL, NULL, '$2y$10$/A9MFpWh8pBsKB3d2/dReuBmZj3FHV1cTbh3eFsXk5MXwM.C.YC8.', '1', NULL, '2022-11-20 20:42:35', '2022-11-20 20:42:35', '01401033445', NULL, NULL, 1),
(130, NULL, 'quiz360', 'quiz@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$Psg60LBHPo7g8r2R6pIsBeFMuCwBYL3Eva0Lbk73ysz9TBV7ocLmO', NULL, NULL, '2022-11-21 23:56:26', '2022-11-21 23:56:26', NULL, NULL, NULL, 1),
(131, NULL, 'thomas', 'thomas@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$ABVPZjoqkEnlqBHzj2yLwuUGG3RDl3s3DnLieSBY6EubjgeYuZV5C', NULL, NULL, '2022-11-27 02:22:50', '2022-11-27 02:22:50', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(126, 1, NULL, NULL),
(126, 2, NULL, NULL),
(126, 3, NULL, NULL),
(126, 4, NULL, NULL),
(126, 9, NULL, NULL),
(126, 10, NULL, NULL),
(126, 11, NULL, NULL),
(126, 12, NULL, NULL),
(126, 13, NULL, NULL),
(126, 14, NULL, NULL),
(126, 15, NULL, NULL),
(126, 16, NULL, NULL),
(126, 21, NULL, NULL),
(126, 22, NULL, NULL),
(126, 23, NULL, NULL),
(126, 24, NULL, NULL),
(126, 25, NULL, NULL),
(126, 26, NULL, NULL),
(127, 1, NULL, NULL),
(127, 2, NULL, NULL),
(127, 3, NULL, NULL),
(127, 4, NULL, NULL),
(127, 9, NULL, NULL),
(127, 10, NULL, NULL),
(127, 11, NULL, NULL),
(127, 12, NULL, NULL),
(127, 13, NULL, NULL),
(127, 14, NULL, NULL),
(127, 15, NULL, NULL),
(127, 16, NULL, NULL),
(127, 21, NULL, NULL),
(127, 22, NULL, NULL),
(127, 23, NULL, NULL),
(127, 24, NULL, NULL),
(127, 25, NULL, NULL),
(127, 26, NULL, NULL),
(128, 1, NULL, NULL),
(128, 2, NULL, NULL),
(128, 3, NULL, NULL),
(128, 4, NULL, NULL),
(128, 9, NULL, NULL),
(128, 10, NULL, NULL),
(128, 11, NULL, NULL),
(128, 12, NULL, NULL),
(128, 13, NULL, NULL),
(128, 14, NULL, NULL),
(128, 15, NULL, NULL),
(128, 16, NULL, NULL),
(128, 21, NULL, NULL),
(128, 22, NULL, NULL),
(128, 23, NULL, NULL),
(128, 24, NULL, NULL),
(128, 25, NULL, NULL),
(128, 26, NULL, NULL),
(129, 1, NULL, NULL),
(129, 2, NULL, NULL),
(129, 3, NULL, NULL),
(129, 4, NULL, NULL),
(129, 9, NULL, NULL),
(129, 10, NULL, NULL),
(129, 11, NULL, NULL),
(129, 12, NULL, NULL),
(129, 13, NULL, NULL),
(129, 14, NULL, NULL),
(129, 15, NULL, NULL),
(129, 16, NULL, NULL),
(129, 21, NULL, NULL),
(129, 22, NULL, NULL),
(129, 23, NULL, NULL),
(129, 24, NULL, NULL),
(129, 25, NULL, NULL),
(129, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(126, 1),
(127, 1),
(128, 1),
(129, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `vendor_entry_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_status` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_create_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_has_deleted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `vendor_deleted_by` bigint(20) DEFAULT NULL,
  `vendor_created_by` bigint(20) DEFAULT NULL,
  `vendor_updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_entry_id`, `vendor_name`, `vendor_nid`, `vendor_company_name`, `vendor_email`, `vendor_phone`, `vendor_address`, `vendor_status`, `vendor_create_date`, `vendor_has_deleted`, `vendor_deleted_by`, `vendor_created_by`, `vendor_updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Vendor60016', 'Test Vendor 1', '47963454', 'Test Company 3', 'ssk.m360ict@gmail.com', '018978466', 'House: 30 CWN (A), Road: 42-43 Gulshan 2, Dhaka – 1212, Bangladesh', '0', '2022-12-20', 'YES', 127, NULL, 127, '2022-12-20 06:27:49', '2022-12-20 07:24:06'),
(2, 'bmet93301', 'bmet', NULL, NULL, NULL, NULL, NULL, '1', '2023-03-23', 'NO', NULL, 129, NULL, '2023-03-22 21:52:48', '2023-03-22 21:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `visa_information`
--

CREATE TABLE `visa_information` (
  `visa_id` int(10) UNSIGNED NOT NULL,
  `visa_client_id` int(11) DEFAULT NULL,
  `visa_vendor_id` int(11) DEFAULT NULL,
  `visa_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa_issue_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_job_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_gender_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa_amount` bigint(20) DEFAULT NULL,
  `passenger_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_clearence_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_test_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_has_deleted` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visa_information`
--

INSERT INTO `visa_information` (`visa_id`, `visa_client_id`, `visa_vendor_id`, `visa_no`, `visa_issue_date`, `visa_expiry_date`, `visa_job_type`, `duration`, `visa_gender_type`, `visa_amount`, `passenger_name`, `nid_number`, `passport_number`, `reference_name`, `note`, `police_clearence_number`, `medical_test_date`, `mobile_no`, `office_date`, `visa_has_deleted`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '54654', '2022-11-16', NULL, 'advance', NULL, 'advance', 5465464646, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YES', '2022-11-20 05:22:03', '2022-11-20 06:24:11'),
(2, NULL, NULL, '54654', '2022-11-16', NULL, 'advance', NULL, 'advance', 546546, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YES', '2022-11-20 05:22:04', '2022-11-20 06:24:17'),
(3, NULL, NULL, '54654', '2022-11-16', NULL, 'advance', NULL, 'advance', 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', '2022-11-20 05:22:06', '2022-11-20 06:18:27'),
(4, NULL, NULL, '4554654', '2022-11-23', NULL, 'advance', NULL, 'advance', 645654, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', '2022-11-20 05:35:09', '2022-11-20 05:35:09'),
(5, 70, NULL, '1612234566', '2022-12-18', NULL, 'due', NULL, 'due', 2000, 'rgrfg sdsf', '14545', '0175565875', 'csxvdfsv', NULL, '2023-01-07', '2023-01-08', '4545745', '2023-01-18', 'NO', '2022-12-20 03:14:31', '2023-01-08 00:40:38'),
(6, 109, 1, '1612234566', '2022-12-01', NULL, 'advance', NULL, 'advance', 2000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', '2022-12-20 05:40:32', '2022-12-20 23:35:43'),
(7, 75, 1, '1612234566', '2023-01-08', NULL, 'advance', NULL, 'woman', 2000, 'rgrfg sdsf', '654984684', '9845989498', 'csxvdfsvsgerg', NULL, '2023-01-07', '2023-01-07', '3434232', '2023-01-09', 'NO', '2023-01-08 00:44:56', '2023-01-08 00:44:56'),
(8, 111, NULL, '103203', '2023-02-05', NULL, 'ujgbguy', NULL, 'man', 10000, 'nahid hdjsh', '6259682798', '6546269', '6526985269', NULL, '2023-02-16', '2023-02-26', '56465465', '2023-02-21', 'NO', '2023-02-09 00:20:27', '2023-02-09 00:20:27'),
(9, 65, 1, '41515656151', '2023-04-07', '2023-03-20', 'jaahfbhfe', NULL, 'other', NULL, 'nahian', '528484848', '485185185', '4515151', '4848fa1fa84af1f', '445815415', '2023-03-14', '01401033443', '2023-03-14', 'NO', '2023-03-14 02:06:01', '2023-03-14 02:06:01'),
(10, 70, 1, '5115155151', '2023-03-16', '2023-03-16', '4500000', NULL, 'man', 1000, 'armaan', '48446556', '89484484', 'faffafeeff', 'armaan', '5544889966', '2023-03-01', '01401033455', '2023-03-20', 'NO', '2023-03-16 02:34:57', '2023-03-16 02:34:57'),
(11, NULL, NULL, 'aff44affa15faf1a5', '2022-11-09', '2023-03-17', 'afefefaefae', '128', 'woman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', '2023-03-16 03:01:10', '2023-03-16 03:01:10'),
(12, 114, 2, '14f5ae15ef1afe5af15afe1', '2023-05-09', '2023-06-10', 'fjenefujefbnjef', '32', 'man', 10000, 'shofiqul', '45515415415', '1541515', '15151515', 'efaefefafefae', '15151515', '2023-05-09', '01401033455', '2023-05-10', 'NO', '2023-05-09 03:51:03', '2023-05-09 03:51:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `account_trasections`
--
ALTER TABLE `account_trasections`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `agents_ledgers`
--
ALTER TABLE `agents_ledgers`
  ADD PRIMARY KEY (`agent_ledger_id`);

--
-- Indexes for table `agent_ledgers`
--
ALTER TABLE `agent_ledgers`
  ADD PRIMARY KEY (`agent_ledger_id`);

--
-- Indexes for table `agent_transections`
--
ALTER TABLE `agent_transections`
  ADD PRIMARY KEY (`agent_transaction_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_agents`
--
ALTER TABLE `client_agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_ledgers`
--
ALTER TABLE `client_ledgers`
  ADD PRIMARY KEY (`client_ledger_id`);

--
-- Indexes for table `client_over_alls`
--
ALTER TABLE `client_over_alls`
  ADD PRIMARY KEY (`client_overall_id`);

--
-- Indexes for table `client_transactions`
--
ALTER TABLE `client_transactions`
  ADD PRIMARY KEY (`client_transaction_id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deligates`
--
ALTER TABLE `deligates`
  ADD PRIMARY KEY (`deligate_id`);

--
-- Indexes for table `deligate_ledgers`
--
ALTER TABLE `deligate_ledgers`
  ADD PRIMARY KEY (`deligate_ledger_id`);

--
-- Indexes for table `deligate_transactions`
--
ALTER TABLE `deligate_transactions`
  ADD PRIMARY KEY (`deligate_transaction_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_medical_test`
--
ALTER TABLE `final_medical_test`
  ADD PRIMARY KEY (`final_medical_test_id`);

--
-- Indexes for table `head_models`
--
ALTER TABLE `head_models`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `invoice_billing_infos`
--
ALTER TABLE `invoice_billing_infos`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `invoice_history`
--
ALTER TABLE `invoice_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`jobtype_id`);

--
-- Indexes for table `manpowers`
--
ALTER TABLE `manpowers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicals`
--
ALTER TABLE `medicals`
  ADD PRIMARY KEY (`medical_id`);

--
-- Indexes for table `medical_test`
--
ALTER TABLE `medical_test`
  ADD PRIMARY KEY (`medical_test_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `money_reciept`
--
ALTER TABLE `money_reciept`
  ADD PRIMARY KEY (`money_reciept_id`);

--
-- Indexes for table `passports`
--
ALTER TABLE `passports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `police_clearances`
--
ALTER TABLE `police_clearances`
  ADD PRIMARY KEY (`police_clearance_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `refund_items`
--
ALTER TABLE `refund_items`
  ADD PRIMARY KEY (`refund_item_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `sponsor_ledgers`
--
ALTER TABLE `sponsor_ledgers`
  ADD PRIMARY KEY (`sponsor_ledger_id`);

--
-- Indexes for table `sponsor_transactions`
--
ALTER TABLE `sponsor_transactions`
  ADD PRIMARY KEY (`sponsor_transaction_id`);

--
-- Indexes for table `subheads`
--
ALTER TABLE `subheads`
  ADD PRIMARY KEY (`subhead_id`);

--
-- Indexes for table `training_cards`
--
ALTER TABLE `training_cards`
  ADD PRIMARY KEY (`training_card_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `users_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `users_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `visa_information`
--
ALTER TABLE `visa_information`
  ADD PRIMARY KEY (`visa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account_trasections`
--
ALTER TABLE `account_trasections`
  MODIFY `transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `agent_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `agents_ledgers`
--
ALTER TABLE `agents_ledgers`
  MODIFY `agent_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `agent_ledgers`
--
ALTER TABLE `agent_ledgers`
  MODIFY `agent_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agent_transections`
--
ALTER TABLE `agent_transections`
  MODIFY `agent_transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `client_agents`
--
ALTER TABLE `client_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_ledgers`
--
ALTER TABLE `client_ledgers`
  MODIFY `client_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `client_over_alls`
--
ALTER TABLE `client_over_alls`
  MODIFY `client_overall_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_transactions`
--
ALTER TABLE `client_transactions`
  MODIFY `client_transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `deligates`
--
ALTER TABLE `deligates`
  MODIFY `deligate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deligate_ledgers`
--
ALTER TABLE `deligate_ledgers`
  MODIFY `deligate_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `deligate_transactions`
--
ALTER TABLE `deligate_transactions`
  MODIFY `deligate_transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_medical_test`
--
ALTER TABLE `final_medical_test`
  MODIFY `final_medical_test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `head_models`
--
ALTER TABLE `head_models`
  MODIFY `head_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `invoice_billing_infos`
--
ALTER TABLE `invoice_billing_infos`
  MODIFY `billing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `invoice_history`
--
ALTER TABLE `invoice_history`
  MODIFY `history_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `jobtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manpowers`
--
ALTER TABLE `manpowers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicals`
--
ALTER TABLE `medicals`
  MODIFY `medical_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medical_test`
--
ALTER TABLE `medical_test`
  MODIFY `medical_test_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `money_reciept`
--
ALTER TABLE `money_reciept`
  MODIFY `money_reciept_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `passports`
--
ALTER TABLE `passports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `police_clearances`
--
ALTER TABLE `police_clearances`
  MODIFY `police_clearance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `refund_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `refund_items`
--
ALTER TABLE `refund_items`
  MODIFY `refund_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sponsor_ledgers`
--
ALTER TABLE `sponsor_ledgers`
  MODIFY `sponsor_ledger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sponsor_transactions`
--
ALTER TABLE `sponsor_transactions`
  MODIFY `sponsor_transaction_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subheads`
--
ALTER TABLE `subheads`
  MODIFY `subhead_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `training_cards`
--
ALTER TABLE `training_cards`
  MODIFY `training_card_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visa_information`
--
ALTER TABLE `visa_information`
  MODIFY `visa_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
