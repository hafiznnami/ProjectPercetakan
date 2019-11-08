-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 04:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpercetakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `bahan_banner` varchar(45) NOT NULL,
  `ukuran_banner` varchar(45) NOT NULL,
  `harga_banner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `nama_produk`, `bahan_banner`, `ukuran_banner`, `harga_banner`) VALUES
(1, 'spanduk', 'Flexy China 240 GSM', '100 x 100 cm', 16500),
(2, 'spanduk', 'Flexy China 240 GSM', '150 x 100 cm', 24750),
(3, 'spanduk', 'Flexy China 240 GSM', '200 x 100 cm', 33000),
(4, 'spanduk', 'Flexy China 240 GSM', '300 x 100 cm', 49500),
(5, 'spanduk', 'Flexy China 240 GSM', '400 x 100 cm', 66000),
(6, 'spanduk', 'Flexy China 240 GSM', '500 x 100 cm', 82500),
(7, 'xbanner', 'Flexy China 280 GSM', '60 x 160 cm', 75000),
(8, 'xbanner', 'Flexy China 280 GSM', '80 x 180 cm', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `brosur`
--

CREATE TABLE `brosur` (
  `id_brosur` int(10) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `pesanan_brosur` varchar(45) NOT NULL,
  `ukuran_brosur` varchar(45) NOT NULL,
  `kertas_brosur` varchar(45) NOT NULL,
  `sisi_brosur` int(11) NOT NULL,
  `lipatan_brosur` varchar(45) NOT NULL,
  `jumlah_brosur` int(11) NOT NULL,
  `harga_brosur` int(11) NOT NULL,
  `file_depan` varchar(45) NOT NULL,
  `file_belakang` varchar(45) NOT NULL,
  `catatan_brosur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brosur`
--

INSERT INTO `brosur` (`id_brosur`, `userName`, `nama_produk`, `pesanan_brosur`, `ukuran_brosur`, `kertas_brosur`, `sisi_brosur`, `lipatan_brosur`, `jumlah_brosur`, `harga_brosur`, `file_depan`, `file_belakang`, `catatan_brosur`) VALUES
(10, 'hafiz', 'brosur', '5d50107ec9bcf', 'Kertas A4', 'Art Paper 120 GSM', 1, 'Tidak dilipat', 200, 300000, '5d5010a502b25.jpg', '', 'siapkan dalam dua hari ya'),
(11, 'hafiz', 'brosur', '5d517e826cf85', 'Kertas A4', 'Art Paper 120 GSM', 1, 'Tidak dilipat', 50, 150000, '5d517eb019228.jpg', '', 'asiyap'),
(12, 'hafiz', 'brosur', '5d54b3b7d9557', 'Kertas A4', 'Art Paper 120 GSM', 1, 'Tidak dilipat', 100, 300000, '5d54b3d421a57.jpg', '', 'siapkan besok ya'),
(13, 'nami', 'brosur', '5d54f741afd08', 'Kertas A4', 'Art Paper 120 GSM', 1, 'Tidak dilipat', 500, 500000, '5d54f75c6a9b8.jpg', '', 'siap dalam tiga hari ya'),
(14, 'hafiz', 'brosur', '5dbd11cd4c9d8', 'Kertas A4', 'Art Paper 120 GSM', 1, 'Tidak dilipat', 100, 200000, '5dbd121f0aa28.png', '', ''),
(15, 'hafiz', 'brosur', '5dc4c8b7bbc5c', 'Kertas A4', 'Art Paper 120 GSM', 1, 'Tidak dilipat', 200, 400000, '5dc4c8ea49b67.png', '', 'asddsadasd');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_banner`
--

CREATE TABLE `cetak_banner` (
  `id_cetakbanner` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `pesanan_cetakbanner` varchar(45) NOT NULL,
  `ukuran_cetakbanner` varchar(45) NOT NULL,
  `bahan_cetakbanner` varchar(45) NOT NULL,
  `jumlah_cetakbanner` int(11) NOT NULL,
  `harga_cetakbanner` int(11) NOT NULL,
  `file_satu` varchar(45) NOT NULL,
  `file_dua` varchar(45) NOT NULL,
  `catatan_cetakbanner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_banner`
--

INSERT INTO `cetak_banner` (`id_cetakbanner`, `userName`, `nama_produk`, `pesanan_cetakbanner`, `ukuran_cetakbanner`, `bahan_cetakbanner`, `jumlah_cetakbanner`, `harga_cetakbanner`, `file_satu`, `file_dua`, `catatan_cetakbanner`) VALUES
(5, 'hafiz', 'xbanner', '5d4e491b0d2cb', 'Flexy China 280 GSM', '60 x 160 cm', 1, 75000, '5d4e492b64c82.jpg', '', 'siap besok ya'),
(6, 'hafiz', 'spanduk', '5d501744bc0b0', 'Flexy China 240 GSM', '200 x 100 cm', 1, 33000, '5d50177239b11.jpg', '', 'siap dalam dua hari ya'),
(7, 'hafiz', 'xbanner', '5d50177630838', 'Flexy China 280 GSM', '60 x 160 cm', 1, 75000, '5d50178d4da01.jpg', '', 'siap dalam tiga hari ya');

-- --------------------------------------------------------

--
-- Table structure for table `cetak_kertas`
--

CREATE TABLE `cetak_kertas` (
  `id_cetakertas` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `pesanan_cetakertas` varchar(45) NOT NULL,
  `ukuran_cetakertas` varchar(45) NOT NULL,
  `kertas_cetakertas` varchar(45) NOT NULL,
  `sisi_cetakertas` int(11) NOT NULL,
  `jumlah_cetakertas` int(11) NOT NULL,
  `harga_cetakertas` int(11) NOT NULL,
  `gambar_depan` varchar(45) NOT NULL,
  `gambar_belakang` varchar(45) NOT NULL,
  `catatan_cetakertas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cetak_kertas`
--

INSERT INTO `cetak_kertas` (`id_cetakertas`, `userName`, `nama_produk`, `pesanan_cetakertas`, `ukuran_cetakertas`, `kertas_cetakertas`, `sisi_cetakertas`, `jumlah_cetakertas`, `harga_cetakertas`, `gambar_depan`, `gambar_belakang`, `catatan_cetakertas`) VALUES
(3, 'hafiz', 'flyer', '5d5010efd1f48', 'Kertas A5', 'Art Paper 150 GSM', 1, 40, 110000, '5d50110c5fceb.jpg', '', 'siapkan besok yaa'),
(4, 'hafiz', 'poster', '5d5011709062b', 'Kertas A4', 'Art Cartoon 260 GSM', 1, 25, 125000, '5d5011f459122.jpg', '', 'siapkan besok ya'),
(5, 'hafiz', 'poster', '5d54c34c6b313', 'Kertas A4', 'Art Paper 150 GSM', 1, 500, 531250, '5d54c35d5ee46.jpg', '', 'siapkan ya'),
(6, 'hafiz', 'flyer', '5d54c36e24fe9', 'Kertas A6', 'Art Paper 120 GSM', 1, 500, 212500, '5d54c37e528b8.jpg', '', 'siapkan ya');

-- --------------------------------------------------------

--
-- Table structure for table `kertas`
--

CREATE TABLE `kertas` (
  `id_kertas` int(11) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `ukuran_kertas` varchar(45) NOT NULL,
  `jenis_kertas` varchar(45) NOT NULL,
  `harga_kertas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kertas`
--

INSERT INTO `kertas` (`id_kertas`, `nama_produk`, `ukuran_kertas`, `jenis_kertas`, `harga_kertas`) VALUES
(1, 'brosur', 'Kertas A4', 'Art Paper 120 GSM', 4000),
(2, 'brosur', 'Kertas A4', 'Art Paper 150 GSM', 4250),
(3, 'brosur', 'Kertas A3', 'Art Paper 120 GSM', 6500),
(4, 'flyer', 'Kertas A4', 'Art Paper 120 GSM', 4000),
(5, 'flyer', 'Kertas A4', 'Art Paper 150 GSM', 4250),
(6, 'flyer', 'Kertas A5', 'Art Paper 120 GSM', 2400),
(7, 'flyer', 'Kertas A5', 'Art Paper 150 GSM', 2750),
(8, 'flyer', 'Kertas A6', 'Art Paper 120 GSM', 1700),
(9, 'flyer', 'Kertas A6', 'Art Paper 150 GSM', 1800),
(10, 'poster', 'Kertas A4', 'Art Paper 150 GSM', 4250),
(11, 'poster', 'Kertas A4', 'Art Cartoon 260 GSM', 5000),
(12, 'poster', 'Kertas A3', 'Art Paper 150 GSM', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `kertas_print`
--

CREATE TABLE `kertas_print` (
  `id_kertasprint` int(11) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `ukuran_kertas` varchar(45) NOT NULL,
  `warna_kertas` varchar(45) NOT NULL,
  `harga_kertas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kertas_print`
--

INSERT INTO `kertas_print` (`id_kertasprint`, `nama_produk`, `ukuran_kertas`, `warna_kertas`, `harga_kertas`) VALUES
(1, 'print', 'Kertas A4', 'Black / White', 250),
(2, 'print', 'Kertas A4', 'Color', 500),
(3, 'print', 'Kertas A3', 'Color', 3000),
(4, 'print', 'Kertas A3', 'Black / White', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `gambar_pembayaran` varchar(45) NOT NULL,
  `catatan_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_transaksi`, `jumlah_uang`, `tanggal_pembayaran`, `gambar_pembayaran`, `catatan_pembayaran`) VALUES
(1, 2, 40000, '2019-08-13', '5d52ac0d1b668.jpg', 'saya sudah transfer harap disiapkan');

-- --------------------------------------------------------

--
-- Table structure for table `print`
--

CREATE TABLE `print` (
  `id_print` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `nama_produk` varchar(45) NOT NULL,
  `pesanan_print` varchar(45) NOT NULL,
  `ukuran_print` varchar(45) NOT NULL,
  `black_print` int(11) NOT NULL,
  `color_print` int(11) NOT NULL,
  `sisi_print` int(11) NOT NULL,
  `jilid_print` varchar(45) NOT NULL,
  `harga_print` int(11) NOT NULL,
  `file_print` varchar(45) NOT NULL,
  `catatan_print` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `print`
--

INSERT INTO `print` (`id_print`, `userName`, `nama_produk`, `pesanan_print`, `ukuran_print`, `black_print`, `color_print`, `sisi_print`, `jilid_print`, `harga_print`, `file_print`, `catatan_print`) VALUES
(5, 'nami', 'print', '5d4e9abce94e7', 'Kertas A4', 15, 5, 1, '3000', 9250, '5d4e9add440b5.docx', 'siap dalam 10 menit ya mas'),
(8, 'hafiz', 'print', '5d501049e1a86', 'Kertas A4', 15, 7, 1, '3000', 10250, '5d5010654aeac.docx', 'siapkan yaa'),
(9, 'hafiz', 'print', '5dc4d46f57664', 'Kertas A4', 4, 4, 2, '3000', 9000, '5dc4d48fd89d3.docx', 'sasd');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` int(11) NOT NULL,
  `no_pesanan` varchar(45) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `catatan_produksi` varchar(100) NOT NULL,
  `status_produksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `no_pesanan`, `tanggal_produksi`, `tanggal_selesai`, `catatan_produksi`, `status_produksi`) VALUES
(1, '5d4f9375590ba', '2019-08-14', '2019-08-17', 'print, Kertas A4, 25, 5, 1, 3000', 2),
(2, '5d4e7026810b1', '2019-08-14', '2019-08-17', 'brosur, Kertas A4, Art Paper 120 GSM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `desc_pesanan` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `metode_transaksi` varchar(45) NOT NULL,
  `pengiriman_transaksi` varchar(45) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `status_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `userName`, `desc_pesanan`, `tgl_transaksi`, `metode_transaksi`, `pengiriman_transaksi`, `total_transaksi`, `status_transaksi`) VALUES
(1, 7, 'hafiz', '5d4f9375590ba, print, Kertas A4, 25, 5, 1, 3000', '2019-08-12', 'COD (CASH ON DELIVERY)', 'Delivery Order', 11750, 2),
(2, 9, 'hafiz', '5d4e7026810b1, brosur, Kertas A4, Art Paper 120 GSM, 1, Tidak dilipat, 15', '2019-08-12', 'COD (CASH ON DELIVERY)', 'Delivery Order', 60000, 1),
(3, 4, 'hafiz', '5d5011709062b, poster, Kertas A4, Art Cartoon 260 GSM, 1, 25', '2019-08-12', 'Bank Transfer', 'Delivery Order', 125000, 1),
(4, 13, 'nami', '5d54f741afd08, brosur, Kertas A4, Art Paper 120 GSM, 1, Tidak dilipat, 500', '2019-08-15', 'COD (CASH ON DELIVERY)', 'Delivery Order', 500000, 3),
(5, 14, 'hafiz', '5dbd11cd4c9d8, brosur, Kertas A4, Art Paper 120 GSM, 1, Tidak dilipat, 100', '2019-11-02', 'Bank Transfer', 'Delivery Order', 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userPass` varchar(20) NOT NULL,
  `userNama` varchar(45) NOT NULL,
  `userAlamat` varchar(100) NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `userHp` varchar(12) NOT NULL,
  `userGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `userPass`, `userNama`, `userAlamat`, `userEmail`, `userHp`, `userGroup`) VALUES
(1, 'admin', '05111998', 'Percetakan Kieta', 'Jl. Tuar Indah XI No.18 Blok 9', 'percetakan.kieta@gmail.com', '081370746626', 1),
(2, 'hafiz', '4444', 'Hafiz Nami', 'Jl. Tuar Indah XI No.18 Blok 9 Martubung', 'hafiznami@gmail.com', '087869208821', 2),
(3, 'nami', '8888', 'nami aja', 'Jl.Tuar Indah VIII No.20 Martubung', 'namiaja@gmail.com', '08126401021', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `brosur`
--
ALTER TABLE `brosur`
  ADD PRIMARY KEY (`id_brosur`);

--
-- Indexes for table `cetak_banner`
--
ALTER TABLE `cetak_banner`
  ADD PRIMARY KEY (`id_cetakbanner`);

--
-- Indexes for table `cetak_kertas`
--
ALTER TABLE `cetak_kertas`
  ADD PRIMARY KEY (`id_cetakertas`);

--
-- Indexes for table `kertas`
--
ALTER TABLE `kertas`
  ADD PRIMARY KEY (`id_kertas`);

--
-- Indexes for table `kertas_print`
--
ALTER TABLE `kertas_print`
  ADD PRIMARY KEY (`id_kertasprint`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `print`
--
ALTER TABLE `print`
  ADD PRIMARY KEY (`id_print`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brosur`
--
ALTER TABLE `brosur`
  MODIFY `id_brosur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cetak_banner`
--
ALTER TABLE `cetak_banner`
  MODIFY `id_cetakbanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cetak_kertas`
--
ALTER TABLE `cetak_kertas`
  MODIFY `id_cetakertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kertas`
--
ALTER TABLE `kertas`
  MODIFY `id_kertas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kertas_print`
--
ALTER TABLE `kertas_print`
  MODIFY `id_kertasprint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `print`
--
ALTER TABLE `print`
  MODIFY `id_print` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
