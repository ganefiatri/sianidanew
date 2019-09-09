<style>
th, td {
  padding: 15px;
  text-align: left;    
} 
</style>
<div>
    <h2 style="text-align:center; padding-bottom:50px;">Form Surat Pernyataan</h2>
    <hr style="color:red">
    <form  method="POST" action="<?php echo site_url('mbanking_controller/sp_input') ?>">
    <input type="hidden" name="tipe2" value="2">
        <table class="">
            <tr>
                <th>Nama Customer</th>
                <td><input class="form-control" name="nama_customer" type="text" placeholder="Nama Customer" required = "required"></td>
            </tr>
            <tr>
                <th>MSISDN</th>
                <td><input class="form-control" type ="number" name = "msisdn_name" placeholder="Nomor Telepon Customer" required = "required"></td>
            </tr>
            <tr>
                <th>NIK</th>
                <td><input class="form-control" name="nik" type="number" placeholder="Nomor NIK KTP Customer" required = "required"></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><textarea class="form-control" name="alamat" id="alamatid" cols="30" rows="5" required = "required"></textarea></td>
            </tr>
            <tr>
                <td><input class="btn btn-primary" type="submit"></td>
            </tr>
            <hr>
        </table>
    </form>
</div>