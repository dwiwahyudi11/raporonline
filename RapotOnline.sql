-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table raport_online.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table raport_online.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int(10) unsigned NOT NULL,
  `id_kelas_wali` int(10) unsigned DEFAULT NULL,
  `nuptk` int(20) DEFAULT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(145) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `kontak` varchar(14) DEFAULT NULL,
  `status_kepegawaian` varchar(45) DEFAULT NULL,
  `jenis_ptk` varchar(45) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_guru_users1_idx` (`id_users`),
  KEY `fk_guru_kelas_idx` (`id_kelas_wali`),
  CONSTRAINT `fk_guru_kelas` FOREIGN KEY (`id_kelas_wali`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_guru_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.guru: ~3 rows (approximately)
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
REPLACE INTO `guru` (`id`, `id_users`, `id_kelas_wali`, `nuptk`, `nip`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `agama`, `kontak`, `status_kepegawaian`, `jenis_ptk`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 1, NULL, '6423451234124125', 'Samarinda', '1986-01-12', 'Jl. Siradj Salman', 'L', 'Islam', '081234567890', NULL, NULL, '6423451234124125_itc-logo.png', '2021-09-22 12:48:26', '2022-03-14 23:08:52', NULL),
	(2, 7, 3, NULL, '1231231234123123', 'Samarinda', '2021-10-07', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', 'L', 'Islam', '082157819525', NULL, NULL, NULL, '2021-09-30 16:10:39', '2021-12-13 05:46:30', NULL),
	(3, 20, 2, NULL, '123123123', 'Samarinda', '2021-12-04', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', 'L', 'Islam', '082157819525', NULL, NULL, NULL, '2021-12-12 18:10:49', '2021-12-13 05:45:50', NULL),
	(4, 21, 5, NULL, '23456346456456', 'Samarinda', '1996-01-12', 'Jl. Manunggal II, Gg. Jambu RT. 02', 'L', 'Islam', '085250521249', NULL, NULL, '23456346456456_ABUIABACGAAg1qv5hAYo29TvBjDoBzjoBw-removebg-preview.png', '2022-03-14 23:18:38', '2022-03-14 23:18:38', NULL);
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

-- Dumping structure for table raport_online.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_mapel_detail` int(10) unsigned NOT NULL,
  `id_kelas` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jadwal_kelas1_idx` (`id_kelas`),
  KEY `fk_jadwal_mapel1_idx` (`id_mapel_detail`),
  CONSTRAINT `fk_jadwal_kelas1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jadwal_mapel1` FOREIGN KEY (`id_mapel_detail`) REFERENCES `mapel_detail` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.jadwal: ~25 rows (approximately)
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
REPLACE INTO `jadwal` (`id`, `id_mapel_detail`, `id_kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 2, '2021-09-29 14:02:34', '2021-09-30 06:12:15', '2021-09-30 06:12:15'),
	(3, 1, 8, '2021-09-29 14:02:34', '2021-09-30 06:55:16', '2021-09-30 06:55:16'),
	(4, 1, 3, '2021-09-30 06:12:23', '2021-09-30 06:55:16', '2021-09-30 06:55:16'),
	(5, 1, 4, '2021-09-30 06:12:23', '2021-09-30 06:55:16', '2021-09-30 06:55:16'),
	(6, 1, 5, '2021-09-30 06:12:23', '2021-09-30 06:55:16', '2021-09-30 06:55:16'),
	(7, 1, 1, '2021-09-30 06:55:16', '2021-09-30 06:55:16', NULL),
	(8, 1, 2, '2021-09-30 16:02:23', '2021-09-30 16:02:23', NULL),
	(9, 1, 3, '2021-09-30 16:02:23', '2021-09-30 16:02:23', NULL),
	(10, 1, 4, '2021-09-30 16:02:23', '2021-09-30 16:02:23', NULL),
	(11, 2, 3, '2021-09-30 16:10:56', '2021-09-30 16:10:56', NULL),
	(12, 2, 4, '2021-09-30 16:21:36', '2021-09-30 16:21:36', NULL),
	(13, 2, 5, '2021-09-30 16:23:34', '2021-09-30 16:23:34', NULL),
	(14, 3, 1, '2021-09-30 23:58:24', '2021-09-30 23:58:24', NULL),
	(15, 3, 2, '2021-09-30 23:58:24', '2021-09-30 23:58:24', NULL),
	(16, 3, 3, '2021-10-17 17:39:58', '2021-10-17 17:39:58', NULL),
	(17, 3, 4, '2021-10-17 17:39:58', '2021-10-17 17:39:58', NULL),
	(18, 3, 5, '2021-10-17 17:39:58', '2021-10-17 17:39:58', NULL),
	(19, 3, 6, '2021-10-17 17:39:58', '2021-10-17 17:39:58', NULL),
	(20, 4, 1, '2021-10-17 17:42:50', '2021-10-17 17:42:50', NULL),
	(21, 4, 2, '2021-10-17 17:42:50', '2021-10-17 17:42:50', NULL),
	(22, 4, 3, '2021-10-17 17:42:50', '2021-10-17 17:42:50', NULL),
	(23, 4, 4, '2021-10-17 17:42:50', '2021-10-17 17:42:50', NULL),
	(24, 4, 5, '2021-10-17 17:42:50', '2021-10-17 17:42:50', NULL),
	(25, 5, 1, '2022-01-04 19:13:53', '2022-01-04 19:13:53', NULL),
	(26, 5, 2, '2022-01-04 19:13:53', '2022-01-04 19:13:53', NULL);
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;

-- Dumping structure for table raport_online.jadwal_upload
CREATE TABLE IF NOT EXISTS `jadwal_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table raport_online.jadwal_upload: ~2 rows (approximately)
/*!40000 ALTER TABLE `jadwal_upload` DISABLE KEYS */;
REPLACE INTO `jadwal_upload` (`id`, `file`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '616c762e5d617_element.png', '', '2021-10-17 19:14:54', '2021-10-17 19:14:58', '2021-10-17 19:14:58'),
	(2, '61d49e8ac23ca_67771582_123573445651226_1517320330628942209_n.jpg', 'tesss', '2021-12-12 17:46:30', '2022-01-04 19:24:23', NULL);
/*!40000 ALTER TABLE `jadwal_upload` ENABLE KEYS */;

-- Dumping structure for table raport_online.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kelas` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.kelas: ~8 rows (approximately)
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
REPLACE INTO `kelas` (`id`, `kelas`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'X IPA', '2021-09-19 00:11:07', '2021-09-19 00:11:07', NULL),
	(2, 'X IPS', '2021-09-26 18:43:45', '2021-09-26 18:43:45', NULL),
	(3, 'XI IPA', '2021-09-26 18:44:29', '2021-09-26 18:44:29', NULL),
	(4, 'XI IPS 1', '2021-09-26 18:45:15', '2021-09-26 18:45:15', NULL),
	(5, 'XI IPS 2', '2021-09-26 18:45:22', '2021-09-26 18:45:23', NULL),
	(6, 'XII IPA', '2021-09-26 18:45:34', '2021-09-26 18:45:34', NULL),
	(7, 'XII IPS 1', '2021-09-26 18:45:50', '2021-09-26 18:45:50', NULL),
	(8, 'XII IPS 2', '2021-09-26 18:45:56', '2021-09-26 18:45:56', NULL);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table raport_online.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mata_pelajaran` varchar(145) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.mapel: ~25 rows (approximately)
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
REPLACE INTO `mapel` (`id`, `mata_pelajaran`, `semester`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Bahasa Inggris', '1', '2021-09-21 23:14:00', '2021-09-22 12:40:46', NULL),
	(2, 'Ekonomi Perminatan', '1', '2021-09-21 23:14:11', '2021-09-21 23:14:11', NULL),
	(3, 'Ekonomi Lintas Minat', '1', '2021-09-21 23:14:21', '2021-09-21 23:14:21', NULL),
	(4, 'PJOK', '1', '2021-09-21 23:14:30', '2021-09-21 23:14:30', NULL),
	(5, 'Pendidikan Agama Kristen', '1', '2021-09-21 23:14:42', '2021-09-21 23:14:42', NULL),
	(6, 'Pendidikan Pancasila dan Kewarganegaraan', '1', '2021-09-21 23:15:23', '2021-09-21 23:15:23', NULL),
	(7, 'Geografi Peminatan', '1', '2021-09-21 23:15:26', '2021-09-21 23:15:26', NULL),
	(8, 'Kimia Peminatan', '1', '2021-09-21 23:15:39', '2021-09-21 23:15:39', NULL),
	(9, 'Kimia Lintas Minat', '1', '2021-09-21 23:15:50', '2021-09-21 23:15:50', NULL),
	(10, 'Biologi Peminatan', '1', '2021-09-21 23:16:00', '2021-09-21 23:16:00', NULL),
	(11, 'Biologi Lintas Minat', '1', '2021-09-21 23:16:11', '2021-09-21 23:16:11', NULL),
	(12, 'Sejarah Indonesia', '1', '2021-09-21 23:16:56', '2021-09-21 23:16:56', NULL),
	(13, 'Seni Budaya', '1', '2021-09-21 23:17:06', '2021-09-21 23:17:06', NULL),
	(14, 'Prakarya dan Kewirausahaan', '1', '2021-09-21 23:17:20', '2021-09-21 23:17:20', NULL),
	(15, 'Bahasa Indonesia', '1', '2021-09-21 23:17:30', '2021-09-21 23:17:30', NULL),
	(16, 'Pendidikan Agama Katolik', '1', '2021-09-21 23:17:41', '2021-09-21 23:17:41', NULL),
	(17, 'Fisika Peminatan', '1', '2021-09-21 23:17:49', '2021-09-21 23:17:49', NULL),
	(18, 'Pendidikan Agama Islam', '1', '2021-09-21 23:18:36', '2021-09-21 23:18:36', NULL),
	(19, 'Sosiologi Peminiatan', '1', '2021-09-21 23:18:52', '2021-09-21 23:18:52', NULL),
	(20, 'Sosiologi Lintas Minat', '1', '2021-09-21 23:19:06', '2021-09-21 23:19:07', NULL),
	(21, 'Matematika Wajib', '1', '2021-09-21 23:19:21', '2021-09-21 23:19:21', NULL),
	(22, 'Sejarah Peminatan', '1', '2021-09-21 23:20:10', '2021-09-21 23:20:10', NULL),
	(23, 'Bimbingan Konseling', '1', '2021-09-21 23:20:30', '2021-09-21 23:20:30', NULL),
	(24, 'Matematika Peminatan', '1', '2021-09-21 23:21:13', '2021-09-21 23:21:13', NULL);
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;

-- Dumping structure for table raport_online.mapel_detail
CREATE TABLE IF NOT EXISTS `mapel_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_mapel` int(10) unsigned NOT NULL,
  `id_guru` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mapel_detail_mapel1_idx` (`id_mapel`),
  KEY `fk_mapel_detail_guru1_idx` (`id_guru`),
  CONSTRAINT `fk_mapel_detail_guru1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mapel_detail_mapel1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.mapel_detail: ~5 rows (approximately)
/*!40000 ALTER TABLE `mapel_detail` DISABLE KEYS */;
REPLACE INTO `mapel_detail` (`id`, `id_mapel`, `id_guru`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '2021-09-29 14:02:34', '2021-09-29 14:02:34', NULL),
	(2, 1, 2, '2021-09-30 16:10:56', '2021-09-30 16:10:56', NULL),
	(3, 2, 1, '2021-09-30 23:58:24', '2021-09-30 23:58:24', NULL),
	(4, 2, 2, '2021-10-17 17:42:50', '2021-10-17 17:42:50', NULL),
	(5, 3, 2, '2022-01-04 19:13:53', '2022-01-04 19:13:53', NULL);
/*!40000 ALTER TABLE `mapel_detail` ENABLE KEYS */;

-- Dumping structure for table raport_online.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_09_16_160409_create_permission_tables', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table raport_online.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table raport_online.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.model_has_roles: ~14 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
REPLACE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3),
	(3, 'App\\Models\\User', 4),
	(3, 'App\\Models\\User', 5),
	(3, 'App\\Models\\User', 6),
	(2, 'App\\Models\\User', 7),
	(3, 'App\\Models\\User', 10),
	(3, 'App\\Models\\User', 12),
	(3, 'App\\Models\\User', 13),
	(3, 'App\\Models\\User', 14),
	(3, 'App\\Models\\User', 16),
	(3, 'App\\Models\\User', 17),
	(2, 'App\\Models\\User', 20),
	(2, 'App\\Models\\User', 21);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table raport_online.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_siswa` int(10) unsigned NOT NULL,
  `id_kelas` int(10) unsigned NOT NULL,
  `semester` varchar(5) DEFAULT NULL,
  `sakit` int(2) DEFAULT NULL,
  `izin` int(2) DEFAULT NULL,
  `tanpa_keterangan` int(2) DEFAULT NULL,
  `catatan_wali_kelas` text,
  `link` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nilai_kelas1_idx` (`id_kelas`),
  KEY `fk_nilai_siswa1_idx` (`id_siswa`),
  CONSTRAINT `fk_nilai_kelas1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nilai_siswa1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.nilai: ~2 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
REPLACE INTO `nilai` (`id`, `id_siswa`, `id_kelas`, `semester`, `sakit`, `izin`, `tanpa_keterangan`, `catatan_wali_kelas`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 6, 1, '2', 1, 2, 1, 'wetfgwet', 'storage/rapot/1_Rapot_Ali.pdf', '2022-03-15 16:58:53', '2022-03-17 11:40:09', NULL),
	(2, 7, 1, '1', 2, 2, 2, 'wetwey', 'storage/rapot/2_Rapot_Eko-Pujianto.pdf', '2022-03-15 16:58:53', '2022-03-17 11:40:09', NULL);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table raport_online.nilai_detail
CREATE TABLE IF NOT EXISTS `nilai_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_nilai` int(10) unsigned NOT NULL,
  `id_mapel` int(10) unsigned NOT NULL,
  `tugas_satu` int(11) DEFAULT NULL,
  `tugas_dua` int(11) DEFAULT NULL,
  `tugas_tiga` int(11) DEFAULT NULL,
  `tugas_empat` int(11) DEFAULT NULL,
  `tugas_lima` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `nilai_huruf` varchar(5) DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nilai_detail_nilai1_idx` (`id_nilai`),
  KEY `fk_nilai_detail_mapel_idx` (`id_mapel`),
  CONSTRAINT `fk_nilai_detail_mapel1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nilai_detail_nilai1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.nilai_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `nilai_detail` DISABLE KEYS */;
REPLACE INTO `nilai_detail` (`id`, `id_nilai`, `id_mapel`, `tugas_satu`, `tugas_dua`, `tugas_tiga`, `tugas_empat`, `tugas_lima`, `uts`, `uas`, `nilai_akhir`, `nilai_huruf`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 89, 88, 87, 78, 67, 98, 80, 84, 'C', 'sdfasef', '2022-03-15 16:58:53', '2022-03-15 16:58:53', NULL),
	(2, 2, 1, 90, 98, 88, 87, 78, 70, 90, 86, 'B', 'sedfsetf', '2022-03-15 16:58:53', '2022-03-15 16:58:53', NULL);
/*!40000 ALTER TABLE `nilai_detail` ENABLE KEYS */;

-- Dumping structure for table raport_online.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table raport_online.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table raport_online.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table raport_online.rapot
CREATE TABLE IF NOT EXISTS `rapot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_nilai` int(10) unsigned NOT NULL,
  `sakit` int(2) DEFAULT NULL,
  `izin` int(2) DEFAULT NULL,
  `tanpa_keterangan` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rapot_nilai1_idx` (`id_nilai`),
  CONSTRAINT `fk_rapot_nilai1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.rapot: ~0 rows (approximately)
/*!40000 ALTER TABLE `rapot` DISABLE KEYS */;
/*!40000 ALTER TABLE `rapot` ENABLE KEYS */;

-- Dumping structure for table raport_online.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'web', '2021-09-20 21:00:22', '2021-09-20 21:00:22'),
	(2, 'Guru', 'web', '2021-09-20 21:00:33', '2021-09-20 21:00:33'),
	(3, 'Siswa', 'web', '2021-09-20 21:00:45', '2021-09-20 21:00:45');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table raport_online.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table raport_online.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_users` int(10) unsigned NOT NULL,
  `id_kelas` int(10) unsigned NOT NULL,
  `foto` text,
  `nipd` int(5) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `nisn` int(11) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `kontak` varchar(14) DEFAULT NULL,
  `alamat` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_siswa_users1_idx` (`id_users`),
  KEY `fk_siswa_kelas1_idx` (`id_kelas`),
  CONSTRAINT `fk_siswa_kelas1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_siswa_users1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table raport_online.siswa: ~3 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
REPLACE INTO `siswa` (`id`, `id_users`, `id_kelas`, `foto`, `nipd`, `jenis_kelamin`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `nik`, `agama`, `kontak`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, 14, 1, '123123123_itc-logo.png', 1231, 'L', 123123123, 'Samarinda', '2021-12-01', NULL, 'Islam', '082157819525', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', '2021-12-12 17:26:19', '2022-03-14 14:14:47', NULL),
	(7, 16, 1, '123123_tips_2.png', 1231, 'L', 123123, 'Samarinda', '2021-12-02', NULL, 'Islam', '082157819525', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', '2021-12-12 17:33:05', '2021-12-12 17:33:05', NULL),
	(8, 17, 8, '123123_PROMOTG.jpg', 1231, 'L', 123123, 'Samarinda', '2021-12-07', NULL, 'Islam', '082157819525', 'Jl. P.Suryanata No.83 RT. 57, Air Putih, Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75243, Indonesia\r\nServis HP Dan Laptop Nyervisga', '2021-12-12 17:41:48', '2021-12-12 17:41:48', NULL);
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table raport_online.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table raport_online.users: ~7 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$XU9x.Hq2r6.v4/AR81CwoeMDhBbr5EV8/cw24hJ7IyfnawtmEDRAu', NULL, '2021-09-16 15:46:14', '2021-09-21 00:32:05', NULL),
	(3, 'Polo Admini', 'guru@gmail.com', NULL, '$2y$10$XU9x.Hq2r6.v4/AR81CwoeMDhBbr5EV8/cw24hJ7IyfnawtmEDRAu', NULL, '2021-09-22 12:48:26', '2021-12-12 18:16:56', NULL),
	(7, 'Eko Pujianto', 'ekopujianto48@gmail.com', NULL, '$2y$10$xIMJCYSAI5mD7wdMYTn24uUZm84ZEH.p4GrR0fjbfi9O.MtRGg8VC', NULL, '2021-09-30 16:10:39', '2021-12-13 05:46:30', NULL),
	(14, 'Ali', 'ali@gmail.com', NULL, '$2y$10$c7vFa60uUjdwH14JwmRk2ej/NkBXG5zF8veFkEpKIyg1sOJ5PBVS6', NULL, '2021-12-12 17:26:19', '2022-03-14 14:14:47', NULL),
	(16, 'Eko Pujianto', 'siswaeko@gmail.com', NULL, '$2y$10$o0PknKbTuLoE9XTbWXR5nesXMB6IotNfRPws7eSRx7fsjzsVlZ1KW', NULL, '2021-12-12 17:33:05', '2021-12-12 17:33:05', NULL),
	(17, 'Teno', 'teno@gmail.com', NULL, '$2y$10$Ww1Y7YnJcV5Mz2t8SC6ek.NYEDhJU52XsbFR1xnIvv9UNmJNdFPqS', NULL, '2021-12-12 17:41:48', '2021-12-12 17:41:48', NULL),
	(20, 'Wahyu', 'wahyu@gmail.com', NULL, '$2y$10$o5mjOVD9vhZ3vSXdNmtu3O/MKvgApu7HqMnNqWgVqoV0UopUsBz92', NULL, '2021-12-12 18:10:49', '2021-12-13 05:45:50', NULL),
	(21, 'Ardiansyah, S. Pd', 'ardiansyah@gmail.com', NULL, '$2y$10$yTRqV02V8WUYJIIxUSTp8ed4bHvICo2Cx7lXHWrY7mpNdc3jkuNsO', NULL, '2022-03-14 23:18:38', '2022-03-14 23:18:38', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
