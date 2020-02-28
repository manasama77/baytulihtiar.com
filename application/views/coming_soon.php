<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Baytul Maal KSPPS Baytul Ikhtiar</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?=base_url();?>vendor/metronicui/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?=base_url();?>vendor/metronicui/pages/css/coming-soon.min.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="<?=base_url();?>assets/img/logo_bm_sm.png" />
</head>
<!-- END HEAD -->

<body class="">
	<div class="container">
		<div class="row">
			<div class="col-md-12 coming-soon-header">
				<a class="brand" href="javascript:;">
					<img src="<?=base_url();?>assets/img/logo_bm_sm.png" alt="logo" />
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 coming-soon-content">
				<h1>Coming Soon!</h1>
				<!-- <p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi vehicula sem ut volutpat. Ut non libero magna fusce condimentum eleifend
				enim a feugiat. </p> -->
				<br>

			</div>
			<div class="col-md-6 coming-soon-countdown">
				<div id="defaultCountdown"> </div>
			</div>
		</div>
		<!--/end row-->
		<div class="row">
			<div class="col-md-12 coming-soon-footer"> 2020 &copy; KSPPS Baytul Ikhtiar. </div>
		</div>
	</div>

	<!-- BEGIN CORE PLUGINS -->
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/js.cookie.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/countdown/jquery.countdown.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<script src="<?=base_url();?>vendor/metronicui/global/scripts/app.min.js" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- <script src="<?=base_url();?>vendor/metronicui/pages/scripts/coming-soon.js" type="text/javascript"></script> -->
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
<script>
	$(document).ready(function(){
		var austDay = new Date();
		var base_url = '<?=base_url();?>assets/img/bg/';
		austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
		$('#defaultCountdown').countdown({until: austDay});
		$('#year').text(austDay.getFullYear());

		$.backstretch([
			base_url+"1.jpg",
			base_url+"2.jpg",
			base_url+"3.jpg",
			base_url+"4.jpg"
			], {
				fade: 1000,
				duration: 10000
			});
	});
</script>