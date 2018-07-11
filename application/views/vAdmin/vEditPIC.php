<<<<<<< HEAD
<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="user icon"></i>
			Edit PIC</h3>
			<div class="ui divider"></div>

		<form class="ui form">
		  <div class="field">
		    <label>Nomor Induk Karyawan</label>
		    <input type="text" name="NIK" placeholder="Nomor Induk Karyawan">
		  </div>
		  <div class="field">
		    <label>Nama PIC</label>
		    <input type="text" name="NamaPIC" placeholder="Nama PIC">
		  </div>
		  <div class="field">
		    <label>Password</label>
		    <input type="password" name="Password" placeholder="Password">
		  </div>
		  <div class="field">
		    <label>Divisi</label>
		    <input type="text" name="Divisi" placeholder="Divisi">
=======
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit PIC</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/formT_PIC/images/icons/favicon.ico'); ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/vendor/css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/vendor/daterangepicker/daterangepicker.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_PIC/css/main.css'); ?>">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" action="<?php echo site_url('admin/validasieditpic'); ?>">
				<span class="contact100-form-title">
					EDIT PIC
				</span>
					
				<div class="wrap-input100 validate-input" data-validate="Masukkan Nomor Induk Karyawan">
					<input class="input100" type="text" placeholder="Nomor Induk Karyawan" value="<?php echo $pic['NIK']; ?>" disabled>
					<input type="hidden" name="NIK" value="<?php echo $pic['NIK']; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Masukkan Nama PIC">
					<input class="input100" type="text" name="NamaPIC" placeholder="Nama PIC" value="<?php echo $pic['NamaPIC']; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Divisi">
					<input class="input100" type="text" name="Divisi" placeholder="Divisi" value="<?php echo $pic['Divisi']; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Jabatan">
					<input class="input100" type="text" name="Jabatan" placeholder="Jabatan" value="<?php echo $pic['Jabatan']; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Tahun Masuk PIC">
					<input class="input100" name="TahunMasuk" placeholder="Tahun Masuk PIC" value="<?php echo $pic['TahunMasuk']; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Jumlah Pengecekan">
					<input class="input100" name="JumlahPengecekan" placeholder="Jumlah Pengecekan" value="<?php echo $pic['JumlahPengecekan']; ?>">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							<i class="fa fa-check" aria-hidden="true"></i>
							Simpan
						</span>
					</button>
				</div>
			</form>
>>>>>>> 132d7495c48ad83b13058064e8237d4f1d48bec5
		</div>
		    <div class="field">
		    <label>Jabatan</label>
		    <input type="text" name="Jabatan" placeholder="Jabatan">
		  </div>
		  <div class="field">
		    <label>Tahun Masuk PIC</label>
		    <input type="text" name="TahunMasuk" placeholder="Tahun Masuk PIC">
		  </div>
		  
	
		<div class="ui center aligned basic segment">
		  <div class="ui right vertical blue button" tabindex="0">
		  	<i class="check icon"></i>
			  Simpan
			</div>
			</div>
		</form>

</div>



</div>
</div>