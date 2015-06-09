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
			case 'ThemThongTinHoiThao':
				if(isset($_GET['id_HoiThao'])&&isset($_GET['TenHoiThao'])&&isset($_GET['NgayToChuc'])&&isset($_GET['SoNguoiThamGia'])&&isset($_GET['TrangThai'])){
					Display("success",$XuLyNV->ThemThongTinHoiThao($_GET['id_HoiThao'],$_GET['TenHoiThao'],$_GET['NgayToChuc'],$_GET['SoNguoiThamGia'],$_GET['TrangThai']));
					
				}
				break;
			case 'BaoCao':
				$kq=$XuLyNV->BaoCao();
				$row=mysql_fetch_array($kq);
				echo json_encode(array('DaDuyet'=>$row[0],'ChuaDuyet'=>$row[1]));
				break;
		}
	}else{
		echo 'Khong Nhan Duoc Lenh';
	}
?>