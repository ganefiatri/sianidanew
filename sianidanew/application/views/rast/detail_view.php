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
                <div class="breadcrumb-item"><a href="#">Klaim & Ticketing</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-md-12">
                <div class="box">
                    <h3 style="text-align: center">Detail Klaim & Ticketing</h3><br><br>
                    <div class="box-body" style="">
                        <table class="table">
                            <tr>
                                <td class="">Customer name</td>
                                <td class="">: <?php echo $logbook->namaplgn ?></td>
                            </tr>
                            <tr>
                                <td class="">Jenis Laporan</td>
                                <td class="">: <?php echo $logbook->jenis_tiket ?></td>
                            </tr>
                            <tr>
                                <td class="">No Tiket</td>
                                <td class="">: <?php echo $logbook->no_tiket ?></td>
                            </tr>
                            <tr>
                                <td class="">Nofastel</td>
                                <td class="">: <?php echo $logbook->nofastel ?></td>
                            </tr>
                            <tr>
                                <td class="">Alamat</td>
                                <td class="">: <?php echo $logbook->alamat ?></td>
                            </tr>
                            <tr>
                                <td class="">Dasar Rekomendasi</td>
                                <td class="">: <?php echo $logbook->rekomendasi ?></td>
                            </tr>
                            <tr>
                                <td class="">Permasalahan Pelanggan</td>
                                <td class="">: <?php echo $logbook->permasalahan ?></td>
                            </tr>
                            <tr>
                                <td class="">Menyimpulkan sebagai berikut</td>
                                <td class="">: <?php echo $logbook->kesimpulan ?></td>
                            </tr>
                            <?php
                            $user = $this->session->userdata('username');
                            if($user == "henriques" || $user == "admin" || $user == "13009332" || $user == "medihafiz" || $user == "15009624" || $user == "18009334") { ?>
                                <form method="POST" action="<?php echo site_url('Rast/cek'); ?>" >
                                    <tr>
                                        <td><input type="hidden" value="<?php echo $this->uri->segment(3, 0); ?>" name="id"></td>
                                        <td style="padding-top: 20px;">
                                            <select style="margin-left:25px;padding:10px" class="" name="cek" id="cek">
                                                <option value="0">NOT APPROVE</option>
                                                <option value="1">APPROVE</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="padding-top: 20px;">
                                            <input type="submit" style="float: right" class="btn" value="Kirim">
                                        </td>
                                    </tr>
                                </form>
                            <?php } ?>

                        </table>

                        <!-- <table class="table table-bordered">
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

            </table> -->




                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- <div class="col-md-12" style="background:#fff">
    <a href="<?php echo site_url('ReaktivasiKartuHalo/r_print/' . $this->uri->segment(3, 0)) ?>">Print</a>
    <?php $this->load->view('reaktivasi/reaktivasi_print') ?>
</div> -->



<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>


