<script>
    $(document).ready(function() {

        $('#tanggal-range').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            },
            "ranges": {
                'Mingguan': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
                'Bulanan': [moment().startOf('month'), moment().endOf('month')],
                '30 Hari': [moment().subtract(29, 'days'), moment()],
                'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]

            },
            "alwaysShowCalendars": true,
<?php
if (isset($tanggal)) {
    echo sprintf('"startDate": "%s",', $tanggal[0]);
    echo sprintf('"endDate": "%s",', $tanggal[1]);
} else {
    echo '
            "startDate": moment().startOf("month"),
            "endDate": moment().endOf("month"),';
}
?>
            "opens": "center"
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });
</script>

<div class="col-md-6 col-md-offset-3">
    <div class="box">
        <div class="box-body">
            <form method="post" action="">
                <div class="form-group">
                    <label for="waktu" style="width: 100%;">Waktu</label>
                    <input name="tanggal_range" type="text" id="tanggal-range" class="form-control">
                </div>
                <hr>
                <input type="submit" value="ok" class="btn  btn-success">
                <input type="submit" value="excel" class="btn btn-default">
            </form>
        </div>
    </div>
</div>

<?php
if (isset($d1)) {

    $this->load->view('visitcashier/list.php');
}
?>