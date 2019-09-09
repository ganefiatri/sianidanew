<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script>
    $(document).ready(function() {

        $('input[type="checkbox"]').click(function() {
            if (this.checked) {
                $('.tanggal').prop('disabled', true);
            } else {
                $('.tanggal').prop('disabled', false);
            }
        });
        $('.tanggal').daterangepicker({
            "singleDatePicker": true,
            "alwaysShowCalendars": true,
            "drops": "down",
            startDate: moment(),
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });
</script>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Registrasi Prepaid</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Registrasi Prepaid</div>
                </div>
            </div>

            <div class="section-body">
                <form role="form" class="box-body" action="" method="POST" enctype="text">
                    <div class = "form-group">
                        <label for = "msisdn_name">NIK KTP</label>
                        <input type = "name" name = "ktp" class = "form-control" id = "ktp" required = "required">
                    </div>
                    <div class = "form-group">
                        <label for = "msisdn_name">Masa Berlaku KTP</label>
                        <input type = "name" name = "lifetimedate" class = "form-control tanggal" id = "ktp" required = "required">
                        <input id="lifetime_check"  name="lifetime_u" type="checkbox" value="unlimited"> Seumur hidup
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Ok">
                </form>
            </div>
        </section>
    </div>

<?php $this->load->view('dist/_partials/footer'); ?>