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
  <div class="field" style="margin-left: 900px">
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
  
  <table class="ui sortable celled table"  id="example">
    <thead>
      <tr style="text-align: center">
        <th class="sorted ascending">No</th>
        <th>Hari</th>
        <th>Jadwal</th>
        <th>Batas Waktu</th>
        <th >Nama Checklist</th>
        <th>Nama PIC</th>
        <th >Info Checklist</th>
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
              echo '<tr style="background-color: #75e2f2; text-align:center;">';
            }
            else{
              echo '<tr style="text-align:center;">';
            }

      ?>
        <td> <?php echo $nomor[$temp] ; $no = $no+1;?> </td>
        <td><?php echo $checklist['Hari']; ?></td>
        <td><?php echo $checklist['Jam']; ?></td>
        <td><?php echo $checklist['BatasPengecekan'] ?> Menit</td>
        <td><?php echo $checklist['NamaChecklist']; ?></td>
        <td>
          <?php if ($checklist['StatusCheck'] != '1') { ?>
          <select class="ui search dropdown" name="<?php echo 'NIK'.$temp ?>">
            <option value="<?php echo $checklist['NIK']; ?>"><?php echo $checklist['NamaPIC']; ?></option>
            <?php for ($i=0; $i < count($pic[$checklist['Hari']][$checklist['Jam']]) ;$i++) { ?>
              <option value="<?php echo $pic[$checklist['Hari']][$checklist['Jam']][$i]['NIK'] ?>"><?php echo $pic[$checklist['Hari']][$checklist['Jam']][$i]['NamaPIC']; ?></option>
            <?php } ?>
          </select>
          <?php } else { ?>
          <input type="hidden" name="<?php echo 'NIK'.$temp ?>" value="<?php echo $checklist['NIK']; ?>">
            <p><?php echo $checklist['NamaPIC']; ?></p>
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
                <h3>Info Checklist</h3>
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