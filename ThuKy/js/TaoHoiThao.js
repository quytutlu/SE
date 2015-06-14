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
function TaoHoiThao(){
	TenHoiThao=document.getElementById('TenHoiThao').value;
	NgayToChuc=document.getElementById('NgayToChuc').value;
	SoGio=document.getElementById('SoGio').value;
	SoNguoiThamGia=document.getElementById('SoNguoiThamGia').value;
	if(TenHoiThao==""||NgayToChuc==""||SoGio==""||SoNguoiThamGia==""){
		alert("Bạn phải nhập đủ thông tin");
	}else{
		$.ajax({type:'GET',url:"API.php?cmd=TaoHoiThao&TenHoiThao="+TenHoiThao+"&NgayToChuc="+NgayToChuc+"&SoGio="+SoGio+"&SoNguoiThamGia="+SoNguoiThamGia,
			success:function  (data) {
			obj = JSON.parse(data);
			if(obj.success==true)
			{
				document.getElementById('TenHoiThao').value="";
				document.getElementById('NgayToChuc').value="";
				document.getElementById('SoGio').value="";
				document.getElementById('SoNguoiThamGia').value="";
				alert("Thêm hội thảo thành công");
			}else{
				alert("Thêm hội thảo thất bại");
			}
		}});
	}
}