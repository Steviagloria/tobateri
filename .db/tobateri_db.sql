-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2023 pada 20.10
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tobateri_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_tb`
--

CREATE TABLE `admin_tb` (
  `email_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_tb`
--

INSERT INTO `admin_tb` (`email_admin`, `nama_admin`, `password_admin`) VALUES
('stevia@stikom.amq', 'Steviagloria', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs_tb`
--

CREATE TABLE `barangs_tb` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `nama_satuan_fg` varchar(50) NOT NULL,
  `harga_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barangs_tb`
--

INSERT INTO `barangs_tb` (`id_barang`, `nama_barang`, `jumlah_barang`, `nama_satuan_fg`, `harga_barang`) VALUES
(41, 'Sement', 12, 'Pcs', 121212),
(42, 'Cok Rol', 12, 'Karton', 10000),
(43, '', 0, '', 0),
(44, 'asd', 12, 'Karton', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuans_tb`
--

CREATE TABLE `satuans_tb` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuans_tb`
--

INSERT INTO `satuans_tb` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Pcs'),
(2, 'Karton');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers_tb`
--

CREATE TABLE `suppliers_tb` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `nohp_supplier` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers_tb`
--

INSERT INTO `suppliers_tb` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `nohp_supplier`) VALUES
(8, 'Supriadi', 'Pejanggik', '081209971631'),
(10, 'Akoces', 'Jln. Bula', '128128182');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keluar_tb`
--

CREATE TABLE `transaksi_keluar_tb` (
  `id_transaksi_keluar` int(11) NOT NULL,
  `idx_barang` int(11) NOT NULL,
  `nama_penjual` varchar(50) NOT NULL,
  `jumlah_barang_keluar` int(11) NOT NULL,
  `waktu_transaksi_keluar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_keluar_tb`
--

INSERT INTO `transaksi_keluar_tb` (`id_transaksi_keluar`, `idx_barang`, `nama_penjual`, `jumlah_barang_keluar`, `waktu_transaksi_keluar`) VALUES
(3, 42, 'E', 12, '03/06/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_masuk_tb`
--

CREATE TABLE `transaksi_masuk_tb` (
  `id_transaksi_masuk` int(11) NOT NULL,
  `idx_barang` int(11) NOT NULL,
  `idx_supplier` int(11) NOT NULL,
  `waktu_transaksi_masuk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_masuk_tb`
--

INSERT INTO `transaksi_masuk_tb` (`id_transaksi_masuk`, `idx_barang`, `idx_supplier`, `waktu_transaksi_masuk`) VALUES
(28, 41, 8, '17/06/2023');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`email_admin`);

--
-- Indeks untuk tabel `barangs_tb`
--
ALTER TABLE `barangs_tb`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `satuans_tb`
--
ALTER TABLE `satuans_tb`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `suppliers_tb`
--
ALTER TABLE `suppliers_tb`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `transaksi_keluar_tb`
--
ALTER TABLE `transaksi_keluar_tb`
  ADD PRIMARY KEY (`id_transaksi_keluar`);

--
-- Indeks untuk tabel `transaksi_masuk_tb`
--
ALTER TABLE `transaksi_masuk_tb`
  ADD PRIMARY KEY (`id_transaksi_masuk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs_tb`
--
ALTER TABLE `barangs_tb`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `satuans_tb`
--
ALTER TABLE `satuans_tb`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suppliers_tb`
--
ALTER TABLE `suppliers_tb`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi_keluar_tb`
--
ALTER TABLE `transaksi_keluar_tb`
  MODIFY `id_transaksi_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi_masuk_tb`
--
ALTER TABLE `transaksi_masuk_tb`
  MODIFY `id_transaksi_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
