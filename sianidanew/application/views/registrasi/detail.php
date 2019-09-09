<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<?php
$x = 1;
while ($x <= 6) {
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
<!--    test-->
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
                            <table width="">
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
                                    <td>Alamat</td>
                                    <td>: <?php echo $registrasi->alamat ?></td>
                                </tr>
                            </table>

                        </div>
                        <div class="col-md-6">
                            <form action="<?= site_url('Registrasi/simpannomor') ?>" method="post">
                                <input type="hidden" name="id" value="<?= $registrasi->id ?>">
                                <table class="table">
                                    <thead style="border-bottom: 3px solid #ddd;background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
                                    <th></th>
                                    <th>Nomor Telepon</th>
                                    </thead>
                                    <?php
                                        $row = 1;
                                        while ($row <= 6) {
                                        ?>

                                        <tr>
                                            <td><?= $row ?> </td>
                                            <td>
                                                <input name="msisdn_<?= $row ?>" value="<?= ${'val_' . $row} ?>" class="form-control" type="name">
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
                <a href="<?php echo site_url('registrasi/r_print/' . $this->uri->segment(3, 0)) ?>">Print</a>
                <?php $this->load->view('registrasi/registrasi_print') ?>
            </div>
        </div>
    </section>
</div>

<!-- --><?php //echo $this->pagination->create_links(); ?>
<?php $this->load->view('dist/_partials/js'); ?>




