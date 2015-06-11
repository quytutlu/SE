-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 11, 2015 at 05:55 PM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayDanhSachGiangVienThamGiaHoiThao`(IN `id_HoiThao` INT)
BEGIN
	SELECT nguoithamgia.id_GiangVien,nguoithamgia.SoGioNhanDuoc
	FROM nguoithamgia
	WHERE nguoithamgia.id_HoiThao=id_HoiThao;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayHoiThao`(id_HoiThao int)
BEGIN
	SELECT hoithao.TenHoiThao,hoithao.NgayToChuc
    FROM hoithao
    WHERE hoithao.id=id_HoiThao;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LayThongTinHoiThao`(IN `MaStt` INT)
BEGIN
	if Mastt =-1 or Mastt=0 or Mastt=1 THEN
        select hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoNguoiThamGia,hoithao.TrangThai
        from hoithao
        WHERE hoithao.TrangThai=MaStt;
    ELSEIF Mastt =3 THEN
    	select hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoNguoiThamGia,hoithao.TrangThai
        from hoithao
        WHERE hoithao.TrangThai>0;
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
	SELECT hoithao.id, hoithao.TenHoiThao,hoithao.NgayToChuc,hoithao.SoGio ,hoithao.SoNguoiThamGia as SoLuongToiDa,R.SoLuongHienTai
	FROM hoithao LEFT JOIN(

	SELECT id_hoithao,COUNT(*) as SoLuongHienTai
	FROM nguoithamgia
	GROUP BY id_hoithao)as R on hoithao.id=R.id_HoiThao
	WHERE hoithao.TrangThai=2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SetSoGioNhanDuoc`(id_GiangVien int,id_HoiThao int, SoGio int)
BEGIN
	UPDATE nguoithamgia set nguoithamgia.SoGioNhanDuoc=SoGio WHERE nguoithamgia.id_GiangVien=id_GiangVien AND nguoithamgia.id_HoiThao=id_HoiThao;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoithao`
--

INSERT INTO `hoithao` (`id`, `TenHoiThao`, `NgayToChuc`, `SoGio`, `SoNguoiThamGia`, `TrangThai`) VALUES
(12, 'Smarthome', '16-6-2015', 10, 5, 2),
(13, 'Hội thảo việc làm', '15-6-2012', 15, 5, 2),
(14, 'Hội thảo việc làm', '12-5-2015', 30, 15, -1);

-- --------------------------------------------------------

--
-- Table structure for table `nguoithamgia`
--

CREATE TABLE IF NOT EXISTS `nguoithamgia` (
  `id` int(11) NOT NULL,
  `id_GiangVien` int(11) NOT NULL,
  `id_HoiThao` int(11) NOT NULL,
  `SoGioNhanDuoc` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoithamgia`
--

INSERT INTO `nguoithamgia` (`id`, `id_GiangVien`, `id_HoiThao`, `SoGioNhanDuoc`) VALUES
(45, 3, 12, 5),
(46, 3, 13, 10);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `nguoithamgia`
--
ALTER TABLE `nguoithamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
