-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2021 pada 15.40
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_arsip` varchar(15) DEFAULT NULL,
  `nama_arsip` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `file_arsip` varchar(255) DEFAULT NULL,
  `ukuran_file` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `id_kategori`, `no_arsip`, `nama_arsip`, `deskripsi`, `tgl_upload`, `tgl_update`, `file_arsip`, `ukuran_file`, `id_user`) VALUES
(6, 2, '21062210-Talo', 'Pajak Hotel', 'Laporan Pajak Hotel', '2021-06-22', '2021-07-15', '1624378472_c1b5cf9e21929c2e042a.pdf', 625892, 1),
(7, 3, '21062254-gWnN', 'Laporan Pendapatan Pajak Daerah', 'Laporan Perbulan', '2021-06-22', '2021-07-15', '1624378878_c7179daa7a7da75b5327.pdf', 767900, 1),
(8, 3, '21062248-Psbh', 'Pajak Pameran', 'Laporan Pajak Pameran', '2021-06-22', '2021-07-15', '1624419365_0e2ccc82bc5bb0f1119a.pdf', 767900, 1),
(9, 4, '21070521-50UD', 'Pajak Restoran', 'Laporan Pajak Restoran', '2021-07-05', '2021-07-15', '1625493412_7e36e56ef3c183540fd6.pdf', 83687, 1),
(10, NULL, '21071552-s87Y', 'Pajak Restoran', 'Laporan Pajak Restoran', '2021-07-15', '2021-07-15', '1626355333_3e5141b42fb9f4ebaccc.pdf', 8088, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pajak Hotel'),
(2, 'Pajak Restoran'),
(3, 'Pajak Hiburan'),
(4, 'Pajak Reklame'),
(5, 'Pajak Penerangan Jalan (PPJ-PLN)'),
(6, 'Pajak Parkir'),
(7, 'Pajak Air Bawah Tanah'),
(8, 'PBB'),
(9, 'BPHTB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sts`
--

CREATE TABLE `tbl_sts` (
  `id_sts` int(11) NOT NULL,
  `tanggal` varchar(100) DEFAULT NULL,
  `nama_wajib` varchar(100) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `ket_tempat` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_pajak` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_sts`
--

INSERT INTO `tbl_sts` (`id_sts`, `tanggal`, `nama_wajib`, `nama_kategori`, `ket_tempat`, `id_user`, `jumlah_pajak`) VALUES
(19, '2021-08-01', 'Celline PratiwiiiiAjahhok', 'Pajak Hotel', 'Jl.Akaza Nine', 1, '5000000'),
(20, '2021-08-02', 'Cellinee Pratiwi Oyeeh', 'Pajak Restoran', 'Jl.Oyee Ikehh ', 1, '5000000'),
(21, '2021-08-20', 'Celline Pratiwi', 'Pajak Reklame', 'Jl.Sakura', 1, '5000000'),
(22, '2021-08-31', 'Celline Pratiwi', 'Pajak Hotel', 'Jl.Buntu', 1, '5000000'),
(23, '2021-09-01', 'Dimas Junior', 'Pajak Restoran', 'Jl.Akaza Nine', 1, '5000000'),
(24, '2021-09-01', 'Dimas Budi Pratama', 'Pajak Hiburan', 'Jl.Akaza Nine', 1, '3200000'),
(25, '2021-09-16', 'Decy', 'Pajak PBB', 'Jl.Akaza Nine', 1, '3200000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `foto`) VALUES
(1, 'Celline', 'cellinepratiwi12@gmail.com', '1234', 'user1.png'),
(2, 'Suprihana', 'suprihana@gmail.com', '1234', 'user2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wajib`
--

CREATE TABLE `tbl_wajib` (
  `id_wajib` int(11) NOT NULL,
  `npwpd` varchar(30) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `alamat_pemilik` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `alamat_objek` varchar(255) NOT NULL,
  `pen_bulan` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jumlah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_wajib`
--

INSERT INTO `tbl_wajib` (`id_wajib`, `npwpd`, `tgl_pendaftaran`, `nama_usaha`, `alamat_pemilik`, `nama_pemilik`, `alamat_objek`, `pen_bulan`, `id_kategori`, `jumlah`) VALUES
(3, '112233445566778', '2021-07-08', 'Travell', '082282323700', 'Celline Pratiwi Ciiwiw', 'Korea', '5000000', 3, '1200000'),
(5, '123214217489164', '2021-07-09', 'Travell', '082237093217', 'Dimas Budi Pratama', 'Jepang', '5000000', 1, '2000000'),
(6, '231311931939193', '2021-05-05', 'Seafood', '082282323700', 'Dimas Budi Pratama Oyee', 'Jepang', '5000000', 8, '2000000'),
(7, '217496179641764', '2021-07-06', 'Touring', '082272219314', 'Dimas Budi Pratama', 'Jepang', '5000000', 8, '1200000'),
(8, '836218936189691', '2021-07-09', 'Touring', 'Jl.Sakura', 'Celline Pratiwi Ciiwiwkitw', 'Jl. Sakura', '1000000', 4, '2000000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_sts`
--
ALTER TABLE `tbl_sts`
  ADD PRIMARY KEY (`id_sts`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_wajib`
--
ALTER TABLE `tbl_wajib`
  ADD PRIMARY KEY (`id_wajib`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_sts`
--
ALTER TABLE `tbl_sts`
  MODIFY `id_sts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_wajib`
--
ALTER TABLE `tbl_wajib`
  MODIFY `id_wajib` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
