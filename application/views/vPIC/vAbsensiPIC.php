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

<table class="ui sortable compact celled definition table" id="example">
  <thead class="full-width" style="text-align: center; background-color: #dbedff">
    <tr>
      <th class="sorted ascending">NIK</th>
      <th class="">Nama PIC</th>
      <th class="">Shift</th>
      <th class="">Jam</th>
      <th class="">Hari</th>
      <th class="">Kehadiran</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>
          <select class="ui selection dropdown" style="min-width: 10em;" name="<?php echo 'Kehadiran'.$i ?>">
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