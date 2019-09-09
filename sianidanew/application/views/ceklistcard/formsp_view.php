<!-- Script to print the content of a div -->
<script> 
        function printDiv() { 
            var divContents = document.getElementById("formsp").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write('<body >'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script> 
<div style="padding:50px" id="formsp">
    <h1 style="text-align:center">SURAT PERNYATAAN</h1><br><br><br>
    <div>
        <p>Saya yang bertandatangan di bawah ini:</p>
        <br>
        <table class="table">
            <tr>
                <th>Nama</th>
                <td>:  <?= $formsp->nama_customer ?></td>
            </tr>
            <tr>
                <th>Msisdn</th>
                <td>:  <?= $formsp->msisdn ?></td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>:  <?= $formsp->nik ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:  <?= $formsp->alamat ?></td>
            </tr>
        </table>
        <br>
        <p>Pada hari ini tanggal <?php echo date("d", $formsp->date) ?> bulan <?php echo date("m", $formsp->date) ?> tahun <?php echo date("Y", $formsp->date) ?> bertempat di Grapari Telkom Group di Medan
        Dengan ini menyatakan dengan sebenar-benarnya bahwa:
        </p>
        <br>

        <table class="table">
            <tr>
                <th>1</th>
                <td>Saya tidak pernah memiliki ataupun mendaftarkan Msisdn yang saya cantumkan pada surat pernyataan ini untuk keperluan transaksi elektronik Banking.</td>
            </tr>
            <tr>
                <th>2</th>
                <td>Saya membebaskan Telkomsel dari segala tuntutan apapun dikarenakan adanya penyalahgunaan rekening Bank dan atau tabungan yang melekat pada Msisdn yang tertera dalam surat pernyataan ini.</td>
            </tr>
            <tr>
                <th>3</th>
                <td>Saya bertanggungjawab penuh jika ada tuntutan dari Pihak lain terkait rekening Bank yang terdaftar dan atau saya daftarkan dengan Msisdn yang tertera pada surat pernyataan ini.</td>
            </tr>
        </table>
        <br>

        <p>Demikianlah surat pernyataan ini saya buat dengan sebenarnya</p>

        <p>Medan, <?php echo date("d-m-Y", $formsp->date) ?> </p>
        <br><br><br><br><br>
        <p><?= $formsp->nama_customer ?></p>
        <p>Msisdn : <?= $formsp->msisdn ?> </p>
    </div>
</div>
<input style="float:right; margin-right:30px" type="submit" value="Print" onClick="printDiv()">