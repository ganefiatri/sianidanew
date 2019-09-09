<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>View</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item"><a href="#">Reaktivasi Kartu Halo</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td class="">MSISDN / Nomor Telepon</td>
                                <td class="">: <?php echo $logbook->msisdn ?></td>
                            </tr>

                            <tr>
                                <td class="">Customer name</td>
                                <td class="">: <?php echo $logbook->nama ?></td>
                            </tr>

                        </table>

                        <table class="table table-bordered">
                            <thead style="border-bottom: 3px solid #ddd;background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
                            <th>FITUR SEBELUM TERMINASI(*)</th>
                            <th>FITUR YANG AKAN DIAKTIFKAN KEMBALI(*)</th>
                            </thead>
                            <?php
                            $row = 1;
                            while ($row <= 6) {
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
                                $row++;
                            }
                            ?>

                        </table>




                    </div>
                </div>
            </div>

            <div class="col-md-12" style="background:#fff">
                <a href="<?php echo site_url('ReaktivasiKartuHalo/r_print/' . $this->uri->segment(3, 0)) ?>">Print</a>
                <?php $this->load->view('reaktivasi/reaktivasi_print') ?>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>





