-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 02:42 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychain_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sponser_id` bigint(20) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnt_id` int(11) DEFAULT NULL,
  `mobile` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','Deleted','Unverified','Deactivated') COLLATE utf8mb4_unicode_ci DEFAULT 'Unverified',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sponser_id`, `name`, `email`, `cnt_id`, `mobile`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, NULL, 'KhanaKhalo', 'nikitda@gmail.com', NULL, '####7309589697', '$2y$10$g73v/Gc.NDrkcllgu0FNK.QoDfTIVlRWxlTElXHbEkAak/bIFjSmK', 'Active', NULL, '2023-09-06 06:01:03', '2023-09-06 06:38:26'),
(6, NULL, 'sameer', 'sameer@gmail.com', NULL, '####7309589691', '$2y$10$XdSBJl6/3UCq0uDCxi.dcOswYOXl7Nobuv7cHqX8U9bgR3qzlNP6e', 'Active', NULL, '2023-09-06 07:08:30', '2023-09-06 07:09:46'),
(7, 10001, 'Mayank', 'mukkaram07866@gmail.com', NULL, '####7309589691', '$2y$10$wLEIpL6OxoABg309DR6peOQyfpZoJimhkd.6jl/4CffxIX8iYm4g2', 'Active', NULL, '2023-09-07 05:12:54', '2023-09-07 05:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_otp`
--

CREATE TABLE `user_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_otp`
--

INSERT INTO `user_otp` (`id`, `user_id`, `otp`, `expire_at`, `created_at`, `updated_at`) VALUES
(4, 5, '562671', '2023-09-06 06:03:03', '2023-09-06 06:01:03', '2023-09-06 06:01:03'),
(5, 5, '263832', '2023-09-06 06:36:15', '2023-09-06 06:36:02', '2023-09-06 06:36:15'),
(6, 5, '779235', '2023-09-06 06:38:26', '2023-09-06 06:38:18', '2023-09-06 06:38:26'),
(7, 6, '511151', '2023-09-06 07:09:46', '2023-09-06 07:08:30', '2023-09-06 07:09:46'),
(8, 7, '129499', '2023-09-07 05:13:34', '2023-09-07 05:13:01', '2023-09-07 05:13:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otp`
--
ALTER TABLE `user_otp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_otp`
--
ALTER TABLE `user_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
