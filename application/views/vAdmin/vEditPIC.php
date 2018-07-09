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
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_PIC/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_PIC/vendor/animsition/js/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_PIC/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/formT_PIC/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_PIC/vendor/select2/select2.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_PIC/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/formT_PIC/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_PIC/vendor/countdowntime/countdowntime.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_PIC/js/main.js'); ?>"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="<?php echo base_url('https://www.googletagmanager.com/gtag/js?id=UA-23581568-13'); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
