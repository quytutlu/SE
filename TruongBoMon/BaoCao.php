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
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="image/icon.png" sizes="196x196" />
	<script src="js/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="css/standard.css">
	<link rel="stylesheet" type="text/css" href="css/tipr.css">
	<script type="text/javascript" src="js/tipr.js"></script>
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
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
        		<li><a href="DuyetHoiThao.php">Duyệt hội thảo</a></li>
	            <li><a href="BaoCao.php">Báo cáo</a></li>
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
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-9" style="width:750px">
				<center style="margin-top:70px;">
					<p class="h1" id="TB">Danh sách các yêu cầu đã đề xuất</p>
				</center>
			   	<div style="overflow: auto;height: 450px;">
					<table class="table table-striped table-bordered table-hover" id="bangyeucau" cellpadding="0" cellspacing="0">
						<tr>
							<th class="bg-info" style="text-align: center">STT</th>
							<th class="bg-info" style="text-align: center">Tên hội thảo</th>
							<th class="bg-info" style="text-align: center">Ngày tổ chức</th>
							<th class="bg-info" style="text-align: center">Số người tham gia</th>
							<th class="bg-info" style="text-align: center">Trạng thái</th>
						</tr>
					</table>
				</div>
			</div><!--/.col-xs-12.col-sm-9-->
			<!-- bieu do -->
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" style="margin-top:100px;" id="sidebar">
				<div class="box-wrap" style="width:400px;margin-top:50px">
				    <div class="box-inner">
				      	<div class="row-fluid">
					        <div class="widget-main">
					          	<div id="piechart-placeholder" style="width: 80%; min-height: 150px; padding: 0px; position: relative;">
					          		<canvas class="flot-base" width="956" height="150" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 956px; height: 150px;">
					          		</canvas>
					          		<canvas class="flot-overlay" width="956" height="150" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 956px; height: 150px;">
					          		</canvas>
					          		<div class="legend">
					          			<div style="position: absolute; width: 60px; height: 75px; top: 15px; right: -30px; opacity: 0.85; background-color: rgb(255, 255, 255);">
					          			</div>
					          		</div>
					          	</div>
					        </div>
				      	</div>
				    </div>
			  	</div>
			  	<div class="tooltip top in" style="top: 120px; left: 401px; display: none;">
			  		<div class="tooltip-inner">Blue : 24.5%</div>
			  	</div>
			</div><!--/.sidebar-offcanvas-->
		</div><!--/row-->
	</div>
	
	
	<script type="text/javascript" src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/BaoCao.js"></script>
  	<script src="js/jquery.flot.min.js"></script>
  	<script src="js/jquery.flot.pie.min.js"></script>
  	<script src="js/BieuDo.js"></script>
</body>
</html>