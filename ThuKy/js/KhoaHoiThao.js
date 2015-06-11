//check session
if(sessionStorage.getItem("success")!="true")
{
	window.location.href = "..";
}

//load dư liệu từ database
var id=sessionStorage.getItem("id");
var user=sessionStorage.getItem("tendangnhap");
var vaitro=sessionStorage.getItem("vaitro");
document.getElementById("ThongBao").innerHTML="Xin chào "+user+" (id:"+id+")";
function DangXuat () {
	window.location.href="..";
}
var temp="../ThuKy/API.php?cmd=LayThongTinHoiThaoDaDuyet&id_GiangVien="+id;
$.ajax({type: 'GET',url: temp,
	success:function(data){
		PageLayout(data);
	}
});
function PageLayout(data){
	obj = JSON.parse(data);
	var table=document.getElementById("listHoiThao");
	for (var i = 0; i < obj.list.length; i++) {
		var row=table.insertRow(i+1);
		var cell1=row.insertCell(0);
		var cell2=row.insertCell(1);
		var cell3=row.insertCell(2);
		var cell4=row.insertCell(3);
		SoLuongToiDa=obj.list[i].SoLuongToiDa;
		SoLuongHienTai=obj.list[i].SoLuongHienTai;
		cell1.innerHTML=(i+1);
		cell2.innerHTML=obj.list[i].TenHoiThao+" ("+SoLuongHienTai+"/"+SoLuongToiDa+")";
		cell3.innerHTML=obj.list[i].NgayToChuc;
		cell4.innerHTML="<input type=\"checkbox\" id=\""+obj.list[i].id+"\" onclick=KhoaDangKy(this.id)>";
	}
}
function KhoaDangKy(id_HoiThao){
	var temp="../ThuKy/API.php?cmd=KhoaDangKy&id_HoiThao="+id_HoiThao;
	$.ajax({type: 'GET',url: temp,
		success:function(data){
			obj=JSON.parse(data);
			if(obj.success==true){
				window.location.href="KhoaHoiThao.php";
			}else{
				alert("Khóa đăng ký thất bại");
				window.location.href="KhoaHoiThao.php";
			}
		}
	});
}