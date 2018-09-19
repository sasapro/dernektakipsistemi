<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kullanıcı Girişi</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>statics/css/style.css">
    <script src="<?php echo base_url(); ?>statics/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>statics/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo site_url(); ?>theme/js"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">DTS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">ANASAYFA <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="<?php echo site_url(); ?>kisi" >
          KİŞİLER
        </a>
      </li>
    </ul>
  </div>
</nav>
