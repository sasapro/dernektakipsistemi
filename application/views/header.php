<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kullanıcı Girişi</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/datepicker/css/bootstrap-datepicker3.min.css" >

    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/css/style.css">
    <script src="<?php echo base_url(); ?>statics/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>statics/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>statics/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>statics/datepicker/locales/bootstrap-datepicker.tr.min.js" charset="UTF-8"></script>


    <script src="<?php echo site_url(); ?>theme/js"></script>



    <!-- Latest compiled and minified JavaScript -->


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">DTS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>aile" >
          AİLELER
        </a>
      </li>
	        <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>kisi" >
          KİŞİLER
        </a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>yardim" >
                YARDIMLAR
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                RAPORLAR
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url(); ?>rapor">Detay Rapor</a>
                <a class="dropdown-item" href="<?php echo site_url(); ?>rapor/yardim?day=7">Son 7 Gün Raporu</a>
                <a class="dropdown-item" href="<?php echo site_url(); ?>rapor/yardim?day=30">Son 30 Gün Raporu</a>
                <a class="dropdown-item" href="<?php echo site_url(); ?>rapor/yardim?day=60">Son 2 Ay Raporu</a>
                <a class="dropdown-item" href="<?php echo site_url(); ?>rapor/yardim?day=90">Son 3 Ay Raporu</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url(); ?>anasayfa/cikis" >
                ÇIKIŞ
            </a>
        </li>
    </ul>
  </div>
</nav>
