<!DOCTYPE html>
<html lang="en">
<?php
	require_once("lib/config.php");
?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SHIELD - Free Bootstrap 3 Theme">
    <meta name="author" content="Carlos Alvarez - Alvarez.is - blacktie.co">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title> Sistem Informasi Akuntansi</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">


    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    <script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  
  
  	<div id="navbar-main">
      <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php" class="menu-top-active">HOME</a></li>
            <li><a href="?page=tambah_akun">AKUN</a></li>
            <li><a href="?page=input_transaksi">JURNAL UMUM</a></li>
            <li><a href="?page=buku_besar">BUKU BESAR</a></li>
            <li><a href="?page=neraca_saldo">NERACA SALDO</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>
    <!-- ==== HEADERWRAP ==== -->
      <div id="headerwrap" id="home" name="home">
      <header class="clearfix">
            <h1><span class="icon icon-shield"></span></h1>
            <p>Sistem Informasi Akuntasi</p>
        </header>     
      </div><!-- /headerwrap -->
	    <div class="content-wrapper">
         <div class="container">
		   <div class="row">
            <div class="col-lg-20">
				<div style="margin:30px"><?php include("lib/conten.php");?></div>
                </div>
            </div>
		 
		 </div>

    </div>		

		<div id="footerwrap">
			<div class="container">
				<h4>Created by <a href="http://blacktie.co">MohFadhlan</a> - Copyright 2017</h4>
			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  </body>
</html>
