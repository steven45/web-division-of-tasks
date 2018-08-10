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

          <a class="ui right floated tiny blue icon button" data-tooltip="Tambah Checklist" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahchecklist'); ?>">
            <i class="add icon"></i>
          </a>
          
        </div>
        <form method="POST" action="<?php echo site_url('admin/gantichecklist'); ?>">    
          <div class="ui divider"></div>
          <div class="field" style="margin-left: 85%">
            <select class="ui right selection tiny dropdown item" id="hari">  
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

          <table class="ui sortable celled table"  id="mytable">
            <thead>
              <tr style="text-align: center">
                <th class="sorted ascending">No</th>
                <th>Hari</th>
                <th>Jadwal</th>
                <th>Batas Waktu</th>
                <th style="width: 300px;" >Nama Checklist</th>
                <th>Nama PIC</th>
                <th >Instruksi Pengerjaan</th>
                <th>Edit</th>
                <th>
                  <div class="ui simple dropdown item" style="color: black;">
                    Status
                    <i class="dropdown icon"></i>
                    <div class="menu">
                      <a class="item" href="<?php echo site_url('admin/checklist/Enabled') ?>">Enable</a>
                      <a class="item" href="<?php echo site_url('admin/checklist/Disabled') ?>">Disable</a>
                    </div>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody id="hasil">
              <?php $temp = 0; $no = 1; ?>
              <input type="hidden" name="nJumlah" value="<?php echo count($checklist); ?>">
              <?php foreach ($checklist as $checklist) { ?>
              <input type="hidden" name="<?php echo 'IDChecklist'.$temp ?>" value="<?php echo $checklist['IDChecklist']; ?>">

              <?php  
              if ($checklist['Status'] == $status) {
                if ($checklist['StatusCheck'] == '1') {
                  echo '<tr style="background-color: #75e2f2; text-align:center;" class="hasilku">';
                }
                else{
                  echo '<tr style="text-align:center;" class="hasilku">';
                }

                ?>
                <td> <?php echo $nomor[$temp] ; $no = $no+1;?> </td>
                <td class="hari"><?php echo $checklist['Hari']; ?></td>
                <td class="time"><?php echo $checklist['Jam']; ?></td>
                <td class="batasP"><?php echo $checklist['BatasPengecekan'] ?> Menit</td>
                <td class="namaChecklist"><?php echo $checklist['NamaChecklist']; ?></td>
                <td>
                  <?php if ($checklist['StatusCheck'] != '1') { ?>
                  <select class="ui search dropdown" name="<?php echo 'NIK'.$temp ?>">
                    <?php if($checklist['NIKP'] == 0){ ?>
                    <option value="<?php echo $checklist['NIK']; ?>"><?php echo $checklist['NamaPIC']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $picPengganti[$temp]['NamaP'] ?>"><?php echo $picPengganti[$temp]['NamaP'] ?></option>
                    <?php } ?>
                    <?php for ($i=0; $i < count($pic[$checklist['Hari']][$checklist['Jam']]) ;$i++) { ?>
                    <option value="<?php echo $pic[$checklist['Hari']][$checklist['Jam']][$i]['NIK'] ?>"><?php echo $pic[$checklist['Hari']][$checklist['Jam']][$i]['NamaPIC']; ?></option>
                    <?php } ?>
                  </select>
                  <?php } else { ?>
                  <input type="hidden" name="<?php echo 'NIK'.$temp ?>" value="<?php echo $checklist['NIK']; ?>">
                  <p>
                    <?php if($checklist['NIKP'] == 0){ ?>
                      <?php echo $checklist['NamaPIC']; ?>
                    <?php } else { ?>
                      <?php echo $picPengganti[$temp]['NamaP'] ?>
                    <?php } ?>
                  </p>
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

              <td>
                <a class="ui basic blue small button" href="<?php echo site_url('admin/editchecklist/'.$checklist['IDChecklist']); ?>">
                  <i class="icon edit"></i>
                  Edit
                </a>
              </td>
              <td>
                <select class="ui selection tiny dropdown" name="<?php echo 'Status'.$temp ?>">
                  <?php if ($status == "Enabled") { ?>
                  <option value="<?php echo $checklist['Status']; ?>"><?php echo $checklist['Status']; ?></option>
                  <option value="Disabled">Disabled</option>
                  <?php } ?>
                  <?php if ($status == "Disabled") { ?>
                  <option value="<?php echo $checklist['Status']; ?>"><?php echo $checklist['Status']; ?></option>
                  <option value="Enabled">Enabled</option>
                  <?php } ?>
                </select>
              </td>
            </tr> 

            <?php $temp = $temp + 1; ?>
            <?php } ?>
            <?php } ?>
          </tbody>
          <tfoot>
            <th colspan="9">
              <button class="ui right floated blue small button" >
                <i class="save icon"></i>Simpan
              </button>
            </th>
          </tfoot>
        </table>
      </form>
    </div>
  </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <script type="text/javascript">

      var interval = setInterval(myTimer,1000);

      function myTimer(){
        var d = new moment.locale();
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
        // console.log(row);
        var time = [];
        var namaChecklist = [];
        var idChecklist = [];
        var namaPIC = [];
        var info = [];
        var selisih = [];
        var batasP = [];
        // var statusCheck = [];
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
        // console.log(x);
        for(var j = 0; j < x.length; j++){
          time[j] =  document.getElementsByClassName("time")[j].innerHTML;
          // console.log(time[j]);
          // namaChecklist[j] =  document.getElementsByClassName("namaChecklist")[j].innerHTML;
          hari[j] =  document.getElementsByClassName("hari")[j].innerHTML;
          // // statusCheck[j] = document.getElementsByClassName("statusCheck")[j].value;
          // // idChecklist[j] = document.getElementsByClassName("idChecklist")[j].value;
          // namaPIC[j] =  document.getElementsByClassName("namaPIC")[j].innerHTML;
          // // info[j] = document.getElementsByClassName("info")[j].value;
          batasP[j] = parseInt(document.getElementsByClassName("batasP")[j].innerHTML.substring(0,2));
          selisih[j] =  moment.duration(moment(time[j], 'hh:mm').diff(nowTime)).asMinutes();


        }

  // console.log(row);
  // console.log(time);
  // console.log(selisih);
  // console.log(batasP);
  // console.log(hari);
  var f = [];
  // var cJumlah = 0;


  // for (var i = 0; i < row.length; i++) {
  //   if (hari[i] == hariSekarang) {
  //     jHariS = i+1;
  //   }
  // }
  // console.log(jHariS);

  for (var i = 0; i < row.length; i++) {

    if((selisih[i]*(-1)) > 0 && (selisih[i]*(-1)) < batasP[i] && hari[i] == hariSekarang){

      f[i] = document.getElementsByClassName('hasilku')[i];
      f[i].style.backgroundColor = (f[i].style.backgroundColor == 'mediumseagreen' ? '' : 'mediumseagreen');
    }

    else if ((selisih[i]*(-1)) > batasP[i] && hari[i] == hariSekarang) {
      f[i] = document.getElementsByClassName('hasilku')[i];
      f[i].style.backgroundColor = (f[i].style.backgroundColor == 'gold' ? '' : 'gold');
    }
  }


  // // for (var j = 0; j < row.length; j++) {
  // //   if (hari[j] == hariSekarang) {
  // //     console.log(j);
  // //     for (var k = j+1; k < jHariS; k++) {
  // //       f[j] = document.getElementsByClassName('hasilku')[j];
  // //       f[k] = document.getElementsByClassName('hasilku')[k];
  // //       console.log(hari[j]+" :: "+time[j]+" - "+f[j].style.backgroundColor+" - "+ namaChecklist[j]+" == "+hari[k]+" :: "+time[k]+" - "+ namaChecklist[k]+" - "+ f[k].style.backgroundColor);
  // //       // console.log(f[j].style.backgroundColor);
  // //       if (namaChecklist[j] == namaChecklist[k] && statusCheck[j] == "0" && (f[k].style.backgroundColor == 'gold' ||f[k].style.backgroundColor == 'mediumseagreen')) {
  // //         f[j].style.backgroundColor = 'tomato';
  // //         console.log('Ubah Warna Menjadi merah');
  // //         // $.post("<?php echo site_url('pic/nocheck'); ?>",
  // //         // {
  // //         //   statusCheck : statusCheck[j],
  // //         //   IDChecklist: idChecklist[j],
  // //         //   NamaChecklist: namaChecklist[j],
  // //         //   Jam : time[j],
  // //         //   Info : info[j],
  // //         //   Hari : hari[j],
  // //         // }
  // //         // );
  // //       }
  // //     } 
  // //   }
  // // }
  // for (var j = 0; j < row.length; j++) {
  //   f[j] = document.getElementsByClassName('hasilku')[j];
  //   console.log(j);
  //   console.log(f[j].style.backgroundColor);

  //   if (hari[j] == hariSekarang ) {
  //     console.log("Status cek nya : " +statusCheck[j]);
  //     if((selisih[j]*(-1)) > 0 && (selisih[j]*(-1)) < batasP[j] ){
  //       f[j].style.backgroundColor = (f[j].style.backgroundColor == 'mediumseagreen' ? '' : 'mediumseagreen');
  //     }

  //     else if ((selisih[j]*(-1)) > batasP[j]) {
  //       f[j].style.backgroundColor = (f[j].style.backgroundColor == 'gold' ? '' : 'gold');
  //     }

  //     for (var k = j+1; k < jHariS; k++) {
  //       if (namaChecklist[j] == namaChecklist[k] && (selisih[k]*-1)>0 &&f[j].style.backgroundColor != 'tomato') {
  //         // console.log(time[k] +" = "+ (selisih[k]*-1));
  //         console.log("Awalanya colornya : " +f[j].style.backgroundColor)
  //         f[j].style.backgroundColor = 'tomato';
  //         console.log(hari[j]+" :: "+time[j]+" - "+ namaChecklist[j]+" == "+hari[k]+" :: "+time[k]+" - "+ namaChecklist[k]+" MAKA UBAH JADI "+ f[j].style.backgroundColor);

  //         if (f[j].style.backgroundColor == 'tomato') {
  //           console.log("Kalau warnanya tomato maka kirim ke tabel log dan status check ganti 2");
  //           // document.getElementsByClassName("statusCheck")[j].value = "2";
  //           // document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
  //           // console.log("Status Check akhir : " + document.getElementsByClassName("statusCheck")[j].value);

  //           // $.post("<?php echo site_url('pic/nocheck'); ?>",
  //           // {
  //           //   statusCheck : statusCheck[j],
  //           //   IDChecklist: idChecklist[j],
  //           //   NamaChecklist: namaChecklist[j],
  //           //   Jam : time[j],
  //           //   Info : info[j],
  //           //   Hari : hari[j],
  //           // }
  //           // );
  //         }
  //       }

  //     }
  //   } 
  //   // else if(hari[j] == hariSekarang && statusCheck[j] == "2"){
  //   //   document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
  //   // }
  //   // else if(hari[j] == hariSekarang && statusCheck[j] == "1"){
  //   //   document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
  //   // }
  //   // else if(hari[j] != hariSekarang){
  //   //   document.getElementsByClassName("docheck")[j].innerHTML ="Disabled";
  //   // }
  // }

  }//Akhir Method myTimer


</script>