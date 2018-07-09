

<head>

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Beranda/main.css'); ?>">



</head>
<body>

<header> </header>
  <div class="content-wrapper">
    <div class="container-fluid">
            
        
<div class="container-fluid" style="margin-top: 10px">
            
    
        <h5>Pilih Tanggal:</h5>

 <?php $tanggal=date("20y-d-m"); ?>
<div class="input-group date" data-provide="datepicker">
    <input type="date" value="<?php echo $tanggal; ?>">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
</div>


       
        
      
             
            
        <div class="row">
            <div class="panel panel-primary" style="margin-top: 20px" >
                    <div class="panel-heading" >
                    

                        <h3 class="panel-title" style="text-align: center; font-size: 20px; ">Log</h3>
                        <div class="pull-right">
                        </div>
                    </div>

                    <table class="table table-hover" id="dev-table" style="font-size: 14px">

                        <thead >
                            <tr>
                                <th>Nama PIC</th>
                                <th>Nama Checklist</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 13px">

                            <tr>
                                
                                <td>
                                <div class="dropdown" style="font-size: 13px"> 
                                    <select>
                                        <option value="" type="tex">PIC</option>
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
                                </div>
                                
               
                                </td>
                                <td>Checklist PLN </td>
                                <td>01:00</td>
                                <td>
                                    OK
                                </td>
                                <td>
                                    Lalalala
                                </td>
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

