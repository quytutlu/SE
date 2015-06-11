-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 05:54 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hethong`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DangNhap`(TenDangNhap varchar(50),MatKhau varchar(50))
BEGIN
	SELECT *
	FROM thongtinnguoidung
	WHERE thongtinnguoidung.TenDangNhap=TenDangNhap and thongtinnguoidung.MatKhau=MatKhau;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayThongTinGiangVien`(IN `id_GiangVien` INT)
BEGIN
	SELECT thongtinnguoidung.id,thongtinnguoidung.HoVaTen
	FROM thongtinnguoidung
	WHERE thongtinnguoidung.id=id_GiangVien;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `thongtinnguoidung`
--

CREATE TABLE IF NOT EXISTS `thongtinnguoidung` (
  `id` int(11) NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `VaiTro` int(11) NOT NULL,
  `HoVaTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinnguoidung`
--

INSERT INTO `thongtinnguoidung` (`id`, `TenDangNhap`, `MatKhau`, `VaiTro`, `HoVaTen`) VALUES
(1, 'anhck', '123', 1, 'Cao Kim Ánh'),
(2, 'huett', '123', 2, 'Trần Thị Huệ'),
(3, 'hoangdx', '123', 3, 'Đỗ Xuân Hoàng'),
(4, 'tunq', '123', 3, 'Nguyễn Quý Tú');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thongtinnguoidung`
--
ALTER TABLE `thongtinnguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
