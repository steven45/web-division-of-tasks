<?php if (!isset($_SESSION['nama'])) {
  redirect(base_url("admin"));
} ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css">
  <title>
    <?php echo $judul; ?>
  </title>
</head>
<<<<<<< HEAD
<body style="background-color: #c7eae9">
  <!-- Header -->
    <div class="ui top fixed inverted pointing menu">
      <div class="header item">
        <img class="ui avatar image" src="img/Artajasa.png">
        Artajasa
      </div>
      <a class="item" href="<?php echo site_url('admin/beranda'); ?>">
        <div class="ui icon">
          <i class="home icon"></i>
          Dashboard</div>
      </a>
      <a class="item" href="<?php echo site_url('admin/checklist'); ?>">
        <div class="ui icon">
          <i class="check square icon"></i>
        Checklist</div>
      </a>
      <a class="ui simple dropdown item" href="<?php echo site_url('admin/pic'); ?>">
        <div class="ui icon">
          <i class="user icon"></i>
        PIC</div>
        <i class="dropdown icon"></i>
          <div class="menu">
            <div class="item">Absensi PIC</div>
      </div>
      </a>
=======

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   
    <a class="navbar-brand" href="index.html"><img src="<?php echo base_url('assets/images/Artajasa.png'); ?> " style="border-radius: 50%; height: 40px; width: 40px; margin: 10px;">Artajasa</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo site_url('admin/beranda'); ?>">
            <i class="fa fa-home"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Checklist">
          <a class="nav-link" href="<?php echo site_url('admin/checklist'); ?>">
            <i class="fa fa-check-square"></i>
            <span class="nav-link-text">Checklist</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="PIC">
          <a class="nav-link" href="<?php echo site_url('admin/pic'); ?>">
            <i class="fa fa-users"></i>
            <span class="nav-link-text">PIC</span>
          </a>
        </li>
>>>>>>> 132d7495c48ad83b13058064e8237d4f1d48bec5
        
      <div class="right menu">
      <a class="item">
        Notifications
        <div class="ui small label">1</div>
        </a>
    <div class="item">
      <div class="ui icon input">
        <input type="text" placeholder="Search...">
        <i class="search icon"></i>
      </div>
    </div>
      
      <div class="item">
          <div class="ui teal button">
            <i class="sign out alternate icon" icon"></i>
          Log Out</div>
      </div>
    </div>
    </div>
<br><br><br><br><br>

