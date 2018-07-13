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
    </div>

      <div class="ui divider"></div>

<table class="ui sortable compact celled definition grey inverted table">
  <thead class="full-width" style="text-align: center; background-color: #35373c">
    <tr>
      <th class="sorted ascending">NIK</th>
      <th class="">Nama PIC</th>
      <th class="">Shift</th>
      <th class="">Jam</th>
      <th class="">Hari</th>
      <th class="">Kehadiran</th>
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
    </tr>
    <?php } ?>
    <?php $i = $i+1; ?>
    <?php } ?>
  </tbody>
  <tfoot class="full-width">
    <tr>
      
      <th colspan="6">
        
        <button class="ui right floated blue small button" style="margin-top: 5px;">
          <i class="save icon"></i>Simpan
        </button>

        <div class="ui left floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="active item">1</a>
        <a class="item">2</a>
        <a class="item">3</a>
        <a class="item">4</a>
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>
        
      </th>

    </tr>
  </tfoot>
  </form>
</table>
</div>



</div>
</div>