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
-- Database: `giangvien`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `HuyHoiThaoThamGia`(id_GiangVien int,id_HoiThao int)
BEGIN
	DELETE FROM hoithaothamgia WHERE hoithaothamgia.id_GiangVien=id_GiangVien AND hoithaothamgia.id_HoiThao=id_HoiThao;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayCacHoiThaoDaThamGia`(IN `id_GiangVien` INT)
BEGIN
	SELECT hoithaothamgia.id_HoiThao,hoithaothamgia.SoGioNhanDuoc
    from hoithaothamgia
    WHERE hoithaothamgia.id_GiangVien=id_GiangVien;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SetSoGioNhanDuoc`(id_GiangVien int,id_HoiThao int,SoGio int)
BEGIN
	UPDATE hoithaothamgia set hoithaothamgia.SoGioNhanDuoc=SoGio WHERE hoithaothamgia.id_GiangVien=id_GiangVien AND hoithaothamgia.id_HoiThao=id_HoiThao;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemHoiThaoThamGia`(IN `id_GiangVien` INT, IN `id_HoiThao` INT)
BEGIN
	INSERT INTO hoithaothamgia(hoithaothamgia.id_GiangVien,hoithaothamgia.id_HoiThao) VALUES(id_GiangVien,id_HoiThao);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hoithaothamgia`
--

CREATE TABLE IF NOT EXISTS `hoithaothamgia` (
  `id` int(11) NOT NULL,
  `id_GiangVien` int(11) NOT NULL,
  `id_HoiThao` int(11) NOT NULL,
  `SoGioNhanDuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoithaothamgia`
--

INSERT INTO `hoithaothamgia` (`id`, `id_GiangVien`, `id_HoiThao`, `SoGioNhanDuoc`) VALUES
(8, 3, 12, 5),
(9, 3, 13, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoithaothamgia`
--
ALTER TABLE `hoithaothamgia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoithaothamgia`
--
ALTER TABLE `hoithaothamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
