-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 07:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `databukus`
--

CREATE TABLE `databukus` (
  `KodeBuku` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JudulBuku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TentangBuku` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` int(21) NOT NULL,
  `File` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `databukus`
--

INSERT INTO `databukus` (`KodeBuku`, `JudulBuku`, `TentangBuku`, `KodeKategori`, `Jumlah`, `File`, `Status`, `KodeUser`, `created_at`, `updated_at`) VALUES
('BOOK-001', 'Muantap 2', 'nakjwdn awda bajwbdjawbd dawsd dawda sdwa', 'KAT-003', 2, '1665249949_terkadang.jfif', 'OPN', '1', '2022-10-08 10:25:49', '2022-10-08 10:25:49'),
('BOOK-002', 'Muantapp', 'nakjwdn awda bajwbdjawbd dawsd dawda sdwa', 'KAT-002', 1, '1665250032_6132155693056132084.webp', 'OPN', '1', '2022-10-08 10:27:12', '2022-10-08 10:27:12'),
('BOOK-003', 'Mantap 3', 'akjwdnakjw nwnaw iuwhauid bwabaw', 'KAT-001', 2, '1665259165_6147907511384015813.webp', 'OPN', '1', '2022-10-08 12:59:25', '2022-10-08 12:59:25'),
('BOOK-004', 'Muantap 4', 'Hanya buku dongeng', 'KAT-003', 12, '1665285419_ELGATO.jfif', 'OPN', '1', '2022-10-08 20:16:59', '2022-10-08 20:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `datapinjamans`
--

CREATE TABLE `datapinjamans` (
  `KodePinjaman` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeBuku` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaLengkap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NomerTelepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AlamatLengkap` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WaktuPinjam` datetime NOT NULL,
  `WaktuKembalikan` datetime NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datapinjamans`
--

INSERT INTO `datapinjamans` (`KodePinjaman`, `KodeBuku`, `NamaLengkap`, `NomerTelepon`, `AlamatLengkap`, `WaktuPinjam`, `WaktuKembalikan`, `Status`, `KodeUser`, `created_at`, `updated_at`) VALUES
('PIN-001', 'BOOK-003', 'Kenthir', '123123', 'awdasdaw', '2022-10-09 03:00:00', '2022-10-09 03:00:00', 'OPN', '1', '2022-10-08 13:00:52', '2022-10-08 13:38:32'),
('PIN-002', 'BOOK-002', 'awdasdawdaw', '12312312', 'awdasdw', '2022-10-09 03:00:00', '2022-10-09 03:00:00', 'STA', '1', '2022-10-08 13:49:24', '2022-10-08 21:23:19'),
('PIN-003', 'BOOK-001', 'gatauh', '8123', 'awfawfawf', '2022-10-09 03:00:00', '2022-10-09 03:00:00', 'DEL', '1', '2022-10-08 13:49:49', '2022-10-08 13:50:09'),
('PIN-004', 'BOOK-003', 'userbiasa', '9812489124', 'awidjaiwjd', '2022-10-09 08:00:00', '2022-10-11 08:00:00', 'STA', '2', '2022-10-08 18:41:52', '2022-10-08 18:47:58'),
('PIN-005', 'BOOK-002', 'userbiasajuga', '192301', 'lakwmdlkamw', '2022-10-08 08:00:00', '2022-10-18 08:00:00', 'STA', '2', '2022-10-08 18:46:22', '2022-10-08 21:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `eventlogs`
--

CREATE TABLE `eventlogs` (
  `id` bigint(20) NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam` time NOT NULL,
  `Keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventlogs`
--

INSERT INTO `eventlogs` (`id`, `KodeUser`, `Tanggal`, `Jam`, `Keterangan`, `Tipe`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-10-08', '07:56:03', 'Tambah Kategori KAT-002', 'OPN', '2022-10-08 00:56:03', '2022-10-08 00:56:03'),
(2, '1', '2022-10-08', '08:14:32', 'Update Kategori KAT-001', 'OPN', '2022-10-08 01:14:32', '2022-10-08 01:14:32'),
(3, '1', '2022-10-08', '08:14:42', 'Update Kategori KAT-001', 'OPN', '2022-10-08 01:14:42', '2022-10-08 01:14:42'),
(4, '1', '2022-10-08', '08:16:16', 'Hapus kategori KAT-002', 'OPN', '2022-10-08 01:16:16', '2022-10-08 01:16:16'),
(5, '1', '2022-10-08', '09:43:54', 'Tambah buku BOOK-001', 'OPN', '2022-10-08 02:43:54', '2022-10-08 02:43:54'),
(6, '1', '2022-10-08', '11:08:38', 'Update properti ', 'OPN', '2022-10-08 04:08:38', '2022-10-08 04:08:38'),
(7, '1', '2022-10-08', '11:10:22', 'Update properti ', 'OPN', '2022-10-08 04:10:22', '2022-10-08 04:10:22'),
(8, '1', '2022-10-08', '11:10:33', 'Update properti ', 'OPN', '2022-10-08 04:10:33', '2022-10-08 04:10:33'),
(9, '1', '2022-10-08', '11:13:06', 'Hapus Data Buku BOOK-001', 'OPN', '2022-10-08 04:13:06', '2022-10-08 04:13:06'),
(10, '1', '2022-10-08', '12:14:16', 'Ubah data 2', 'OPN', '2022-10-08 05:14:16', '2022-10-08 05:14:16'),
(11, '1', '2022-10-08', '12:14:26', 'Ubah data 2', 'OPN', '2022-10-08 05:14:26', '2022-10-08 05:14:26'),
(12, '1', '2022-10-08', '12:15:26', 'Ubah data 2', 'OPN', '2022-10-08 05:15:26', '2022-10-08 05:15:26'),
(13, '1', '2022-10-08', '12:15:27', 'Ubah data 2', 'OPN', '2022-10-08 05:15:27', '2022-10-08 05:15:27'),
(14, '1', '2022-10-08', '12:41:19', 'Hapus User 2', 'OPN', '2022-10-08 05:41:19', '2022-10-08 05:41:19'),
(15, '1', '2022-10-08', '13:09:13', 'Hapus User 3', 'OPN', '2022-10-08 06:09:13', '2022-10-08 06:09:13'),
(16, '1', '2022-10-08', '16:36:03', 'Update properti ', 'OPN', '2022-10-08 09:36:03', '2022-10-08 09:36:03'),
(17, '1', '2022-10-08', '16:36:13', 'Update properti ', 'OPN', '2022-10-08 09:36:13', '2022-10-08 09:36:13'),
(18, '1', '2022-10-08', '16:54:07', 'Tambah Kategori KAT-003', 'OPN', '2022-10-08 09:54:07', '2022-10-08 09:54:07'),
(19, '1', '2022-10-08', '17:25:49', 'Tambah buku BOOK-001', 'OPN', '2022-10-08 10:25:49', '2022-10-08 10:25:49'),
(20, '1', '2022-10-08', '17:27:12', 'Tambah buku BOOK-002', 'OPN', '2022-10-08 10:27:12', '2022-10-08 10:27:12'),
(21, '1', '2022-10-08', '19:59:25', 'Tambah buku BOOK-003', 'OPN', '2022-10-08 12:59:25', '2022-10-08 12:59:25'),
(22, '1', '2022-10-08', '20:00:52', 'Tambah lelang ', 'OPN', '2022-10-08 13:00:52', '2022-10-08 13:00:52'),
(23, '1', '2022-10-08', '20:35:20', 'Menolak Peminjaman PIN-001', 'OPN', '2022-10-08 13:35:20', '2022-10-08 13:35:20'),
(24, '1', '2022-10-08', '20:35:48', 'Menolak Peminjaman PIN-001', 'OPN', '2022-10-08 13:35:48', '2022-10-08 13:35:48'),
(25, '1', '2022-10-08', '20:38:32', 'Menerima Peminjaman PIN-001', 'OPN', '2022-10-08 13:38:32', '2022-10-08 13:38:32'),
(26, '1', '2022-10-08', '20:49:24', 'Tambah lelang ', 'OPN', '2022-10-08 13:49:24', '2022-10-08 13:49:24'),
(27, '1', '2022-10-08', '20:49:49', 'Tambah lelang ', 'OPN', '2022-10-08 13:49:49', '2022-10-08 13:49:49'),
(28, '1', '2022-10-08', '20:50:06', 'Menerima Peminjaman PIN-002', 'OPN', '2022-10-08 13:50:06', '2022-10-08 13:50:06'),
(29, '1', '2022-10-08', '20:50:09', 'Menolak Peminjaman PIN-003', 'OPN', '2022-10-08 13:50:09', '2022-10-08 13:50:09'),
(30, '2', '2022-10-09', '01:41:52', 'Tambah lelang ', 'OPN', '2022-10-08 18:41:52', '2022-10-08 18:41:52'),
(31, '2', '2022-10-09', '01:46:22', 'Tambah lelang ', 'OPN', '2022-10-08 18:46:22', '2022-10-08 18:46:22'),
(32, '3', '2022-10-09', '01:47:58', 'Menerima Peminjaman PIN-004', 'OPN', '2022-10-08 18:47:58', '2022-10-08 18:47:58'),
(33, '3', '2022-10-09', '01:54:03', 'Menerima Peminjaman PIN-005', 'OPN', '2022-10-08 18:54:03', '2022-10-08 18:54:03'),
(34, '3', '2022-10-09', '01:55:59', 'Menerima Peminjaman PIN-005', 'OPN', '2022-10-08 18:55:59', '2022-10-08 18:55:59'),
(35, '1', '2022-10-09', '03:16:59', 'Tambah buku BOOK-004', 'OPN', '2022-10-08 20:16:59', '2022-10-08 20:16:59'),
(36, '1', '2022-10-09', '04:16:51', 'Menolak Peminjaman PIN-005', 'OPN', '2022-10-08 21:16:51', '2022-10-08 21:16:51'),
(37, '1', '2022-10-09', '04:20:00', 'Selesai Peminjaman PIN-005', 'OPN', '2022-10-08 21:20:00', '2022-10-08 21:20:00'),
(38, '1', '2022-10-09', '04:23:19', 'Selesai Peminjaman PIN-002', 'OPN', '2022-10-08 21:23:19', '2022-10-08 21:23:19'),
(39, '1', '2022-10-09', '04:54:55', 'Tambah Kategori KAT-004', 'OPN', '2022-10-08 21:54:55', '2022-10-08 21:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masterkategoris`
--

CREATE TABLE `masterkategoris` (
  `KodeKategori` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masterkategoris`
--

INSERT INTO `masterkategoris` (`KodeKategori`, `NamaKategori`, `Status`, `KodeUser`, `created_at`, `updated_at`) VALUES
('KAT-001', 'Novel', 'OPN', '1', '2022-10-08 00:51:58', '2022-10-08 01:14:42'),
('KAT-002', 'Cerita', 'OPN', '1', '2022-10-08 00:56:03', '2022-10-08 01:16:16'),
('KAT-003', 'Dongeng', 'OPN', '1', '2022-10-08 09:54:07', '2022-10-08 09:54:07'),
('KAT-004', 'Politik', 'OPN', '1', '2022-10-08 21:54:55', '2022-10-08 21:54:55');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'pegawai'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OPN',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roleId` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `roleId`) VALUES
(1, 'admin', 'admin@admin', NULL, '$2y$10$0aUl2cFjSM59tVo7oEenAOlLhoL/pczOTefGeIxemod4/Xc.wvRjW', 'OPN', NULL, '2022-10-07 21:48:51', '2022-10-07 21:48:51', 3),
(2, 'user', 'user@user', NULL, '$2y$10$NAyUAh9csOQk0w.IuWbJFen1kE6IaFc3CyLtB9HDRM6OLM617Ry3m', 'OPN', NULL, '2022-10-08 05:15:27', '2022-10-08 05:41:19', 1),
(3, 'pustakawan', 'pustaka@wan', NULL, '$2y$10$0wMC1HyN5JpDEqjGf59P8O9wJnSaypCsmriUJK0bHYpTjEF4ZSVVO', 'DEL', NULL, '2022-10-08 06:06:51', '2022-10-08 06:09:13', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databukus`
--
ALTER TABLE `databukus`
  ADD PRIMARY KEY (`KodeBuku`);

--
-- Indexes for table `datapinjamans`
--
ALTER TABLE `datapinjamans`
  ADD PRIMARY KEY (`KodePinjaman`);

--
-- Indexes for table `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `masterkategoris`
--
ALTER TABLE `masterkategoris`
  ADD PRIMARY KEY (`KodeKategori`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
