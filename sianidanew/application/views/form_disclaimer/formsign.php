<script src="<?php echo base_url() ?>/assets/templates/bower_components/jquery/dist/jquery.js"></script>
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans:400,400i,700,700i" rel="stylesheet">
<style>
    body{
        font-family: Lato;
        font-size: 14px;
        color: #000;
    }

    p{
        line-height: 30px;
    }
</style>
<?php
$i = $this->input;
$hari = array('', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu');
$bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
if (isset($data)) {
    $waktu = $data->date;
    $msisdn_name = $data->msisdn_name;
    $msisdn_number = $data->msisdn;
    $msisdn_nik = $data->msisdn_nik;
    $ttl = $data->msisdn_tempatlahir . ' / ' . $data->msisdn_tanggallahir;
    $alamat = $data->msisdn_alamat;
    $nkk = $data->msisdn_nomorkk;
} else {
    $waktu = time();
    $msisdn_name = $i->get('msisdn_name');
    $msisdn_number = $i->get('msisdn_number');
    $msisdn_nik = $i->get('nomor_induk');
    $ttl = urldecode($i->get('tempat_lahir')) . ' / ' . urldecode($i->get('tanggal_lahir'));
    $alamat = urldecode($i->get('alamat')) . '<br> ' . urldecode($i->get('alamat2')) . '<br> ' . urldecode($i->get('alamat3'));
    $nkk = urldecode($i->get('nkk'));
}
?>
<style>
    th, td {
        padding: 10px;
        text-align: left;
    }
</style>
<div class="col-md-12" style="max-width: 1000px;">
    <form method="POST" action="">
        <div class="box">
            <div class="box-body" style="font-size: 16px; padding:50px;    border: 1px solid;">
                <p style="font-size: 28px"align="center" style="text-decoration: underline">SURAT PERNYATAAN ( DISCLAIMER )</p>
                <br>
                <span>
                    <?php
                    echo sprintf('Pada hari ini, %s tanggal %d bulan %s tahun %s Saya yang bertanda tangan dibawah ini: '
                            , $hari[date('w', $waktu)], date('j', $waktu), $bulan[date('n', $waktu)], date('Y', $waktu))
                    ?>
                </span>
                <br>
                <br>
                <?php
                echo sprintf(
                        '<table>
                <tr><td>Nama Lengkap</td><td>: %s</td></tr>
                <tr><td>MSISDN</td><td>: %s</td></tr>
                <tr><td>Nomor Induk Kependudukan ( NIK ) </td><td>: %s</td></tr>
                <tr><td>Tempat / Tanggal lahir</td><td>: %s</td></tr>
                <tr><td>Alamat Lengkap</td><td>: %s</td></tr>
                <tr><td>Nomor Kartu Keluarga</td><td>: %s</td></tr>
            </table>'
                        , $msisdn_name, $msisdn_number, $msisdn_nik, $ttl, $alamat, $nkk);
                ?>
                <br>
                <p>Dengan ini menyatakan bahwa untuk keperluan registrasi pelanggan jasa telekomunikasi sebagaimana diatur dalam perundang-undangan, data-data yang saya sampaikan diatas benar sehingga saya bertanggung jawab atas seluruh akibat hukum yang ditimbulkan dan saya secara berkala akan melakukan registrasi ualng untuk memastikan bahwa data-data yang saya sampaikan tervalidasi.</p>
                <br>
                <br>
                <p> Demikian surat pernyataan ini dibuat dengan sebenarnya untuk digunakan sebagaimana mestinya.</p>
                <p><b>Medan, <?php echo sprintf('%s %s %s', date('d', time()), $bulan[date('n', time())], date('Y', time())) ?></b></p>
                <?php if (isset($data)) { ?>
                    <div class="sigPad signed">
                        <div class="sigWrapper">
                            <canvas class="pad" width="220px"></canvas>
                        </div>
                    </div>

                    <script>
                        var sig = <?php echo $data->digital_sign ?>;
                        $(document).ready(function() {
                            $('.sigPad').signaturePad({displayOnly: true}).regenerate(sig);
                        });
                    </script>
                    <?php echo $msisdn_name ?>
                <?php } else { ?>
                    <canvas class="pad" width="220px" style="border:1px dashed"></canvas>
                    <input type="reset" value="Clear" />
                    <input type="hidden" id="output" name="output" class="output" value="" required="required">
                    <script>
                        (function(window) {
                            var $canvas;

                            $(document).ready(function() {
                                $canvas = $('canvas');

                                $('form').signaturePad({
                                    drawOnly: true,
                                    defaultAction: 'drawIt',
                                    validateFields: false,
                                    lineWidth: 0,
                                    output: '#output',
                                    sigNav: null,
                                    name: null,
                                    typed: null,
                                    clear: 'input[type=reset]',
                                    typeIt: null,
                                    drawIt: null,
                                    typeItDesc: null,
                                    drawItDesc: null
                                });
                            });
                        }(this));
                    </script>
                    <p><?php echo $i->get('msisdn_name'); ?></p>
                    <input type="submit" value="Save">
                    <button type="button" onclick="goBack()">Back to edit</button>
                <?php } ?>

            </div>
        </div>

    </form>

</div>
<script>
    function goBack() {
        window.history.go(-1);
    }
</script>
<script src="<?php echo base_url('assets/jsignaturepad/jquery.signaturepad.min.js') ?>"></script>

<script src="<?php echo base_url('assets/jsignaturepad/json2.min.js') ?>"></script>
