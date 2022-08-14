-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2022 pada 20.25
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_sia_rapor_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_kelas_wali` int(10) UNSIGNED DEFAULT NULL,
  `nuptk` int(20) DEFAULT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(145) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `kontak` varchar(14) DEFAULT NULL,
  `status_kepegawaian` varchar(45) DEFAULT NULL,
  `jenis_ptk` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `id_users`, `id_kelas_wali`, `nuptk`, `nip`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `agama`, `kontak`, `status_kepegawaian`, `jenis_ptk`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, NULL, '6423451234124125', 'Samarinda', '1986-01-12', 'Jl. Siradj Salman', 'L', 'Islam', '081234567890', NULL, NULL, '2021-09-22 04:48:26', '2021-12-12 10:16:56', NULL),
(2, 7, 3, NULL, '1231231234123123', 'Samarinda', '2021-10-07', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', 'L', 'Islam', '082157819525', NULL, NULL, '2021-09-30 08:10:39', '2021-12-12 21:46:30', NULL),
(3, 20, 2, NULL, '123123123', 'Samarinda', '2021-12-04', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', 'L', 'Islam', '082157819525', NULL, NULL, '2021-12-12 10:10:49', '2021-12-12 21:45:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_mapel_detail` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_mapel_detail`, `id_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2021-09-29 06:02:34', '2021-09-29 22:12:15', '2021-09-29 22:12:15'),
(3, 1, 8, '2021-09-29 06:02:34', '2021-09-29 22:55:16', '2021-09-29 22:55:16'),
(4, 1, 3, '2021-09-29 22:12:23', '2021-09-29 22:55:16', '2021-09-29 22:55:16'),
(5, 1, 4, '2021-09-29 22:12:23', '2021-09-29 22:55:16', '2021-09-29 22:55:16'),
(6, 1, 5, '2021-09-29 22:12:23', '2021-09-29 22:55:16', '2021-09-29 22:55:16'),
(7, 1, 1, '2021-09-29 22:55:16', '2021-09-29 22:55:16', NULL),
(8, 1, 2, '2021-09-30 08:02:23', '2021-09-30 08:02:23', NULL),
(9, 1, 3, '2021-09-30 08:02:23', '2021-09-30 08:02:23', NULL),
(10, 1, 4, '2021-09-30 08:02:23', '2021-09-30 08:02:23', NULL),
(11, 2, 3, '2021-09-30 08:10:56', '2021-09-30 08:10:56', NULL),
(12, 2, 4, '2021-09-30 08:21:36', '2021-09-30 08:21:36', NULL),
(13, 2, 5, '2021-09-30 08:23:34', '2021-09-30 08:23:34', NULL),
(14, 3, 1, '2021-09-30 15:58:24', '2021-09-30 15:58:24', NULL),
(15, 3, 2, '2021-09-30 15:58:24', '2021-09-30 15:58:24', NULL),
(16, 3, 3, '2021-10-17 09:39:58', '2021-10-17 09:39:58', NULL),
(17, 3, 4, '2021-10-17 09:39:58', '2021-10-17 09:39:58', NULL),
(18, 3, 5, '2021-10-17 09:39:58', '2021-10-17 09:39:58', NULL),
(19, 3, 6, '2021-10-17 09:39:58', '2021-10-17 09:39:58', NULL),
(20, 4, 1, '2021-10-17 09:42:50', '2021-10-17 09:42:50', NULL),
(21, 4, 2, '2021-10-17 09:42:50', '2021-10-17 09:42:50', NULL),
(22, 4, 3, '2021-10-17 09:42:50', '2021-10-17 09:42:50', NULL),
(23, 4, 4, '2021-10-17 09:42:50', '2021-10-17 09:42:50', NULL),
(24, 4, 5, '2021-10-17 09:42:50', '2021-10-17 09:42:50', NULL),
(25, 5, 1, '2022-01-04 11:13:53', '2022-01-04 11:13:53', NULL),
(26, 5, 2, '2022-01-04 11:13:53', '2022-01-04 11:13:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_upload`
--

CREATE TABLE `jadwal_upload` (
  `id` int(11) NOT NULL,
  `file` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_upload`
--

INSERT INTO `jadwal_upload` (`id`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '616c762e5d617_element.png', '', '2021-10-17 11:14:54', '2021-10-17 11:14:58', '2021-10-17 11:14:58'),
(2, '61d49e8ac23ca_67771582_123573445651226_1517320330628942209_n.jpg', 'tesss', '2021-12-12 09:46:30', '2022-01-04 11:24:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'X IPA', '2021-09-18 16:11:07', '2021-09-18 16:11:07', NULL),
(2, 'X IPS', '2021-09-26 10:43:45', '2021-09-26 10:43:45', NULL),
(3, 'XI IPA', '2021-09-26 10:44:29', '2021-09-26 10:44:29', NULL),
(4, 'XI IPS 1', '2021-09-26 10:45:15', '2021-09-26 10:45:15', NULL),
(5, 'XI IPS 2', '2021-09-26 10:45:22', '2021-09-26 10:45:23', NULL),
(6, 'XII IPA', '2021-09-26 10:45:34', '2021-09-26 10:45:34', NULL),
(7, 'XII IPS 1', '2021-09-26 10:45:50', '2021-09-26 10:45:50', NULL),
(8, 'XII IPS 2', '2021-09-26 10:45:56', '2021-09-26 10:45:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(145) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `mata_pelajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bahasa Inggris', '1', '2021-09-21 15:14:00', '2021-09-22 04:40:46', NULL),
(2, 'Ekonomi Perminatan', '1', '2021-09-21 15:14:11', '2021-09-21 15:14:11', NULL),
(3, 'Ekonomi Lintas Minat', '1', '2021-09-21 15:14:21', '2021-09-21 15:14:21', NULL),
(4, 'PJOK', '1', '2021-09-21 15:14:30', '2021-09-21 15:14:30', NULL),
(5, 'Pendidikan Agama Kristen', '1', '2021-09-21 15:14:42', '2021-09-21 15:14:42', NULL),
(6, 'Pendidikan Pancasila dan Kewarganegaraan', '1', '2021-09-21 15:15:23', '2021-09-21 15:15:23', NULL),
(7, 'Geografi Peminatan', '1', '2021-09-21 15:15:26', '2021-09-21 15:15:26', NULL),
(8, 'Kimia Peminatan', '1', '2021-09-21 15:15:39', '2021-09-21 15:15:39', NULL),
(9, 'Kimia Lintas Minat', '1', '2021-09-21 15:15:50', '2021-09-21 15:15:50', NULL),
(10, 'Biologi Peminatan', '1', '2021-09-21 15:16:00', '2021-09-21 15:16:00', NULL),
(11, 'Biologi Lintas Minat', '1', '2021-09-21 15:16:11', '2021-09-21 15:16:11', NULL),
(12, 'Sejarah Indonesia', '1', '2021-09-21 15:16:56', '2021-09-21 15:16:56', NULL),
(13, 'Seni Budaya', '1', '2021-09-21 15:17:06', '2021-09-21 15:17:06', NULL),
(14, 'Prakarya dan Kewirausahaan', '1', '2021-09-21 15:17:20', '2021-09-21 15:17:20', NULL),
(15, 'Bahasa Indonesia', '1', '2021-09-21 15:17:30', '2021-09-21 15:17:30', NULL),
(16, 'Pendidikan Agama Katolik', '1', '2021-09-21 15:17:41', '2021-09-21 15:17:41', NULL),
(17, 'Fisika Peminatan', '1', '2021-09-21 15:17:49', '2021-09-21 15:17:49', NULL),
(18, 'Pendidikan Agama Islam', '1', '2021-09-21 15:18:36', '2021-09-21 15:18:36', NULL),
(19, 'Sosiologi Peminiatan', '1', '2021-09-21 15:18:52', '2021-09-21 15:18:52', NULL),
(20, 'Sosiologi Lintas Minat', '1', '2021-09-21 15:19:06', '2021-09-21 15:19:07', NULL),
(21, 'Matematika Wajib', '1', '2021-09-21 15:19:21', '2021-09-21 15:19:21', NULL),
(22, 'Sejarah Peminatan', '1', '2021-09-21 15:20:10', '2021-09-21 15:20:10', NULL),
(23, 'Bimbingan Konseling', '1', '2021-09-21 15:20:30', '2021-09-21 15:20:30', NULL),
(24, 'Matematika Peminatan', '1', '2021-09-21 15:21:13', '2021-09-21 15:21:13', NULL),
(25, 'teaa', '2', '2021-09-30 08:08:55', '2021-09-30 08:09:00', '2021-09-30 08:09:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_detail`
--

CREATE TABLE `mapel_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `id_guru` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mapel_detail`
--

INSERT INTO `mapel_detail` (`id`, `id_mapel`, `id_guru`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2021-09-29 06:02:34', '2021-09-29 06:02:34', NULL),
(2, 1, 2, '2021-09-30 08:10:56', '2021-09-30 08:10:56', NULL),
(3, 2, 1, '2021-09-30 15:58:24', '2021-09-30 15:58:24', NULL),
(4, 2, 2, '2021-10-17 09:42:50', '2021-10-17 09:42:50', NULL),
(5, 3, 2, '2022-01-04 11:13:53', '2022-01-04 11:13:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_16_160409_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `semester` varchar(5) DEFAULT NULL,
  `sakit` int(2) DEFAULT NULL,
  `izin` int(2) DEFAULT NULL,
  `tanpa_keterangan` int(2) DEFAULT NULL,
  `catatan_wali_kelas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `id_siswa`, `id_kelas`, `semester`, `sakit`, `izin`, `tanpa_keterangan`, `catatan_wali_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
(42, 6, 1, NULL, NULL, NULL, NULL, NULL, '2021-12-12 18:26:51', '2021-12-12 18:26:51', NULL),
(43, 7, 1, NULL, NULL, NULL, NULL, NULL, '2021-12-12 18:26:51', '2021-12-12 18:26:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_detail`
--

CREATE TABLE `nilai_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nilai` int(10) UNSIGNED NOT NULL,
  `id_mapel` int(10) UNSIGNED NOT NULL,
  `tugas_satu` int(11) DEFAULT NULL,
  `tugas_dua` int(11) DEFAULT NULL,
  `tugas_tiga` int(11) DEFAULT NULL,
  `tugas_empat` int(11) DEFAULT NULL,
  `tugas_lima` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `nilai_huruf` varchar(5) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nilai_detail`
--

INSERT INTO `nilai_detail` (`id`, `id_nilai`, `id_mapel`, `tugas_satu`, `tugas_dua`, `tugas_tiga`, `tugas_empat`, `tugas_lima`, `uts`, `uas`, `nilai_akhir`, `nilai_huruf`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, 42, 2, 1, 1, 1, 1, 1, 1, 1, 1, 'D', NULL, '2021-12-12 18:26:51', '2021-12-12 18:26:51', NULL),
(41, 43, 2, 2, 2, 2, 2, 2, 2, 22, 5, 'D', NULL, '2021-12-12 18:26:51', '2021-12-12 18:27:12', NULL),
(42, 42, 3, 1, 1, 1, 1, 1, 1, 1, 1, 'D', NULL, '2022-01-04 11:14:36', '2022-01-04 11:14:36', NULL),
(43, 43, 3, 1, 1, 1, 1, 1, 1, 1, 1, 'D', NULL, '2022-01-04 11:14:36', '2022-01-04 11:14:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `rapot`
--

CREATE TABLE `rapot` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nilai` int(10) UNSIGNED NOT NULL,
  `sakit` int(2) DEFAULT NULL,
  `izin` int(2) DEFAULT NULL,
  `tanpa_keterangan` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-09-20 13:00:22', '2021-09-20 13:00:22'),
(2, 'Guru', 'web', '2021-09-20 13:00:33', '2021-09-20 13:00:33'),
(3, 'Siswa', 'web', '2021-09-20 13:00:45', '2021-09-20 13:00:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `foto` text DEFAULT NULL,
  `nipd` int(5) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `nisn` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `kontak` varchar(14) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `id_users`, `id_kelas`, `foto`, `nipd`, `jenis_kelamin`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `kontak`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 14, 1, '123123123_Ilustrasi-BPKAD_Login.png', 1231, 'L', 123123123, 'Samarinda', '2021-12-01', NULL, 'Islam', '082157819525', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', '2021-12-12 09:26:19', '2021-12-12 09:26:19', NULL),
(7, 16, 1, '123123_tips_2.png', 1231, 'L', 123123, 'Samarinda', '2021-12-02', NULL, 'Islam', '082157819525', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', '2021-12-12 09:33:05', '2021-12-12 09:33:05', NULL),
(8, 17, 8, '123123_PROMOTG.jpg', 1231, 'L', 123123, 'Samarinda', '2021-12-07', NULL, 'Islam', '082157819525', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', '2021-12-12 09:41:48', '2021-12-12 09:41:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$XU9x.Hq2r6.v4/AR81CwoeMDhBbr5EV8/cw24hJ7IyfnawtmEDRAu', NULL, '2021-09-16 07:46:14', '2021-09-20 16:32:05', NULL),
(3, 'Polo Admini', 'guru@gmail.com', NULL, '$2y$10$XU9x.Hq2r6.v4/AR81CwoeMDhBbr5EV8/cw24hJ7IyfnawtmEDRAu', NULL, '2021-09-22 04:48:26', '2021-12-12 10:16:56', NULL),
(7, 'Eko Pujianto', 'ekopujianto48@gmail.com', NULL, '$2y$10$xIMJCYSAI5mD7wdMYTn24uUZm84ZEH.p4GrR0fjbfi9O.MtRGg8VC', NULL, '2021-09-30 08:10:39', '2021-12-12 21:46:30', NULL),
(14, 'Ali', 'ali@gmail.com', NULL, '$2y$10$c7vFa60uUjdwH14JwmRk2ej/NkBXG5zF8veFkEpKIyg1sOJ5PBVS6', NULL, '2021-12-12 09:26:19', '2021-12-12 09:26:19', NULL),
(16, 'Eko Pujianto', 'siswaeko@gmail.com', NULL, '$2y$10$o0PknKbTuLoE9XTbWXR5nesXMB6IotNfRPws7eSRx7fsjzsVlZ1KW', NULL, '2021-12-12 09:33:05', '2021-12-12 09:33:05', NULL),
(17, 'Teno', 'teno@gmail.com', NULL, '$2y$10$Ww1Y7YnJcV5Mz2t8SC6ek.NYEDhJU52XsbFR1xnIvv9UNmJNdFPqS', NULL, '2021-12-12 09:41:48', '2021-12-12 09:41:48', NULL),
(20, 'Wahyu', 'wahyu@gmail.com', NULL, '$2y$10$o5mjOVD9vhZ3vSXdNmtu3O/MKvgApu7HqMnNqWgVqoV0UopUsBz92', NULL, '2021-12-12 10:10:49', '2021-12-12 21:45:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_guru_users1_idx` (`id_users`),
  ADD KEY `fk_guru_kelas_idx` (`id_kelas_wali`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_kelas1_idx` (`id_kelas`),
  ADD KEY `fk_jadwal_mapel1_idx` (`id_mapel_detail`);

--
-- Indeks untuk tabel `jadwal_upload`
--
ALTER TABLE `jadwal_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_detail`
--
ALTER TABLE `mapel_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mapel_detail_mapel1_idx` (`id_mapel`),
  ADD KEY `fk_mapel_detail_guru1_idx` (`id_guru`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_kelas1_idx` (`id_kelas`),
  ADD KEY `fk_nilai_siswa1_idx` (`id_siswa`);

--
-- Indeks untuk tabel `nilai_detail`
--
ALTER TABLE `nilai_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_detail_nilai1_idx` (`id_nilai`),
  ADD KEY `fk_nilai_detail_mapel_idx` (`id_mapel`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rapot`
--
ALTER TABLE `rapot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rapot_nilai1_idx` (`id_nilai`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_siswa_users1_idx` (`id_users`),
  ADD KEY `fk_siswa_kelas1_idx` (`id_kelas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `jadwal_upload`
--
ALTER TABLE `jadwal_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `mapel_detail`
--
ALTER TABLE `mapel_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `nilai_detail`
--
ALTER TABLE `nilai_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rapot`
--
ALTER TABLE `rapot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_guru_kelas` FOREIGN KEY (`id_kelas_wali`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guru_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_kelas1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_mapel1` FOREIGN KEY (`id_mapel_detail`) REFERENCES `mapel_detail` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mapel_detail`
--
ALTER TABLE `mapel_detail`
  ADD CONSTRAINT `fk_mapel_detail_guru1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mapel_detail_mapel1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_kelas1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_siswa1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `nilai_detail`
--
ALTER TABLE `nilai_detail`
  ADD CONSTRAINT `fk_nilai_detail_mapel1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nilai_detail_nilai1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rapot`
--
ALTER TABLE `rapot`
  ADD CONSTRAINT `fk_rapot_nilai1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_kelas1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_siswa_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
