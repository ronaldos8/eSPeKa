<?php $asset_path = base_url('asset/adminlte/'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?> -  eSPeKa</title>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="<?php echo $asset_path; ?>bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Morris charts -->
	<link rel="stylesheet" href="<?php echo $asset_path; ?>plugins/morris/morris.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo $asset_path; ?>dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo $asset_path; ?>dist/css/skins/_all-skins.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?php echo site_url(); ?>">espeka</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="<?php if(isset($v_beranda)) echo $v_beranda; ?>"><a href="<?php echo base_url(); ?>">Beranda <span class="sr-only">(current)</span></a></li>
	        <li class="<?php if(isset($v_jasa)) echo $v_jasa; ?>"><a href="<?php echo site_url('jasa'); ?>">Jasa Pengiriman</a></li>
	        <li class="<?php if(isset($v_pengiriman)) echo $v_pengiriman; ?>"><a href="<?php echo site_url('pengiriman'); ?>">Pengiriman</a></li>
	        <li class="<?php if(isset($v_kriteria)) echo $v_kriteria; ?>"><a href="<?php echo site_url('kriteria'); ?>">Kriteria</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
		    <form class="navbar-form navbar-left" action="<?php echo site_url('cari/q/'); ?>" method="GET">
		        <div class="form-group">
		          <input type="text" name="s" class="form-control" placeholder="Search" required >
		        </div>
			</form>
	        <li class="<?php if(isset($v_pengaturan)) echo $v_pengaturan; ?>"><a href="<?php echo site_url('pengaturan/'); ?>">
	        <?php
	        	if ($this->session->has_userdata('jasa_baru')) {
	        		echo "<span class='badge'>!</span>";
	        	}
	        ?>
	        Pengaturan</a></li>
	        <?php
	        	if ($this->session->has_userdata('log')) {
	        ?>
	        		<li class="dropdown">
			          <a href="#" class="dropdown-toggle <?php if(isset($v_user)) echo $v_user; ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hai, <?php echo $this->session->userdata('nama_log'); ?>! <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="#">Profile</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="<?php echo site_url('login/out'); ?>">Logout</a></li>
			          </ul>
			        </li>
	        <?php
	        	}
	        ?>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<style type="text/css" media="screen">
		#body {
			min-height: 560px;
		}
	</style>
	<div class="container" id="body">