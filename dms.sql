-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2020 at 01:09 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `attachmentable_id` int(10) UNSIGNED NOT NULL,
  `attachmentable_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `attachmentable_id`, `attachmentable_type`, `file`) VALUES
(1, 10, 'project', 'testPdf.pdf'),
(2, 10, 'project', 'combined.pdf'),
(3, 12, 'project', 'testPdf.pdf'),
(4, 12, 'project', 'combined.pdf'),
(5, 24, 'project', '8WyEZo1vNobWFSkLwgKPtestPdf.pdf'),
(6, 24, 'project', 'SRnAIlVJLVP03vYO7TYNcombined1212.pdf'),
(7, 25, 'project', 'testPdf.pdf'),
(8, 25, 'project', 'combined1212.pdf'),
(9, 28, 'project', '4S4RwTpy0ZpRoi6pzeX5'),
(10, 30, 'project', 'z0XEZ0dWvNnHXdcUWtFrtestPdf.pdf'),
(11, 30, 'project', 'R9H63xedsQl0GvyUjHTkcombined1212.pdf'),
(12, 31, 'project', 'dFixRBvQ0mMg5pBuL2Blcombined.pdf'),
(13, 32, 'project', '457Z632WzWqV8ArenqGvtestPdf.pdf'),
(14, 32, 'project', 'zsFGVLzjsdpRR9i56QFbcombined1212.pdf'),
(15, 32, 'project', 'p5rAPFcrbzxlcJDBNrLQtestPdf.pdf'),
(16, 33, 'project', 'J5TVn2jVKPBPLD5IKRU0testPdf.pdf'),
(17, 33, 'project', '63bEBUeQzXAO55KQhG3qcombined1212.pdf'),
(18, 34, 'project', 'I2Bk7VHkwMbxbUYZovfptestPdf.pdf'),
(19, 34, 'project', 'gznA0MGGM1P20ljtSocrcombined1212.pdf'),
(20, 35, 'project', 'u3h1mtRSsca5ZXf73TxRtestPdf.pdf'),
(21, 35, 'project', 'VVnXTGeZz3Fw88jaeOF9combined1212.pdf'),
(22, 8, 'bpv', '7xgl773aSKX0QBPm6hQZtestPdf.pdf'),
(23, 8, 'bpv', 'tRzgthNqi15P0LCKgN7hcombined1212.pdf'),
(24, 5, 'brv', 'yLzKiIExOWHD19NJlM1VtestPdf.pdf'),
(25, 5, 'brv', 'ZNtz2DMu5OaxjJEl2D66combined1212.pdf'),
(26, 3, 'cpv', '8pj6clVYGMn8AqyoQewDtestPdf.pdf'),
(27, 3, 'cpv', 'xzBO27QGG2etgWDHueincombined1212.pdf'),
(28, 4, 'jv', 'DaomaAPYvJl7rBxv5UedtestPdf.pdf'),
(29, 4, 'jv', 'TlWbNTwiKsw0S4q3UZl6combined1212.pdf'),
(30, 1, 'crv', 'X4DZUapxlnshB8WXHxqmtestPdf.pdf'),
(31, 2, 'crv', 'UNcj9murqoCkpRiIGenMtestPdf.pdf'),
(32, 9, 'bpv', 'GLMr6x58tBf93muC6GIdtestPdf.pdf'),
(33, 9, 'bpv', 'oyNt4gyT8EaP6BUKcxa7combined1212.pdf'),
(34, 1, 'bpv', '6eXvc66p8NI9eY0p7JxHtestPdf.pdf'),
(35, 1, 'bpv', 'G2Gz1o6Kr7cvgY5tGjAycombined1212.pdf'),
(36, 1, 'bpv', 'AsOmlGDDOi1UJYr8nNUdcombined.pdf'),
(37, 1, 'bpv', 'Be4c4uPubJTm86qutnHUtestPdf.pdf'),
(38, 1, 'bpv', '5c1sVHTdQVf8wYLCEGc1combined1212.pdf'),
(39, 1, 'bpv', 'PNFucpWC7kc1V3f4N9Q2combined.pdf'),
(40, 1, 'bpv', 'MASTH17W8dDXdIyWJqLNtestPdf.pdf'),
(41, 1, 'bpv', 'jP20GiaYXMLU2wtLg0xfcombined1212.pdf'),
(42, 1, 'bpv', 'eQSaSn9b6WyeJJ94TpfBcombined1212.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `swift_code` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account_title`, `branch_code`, `branch_name`, `swift_code`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'MCB', '', 'Gulberg', 'Gulberg', '', '', 'Lahore', '2020-04-04 13:42:56', '2020-04-04 13:42:57'),
(2, 'HBL', '', 'Gulberg', 'Gulberg', '', '', 'Lahore', '2020-04-04 13:42:56', '2020-04-04 13:42:57'),
(3, 'SCB', '', 'Gulberg', 'Gulberg', '', '', 'Lahore', '2020-04-04 13:42:56', '2020-04-04 13:42:57'),
(4, 'MCB', 'Yasir', '3256', 'Cantt', '9813', '0425588998', 'Walton Road Cantt', '2020-04-10 12:35:29', '2020-04-10 12:35:29'),
(5, 'MCB', 'Yasir Ali', '3256', 'Cantt', '9813', '0425588998', 'Walton Road Cantt Cav', '2020-04-10 12:36:01', '2020-04-10 12:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `bank_payment_vouchers`
--

DROP TABLE IF EXISTS `bank_payment_vouchers`;
CREATE TABLE IF NOT EXISTS `bank_payment_vouchers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `f_year_id` int(10) UNSIGNED NOT NULL,
  `bpv_no` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheque_no` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `wht` double(10,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` double(10,2) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_payment_vouchers_project_id_foreign` (`project_id`),
  KEY `bank_payment_vouchers_f_year_id_foreign` (`f_year_id`),
  KEY `bank_payment_vouchers_bank_id_foreign` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_payment_vouchers`
--

INSERT INTO `bank_payment_vouchers` (`id`, `project_id`, `bank_id`, `f_year_id`, `bpv_no`, `cheque_no`, `account_no`, `paid_to`, `date`, `wht`, `description`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 1, '35', '3434', 'asdfasdfa', '4asdfasdfadf', '2020-04-04', NULL, NULL, 34343.00, 1, 1, '2020-04-04 08:44:30', '2020-04-04 08:44:30'),
(4, 2, 1, 1, '334', '3434', 'fsdfasdfas', 'afasdfsdf', '2020-04-05', NULL, NULL, 3434.00, 1, 1, '2020-04-05 12:08:53', '2020-04-05 12:08:53'),
(5, 4, 1, 1, '3434', '343434', 'sdfsdfasd', 'afasdfasdf', '2020-04-05', 334.00, NULL, 3434.00, 1, 1, '2020-04-05 12:09:38', '2020-04-05 12:09:38'),
(6, 4, 1, 1, '3434', '343434', 'sdfsdfasd', 'afasdfasdf', '2020-04-05', 334.00, NULL, 3434.00, 1, 1, '2020-04-05 12:10:15', '2020-04-05 12:10:15'),
(7, 4, 1, 1, '3434', '343434', 'sdfsdfasd', 'afasdfasdf', '2020-04-05', 334.00, NULL, 3434.00, 1, 1, '2020-04-05 12:10:53', '2020-04-05 12:10:53'),
(8, 2, 2, 1, '3434', '34343', 'afadsfadf', 'afadfad', '2020-04-05', 3434.00, 'afad', 34334.00, 1, 1, '2020-04-05 12:12:22', '2020-04-05 12:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `bank_receipt_vouchers`
--

DROP TABLE IF EXISTS `bank_receipt_vouchers`;
CREATE TABLE IF NOT EXISTS `bank_receipt_vouchers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `f_year_id` int(10) UNSIGNED NOT NULL,
  `brv_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheque_no` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `wht` double(10,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `amount` double(10,2) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_receipt_vouchers_project_id_foreign` (`project_id`),
  KEY `bank_receipt_vouchers_f_year_id_foreign` (`f_year_id`),
  KEY `bank_receipt_vouchers_bank_id_foreign` (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_receipt_vouchers`
--

INSERT INTO `bank_receipt_vouchers` (`id`, `project_id`, `bank_id`, `f_year_id`, `brv_no`, `cheque_no`, `account_no`, `paid_to`, `date`, `wht`, `description`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '33', '3333', 'adfd', '4000', '2020-04-04', 43434.00, 'fasdfadf', 4000.00, 1, 1, '2020-04-04 09:28:49', '2020-04-04 09:32:07'),
(3, 2, 1, 1, '33', '3333', 'adfd', '4000', '2020-04-04', 43434.00, 'fasdfadf', 4000.00, 1, 1, '2020-04-04 09:28:49', '2020-04-04 09:32:07'),
(5, 2, 1, 1, '3434', '343434', 'asdfasdf', 'asdfasdfasdf', '2020-04-09', NULL, NULL, 3434.00, 1, 1, '2020-04-05 12:16:04', '2020-04-05 12:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `cash_payment_vouchers`
--

DROP TABLE IF EXISTS `cash_payment_vouchers`;
CREATE TABLE IF NOT EXISTS `cash_payment_vouchers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `cpv_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_year_id` int(10) UNSIGNED NOT NULL,
  `paid_to` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `wht` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cash_payment_vouchers_project_id_foreign` (`project_id`),
  KEY `cash_payment_vouchers_f_year_id_foreign` (`f_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_payment_vouchers`
--

INSERT INTO `cash_payment_vouchers` (`id`, `project_id`, `cpv_no`, `f_year_id`, `paid_to`, `account`, `description`, `wht`, `date`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, '123', 1, 'Vicksss', 'Johnsss', 'desc', 123456.00, '2020-04-02', 20000.00, 1, 1, '2020-04-04 11:34:10', '2020-04-04 11:39:00'),
(3, 2, '334', 1, 'aasdfasdfa', 'fasdfasdf', NULL, 343434.00, '2020-04-16', 343434.00, 1, 1, '2020-04-05 12:19:35', '2020-04-05 12:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `cash_receipt_vouchers`
--

DROP TABLE IF EXISTS `cash_receipt_vouchers`;
CREATE TABLE IF NOT EXISTS `cash_receipt_vouchers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `crv_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_year_id` int(10) UNSIGNED NOT NULL,
  `received_from` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `wht` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `amount` double(10,2) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cash_receipt_vouchers_project_id_foreign` (`project_id`),
  KEY `cash_receipt_vouchers_f_year_id_foreign` (`f_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_receipt_vouchers`
--

INSERT INTO `cash_receipt_vouchers` (`id`, `project_id`, `crv_no`, `f_year_id`, `received_from`, `account`, `description`, `wht`, `date`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, '3333', 1, 'sdfasfasdf', 'asdfasdfa', 'asdfsd', 34343.00, '2020-04-21', 33434.00, 1, 1, '2020-04-06 00:55:40', '2020-04-06 00:55:40'),
(2, 4, '3333', 1, 'sdfasfasdf', 'acc', 'asdfsd', 34343.00, '2020-04-21', 33434.00, 1, 1, '2020-04-06 00:56:03', '2020-04-06 00:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `focal_person` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `contact_number`, `email`, `postal_address`, `focal_person`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Systems Ltd', '042569988755', 'systems@gmail.com', '', '', '2020-04-02 05:18:31', '2020-04-04 12:10:15', 1, 1),
(2, 'Systems Ltd', '0425699887', 'systems@gmail.com', '', '', '2020-04-02 05:18:31', '2020-04-02 05:18:31', 1, 1),
(3, 'new company', '5258874', 'se.creativemind@yahoo.com', 'address', 'focal person', '2020-04-11 02:54:38', '2020-04-11 02:54:38', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
CREATE TABLE IF NOT EXISTS `donors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `focal_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `contact_number`, `focal_person`, `email`, `postal_address`, `created_at`, `updated_at`) VALUES
(1, 'Abdullah', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(11, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(13, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(17, 'Abdullah', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(18, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(19, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(20, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(21, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(22, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(23, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(24, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(25, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(26, 'asdas', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-02 05:24:48'),
(27, 'Hello', '0426588985', 'New Company', 'abdullah@gmail.com', '', '2020-04-02 05:24:48', '2020-04-04 03:46:56'),
(28, 'fdfasdfas', '334344', 'sfasdfasd', 'danny@webqom.com', '', '2020-04-04 09:34:36', '2020-04-04 09:34:36'),
(29, 'smith Male Herry', '5258874', 'focal person', 'se.creativemind@yahoo.com', 'address', '2020-04-11 02:48:31', '2020-04-11 02:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

DROP TABLE IF EXISTS `financial_years`;
CREATE TABLE IF NOT EXISTS `financial_years` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`id`, `name`, `start_date`, `end_date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Financial Year 2020-2021', '2020-04-02', '2021-04-02', 1, 1, '2020-04-02 16:35:16', '2020-04-02 16:35:17'),
(2, 'New Year', '2020-04-06', '2020-04-30', 1, 1, '2020-04-05 04:00:38', '2020-04-05 04:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `journal_vouchers`
--

DROP TABLE IF EXISTS `journal_vouchers`;
CREATE TABLE IF NOT EXISTS `journal_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `f_year_id` int(10) UNSIGNED NOT NULL,
  `jv_no` int(10) UNSIGNED NOT NULL,
  `credit_account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit_account` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_amount` double(10,2) NOT NULL,
  `debit_amount` double(10,2) NOT NULL,
  `wht` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `journal_vouchers_project_id_foreign` (`project_id`),
  KEY `journal_vouchers_f_year_id_foreign` (`f_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_vouchers`
--

INSERT INTO `journal_vouchers` (`id`, `project_id`, `f_year_id`, `jv_no`, `credit_account`, `debit_account`, `credit_amount`, `debit_amount`, `wht`, `date`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4455, 'Waleed', 'Ahmed', 5000.00, 5000.00, 43434.00, '2020-04-08', 'desc', 1, 1, '2020-04-04 05:51:17', '2020-04-04 05:54:58'),
(2, 2, 1, 4455, 'Waleed', 'Ahmed', 3333.00, 3333.00, 43434.00, '2020-04-08', 'desc', 1, 1, '2020-04-04 05:52:28', '2020-04-04 05:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BRV', '2020-05-03 01:09:31', '2020-05-03 01:09:31'),
(2, 'BPV', '2020-05-03 01:09:31', '2020-05-03 01:09:31'),
(3, 'CPV', '2020-05-03 01:09:31', '2020-05-03 01:09:31'),
(4, 'CRV', '2020-05-03 01:09:31', '2020-05-03 01:09:31'),
(5, 'JV', '2020-05-03 01:09:31', '2020-05-03 01:09:31'),
(6, 'Documents', '2020-05-03 01:09:31', '2020-05-03 01:09:31'),
(7, 'User Registration', '2020-05-03 01:09:32', '2020-05-03 01:09:32'),
(8, 'Company Registration', '2020-05-03 01:09:32', '2020-05-03 01:09:32'),
(9, 'Project Registration', '2020-05-03 01:09:32', '2020-05-03 01:09:32'),
(10, 'Donor Registration', '2020-05-03 01:09:32', '2020-05-03 01:09:32'),
(11, 'Bank Registration', '2020-05-03 01:09:32', '2020-05-03 01:09:32'),
(12, 'Financial Year', '2020-05-03 01:09:32', '2020-05-03 01:09:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_03_09_164823_create_companies_table', 1),
(4, '2020_03_10_174518_create_banks_table', 1),
(5, '2020_03_10_183937_create_financial_years_table', 1),
(6, '2020_03_11_164551_create_donors_table', 1),
(7, '2020_03_11_184035_create_projects_table', 1),
(8, '2020_03_12_184139_create_bank_payment_vouchers_table', 1),
(9, '2020_03_12_184200_create_bank_receipt_vouchers_table', 1),
(10, '2020_03_12_184213_create_cash_receipt_vouchers_table', 1),
(13, '2020_03_16_164907_create_vocher_attachments_table', 1),
(14, '2020_03_26_173329_add_company_name_to_donors_table', 1),
(15, '2020_03_27_165007_add_column_in_companies_table', 1),
(16, '2020_03_12_184258_create_journal_vouchers_table', 2),
(17, '2020_03_12_184226_create_cash_payment_vouchers_table', 3),
(18, '2020_04_05_094233_create_thamatic_areas_table', 4),
(19, '2020_04_05_141314_create_attachments_table', 5),
(20, '2020_04_10_170607_add_columns_in_banks_table', 6),
(21, '2020_04_10_173240_add_columns_phone_in_banks_table', 7),
(22, '2020_04_10_174132_add_column_postal_address_in_donors_table', 8),
(23, '2020_04_10_174243_add_columns_in_companies_table', 9),
(24, '2020_04_18_090053_add_column_in_users_table', 10),
(25, '2020_05_03_055836_create_menus_table', 10),
(26, '2020_05_03_070917_create_permissions_table', 11);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_access` tinyint(3) UNSIGNED DEFAULT NULL,
  `select_access` tinyint(3) UNSIGNED DEFAULT NULL,
  `insert_access` tinyint(3) UNSIGNED DEFAULT NULL,
  `edit_access` tinyint(3) UNSIGNED DEFAULT NULL,
  `delete_access` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=700 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_id`, `user_id`, `menu_access`, `select_access`, `insert_access`, `edit_access`, `delete_access`, `created_at`, `updated_at`) VALUES
(676, 1, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(677, 2, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(678, 3, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(679, 4, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(680, 5, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(681, 6, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(682, 7, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(683, 8, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(684, 9, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(685, 10, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(686, 11, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(687, 12, 1, 1, 1, 1, 1, 1, '2020-06-30 09:45:31', '2020-06-30 09:45:31'),
(688, 1, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(689, 2, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(690, 3, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(691, 4, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(692, 5, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(693, 6, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(694, 7, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(695, 8, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(696, 9, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(697, 10, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:58', '2020-06-30 11:22:58'),
(698, 11, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:59', '2020-06-30 11:22:59'),
(699, 12, 2, 1, 1, 1, 1, 1, '2020-06-30 11:22:59', '2020-06-30 11:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_year_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `donor_id` int(10) UNSIGNED NOT NULL,
  `tentative_start_date` date DEFAULT NULL,
  `tentative_end_date` date DEFAULT NULL,
  `estimated_cost` double DEFAULT NULL,
  `actual_start_date` date DEFAULT NULL,
  `actual_end_date` date DEFAULT NULL,
  `thamatic_area_id` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_donor_id_foreign` (`donor_id`),
  KEY `projects_company_id_foreign` (`company_id`),
  KEY `projects_f_year_id_foreign` (`f_year_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `f_year_id`, `company_id`, `name`, `abbreviation`, `code`, `donor_id`, `tentative_start_date`, `tentative_end_date`, `estimated_cost`, `actual_start_date`, `actual_end_date`, `thamatic_area_id`, `remarks`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Project 1', 'prj1', '393008', 1, '2020-04-02', '2020-04-02', NULL, '2020-04-02', '2020-04-02', NULL, NULL, 1, 1, '2020-04-02 11:35:22', '2020-04-02 11:35:22'),
(4, 1, 1, 'Project 2', 'abrv5555', '34343435555', 11, '2020-01-01', '2020-07-31', 5200005555, '2020-05-01', '2020-05-31', NULL, NULL, 1, 1, '2020-04-02 11:52:09', '2020-04-04 12:33:49'),
(5, 1, 1, 'asdfasd', 'fsdafa', '33434', 11, '2020-04-21', '2020-04-21', 43434, '2020-04-06', '2020-04-06', 2, 'asdfasdfadf', 1, 1, '2020-04-05 05:05:30', '2020-04-05 05:05:30'),
(6, 1, 1, 'adfasdf', 'prj1', '343434', 11, '2020-04-05', '2020-04-05', 343434, '2020-04-05', '2020-04-05', NULL, NULL, 1, 1, '2020-04-05 09:26:31', '2020-04-05 09:26:31'),
(7, 1, 1, 'adfasdf', 'prj1', '343434', 11, '2020-04-05', '2020-04-05', 343434, '2020-04-05', '2020-04-05', NULL, NULL, 1, 1, '2020-04-05 09:26:43', '2020-04-05 09:26:43'),
(8, 1, 1, 'asdfasd', 'fasdfas', '3434', 11, '2020-04-01', '2020-04-01', 33434, '2020-04-14', '2020-04-14', 1, 'sdfasdfasd', 1, 1, '2020-04-05 09:28:14', '2020-04-05 09:28:14'),
(9, 1, 1, 'asdfasd', 'fasdfas', '3434', 11, '2020-04-01', '2020-04-01', 33434, '2020-04-14', '2020-04-14', 1, 'sdfasdfasd', 1, 1, '2020-04-05 09:28:53', '2020-04-05 09:28:53'),
(10, 1, 1, 'asdfasd', 'fasdfas', '3434', 11, '2020-04-01', '2020-04-01', 33434, '2020-04-14', '2020-04-14', 1, 'sdfasdfasd', 1, 1, '2020-04-05 09:29:48', '2020-04-05 09:29:48'),
(11, 1, 1, 'asdfasd', 'fasdfas', '3434', 11, '2020-04-01', '2020-04-01', 33434, '2020-04-14', '2020-04-14', 1, 'sdfasdfasd', 1, 1, '2020-04-05 09:30:05', '2020-04-05 09:30:05'),
(12, 1, 1, 'asdfasd', 'fasdfas', '3434', 11, '2020-04-01', '2020-04-01', 33434, '2020-04-14', '2020-04-14', 1, 'sdfasdfasd', 1, 1, '2020-04-05 09:31:03', '2020-04-05 09:31:03'),
(13, 1, 1, 'asdfasd', 'fasdfas', '3434', 11, '2020-04-01', '2020-04-01', 33434, '2020-04-14', '2020-04-14', 1, 'sdfasdfasd', 1, 1, '2020-04-05 09:32:54', '2020-04-05 09:32:54'),
(14, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:34:08', '2020-04-05 09:34:08'),
(15, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:37:14', '2020-04-05 09:37:14'),
(16, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:37:28', '2020-04-05 09:37:28'),
(17, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:37:40', '2020-04-05 09:37:40'),
(18, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:39:57', '2020-04-05 09:39:57'),
(19, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:40:05', '2020-04-05 09:40:05'),
(20, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:40:20', '2020-04-05 09:40:20'),
(21, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:41:37', '2020-04-05 09:41:37'),
(22, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:42:40', '2020-04-05 09:42:40'),
(23, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:43:14', '2020-04-05 09:43:14'),
(24, 1, 1, 'Khalil', 'afasd', '34343', 1, '2020-04-05', '2020-04-05', 43434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 09:44:38', '2020-04-05 09:44:38'),
(25, 1, 1, 'asdfasd', 'asdfasdf', '343434', 13, '2020-04-16', '2020-04-16', 3434, '2020-04-05', '2020-04-05', NULL, NULL, 1, 1, '2020-04-05 09:53:49', '2020-04-05 09:53:49'),
(26, 1, 1, 'sdfasd', 'asdfad', '3434', 11, '2020-04-14', '2020-04-14', 43434, '2020-04-14', '2020-04-05', 2, NULL, 1, 1, '2020-04-05 10:11:57', '2020-04-05 10:11:57'),
(27, 1, 1, 'sdfasd', 'asdfad', '3434', 11, '2020-04-14', '2020-04-14', 43434, '2020-04-14', '2020-04-05', 2, NULL, 1, 1, '2020-04-05 10:13:44', '2020-04-05 10:13:44'),
(28, 1, 1, 'sdfasd', 'asdfad', '3434', 11, '2020-04-14', '2020-04-14', 43434, '2020-04-14', '2020-04-05', 2, NULL, 1, 1, '2020-04-05 10:14:13', '2020-04-05 10:14:13'),
(29, 1, 1, 'sdfasd', 'asdfad', '3434', 11, '2020-04-14', '2020-04-14', 43434, '2020-04-14', '2020-04-05', 2, NULL, 1, 1, '2020-04-05 10:15:28', '2020-04-05 10:15:28'),
(30, 1, 1, 'sdfasd', 'asdfad', '3434', 11, '2020-04-14', '2020-04-14', 43434, '2020-04-14', '2020-04-05', 2, NULL, 1, 1, '2020-04-05 10:17:00', '2020-04-05 10:17:00'),
(31, 1, 2, 'asdfasd', 'adfasdf', '3333', 1, '2020-04-05', '2020-04-05', 343434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 10:21:56', '2020-04-05 10:21:56'),
(32, 1, 2, 'asdfasd', 'adfasdf', '3333', 1, '2020-04-05', '2020-04-05', 343434, '2020-04-05', '2020-04-05', 1, NULL, 1, 1, '2020-04-05 10:22:21', '2020-04-05 10:22:21'),
(33, 1, 2, 'asdfasd', 'fafsdf', '343434', 1, '2020-04-05', '2020-04-05', 3434343, '2020-04-05', '2020-04-05', NULL, NULL, 1, 1, '2020-04-05 10:25:07', '2020-04-05 10:25:07'),
(34, 1, 1, 'asdfasd', 'fasdfasdf', '343434', 1, '2020-04-05', '2020-04-05', 343434, '2020-04-05', '2020-04-05', NULL, NULL, 1, 1, '2020-04-05 10:26:58', '2020-04-05 10:26:58'),
(35, 1, 1, 'fsdfa', '3434', '34343', 1, '2020-04-05', '2020-04-05', 343434, '2020-04-05', '2020-04-05', NULL, NULL, 1, 1, '2020-04-05 10:40:53', '2020-04-05 10:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `thamatic_areas`
--

DROP TABLE IF EXISTS `thamatic_areas`;
CREATE TABLE IF NOT EXISTS `thamatic_areas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thamatic_areas`
--

INSERT INTO `thamatic_areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'DRR & HRRR (Disaster Risk Reduction, Humanitarian  Response Recovery and Rehabilitation)', '2020-04-05 05:00:25', '2020-04-05 05:00:25'),
(2, 'Sustainable Livelihoods and Food and Nutrition Security', '2020-04-05 05:00:25', '2020-04-05 05:00:25'),
(3, 'Social Development  ( Primary Education, Public Health)', '2020-04-05 05:00:25', '2020-04-05 05:00:25'),
(4, 'Human and Invitational Development (HID)', '2020-04-05 05:00:25', '2020-04-05 05:00:25'),
(5, 'Cross Cutting Themes (Resilience, Gender Mainstreaming, Environment', '2020-04-05 05:00:25', '2020-04-05 05:00:25'),
(6, 'Fundamental Rights', '2020-04-05 05:00:25', '2020-04-05 05:00:25'),
(7, 'DRR & HRRR (Disaster Risk Reduction, Humanitarian  Response Recovery and Rehabilitation)', '2020-05-03 01:05:44', '2020-05-03 01:05:44'),
(8, 'Sustainable Livelihoods and Food and Nutrition Security', '2020-05-03 01:05:44', '2020-05-03 01:05:44'),
(9, 'Social Development  ( Primary Education, Public Health)', '2020-05-03 01:05:44', '2020-05-03 01:05:44'),
(10, 'Human and Invitational Development (HID)', '2020-05-03 01:05:44', '2020-05-03 01:05:44'),
(11, 'Cross Cutting Themes (Resilience, Gender Mainstreaming, Environment', '2020-05-03 01:05:44', '2020-05-03 01:05:44'),
(12, 'Fundamental Rights', '2020-05-03 01:05:44', '2020-05-03 01:05:44'),
(13, 'DRR & HRRR (Disaster Risk Reduction, Humanitarian  Response Recovery and Rehabilitation)', '2020-05-03 01:07:07', '2020-05-03 01:07:07'),
(14, 'Sustainable Livelihoods and Food and Nutrition Security', '2020-05-03 01:07:07', '2020-05-03 01:07:07'),
(15, 'Social Development  ( Primary Education, Public Health)', '2020-05-03 01:07:08', '2020-05-03 01:07:08'),
(16, 'Human and Invitational Development (HID)', '2020-05-03 01:07:08', '2020-05-03 01:07:08'),
(17, 'Cross Cutting Themes (Resilience, Gender Mainstreaming, Environment', '2020-05-03 01:07:08', '2020-05-03 01:07:08'),
(18, 'Fundamental Rights', '2020-05-03 01:07:08', '2020-05-03 01:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khalil', 'se.creativemind@yahoo.com', NULL, '$2y$10$fNPcPr4OCEtDfsR4RXHcZecTU.aHNxmVNu/tmmyj0BcCX8t8HbjA6', NULL, NULL, '2020-04-01 12:45:27', '2020-04-01 12:45:27'),
(2, 'Wahid', 'wahid@gmail.com', NULL, '$2y$10$ob1XBTLDsNjYETBrnnPnQO4yj.jCYoRxQzO66TF9oWL21eTqGj5dK', '1593366087.png', NULL, '2020-06-28 12:41:27', '2020-06-28 12:41:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_payment_vouchers`
--
ALTER TABLE `bank_payment_vouchers`
  ADD CONSTRAINT `bank_payment_vouchers_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_payment_vouchers_f_year_id_foreign` FOREIGN KEY (`f_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_payment_vouchers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_receipt_vouchers`
--
ALTER TABLE `bank_receipt_vouchers`
  ADD CONSTRAINT `bank_receipt_vouchers_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_receipt_vouchers_f_year_id_foreign` FOREIGN KEY (`f_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bank_receipt_vouchers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cash_payment_vouchers`
--
ALTER TABLE `cash_payment_vouchers`
  ADD CONSTRAINT `cash_payment_vouchers_f_year_id_foreign` FOREIGN KEY (`f_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cash_payment_vouchers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cash_receipt_vouchers`
--
ALTER TABLE `cash_receipt_vouchers`
  ADD CONSTRAINT `cash_receipt_vouchers_f_year_id_foreign` FOREIGN KEY (`f_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cash_receipt_vouchers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `journal_vouchers`
--
ALTER TABLE `journal_vouchers`
  ADD CONSTRAINT `journal_vouchers_f_year_id_foreign` FOREIGN KEY (`f_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `journal_vouchers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `donors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_f_year_id_foreign` FOREIGN KEY (`f_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
