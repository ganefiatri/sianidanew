<style>
    tr.end {
        background: gray;
        color: #fff;
        font-weight: bold;
    }
    .divclass2.box-body {
    height: 580px;
}
.divclass.box-body {
    height: 580px;
}
.divclass3.box-body {
    height: 580px;
}
</style>

<!-- here for detail Data Case Telkom -->

<!-- script for bast penutup indihome -->
<div class="div1 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Nama Perangkat</th>
        <th>Merk Perangkat</th>
        <th>S/N</th>
        <th>Adaftor</th>
        <th>Remote</th>
        <th>Kabel</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print1->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$row->jenis_modem,$row->merk_stb,$row->serial_number,$row->adaptor,$row->remote,$row->kabel,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for buka isolir -->
<div class="div2 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print2->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for Croselling product telkom -->
<div class="div3 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Jenis Product</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print3->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->jenis_product,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for Gangguan -->
<div class="div4 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print4->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for Ganti Paket Indihome / Migrasi -->
<div class="div5 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print5->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for informasi telkm -->
<div class="div6 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print6->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for Komplain Tagihan / Claim -->
<div class="div7 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print7->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for Pasang Baru / Migrasi -->
<div class="div8 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print8->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for Penutupan Telepon -->
<div class="div9 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print9->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>
<!-- script for Penutupan WIFI-iD -->
<div class="div10 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print10->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>

<!-- script for Penutupan WIFI-iD -->
<div class="div11 box-body" style="display:none">
    <table class="table">
    <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Customer Case</th>
        <th>Customer Name</th>
        <th>MSISDN</th>
        <th>Internet Number</th>
        <th>Chronology</th>
        <th>Ndem Number</th>
        <th>Ticket Number</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;        
        $status = array('Pending', 'Closed',);
        foreach ($print11->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
            date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
        }
        ?>
    </table>
</div>


<!-- this is the end for detail date case telkom -->
<!-- <div class="menu">
        <p>Menu button sementara</p>
        
        
        <button id="btn3">croselling</button>
        <button id="btn4">gangguan</button>
        <button id="btn5">ganti paket</button>
        <button id="btn6">informasi telkom</button>
        <button id="btn7">komplain</button>
        <button id="btn8">print Pasang Baru / Migrasi</button>
        <button id="btn9">penutupan telepon</button>
        <button id="btn10">penutupan wifi if</button>
</div> -->

<div class="row">
    <div class="col-md-6" style="">
        <div class="box">
            <div class="box-header" style="background: blue !important; font-weight:bold;text-align:center;">DATA CASE TELKOM</div>
            <div class="box-body">
                <table class="table">
                <thead>
                    <th>Customer Case</th>
                    <th>Total</th>
                    <th>Export</th>
                    </thead>
                    <tbody>
                    <?php
                        $menu = "To Excel";
                        $total = null;
                        $spaces = array('&nbsp;',' ');
                        foreach ($lap_q->result() as $row) { ?>
                            <tr>
                                <td><?= $row->case_type ?></td>
                                <td><?= $row->id ?></td>
                                <?php $total = $total + $row->id ?>
                                <td><button id="<?= substr(strtolower(str_replace($spaces,'',strip_tags($row->case_type))),3,7) ?>"><?= $menu ?></button></td>
                            </tr>   
                            <?php } ?>
                        </tbody>
                    <tr class="end">
                        <td>Total</td><td><?php echo $total ?></td><td></td><br>
                    </tr>
                    <td><button id="btnExport2">Export to Excel ALL</button></td>
                </table>
                <!-- <?php //var_dump($print1) ?> -->
            </div>

            <!-- Script print BAST PENUTUPAN INDIHOME -->
            <script>
                $("#tpenutu").click(function(e) {
                    let file = new Blob([$('.div1').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "Bastcloseindihome.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print BAST PENUTUPAN INDIHOME -->
            <!-- Script print Buka Isolir -->
            <script>
                $("#aisolir").click(function(e) {
                    let file = new Blob([$('.div2').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "Bukaisolir.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Buka Isolir -->
            <!-- Script print Croselling product telkom -->
            <script>
                $("#selling").click(function(e) {
                    let file = new Blob([$('.div3').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "Crosellingtelkom.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Croselling product telkom -->
            <!-- Script print gangguan -->
            <script>
                $("#gguan").click(function(e) {
                    let file = new Blob([$('.div4').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "gangguan.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print gangguan -->
            <!-- Script print Ganti Paket Indihome / Migrasi -->
            <script>
                $("#tipaket").click(function(e) {
                    let file = new Blob([$('.div5').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "gantipaketindihome.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Ganti Paket Indihome / Migrasi -->
            <!-- Script print Informasi telkm -->
            <script>
                $("#ormasit").click(function(e) {
                    let file = new Blob([$('.div6').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "informasitelkom.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print informasi telkm -->
            <!-- Script print Komplain Tagihan / Claim -->
            <script>
                $("#plainta").click(function(e) {
                    let file = new Blob([$('.div7').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "komplaintagihan.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Komplain Tagihan / Claim -->
            <!-- Script print Pasang Baru / Migrasi -->
            <script>
                $("#angbaru").click(function(e) {
                    let file = new Blob([$('.div8').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "pasangbaru.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Pasang Baru / Migrasi -->
            <!-- Script print Penutupan Telepon -->
            <script>
                $("#utupant").click(function(e) {
                    let file = new Blob([$('.div9').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "PenutupanTelepon.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Penutupan Telepon -->
            <!-- Script print Penutupan WIFI-iD -->
            <script>
                $("#utupanw").click(function(e) {
                    let file = new Blob([$('.div10').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "Penutupanwifiid.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Penutupan WIFI-iD -->
            <!-- Script print Penutupan WIFI-iD -->
            <script>
                $("#ahbilli").click(function(e) {
                    let file = new Blob([$('.div11').html()], {type:"application/vnd.ms-excel"});
                    let url = URL.createObjectURL(file);
                    let a = $("<a />", {
                    href: url,
                    download: "pisahbiling.xls"}).appendTo("body").get(0).click();
                    e.preventDefault();
                    });
            </script>
            <!-- Script print Penutupan WIFI-iD -->


            <!-- this code to export data into excel -->
            <div class="divclass2 box-body" style="display:none">
                <table class="table">
                <thead>
                    <th>Date</th>
                    <th>CSR</th>
                    <th>Customer Case</th>
                    <th>Customer Name</th>
                    <th>MSISDN</th>
                    <th>Internet Number</th>
                    <th>Chronology</th>
                    <th>Ndem Number</th>
                    <th>Ticket Number</th>
                    <th>Status</th>
                    <th></th>
                    </thead>
                    <?php
                    $total = null;        
                    $status = array('Pending', 'Closed',);
                    foreach ($lap_qall->result() as $row) {
                        echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
                        date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$status[$row->status]);
                    }
                    ?>
                </table>
        </div>
        </div>
    </div>
    <?php $this->load->view('laporan/laporan_print_psb.php') ?>
</div>

<script>
    $("#btnExport2").click(function(e) {
        let file = new Blob([$('.divclass2').html()], {type:"application/vnd.ms-excel"});
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
        href: url,
        download: "Casetelkom.xls"}).appendTo("body").get(0).click();
        e.preventDefault();
        });
</script>

<div class="row" style="height:400px">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header" style="background: blue !important; font-weight:bold;text-align:center;">DATA REVENUE TELKOM</div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <th></th>
                    <th>CSR</th>
                    <th>Total Rev.</th>
                    </thead>
                    <?php
                    $total = null;
                    foreach ($lap_revtelkom->result() as $row) {
                        echo sprintf('<tr><td><img style="height: 50px; width: 50px; border-radius: 50px;" src="%s" alt=""></td><td>%s</td><td>%s</td></tr>',base_url('/gambar/').$this->ion_auth->user($row->author)->row()->username.'.jpg', $this->ion_auth->user($row->author)->row()->full_name , 'Rp ' . number_format($row->revenuetelkom));
                        $total = $total + $row->revenuetelkom;
                    }
                    ?>
                    <tr class="end">
                        <td>Total</td>
                        <td></td><td><?php echo 'Rp.' . number_format($total) ?></td>
                    </tr>
                    <td><button id="btnExport1">Export to Excel</button></td>
                </table>
            </div>
            <!-- this code to export data into excel -->
            <div class="divclass1 box-body" style="display:none">
                <table class="table">
                    <thead>
                    <th>Date</th>
                    <th>CSR</th>
                    <th>Case Type</th>
                    <th>Jenis Product</th>
                    <th>Chronologic</th>
                    <th>Total Rev.</th>
                    </thead>
                    <?php
                    foreach ($lap_revtelkomall->result() as $row) {
                        echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',date('m/d/Y', $row->date), $this->ion_auth->user($row->author)->row()->full_name, $row->case_type,$row->jenis_product,$row->kronologis,'Rp ' . number_format($row->revenuetelkom));
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    
    <script>
        $("#btnExport1").click(function(e) {
            let file = new Blob([$('.divclass1').html()], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
            href: url,
            download: "Revenuetelkom.xls"}).appendTo("body").get(0).click();
            e.preventDefault();
            });
    </script>


    <div class="col-md-6">
        <div class="box">
            <div class="box-header" style="background: blue !important; font-weight:bold;text-align:center;">CROSELLING</div>
            <div class="divclass3 box-body">
                <table class="table">
                    <thead>
                    <th>Type Croselling</th>
                    <th>Total</th>
                    </thead>
                    <?php
                    $total = null;
                    foreach ($lap_croselling->result() as $row) {
                        echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $row->jenis_product, $row->id);
                        $total = $total + $row->id;
                    }
                    ?>
                    <tr class="end">
                        <td>Total</td><td><?php echo $total ?></td>
                    </tr>
                    <!-- <td><button id="btnExport" type="button">Export to Excel</button></td> -->
                </table>
            </div>
            
            <script type="text/javascript">
            // $("#btnExport").click(function(e) {
            // let file = new Blob([$('.divclass').html()], {type:"application/vnd.ms-excel"});
            // let url = URL.createObjectURL(file);
            // let a = $("<a />", {
            // href: url,
            // download: "Croselling.xls"}).appendTo("body").get(0).click();
            // e.preventDefault();
            // });
            // function printDiv(printableArea) {
            //     var printContents = document.getElementById(printableArea).innerHTML;
            //     var originalContents = document.body.innerHTML;
            //     document.body.innerHTML = printContents;
            //     window.open('data:application/vnd.ms-excel');
            //     document.body.innerHTML = originalContents;
            // }
            </script>

        </div>
    </div>
</div>

<div class="row">
    <?php $this->load->view('laporan/laporan_print_psbhalo.php') ?>
    <?php $this->load->view('laporan/laporan_print_revenue.php') ?>
    <?php $this->load->view('laporan/laporan_print_revenue2.php') ?>
</div>


<!-- <div class="row">
    <?php //$this->load->view('laporan/laporan_print_breaktime.php') ?>
</div> -->