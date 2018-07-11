<html><head>
    <meta charset="UTF-8">
    <title>Lihat Checklist</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css">
</head>
<body>
    <table class="ui celled table" style="margin-top: 20px; margin-left: 20px; width: 80%">
    <thead>
    <tr>
    <th>No</th>
    <th>Nama Checklist</th>
    <th>Info Checklist</th>
    <th>Jam Pengecekan</th>
    <th>Edit</th>
    <th>Status</th></tr>
    </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Checklist PLN</td>
      <td>Cell</td>
      <td>Cell</td>
      <td>
        <form method="POST" action="<?php echo site_url('admin/editchecklist'); ?>">
        <button class="ui basic blue button">
            <i class="icon edit"></i>
                Edit
        </button>
      </td>
      <td>
        <select class="ui small dropdown">
            <option value="1">Enable</option>
            <option value="0">Diasable</option>
        </select></td>
    </tr>
</form>
    

    
  </tbody>
  <tfoot>
    <tr> <th colspan="6">
    <form method="POST" action="<?php echo site_url('admin/tambahchecklist'); ?>">
      <div class="ui right aligned basic segment">
      <button class="ui labeled icon button">
      <i class="plus icon"></i>
        Tambah Checklist
    </button>
    </th>
  </tr></tfoot>
</table>


    
