
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
  <!-- <div class= "ui field">
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
                  </div> -->

                  <div class="field" style="margin-left: 80%; margin-top: 5px; position: relative; display: flex;" >
                    <select class="ui right selection tiny dropdown item" id="hari" style="margin-left: 80%;display: flex;position: relative;">
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
                        <th >Instruksi Pengerjaan</th>
                        <th >Check</th>

                      </tr>
                    </thead>
                    <tbody style="text-align: center;" id="hasil">
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
              else if ($checklist['StatusCheck'] == '2'){
                echo '<tr style="background-color: tomato" class="hasilku">';
              }
              else{
                echo '<tr class="hasilku">';
              }
            }
          }
          ?>

          <td><?php echo $nomor[$temp] ; $no = $no+1;?></td>
          <td class="hari"><?php echo $checklist['Hari']; ?></td>
          <input type="hidden"  class="statusCheck" value="<?php echo $checklist['StatusCheck'] ?>">
          <input class="idChecklist" type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist'] ?>">
          <input class="info" type="hidden" name="Info" value="<?php echo $checklist['Info'] ?>">
          <td class="time"><?php echo $checklist['Jam']; ?></td>
          <td class="batasP"><?php echo $checklist['BatasPengecekan'] ?> Menit</td>
          <td class="namaChecklist"><?php echo $checklist['NamaChecklist']; ?></td>
          <td class="namaPIC">
            <?php if($checklist['NIKP'] == 0){ ?>
            <?php echo $checklist['NamaPIC']; ?>
            <?php } else { ?>
            <?php echo $picPengganti[$temp]['NamaP'] ?>
            <?php } ?>
          </td> 
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
              <h3>Instruksi Pengerjaan</h3>
              <div class="ui segment">
               <?php foreach ($nInfo as $info) {
                echo '<p>'.$info.'</p>';
              } ?> 
            </div>
          </div>
        </div>
      </td>

      <?php if ($checklist['NamaPIC'] == $_SESSION['NamaPIC'] AND $checklist['StatusCheck'] == '0' AND $checklist['Hari'] == $hari) {?>
      <td class="docheck">
        <a href="#" data-featherlight="<?php echo '#tampilKet'.$temp ?>">Check</a>
        <div style="display:none;">
          <div id="<?php echo 'tampilKet'.$temp ?>">

            <form method="POST" action="<?php echo site_url('pic/docheck'); ?>">  
              <input type="hidden" name="NIK" value="<?php echo $_SESSION['nik'] ?>">
              <input class="idChecklist" type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist'] ?>">
              <input type="hidden" name="NamaPIC" value="<?php echo $checklist['NamaPIC'] ?>">
              <input type="hidden" name="NamaChecklist" value="<?php echo $checklist['NamaChecklist'] ?>">
              <input type="hidden" name="NamaPICSebenarnya" value="<?php echo $_SESSION['NamaPIC'] ?>">
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

    <td class="docheck">
      <a href="#" data-featherlight="<?php echo '#tampilKet'.$temp ?>">Check</a>
      <div style="display:none;">
        <div id="<?php echo 'tampilKet'.$temp ?>">


          <form method="POST" action="<?php echo site_url('pic/docheck'); ?>">  
<!-- =======
          <form method="POST" class="form-check">  
>>>>>>> 4b49ef8f7a665d1e569992dbf4b76f3fa973194e -->
            <input type="hidden" name="NIK" value="<?php echo $_SESSION['nik'] ?>">
            <input class="idChecklist" type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist'] ?>">
            <input type="hidden" name="NamaPIC" value="<?php echo $checklist['NamaPIC'] ?>">
            <input type="hidden" name="NamaChecklist" value="<?php echo $checklist['NamaChecklist'] ?>">
            <input type="hidden" name="NamaPICSebenarnya" value="<?php echo $_SESSION['NamaPIC'] ?>">
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
            <h3>Bukti Pengecekan (Screenshot)</h3>
            <div class="ui form">
              <div class="field">
              <input type="file" name="buktiCek" id="fileToUpload">
              </div>
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
  <?php } else { ?>
    <td class="docheck"></td>
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
  <!-- <div class="pagination-container">
            <nav>
                <ul class="pagination"></ul>
            </nav>
          </div> -->

        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <script type="text/javascript">

      var interval = setInterval(myTimer,1000);

      function myTimer(){

        $.getJSON("<?php echo site_url('pic/jChecklist') ?>", function(result){
          $.each(result, function(i, field){
            document.getElementsByClassName("statusCheck")[i].value = field['StatusCheck'];
          });
        });

        var d = new moment.locale();
        console.log(d);
        var nowTime = moment();
        var nowDay = moment().format('dddd');
        var checkTime = moment('13:00', 'hh:mm');
        var duration = moment.duration(checkTime.diff(nowTime));

        // console.log('now time', nowTime);
        // console.log('now day', nowDay);
        // console.log('check time', checkTime);
        // console.log('duration in hours', duration.asHours());
        // console.log('duration in minutes', duration.asMinutes());
        // console.log(moment().format());

        var row = document.querySelectorAll("table#mytable>tbody#hasil>tr");
        var time = [];
        var namaChecklist = [];
        var idChecklist = [];
        var namaPIC = [];
        var info = [];
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
          namaChecklist[j] =  document.getElementsByClassName("namaChecklist")[j].innerHTML;
          hari[j] =  document.getElementsByClassName("hari")[j].innerHTML;
          statusCheck[j] = document.getElementsByClassName("statusCheck")[j].value;
          idChecklist[j] = document.getElementsByClassName("idChecklist")[j].value;
          namaPIC[j] =  document.getElementsByClassName("namaPIC")[j].innerHTML;
          info[j] = document.getElementsByClassName("info")[j].value;
          batasP[j] = parseInt(document.getElementsByClassName("batasP")[j].innerHTML.substring(0,2));
          selisih[j] =  moment.duration(moment(time[j], 'hh:mm').diff(nowTime)).asMinutes();


        }

  // console.log(row);
  // console.log(time);
  // console.log(selisih);
  // console.log(batasP);
  // console.log(hari);
  var f = [];
  var cJumlah = 0;


  for (var i = 0; i < row.length; i++) {
    if (hari[i] == hariSekarang) {
      jHariS = i+1;
    }
  }
  console.log(jHariS);

  // for (var i = 0; i < row.length; i++) {

  //   if((selisih[i]*(-1)) > 0 && (selisih[i]*(-1)) < batasP[i] && statusCheck[i] == "0" && hari[i] == hariSekarang){

  //     f[i] = document.getElementsByClassName('hasilku')[i];
  //     f[i].style.backgroundColor = (f[i].style.backgroundColor == 'mediumseagreen' ? '' : 'mediumseagreen');
  //   }

  //   else if ((selisih[i]*(-1)) > batasP[i] && statusCheck[i] == "0" && hari[i] == hariSekarang) {
  //     f[i] = document.getElementsByClassName('hasilku')[i];
  //     f[i].style.backgroundColor = (f[i].style.backgroundColor == 'gold' ? '' : 'gold');
  //   }
  // }


  // for (var j = 0; j < row.length; j++) {
  //   if (hari[j] == hariSekarang) {
  //     console.log(j);
  //     for (var k = j+1; k < jHariS; k++) {
  //       f[j] = document.getElementsByClassName('hasilku')[j];
  //       f[k] = document.getElementsByClassName('hasilku')[k];
  //       console.log(hari[j]+" :: "+time[j]+" - "+f[j].style.backgroundColor+" - "+ namaChecklist[j]+" == "+hari[k]+" :: "+time[k]+" - "+ namaChecklist[k]+" - "+ f[k].style.backgroundColor);
  //       // console.log(f[j].style.backgroundColor);
  //       if (namaChecklist[j] == namaChecklist[k] && statusCheck[j] == "0" && (f[k].style.backgroundColor == 'gold' ||f[k].style.backgroundColor == 'mediumseagreen')) {
  //         f[j].style.backgroundColor = 'tomato';
  //         console.log('Ubah Warna Menjadi merah');
  //         // $.post("<?php echo site_url('pic/nocheck'); ?>",
  //         // {
  //         //   statusCheck : statusCheck[j],
  //         //   IDChecklist: idChecklist[j],
  //         //   NamaChecklist: namaChecklist[j],
  //         //   Jam : time[j],
  //         //   Info : info[j],
  //         //   Hari : hari[j],
  //         // }
  //         // );
  //       }
  //     } 
  //   }
  // }
  for (var j = 0; j < row.length; j++) {
    f[j] = document.getElementsByClassName('hasilku')[j];
    console.log(j);
    console.log(f[j].style.backgroundColor);


    if (hari[j] == hariSekarang && (selisih[j]*(-1)) < 0) {
      document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
    }
    else{
       // document.getElementsByClassName("docheck")[j].innerHTML = 
       // '<a href="#" data-featherlight="<?php echo '#tampilKet'.$temp ?>">Check</a>'+
       // '<div style="display:none;">'+
       // '<div id="<?php echo 'tampilKet'.$temp ?>">'+
       // '<form method="POST" class="form-check"> '+
       // '<input type="hidden" name="NIK" value="<?php echo $_SESSION['nik'] ?>">'+
       // '<input class="idChecklist" type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist'] ?>">'+
       // '<input type="hidden" name="NamaPIC" value="<?php echo $checklist['NamaPIC'] ?>">'+
       // '<input type="hidden" name="NamaChecklist" value="<?php echo $checklist['NamaChecklist'] ?>">'+
       // '<input type="hidden" name="NamaPICSebenarnya" value="<?php echo $_SESSION['NamaPIC'] ?>">'+
       // '<input type="hidden" name="Jam" value="<?php echo $checklist['Jam'] ?>">'+
       // '<input type="hidden" name="Info" value="<?php echo $checklist['Info'] ?>">'+
       // '<input type="hidden" name="Hari" value="<?php echo $checklist['Hari'] ?>">'+
       // '<h3>Status</h3>'+
       // ' <div class="ui form">'+
       // '<select name="Status">'+
       // '<option value="OK">OK</option>'+
       // '<option value="Bad">Bad</option>'+
       // ' </select>'+
       // '</div>'+
       // '<h3>Keterangan</h3>'+
       // '<div class="ui form">'+
       // '<div class="field">'+
       // '<textarea name="Keterangan"></textarea>'+
       // '</div>'+
       // '</div>'+
       // '<a class="tSimpan ui right floated blue small button"><i class="save icon" target="<?php echo $temp; ?> " ></i>Simpan</a>'+
       // '</form>'+
       // '</div>'+
       // '</div>';
    }
    
    if (hari[j] == hariSekarang && statusCheck[j] == "0") { // 2
      console.log(j);
      console.log("Status cek nya : " +statusCheck[j]);
      
      if((selisih[j]*(-1)) > 0 && (selisih[j]*(-1)) < batasP[j] ){ // 2A
        f[j].style.backgroundColor = (f[j].style.backgroundColor == 'mediumseagreen' ? '' : 'mediumseagreen');
      }

      else if ((selisih[j]*(-1)) > batasP[j]) {
        f[j].style.backgroundColor = (f[j].style.backgroundColor == 'gold' ? '' : 'gold');
      }

      for (var k = j+1; k < jHariS; k++) {
        if (namaChecklist[j] == namaChecklist[k] && (selisih[k]*-1)>0 &&f[j].style.backgroundColor != 'tomato') {
          // console.log(time[k] +" = "+ (selisih[k]*-1));
          console.log("Awalanya colornya : " +f[j].style.backgroundColor)
          f[j].style.backgroundColor = 'tomato';
          console.log(hari[j]+" :: "+time[j]+" - "+ namaChecklist[j]+" == "+hari[k]+" :: "+time[k]+" - "+ namaChecklist[k]+" MAKA UBAH JADI "+ f[j].style.backgroundColor);

          if (f[j].style.backgroundColor == 'tomato') {
            console.log("Kalau warnanya tomato maka kirim ke tabel log dan status check ganti 2");
            document.getElementsByClassName("statusCheck")[j].value = "2";
            document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
            console.log("Status Check akhir : " + document.getElementsByClassName("statusCheck")[j].value);

            $.post("<?php echo site_url('pic/nocheck'); ?>",
            {
              statusCheck : statusCheck[j],
              IDChecklist: idChecklist[j],
              NamaChecklist: namaChecklist[j],
              NamaPIC : namaPIC[j],
              Jam : time[j],
              Info : info[j],
              Hari : hari[j],
            }
            );
          }
        }

      }
    } 
    else if(hari[j] == hariSekarang && statusCheck[j] == "2"){
      document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
    }
    else if(hari[j] == hariSekarang && statusCheck[j] == "1"){
      document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
      f[j].style.backgroundColor = '#AFEEEE';
    }
    else if(hari[j] != hariSekarang){
      document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
    }
  }

  }//Akhir Method myTimer

  

</script>


  <!-- <script>
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
  </script> -->





