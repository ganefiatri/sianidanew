<?php var_dump($bast); ?>
<div class="div1 box-body" style="display:none">
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
        <th>Nama Perangkat</th>
        <th>Merk Perangkat</th>
        <th>S/N</th>
        <th>Adaftor</th>
        <th>Remote</th>
        <th>Kabel</th>
        <th>Status</th>
        <th></th>
        </thead>
        <?php
        $total = null;
        $status = array('Pending', 'Closed',);
        foreach ($bast->result() as $row) {
            echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
                date('m/d/Y', $row->date),$this->ion_auth->user($row->author)->row()->full_name,$row->case_type,$row->nama_plgn,$row->msisdn,$row->internet_no,$row->kronologis,$row->ndem_no,$row->tiket_no,$row->jenis_modem,$row->merk_stb,$row->serial_number,$row->adaptor,$row->remote,$row->kabel,$status[$row->status]);
        }
        ?>
    </table>
</div>