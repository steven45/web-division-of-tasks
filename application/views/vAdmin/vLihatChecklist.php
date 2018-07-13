<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
  <div class="ui segment" style="border-radius: 1.285714rem">

    <h3 style="text-align: center;">

      <div class="ui icon">
        <i class="tasks icon"></i>
      Daftar Checklist   
        <a class="ui right floated tiny blue icon button" data-tooltip="Tambah Checklist" data-inverted="" data-position="top right" href="<?php echo site_url('admin/tambahchecklist'); ?>">
          <i class="add icon"></i>
        </a>
      </div>
    </h3>

  <div class="ui divider"></div>

  <table class="ui sortable celled table" style=" width: auto;">
    <thead>
      <tr style="text-align: center">
        <th class="sorted ascending">No</th>
        <th>Nama PIC</th>
        <th >Nama Checklist</th>
        <th >Info Checklist</th>
        <th>Jadwal</th>
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
        <td>
          <select class="ui dropdown">
            <option value="<?php echo $checklist['NamaPIC']; ?>"><?php echo $checklist['NamaPIC']; ?></option>
            <option value="Panji Nugroho">Panji Nugroho</option>
            <option value="Rudi Prima Mandala">Rudi Prima Mandala</option>
            <option value="Hashfi Arya Persada">Hashfi Arya Persada</option>
            <option value="Muhamad Imron">Muhamad Imron</option>
            <option value="Januar Hagai">Januar Hagai</option>
            <option value="Deni Sabilah">Deni Sabilah</option>
            <option value="Muchamad Ichsan">Muchamad Ichsan</option>
            <option value="Reza Adi Putra">Reza Adi Putra</option>
            <option value="Fandy Prasetyo">Fandy Prasetyo</option>
            <option value="Erfian Wibawanto">Erfian Wibawanto</option>
            <option value="Donny Sulistyawan">Donny Sulistyawan</option>
            <option value="Surya Setiawan">Surya Setiawan</option>
          </select>
        </td>
        <td><?php echo $checklist['NamaChecklist']; ?></td>
        <td><a href="#">Lihat</a></td>
        <td><?php echo $checklist['Jam']; ?></td>

        <td>
          <form method="POST" action="<?php echo site_url('admin/editchecklist'); ?>">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <select class="ui selection tiny dropdown" style="min-width: 1em;"">
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
        </th>
    </tfoot>
  </table>
  </div>
  </div>
</div>



    
