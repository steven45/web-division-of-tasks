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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/pagination.min.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/tablesort.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/data-paging.js'); ?>"></script>

<!--     <script type="text/javascript">
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

  <script type="text/javascript">
    $(document).ready(function() 
    { 
    $('.ui.dropdown').dropdown();
    } 
    ); 
  </script>

  <script>
  $(document).ready(function(){

    var day = $("#hari option:selected").val().toLowerCase();
    $("#hasil tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(day) > -1);

    });
    $("select#hari").change(function(){
      var hari = $("#hari option:selected").val().toLowerCase();
      var jumlah = document.getElementById("hasil").getElementsByTagName("tr").length;

      $("#hasil tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(hari) > -1)
      });
    });
  });
  </script>
  
<!--   <script >
    $(document).ready(function(){
        $.getJSON("<?php echo site_url('admin/jLog'); ?>", function(result){
            $.each(result, function(i, field){
                $("#vriza").append(field + " ");
                });
            });
        });
  </script> -->

  <script type="text/javascript">
  $(document).ready(function(){
    var txt= "";
    var kalender = $("#kalender").val();

    $.getJSON("<?php echo site_url('admin/jLog'); ?>", function(result){
      $.each(result, function(i, field){  
        for (var i = 0; i < field.length; i++) {

        //   var fs = require("fs");

        // console.log("Going to get file info!");
        //   fs.stat(field[i]["Info"], function (err, stats) {
        //      if (err) {
        //          return console.error(err);
        //      }
        //      console.log(stats);
        //      console.log("Got file info successfully!");
             
        //      // Check file type
        //      console.log("isFile ? " + stats.isFile());
        //      console.log("isDirectory ? " + stats.isDirectory());    
        //   });

          txt += "<tr>";
          txt += "<td>" + (i+1) + "</td>" +
                  "<td>" + field[i]["Jam"] + "</td>" +
                  "<td class='waktu'>" + field[i]["Waktu"] + "</td>" +
                  "<td>" + field[i]["NamaChecklist"] + "</td>" +
                  "<td>" + field[i]["NamaPIC"] + "</td>" +
                  "<td>" + field[i]["PICCek"] + "</td>" +
                  "<td>" + field[i]["Info"] + "</td>" +
                  "<td>" + field[i]["Status"] + "</td>" +
                  "<td>" + field[i]["Keterangan"] + "</td>" ;
          txt += "</tr>";
        }
        document.getElementById("hasilLog").innerHTML = txt;
        $("#hasilLog tr").filter(function() {
          $(this).toggle($(this).text().indexOf(kalender) > -1);
        });
      });
    });  

    $('#kalender').on("change",function(){
      kalender =  $('#kalender').val();
      // $('#getDate').html($('#kalender').val());
      $("#hasilLog tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(kalender) > -1);
      });
    }); 
  }); 
  </script>



<link href="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.css" type="text/css" rel="stylesheet" title="Featherlight Styles" /><script src="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

  <title>
    <?php echo $judul; ?>
  </title>
  
</head>


<body style="background-image: url(<?php echo base_url('assets/images/blue.png'); ?>);">
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
            <a class="item" href="<?php echo site_url('admin/ranking'); ?>">
            Ranking PIC</a>
            <a class="item" href="<?php echo site_url('admin/pergantian'); ?>">
            Pergantian PIC</a>
          </div>
      </div>
        
      <div class="right menu">
        <div class="ui pointing dropdown link item">
          <span class="text">

          Notifications</span>
          <div class="ui small label" style="background-color: red;"><!-- <?php echo $temp; ?> -->2</div>
            <div class="menu">
              <div class="header">
                <i class= "bell icon"></i>
              Notifications</div>

              <!-- <div class="ui relaxed divided list" style="margin: auto+10px auto+10px; padding-bottom: 10px;">
              <?php foreach ($notifikasi as $notifikasi): ?>
                <a href="<?php echo site_url('admin/beranda'); ?>">
                <?php if ($notifikasi['Status'] == 'Belum'): ?>
                  <div class="item" style="background-color: #e2f8ff; padding: 10px; ">
                <?php endif ?>
                <?php if ($notifikasi['Status'] == 'Sudah'): ?>
                  <div class="item" style="background-color: white; padding: 10px; ">
                <?php endif ?>
                  <div class="content">
                    <p class="header" style="margin-bottom: 5px; color: blue;"><?php echo $notifikasi['Isi'] ?></p>
                    <div class="description" style="font-size: 12px; color: black;">Updated <?php echo $notifikasi['Waktu'] ?></div>
                  </div>
                </div>  
                </a>
                <br>
              <?php endforeach ?>
              </div> -->
              
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



