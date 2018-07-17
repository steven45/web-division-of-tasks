
<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
    <div class="ui segment" style="padding: 10px; border-radius: 1.285714rem">
      
      
    <div class="segment">
      <div class="ui icon input" style="margin-left: 0px">
        <input type="text" placeholder="Search...">
        <i class="circular search link icon"></i>
      </div>
      
      <h3 style="text-align: center; margin-top: -30px;">
      <div class="ui icon">
        <i class="clock icon"></i>
        L O G 
      </h3>
        <div class="ui calendar" style="margin-left: 600px; margin-top: -45px">
          <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="date" value="<?php echo date('20y-m-d') ?>">
          </div>
      </div>
      </div>
  
      <div class="ui divider"></div>
    
        <table class="ui sortable celled table" id="example" style="margin-top: 20px; margin-left: 20px; width: 95%">
          <thead>
            <tr>
            <th>No</th>
            <th>Jadwal</th>
            <th>Jam Pengecekan</th>
            <th>Nama Checklist</th>
            <th>Nama PIC</th>
            <th>Info Pengecekan</th>
            <th>Status</th>
            <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>01:00</td>
              <td>01:05</td>
              <td>Checklist PLN</td>
              <td>Panji Nugroho</td>
              <td>
                 <a href="#" data-featherlight="#bio-name">Klik Disini</a>
                  <div style="display:none;">
                    <div id="bio-name">
                      <h3>Info Checklist</h3>
                      <div class="ui segment">
                        Checklist ini adalah checklist yang paling penting. 
                        1. ChecklistPLN
                        2. Checklist ATM B
                      </div>
                    </div>
                  </div>
              </td>
              <td>
                OK
              </td>
              <td>
                 <a href="#" data-featherlight="#bio-name1">Klik Disini</a>
                  <div style="display:none;">
                    <div id="bio-name1">
                      <h3>Keterangan</h3>
                      <div class="ui segment">
                        Checklist ini adalah checklist yang paling penting. 
                        1. ChecklistPLN
                        2. Checklist ATM B
                      </div>
                    </div>
                  </div>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr> 
            <th colspan="8">
            </th> 
            </tr>
          </tfoot>
        </table>
        <br>
        <br>
        <br>
    </div>
  </div>
</div>