-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2022 pada 07.30
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lintasin123`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2022_01_06_115821_create_table_user', 2),
(11, '2022_01_06_121028_create_admin', 2),
(12, '2022_01_06_121158_create_bus', 2),
(13, '2022_01_06_122536_create_shuttle', 2),
(14, '2022_01_06_123332_create_order', 2),
(62, '2022_01_07_095508_create_tbl_user', 3),
(63, '2022_01_07_095728_create_tbl_admin', 3),
(64, '2022_01_07_095806_create_tbl_bus', 3),
(65, '2022_01_07_095842_create_tbl_shuttle', 3),
(75, '2022_01_07_095913_create_tbl_order', 4),
(77, '2022_01_07_161514_create_tbl_route', 4),
(78, '2022_01_13_175359_add_route_data', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_born_date` date DEFAULT NULL,
  `admin_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_full_name`, `admin_born_date`, `admin_address`, `admin_phone`, `admin_email`, `admin_password`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL, 'admin@mail.com', 'admin123', '2022-01-13 11:02:40', '2022-01-13 11:02:40'),
(2, 'dian', NULL, NULL, NULL, 'dian@gmail.com', 'dian', '2022-01-16 05:38:04', '2022-01-16 05:38:04'),
(3, 'rara', NULL, NULL, NULL, 'rara@gmail.com', 'rara', '2022-01-19 21:12:47', '2022-01-19 21:12:47'),
(4, 'nana', NULL, NULL, NULL, 'nana@gmail.com', 'nana', '2022-01-22 00:56:38', '2022-01-22 00:56:38'),
(5, 'lala', NULL, NULL, NULL, 'lala@gmail.com', 'lala', '2022-01-22 09:03:00', '2022-01-22 09:03:00'),
(6, 'tessa', NULL, NULL, NULL, 'tessa@gmail.com', 'tessa', '2022-01-22 10:27:28', '2022-01-22 10:27:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `bus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bus_time_departure` time NOT NULL,
  `bus_date_departure` date NOT NULL,
  `bus_price` int(11) NOT NULL,
  `bus_total_seat` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_bus`
--

INSERT INTO `tbl_bus` (`bus_id`, `bus_name`, `bus_type`, `bus_time_departure`, `bus_date_departure`, `bus_price`, `bus_total_seat`, `route_id`, `created_at`, `updated_at`) VALUES
(1, 'Bus 1', 'STANDARD', '04:35:00', '2022-01-14', 50000, 12, 1, '2022-01-13 11:32:49', '2022-01-13 11:32:49'),
(2, 'KRINGKRING', 'EXECUTIVE', '02:16:00', '2022-01-22', 120000, 24, 3, '2022-01-19 21:13:44', '2022-01-19 21:13:44'),
(3, 'Pras1', 'PREMIUM', '14:00:00', '2022-01-23', 150000, 20, 1, '2022-01-22 09:14:49', '2022-01-22 09:15:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_bus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_bus_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_bus_seat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_bus_time_departure` time NOT NULL,
  `order_bus_date_departure` date NOT NULL,
  `order_total_price` int(11) NOT NULL,
  `order_payment_slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_name`, `order_phone`, `order_email`, `order_bus`, `order_bus_type`, `order_bus_seat`, `order_bus_time_departure`, `order_bus_date_departure`, `order_total_price`, `order_payment_slip`, `user_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(4, 'bella', NULL, 'bella@gmail.com', 'MERDEKA', 'STANDARD', 'A8 ', '07:30:00', '2022-01-18', 120000, NULL, 2, NULL, '2022-01-16 05:39:27', '2022-01-16 05:39:27'),
(5, 'bella', '08765427528', 'bella@gmail.com', 'MERDEKA', 'STANDARD', 'A1 ', '07:30:00', '2022-01-18', 120000, '1.jpeg', 2, 1, '2022-01-16 05:40:14', '2022-01-16 05:40:41'),
(6, 'nana', NULL, 'nana@gmail.com', 'KRINGKRING', 'EXECUTIVE', 'A5 ', '02:16:00', '2022-01-22', 120000, NULL, 3, NULL, '2022-01-19 21:14:27', '2022-01-19 21:14:27'),
(7, 'nana', NULL, 'nana@gmail.com', 'KRINGKRING', 'EXECUTIVE', 'A4 ', '02:16:00', '2022-01-22', 120000, '6.jpeg', 3, 1, '2022-01-19 21:15:15', '2022-01-19 21:16:42'),
(9, 'grape', '09876545678', 'grape@gmail.com', 'Pras1', 'PREMIUM', 'A1 A2 ', '14:00:00', '2022-01-23', 300000, NULL, 5, NULL, '2022-01-22 09:43:55', '2022-01-22 09:43:55'),
(10, 'bella', '08765427528', 'bella@gmail.com', 'JAYA', 'PREMIUM', 'A3 ', '10:00:00', '2022-01-25', 100000, NULL, 2, NULL, '2022-01-23 20:20:07', '2022-01-23 20:20:07'),
(13, 'bella', '08765427528', 'bella@gmail.com', 'JAYA', 'PREMIUM', 'A4 ', '10:00:00', '2022-01-25', 100000, '20.jpeg', 2, 1, '2022-01-23 21:23:13', '2022-01-23 21:23:31'),
(14, 'bella', '08765427528', 'bella@gmail.com', 'JAYA', 'PREMIUM', 'A4 ', '10:00:00', '2022-01-25', 100000, NULL, 2, NULL, '2022-01-23 21:40:07', '2022-01-23 21:40:07'),
(15, 'bella', '08765427528', 'bella@gmail.com', 'JAYA', 'PREMIUM', 'A4 A10 ', '10:00:00', '2022-01-25', 200000, 'e.jpg', 2, 1, '2022-01-23 21:46:30', '2022-01-23 23:21:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_route`
--

CREATE TABLE `tbl_route` (
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `route_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_route`
--

INSERT INTO `tbl_route` (`route_id`, `route_from`, `route_to`, `route_price`, `created_at`, `updated_at`) VALUES
(1, 'BANDUNG', 'JAKARTA', NULL, NULL, NULL),
(2, 'BANDUNG', 'BEKASI', NULL, NULL, NULL),
(3, 'BANDUNG', 'BOGOR', NULL, NULL, NULL),
(4, 'BANDUNG', 'PURWAKARTA', NULL, NULL, NULL),
(5, 'BANDUNG', 'SUBANG', NULL, NULL, NULL),
(6, 'BANDUNG', 'SUMEDANG', NULL, NULL, NULL),
(7, 'BANDUNG', 'GARUT', NULL, NULL, NULL),
(8, 'JAKARTA', 'PURWAKARTA', NULL, NULL, NULL),
(9, 'JAKARTA', 'SUBANG', NULL, NULL, NULL),
(10, 'BOGOR', 'SUMEDANG', NULL, NULL, NULL),
(11, 'BOGOR', 'GARUT', NULL, NULL, NULL),
(12, 'YOGYAKARTA', 'BANDUNG', NULL, NULL, NULL),
(13, 'YOGYAKARTA', 'JAKARTA', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_shuttle`
--

CREATE TABLE `tbl_shuttle` (
  `shuttle_id` bigint(20) UNSIGNED NOT NULL,
  `shuttle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shuttle_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shuttle_time_departure` time NOT NULL,
  `shuttle_date_departure` date NOT NULL,
  `shuttle_price` int(11) NOT NULL,
  `shuttle_total_seat` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_shuttle`
--

INSERT INTO `tbl_shuttle` (`shuttle_id`, `shuttle_name`, `shuttle_type`, `shuttle_time_departure`, `shuttle_date_departure`, `shuttle_price`, `shuttle_total_seat`, `route_id`, `created_at`, `updated_at`) VALUES
(3, 'JAYABAYA', 'EXECUTIVE', '10:00:00', '2022-01-25', 100000, 10, 1, '2022-01-23 20:16:47', '2022-01-23 22:59:03'),
(4, 'INDO', 'PREMIUM', '16:56:00', '2022-01-26', 120000, 10, 12, '2022-01-23 22:53:01', '2022-01-23 22:53:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_born_date` date DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_full_name`, `user_born_date`, `user_address`, `user_phone`, `user_email`, `user_password`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL, NULL, 'user@mail.com', 'user123', '2022-01-13 11:02:10', '2022-01-13 11:02:23'),
(2, 'bella', '2022-01-03', 'jember', '08765427528', 'bella@gmail.com', 'bella', '2022-01-16 05:37:12', '2022-01-16 05:39:55'),
(3, 'nana', NULL, NULL, NULL, 'nana@gmail.com', 'nana', '2022-01-19 21:12:11', '2022-01-19 21:12:11'),
(4, 'mark', NULL, NULL, NULL, 'mark@gmail.com', 'mark', '2022-01-22 00:55:41', '2022-01-22 00:55:41'),
(5, 'grape', NULL, 'bwi', '09876545678', 'grape@gmail.com', 'grape', '2022-01-22 09:01:35', '2022-01-22 09:16:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indeks untuk tabel `tbl_shuttle`
--
ALTER TABLE `tbl_shuttle`
  ADD PRIMARY KEY (`shuttle_id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_bus`
--
ALTER TABLE `tbl_bus`
  MODIFY `bus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_route`
--
ALTER TABLE `tbl_route`
  MODIFY `route_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_shuttle`
--
ALTER TABLE `tbl_shuttle`
  MODIFY `shuttle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
