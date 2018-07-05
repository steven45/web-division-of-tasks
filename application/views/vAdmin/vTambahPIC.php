	  <div class="content-wrapper">
	<div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST" action="<?php echo site_url('admin/validasitambahpic'); ?>">
				<span class="contact100-form-title">
					TAMBAH PIC
				</span>

				<div class="wrap-input100 validate-input" data-validate="Masukkan Nomor Induk Karyawan">
					<input class="input100" type="text" name="NIK" placeholder="Nomor Induk Karyawan">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Masukkan Nama PIC">
					<input class="input100" type="text" name="NamaPIC" placeholder="Nama PIC">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan password">
					<input class="input100" type="text" name="Password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Divisi">
					<input class="input100" type="text" name="Divisi" placeholder="Divisi">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Jabatan">
					<input class="input100" type="text" name="Jabatan" placeholder="Jabatan">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Tahun Masuk PIC">
					<input class="input100" name="TahunMasuk" placeholder="Tahun Masuk PIC">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Masukkan Jumlah Pengecekan">
					<input class="input100" name="JumlahPengecekan" placeholder="Jumlah Pengecekan">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							<i class="fa fa-plus-square" aria-hidden="true"></i>
							Tambah
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>