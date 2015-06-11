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
			case 'SetSoGioNhanDuoc':
				if(isset($_GET['id_GiangVien'])&&isset($_GET['id_HoiThao'])&&isset($_GET['SoGio'])){
					Display("success",$XuLyNV->SetSoGioNhanDuoc($_GET['id_GiangVien'],$_GET['id_HoiThao'],$_GET['SoGio']));
				}
				break;
			case 'ThemHoiThaoThamGia':
				if(isset($_GET['id_GiangVien'])&&isset($_GET['id_HoiThao'])){
					Display("success",$XuLyNV->ThemHoiThaoThamGia($_GET['id_GiangVien'],$_GET['id_HoiThao']));
				}
				break;
			case 'HuyHoiThaoThamGia':
				if(isset($_GET['id_GiangVien'])&&isset($_GET['id_HoiThao'])){
					Display("success",$XuLyNV->HuyHoiThaoThamGia($_GET['id_GiangVien'],$_GET['id_HoiThao']));
				}
				break;
			case 'LayCacHoiThaoDaThamGia':
				if(isset($_GET['id_GiangVien'])){
					Display("list",$XuLyNV->LayCacHoiThaoDaThamGia($_GET['id_GiangVien']));
				}
				break;
		}
	}else{
		echo 'Khong Nhan Duoc Lenh';
	}
?>