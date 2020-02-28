<script>
	$(document).ready(function(){
		$('#formlogin').validate({
			debug: true,
			errorClass: 'help-inline text-danger',
			rules:{
				username:{
					required:true,
					minlength: 3,
					maxlength: 20
				},
				password:{
					required:true,
					minlength: 3,
					maxlength: 20
				}
			},
			submitHandler: function( form ) {
				let username = $('#username');
				let password = $('#password');
				$.ajax({
					url         : `<?=site_url();?>login/admin/auth`,
					method      : 'POST',
					data        : { username : username.val(), password : password.val() },
					dataType    : 'json',
					beforeSend  : function(){
						$('#formlogin').block({ message: '<i class="fa fa-spinner fa-spin"></i> Please Wait...' });
						username.attr('readonly', true);
						password.attr('readonly', true);
					},
					statusCode  : {
						200: function() {
							//
						},
						404: function() {
							$('#formlogin').unblock();
							alert('Error 404 Page Not Found');
						},
						405: function() {
							$('#formlogin').unblock();
							alert('Error 405 Method not Allowed');
							toastr.error('Method not Allowed.', 'Error 405');
						},
						500: function() {
							$('#formlogin').unblock();
							alert('Error 500 Not connect with database');
						}
					}
				})
				.done(function(res){
					if(res.hasil == 'tidak ada'){
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Username / Password Salah',
							showConfirmButton: false,
							timer: 1500
						}).then(function(){
							$('#formlogin').unblock();
							username.attr('readonly', false);
							password.attr('readonly', false);
							$('#username').focus();
						});
					}else if(res.hasil == 'tidak aktif'){
						Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'Username Tidak Diizinkan Login Dikarenakan Status Tidak Aktif',
							showConfirmButton: false,
							timer: 2500
						}).then(function(){
							$('#formlogin').unblock();
							username.attr('readonly', false);
							password.attr('readonly', false);
							$('#username').focus();
						});
					}else if(res.hasil == 'ada'){
						Swal.fire({
							position: 'center',
							icon: 'success',
							title: 'Login Berhasil',
							showConfirmButton: false,
							timer: 1500
						}).then(function(){
							window.location.replace(`<?=site_url();?>backend/dashboard`);
						});
					}
				});
			}
		});
	});
</script>