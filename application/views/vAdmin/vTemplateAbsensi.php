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
          Template Absensi PIC 
        </h3>
          <?php if ($_SESSION['nama'] == 'admin'): ?>   
            <a class="ui right floated tiny blue icon button" data-tooltip="Tambah Template Absensi" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahtemplateabsensi'); ?>">
              <i class="add icon"></i>
            </a>
          <?php endif ?>
      </div>

      <div class="ui divider"></div>

      <table class="ui sortable compact celled definition table" id="example">
        <thead class="full-width" style="text-align: center; background-color: #dbedff">
          <tr>
            <th class="sorted ascending">NIK</th>
            <th class="">Nama PIC</th>
            <th class="">Shift</th>
            <th class="">Jam</th>
            <th class="">Hari</th>
            
             <?php if ($_SESSION['nama'] == 'admin'): ?>
            <th class="">Edit</th>
            <th class="">Hapus</th>
            <?php endif ?>
          </tr>
        </thead>
        <form method="POST" action="<?php echo site_url('admin/gantiabsensi'); ?>">
          <tbody id="hasil">
            <?php $i = 0; ?>
            <?php $jumlah = count($absensi); ?>
            <input type="hidden" name="jumlahAbsensi" value="<?php echo $jumlah ?>"> 
            <?php foreach ($absensi as $absensi) { ?>
            <?php if ($absensi['Status'] == 'Enabled' ) { ?>
            <input type="hidden" name="<?php echo 'NIKSebenarnya'.$i; ?>" value ="<?php echo $absensi['NIK'] ?>">
            <input type="hidden" name="<?php echo 'IDHarian'.$i; ?>" value ="<?php echo $absensi['IDHarian']; ?>">
            <tr>
              <td><?php echo $absensi['NIK'] ?></td>
              <td><?php echo $absensi['NamaPIC'] ?></td>
              <td><?php echo $absensi['Shift'] ?></td>
              <td><?php echo $absensi['Jam'] ?></td>
              <td><?php echo $absensi['Hari'] ?></td>
              
            <?php if ($_SESSION['nama'] == 'admin'): ?>
            <td>
       <!--  <form method="GET" action="<?php echo base_url('admin/editpic'); ?> ">
            <input type="hidden" name="NIK" value="<?php echo $pic[$i]['NIK'] ?>">
            <button class="ui small blue button">
              <i class="edit icon"></i>Edit
            </button>
          </form> -->

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
  // console.log(d);
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