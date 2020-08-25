<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title><?= $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('vendor/metronicui/'); ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- <link href="<?= base_url('vendor/metronicui/'); ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" /> -->
	<link href="<?= base_url('vendor/metronicui/'); ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- <link href="<?= base_url('vendor/metronicui/'); ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" /> -->
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- <link href="<?= base_url('vendor/metronicui/'); ?>global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> -->
	<!-- <link href="<?= base_url('vendor/metronicui/'); ?>global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?= base_url('vendor/metronicui/'); ?>global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
	<link href="<?= base_url('vendor/metronicui/'); ?>global/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?= base_url('vendor/metronicui/'); ?>pages/css/login-2.css" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="<?= base_url(); ?>favicon.ico" />
</head>
<!-- END HEAD -->

<body class=" login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="<?= base_url('/'); ?>">
			<img src="<?= base_url(); ?>assets/img/baik_logo1.png" style="min-height: 17px;" alt="LOGO BAIK" /> </a>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<?php $this->load->view('login/' . $view); ?>
		<!-- END LOGIN FORM -->
	</div>
	<div class="copyright hide"> 2014 © Metronic. Admin Dashboard Template. </div>
	<!-- END LOGIN -->

	<!-- BEGIN CORE PLUGINS -->
	<script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<!-- <script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> -->
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
	<link href="<?= base_url(); ?>vendor/sweetalert/theme-borderless/borderless.min.css" rel="stylesheet" type="text/css" />
	<script src="<?= base_url(); ?>vendor/sweetalert/sweetalert2.all.min.js" type="text/javascript"></script>
	<!-- <script src="<?= base_url('vendor/metronicui/'); ?>global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script> -->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<!-- <script src="<?= base_url('vendor/metronicui/'); ?>global/scripts/app.min.js" type="text/javascript"></script> -->
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- <script src="<?= base_url('vendor/metronicui/'); ?>pages/scripts/login.min.js" type="text/javascript"></script> -->
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>

<?php $this->load->view('vitamin/' . $view_vitamin); ?>