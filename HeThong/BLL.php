<?php
	include_once "DAL.php";
	include_once "Object/TaiKhoan.php";
	class XuLyNghiepVu{
		private $ThaoTacCSDL;
		public function XuLyNghiepVu(){
			$this->ThaoTacCSDL=new TruyXuatDuLieu();
		}
		public function DangNhap($TenDangNhap,$MatKhau){
			$kq=$this->ThaoTacCSDL->DangNhap($TenDangNhap,$MatKhau);
			$row=mysql_fetch_array($kq);
			$tk=new TaiKhoan();
			$tk->id=$row[0];
			$tk->TenDangNhap=$row[1];
			$tk->MatKhau=$row[2];
			$tk->VaiTro=$row[3];
			return $tk;
		}
		public function LayThongTinGiangVien($id_GiangVien){
			$GiangVien=new TaiKhoan();
			$row=mysql_fetch_array($this->ThaoTacCSDL->LayThongTinGiangVien($id_GiangVien));
			$GiangVien->id=$row[0];
			$GiangVien->TenDangNhap=$row[1];
			return $GiangVien;
		}
	}
?>