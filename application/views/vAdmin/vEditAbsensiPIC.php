<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment" style="border-radius: 1.285714rem">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="user icon"></i>
			Edit Absensi PIC</div></h3>
			<div class="ui divider"></div>

		<form class="ui form" method="POST" action="<?php echo site_url('admin/validasieditabsensi'); ?>">
			<?php foreach ($absensi as $absensi ) { ?>
			<input type="hidden" name="IDHarian" value="<?php echo $absensi['IDHarian']; ?>">
			<input type="hidden" name="NIK" value="<?php echo $absensi['NIK']; ?>">
		  <div class="field">
		    <label>Nomor Induk Karyawan</label>
		    <input type="text" name="NIK" placeholder="Nomor Induk Karyawan" disabled value="<?php echo $absensi['NIK']; ?>">
		  </div>
		  <div class="field">
		    <label>Nama PIC</label>
		    <input type="text" name="NamaPIC" placeholder="Nama PIC" disabled value="<?php echo $absensi['NamaPIC']; ?>">
		  </div>
		  <div class="field">
		    <label>Shift</label>
		    <select style="min-width: 10em;" class="ui selected dropdown" name="IDJadwal">
		    	<option value="<?php echo $absensi['IDJadwal'] ?>"><?php echo $absensi['Shift'] ?></option>
		    	<option value="1">1</option>
		    	<option value="2">2</option>
		    	<option value="3">3</option>
		    </select>
		  </div>
		  <div class="field">
		    <label>Hari</label>
		    <select style="min-width: 10em;" class="ui selected dropdown" name="Hari">
		    	<option value="<?php echo $absensi['Hari'] ?>"><?php echo $absensi['Hari'] ?></option>
		    	<option value="Senin">Senin</option>
		    	<option value="Selasa">Selasa</option>
		    	<option value="Rabu">Rabu</option>
		    	<option value="Kamis">Kamis</option>
		    	<option value="Jumat">Jumat</option>
		    	<option value="Sabtu">Sabtu</option>
		    	<option value="Minggu">Minggu</option>
		    </select>
		  </div>
		<div class="ui center aligned basic segment">
		  <button class="ui right vertical blue button" tabindex="0">
		  	<i class="save icon"></i>
			  Simpan
			</button>
			</div>
			<?php } ?>
		</form>

</div>
</div>
</div>