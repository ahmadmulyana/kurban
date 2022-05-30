-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 07:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurban`
--

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `perusahaan` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `youtube` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `official` varchar(250) DEFAULT NULL,
  `alternative` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `perusahaan`, `instagram`, `youtube`, `facebook`, `official`, `alternative`, `email`) VALUES
(1, 'Kurbandipelosok.com', 'https://www.instagram.com/tcare.id/', '#', '#', '08111620333', '08116601230', 'halo@tcare.id');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `id_unique` varchar(11) DEFAULT NULL,
  `kategori` varchar(250) DEFAULT NULL,
  `prioritas` varchar(250) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `id_unique`, `kategori`, `prioritas`, `deskripsi`, `gambar`, `status`) VALUES
(1, '05510119139', 'KURBANdiPelosok', 'Kurban Prioritas, Nusa Tenggara Timur', '<ol>\r\n						<li>Di wilayah pelosok Nusa Tenggara Timur, Islam adalah agama minoritas (hanya 8.8% dari total penduduk menurut BPS 2021), menjadikan jarang/sedikit yang mengadakan Kurban di wilayah tersebut.</li>\r\n						<li>Banyak penduduk pelosok yang jarang bahkan tidak merasakan daging kurban karena keterbatasan dan sulitnya akses ke daerah tersebut.</li>\r\n						<li>Daging kurban-mu akan didistribusikan kepada yatim dan prasejahtera di pelosok wilayah Nusa Tenggara Timur.</li>\r\n						<li>Memberdayakan peternak lokal di wilayah Nusa Tenggara Timur.</li>\r\n					</ol>', 'kat-yukawa-K0E6E0a0R3A-unsplash-700x990.jpg', '1'),
(2, '66992057194', 'KURBANdiRendang', '', '<ol>\r\n	<li>Daging kurban yang diolah menjadi Rendang dalam bentuk kaleng (200gr) tahan lama hingga 2 tahun.</li>\r\n	<li>Pemotongan kurbang dilakukan di Rumah Potong Hewan (RPH) yang sesuai prosedur syariah Islam.</li>\r\n	<li>Rendang kaleng kurban-mu akan didistribusikan kepada mustahik yatim dan prasejahtera binaan T.CARE      dan stok ketahanan pangan apabila ada bencana alam di Indonesia.</li>\r\n</ol>', 'kat-yukawa-K0E6E0a0R3A-unsplash-700x990.jpg', '1'),
(3, '98607414619', 'KURBANdiKota', '', '<ol>\r\n	<li>Daging kurban dibungkus besek bambu yang\r\nmendukung program Go Green.</li>\r\n	<li>Daging kurban didistribusikan untuk mustahik yatim dan\r\nprasejahtera di wilayah DKI Jakarta dan sekitarnya.</li>\r\n	<li>Hak daging pengurban langsung diantar ke rumah saat\r\nhari pemotongan.</li>\r\n</ol>\r\n\r\n<div>\r\n	<p>Ket : </p>\r\n	<p>Harga sudah termasuk hewan, pemotongan, RPH, dan tim penyembelihan bersertifikat halal.</p>\r\n</div>', 'kat-yukawa-K0E6E0a0R3A-unsplash-700x990.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_order` varchar(11) DEFAULT NULL,
  `nama_klien` varchar(250) DEFAULT NULL,
  `id_klien` varchar(11) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `tujuan` varchar(250) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_order` varchar(11) DEFAULT NULL,
  `nama_produk` varchar(250) DEFAULT NULL,
  `kategori` varchar(250) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `voucher` varchar(250) DEFAULT NULL,
  `nominal_voucher` double DEFAULT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_unique` varchar(11) DEFAULT NULL,
  `nama_produk` varchar(250) DEFAULT NULL,
  `kategori` varchar(250) DEFAULT NULL,
  `prioritas` varchar(250) NOT NULL,
  `harga` double DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_unique`, `nama_produk`, `kategori`, `prioritas`, `harga`, `gambar`, `status`) VALUES
(1, '37795341618', 'Kambing', 'KURBANdiPelosok', 'Kurban Prioritas, Nusa Tenggara Timur', 2480000, 'kambing.jpg', '1'),
(2, '89393210194', 'Sapi', 'KURBANdiPelosok', 'Kurban Prioritas, Nusa Tenggara Timur', 15880000, 'sapi.jpg', '1'),
(3, '26070084303', 'Sapi 1/7', 'KURBANdiPelosok', '', 2480000, 'sapispertujuh.jpg', '1'),
(4, '35474853175', 'Kambing', 'KURBANdiRendang', '', 2880000, 'rendang.jpg', '1'),
(5, '73170671143', 'Sapi', 'KURBANdiRendang', '', 17880000, 'rendang.jpg', '1'),
(6, '69853675810', 'Sapi 1/7', 'KURBANdiRendang', '', 2880000, 'rendang.jpg', '1'),
(7, '82635341092', 'Sapi', 'KURBANdiKota', '', 28000000, 'kambing.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_unique` varchar(11) DEFAULT NULL,
  `nama_klien` varchar(250) DEFAULT NULL,
  `no_telp` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_unique`, `nama_klien`, `no_telp`, `email`, `alamat`, `password`, `status`) VALUES
(1, '67348327094', 'Ahmad Mulyana', '082122605514', 'me@ahmadmulyana.my.id', 'Jl. Bulak Rantai Jakarta Timur', '0b1a4d9c96056f11f934c1aab0785ab7', '2'),
(2, '58831260799', 'tester', '021800000', 'ahmadmulyana0807@gmail.com', NULL, '202cb962ac59075b964b07152d234b70', '1'),
(3, '43875103915', 'lupa', '12345', 'amul@haribima.id', NULL, '202cb962ac59075b964b07152d234b70', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
