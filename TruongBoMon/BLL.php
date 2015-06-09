<?php
	include_once "DAL.php";
	class XuLyNghiepVu{
		private $ThaoTacCSDL;
		public function XuLyNghiepVu(){
			$this->ThaoTacCSDL=new TruyXuatDuLieu();
		}
		public function ThemThongTinHoiThao($id_HoiThao,$TenHoiThao,$NgayToChuc,$SoNguoiThamGia,$TrangThai){
			return $this->ThaoTacCSDL->ThemThongTinHoiThao($id_HoiThao,$TenHoiThao,$NgayToChuc,$SoNguoiThamGia,$TrangThai);
		}
		public function BaoCao(){
			return $this->ThaoTacCSDL->BaoCao();
		}
	}
?>