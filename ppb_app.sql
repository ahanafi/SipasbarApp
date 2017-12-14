-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 12:08 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppb_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id` varchar(15) NOT NULL,
  `ppb_id` varchar(15) NOT NULL,
  `is_approve_kasie` tinyint(1) NOT NULL,
  `is_approve_kadept` tinyint(1) NOT NULL,
  `is_approve_kadiv` tinyint(1) NOT NULL,
  `is_approve_security` tinyint(1) NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id`, `ppb_id`, `is_approve_kasie`, `is_approve_kadept`, `is_approve_kadiv`, `is_approve_security`, `idx`) VALUES
('96831D', '4C9DC1', 0, 0, 1, 1, 3),
('A5C3D5', 'BA9018', 1, 1, 1, 1, 1),
('B148BE', 'B9BFE0', 0, 0, 0, 0, 8),
('B73132', '4E7E00', 1, 1, 1, 1, 6),
('E26811', 'B47F95', 1, 0, 1, 0, 7),
('E52EA9', '189195', 0, 0, 0, 0, 9),
('E90EA5', '820EE0', 0, 1, 1, 0, 5),
('EBD3F2', '1D2D15', 1, 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(15) NOT NULL,
  `ppb_id` varchar(15) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `satuan` enum('unit','buah','pack') NOT NULL,
  `status` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `ppb_id`, `nama_barang`, `jumlah`, `satuan`, `status`, `keterangan`, `idx`) VALUES
('065E8A', 'B47F95', 'Apple iMac ME087ZP/A', 40, 'unit', 'Service', 'Late before 2013', 19),
('0766F3', 'B47F95', 'Apple iMac MK442', 30, 'unit', 'Return to Vendor', '(Late 2015)', 16),
('155465', 'B47F95', 'Apple iMac MB950ZA/A', 50, 'unit', 'Service', 'Late to 2009', 18),
('29A63F', '4C9DC1', 'Apple Macbook Pro 15 inch', 30, 'unit', 'Service', 'Good Product', 1),
('44D09E', '1D2D15', 'Lenovo Ideapad 300 14', 100, 'unit', 'Service', 'Lorem ipsum', 5),
('48FB18', 'BA9018', 'Apple Ipad Mini Wifi 32GB', 50, 'unit', 'Service', 'Tablet', 10),
('5B8D5F', '820EE0', 'Samsung Galaxy J3 Emerge', 40, 'buah', 'Return to Vendor', 'New Product', 12),
('5CA2EE', '1D2D15', 'Lenovo Thinkpad X230', 35, 'unit', 'Return to Vendor', 'Lorem ipsum dolor', 6),
('7159D0', '4C9DC1', 'Apple Macbook Air MD711ZA/A', 300, 'unit', 'Return to Vendor', 'Middle at 2013', 8),
('7D1558', 'B9BFE0', 'Apple iMac MC49423UA/A ', 50, 'unit', 'Return to Vendor', 'Middle to 2011', 20),
('8C2DCB', '4C9DC1', 'Apple Macbook Air MMGG2', 30, 'unit', 'Service', 'Silver colour', 9),
('B0D9D6', '820EE0', 'Samsung Galaxy J3 Pro (J3110)', 20, 'unit', 'Return to Vendor', 'Low End', 11),
('BF2DF0', 'B9BFE0', 'Apple iMac MC813ZA/A', 30, 'unit', 'Return to Vendor', 'Middle at 2011', 17),
('C4AD25', '1D2D15', 'Lenovo Ideapad 100 14', 50, 'unit', 'Service', 'QWERTYUIOP', 4),
('CB5EB6', '4E7E00', 'HP Samsung Galaxy C9 Pro', 120, 'unit', 'Return to Vendor', 'Good Product', 14),
('CCC6D8', '189195', 'Acer Aspire E5-475G-341S GR ', 200, 'unit', 'Service', 'Laptop With NVIDIA Geforce 940MX Intel Core I3-6006U Geo', 15),
('E0B82B', 'BA9018', 'Apple Iphone 7 64GB', 150, 'unit', 'Return to Vendor', 'New product of apple', 3),
('EC2CB0', '4C9DC1', 'Apple Macbook Pro 13.3 Touch bar', 150, 'unit', 'Return to Vendor', 'Late 2016', 7),
('F94ED5', '4E7E00', 'HP Samsung Galaxy C7 Pro', 50, 'unit', 'Service', 'BEST Product', 13),
('FBDD59', 'BA9018', 'Apple Iphone 6 32GB', 100, 'unit', 'Service', 'Good Smartphone', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ppb`
--

CREATE TABLE `ppb` (
  `id` varchar(15) NOT NULL,
  `nomor` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `no_kendaraan` varchar(30) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppb`
--

INSERT INTO `ppb` (`id`, `nomor`, `tanggal`, `no_kendaraan`, `tujuan`, `keterangan`, `idx`) VALUES
('189195', '4323/12/GS/2017', '2017-07-31', 'WX 6564 ZC', 'CV Budi Perkasa', 'Laptop Acer Aspire', 9),
('1D2D15', '1871/12/GS/2017', '2017-12-02', 'TZ 4995 ED', 'CV Budi Perkasa', 'Low End Product', 4),
('4C9DC1', '8273/12/GS/2017', '2017-12-02', 'AX 9262 SA', 'CV Jaya Motor Finance', 'All Apple Macbook Laptops', 3),
('4E7E00', '3553/12/GS/2017', '2017-12-02', 'GX 4222 ZB', 'PT Djarum Tbk', 'new Samsung smartphone', 6),
('820EE0', '4753/12/GS/2017', '2017-12-02', 'SA 0749 YC', 'CV Budi Perkasa', 'Samsung j3', 5),
('B47F95', '1752/12/GS/2017', '2017-12-02', 'JB 8801 AN', 'CV Budi Perkasa', 'Apple Imac', 7),
('B9BFE0', '8768/12/GS/2017', '2017-01-02', 'FS 8680 AZ', 'PT Agung Bakti Citra', 'Apple Desktop Computer', 8),
('BA9018', '3319/58/QX/21', '2017-12-01', 'AB 5610 GZ', 'PT Agung Podomoro', 'Good Product', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` varchar(15) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `type` enum('User','Vendor') NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `nama_unit`, `type`, `idx`) VALUES
('06DB00', 'Administrator', 'User', 1),
('509C52', 'Operator', 'User', 2),
('621E3A', 'Perusahaan', 'Vendor', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(15) NOT NULL,
  `unit_id` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unit_id`, `nama`, `username`, `password`, `email`, `bagian`, `telp`, `idx`) VALUES
('2E9060', '06DB00', 'Ahmad Hanafi', 'admin', '$2y$10$Yr2pChKUYVnVOQAmzHpu7.PQrE3MXD0nUXX/GLf9Fl2FmVd25t61y', 'Administrator@admin.com', 'Admin', '01201904', 1),
('46FD06', '06DB00', 'Muhammad Jafaruddin', 'jafar', '$2y$10$DrQAFXkMuRDddZiR.nxhp.rSotonZ0nuzMUVr5fifkHDHmb28oe9i', 'jafaruddin@mail.com', 'IT Support', '08498291001', 4),
('B2163F', '509C52', 'Moh. Nur Fawaiq', 'operator', '$2y$10$faJBd9wAK3/8o9eppLdt6eRnmn5n1PWwwTIYxJ0VeJTJm4kW4C5Ae', 'Operator@mail.com', 'Operator', '90432849328', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` varchar(15) NOT NULL,
  `unit_id` varchar(15) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(100) NOT NULL,
  `idx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `unit_id`, `perusahaan`, `alamat`, `telp`, `idx`) VALUES
('05EF59', '621E3A', 'PT Anugrah Abadi Sejahtera', 'Jakarta Utara', '082189891', 2),
('0F345B', '621E3A', 'CV Budi Perkasa', 'Kalimantan Tengah', '0120190301', 3),
('2ED682', '621E3A', 'PT Agung Bakti Citra', 'Bandung, Jawa Barat', '08121090190', 1),
('447E87', '621E3A', 'CV Jaya Motor Finance', 'Surabaya', '902577938', 5),
('CE5DC7', '621E3A', 'PT Djarum Tbk', 'Semarang, Jawa Tengah', '01231809019', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx` (`idx`),
  ADD KEY `barang_id` (`ppb_id`) USING BTREE;

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx` (`idx`);

--
-- Indexes for table `ppb`
--
ALTER TABLE `ppb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor` (`nomor`),
  ADD KEY `idx` (`idx`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx` (`idx`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx` (`idx`),
  ADD KEY `unit_user` (`unit_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx` (`idx`),
  ADD KEY `unit_vendor` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ppb`
--
ALTER TABLE `ppb`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `ppb_id` FOREIGN KEY (`ppb_id`) REFERENCES `ppb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_unit` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
