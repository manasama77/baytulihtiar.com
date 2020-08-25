<script src="https://cdn.tiny.cloud/1/y1lbyegpvnufywjd7k7c8p0drp9rfup9gymycg4n6evr6nfs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
	$(document).ready(function() {
		// FORM VALIDATE
		// $('#form').validate({
		// 	debug: true,
		// 	errorClass: 'help-inline text-danger',
		// 	rules: {
		// 		judul: {
		// 			required: true
		// 		}
		// 	},
		// 	submitHandler: function(form) {
		// 		console.log(form);
		// 		$.ajax({
		// 				url: '<?= site_url('karyawan/berita/store'); ?>',
		// 				method: 'POST',
		// 				data: new FormData(form),
		// 				dataType: 'JSON',
		// 				processData: false,
		// 				contentType: false,
		// 				cache: false,
		// 				async: false,
		// 				beforeSend: function() {
		// 					$.blockUI({
		// 						message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...'
		// 					});
		// 				},
		// 				statusCode: {
		// 					200: function() {},
		// 					400: function() {
		// 						$.unblockUI();
		// 						alert('Error 400');
		// 					},
		// 					404: function() {
		// 						$.unblockUI();
		// 						alert('Error 404 - Halaman Tidak Ditemukan');
		// 					},
		// 					500: function() {
		// 						$.unblockUI();
		// 						alert('Error 500 - Gagal Terhubung Dengan Database');
		// 					},
		// 					503: function() {
		// 						$.unblockUI();
		// 						alert('Error 503 - Terputus Dengan Database');
		// 					}
		// 				}
		// 			})
		// 			.done(function(result) {
		// 				console.log(result);

		// 				if (result.code == '200') {
		// 					Swal.fire({
		// 						position: 'center',
		// 						icon: 'success',
		// 						title: 'Tambah Berita Berhasil',
		// 						showConfirmButton: false,
		// 						timer: 1500
		// 					}).then(function() {
		// 						window.location.replace('<?= site_url('karyawan/berita/index'); ?>');
		// 					});
		// 				} else {
		// 					Swal.fire({
		// 						position: 'center',
		// 						icon: 'error',
		// 						title: 'Gagal Terhubung Dengan Database',
		// 						showConfirmButton: false,
		// 						timer: 1500
		// 					}).then(function() {
		// 						$.unblockUI();
		// 					});
		// 				}
		// 			});
		// 	}
		// });
	});
</script>

<script>
	tinymce.init({
		selector: 'textarea',
		plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		toolbar_mode: 'floating',
	});
</script>