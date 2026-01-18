-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2026 at 04:37 AM
-- Server version: 11.4.4-MariaDB-log
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `id_unit_kerja` bigint(20) UNSIGNED NOT NULL,
  `id_pengunggah` bigint(20) UNSIGNED NOT NULL,
  `nomor_dokumen` varchar(100) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tahun_dokumen` year(4) NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` int(11) NOT NULL,
  `status_retensi` enum('Aktif','Inaktif','Musnah') NOT NULL DEFAULT 'Aktif',
  `tanggal_unggah` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `id_kategori`, `id_unit_kerja`, `id_pengunggah`, `nomor_dokumen`, `judul_dokumen`, `deskripsi`, `tahun_dokumen`, `lokasi_file`, `tipe_file`, `ukuran_file`, `status_retensi`, `tanggal_unggah`, `created_at`, `updated_at`) VALUES
(3, 1, 4, 1, '22', 'SK kepala desa perbaikan jembatan di cilangla', 'berikut adalah contoh 3', 2026, 'public/documents/2026/2026_sk-kepala-desa-perbaikan-jembatan-di-cilanglaa_c75R0.pdf', 'pdf', 1033, 'Aktif', '2026-01-09 03:56:29', '2026-01-08 20:56:29', '2026-01-09 19:24:43'),
(5, 3, 1, 1, '40', 'SK kepala desa perbaikan jembatan di ubrug', 'haiiiii', 2026, 'public/documents/2026/2026_sk-kepala-desa-perbaikan-jembatan-di-ubrug_OaLZf.docx', 'docx', 2976, 'Aktif', '2026-01-09 04:01:34', '2026-01-08 21:01:34', '2026-01-08 21:01:34'),
(14, 5, 2, 2, '47', 'SK kepala desa perbaikan jembatan di caringin', 'test retensi 2', 2010, 'public/documents/2010/2010_sk-kepala-desa-perbaikan-jembatan-di-caringin_y9PH4.docx', 'docx', 2318, 'Inaktif', '2026-01-09 04:26:34', '2026-01-08 21:26:34', '2026-01-08 21:27:03'),
(15, 7, 2, 2, '48', 'SK kepala desa perbaikan jembatan di cireunghas', 'test retensi 3', 2010, 'public/documents/2010/2010_sk-kepala-desa-perbaikan-jembatan-di-cireunghas_LVdg0.jpg', 'jpg', 47, 'Inaktif', '2026-01-09 04:26:57', '2026-01-08 21:26:57', '2026-01-08 21:27:03'),
(16, 1, 2, 2, '21', 'SK kepala desa perbaikan jembatan di gandasoli', 'wkwkwk', 2010, 'public/documents/2010/2010_sk-kepala-desa-perbaikan-jembatan-di-gandasoli_FYF3C.docx', 'docx', 2976, 'Inaktif', '2026-01-09 04:28:54', '2026-01-08 21:28:54', '2026-01-08 21:29:00'),
(17, 2, 2, 2, '42', 'contoh', 'haloooo', 2026, 'public/documents/2026/2026_contoh_UQo9U.PDF', 'PDF', 124, 'Aktif', '2026-01-09 04:34:50', '2026-01-08 21:34:50', '2026-01-08 21:34:50'),
(18, 5, 2, 1, '21', 'contoh 2', 'haiiiii', 2026, 'public/documents/2026/2026_contoh-2_CGRZj.PDF', 'PDF', 124, 'Aktif', '2026-01-09 04:35:38', '2026-01-08 21:35:38', '2026-01-08 23:23:24'),
(19, 1, 1, 1, '50', 'SK kepala desa perbaikan jembatan di caringin', 'haloooo', 2026, 'public/documents/2026/2026_sk-kepala-desa-perbaikan-jembatan-di-caringin_LpdAw.pdf', 'pdf', 2837, 'Aktif', '2026-01-09 07:32:15', '2026-01-09 00:32:15', '2026-01-09 00:32:15'),
(20, 1, 2, 1, '23', 'SK kepala desa perbaikan jembatan di cilangla', 'gg gimang', 2026, 'public/documents/2026/2026_sk-kepala-desa-perbaikan-jembatan-di-cilanglaa_CZXdU.pdf', 'pdf', 1527, 'Aktif', '2026-01-09 13:55:00', '2026-01-09 06:55:00', '2026-01-09 19:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `masa_retensi` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `masa_retensi`, `created_at`, `updated_at`) VALUES
(1, 'Surat Keputusan (SK)', 5, '2026-01-08 19:29:14', '2026-01-09 19:39:15'),
(2, 'Peraturan Desa (Perdes)', 10, '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(3, 'Surat Masuk Eksternal', 5, '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(4, 'Surat Keluar', 5, '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(5, 'Laporan Keuangan', 10, '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(6, 'Dokumen Pertanahan', 20, '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(7, 'Berita Acara', 5, '2026-01-08 19:29:14', '2026-01-08 19:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe_aktivitas` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `id_user`, `tipe_aktivitas`, `keterangan`, `ip_address`, `user_agent`, `waktu_dibuat`) VALUES
(1, 1, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:44:07'),
(2, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:44:10'),
(3, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:44:11'),
(4, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:44:11'),
(5, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:44:11'),
(6, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:46:01'),
(7, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:46:01'),
(8, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:46:01'),
(9, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:46:01'),
(10, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:56:51'),
(11, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:56:51'),
(12, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:56:52'),
(13, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:56:52'),
(14, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 02:58:56'),
(15, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:50'),
(16, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:51'),
(17, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:51'),
(18, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:51'),
(19, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:51'),
(20, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:51'),
(21, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:52'),
(22, 3, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:10:52'),
(23, 1, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:29'),
(24, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:35'),
(25, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:36'),
(26, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:36'),
(27, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:36'),
(28, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:36'),
(29, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:36'),
(30, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:36'),
(31, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:37'),
(32, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:37'),
(33, 1, 'UPDATE', 'Memperbarui dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:56:55'),
(34, 1, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:57:06'),
(35, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 03:59:28'),
(36, 1, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di ubrug', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:01:34'),
(37, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:02:23'),
(38, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:03:28'),
(39, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:03:30'),
(40, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:03:32'),
(41, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:06:06'),
(42, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:08:03'),
(43, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:09:20'),
(44, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:17:41'),
(45, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:18:04'),
(46, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:18:16'),
(47, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:18:47'),
(48, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:19:42'),
(49, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:20:00'),
(50, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:25:13'),
(51, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:25:16'),
(52, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:25:18'),
(53, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:26:04'),
(54, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:26:34'),
(55, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:26:57'),
(56, 2, 'DELETE', 'Menghapus dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:27:53'),
(57, 2, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:28:54'),
(58, 2, 'UPLOAD', 'Mengunggah dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:34:50'),
(59, 1, 'UPLOAD', 'Mengunggah dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 04:35:38'),
(60, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:22'),
(61, 1, 'DOWNLOAD', 'Mengunduh dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:22'),
(62, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:24'),
(63, 1, 'DOWNLOAD', 'Mengunduh dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:24'),
(64, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:25'),
(65, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:25'),
(66, 1, 'DOWNLOAD', 'Mengunduh dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:25'),
(67, 1, 'DOWNLOAD', 'Mengunduh dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:25'),
(68, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:38'),
(69, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:38'),
(70, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:38'),
(71, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:39'),
(72, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:21:54'),
(73, 1, 'PREVIEW', 'Melihat pratinjau dokumen: SK kepala desa perbaikan jembatan di cireunghas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:22:21'),
(74, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:22:28'),
(75, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:22:28'),
(76, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:22:28'),
(77, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:22:29'),
(78, 1, 'UPDATE', 'Memperbarui dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:23:24'),
(79, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:23:25'),
(80, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:23:25'),
(81, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:23:26'),
(82, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:23:26'),
(83, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:29'),
(84, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:30'),
(85, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:30'),
(86, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:30'),
(87, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:42'),
(88, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:42'),
(89, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:42'),
(90, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:24:42'),
(91, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:25:23'),
(92, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:25:23'),
(93, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:25:23'),
(94, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:25:24'),
(95, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:30'),
(96, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:30'),
(97, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:30'),
(98, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:31'),
(99, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:52'),
(100, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:53'),
(101, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:53'),
(102, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:26:53'),
(103, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:27:53'),
(104, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:17'),
(105, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:17'),
(106, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:17'),
(107, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:18'),
(108, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:24'),
(109, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:24'),
(110, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:24'),
(111, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:25'),
(112, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:43'),
(113, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:44'),
(114, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:44'),
(115, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:28:44'),
(116, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:05'),
(117, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:05'),
(118, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:05'),
(119, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:05'),
(120, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:11'),
(121, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:11'),
(122, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:12'),
(123, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:12'),
(124, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh 2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:17'),
(125, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:23'),
(126, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:23'),
(127, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:23'),
(128, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:24'),
(129, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:53'),
(130, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:54'),
(131, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:54'),
(132, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:31:54'),
(133, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:32:12'),
(134, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:32:12'),
(135, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:32:13'),
(136, 1, 'PREVIEW', 'Melihat pratinjau dokumen: contoh', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:32:13'),
(137, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:44'),
(138, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:44'),
(139, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:45'),
(140, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:45'),
(141, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:45'),
(142, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:45'),
(143, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:46'),
(144, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:46'),
(145, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:33:46'),
(146, 1, 'UPDATE', 'Memperbarui dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 06:34:06'),
(147, 1, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 07:32:15'),
(148, 1, 'UPLOAD', 'Mengunggah dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 13:55:00'),
(149, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:55'),
(150, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:57'),
(151, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:57'),
(152, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:57'),
(153, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:58'),
(154, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:58'),
(155, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:58'),
(156, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:22:58'),
(157, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di gandasoli', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-09 14:24:24'),
(158, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:07'),
(159, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:10'),
(160, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:10'),
(161, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:10'),
(162, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:11'),
(163, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:11'),
(164, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:11'),
(165, 1, 'DOWNLOAD', 'Mengunduh dokumen: SK kepala desa perbaikan jembatan di cilanglaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:11'),
(166, 1, 'UPDATE', 'Memperbarui dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:20'),
(167, 1, 'UPDATE', 'Memperbarui dokumen: SK kepala desa perbaikan jembatan di cilangla', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', '2026-01-10 02:24:43');

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
(1, '2026_01_09_021146_create_master_tables', 1),
(2, '2026_01_09_021214_create_users_table', 1),
(3, '2026_01_09_021306_create_dokumen_table', 1),
(4, '2026_01_09_021401_create_support_tables', 1),
(5, '2026_01_09_022241_create_personal_access_tokens_table', 1),
(6, '2026_01_09_022801_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `link_target` varchar(255) DEFAULT NULL,
  `sudah_dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `tipe_notifikasi` varchar(50) NOT NULL DEFAULT 'info',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `judul`, `pesan`, `link_target`, `sudah_dibaca`, `tipe_notifikasi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', 'http://127.0.0.1:8000/dokumen/10', 1, 'info', '2026-01-08 21:18:04', '2026-01-08 21:18:19'),
(2, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', 'http://127.0.0.1:8000/dokumen/11', 1, 'info', '2026-01-08 21:18:47', '2026-01-08 21:19:19'),
(3, 1, 'Retensi Arsip Otomatis', '1 dokumen telah memasuki masa Inaktif.', '/dokumen', 1, 'warning', '2026-01-08 21:19:02', '2026-01-08 21:19:23'),
(4, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', 'http://127.0.0.1:8000/dokumen/12', 1, 'info', '2026-01-08 21:20:00', '2026-01-08 21:20:21'),
(5, 1, 'Retensi Arsip Otomatis', '1 dokumen telah memasuki masa Inaktif.', '/dokumen', 1, 'warning', '2026-01-08 21:20:05', '2026-01-08 21:20:18'),
(6, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', 'http://127.0.0.1:8000/dokumen/13', 1, 'info', '2026-01-08 21:26:05', '2026-01-08 21:27:45'),
(7, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', 'http://127.0.0.1:8000/dokumen/14', 1, 'info', '2026-01-08 21:26:34', '2026-01-08 21:27:43'),
(8, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) mengunggah dokumen: SK kepala desa perbaikan jembatan di cireunghas', 'http://127.0.0.1:8000/dokumen/15', 1, 'info', '2026-01-08 21:26:57', '2026-01-08 21:27:40'),
(9, 1, 'Retensi Arsip Otomatis', '2 dokumen telah memasuki masa Inaktif.', '/dokumen?status_retensi=Inaktif', 1, 'warning', '2026-01-08 21:27:03', '2026-01-08 21:27:27'),
(10, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) mengunggah dokumen: SK kepala desa perbaikan jembatan di gandasoli', 'http://127.0.0.1:8000/dokumen/16', 1, 'info', '2026-01-08 21:28:54', '2026-01-08 21:29:08'),
(11, 1, 'Retensi Arsip Otomatis', '1 dokumen telah memasuki masa Inaktif.', '/dokumen?status_retensi=Inaktif', 1, 'warning', '2026-01-08 21:29:00', '2026-01-08 21:29:11'),
(12, 1, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) baru saja mengunggah dokumen: contoh', 'http://127.0.0.1:8000/dokumen/17', 1, 'info', '2026-01-08 21:34:50', '2026-01-08 21:35:17'),
(13, 3, 'Dokumen Baru Diunggah', 'Budi Santoso (Kaur Keuangan) baru saja mengunggah dokumen: contoh', 'http://127.0.0.1:8000/dokumen/17', 1, 'info', '2026-01-08 21:34:50', '2026-01-08 21:34:54'),
(14, 2, 'Dokumen Baru Diunggah', 'Administrator Sistem baru saja mengunggah dokumen: contoh 2', 'http://127.0.0.1:8000/dokumen/18', 1, 'info', '2026-01-08 21:35:38', '2026-01-08 21:36:09'),
(15, 3, 'Dokumen Baru Diunggah', 'Administrator Sistem baru saja mengunggah dokumen: contoh 2', 'http://127.0.0.1:8000/dokumen/18', 1, 'info', '2026-01-08 21:35:38', '2026-01-08 21:35:53'),
(16, 2, 'Dokumen Baru Diunggah', 'Administrator Sistem baru saja mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', 'http://127.0.0.1:8000/dokumen/19', 1, 'info', '2026-01-09 00:32:15', '2026-01-09 00:33:49'),
(17, 3, 'Dokumen Baru Diunggah', 'Administrator Sistem baru saja mengunggah dokumen: SK kepala desa perbaikan jembatan di caringin', 'http://127.0.0.1:8000/dokumen/19', 1, 'info', '2026-01-09 00:32:15', '2026-01-09 06:16:57'),
(18, 2, 'Dokumen Baru Diunggah', 'Administrator Sistem baru saja mengunggah dokumen: SK kepala desa perbaikan jembatan di cilanglaa', 'http://127.0.0.1:8000/dokumen/20', 0, 'info', '2026-01-09 06:55:00', '2026-01-09 06:55:00'),
(19, 3, 'Dokumen Baru Diunggah', 'Administrator Sistem baru saja mengunggah dokumen: SK kepala desa perbaikan jembatan di cilanglaa', 'http://127.0.0.1:8000/dokumen/20', 0, 'info', '2026-01-09 06:55:00', '2026-01-09 06:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_peran` varchar(50) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_peran`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrator sistem dengan akses penuh (Koordinator)', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(2, 'Operator', 'Kasi/Kaur yang mengelola dokumen unit kerja spesifik', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(3, 'Viewer', 'Staf desa yang hanya melihat dan mengunduh dokumen', '2026-01-08 19:29:14', '2026-01-08 19:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `kode_unit` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `nama_unit`, `kode_unit`, `created_at`, `updated_at`) VALUES
(1, 'Sekretariat Desa', 'SEKDES', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(2, 'Kaur Keuangan', 'KEU', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(3, 'Kaur Umum & Tata Usaha', 'UMUM', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(4, 'Kaur Perencanaan', 'REN', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(5, 'Kasi Pemerintahan', 'PEM', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(6, 'Kasi Kesejahteraan', 'KESRA', '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(7, 'Kasi Pelayanan', 'PEL', '2026-01-08 19:29:14', '2026-01-08 19:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `id_unit_kerja` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_role`, `id_unit_kerja`, `nama_lengkap`, `username`, `email`, `password`, `status_aktif`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Administrator Sistem', 'admin', 'admin@desa.id', '$2y$12$IeRpTpbt92zU71dup5r8f.DDoqynjfoRKDTB1QNI7XcMnr0XHVlqm', 1, NULL, '2026-01-08 19:29:14', '2026-01-08 19:29:14'),
(2, 2, 2, 'Budi Santoso (Kaur Keuangan)', 'kaur_keuangan', NULL, '$2y$12$54daKxBY/FCwAqDB9ytlsOU1dfYhjKY1msoUISnbFPqN4fktPr6zS', 1, NULL, '2026-01-08 19:29:15', '2026-01-09 20:32:20'),
(3, 3, 3, 'Siti Aminah (Staf)', 'staf_umum', NULL, '$2y$12$5iv8KhkkbJP2GdatZ0ql.udaPJJuZheO5MvbdYO6SlpAN/iKQ2WJa', 1, NULL, '2026-01-08 19:29:15', '2026-01-08 20:09:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumen_id_kategori_foreign` (`id_kategori`),
  ADD KEY `dokumen_id_unit_kerja_foreign` (`id_unit_kerja`),
  ADD KEY `dokumen_id_pengunggah_foreign` (`id_pengunggah`),
  ADD KEY `dokumen_judul_dokumen_index` (`judul_dokumen`),
  ADD KEY `dokumen_nomor_dokumen_index` (`nomor_dokumen`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_aktivitas_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi_id_user_foreign` (`id_user`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit_kerja_kode_unit_unique` (`kode_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`),
  ADD KEY `users_id_unit_kerja_foreign` (`id_unit_kerja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokumen_id_pengunggah_foreign` FOREIGN KEY (`id_pengunggah`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dokumen_id_unit_kerja_foreign` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_id_unit_kerja_foreign` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
