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
                        <h3 class="panel-title" style="text-align: center; font-size: 22px; ">Log</h3>
                        <div class="pull-right">
                        </div>
                    </div>

                    <table class="table table-hover" id="dev-table">

                        <thead>
                            <tr>
                                <th>Nama PIC</th>
                                <th>Nama Checklist</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                
                                <td>
                                
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                <a href="<?php echo site_url('admin/infochecklist/'); ?>" target="_blank">Lihat</a>
                                </td>
                                <td></td>
                                <td>
                                <form method="POST" action="<?php echo site_url('admin/editchecklist'); ?>">
                                    <input type="hidden" name="IDChecklist" value="">
                                
                            </tr>
       
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>


    </div>

    <td>
    <form method="POST" action="<?php echo site_url('admin/tambahchecklist'); ?>">
    
    </form>
    </td>
    </div>
    </body>

