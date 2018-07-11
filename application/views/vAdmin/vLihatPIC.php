<div class="ui two column centered grid">
<div class="column" style="width: auto;">
  <div class="ui segment" style="border-radius: 1.285714rem">
    <h3 style="text-align: center;">
      <div class="ui icon">
        <i class="user icon"></i>
      Daftar PIC 
      
      <a class="ui right floated tiny blue icon button" data-tooltip="Tambah PIC" data-inverted="" data-position="top right" href="<?php echo site_url('admin/tambahpic'); ?>">
          <i class="add icon"></i>
        </a></h3>

      <div class="ui divider"></div>

<table class="ui compact celled definition grey inverted table">
  <thead class="full-width" style="text-align: center; background-color: #35373c">
    <tr>
      <th>NIK</th>
      <th>Nama PIC</th>
      <th>Divisi</th>
      <th>Jabatan</th>
      <th>Tahun Masuk</th>
      <th>Jumlah Pengecekan</th>
      <th>Edit</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <form method="POST" action="<?php echo base_url('admin/hapuspic'); ?>">
    <?php $nEnabled = 0; $nDisabled = 0; ?>
    <?php for ($i=0; $i < count($pic) ; $i++) { ?>
    <?php 'NIK'.$i; ?>
    <?php if ($status == 'Enabled' AND $pic[$i]['Status'] == 'Enabled') { ?>
    <?php $nEnabled = $nEnabled +1; ?>
    <tr>
      <td><?php echo $pic[$i]['NIK'] ?></td>
      <td><?php echo $pic[$i]['NamaPIC'] ?></td>
      <td><?php echo $pic[$i]['Divisi'] ?></td>
      <td><?php echo $pic[$i]['Jabatan'] ?></td>
      <td><?php echo $pic[$i]['TahunMasuk'] ?></td>
      <td><?php echo $pic[$i]['JumlahPengecekan'] ?></td>
      <td>
       <!--  <form method="GET" action="<?php echo base_url('admin/editpic'); ?> ">
            <input type="hidden" name="NIK" value="<?php echo $pic[$i]['NIK'] ?>">
            <button class="ui small blue button">
              <i class="edit icon"></i>Edit
            </button>
        </form> -->
      </td>
      <td>
          <input type="hidden" name="<?php echo 'NIK'.$i; ?>" value="<?php echo $pic[$i]['NIK']; ?>">
          <select name="<?php echo 'status'.$i; ?>" class="ui search selection tiny dropdown" style="min-width: 10em;">
            <?php if ($pic[$i]['Status'] == "Enabled") { ?>
              <option value="<?php echo $pic[$i]['Status']; ?>"><?php echo $pic[$i]['Status']; ?></option>
              <option value="Disabled">Disabled</option>
            <?php } ?>
            <?php if ($pic['Status'] == "Disabled") { ?>
              <option value="<?php echo $pic['Status']; ?>"><?php echo $pic['Status']; ?></option>
              <option value="Enabled">Enabled</option>
            <?php } ?>
          </select>
      </td>
    </tr>
    <?php } elseif ($status == 'Disabled' AND $pic[$i]['Status'] == 'Disabled') { ?>
    <tr>
      <td><?php echo $pic[$i]['NIK'] ?></td>
      <td><?php echo $pic[$i]['NamaPIC'] ?></td>
      <td><?php echo $pic[$i]['Divisi'] ?></td>
      <td><?php echo $pic[$i]['Jabatan'] ?></td>
      <td><?php echo $pic[$i]['TahunMasuk'] ?></td>
      <td><?php echo $pic[$i]['JumlahPengecekan'] ?></td>
      <td>
        <form method="POST" action="<?php echo base_url('admin/editpic'); ?> ">
            <input type="hidden" name="NIK" value="<?php echo $pic[$i]['NIK'] ?>">
            <button class="ui small blue button">
              <i class="edit icon"></i>Edit
            </button>
        </form>
      </td>
      <td>
          <input type="hidden" name="<?php echo 'NIK'.$i; ?>" value="<?php echo $pic[$i]['NIK']; ?>">
          <select name="status" class="ui search selection tiny dropdown" style="min-width: 10em;">
            <?php if ($pic[$i]['Status'] == "Enabled") { ?>
              <option value="<?php echo $pic['Status']; ?>"><?php echo $pic[$i]['Status']; ?></option>
              <option value="Disabled">Disabled</option>
            <?php } ?>
            <?php if ($pic[$i]['Status'] == "Disabled") { ?>
              <option value="<?php echo $pic[$i]['Status']; ?>"><?php echo $pic[$i]['Status']; ?></option>
              <option value="Enabled">Enabled</option>
            <?php } ?>
          </select>
      </td>
    </tr>
    <?php } ?>
    <?php } ?>
  </tbody>
  <tfoot class="full-width">
    <tr>

      <th></th>
      <th colspan="9">

        <input type="hidden" name="nEnabled" value="<?php echo $nEnabled; ?>">
        <button class="ui right floated blue small button" >
          <i class="save icon"></i>Simpan
        </button>
      </th>
    </tr>
  </tfoot>
  </form>
</table>
</div>
</div>
</div>