<!-- DEBUG PURPOSE ONLY -->
<!-- <link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->

<form method="post" action="<?=base_url();?>backend/admin/update">
	<div class="form-group">
		<label for="">Username</label>
		<input type="text" class="form-control" id="username_edit" name="username_edit" readonly="true" value="<?=$arrs->row()->username;?>" required>
	</div>
	<div class="form-group">
		<label for="">Nama</label>
		<input type="text" class="form-control" id="nama_edit" name="nama_edit" value="<?=$arrs->row()->nama;?>" required>
	</div>
	<div class="form-group">
		<input type="hidden" id="id_edit" name="id_edit" value="<?=$arrs->row()->id;?>">
		<button type="submit" id="submit_edit" class="btn btn-primary btn-block">Submit</button>
	</div>
</form>

<!-- DEBUG PURPOSE ONLY -->
<!-- <script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->