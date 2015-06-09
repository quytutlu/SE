<?php
	include_once "DAL.php";
	include_once "Object/HoiThao.php";
	include_once "Object/HoiThaoChuaDuyet.php";
	class XuLyNghiepVu{
		private $ThaoTacCSDL;
		public function XuLyNghiepVu(){
			$this->ThaoTacCSDL=new TruyXuatDuLieu();
		}
		public function DemSoNguoiThamGia($id_HoiThao){
			$kq=$this->ThaoTacCSDL->DemSoNguoiThamGia($id_HoiThao);
			return mysql_fetch_array($kq)[0];
		}
		public function DuyetHoiThao($id_HoiThao,$MaDuyet){
			return $this->ThaoTacCSDL->DuyetHoiThao($id_HoiThao,$MaDuyet);
		}
		public function LayThongTinHoiThaoDaDuyet(){
			$kq=$this->ThaoTacCSDL->LayThongTinHoiThaoDaDuyet();
			$list="";
			while($row=mysql_fetch_array($kq)){
				$ht=new HoiThao();
				$ht->id=$row[0];
				$ht->TenHoiThao=$row[1];
				$ht->NgayToChuc=$row[2];
				$ht->SoLuongToiDa=$row[3];
				$ht->SoLuongHienTai=$row[4]==null?"0":$row[4];
				$list[]=$ht;
			}
			return $list;
		}
		public function LayThongTinHoiThaoChuaDuyet(){
			$kq=$this->ThaoTacCSDL->LayThongTinHoiThaoChuaDuyet();
			$list="";
			while($row=mysql_fetch_array($kq)){
				$ht=new HoiThaoChuaDuyet();
				$ht->id=$row[0];
				$ht->TenHoiThao=$row[1];
				$ht->NgayToChuc=$row[2];
				$ht->SoGio=$row[3];
				$ht->SoNguoiThamGia=$row[4];
				$list[]=$ht;
			}
			return $list;
		}
		public function TaoHoiThao($TenHoiThao,$NgayToChuc,$SoGio,$SoNguoiThamGia){
			return $this->ThaoTacCSDL->TaoHoiThao($TenHoiThao,$NgayToChuc,$SoGio,$SoNguoiThamGia);
		}
		public function ThemNguoiThamGia($id_GiangVien,$id_HoiThao){
			$kq=$this->ThaoTacCSDL->ThemNguoiThamGia($id_GiangVien,$id_HoiThao);
			return mysql_fetch_array($kq)[0]==1;
		}
		public function XoaNguoiThamGia($id_GiangVien,$id_HoiThao){
			return $this->ThaoTacCSDL->XoaNguoiThamGia($id_GiangVien,$id_HoiThao);
		}
		public function LayThongTinHoiThao($MaStt){
			$kq=$this->ThaoTacCSDL->LayThongTinHoiThao($MaStt);
			$list="";
			while($row=mysql_fetch_array($kq)){
				$ht=new HoiThao();
				$ht->TenHoiThao=$row[0];
				$ht->NgayToChuc=$row[1];
				$ht->SoNguoiThamGia=$row[2];
				$ht->SoLuongHienTai=$row[3];
				$list[]=$ht;
			}
			return $list;
		}
	}
?>