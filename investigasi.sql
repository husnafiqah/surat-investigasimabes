-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2024 at 04:57 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investigasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `buat_surat`
--

CREATE TABLE `buat_surat` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buat_surat`
--

INSERT INTO `buat_surat` (`id`, `created_at`, `updated_at`, `nomor_surat`, `tanggal_surat`, `tujuan`, `perihal`, `isi`, `file`) VALUES
(1, '2024-06-13 08:50:15', '2024-06-13 08:50:15', '2', '2024-06-13', 'afi', 'izin', 'qqtgrfgrsgs', ''),
(2, '2024-06-16 05:27:52', '2024-06-16 05:27:52', '3', '2024-06-16', 'HHH', 'HHH', 'fdsffffdddddddddddd', NULL),
(3, '2024-06-16 09:02:52', '2024-06-16 09:02:52', '33', '2024-06-04', 'dsd', 'sds', 'wdwdwdw', NULL),
(4, '2024-06-18 07:49:27', '2024-06-18 07:49:27', '3232', '2024-06-18', 'dd', 'dsds', 'Dalam rangka meningkatkan pengetahuan para siswa siswi SMAN 1 Ruangguru khususnya kelas XII. Maka, pada surat kali ini kami selaku badan pendidikan sekolah kami bermaksud mengadakan studi lapangan bagi siswa siswi baik IPS maupun IPA di luar sekolah. Adapun acara tersebut akan kami laksanakan pada:\r\n\r\n \r\n\r\nHari/tanggal : Sabtu, 13 Mei 2023\r\n\r\nPukul: 08.45 s.d 12.45\r\n\r\nTempat: Kebun Raya Bogor\r\n\r\nAcara: Penelitian Tumbuhan-tumbuhan Langka', NULL),
(5, '2024-06-21 19:22:25', '2024-06-21 19:22:25', '01.005/SMA-SM/VI/2024', '2024-06-22', 'ss', 'sss', 'safd', NULL),
(6, '2024-06-22 08:02:41', '2024-06-22 08:02:41', '01.006/IM/VI/2024', '2024-06-22', 'sistem informasi', 'kerjasama', 'halooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(7, '2024-06-22 08:03:41', '2024-06-22 08:03:41', '01.007/IM/VI/2024', '2024-06-22', 'sistem informasi', 'kerjasama', 'halooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(8, '2024-06-22 08:04:05', '2024-06-22 08:04:05', '01.008/IM/VI/2024', '2024-06-22', 'sistem informasi', 'kerjasama', 'halooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(9, '2024-06-22 08:04:29', '2024-06-22 08:04:29', '01.009/IM/VI/2024', '2024-06-22', 'sistem informasi', 'kerjasama', 'halooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(10, '2024-06-22 08:09:59', '2024-06-22 08:09:59', '01.010/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'haloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(11, '2024-06-22 08:10:37', '2024-06-22 08:10:37', '01.011/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'haloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(12, '2024-06-22 08:16:38', '2024-06-22 08:16:38', '01.012/IM/VI/2024', '2024-06-22', 'sekdep', 'HHH', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', NULL),
(13, '2024-06-22 08:17:33', '2024-06-22 08:17:33', '01.013/IM/VI/2024', '2024-06-22', 'sekdep', 'HHH', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', NULL),
(14, '2024-06-22 08:17:46', '2024-06-22 08:17:46', '01.014/IM/VI/2024', '2024-06-22', 'sekdep', 'HHH', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', NULL),
(15, '2024-06-22 08:30:45', '2024-06-22 08:30:45', '01.015/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(16, '2024-06-22 08:31:34', '2024-06-22 08:31:34', '01.016/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(17, '2024-06-22 08:32:10', '2024-06-22 08:32:10', '01.017/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(18, '2024-06-22 08:32:22', '2024-06-22 08:32:22', '01.018/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(19, '2024-06-22 08:33:25', '2024-06-22 08:33:25', '01.019/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL),
(20, '2024-06-22 08:33:57', '2024-06-22 08:33:57', '01.020/IM/VI/2024', '2024-06-22', 'sekdep', 'izin', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surat_masuk_id` bigint UNSIGNED NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_waktu` date NOT NULL,
  `sifat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `created_at`, `updated_at`, `surat_masuk_id`, `tujuan`, `isi`, `batas_waktu`, `sifat`) VALUES
(11, '2024-06-23 09:47:25', '2024-06-23 09:47:25', 4, 'sekdep', 'p', '2024-06-23', 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(6, '2024_04_13_080343_add_jabatan_to_users_table', 2),
(7, '2024_04_13_082358_add_jabatan_to_users_table', 3),
(8, '2024_04_13_135854_create_surat_masuks_table', 4),
(9, '2024_05_02_135857_add_file_to_surat_masuks_table', 5),
(10, '2024_05_02_140621_create_surat_keluar_table', 6),
(11, '2024_06_13_150604_create_buat_surat_table', 7),
(12, '2024_06_13_153343_create_buat_surats_table', 8),
(13, '2024_06_16_095347_add_file_to_buat_surat_table', 9),
(14, '2024_06_22_152056_create_disposisi_table', 9);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor_surat`, `tanggal_surat`, `pengirim`, `tujuan`, `perihal`, `keterangan`, `file`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1400', '2024-05-31', 'unand', 'sekdep', 'blbl', 'halo', NULL, 4, '2024-05-30 20:04:50', '2024-05-30 20:04:50'),
(2, '13', '2024-06-07', 'Ilham', 'Husna', 'surat izin', 'hhhhhhhhhhhhhhhhhhaisdioqiohoiwhfowhfiwohwoihhwoir', NULL, 4, '2024-06-06 20:25:47', '2024-06-06 20:25:47'),
(3, '14', '2024-06-07', 'coba', 'coba', 'izin', 'gwgjeorokfeopkfepr', NULL, 4, '2024-06-06 20:42:54', '2024-06-06 20:42:54'),
(5, '232', '2024-06-16', 'Sekretaris', 'Semen Padang', 'kerjasama', 'tes', NULL, 4, '2024-06-16 07:33:56', '2024-06-16 07:33:56'),
(6, '23/Ffe', '2024-06-16', 'kami', 'balai', 'kerjasamass', 'tes', 'surat_keluar/UA6zH8Mjv27CYKqD0x2cU1w79e2YOnzrvxuxfdw8.pdf', 4, '2024-06-16 07:44:55', '2024-06-16 08:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuks`
--

CREATE TABLE `surat_masuks` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuks`
--

INSERT INTO `surat_masuks` (`id`, `nomor_surat`, `tanggal_surat`, `tanggal_diterima`, `pengirim`, `perihal`, `keterangan`, `status`, `user_id`, `created_at`, `updated_at`, `file`) VALUES
(4, '12/fefef', '2024-06-18', '2024-06-23', 'admin', 'kerjasama', NULL, 'terdisposisi', 4, '2024-06-23 03:50:14', '2024-06-23 09:47:25', 'surat_masuks/tE3XJEFSe9hBp1LW4A0sw9bVj8IBEqmp49UkJxbK.pdf'),
(5, '12/SI/21/24', '2024-06-23', '2024-06-26', 'unand', 'kerjasama', NULL, 'Menunggu', 4, '2024-06-23 03:56:32', '2024-06-23 03:56:32', 'surat_masuks/utVum8ZsCtJ4trVIoxQ9zMkAR9mF9DLw6AK79xL9.docx'),
(6, '12/SI/21/23', '2024-06-23', '2024-06-23', 'unand', 'kerjasama', 'T', 'Menunggu', 4, '2024-06-23 03:56:58', '2024-06-23 03:56:58', 'surat_masuks/V3q0rTnx80hcFCV04CoEtXtOkNs4o6lkG95WKtL0.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `jabatan`) VALUES
(2, 'Putra Ilham', 'putrailham@gmail.com', NULL, '$2y$12$4D9lInH3B9YEF/6vX6jyneKTKGuukxbfzjrzvHQ//KXnzW/Qsw4Fq', 0, NULL, '2024-04-04 09:44:59', '2024-05-18 07:22:54', 'sekretaris bidang'),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$12$WMx5F.pa18pZrF0LPjWuven3XRWI.IAKgUSXgd/dHZr8oQUkIC0l2', 1, NULL, '2024-04-06 00:34:59', '2024-04-06 00:34:59', 'sekretaris'),
(5, 'kepala', 'kepala@gmail.com', NULL, '$2y$12$yRLQ2DfOzxpE0XWFjZzqBOQKUhesSJKipcj18HBvhk6LUolzd2UEq', 2, NULL, '2024-04-06 00:36:22', '2024-06-13 20:41:28', 'Kepala Investigasi'),
(6, 'sekbid', 'sekbid@gmail.com', NULL, '$2y$12$FN7u697eSLqrtlmLt4ozN.VbOVpH3C4M/0eOpO9EyduvgscW6sqBO', 0, NULL, '2024-04-06 00:37:03', '2024-06-13 20:41:39', 'Sekre'),
(15, 'husna', 'husna@gmail.com', NULL, '$2y$12$Wq.JoM1Qh6zIM42J4EIE1.l5hpTeZnsJmdOOGyDJlnu/OkDkZ.fNq', 2, NULL, '2024-04-26 22:14:26', '2024-04-26 22:14:26', 'kepala'),
(16, 'ilham', 'ilham@gmail.com', NULL, '$2y$12$i/bX0rw5MvP2rSynPKqkBO6lvUw8/rqiE9HWC0PnFDaoanH.Rqizu', 0, NULL, '2024-06-13 21:07:28', '2024-06-13 21:07:28', 'sekbid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buat_surat`
--
ALTER TABLE `buat_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisi_surat_masuk_id_foreign` (`surat_masuk_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_keluar_user_id_foreign` (`user_id`);

--
-- Indexes for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_masuks_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `buat_surat`
--
ALTER TABLE `buat_surat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_surat_masuk_id_foreign` FOREIGN KEY (`surat_masuk_id`) REFERENCES `surat_masuks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD CONSTRAINT `surat_masuks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
