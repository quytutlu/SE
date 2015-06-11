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
				if(isset($_GET['id_GiangVien'])){
					Display("list",$XuLyNV->LayThongTinHoiThaoDaDuyet($_GET['id_GiangVien']));
				}
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
			case 'KhoaDangKy':
				if(isset($_GET['id_HoiThao'])){
					Display("success",$XuLyNV->KhoaDangKy($_GET['id_HoiThao']));
				}
				break;
			case 'LayDanhSachGiangVienThamGiaHoiThao':
				if(isset($_GET['id_HoiThao'])){
					Display("list",$XuLyNV->LayDanhSachGiangVienThamGiaHoiThao($_GET['id_HoiThao']));
				}
				break;
			case 'LayThongTinHoiThaoDaThucHien':
				Display("list",$XuLyNV->LayThongTinHoiThaoDaThucHien());
				break;
			case 'SetSoGioNhanDuoc':
				if(isset($_GET['id_GiangVien'])&&isset($_GET['id_HoiThao'])&&isset($_GET['SoGio'])){
					Display("success",$XuLyNV->SetSoGioNhanDuoc($_GET['id_GiangVien'],$_GET['id_HoiThao'],$_GET['SoGio']));
				}
				break;
			case 'LayHoiThao':
				if(isset($_GET['id_HoiThao'])){
					echo json_encode($XuLyNV->LayHoiThao($_GET['id_HoiThao']));
				}
				break;
		}
	}else{
		echo 'Khong Nhan Duoc Lenh';
	}
?>