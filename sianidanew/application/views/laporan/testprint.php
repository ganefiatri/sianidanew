
        <?php 

        // header("Content-type: application/octet-stream");

        // header("Content-Disposition: attachment; filename=$title.xls");

        // header("Pragma: no-cache");

        // header("Expires: 0");

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
                    <th>Customer Case</th>
                    <th>Jumlah</th>
                </thead>
                <tbody>
                    <?php
                    $total = null;
                    foreach ($lap_q->result() as $row) {
                    echo sprintf('<tr><td>%s</td><td>%s</td></tr>', $row->case_type, $row->id);
                    $total = $total + $row->id;
                    }
                    ?>
                    <tr class="end">
                        <td style="font-weight: bold;">Total</td><td><?php echo $total ?></td><br>
                    </tr>
                </tbody>
            </table>
        </div>


 