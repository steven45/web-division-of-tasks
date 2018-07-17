<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="user icon"></i>
			Ubah Password</h3>
			<div class="ui divider"></div>

		<form class="ui form" method="POST" action="<?php echo site_url('admin/validasieditpic'); ?>">
		  <div class="field">
		    <label>Nomor Induk Karyawan</label>
		    <input type="text" name="NIK" placeholder="Nomor Induk Karyawan" value="" disabled>
		  </div>
		  <div class="field">
		    <label>Nama PIC</label>
		    <input type="text" name="NamaPIC" placeholder="Nama PIC" value="" disabled>
		  </div>
		  <div class="field">
		    <label>Password Lama</label>
		    <input type="password" name="Password" placeholder="Password Lama" value="">
		</div>
		    <div class="field">
		    <label>Password Baru</label>
		    <input type="password" name="Password" placeholder="Password Baru" value="">
		  </div>
		  <div class="field">
		    <label>Confirm Password Baru</label>
		    <input type="password" name="Password" placeholder="Confirm Passowrd Baru" value="">
		  </div>
		  
	
		<div class="ui center aligned basic segment">
		  <button class="ui right vertical blue button" tabindex="0">
		  	<i class="check icon"></i>
			  Simpan
			</button>
			</div>
		</form>

</div>
</div>
</div>