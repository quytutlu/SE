<html>
<head>
	<title>Software Engineering</title>
	<style type="text/css">
	.table input {
		width: 100px;
	}
	.table {
		text-align: center;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.4-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
	<link rel="icon" type="image/png" href="../image/icon.png" sizes="196x196" />
	<script src="../javaScript/jquery-2.1.3.min.js"></script>
	<meta charset="utf-8"/>
</head>
<body style="font-family:Arial;">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">Software Engineering</a>
				<ul class="nav navbar-nav">
		            <li><a href="TaoHoiThao.php" >Tạo hội thảo</a></li>
          		</ul>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
				</ul>
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<div class="tip" id="tooltip" data-tip="Lorem ipsum">
							<a style="color:#FFFFFF; text-decoration:none;" href="#" id="ThongBao">Xin chào</a>
						</div>
					</div>
					<button type="button" class="btn btn-success" onclick="DangXuat();">Đăng Xuất</button>
				</form>
			</div><!--/.navbar-collapse -->
		</div>
	</nav>

	<div class="container" style="margin-top:70px">
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Tên hội thảo</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" style="width:300px" id="TenHoiThao" placeholder="Tên hội thảo">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Ngày tổ chức</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" style="width:300px" id="NgayToChuc" placeholder="Ngày tổ chức">
		    </div>
		  </div>
		</form>
		<form class="form-horizontal">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-2 control-label">Số giờ</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" style="width:300px" id="SoGio" placeholder="Số giờ">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-2 control-label">Số người tham gia</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" style="width:300px" id="SoNguoiThamGia" placeholder="Số người tham gia">
		    </div>
		  </div>
		</form>
		<button type="button" class="btn btn-default" style="margin-left:200px" onclick="TaoHoiThao();">Tạo hội thảo</button>
	</div>
	<div style="width:900px; height:100px; margin:auto;font-family:Time New Roman;">
		<div style="width:500px;float:left">
		<address>
		  	<h3><strong>Thông tin tác giả</strong><br></h3>
		  	<h4>Nguyễn Quý Tú<br>
		  	Địa chỉ: Ba Vì - Hà Nội<br>
		  	Email: quytutlu@gmail.com<br>
		  	<abbr title="Phone">Phone:</abbr> 01688 55 88 10
		  	</h4>
		</address>
		</div>
	</div>
	<script type="text/javascript" src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/TaoHoiThao.js"></script> 
	<script type="text/javascript">
		function DangXuat(){
			window.location.href="..";
		}
	</script>
</body>
</html>