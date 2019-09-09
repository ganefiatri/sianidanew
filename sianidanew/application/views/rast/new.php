<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script>
    $(document).ready(function() {
        $('#adjdate').daterangepicker({            
            "alwaysShowCalendars": true,
            "opens": "center",
            "drops": "up",
            startDate: moment().subtract(29, 'days'),
            "singleDatePicker": true,
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
        Inputmask.extendAliases({
            rupiah: {
                prefix: "Rp. ",
                groupSeparator: ".",
                alias: "numeric",
                placeholder: "0",
                autoGroup: !0,
                rightAlign: false
            }
        });

        $("#rev").inputmask({alias: "rupiah"});
    });
</script>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Restitusi/Klaim/Ticketing</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Restitusi/Klaim/Ticketing</div>
                </div>
            </div>

            <div class="section-body">
                <form role="form" action="" method="POST" enctype="text">
                    <div class="form-group">
                        <label for="jenis_tiket">Jenis Laporan Tiket</label>
                        <select class="form-control" name="jenis_tiket" id="">
                            <option value="KLAIM">KLAIM</option>
                            <option value="TIKETING">TIKETING</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="notiket">No Tiket</label>
                        <input type = "text" name = "notiket" class = "form-control" id = "" required>
                    </div>

                    <div class="form-group">
                        <label for="msisdn_number">NO. Fastel</label>
                        <input type = "number" name = "nofastel" class = "form-control" id = "msisdn_number" required>
                    </div>

                    <div class = "form-group">
                        <label for = "msisdn_name">Nama Pelanggan</label>
                        <input type = "name" name = "namaplgn" class = "form-control" id = "msisdn_name" placeholder = "Enter Name" required = "required">
                    </div>
                    <div class = "form-group">
                        <label for = "msisdn_name">Alamat</label>
                        <input type = "name" name = "alamat" class = "form-control" id = "alamat" placeholder = "" required = "required">
                    </div>

                    <div class="form-group">
                        <label for="rev">Dasar Rekomendasi</label>
                        <textarea name="rekomendasi" class="form-control" rows="6" placeholder="DIISI ALASAN KENAPA DI RESTITUSI"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rev">Permasalahan Pelanggan</label>
                        <textarea name="permasalahan" class="form-control" rows="6" placeholder="Diisi permasalahan pelanggan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rev">Menyimpulkan sebagai berikut </label>
                        <textarea name="kesimpulan" class="form-control" rows="6" placeholder="Diisi persetujuan restitusi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rev">Adjustment Date</label>
                        <input type="text" name="Adjustmentdate" class="form-control" id="adjdate"  placeholder="Tagihan yang di Restitusi / Kompensasi" style="text-align: left;"/>
                    </div>
                    <div class="form-group">
                        <label for="rev">Adjustment Val.</label>
                        <input type="text" name="Adjustmentval" class="form-control" id="rev"  placeholder="Jumlah yang di Restitusi / Kompensasi" style="text-align: left;"/>
                    </div>


                    <input type="submit" class="btn btn-primary btn-block" value="Save">

                </form>
            </div>
        </section>
    </div>
<?php $this->load->view('dist/_partials/footer'); ?>