<?php if (!isset($_SESSION['nama'])) {
  redirect(base_url("admin"));
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


<style type="text/css">
  .dataTables_wrapper .dataTables_paginate {
  float:right;
  text-align:right;
  padding-top:0.25em
  }

.dataTables_wrapper .dataTables_paginate .paginate_button {
  box-sizing:border-box;
  display:inline-block;
  min-width:1.5em;
  padding:0.5em 1em;
  margin-left:2px;
  text-align:center;
  text-decoration:none !important;
  cursor:pointer;*cursor:hand;color:#333 !important;
  border:1px solid transparent;border-radius:2px
  }

.dataTables_wrapper .dataTables_paginate .paginate_button.current,.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
  color:#333 !important;
  border:1px solid #979797;
  background-color:white;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fff), color-stop(100%, #dcdcdc));
  background:-webkit-linear-gradient(top, #fff 0%, #dcdcdc 100%);
  background:-moz-linear-gradient(top, #fff 0%, #dcdcdc 100%);
  background:-ms-linear-gradient(top, #fff 0%, #dcdcdc 100%);
  background:-o-linear-gradient(top, #fff 0%, #dcdcdc 100%);
  background:linear-gradient(to bottom, #fff 0%, #dcdcdc 100%)
  }

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
  cursor:default;
  color:#666 !important;
  border:1px solid transparent;
  background:transparent;
  box-shadow:none
  }

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  color:white !important;
  border:1px solid #111;
  background-color:#585858;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));
  background:-webkit-linear-gradient(top, #585858 0%, #111 100%);
  background:-moz-linear-gradient(top, #585858 0%, #111 100%);
  background:-ms-linear-gradient(top, #585858 0%, #111 100%);
  background:-o-linear-gradient(top, #585858 0%, #111 100%);
  background:linear-gradient(to bottom, #585858 0%, #111 100%)
  }

.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  outline:none;
  background-color:#2b2b2b;
  background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c));
  background:-webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  background:-moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  background:-ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  background:-o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
  background:linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%);
  box-shadow:inset 0 0 3px #111
  }

.dataTables_wrapper .dataTables_paginate .ellipsis {
  padding:0 1em
  }

.dataTables_wrapper .dataTables_processing {
  position:absolute;
  top:50%;
  left:50%;
  width:100%;
  height:40px;
  margin-left:-50%;
  margin-top:-25px;
  padding-top:20px;
  text-align:center;
  font-size:1.2em;
  background-color:white;
  background:-webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255,255,255,0)), color-stop(25%, rgba(255,255,255,0.9)), color-stop(75%, rgba(255,255,255,0.9)), color-stop(100%, rgba(255,255,255,0)));
  background:-webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);
  background:-moz-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);
  background:-ms-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);
  background:-o-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%);
  background:linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.9) 25%, rgba(255,255,255,0.9) 75%, rgba(255,255,255,0) 100%)
  }

</style>





  <title>
    <?php echo $judul; ?>
  </title>
  
</head>


<body style="background-color: #bcd8d7">
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

      <div class="ui dropdown item">
      <i class="user icon"></i>
        PIC
        <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="<?php echo site_url('admin/pic'); ?>">
            Daftar PIC</a>
            <a class="item" href="<?php echo site_url('admin/absensi'); ?>">
            Absensi PIC</a>
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

              <!-- <div class="header">Notifications</div>
              <a class="item" href="<?php echo site_url('admin/absensi'); ?>">
                <div class="label">Nama PIC</div>
              </a>
              <a class="item">Cancel</a> -->
            </div>
        </div>
        

    <div class="item">
      <div class="ui icon input">
        <input type="text" placeholder="Search...">
        <i class="search icon"></i>
      </div>
    </div>
      <a href="<?php echo site_url('admin/keluar'); ?>" style="color: white;" onClick="return confirm('Apa anda yakin ingin keluar ?');">
      <div class="item">
          <div class="ui teal button">
            <i class="sign out alternate icon" icon"></i>Log Out
          </div>
      </div>
      </a>
    </div>
    </div>
<br><br><br><br><br>



