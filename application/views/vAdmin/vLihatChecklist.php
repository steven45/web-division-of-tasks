<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
  <div class="ui segment" style="border-radius: 1.285714rem">
    
    <div class="segment">
      <div class="ui icon input" style="margin-left: 0px">
        <input type="text" placeholder="Search...">
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
    

  <div class="ui divider"></div>

  <table class="ui sortable celled table" style=" width: auto;" id="example" >
    <thead>
      <tr style="text-align: center">
        <th class="sorted ascending">No</th>
        <th>Jadwal</th>
        <th>Batas Waktu</th>
        <th >Nama Checklist</th>
        <th>Nama PIC</th>
        <th >Info Checklist</th>
        <th>Edit</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $tempEnabled = 1;  ?>
      <?php foreach ($checklist as $checklist) { ?>
      <?php if ($checklist['Status'] == 'Enabled') { ?>

      <tr>
        <td><?php echo $tempEnabled; $tempEnabled = $tempEnabled+1; ?></td>
        <td><?php echo $checklist['Jam']; ?></td>
        <td>10 Menit</td>
        <td><?php echo $checklist['NamaChecklist']; ?></td>
        <td>
          <select class="ui search dropdown">
            <option value="<?php echo $checklist['NamaPIC']; ?>"><?php echo $checklist['NamaPIC']; ?></option>
            <!-- <?php if ($hari == $checklist['Hari']): ?>
              <?php foreach ($checklist as $checklist): ?>
                <option value="ss"><?php echo $checklist['NamaPIC']; ?></option>
              <?php endforeach ?>
            <?php endif ?> -->
          </select>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="<?php echo site_url('admin/editchecklist'); ?>">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <select class="ui selection tiny dropdown">
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
      <?php } ?>
      <?php } ?>
    </tbody>
    <tfoot>
        <th colspan="8">
          <button class="ui right floated blue small button" >
          <i class="save icon"></i>Simpan
        </button>

    <div class="dataTables_paginate paging_full_numbers" id="example_paginate">
  <a class="paginate_button first disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_first"> First</a>
  <a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="1" tabindex="0" id="example_previous">Previous</a>
  <span>
    <a class="paginate_button current" aria-controls="example" data-dt-idx="2" tabindex="0">1</a>
    <a class="paginate_button " aria-controls="example" data-dt-idx="3" tabindex="0">2</a>
    <a class="paginate_button " aria-controls="example" data-dt-idx="4" tabindex="0">3</a>
    <a class="paginate_button " aria-controls="example" data-dt-idx="5" tabindex="0">4</a>
    <a class="paginate_button " aria-controls="example" data-dt-idx="6" tabindex="0">5</a>
  </span>
  <a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a>
  <a class="paginate_button last" aria-controls="example" data-dt-idx="8" tabindex="0" id="example_last">Last</a>
</div>

        </th>
    </tfoot>
  </table>
  </div>
  </div>
</div>



    
