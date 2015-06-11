<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	class TruyXuatDuLieu{
		public function TruyXuatDuLieu(){
			$connect=mysql_connect("localhost","root","60648994t");
			mysql_query("SET character_set_results=utf8", $connect);
			mb_language('uni');
			mb_internal_encoding('UTF-8');
			mysql_select_db("giangvien", $connect);
			mysql_query("set names 'utf8'",$connect);
		}
		public function SetSoGioNhanDuoc($id_GiangVien,$id_HoiThao,$SoGio){
			$sql="Call SetSoGioNhanDuoc(".$id_GiangVien.",".$id_HoiThao.",".$SoGio.")";
			return mysql_query($sql);
		}
		public function ThemHoiThaoThamGia($id_GiangVien,$id_HoiThao){
			$sql="Call ThemHoiThaoThamGia(".$id_GiangVien.",".$id_HoiThao.")";
			return mysql_query($sql);
		}
		public function HuyHoiThaoThamGia($id_GiangVien,$id_HoiThao){
			$sql="Call HuyHoiThaoThamGia(".$id_GiangVien.",".$id_HoiThao.")";
			return mysql_query($sql);
		}
		public function LayCacHoiThaoDaThamGia($id_GiangVien){
			$sql="Call LayCacHoiThaoDaThamGia(".$id_GiangVien.")";
			return mysql_query($sql);
		}
	}
?>