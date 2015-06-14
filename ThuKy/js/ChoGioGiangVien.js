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
var temp="API.php?cmd=LayThongTinHoiThaoDaThucHien";
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
		SoLuongToiDa=obj.list[i].SoLuongToiDa;
		SoLuongHienTai=obj.list[i].SoNguoiHienTai==null?0:obj.list[i].SoNguoiHienTai;
		cell1.innerHTML=(i+1);
		cell2.innerHTML="<li style=\"list-style:none;\"><a href=\"#\" id=\""+obj.list[i].id+"\" name=\""+obj.list[i].TenHoiThao+"\" onclick=\"LayDanhSachGiangVien(this.name,this.id,"+obj.list[i].SoGio+")\" style=\"text-decoration:none;outline: 0\">"+obj.list[i].TenHoiThao+"</a></li>";
		cell3.innerHTML=obj.list[i].NgayToChuc;
		cell4.innerHTML=obj.list[i].SoGio;
		cell5.innerHTML=SoLuongHienTai;
		cell6.innerHTML=SoLuongToiDa;
	}
}
function LayDanhSachGiangVien(TenHoiThao,id,SoGio){
	//alert(SoGio);
	document.getElementById('lb_ds').innerHTML="Hội thảo \""+TenHoiThao+"\"";
	document.getElementById('ds_GiangVien').setAttribute("style", "display:show");
	document.getElementById('ds_HoiThao').setAttribute("style", "display:none");
	var temp="API.php?cmd=LayDanhSachGiangVienThamGiaHoiThao&id_HoiThao="+id;
	$.ajax({type: 'GET',url: temp,
		success:function(data){
			DanhSachGiangVien(data,id,SoGio);
		}
	})
}
function TimGiangVien(id,ob){
	for(var i=0;i<ob.list.length;i++){
		if(id==ob.list[i].id){
			return ob.list[i].TenDangNhap;
		}
	}
}
function DanhSachGiangVien(data,id_HoiThao,SoGioToiDa){
	obj=JSON.parse(data);
	var table=document.getElementById("listGiangVien");
	var temp="../HeThong/API.php?cmd=LayThongTinGiangVien";
	$.ajax({type: 'GET',url: temp,
		success:function(data_GiangVien){
			ob=JSON.parse(data_GiangVien);
			var i;
			for (i = 0; i < obj.list.length; i++) {
				var row=table.insertRow(i+1);
				var cell1=row.insertCell(0);
				var cell2=row.insertCell(1);
				var cell3=row.insertCell(2);
				var cell4=row.insertCell(3);
				var cell5=row.insertCell(4);
				var cell6=row.insertCell(5);
				cell1.innerHTML=(i+1);
				cell2.innerHTML=TimGiangVien(obj.list[i][0],ob);
				SoGio=obj.list[i][1];
				if(SoGio==0){
					cell3.innerHTML="<center><input type='text' class='form-control' style='width:200px' id='"+(i+1)+"SoGio' placeholder='Số giờ'></center>";
				}else{
					cell3.innerHTML="<center><input type='text' class='form-control' style='width:200px' id='"+(i+1)+"SoGio' value='"+SoGio+"' placeholder='Số giờ'></center>";
				}
				cell4.innerHTML="<input class=\"btn btn-primary\" style=\"outline:0;\" type=\"button\" id=\""+(i+1)+"\" onclick=\"Update(this.id,"+(i+1)+")\" value=\"update\"/>";;
				cell5.innerHTML=obj.list[i][0];
				cell5.style.display="none";
				cell6.innerHTML=id_HoiThao;
				cell6.style.display="none";
			}
			var row=table.insertRow(i+1);
			var cell1=row.insertCell(0);
			cell1.innerHTML="Tổng số giờ tối đa: "+SoGioToiDa;
			table.rows[i+1].cells[0].colSpan = 4;
		}
	});
}
function Update(id,row){
	var table=document.getElementById("listGiangVien");
	id_GiangVien=table.rows[row].cells[4].innerHTML;
	id_HoiThao=table.rows[row].cells[5].innerHTML;
	SoGio=document.getElementById(id+"SoGio").value;
	if(SoGio==""){
		alert("Nhập số giờ");	
	}
	var temp="API.php?cmd=SetSoGioNhanDuoc&id_GiangVien="+id_GiangVien+"&id_HoiThao="+id_HoiThao+"&SoGio="+SoGio;
	$.ajax({type: 'GET',url: temp,
		success:function(data){
			obj=JSON.parse(data);
			if(obj.success==true){
				temp="../GiangVien/API.php?cmd=SetSoGioNhanDuoc&id_GiangVien="+id_GiangVien+"&id_HoiThao="+id_HoiThao+"&SoGio="+SoGio;
				$.ajax({type: 'GET',url: temp,
					success:function(data){
					}
				});
				alert("Cho giờ thành công!");
			}else{
				alert("Vượt quá số giờ tối đa cho phép");
			}
		}
	});
	//alert("id_GiangVien: "+id_GiangVien+" id_HoiThao: "+id_HoiThao+ "SoGio: "+ SoGio);
}