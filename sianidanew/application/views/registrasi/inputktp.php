<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Unreg Prepaid</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Unreg Prepaid</div>
                </div>
            </div>

            <div class="section-body">
                <form role="form" class="box-body" action="" method="POST" enctype="text">
                    <div class = "form-group">
                        <label for = "msisdn_name">NIK KTP</label>
                        <input type = "name" name = "ktp" class = "form-control" id = "ktp" required = "required">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Ok">
                </form>
            </div>
        </section>
    </div>

<?php $this->load->view('dist/_partials/footer'); ?>