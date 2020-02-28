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
	});

	////////////////////////////////////////////////////////////////////////////////////
	
</script>