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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/tablesort.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/data-paging.js'); ?>"></script>
  
  <!-- <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers"
          } );
        } );
    </script> -->
  <script type="text/javascript">
    $(document).ready(function() 
    { 
        $('table').tablesort(); 
    } 
    ); 
  </script>

 <link href="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.css" type="text/css" rel="stylesheet" title="Featherlight Styles" /><script src="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

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
      <div class="ui dropdown item">
      <i class="user icon"></i>
        PIC
        <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="<?php echo site_url('pic/pic'); ?>">
            Daftar PIC</a>
            <a class="item" href="<?php echo site_url('pic/absensi'); ?>">
            Absensi PIC</a>
            <a class="item" href="<?php echo site_url('pic/absensi'); ?>">
            Ranking PIC</a>
      </div>
      </div>

        
      <div class="right menu">

        <div class="ui pointing dropdown link item">
          <span class="text">

          Notifications</span>
          <div class="ui small label">1</div>
            <div class="menu">
              <div class="header">
                <i class= "bell icon"></i>
              Notifications</div>
              <div class="ui relaxed divided list" style="margin: auto+10px auto+10px; padding-bottom: 10px;">
                <div class="item">
                  <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI</a>
                    <div class="description">Updated 10 mins ago</div>
                  </div>
                </div>
                <div class="item">
                  <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI-Docsssss
                    </a>
                    <div class="description">Updated 22 mins ago sjjsak
              </div>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
      
        <a class="item" href="<?php echo site_url('pic/ubahPassword'); ?>">
        <i class="cog icon"></i>Setting
      </a>

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

