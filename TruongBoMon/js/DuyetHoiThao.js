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
var temp="../ThuKy/API.php?cmd=LayThongTinHoiThaoChuaDuyet";
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
		var cell5=row.insertCell(4);
		var cell6=row.insertCell(5);

		cell1.innerHTML=obj.list[i].TenHoiThao;
		cell2.innerHTML=obj.list[i].NgayToChuc;
		cell3.innerHTML=obj.list[i].SoGio;
		cell4.innerHTML=obj.list[i].SoNguoiThamGia;
		cell5.innerHTML="<input type=\"checkbox\" id=\""+obj.list[i].id+"\" onclick=DongY(this.id,"+(i+1)+")>";
		cell6.innerHTML="<input type=\"checkbox\" name=\""+obj.list[i].id+"k\" id=\""+obj.list[i].id+"\" onclick=KhongDongY(this.id,"+(i+1)+")>";
	}
}
function DongY(id,row){
	var table=document.getElementById("listHoiThao");
	if(confirm("Duyệt hội thảo?")==true){
		var temp="../ThuKy/API.php?cmd=DuyetHoiThao&id_HoiThao="+id+"&MaDuyet=1";
		$.ajax({type: 'GET',url: temp,
			success:function(data){
				obj=JSON.parse(data);
				if(obj.success==true){
					temp="API.php?cmd=ThemThongTinHoiThao&id_HoiThao="+id+"&TenHoiThao="+table.rows[row].cells[0].innerHTML+"&NgayToChuc="+table.rows[row].cells[1].innerHTML+"&SoNguoiThamGia="+table.rows[row].cells[2].innerHTML+"&TrangThai=1";
					$.ajax({type: 'GET',url: temp,
						success:function(data){
						}
					});
					window.location.href="DuyetHoiThao.php";
				}
			}
		});
	}else{
		document.getElementById(id).checked=false;
	}
}
function KhongDongY(id,row){
	var table=document.getElementById("listHoiThao");
	if(confirm("Không duyệt hội thảo?")==true){
		var temp="../ThuKy/API.php?cmd=DuyetHoiThao&id_HoiThao="+id+"&MaDuyet=0";
		$.ajax({type: 'GET',url: temp,
			success:function(data){
				obj=JSON.parse(data);
				if(obj.success==true){
					temp="API.php?cmd=ThemThongTinHoiThao&id_HoiThao="+id+"&TenHoiThao="+table.rows[row].cells[0].innerHTML+"&NgayToChuc="+table.rows[row].cells[1].innerHTML+"&SoNguoiThamGia="+table.rows[row].cells[2].innerHTML+"&TrangThai=0";
					$.ajax({type: 'GET',url: temp,
						success:function(data){
						}
					});
					window.location.href="DuyetHoiThao.php";
				}
			}
		});
	}else{
		window.location.href="DuyetHoiThao.php";
	}
	
}