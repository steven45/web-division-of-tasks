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
      <a class="ui right floated tiny blue icon button" data-tooltip="Tambah Absensi PIC" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahabsensi'); ?>">
          <i class="add icon"></i>
        </a>
    </div>

      <div class="ui divider"></div>

<table class="ui sortable compact celled definition grey inverted table" id="example">
  <thead class="full-width" style="text-align: center; background-color: #35373c">
    <tr>
      <th class="sorted ascending">NIK</th>
      <th class="">Nama PIC</th>
      <th class="">Shift</th>
      <th class="">Jam</th>
      <th class="">Hari</th>
      <th class="">Kehadiran</th>
      <th class="">Edit</th>
      <th class="">Hapus</th>
    </tr>
  </thead>
  <form method="POST" action="<?php echo site_url('admin/gantiabsensi'); ?>">
  <tbody id="hasil">
    <?php $i = 0; ?>
    <?php $jumlah = count($absensi); ?>
    <input type="hidden" name="jumlahAbsensi" value="<?php echo $jumlah ?>"> 
    <?php foreach ($absensi as $absensi) { ?>
    <?php if ($absensi['Status'] == 'Enabled') { ?>
    <input type="hidden" name="<?php echo 'IDHarian'.$i; ?>" value ="<?php echo $absensi['IDHarian']; ?>">
    <tr>
      <td><?php echo $absensi['NIK'] ?></td>
      <td><?php echo $absensi['NamaPIC'] ?></td>
      <td><?php echo $absensi['Shift'] ?></td>
      <td><?php echo $absensi['Jam'] ?></td>
      <td><?php echo $absensi['Hari'] ?></td>
      <td>
          <select style="min-width: 10em;" name="<?php echo 'Kehadiran'.$i ?>">
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
       <!--  <form method="GET" action="<?php echo base_url('admin/editpic'); ?> ">
            <input type="hidden" name="NIK" value="<?php echo $pic[$i]['NIK'] ?>">
            <button class="ui small blue button">
              <i class="edit icon"></i>Edit
            </button>
        </form> -->
        <?php $edit = 'admin/editabsensi/'.$absensi['IDHarian'] ?>
        <a href="<?php echo site_url($edit) ;?>" class="ui small blue button">
            Edit
        </a>
      </td>
      <td>
        <a href="<?php echo site_url($edit) ;?>" class="ui small red button">
            Hapus
        </a>
      </td>
      
    </tr>
    <?php } ?>
    <?php $i = $i+1; ?>
    <?php } ?>
  </tbody>
  <tfoot class="full-width">
    <tr>
      
      <th colspan="8">
        
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