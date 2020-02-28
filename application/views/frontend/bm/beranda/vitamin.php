<script>
	$(document).ready(function(){
		$(".card.berita").mouseenter(function(e){
			$(this).find('> .card-image > img').trigger('click');

		});

		$(".card.berita").mouseleave(function(){
			setTimeout(()=>{
				$(this).find('> .card-reveal > .card-title').trigger('click');

			}, 301);
		});

		$('.sidenav').sidenav();
		$('#carousel1').carousel({
			duration: 500,
			fullWidth: true,
			indicators: true,
			noWrap: false
		});

		$('#carousel2').carousel({
			duration: 200,
			dist: -20,
			shift: 0,
			padding: 50,
			numVisible: 10
		});

		$('.dropdown-trigger').dropdown({
			hover: false
		});
		autoPlay();

		$('#h_judul .progress').show();

		setTimeout(function(){
			$('#h_judul .progress').hide();
			$('#h_judulx').show();
		}, 2000);

		setTimeout(function(){
			$('.scale').removeClass('scale-out').addClass('scale-in');
			$('.scale-transition').removeClass('scale-out').addClass('scale-in');
		}, 500);

		$('.parallax').parallax();
		$('.scrollspy').scrollSpy({
			throttle: 100,
			scrollOffset: 50,
			activeClass: 'active',
			getActiveElement: function(id) {
				return 'a[href="#' + id + '"]';
			}
		});

		$(window).scroll(function(){ 
			if ($(this).scrollTop() > 100) { 
				$('#scroll').fadeIn(); 
			} else { 
				$('#scroll').fadeOut(); 
			} 
		});

		$('#scroll').click(function(){ 
			$("html, body").animate({ scrollTop: 0 }, 600); 
			return false; 
		});

		// FORM VALIDATE
		$('#tanya-form').validate({
			debug: true,
			errorElement : 'span',
			errorClass: 'helper-text invalid red-text',
			rules:{
				nama:{ required:true, minlength:3 },
				email:{ required:true },
				pesan:{ required:true, minlength:10 },
			},
			submitHandler: function( form ) {
				M.updateTextFields();
				validasiTanya();
			}
		});

	});

	////////////////////////////////////////////////////////////////////////////////////
	

	function autoPlay()
	{
		setInterval(function() {
			$('.carousel').carousel('next');
		}, 50000);

	}

	function changeVideo(judul, video)
	{
		$('#h_judulx').text('');
		$('.video-container').addClass('scale-out').removeClass('scale-in');
		$('#h_judul .progress').show();

		setTimeout(function(){
			$('.video-container').html('');
			$('#h_video').attr('src', 'https://www.youtube.com/embed/'+video);

			html = `<iframe id="h_video" width="560" height="315" src="https://www.youtube.com/embed/${video}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;

			$('.video-container').html(html);
			$('.video-container').removeClass('scale-out').addClass('scale-in');


			$('#h_judul .progress').hide();
			$('#h_judulx').text(judul).show();

		}, 1000);
	}

	function validasiTanya()
	{
		$.ajax({
			url         : '<?=site_url('store_tanya');?>',
			method      : 'POST',
			data        : $('#tanya-form').serialize(),
			dataType    : 'JSON',
			beforeSend  : function(){
				$.blockUI({ message: '<i class="fas fa-spinner fa-spin"></i> Silahkan Tunggu...' });
			},
			statusCode  : {
				200: function() {
					$.unblockUI();
				},
				404: function() {
					$.unblockUI();
					generateToast('Warning', '[404] Page Not Found...', 'error');
				},
				500: function() {
					$.unblockUI();
					generateToast('Warning', '[500] Not connect with Database...', 'error');
				},
				503: function() {
					$.unblockUI();
					generateToast('Warning', '[503] Request Time Out...', 'error');
				},
			}
		})
		.done(function(res){
			if(res.code == 200){
				swal.fire({
					type: 'success',
					title: 'Berhasil',
					html: 'Pertanyaan kamu telah tersimpan, Team KSPPS BAIK akan membalas menjawab pertanyaan kamu via Email.<br><strong>Terima Kasih</strong>'
				});

				setTimeout(function(){
					$('#nama').val('');
					$('#email').val('');
					$('#pesan').val('');
					window.location.reload();
				}, 3000);
			}else{
				swal.fire({
					type: 'error',
					title: 'Oops...',
					text: '[500] Not connect with Database...'
				});
			}

		});
	}
</script>