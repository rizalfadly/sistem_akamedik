-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2022 pada 12.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
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
-- Struktur dari tabel `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `ks_id` int(10) UNSIGNED NOT NULL,
  `siswa` int(10) UNSIGNED NOT NULL,
  `kelas` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`ks_id`, `siswa`, `kelas`, `created_at`, `updated_at`) VALUES
(9, 8, 3, '2022-02-25 04:27:42', '2022-02-25 04:27:42'),
(10, 6, 3, '2022-02-25 04:27:49', '2022-02-25 04:27:49'),
(11, 6, 1, '2022-02-26 07:25:39', '2022-02-26 07:25:39'),
(15, 8, 1, '2022-02-26 09:16:54', '2022-02-26 09:16:54'),
(16, 9, 1, '2022-02-26 19:49:12', '2022-02-26 19:49:12');

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
(4, '2022_02_16_031420_create_tables_siswa', 2),
(5, '2022_02_18_040630_create_tables_status', 3),
(6, '2022_02_18_041250_create_tabes_msiswa', 4),
(7, '2022_02_21_032656_create_table_guru', 5),
(8, '2022_02_21_055214_alter_m_guru', 6),
(9, '2022_02_23_031525_create_table_m_mapel', 7),
(10, '2022_02_23_032107_create_table_kelas', 7),
(11, '2022_02_23_053627_create_table_kelassiswa', 8),
(12, '2022_02_25_115300_create_table_mapel', 9),
(13, '2022_02_26_161745_create_table_m_hari', 10),
(14, '2022_02_26_162711_create_table_jadwal', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_datasiswa`
--

CREATE TABLE `m_datasiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_datasiswa`
--

INSERT INTO `m_datasiswa` (`id`, `nis`, `nama`, `no_hp`, `email`, `alamat`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(6, '21233333', 'dsda', 'sdsad', 'sdsd', 'sdssd', 'uploads/1007553143-kisspng-apple-logo-computer-icons-apple-logo-5abdfcd3232e52.3373911715224004671441.jpg', 1, '2022-02-17 21:22:01', '2022-02-23 01:04:42'),
(8, '123123131', 'fadli dfdsfsdfsfs', '1231231', 'admin@admin', 'surabayaa', 'uploads/329819442-Nezuko.jpg', 1, '2022-02-21 18:46:16', '2022-02-23 01:04:45'),
(9, '12313132131', 'fadli dominic', '12314141', 'admin123@gmail.com', 'gresik', NULL, 1, '2022-02-26 04:45:45', '2022-02-26 19:48:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_guru`
--

CREATE TABLE `m_guru` (
  `guru_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_kerja` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_guru`
--

INSERT INTO `m_guru` (`guru_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `email`, `awal_kerja`, `photo`, `nip`, `status`, `created_at`, `updated_at`) VALUES
(5, 'rizal', 'surabaya', '2022-02-11', '082244449250', 'admin@admin', '2022-02-16', 'photo_guru/311749076-wani.PNG', '12132131', 2, '2022-02-21 02:50:23', '2022-02-21 02:58:22'),
(6, 'guru 2', 'surabaya', '2022-02-10', '1231231', 'admin@admin', '2022-02-08', 'photo_guru/1885530811-kisspng-apple-logo-computer-icons-apple-logo-5abdfcd3232e52.3373911715224004671441.jpg', '21313123', 1, '2022-02-21 02:50:55', '2022-02-21 02:50:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_hari`
--

CREATE TABLE `m_hari` (
  `hari_id` int(10) UNSIGNED NOT NULL,
  `nama_hari` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_hari`
--

INSERT INTO `m_hari` (`hari_id`, `nama_hari`, `created_at`, `updated_at`) VALUES
(3, 'senin', '2022-02-26 16:23:16', NULL),
(4, 'selasa', NULL, NULL),
(5, 'rabu', NULL, NULL),
(6, 'kamis', NULL, NULL),
(7, 'jumat', NULL, NULL),
(8, 'sabtu', NULL, NULL),
(9, 'minggu', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jadwalpelajaran`
--

CREATE TABLE `m_jadwalpelajaran` (
  `jadwal_id` int(10) UNSIGNED NOT NULL,
  `hari` int(10) UNSIGNED NOT NULL,
  `kelas` int(10) UNSIGNED NOT NULL,
  `mapel` int(10) UNSIGNED NOT NULL,
  `jam_dari` datetime NOT NULL,
  `jam_sampai` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_jadwalpelajaran`
--

INSERT INTO `m_jadwalpelajaran` (`jadwal_id`, `hari`, `kelas`, `mapel`, `jam_dari`, `jam_sampai`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 2, '2022-02-27 08:00:00', '2022-02-27 10:00:00', '2022-02-26 20:33:51', '2022-02-26 20:33:51'),
(2, 4, 3, 2, '2022-02-27 08:00:00', '2022-02-27 10:00:00', '2022-02-27 04:42:33', '2022-02-27 04:42:33'),
(3, 5, 1, 3, '2022-02-27 08:00:00', '2022-02-27 10:00:00', '2022-02-27 04:48:31', '2022-02-27 04:48:31'),
(4, 3, 3, 1, '2022-02-27 11:00:00', '2022-02-27 13:00:00', '2022-02-27 04:54:14', '2022-02-27 04:54:14'),
(5, 6, 3, 3, '2022-02-27 08:00:00', '2022-02-27 10:00:00', '2022-02-27 04:55:24', '2022-02-27 04:55:24'),
(6, 7, 3, 1, '2022-02-27 11:00:00', '2022-02-27 13:00:00', '2022-02-27 04:55:39', '2022-02-27 04:55:39'),
(7, 8, 3, 2, '2022-02-27 08:00:00', '2022-02-27 10:00:00', '2022-02-27 04:56:08', '2022-02-27 04:56:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kelas`
--

CREATE TABLE `m_kelas` (
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_kelas`
--

INSERT INTO `m_kelas` (`kelas_id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'VI C', '2022-02-22 20:51:33', '2022-02-22 22:12:31'),
(3, 'VII A', '2022-02-22 20:54:40', '2022-02-22 20:54:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_mapel`
--

CREATE TABLE `m_mapel` (
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `nama_mapel` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_mapel`
--

INSERT INTO `m_mapel` (`mapel_id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2022-02-26 05:07:16', '2022-02-26 05:07:16'),
(2, 'bahasa indonesia', '2022-02-26 05:08:50', '2022-02-26 05:08:50'),
(3, 'bahasa  Inggris hhh', '2022-02-26 05:10:24', '2022-02-26 06:05:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_status`
--

CREATE TABLE `m_status` (
  `status_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `m_status`
--

INSERT INTO `m_status` (`status_id`, `status`) VALUES
(1, 'aktif'),
(2, 'tidak aktif');

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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin', NULL, '$2y$10$y1YA5f3ZWsfYfEyvM5d3J.Hbh1.BTN6YzRWXgOWWz.qEgXa0fxG.C', NULL, '2022-02-14 23:26:40', '2022-02-14 23:26:40'),
(2, 'rizal', 'rizal@admin', NULL, '$2y$10$hPiadPY74IyJzom8ZXu9W.ZE/ZNk5wj9tmWeeb1SumceHP7GQYiQm', NULL, '2022-02-15 22:50:51', '2022-02-15 22:50:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`ks_id`),
  ADD KEY `kelas_siswa_siswa_foreign` (`siswa`),
  ADD KEY `kelas_siswa_kelas_foreign` (`kelas`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_datasiswa`
--
ALTER TABLE `m_datasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_datasiswa_status_foreign` (`status`);

--
-- Indeks untuk tabel `m_guru`
--
ALTER TABLE `m_guru`
  ADD PRIMARY KEY (`guru_id`),
  ADD KEY `m_guru_status_foreign` (`status`);

--
-- Indeks untuk tabel `m_hari`
--
ALTER TABLE `m_hari`
  ADD PRIMARY KEY (`hari_id`);

--
-- Indeks untuk tabel `m_jadwalpelajaran`
--
ALTER TABLE `m_jadwalpelajaran`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `m_jadwalpelajaran_hari_foreign` (`hari`),
  ADD KEY `m_jadwalpelajaran_kelas_foreign` (`kelas`),
  ADD KEY `m_jadwalpelajaran_mapel_foreign` (`mapel`);

--
-- Indeks untuk tabel `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indeks untuk tabel `m_mapel`
--
ALTER TABLE `m_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indeks untuk tabel `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `ks_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `m_datasiswa`
--
ALTER TABLE `m_datasiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_guru`
--
ALTER TABLE `m_guru`
  MODIFY `guru_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `m_hari`
--
ALTER TABLE `m_hari`
  MODIFY `hari_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `m_jadwalpelajaran`
--
ALTER TABLE `m_jadwalpelajaran`
  MODIFY `jadwal_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `m_kelas`
--
ALTER TABLE `m_kelas`
  MODIFY `kelas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_mapel`
--
ALTER TABLE `m_mapel`
  MODIFY `mapel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_status`
--
ALTER TABLE `m_status`
  MODIFY `status_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_kelas_foreign` FOREIGN KEY (`kelas`) REFERENCES `m_kelas` (`kelas_id`),
  ADD CONSTRAINT `kelas_siswa_siswa_foreign` FOREIGN KEY (`siswa`) REFERENCES `m_datasiswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `m_datasiswa`
--
ALTER TABLE `m_datasiswa`
  ADD CONSTRAINT `m_datasiswa_status_foreign` FOREIGN KEY (`status`) REFERENCES `m_status` (`status_id`);

--
-- Ketidakleluasaan untuk tabel `m_guru`
--
ALTER TABLE `m_guru`
  ADD CONSTRAINT `m_guru_status_foreign` FOREIGN KEY (`status`) REFERENCES `m_status` (`status_id`);

--
-- Ketidakleluasaan untuk tabel `m_jadwalpelajaran`
--
ALTER TABLE `m_jadwalpelajaran`
  ADD CONSTRAINT `m_jadwalpelajaran_hari_foreign` FOREIGN KEY (`hari`) REFERENCES `m_hari` (`hari_id`),
  ADD CONSTRAINT `m_jadwalpelajaran_kelas_foreign` FOREIGN KEY (`kelas`) REFERENCES `m_kelas` (`kelas_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `m_jadwalpelajaran_mapel_foreign` FOREIGN KEY (`mapel`) REFERENCES `m_mapel` (`mapel_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
