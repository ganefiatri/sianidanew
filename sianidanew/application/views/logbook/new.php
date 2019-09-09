<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
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
        $("#revtelkom").inputmask({alias: "rupiah"});
    });
</script>
    <div class="main-content">
      <section class="section">
            <div class="section-header">
                <h1>Forms Telkom & Telkomsel</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Forms Telkom & Telkomsel</div>
                </div>
            </div>

            <div class="section-body">
                <form role="form" action="" method="POST" enctype="text">
                    <input type="hidden" name="ctype" value="<?php
                    if (isset($_GET['telkom'])) {
                        echo 2;
                    } else {
                        echo 1;
                    }
                    ?>"/>

                    <div class = "form-group">
                        <label for = "msisdn_name">Nama Pelanggan</label>
                        <input type = "name" name = "msisdn_name" class = "form-control" id = "msisdn_name" placeholder = "ENTER CUSTOMER NAME" required = "required">
                    </div>

                    <?php if (!(isset($_GET['telkom']))) { ?>
                        <div class="form-group">
                            <label for = "nomor_induk">Kategori</label>
                            <select name="ccase" class="form-control">
                                <option disabled="disabled">PREPAID</option>
                                <option value="PREPAID RECHARGE">---PREPAID RECHARGE</option>
                                <option value="AKTIVASI VAS PREPAID">---AKTIVASI VAS PREPAID</option>
                                <option disabled="disabled">POSTPAID</option>
                                <option value="PSB HALO">---PSB HALO</option>
                                <option value="GANTI PAKET TELKOMSEL">---GANTI PAKET POSTPAID</option>
                            </select>
                        </div>
                        <Script>
                            $(document).ready(function() {
                                var selstatus = $("[name='halo']");
                                var selccase = $("[name='ccase']");
                                function syncstatus() {

                                    if (jQuery.inArray(selccase.val(), ["PSB HALO"]) >= 0) {
                                        selstatus.prop('disabled', false);
                                        $('#pakethalodiv').prop('disabled', true);
                                        $('#pakethalodiv').show();
                                        $('#pakethalo').prop('required', true);
                                    } else {
                                        selstatus.prop('disabled', false);
                                        $("#pakethalo").val("");
                                        $('#pakethalodiv').hide();
                                        $('#pakethalo').removeAttr('required');
                                    }
                                    console.log(jQuery.inArray(selccase.val(), ["PSB HALO"]));
                                }
                                syncstatus();
                                selccase.change(function() {
                                    syncstatus();
                                })
                            });
                        </Script>
                        <div class="form-group" id="pakethalodiv">
                            <label>Paket PSB Halo</label>
                            <select name="halo" class="form-control" id="pakethalo">
                                <option value="Free Abodemen">Free Abodemen</option>
                                <option value="Halo Fit 50k">Halo Fit 50k</option>
                                <option value="Halo Kick 60k">Halo Kick 60k</option>
                                <option value="Halo Kick 100k">Halo Kick 100k</option>
                                <option value="Halo Kick 150k">Halo Kick 150k</option>
                                <option value="Halo Kick 300k">Halo Kick 300k</option>
                                <option value="Halo Kick 550k">Halo Kick 550k</option>
                                <option value="Halo Fast Track 100k">Halo Fast Track 100k</option>
                                <option value="Halo Fast Track 150k">Halo Fast Track 150k</option>
                                <option value="Halo Fast Track 300k">Halo Fast Track 300k</option>
                                <option value="Halo Fast Track 550k">Halo Fast Track 550k</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="msisdn_number">MSISDN</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type = "number" name = "msisdn_number" class = "form-control" id ="msisdn_number" placeholder = "62">
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="antrian">Nomor Antrian</label>
                                <input type ="text" name ="antrian" class ="form-control" id ="antrian" placeholder ="" required = "required">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="antrian_hp">Nomor HiQ </label>
                                <input type ="number" name ="antrian_hp" class ="form-control" id ="antrian_hp" placeholder ="Nomor Yang ada di HiQ">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="msisdn_number">Nomor Contact Person</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type = "number" name = "msisdn_number" class = "form-control" id ="msisdn_number" placeholder = "">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="msisdn_number">Nomor Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type = "number" name = "no_telp" class = "form-control" id ="" placeholder = "">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="internet_no">Nomor Internet</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type = "number" name = "internet_no" class = "form-control" id = "internet_no" placeholder = ""/>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tiket_no">Nomor NDEM</label>
                                <input type = "text" name = "ndem_no" class = "form-control" id = "ndem_no" placeholder = ""/>
                            </div>
                        </div>

                        <div class="row">

                            <?php if (isset($_GET['telkom'])) { ?>

                                <div class="form-group col-md-4">
                                    <label for = "nomor_induk">Kategori Pelanggan</label>
                                    <select name="ccase" class="form-control">
                                        <option value="Informasi Telkom">Informasi Telkom</option>
                                        <option value="Penutupan Telepon">Penutupan Telepon Non Indihome</option>
                                        <option value="Penutupan WIFI-iD">Penutupan WIFI-iD</option>
                                        <option value="BAST PENUTUPAN INDIHOME">Penutupan Internet (BAST Penutupan INDIHOME)</option>
                                        <option value="Komplain Tagihan / Claim">Komplain Tagihan / Claim</option>
                                        <option value="Pasang Baru / Migrasi">Pasang Baru Telkom</option>
                                        <option value="Ganti Paket Indihome (Non Upgrade)">Ganti Paket Indihome (Non Upgrade)</option>
                                        <option value="Pisah Billing / Gabung Billing">Pisah Billing / Gabung Billing</option>
                                        <option value="Gangguan">Gangguan</option>
                                        <option value="Buka Isolir">Buka Isolir</option>
                                        <option value="Croselling Product Telkom">Croselling Product Telkom</option>
                                    </select>
                                </div>
                                <Script>
                                    $(document).ready(function() {
                                        var selstatus = $("[name='status']");
                                        var selccase = $("[name='ccase']");
                                        function syncstatus() {

                                            if (jQuery.inArray(selccase.val(), ["BAST PENUTUPAN INDIHOME", "Penutupan Telepon"]) >= 0) {
                                                selstatus.prop('disabled', false);
                                                $('#alasantutupdiv').prop('disabled', true);
                                                $('#alasantutupdiv').show();
                                                $('#alasantutup').prop('required', true);
                                            } else {
                                                selstatus.prop('disabled', false);
                                                $("#alasantutup").val("");
                                                $('#alasantutupdiv').hide();
                                                $('#alasantutup').removeAttr('required');
                                            }
                                            console.log(jQuery.inArray(selccase.val(), ["BAST PENUTUPAN INDIHOME", "Penutupan Telepon"]));
                                        }
                                        syncstatus();
                                        selccase.change(function() {
                                            syncstatus();
                                        })
                                    });
                                </Script>
                                <div class="col-md-4">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Pending</option>
                                        <option value="1">Closed</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4" id="jproductdiv">
                                    <label for ="jenisproduct">Jenis Product</label>
                                    <select name="jenisproduct" id="jproduct" class="form-control">
                                        <option disabled="disabled">--PILIH--</option>
                                        <option value="Add on">ADD ON</option>
                                        <option value="Minipack">MINIPACK</option>
                                        <option value="Upgrade Paket Indihome">UPGRADE PAKET INDIHOME</option>
                                        <option value="Wifi Extender">WIFI EXTENDER</option>
                                        <option value="MIGRASI INDIHOME">MIGRASI INDIHOME</option>
                                        <!-- <option value="LPC">LPC</option> -->
                                        <option value="PLC">PLC</option>
                                        <option value="Add Service STB">ADD SERVICE STB</option>
                                        <option value="Add Service Internet">ADD SERVICE INTERNET</option>
                                        <option value="Add Service Second STB">ADD SERVICE SECOND STB</option>
                                        <option value="Sobat Indihome">SOBAT INDIHOME</option>
                                    </select>
                                </div>
                                <Script>
                                    $(document).ready(function() {
                                        var selstatus = $("[name='status']");
                                        var selccase = $("[name='ccase']");
                                        function syncstatus() {

                                            if (jQuery.inArray(selccase.val(), ["Croselling Product Telkom"]) >= 0) {
                                                selstatus.prop('disabled', false);
                                                $('#jproductdiv').prop('disabled', true);
                                                $('#jproductdiv').show();
                                                $('#jproduct').prop('required', true);
                                            } else {
                                                selstatus.prop('disabled', false);
                                                $("#jproduct").val("");
                                                $('#jproductdiv').hide();
                                                $('#jproduct').removeAttr('required');
                                            }
                                            console.log(jQuery.inArray(selccase.val(), ["Croselling Product Telkom"]));
                                        }
                                        syncstatus();
                                        selccase.change(function() {
                                            syncstatus();
                                        })
                                    });
                                </Script>
                            <?php } ?>

                            <div class="form-group col-md-4" id="starclickdiv">
                                <label for="tiket_no">ID Startclick / ID MyIR</label>
                                <input style="" type = "text" name ="tiket_no" class ="form-control" id ="tiket_no" placeholder="JANGAN LUPA DI ISI YA CYIN!" required ="required"/>
                            </div>

                            <!-- script for hide ID STARCLICK -->
                            <Script>
                                $(document).ready(function() {
                                    var selstatus = $("[name='status']");
                                    var selccase = $("[name='ccase']");
                                    function syncstatus() {

                                        if (jQuery.inArray(selccase.val(), ["Pasang Baru / Migrasi","Croselling Product Telkom","Ganti Paket Indihome (Non Upgrade) / Migrasi"]) >= 0) {
                                            selstatus.prop('disabled', false);
                                            $('#starclickdiv').prop('disabled', true);
                                            $('#starclickdiv').show();
                                            $('#tiket_no').prop('required', true);
                                        } else {
                                            selstatus.prop('disabled', false);
                                            $("#tiket_no").val("");
                                            $('#starclickdiv').hide();
                                            $('#tiket_no').removeAttr('required');
                                        }
                                        console.log(jQuery.inArray(selccase.val(), ["Pasang Baru / Migrasi","Croselling Product Telkom","Ganti Paket Indihome (Non Upgrade) / Migrasi"]));
                                    }
                                    syncstatus();
                                    selccase.change(function() {
                                        syncstatus();
                                    })
                                });
                            </Script>


                            <div class="form-group col-md-4" id="paketlamadiv">
                                <label for ="paket_lama">Paket Lama</label>
                                <select name="paket_lama" id="paketlama" class="form-control" required>
                                    <option value="1mbps">1 Mbps</option>
                                    <option value="2mbps">2 Mbps</option>
                                    <option value="5mbps">5 Mbps</option>
                                    <option value="10mbps">10 Mbps</option>
                                    <option value="20mbps">20 Mbps</option>
                                    <option value="30mbps">30 Mbps</option>
                                    <option value="40mbps">40 Mbps</option>
                                    <option value="50mbps">50 Mbps</option>
                                    <option value="100mbps">100 Mbps</option>
                                </select>
                            </div>
                            <!-- script for hide the paket -->
                            <Script>
                                $(document).ready(function() {
                                    var selstatus = $("[name='status']");
                                    var selccase = $("[name='jenisproduct']");
                                    function syncstatus() {

                                        if (jQuery.inArray(selccase.val(), ["Upgrade Paket Indihome"]) >= 0) {
                                            selstatus.prop('disabled', false);
                                            $('#paketlamadiv').prop('disabled', true);
                                            $('#paketlamadiv').show();
                                            $('#paketlama').prop('required', true);
                                        } else {
                                            selstatus.prop('disabled', false);
                                            $("#paketlama").val("");
                                            $('#paketlamadiv').hide();
                                            $('#paketlama').removeAttr('required');
                                        }
                                        console.log(jQuery.inArray(selccase.val(), ["Upgrade Paket Indihome"]));
                                    }
                                    syncstatus();
                                    selccase.change(function() {
                                        syncstatus();
                                    })
                                });
                            </Script>
                            <div class="form-group col-md-4" id="paketbarudiv">
                                <label for ="paket_baru">Paket Baru</label>
                                <select name="paket_baru" id="paketbaru" class="form-control" required>
                                    <option value="10mbps">10 Mbps</option>
                                    <option value="20mbps">20 Mbps</option>
                                    <option value="30mbps">30 Mbps</option>
                                    <option value="40mbps">40 Mbps</option>
                                    <option value="50mbps">50 Mbps</option>
                                    <option value="100mbps">100 Mbps</option>
                                </select>
                            </div>
                            <!-- script for hide the paket -->
                            <Script>
                                $(document).ready(function() {
                                    var selstatus = $("[name='status']");
                                    var selccase = $("[name='jenisproduct']");
                                    function syncstatus() {

                                        if (jQuery.inArray(selccase.val(), ["Upgrade Paket Indihome","MIGRASI INDIHOME"]) >= 0) {
                                            selstatus.prop('disabled', false);
                                            $('#paketbarudiv').prop('disabled', true);
                                            $('#paketbarudiv').show();
                                            $('#paketbaru').prop('required', true);
                                        } else {
                                            selstatus.prop('disabled', false);
                                            $("#paketbaru").val("");
                                            $('#paketbarudiv').hide();
                                            $('#paketbaru').removeAttr('required');
                                        }
                                        console.log(jQuery.inArray(selccase.val(), ["Upgrade Paket Indihome","MIGRASI INDIHOME"]));
                                    }
                                    syncstatus();
                                    selccase.change(function() {
                                        syncstatus();
                                    })
                                });
                            </Script>



                            <div class="form-group col-md-3" id="alasantutupdiv">
                                <label for="tiket_no">Alasan Tutup</label>
                                <select name="alasantutup" id="alasantutup" class="form-control" required ="required">
                                    <?php $opt = array('TARIF MAHAL', 'SERING GANGGUAN', 'FOLLOW UP GANGGUAN LAMA', 'PINDAH PROVIDER LAIN', 'PINDAH RUMAH', 'GANTI PAKET') ?>
                                    <?php
                                    foreach ($opt as $r) {
                                        echo sprintf('<option value="%s">%s</option>', $r, $r);
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="revtelkom">Revenue (Telkom)</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="text" name="revtelkom" class="form-control" id="revtelkom"  placeholder="PRICE " style="text-align: left;"/>
                            </div>
                        </div>
                    <?php } ?>



                    <?php if (!(isset($_GET['telkom']))) {
                        ?>
                        <div class="form-group">
                            <label for="rev">Revenue</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        $
                                    </div>
                                </div>
                                <input type="text" name="rev" class="form-control" id="rev"  placeholder="PRICE " style="text-align: left;"/>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="rev">Keterangan</label>
                        <textarea name="Kronologis" class="form-control" rows="6"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" value="Save">
                </form>
            </div>
        </section>
    </div>

<?php $this->load->view('dist/_partials/js'); ?>