<?php 
	include_once "BLL.php";
	function Display($key,$value)
	{
		$KetQua=json_encode(array($key=>$value));
		echo $KetQua;
	}
	$XuLyNV=new XuLyNghiepVu();
	if(isset($_GET['cmd'])){
		switch ($_GET['cmd']) {
			case 'DemSoNguoiThamGia':
				if(isset($_GET['id_HoiThao'])){
					Display("SoLuong",$XuLyNV->DemSoNguoiThamGia($_GET['id_HoiThao']));
				}
				break;
			case 'DuyetHoiThao':
				if(isset($_GET['id_HoiThao'])&&isset($_GET['MaDuyet'])){
					Display("success",$XuLyNV->DuyetHoiThao($_GET['id_HoiThao'],$_GET['MaDuyet']));
				}
				break;
			case 'LayThongTinHoiThaoDaDuyet':
				Display("list",$XuLyNV->LayThongTinHoiThaoDaDuyet());
				break;
			case 'LayThongTinHoiThaoChuaDuyet':
				Display("list",$XuLyNV->LayThongTinHoiThaoChuaDuyet());
				break;
			case 'TaoHoiThao':
				if(isset($_GET['TenHoiThao'])&&isset($_GET['NgayToChuc'])&&isset($_GET['SoGio'])&&isset($_GET['SoNguoiThamGia'])){
					Display("success",$XuLyNV->TaoHoiThao($_GET['TenHoiThao'],$_GET['NgayToChuc'],$_GET['SoGio'],$_GET['SoNguoiThamGia']));
				}
				break;
			case 'ThemNguoiThamGia':
				if(isset($_GET['id_GiangVien'])&&isset($_GET['id_HoiThao'])){
					Display("success",$XuLyNV->ThemNguoiThamGia($_GET['id_GiangVien'],$_GET['id_HoiThao']));
				}
				break;
			case 'XoaNguoiThamGia':
				if(isset($_GET['id_GiangVien'])&&isset($_GET['id_HoiThao'])){
					Display("success",$XuLyNV->XoaNguoiThamGia($_GET['id_GiangVien'],$_GET['id_HoiThao']));
				}
				break;
			case 'LayThongTinHoiThao':
				if(isset($_GET['MaStt'])){
					Display("list",$XuLyNV->LayThongTinHoiThao($_GET['MaStt']));
				}
				break;
		}
	}else{
		echo 'Khong Nhan Duoc Lenh';
	}
?>