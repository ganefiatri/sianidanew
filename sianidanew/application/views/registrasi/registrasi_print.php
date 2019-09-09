<!--<link rel="stylesheet" href="--><?php //echo base_url() ?><!--/assets/css/bootstrap.min.css">-->
<script src="<?php echo base_url() ?>/assets/js/jquery.js"></script>
<script src="<?php echo base_url('assets/js/jquery.signaturepad.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/json2.min.js') ?>"></script>
<style>
    th{
        width: 200px;}
    </style>
    <?php
    if (isset($print)) {
        echo '<div>';
    }
    ?>
    <div class="center-block row" style="    padding: 50px;">
    <h1 class="col-md-3" style="
        text-align: center;
        font-size: x-large;
        line-height: 1.5em;
        font-weight: bold;
        margin: auto;
        float:none;
        border: 1px solid;
        padding: 10px;
        ">SURAT PERNYATAAN</h1>
</div>

<?php
$hari = array('', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU');
$bulan = array('', 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER');
?>
<p>Pada hari ini tanggal, <?= date('j', $registrasi->waktu) ?>. Bulan <?= $bulan[date('n', $registrasi->waktu)] ?> Tahun <?= date('Y', $registrasi->waktu) ?>, saya yang bertanda tangan di bawah ini:</p>
<ul style="font-size: 16px;
    font-weight: bolder;">
    <li>Nama : <?= $registrasi->nama ?></li>
    <li>Nomor KTP (NIK) : <?= $registrasi->ktp ?></li>
    <li>Nomor KK : <?= $registrasi->kk ?></li>
    <li>Alamat : <?= $registrasi->alamat ?></li>
</ul>

<p>Dengan ini menyatakan dengan sebenarnya bahwa, <b>Nomor handphone sah milik saya sesuai data identitas (dukcapil)</b>,
    adalah seperti tercantum dalam tabel di bawah ini:</p>
<div class="col-md-12">
    <div class="col-md-6">
        <table class="table table-bordered">
            <thead style="border-bottom: 3px solid #ddd;background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
            <th class="col-md-1">No</th>
            <th>Nomor Handphone</th>
            </thead>
            <?php
            $row = 1;

            foreach ($msisdn as $r) {
                ?>
                <tr>
                    <td>
                        <?php echo $row ?>
                    </td>
                    <td>
                        <?php echo $r->msisdn ?>
                    </td>
                </tr>

                <?php
                $row++;
            }
            ?>

        </table>
    </div>
</div>
<div class="row">
    <div  style="text-align:justified;" class="col-md-12">
        <p>Apabila saya memberikan data yang tidak sesuai dan bertentangan dengan peraturan perundang-undangan, maka saya bersedia menerima segala konsekuensi yang berlaku.</p>
        <p>Demikian surat pernayaan ini dibuat dengan sebenarnya dan untuk digunakan sebagaimana mestinya</p>
    </div>
</div>
<Br>

<div class="col-md-6" style="max-width:250px;">
    <p style="text-align:center;margin-bottom: 0;font-weight: bold;"><?php echo sprintf('%s %s %s', date('d', $registrasi->waktu), $bulan[date('n', $registrasi->waktu)], date('Y', $registrasi->waktu)) ?></p>
    <hr style="    margin: 0px;border: 1px dotted;">
    <div style="text-align:left;">
        <p>Yang bertanda tangan dibawah ini,</p>
        <p>Materai Rp.6000,-</p>
    </div>
</div>
<div class="col-md-12">
    <?php if ($registrasi->digital_sign != null) { ?>
        <div class="col-md-6 row" style="max-width:220px; text-align: center;">
            <div class="sigPad signed">
                <div class="sigWrapper">
                    <canvas class="pad" width="220px"></canvas>
                </div>
            </div>

            <script>
                var sig = <?php echo $registrasi->digital_sign ?>;
                $(document).ready(function() {
                    $('.sigPad').signaturePad({displayOnly: true}).regenerate(sig);
                });
            </script>
            <p>( <?php echo $registrasi->nama ?> )</p>
            <p>NIK :<?= $registrasi->ktp ?> </p>
        </div>
    <?php } else { ?>
        <form id="signform" action="<?php echo site_url('registrasi/sign') ?>" method="post">
            <div class="col-md-6 row" style="max-width:250px; text-align: center;">
                <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">
                <canvas class="pad" width="220px" style="border:1px dashed"></canvas>
                <input type="hidden" id="output" name="output" class="output" value="" required="required">
                <input type="reset" value="Clear" />
                <input type="submit" value="Ok" />
            </div>

            <script>
                (function(window) {
                    var $canvas;

                    $(document).ready(function() {

                        $canvas = $('canvas');

                        $('#signform').signaturePad({
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
        </form>
    <?php } ?>
</div>

<?php
if (isset($print)) {
    echo '</div>';
}
?>

