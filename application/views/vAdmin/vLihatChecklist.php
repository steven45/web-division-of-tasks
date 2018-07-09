<head>

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</head>
<body>

<header> </header>
  <div class="content-wrapper">
    <div class="container-fluid">
            
        
<div class="container-fluid" style="margin-top: 10px">
        <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <div></div>
                        <h3 class="panel-title" style="text-align: center; font-size: 22px; ">Daftar Checklist</h3>
                        <div class="pull-right">
                        </div>
                    </div>

                    <table class="table table-hover" id="dev-table">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Checklist</th>
                                <th>Jenis Checklist</th>
                                <th>Info Checklist</th>
                                <th>Jam Pengecekan</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($checklist as $checklist) { ?>
                            <?php if ($checklist['Status'] == 'Enabled') { ?>
                            
                            <tr>
                                <td><?php echo $checklist['IDChecklist'] ?></td>
                                <td><?php echo $checklist['NamaChecklist'] ?></td>
                                <td><?php echo $checklist['JenisChecklist'] ?></td>
                                <td>
                                <a href="<?php echo site_url('admin/infochecklist/'.$checklist['IDChecklist']); ?>" target="_blank">Lihat</a>
                                </td>
                                <td><?php echo $checklist['Jam'] ?></td>
                                <td>
                                <form method="POST" action="<?php echo site_url('admin/editchecklist'); ?>">
                                    <input type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist']; ?>">
                                <div class="container-btn-edit">
                                    <button class="btn btn-primary">
                                    <span>
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Edit
                                    </span>
                                    </button>
                                </div>
                                </form>
                                </td>
                               
                                <td>

                                    <div class="dropdown" style="font-size: 13px"> 
                                    <select>
                                        <option value="" type="tex">Enable</option>
                                        <option value="Panji Nugroho">Diasable</option>
                                    </select>
                                </div>

                                     <form method="POST" action="<?php echo base_url('admin/hapuschecklist'); ?>">

                                        <input type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist']; ?>">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal">
                                        <span class="glyphicon glyphicon-trash"></span>
                                        Hapus
                                        </button>

                                        <!-- Hapus Modal -->
                                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin menghapus checklist??</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">×</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">Jika anda menghapus maka data tidak ditampilkan dalam daftar checklist</div>
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
    </div>

    <td>
    <form method="POST" action="<?php echo site_url('admin/tambahchecklist'); ?>">
    <div class="container-btn-edit" style="text-align: right; margin-right: 35%">
    <button class="btn btn-primary" style="background-color: #999; border-color: #777; >
        <span>
        <span class="glyphicon glyphicon-person"></span>
            <span class="glyphicon glyphicon-plus"></span>
            Tambah Checklist
        </span>
    </button>
    </div>
    </form>
    </td>
    </div>
    </body>
