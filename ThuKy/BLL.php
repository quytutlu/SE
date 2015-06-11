<?php
	include_once "DAL.php";
	include_once "Object/HoiThao.php";
	include_once "Object/HoiThaoChuaDuyet.php";
	include_once "Object/HoiThaoDaThucHien.php";
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
		public function LayThongTinHoiThaoDaDuyet($id_GiangVien){
			$kq=$this->ThaoTacCSDL->LayThongTinHoiThaoDaDuyet($id_GiangVien);
			$list="";
			while($row=mysql_fetch_array($kq)){
				$ht=new HoiThao();
				$ht->id=$row[0];
				$ht->TenHoiThao=$row[1];
				$ht->NgayToChuc=$row[2];
				$ht->SoLuongToiDa=$row[3];
				$ht->SoLuongHienTai=$row[4]==null?"0":$row[4];
				$ht->ThamGia=$row[5]==null?false:true;
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
		public function KhoaDangKy($id_HoiThao){
			return $this->ThaoTacCSDL->KhoaDangKy($id_HoiThao);
		}
		public function LayDanhSachGiangVienThamGiaHoiThao($id_HoiThao){
			$kq=$this->ThaoTacCSDL->LayDanhSachGiangVienThamGiaHoiThao($id_HoiThao);
			$list="";
			while($row=mysql_fetch_array($kq)){
				$list[]=array($row[0],$row[1]);
			}
			return $list;
		}
		public function LayThongTinHoiThaoDaThucHien(){
			$kq=$this->ThaoTacCSDL->LayThongTinHoiThaoDaThucHien();
			$list="";
			while($row=mysql_fetch_array($kq)){
				$HoiThao= new HoiThaoDaThucHien();
				$HoiThao->id=$row[0];
				$HoiThao->TenHoiThao=$row[1];
				$HoiThao->NgayToChuc=$row[2];
				$HoiThao->SoGio=$row[3];
				$HoiThao->SoLuongToiDa=$row[4];
				$HoiThao->SoNguoiHienTai=$row[5];
				$list[]=$HoiThao;
			}
			return $list;
		}
		public function SetSoGioNhanDuoc($id_GiangVien,$id_HoiThao,$SoGio){
			//echo $id_GiangVien.$id_HoiThao.$SoGio;
			return $this->ThaoTacCSDL->SetSoGioNhanDuoc($id_GiangVien,$id_HoiThao,$SoGio);
		}
		public function LayHoiThao($id_HoiThao){
			$kq=$this->ThaoTacCSDL->LayHoiThao($id_HoiThao);
			$row=mysql_fetch_array($kq);
			$ht=new HoiThao();
			$ht->TenHoiThao=$row[0];
			$ht->NgayToChuc=$row[1];
			return $ht;
		}
	}
?>