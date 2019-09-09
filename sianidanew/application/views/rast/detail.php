<script src="<?php echo base_url('assets/pdfobject.js') ?>"></script>


</script>
ping
<div class="col-md-6">
    <div class="box">
        <div class="box-body">
            <table width="100%">
                <tr>
                    <td class="col-md-6">#</td>
                    <td class="col-md-6">: <?php echo $logbook->id . $logbook->date ?></td>
                </tr>
                <tr>
                    <td class="col-md-6">MSISDN / Nomor Telepon</td>
                    <td class="col-md-6">: <?php echo $logbook->msisdn ?></td>
                </tr>
                <?php if ($logbook->tipe == 2) { ?>

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
                <?php } ?>

                <tr>
                    <td class="col-md-6">Customer name</td>
                    <td class="col-md-6">: <?php echo $logbook->nama_plgn ?></td>
                </tr>
                <?php if ($logbook->tipe == 1) { ?>
                    <tr>
                        <td class="col-md-6">Revenue</td>
                        <td class="col-md-6">: <?php echo $logbook->revenue ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="col-md-6">Kronologis</td>
                    <td class="col-md-6">: <?php echo $logbook->kronologis ?></td>
                </tr>
            </table>




        </div>
    </div>
</div>


<?php if ($logbook->tipe == 2 AND strtoupper($logbook->case_type) == 'BAST PERANGKAT') { ?>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">

                <h1>Penutupan</h1>
                <?php $this->load->view('logbook/bast_detail.php') ?>
            </div>
        </div>
    </div>
<?php } ?>


<?php if ($penutupan != null) { ?>
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
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