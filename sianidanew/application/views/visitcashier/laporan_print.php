<div class="col-md-6 col-md-offset-3">
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                <th>Customer Case</th>
                <th>Jumlah</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_q->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $row->case_type, $row->id);
                    $total = $total + $row->id;
                }
                ?>

                <tr><td>Total</td><td><?php echo $total ?></td></tr>
            </table>
        </div>
    </div>
</div>