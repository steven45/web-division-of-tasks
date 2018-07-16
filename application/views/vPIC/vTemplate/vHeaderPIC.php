<?php if (!isset($_SESSION['nik'])) {
  redirect(base_url("pic"));
} ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Semantic-UI/semantic.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Semantic-UI/data-paginate.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/tablesort.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/data-paging.js'); ?>"></script>
  
  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers"
          } );
        } );
    </script>
  <script type="text/javascript">
    $(document).ready(function() 
    { 
        $('table').tablesort(); 
    } 
    ); 
  </script>


  <script type="text/javascript">
    $(document).ready(function() 
    { 
    $('.ui.dropdown').dropdown();
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
        <?php echo $_SESSION['NamaPIC']; ?>
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
          <a href="<?php echo site_url('pic/keluar'); ?>" style="color: white;" onClick="return confirm('Apa anda yakin ingin keluar ?');">
      <div class="item">
          <div class="ui teal button">
            <i class="sign out alternate icon" icon"></i>Log Out
          </div>
      </div>
      </a>
      </div>
    </div>
    </div>
<br><br><br><br><br>

