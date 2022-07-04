-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 19.03
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testbackend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `create_at`) VALUES
(1, 'barang', 'dadased234', '2022-07-04 18:52:57'),
(2, 'barang', 'sda', '2022-07-04 18:52:57'),
(5, 'barang', 'barang kubosasdasdasd', '2022-07-04 20:03:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id`, `nama`, `create_at`) VALUES
(1, 'Mustofas', '2022-07-04 18:51:54'),
(3, 'Popos', '2022-07-04 19:41:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `merk_kendaraan` varchar(255) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `jenis_kendaraan`, `merk_kendaraan`, `plat`, `create_at`) VALUES
(6, 'Kendaraan Orang', 'Supras', 'NN 82323 PS', '2022-07-04 19:48:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id`, `tipe`, `time`) VALUES
(2, 'Tambah Data Kendaraan', '2022-07-04 19:48:50'),
(3, 'Update Data Driver dengan id : 5', '2022-07-04 20:10:09'),
(4, 'Update Data Driver dengan id : 5', '2022-07-04 20:13:25'),
(5, 'Update Data Driver dengan id : 2', '2022-07-04 20:13:29'),
(6, 'Update Data Driver dengan id : 1', '2022-07-04 20:13:35'),
(7, 'Update Data Driver dengan id : 3', '2022-07-04 20:13:39'),
(8, 'Update Data Kendaraan dengan id : 6', '2022-07-04 20:13:44'),
(9, 'Berhasil Menyewa IZAT ABRIL', '2022-07-04 20:46:18'),
(10, 'Berhasil Menyewa widianto', '2022-07-04 20:46:40'),
(11, 'Berhasil Menyewa widianto', '2022-07-04 20:46:57'),
(12, 'Berhasil Menyewa widianto', '2022-07-04 20:53:19'),
(13, 'Berhasil Konfirmasi Sewa dengan id : 1', '2022-07-04 20:58:06'),
(14, 'Berhasil Konfirmasi Sewa dengan id : 1', '2022-07-04 20:58:24'),
(15, 'Berhasil Konfirmasi Sewa dengan id : 2', '2022-07-04 20:58:25'),
(16, 'Berhasil Konfirmasi Sewa dengan id : 3', '2022-07-04 20:58:26'),
(17, 'Delete Data Sewa dengan id : 4', '2022-07-04 20:59:01'),
(18, 'Berhasil Menyewa IZAT ABRIL', '2022-07-04 20:59:15'),
(19, 'Berhasil Konfirmasi Sewa dengan id : 5', '2022-07-04 20:59:20'),
(20, 'Berhasil Konfirmasi Sewa dengan id : 1', '2022-07-04 21:31:32'),
(21, 'Berhasil Konfirmasi Sewa dengan id : 1', '2022-07-04 21:32:05'),
(22, 'Berhasil Konfirmasi Selesai Sewa dengan id : ', '2022-07-04 21:36:24'),
(23, 'Berhasil Konfirmasi Selesai Sewa dengan id : 1', '2022-07-04 21:37:13'),
(24, 'Berhasil Konfirmasi Selesai Sewa dengan id : 1', '2022-07-04 21:40:26'),
(25, 'Berhasil Menyewa ilham', '2022-07-04 22:17:38'),
(26, 'Berhasil Input data Sewa dengan id : 6', '2022-07-04 22:17:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id` int(11) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `nama_penyewa` varchar(255) NOT NULL,
  `status` enum('pending','disetujui','proses','berhasil','konfirmasi','menunggu disetujui') NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`id`, `jenis_kendaraan`, `driver`, `barang`, `durasi`, `nama_penyewa`, `status`, `created_at`) VALUES
(1, 'Kendaraan Orang', 'Mustofas', 'tidak membawa barang', '5', 'IZAT ABRIL', 'berhasil', '2022-07-04'),
(6, 'Kendaraan Orang', 'Mustofas', 'tidak membawa barang', '3', 'ilham', 'menunggu disetujui', '2022-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('admin','pegawai','','') NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `date_created`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$XbEos2D2Wq2Mt5g55G3aHeDJ08b9XL4l5OVeJykUE1VO1ysWwXOzy', 'admin', '0000-00-00 00:00:00'),
(20, 'pegawai', 'pegawai@gmail.com', '$2y$10$Bl0olYDhWI6tbACJYjReTOnLC/vOj1QPUPsbk1L33dUtOuRx3.WU.', 'pegawai', '2022-07-04 21:42:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
