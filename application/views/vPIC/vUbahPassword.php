<div class="ui two column centered grid">
<div class="column">
	<div class="ui segment">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="user icon"></i>
			Ubah Password</h3>
			<div class="ui divider"></div>

		<form class="ui form" method="POST" action="" id="form">
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
		    <input type="password" name="password" placeholder="Password Baru" value="">
		  </div>
		  <div class="field">
		    <label>Confirm Password Baru</label>
		    <input type="password" name="confirmpassword" placeholder="Confirm Passowrd Baru" value="">
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
<script>

$('.ui.form')
            .form({
              on: 'blur',
              inline : true,
              fields: {
                password: {
                  identifier  : 'password',
                  rules: [
                    {
                      type   : 'minLength[6]',
                      prompt : 'Your password must be at least 6 characters'
                    },
                ]
              },
              confirmpassword: {
                  identifier  : 'confirmpassword',
                  rules: [
                    {
                      type   : 'match[password]',
                      prompt : "Your password doesn't match"
                    },
                ]
              },
          }
      }
    );

</script>