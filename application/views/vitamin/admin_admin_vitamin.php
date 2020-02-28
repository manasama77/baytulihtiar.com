<script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$('#submit').attr('disabled', true);
		$('#username').on('change', function(){
			$.blockUI();
			$.get('<?=base_url();?>backend/admin/check/'+$(this).val(), null , 
				function(data, textStatus, jqXHR){
					$.unblockUI();
					console.log(textStatus)
					console.log(data)
					if(textStatus == "success"){
						data = $.parseJSON(data);
						if(data.code == 400){
							alert('username telah digunakan');
							$('#submit').attr('disabled', true);
							$('#username').focus();
						}else{
							$('#username').attr('readonly', true);
							$('#submit').attr('disabled', false);
						}
					}
				});
		});

		$('#form').validate({
			debug: true,
			errorClass: 'help-inline text-danger',
			rules:{
				username:{ required:true },
				nama:{ required:true },
				password:{ required:true }
			},
			submitHandler: function( form ) {
				console.log(form);
				$.ajax({
					url         : '<?=site_url('backend/admin/store');?>',
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
							title: 'Tambah Admin Berhasil',
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
			url         : `<?=site_url();?>backend/admin/edit/${id}`,
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
				new_password:{ required:true }
			},
			submitHandler: function( form ) {
				console.log(form);
				$.ajax({
					url         : '<?=site_url('backend/admin/reset');?>',
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

		let beneran = confirm("Delete Admin ?");
		let href = `<?=site_url();?>backend/admin/destroy/${id}`;

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
			beneran = confirm("Aktifkan Admin ?");
		}else{
			beneran = confirm("Non Aktifkan Admin ?");
		}

		let href = `<?=site_url();?>backend/admin/flag/${flag}/${id}`;

		if(beneran === true){
			window.location.href = href;
		}else{
			alert("proses di batalkan");
		}
	}
</script>