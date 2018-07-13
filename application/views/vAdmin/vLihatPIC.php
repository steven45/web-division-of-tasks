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
      Daftar PIC 
      </h3>
      <a class="ui right floated tiny blue icon button" data-tooltip="Tambah PIC" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahpic'); ?>">
          <i class="add icon"></i>
      </a>
      </div>

      <div class="ui divider"></div>

<table class="ui sortable compact celled definition grey inverted table">
  <thead class="full-width" style="text-align: center; background-color: #35373c">
    <tr>
      <th class="sorted ascending">NIK</th>
      <th class="">Nama PIC</th>
      <th class="">Divisi</th>
      <th class="">Jabatan</th>
      <th class="">Tahun Masuk</th>
      <th class="">Jumlah Pengecekan</th>
      <th>Edit</th>
      <th>
        <div class="ui simple dropdown item" style="color: white;">
        Status
          <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item" href="<?php echo site_url('admin/pic/Enabled') ?>">Enable</a>
              <a class="item" href="<?php echo site_url('admin/pic/Disabled') ?>">Disable</a>
            </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody id="hasil">
    <form method="POST" action="<?php echo base_url('admin/hapuspic'); ?>">
    <?php $nEnabled = 0; $nDisabled = 0; $nJumlah = count($pic);?>
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
        <?php $edit = 'admin/editpic/'.$pic[$i]['NIK'] ?>
        <a href="<?php echo site_url($edit) ;?>" class="ui small blue button">
            <i class="edit icon"></i>Edit
        </a>
      </td>
      <td>
          <input type="hidden" name="<?php echo 'NIK'.$i; ?>" value="<?php echo $pic[$i]['NIK']; ?>">
          <select  name="<?php echo 'status'.$i; ?>"  style="min-width: 10em;">
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
    <?php $nDisabled = $nDisabled +1; ?>
    <tr>
      <td><?php echo $pic[$i]['NIK'] ?></td>
      <td><?php echo $pic[$i]['NamaPIC'] ?></td>
      <td><?php echo $pic[$i]['Divisi'] ?></td>
      <td><?php echo $pic[$i]['Jabatan'] ?></td>
      <td><?php echo $pic[$i]['TahunMasuk'] ?></td>
      <td><?php echo $pic[$i]['JumlahPengecekan'] ?></td>
      <td>

        <?php $edit = 'admin/editpic/'.$pic[$i]['NIK'] ?>
        <a href="<?php echo site_url($edit) ;?>" class="ui small blue button">
            <i class="edit icon"></i>Edit
        </a>
      </td>
      <td>
          <input type="hidden" name="<?php echo 'NIK'.$i; ?>" value="<?php echo $pic[$i]['NIK']; ?>">
          <select name="<?php echo 'status'.$i; ?>"  style="min-width: 10em;">
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
      <th colspan="8">
        <input type="hidden" name="nJumlah" value="<?php echo $nJumlah; ?>">
        <input type="hidden" name="nDisabled" value="<?php echo $nDisabled; ?>">
        <input type="hidden" name="nEnabled" value="<?php echo $nEnabled; ?>">
        <button class="ui right floated blue small button" >
          <i class="save icon"></i>
          Simpan
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

