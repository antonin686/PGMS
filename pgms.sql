-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 06:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgms`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `api_key`, `created_at`, `updated_at`) VALUES
(1, 'ojaiodjai121313112', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vehicle', '2019-12-09 09:00:40', '2019-12-09 09:00:40'),
(2, 'Food', '2019-12-09 09:01:19', '2019-12-09 09:01:19'),
(3, 'Animal', '2019-12-09 09:01:38', '2019-12-09 09:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_id` bigint(20) NOT NULL,
  `l_id` bigint(20) NOT NULL,
  `a_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `u_id`, `l_id`, `a_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, '2019-12-10 09:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `g_id` bigint(20) NOT NULL,
  `i_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `g_id`, `i_id`, `created_at`, `updated_at`) VALUES
(41, 1, 1, '2019-12-10 11:23:36', '2019-12-10 11:23:36'),
(42, 1, 2, '2019-12-10 11:23:36', '2019-12-10 11:23:36'),
(43, 1, 4, '2019-12-10 11:23:36', '2019-12-10 11:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `imgs`
--

CREATE TABLE `imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCatagory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imgs`
--

INSERT INTO `imgs` (`id`, `title`, `desc`, `catagory`, `subCatagory`, `path`, `u_id`, `created_at`, `updated_at`) VALUES
(1, 'cyber truck', 'Image', '1', '1', 'uploads/1575992200.jpg', 1, '2019-12-09 12:29:47', '2019-12-10 09:36:40'),
(2, 'download.jpg', 'Image', '1', '1', 'uploads/157591618769901373.jpg', 1, '2019-12-09 12:29:47', '2019-12-09 12:29:47'),
(3, 'front-left-side-47.jpg', 'Image', '1', '1', 'uploads/1575976384377424753.jpg', 1, '2019-12-10 05:13:04', '2019-12-10 05:13:04'),
(4, 'boat-insurance-1-1-300x300.jpg', 'Image', '1', '2', 'uploads/15759769952082540521.jpg', 1, '2019-12-10 05:23:15', '2019-12-10 05:23:15'),
(5, 'eelex-6500-x-shore-electric-boat-plymouth-england-uk_sq-a-300x300.jpg', 'Image', '1', '2', 'uploads/1575976995851489739.jpg', 1, '2019-12-10 05:23:15', '2019-12-10 05:23:15'),
(6, 'images (1).jpg', 'Image', '3', '7', 'uploads/15759987911284291254.jpg', 1, '2019-12-10 11:26:31', '2019-12-10 11:26:31'),
(7, 'images.jpg', 'Image', '3', '7', 'uploads/15759987911785311856.jpg', 1, '2019-12-10 11:26:31', '2019-12-10 11:26:31'),
(8, 'images (2).jpg', 'Image', '3', '8', 'uploads/15759988011578762554.jpg', 1, '2019-12-10 11:26:41', '2019-12-10 11:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE `layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Regular', '2019-12-09 13:18:50', '2019-12-09 13:18:50'),
(2, 'Mosaic', '2019-12-09 13:19:05', '2019-12-09 13:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `layout_images`
--

CREATE TABLE `layout_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_id` bigint(20) NOT NULL,
  `i_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2019_12_03_120105_create_catagories_table', 1),
(3, '2019_12_03_120500_create_sub_catagories_table', 1),
(4, '2019_12_03_125603_create_layouts_table', 1),
(6, '2019_12_06_062449_create_imgs_table', 1),
(7, '2019_12_04_001926_create_layout_images_table', 2),
(9, '2019_12_09_195452_create_gallery_images_table', 4),
(10, '2019_12_09_183628_create_galleries_table', 5),
(11, '2019_12_10_063442_create_api_keys_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagories`
--

CREATE TABLE `sub_catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_catagories`
--

INSERT INTO `sub_catagories` (`id`, `name`, `c_id`, `created_at`, `updated_at`) VALUES
(1, 'Car', 1, '2019-12-09 09:02:46', '2019-12-09 09:02:46'),
(2, 'Boat', 1, '2019-12-09 09:03:12', '2019-12-09 09:03:12'),
(3, 'Truck', 1, '2019-12-09 09:03:28', '2019-12-09 09:03:28'),
(4, 'Burger', 2, '2019-12-09 09:04:05', '2019-12-09 09:04:05'),
(5, 'Pizza', 2, '2019-12-09 09:04:18', '2019-12-09 09:04:18'),
(6, 'Curry', 2, '2019-12-09 09:04:54', '2019-12-09 09:04:54'),
(7, 'Dog', 3, '2019-12-09 09:05:09', '2019-12-09 09:05:09'),
(8, 'Cat', 3, '2019-12-09 09:05:30', '2019-12-09 09:05:30'),
(9, 'Tiger', 3, '2019-12-09 09:05:47', '2019-12-09 09:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Antonin', 'anto', '123', '1', '2019-12-09 09:07:21', '2019-12-09 09:07:21'),
(2, 'Ani', 'ani', '123', '2', '2019-12-09 11:50:22', '2019-12-09 11:50:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouts`
--
ALTER TABLE `layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layout_images`
--
ALTER TABLE `layout_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_catagories`
--
ALTER TABLE `sub_catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layouts`
--
ALTER TABLE `layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layout_images`
--
ALTER TABLE `layout_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_catagories`
--
ALTER TABLE `sub_catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
