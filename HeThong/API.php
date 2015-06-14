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
			case 'dangnhap':
				if(isset($_GET['tendangnhap'])&&isset($_GET['matkhau'])){
					$kq=$XuLyNV->DangNhap($_GET['tendangnhap'],$_GET['matkhau']);
					if($kq->TenDangNhap!=null){
						$KetQua=json_encode(array('success'=>true,'ThongTinTK'=>$kq));
						echo $KetQua;
					}else{
						$KetQua=json_encode(array('success'=>false));
						echo $KetQua;
					}	
				}
				break;
			case 'LayThongTinGiangVien':
				Display("list",$XuLyNV->LayThongTinGiangVien());
				break;
		}
	}else{
		echo 'Khong Nhan Duoc Lenh';
	}
?>