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
                                   <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Hapus
                                    </button>
                                </td>
                            </tr>
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
        <button class="btn btn-primary" style="background-color: #999; border-color: #777;">
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