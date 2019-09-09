<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
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


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>All Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Laporan</a></div>
                <div class="breadcrumb-item"><a href="#">All Laporan</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="section-body">
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
            <div class="col-md-3 box">
                <!--    <h5>Noted</h5>-->
                <!--    <p>* Being repaired, please wait, this take a while, tq.</p>-->
            </div>

            <?php
            if (isset($lap_q)) {

                echo sprintf('<div class="col-md-12">
        <h4 align="center">Tanggal %s - %s </h4>
            </div>', $tanggal[0], $tanggal[1]);
                echo '</div><div class="row">';
                $this->load->view('laporan/laporan_print.php');
                echo '</div>';
            }
            ?>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/js'); ?>
<?php $this->load->view('dist/_partials/footer'); ?>


