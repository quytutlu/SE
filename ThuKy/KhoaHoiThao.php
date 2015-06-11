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
		            <li><a href="KhoaHoiThao.php" >Khóa hội thảo</a></li>
		            <li><a href="ChoGioGiangVien.php" >Nhập giờ giảng viên</a></li>
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

	<div class="container">
		<center style="margin-top:100px;">
			<p class="h1">Các hội thảo đã mở đăng ký</p>
		</center>	
		<div style="width:700px; height:350px; margin: 0 auto; font-size:30px; overflow-y: auto;">
			<center>
				<table class="table table-striped table-bordered table-hover" id="listHoiThao">
					<tr>
						<th class="bg-info" style="text-align: center">STT</th>
						<th class="bg-info" style="text-align: center">Tên hội thảo</th>
						<th class="bg-info" style="text-align: center">Ngày tổ chức</th>
						<th class="bg-info" style="text-align: center">Khóa</th>
					</tr>
				</table>
			</center>
		</div>
	</div>
	<div style="width:900px; height:100px; margin:auto;font-family:Time New Roman;">
		<div style="width:500px;float:left">
		<address>
		  	<h3><strong>Nhóm tác giả</strong><br></h3>
		  	<h4>Trần Văn Cường - A20375<br>
		  	Đoàn Thuý Mai - A20390<br>
		  	Phạm Minh Tú - A20422<br>
		  	Nguyễn Quý Tú - A20547</h4>
		</address>
		</div>
	</div>
	<script type="text/javascript" src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/KhoaHoiThao.js"></script>
</body>
</html>