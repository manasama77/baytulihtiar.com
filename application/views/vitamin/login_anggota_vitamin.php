<script>
	$(document).ready(function(){
		$('#check').on('click', function(){
			checkNIA();
		});

		$('#cif_no').on('keypress', function(e){
			if(e.which == 13){
				checkNIA();
				e.preventDefault();
			}
		});
	});

	function checkNIA(){
		let cif_no = $('#cif_no').val();
		if(cif_no.length == 0){
			alert('Nomor Induk Anggota Tidak boleh kosong');
		}else if(cif_no.length < 15 || cif_no.length > 15){
			alert('Format Nomor Induk Anggota salah, silahkan check kembali');
		}else if(cif_no.length == 15){
			checkNIASirkah(cif_no);
		}else{
			alert('Nothing Happen');
		}
	}

	function checkNIASirkah(cif_no)
	{
		$.ajax({
			url         : '<?=site_url();?>login/anggota/check_sirkah',
			method       : 'get',
			data        : { cif_no:cif_no },
			dataType		: 'JSON',
			crossDomain	: true,
			beforeSend  : function(){
				$('#cif_no').animate({ opacity: '0.9' }).attr('readonly', true);
				$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
			},
			statusCode  : {
				200: function(result) {
					console.log('200');
				},
				400: function() {
					$.unblockUI();
					alert('No Induk Anggota Tidak ditemukan...');
					$('#cif_no').animate({ opacity: '1' }).attr('readonly', false).focus();
				},
				404: function() {
					$.unblockUI();
					alert('Page Not Found');
				},
				500: function() {
					$.unblockUI();
					alert('Not connect with Database');
				}
			}
		})
		.done(function(result){
			console.log(result);
			let nama = result.nama;
			let majlis = result.majlis;
			checknNIADB(cif_no, nama, majlis);
		});
	}

	function checknNIADB(cif_no, nama, majlis)
	{
		$.ajax({
			url         : '<?=site_url('login/anggota/check');?>',
			method      : 'POST',
			dataType 		: 'JSON',
			data        : { cif_no:cif_no },
			beforeSend  : function(){
				$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
			},
			statusCode  : {
				200: function() {
					$.unblockUI();
				},
				400: function() {
					$.unblockUI();
					alert('No Induk Anggota / Password salah...');
					$('#cif_no').focus();
				},
				404: function() {
					$.unblockUI();
					alert('Page Not Found');
				},
				500: function() {
					$.unblockUI();
					alert('Not connect with Database');
				}
			}
		})
		.done(function(result){
			console.log(result);
			$('#check').hide('slow');
			if(result.terdaftar == 'ya'){

				if(result.flag_aktif == 'aktif'){
					$('.password_group').show('slow');
					$('#login').show('slow').on('click', function(){
						authAnggota(cif_no, nama);
					});

					$('#password').show('slow').val('').attr('readonly', false).focus().on('keypress', function(e){
						if(e.which == 13){
							authAnggota(cif_no, nama);
							e.preventDefault();
						}
					});
				}else{
					$('#login').show('hide').attr('disabled', true);
					alert('No Anggota tidak di izinkan melakukan login, dikarenakan Status No Anggota Tidak Aktif');
				}
			}else{
				$('#password_alert').show('slow');
				$('.new_password_group').show('slow');
				$('#new_password1').val('').attr('readonly', false).focus();
				$('#new_password2').val('').attr('readonly', false);

				$('#regis').show('slow').on('click', function(){
					let new_password1 = $('#new_password1').val();
					let new_password2 = $('#new_password2').val();
					if(new_password1.length == 0){
						alert('Password Baru Wajib diisi');
					}else if(new_password1.length < 4){
						alert('Password Baru Minimal 4 Karakter');
					}else if(new_password2.length == 0){
						alert('Konfirmasi Password Baru Wajib diisi');
					}else if(new_password1 != new_password2){
						alert('Password Baru & Konfirmasi Password tidak sama, silahkan cek kembali');
					}else{
						authRegisterNewUser(cif_no, nama, majlis);
					}
				});

				$('#new_password1').on('keypress', function(e){
					if(e.which == 13){
						let new_password1 = $(this).val();
						if(new_password1.length == 0){
							alert('Password Baru Wajib diisi');
						}else if(new_password1.length < 4){
							alert('Password Baru Minimal 4 Karakter');
						}else{
							$('#new_password2').focus();
						}
						e.preventDefault();
					}
				});

				$('#new_password2').on('keypress', function(e){
					if(e.which == 13){
						let new_password1 = $('#new_password1').val();
						let new_password2 = $(this).val();
						if(new_password2.length == 0){
							alert('Konfirmasi Password Baru Wajib diisi');
						}else if(new_password1 != new_password2){
							alert('Password Baru & Konfirmasi Password tidak sama, silahkan cek kembali');
						}else{
							authRegisterNewUser(cif_no, nama, majlis);
						}
						e.preventDefault();
					}
				});
			}
		});

	}

	function authRegisterNewUser(cif_no, nama, majlis)
	{
		let new_password1 = $('#new_password1').val();

		$.ajax({
			url         : '<?=site_url('login/anggota/register');?>',
			method      : 'POST',
			data        : {
				cif_no: cif_no,
				nama: nama,
				majlis: majlis,
				new_password1: new_password1
			},
			dataType: 'JSON',
			beforeSend  : function(){
				$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
			},
			statusCode  : {
				400: function() {
					$.unblockUI();
					alert('No Induk Anggota / Password salah...');
					$('#cif_no').focus();
				},
				404: function() {
					$.unblockUI();
					alert('Page Not Found');
				},
				500: function() {
					$.unblockUI();
					alert('Not connect with Database');
				}
			}
		})
		.done(function(result){
			console.log(result);
			if(result.code == 200){
				alert('Login Sukses');
				setTimeout(function(){
					window.location.replace('<?=site_url('anggota/dashboard');?>');
					$.unblockUI();
				}, 2000);  
			}else{
				alert('Gagal terkoneksi dengan database, silahkan coba kembali');
				$.unblockUI();
			}

		});
	}

	function authAnggota(cif_no, nama)
	{
		let password = $('#password').val();
		if(password.length == 0){
			alert('Password tidak boleh kosong');
		}else{
			$.ajax({
				url         : '<?=site_url('login/anggota/auth');?>',
				method      : 'POST',
				data        : {
					cif_no: cif_no,
					nama: nama,
					password: password
				},
				dataType: 'JSON',
				beforeSend  : function(){
					$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
				},
				statusCode  : {
					400: function() {
						$.unblockUI();
						alert('No Anggota / Password salah...');
						$('#nik').focus();
					},
					404: function() {
						$.unblockUI();
						alert('Page Not Found');
					},
					500: function() {
						$.unblockUI();
						alert('Not connect with Database');
					}
				}
			})
			.done(function(result){
				if(result.code == 200){
					if(result.hasil == 'tidak aktif'){
						alert('No Anggota tidak di izinkan melakukan login, dikarenakan Status No Anggota Tidak Aktif');
					}else{
						alert('Data Match Login Success');
						setTimeout(function(){
							window.location.replace('<?=site_url('anggota/dashboard');?>');
							$.unblockUI();
						}, 2000);  
					}
				}else{
					alert('Password Salah');
					$.unblockUI();
				}

			});
		}
	}
</script>