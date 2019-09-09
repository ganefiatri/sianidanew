<div class="col-md-6">
<?php //var_dump($lap_psbhalo) ?>
    <div class="box">
        <div class="box-header" style="font-weight:bold;text-align:center;">DATA PSB KARTU HALO</div>
        <div class="box-body">
            <table class="table">
                <thead>
                <th>CSR</th>
                <th>Jumlah</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_psbhalo->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $this->ion_auth->user($row->author)->row()->full_name, $row->id);
                    $total = $total + $row->id;
                }
                ?>
                <tr class="end"><td>Total</td><td><?php echo $total ?></td></tr>
                <td><button id="btnExport4">Export to Excel</button></td>
            </table>
        </div>
        <div class="divclass4 box-body" style="display:none">
            <table class="table">
                <thead>
                <th>Date</th>
                <th>CSR</th>
                <th>CUSTOMER NAME</th>
                <th>MSISDN</th>
                <th>Case Type</th>
                <th>Chronology</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_psbhaloall->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>', date('m/d/Y', $row->date), $this->ion_auth->user($row->author)->row()->full_name, $row->nama_plgn, $row->msisdn, $row->case_type, $row->kronologis);
                   
                }
                ?>
            </table>
        </div>
    </div>
</div>
    <script>
            $("#btnExport4").click(function(e) {
                let file = new Blob([$('.divclass4').html()], {type:"application/vnd.ms-excel"});
                let url = URL.createObjectURL(file);
            let a = $("<a />", {
            href: url,
            download: "Psbhalo.xls"}).appendTo("body").get(0).click();
            e.preventDefault();
            });
    </script>