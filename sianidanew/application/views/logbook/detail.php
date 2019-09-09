<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script src="<?php echo base_url('assets/pdfobject.js') ?>"></script>

</script>
<div class="main-content">
      <section class="section">
            <div class="section-header">
                <h1>View</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item"><a href="#">Logbook</a></div>
                    <div class="breadcrumb-item">View</div>
                </div>
            </div>

            <div class="section-body">
 <div class="row">
 <div class="col-md-6">
    <div class="box">
        <div class="box-body">
            <table class="table">
                <tr>
                    <td class="">#</td>
                    <td class="">: <?php echo $logbook->id . $logbook->date ?></td>
                </tr>
                <tr>
                    <td class="">MSISDN / Nomor Telepon</td>
                    <td class="">: <?php echo $logbook->msisdn ?></td>
                </tr>
                <?php if ($logbook->tipe == 2) { ?>
                <tr>
                    <td class="col-md-6">Nomor Telepon</td>
                    <td class="col-md-6">: <?php echo $logbook->no_telp ?></td>
                </tr>
                    <tr>
                        <td class="col-md-6">Nomor Internet</td>
                        <td class="col-md-6">: <?php echo $logbook->internet_no ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-6">Nomor Tiket</td>
                        <td class="col-md-6">: <?php echo $logbook->tiket_no ?></td>
                    </tr>
                    <tr>
                        <td class="col-md-6">Nomor NDEM</td>
                        <td class="col-md-6">: <?php echo $logbook->ndem_no ?></td>
                    </tr>

					<tr>
                        <td class="col-md-6">ALASAN PENUTUPAN</td>
                        <td class="col-md-6">: <?php echo $logbook->indihome_alasan_tutup ?></td>
                    </tr>
                <?php } ?>

                <tr>
                    <td class="">Customer name</td>
                    <td class="">: <?php echo $logbook->nama_plgn ?></td>
                </tr>
                <?php if ($logbook->tipe == 1) { ?>
                    <tr>
                        <td class="col-md-6">Revenue</td>
                        <td class="col-md-6">: <?php echo $logbook->revenue ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="">Kronologis</td>
                    <td class="">: <?php echo $logbook->kronologis ?></td>
                </tr>
                <tr>
                    <td class="">Jenis Product</td>
                    <td class="">: <?php echo $logbook->jenis_product ?></td>
                </tr>
                <tr>
                    <td class="">Paket Lama</td>
                    <td class="">: <?php echo $logbook->paketlama ?></td>
                </tr>
                <tr>
                    <td class="">Paket Baru</td>
                    <td class="">: <?php echo $logbook->paketbaru ?></td>
                </tr>
                <tr>
                    <td class="">Antrian</td>
                    <td class="">: <?php echo $logbook->antrian ?></td>
                </tr>
                <tr>
                    <td class="">No Antrian HIQ</td>
                    <td class="">: <?php echo $logbook->antrian_hp ?></td>
                </tr>

            </table>
    </div>
</div>
</div>



<?php if ($logbook->tipe == 2 AND strtoupper($logbook->case_type) == 'BAST PENUTUPAN INDIHOME') { ?>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <?php $this->load->view('logbook/bast_detail.php') ?>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<?php if ($penutupan != null) { ?>
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="col-md-2">
                </div>
                <div class="col-md-12">
                    <a href="<?= site_url('logbook/bast_print/' . $this->uri->segment(3, 0)) ?>.pdf">PRINT</a>

                    <!-- Trigger the modal with a button
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">s</button>
                    -->
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" id="mypdfs">
                                </div>
                                <script>
                                    PDFObject.embed("http://10.33.26.97/formdisclaimer/logbook/bast_print/8010.pdf", "#mypdfs");
                                </script>
                            </div>

                        </div>
                    </div>
                    <?php $this->load->view('logbook/bast_print.php') ?>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
<?php } ?>
            </div>
      </section>
</div>
<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>
