<body>
<div class="content-wrapper">
  <div class="container-fluid">

    <div class="container-fluid" style="margin-top: 30px">
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div></div>
            <h3 class="panel-title" style="text-align: center;">Daftar Kehadiran PIC</h3>
            <div class="pull-right"> 
            </div>
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>NIK</th>
                <th>Nama PIC</th>
                <th>Kehadiran</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>12</td>
                <td>Kilgore</td>
                <td>Trout</td>

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