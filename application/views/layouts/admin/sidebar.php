<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- BEGIN SIDEBAR -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler">
					<span></span>
				</div>
			</li>
			<!-- END SIDEBAR TOGGLER BUTTON -->
			<li class="nav-item start <?= ($uri2 == 'dashboard') ? 'active' : ''; ?>">
				<a href="<?= base_url('backend/dashboard'); ?>" class="nav-link nav-toggle">
					<i class="icon-home"></i>
					<span class="title">Dashboard </span>
				</a>
			</li>
			<li class="heading">
				<h3 class="uppercase">Berita</h3>
			</li>
			<li class="nav-item <?= ($uri2 == 'berita') ? 'active' : ''; ?>">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="fa fa-fw fa-newspaper-o"></i>
					<span class="title">Manage Berita</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item <?= ($uri2 == 'berita' && $uri3 == 'create') ? 'active' : ''; ?>">
						<a href="<?= site_url(); ?>backend/berita/create" class="nav-link ">
							<span class="title">Tambah Berita</span>
						</a>
					</li>
					<li class="nav-item <?= ($uri2 == 'berita' && $uri3 == 'index') ? 'active' : ''; ?>">
						<a href="<?= site_url(); ?>backend/berita/index?status_filter=semua&admin_karyawan_filter=semua&tipe_filter=judul&kata_filter=&filter=" class="nav-link ">
							<span class="title">List Berita</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="divider"></li>
			<li class="heading">
				<h3 class="uppercase">Kisah</h3>
			</li>
			<li class="nav-item">
				<a href="javascript:;" class="nav-link nav-toggle">
					<i class="fa fa-fw fa-youtube-play"></i>
					<span class="title">Manage Kisah</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li class="nav-item  ">
						<a href="<?= site_url(); ?>backend/kisah/create" class="nav-link ">
							<span class="title">Tambah Kisah</span>
						</a>
					</li>
					<li class="nav-item  ">
						<a href="<?= site_url(); ?>backend/kisah/index" class="nav-link ">
							<span class="title">List Kisah</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="heading">
				<h3 class="uppercase">Profile</h3>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('backend/profile/index'); ?>" class="nav-link">
					<i class="fa fa-fw fa-table"></i>
					<span class="title">Manage Profile</span>
				</a>
			</li>
			<li class="heading">
				<h3 class="uppercase">Buku Tamu</h3>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('backend/bukutamu/index'); ?>" class="nav-link">
					<i class="fa fa-fw fa-table"></i>
					<span class="title">List Buku Tamu</span>
				</a>
			</li>
			<li class="heading">
				<h3 class="uppercase">Manage Slide Show</h3>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('backend/slide/index'); ?>" class="nav-link">
					<i class="fa fa-fw fa-users"></i>
					<span class="title">Banner</span>
				</a>
			</li>
			<li class="heading">
				<h3 class="uppercase">Manage Account</h3>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('backend/admin/index'); ?>" class="nav-link">
					<i class="fa fa-fw fa-users"></i>
					<span class="title">Admin</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('backend/karyawan/index'); ?>" class="nav-link">
					<i class="fa fa-fw fa-users"></i>
					<span class="title">Karyawan</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= site_url('backend/anggota/index'); ?>" class="nav-link">
					<i class="fa fa-fw fa-users"></i>
					<span class="title">Anggota</span>
				</a>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
	<!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->