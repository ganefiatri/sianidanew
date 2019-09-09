<!DOCTYPE html>

<html>

<head>

  <title>Import Excel</title>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>

 <div class="container">
  <h3 align="center">Data Grapari</h3>
    <div>
        <p>Noted</p>
        <h5>*Dont import same data excel twice, tq</h5>
        <h5>*Not all excel data, you can import,</h5>
    </div>
  <form method="post" action="<?php echo base_url();?>excel_import/upload/" enctype="multipart/form-data">
 
     <p><label>Pilih File Excel</label>

     <input type="file" name="file" required accept=".xls, .xlsx" /></p>

     <br />

     <input type="submit" value="Import" class="btn btn-info" />

  </form>
<br><br>
    <h4>Grapari Own</h4>
    <div><a class="btn btn-info" href="https://10.33.26.97/formdisclaimer/Excel_import/grapari">Click here to see data</a></div>
  <br />
    <h4>Grapari Mitra</h4>
    <div><a class="btn btn-info" href="https://10.33.26.97/formdisclaimer/Excel_import/graparimitra">Click here to see data</a></div>
  <br />
    <h4>Grapari Loop</h4>
    <div><a class="btn btn-info" href="https://10.33.26.97/formdisclaimer/Excel_import/grapariloop">Click here to see data</a></div>
  <br />
    <h4>Grapari GTG</h4>
    <div><a class="btn btn-info" href="https://10.33.26.97/formdisclaimer/Excel_import/graparigtg">Click here to see data</a></div>
  <!-- <div class="table-responsive" id="customer_data">

  </div> -->

 </div>
</body>

</html>

 

<!-- <script>

$(document).ready(function(){ 
  load_data();
  function load_data(){
    $.ajax({
      url:"https://10.33.26.97/formdisclaimer/excel_import/fetch",
      method:"POST",
      success:function(data){
        $('#customer_data').html(data);
        console.log(data);
      }
    })
  }

$('#import_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"https://10.33.26.97/formdisclaimer/excel_import/import",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data){
          console.log(data);
        $('#file').val('');
        load_data();
      }
    })
  });
});
</script> -->