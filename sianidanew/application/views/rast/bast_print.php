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
    text-decoration: underline;
    line-height: 1.5em;
    font-weight: bold;
    margin: 30px;
    margin-bottom: 5px;
    ">BERITA ACARA SERAH TERIMA PERANGKAT<br>DARI PELANGGAN KE  PETUGAS GTG MEDAN </h1>

<?php
echo sprintf('<p style="text-align:center;font-weight:bold;font-size:12px">No. %s / GTG MEDAN / %d.%d', $penutupan->id, date('n'), date('Y', $penutupan->tanggal));
?>
<?php
$hari = array('', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU');
$bulan = array('', 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER');
?>
<?php
echo sprintf('<p style="font-size:12px">Pada hari ini %s Tanggal %d Bulan %d Tahun %d, Kami yang bertanda tangan dibawah ini :</p>', $hari[date('N', $penutupan->tanggal)], date('d', $penutupan->tanggal), date('n', $penutupan->tanggal), date('Y', $penutupan->tanggal));
?>
<div class="col-md-12" style="margin-bottom: 10px">
    <table class="col-md-6 col-md-offset-3">
        <tr>
            <td style="width: 120px;">Nama </td>
            <td>: <?php echo $this->ion_auth->user($logbook->author)->row()->full_name ?></td>
        </tr>
        <tr>
            <td style="width: 120px;">NIK</td>
            <td>: <?php echo $this->ion_auth->user($logbook->author)->row()->username ?></td>
        </tr>
        <tr>
            <td style="width: 120px;">JABATAN</td>
            <td>: CA</td>
        </tr>
        <tr>
            <td style="width: 120px;">Alamat</td>
            <td>: GRAHA MERAH PUTIH LT 1, JL PUTRI HIJAU NO.1</td>
        </tr>
    </table>
</div>

<p style="font-size:12px">
    Dalam hal ini bertindak untuk dan atas nama PT. Telekomunikasi Indonesia, Tbk (PT. Telkom) yang selanjutnya disebut PIHAK PERTAMA
</p>


<div class="col-md-12" style="margin-bottom: 10px">
    <table class="col-md-6 col-md-offset-3">
        <tr>
            <td style="width: 120px;">Nama </td>
            <td>: <?php echo $logbook->nama_plgn ?></td>
        </tr>
        <tr>
            <td style="width: 120px;">Nomor Telepon</td>
            <td>: <?php echo $logbook->msisdn ?></td>
        </tr>
        <tr>
            <td style="width: 120px;">Nomor Internet</td>
            <td>: <?php echo $logbook->internet_no ?></td>
        </tr>
        <tr>
            <td style="width: 120px;">Alamat</td>
            <td>: <?php echo $penutupan->alamat ?></td>
        </tr>
    </table>
</div>


<p style="font-size:12px">
    Dalam hal ini bertindak untuk dan atas nama Pelanggan <?php echo $logbook->nama_plgn ?> yang selanjutnya disebut PIHAK KEDUA.
</p>


<p style="font-size:12px">
    PIHAK KEDUA menyerahkan barang kepada PIHAK PERTAMA, dan PIHAK PERTAMA menyatakan telah menerima perangkat dari PIHAK KEDUA berupa daftar terlampir :
</p>
<div class="col-md-12">
    <table class="table table-condensed">
        <thead>
        <th>Nama Perangkat</th>
        <th>Merk Perangkat</th>
        <th>S/N</th>
        </thead>
        <tr>
            <td>MODEM</td>
            <td><?php echo $penutupan->jenis_modem ?></td>
            <td><?php echo $penutupan->serial_number ?></td>
        </tr>
        <tr>
            <td>STB</td>
            <td><?php echo $penutupan->merk_stb ?></td>
            <td><?php echo $penutupan->sn_stb ?></td>
        </tr>
    </table>

    <hr style="
        border: 1px solid#ccc;
        margin: 0px;
        ">
    <table class="table table-condensed">
        <thead>
        <th>Adaptor</th>
        <th>Remote</th>
        <th>Kabel HDMI/RCA</th>
        </thead>
        <tr>
            <td><?php echo $at[$penutupan->adaptor] ?></td>
            <td><?php echo $at[$penutupan->remote] ?></td>
            <td><?php echo $at[$penutupan->kabel] ?></td>
        </tr>
    </table>
</div>
<p style="font-size:12px">
    Demikianlah berita acara serah terima perangkat ini di perbuat oleh kedua belah pihak, sejak penandatanganan berita acara ini, maka perangkat tersebut, menjadi tanggung jawab PIHAK PERTAMA.
</p>

<Br>
<table style="width:100%;">
    <td style="width: 50%">
        <p>Yang Menerima :</p>
        <p>PIHAK PERTAMA</p>
        <img src="<?php echo base_url('sign/cs/' . $this->ion_auth->user($logbook->author)->row()->username . '.png') ?>" style="min-height: 150px; height: 150px;"/>
        <p><?php echo sprintf('( %s )', $this->ion_auth->user($logbook->author)->row()->full_name) ?></p>
    </td>
    <td style="width: 50%; float:right;">
        <form method="POST" action="<?php echo site_url('logbook/bast_sign') ?>">
            <p>Yang Menyerahkan :</p>
            <p>PIHAK KEDUA</p>
            <?php if ($penutupan->digital_sign != null) { ?>
                <div class="sigPad signed" style="margin-left:-100px;">
                    <div class="sigWrapper">
                        <canvas class="pad" width="220px"></canvas>
                    </div>
                </div>

                <script>
                    var sig = <?php echo $penutupan->digital_sign ?>;
                    $(document).ready(function() {
                        $('.sigPad').signaturePad({displayOnly: true}).regenerate(sig);
                        const data = $('.sigPad').signaturePad.toDataURL();
                        signaturePad.clear();
                        signaturePad.fromDataURL(data);
                    });
                </script>
            <?php } else { ?>
                <input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id">
                <div class="col-md-12">
                    <canvas class="pad" width="220px" style="border:1px dashed"></canvas>
                </div>
                <div class="col-md-12">
                    <input type="reset" value="Clear" />
                    <input type="submit" value="Ok" />
                </div>
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
            <?php } ?>
            <p style=""><?php echo sprintf('( %s )', $logbook->nama_plgn) ?></p>
        </form>
    </td>
</table>

<?php
if (isset($print)) {
    echo '</div>';
}
?>