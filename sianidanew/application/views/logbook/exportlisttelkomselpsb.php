<!--<?php 

// header("Content-type: application/octet-stream");

// header("Content-Disposition: attachment; filename=$title.xls");

// header("Pragma: no-cache");

// header("Expires: 0");

?> -->
<table border="1" width="100%">
    <thead>
        <tr>
            <th style="width:150px;">Customer Name</th>
            <th style="width:100px;">Customer Case</th>
            <th>Customer Number</th>
            <th>CSR</th>
            <th style="width:350px;">Chronology</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($logbook as $logbooks) { ?>
        <tr>
            <td><?php echo $logbooks->nama_plgn ?></td>
            <td><?php echo $logbooks->case_type ?></td>
            <td><?php echo $logbooks->msisdn ?></td>
            <td><?php echo $this->ion_auth->user($logbooks->author)->row()->full_name ?></td>
            <td><?php echo $logbooks->kronologis ?></td>
        </tr>
        <?php $i++; } ?>
    </tbody>

   <!--<?php //var_dump($logbook); ?>-->
</table>