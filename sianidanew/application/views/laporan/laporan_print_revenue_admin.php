<div class="col-md-6">
    <div class="box">
        <div class="box-header">Data Revenue Prepaid</div>
        <div class="box-body">
            <table class="table">
                <thead>
                <th>CSR</th>
                <th>Total Rev.</th>
                <th>Aksi</th>
                </thead>
                <?php
                $total = null;
                foreach ($lap_rev_prepaid->result() as $row) {
                    $tbl_del = null;
                    // if ($this->ion_auth->get_users_groups()->row()->id == 1) {
                       // $tbl_del = sprintf('<a href="%s" class="btn btn-danger btn-xs">Hapus</a>', site_url('rast_controler/hapus/' . $row->id));
                        $tbl_del = '<a href="%s" class="btn btn-danger btn-xs">Hapus</a>';
                        $tbl_edit = '<a href="%s" class="btn btn-danger btn-xs">Edit</a>';
                    // }
                    echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>', $this->ion_auth->user($row->author)->row()->full_name, 'Rp ' . number_format($row->revenue),$tbl_del,$tbl_edit);
                    $total = $total + $row->revenue;
                }
                ?>
                <tr class="end"><td>Total</td><td><?php echo 'Rp.' . number_format($total) ?></td></tr>
            </table>
        </div>
    </div>
</div>
