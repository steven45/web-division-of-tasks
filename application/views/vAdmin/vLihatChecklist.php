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
  <table class="ui sortable celled table" style=" width: auto;">
    <thead>
      <tr style="text-align: center">
        <th class="sorted ascending">No</th>
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
      <?php if ($checklist['Status'] == $status) { ?>
      <input type="hidden" name="<?php echo 'IDChecklist'.$temp ?>" value="<?php echo $checklist['IDChecklist']; ?>">
      <tr >
        <td><?php echo $no; $no = $no+1; ?></td>
        <td><?php echo $checklist['Jam']; ?></td>
        <td><?php echo $checklist['BatasPengecekan'] ?> Menit</td>
        <td><?php echo $checklist['NamaChecklist']; ?></td>
        <td>
          <select class="ui search dropdown" name="<?php echo 'NIK'.$temp ?>">
            <option value="<?php echo $checklist['NIK']; ?>"><?php echo $checklist['NamaPIC']; ?></option>
            <?php for ($i=0; $i < count($pic[$checklist['Jam']]); $i++) { ?>
              <option value="<?php echo $pic[$checklist['Jam']][$i]['NIK'] ?>"><?php echo $pic[$checklist['Jam']][$i]['NamaPIC']; ?></option>
            <?php } ?>
          </select>
        </td>
        <td>
          <!-- <?php 
            $myFile = $checklist['Info'];
            $fh = fopen($myFile, 'r');
            while(!feof($fh)){
            echo fgets($fh)."<br>";
            }
           ?> -->
          <a href="#" data variation="wide" title="Hello. This is a very wide pop-up which allows for lots of content with additional space. &#013 You can fit a lot of words here and the paragraphs will be pretty wide. " data-position="bottom center" data-html="true" >Lihat</a>
        </td>
        

        <td>
          <form method="POST" action="<?php echo site_url('admin/editchecklist'); ?>">
            <a class="ui basic blue button" href="<?php echo site_url('admin/editchecklist/'.$checklist['IDChecklist']); ?>">
              <i class="icon edit"></i>
                  Edit
            </a>
          </form>
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
      <tr>
        <th colspan="8">
          <button class="ui right floated blue small button" >
          <i class="save icon"></i>Simpan
        </button>

  </form>
       <div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div>

        </th>
        </tr>
    </tfoot>
  </table>
  <br>
  <br>
  <br>
</div>
  </div>

  </div>
</div>



    
