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
		if(obj.list[i].ThamGia==true){
			cell4.innerHTML="<input type=\"checkbox\" checked=\"true\" id=\""+obj.list[i].id+"\" onclick=DangKy(this.id)>";
		}else{
			cell4.innerHTML="<input type=\"checkbox\" id=\""+obj.list[i].id+"\" onclick=DangKy(this.id)>";
		}
	}
}
function DangKy(id_HoiThao){
	if(document.getElementById(id_HoiThao).checked==true){
		var temp="../ThuKy/API.php?cmd=ThemNguoiThamGia&id_GiangVien="+id+"&id_HoiThao="+id_HoiThao;
		$.ajax({type: 'GET',url: temp,
			success:function(data){
				obj=JSON.parse(data);
				if(obj.success==true){
					temp="API.php?cmd=ThemHoiThaoThamGia&id_GiangVien="+id+"&id_HoiThao="+id_HoiThao;
					$.ajax({async: false,type: 'GET',url: temp,
						success:function(data){
						}
					});
					window.location.href="DangKyHoiThao.php";
				}else{
					alert("Hội thảo đã đầy!");
					window.location.href="DangKyHoiThao.php";
				}
			}
		});
	}else{
		var temp="../ThuKy/API.php?cmd=XoaNguoiThamGia&id_GiangVien="+id+"&id_HoiThao="+id_HoiThao;
		$.ajax({type: 'GET',url: temp,
			success:function(data){
				obj=JSON.parse(data);
				if(obj.success==true){
					temp="API.php?cmd=HuyHoiThaoThamGia&id_GiangVien="+id+"&id_HoiThao="+id_HoiThao;
					$.ajax({async: false,type: 'GET',url: temp,
						success:function(data){
						}
					});
					window.location.href="DangKyHoiThao.php";
				}else{
					alert("Hủy tham gia hội thảo thất bại");
				}
			}
		});
	}
}