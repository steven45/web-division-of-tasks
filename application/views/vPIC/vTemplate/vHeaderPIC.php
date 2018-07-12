<?php if (!isset($_SESSION['nik'])) {
  redirect(base_url("admin"));
} ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/tablesort.js'); ?>"></script>
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
      <div class="header item">
        <img class="ui avatar image" src="<?php echo base_url('assets/images/Artajasa.png'); ?> ">
        Artajasa
      </div>
      <a class="item" href="<?php echo site_url('pic/beranda'); ?>">
        <div class="ui icon">
          <i class="home icon"></i>
          Dashboard</div>
      </a>
      <a class="item" href="<?php echo site_url('pic/checklist'); ?>">
        <div class="ui icon">
          <i class="check square icon"></i>
        Checklist</div>
      </a>
        
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

