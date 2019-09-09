<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<script>
    $(document).ready(function() {
        console.log('x');
        $("[name='stats']").bootstrapSwitch();
    });
</script>
<script>
    $(document).ready(function() {
        Inputmask.extendAliases({
            rupiah: {
                prefix: "Rp. ",
                groupSeparator: ".",
                alias: "numeric",
                placeholder: "0",
                autoGroup: !0,
                rightAlign: false
            }
        });

        $("#rev").inputmask({alias: "rupiah"});
    });
</script>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item"><a href="#">Logbook</a></div>
                    <div class="breadcrumb-item">Edit</div>
                </div>
            </div>

            <div class="section-body">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-body">
                            <form role="form" class="box-body" action="" method="POST" enctype="text">

                                <div class = "form-group">
                                    <label for = "msisdn_name">Nama Pelanggan</label>
                                    <input type = "name" name = "msisdn_name" class = "form-control" id = "msisdn_name" placeholder = "Enter Name" required = "required" value="<?= $logbook->nama_plgn ?>">
                                </div>
                                <?php if ($logbook->tipe == 2) { ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="msisdn_number">Nomor Telepon</label>
                                        <input type = "number" name = "no_telp" class = "form-control" id = "" placeholder = "" value="<?= $logbook->no_telp?>">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="internet_no">Nomor Internet</label>
                                        <input type = "number" name = "internet_no" class = "form-control" id = "internet_no" placeholder = "" value="<?php echo $logbook->internet_no ?>"/>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="tiket_no">Nomor Tiket (SC)</label>
                                        <input type = "text" name = "tiket_no" class = "form-control" id = "tiket_no" placeholder = "" value="<?php echo $logbook->tiket_no ?>"/>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="tiket_no">Nomor NDEM</label>
                                        <input type = "text" name = "ndem_no" class = "form-control" id = "ndem_no" placeholder = "" value="<?php echo $logbook->ndem_no ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="stats">Status</label><br>
                                        <div class="btn-group" data-toggle="buttons">
                                            <?php
                                            $status = array('Pending', 'Closed');
                                            for ($x = 0; $x < sizeof($status); $x++) {
                                                $active = null;
                                                if ($logbook->status == $x) {
                                                    $active = 'active';
                                                };

                                                echo sprintf('<label class="btn btn-primary %s">
                            <input type="radio" name="options" id="option1" autocomplete="off" value="%d">
                            %s
                        </label>', $active, $x, $status[$x]);
                                            }
                                            ?>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="rev">Kronologis</label>
                                            <textarea name="Kronologis" class="form-control" rows="6"><?php echo $logbook->kronologis ?></textarea>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label for="revtelkom">Revenue (Telkom)</label>
                                            <input type="text" name="revtelkom" class="form-control" id="rev" value="<?= $logbook->revenuetelkom?>" placeholder="" style="text-align: left;"/>
                                        </div>
                                        <?php if (!(isset($_GET['telkom']))) { ?>
                                            <div class="form-group">
                                                <label for="rev">Revenue (Telkomsel)</label>
                                                <input type="text" name="rev" class="form-control" id="rev" value="<?= $logbook->revenue?>" placeholder="Recharge M-KIOS / VAS / Paket" style="text-align: left;"/>
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label for="msisdn_number">Nomor Handphone</label>
                                            <input type = "number" name = "msisdn_number" class = "form-control" id = "msisdn_number" placeholder="" value="<?= $logbook->msisdn ?>">
                                        </div>
                                    </div>

                                    <input class="btn btn-primary btn-block" type="submit" value="Simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>