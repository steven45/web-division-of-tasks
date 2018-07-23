
<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
    <div class="ui segment" style="padding: 10px; border-radius: 1.285714rem">
      
      <div class="segment">
      <div class="ui icon input" style="margin-left: 0px">
        <input type="text" placeholder="Search..." id="pencarian">
        <i class="circular search link icon"></i>
      </div>
      
      <h3 style="text-align: center; margin-top: -30px;">
      <div class="ui icon">
        <i class="clock icon"></i>
        L O G 
      </h3>
        <div class="ui calendar" style="margin-left: 75%; margin-top: -45px">
          <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="date" value="<?php echo date('20y-m-d') ?>" id="kalender">
          </div>
      </div>
      </div>

      <p id="getDate"></p>
      <p id="hehe"></p>
      <p id="haha"></p>
      <div class="ui divider"></div>
        <table class="ui sortable celled table" id="example" style="margin-top: 20px; margin-left: 20px; width: 95%">
          <thead>
            <tr style="text-align: center">
            <th>No</th>
            <th>Jadwal</th>
            <th>Jam Pengecekan</th>
            <th>Nama Checklist</th>
            <th>Nama PIC</th>
            <th>PIC Yang Mengecek</th>
            <th>Info Pengecekan</th>
            <th>Status</th>
            <th>Keterangan</th>
            </tr>
          </thead>
          <tbody id="hasilLog">
          </tfoot>
        </table>
        <br>
        <br>
        <br>
    </div>
  </div>
</div>

  


   

    
