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
function DangXuat(){
	sessionStorage.setItem("success", "false");
	window.location.href = "..";
}
var temp="API.php?cmd=BaoCao";
$.ajax({type: 'GET',url: temp,
	success:function(data){
		obj=JSON.parse(data);
		sessionStorage.setItem("DaDuyet", obj.DaDuyet);
		sessionStorage.setItem("KhongDuyet", obj.ChuaDuyet);
		temp="../ThuKy/API.php?cmd=LayThongTinHoiThaoChuaDuyet";
		$.ajax({type: 'GET',url: temp,
			success:function(data){
				obj=JSON.parse(data);
				sessionStorage.setItem("DangCho", obj.list.length);
			}
		});
	}
});
var temp="../ThuKy/API.php?cmd=LayThongTinHoiThao&MaStt=2";
	$.ajax({type: 'GET',url: temp,
	success:function(data){
	  PageLayoutYC(data);
	}
});
function PageLayoutYC(data){
	obj = JSON.parse(data);
  var table=document.getElementById("bangyeucau");
  for (var i = 0; i < obj.list.length; i++) {
    var row=table.insertRow(i+1);
    var cell1=row.insertCell(0);
    var cell2=row.insertCell(1);
    var cell3=row.insertCell(2);
    var cell4=row.insertCell(3);
    //var cell5=row.insertCell(4);
    cell1.innerHTML=(i+1);
    cell2.innerHTML=obj.list[i].TenHoiThao;
    cell3.innerHTML=obj.list[i].NgayToChuc;
    cell4.innerHTML=obj.list[i].SoNguoiThamGia;
    //cell5.innerHTML=obj.list[i].SoLuongHienTai;
  }
}