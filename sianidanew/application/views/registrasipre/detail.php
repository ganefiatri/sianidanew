<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
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
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Registrasi Prepaid</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Views</a></div>
                <div class="breadcrumb-item">Registrasi Prepaid</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table width="100%">
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?php echo $registrasi->nama ?></td>
                                    </tr>

                                    <tr>
                                        <td>KTP</td>
                                        <td>: <?php echo $registrasi->ktp ?></td>
                                    </tr>

                                    <tr>
                                        <td>KK</td>
                                        <td>: <?php echo $registrasi->kk ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Sesuai Identitas</td>
                                        <td><?php echo sprintf('%s / %s / %s / %s', $addrbyktp[0], $addrbyktp[1], $addrbyktp[2], $addrbyktp[3]) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Domisili</td>
                                        <td><?php echo sprintf('%s / %s / %s / %s', $addr[0], $addr[1], $addr[2], $addr[3]) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat / Tanggal Lahir</td>
                                        <td><?php echo sprintf('%s / %s ', $registrasi->birthplace, date('d M Y', $registrasi->birthdate)) ?></td>
                                    </tr>
                                </table>
                                <?php
                                $group = $this->ion_auth->get_users_groups()->row()->id;
                                if ($group == 1) {
                                    $this->load->view('gallery/takesnapshot.php');
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                            <form action="<?= site_url('regprepaid/simpannomor') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $registrasi->id ?>">
                                <table class="table table-bordered">
                                    <thead style="border-bottom: 3px solid #ddd;background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
                                    <th></th>
                                    <th colspan="3">Nomor Telepon</th>

                                    </thead>

                                    <?php
                                    $row = 1;
                                    while ($row <= 10) {
                                        $t2 = $row + 10;
                                        $t3 = $row + 20;
                                        ?>
                                        <tr>
                                            <th scope="row"><?= $row ?> </th>
                                            <td>
                                                <input name="msisdn_<?= $row ?>" value="<?= ${'val_' . $row} ?>" class="form-control" type="name">
                                            </td>
                                            <td>
                                                <input name="msisdn_<?= $row + 10 ?>" value="<?= ${'val_' . $t2} ?>" class="form-control" type="name">
                                            </td>
                                            <td>
                                                <input name="msisdn_<?= $row + 20 ?>" value="<?= ${'val_' . $t3} ?>" class="form-control" type="name">
                                            </td>
                                        </tr>

                                        <?php
                                        $row++;
                                    }
                                    ?>
                                </table>
                                <input class="btn btn-primary btn-block" type="submit">
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="background:#fff">
                <a href="<?php echo site_url('regprepaid/r_print/' . $this->uri->segment(3, 0)) ?>">Print</a>
                <?php $this->load->view('registrasipre/registrasi_print') ?>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/js'); ?>



