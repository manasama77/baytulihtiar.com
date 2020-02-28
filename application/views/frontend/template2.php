<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="KSPPS Baytul Ikhtiar">
	<meta name="keywords" content="KSPPS,kspps,baytul,ikhtiar,baik,grameen,bank">
	<meta name="author" content="AdamPM">
	<link rel="icon" href="<?=base_url('favicon.ico');?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>vendor/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/pace.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/main.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?=base_url();?>vendor/toast/jquery.toast.min.css"  media="screen,projection"/>
	<title><?=$title;?></title>
</head>
<body>
	<!-- Navbar -->
	<?php $this->load->view('frontend/partials/'.$navbar); ?>
	<!-- Navbar -->
	
	<!-- Content -->
	<?php $this->load->view('frontend/'.$content); ?>
	<!-- Content -->

	<?php $this->load->view('frontend/partials/footer2'); ?>

	<!--JavaScript at end of body for optimized loading-->
	<script
	src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/materialize/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/pace/pace.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/validate/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/validate/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/blockui/jquery.blockUI.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/toast/jquery.toast.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>vendor/sweetalert/sweetalert2@8.js"></script>

	<!-- Content -->
	<?php $this->load->view('frontend/'.$vitamin); ?>
	<!-- Content -->

	
</body>
</html>