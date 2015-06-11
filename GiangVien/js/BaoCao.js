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
var temp="API.php?cmd=LayCacHoiThaoDaThamGia&id_GiangVien="+id;
$.ajax({type: 'GET',url: temp,
	success:function(data){
		PageLayout(data);
	}
});
function PageLayout(data){
	obj = JSON.parse(data);
	var table=document.getElementById("listHoiThao");
	var i;
	SoGio=0;
	for ( i= 0; i < obj.list.length; i++) {
		var row=table.insertRow(i+1);
		var cell1=row.insertCell(0);
		var cell2=row.insertCell(1);
		var cell3=row.insertCell(2);
		var cell4=row.insertCell(3);
		cell1.innerHTML=(i+1);
		var temp="../ThuKy/API.php?cmd=LayHoiThao&id_HoiThao="+obj.list[i].id_HoiThao;
		$.ajax({async: false,type: 'GET',url: temp,
			success:function(data){
				ob=JSON.parse(data);
				cell2.innerHTML=ob.TenHoiThao;
				cell3.innerHTML=ob.NgayToChuc;
			}
		});
		if(obj.list[i].SoGioNhanDuoc==null){
			cell4.innerHTML="Đang chờ";
		}else{
			SoGio=SoGio+parseInt(obj.list[i].SoGioNhanDuoc);
			cell4.innerHTML=obj.list[i].SoGioNhanDuoc;
		}	
	}
	var row=table.insertRow(i+1);
	var cell1=row.insertCell(0);
	cell1.innerHTML="Tổng số: "+SoGio;
	cell1.style.textalign= "right";
	table.rows[i+1].cells[0].colSpan = 4;
	table.rows[i+1].cells[0].align = "right";
}