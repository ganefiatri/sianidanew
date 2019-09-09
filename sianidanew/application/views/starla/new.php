<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Starla</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Forms</a></div>
                <div class="breadcrumb-item">Starla</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-md-12" style="">
    <div class="form-group col-md-12" style="">

        <form method="post" action="<?php echo site_url('Starla_controller/insert'); ?>">
            <input type="hidden" value="<?php echo $this->ion_auth->user()->row()->id ?>" name="petugas">
            <label for ="">Customer Service</label>
            <select name="csnameform" class="form-control">
                <option value="32">RIZKI AMALIA SITOMPUL</option>
                <option value="33">DESI PURNAMA SARI</option>
                <option value="29">VERDINAN SIDAURUK</option>
                <option value="30">ANGGITA</option>
                <option value="9">MHD NADA ALFARISI LUBIS</option>
                <option value="14">ERINA NOVELIA</option>
                <option value="15">KRISTIAN DANIEL PANGGABEAN</option>
                <option value="16">INDRA LESMANA</option>
                <option value="17">NABILA DWI UTARI</option>
                <option value="19">SULASTRI NABABAN</option>
                <option value="22">DARA ASDALOLA HARAHAP</option>
                <option value="23">WAN HERLIN AFIF TRISETIA BAROS</option>
                <option value="24">YENI TANIA NAINGGOLAN</option>
                <option value="18">NURHARIYANTI VERONIKA</option>
                <option value="7">HELDA RICARDA BANCIN</option>
            </select>
            <div class="form-group" style="padding-top: 20px">
                <label for="tanggal">Tanggal Sample</label>
                <input name="tanggal" type="date" id="tanggal" class="form-control">
            </div>
            <div class="form-group" style="padding-top: 20px">
                <label for="topik">Topik Layanan</label>
                <input class="form-control" type="text" name="topik" placeholder="Masukkan Topik Layanan">
            </div>

            <input type="submit" class="btn btn-primary btn-block" value="Save">
        </form>
    </div>


    <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
            location.href = "logbook/plcsr2";
        };
    </script>

</div>
        </div>
    </section>
</div>
<?php //var_dump($starla) ?>

<?php $this->load->view('dist/_partials/footer'); ?>
