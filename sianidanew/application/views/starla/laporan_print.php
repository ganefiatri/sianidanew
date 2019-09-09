<!-- script for Penutupan WIFI-iD -->
<div class="divprint box-body" style="display:none">
    <table class="table">
        <thead>
        <th>Date</th>
        <th>CSR</th>
        <th>Topik</th>
        <th>Total</th>
        </thead>
        <?php
        foreach ($lap_starla->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
                date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->topik,$row->total);
        }
        ?>
    </table>
</div>

<div class="row">
    <div class="col-md-12" style="position: relative; margin-top: -320px">
        <div class="box">
            <div class="box-header" style="background: blue !important; font-weight:bold;text-align:center;">DATA STARLA</div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <th>Customer Case</th>
                    <th>Topik</th>
                    <th>Total</th>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($lap_starla->result() as $row) { ?>
                        <tr>
                            <td><?= $this->ion_auth->user($row->author)->row()->full_name ?></td>
                            <td><?= $row->topik ?></td>
                            <td><?= $row->total ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <td><button id="btnExport">Export to Excel ALL</button></td>
                </table>
                <!-- <?php //var_dump($print1) ?> -->
            </div>
        </div>
    </div>
</div>
<!-- Script print Starla -->
<script>
    $("#btnExport").click(function(e) {
        let file = new Blob([$('.divprint').html()], {type:"application/vnd.ms-excel"});
        let url = URL.createObjectURL(file);
        let a = $("<a />", {
            href: url,
            download: "Starla.xls"}).appendTo("body").get(0).click();
        e.preventDefault();
    });
</script>
<!-- Script print Starla -->