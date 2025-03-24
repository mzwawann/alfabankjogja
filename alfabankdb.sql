-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2025 at 04:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfabankdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('1574bddb75c78a6fd2251d61e2993b5146201319', 'i:2;', 1730259378),
('1574bddb75c78a6fd2251d61e2993b5146201319:timer', 'i:1730259378;', 1730259378),
('5b384ce32d8cdef02bc3a139d4cac0a22bb029e8', 'i:1;', 1730778922),
('5b384ce32d8cdef02bc3a139d4cac0a22bb029e8:timer', 'i:1730778922;', 1730778922),
('98fbc42faedc02492397cb5962ea3a3ffc0a9243', 'i:3;', 1730795570),
('98fbc42faedc02492397cb5962ea3a3ffc0a9243:timer', 'i:1730795570;', 1730795570),
('af3e133428b9e25c55bc59fe534248e6a0c0f17b', 'i:1;', 1730794069),
('af3e133428b9e25c55bc59fe534248e6a0c0f17b:timer', 'i:1730794069;', 1730794069),
('bd307a3ec329e10a2cff8fb87480823da114f8f4', 'i:1;', 1730191579),
('bd307a3ec329e10a2cff8fb87480823da114f8f4:timer', 'i:1730191579;', 1730191579),
('ca3512f4dfa95a03169c5a670a4c91a19b3077b4', 'i:3;', 1730793926),
('ca3512f4dfa95a03169c5a670a4c91a19b3077b4:timer', 'i:1730793926;', 1730793926),
('fb644351560d8296fe6da332236b1f8d61b2828a', 'i:1;', 1730795664),
('fb644351560d8296fe6da332236b1f8d61b2828a:timer', 'i:1730795664;', 1730795664);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'Web-Design', 'red', '2024-07-16 08:36:13', '2024-07-16 08:36:13'),
(1, 'Web Design', 'Web-Design', 'red', '2024-07-16 08:36:13', '2024-07-16 08:36:13'),
(1, 'Web Design', 'Web-Design', 'red', '2024-07-16 08:36:13', '2024-07-16 08:36:13'),
(1, 'Web Design', 'Web-Design', 'red', '2024-07-16 08:36:13', '2024-07-16 08:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `course_registrations`
--

CREATE TABLE `course_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `ketentuan_dan_kebijakan` varchar(41) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk_siswa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(17) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_orangtua` varchar(17) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `akun_instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah_kampus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bekerja_di` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_program` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_pembelajaran` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_studi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_pilihan` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai_pendidikan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alat_transportasi` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KIP` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KPS` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_registrations`
--

INSERT INTO `course_registrations` (`id`, `ketentuan_dan_kebijakan`, `nomor_induk_siswa`, `kode_kelas`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat_lengkap`, `photo_ktp`, `telepon`, `telepon_orangtua`, `akun_instagram`, `status`, `asal_sekolah_kampus`, `pekerjaan`, `bekerja_di`, `jenis_program`, `model_pembelajaran`, `program_studi`, `jam_pilihan`, `mulai_pendidikan`, `informasi`, `nama_ibu`, `nama_ayah`, `alat_transportasi`, `KIP`, `KPS`, `created_at`, `updated_at`) VALUES
(1, 'Menyetujui ketentuan dan kebijakan kursus', '16652', 'XIIRPL2', 'Kurniawan firdaus', 'Bantul', '2006-06-28', 'Laki-laki', 'Kristen', 'grogol 8, parangtritis, kretek, bantul, yogyakarta', 'photo_ktp/1729743631_034736000_1521812438-ktp.webp', '+62895390631152', '0895415532140', '@kurniawanfird', 'Masih sekolah', 'SMKN 1 Bantul', 'Pelajar', 'Magang di alfabank', 'Reguler', 'Offline di alfabank', 'Web design & programming', '09:00', '2024-10-28', 'Teman', 'wahyuana', 'nugraheni lisniyati', 'Sepeda motor', 'Tidak', 'Tidak', '2024-10-24 04:20:31', '2024-10-24 04:23:29'),
(2, 'Menyetujui ketentuan dan kebijakan kursus', '16653', 'XIIRPL2', 'William arrom', 'Giwangan', '2007-10-15', 'Laki-laki', 'Khatolik', 'Giwangan, umbulharjo', 'photo_ktp/6M9cpFwz4fT9F9nwQx0ZPvLXZ4AeYS98cWQfxF9Z.png', '+62897896389976', '09872324232233', '@prb.ron', 'Bekerja', 'UGM', 'Karyawan swasta', 'Alfabank jogja', 'Reguler', 'Offline di alfabank', 'Web design & programming', '14:00', '2024-10-28', 'Teman', 'embuh', 'radong', 'Sepeda motor', 'Ya', 'Tidak', '2024-10-24 07:52:32', '2024-10-30 09:43:38'),
(5, 'Menyetujui ketentuan dan kebijakan kursus', '16655', 'XIIRPL2', 'Zazkia ramadani', 'Sleman', '2007-09-20', 'Laki-laki', 'Kristen', 'Semampir, rt 3, panjangrejo, pundong, bantul', 'photo_ktp/1730362965_Screenshot (110).png', '+620895415532140', '0895415532140', '@zazkiarmdni', 'Masih sekolah', 'SMKN 1 Bantul', 'Pelajar', 'belum bekerja', 'Reguler', 'Offline di alfabank', 'Web design & programming', '15:00', '2024-11-04', 'Website', 'embuh', 'justin bieber', 'Sepeda motor', 'Ya', 'Tidak', '2024-10-31 08:22:45', '2024-10-31 08:24:34'),
(8, 'Menyetujui ketentuan dan kebijakan kursus', '1665786', 'XIIRPL2', 'Kurniawan Firdaus', 'Bantul', '2024-11-05', 'Perempuan', 'Khonghucu', 'Grogol 8, parangtritis, kretek, bantul, yogyakarta', 'photo_ktp/1732171604_Screenshot 2024-11-07 103453.png', '+62896544467687', '086543446787', '@kurniawanfird', 'Masih sekolah', 'SMKN 1 Bantul', 'Pelajar', 'PT wawan', 'Reguler', 'Offline di alfabank', 'Accurate marketing', '21:00', '2024-11-23', 'Facebook', 'septi', 'wahyuana', 'Jalan kaki', 'Tidak', 'Tidak', '2024-11-21 06:46:44', '2024-11-21 06:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kursus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pendidikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahu_alfabank_dari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tujuan_motivasi_kursus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FU` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `name`, `telepon`, `kursus`, `status_pendidikan`, `tahu_alfabank_dari`, `tujuan_motivasi_kursus`, `status`, `FU`, `created_at`, `updated_at`) VALUES
(1, 'zazkiarmdni', '+62895415532140', 'Administrasi perkantoran', 'Masih sekolah', 'Website', 'Administrasi perkantoran', 'Her', NULL, '2024-10-17 03:03:25', '2024-10-24 04:24:50'),
(2, 'kurniawan firdaus', '+62895390631152', 'Web design & programming', 'Masih kuliah', 'Alumni Alfabank', 'Web design & programming', 'Her', NULL, '2024-10-17 03:04:16', '2024-10-22 03:31:40'),
(3, 'kurniawan firdaus', '+62895390631152', 'Microsoft office', 'Masih kuliah', 'Google', 'Microsoft office', 'Info', NULL, '2024-10-22 09:26:17', '2024-10-22 09:26:17'),
(4, 'speed', '+62896415532140', 'Teknik gambar design bangunan', 'Masih kuliah', 'Keluarga', 'Teknik gambar design bangunan', 'Info', NULL, '2024-10-22 09:33:45', '2024-10-22 09:33:45'),
(5, 'zazkiarmdni', '+62895415532140', 'Administrasi perkantoran', 'Masih kuliah', 'Brosur', 'Administrasi perkantoran', 'Info', NULL, '2024-10-30 08:20:59', '2024-10-30 08:20:59'),
(6, 'Elsa', '+62895415532140', 'Lainnya', 'Sudah bekerja', 'Alumni Alfabank', 'Lainnya', 'Her', NULL, '2024-11-04 04:49:57', '2024-11-04 04:50:09'),
(7, 'Arron', '+62895415532140', 'Web design & programming', 'Sudah bekerja', 'Youtube', 'Web design & programming', 'Info', NULL, '2024-11-20 03:30:53', '2024-11-20 03:30:53'),
(8, 'zazkiarmdni', '+620896415532140', 'rekayasa perangkat lunak', 'Lulus kuliah', NULL, NULL, 'Info', NULL, '2024-11-21 06:49:47', '2024-11-21 06:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `informen`
--

CREATE TABLE `informen` (
  `id` int NOT NULL,
  `month` varchar(255) NOT NULL,
  `amount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `informen`
--

INSERT INTO `informen` (`id`, `month`, `amount`) VALUES
(1, 'January', 800),
(2, 'February', 900),
(3, 'March', 850);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas_berjalans`
--

CREATE TABLE `kelas_berjalans` (
  `id` int NOT NULL,
  `month` varchar(255) NOT NULL,
  `amount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas_berjalans`
--

INSERT INTO `kelas_berjalans` (`id`, `month`, `amount`) VALUES
(1, 'January', 700),
(2, 'February', 750),
(3, 'March', 720);

-- --------------------------------------------------------

--
-- Table structure for table `ketentuan_dan_kebijakan_kursus`
--

CREATE TABLE `ketentuan_dan_kebijakan_kursus` (
  `id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ketentuan_dan_kebijakan_kursus`
--

INSERT INTO `ketentuan_dan_kebijakan_kursus` (`id`, `file_path`, `created_at`, `updated_at`) VALUES
(13, 'file_path/KETENTUAN DAN KEBIJAKAN PRIVAT.pdf', '2024-10-18 06:26:45', '2024-10-18 06:26:45'),
(14, 'file_path/KETENTUAN DAN KEBIJAKAN KELAS REGULER.pdf', '2024-10-18 06:27:40', '2024-10-18 06:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` int NOT NULL,
  `month` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `month`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Administrasi Perkantoran', 400, '2024-08-21 09:36:04', '2024-08-21 09:36:04'),
(14, 'Desain Grafis', 380, '2024-08-20 06:30:13', '2024-08-20 06:30:13'),
(15, 'Microsoft Office', 450, '2024-08-20 06:30:23', '2024-08-20 06:30:23'),
(16, 'Perancangan Struktur Bangunan Bertingkat', 430, '2024-08-20 06:30:32', '2024-08-20 06:30:32'),
(17, 'Teknik Gambar Bangunan', 440, '2024-08-20 06:30:48', '2024-08-20 06:30:48'),
(25, 'Administrasi Perkantoran', 200, '2024-08-20 06:29:56', '2024-08-20 06:29:56');

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
(1, '0001_01_01_000000_create_users_table', 1),
(5, '2024_08_22_041946_create_pendaftaran_kursus_siswa_table', 2),
(6, '2024_08_22_082317_create_courses_table', 3),
(7, '2024_08_26_073200_add_photo_on_course_registrations_table', 4),
(8, '2024_08_27_041031_create_course_registrations_table', 5),
(9, '2024_08_28_033355_create_course_registrations_table', 6),
(10, '2024_08_28_034531_create_course_registrations_table', 7),
(11, '2024_08_14_043822_create_guests_table', 8),
(12, '2024_09_17_150536_add_unique_to_telepon_in_guests_table', 9),
(13, '2024_09_23_102629_add_tanggal_lahir_to_course_registrations_table', 10),
(14, '2024_09_23_103253_add_tanggal_lahir_to_course_registrations_table', 11),
(15, '2024_09_23_104727_add_jenis_kelamin_to_course_registrations_table', 12),
(16, '2024_09_23_110335_add_agama_table_to_course_registrations_table', 13),
(17, '2024_09_23_111418_add_alamat_lengkap_to_course_registrations_table', 14),
(18, '2024_09_23_112432_add_telepon_to_course_registrations_table', 15),
(19, '2024_09_23_141858_add_telepon_orangtua_to_course_registrations_table', 16),
(20, '2024_09_23_143758_add_akun_instagram_to_course_registrations_table', 17),
(21, '2024_09_23_150106_add_status_to_course_registrations_table', 18),
(22, '2024_09_23_153734_add_asal_sekolah_kampus_to_course_registrations_table', 19),
(23, '2024_09_23_154214_add_pekerjaan_to_course_registrations_table', 20),
(24, '2024_09_23_155117_add_bekerja_di_to_course_registrations_table', 21),
(25, '2024_10_01_111301_add_photo_ktp_on_course_registrations_table', 22),
(26, '2024_10_16_160350_create_ketentuan_dan_kebijakan_kursus_table', 23),
(27, '2024_10_22_112329_add_course_terms_intro_to_settings_table', 24),
(28, '2024_10_22_144226_add_course_terms_intro_to_ketentuan_dan_kebijakan_kursus_table', 25),
(29, '2024_10_22_144911_create_course_terms_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `omsets`
--

CREATE TABLE `omsets` (
  `id` int NOT NULL,
  `month` varchar(255) NOT NULL,
  `amount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `omsets`
--

INSERT INTO `omsets` (`id`, `month`, `amount`) VALUES
(1, 'January', 1500),
(2, 'February', 1300),
(3, 'March', 1400);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author_id`, `category_id`, `slug`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Geser Jepang, China Jadi Pengekspor Mobil Terbesar Dunia', 6, 1, 'Geser-Jepang-,-China-Jadi-Pengekspor-Mobil-Terbesar-Dunia', 'JAKARTA, KOMPAS.com - China benar-benar melakukan ekspansi besar-besaran di sektor otomotif dengan mengekspor banyak kendaraan ke berbagai negara. Bahkan, China tercatat berhasil menjadi pengekspor kendaraan terbesar pada 2023 dan kemungkinan besar di tahun ini. \r\nDikutip dari Carscoops.com, Kamis (8/8/2024), China mampu mengalahkan Jepang dalam jumlah ekspor kendaraan. Berdasarkan data dari Japan Automobile Manufacturers Association (JAMA), pada semester I/2024, total ekspornya mencapai 2,02 juta unit. \r\nJumlah tersebut menurun 0,3 persen dibandingkan tahun lalu. Detailnya sendiri terdiri dari 1,83 juta kendaraan penumpang dan 187.000 kendaraan niaga. Lihat Foto Kapal pengangkut mobil (car carrier) milik BYD yang bernama BYD Explorer No. 1(Dok. Asia.nikkei.com) Selama periode Januari-Juni, pabrikan dari Tiongkok mengekspor lebih dari 2,79 juta kendaraan. Jumlah ini mengalami peningkatan 31 persen dan terdiri dari 2,34 juta kendaraan penumpang dan 450.000 kendaraan niaga.\r\nTercatat ada lima perusahaan otomotif raksasa di China yang memiliki jumlah ekspor terbesar pada semester I/2024, yakni Chery Automobile dengan 532.000 unit, SAIC Motor Corp dengan 439.000 unit, Changan Automobile Co dengan 285.000 unit, Geely dengan 242.000 unit, dan BYD dengan 207.000 unit. \r\nEkspor mobil listrik BYD dari China ke berbagai negara di Eropa, Timur Tengah, dan Asia(Dok. Insideevs.com) Tahun lalu, merek otomotif China berhasil membukukan jumlah ekspor sebesar 5,26 juta unit. Jika China mampu mempertahankan penjualannya, bukan tidak mungkin pada akhir tahun ini jumlah ekspornya mencapai 5,58 juta unit. Pada pasar otomotif nasional, jumlah pabrikan China juga terus bertambah, mulai dari Wuling, DFSK, Chery, Great Wall Motor, Neta, BYD, Jaecoo, GAC Aion, dan BAIC. Mayoritas memasarkan kendaraan elektrifikasi, baik mobil hybrid maupun mobil listrik.\r\n', '2024-07-16 01:36:14', '2024-07-16 01:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `amount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `month`, `amount`) VALUES
(1, 'Januari', 800),
(2, 'Februari', 1500),
(3, 'Maret', 1200),
(4, 'April', 1800),
(5, 'Mei', 8000),
(6, 'Juni', 3005),
(7, 'July', 4000),
(8, 'Agustus', 6000),
(9, 'September', 2000),
(10, 'Oktober', 6043),
(11, 'November', 1300),
(12, 'Desember', 1600);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ivp4xCZUR1RArT8KQQiDYjm8bXnijYpXM5JVKTZu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjJYSVRQNFd1cnlFbjN5d3luSW13dURBa1FkbnNFaHBWY1RDZ2ppWiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2FsZmFiYW5ram9namEudGVzdDo4MDgwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9hbGZhYmFua2pvZ2phLnRlc3Q6ODA4MC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741310306),
('jKMOhSpBZJSbxf5hop79bFMzk9tduIK6qR0ut4VL', 53, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUVg2RG54QVU3eWszOTFZVmNwWUtTbzdHWVNqNW50dUM0VEp1UkpDciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2FsZmFiYW5ram9namEudGVzdDo4MDgwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9hbGZhYmFua2pvZ2phLnRlc3Q6ODA4MC9rZXVhbmdhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjUzO30=', 1741221480),
('wfV6kfQtP59JRxBCESpvFxu2HVzjEobBe8n6n1G6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRmo5UXhhVjc2TGVWdWJSUjNnblMwMDZvbjNKanJieDlURnk4TTgycyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovL2FsZmFiYW5ram9namEudGVzdDo4MDgwIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9hbGZhYmFua2pvZ2phLnRlc3Q6ODA4MC9sb2dpbiI7fX0=', 1741742083);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','marketing','akademik','keuangan','logistik') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'marketing',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `photo`, `created_at`, `updated_at`) VALUES
(5, 'kurniawan firdaus', 'mzwawann', 'kf75545@gmail.com', '2024-08-06 02:03:41', '$2y$12$pEs0/lcibsMA5zG4Q7OezuyXmwIQGTVQQndQl6kmaL.gfwBAl44Ly', 'admin', 'gsP6hTrNfzxVkdYv03BzIyhBsWtxR9PnifwKe1EJAF6mA8DXmtkk78rcWQax', NULL, '2024-08-06 02:03:01', '2024-10-31 04:51:05'),
(6, 'kiaaaaaa', 'zazkiarmdni', 'kurniawanfirdaus2806@gmail.com', '2024-08-06 20:15:33', '$2y$12$2iQpkLj6dT9hoR.fN2FmMOs86pLEyKbynHsQv3ZBKujp8RXqTbRi2', 'admin', 'QEO4MEHJPRzjz2mwHidunXuaNxc1kf2otFjR6VUw6pio7MfKEITkAc7HBgm5', NULL, '2024-08-06 20:13:49', '2024-09-04 19:57:13'),
(8, 'williamm', 'arronpelo', 'arrongg6156@gmail.com', '2024-08-08 04:42:16', '$2y$12$nulonvyqy3gOujm5QYRfBOYitnUEjd.Ohjj26LnEYnzHl0ulVAFfC', 'marketing', 'HySqsZ6PzXw6WD5z5Gtk6jU9Y4VVAFHUEO2IcvdPSY0n2rEUryz4TY4OosS4', NULL, '2024-08-07 21:34:33', '2024-08-07 21:34:33'),
(12, 'wawannkiaaaaaa', 'wawannnpunyaaakiaaaaaa', 'kiaaaa@gmail.com', '2024-08-28 09:31:41', '$2y$12$D0d0mcnlH0EQ.nVgx8CqSuWsvxsAEZV4iUP44k6ztZTMZRtKjhyZ.', 'marketing', '0LzGWmItx8tAK1OeLQWzKyTVfM7uD97bz1HXKJGbAFNRckvXol5KA9bHGc0u', NULL, '2024-08-28 02:30:58', '2024-08-28 02:30:58'),
(53, 'wn', 'wawangtggg', 'firdauswwankurniawn@gmail.com', NULL, '$2y$12$EQY/IxKOXdY622RBQgOac.5MJPXquj.8Ls4q/OMdo2nVDWPtnPwXW', 'keuangan', NULL, NULL, '2025-03-05 16:35:28', '2025-03-05 16:35:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `course_registrations`
--
ALTER TABLE `course_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_induk_siswa` (`nomor_induk_siswa`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informen`
--
ALTER TABLE `informen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_berjalans`
--
ALTER TABLE `kelas_berjalans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketentuan_dan_kebijakan_kursus`
--
ALTER TABLE `ketentuan_dan_kebijakan_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `omsets`
--
ALTER TABLE `omsets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_author_id` (`author_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_registrations`
--
ALTER TABLE `course_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `informen`
--
ALTER TABLE `informen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_berjalans`
--
ALTER TABLE `kelas_berjalans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ketentuan_dan_kebijakan_kursus`
--
ALTER TABLE `ketentuan_dan_kebijakan_kursus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `omsets`
--
ALTER TABLE `omsets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
