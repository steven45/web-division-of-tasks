<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment" style="border-radius: 1.285714rem">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="user icon"></i>
			Tambah Absensi PIC</div></h3>
			<div class="ui divider"></div>

		<form class="ui form" method="POST" action="<?php echo site_url('admin/validasitambahabsensi'); ?>">
		<div class="field">
	    <label>Nama PIC</label>
	    <select style="min-width: 10em;" class="ui selected dropdown" name="NIK">
	    	<?php foreach ($pic as $pic ) { ?>
	    	<?php if ($pic['Status'] == 'Enabled') { ?>
	    	<option value="<?php echo $pic['NIK']; ?>"><?php echo $pic['NamaPIC'] ; ?></option>
	    	<?php } ?>
	    	<?php } ?>
	    </select>

		  </div>
		  
		  <div class="field">
		    <label>Shift</label>
		    <select style="min-width: 10em;" class="ui selected dropdown" name="IDJadwal">
		    	<?php foreach ($jadwal as $jadwal) { ?>
		    	<option value="<?php echo $jadwal['IDJadwal'] ?>"><?php echo $jadwal['Shift'] ?></option>
		    	<?php } ?>
		    </select>
		  </div>

		  <div class="field">
		    <label>Shift</label>
		    <select style="min-width: 10em;" class="ui selected dropdown" name="Hari">
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
		  	<i class="plus icon"></i>
			  Tambah
			</button>
			</div>
		</form>

</div>
</div>
</div>