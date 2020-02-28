<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$('#submit').attr('disabled', true);
		$('#cif_no').on('change', function(){
			$.blockUI();
			$.get('<?=base_url();?>backend/anggota/check/'+$(this).val(), null , 
				function(data, textStatus, jqXHR){
					$.unblockUI();
					console.log(textStatus)
					console.log(data)
					if(textStatus == "success"){
						data = $.parseJSON(data);
						if(data.code == 400){
							alert('no anggota telah digunakan');
							$('#submit').attr('disabled', true);
							$('#cif_no').focus();
						}else{
							$('#cif_no').attr('readonly', true);
							$('#submit').attr('disabled', false);
						}
					}
				});
		});

		$('#form').validate({
			debug: true,
			errorClass: 'help-inline text-danger',
			rules:{
				cif_no:{ required:true },
				nama:{ required:true },
				password:{ required:true }
			},
			submitHandler: function( form ) {
				console.log(form);
				$.ajax({
					url         : '<?=site_url('backend/anggota/store');?>',
					method      : 'POST',
					data        : new FormData(form),
					dataType    : 'JSON',
					processData : false,
					contentType : false,
					cache       : false,
					async       : false,
					beforeSend  : function(){
						$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
					},
					statusCode  : {
						200: function() {
						},
						400: function() {
							$.unblockUI();
							alert('Error 400');
						},
						404: function() {
							$.unblockUI();
							alert('Error 404 - Halaman Tidak Ditemukan');
						},
						500: function() {
							$.unblockUI();
							alert('Error 500 - Gagal Terhubung Dengan Database');
						},
						503: function() {
							$.unblockUI();
							alert('Error 503 - Terputus Dengan Database');
						}
					}
				})
				.done(function(result){
					console.log(result);

					if(result.code == '200')
					{
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Tambah Anggota Berhasil',
							showConfirmButton: false,
							timer: 1500
						}).then(function(){
							window.location.reload();
						});
					}else{
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Gagal Terhubung Dengan Database',
							showConfirmButton: false,
							timer: 1500
						}).then(function(){
							$.unblockUI();
						});
					}
				});
			}
		});
	});
</script>

<script>
	function showModal(id)
	{
		$.ajax({
			url         : `<?=site_url();?>backend/anggota/edit/${id}`,
			method      : 'GET',
			dataType    : 'json',
			beforeSend  : function(){
				$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Please Wait...' });
			},
			statusCode  : {
				404: function() {
					alert('Error 404 Page Not Found');
					$.unblockUI();
				},
				405: function() {
					alert('Error 405 Method not Allowed');
					$.unblockUI();
				},
				500: function() {
					alert('Error 500 Not connect with database');
					$.unblockUI();
				}
			}
		})
		.done(function(res){
			console.log(res);
			$('#title_detail_modal').text(res.judul);
			$('#content_detail_modal').html(res.data);
			$('#modal-detail').modal('show');
			$.unblockUI();
		});

	}

	function showModalReset(id)
	{
		$('#modalReset').modal('show');
		setTimeout(function(){
			$('#id_reset').val(id);
			$('#new_password').focus();
		}, 500);

		$('#form-reset').validate({
			debug: true,
			errorClass: 'help-inline text-danger',
			rules:{
				new_password:{ required:true, minlength: 4 }
			},
			submitHandler: function( form ) {
				console.log(form);
				$.ajax({
					url         : '<?=site_url('backend/anggota/reset');?>',
					method      : 'POST',
					data        : new FormData(form),
					dataType    : 'JSON',
					processData : false,
					contentType : false,
					cache       : false,
					async       : false,
					beforeSend  : function(){
						$('#form-reset').block({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
					},
					statusCode  : {
						200: function() {
						},
						400: function() {
							$('#form-reset').unblock();
							alert('Error 400');
						},
						404: function() {
							$('#form-reset').unblock();
							alert('Error 404 - Halaman Tidak Ditemukan');
						},
						500: function() {
							$('#form-reset').unblock();
							alert('Error 500 - Gagal Terhubung Dengan Database');
						},
						503: function() {
							$('#form-reset').unblock();
							alert('Error 503 - Terputus Dengan Database');
						}
					}
				})
				.done(function(result){
					console.log(result);

					if(result.code == '200')
					{
						$('#modalReset').modal('hide');
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Reset Password Berhasil',
							showConfirmButton: false,
							timer: 1500
						}).then(function(){
							window.location.reload();
						});
					}else{
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Gagal Terhubung Dengan Database',
							showConfirmButton: false,
							timer: 1500
						}).then(function(){
							$.unblockUI();
						});
					}
				});
			}
		});
	}

	function confirmDestroy(id)
	{

		let beneran = confirm("Delete Anggota ?");
		let href = `<?=site_url();?>backend/anggota/destroy/${id}`;

		if(beneran === true){
			window.location.href = href;
		}else{
			alert("proses di batalkan");
		}
	}

	function confirmAktivasi(id, flag)
	{
		let beneran;

		if(flag == '1'){
			beneran = confirm("Aktifkan Anggota ?");
		}else{
			beneran = confirm("Non Aktifkan Anggota ?");
		}

		let href = `<?=site_url();?>backend/anggota/flag/${flag}/${id}`;

		if(beneran === true){
			window.location.href = href;
		}else{
			alert("proses di batalkan");
		}
	}
</script>