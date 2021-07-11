-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 11:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-ysi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `note` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `user_id`, `date`, `time_in`, `time_out`, `note`) VALUES
(1, 1, '2021-06-18', '14:21:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_relawan`
--

CREATE TABLE `absensi_relawan` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kehadiran` enum('Hadir','Izin','Sakit') NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `aktivitas` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_relawan`
--

INSERT INTO `absensi_relawan` (`id`, `user_id`, `tanggal`, `kehadiran`, `jam_masuk`, `jam_keluar`, `aktivitas`, `created_at`, `updated_at`) VALUES
(17, 12, '2021-06-27', 'Hadir', '13:00:00', '16:00:00', 'dongeng', '2021-06-26 10:58:53', '2021-06-26 10:58:53'),
(19, 12, '2021-06-28', 'Sakit', NULL, NULL, 'Isolasi Mandiri', '2021-06-27 10:17:53', '2021-06-29 08:29:50'),
(21, 12, '2021-06-28', 'Hadir', '10:00:00', '23:00:00', 'Kreativitas kerajinan tangan', '2021-06-28 08:54:38', '2021-06-29 08:24:40'),
(22, 14, '2021-06-27', 'Hadir', '14:00:00', '16:00:00', 'Musik tradisional', '2021-06-29 08:18:21', '2021-06-29 08:18:21'),
(23, 14, '2021-06-29', 'Hadir', '15:00:00', '16:30:00', 'Latihan musik tradisional', '2021-06-29 08:20:03', '2021-06-29 08:20:03'),
(24, 12, '2021-06-30', 'Hadir', '09:00:00', '11:30:00', 'Melatih seni kreativitas', '2021-06-30 06:55:02', '2021-06-30 06:55:02'),
(25, 12, '2021-06-29', 'Hadir', '21:00:00', '11:30:00', 'Seni Kreativitas bernyanyi', '2021-06-30 06:59:59', '2021-06-30 06:59:59'),
(26, 12, '2021-07-05', 'Hadir', '14:00:00', '15:00:00', 'kreativitas bernyanyi seni musik', '2021-07-04 10:33:30', '2021-07-04 10:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_alternatif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_alternatif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `kode_alternatif`, `nama_alternatif`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, 'P01', 'Andin Ananda', 'Calon Perawat', '2021-05-24 22:47:03', '2021-05-24 22:47:03'),
(12, 'P02', 'Rita Girtawan', 'Calon Perawat', '2021-06-03 03:30:56', '2021-06-03 03:30:56'),
(13, 'P03', 'Lita Kusumawati', 'Calon Perawat', '2021-06-08 23:20:29', '2021-06-08 23:20:29'),
(14, 'P04', 'Ida Farida', NULL, '2021-06-22 11:40:10', '2021-06-22 11:40:10'),
(15, 'P05', 'Dila Fadila Maharani', 'Calon Perawat', '2021-06-29 09:14:32', '2021-06-29 09:14:32'),
(16, 'P06', 'Afina', 'Calon Perawat', '2021-06-29 09:16:06', '2021-06-29 09:16:06'),
(25, 'P07', 'Clara Ifani', 'Calon Perawat', '2021-06-30 12:06:51', '2021-06-30 12:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `crip`
--

CREATE TABLE `crip` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED DEFAULT NULL,
  `nama_crip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_crip` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crip`
--

INSERT INTO `crip` (`id`, `kriteria_id`, `nama_crip`, `nilai_crip`, `created_at`, `updated_at`) VALUES
(2, 1, 'Sangat Kurang', 1, '2021-05-27 03:00:19', '2021-06-03 03:39:44'),
(20, 1, 'Kurang', 2, '2021-06-03 02:20:15', '2021-06-03 03:40:24'),
(21, 1, 'Baik', 4, '2021-06-03 03:41:32', '2021-06-03 03:41:32'),
(22, 1, 'Sangat Baik', 5, '2021-06-03 03:42:25', '2021-06-03 03:42:25'),
(23, 1, 'Cukup', 3, '2021-06-03 03:43:02', '2021-06-03 03:43:02'),
(24, 2, 'Sangat Kurang', 1, '2021-06-03 03:50:20', '2021-06-03 03:50:20'),
(25, 2, 'Kurang', 2, '2021-06-03 03:50:54', '2021-06-03 03:50:54'),
(26, 2, 'Cukup', 3, '2021-06-03 03:51:37', '2021-06-03 03:51:37'),
(27, 2, 'Baik', 4, '2021-06-03 03:52:33', '2021-06-03 03:52:33'),
(28, 2, 'Sangat Baik', 5, '2021-06-03 03:53:17', '2021-06-03 03:53:17'),
(30, 4, 'Kurang', 1, '2021-06-08 22:56:38', '2021-06-29 09:07:50'),
(31, 4, 'Cukup', 2, '2021-06-08 22:57:08', '2021-06-29 09:08:14'),
(32, 4, 'Baik', 3, '2021-06-08 22:57:47', '2021-06-29 09:08:35'),
(34, 5, 'Sangat Kurang', 1, '2021-06-08 23:00:10', '2021-06-08 23:00:10'),
(35, 5, 'Kurang', 2, '2021-06-08 23:00:45', '2021-06-08 23:00:45'),
(36, 5, 'Cukup', 3, '2021-06-08 23:01:18', '2021-06-08 23:01:18'),
(37, 5, 'Baik', 4, '2021-06-08 23:01:54', '2021-06-08 23:01:54'),
(38, 5, 'Sangat Baik', 5, '2021-06-08 23:02:30', '2021-06-08 23:02:30'),
(39, 6, 'Sangat Kurang', 1, '2021-06-08 23:03:13', '2021-06-08 23:03:13'),
(40, 6, 'Kurang', 2, '2021-06-08 23:04:07', '2021-06-08 23:04:07'),
(41, 6, 'Cukup', 3, '2021-06-08 23:04:37', '2021-06-08 23:04:37'),
(42, 6, 'Baik', 4, '2021-06-08 23:06:09', '2021-06-08 23:06:09'),
(43, 6, 'Sangat Baik', 5, '2021-06-08 23:06:44', '2021-06-08 23:06:44'),
(44, 7, 'Sangat Kurang', 1, '2021-06-08 23:08:39', '2021-06-08 23:08:39'),
(45, 7, 'Kurang', 2, '2021-06-08 23:09:25', '2021-06-08 23:09:25'),
(46, 7, 'Cukup', 3, '2021-06-08 23:10:21', '2021-06-08 23:10:21'),
(47, 7, 'Baik', 4, '2021-06-08 23:11:55', '2021-06-08 23:11:55'),
(48, 7, 'Sangat Baik', 5, '2021-06-08 23:12:29', '2021-06-08 23:12:29');

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
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `jadwal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `jadwal`, `jam_masuk`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(1, 'Shift 1 - Ruang Anyelir', '07:00:00', '14:00:00', '2021-05-21 21:28:15', '2021-06-03 12:55:19'),
(2, 'Shift 1 - Ruang Bromelia', '07:00:00', '14:00:00', '2021-05-21 23:33:13', '2021-06-03 12:57:04'),
(3, 'Shift 1 - Ruang Cempaka', '07:00:00', '14:00:00', '2021-06-03 11:14:14', '2021-06-03 12:57:56'),
(4, 'Shift 2 - Ruang Anyelir', '15:00:00', '22:00:00', '2021-06-03 12:56:22', '2021-06-03 12:58:41'),
(5, 'Shift 2 - Ruang Bromelia', '15:00:00', '22:00:00', '2021-06-03 12:59:21', '2021-06-03 12:59:21'),
(6, 'Shift 2 - Ruang Cempaka', '15:00:00', '22:00:00', '2021-06-03 13:00:41', '2021-06-03 13:00:41'),
(7, 'Shift 3 - Ruang Anyelir', '23:00:00', '06:00:00', '2021-06-03 13:02:20', '2021-06-03 13:02:20'),
(8, 'Shift 3 - Ruang Bromelia', '23:00:00', '06:00:00', '2021-06-03 13:03:43', '2021-06-03 13:03:43'),
(9, 'Shift 3 - Ruang Cempaka', '23:00:00', '06:00:00', '2021-06-03 13:04:15', '2021-06-03 13:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalkerja`
--

CREATE TABLE `jadwalkerja` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_relawan` int(10) UNSIGNED NOT NULL,
  `nama_jadwal` enum('Shift1','Shift2','Shift3') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwalkerja`
--

INSERT INTO `jadwalkerja` (`id`, `id_relawan`, `nama_jadwal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shift1', NULL, '2021-05-30 03:53:50'),
(2, 2, 'Shift2', NULL, '2021-05-30 03:52:31'),
(6, 3, 'Shift2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_shift`
--

CREATE TABLE `jadwal_shift` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jadwal` enum('S1','S2','S3') NOT NULL,
  `jam_masuk` date NOT NULL,
  `jam_keluar` date NOT NULL,
  `id_relawan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_shift`
--

INSERT INTO `jadwal_shift` (`id`, `nama_jadwal`, `jam_masuk`, `jam_keluar`, `id_relawan`, `created_at`, `updated_at`) VALUES
(1, 'S2', '2021-05-12', '2021-05-19', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` enum('cost','benefit') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updatad_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `atribut`, `bobot`, `created_at`, `updatad_at`) VALUES
(1, 'K1', 'Jiwa Kasih Sayang', 'benefit', 0.2, NULL, NULL),
(2, 'K2', 'Interaksi', 'benefit', 0.25, NULL, NULL),
(4, 'K3', 'Niat', 'benefit', 0.1, NULL, NULL),
(5, 'K4', 'Perawatan', 'benefit', 0.2, NULL, NULL),
(6, 'K5', 'Nutrisi', 'benefit', 0.15, NULL, NULL),
(7, 'K6', 'Pendampingan Belajar', 'benefit', 0.1, NULL, NULL);

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
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2021_03_25_165225_create_relawan_table', 1),
(20, '2021_05_20_100624_create_jadwal_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id` int(10) UNSIGNED NOT NULL,
  `alternatif_id` int(10) UNSIGNED DEFAULT NULL,
  `crip_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id`, `alternatif_id`, `crip_id`) VALUES
(30, 8, 21),
(31, 8, 26),
(32, 8, 32),
(33, 8, 38),
(34, 8, 41),
(35, 8, 48),
(36, 12, 21),
(37, 12, 27),
(38, 12, 30),
(39, 12, 34),
(40, 12, 41),
(41, 12, 44),
(42, 13, 2),
(43, 13, 26),
(44, 13, 30),
(45, 13, 37),
(46, 13, 42),
(47, 13, 47),
(48, 14, 21),
(49, 14, 28),
(50, 14, 32),
(51, 14, 37),
(52, 14, 42),
(53, 14, 47),
(54, 15, 23),
(55, 15, 27),
(56, 15, 32),
(57, 15, 38),
(58, 15, 42),
(59, 15, 48),
(60, 16, 22),
(61, 16, 27),
(62, 16, 32),
(63, 16, 36),
(64, 16, 39),
(65, 16, 46),
(66, 17, 22),
(67, 17, 28),
(68, 17, 30),
(69, 17, 36),
(70, 17, 41),
(71, 17, 46),
(72, 25, 22),
(73, 25, 28),
(74, 25, 31),
(75, 25, 36),
(76, 25, 41),
(77, 25, 46);

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `id` int(10) NOT NULL,
  `nama_perawat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jadwal_id` int(10) UNSIGNED DEFAULT NULL,
  `jeniskelamin` enum('L','P') NOT NULL,
  `agama` enum('islam','nonis') NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `tempatlahir` varchar(255) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` text NOT NULL,
  `domisili` text NOT NULL,
  `status` enum('M','BM') NOT NULL,
  `statuskerja` varchar(30) NOT NULL,
  `pengalaman` text NOT NULL,
  `fotoktp` varchar(255) DEFAULT NULL,
  `sks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`id`, `nama_perawat`, `jadwal_id`, `jeniskelamin`, `agama`, `nohp`, `tempatlahir`, `ttl`, `alamat`, `domisili`, `status`, `statuskerja`, `pengalaman`, `fotoktp`, `sks`, `created_at`, `updated_at`) VALUES
(2, 'kirana', 1, 'P', 'islam', '089671721', 'Bogor', '2021-05-19', 'Jatiwarna, Bekasi', 'Bogor', 'BM', 'Non Aktif', 'belum ada', 'C:\\xampp\\tmp\\phpFB43.tmp', 'C:\\xampp\\tmp\\phpFB44.tmp', '2021-05-31 06:26:14', '2021-06-23 12:21:59'),
(7, 'Sriyatun', 2, 'P', 'islam', '089128768199', 'Bogor', '1996-06-12', 'Jatiwarna, Bekasi', 'Jakarta Selatan', 'BM', 'Aktif', 'belum ada', 'C:\\xampp\\tmp\\phpDA9C.tmp', 'C:\\xampp\\tmp\\phpDABC.tmp', '2021-06-03 11:59:06', '2021-06-26 05:01:59'),
(8, 'Azizah', 6, 'P', 'islam', '08191892222', 'Bekasi', '1999-06-15', 'Jatiasih, Bekasi, Jawa Barat', 'Bekasi', 'BM', 'Training', 'belum ada', 'C:\\xampp\\tmp\\php4831.tmp', 'C:\\xampp\\tmp\\php4832.tmp', '2021-06-12 06:24:32', '2021-06-25 13:52:20'),
(9, 'Khamim', 8, 'P', 'islam', '081282272404', 'Malang', '1994-03-16', 'Batumalang, singgah no 48 RT 07/14', 'Bekasi', 'BM', 'Aktif', 'belum ada', 'C:\\xampp\\tmp\\php6C2B.tmp', 'C:\\xampp\\tmp\\php6C2C.tmp', '2021-06-12 22:33:32', '2021-06-25 13:54:03'),
(11, 'Rizki Yuli Yilaika', 6, 'P', 'islam', '08191818111', 'Karanganyar', '1993-06-18', 'Serangasih, Bukit bula no 45 Rt 07/02, Batumalang, Jawa Timur', 'Jakarta Barat', 'BM', 'Aktif', 'belum ada', NULL, NULL, '2021-06-18 04:48:35', '2021-06-22 03:00:30'),
(14, 'Jurini', 9, 'P', 'islam', '08972671881', 'Cirebon', '1992-06-16', 'Serangasih, Bukit bula no 45 Rt 07/02, Batumalang, Jawa Timur', 'Cirebon', 'M', 'Training', 'belum ada', NULL, NULL, '2021-06-22 03:26:37', '2021-06-25 13:56:26'),
(15, 'Wahyuni', 7, 'P', 'islam', '08191818111', 'Depok', '2001-08-16', 'Jatiwarna, Bekasiii', 'Bekasi', 'BM', 'Aktif', 'belum ada', NULL, NULL, '2021-06-23 11:29:12', '2021-06-25 13:55:12'),
(16, 'Sutriya', 1, 'P', 'islam', '08188888777', 'Bekasi', '1989-12-19', 'Serangasih, Bukit bula no 45 Rt 07/02, Batumalang, Jawa Timur', 'Jakarta Barat', 'M', 'Aktif', 'belum ada', NULL, NULL, '2021-06-25 13:57:59', '2021-06-25 13:57:59'),
(17, 'Endang', 1, 'P', 'nonis', '08967526217', 'Tulungagung', '1984-07-11', 'Jatiwarna, Bekasiii', 'Jakarta Selatan', 'BM', 'Aktif', 'belum ada', NULL, NULL, '2021-06-25 13:59:32', '2021-06-25 13:59:32'),
(18, 'Tri Lestari', 1, 'P', 'islam', '08972661271', 'Yogyakarta', '1993-02-08', 'Jatiasih, Bekasi, Jawa Barat', 'Jakarta Selatan', 'BM', 'Aktif', 'belum ada', NULL, NULL, '2021-06-25 14:00:42', '2021-06-25 14:04:22'),
(19, 'Reni Safitri', 1, 'P', 'islam', '081567171717', 'Jatiasih', '1997-10-14', 'Jatiasih AE 6, Bekasi, Jawa Barat', 'Jakarta Timur', 'M', 'Aktif', 'belum ada', NULL, NULL, '2021-06-25 14:01:58', '2021-06-25 14:05:00'),
(20, 'Buriyah', 1, 'P', 'islam', '087772727272', 'Pramuka', '1996-12-05', 'Jatiasih, Bekasi, Jawa Barat', 'Jakarta Pusat', 'BM', 'Aktif', 'belum ada', NULL, NULL, '2021-06-25 14:03:47', '2021-06-25 14:03:47'),
(21, 'Mila', 1, 'P', 'islam', '087762661611', 'Pulogadung', '1997-01-26', 'jatiasih', 'Jakarta Barat', 'BM', 'Aktif', 'belum ada', NULL, NULL, '2021-06-25 14:06:31', '2021-06-25 14:06:31'),
(22, 'Mila', 1, 'P', 'islam', '087762661611', 'Pulogadung', '1997-01-26', 'jatiasih', 'Jakarta Barat', 'BM', 'Aktif', 'belum ada', NULL, NULL, '2021-06-25 14:06:31', '2021-06-25 14:06:31'),
(23, 'Jeni Setianina', 8, 'P', 'islam', '089675128312', 'Yogyakarta', '1998-06-16', 'Jatiasih AE 6, Bekasi, Jawa Barat', 'Jakarta Selatan', 'M', 'Training', 'belum ada', NULL, NULL, '2021-06-30 06:45:30', '2021-06-30 06:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `relawan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `rating`, `relawan_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL),
(2, 4, 2, '2021-06-01 04:58:58', '2021-06-01 04:58:58'),
(3, 5, 3, '2021-06-01 05:16:18', '2021-06-01 05:16:18'),
(14, 4, 4, '2021-06-18 15:23:36', '2021-06-18 15:23:36'),
(16, 3, 6, '2021-06-18 15:28:56', '2021-06-18 15:28:56'),
(17, 4, 11, '2021-06-30 06:49:31', '2021-06-30 06:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `relawan`
--

CREATE TABLE `relawan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` enum('islam','nonis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` date NOT NULL,
  `domisili` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('PL','MH','BK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relawan`
--

INSERT INTO `relawan` (`id`, `nama`, `jk`, `agama`, `nohp`, `tempatlahir`, `ttl`, `domisili`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rena Anata', 'P', 'islam', '08192002325', 'Bogor', '2021-05-11', 'Depok', 'renaanata200@gmail.com', 'MH', '2021-05-21 21:25:36', '2021-06-23 11:11:05'),
(2, 'Ninda Hayati', 'P', 'islam', '081282272404', '', '1999-07-02', 'Bekasi', 'nindaaahayati@gmail.com', 'MH', '2021-05-22 00:50:47', '2021-06-20 10:01:11'),
(3, 'Adriana Kusumawati Rara', 'P', 'islam', '08561292819', 'Bogor', '2021-05-06', 'Jakarta Selatan', 'adriana204@gmail.com', 'MH', '2021-05-22 02:39:19', '2021-06-26 08:02:45'),
(4, 'Bila Regina Aprlia', 'P', 'islam', '089727812890', '', '2021-05-27', 'Bogor', 'karefa@gmail.com', 'BK', '2021-05-26 09:08:54', '2021-06-20 10:05:57'),
(6, 'Filsa Ramadini Tia', 'P', 'islam', '08191818111', '', '2021-05-05', 'Bandung', 'filsaramdani@gmail.com', 'PL', '2021-05-28 10:49:41', '2021-06-20 10:03:20'),
(11, 'Sarah Maida', 'P', 'nonis', '08191818111', 'Malang', '2021-06-04', 'Bogor', 'Serangasih, Bukit bula no 45 Rt 07/02, Batumalang, Jawa Timur', 'MH', '2021-06-23 10:47:43', '2021-06-26 08:11:29'),
(12, 'Ninda Hayati', 'P', 'islam', '081282272404', 'Yogyakarta', '1999-07-02', 'Bekasi', 'nindaaahayati@gmail.com', 'MH', '2021-06-26 07:56:16', '2021-06-26 07:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gambar`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$0Yyqi1WFMD39nbmLlQppQ.44SS4a/5siQDgtMOLYBNGrmJ9x9MXn6', NULL, 'admin', NULL, NULL, NULL),
(11, 'halidza', 'halidzasya', 'halidza@gmail.com', '$2y$10$epun1blqm10/muh.p/i8QeayZbbOpt9hqQ5JxX3dTWk5.OryT6ZfO', NULL, 'user', NULL, '2021-06-22 07:04:04', '2021-06-22 07:04:04'),
(12, 'Azizah', 'azizah', 'azizah204@gmail.com', '$2y$10$yaluQdashmcUN.a4/U0UduI5ePIcmGIXYBHH7YRljidrXPSnGHFyC', NULL, 'user', NULL, '2021-06-26 00:51:44', '2021-06-26 00:51:44'),
(13, 'Rizka', 'rizka', 'rizkayul@gmail.com', '$2y$10$nJqAIwEkVu9u0iQD4Z4clOM9iHGkQgZ2D0tWraDjoJgFa/adofML2', NULL, 'user', NULL, '2021-06-26 01:45:39', '2021-06-26 01:45:39'),
(14, 'khamim', 'khamim', 'khamim202@gmail.com', '$2y$10$HmhVaDlRqUpwsu1F96Ua5uqSxLoXdya7c3PqNqrXKBAGhK052A/6y', NULL, 'user', NULL, '2021-06-29 08:15:25', '2021-06-29 08:15:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensi_relawan`
--
ALTER TABLE `absensi_relawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_alternatif` (`kode_alternatif`);

--
-- Indexes for table `crip`
--
ALTER TABLE `crip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwalkerja`
--
ALTER TABLE `jadwalkerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relawan_id` (`id_relawan`);

--
-- Indexes for table `jadwal_shift`
--
ALTER TABLE `jadwal_shift`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_relawan` (`id_relawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_id` (`alternatif_id`),
  ADD KEY `crip_id` (`crip_id`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relawan_id` (`relawan_id`);

--
-- Indexes for table `relawan`
--
ALTER TABLE `relawan`
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
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `absensi_relawan`
--
ALTER TABLE `absensi_relawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `crip`
--
ALTER TABLE `crip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadwalkerja`
--
ALTER TABLE `jadwalkerja`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `perawat`
--
ALTER TABLE `perawat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `relawan`
--
ALTER TABLE `relawan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crip`
--
ALTER TABLE `crip`
  ADD CONSTRAINT `crip_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`);

--
-- Constraints for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD CONSTRAINT `nilai_alternatif_ibfk_1` FOREIGN KEY (`crip_id`) REFERENCES `crip` (`id`);

--
-- Constraints for table `perawat`
--
ALTER TABLE `perawat`
  ADD CONSTRAINT `perawat_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`relawan_id`) REFERENCES `relawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
