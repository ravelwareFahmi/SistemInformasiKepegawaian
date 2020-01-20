-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 03:25 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informasikepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2020_01_06_060956_create_pegawai_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('fahmiyuda31@gmail.com', '$2y$10$WeoISYlejpW7hvEpMkGSV.FaGSh5lI3X2940OYSJd06aFqBedaHw.', '2020-01-16 02:28:56'),
('fahmiyuda28@gmail.com', '$2y$10$OFImZVUn6neHKV//Qeh.Wuml0zGEdwZO7Vso2rulanEKlWvd1iiVy', '2020-01-17 08:59:27'),
('admin@gmail.com', '$2y$10$k5i6ehXWco3UhJh/nR3sw.ajfQkxcE4zblwZWflGwZgDUbh1NyFlq', '2020-01-19 07:44:23'),
('yuda@gmail.com', '$2y$10$fLLlvVBtfV2flh5iqZ6b6uCC2pDAykUtUJo0t8occr4rxpTZoTTGy', '2020-01-19 18:58:01'),
('fauzi@gmail.com', '$2y$10$ekN2VqFrTCTcGdWxoui3RuG74rgbiC4mVt5PNaZQ7iivM8GRMJpXK', '2020-01-19 18:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `devisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `sts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `nik`, `nama`, `jenis_kelamin`, `devisi`, `departement`, `tgl_masuk`, `sts`, `alamat`, `created_at`, `updated_at`) VALUES
(1933, 70, '3213100908975200', 'fahmiyuda', 'Laki-laki', 'Desaigner', 'IT', '2020-01-31', 'Tetap', 'Bandung', '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(1934, 71, '3214100908976300', 'Yuda', 'Laki-laki', 'Akuntan', 'Office', '2015-01-31', 'tetap', 'karawang', '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(1935, 72, '3215100908977400', 'Fauzi', 'Perempuan', 'Programer', 'IT', '2020-01-31', 'Kontrak', 'Karwang', '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(1936, 73, '3216100908978500', 'Sintia Agustin', 'Perempuan', 'Akuntan', 'Office', '2013-01-31', 'tetap', 'Bekasi', '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(1937, 74, '3217100908979600', 'Agustin', 'Perempuan', 'Akuntan', 'Office', '2020-01-01', 'Kontrak', 'Jakarta', '2020-01-19 19:17:38', '2020-01-19 19:17:38'),
(1938, 75, '3217100908979710', 'Lina Agustin', 'Perempuan', 'Akuntan', 'Office', '2013-01-31', 'tetap', 'Jakarta', '2020-01-19 19:17:38', '2020-01-19 19:17:38'),
(1939, 76, '3217100908972980', 'dea', 'Perempuan', 'programer', 'IT', '2019-01-31', 'kontrak', 'jakarta', '2020-01-19 19:17:38', '2020-01-19 19:17:38'),
(1940, 77, '3217100908972180', 'Mahmud', 'Laki-laki', 'programer', 'IT', '2019-01-31', 'kontrak', 'karawang', '2020-01-19 19:17:38', '2020-01-19 19:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(55, 'admin', 'fahmiyuda', 'fahmiyuda28@gmail.com', NULL, '$2y$10$1y.8n2nuN.cygEVPtViqn.x4adSQGBHVY25CqcFeR2AY1ihL5TCD2', 'VLBbpLd5rkX1i7YWbtWgdcHl3T6JhqDKa6XPkgupx3tUAddp8S3BpA9quG9E', '2020-01-16 19:42:18', '2020-01-19 07:09:12'),
(70, 'pegawai', 'fahmiyuda', 'fahmiyuda31@gmail.com', NULL, '$2y$10$xvjNUbKJ5lfU0N/T1VZZUef/wvDmy.bNAVmnNzzmW00ZeJHRJwYuu', NULL, '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(71, 'pegawai', 'Yuda', 'yuda@gmail.com', NULL, '$2y$10$XEOTuWIefJKLTbqsIbExlu6Ndq8wbtW3TbDqKg8cs41nMi1cdhxQ6', NULL, '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(72, 'pegawai', 'Fauzi', 'fauzi@gmail.com', NULL, '$2y$10$onqGg/Ej9jUyvRJ0wi/Lju18DPqEJmLwmbr7ILeuyQyiOrXV.3kvq', NULL, '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(73, 'pegawai', 'Sintia Agustin', 'sintia@gmail.com', NULL, '$2y$10$P6tYbCXLAj2ZC.Hd/5DS9O8V7htTlDWyDF1YVfjvSHvqibIpWlk0i', NULL, '2020-01-19 19:17:37', '2020-01-19 19:17:37'),
(74, 'pegawai', 'Agustin', 'agustin@gmail.com', NULL, '$2y$10$TkbJE/rDLnuWFixI7AKfseJUkx2wXrchfKB0tlT1Cnr24Q/1RI.4G', NULL, '2020-01-19 19:17:38', '2020-01-19 19:17:38'),
(75, 'pegawai', 'Lina Agustin', 'linaagustin@gmail.com', NULL, '$2y$10$16PLYvoY3OmRwGRqbkWLi.UV6XLlbDdlEiM1MkBzJWU6P6dENvrAK', NULL, '2020-01-19 19:17:38', '2020-01-19 19:17:38'),
(76, 'pegawai', 'dea', 'dea@gmail.com', NULL, '$2y$10$r0PSiAj9Qe0/xI0AOzPRMeXEJ6Cwf67ggLmZyye.QKY/SWnsw6MEK', NULL, '2020-01-19 19:17:38', '2020-01-19 19:17:38'),
(77, 'pegawai', 'Mahmud', 'mahmud@gmail.com', NULL, '$2y$10$Pnl7Xc1iCbMXbU3xhmB6vecIuor2GNIirhV1pEz13TuU8pxcWCSja', NULL, '2020-01-19 19:17:38', '2020-01-19 19:17:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1941;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
