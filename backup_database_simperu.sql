-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 10:59 AM
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
(19, 'Area Tanpa Asap Rokok', '20220624071221.no-smoking.svg', 'Area bebas asap rokok, untuk menjaga sirkulasi udara yang sehat dan lestari', 28, '2022-06-23 17:00:00', '2022-06-23 17:00:00'),
(20, 'Gratis Wifi', '20220624071356.wifi-router.svg', 'Koneksi Wifi yang memadai', 28, '2022-06-23 17:00:00', '2022-06-23 17:00:00'),
(21, 'Akses Listrik', '20220624071443.electric.svg', 'Akses Listrik yang memadai', 28, '2022-06-23 17:00:00', '2022-06-23 17:00:00'),
(22, 'Papan Tulis dan Alat Tulis Lainnya', '20220624071607.blackboard.svg', 'Saat meeting dan brainstorming, biasanya, media untuk mencatat tidak hanya kertas dan pulpen saja, melainkan papan tulis dan spidol untuk menggambarkan konsep yang sedang dibahas untuk bisa disimak dan ditinjau bersama.', 28, '2022-06-23 17:00:00', '2022-06-23 17:00:00'),
(23, 'Proyektor', '20220624071659.projector.svg', 'Bagaimana cara menyampaikan atau mempresentasikan sebuah materi jika tidak ada proyektor? Ya, proyektor juga merupakan salah satu fasilitas penting dalam sebuah meeting dan presentasi. Ada banyak jenis proyektor yang ada, namun alangkah baiknya jika kamu memilih jenis proyektor yang umum dan modern, yang bisa digunakan oleh segala jenis merk laptop, dan juga lengkap dengan kabelnya.', 28, '2022-06-23 17:00:00', '2022-06-23 17:00:00'),
(24, 'Keamanan 100%', '20220624071753.cyber-security.svg', 'Fasilitas lainnya yang menjadi keprihatian masyarakat banyak adalah kenyaman yang terjamin. Umumnya, hal ini diperlukan jika kamu sering menyewakan meeting room untuk khalayak umum. Beberapa jenis penjagaan yang bisa diaplikasikan adalah pemasangan CCTV pada setiap sudut, pos penjagaan (Security Guide) pada pintu masuk, hingga petugas keamanan yang fungsinya memeriksa barang bawaan setiap pengunjung untuk memastikan bahwa siapa saja yang memasuki area kantor kamu terbebas dari segala pelanggaran hukum dan etika.', 28, '2022-06-23 17:00:00', '2022-06-23 17:00:00'),
(25, 'Makanan dan Minuman', '20220624071835.fast-food.svg', 'Fasilitas meeting room terakhir yang perlu kamu siapkan selanjutnya adalah lokasinya yang strategis. Tempat umumnya adalah poin utama yang menjadi pertimbangan calon penyewa ruangan. Jika ruang meeting kamu berlokasi di jalan yang bebas aturan Ganjil Genap dan dekat dengan mall, maka tempat kamu akan menjadi pilihan utama bagi calon penyewa ruangan.', 28, '2022-06-23 17:00:00', '2022-06-23 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '14045', 'Antam', '1.jpg', 'Jl. Jabon Raya, Kel. Abadijaya, Kec. Sukmajaya, Kota Depok, Jawa Barat 16417', 'https://goo.gl/maps/EzbdSHhX18NRXqWN8', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9982193600576!2d106.84486671474787!3d-6.39422979537336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb93c3feaac3%3A0xfdd098d1bdb5159e!2sJl.%20Jabon%20Raya%2C%20Abadijaya%2C%20Kec.%20Sukmajaya%2C%20Kota%20Depok%2C%20Jawa%20Barat%2016417!5e0!3m2!1sid!2sid!4v1655817914951!5m2!1sid!2sid', '2022-06-14 17:00:00', '2022-06-14 17:00:00'),
(5, '45124', 'Gedung BSD CASA DE PARCO', 'gedung_3.jpg', 'Ruko Casa De Parco No. 20 BSD City, Tangerang 15345', NULL, NULL, '2022-06-14 17:00:00', '2022-06-14 17:00:00'),
(6, '01121', 'Social Hub', 'gedung_4.jpg', 'Jl. Sosial No.52, RT.4/RW.2, Wijaya Kusuma, Grogol petamburan, West Jakarta City, Jakarta 11460', NULL, NULL, '2022-06-15 17:00:00', '2022-06-15 17:00:00');

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
(1, 'Test1', 'test1', '2022-06-15 17:00:00', '2022-06-14 17:00:00'),
(3, 'kategori_1', 'kategori_1', '2022-06-15 17:00:00', '2022-06-15 17:00:00'),
(4, 'kategori_2', 'kategori_2', '2022-06-15 17:00:00', '2022-06-15 17:00:00'),
(5, 'kategori_4', 'kategori_4', '2022-06-15 17:00:00', '2022-06-15 17:00:00'),
(7, 'kategori_5', 'kategori_5', '2022-06-15 17:00:00', '2022-06-15 17:00:00');

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
(15, '14194622.Ilfordlabmon.jpg', 'Lunas', '08998077521', 250000, '2022-07-14 12:46:22', '2022-07-14 12:13:19'),
(16, '14191639.Ilfordlabmon.jpg', 'Lunas', '08998545454', 9000000, '2022-07-14 12:16:39', '2022-07-14 12:14:39'),
(17, '14195149.Struktur Organisasi NF Com.jpg', 'Lunas', '08998077520', 125000, '2022-07-14 12:51:49', '2022-07-14 12:50:04'),
(18, '14195113.Ilfordlabmon.jpg', 'Lunas', '08998077521', 9990000, '2022-07-14 12:51:13', '2022-07-14 12:50:51'),
(19, '14200130.Ilfordlabmon.jpg', 'Lunas', '08998545454', 375000, '2022-07-14 13:01:30', '2022-07-14 13:01:01'),
(20, '15084726.Ilfordlabmon.jpg', 'Lunas', '0877805521', 125000, '2022-07-15 01:47:26', '2022-07-15 01:42:56'),
(21, '15085249.Ilfordlabmon.jpg', 'Lunas', '08998077520', 125000, '2022-07-15 01:52:49', '2022-07-15 01:51:39'),
(22, '15085327.Ilfordlabmon.jpg', 'Lunas', '08998077520', 125000, '2022-07-15 01:53:27', '2022-07-15 01:52:12'),
(23, '15092026.Ilfordlabmon.jpg', 'Lunas', '08998077520', 125000, '2022-07-15 02:20:26', '2022-07-15 02:15:44'),
(24, '15104026.Ilfordlabmon.jpg', 'Lunas', '08998077520', 125000, '2022-07-15 03:40:26', '2022-07-15 03:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `keperluan` text NOT NULL,
  `status` enum('Diajukan','Disetujui','Ditolak') NOT NULL DEFAULT 'Diajukan',
  `dokumen` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `pembayaran_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `keperluan`, `status`, `dokumen`, `users_id`, `ruangan_id`, `pembayaran_id`, `updated_at`, `created_at`) VALUES
(13, 'Test', 'Diajukan', '14191308.Lorem_ipsum.pdf', 1, 28, 15, '2022-07-14 12:13:19', '2022-07-14 12:13:19'),
(14, 'test', 'Diajukan', '14191427.Lorem_ipsum.pdf', 1, 29, 16, '2022-07-14 12:14:39', '2022-07-14 12:14:39'),
(15, 'A', 'Diajukan', '14194959.Lorem_ipsum.pdf', 1, 28, 17, '2022-07-14 12:50:04', '2022-07-14 12:50:04'),
(16, 'test', 'Diajukan', '14195042.Lorem_ipsum.pdf', 1, 2, 18, '2022-07-14 12:50:51', '2022-07-14 12:50:51'),
(17, 'A', 'Diajukan', '14200051.Lorem_ipsum.pdf', 1, 28, 19, '2022-07-14 13:01:01', '2022-07-14 13:01:01'),
(18, 'Test', 'Diajukan', '15084250.Lorem_ipsum.pdf', 1, 28, 20, '2022-07-15 01:42:56', '2022-07-15 01:42:56'),
(19, 'a', 'Diajukan', '15085134.Lorem_ipsum.pdf', 1, 28, 21, '2022-07-15 01:51:39', '2022-07-15 01:51:39'),
(20, 'B', 'Diajukan', '15085206.Lorem_ipsum.pdf', 1, 28, 22, '2022-07-15 01:52:12', '2022-07-15 01:52:12'),
(21, 'c', 'Diajukan', '15091538.invoice-booking-17.pdf', 1, 28, 23, '2022-07-15 02:15:44', '2022-07-15 02:15:44'),
(22, 'AAAA', 'Diajukan', '15103944.invoice-booking-17.pdf', 1, 28, 24, '2022-07-15 03:40:09', '2022-07-15 03:40:09');

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
(1, 'test', 12, 'Tersedia', 'carousel-2.jpg', 'carousel-1.jpg', '', '125000', 0, NULL, 1, 1, '2022-06-14 17:00:00', '2022-06-14 17:00:00'),
(2, 'test2', 123, 'Tersedia', NULL, NULL, NULL, '999000 ', 0, NULL, 1, 1, '2022-06-14 17:00:00', '2022-06-14 17:00:00'),
(15, 'test', 12, 'Tersedia', 'carousel-2.jpg', 'carousel-1.jpg', '', '125000', 0, NULL, 1, 1, '2022-06-14 17:00:00', '2022-06-14 17:00:00'),
(16, 'test2', 123, 'Tersedia', NULL, NULL, NULL, '999000 ', 0, NULL, 1, 1, '2022-06-14 17:00:00', '2022-06-14 17:00:00'),
(26, 'Testing2', 45, 'Tersedia', '20220623194128.jpg', '20220623194128.jpg', '20220623194128.jpg', '250000', 42, 'loremipsum', 5, 3, '2022-06-22 17:00:00', '2022-06-22 17:00:00'),
(27, 'Ruangan ASli Ahoy', 13, 'Dipinjam', '20220623194255.raungan_1.jpg', '20220623194255.ruangan_2.jpg', '20220623194255.default.png', '123123', 123, 'lorem asdalsmdlmssmdkaskdas', 1, 3, '2022-06-22 17:00:00', '2022-06-22 17:00:00'),
(28, 'Harmoni 5', 10, 'Tersedia', '20220624024555.raungan_1.jpg', '20220624024555.ruangan_2.jpg', '20220624024555.Color Hunt Palette 990000ff5b00d4d925ffee63.png', '125000', 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5, 5, '2022-06-23 17:00:00', '2022-06-23 17:00:00'),
(29, 'tes', 3, 'Tersedia', '20220628013654.ae.png', '20220628013654.at.png', '20220628013654.aw.png', '1500000', 50, 'tes', 1, 3, '2022-06-27 17:00:00', '2022-06-27 17:00:00');

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
('j8FD4Dx2wZ9NZ2ANx5ha3sJJGkSmHYTAPNFLwDXT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUUdIaXJOS0lxZWQ0bDNUTWgwRjFMY3RCVW9aRlJ5WXhGa1cyR0I4UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9saXN0LXJ1YW5nYW4vMjgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTY1Nzg0OTMxNjt9czo1OiJhbGVydCI7YTowOnt9fQ==', 1657856457);

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
(24, '2022-07-14', '2022-07-14', '07:00:00', '09:00:00', 13, '2022-07-14 12:13:19', '2022-07-14 12:13:19'),
(25, '2022-07-14', '2022-07-14', '07:00:00', '13:00:00', 14, '2022-07-14 12:14:39', '2022-07-14 12:14:39'),
(26, '2022-07-14', '2022-07-14', '09:00:00', '10:00:00', 15, '2022-07-14 12:50:04', '2022-07-14 12:50:04'),
(27, '2022-07-14', '2022-07-14', '07:00:00', '17:00:00', 16, '2022-07-14 12:50:51', '2022-07-14 12:50:51'),
(28, '2022-07-14', '2022-07-14', '10:00:00', '13:00:00', 17, '2022-07-14 13:01:01', '2022-07-14 13:01:01'),
(29, '2022-07-15', '2022-07-15', '07:00:00', '08:00:00', 18, '2022-07-15 01:42:56', '2022-07-15 01:42:56'),
(30, '2022-07-15', '2022-07-15', '08:00:00', '09:00:00', 19, '2022-07-15 01:51:39', '2022-07-15 01:51:39'),
(31, '2022-07-15', '2022-07-15', '09:00:00', '10:00:00', 20, '2022-07-15 01:52:12', '2022-07-15 01:52:12'),
(32, '2022-07-15', '2022-07-15', '10:00:00', '11:00:00', 21, '2022-07-15 02:15:44', '2022-07-15 02:15:44'),
(33, '2022-07-16', '2022-07-16', '11:00:00', '12:00:00', 22, '2022-07-15 03:40:09', '2022-07-15 03:40:09');

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
  ADD KEY `fk_peminjaman_pembayaran1` (`pembayaran_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_ruangan`
--
ALTER TABLE `kategori_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waktu_peminjaman`
--
ALTER TABLE `waktu_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  ADD CONSTRAINT `fk_peminjaman_pembayaran1` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_ruangan1` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
