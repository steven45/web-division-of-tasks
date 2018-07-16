<html><head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://localhost/ProjectPKL/assets/Semantic-UI/semantic.min.css">
  <script type="text/javascript" src="http://localhost/ProjectPKL/assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="http://localhost/ProjectPKL/assets/Semantic-UI/tablesort.js"></script>
  <script type="text/javascript">
    $(document).ready(function() 
    { 
        $('table').tablesort(); 
    } 
    ); 
  </script>

  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                "pagingType": "full_numbers"
            } );
        } );
  </script>

  <script type="text/javascript">
    $(document).ready(function() 
    { 
    $('.ui.dropdown').dropdown();
    } 
    ); 
  </script>

  <title>
    Lihat Checklist  </title>
</head>

<body style="background-color: #bcd8d7">
  <!-- Header -->
    <div class="ui top fixed inverted pointing menu">
      <a class="header item" href="http://localhost/ProjectPKL/admin/beranda">
        <img class="ui avatar image" src="http://localhost/ProjectPKL/assets/images/Artajasa.png ">
        Artajasa
      </a>
      <a class="item" href="http://localhost/ProjectPKL/admin/beranda">
        <div class="ui icon">
          <i class="home icon"></i>
          Dashboard</div>
      </a>
      <a class="item" href="http://localhost/ProjectPKL/admin/checklist">
        <div class="ui icon">
          <i class="check square icon"></i>
        Checklist</div>
      </a>

      <div class="ui dropdown item" tabindex="0">
      <i class="user icon"></i>
        PIC
        <i class="dropdown icon"></i>
          <div class="menu" tabindex="-1">
            <a class="item" href="http://localhost/ProjectPKL/admin/pic">
            Daftar PIC</a>
            <a class="item" href="http://localhost/ProjectPKL/admin/absensi">
            Absensi PIC</a>
      </div>
      </div>
        
      <div class="right menu">
        <div class="ui pointing dropdown link item" tabindex="0">
          <span class="text">

          Notifications</span>
          <div class="ui small label">1</div>
            <div class="menu" tabindex="-1">
              <div class="header">
                <i class="bell icon"></i>
              Notifications</div>
              <div class="ui relaxed divided list" style="margin: auto+10px auto+10px; padding-bottom: 10px;">
                <div class="item">
                  <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI</a>
                    <div class="description">Updated 10 mins ago</div>
                  </div>
                </div>
                <div class="item">
                  <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI-Docsssss
                    </a>
                    <div class="description">Updated 22 mins ago sjjsak
              </div>
                  </div>
                </div>
              </div>

              <!-- <div class="header">Notifications</div>
              <a class="item" href="http://localhost/ProjectPKL/admin/absensi">
                <div class="label">Nama PIC</div>
              </a>
              <a class="item">Cancel</a> -->
            </div>
        </div>
        

    <div class="item">
      <div class="ui icon input">
        <input type="text" placeholder="Search...">
        <i class="search icon"></i>
      </div>
    </div>
      <a href="http://localhost/ProjectPKL/admin/keluar" style="color: white;" onclick="return confirm('Apa anda yakin ingin keluar ?');">
      <div class="item">
          <div class="ui teal button">
            <i class="sign out alternate icon" icon"=""></i>Log Out
          </div>
      </div>
      </a>
    </div>
    </div>
<br><br><br><br><br>



<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
  <div class="ui segment" style="border-radius: 1.285714rem">
    
    <div class="segment">
      <div class="ui icon input" style="margin-left: 0px">
        <input type="text" placeholder="Search...">
        <i class="circular search link icon"></i>
      </div>
      <h3 style="text-align: center; margin-top: -30px;">
      <div class="ui icon">
        <i class="tasks icon"></i>
      Daftar Checklist 
      </div></h3>
      <a class="ui right floated tiny blue icon button" data-tooltip="Tambah Checklist" data-inverted="" data-position="top right" style="margin-top: -40px" href="http://localhost/ProjectPKL/admin/tambahchecklist">
          <i class="add icon"></i>
      </a>
      </div>
    

  <div class="ui divider"></div>

  <div id="example_wrapper" class="dataTables_wrapper"><div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div><table class="ui sortable celled table dataTable" style=" width: auto;" id="example" role="grid" aria-describedby="example_info">
    <thead>
      <tr style="text-align: center" role="row"><th class="sorted ascending sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 34.8px;">No</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Jadwal: activate to sort column ascending" style="width: 44.2px;">Jadwal</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Batas Waktu: activate to sort column ascending" style="width: 81px;">Batas Waktu</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nama Checklist: activate to sort column ascending" style="width: 98.6px;">Nama Checklist</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nama PIC: activate to sort column ascending" style="width: 169.8px;">Nama PIC</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Info Checklist: activate to sort column ascending" style="width: 86.6px;">Info Checklist</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" style="width: 93px;">Edit</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 196.2px;">Status</th></tr>
    </thead>
    <tbody>
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                  
       
                <tr role="row" class="odd">
        <td class="sorting_1">1</td>
        <td>00:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">2</td>
        <td>01:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">3</td>
        <td>02:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">4</td>
        <td>03:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">5</td>
        <td>04:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">6</td>
        <td>05:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">7</td>
        <td>06:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">8</td>
        <td>07:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="odd">
        <td class="sorting_1">9</td>
        <td>08:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr><tr role="row" class="even">
        <td class="sorting_1">10</td>
        <td>09:00</td>
        <td>10 Menit</td>
        <td>alfamart</td>
        <td>
          <div class="ui search dropdown selection"><select>
            <option value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</option>
            <!-- 
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined index: Hari</p>
<p>Filename: vAdmin/vLihatChecklist.php</p>
<p>Line Number: 49</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\views\vAdmin\vLihatChecklist.php<br />
			Line: 49<br />
			Function: _error_handler			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\application\controllers\cAdmin.php<br />
			Line: 369<br />
			Function: view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: C:\xampp\htdocs\ProjectPKL\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div> -->
          </select><i class="dropdown icon"></i><input class="search" autocomplete="off" tabindex="0"><div class="text">Vriza Wahyu Saputra</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Vriza Wahyu Saputra">Vriza Wahyu Saputra</div></div></div>
        </td>
        <td><a href="#">Lihat</a></td>
        

        <td>
          <form method="POST" action="http://localhost/ProjectPKL/admin/editchecklist">
            <button class="ui basic blue button">
              <i class="icon edit"></i>
                  Edit
            </button>
          </form>
        </td>
        <td>
          <div class="ui selection tiny dropdown" tabindex="0"><select>
                            <option value="Enabled">Enabled</option>
              <option value="Disabled">Disabled</option>
                                  </select><i class="dropdown icon"></i><div class="text">Enabled</div><div class="menu" tabindex="-1"><div class="item active selected" data-value="Enabled">Enabled</div><div class="item" data-value="Disabled">Disabled</div></div></div>
        </td>
      </tr></tbody>
    <tfoot>
        <tr><th colspan="8" rowspan="1">
          <button class="ui right floated blue small button">
          <i class="save icon"></i>Simpan
        </button>

      <div class="ui left floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="active item" aria-controls="example" data-dt-idx="2" tabindex="0">1</a>
        <a class="item" aria-controls="example" data-dt-idx="3" tabindex="0">2</a>
        <a class="item" aria-controls="example" data-dt-idx="4" tabindex="0">3</a>
        <a class="item" aria-controls="example" data-dt-idx="5" tabindex="0">4</a>
        <a class="item" aria-controls="example" data-dt-idx="6" tabindex="0">5</a>
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>

        </th></tr></tfoot>
  </table><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 48 entries</div><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a class="paginate_button first disabled" aria-controls="example" data-dt-idx="0" tabindex="0" id="example_first">First</a><a class="paginate_button previous disabled" aria-controls="example" data-dt-idx="1" tabindex="0" id="example_previous">Previous</a><span><a class="paginate_button current" aria-controls="example" data-dt-idx="2" tabindex="0">1</a><a class="paginate_button " aria-controls="example" data-dt-idx="3" tabindex="0">2</a><a class="paginate_button " aria-controls="example" data-dt-idx="4" tabindex="0">3</a><a class="paginate_button " aria-controls="example" data-dt-idx="5" tabindex="0">4</a><a class="paginate_button " aria-controls="example" data-dt-idx="6" tabindex="0">5</a></span><a class="paginate_button next" aria-controls="example" data-dt-idx="7" tabindex="0" id="example_next">Next</a><a class="paginate_button last" aria-controls="example" data-dt-idx="8" tabindex="0" id="example_last">Last</a></div></div>
  </div>
  </div>
</div>



    

<br><br><br><br><!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
  <div class="ui inverted vertical footer segment" style="position: fixed; bottom: 0px; left: 0px; right: 0px;">
    <div class="ui center aligned container">
    Copyright © Artajasa 2018
  </div>
</div>


  <script src="http://localhost/ProjectPKL/assets/Semantic-UI/semantic.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){
        $("#pencarian").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#hasil tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        }); 
      });
</script>

</body></html>