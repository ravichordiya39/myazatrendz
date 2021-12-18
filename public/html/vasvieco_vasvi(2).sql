-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2021 at 10:05 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vasvieco_vasvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fabric', NULL, 1, '2021-08-02 13:44:23', '2021-08-02 13:44:23', NULL),
(2, 'Occasions', NULL, 1, '2021-08-02 19:43:05', '2021-08-06 15:09:49', NULL),
(3, 'Collections', NULL, 1, '2021-08-06 12:45:00', '2021-08-06 12:45:00', NULL),
(4, 'Fit', NULL, 1, '2021-08-06 15:12:10', '2021-08-06 15:12:10', NULL),
(5, 'Sleeves', NULL, 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(6, 'Neck', NULL, 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(7, 'Patterns', NULL, 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(8, 'Crafts', NULL, 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(9, 'Styles', NULL, 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(10, 'Length', NULL, 1, '2021-08-06 15:31:38', '2021-08-06 15:31:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 3, 'Work From Office', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(18, 3, 'Office', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(19, 3, 'Indigo', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(20, 3, 'Summer', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(21, 3, 'Spring', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(22, 3, 'Autumn', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(23, 3, 'Winter', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(24, 3, 'Festive', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(25, 3, 'Wedding', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(26, 3, 'Party', 1, '2021-08-06 12:49:43', '2021-08-06 12:49:43', NULL),
(27, 2, 'Bithday', 1, '2021-08-06 15:09:49', '2021-08-06 15:09:49', NULL),
(28, 2, 'National Festivals', 1, '2021-08-06 15:09:49', '2021-08-06 15:09:49', NULL),
(29, 2, 'Regional Festivals', 1, '2021-08-06 15:09:49', '2021-08-06 15:09:49', NULL),
(30, 2, 'Patriotic Days', 1, '2021-08-06 15:09:49', '2021-08-06 15:09:49', NULL),
(31, 2, 'Gifting', 1, '2021-08-06 15:09:49', '2021-08-06 15:09:49', NULL),
(40, 1, 'Cotton', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(41, 1, 'Rayan', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(42, 1, 'Chanderi', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(43, 1, 'Silk', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(44, 1, 'Wool', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(45, 1, 'Modal', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(46, 1, 'Viscose', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(47, 1, 'Linen', 1, '2021-08-06 15:11:33', '2021-08-06 15:11:33', NULL),
(48, 4, 'Regular Fit', 1, '2021-08-06 15:12:10', '2021-08-06 15:12:10', NULL),
(49, 4, 'Slim Fit', 1, '2021-08-06 15:12:10', '2021-08-06 15:12:10', NULL),
(50, 4, 'Comfort Fit', 1, '2021-08-06 15:12:10', '2021-08-06 15:12:10', NULL),
(51, 5, '3/Q', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(52, 5, 'Full', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(53, 5, 'Half', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(54, 5, 'Sleevless', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(55, 5, 'Bell', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(56, 5, 'Roll-Up', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(57, 5, 'Short', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(58, 5, 'Flared', 1, '2021-08-06 15:13:14', '2021-08-06 15:13:14', NULL),
(59, 6, 'Round', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(60, 6, 'Chinese', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(61, 6, 'V', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(62, 6, 'Boat', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(63, 6, 'Scoop', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(64, 6, 'Funnel', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(65, 6, 'Square', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(66, 6, 'Collar', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(67, 6, 'Regular', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(68, 6, 'Band', 1, '2021-08-06 15:14:33', '2021-08-06 15:14:33', NULL),
(69, 7, 'Printed', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(70, 7, 'Embroidered', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(71, 7, 'Solids', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(72, 7, 'Dobby Weave', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(73, 7, 'Striped', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(74, 7, 'Pintucks', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(75, 7, 'Checks', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(76, 7, 'Embellished', 1, '2021-08-06 15:16:05', '2021-08-06 15:16:05', NULL),
(77, 8, 'Hand Block Prints', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(78, 8, 'Chikankari', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(79, 8, 'Pintucks', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(80, 8, 'Cutwork', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(81, 8, 'Khari Print', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(82, 8, 'Dabu Print', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(83, 8, 'Kalamkari', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(84, 8, 'Applique', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(85, 8, 'Ikat Weave', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(86, 8, 'Ajrakh', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(87, 8, 'Zari Embroidery', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(88, 8, 'Bagru Print', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(89, 8, 'Mirror Work', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(90, 8, 'Shibori', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(91, 8, 'Aari Embroidery', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(92, 8, 'Mukaish Work', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(93, 8, 'Gota Patti', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(94, 8, 'Kantha Embroidary', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(95, 8, 'Discharge Prints', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(96, 8, 'Bandhini', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(97, 8, 'Batik Print', 1, '2021-08-06 15:20:59', '2021-08-06 15:20:59', NULL),
(98, 9, 'Short', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(99, 9, 'Straight', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(100, 9, 'A-Line', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(101, 9, 'Flared', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(102, 9, 'Anarkali/Kalidar', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(103, 9, 'Anghrakha', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(104, 9, 'Floor Lenght', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(105, 9, 'Long', 1, '2021-08-06 15:22:28', '2021-08-06 15:22:28', NULL),
(106, 10, '34/36', 1, '2021-08-06 15:31:38', '2021-08-06 15:31:38', NULL),
(107, 10, '38/40', 1, '2021-08-06 15:31:38', '2021-08-06 15:31:38', NULL),
(108, 10, '42/44', 1, '2021-08-06 15:31:38', '2021-08-06 15:31:38', NULL),
(109, 10, '46/48', 1, '2021-08-06 15:31:38', '2021-08-06 15:31:38', NULL),
(110, 10, '50+', 1, '2021-08-06 15:31:38', '2021-08-06 15:31:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `sub_title`, `slug`, `image`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `tags`, `published_on`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About Us', 'sddfddg', 'About', '75a95e76ad004a76e3ce948afd30ddec.jpg', '<p>dvxdb xf</p>', 'cgncn', 'fbfb', 'dvd', 'cgncgn', '2021-07-30 10:00:13', 1, '2021-07-30 15:30:36', '2021-07-30 15:30:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vasvi New', '2b989f0bcf2505ad713985e8f5a1ff50.png', 'description', 1, NULL, NULL, NULL),
(2, 'Vasvi', '5157ed54dcb1af5007ec995ec3c3cbda.png', 'description', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_chart` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_home` tinyint(1) DEFAULT '0',
  `is_menu` tinyint(1) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `image`, `size_chart`, `is_home`, `is_menu`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Women\'s', 'womens', '3ceaecab4348d90dd982566b6c248e44.png', '', 1, 1, 1, NULL, '2021-07-28 11:52:04', NULL),
(2, 1, 'Kurtis', 'kurtis', '9450a4596f51dd819128848336d4c859.png', '92609e23589eef5ba7ff0792b48e027b.png', 0, 1, 1, NULL, '2021-09-04 14:38:29', '2021-09-04 14:38:29'),
(3, 1, 'Combo Set', 'combo-set', '29c4676b95188292856ea762c0833033.jpg', NULL, 0, 0, 1, '2021-07-28 11:56:36', '2021-07-28 11:56:36', NULL),
(4, 1, 'Tops & Shirts', 'tops-shirts', '06b8f2f387b0bb62af8604df52e33916.jpg', NULL, 0, 0, 1, '2021-07-28 11:57:20', '2021-07-28 11:57:40', NULL),
(5, 0, 'Men\'s', 'mens', '06d4d4630731408ab084d77a282055a2.jpg', NULL, 1, 1, 1, '2021-07-31 10:01:44', '2021-08-06 15:23:17', NULL),
(6, 5, 'Kurta Set', 'kurta-set', '9cf3a7d1cfeb1e834e4c082aff36386f.jpg', '15f303a415da82ce46c52cda6412dab3.jpg', 1, 1, 1, '2021-07-31 10:02:37', '2021-08-06 15:24:37', NULL),
(7, 5, 'Kurta', 'kurta', 'd86a908ec928f597b842d8f9bd73d9eb.jpg', NULL, 1, 1, 1, '2021-07-31 10:07:04', '2021-08-06 15:24:23', NULL),
(8, 1, 'Tunics', 'tunics', 'ef976ae0fad82868e59550adfb3e3e1b.jpg', NULL, 0, 0, 1, '2021-08-02 13:13:32', '2021-08-02 13:13:32', NULL),
(9, 1, 'Dresses', 'dresses', '3c2c194406c8bff871f675b1b2a73cfb.jpg', NULL, 0, 0, 1, '2021-08-02 13:16:49', '2021-08-02 13:16:49', NULL),
(10, 1, 'Plazo', 'plazo', '10fc3906664381e915e06ba6a866706b.jpg', NULL, 0, 0, 1, '2021-08-02 13:18:24', '2021-09-04 13:16:48', NULL),
(11, 1, 'Pants', 'pants', '215f4d3eccec8bdcc115ac41d957df49.jpg', NULL, 0, 0, 1, '2021-08-02 13:20:14', '2021-08-02 13:20:14', NULL),
(12, 1, 'Skirts', 'skirts', '75734787a0566eb806033c99f75b3b62.jpg', NULL, 0, 0, 1, '2021-08-02 13:22:56', '2021-08-02 13:22:56', NULL),
(13, 1, 'Leggings', 'leggings', 'e8269a0c49cb50f1d1a081d0a43a991e.jpg', NULL, 0, 0, 1, '2021-08-02 13:25:17', '2021-08-02 13:25:17', NULL),
(14, 1, 'Dupatta', 'dupatta', '5ca48b5ca7179600312aa1781f03b743.jpg', NULL, 0, 0, 1, '2021-08-02 13:25:44', '2021-08-02 13:25:44', NULL),
(15, 0, 'Kid\'s', 'kids', '0ad26048d0c29459cc9dc5e5ef0053b3.jpg', NULL, 0, 0, 1, '2021-08-06 15:25:49', '2021-08-06 15:25:49', NULL),
(16, 15, 'Baby Boy', 'baby-boy', 'e351794183f5534bc68610da4c936f80.jpg', NULL, 0, 0, 1, '2021-08-06 15:27:16', '2021-08-06 15:27:16', NULL),
(17, 15, 'Baby Girl', 'baby-girl', 'ee13d97fbf759452c935391629170ceb.jpg', NULL, 0, 0, 1, '2021-08-06 15:28:12', '2021-08-06 15:28:12', NULL),
(18, 0, 'Premium', 'premium', '4c0ac35baa6b6285bd4c05640ae023b0.jpg', NULL, 0, 0, 1, '2021-08-06 15:28:55', '2021-08-06 15:28:55', NULL),
(19, 18, 'Designer', 'designer', '5e2be8a274870378cf57c3d7a3391114.jpg', NULL, 0, 0, 1, '2021-08-06 15:29:23', '2021-08-06 15:29:23', NULL),
(20, 18, 'Signature', 'signature', 'e8e4ce5076ed05c1ebda4f36344afe19.jpg', NULL, 0, 0, 1, '2021-08-06 15:29:56', '2021-08-06 15:29:56', NULL),
(21, 18, 'Exclusive', 'exclusive', 'a4403645fb8dd028d491d8eb70de5e41.jpg', NULL, 0, 0, 1, '2021-08-06 15:30:35', '2021-08-06 15:30:35', NULL),
(22, 21, 'Combo Set', 'combo-set-1', '6a907a254c328b0bc2e7be12245afa6d.png', NULL, 0, 0, 1, '2021-08-26 04:11:07', '2021-09-04 13:23:18', NULL),
(23, 21, 'Sean Beans2', 'sean-beans2', '7dba72bab5d581202a4f5525b657659f.png', NULL, 0, 0, 1, '2021-08-26 04:20:30', '2021-09-04 13:07:12', '2021-09-04 13:07:12'),
(24, 20, 'Combo Set', 'combo-set-1-1', NULL, NULL, 0, 0, 1, '2021-08-26 04:21:07', '2021-09-04 13:23:42', NULL),
(25, 13, 'Ankle', 'ankle', NULL, NULL, 0, 0, 1, '2021-08-26 04:58:36', '2021-09-04 13:17:41', NULL),
(26, 2, 'Short', 'short-1-1-1-1', NULL, NULL, 0, 0, 1, '2021-08-26 06:19:06', '2021-09-04 13:21:34', NULL),
(27, 7, 'Short', 'short', NULL, NULL, 0, 0, 1, '2021-09-04 13:04:14', '2021-09-04 13:22:13', NULL),
(28, 7, 'Long', 'long', NULL, NULL, 0, 0, 1, '2021-09-04 13:04:29', '2021-09-04 13:22:06', NULL),
(29, 17, 'Dress', 'dress', NULL, NULL, 0, 0, 1, '2021-09-04 13:05:41', '2021-09-04 13:24:28', NULL),
(30, 17, 'Lehanga-Choli', 'lehanga-choli', NULL, NULL, 0, 0, 1, '2021-09-04 13:06:03', '2021-09-04 13:24:21', NULL),
(31, 16, 'Kurta', 'kurta-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:06:30', '2021-09-04 13:24:47', NULL),
(32, 16, 'Kurta Set', 'kurta-set-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:06:50', '2021-09-04 13:24:40', NULL),
(33, 21, 'Gowns', 'gowns', NULL, NULL, 0, 0, 1, '2021-09-04 13:07:47', '2021-09-04 13:23:11', NULL),
(34, 20, 'Gowns', 'gowns-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:08:35', '2021-09-04 13:23:36', NULL),
(35, 19, 'Combo Set', 'combo-set-1-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:09:00', '2021-09-04 13:24:06', NULL),
(36, 19, 'Gowns', 'gowns-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:09:14', '2021-09-04 13:24:00', NULL),
(37, 19, 'Kurti', 'kurti', NULL, NULL, 0, 0, 1, '2021-09-04 13:09:38', '2021-09-04 13:23:53', NULL),
(38, 14, 'Solid', 'solid', NULL, NULL, 0, 0, 1, '2021-09-04 13:10:14', '2021-09-04 13:10:14', NULL),
(39, 14, 'Printed', 'printed', NULL, NULL, 0, 0, 1, '2021-09-04 13:10:28', '2021-09-04 13:17:14', NULL),
(40, 14, 'Fancy', 'fancy', NULL, NULL, 0, 0, 1, '2021-09-04 13:10:42', '2021-09-04 13:17:04', NULL),
(41, 13, 'Churidar', 'churidar', NULL, NULL, 0, 0, 1, '2021-09-04 13:11:16', '2021-09-04 13:17:35', NULL),
(42, 12, 'Long', 'long-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:11:37', '2021-09-04 13:18:03', NULL),
(43, 12, 'Short', 'short-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:11:49', '2021-09-04 13:17:55', NULL),
(44, 11, 'Solid', 'solid-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:12:08', '2021-09-04 13:18:22', NULL),
(45, 11, 'Printed', 'printed-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:12:22', '2021-09-04 13:18:16', NULL),
(46, 10, 'Solid', 'solid-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:12:50', '2021-09-04 13:19:12', NULL),
(47, 10, 'Printed', 'printed-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:13:02', '2021-09-04 13:19:05', NULL),
(48, 9, 'Long', 'long-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:13:22', '2021-09-04 13:19:33', NULL),
(49, 9, 'Short', 'short-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:13:33', '2021-09-04 13:19:26', NULL),
(50, 8, 'Short', 'short-1-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:14:05', '2021-09-04 13:19:53', NULL),
(51, 8, 'Long', 'long-1-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:14:17', '2021-09-04 13:19:47', NULL),
(52, 4, 'Crop', 'crop', NULL, NULL, 0, 0, 1, '2021-09-04 13:14:33', '2021-09-04 13:20:22', NULL),
(53, 4, 'Regular', 'regular', NULL, NULL, 0, 0, 1, '2021-09-04 13:14:45', '2021-09-04 13:20:16', NULL),
(54, 4, 'Long', 'long-1-1-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:14:55', '2021-09-04 13:20:09', NULL),
(55, 3, 'With Pants', 'with-pants', NULL, NULL, 0, 0, 1, '2021-09-04 13:15:46', '2021-09-04 13:21:10', NULL),
(56, 3, 'With Plazo', 'with-plazo', NULL, NULL, 0, 0, 1, '2021-09-04 13:16:05', '2021-09-04 13:21:03', NULL),
(57, 3, 'With Skirts', 'with-skirts', NULL, NULL, 0, 0, 1, '2021-09-04 13:16:21', '2021-09-04 13:20:56', NULL),
(58, 2, 'Long', 'long-1-1-1-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:21:44', '2021-09-04 13:21:44', NULL),
(59, 6, 'Solid', 'solid-1-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:22:38', '2021-09-04 13:22:38', NULL),
(60, 6, 'Printed', 'printed-1-1-1', NULL, NULL, 0, 0, 1, '2021-09-04 13:22:48', '2021-09-04 13:22:48', NULL),
(61, 1, 'kurties', 'kurties', NULL, NULL, 0, 1, 1, '2021-09-04 14:40:03', '2021-09-04 14:40:50', NULL),
(62, 61, 'Long', 'long-1-1-1-1-1-1', NULL, NULL, 0, 1, 1, '2021-09-04 14:41:41', '2021-09-04 14:41:41', NULL),
(63, 5, 'Shirts', 'shirts', 'c4c68651c41fb6e84eee9d7fdf7ff283.jpg', NULL, 1, 0, 1, '2021-09-06 12:15:30', '2021-09-06 12:39:34', NULL),
(64, 63, 'Shirts', 'shirts-1', '3af36d79bbde3bd954bdf0670c75dc05.jpg', NULL, 0, 0, 1, '2021-09-06 12:19:42', '2021-09-06 12:19:42', NULL),
(65, 63, 'T shirts', 't-shirts', 'e31ddcb2bdb4921db7a58c209c0331c8.jpg', '9449e7fbdd0e246bfda49d3cf2807fc1.jpg', 1, 0, 1, '2021-09-06 12:36:27', '2021-09-06 12:36:27', NULL),
(66, 63, 'T shirts1', 't-shirts1', '19a36f30c0b9f8c5bf88f140af19250d.jpg', NULL, 1, 0, 1, '2021-09-06 12:58:13', '2021-09-06 12:58:13', NULL),
(67, 16, 'baby shirts', 'baby-shirts', '8066ecc5670cd80ef44612ea2a29dcaf.jpg', NULL, 1, 1, 1, '2021-09-06 13:11:29', '2021-09-06 13:11:29', NULL),
(68, 0, 'Printed', 'printed-1-1-1-1', NULL, NULL, 0, 1, 1, '2021-09-07 11:50:49', '2021-09-07 11:50:58', '2021-09-07 11:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` longtext COLLATE utf8mb4_unicode_ci,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `sub_title`, `slug`, `url`, `image`, `meta_title`, `meta_keyword`, `meta_description`, `tags`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About Us', 'sddfddg', 'About', 'sxasc', 'asd', 'asc', 'asca', 'ascad', 'asd', '<p>sacasc</p>', 1, '2021-07-30 15:31:11', '2021-07-30 15:31:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Red', '#FF0000', 1, NULL, NULL, NULL),
(2, 'Green', '#008000', 1, NULL, NULL, NULL),
(3, 'Yellow', '#FFFF00', 1, NULL, NULL, NULL),
(4, 'Black', '#000000', 1, NULL, NULL, NULL),
(5, 'blue', '#0000FF', 1, NULL, NULL, NULL),
(6, 'Pink', '#fb9dc7', 1, '2021-08-02 13:29:42', '2021-08-02 13:29:42', NULL),
(7, 'Natural', '#e6e7a6', 1, '2021-08-02 13:31:44', '2021-08-02 13:31:44', NULL),
(8, 'Beige', '#9f761d', 1, '2021-08-02 13:32:54', '2021-08-02 13:32:54', NULL),
(9, 'Gray', '#7b7a5b', 1, '2021-08-02 13:33:17', '2021-08-02 13:33:17', NULL),
(10, 'White', '#fefbfb', 1, '2021-08-02 13:33:34', '2021-08-02 13:33:34', NULL),
(11, 'Maroon', '#290505', 1, '2021-08-02 13:33:58', '2021-08-02 13:33:58', NULL),
(12, 'Orange', '#fb3504', 1, '2021-08-02 13:34:34', '2021-08-02 13:34:34', NULL),
(13, 'Teal', '#15596a', 1, '2021-08-02 13:36:45', '2021-08-02 13:36:45', NULL),
(14, 'Brown', '#361b02', 1, '2021-08-02 13:37:10', '2021-08-02 13:37:10', NULL),
(15, 'Purple', '#2b0651', 1, '2021-08-02 13:37:34', '2021-08-02 13:37:34', NULL),
(16, 'Turquoise', '#24ae86', 1, '2021-08-02 13:38:36', '2021-08-02 13:38:36', NULL),
(17, 'Wine', '#9f1429', 1, '2021-08-02 13:39:25', '2021-08-02 13:39:25', NULL),
(18, 'Offwhite', '#ebf297', 1, '2021-08-02 13:40:21', '2021-08-02 13:40:21', NULL),
(19, 'Golden', '#bd9505', 1, '2021-08-02 13:40:58', '2021-08-02 13:40:58', NULL),
(20, 'Silver', '#d5d7d7', 1, '2021-08-02 13:41:30', '2021-08-02 13:41:30', NULL),
(21, 'Voilet', '#ab08f7', 1, '2021-08-02 13:42:07', '2021-08-02 13:42:07', NULL),
(22, 'Mustered', '#f59b00', 1, '2021-08-02 13:42:49', '2021-08-02 13:42:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - Private / 1 - Bulk Order / 2 - Retail Order; Default - 0',
  `user_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - All Users / 1 - Existing Users / 2 - New Users; Default - 0',
  `discount_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - Percentage / 1 - Flat; Default - 0',
  `value` double(10,2) NOT NULL,
  `valid_from` datetime DEFAULT NULL,
  `valid_to` datetime DEFAULT NULL,
  `coupon_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_cart_amt` double(10,2) DEFAULT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_discount` double(10,2) DEFAULT NULL,
  `is_unlimited` tinyint(1) DEFAULT '0',
  `avlb_coupons` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `term_conditions` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `map_attributes`
--

CREATE TABLE `map_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_child_id` bigint(11) DEFAULT NULL,
  `is_size` tinyint(4) NOT NULL DEFAULT '0',
  `sizes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_brand` tinyint(4) NOT NULL DEFAULT '0',
  `brands` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_color` tinyint(4) NOT NULL DEFAULT '0',
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_attribute` tinyint(4) NOT NULL DEFAULT '0',
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `map_attributes`
--

INSERT INTO `map_attributes` (`id`, `category_id`, `sub_category_id`, `sub_category_child_id`, `is_size`, `sizes`, `is_brand`, `brands`, `is_color`, `colors`, `is_attribute`, `attributes`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, NULL, 1, '[\"1\", \"2\", \"3\", \"4\", \"5\"]', 0, NULL, 1, '[\"1\", \"2\", \"3\", \"4\", \"5\"]', 0, NULL, 1, '2021-07-27 20:27:37', '2021-09-04 14:36:55', '2021-09-04 14:36:55'),
(2, 5, 7, NULL, 1, '[\"1\", \"2\", \"3\", \"4\", \"5\"]', 1, '[\"1\", \"2\"]', 1, '[\"1\", \"2\", \"3\", \"4\", \"5\"]', 0, NULL, 1, '2021-07-31 10:53:57', '2021-08-02 13:47:40', '2021-08-02 13:47:40'),
(3, 1, 3, NULL, 1, '[\"1\", \"2\"]', 1, NULL, 1, '[\"2\", \"4\"]', 0, NULL, 1, '2021-08-01 12:09:37', '2021-08-01 12:11:59', NULL),
(4, 1, 4, NULL, 1, NULL, 1, NULL, 1, NULL, 0, '{\"1\": \"1\", \"2\": \"1\"}', 1, '2021-08-02 19:45:27', '2021-08-02 19:45:27', NULL),
(5, 1, 10, NULL, 1, '[\"1\", \"2\", \"3\"]', 1, NULL, 1, '[\"1\", \"2\", \"3\", \"4\"]', 0, '{\"1\": \"1\", \"2\": \"1\"}', 1, '2021-08-05 20:14:26', '2021-08-05 20:16:07', NULL),
(6, 1, 13, NULL, 1, '[\"1\", \"2\", \"3\"]', 1, NULL, 1, '[\"3\", \"4\"]', 1, '{\"1\": \"1\"}', 1, '2021-08-12 16:11:58', '2021-08-12 16:13:41', NULL),
(7, 18, 20, 24, 1, '[\"3\",\"4\",\"5\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 1, '{\"1\":{\"attributevalues\":[\"42\"]},\"2\":{\"attributevalues\":[\"28\"]},\"3\":{\"attributevalues\":[\"17\"]},\"4\":{\"attributevalues\":[\"48\",\"49\",\"50\"]},\"5\":{\"attributevalues\":[\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\"]},\"6\":{\"attributevalues\":[\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\"]},\"7\":{\"attributevalues\":[\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\"]},\"8\":{\"attributevalues\":[\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\"]},\"9\":{\"attributevalues\":[\"98\",\"99\",\"100\",\"101\",\"102\",\"103\",\"104\",\"105\"]},\"10\":\"1\"}', 1, '2021-08-26 05:36:14', '2021-09-01 13:52:33', NULL),
(8, 1, 9, 48, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":{\"attributevalues\":[\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\"]},\"2\":{\"attributevalues\":[\"27\",\"28\",\"29\",\"30\",\"31\"]},\"3\":{\"attributevalues\":[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\"]},\"4\":{\"attributevalues\":[\"48\",\"49\",\"50\"]},\"5\":{\"attributevalues\":[\"52\",\"53\",\"54\",\"55\",\"58\"]},\"6\":{\"attributevalues\":[\"59\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\"]},\"7\":{\"attributevalues\":[\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\"]},\"8\":{\"attributevalues\":[\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\"]},\"9\":{\"attributevalues\":[\"98\",\"99\",\"100\",\"101\",\"102\",\"103\",\"104\",\"105\"]},\"10\":{\"attributevalues\":[\"107\",\"108\",\"109\",\"110\"]}}', 1, '2021-09-04 13:27:54', '2021-09-04 13:27:54', NULL),
(9, 1, 8, 51, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":{\"attributevalues\":[\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\"]},\"2\":{\"attributevalues\":[\"27\",\"28\",\"29\",\"30\",\"31\"]},\"3\":{\"attributevalues\":[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\"]},\"4\":{\"attributevalues\":[\"48\",\"49\",\"50\"]},\"5\":{\"attributevalues\":[\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\"]},\"6\":{\"attributevalues\":[\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\"]},\"7\":{\"attributevalues\":[\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\"]},\"8\":{\"attributevalues\":[\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\"]},\"9\":{\"attributevalues\":[\"98\",\"99\",\"100\",\"101\",\"102\",\"103\",\"104\",\"105\"]},\"10\":{\"attributevalues\":[\"106\",\"107\",\"108\"]}}', 1, '2021-09-04 13:29:40', '2021-09-04 13:29:40', NULL),
(10, 1, 14, 38, 1, '[\"6\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":{\"attributevalues\":[\"40\"]},\"2\":{\"attributevalues\":[\"29\",\"30\",\"31\"]},\"3\":{\"attributevalues\":[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\"]},\"7\":{\"attributevalues\":[\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\"]},\"8\":{\"attributevalues\":[\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\"]},\"9\":\"1\"}', 1, '2021-09-04 13:35:43', '2021-09-04 13:35:43', NULL),
(11, 1, 11, 44, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":{\"attributevalues\":[\"40\",\"41\",\"42\",\"44\"]},\"2\":{\"attributevalues\":[\"27\",\"28\",\"29\",\"30\",\"31\"]},\"3\":{\"attributevalues\":[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\"]},\"4\":{\"attributevalues\":[\"48\",\"49\",\"50\"]},\"7\":{\"attributevalues\":[\"69\",\"70\",\"71\",\"72\",\"73\",\"75\",\"76\"]},\"8\":{\"attributevalues\":[\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\"]},\"9\":{\"attributevalues\":[\"98\",\"99\",\"105\"]},\"10\":{\"attributevalues\":[\"106\",\"107\",\"108\",\"109\",\"110\"]}}', 1, '2021-09-04 13:37:23', '2021-09-04 13:37:23', NULL),
(12, 1, 12, 42, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":{\"attributevalues\":[\"40\",\"41\",\"42\",\"43\"]},\"2\":{\"attributevalues\":[\"27\",\"28\",\"29\",\"30\",\"31\"]},\"3\":{\"attributevalues\":[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\"]},\"4\":{\"attributevalues\":[\"48\",\"49\",\"50\"]},\"7\":{\"attributevalues\":[\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\"]},\"8\":{\"attributevalues\":[\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\"]},\"9\":{\"attributevalues\":[\"98\",\"99\",\"104\",\"105\"]},\"10\":{\"attributevalues\":[\"106\",\"107\",\"108\",\"109\",\"110\"]}}', 1, '2021-09-04 13:39:59', '2021-09-04 13:39:59', NULL),
(13, 5, 6, 59, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":{\"attributevalues\":[\"40\",\"41\",\"42\",\"43\",\"44\",\"46\",\"47\"]},\"2\":{\"attributevalues\":[\"27\",\"28\",\"29\",\"30\",\"31\"]},\"3\":{\"attributevalues\":[\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\"]},\"4\":{\"attributevalues\":[\"48\",\"49\",\"50\"]},\"5\":{\"attributevalues\":[\"52\",\"53\",\"56\",\"57\"]},\"6\":{\"attributevalues\":[\"59\",\"60\",\"61\",\"65\",\"66\",\"67\"]},\"7\":{\"attributevalues\":[\"69\",\"70\",\"71\",\"72\",\"73\",\"75\"]},\"8\":{\"attributevalues\":[\"77\",\"78\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"86\",\"87\",\"88\",\"89\",\"90\",\"91\",\"92\",\"93\",\"94\",\"95\",\"96\",\"97\"]},\"9\":{\"attributevalues\":[\"98\",\"99\",\"104\",\"105\"]},\"10\":{\"attributevalues\":[\"106\",\"107\",\"108\",\"109\",\"110\"]}}', 1, '2021-09-04 13:42:23', '2021-09-04 13:42:23', NULL),
(14, 18, 19, 36, 1, NULL, 0, NULL, 1, NULL, 0, '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\",\"9\":\"1\",\"10\":\"1\"}', 1, '2021-09-04 13:46:00', '2021-09-04 13:46:00', NULL),
(15, 18, 21, 33, 1, NULL, 0, NULL, 1, NULL, 1, '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\",\"9\":\"1\",\"10\":\"1\"}', 1, '2021-09-04 13:46:29', '2021-09-04 13:46:29', NULL),
(16, 15, 16, 31, 1, NULL, 0, NULL, 1, NULL, 1, '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\",\"9\":\"1\",\"10\":\"1\"}', 1, '2021-09-04 13:47:22', '2021-09-04 13:47:22', NULL),
(17, 15, 17, 29, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":\"1\",\"2\":\"1\",\"3\":\"1\",\"4\":\"1\",\"5\":\"1\",\"6\":\"1\",\"7\":\"1\",\"8\":\"1\",\"9\":\"1\",\"10\":\"1\"}', 1, '2021-09-04 13:48:04', '2021-09-04 13:48:04', NULL),
(18, 1, 61, 62, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]', 0, NULL, 1, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 1, '{\"1\":{\"attributevalues\":[\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\"]},\"2\":{\"attributevalues\":[\"27\",\"28\",\"29\",\"30\",\"31\"]},\"3\":{\"attributevalues\":[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\"]},\"4\":{\"attributevalues\":[\"48\",\"49\",\"50\"]}}', 1, '2021-09-04 14:43:30', '2021-09-04 14:43:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - Header / 2 - Footer; Default - 0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `category_id`, `name`, `slug`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Women Kurti', 'Women Kurti', 1, 1, '2021-07-30 14:56:09', '2021-07-30 14:56:09', NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_07_04_000001_create_media_table', 1),
(4, '2021_07_04_000002_create_brands_table', 1),
(5, '2021_07_04_000002_create_permissions_table', 1),
(6, '2021_07_04_000003_create_colors_table', 1),
(7, '2021_07_04_000003_create_product_attributes_table', 1),
(8, '2021_07_04_000004_create_attribute_values_table', 1),
(9, '2021_07_04_000004_create_product_variations_table', 1),
(10, '2021_07_04_000005_create_attributes_table', 1),
(11, '2021_07_04_000005_create_product_images_table', 1),
(12, '2021_07_04_000006_create_categories_table', 1),
(13, '2021_07_04_000006_create_products_table', 1),
(14, '2021_07_04_000007_create_faq_questions_table', 1),
(15, '2021_07_04_000009_create_faq_categories_table', 1),
(16, '2021_07_04_000010_create_users_table', 1),
(17, '2021_07_04_000011_create_roles_table', 1),
(18, '2021_07_04_000012_create_sizes_table', 1),
(19, '2021_07_04_000014_create_permission_role_pivot_table', 1),
(20, '2021_07_04_000017_create_role_user_pivot_table', 1),
(21, '2021_07_04_000019_add_relationship_fields_to_attribute_values_table', 1),
(22, '2021_07_04_000020_add_relationship_fields_to_faq_questions_table', 1),
(23, '2021_07_04_000021_add_relationship_fields_to_products_table', 1),
(24, '2021_07_04_000022_add_relationship_fields_to_product_images_table', 1),
(25, '2021_07_04_000023_add_relationship_fields_to_product_variations_table', 1),
(26, '2021_07_04_000024_add_relationship_fields_to_product_attributes_table', 1),
(27, '2021_07_08_154900_create_map_attributes_table', 1),
(28, '2021_07_13_000012_create_coupons_table', 1),
(29, '2021_07_13_000026_add_relationship_fields_to_coupons_table', 1),
(30, '2021_07_20_000003_create_user_social_profiles_table', 1),
(31, '2021_07_20_000016_create_social_profile_types_table', 1),
(32, '2021_07_20_000018_create_sliders_table', 1),
(33, '2021_07_20_000030_add_relationship_fields_to_user_social_profiles_table', 1),
(34, '2021_07_21_000014_create_stores_table', 1),
(35, '2021_07_22_000020_create_cms_pages_table', 1),
(36, '2021_07_23_000015_create_newsletters_table', 1),
(37, '2021_07_23_000022_create_testimonials_table', 1),
(38, '2021_07_26_000003_create_menus_table', 1),
(39, '2021_07_26_000027_create_blogs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ajay.kushwaha19@gmail.com', '1', '2021-07-30 15:33:35', '2021-07-30 15:33:35', NULL);

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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', NULL, NULL, NULL),
(2, 'permission_create', NULL, NULL, NULL),
(3, 'permission_edit', NULL, NULL, NULL),
(4, 'permission_show', NULL, NULL, NULL),
(5, 'permission_delete', NULL, NULL, NULL),
(6, 'permission_access', NULL, NULL, NULL),
(7, 'role_create', NULL, NULL, NULL),
(8, 'role_edit', NULL, NULL, NULL),
(9, 'role_show', NULL, NULL, NULL),
(10, 'role_delete', NULL, NULL, NULL),
(11, 'role_access', NULL, NULL, NULL),
(12, 'user_create', NULL, NULL, NULL),
(13, 'user_edit', NULL, NULL, NULL),
(14, 'user_show', NULL, NULL, NULL),
(15, 'user_delete', NULL, NULL, NULL),
(16, 'user_access', NULL, NULL, NULL),
(17, 'category_management_access', NULL, NULL, NULL),
(18, 'product_management_access', NULL, NULL, NULL),
(19, 'faq_management_access', NULL, NULL, NULL),
(20, 'faq_category_create', NULL, NULL, NULL),
(21, 'faq_category_edit', NULL, NULL, NULL),
(22, 'faq_category_show', NULL, NULL, NULL),
(23, 'faq_category_delete', NULL, NULL, NULL),
(24, 'faq_category_access', NULL, NULL, NULL),
(25, 'faq_question_create', NULL, NULL, NULL),
(26, 'faq_question_edit', NULL, NULL, NULL),
(27, 'faq_question_show', NULL, NULL, NULL),
(28, 'faq_question_delete', NULL, NULL, NULL),
(29, 'faq_question_access', NULL, NULL, NULL),
(30, 'category_create', NULL, NULL, NULL),
(31, 'category_edit', NULL, NULL, NULL),
(32, 'category_show', NULL, NULL, NULL),
(33, 'category_delete', NULL, NULL, NULL),
(34, 'category_access', NULL, NULL, NULL),
(35, 'attribute_create', NULL, NULL, NULL),
(36, 'attribute_edit', NULL, NULL, NULL),
(37, 'attribute_show', NULL, NULL, NULL),
(38, 'attribute_delete', NULL, NULL, NULL),
(39, 'attribute_access', NULL, NULL, NULL),
(40, 'attribute_value_create', NULL, NULL, NULL),
(41, 'attribute_value_edit', NULL, NULL, NULL),
(42, 'attribute_value_show', NULL, NULL, NULL),
(43, 'attribute_value_delete', NULL, NULL, NULL),
(44, 'attribute_value_access', NULL, NULL, NULL),
(45, 'attribute_management_access', NULL, NULL, NULL),
(46, 'color_create', NULL, NULL, NULL),
(47, 'color_edit', NULL, NULL, NULL),
(48, 'color_show', NULL, NULL, NULL),
(49, 'color_delete', NULL, NULL, NULL),
(50, 'color_access', NULL, NULL, NULL),
(51, 'brand_create', NULL, NULL, NULL),
(52, 'brand_edit', NULL, NULL, NULL),
(53, 'brand_show', NULL, NULL, NULL),
(54, 'brand_delete', NULL, NULL, NULL),
(55, 'brand_access', NULL, NULL, NULL),
(56, 'size_create', NULL, NULL, NULL),
(57, 'size_edit', NULL, NULL, NULL),
(58, 'size_show', NULL, NULL, NULL),
(59, 'size_delete', NULL, NULL, NULL),
(60, 'size_access', NULL, NULL, NULL),
(61, 'product_create', NULL, NULL, NULL),
(62, 'product_edit', NULL, NULL, NULL),
(63, 'product_show', NULL, NULL, NULL),
(64, 'product_delete', NULL, NULL, NULL),
(65, 'product_access', NULL, NULL, NULL),
(66, 'product_image_create', NULL, NULL, NULL),
(67, 'product_image_edit', NULL, NULL, NULL),
(68, 'product_image_show', NULL, NULL, NULL),
(69, 'product_image_delete', NULL, NULL, NULL),
(70, 'product_image_access', NULL, NULL, NULL),
(71, 'product_variation_create', NULL, NULL, NULL),
(72, 'product_variation_edit', NULL, NULL, NULL),
(73, 'product_variation_show', NULL, NULL, NULL),
(74, 'product_variation_delete', NULL, NULL, NULL),
(75, 'product_variation_access', NULL, NULL, NULL),
(76, 'product_attribute_create', NULL, NULL, NULL),
(77, 'product_attribute_edit', NULL, NULL, NULL),
(78, 'product_attribute_show', NULL, NULL, NULL),
(79, 'product_attribute_delete', NULL, NULL, NULL),
(80, 'product_attribute_access', NULL, NULL, NULL),
(81, 'profile_password_edit', NULL, NULL, NULL),
(82, 'map_attribute_access', NULL, NULL, NULL),
(83, 'map_attribute_create', NULL, NULL, NULL),
(84, 'map_attribute_edit', NULL, NULL, NULL),
(85, 'map_attribute_show', NULL, NULL, NULL),
(86, 'map_attribute_delete', NULL, NULL, NULL),
(87, 'coupon_create', NULL, NULL, NULL),
(88, 'coupon_edit', NULL, NULL, NULL),
(89, 'coupon_show', NULL, NULL, NULL),
(90, 'coupon_delete', NULL, NULL, NULL),
(91, 'coupon_access', NULL, NULL, NULL),
(92, 'master_access', NULL, NULL, NULL),
(93, 'slider_create', NULL, NULL, NULL),
(94, 'slider_edit', NULL, NULL, NULL),
(95, 'slider_show', NULL, NULL, NULL),
(96, 'slider_delete', NULL, NULL, NULL),
(97, 'slider_access', NULL, NULL, NULL),
(98, 'social_profile_type_create', NULL, NULL, NULL),
(99, 'social_profile_type_edit', NULL, NULL, NULL),
(100, 'social_profile_type_show', NULL, NULL, NULL),
(101, 'social_profile_type_delete', NULL, NULL, NULL),
(102, 'social_profile_type_access', NULL, NULL, NULL),
(103, 'user_social_profile_create', NULL, NULL, NULL),
(104, 'user_social_profile_edit', NULL, NULL, NULL),
(105, 'user_social_profile_show', NULL, NULL, NULL),
(106, 'user_social_profile_delete', NULL, NULL, NULL),
(107, 'user_social_profile_access', NULL, NULL, NULL),
(108, 'store_create', NULL, NULL, NULL),
(109, 'store_edit', NULL, NULL, NULL),
(110, 'store_show', NULL, NULL, NULL),
(111, 'store_delete', NULL, NULL, NULL),
(112, 'store_access', NULL, NULL, NULL),
(113, 'cms_page_create', NULL, NULL, NULL),
(114, 'cms_page_edit', NULL, NULL, NULL),
(115, 'cms_page_show', NULL, NULL, NULL),
(116, 'cms_page_delete', NULL, NULL, NULL),
(117, 'cms_page_access', NULL, NULL, NULL),
(118, 'testimonial_create', NULL, NULL, NULL),
(119, 'testimonial_edit', NULL, NULL, NULL),
(120, 'testimonial_show', NULL, NULL, NULL),
(121, 'testimonial_delete', NULL, NULL, NULL),
(122, 'testimonial_access', NULL, NULL, NULL),
(123, 'newsletter_create', NULL, NULL, NULL),
(124, 'newsletter_edit', NULL, NULL, NULL),
(125, 'newsletter_show', NULL, NULL, NULL),
(126, 'newsletter_delete', NULL, NULL, NULL),
(127, 'newsletter_access', NULL, NULL, NULL),
(128, 'menu_create', NULL, NULL, NULL),
(129, 'menu_edit', NULL, NULL, NULL),
(130, 'menu_show', NULL, NULL, NULL),
(131, 'menu_delete', NULL, NULL, NULL),
(132, 'menu_access', NULL, NULL, NULL),
(133, 'blog_create', NULL, NULL, NULL),
(134, 'blog_edit', NULL, NULL, NULL),
(135, 'blog_show', NULL, NULL, NULL),
(136, 'blog_delete', NULL, NULL, NULL),
(137, 'blog_access', NULL, NULL, NULL),
(138, 'profile_password_edit', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(1, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(1, 87),
(1, 88),
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(1, 95),
(1, 96),
(1, 97),
(1, 98),
(1, 99),
(1, 100),
(1, 101),
(1, 102),
(1, 103),
(1, 104),
(1, 105),
(1, 106),
(1, 107),
(1, 108),
(1, 109),
(1, 110),
(1, 111),
(1, 112),
(1, 113),
(1, 114),
(1, 115),
(1, 116),
(1, 117),
(1, 118),
(1, 119),
(1, 120),
(1, 121),
(1, 122),
(1, 123),
(1, 124),
(1, 125),
(1, 126),
(1, 127),
(1, 128),
(1, 129),
(1, 130),
(1, 131),
(1, 132),
(1, 133),
(1, 134),
(1, 135),
(1, 136),
(1, 137),
(1, 138),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 134),
(2, 135),
(2, 136),
(2, 137),
(2, 138);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_child_id` bigint(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hsn_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrp_price` double(10,2) DEFAULT NULL,
  `tax_rate` double(10,2) DEFAULT NULL,
  `discount_type` tinyint(4) DEFAULT NULL COMMENT '1 - Percentage / 2 - Flat; Default - 0',
  `discount` double(10,2) DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 - No / 1 - Yes; Default - 1',
  `is_exclusive` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - No / 1 - Yes; Default - 0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - No / 1 - Yes; Default - 0',
  `is_new` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - No / 1 - Yes; Default - 0',
  `is_bulk` tinyint(1) NOT NULL DEFAULT '0',
  `sales_price` double(10,2) DEFAULT NULL,
  `view_count` bigint(20) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `sub_category_id`, `sub_category_child_id`, `name`, `description`, `details`, `slug`, `sku_code`, `hsn_code`, `mrp_price`, `tax_rate`, `discount_type`, `discount`, `in_stock`, `is_exclusive`, `is_featured`, `is_new`, `is_bulk`, `sales_price`, `view_count`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(38, 1, 18, 20, 24, 'admin2', '<p>s</p>', '<p>s</p>', 'admin2', '737737', '737737', 200.00, 2.00, 1, 2.00, 1, 0, 0, 0, 1, 196.00, 0, 1, '2021-08-28 18:57:34', '2021-08-28 19:02:52', '2021-08-28 19:02:52'),
(40, 1, 1, 13, 25, 'Sean Beans', '<p>3</p>', '<p>3</p>', 'sean-beans', '3242432', '3242432', 200.00, 3.00, 1, 3.00, 1, 1, 1, 0, 0, 194.00, 0, 1, '2021-08-28 19:04:20', '2021-09-04 13:50:39', '2021-09-04 13:50:39'),
(41, 1, 1, 2, 58, 'Anand Kumar', '<p>Cotton Printed Straight Kurta</p>', NULL, 'anand-kumar', 'SK-1307', '62114210', NULL, 5.00, 1, 5.00, 1, 1, 1, 1, 1, 0.00, 0, 1, '2021-09-04 13:54:21', '2021-09-04 13:54:21', NULL),
(45, 1, 1, 8, 50, 'Shirt 1', '<p>Shirts</p>', '<p>adsf</p>', 'shirt-1', 'asdas', NULL, NULL, NULL, 1, 100.00, 1, 0, 0, 1, 0, 0.00, 0, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', NULL),
(54, 1, 18, 20, 24, '11', '<p>asfadsf</p>', '<p>sdfx</p>', '11', 'sk-1207', 'hs-4561', NULL, 500.00, 1, 20.00, 1, 0, 0, 1, 0, 0.00, 0, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(57, 1, 1, 12, 42, 'Skirts', NULL, NULL, 'skirts', 'sk-1205', 'asdfa', NULL, 200.00, 1, 10.00, 1, 0, 1, 1, 0, 0.00, 0, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(58, 1, 1, 61, 62, 'Kurties', NULL, NULL, 'kurties', 'sk-8595', 'sdfv', NULL, 200.00, 1, 15.00, 1, 0, 1, 1, 0, 0.00, 0, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(59, 1, 5, 6, 60, 'Kuta set', NULL, NULL, 'kuta-set', 'sk-8524', 'sfdbg', NULL, 300.00, 1, 10.00, 1, 0, 0, 1, 0, 0.00, 0, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_id`, `attribute_value_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 34, 1, 42, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(2, 34, 2, 28, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(3, 34, 3, 17, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(4, 36, 1, 42, 1, '2021-08-28 06:54:36', '2021-08-28 06:54:36', NULL),
(5, 37, 1, 42, 1, '2021-08-28 08:28:34', '2021-08-28 08:28:34', NULL),
(6, 37, 2, 28, 1, '2021-08-28 08:28:34', '2021-08-28 08:28:34', NULL),
(7, 37, 3, 17, 1, '2021-08-28 08:28:34', '2021-08-28 08:28:34', NULL),
(8, 45, 1, 40, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(9, 45, 2, 31, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(10, 45, 3, 18, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(11, 45, 4, 48, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(12, 45, 5, 52, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(13, 45, 6, 59, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(14, 45, 7, 69, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(15, 45, 8, 80, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(16, 45, 9, 98, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(17, 45, 10, 106, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(18, 45, 1, 40, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(19, 45, 2, 31, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(20, 45, 3, 18, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(21, 45, 4, 48, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(22, 45, 5, 52, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(23, 45, 6, 59, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(24, 45, 7, 69, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(25, 45, 8, 80, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(26, 45, 9, 98, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(27, 45, 10, 106, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(28, 54, 1, 42, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(29, 54, 2, 28, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(30, 54, 3, 17, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(31, 54, 4, 50, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(32, 54, 5, 52, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(33, 54, 6, 62, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(34, 54, 7, 69, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(35, 54, 8, 82, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(36, 54, 9, 98, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(37, 57, 1, 40, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(38, 57, 2, 28, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(39, 57, 3, 18, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(40, 57, 4, 48, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(41, 57, 7, 69, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(42, 57, 8, 90, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(43, 57, 9, 98, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(44, 57, 10, 107, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(45, 58, 1, 40, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(46, 58, 2, 30, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(47, 58, 3, 20, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(48, 58, 4, 49, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(49, 59, 1, 41, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(50, 59, 2, 28, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(51, 59, 3, 21, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(52, 59, 4, 48, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(53, 59, 5, 53, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(54, 59, 6, 59, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(55, 59, 7, 69, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(56, 59, 8, 78, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(57, 59, 9, 99, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(58, 59, 10, 106, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `is_bulk` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - No / 1 - Yes; Default - 0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(11) DEFAULT NULL,
  `status` bigint(11) UNSIGNED DEFAULT NULL,
  `product_color_id` bigint(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - Image / 2 - File (Docx / PDF)  / 3 - Video / 4 - Audio; Default - 0',
  `file_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `status`, `product_color_id`, `type`, `file_name`, `created_at`, `updated_at`) VALUES
(4, 25, NULL, 3, 1, '1630049526Screenshot (160).png', '2021-08-27 02:02:06', '2021-08-27 02:02:06'),
(5, 25, NULL, 3, 1, '1630049526Screenshot (161).png', '2021-08-27 02:02:06', '2021-08-27 02:02:06'),
(6, 25, NULL, 3, 1, '1630049526Screenshot (162).png', '2021-08-27 02:02:06', '2021-08-27 02:02:06'),
(7, 25, NULL, 4, 1, '1630049526Screenshot (160).png', '2021-08-27 02:02:06', '2021-08-27 02:02:06'),
(8, 25, NULL, 4, 1, '1630049526Screenshot (161).png', '2021-08-27 02:02:06', '2021-08-27 02:02:06'),
(9, 25, NULL, 4, 1, '1630049526Screenshot (162).png', '2021-08-27 02:02:06', '2021-08-27 02:02:06'),
(10, 25, NULL, 4, 1, '1630049526Screenshot (163).png', '2021-08-27 02:02:06', '2021-08-27 02:02:06'),
(11, 26, NULL, 3, 1, '1630056581Screenshot (161).png', '2021-08-27 03:59:41', '2021-08-27 03:59:41'),
(12, 26, NULL, 3, 1, '1630056581Screenshot (162).png', '2021-08-27 03:59:41', '2021-08-27 03:59:41'),
(13, 26, NULL, 3, 1, '1630056581Screenshot (163).png', '2021-08-27 03:59:41', '2021-08-27 03:59:41'),
(14, 26, NULL, 4, 1, '1630056581Screenshot (161).png', '2021-08-27 03:59:41', '2021-08-27 03:59:41'),
(15, 26, NULL, 4, 1, '1630056581Screenshot (162).png', '2021-08-27 03:59:41', '2021-08-27 03:59:41'),
(16, 26, NULL, 4, 1, '1630056581Screenshot (163).png', '2021-08-27 03:59:41', '2021-08-27 03:59:41'),
(17, 26, NULL, 4, 1, '1630056581Screenshot (164).png', '2021-08-27 03:59:41', '2021-08-27 03:59:41'),
(18, 27, NULL, 3, 1, '1630063085Screenshot (160).png', '2021-08-27 05:48:06', '2021-08-27 05:48:06'),
(19, 27, NULL, 3, 1, '1630063086Screenshot (161).png', '2021-08-27 05:48:06', '2021-08-27 05:48:06'),
(20, 27, NULL, 3, 1, '1630063086Screenshot (162).png', '2021-08-27 05:48:06', '2021-08-27 05:48:06'),
(21, 27, NULL, 3, 1, '1630063086Screenshot (163).png', '2021-08-27 05:48:06', '2021-08-27 05:48:06'),
(22, 28, NULL, 3, 1, '1630063086Screenshot (162).png', '2021-08-27 05:48:06', '2021-08-27 05:48:06'),
(23, 28, NULL, 4, 1, '1630063086Screenshot (161).png', '2021-08-27 05:48:06', '2021-08-27 05:48:06'),
(24, 28, NULL, 4, 1, '1630063086Screenshot (162).png', '2021-08-27 05:48:06', '2021-08-27 05:48:06'),
(25, 29, NULL, 0, 1, '1630091110Screenshot (156).png', '2021-08-27 13:35:10', '2021-08-27 13:35:10'),
(26, 29, NULL, 0, 1, '1630091110Screenshot (164).png', '2021-08-27 13:35:10', '2021-08-27 13:35:10'),
(27, 29, NULL, 0, 1, '1630091110Screenshot (165).png', '2021-08-27 13:35:10', '2021-08-27 13:35:10'),
(28, 29, NULL, 0, 1, '1630091110Screenshot_2021-08-17-20-00-37-25_c6b8306bd0dbc9111494741d99cb8eab.jpg', '2021-08-27 13:35:10', '2021-08-27 13:35:10'),
(29, 30, NULL, 3, 1, '1630092157Screenshot (161).png', '2021-08-27 13:52:37', '2021-08-27 13:52:37'),
(30, 30, NULL, 3, 1, '1630092157Screenshot (162).png', '2021-08-27 13:52:37', '2021-08-27 13:52:37'),
(31, 30, NULL, 3, 1, '1630092157Screenshot (163).png', '2021-08-27 13:52:37', '2021-08-27 13:52:37'),
(32, 30, NULL, 3, 1, '1630092157Screenshot (165).png', '2021-08-27 13:52:37', '2021-08-27 13:52:37'),
(33, 30, NULL, 4, 1, '1630092157Screenshot (131).png', '2021-08-27 13:52:37', '2021-08-27 13:52:37'),
(34, 30, NULL, 4, 1, '1630092157Screenshot (132).png', '2021-08-27 13:52:37', '2021-08-27 13:52:37'),
(36, 31, NULL, 3, 1, '1630125120Screenshot (131).png', '2021-08-27 23:02:00', '2021-08-27 23:02:00'),
(37, 31, NULL, 3, 1, '1630125120Screenshot (132).png', '2021-08-27 23:02:00', '2021-08-27 23:02:00'),
(38, 31, NULL, 4, 1, '1630125120Screenshot (128).png', '2021-08-27 23:02:00', '2021-08-27 23:02:00'),
(39, 32, NULL, 3, 1, '1630135531Screenshot (138).png', '2021-08-28 01:55:31', '2021-08-28 01:55:31'),
(40, 32, NULL, 3, 1, '1630135531Screenshot (139).png', '2021-08-28 01:55:31', '2021-08-28 01:55:31'),
(41, 32, NULL, 3, 1, '1630135531Screenshot (140).png', '2021-08-28 01:55:31', '2021-08-28 01:55:31'),
(42, 32, NULL, 4, 1, '1630135531Screenshot (128).png', '2021-08-28 01:55:31', '2021-08-28 01:55:31'),
(43, 32, NULL, 4, 1, '1630135531Screenshot (137).png', '2021-08-28 01:55:31', '2021-08-28 01:55:31'),
(44, 32, NULL, 4, 1, '1630135531Screenshot (138).png', '2021-08-28 01:55:31', '2021-08-28 01:55:31'),
(45, 32, NULL, 4, 1, '1630135531Screenshot (139).png', '2021-08-28 01:55:31', '2021-08-28 01:55:31'),
(46, 33, NULL, 3, 1, '1630137576Screenshot (123).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(47, 33, NULL, 3, 1, '1630137576Screenshot (124).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(48, 33, NULL, 3, 1, '1630137576Screenshot (125).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(49, 33, NULL, 3, 1, '1630137576Screenshot (126).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(50, 33, NULL, 3, 1, '1630137576Screenshot (127).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(51, 33, NULL, 4, 1, '1630137576Screenshot (129).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(52, 33, NULL, 4, 1, '1630137576Screenshot (130).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(53, 33, NULL, 4, 1, '1630137576Screenshot (131).png', '2021-08-28 02:29:36', '2021-08-28 02:29:36'),
(55, 34, NULL, 1, 1, '1630140317Screenshot (129).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(56, 34, NULL, 1, 1, '1630140317Screenshot (135).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(57, 34, NULL, 1, 1, '1630140317Screenshot (138).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(59, 34, NULL, 1, 1, '1630140317Screenshot (140).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(60, 34, NULL, 2, 1, '1630140317Screenshot (129).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(61, 34, NULL, 2, 1, '1630140317Screenshot (130).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(62, 34, NULL, 2, 1, '1630140317Screenshot (131).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(63, 34, NULL, 2, 1, '1630140317Screenshot (132).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(64, 34, NULL, 3, 1, '1630140317Screenshot (124).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(65, 34, NULL, 3, 1, '1630140317Screenshot (129).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(66, 34, NULL, 3, 1, '1630140317Screenshot (130).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(67, 34, NULL, 4, 1, '1630140317Screenshot (130).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(69, 34, NULL, 5, 1, '1630140317Screenshot (132).png', '2021-08-28 03:15:17', '2021-08-28 03:15:17'),
(70, 34, NULL, 1, 1, '1630144124Screenshot (123).png', '2021-08-28 04:18:44', '2021-08-28 04:18:44'),
(71, 10, NULL, 1, 1, '1630144935Screenshot (129).png', '2021-08-28 04:32:15', '2021-08-28 04:32:15'),
(72, 10, NULL, 1, 1, '1630144935Screenshot (131).png', '2021-08-28 04:32:15', '2021-08-28 04:32:15'),
(73, 10, NULL, 1, 1, '1630144935Screenshot (132).png', '2021-08-28 04:32:15', '2021-08-28 04:32:15'),
(74, 10, NULL, 2, 1, '1630145034Screenshot (130).png', '2021-08-28 04:33:54', '2021-08-28 04:33:54'),
(78, 35, NULL, 1, 1, '1630146514Screenshot (126).png', '2021-08-28 04:58:34', '2021-08-28 04:58:34'),
(80, 35, NULL, 2, 1, '1630146514Screenshot (131).png', '2021-08-28 04:58:34', '2021-08-28 04:58:34'),
(81, 35, NULL, 2, 1, '1630146514Screenshot (132).png', '2021-08-28 04:58:34', '2021-08-28 04:58:34'),
(84, 35, NULL, 3, 1, '1630146514Screenshot (140).png', '2021-08-28 04:58:34', '2021-08-28 04:58:34'),
(85, 35, NULL, 4, 1, '1630146514Screenshot (129).png', '2021-08-28 04:58:34', '2021-08-28 04:58:34'),
(86, 35, NULL, 3, 1, '1630146626Screenshot (123).png', '2021-08-28 05:00:26', '2021-08-28 05:00:26'),
(87, 35, NULL, 3, 1, '1630146626Screenshot (129).png', '2021-08-28 05:00:26', '2021-08-28 05:00:26'),
(88, 35, NULL, 3, 1, '1630146626Screenshot (130).png', '2021-08-28 05:00:26', '2021-08-28 05:00:26'),
(89, 35, NULL, 3, 1, '1630146626Screenshot (131).png', '2021-08-28 05:00:26', '2021-08-28 05:00:26'),
(90, 35, NULL, 3, 1, '1630146626Screenshot (132).png', '2021-08-28 05:00:26', '2021-08-28 05:00:26'),
(93, 35, NULL, 1, 1, '1630153241Screenshot (125).png', '2021-08-28 06:50:41', '2021-08-28 06:50:41'),
(94, 35, NULL, 1, 1, '1630153241Screenshot (126).png', '2021-08-28 06:50:41', '2021-08-28 06:50:41'),
(95, 35, NULL, 1, 1, '1630153241Screenshot (127).png', '2021-08-28 06:50:41', '2021-08-28 06:50:41'),
(96, 35, NULL, 1, 1, '1630153241Screenshot (128).png', '2021-08-28 06:50:41', '2021-08-28 06:50:41'),
(97, 35, NULL, 1, 1, '1630153241Screenshot (129).png', '2021-08-28 06:50:41', '2021-08-28 06:50:41'),
(98, 35, NULL, 1, 1, '1630153241Screenshot (131).png', '2021-08-28 06:50:41', '2021-08-28 06:50:41'),
(99, 35, NULL, 1, 1, '1630153322Screenshot (131).png', '2021-08-28 06:52:02', '2021-08-28 06:52:02'),
(103, 36, NULL, 1, 1, '1630153476Screenshot (132).png', '2021-08-28 06:54:36', '2021-08-28 06:54:36'),
(104, 36, NULL, 3, 1, '1630153566Screenshot (129).png', '2021-08-28 06:56:06', '2021-08-28 06:56:06'),
(105, 36, NULL, 3, 1, '1630153566Screenshot (130).png', '2021-08-28 06:56:06', '2021-08-28 06:56:06'),
(106, 36, NULL, 3, 1, '1630153566Screenshot (131).png', '2021-08-28 06:56:06', '2021-08-28 06:56:06'),
(107, 36, NULL, 3, 1, '1630153566Screenshot (132).png', '2021-08-28 06:56:06', '2021-08-28 06:56:06'),
(108, 36, NULL, 1, 1, '1630156800Screenshot (129).png', '2021-08-28 07:50:00', '2021-08-28 07:50:00'),
(109, 36, NULL, 1, 1, '1630156800Screenshot (130).png', '2021-08-28 07:50:00', '2021-08-28 07:50:00'),
(110, 36, NULL, 1, 1, '1630156800Screenshot (131).png', '2021-08-28 07:50:00', '2021-08-28 07:50:00'),
(111, 36, NULL, 1, 1, '1630156800Screenshot (132).png', '2021-08-28 07:50:00', '2021-08-28 07:50:00'),
(112, 36, NULL, 2, 1, '1630157465Screenshot (138).png', '2021-08-28 08:01:05', '2021-08-28 08:01:05'),
(113, 36, NULL, 2, 1, '1630157465Screenshot (139).png', '2021-08-28 08:01:05', '2021-08-28 08:01:05'),
(114, 36, NULL, 2, 1, '1630157465Screenshot (140).png', '2021-08-28 08:01:05', '2021-08-28 08:01:05'),
(115, 36, NULL, 4, 1, '1630157538Screenshot (128).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(117, 36, NULL, 4, 1, '1630157538Screenshot (130).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(118, 36, NULL, 4, 1, '1630157538Screenshot (131).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(119, 36, NULL, 4, 1, '1630157538Screenshot (133).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(120, 36, NULL, 4, 1, '1630157538Screenshot (136).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(121, 36, NULL, 4, 1, '1630157538Screenshot (139).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(122, 36, NULL, 4, 1, '1630157538Screenshot (140).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(123, 36, NULL, 5, 1, '1630157538Screenshot (129).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(124, 36, NULL, 5, 1, '1630157538Screenshot (130).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(125, 36, NULL, 5, 1, '1630157538Screenshot (131).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(126, 36, NULL, 5, 1, '1630157538Screenshot (132).png', '2021-08-28 08:02:18', '2021-08-28 08:02:18'),
(127, 37, NULL, 1, 1, '1630159114Screenshot (123).png', '2021-08-28 08:28:34', '2021-08-28 08:28:34'),
(128, 37, NULL, 1, 1, '1630159114Screenshot (124).png', '2021-08-28 08:28:34', '2021-08-28 08:28:34'),
(129, 37, NULL, 1, 1, '1630159114Screenshot (125).png', '2021-08-28 08:28:34', '2021-08-28 08:28:34'),
(130, 37, NULL, 1, 1, '1630159114Screenshot (126).png', '2021-08-28 08:28:34', '2021-08-28 08:28:34'),
(131, 37, NULL, 1, 1, '1630159114Screenshot (127).png', '2021-08-28 08:28:34', '2021-08-28 08:28:34'),
(132, 37, NULL, 1, 1, '1630159114Screenshot (128).png', '2021-08-28 08:28:34', '2021-08-28 08:28:34'),
(133, 37, NULL, 3, 1, '1630161207Screenshot (129) - Copy.png', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(134, 37, NULL, 3, 1, '1630161207Screenshot (130) - Copy.png', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(135, 37, NULL, 3, 1, '1630161207Screenshot (130).png', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(136, 37, NULL, 3, 1, '1630161207Screenshot (132).png', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(137, 37, NULL, 3, 1, '1630161207Screenshot (133).png', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(138, 37, NULL, 3, 1, '1630161207Screenshot (134).png', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(139, 37, NULL, 2, 1, '1630161350Screenshot (131) - Copy - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(140, 37, NULL, 2, 1, '1630161350Screenshot (132) - Copy - Copy - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(141, 37, NULL, 2, 1, '1630161350Screenshot (133) - Copy - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(142, 37, NULL, 2, 1, '1630161350Screenshot (133) - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(143, 37, NULL, 2, 1, '1630161350Screenshot (133) - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(144, 37, NULL, 2, 1, '1630161350Screenshot (133).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(145, 37, NULL, 2, 1, '1630161350Screenshot (134) - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(146, 37, NULL, 2, 1, '1630161350Screenshot (134).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(147, 37, NULL, 2, 1, '1630161350Screenshot (135) - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(148, 37, NULL, 2, 1, '1630161350Screenshot (135) - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(149, 37, NULL, 4, 1, '1630161350Screenshot (123).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(150, 37, NULL, 4, 1, '1630161350Screenshot (124).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(151, 37, NULL, 4, 1, '1630161350Screenshot (125).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(152, 37, NULL, 4, 1, '1630161350Screenshot (126).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(153, 37, NULL, 4, 1, '1630161350Screenshot (128).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(154, 37, NULL, 4, 1, '1630161350Screenshot (129) - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(155, 37, NULL, 4, 1, '1630161350Screenshot (129).png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(156, 37, NULL, 4, 1, '1630161350Screenshot (130) - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(157, 37, NULL, 5, 1, '1630161350Screenshot (131) - Copy - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(158, 37, NULL, 5, 1, '1630161350Screenshot (131) - Copy - Copy.png', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(160, 37, NULL, 5, 1, '1630161380Screenshot (124) - Copy - Copy.png', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(161, 37, NULL, 5, 1, '1630161380Screenshot (124).png', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(162, 37, NULL, 5, 1, '1630161380Screenshot (125) - Copy - Copy.png', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(163, 37, NULL, 5, 1, '1630161380Screenshot (126) - Copy - Copy.png', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(164, 37, NULL, 5, 1, '1630161380Screenshot (126) - Copy.png', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(165, 37, NULL, 5, 1, '1630161380Screenshot (126).png', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(166, 37, NULL, 5, 1, '1630161380Screenshot (127) - Copy - Copy.png', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(167, 38, NULL, 1, 1, '1630162654Screenshot (11).png', '2021-08-28 18:57:34', '2021-08-28 18:57:34'),
(168, 38, NULL, 1, 1, '1630162654Screenshot (12).png', '2021-08-28 18:57:34', '2021-08-28 18:57:34'),
(169, 38, NULL, 1, 1, '1630162654Screenshot (13).png', '2021-08-28 18:57:34', '2021-08-28 18:57:34'),
(170, 40, NULL, 3, 1, '1630163060Screenshot (10).png', '2021-08-28 19:04:20', '2021-08-28 19:04:20'),
(171, 40, NULL, 3, 1, '1630163060Screenshot (16).png', '2021-08-28 19:04:20', '2021-08-28 19:04:20'),
(173, 40, NULL, 3, 1, '1630163060Screenshot (18).png', '2021-08-28 19:04:20', '2021-08-28 19:04:20'),
(174, 40, NULL, 3, 1, '1630163060Screenshot (19).png', '2021-08-28 19:04:20', '2021-08-28 19:04:20'),
(175, 40, NULL, 4, 1, '1630731354Screenshot (62).png', '2021-09-04 08:55:54', '2021-09-04 08:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_color_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `mrp_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `sales_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `base_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `in_stock` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 - No / 1 - Yes; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `single_price` double(10,2) DEFAULT NULL,
  `single_price_quantity` int(20) DEFAULT NULL,
  `wholesale_price` double(10,2) DEFAULT NULL,
  `wholesale_price_quantity` int(20) DEFAULT NULL,
  `size_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `product_id`, `color_id`, `size_id`, `qty`, `single_price`, `single_price_quantity`, `wholesale_price`, `wholesale_price_quantity`, `size_status`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-26 01:40:46', '2021-08-26 01:40:46', NULL),
(2, 1, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-26 01:40:46', '2021-08-26 01:40:46', NULL),
(3, 1, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-26 01:40:46', '2021-08-26 01:40:46', NULL),
(4, 10, 2, 3, NULL, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-27 01:09:46', '2021-08-27 01:09:46', NULL),
(5, 10, 2, 4, NULL, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-27 01:09:46', '2021-08-27 01:09:46', NULL),
(6, 10, 2, 5, NULL, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-27 01:09:46', '2021-08-27 01:09:46', NULL),
(7, 12, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:39:33', '2021-08-27 01:39:33', NULL),
(8, 12, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:39:33', '2021-08-27 01:39:33', NULL),
(9, 12, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:39:33', '2021-08-27 01:39:33', NULL),
(10, 12, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:39:33', '2021-08-27 01:39:33', NULL),
(11, 12, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:39:33', '2021-08-27 01:39:33', NULL),
(12, 12, 4, 3, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:39:33', '2021-08-27 01:39:33', NULL),
(13, 14, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:42:33', '2021-08-27 01:42:33', NULL),
(14, 14, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:42:33', '2021-08-27 01:42:33', NULL),
(15, 14, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:42:33', '2021-08-27 01:42:33', NULL),
(16, 14, 4, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:42:33', '2021-08-27 01:42:33', NULL),
(17, 14, 4, 2, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:42:33', '2021-08-27 01:42:33', NULL),
(18, 14, 4, 3, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:42:33', '2021-08-27 01:42:33', NULL),
(19, 16, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:43:54', '2021-08-27 01:43:54', NULL),
(20, 16, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:43:54', '2021-08-27 01:43:54', NULL),
(21, 16, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:43:54', '2021-08-27 01:43:54', NULL),
(22, 16, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:43:54', '2021-08-27 01:43:54', NULL),
(23, 16, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:43:54', '2021-08-27 01:43:54', NULL),
(24, 16, 4, 3, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:43:54', '2021-08-27 01:43:54', NULL),
(25, 18, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:47:39', '2021-08-27 01:47:39', NULL),
(26, 18, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:47:39', '2021-08-27 01:47:39', NULL),
(27, 18, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:47:39', '2021-08-27 01:47:39', NULL),
(28, 18, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:47:39', '2021-08-27 01:47:39', NULL),
(29, 18, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:47:39', '2021-08-27 01:47:39', NULL),
(30, 18, 4, 3, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:47:39', '2021-08-27 01:47:39', NULL),
(31, 20, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:52:05', '2021-08-27 01:52:05', NULL),
(32, 20, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:52:05', '2021-08-27 01:52:05', NULL),
(33, 20, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 01:52:05', '2021-08-27 01:52:05', NULL),
(34, 20, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:52:05', '2021-08-27 01:52:05', NULL),
(35, 20, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:52:05', '2021-08-27 01:52:05', NULL),
(36, 20, 4, 3, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 01:52:05', '2021-08-27 01:52:05', NULL),
(37, 21, 3, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:54:57', '2021-08-27 01:54:57', NULL),
(38, 21, 3, 2, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:54:57', '2021-08-27 01:54:57', NULL),
(39, 23, 3, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:57:51', '2021-08-27 01:57:51', NULL),
(40, 23, 3, 2, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:57:51', '2021-08-27 01:57:51', NULL),
(41, 23, 3, 3, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:57:51', '2021-08-27 01:57:51', NULL),
(42, 23, 4, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:57:51', '2021-08-27 01:57:51', NULL),
(43, 23, 4, 2, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:57:51', '2021-08-27 01:57:51', NULL),
(44, 23, 4, 3, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-27 01:57:51', '2021-08-27 01:57:51', NULL),
(45, 25, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 02:02:06', '2021-08-27 02:02:06', NULL),
(46, 25, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 02:02:06', '2021-08-27 02:02:06', NULL),
(47, 25, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 02:02:06', '2021-08-27 02:02:06', NULL),
(48, 25, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 02:02:06', '2021-08-27 02:02:06', NULL),
(49, 25, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 02:02:06', '2021-08-27 02:02:06', NULL),
(50, 25, 4, 3, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 02:02:06', '2021-08-27 02:02:06', NULL),
(51, 26, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 03:59:41', '2021-08-27 03:59:41', NULL),
(52, 26, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 03:59:41', '2021-08-27 03:59:41', NULL),
(53, 26, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 03:59:41', '2021-08-27 03:59:41', NULL),
(54, 26, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 03:59:41', '2021-08-27 03:59:41', NULL),
(55, 26, 4, 3, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 03:59:41', '2021-08-27 03:59:41', NULL),
(56, 27, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 05:48:05', '2021-08-27 05:48:05', NULL),
(57, 27, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 05:48:05', '2021-08-27 05:48:05', NULL),
(58, 27, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 05:48:05', '2021-08-27 05:48:05', NULL),
(59, 30, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 13:52:37', '2021-08-27 13:52:37', NULL),
(60, 30, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 13:52:37', '2021-08-27 13:52:37', NULL),
(61, 30, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 13:52:37', '2021-08-27 13:52:37', NULL),
(62, 30, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 13:52:37', '2021-08-27 13:52:37', NULL),
(63, 30, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 13:52:37', '2021-08-27 13:52:37', NULL),
(64, 30, 4, 3, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 13:52:37', '2021-08-27 13:52:37', NULL),
(65, 31, 3, 1, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 23:02:00', '2021-08-27 23:02:00', NULL),
(66, 31, 3, 2, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 23:02:00', '2021-08-27 23:02:00', NULL),
(67, 31, 3, 3, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-27 23:02:00', '2021-08-27 23:02:00', NULL),
(68, 31, 4, 1, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 23:02:00', '2021-08-27 23:02:00', NULL),
(69, 31, 4, 2, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 23:02:00', '2021-08-27 23:02:00', NULL),
(70, 31, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-27 23:02:00', '2021-08-27 23:02:00', NULL),
(71, 32, 3, 1, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 01:55:31', '2021-08-28 01:55:31', NULL),
(72, 32, 4, 3, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 01:55:31', '2021-08-28 01:55:31', NULL),
(73, 33, 3, 2, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 02:29:36', '2021-08-28 02:29:36', NULL),
(74, 33, 3, 3, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 02:29:36', '2021-08-28 02:29:36', NULL),
(75, 33, 4, 1, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 02:29:36', '2021-08-28 02:29:36', NULL),
(76, 33, 4, 2, NULL, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 02:29:36', '2021-08-28 02:29:36', NULL),
(77, 34, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 04:51:11', NULL),
(78, 34, 1, 4, 20, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(79, 34, 2, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 04:51:53', NULL),
(80, 34, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(81, 34, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(82, 34, 5, 5, 89, 1.00, NULL, 0.00, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 04:51:53', NULL),
(83, 34, 5, 4, 89, 1.00, NULL, 0.00, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(84, 34, 5, 5, 7, 877.00, NULL, 870.00, NULL, 1, 1, '2021-08-28 03:15:17', '2021-08-28 03:15:17', NULL),
(85, 10, 1, 3, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 04:32:15', '2021-08-28 04:32:15', NULL),
(86, 10, 1, 4, 22, 999.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 04:32:15', '2021-08-28 04:32:15', NULL),
(87, 10, 1, 5, 23, 999.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 04:32:56', '2021-08-28 04:32:56', NULL),
(88, 10, 2, 3, NULL, 5.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 04:33:55', '2021-08-28 04:33:55', NULL),
(89, 10, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 04:33:55', '2021-08-28 04:33:55', NULL),
(90, 10, 4, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 04:34:18', '2021-08-28 04:34:18', NULL),
(91, 10, 5, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 04:34:18', '2021-08-28 04:34:18', NULL),
(92, 10, 5, 5, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 04:35:09', '2021-08-28 04:35:09', NULL),
(93, 34, 1, 5, 23, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 04:40:56', '2021-08-28 04:40:56', NULL),
(96, 35, 2, 4, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 04:58:34', '2021-08-28 06:05:00', NULL),
(97, 35, 3, 5, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 04:58:34', '2021-08-28 06:52:02', NULL),
(98, 35, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 04:58:34', '2021-08-28 06:20:25', NULL),
(99, 35, 3, 5, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 04:58:34', '2021-08-28 04:58:34', NULL),
(100, 35, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 04:58:34', '2021-08-28 04:58:34', NULL),
(101, 35, 1, 3, 210, 2122.00, NULL, 2034.00, NULL, 1, 1, '2021-08-28 06:00:36', '2021-08-28 06:50:41', NULL),
(102, 35, 2, 3, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 06:01:46', '2021-08-28 06:01:46', NULL),
(103, 35, 1, 5, 78, 880.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 06:20:25', '2021-08-28 06:47:23', NULL),
(104, 35, 2, 5, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 06:20:25', '2021-08-28 06:47:38', NULL),
(105, 35, 1, 4, 220, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 06:25:08', '2021-08-28 06:52:02', NULL),
(106, 36, 1, 3, 20022, 22222.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 06:54:36', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(107, 36, 1, 4, 20022, 9993.00, NULL, 9022222.00, NULL, 1, 1, '2021-08-28 06:55:18', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(108, 36, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 06:56:06', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(109, 36, 5, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 07:49:31', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(110, 36, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 07:54:27', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(111, 36, 4, 5, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 07:56:22', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(112, 36, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:00:40', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(113, 36, 4, 4, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:00:40', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(114, 36, 5, 3, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 08:00:40', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(115, 36, 2, 3, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 08:01:05', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(116, 36, 3, 3, 2, 300.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 08:01:30', '2021-08-28 08:23:43', '2021-08-28 08:23:43'),
(117, 36, 1, 3, 20022, 22222.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(118, 36, 1, 4, 20022, 9993.00, NULL, 9022222.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(119, 36, 1, 5, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(120, 36, 2, 3, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(121, 36, 3, 3, 2, 300.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(122, 36, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(123, 36, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(124, 36, 4, 4, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(125, 36, 4, 5, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(126, 36, 5, 3, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(127, 36, 5, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:23:43', '2021-08-28 08:23:55', '2021-08-28 08:23:55'),
(128, 36, 1, 3, 20022, 22222.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(129, 36, 1, 4, 20022, 9993.00, NULL, 9022222.00, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(130, 36, 1, 5, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(131, 36, 2, 3, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(132, 36, 3, 3, 2, 300.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(133, 36, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(134, 36, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(135, 36, 5, 3, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(136, 36, 5, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:23:55', '2021-08-28 08:24:09', '2021-08-28 08:24:09'),
(137, 36, 1, 3, 20022, 22222.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(138, 36, 1, 4, 20022, 9993.00, NULL, 9022222.00, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(139, 36, 1, 5, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(140, 36, 2, 3, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(141, 36, 2, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(142, 36, 3, 3, 2, 300.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(143, 36, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(144, 36, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:24:09', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(145, 36, 5, 3, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 08:24:10', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(146, 36, 5, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:10', '2021-08-28 08:24:46', '2021-08-28 08:24:46'),
(147, 36, 1, 3, 20022, 22222.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(148, 36, 1, 4, 20022, 9993.00, NULL, 9022222.00, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(149, 36, 1, 5, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(150, 36, 2, 3, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(151, 36, 2, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(152, 36, 3, 3, 2, 300.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(153, 36, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(154, 36, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(155, 36, 5, 4, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 08:24:46', '2021-08-28 08:24:58', '2021-08-28 08:24:58'),
(156, 36, 1, 3, 20022, 22222.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(157, 36, 1, 4, 20022, 9993.00, NULL, 9022222.00, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(158, 36, 1, 5, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(159, 36, 2, 3, 89, 500.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(160, 36, 2, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(161, 36, 3, 3, 2, 300.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(162, 36, 3, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(163, 36, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(164, 36, 5, 4, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:24:58', '2021-08-28 08:25:17', '2021-08-28 08:25:17'),
(165, 36, 1, 3, 20022, 22222.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 08:25:17', '2021-08-28 08:25:26', '2021-08-28 08:25:26'),
(166, 36, 1, 4, 20022, 9993.00, NULL, 9022222.00, NULL, 1, 1, '2021-08-28 08:25:17', '2021-08-28 08:25:26', '2021-08-28 08:25:26'),
(167, 36, 1, 5, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 08:25:17', '2021-08-28 08:25:26', '2021-08-28 08:25:26'),
(168, 36, 1, 3, 21, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 08:26:23', '2021-08-28 08:26:23', NULL),
(169, 36, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:26:23', '2021-08-28 08:26:23', NULL),
(170, 37, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:28:34', '2021-08-28 08:29:07', '2021-08-28 08:29:07'),
(171, 37, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:29:07', '2021-08-28 08:29:58', '2021-08-28 08:29:58'),
(172, 37, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:29:58', '2021-08-28 08:32:28', '2021-08-28 08:32:28'),
(173, 37, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 08:32:28', '2021-08-28 08:33:02', '2021-08-28 08:33:02'),
(174, 37, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 09:00:11', '2021-08-28 09:00:25', '2021-08-28 09:00:25'),
(175, 37, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 09:00:11', '2021-08-28 09:00:25', '2021-08-28 09:00:25'),
(176, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:00:25', '2021-08-28 09:00:50', '2021-08-28 09:00:50'),
(177, 37, 1, 5, 21, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:00:25', '2021-08-28 09:00:50', '2021-08-28 09:00:50'),
(178, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:00:50', '2021-08-28 09:01:14', '2021-08-28 09:01:14'),
(179, 37, 1, 5, 21, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:00:50', '2021-08-28 09:01:14', '2021-08-28 09:01:14'),
(180, 37, 4, 3, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:00:50', '2021-08-28 09:01:14', '2021-08-28 09:01:14'),
(181, 37, 4, 4, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:00:50', '2021-08-28 09:01:14', '2021-08-28 09:01:14'),
(182, 37, 4, 5, 4, 23.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:00:50', '2021-08-28 09:01:14', '2021-08-28 09:01:14'),
(183, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:01:14', '2021-08-28 09:02:48', '2021-08-28 09:02:48'),
(184, 37, 1, 5, 21, 22.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:01:14', '2021-08-28 09:02:48', '2021-08-28 09:02:48'),
(185, 37, 4, 3, 4, 23.00, NULL, 22.00, NULL, 1, 1, '2021-08-28 09:01:14', '2021-08-28 09:02:48', '2021-08-28 09:02:48'),
(186, 37, 4, 4, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:01:14', '2021-08-28 09:02:48', '2021-08-28 09:02:48'),
(187, 37, 4, 5, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:01:14', '2021-08-28 09:02:48', '2021-08-28 09:02:48'),
(188, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:02:48', '2021-08-28 09:02:56', '2021-08-28 09:02:56'),
(189, 37, 1, 4, 200, 999.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 09:02:48', '2021-08-28 09:02:56', '2021-08-28 09:02:56'),
(190, 37, 1, 5, 21, 22.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:02:48', '2021-08-28 09:02:56', '2021-08-28 09:02:56'),
(191, 37, 4, 3, 4, 23.00, NULL, 22.00, NULL, 1, 1, '2021-08-28 09:02:48', '2021-08-28 09:02:56', '2021-08-28 09:02:56'),
(192, 37, 4, 4, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:02:48', '2021-08-28 09:02:56', '2021-08-28 09:02:56'),
(193, 37, 4, 5, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:02:48', '2021-08-28 09:02:56', '2021-08-28 09:02:56'),
(194, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:02:56', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(195, 37, 1, 4, 200, 999.00, NULL, 2022222.00, NULL, 0, 1, '2021-08-28 09:02:56', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(196, 37, 1, 5, 21, 22.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:02:56', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(197, 37, 4, 3, 4, 23.00, NULL, 22.00, NULL, 1, 1, '2021-08-28 09:02:56', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(198, 37, 4, 4, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:02:56', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(199, 37, 4, 5, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:02:56', '2021-08-28 09:03:27', '2021-08-28 09:03:27'),
(200, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(201, 37, 1, 4, 200, 999.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(202, 37, 1, 5, 21, 22.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(203, 37, 3, 3, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(204, 37, 3, 4, 2, 300.00, NULL, 250.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(205, 37, 3, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(206, 37, 4, 3, 4, 23.00, NULL, 22.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(207, 37, 4, 4, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(208, 37, 4, 5, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:03:27', '2021-08-28 09:05:50', '2021-08-28 09:05:50'),
(209, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(210, 37, 1, 4, 200, 999.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(211, 37, 1, 5, 21, 22.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(212, 37, 2, 3, 890, 200.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(213, 37, 2, 4, 890, 500.00, NULL, 199.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(214, 37, 2, 5, 89, 200.00, NULL, 4002.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(215, 37, 3, 3, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(216, 37, 3, 4, 2, 300.00, NULL, 250.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(217, 37, 3, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(218, 37, 4, 3, 4, 23.00, NULL, 22.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(219, 37, 4, 4, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(220, 37, 4, 5, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(221, 37, 5, 3, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(222, 37, 5, 4, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(223, 37, 5, 5, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 09:05:50', '2021-08-28 09:06:20', '2021-08-28 09:06:20'),
(224, 37, 1, 3, 22, 21.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(225, 37, 1, 4, 200, 999.00, NULL, 2022222.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(226, 37, 1, 5, 21, 22.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(227, 37, 2, 3, 890, 200.00, NULL, 400.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(228, 37, 2, 4, 890, 500.00, NULL, 199.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(229, 37, 2, 5, 89, 200.00, NULL, 4002.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(230, 37, 3, 3, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(231, 37, 3, 4, 2, 300.00, NULL, 250.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(232, 37, 3, 5, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(233, 37, 4, 3, 4, 23.00, NULL, 22.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(234, 37, 4, 4, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(235, 37, 4, 5, 4, 22.00, NULL, 21.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(236, 37, 5, 3, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(237, 37, 5, 4, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(238, 37, 5, 5, 400, 89.00, NULL, 9.00, NULL, 1, 1, '2021-08-28 09:06:20', '2021-08-28 09:06:20', NULL),
(239, 38, 1, 3, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 18:57:34', '2021-08-28 18:57:34', NULL),
(240, 38, 1, 4, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 18:57:34', '2021-08-28 18:57:34', NULL),
(241, 38, 1, 5, 21, 21.00, NULL, 20.00, NULL, 1, 1, '2021-08-28 18:57:34', '2021-08-28 18:57:34', NULL),
(242, 40, 3, 1, 2, 100.00, NULL, 90.00, NULL, 1, 1, '2021-08-28 19:10:43', '2021-09-04 08:55:54', '2021-09-04 08:55:54'),
(243, 40, 3, 1, NULL, 100.00, NULL, 90.00, NULL, 1, 1, '2021-09-04 08:59:02', '2021-09-04 08:59:17', '2021-09-04 08:59:17'),
(244, 40, 3, 1, NULL, 100.00, 2322, 90.00, 22, 1, 1, '2021-09-04 08:59:17', '2021-09-04 08:59:40', '2021-09-04 08:59:40'),
(245, 40, 3, 1, NULL, 100.00, 2322, 90.00, 22, 1, 1, '2021-09-04 08:59:40', '2021-09-04 08:59:40', NULL),
(246, 40, 4, 1, NULL, 23.00, 22, 21.00, 2, 1, 1, '2021-09-04 08:59:40', '2021-09-04 08:59:40', NULL),
(247, 45, 1, 1, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(248, 45, 1, 2, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(249, 45, 1, 3, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(250, 45, 1, 4, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(251, 45, 1, 5, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:28:19', '2021-09-06 12:30:49', '2021-09-06 12:30:49'),
(252, 45, 1, 1, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(253, 45, 1, 2, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(254, 45, 1, 3, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(255, 45, 1, 4, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(256, 45, 1, 5, NULL, 12.00, 23, 32.00, 22, 1, 1, '2021-09-06 12:30:49', '2021-09-06 12:30:49', NULL),
(257, 54, 1, 3, NULL, 5.00, 5, 5.00, 5, 1, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(258, 54, 1, 4, NULL, 5.00, 5, 5.00, 5, 1, 1, '2021-09-06 13:25:26', '2021-09-06 13:25:26', NULL),
(259, 57, 1, 1, NULL, 1.00, 1, 1.00, 1, 1, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(260, 57, 1, 2, NULL, 1.00, 1, 1.00, 1, 1, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(261, 57, 1, 3, NULL, 1.00, 1, 1.00, 1, 1, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(262, 57, 1, 4, NULL, 1.00, 1, 1.00, 1, 1, 1, '2021-09-07 09:18:39', '2021-09-07 09:18:39', NULL),
(263, 58, 1, 1, NULL, 2.00, 2, 2.00, 2, 1, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(264, 58, 1, 2, NULL, 2.00, 2, 2.00, 2, 1, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(265, 58, 1, 3, NULL, 2.00, 2, 2.00, 2, 1, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(266, 58, 1, 4, NULL, 2.00, 2, 2.00, 2, 1, 1, '2021-09-07 09:21:11', '2021-09-07 09:21:11', NULL),
(267, 59, 1, 1, NULL, 4.00, 4, 4.00, 4, 1, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(268, 59, 1, 2, NULL, 4.00, 4, 4.00, 4, 1, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(269, 59, 1, 3, NULL, 4.00, 4, 4.00, 4, 1, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(270, 59, 1, 4, NULL, 4.00, 4, 4.00, 4, 1, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL),
(271, 59, 1, 5, NULL, 4.00, 4, 4.00, 4, 1, 1, '2021-09-07 09:23:52', '2021-09-07 09:23:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'S', '36', 1, NULL, '2021-08-02 13:28:29', NULL),
(2, 'M', '38', 1, NULL, '2021-08-02 13:28:19', NULL),
(3, 'L', '40', 1, NULL, '2021-08-02 13:28:09', NULL),
(4, 'XL', '42', 1, NULL, NULL, NULL),
(5, 'XXL', '44', 1, NULL, '2021-08-02 13:27:58', NULL),
(6, 'Free', '2.5', 1, '2021-09-04 13:31:46', '2021-09-04 13:31:46', NULL),
(7, 'XXXL', '46', 1, '2021-09-04 13:32:30', '2021-09-04 13:32:30', NULL),
(8, 'XS', '34', 1, '2021-09-04 13:32:52', '2021-09-04 13:33:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `url`, `image`, `video`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'slider', 'sdvsvs', 'sdvdbd', '22f9b500001ba778dd52a0a2eb18d79e.jpg', NULL, 1, '2021-07-30 15:25:46', '2021-07-30 15:26:47', '2021-07-30 15:26:47'),
(2, 'About', 'sdvdfbdb', 'dfgffjhmhffggghjgh', 'f8d610fc50c1f91cfc38b0050e61cebd.jpg', NULL, 1, '2021-07-30 15:26:27', '2021-07-30 15:26:41', '2021-07-30 15:26:41'),
(3, 'slider', 'dfbdgb gf', 'dfgvdbd', '6cb23f07d6cf9103e4b7433265060345.jpg', NULL, 1, '2021-07-30 15:27:42', '2021-07-30 15:27:42', NULL),
(4, 'slider2', 'sfvsfvf', 'sddvsfv', 'f6f9df801ef0140569c3f9c3e8337c38.jpg', NULL, 1, '2021-07-30 15:28:07', '2021-07-30 17:12:32', '2021-07-30 17:12:32'),
(5, 'slider', 'bgfn', 'dffbgn', '98d3fb3091dbd230e49aa1b5570cc22e.jpg', NULL, 1, '2021-07-30 17:12:57', '2021-07-30 17:12:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_profile_types`
--

CREATE TABLE `social_profile_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_profile_types`
--

INSERT INTO `social_profile_types` (`id`, `name`, `logo`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FaceBook', '442681b4664f5a7704ef2ab2394e755b.jpg', 1, '2021-07-30 15:28:55', '2021-07-30 15:28:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person_designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_pin_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `pin_codes` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `contact_person_name`, `contact_person_number`, `contact_person_designation`, `address`, `store_pin_code`, `store_contact`, `open_time`, `close_time`, `pin_codes`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Delhi', 'Ajay', '1234567897', 'dev', 'lkoc', '226006', '5678756456', '14:02:34', '13:02:37', 'dscsd', 1, '2021-07-30 15:32:46', '2021-07-30 15:32:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `full_name`, `city`, `image`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'testimonial', 'Lucknow', '4f8f660f3f55a4222154eebceaa21e3c.jpg', 'cbcbn', 1, '2021-07-30 15:31:50', '2021-07-30 15:31:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$okrWpBiMZv6bZC7tEOafruhgGZcCJHvNu0leDixVJMalcNL5prOoC', 'M4V071QDh8kPXnVMvSA2XYjSQJ30nbdNN2jAOz21hCcimOcJj0oWvVCZqSwy', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_social_profiles`
--

CREATE TABLE `user_social_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `social_profile_type_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 - Active / 0 - Inactive; Default - 1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_social_profiles`
--

INSERT INTO `user_social_profiles` (`id`, `user_id`, `social_profile_type_id`, `url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'ddbfbdfn', 1, '2021-07-30 15:29:30', '2021-07-30 15:29:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_name_unique` (`name`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_fk_4310837` (`attribute_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_value_unique` (`value`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_fk_4377351` (`customer_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_4310732` (`category_id`);

--
-- Indexes for table `map_attributes`
--
ALTER TABLE `map_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
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
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `role_id_fk_4310712` (`role_id`),
  ADD KEY `permission_id_fk_4310712` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_code_unique` (`sku_code`),
  ADD KEY `user_fk_4311814` (`user_id`),
  ADD KEY `category_fk_4311812` (`category_id`),
  ADD KEY `sub_category_fk_4311813` (`sub_category_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk_4313310` (`product_id`),
  ADD KEY `attribute_fk_4313311` (`attribute_id`),
  ADD KEY `attribute_value_fk_4313312` (`attribute_value_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk_4312073` (`product_id`),
  ADD KEY `color_fk_4312074` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_fk_4312082` (`status`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_fk_4312086` (`product_color_id`),
  ADD KEY `size_fk_4312078` (`size_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_fk_4313123` (`product_id`),
  ADD KEY `color_fk_4313487` (`color_id`),
  ADD KEY `size_fk_4313951` (`size_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `user_id_fk_4310721` (`user_id`),
  ADD KEY `role_id_fk_4310721` (`role_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_value_unique` (`value`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_profile_types`
--
ALTER TABLE `social_profile_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_social_profiles`
--
ALTER TABLE `user_social_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_4414593` (`user_id`),
  ADD KEY `social_profile_type_fk_4414594` (`social_profile_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map_attributes`
--
ALTER TABLE `map_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_profile_types`
--
ALTER TABLE `social_profile_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_social_profiles`
--
ALTER TABLE `user_social_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_fk_4310837` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`);

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `customer_fk_4377351` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD CONSTRAINT `category_fk_4310732` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id_fk_4310712` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_id_fk_4310712` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_fk_4311812` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `sub_category_fk_4311813` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `user_fk_4311814` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `attribute_fk_4313311` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `attribute_value_fk_4313312` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`),
  ADD CONSTRAINT `product_fk_4313310` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `color_fk_4312074` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_fk_4312073` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_color_fk_4312082` FOREIGN KEY (`status`) REFERENCES `product_colors` (`id`);

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_color_fk_4312086` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `size_fk_4312078` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `color_fk_4313487` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_fk_4313123` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `size_fk_4313951` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk_4310721` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_4310721` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_social_profiles`
--
ALTER TABLE `user_social_profiles`
  ADD CONSTRAINT `social_profile_type_fk_4414594` FOREIGN KEY (`social_profile_type_id`) REFERENCES `social_profile_types` (`id`),
  ADD CONSTRAINT `user_fk_4414593` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
