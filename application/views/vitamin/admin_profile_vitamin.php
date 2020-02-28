<!-- <script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script> -->
<script>
	$(document).ready(function(){

	});
</script>

<script>
	function showModal(id)
	{
		$.ajax({
			url         : `<?=site_url();?>backend/profile/show/${id}`,
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
</script>