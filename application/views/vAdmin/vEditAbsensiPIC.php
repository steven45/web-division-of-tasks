<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment" style="border-radius: 1.285714rem">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="user icon"></i>
			Edit Absensi PIC</div></h3>
			<div class="ui divider"></div>

		<form class="ui form" method="POST" action="<?php echo site_url('admin/validasieditabsensi'); ?>">
		  <div class="field">
		    <label>Nomor Induk Karyawan</label>
		    <input type="text" name="NIK" placeholder="Nomor Induk Karyawan" disabled>
		  </div>
		  <div class="field">
		    <label>Nama PIC</label>
		    <input type="text" name="NamaPIC" placeholder="Nama PIC" disabled>
		  </div>
		  <div class="field">
		    <label>Shift</label>
		    <input type="password" name="Password" placeholder="Password">
		  </div>
		  <div class="field">
		    <label>Hari</label>
		    <input type="text" name="Divisi" placeholder="Divisi">
		</div>
		<div class="ui center aligned basic segment">
		  <button class="ui right vertical blue button" tabindex="0">
		  	<i class="save icon"></i>
			  Simpan
			</button>
			</div>
		</form>

</div>
</div>
</div>