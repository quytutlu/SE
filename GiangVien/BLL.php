<?php
	include_once "DAL.php";
	include_once "Object/HoiThaoThamGia.php";
	class XuLyNghiepVu{
		private $ThaoTacCSDL;
		public function XuLyNghiepVu(){
			$this->ThaoTacCSDL=new TruyXuatDuLieu();
		}
		public function SetSoGioNhanDuoc($id_GiangVien,$id_HoiThao,$SoGio){
			return $this->ThaoTacCSDL->SetSoGioNhanDuoc($id_GiangVien,$id_HoiThao,$SoGio);
		}
		public function ThemHoiThaoThamGia($id_GiangVien,$id_HoiThao){
			return $this->ThaoTacCSDL->ThemHoiThaoThamGia($id_GiangVien,$id_HoiThao);
		}
		public function HuyHoiThaoThamGia($id_GiangVien,$id_HoiThao){
			return $this->ThaoTacCSDL->HuyHoiThaoThamGia($id_GiangVien,$id_HoiThao);
		}
		public function LayCacHoiThaoDaThamGia($id_GiangVien){
			$kq=$this->ThaoTacCSDL->LayCacHoiThaoDaThamGia($id_GiangVien);
			$list="";
			while($row=mysql_fetch_array($kq)){
				$HoiThao=new HoiThaoThamGia();
				$HoiThao->id_HoiThao=$row[0];
				$HoiThao->SoGioNhanDuoc=$row[1];
				$list[]=$HoiThao;
			}
			return $list;
		}
	}
?>