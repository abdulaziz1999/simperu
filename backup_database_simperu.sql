-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 02:41 PM
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
-- Database: `simperu`
--

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
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `ruangan_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `nama_fasilitas`, `foto`, `keterangan`, `ruangan_id`, `updated_at`, `created_at`) VALUES
(26, 'Wifi', '20220718080607.wifi-router.svg', 'Wifi', 31, '2022-07-18 01:06:07', '2022-07-17 17:44:47'),
(27, 'Bebas Asap Rokok', '20220718080619.no-smoking.svg', 'Bebas Asap Rokok', 31, '2022-07-18 01:06:19', '2022-07-17 17:45:48'),
(28, 'Proyektor Gratis', '20220718080637.projector.svg', 'Proyektor Gratis', 31, '2022-07-18 01:06:37', '2022-07-17 17:46:55'),
(29, 'Gratis Makan dan Minum', '20220718080658.fast-food.svg', 'Gratis Makan dan Minum', 31, '2022-07-18 01:06:58', '2022-07-17 17:47:39'),
(30, 'Keamanan 1 x 24 Jam', '20220718080716.cyber-security.svg', 'Keamanan 1 x 24 Jam', 31, '2022-07-18 01:07:16', '2022-07-17 17:48:20'),
(31, 'Gratis Papan Tulis dan Alat Tulis Lainnya', '20220718080727.blackboard.svg', 'Gratis Papan Tulis dan Alat Tulis Lainnya', 31, '2022-07-18 01:07:27', '2022-07-17 17:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `keterangan_feedback` text NOT NULL,
  `poin` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `keterangan_feedback`, `poin`, `updated_at`, `created_at`) VALUES
(4, 'Kerenn euyyyy!', 4, '2022-07-18 07:45:15', '2022-07-18 04:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `nama_gedung` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `link_gmaps` varchar(75) DEFAULT NULL,
  `link_iframe_gmaps` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id`, `kode`, `nama_gedung`, `foto`, `alamat`, `link_gmaps`, `link_iframe_gmaps`, `updated_at`, `created_at`) VALUES
(9, '00001', 'Mutiara Batu Ceper', '20220717140716.g_mutiara_batu_ceper.jpg', 'Jalan Daan Mogot KM. 21, Komplek Ruko Batu Ceper Permai Blok V No. 11, Tangerang', 'https://goo.gl/maps/s7pbKzGdNNFKqem79', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7601716045197!2d106.66532871476888!3d-6.162865195538095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f8f4e7bfffff%3A0x2e4dc2788b66b357!2sMutiara%20Batu%20Ceper%20by%20TwoSpaces%20(Syariah)!5e0!3m2!1sid!2sid!4v1658119943472!5m2!1sid!2sid', '2022-07-17 07:07:16', '2022-07-17 07:07:16'),
(10, '00002', 'Mutiara Bintaro', '20220717140837.g_mutiara_bintaro.jpg', 'Jl. Utama I No.67, kavling deplu. Mutiara Residence V no 6. Pd. Karya Pd. Aren, Pondok Karya, Larangan, South Tangerang City, Banten 15155', 'https://goo.gl/maps/CiGvuSRibgHYbnGS9', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.071503656095!2d106.73909331476928!3d-6.254310095472953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f08c20f6c1a5%3A0xcc9fe71df0328b06!2sMutiara%20Bintaro%20by%20TwoSpaces!5e0!3m2!1sid!2sid!4v1658042176938!5m2!1sid!2sid', '2022-07-17 07:08:37', '2022-07-17 07:08:37'),
(11, '00003', 'BSD XIV', '20220717141155.g_two_spaces.jpg', 'Ruko Casa De Parco No. 20 BSD City, Tangerang 15345', 'https://g.page/apartemen-casa-de-parco?share', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6806576578642!2d106.6496680147696!3d-6.305621095436409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e54b65211bb7%3A0x80b5fdbbd16250ca!2sApartemen%20Casa%20de%20Parco!5e0!3m2!1sid!2sid!4v1658042292391!5m2!1sid!2sid', '2022-07-17 07:11:55', '2022-07-17 07:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_ruangan`
--

CREATE TABLE `kategori_ruangan` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(45) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_ruangan`
--

INSERT INTO `kategori_ruangan` (`id`, `nama_kategori`, `keterangan`, `updated_at`, `created_at`) VALUES
(9, 'Hot Desk', 'Meja kerja bersama yang dapat disewa untuk keperluan pribadi dan dapat dipesan per 5 jam, harian, bulanan, atau bahkan tahunan.', '2022-07-17 06:56:53', '2022-07-17 06:56:53'),
(10, 'Shared Desk', 'Shared desk merupakan tempat kerja berbagi di mana satu workstation dapat ditempati oleh lebih dari satu orang. Nikmati efektifitas bekerja dalam kelompok dan tim anda lewat kolaborasi di shared desk yang dapat disewa bulanan.', '2022-07-17 06:57:29', '2022-07-17 06:57:29'),
(11, 'Meeting Room', 'Ruang meeting kami dapat digunakan untuk bertemu dan berdiskusi dengan kolega anda. Lokasinya menyebar di Jakarta dan Tangerang. Dapatkan berbagai pilihan ruangan sesuai dengan jumlah peserta meeting.', '2022-07-17 06:58:16', '2022-07-17 06:58:16'),
(12, 'Private Office', 'Untuk kebutuhan ruang kerja dengan privasi, Anda bisa menyewa ruang kantor pribadi atau private office. Temukan harga terbaik untuk kantor Anda sesuai dengan kapasitas yang dibutuhkan, di lokasi paling nyaman untuk anda dan team, yang dapat dipesan harian maupun bulanan.', '2022-07-17 06:58:35', '2022-07-17 06:58:35'),
(13, 'Event Space', 'Manfaatkan ruang serbaguna kami untuk berbagai acara kantor ataupun organisasi anda. Service ini dapat dipesan berikut dengan makan siang dan/ coffee break.', '2022-07-17 06:58:52', '2022-07-17 06:58:52'),
(14, 'Training Space', 'Sewa ruang co-training kami untuk pelatihan dan webinar dengan fasilitas terbaik sangat cocok bagi Anda yang menjadi host webinar. Event dan acara Anda otomatis akan dipromosikan di aplikasi dan media sosial kami.', '2022-07-17 06:59:12', '2022-07-17 06:59:12');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_15_134251_create_sessions_table', 1);

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `bukti_pembayaran` varchar(45) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') NOT NULL DEFAULT 'Belum Lunas',
  `nomer_telefon` varchar(45) DEFAULT NULL,
  `jumlah_transaksi` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `bukti_pembayaran`, `status_pembayaran`, `nomer_telefon`, `jumlah_transaksi`, `updated_at`, `created_at`) VALUES
(27, '18115800.Struktur Organisasi NF Com.jpg', 'Lunas', '082211201', 180000, '2022-07-18 07:25:00', '2022-07-18 04:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `keperluan` text NOT NULL,
  `status_peminjaman` enum('Diajukan','Disetujui','Ditolak') NOT NULL DEFAULT 'Diajukan',
  `dokumen` varchar(45) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `keperluan`, `status_peminjaman`, `dokumen`, `users_id`, `ruangan_id`, `pembayaran_id`, `feedback_id`, `updated_at`, `created_at`) VALUES
(25, 'Keperluan ke - 1', 'Disetujui', '18115610.invoice-booking-17.pdf', 1, 35, 27, 4, '2022-07-18 07:25:00', '2022-07-18 04:56:38');

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
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `nama_ruangan` varchar(45) NOT NULL,
  `lantai` int(11) NOT NULL,
  `status` enum('Tersedia','Dipinjam') NOT NULL,
  `foto1` varchar(75) DEFAULT NULL,
  `foto2` varchar(75) DEFAULT NULL,
  `foto3` varchar(75) DEFAULT NULL,
  `harga` varchar(45) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `gedung_id` int(11) NOT NULL,
  `kategori_ruangan_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `lantai`, `status`, `foto1`, `foto2`, `foto3`, `harga`, `kapasitas`, `keterangan`, `gedung_id`, `kategori_ruangan_id`, `updated_at`, `created_at`) VALUES
(31, 'R-001', 2, 'Tersedia', '20220717142929.r_ mba_hot_desk.jpeg', '20220717142929.r_ mba_hot_desk.jpeg', '20220717142929.r_ mba_hot_desk.jpeg', '124000', 25, 'Rasakan pengalaman yang menghadirkan nuansa alam dan warna earthy di tengah padatnya area di Batu Ceper.', 9, 9, '2022-07-17 07:29:29', '2022-07-17 07:29:29'),
(32, 'R-002', 12, 'Tersedia', '20220717143036.r_ mba_hot_desk.jpeg', '20220717143036.r_ mba_hot_desk.jpeg', '20220717143036.r_ mba_hot_desk.jpeg', '127800', 45, 'Rasakan pengalaman yang menghadirkan nuansa alam dan warna earthy di tengah padatnya area di Batu Ceper.', 10, 10, '2022-07-17 07:30:36', '2022-07-17 07:30:36'),
(35, 'R-003', 14, 'Tersedia', '20220718093415.r-2_r-003.jpg', '20220718093415.r_ mba_hot_desk.jpeg', '20220718093415.r-1_r-003.jpg', '180000', 15, 'Rasakan pengalaman yang menghadirkan nuansa alam dan warna earthy di tengah padatnya area di Batu Ceper.', 9, 10, '2022-07-18 02:34:15', '2022-07-18 02:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('spZ8L9kr5vNLkaBSTzK9sH3cJeL17H1hxUFUISAB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidEsxWlI4RGQzZWJNQjZZN0Jrd0VVTmgzajVpZ1NxNnpjVWp5T3lEZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9rb250YWsta2FtaSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWxlcnQiO2E6MDp7fX0=', 1658218884);

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','peminjam') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'peminjam',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bangef', 'bangef@gmail.com', NULL, '$2y$10$IqLr5uP7mytogLyP2wLAiuuTsfNRDgeuor8A46ZYM4ZGU9qzaXywO', NULL, NULL, NULL, 'admin', NULL, '2022-07-12 23:07:32', '2022-07-12 23:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_peminjaman`
--

CREATE TABLE `waktu_peminjaman` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_peminjaman`
--

INSERT INTO `waktu_peminjaman` (`id`, `tgl_pinjam`, `tgl_selesai`, `jam_mulai`, `jam_selesai`, `peminjaman_id`, `updated_at`, `created_at`) VALUES
(36, '2022-07-17', '2022-07-17', '12:00:00', '13:00:00', 25, '2022-07-18 04:56:38', '2022-07-18 04:56:38');

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
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fasilitas_ruangan1` (`ruangan_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama_gedung`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`);

--
-- Indexes for table `kategori_ruangan`
--
ALTER TABLE `kategori_ruangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama_kategori`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_peminjaman_ruangan1` (`ruangan_id`),
  ADD KEY `fk_peminjaman_pembayaran1` (`pembayaran_id`),
  ADD KEY `fk_peminjaman_feedback1` (`feedback_id`),
  ADD KEY `fk_peminjaman_users1` (`users_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ruangan_gedung` (`gedung_id`),
  ADD KEY `fk_ruangan_kategori_ruangan1` (`kategori_ruangan_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `waktu_peminjaman`
--
ALTER TABLE `waktu_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_waktu_peminjaman_peminjaman1` (`peminjaman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_ruangan`
--
ALTER TABLE `kategori_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waktu_peminjaman`
--
ALTER TABLE `waktu_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fk_fasilitas_ruangan1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_feedback1` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_pembayaran1` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_ruangan1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `fk_ruangan_gedung` FOREIGN KEY (`gedung_id`) REFERENCES `gedung` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ruangan_kategori_ruangan1` FOREIGN KEY (`kategori_ruangan_id`) REFERENCES `kategori_ruangan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `waktu_peminjaman`
--
ALTER TABLE `waktu_peminjaman`
  ADD CONSTRAINT `fk_waktu_peminjaman_peminjaman1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
