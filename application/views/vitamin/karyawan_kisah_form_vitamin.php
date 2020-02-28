<script>
	$(document).ready(function(){    
    // FORM VALIDATE
    $('#form').validate({
    	debug: true,
    	errorClass: 'help-inline text-danger',
    	rules:{
    		judul:{ required:true },
    		video:{ required:true },
    	},
    	submitHandler: function( form ) {
    		console.log(form);
    		$.ajax({
    			url         : '<?=site_url('karyawan/kisah/store');?>',
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
    					title: 'Tambah Kisah Berhasil',
    					showConfirmButton: false,
    					timer: 1500
    				}).then(function(){
    					window.location.replace('<?=site_url('karyawan/kisah/index');?>');
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