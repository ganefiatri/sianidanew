<?php
$g_total = $total_d1 = $total_d2 = 0;
?>
<div class="col-md-12">
    <div class="box">
        <div class="box-body">
            <div class="col-md-6">
                <p align="center">Telkom</p>
                <table class="table table-bordered">
                    <thead>
                    <th>MSISDN</th>
                    <th>JAM</th>
                    </thead>
                    <?php
                    foreach ($d2->result() as $row_d2) {
                        echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $row_d2->msisdn, date('H:i', $row_d2->date));
                        $total_d2 = $total_d2 + 1;
                        $g_total = $g_total + 1;
                    }
                    ?>
                    <tr><td>Total</td><td><?php echo $total_d2 ?></td></tr>
                </table>


            </div>


            <div class="col-md-6">
                <p align="center">Telkomsel</p>
                <table class="table table-bordered">
                    <thead>
                    <th>MSISDN</th>
                    <th>JAM</th>
                    </thead>
                    <?php
                    foreach ($d1->result() as $row_d1) {
                        echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $row_d1->msisdn, date('H:i', $row_d1->date));
                        $total_d1 = $total_d1 + 1;
                        $g_total = $g_total + 1;
                    }
                    ?>
                    <tr><td>Total</td><td><?php echo $total_d1 ?></td></tr>
                </table>
            </div>
        </div>

        <div class="box-footer">Total : <?php echo $g_total ?></div>
    </div>
</div>