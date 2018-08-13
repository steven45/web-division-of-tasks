<script>
$(document).ready(function(){
  $("#template").click(function(){
    $('.tiny.modal').modal('show');
  });
});
</script>

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
          <i class="user icon"></i>
          Absensi PIC 
        </h3>
          <?php if ($_SESSION['nama'] == 'admin'): ?>
          <a class="ui right floated basic blue button" id="template" data-tooltip="Input Sesuai template" data-inverted="" data-position="top right" style="margin-top: -42px; margin-right: 40px;"><i class="calendar plus alternate icon"></i>Input Sesuai Template</a>
          
          <div class="ui tiny modal">
              <div class="header">Input Tanggal</div>
              <div class="content">
                <p>
                  <form method="POST" action="<?php echo site_url('admin/ikuttemplate'); ?>">
                  <div class="ui input left icon">
                      <i class="calendar icon"></i>
                      <input type="date" value="<?php echo date('20y-m-d'); ?>" name="date0">
                  </div>
                  -
                  <div class="ui input left icon">
                      <i class="calendar icon"></i>
                      <input type="date" value="<?php echo date('20y-m-d'); ?>" name="date1">
                  </div>
                  <br>
                  <br>
                  <button class="ui blue button">Input Tanggal</button>
                </form>
                </p>
                
              </div>
            </div>   
            <a class="ui right floated tiny blue icon button" data-tooltip="Tambah Absensi PIC" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahabsensi'); ?>">
              <i class="add icon"></i>
            </a>
          <?php endif ?>
      </div>
      <div class="ui divider"></div>
      <form method="POST" action="<?php echo site_url('admin/absensi'); ?>">
        <div class="ui calendar" style="right: 0px;">
          <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="date" value="<?php echo $tanggal ?>" id="kalender" name="tanggal">
          </div>
        </div>
        <button class="ui right floated tiny grey basic icon button" data-tooltip="Cari Jadwal Checklist" data-inverted="" data-position="top right" style="margin-top: -37px">
            <i class="search icon"></i>
        </button>
      </form>
      <form method="POST" action="<?php echo site_url('admin/gantiabsensi'); ?>">
      <table class="ui sortable compact celled definition table">
        <thead class="full-width" style="text-align: center; background-color: #dbedff">
          <tr>
            <th class="sorted ascending">NIK</th>
            <th class="">Nama PIC</th>
            <th class="">Shift</th>
            <th class="">Jam</th>
            <th class="">Hari</th>
            <th class="">Kehadiran</th>
            <th class="">Pengganti</th>
             <?php if ($_SESSION['nama'] == 'admin'): ?>
            <th class="">Edit</th>
            <th class="">Hapus</th>
            <?php endif ?>
          </tr>
        </thead>
          <tbody >
            <?php $i = 0; ?>
            <?php $jumlah = count($absensi); ?>
            <input type="hidden" name="jumlahAbsensi" value="<?php echo $jumlah ?>"> 
            <?php foreach ($absensi as $absensi) { ?>
            <?php if ($absensi['Status'] == 'Enabled' ) { ?>
            <input type="hidden" name="<?php echo 'NIKSebenarnya'.$i; ?>" value ="<?php echo $absensi['NIK'] ?>">
            <input type="hidden" name="<?php echo 'IDHarian'.$i; ?>" value ="<?php echo $absensi['IDHarian']; ?>">
            <input type="hidden" name="<?php echo 'Hari'.$i; ?>" value ="<?php echo $absensi['Hari']; ?>">
            <tr id="<?php echo 'hasilAbs'. $i; ?>">
              <td><?php echo $absensi['NIK'] ?></td>
              <td><?php echo $absensi['NamaPIC'] ?></td>
              <td><?php echo $absensi['Shift'] ?></td>
              <td><?php echo $absensi['Jam'] ?></td>
              <td><?php echo $absensi['Hari'] ?> <input target="<?php echo $i; ?>" type="hidden" class="hasilAbsensi" value="<?php $tanggal = explode(' ',$absensi['Hari']); echo $tanggal[1]?>"></td>
              <td class="absensi">

                <select class="<?php echo "hadir".$i ?>" target="<?php echo $i ?>" name="<?php echo 'Kehadiran'.$i ?>" style="min-width: 10em; cursor: pointer;
                word-wrap: break-word;
                line-height: 1em;
                white-space: normal;
                outline: 0;
                -webkit-transform: rotateZ(0deg);
                transform: rotateZ(0deg);
                min-width: 14em;
                min-height: 2.71428571em;
                background: #FFFFFF;
                display: inline-block;
                padding: 0.78571429em 2.1em 0.78571429em 1em;
                color: rgba(0, 0, 0, 0.87);
                -webkit-box-shadow: none;
                box-shadow: none;
                border: 1px solid rgba(34, 36, 38, 0.15);
                border-radius: 0.28571429rem;
                -webkit-transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
                transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
                transition: box-shadow 0.1s ease, width 0.1s ease;
                transition: box-shadow 0.1s ease, width 0.1s ease, -webkit-box-shadow 0.1s ease;">
                <?php if ($absensi['Kehadiran'] == "Hadir") { ?>
                <option value="<?php echo $absensi['Kehadiran']; ?>"><?php echo $absensi['Kehadiran']; ?></option>
                <option value="Tidak Hadir">Tidak Hadir</option>
                <?php } else if ($absensi['Kehadiran'] == "Tidak Hadir") { ?>
                <option value="Tidak Hadir"><?php echo $absensi['Kehadiran']; ?></option>
                <option value="Hadir">Hadir</option>
                <?php } ?>
              </select>
            </td>
            <td>
              <select name="<?php echo 'NIKPengganti'.$i ?>" class="pengganti" id="<?php echo 'select'.$i ?>" style="min-width: 10em; cursor: pointer;
              word-wrap: break-word;
              line-height: 1em;
              white-space: normal;
              outline: 0;
              -webkit-transform: rotateZ(0deg);
              transform: rotateZ(0deg);
              min-width: 14em;
              min-height: 2.71428571em;
              background: #FFFFFF;
              display: inline-block;
              padding: 0.78571429em 2.1em 0.78571429em 1em;
              color: rgba(0, 0, 0, 0.87);
              -webkit-box-shadow: none;
              box-shadow: none;
              border: 1px solid rgba(34, 36, 38, 0.15);
              border-radius: 0.28571429rem;
              -webkit-transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
              transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
              transition: box-shadow 0.1s ease, width 0.1s ease;
              transition: box-shadow 0.1s ease, width 0.1s ease, -webkit-box-shadow 0.1s ease;">
              <?php foreach ($picPengganti as $pic ) {?>
                <?php if ($pic['NIK'] != $absensi['NIK']) { ?>
                  <option value="<?php echo $pic['NIK'] ?>"><?php echo $pic['NamaPIC'] ?></option>
                <?php } ?>
              <?php } ?>
              </select>
            </td>
            <?php if ($_SESSION['nama'] == 'admin'): ?>
            <td>
          <?php $edit = 'admin/editabsensi/'.$absensi['IDHarian'] ?>
          <a href="<?php echo site_url($edit) ;?>" class="ui basic small blue button">
            <i class="icon edit"></i>
            Edit
          </a>
        </td>
        <?php endif ?>

        <?php if ($_SESSION['nama'] == 'admin'): ?>
        <td>
          <a href="<?php echo site_url("admin/hapusabsensi/".$absensi['IDHarian']) ;?>" class="ui basic small red button" onClick="return confirm('Apa anda yakin ingin menghapus absensi? ?');">
            <i class="icon trash"></i>
            Hapus
          </a>
        </td>
        <?php endif ?>
        
      </tr>
      <?php } ?>
      <?php $i = $i+1; ?>
      <?php } ?>
    </tbody>
    <tfoot class="full-width">
      <tr>
        <th colspan="9">
          <button class="ui right floated blue small button" style="margin-top: 5px;">
            <i class="save icon"></i>Simpan
          </button>
        </th>
      </tr>
    </tfoot>
  </form>
</table>
<br><br>
</div>
</div>
</div>

<script>
  jQuery(function() {
    jQuery('.pengganti').hide();
    var d = document.getElementsByClassName("absensi").length;
    for (var i = 0; i < d; i++){
      console.log(i +" = "+ $('.hadir'+i).val());
      if($('.hadir'+i).val() == "Tidak Hadir"){
        jQuery('#select' + $('.hadir'+i).attr('target')).show();
      }
      jQuery('.hadir'+i).change(function() {
        jQuery('#select' + $(this).attr('target')).toggle();
      });
    }
  });
</script>

<!-- Filter Per Tanggal -->
<!-- <script type="text/javascript">
  kalender =  $('#kalender').val();
  $(".hasilAbsensi").filter(function() {
      $('#hasilAbs'+ $(this).attr('target')).toggle($(this).val().indexOf(kalender) > -1);
  });
  $('#kalender').on("change",function(){
    kalender =  $('#kalender').val();
    $(".hasilAbsensi").filter(function() {
      $('#hasilAbs'+ $(this).attr('target')).toggle($(this).val().indexOf(kalender) > -1);
    });
  }); 
</script>  -->