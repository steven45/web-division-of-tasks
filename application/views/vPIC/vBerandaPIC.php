
<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
    <div class="ui segment" style="padding: 10px; border-radius: 1.285714rem">
      
      
    <div class="segment">
      <div class="ui icon input" style="margin-left: 20px">
        <input type="text" placeholder="Search..." id="pencarian">
        <i class="circular search link icon"></i>
      </div>
      
      <h3 style="text-align: center; margin-top: -30px;">
      <div class="ui icon">
        <i class="clock icon"></i>
        L O G 
      </h3>
        <div class="ui right calendar" style="margin-left: 765px; margin-top: -45px">
          <div class="ui input left icon">
            <i class="calendar icon"></i>
            <input type="date" value="<?php echo date('20y-m-d') ?>" id="kalender">
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
            <th>PIC Yang Mengecek</th>
            <th>Istruksi Pengerjaan</th>
            <th>Status</th>
            <th>Keterangan</th>
            </tr>
          </thead>
          <tbody id="hasilLog">
            <?php $temp = 1; ?>
            <?php foreach ($log as $log): ?>
                <tr>
                  <td><?php echo $temp; $temp = $temp +1; ?></td>
                  <td><?php echo $log['Jam'] ?></td>
                  <td><?php echo $log['Waktu'] ?></td>
                  <td><?php echo $log['NamaChecklist'] ?></td>
                  <td><?php echo $log['NamaPIC'] ?></td>
                  <td><?php echo $log['PICCek'] ?></td>
                  <td>
                     <?php 
                      $nInfo = NULL;
                      $k = 0;
                      $fh = fopen($log['Info'], 'r');
                      while(!feof($fh)){
                       $nInfo[$k] = fgets($fh);
                       $k = $k +1;
                      }
                      
                    ?>

                    <a href="#" data-featherlight=" <?php echo '#bio-name'.$temp ?>">Lihat</a>
                      <div style="display:none;">
                        <div id="<?php echo 'bio-name'.$temp ?>">
                          <h3>Info Checklist</h3>
                          <div class="ui segment">
                           <?php foreach ($nInfo as $info) {
                              echo '<p>'.$info.'</p>';
                            } ?> 
                          </div>
                        </div>
 
                      </div>
                  </td>
                  <?php if ($log['Status'] == 'OK') {?>
                  <td style="background-color: #90EE90 ;"><b>OK</b></td>
                  <?php } else if($log['Status'] == 'Bad') {?>
                    <td style="background-color:  #f5ae70;"><b>Bad</b></td>
                  <?php } else if($log['Status'] == 'Not Checked'){?>
                    <td style="background-color: tomato;"><b>Not Checked</b></td>
                  <?php } ?>
                  </td>
                  <td>
                     <a href="#" data-featherlight="<?php echo '#lihatKet'.$temp ?>">Lihat</a>
                      <div style="display:none;">
                        <div id="<?php echo 'lihatKet'.$temp ?>">
                          <h3>Keterangan</h3>
                          <div class="ui segment">
                            <?php echo $log['Keterangan'] ?>
                          </div>
                        </div>
                      </div>
                  </td>
                </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr> 
            <th colspan="9">
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


<script type="text/javascript">
  kalender =  $('#kalender').val();
  $("#hasilLog tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(kalender) > -1);
  });
  $('#kalender').on("change",function(){
    kalender =  $('#kalender').val();
    $("#hasilLog tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(kalender) > -1);
    });
  }); 
</script>