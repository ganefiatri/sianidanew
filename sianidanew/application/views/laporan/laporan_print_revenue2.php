<div class="col-md-6">
    <div class="box">
        <div class="box-header" style="font-weight:bold;text-align:center;">DATA REVENUE POSTPAID</div>
        <div class="box-body">
            <table class="table">
                <thead>
                <th>CSR</th>
                <th>Total Rev.</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_rev_postpaid->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $this->ion_auth->user($row->author)->row()->full_name, 'Rp ' . number_format($row->revenue));
                    $total = $total + $row->revenue;
                }
                ?>
                <tr class="end"><td>Total</td><td><?php echo 'Rp.' . number_format($total) ?></td></tr>
                <td><button id="btnExport6">Export to excel</button></td>
            </table>
        </div>

        <div class="divclass6 box-body" style="display:none">
            <table class="table">
                <thead>
                <th>Date</th>
                <th>CSR</th>
                <th>Case Type</th>
                <th>Chronology</th>
                <th>Total Rev.</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_rev_postpaidall->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',date('m/d/Y', $row->date), $this->ion_auth->user($row->author)->row()->full_name,$row->case_type, $row->kronologis, 'Rp ' . number_format($row->revenue));
                    
                }
                ?>
            </table>
        </div>
    </div>
</div>
<script>
        $("#btnExport6").click(function(e) {
            let file = new Blob([$('.divclass6').html()], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
            href: url,
            download: "RevenuePospaid.xls"}).appendTo("body").get(0).click();
            e.preventDefault();
            });
    </script>