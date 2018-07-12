
<div class="ui two column centered grid">
<div class="column">
 <div class="ui segment">
  <h3 style="text-align: center;">
   <div class="ui icon">
     <i class="user icon"></i>
   Tambah Checklist</div></h3>
   <div class="ui divider"></div>
 
  <form class="ui form" method="POST" action="<?php echo site_url('admin/validasitambahchecklist'); ?>" enctype="multipart/form-data">
    <div class="field">
      <label>Nama Checklist</label>
      <input type="text" name="NamaChecklist" placeholder="Nama Checklist">
    </div>
    <div class="grouped fields">
    <label for="fruit">Jam Pengecekan:</label>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="Jam" checked="checked" tabindex="0" value="Setiap Jam">
        <label>Setiap Jam</label>
      </div>
    </div>
    <div class="field" style="width: 100%">
      <div class="ui radio checkbox">
        <input type="radio" name="Jam" tabindex="0" value="Lainnya">
        <label>Lainnya</label>
        
      </div>
      <div class="field" style="margin-left: 25px">
        <input type="text" name="Jam1" placeholder="Tulis Jam disini (03:00, 07:00, 11:00, dst)">
    </div>
    </div>

    <div class="ui small field" >
    <label>Info Checklist</label>
    <input type="file" name="Info" id="fileToUpload">
    
  </div>
  <div class="ui center aligned basic segment">
    <button class="ui blue button" type="submit">
      <i class="plus icon"></i>
    Tambah
  </button>
	</div>
  </form>
</div>
</div>
</div>
</div>
