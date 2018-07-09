<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/fonts/iconic/css/material-design-iconic-font.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/vendor/css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/vendor/select2/select2.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/vendor/daterangepicker/daterangepicker.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/vendor/noui/nouislider.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/formT_Checklist/css/main.css'); ?>">
<!--===============================================================================================-->
</head>
<body>
 <div class="content-wrapper">
	<div class="container-contact100">
		<div class="wrap-contact100">

			<form class="contact100-form validate-form" method="POST" action="<?php echo base_url('admin/validasieditchecklist'); ?>">
				<span class="contact100-form-title">
					Edit Jadwal Checklist
				</span>

				<input type="hidden" name="IDChecklist" value="<?php echo $checklist['IDChecklist']; ?>">
				<div class="wrap-input100 validate-input bg1" data-validate="Masukkan Nama Checklist">
					<input class="input100" type="text" name="NamaChecklist" placeholder="Nama Checklist" value="<?php echo $checklist['NamaChecklist']; ?>">
				</div>

				<div class="wrap-input100 input100-select bg1">
					<div>
						<select class="js-select2" name="JenisChecklist">
							<option value="<?php echo $checklist['JenisChecklist']; ?>" type="text"><?php echo $checklist['JenisChecklist']; ?></option>
							<option value="Checklist PLN">Checklist PLN</option>
							<option value="Checklist Server PLN">Checklist Server PLN</option>
							<option value="Checklist ATM B">Chceklist ATM B</option>
							<option value="Checklist Tandem">Checklist Tandem</option>
							<option value="Checklist Bill Payment">Checklist Bill Payment</option>
							<option value="Checklist Gapura XML">Checklist Gapura XML</option>
							<option value="Checklist SMS Banking">Checklist SMS Banking</option>
							<option value="Checklist Reporting Process New">Checklist Reporting Process New</option>
							<option value="Laporan Kegiatan Rutin">Laporan Kegiatan Rutin</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

			
				<div class="wrap-input100 input100-select bg1">
					<div>
						<select class="js-select2" name="Info">
							<option value="<?php echo $checklist['Info']; ?>" type="text"><?php echo $checklist['JenisChecklist']; ?></option>
							<option value="">Checklist PLN</option>
							<option value="">Checklist Server PLN</option>
							<option value="">Chceklist ATM B</option>
							<option value="">Checklist Tandem</option>
							<option value="">Checklist Bill Payment</option>
							<option value="">Checklist Gapura XML</option>
							<option value="">Checklist SMS Banking</option>
							<option value="">Checklist Reporting Process New</option>
							<option value="">Laporan Kegiatan Rutin</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="wrap-input100 input100-select bg1">
					<div>
						<select class="js-select2" name="Jam">
							<option value="<?php echo $checklist['Jam']; ?>" type="text"><?php echo $checklist['Jam']; ?></option>
							<option value="00:00">00:00</option>
							<option value="01:00">01:00</option>
							<option value="02:00">02:00</option>
							<option value="03:00">03:00</option>
							<option value="04:00">04:00</option>
							<option value="05:00">05:00</option>
							<option value="06:00">06:00</option>
							<option value="07:00">07:00</option>
							<option value="08:00">08:00</option>
							<option value="09:00">09:00</option>
							<option value="10:00">10:00</option>
							<option value="11:00">11:00</option>
							<option value="12:00">12:00</option>
							<option value="13:00">13:00</option>
							<option value="14:00">14:00</option>
							<option value="15:00">15:00</option>
							<option value="16:00">16:00</option>
							<option value="17:00">17:00</option>
							<option value="18:00">18:00</option>
							<option value="19:00">19:00</option>
							<option value="20:00">20:00</option>
							<option value="21:00">21:00</option>
							<option value="22:00">22:00</option>
							<option value="23:00">23:00</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				
				<div class="container-contact100-form-btn">
				<button class="contact100-form-btn">
					<span>
						Simpan
						<i class="fa fa-file m-l-7" aria-hidden="true"></i>
					</span>
				</button>
				</div>
			</form>
		</div>
	</div>				
</div>			
			


<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/animsition/js/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/select2/select2.min.js'); ?>"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/countdowntime/countdowntime.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/vendor/noui/nouislider.min.js'); ?>"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets/formT_Checklist/js/main.js'); ?>"></script>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
