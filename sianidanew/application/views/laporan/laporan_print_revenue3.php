<div class="col-md-6">
    <div class="box">
        <div class="box-header">Data Revenue Lama</div>
        <div class="box-body">
            <table class="table">
                <thead>
                <th>CSR</th>
                <th>Total Rev.</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_rev->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $this->ion_auth->user($row->author)->row()->full_name, 'Rp ' . number_format($row->revenue));
                    $total = $total + $row->revenue;
                }
                ?>
                <tr class="end"><td>Total</td><td><?php echo 'Rp.' . number_format($total) ?></td></tr>
            </table>
        </div>
    </div>
</div>
