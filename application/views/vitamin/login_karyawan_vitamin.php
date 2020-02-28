<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function(){
		$('#nik').inputmask("518.9999.9999");
		$('#check').on('click', function(){
			let nik = $('#nik').val();
			if(nik.length == 0){
				alert('NIK Tidak boleh kosong');
			}else if(nik.length < 13){
				alert('Format NIK salah, silahkan check kembali');
			}else if(nik.length == 13){
				checkNIKSirkah(nik);
			}else{
				alert('Nothing Happen');
			}
		});

		$('#nik').on('keypress', function(e){
			if(e.which == 13){
				let nik = $(this).val();
				if(nik.length == 0){
					alert('NIK Tidak boleh kosong');
				}else if(nik.length < 13 || nik.length > 13){
					alert('Format NIK salah, silahkan check kembali');
				}else if(nik.length == 13){
					checkNIKSirkah(nik);
				}else{
					alert('Nothing Happen');
				}
				e.preventDefault();
			}
		});
	});

	function checkNIKSirkah(nik)
	{
		$.ajax({
			url         : 'http://simpres.baytulikhtiar.com/api/nik',
			method      : 'GET',
			data        : { no_karyawan:nik },
			beforeSend  : function(){
				$('#nik').animate({ opacity: '0.9' }).attr('readonly', true);
				$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
			},
			statusCode  : {
				200: function(result) {

				},
				400: function() {
					$.unblockUI();
					alert('NIK Tidak ditemukan...');
					$('#nik').animate({ opacity: '1' }).attr('readonly', false).focus();
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
			let nik  = result.info.nik;
			let nama = result.info.nama;
			checknNIKDB(nik, nama);
		});
	}

	function checknNIKDB(nik, nama)
	{
		$.ajax({
			url         : '<?=site_url('login/karyawan/check');?>',
			method      : 'POST',
			dataType 		: 'JSON',
			data        : { nik:nik },
			beforeSend  : function(){
				$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
			},
			statusCode  : {
				200: function() {
					$.unblockUI();
				},
				400: function() {
					$.unblockUI();
					alert('NIK / Password salah...');
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
			console.log(result);
			$('#check').hide('slow');
			if(result.terdaftar == 'ya'){
				if(result.flag_aktif == 'aktif'){
					$('#login').show('slow').on('click', function(){
						authKaryawan(nik, nama);
					});

					$('.password_group').show('slow');
					$('#password').val('').attr('readonly', false).focus().on('keypress', function(e){
						if(e.which == 13){
							authKaryawan(nik, nama);
							e.preventDefault();
						}
					});
				}else{
					$('#login').show('hide').attr('disabled', true);
					alert('NIK tidak di izinkan melakukan login, dikarenakan Status NIK Tidak Aktif');
				}
			}else{
				$('#regis').show('slow').on('click', function(){
					authRegisterNewAdmin(nik, nama);
				});
				$('#password_alert').show('slow');
				$('.new_password_group').show('slow');
				$('#new_password1').val('').attr('readonly', false).focus();
				$('#new_password2').val('').attr('readonly', false);

				$('#new_password1').on('keypress', function(e){
					if(e.which == 13){
						$('#new_password2').focus();
						e.preventDefault();
					}
				});

				$('#new_password2').on('keypress', function(e){
					if(e.which == 13){
						authRegisterNewAdmin(nik, nama);
						e.preventDefault();
					}
				});
			}
		});

	}

	function authRegisterNewAdmin(nik, nama)
	{
		let new_password1 = $('#new_password1').val();
		let new_password2 = $('#new_password2').val();

		if(new_password1 != new_password2){
			sweet('warning', 'Warning', 'Password tidak sama', '#new_password1');
		}else{
			$.ajax({
				url         : '<?=site_url('login/karyawan/register');?>',
				method      : 'POST',
				data        : {
					nik: nik,
					nama: nama,
					new_password1: new_password1
				},
				dataType: 'JSON',
				beforeSend  : function(){
					$.blockUI({ message: '<i class="fa fa-spinner fa-spin"></i> Silahkan Tunggu...' });
				},
				statusCode  : {
					400: function() {
						$.unblockUI();
						alert('NIK / Password salah...');
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
				console.log(result);
				if(result.code == 200){
					alert('Register & Login Success');
					setTimeout(function(){
						window.location.replace('<?=site_url('karyawan/dashboard');?>');
						$.unblockUI();
					}, 2000);  
				}else{
					alert('Something Wrong while connect to Databases');
					$.unblockUI();
				}

			});
		}
	}

	function authKaryawan(nik, nama)
	{
		let password = $('#password').val();
		if(password.length == 0){
			alert('Password tidak boleh kosong');
		}else{
			$.ajax({
				url         : '<?=site_url('login/karyawan/auth');?>',
				method      : 'POST',
				data        : {
					nik: nik,
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
						alert('NIK / Password salah...');
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
					alert('Data Match Login Success');
					setTimeout(function(){
						window.location.replace('<?=site_url('karyawan/dashboard');?>');
						$.unblockUI();
					}, 2000);  
				}else{
					alert('Password Salah');
					$.unblockUI();
				}

			});
		}
	}
</script>