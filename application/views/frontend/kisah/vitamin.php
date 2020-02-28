<script>
	$(document).ready(function(){
		$('.sidenav').sidenav();

		$('.dropdown-trigger').dropdown({
			hover: false
		});

		$('.carousel').carousel({
			dist: -20,
			shift: 0,
			padding: 50,
			duration: 200,
			indicators: true,
			fullWidth: false
		});
		// autoPlay();
		
		$('#h_judul .progress').show();

		setTimeout(function(){
			$('#h_judul .progress').hide();
			$('#h_judulx').show();
			$('.sub_judulx').show();
		}, 1000);

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
	
	function autoPlay()
	{
		setInterval(function() {
			$('.carousel').carousel('next');
		}, 1000);

	}

	function prev()
	{
		$('.carousel').carousel('prev');
	}

	function next()
	{
		$('.carousel').carousel('next');
	}

	function changeVideo(judul, video, cn, cd)
	{
		$('#h_judulx').text('');
		$('#cn').text('');
		$('#cd').text('');

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
			$('#cn').text(cn);
			$('#cd').text(cd);

		}, 1000);
	}
	
</script>