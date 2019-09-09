 <?php
$x = 1;
while ($x <= 30) {
    ${'val_' . $x} = null;
    $x++;
}
$x = 1;
if ($msisdn != null) {
    foreach ($msisdn as $r) {
        ${'val_' . $x} = $r->msisdn;
        $x++;
    }
}
?>
<style>
    p,th,td{
        font-size: 12px;
    }
    td.f4{
        border-bottom:  1px solid #000;
    }
</style>

<link rel="stylesheet" href="<?php echo base_url() ?>/assets/templates/bower_components/bootstrap/dist/css/bootstrap.min.css">
<script src="<?php echo base_url() ?>/assets/templates/bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo base_url('assets/jsignaturepad/jquery.signaturepad.min.js') ?>"></script>
<script src="<?php echo base_url('assets/jsignaturepad/json2.min.js') ?>"></script>
<style>
    th{
        /*width: 200px;*/
    }
    </style>
    <?php
    if (isset($print)) {
        echo '<div>';
    }
    ?>
    <div class="center-block row">
    <img src="<?= base_url('assets/img/header_232.jpg') ?>" class="img-responsive" style="    width: 100%;"></div>
<?php
$hari = array('', 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'SABTU', 'MINGGU');
$bulan = array('', 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER');
?>
<table>
    <tr>
        <td class="" style="width: 550px; padding-top: 50px">NIK Pelanggan <i>ID Card Number</i> <span style="">:</span></td>
        <td class=""><?= $registrasi->ktp ?></td>
    </tr>
    <tr>
        <td class="">Masa Berlaku <i>Valid through</i> <span style="float: right;">:</span></td>
        <td class="">
            <?php
            $ktplifetime = array('', '', '');
            if ($registrasi->ktplifetime < 1) {
                $ktplifetime[0] = 'checked';
            } else {
                $ktplifetime[1] = 'checked';
                $ktplifetime[2] = date('d / m / Y', $registrasi->ktplifetime);
            }
            ?>
            <label><input type="checkbox" value="" <?= $ktplifetime[0] ?>>Seumur Hidup <i>a Lifetime ID</i></label>
            <label><input type="checkbox" value="" <?= $ktplifetime[1] ?>>Tgl/Bln/Thn <i>Date/Month/Year</i> : <?= $ktplifetime[2] ?></label>
        </td>
    </tr>
    <tr>
        <td class="">Nama Pelanggan <i>Customer Name</i> <span style="float: right;">:</span></td>
        <td class=""><?= $registrasi->nama ?></td>
    </tr>
    <tr>
        <?php
        $gender = array('', '');
        if ($registrasi->gender == 'MALE') {
            $gender[0] = 'checked';
        } else {
            $gender[1] = 'checked';
        }
        ?>
        <td class="">Jenis Kelamin <i>Gender</i> <span style="float: right;">:</span></td>
        <td class="">
            <label><input type="checkbox" value="" <?= $gender[0] ?>>Laki-laki <i>Male</i></label>
            <label><input type="checkbox" value="" <?= $gender[1] ?>>Perempuan <i>Female</i></label>
        </td>
    </tr>
    <tr>
        <td class="">Alamat sesuai Identitas <i>Address</i> <span style="float: right;">:</span></td>
        <td class=""><?= $addrbyktp[0] ?>
            <div class="">
                <?= $addrbyktp[1] ?> / <?= $addrbyktp[2] ?> / <?= $addrbyktp[3] ?>
            </div>
        </td>
    </tr>
    <tr>
        <td class="">Alamat Domisili <i>Address</i> <span style="float: right;">:</span></td>
        <td class=""><?= $addrbyktp[0] ?>
            <div class="">
                <?= $addr[1] ?> / <?= $addr[2] ?> / <?= $addr[3] ?>
            </div>
        </td>
    </tr>
    <tr>
        <td class="">Tempat/ Tanggal Lahir <i>Place/Date of Birth</i> <span style="float: right;">:</span></td>
        <td class="">
            <div class="">
                <?= $registrasi->birthplace ?>
            </div>
            <div class="">
                Tgl/Bln/Thn <i>Date/Month/Year</i> :  <?= date('d / m / Y', $registrasi->birthdate) ?>
            </div>
        </td>
    </tr>
    <tr>
        <td class="">Kewarganegaraan <i>Nationality</i> <span style="float: right;">:</span></td>
        <td class=""><?= $registrasi->nationality ?></td>
    </tr>
</table>

<div class="col-md-12">
    <b>>> <span class="text-danger">DAFTAR MSISDN</span> LIST of MSISDN</b>
    <table class="table table-bordered table table-bordered table-condensed">
        <thead>
            <tr>
                <th style="width:1%">NO</th>
                <th>MSISDN</th>
                <th style="width:1%"">NO</th>
                <th >MSISDN</th>
                <th style="width:1%">NO</th>
                <th >MSISDN</th>
            </tr>
        </thead>

        <?php
        $row = 1;
        while ($row <= 10) {
            $t2 = $row + 10;
            $t3 = $row + 20;
            ?>
            <tr>
                <td><?= $row ?> </td>
                <td>
                    <?= ${'val_' . $row} ?>
                </td>
                <td><?= $row + 10 ?> </td>
                <td>
                    <?= ${'val_' . $t2} ?>
                </td>
                <td><?= $row + 20 ?> </td>
                <td>
                    <?= ${'val_' . $t3} ?>
                </td>
            </tr>

            <?php
            $row++;
        }
        ?>
    </table>
</div>
<div class="col-md-12">
    <b>>> <span class="text-danger">PERUNTUKAN NOMOR MSISDN (Diisi jika MSISDN >10)</span> PURPOSE of MSISDN (Filled if MSISDN >10)</b>
    <div class="col-md-12" style="border:1px solid">
        <label><input type="checkbox" value="">M2M</label>
        <label><input type="checkbox" value="">Corporate</label>
        <label><input type="checkbox" value="">Community</label>
        <label><input type="checkbox" value="">Lain-Lain/Others :</label>
    </div>
</div>

<div class="col-md-12">
    <b>>> <span class="text-danger">Pernyataan</span> STATEMENT</b>
    <div>Menyatakan <i>State as follows </i><br><?= $registrasi->statement ?>]</div>
</div>
<hr>
<div class="col-md-12">
    <p>Demikian pernyataan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya sesuai dengan pernyataan di atas.</p>
    <p style="    font-style: italic;">Thus this Statement was made in truth to be used as necessary in accordance to above statement</p>
    <p style="float:right;font-weight: bold;font-style: italic;"><?= date('d,m,Y', $registrasi->waktu) ?></p>
</div>

<table style="width:100%;">
    <td style="width: 30%;text-align: center;">
        <p style="font-weight:bold">Petugas</p>
        <p style="font-style:italic">Officer</p>
        <img src="<?php echo base_url('sign/cs/' . $this->ion_auth->user($registrasi->author)->row()->username . '.png') ?>" style="min-height: 150px; height: 150px;"/>
        <p><?php echo sprintf('( %s )', $this->ion_auth->user($registrasi->author)->row()->full_name) ?></p>
        <p><b>Nama Lengkap/</b> <i>Full Name</i></p>
    </td>
    <td style="width: 30%;text-align: center;">
        <p style="font-weight:bold">Spv. GraPARI</p>
        <p style="font-style:italic">Spv. GraPARI</p>
        <img src="<?php echo base_url('sign/spv.png') ?>" style="min-height: 150px; height: 150px;"/>
        <p>(HENDRIQUES W PANDIA)</p>
        <p><b>Nama Lengkap/</b> <i>Full Name</i></p>
    </td>

    <td style="width: 30%;text-align: center;">
        <?php if ($registrasi->digital_sign != null) { ?>

            <div class="" style="max-width:220px; text-align: center;">
                <p style="font-weight:bold">Pelanggan</p>
                <p style="font-style:italic">Customer</p>
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
                <p><b>Nama Lengkap/</b> <i>Full Name</i></p>
            </div>
        <?php } else { ?>

            <form id="signform" action="<?php echo site_url('regprepaid/sign') ?>" method="post">
                <div class="" style="max-width:250px; text-align: center;">
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
    </td>
</table>


<?php
if (isset($print)) {
    echo '</div>';
}
?>

