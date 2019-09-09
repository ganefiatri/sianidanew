<div class="col-md-6">
    <div class="box">
        <div class="box-header" style="background: blue !important; font-weight:bold;text-align:center;">DATA PSB TELKOM</div>
        <div class="box-body">
            <table class="table">
                <thead>
                <th>CSR</th>
                <th>Jumlah</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_psb->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $this->ion_auth->user($row->author)->row()->full_name, $row->id);
                    $total = $total + $row->id;
                }
                ?>
                <tr class="end"><td>Total</td><td><?php echo $total ?></td></tr>
                <td><button id="btnExport3">Export to Excel</button></td>
            </table>
        </div>
        <div class="divclass3 box-body" style="display:none">
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
                <!-- <tr class="end"><td>Total</td><td></td><td></td><td><?php echo $total ?></td></tr> -->
        </div>
    </div>
</div>
<script>
    $("#btnExport3").click(function(e) {
        let file = new Blob([$('.divclass3').html()], {type:"application/vnd.ms-excel"});
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
        href: url,
        download: "Psbtelkom.xls"}).appendTo("body").get(0).click();
        e.preventDefault();
        });
</script>