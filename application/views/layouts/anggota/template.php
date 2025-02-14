<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?=$title;?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN LAYOUT FIRST STYLES -->
	<link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
	<!-- END LAYOUT FIRST STYLES -->
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?=base_url();?>vendor/metronicui/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<link href="<?=base_url();?>vendor/metronicui/layouts/layout5/css/layout.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/layouts/layout5/css/custom.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="<?=base_url();?>favicon.ico" /> </head>
	<!-- END HEAD -->

	<body class="page-header-fixed page-sidebar-closed-hide-logo">
		<!-- BEGIN CONTAINER -->
		<div class="wrapper">

			<?php $this->load->view('layouts/anggota/topbar'); ?>

			<div class="container-fluid">
				<?php $this->load->view('anggota/'.$content); ?>
				<!-- END PAGE BASE CONTENT -->
			</div>
			<!-- BEGIN FOOTER -->
			<p class="copyright text-right"> 2020 &copy; KSPPS Baytul Ikhtiar</p>
			<a href="#index" class="go2top">
				<i class="icon-arrow-up"></i>
			</a>
			<!-- END FOOTER -->
		</div>
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler">
		<i class="icon-login"></i>
	</a>
	<!--[if lt IE 9]>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/respond.min.js"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=base_url();?>vendor/metronicui/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?=base_url();?>vendor/metronicui/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=base_url();?>vendor/metronicui/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?=base_url();?>vendor/metronicui/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>vendor/metronicui/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>

<script>
	function statementTabungan()
	{
		alert('Coming Soon');
	}

	function kartuAngsuran()
	{
		alert('Coming Soon');
	}
</script>