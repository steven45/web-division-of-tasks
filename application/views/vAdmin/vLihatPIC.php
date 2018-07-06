<body>
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
                <th>Password</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Tahun Masuk</th>
                <th>Jumlah Pengecekan</th>
                <th>Edit</th>
                <th>Hapus</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>1</td>
                <td>Kilgore</td>
                <td>Trout</td>
                <td>kilgore</td>
                <td>kilgore</td>
                <td>kilgore</td>
                <td>kilgore</td>
                <td>
                  <form method="POST" action="<?php echo site_url('admin/editPIC'); ?>">
                  <button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span>Edit</button>
                  </form>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger">
                      <span class="glyphicon glyphicon-trash"></span>Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Bob</td>
                    <td>Loblaw</td>
                    <td>boblahblah</td>
                    <td>kilgore</td>
                    <td>kilgore</td>
                    <td>kilgore</td>
                    <td>

                      <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil"></span>Edit
                        </button>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger">
                          <span class="glyphicon glyphicon-trash"></span>Hapus</button>
                        </td>
                        </tr>
                            
                            <tr>
                                <td>3</td>
                                <td>Holden</td>
                                <td>Caulfield</td>
                                <td>penceyreject</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Edit
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Holden</td>
                                <td>Caulfield</td>
                                <td>penceyreject</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Edit
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Holden</td>
                                <td>Caulfield</td>
                                <td>penceyreject</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Edit
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Holden</td>
                                <td>Caulfield</td>
                                <td>penceyreject</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Edit
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Holden</td>
                                <td>Caulfield</td>
                                <td>penceyreject</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>kilgore</td>
                                <td>
                                <button type="button" class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    Edit
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
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
</div>
    </body>
        