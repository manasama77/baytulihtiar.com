<script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
		$('#form').validate({
			debug: true,
			errorClass: 'help-inline text-danger',
			rules: {
				banner_path: 'required',
			},
			submitHandler: function(form) {
				$.ajax({
					url: `<?= site_url('backend/slide/store'); ?>`,
					method: 'POST',
					data: new FormData(form),
					processData: false,
					contentType: false,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						$.blockUI({
							message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...'
						});
					},
					statusCode: {
						200: function() {},
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
				}).done(function(result) {
					console.log(result);

					if (result.code == '200') {
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Tambah Banner Berhasil',
							showConfirmButton: false,
							timer: 1500
						}).then(function() {
							window.location.reload();
						});
					} else {
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Gagal Terhubung Dengan Database',
							showConfirmButton: false,
							timer: 1500
						}).then(function() {
							$.unblockUI();
						});
					}
				});
			}
		});
	});
</script>

<script>
	function showModal(id) {
		$.ajax({
			url: `<?= site_url(); ?>backend/slide/edit/${id}`,
			method: 'GET',
			dataType: 'json',
			beforeSend: function() {
				$.blockUI({
					message: '<i class="fa fa-spinner fa-spin"></i> Please Wait...'
				});
			},
			statusCode: {
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
		}).done(function(res) {
			console.log(res);
			$('#title_detail_modal').text(res.judul);
			$('#content_detail_modal').html(res.data);
			$('#modal-detail').modal('show');
			$.unblockUI();
		});

	}

	function confirmDestroy(id) {

		let beneran = confirm("Delete Banner ?");
		let href = `<?= site_url(); ?>backend/slide/destroy/${id}`;

		if (beneran === true) {
			window.location.href = href;
		}
	}
</script>