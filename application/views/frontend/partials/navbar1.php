<div class="navbar-fixed">
	<nav class="white">
		<div class="container-fluid">
			<div class="nav-wrapper">
				<a href="<?=site_url('/');?>" class="brand-logo mindeskmarleft-10">
					<img src="<?=base_url();?>assets/img/baik_logo2.png" width="55px" class="responsive-img" />
				</a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger">
					<i class="material-icons black-text">menu</i>
				</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="<?=site_url('/');?>" class="waves-effect waves-light green darken-3">Beranda</a></li>
					<li><a href="#beritabaik" class="waves-effect waves-light black-text">Berita BAIK</a></li>
					<li><a href="#kisahbaik" class="waves-effect waves-light black-text">Kisah BAIK</a></li>
					<li><a href="#kenalbaik" class="waves-effect waves-light black-text">Kenal BAIK</a></li>
					<li><a href="<?=base_url('bm');?>" target="_blank" class="waves-effect waves-light black-text">Baytul Maal BAIK</a></li>
					<li>
						<a class="dropdown-trigger waves-effect waves-light black-text" href="#!" data-target="dropdown_login">
							<!-- Login <i class="material-icons right">arrow_drop_down</i> -->
							Login <i class="fas fa-caret-down"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<!-- Dropdown -->
<ul id="dropdown_login" class="dropdown-content" style="min-width:150px !important;">
	<li><a href="<?=site_url('login/karyawan');?>" class="waves-effect waves-light green-text text-darken-4">Login Karyawan</a></li>
	<li><a href="<?=site_url('login/anggota');?>" class="waves-effect waves-light green-text text-darken-4">Login Anggota</a></li>
</ul>
<!-- Dropdown -->

<!-- Sidebar -->
<ul class="sidenav" id="mobile-demo">
	<li>
		<div class="user-view">
			<div class="background">
				<img src="<?=base_url();?>assets/img/5.jpg" class="responsive-img">
			</div>
			<a href="javascript:;"><img src="<?=base_url();?>assets/img/baik_logo2.png" width="55px" class="circle responsive-img" /></a>
		</div>
	</li>
	<li><a href="<?=site_url('/');?>">Beranda</a></li>
	<li><a href="<?=site_url('kenal');?>">Kenal BAIK</a></li>
	<li><a href="<?=site_url('berita');?>">Berita BAIK</a></li>
	<li><a href="<?=site_url('kisah');?>">Kisah BAIK</a></li>
	<li><a href="<?=base_url('bm');?>" target="_blank">Baytul Maal BAIK</a></li>
	<li><div class="divider"></div></li>
	<li><a class="subheader">Login</a></li>
	<li><a href="<?=site_url('login/karyawan');?>">Login Karyawan</a></li>
	<li><a href="<?=site_url('login/anggota');?>">Login Anggota</a></li>
</ul>
<!-- Sidebar -->

<!-- Floating -->
<a href="#" id="scroll" class="btn red waves-effect waves-light" style="display: none;"><span></span></a>
<!-- Floating -->