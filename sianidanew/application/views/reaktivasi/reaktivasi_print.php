<link rel="stylesheet" href="<?php echo base_url() ?>/assets/templates/bower_components/bootstrap/dist/css/bootstrap.min.css">
<script src="<?php echo base_url() ?>/assets/templates/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url('assets/jsignaturepad/jquery.signaturepad.min.js') ?>"></script>
<script src="<?php echo base_url('assets/jsignaturepad/json2.min.js') ?>"></script>
<style>
    th{
        width: 200px;}
    </style>
    <?php
    if (isset($print)) {
        echo '<div>';
    }
    ?>
    <h1 style="
    text-align: center;
    font-size: x-large;
    line-height: 1.5em;
    font-weight: bold;
    margin: 30px;
    ">SURAT PERNYATAAN <br> PERMINTAAN REAKTIVASI KARTU HALO</h1>


<?php
$hari = array('', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU');
$bulan = array('', 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER');
?>
<p style = "font-size:14px">Saya yang bertanda tangan dibawah ini :</p>
<div class="col-md-12" style="margin-bottom: 10px">
    <table class="col-md-6">
        <tr>
            <td style="width: 120px;">Nama </td>
            <td>: <?php echo $logbook->nama ?></td>
        </tr>

        <tr>
            <td style="width: 120px;">MSISDN</td>
            <td>: <?php echo $logbook->msisdn ?></td>
        </tr>
    </table>
</div>
<table class="table table-bordered">
    <thead style="border-bottom: 3px solid #ddd;background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
    <th>FITUR SEBELUM TERMINASI(*)</th>
    <th>FITUR YANG AKAN DIAKTIFKAN KEMBALI(*)</th>
</thead>
<?php
$row = 1;
while ($row <= 6) {
    if ($logbook->{"col1_$row"} != NULL OR $logbook->{"col2_$row"} != null) {
        ?>
        <tr>
            <td>
                <?php echo $logbook->{"col1_$row"} ?>
            </td>
            <td>
                <?php echo $logbook->{"col2_$row"} ?>
            </td>
        </tr>

        <?php
    }
    $row++;
}
?>

</table>
<b>(*) Fitur Data & VAS</b>
<br>
<p style="font-size:14px">
    Dengan ini menyatakan bahwa saya mengajukan permohonan <b>REAKTIVASI</b> untuk nomor KartuHALO tersebut dengan fitur tambahan yang tertera pada tabel diatas. Apabila dikemudian hari terjadi permasalah degan penggunaan nomor KartuHalo tersebut, maka saya bertanggung jawab sepenuhnya atas biaya pemakaian yasng timbul
</p>
<p style="font-size:14px">
    Demikian surat pernyataan ini saya buat dengan sebenar-benarnya untuk dapat dipergunakan sebagaiman mestinya.
</p>


<Br>

<div class="col-md-12">
    <?php if ($logbook->digital_sign != null) { ?>
        <div class="col-md-6 row" style="max-width:220px; text-align: center;">
            <?php echo date('d / F / Y', $logbook->waktu) ?>
            </br>Dibuat Oleh <br>
            <div class="sigPad signed">
                <div class="sigWrapper">
                    <canvas class="pad" width="220px"></canvas>
                </div>
            </div>

            <script>
                var sig = <?php echo $logbook->digital_sign ?>;
                $(document).ready(function() {
                    $('.sigPad').signaturePad({displayOnly: true}).regenerate(sig);
                });
            </script>
            <p>(<?php echo $logbook->nama ?>)</p>

        </div>
    <?php } else { ?>
        <form action="<?php echo site_url('ReaktivasiKartuHalo/sign') ?>" method="post">
            <div class="col-md-6 row" style="max-width:220px; text-align: center;">
                <?php echo date('d / F / Y', $logbook->waktu) ?>
                </br>Dibuat Oleh <br>
                <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">
                <canvas class="pad" width="220px" style="border:1px dashed"></canvas>
                <input type="hidden" id="output" name="output" class="output" value="" required="required">
                <input type="reset" value="Clear" />
                <input type="submit" value="Ok" />


            </div>
        </form>
    <?php } ?>
    <div class="col-md-4 pull-right">
        <table class="table table-bordered table-condensed">
            <thead>
            <th>Review SPV</th>
            <th>Tanggal</th>
            </thead>
            <tr>
                <td><img style="width: 120px; " src="<?php echo base_url('sign/spv.png') ?>"/></td>
                <td><?php echo date('d/m/Y', $logbook->waktu) ?></td>
            </tr>
        </table>
    </div>
</div>

<?php
if (isset($print)) {
    echo '</div>';
}
?>

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