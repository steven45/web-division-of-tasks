<?php if (!isset($_SESSION['nama'])) {
  redirect(base_url("admin"));
} ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Semantic-UI/semantic.min.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/tablesort.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() 
    { 
        $('table').tablesort(); 
    } 
    ); 
  </script>

  <title>
    <?php echo $judul; ?>
  </title>
</head>

<body style="background-color: #c7eae9">
  <!-- Header -->
    <div class="ui top fixed inverted pointing menu">
      <a class="header item" href="<?php echo site_url('admin/beranda'); ?>">
        <img class="ui avatar image" src="<?php echo base_url('assets/images/Artajasa.png'); ?> ">
        Artajasa
      </a>
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
      <div class="ui simple dropdown item">
        <a href="<?php echo site_url('admin/pic'); ?>">
          <i class="user icon"></i>
          
        PIC</a>
        <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="<?php echo site_url('admin/absensi'); ?>">

            Absensi PIC</a>
      </div>
      </div>
        
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
      <a href="<?php echo site_url('admin/keluar'); ?>" style="color: white;">
      <div class="item">
          <div class="ui teal button">
            <i class="sign out alternate icon" icon"></i>Log Out
          </div>
      </div>
      </a>
    </div>
    </div>
<br><br><br><br><br>

