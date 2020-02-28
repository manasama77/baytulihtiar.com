<form id="formlogin">
	<div class="form-title">
		<span class="form-title">Login Admin</span>
		<span class="form-subtitle">KSPPS Baytul Ikhtiar</span>
	</div>
	<div class="alert alert-danger display-hide">
		<button class="close" data-close="alert"></button>
		<span> Masukan Username & Password </span>
	</div>
	<?php
	if ($this->session->flashdata('logout')){
		echo '
		<div class="alert alert-success">
		<button class="close" data-close="alert"></button>
		<span> Logout Berhasil </span>
		</div>
		';
	}
	?>
	<div class="form-group">
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<label class="control-label visible-ie8 visible-ie9" for="username">Username</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" id="username" name="username" />
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9" for="password">Password</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" id="password" name="password" />
	</div>
	<div class="form-actions">
		<button type="submit" class="btn red btn-block uppercase">Login</button>
		<a href="<?=site_url('/');?>" class="btn btn-secondary btn-user btn-block">
			<i class="fa fa-home"></i> Kembali Ke Beranda
		</a>
	</div>
</form>