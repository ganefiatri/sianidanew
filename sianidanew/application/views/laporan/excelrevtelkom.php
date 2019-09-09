<link href="<?= base_url('/assets/footable/css/footable.bootstrap.min.css') ?>" rel="stylesheet"/>
<script src="<?= base_url('/assets/footable/js/footable.min.js') ?>"></script>
<script>$(function() {
        $('.footable').footable();
    });</script>

<script>
    $(document).ready(function() {
        $('#tanggal-range').daterangepicker({
            "ranges": {
                'Mingguan': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
                'Bulanan': [moment().startOf('month'), moment().endOf('month')],
                '30 Hari': [moment().subtract(29, 'days'), moment()],
                'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "alwaysShowCalendars": true,
            "opens": "center",
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
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
                <input type="submit" value="ok" class="btn btn-block btn-success">
            </form>
        </div>
    </div>
</div>

<?php
if (isset($lap_revtelkom)) {
    echo '</div><div class="row">';
    $this->load->view('laporan/printrevtelkom.php');
    echo '</div>';
}
?>

