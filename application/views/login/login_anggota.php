<form id="formlogin">
	<div class="form-title text-center" style="margin-top: -20px !important;">
		<span class="form-subtitle" style="font-size: 22px;"><b>KSPPS Baytul Ikhtiar</b></span><br>
		<span class="form-title">LOGIN</span>
	</div>
	<div class="alert alert-danger display-hide">
		<button class="close" data-close="alert"></button>
		<span> Masukan No Anggota & Password </span>
	</div>
	<?php
	if ($this->session->flashdata('logout')) {
		echo '
		<div class="alert alert-success">
		<button class="close" data-close="alert"></button>
		<span> Logout Berhasil </span>
		</div>
		';
	}
	?>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9" for="cif_no">No Anggota</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Nomor Induk Anggota" id="cif_no" name="cif_no" autofocus />
	</div>
	<div class="form-group password_group" style="display:none;">
		<label class="control-label visible-ie8 visible-ie9" for="password">Password</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="current-password" placeholder="Password" id="password" name="password" />
	</div>
	<div class="alert alert-info text-center" role="alert" id="password_alert" style="display: none;">
		<strong>Ini Adalah Login Pertama Anda,</strong><br>Silahkan Buat Password Baru Anda.
	</div>
	<div class="form-group new_password_group" style="display:none;">
		<label class="control-label visible-ie8 visible-ie9" for="new_password1">New Password</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="current-password" placeholder="New Password" id="new_password1" name="new_password1" />
	</div>
	<div class="form-group new_password_group" style="display:none;">
		<label class="control-label visible-ie8 visible-ie9" for="new_password2">Re-type New Password</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="current-password" placeholder="Re-type New Password" id="new_password2" name="new_password2" />
	</div>
	<div class="form-actions">
		<button type="button" id="check" class="btn red btn-block uppercase">Next</button>
		<button type="button" id="login" class="btn red btn-block uppercase" style="display:none;">Login</button>
		<button type="button" id="regis" class="btn red btn-block uppercase" style="display:none;">Login</button>
		<a href="<?= site_url('/'); ?>" class="btn default btn-user btn-block" style="color: #000 !important;">
			<i class="fa fa-home"></i> Kembali Ke Beranda
		</a>
	</div>
</form>