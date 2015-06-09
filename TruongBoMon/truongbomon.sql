-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2015 at 06:58 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `truongbomon`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `BaoCao`()
BEGIN
	set @DaDuyet=(select COUNT(*) from thongtinhoithao WHERE thongtinhoithao.TrangThai=1);
	set @ChuaDuyet=(SELECT COUNT(*) from thongtinhoithao WHERE thongtinhoithao.TrangThai=0);
	SELECT @DaDuyet,@ChuaDuyet;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemThongTinHoiThao`(id_HoiThao int,TenHoiThao varchar(50),NgayToChuc varchar(50),SoNguoiThamGiaToiDa int,TrangThai int)
BEGIN
	insert INTO thongtinhoithao(thongtinhoithao.id_HoiThao,thongtinhoithao.TenHoiThao,thongtinhoithao.NgayToChuc,thongtinhoithao.SoNguoiThamGiaToiDa,thongtinhoithao.TrangThai) VALUES(id_HoiThao,TenHoiThao,NgayToChuc,SoNguoiThamGiaToiDa,TrangThai);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `thongtinhoithao`
--

CREATE TABLE IF NOT EXISTS `thongtinhoithao` (
  `id` int(11) NOT NULL,
  `id_HoiThao` int(11) NOT NULL,
  `TenHoiThao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayToChuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoNguoiThamGiaToiDa` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtinhoithao`
--

INSERT INTO `thongtinhoithao` (`id`, `id_HoiThao`, `TenHoiThao`, `NgayToChuc`, `SoNguoiThamGiaToiDa`, `TrangThai`) VALUES
(7, 6, 'SmartHome', '16-6-1994', 20, 1),
(8, 7, 'Nghiên cứu khoa học', '20-6-2015', 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thongtinhoithao`
--
ALTER TABLE `thongtinhoithao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thongtinhoithao`
--
ALTER TABLE `thongtinhoithao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
