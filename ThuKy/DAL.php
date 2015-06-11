<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	class TruyXuatDuLieu{
		public function TruyXuatDuLieu(){
			$connect=mysql_connect("localhost","root","60648994t");
			mysql_query("SET character_set_results=utf8", $connect);
			mb_language('uni');
			mb_internal_encoding('UTF-8');
			mysql_select_db("thuky", $connect);
			mysql_query("set names 'utf8'",$connect);
		}
		public function DemSoNguoiThamGia($id_HoiThao){
			$sql="Call DemSoNguoiThamGia(".$id_HoiThao.")";
			return mysql_query($sql);
		}
		public function DuyetHoiThao($id_HoiThao,$MaDuyet){
			$sql="Call DuyetHoiThao(".$id_HoiThao.",".$MaDuyet.")";
			return mysql_query($sql);
		}
		public function LayThongTinHoiThaoDaDuyet($id_GiangVien){
			$sql="Call LayThongTinHoiThaoDaDuyet(".$id_GiangVien.")";
			return mysql_query($sql);
		}
		public function LayThongTinHoiThaoChuaDuyet(){
			$sql="Call LayThongTinHoiThaoChuaDuyet()";
			return mysql_query($sql);
		}
		public function TaoHoiThao($TenHoiThao,$NgayToChuc,$SoGio,$SoNguoiThamGia){
			$sql="Call TaoHoiThao('".$TenHoiThao."','".$NgayToChuc."',".$SoGio.",".$SoNguoiThamGia.")";
			return mysql_query($sql);
		}
		public function ThemNguoiThamGia($id_GiangVien,$id_HoiThao){
			$sql="Call ThemNguoiThamGia(".$id_GiangVien.",".$id_HoiThao.",@KetQua)";
			mysql_query($sql);
			return mysql_query("SELECT @KetQua AS KQ");
		}
		public function XoaNguoiThamGia($id_GiangVien,$id_HoiThao){
			$sql="Call XoaNguoiThamGia(".$id_GiangVien.",".$id_HoiThao.")";
			return mysql_query($sql);
		}
		public function LayThongTinHoiThao($MaStt){
			$sql="Call LayThongTinHoiThao(".$MaStt.")";
			return mysql_query($sql);
		}
		public function KhoaDangKy($id_HoiThao){
			$sql="Call KhoaDangKy(".$id_HoiThao.")";
			return mysql_query($sql);
		}
		public function LayDanhSachGiangVienThamGiaHoiThao($id_HoiThao){
			$sql="Call LayDanhSachGiangVienThamGiaHoiThao(".$id_HoiThao.")";
			return mysql_query($sql);
		}
		public function LayThongTinHoiThaoDaThucHien(){
			$sql="Call LayThongTinHoiThaoDaThucHien()";
			return mysql_query($sql);
		}
		public function SetSoGioNhanDuoc($id_GiangVien,$id_HoiThao,$SoGio){
			$sql="Call SetSoGioNhanDuoc(".$id_GiangVien.",".$id_HoiThao.",".$SoGio.")";
			return mysql_query($sql);
		}
		public function LayHoiThao($id_HoiThao){
			$sql="Call LayHoiThao(".$id_HoiThao.")";
			return mysql_query($sql);
		}
	}
?>