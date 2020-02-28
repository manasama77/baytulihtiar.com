<script type="text/javascript" src="<?=base_url();?>vendor/velocity/velocity.min.js"></script>
<script>
	$(document).ready(function(){
		$('.sidenav').sidenav();

		$('.dropdown-trigger').dropdown({
			hover: false
		});

		$('.materialboxed').materialbox();
		$('.tooltipped').tooltip();

		setTimeout(function(){
			$('.scale-transition').removeClass('scale-out').addClass('scale-in');
		}, 200);

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

		$(".card").mouseenter(function(e){
			$(this).find('> .card-image > img').trigger('click');
		});

		$(".card").mouseleave(function(){
			setTimeout(()=>{
				$(this).find('> .card-reveal > .card-title').trigger('click');

			}, 301);
		});

	});

	////////////////////////////////////////////////////////////////////////////////////
	
</script>