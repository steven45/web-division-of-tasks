<div class="content-wrapper">
  <div class="container-fluid">

    <div class="container-fluid" style="margin-top: 30px">
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div></div>
            <h3 class="panel-title" style="text-align: center;">DAFTAR PIC</h3>
            <div class="pull-right"> 
            </div>
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>NIK</th>
                <th>Nama PIC</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Tahun Masuk</th>
                <th>Jumlah Pengecekan</th>
                <th>Edit</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($pic as $pic) { ?>
            <?php if ($pic['Status'] == 'Enabled') { ?>
                <tr>
                    <td><?php echo $pic['NIK'] ?></td>
                    <td><?php echo $pic['NamaPIC'] ?></td>
                    <td><?php echo $pic['Divisi'] ?></td>
                    <td><?php echo $pic['Jabatan'] ?></td>
                    <td><?php echo $pic['TahunMasuk'] ?></td>
                    <td><?php echo $pic['JumlahPengecekan'] ?></td>
                    <td>
                        <form method="POST" action="<?php echo base_url('admin/editpic'); ?> ">
                            <input type="hidden" name="NIK" value="<?php echo $pic['NIK'] ?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="<?php echo base_url('admin/hapuspic'); ?>">

                        <input type="hidden" name="NIK" value="<?php echo $pic['NIK'];?>">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                          <span class="glyphicon glyphicon-trash"></span>Hapus</button>

                        <!-- Hapus Modal -->
                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus PIC??</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">Jika anda menghapus maka data tidak ditampilkan dalam daftar PIC</div>
                              <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                               
                                  <input type="submit" name="submit" class="btn btn-danger" value="Hapus">   
                              </div>
                            </div>
                          </div>
                        </div>
                        </form>
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
                
                
          </div>

            
            </div>
            <td>
              <form method="POST" action="<?php echo site_url('admin/tambahpic'); ?>">
                <div class="container-btn-edit" style="text-align: right; margin-right: 35%">
                  <button class="btn btn-dark">
                    <span>
                        <span class="glyphicon glyphicon-user"></span>Tambah PIC
                   </span>
                  </button>
                </div>
              </form>
            </td>

          </div>
      <td>
    
        