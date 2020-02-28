<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title><?=$title;?></title>
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
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?=base_url();?>vendor/metronicui/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<link href="<?=base_url();?>vendor/metronicui/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
	<link href="<?=base_url();?>vendor/metronicui/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="<?=base_url();?>favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
	<div class="page-wrapper">
		<?php $this->load->view('layouts/karyawan/topbar'); ?>
		<!-- BEGIN HEADER & CONTENT DIVIDER -->
		<div class="clearfix"> </div>
		<!-- END HEADER & CONTENT DIVIDER -->
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<?php $this->load->view('layouts/karyawan/sidebar'); ?>
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<!-- BEGIN CONTENT BODY -->
				<?php $this->load->view('karyawan/'.$content); ?>
				<!-- END CONTENT BODY -->
			</div>
			<!-- END CONTENT -->
		</div>
		<!-- END CONTAINER -->
		<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2020 &copy; KSPPS Baytul Ikhtiar
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- END FOOTER -->
	</div>
	<!-- BEGIN CORE PLUGINS -->
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/js.cookie.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<script src="<?=base_url();?>vendor/metronicui/global/scripts/app.min.js" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<script src="<?=base_url();?>vendor/metronicui/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
	<!-- <script src="<?=base_url();?>vendor/metronicui/layouts/layout/scripts/demo.min.js" type="text/javascript"></script> -->
	<script src="<?=base_url();?>vendor/metronicui/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/metronicui/pages/scripts/components-editors.js" type="text/javascript"></script>
	<script src="<?=base_url();?>vendor/validate/jquery.validate.min.js"></script>
	<script src="<?=base_url();?>vendor/validate/additional-methods.min.js"></script>
	<link href="<?=base_url();?>vendor/sweetalert/theme-borderless/borderless.min.css" rel="stylesheet" type="text/css" />
	<script src="<?=base_url();?>vendor/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
	<!-- END THEME LAYOUT SCRIPTS -->

	<script>let base_url = '<?=base_url();?>';</script>
	<?php $this->load->view('vitamin/'.$vitamin); ?>
	</html>
</body>