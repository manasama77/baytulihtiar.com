<!-- BEGIN HEADER -->
<header class="page-header">
	<nav class="navbar mega-menu" role="navigation">
		<div class="container-fluid">
			<div class="clearfix navbar-fixed-top">
				<!-- Brand and toggle get grouped for better mobile display -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="toggle-icon">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</span>
				</button>
				<!-- End Toggle Button -->
				<!-- BEGIN LOGO -->
				<a id="index" class="page-logo" href="javascript:;">
					<img src="<?=base_url();?>assets/img/baik_logo3.png" alt="Logo">
				</a>
				<!-- END LOGO -->
				<!-- BEGIN TOPBAR ACTIONS -->
				<div class="topbar-actions">
					<!-- BEGIN USER PROFILE -->
					<div class="btn-group-img btn-group">
						<button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span><?=$this->session->userdata('nama');?></span>
							<img src="<?=base_url();?>assets/img/avatars/avatar_default.png" alt="">
						</button>
						<ul class="dropdown-menu-v2" role="menu">
							<li>
								<a href="<?=base_url();?>logout/anggota">
									<i class="icon-key"></i> Log Out
								</a>
							</li>
						</ul>
					</div>
					<!-- END USER PROFILE -->
				</div>
				<!-- END TOPBAR ACTIONS -->
			</div>
			<!-- BEGIN HEADER MENU -->
			<div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown dropdown-fw dropdown-fw-disabled  active open selected">
						<a href="javascript:;" class="text-uppercase">
							<i class="icon-home"></i> Beranda
						</a>
					</li>
				</ul>
			</div>
			<!-- END HEADER MENU -->
		</div>
		<!--/container-->
	</nav>
</header>
<!-- END HEADER -->