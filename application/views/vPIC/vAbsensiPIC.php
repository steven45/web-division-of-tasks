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

        <div class="ui right calendar" style="margin-left: 500px; margin-top: -45px">
          <div class="ui small input left icon">
            <i class="calendar icon"></i>
            <input type="date" value="<?php echo date('20y-m-d') ?>">
          </div>
          
        </div>

        <div class="ui divider"></div>

        <table class="ui sortable compact celled definition table" id="mytable">
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

          <tbody id="hasil" style="text-align: center">

            <?php foreach ($absensi as $absensi ) { ?>
            <?php if ($absensi['Status'] == 'Enabled' AND $absensi['NIK'] == $_SESSION['nik']) { ?>
            <tr>
              <td> <?php echo $absensi['NIK'] ?> </td>
              <td> <?php echo $absensi['NamaPIC'] ?> </td>
              <td> <?php echo $absensi['Shift'] ?> </td>
              <td> <?php echo $absensi['Jam'] ?> </td>
              <td> <?php echo $absensi['Hari'] ?> </td>
              <td> <?php echo $absensi['Kehadiran'] ?></td>
            </tr>
            <?php } ?>
            <?php } ?>
            
          </tbody>
          <tfoot class="full-width">
            <tr>
              <th colspan="8"></th>
            </tr>
          </tfoot>
        </form>
      </table>
      <div class="pagination-container">
      <nav>
        <ul class="pagination"></ul>
      </nav>
    </div>
    </div>
  </div>
</div>