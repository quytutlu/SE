var DaDuyet=sessionStorage.getItem("DaDuyet");
var KhongDuyet=sessionStorage.getItem("KhongDuyet");
var DangCho=sessionStorage.getItem("DangCho");
var vaitro=sessionStorage.getItem("vaitro");
var id=sessionStorage.getItem("id");
var Tong=parseFloat(DaDuyet)+parseFloat(KhongDuyet)+parseFloat(DangCho);
var a=(DaDuyet/Tong)*100;
var b=(KhongDuyet/Tong)*100;
var c=(DangCho/Tong)*100;
$(function() {
  var data = [
  { label: "Được duyệt ("+DaDuyet+")",  data:a , color: "#48CA3B"},
  { label: "Đang chờ duyệt ("+DangCho+")",  data: c, color: "#00BCE1"},
  { label: "Không được duyệt ("+KhongDuyet+")",data: b , color: "#DEBB27"}
  ];

  var placeholder = $('#piechart-placeholder').css({'width':'70%' , 'min-height':'150px'});
  $.plot(placeholder, data, {
    series:{
      pie:{
          show: true,
          tilt:0.8,
          highlight: {
          opacity: 0.25
      },
      stroke: {
      color: '#fff',
      width: 2
      },
      startAngle: 2
      }
    },
    legend: {
      show: true,
      position: "ne", 
      labelBoxBorderColor: null,
      margin:[-40,30]
    },
    grid: {
      hoverable: true,
      clickable: true
    },
    tooltip: true, //activate tooltip
    tooltipOpts: {
      content: "%s : %y.1",
      shifts: {
        x: -30,
        y: -50
      }
    }
  });
	var $tooltip = $("<div class='tooltip top in' style='display:none;'><div class='tooltip-inner'></div></div>").appendTo('body');
  placeholder.data('tooltip', $tooltip);
  var previousPoint = null;
  placeholder.on('plothover', function (event, pos, item) {
    if(item) {
      if (previousPoint != item.seriesIndex) {
        previousPoint = item.seriesIndex;
        var tip = item.series['label'] +" : " + Math.round(item.series['percent']*100)/100+'%';
        $(this).data('tooltip').show().children(0).text(tip);
        // alert("quytutlu");
      }
      $(this).data('tooltip').css({top:pos.pageY + 10, left:pos.pageX + 10});
    }else {
      $(this).data('tooltip').hide();
      previousPoint = null;
    }
  });
  placeholder.bind('plotclick', function(event, pos, obj) {
    if (!obj) {
      return;
    }
    percent = parseFloat(obj.series.percent).toFixed(2);
    if(obj.series.label=="Được duyệt ("+DaDuyet+")"){
      LayDuyetYeuCau(3);
    }
    if(obj.series.label=="Không được duyệt ("+KhongDuyet+")"){
      LayDuyetYeuCau(0);
    }
    if(obj.series.label=="Đang chờ duyệt ("+DangCho+")"){
      LayDuyetYeuCau(-1);
    }
    //alert(""  + obj.series.label + ": " + percent + "%");
  });
  var d1 = [];
  for (var i = 0; i < Math.PI * 2; i += 0.5) {
    d1.push([i, Math.sin(i)]);
  }
  var d2 = [];
  for (var i = 0; i < Math.PI * 2; i += 0.5) {
    d2.push([i, Math.cos(i)]);
  }
  var d3 = [];
  for (var i = 0; i < Math.PI * 2; i += 0.2) {
    d3.push([i, Math.tan(i)]);
  }
})
function LayDuyetYeuCau(TrangThaiYeuCau){
  var table=document.getElementById("bangyeucau");
  if(TrangThaiYeuCau=="3"){
    document.getElementById("TB").innerHTML="Danh sách các yêu cầu đã được duyệt";
  }
  if(TrangThaiYeuCau=="0"){
    document.getElementById("TB").innerHTML="Danh sách các yêu cầu không được duyệt";
  }
  if(TrangThaiYeuCau=="-1"){
    document.getElementById("TB").innerHTML="Danh sách các yêu cầu đang chờ duyệt";
  }
  for(var i = 1; i < table.rows.length;){   
     table.deleteRow(i);
  }
  var temp="../ThuKy/API.php?cmd=LayThongTinHoiThao&MaStt="+TrangThaiYeuCau;
  $.ajax({type: 'GET',url: temp,
    success:function(data){
      PageLayoutYCBD(data);
    }
  });
}
function PageLayoutYCBD(data){
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