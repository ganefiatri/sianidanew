
<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<style>
th, td {
    padding: 10px;
    width:50%;
}
</style>
<div class="col-md-12">
    <table border="1">
        <thead>
            <th>CSR</th>
            <th>Total Rev.</th>
        </thead>
        <tbody>
            <?php
            $total = null;
            foreach ($lap_revtelkom->result() as $row) {
                echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $this->ion_auth->user($row->author)->row()->full_name, 'Rp ' . number_format($row->revenuetelkom));
                $total = $total + $row->revenuetelkom;
            }
            ?>
            <tr class="end">
                <td>Total</td><td><?php echo 'Rp.' . number_format($total) ?></td>
            </tr>
        </tbody>
    </table>
</div>


