-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2021 at 07:19 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

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
-- Table structure for table `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint UNSIGNED NOT NULL,
  `jumlah_gaji` int NOT NULL COMMENT 'gaji_pokok + tunjangan_pasangan + tunjangan_anak + tunjangan_transport',
  `potongan` int NOT NULL COMMENT 'jumlah_gaji * 0.5%',
  `total_gaji` int NOT NULL COMMENT 'gaji_pokok + jumlah_gaji',
  `tanggal_gaji` date NOT NULL,
  `nip` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gajis`
--

INSERT INTO `gajis` (`id`, `jumlah_gaji`, `potongan`, `total_gaji`, `tanggal_gaji`, `nip`, `created_at`, `updated_at`) VALUES
(8, 2932000, 146600, 2785400, '2021-08-02', 1, '2021-08-11 23:45:37', '2021-08-11 23:45:37'),
(9, 3056000, 152800, 2903200, '2021-08-02', 3, '2021-08-11 23:45:44', '2021-08-11 23:45:44'),
(10, 1751850, 87593, 1664258, '2021-08-02', 4, '2021-08-11 23:45:59', '2021-08-11 23:45:59'),
(11, 2062000, 103100, 1958900, '2021-08-02', 5, '2021-08-11 23:46:08', '2021-08-11 23:46:18'),
(12, 2062000, 103100, 1958900, '2021-08-02', 6, '2021-08-11 23:46:33', '2021-08-11 23:46:33'),
(14, 2149200, 107460, 2041740, '2021-08-02', 8, '2021-08-11 23:47:41', '2021-08-11 23:47:41'),
(15, 3389120, 169456, 3219664, '2021-08-02', 9, '2021-08-11 23:47:48', '2021-08-11 23:47:48'),
(16, 2698880, 134944, 2563936, '2021-08-02', 10, '2021-08-11 23:47:56', '2021-08-11 23:47:56'),
(18, 3389120, 169456, 3219664, '2021-08-02', 12, '2021-08-11 23:49:16', '2021-08-11 23:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `golongans`
--

CREATE TABLE `golongans` (
  `id` bigint UNSIGNED NOT NULL,
  `id_golongan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` int NOT NULL,
  `tunjangan_pasangan` int NOT NULL COMMENT 'gaji_pokok * 5%',
  `tunjangan_anak` int NOT NULL COMMENT 'gaji_pokok * 2%',
  `tunjangan_transport` int NOT NULL COMMENT 'gaji_pokok * 1%',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongans`
--

INSERT INTO `golongans` (`id`, `id_golongan`, `gaji_pokok`, `tunjangan_pasangan`, `tunjangan_anak`, `tunjangan_transport`, `created_at`, `updated_at`) VALUES
(1, 'IA', 2335800, 1167900, 467160, 116790, NULL, NULL),
(2, 'IB', 2472900, 1236450, 494580, 247290, '2021-08-10 07:56:08', '2021-08-11 23:11:00'),
(4, 'IC', 2577500, 1288750, 515500, 257750, '2021-08-11 23:04:39', '2021-08-11 23:04:39'),
(5, 'ID', 2686500, 1343250, 537300, 268650, '2021-08-11 23:05:27', '2021-08-11 23:05:27'),
(6, 'IIA', 3373600, 1686800, 674720, 337360, '2021-08-11 23:05:54', '2021-08-11 23:05:54'),
(7, 'IIB', 3516300, 1758150, 703260, 351630, '2021-08-11 23:06:20', '2021-08-11 23:06:20'),
(8, 'IIC', 3665000, 1832500, 733000, 366500, '2021-08-11 23:06:42', '2021-08-11 23:06:42'),
(9, 'IID', 3820000, 1910000, 764000, 382000, '2021-08-11 23:07:19', '2021-08-11 23:07:19'),
(10, 'IIIA', 4236400, 2118200, 847280, 423640, '2021-08-11 23:07:39', '2021-08-11 23:07:39'),
(13, 'IIIB', 4415600, 2207800, 883120, 441560, '2021-08-11 23:51:55', '2021-08-11 23:51:55');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2021_08_10_071000_create_golongans_table', 1),
(17, '2021_08_10_071039_create_pegawais_table', 1),
(18, '2021_08_10_071112_create_gajis_table', 1),
(19, '2021_08_10_151335_add_tanggal_gaji_to_gajis_table', 2);

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
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_nikah` enum('belum nikah','nikah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_anak` int NOT NULL,
  `id_golongan` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `status_nikah`, `jumlah_anak`, `id_golongan`, `created_at`, `updated_at`) VALUES
(1, '197312242008011004', 'A Yuyun Junaedi', 'wanita', 'Sukabumi', '1973-12-24', '081326031086', 'Jl. Karapitan No.86', 'nikah', 0, 8, '2021-08-10 03:20:33', '2021-08-11 23:32:02'),
(3, '197207052008011003', 'Dadang Ahyar', 'pria', 'Sukabumi', '1972-07-05', '085486022871', 'Jl Cijerah 230', 'nikah', 2, 9, '2021-08-11 23:14:27', '2021-08-11 23:29:11'),
(4, '199606292018012002', 'Deti Sumiati', 'wanita', 'Balikpapan', '1996-06-29', '082695402468', 'Jl Kopo 373-A', 'belum nikah', 0, 1, '2021-08-11 23:18:07', '2021-08-11 23:18:07'),
(5, '198806132011012002', 'Dini Anggraeni Saputri Setiaji', 'wanita', 'Cirebon', '1988-06-13', '087413322883', 'Jl Ciremai Giri Bl E-VII/24', 'nikah', 1, 4, '2021-08-11 23:26:46', '2021-08-11 23:26:46'),
(6, '198502262010012001', 'Ela Hadiawati', 'wanita', 'Jambi', '1985-02-26', '081552208424', 'Jl Pekalangan 21', 'nikah', 2, 4, '2021-08-11 23:28:37', '2021-08-11 23:28:52'),
(8, '198203062005012009', 'Nia Kurniawati', 'wanita', 'Bandung', '1982-03-06', '087656233859', 'Jl Pekarungan', 'nikah', 2, 5, '2021-08-11 23:34:05', '2021-08-11 23:34:05'),
(9, '196410301994032007', 'Nining Setianingsih', 'wanita', 'Cirebon', '1964-10-30', '081906239455', 'Jl Tentara Pelajar 21', 'nikah', 2, 10, '2021-08-11 23:36:05', '2021-08-11 23:36:05'),
(10, '197709032007011005', 'Oleh Sudiana', 'pria', 'Bandung', '1977-09-03', '085837238764', 'Jl P Diponegoro 15', 'nikah', 1, 6, '2021-08-11 23:38:10', '2021-08-11 23:38:10'),
(12, '196204091983052002', 'Pipih Puspita', 'wanita', 'Semarang', '1962-04-09', '085486022871', 'Jl Pekalangan 21', 'nikah', 3, 10, '2021-08-11 23:43:07', '2021-08-11 23:43:07');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'dimas.10119285@mahasiswa.unikom.ac.id', NULL, '$2y$10$8zYwHS0kM3mgOXeGlwwwweSAE2eJw0OjgczLtjvpXYrULgV2ASNAm', NULL, '2021-08-10 03:18:29', '2021-08-10 03:18:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajis_nip_foreign` (`nip`);

--
-- Indexes for table `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawais_id_golongan_foreign` (`id_golongan`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gajis`
--
ALTER TABLE `gajis`
  ADD CONSTRAINT `gajis_nip_foreign` FOREIGN KEY (`nip`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_id_golongan_foreign` FOREIGN KEY (`id_golongan`) REFERENCES `golongans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
