-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2015 at 12:13 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thuky`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DemSoNguoiThamGia`(id_HoiThao int)
BEGIN
	SELECT count(*) as SoLuong
	from nguoithamgia
	WHERE nguoithamgia.id_HoiThao=id_HoiThao;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DuyetHoiThao`(id_HoiThao int, MaDuyet int)
BEGIN
	UPDATE hoithao SET hoithao.TrangThai=MaDuyet WHERE hoithao.id=id_HoiThao;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `KhoaDangKy`(id_HoiThao int)
BEGIN
	UPDATE hoithao set hoithao.TrangThai=2 WHERE hoithao.id=id_HoiThao;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayThongTinHoiThao`(IN `MaStt` INT)
BEGIN
	if Mastt <>2 THEN
        select hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoNguoiThamGia,hoithao.TrangThai
        from hoithao
        WHERE hoithao.TrangThai=MaStt;
    ELSE
    	select hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoNguoiThamGia,hoithao.TrangThai
        from hoithao;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayThongTinHoiThaoChuaDuyet`()
BEGIN
	SELECT *
    FROM hoithao
    WHERE hoithao.TrangThai=-1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayThongTinHoiThaoDaDuyet`(IN `id_GiangVien` INT)
BEGIN
	SELECT T.*,nguoithamgia.id as ThamGia
	FROM nguoithamgia RIGHT JOIN(
        SELECT hoithao.id, hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoNguoiThamGia as SoLuongToiDa,R.SoLuongHienTai
        FROM hoithao LEFT JOIN(
        	SELECT id_hoithao,COUNT(*) as SoLuongHienTai
        	FROM nguoithamgia
			GROUP BY id_hoithao)as R on hoithao.id=R.id_HoiThao
	WHERE hoithao.TrangThai=1)as T ON T.id=nguoithamgia.id_HoiThao and nguoithamgia.id_GiangVien=id_GiangVien;
/* IN (SELECT nguoithamgia.id_HoiThao FROM nguoithamgia WHERE nguoithamgia.id_GiangVien=id_GiangVien);*/
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayThongTinHoiThaoDaThucHien`()
BEGIN
	SELECT hoithao.id, hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoNguoiThamGia as SoLuongToiDa,R.SoLuongHienTai
	FROM hoithao LEFT JOIN(
	SELECT id_hoithao,COUNT(*) as SoLuongHienTai
	FROM nguoithamgia
	GROUP BY id_hoithao)as R on hoithao.id=R.id_HoiThao
	WHERE hoithao.TrangThai=2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TaoHoiThao`(IN `TenHoiThao` VARCHAR(50), IN `NgayToChuc` VARCHAR(50), IN `SoGio` INT, IN `SoNguoiThamGia` INT)
BEGIN
	INSERT INTO hoithao(hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoGio,hoithao.SoNguoiThamGia,hoithao.TrangThai) VALUES(TenHoiThao,NgayToChuc,SoGio,SoNguoiThamGia,-1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ThemNguoiThamGia`(IN `id_GiangVien` INT(2), IN `id_HoiThao` INT(1), INOUT `KQ` INT)
BEGIN
		set @sl=(select hoithao.SoNguoiThamGia from hoithao WHERE hoithao.id=id_HoiThao);
		set @currentSL=(SELECT count(*) as SL FROM nguoithamgia WHERE nguoithamgia.id_HoiThao=id_HoiThao);
		if @sl>@currentSL THEN
			INSERT INTO nguoithamgia(nguoithamgia.id_GiangVien,nguoithamgia.id_HoiThao) VALUES (id_GiangVien,id_HoiThao);
			set KQ=1;
		ELSE
			set KQ=0;
		end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `XoaNguoiThamGia`(id_GiangVien int,id_HoiThao int)
BEGIN
	DELETE FROM nguoithamgia WHERE nguoithamgia.id_GiangVien=id_GiangVien AND nguoithamgia.id_HoiThao=id_HoiThao;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hoithao`
--

CREATE TABLE IF NOT EXISTS `hoithao` (
  `id` int(11) NOT NULL,
  `TenHoiThao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgayToChuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoGio` int(11) NOT NULL,
  `SoNguoiThamGia` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoithao`
--

INSERT INTO `hoithao` (`id`, `TenHoiThao`, `NgayToChuc`, `SoGio`, `SoNguoiThamGia`, `TrangThai`) VALUES
(6, 'SmartHome', '16-6-1994', 20, 30, 2),
(7, 'Nghiên cứu khoa học', '20-6-2015', 10, 20, 0),
(8, 'Hội thảo sức khỏe', '10-10-2015', 20, 15, 1),
(9, 'Hội thảo tin học', '12-3-2015', 10, 3, 1),
(10, 'Hội thảo việc làm', '12-5-2015', 10, 2, 2),
(11, 'Hội thảo tiếng anh', '11-4-2015', 5, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nguoithamgia`
--

CREATE TABLE IF NOT EXISTS `nguoithamgia` (
  `id` int(11) NOT NULL,
  `id_GiangVien` int(11) NOT NULL,
  `id_HoiThao` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoithamgia`
--

INSERT INTO `nguoithamgia` (`id`, `id_GiangVien`, `id_HoiThao`) VALUES
(34, 4, 6),
(39, 4, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoithao`
--
ALTER TABLE `hoithao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoithamgia`
--
ALTER TABLE `nguoithamgia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoithao`
--
ALTER TABLE `hoithao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nguoithamgia`
--
ALTER TABLE `nguoithamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
