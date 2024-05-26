-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 12:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kppm_pinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(255) NOT NULL,
  `no_head_citizen` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `name`, `no_head_citizen`, `created_at`, `updated_at`) VALUES
(12, 'Marketing and Sales', 9, '2023-07-07 06:49:27', '2023-08-01 00:05:45'),
(16, 'Produksi', 0, '2023-07-23 19:40:49', '2023-07-23 19:40:49'),
(18, 'Bisnis regional', 10, '2023-07-23 21:24:11', '2023-09-02 05:50:55'),
(19, 'IT Support', 2, '2023-07-24 21:33:07', '2023-07-24 21:33:07'),
(24, 'Admin', 1, '2023-09-02 06:11:46', '2023-09-05 01:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` text NOT NULL,
  `unit` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `item_name`, `unit`, `created_at`, `updated_at`) VALUES
(11, 'Kertas HVS', 'lembar', '2023-05-18 00:26:22', '2023-08-31 22:04:20'),
(12, 'Pulpen gel', 'buah', '2023-05-30 05:05:20', '2023-08-31 22:04:41'),
(13, 'Pensil', 'buah', '2023-05-30 05:05:40', '2023-07-07 06:47:29'),
(14, 'Double Tape', 'buah', '2023-05-30 05:05:59', '2023-07-07 06:47:18'),
(17, 'Kertas A4', 'lembar', '2023-08-31 22:04:30', '2023-08-31 22:04:30'),
(18, 'Pulpen standar', 'buah', '2023-08-31 22:05:27', '2023-08-31 22:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `item_request_need`
--

CREATE TABLE `item_request_need` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `place_code` char(255) NOT NULL,
  `tujuan` text NOT NULL,
  `description` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` char(255) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_request_need`
--

INSERT INTO `item_request_need` (`id`, `user_id`, `divisi_id`, `item_id`, `place_code`, `tujuan`, `description`, `number`, `status`, `images`, `created_at`, `updated_at`) VALUES
(17, 5, 12, 13, '0', '', 'nulis', 35, 'done', NULL, '2023-07-10 20:12:03', '2023-07-23 21:02:55'),
(18, 5, 12, 11, '0', '', 'print dokumen', 90, 'done', NULL, '2023-07-23 20:23:16', '2023-07-26 18:39:45'),
(51, 5, 16, 11, '0', 'stok print', 'kertas gambar', 90, 'Done', NULL, '2023-08-31 21:54:03', '2023-08-31 22:02:23'),
(55, 5, 16, 13, '0', 'menulis', '2B fabercastel', 3, 'Done', NULL, '2023-09-02 09:09:30', '2023-09-05 01:52:42'),
(62, 5, 24, 11, '0', 'print', 'sinarmas', 50, 'Done', '1693904128_Rectangle 1.png', '2023-09-05 01:54:38', '2023-09-05 01:55:28'),
(63, 9, 19, 11, '0', 'print', 'sinarmas', 50, 'Done', '1693904798_Rectangle 2.jpg', '2023-09-05 02:05:04', '2023-09-05 02:06:38'),
(64, 5, 24, 11, '0', 'ppp', 'pppp', 50, 'Done', NULL, '2023-09-05 02:09:18', '2023-09-05 02:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `place_code` char(255) NOT NULL,
  `description` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`id`, `user_id`, `divisi_id`, `item_id`, `place_code`, `description`, `number`, `created_at`, `updated_at`) VALUES
(9, 5, NULL, 11, '0', 'sinarmas', 300, '2023-07-23 20:37:11', '2023-09-05 02:09:47'),
(10, 5, NULL, 13, '0', '2B', 697, '2023-07-23 20:38:17', '2023-09-05 01:52:42'),
(14, 5, NULL, 14, '0', 'kenko', 1, '2023-08-01 00:13:47', '2023-08-08 18:35:47'),
(16, 5, NULL, 12, '0', '-', 70, '2023-08-09 21:20:57', '2023-08-09 21:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `market_maping`
--

CREATE TABLE `market_maping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `place_code` char(255) NOT NULL,
  `title` char(255) NOT NULL,
  `description` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_04_05_121048_create_provinsi_table', 1),
(7, '2023_04_05_121607_create__food__category_table', 1),
(8, '2023_04_05_122130_create_kota_table', 1),
(9, '2023_04_05_122239_create_kecamatan_table', 1),
(10, '2023_04_05_122322_create_market_maping_table', 1),
(11, '2023_04_05_122836_create_food_production_table', 1),
(12, '2023_04_05_122933_create_agri_maping_table', 1),
(13, '2023_04_05_123021_create_food_request_need_table', 1),
(14, '2023_04_05_123244_create_non_food_production_table', 1),
(15, '2023_08_22_121059_create_images_table', 2),
(18, '2023_08_31_150636_add_images_to_item_request_need_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `non_item_production`
--

CREATE TABLE `non_item_production` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `place_code` char(255) NOT NULL,
  `title` char(255) NOT NULL,
  `description` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `status` char(255) NOT NULL,
  `request_category` char(255) NOT NULL,
  `supported_document` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `divisi` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` char(255) NOT NULL,
  `profile_picture` char(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `divisi`, `email`, `email_verified_at`, `password`, `role`, `profile_picture`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Sekretaris Perusahaan', 12, 'sekre@pindad.co.id', NULL, '$2y$10$D56yKFCrRoXXJkLYjI.ysuKlbGXD89Go7eHV.N58UPLOkw78Xyev.', 'user', NULL, NULL, NULL, '2023-04-10 05:54:44', '2023-07-06 23:42:31'),
(5, 'Admin', 24, 'admin@admin.com', NULL, '$2y$10$RelmWFBwv932yzFFfXp9Ke7BZhJpR5A9IniJY6dUSarCl7fKTYfl6', 'admin', NULL, NULL, NULL, '2023-05-18 00:05:36', '2023-09-02 06:12:56'),
(9, 'yaya', 19, 'yaya@gmail.com', NULL, '$2y$10$aOPLcWansofu9nNaelIToualTFg4PVMBj9mQlkJAYXTmbMkZMJoUK', 'user', 'nen', 'status', NULL, '2023-07-07 01:39:15', '2023-09-05 00:17:23'),
(18, 'Aprilita', 19, 'aprilitafh@gmail.com', NULL, '$2y$10$4atwHQxT0Lf915Zotp6/gOnyojPdy3fZYI7jANhk8XiCKROhFKELG', 'user', 'nen', 'status', NULL, '2023-08-15 00:34:27', '2023-08-15 00:34:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_request_need`
--
ALTER TABLE `item_request_need`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_request_need_user_id_foreign` (`user_id`),
  ADD KEY `food_request_need_kecamatan_id_foreign` (`divisi_id`),
  ADD KEY `food_request_need_food_id_foreign` (`item_id`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_production_user_id_foreign` (`user_id`),
  ADD KEY `food_production_kecamatan_id_foreign` (`divisi_id`),
  ADD KEY `food_production_food_id_foreign` (`item_id`);

--
-- Indexes for table `market_maping`
--
ALTER TABLE `market_maping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `market_maping_kecamatan_id_foreign` (`kecamatan_id`),
  ADD KEY `market_maping_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_item_production`
--
ALTER TABLE `non_item_production`
  ADD PRIMARY KEY (`id`),
  ADD KEY `non_food_production_user_id_foreign` (`user_id`),
  ADD KEY `non_food_production_kecamatan_id_foreign` (`kecamatan_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `item_request_need`
--
ALTER TABLE `item_request_need`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `market_maping`
--
ALTER TABLE `market_maping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `non_item_production`
--
ALTER TABLE `non_item_production`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `request_id` FOREIGN KEY (`request_id`) REFERENCES `item_request_need` (`id`);

--
-- Constraints for table `item_request_need`
--
ALTER TABLE `item_request_need`
  ADD CONSTRAINT `food_request_need_food_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `food_request_need_kecamatan_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `food_request_need_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD CONSTRAINT `food_production_food_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `food_production_kecamatan_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `food_production_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `market_maping`
--
ALTER TABLE `market_maping`
  ADD CONSTRAINT `market_maping_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `market_maping_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `non_item_production`
--
ALTER TABLE `non_item_production`
  ADD CONSTRAINT `non_food_production_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `divisi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `non_food_production_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
