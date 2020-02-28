<?php
function str_limit($text, $length = 350)
{
	$length = abs((int)$length);
	if(strlen($text) > $length) {
		$text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
	}
	return($text);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title;?></title>

	<!-- Bootstrap -->
	<link href="<?=base_url('assets/');?>css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('assets/');?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url('assets/');?>css/animate.css">
	<link href="<?=base_url('assets/');?>css/prettyPhoto.css" rel="stylesheet">
	<link href="<?=base_url('assets/');?>css/style.css" rel="stylesheet" />
	<link href="<?=base_url('');?>vendor/toast/jquery.toast.min.css" rel="stylesheet" />
	<link href="<?=base_url('');?>vendor/jquery-flipster-master/dist/jquery.flipster.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?=site_url('');?>vendor/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?=site_url('');?>vendor/slick/slick-theme.css"/>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="icon" href="<?=site_url('logo_sm.png');?>">
	<style>
		.ijox {
			color: #3c763d !important;
		}

		.xxx {
			width:342px; height:192px;
		}

		.media, .media-body {
			overflow: hidden;
			zoom: .9;
		}

		@media(max-width: 360px) { .xxx { width:230px; height:130px; } }
		.borderless td, .borderless th {
			border: none !important;
		}

		.nav-tabs > li > a {
			padding-top:23px !important;
			padding-bottom:5px !important;
		}

		@media (max-width: 768px) {
			.navbar-brand { padding-top: 15px !important;
			}

			#main-slider .carousel .item {
				height:auto !important;
			}
		}

		@media (min-width: 768px){
			.navbrand-brand {
				margin-left: -50px !important;
			}
		}

		@media screen and (min-width: 768px) {
			.carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {
				margin-left:-80px;
			}
			.carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {
				margin-right:-70px;
			}
		}

	</style>
</head>

<body>
	<?php $this->load->view('frontend/partials/header'); ?>
	<?php $this->load->view('frontend/'.$content); ?>
	<?php $this->load->view('frontend/partials/footer'); ?>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?=base_url('assets/');?>js/jquery.min.js"></script>
	<!--script src="<?=base_url('assets/');?>js/jquery-migrate.min.js"></script-->
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?=base_url('assets/');?>js/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/');?>js/jquery.prettyPhoto.js"></script>
	<script src="<?=base_url('assets/');?>js/jquery.isotope.min.js"></script>
	<script src="<?=base_url('assets/');?>js/wow.min.js"></script>
	<script src="<?=base_url('assets/');?>js/functions.js"></script>
	<script src="<?=base_url('assets/');?>js/jquery.number.min.js"></script>
	<script src="<?=base_url();?>vendor/blockui/jquery.blockUI.js"></script>
	<script src="<?=base_url();?>vendor/toast/jquery.toast.min.js"></script>
	<script src="<?=base_url();?>vendor/jquery-flipster-master/dist/jquery.flipster.min.js"></script>
	<script type="text/javascript" src="<?=site_url();?>vendor/slick/slick.min.js"></script>
	<script>

		$(document).ready(function(){

			$('.img-hover-increase').on('mouseover', function(){
				$(this).css('transform', 'scale(1.1)');
			});

			$('.img-hover-increase').on('mouseout', function(){
				$(this).css('transform', 'scale(1)');
			});

			$("#myCarousel").carousel({
				interval: 4000,
				pause: "hover"
			});

			$('.caro').slick({
				infinite:true,
				slideToShow: 1,
				slideToScroll: 1,
				arrow: true,
				autoplay: true,
				speed: 1000,
				autoplaySpeed: 3000,
				dots: true,
				variableHeight: true,
				centerMode: true,
				cssEase: 'linear',
				mobileFirst: false,
				respondTo: 'slider',
				fade: false
			});

			$('.autoplay').slick({
				infinite:true,
				slideToShow: 10,
				slideToScroll: 1,
				arrow: true,
				autoplay: true,
				speed: 1000,
				autoplaySpeed: 3000,
				dots: false,
				variableWidth: true
			});

			$('#mtAnggota').on('click', function(e){
				generateToast('Info', 'Under Construction', 'info');
			});

			var flipster = $(".flipster").flipster({
				style: 'carousel',
				spacing: -0.4,
				nav: false,
				buttons: true,
				scrollwheel: false,
				click: false,
				infinite: true
			});

		});

		function generateToast(heading, message, color){
			$.toast({
				text: message,
				heading: heading,
				icon: color,
				showHideTransition: 'slide',
				allowToastClose: true,
				hideAfter: 5000,
				stack: 5,
				position: 'bottom-right',
				textAlign: 'left',
				loader: true,
				loaderBg: '#9EC600',    
			});
		}

		function addCommas(nStr)
		{
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + ',' + '$2');
			}
			return x1 + x2;
		}
	</script>

</body>

</html>
