<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	class TruyXuatDuLieu{
		public function TruyXuatDuLieu(){
			$connect=mysql_connect("localhost","root","60648994t");
			mysql_query("SET character_set_results=utf8", $connect);
			mb_language('uni');
			mb_internal_encoding('UTF-8');
			mysql_select_db("hethong", $connect);
			mysql_query("set names 'utf8'",$connect);
		}
		public function DangNhap($TenDangNhap,$MatKhau){
			$sql="Call DangNhap('".$TenDangNhap."','".$MatKhau."')";
			return mysql_query($sql);
		}
	}
?>