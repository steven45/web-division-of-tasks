<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
  <div class="ui segment" style="border-radius: 1.285714rem">

    <div class="segment">
      <div class="ui icon input" style="margin-left: 0px">
        <input type="text" placeholder="Search..." id="pencarian">
        <i class="circular search link icon"></i>
      </div>
      <h3 style="text-align: center; margin-top: -30px;">
      <div class="ui icon">
        <i class="tasks icon"></i>
      Daftar Checklist 
      </h3>
      
      </div>
  <div class="ui divider"></div>
  <div class= "ui field">
        <select name="state" id="maxRows" class="form-control" style="width:150px;">
                        <option value="5000">Show All</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                  </div>

  <div class="field" style="margin-left: 600px">
  <select class="ui right selection tiny dropdown item" id="hari" >
      <!-- <option value="<?php echo $hari; ?>"><?php echo $hari; ?></option>         -->
      <option value="<?php echo $hari ?>"><?php echo $hari ?></option>
      <option value="Senin">Senin</option>
      <option value="Selasa">Selasa</option>
      <option value="Rabu">Rabu</option>
      <option value="Kamis">Kamis</option>
      <option value="Jumat">Jumat</option>
      <option value="Sabtu">Sabtu</option>
      <option value="Minggu">Minggu</option>
    </select>
  </div>

  <table class="ui sortable celled table" id="mytable" class="display">
    <thead>
      <tr style="text-align: center">
        <th class="sorted ascending">No</th>
        <th>Hari</th>
        <th >Jadwal</th>
        <th>Batas Pengecekan</th>
        <th >Nama Checklist</th>
        <th>Nama PIC</th>
        <th >Info Checklist</th>
        <th >Check</th>
        
      </tr>
    </thead>
    <tbody id="hasil">
      <?php $temp = 0; $no = 0; ?>
      <?php foreach ($checklist as $checklist) { ?>
<!--       <?php if ($checklist['Status'] == $status) { ?>
      <?php if ($checklist['NamaPIC'] == $_SESSION['NamaPIC'] AND $checklist['StatusCheck'] == '1') { ?>
        <tr style="background-color: #75e2f2;">
      <?php } elseif( $checklist['StatusCheck'] != '1') { ?>
        <tr style="background-color: #95f080;">
      <?php } ?> -->

      <?php  
        if ($checklist['Status'] == $status) {
          if ($checklist['NamaPIC'] == $_SESSION['NamaPIC']) {
            if ($checklist['StatusCheck'] == '1') {
              echo '<tr style="background-color: #AFEEEE" class="hasilku">';
            }
            else{
              echo '<tr style="background-color: #e6ee6d" class="hasilku">';
            }
          }
          else{
            if ($checklist['StatusCheck'] == '1') {
              echo '<tr style="background-color: #AFEEEE" class="hasilku">';
            }
            else{
              echo '<tr class="hasilku">';
            }
          }
        }
      ?>
      <input type="hidden"  class="statusCheck" value="<?php echo $checklist['StatusCheck'] ?>">
        <td><?php echo $nomor[$temp] ; $no = $no+1;?></td>
         <td class="hari"><?php echo $checklist['Hari']; ?></td>
        <td class="time"><?php echo $checklist['Jam']; ?></td>
        <td class="batasP"><?php echo $checklist['BatasPengecekan'] ?> Menit</td>
        <td><?php echo $checklist['NamaChecklist']; ?></td>
        <td><?php echo $checklist['NamaPIC'] ?> </td> 
        <td>
          <?php 
            $nInfo = NULL;
            $k = 0;
            $fh = fopen($checklist['Info'], 'r');
            while(!feof($fh)){
             $nInfo[$k] = fgets($fh);
             $k = $k +1;
            }
            
          ?>

          <a href="#" data-featherlight=" <?php echo '#bio-name'.$temp ?>">Lihat</a>
            <div style="display:none;">
              <div id="<?php echo 'bio-name'.$temp ?>">
                <h3>Info Checklist</h3>
                <div class="ui segment">
                 <?php foreach ($nInfo as $info) {
                    echo '<p>'.$info.'</p>';
                  } ?> 
                </div>
              </div>
            </div>

        </td>
        <?php if ($checklist['NamaPIC'] == $_SESSION['NamaPIC'] AND $checklist['StatusCheck'] == '0' AND $checklist['Hari'] == $hari) {?>
          <td>
          <a href="#" data-featherlight="<?php echo '#tampilKet'.$temp ?>">Check</a>
            <div style="display:none;">
              <div id="<?php echo 'tampilKet'.$temp ?>">

              <form method="POST" action="<?php echo site_url('pic/docheck'); ?>">  
              <input type="hidden" name="NIK" value="<?php echo $_SESSION['nik'] ?>">
              <input type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist'] ?>">
              <input type="hidden" name="NamaPIC" value="<?php echo $checklist['NamaPIC'] ?>">
              <input type="hidden" name="NamaChecklist" value="<?php echo $checklist['NamaChecklist'] ?>">
              <input type="hidden" name="NamaChecklistSebenarnya" value="<?php echo $_SESSION['NamaPIC'] ?>">
              <input type="hidden" name="Jam" value="<?php echo $checklist['Jam'] ?>">
              <input type="hidden" name="Info" value="<?php echo $checklist['Info'] ?>">
              <input type="hidden" name="Hari" value="<?php echo $checklist['Hari'] ?>">
                <h3>Status</h3>
                <div class="ui form">
                <select name="Status">
                  <option value="OK">OK</option>
                  <option value="Bad">Bad</option>
                </select>
                </div>
                <h3>Keterangan</h3>
                  <div class="ui form">
                    <div class="field">
                       <textarea name="Keterangan"></textarea>
                    </div>
                  </div>
                  <br>
                  <button class="ui right floated blue small button" >
                    <i class="save icon"></i>Simpan
                  </button>
                </form>
              </div>
            </div>
          </td>
        <?php } else if($checklist['NamaPIC'] != $_SESSION['NamaPIC'] AND $checklist['StatusCheck'] == '0' AND $checklist['Hari'] == $hari){?>

          <td>
          <a href="#" data-featherlight="<?php echo '#tampilKet'.$temp ?>">Check</a>
            <div style="display:none;">
              <div id="<?php echo 'tampilKet'.$temp ?>">

              <form method="POST" action="<?php echo site_url('pic/docheck'); ?>">  
              <input type="hidden" name="NIK" value="<?php echo $_SESSION['nik'] ?>">
              <input type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist'] ?>">
              <input type="hidden" name="NamaPIC" value="<?php echo $checklist['NamaPIC'] ?>">
              <input type="hidden" name="NamaChecklist" value="<?php echo $checklist['NamaChecklist'] ?>">
              <input type="hidden" name="NamaChecklistSebenarnya" value="<?php echo $_SESSION['NamaPIC'] ?>">
              <input type="hidden" name="Jam" value="<?php echo $checklist['Jam'] ?>">
              <input type="hidden" name="Info" value="<?php echo $checklist['Info'] ?>">
              <input type="hidden" name="Hari" value="<?php echo $checklist['Hari'] ?>">
                <h3>Status</h3>
                <div class="ui form">
                <select name="Status">
                  <option value="OK">OK</option>
                  <option value="Bad">Bad</option>
                </select>
                </div>
                <h3>Keterangan</h3>
                  <div class="ui form">
                    <div class="field">
                       <textarea name="Keterangan"></textarea>
                    </div>
                  </div>
                  <br>
                  <button class="ui right floated blue small button" onClick="return confirm('Perhatian!!! Bukan Jadwal Anda Untuk Mengecek !!! Apakah Anda Ingin Melanjutkan??');">
                    <i class="save icon"></i>Simpan
                  </button>
                </form>
              </div>
            </div>
          </td>
        <?php } else{ ?>
          <td>Disabled</td>
        <?php } ?>
      </tr> 
      <?php $temp = $temp + 1; ?>
      <?php } ?>
      <?php } ?>
    </tbody>
    <tfoot>
        <th colspan="8">

        </th>
    </tfoot>
  </table>
  <div class="pagination-container">
            <nav>
                <ul class="pagination"></ul>
            </nav>
        </div>
 
  </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script type="text/javascript">
  
  var interval = null;

  function reloadChecklist(){
  moment.locale();
  var nowTime = moment();
  var nowDay = moment().format('dddd');
  var checkTime = moment('13:00', 'hh:mm');
  var duration = moment.duration(checkTime.diff(nowTime));

  console.log('now time', nowTime);
  console.log('now day', nowDay);
  console.log('check time', checkTime);
  console.log('duration in hours', duration.asHours());
  console.log('duration in minutes', duration.asMinutes());
  console.log(moment().format());

  var row = document.querySelectorAll("table#mytable>tbody#hasil>tr");
  var blink = document.getElementById('hasil');
  var time = [];
  var selisih = [];
  var batasP = [];
  var statusCheck = [];
  var hari = [];

  if (nowDay == 'Sunday') {
    var hariSekarang = "Minggu";
  }
  else if(nowDay == 'Monday'){
    var hariSekarang = "Senin";
  }
  else if(nowDay == 'Tuesday'){
    var hariSekarang = "Selasa";
  }
  else if(nowDay == 'Wednesday'){
    var hariSekarang = "Rabu";
  }
  else if(nowDay == 'Thursday'){
    var hariSekarang = "Kamis";
  }
  else if(nowDay == 'Friday'){
    var hariSekarang = "Jumat";
  }
  else if(nowDay == 'Saturday'){
    var hariSekarang = "Sabtu";
  }


  var x = document.getElementsByClassName("time");
  for(var j = 0; j < x.length; j++){
    time[j] =  document.getElementsByClassName("time")[j].innerHTML;
    hari[j] =  document.getElementsByClassName("hari")[j].innerHTML;
    statusCheck[j] = document.getElementsByClassName("statusCheck")[j].value;
    batasP[j] = parseInt(document.getElementsByClassName("batasP")[j].innerHTML.substring(0,2));
    selisih[j] =  moment.duration(moment(time[j], 'hh:mm').diff(nowTime)).asMinutes();
  }
  
  // console.log(statusCheck);
//   window.onload = function blink(){
//   var f = document.getElementById('hasil');
//    console.log(f);
//    setInterval(function() {
//       f.style.backgroundColor = (f.style.backgroundColor == 'red' ? '' : 'red');
//    }, 1000);
// }
  // console.log(row);
  // console.log(time);
  // console.log(selisih);
  // console.log(batasP);
  console.log(hari);
  var f = [];
  var cJumlah = 0;
  for (var i = 0; i < row.length; i++) {
    console.log(selisih[i]*(-1));

    if ((selisih[i]*(-1)) > batasP[i] && statusCheck[i] == "0" && hari[i] == hariSekarang) {
      // cJumlah++;
      // console.log((selisih[i]*(-1)) +" > "+batasP[i]);
      // row[i].style.backgroundColor = "red";
      // window.onload = function blink(){
      // setInterval(function() {
      // blink.style.backgroundColor = (blink.style.backgroundColor == 'green' ? '' : 'green');
      // }, 1000);}

      // window.onload = function blink(){
      //   var f = document.getElementById('hasilku');
      //    console.log(f);
      //    setInterval(function() {
      //       f.style.backgroundColor = (f.style.backgroundColor == 'red' ? '' : 'red');
      //    }, 1000);
      // }

      f[i] = document.getElementsByClassName('hasilku')[i];

       console.log(f[i]);
       (function(i){
        interval = setInterval(function() {
          f[i].style.backgroundColor = (f[i].style.backgroundColor == 'tomato' ? '' : 'tomato');
       }, 1000); 
       })(i)
    }
  }
  console.log(cJumlah);
    
  }//Akhir Method Reload Checklist

  reloadChecklist();
  setInterval(function(){
     clearInterval(interval);
     reloadChecklist();
  },60000);

</script>


  <script>
    var table = '#mytable'
    $('#maxRows').on('change', function(){
        $('.pagination').html('')
        var trnum = 0
        var maxRows = parseInt($(this).val())
        var totalRows = $(table+' tbody tr').length
        $(table+' tr:gt(0)').each(function(){
            trnum++
            if(trnum > maxRows){
                $(this).hide()
            }
            if(trnum <= maxRows){
                $(this).show()
            }
        })
        if(totalRows > maxRows){
            var pagenum = Math.ceil(totalRows/maxRows)
            for(var i=1;i<=pagenum;){
                $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
            }
        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click',function(){
            var pageNum = $(this).attr('data-page')
            var trIndex = 0;
            $('.pagination li').removeClass('active')
            $(this).addClass('active')
            $(table+' tr:gt(0)').each(function(){
                trIndex++
                if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                    $(this).hide()
                } else{
                    $(this).show()
                }
            })
        })
    })
    </script>




    
