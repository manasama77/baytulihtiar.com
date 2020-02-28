<div class="page-content">
	<!-- BEGIN PAGE HEADER-->
	<!-- BEGIN PAGE BAR -->
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="javascript:;">Dashboard</a>
				<!-- <i class="fa fa-circle"></i> -->
			</li>
		</ul>
		<!-- <div class="page-toolbar">
			<div class="btn-group pull-right">
				<button type="button" class="btn green btn-sm btn-outline" data-toggle="dropdown"><i class="fa fa-plus fa-fw"></i> Add </button>
			</div>
		</div> -->
	</div>
	<!-- END PAGE BAR -->
	<!-- BEGIN PAGE TITLE-->
	<h1 class="page-title"> Dashboard
		<!-- <small>blank page layout</small> -->
	</h1>
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->
	
	<div class="row">

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
				<div class="visual">
					<i class="fa fa-newspaper-o"></i>
				</div>
				<div class="details">
					<div class="number">
						<span><?=$count_berita;?></span>
					</div>
					<div class="desc sbold"> Berita <small>(aktif)</small> </div>
				</div>
			</a>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<a class="dashboard-stat dashboard-stat-v2 red" href="#">
				<div class="visual">
					<i class="fa fa-youtube-play"></i>
				</div>
				<div class="details">
					<div class="number">
						<span><?=$count_kisah;?></span>
					</div>
					<div class="desc sbold"> Kisah <small>(aktif)</small> </div>
				</div>
			</a>
		</div>

	</div>
	<div class="row">

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<a class="dashboard-stat dashboard-stat-v2 green" href="#">
				<div class="visual">
					<i class="fa fa-users"></i>
				</div>
				<div class="details">
					<div class="number">
						<span><?=$count_admin;?></span>
					</div>
					<div class="desc sbold"> Admin </div>
				</div>
			</a>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<a class="dashboard-stat dashboard-stat-v2 green" href="#">
				<div class="visual">
					<i class="fa fa-users"></i>
				</div>
				<div class="details">
					<div class="number">
						<span><?=$count_karyawan;?></span>
					</div>
					<div class="desc sbold"> Karyawan </div>
				</div>
			</a>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<a class="dashboard-stat dashboard-stat-v2 green" href="#">
				<div class="visual">
					<i class="fa fa-users"></i>
				</div>
				<div class="details">
					<div class="number">
						<span><?=$count_anggota;?></span>
					</div>
					<div class="desc sbold"> Anggota </div>
				</div>
			</a>
		</div>

	</div>

</div>