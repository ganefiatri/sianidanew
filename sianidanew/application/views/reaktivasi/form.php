<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
    <div class="main-content">
    <section class="section">
    <div class="section-header">
        <h1>Reaktivasi Kartu Halo</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Reaktivasi Kartu Halo</div>
        </div>
    </div>

    <div class="section-body">
        <form role="form" class="box-body" action="<?php echo site_url('ReaktivasiKartuHalo/submit') ?>" method="POST" enctype="text">
            <div class = "form-group">
                <label for = "msisdn_name">Nama Pelanggan</label>
                <input type = "name" name = "msisdn_name" class = "form-control" id = "msisdn_name" placeholder = "Enter Name" required = "required">
            </div>
            <div class="form-group">
                <label for="msisdn_number">MSISDN</label>
                <input type = "number" name = "msisdn_number" class = "form-control" id = "msisdn_number" placeholder = "62">
            </div>

            <table class="table table-bordered">
                <thead style="border-bottom: 3px solid #ddd;background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
                <th>FITUR SEBELUM TERMINASI(*)</th>
                <th>FITUR YANG AKAN DIAKTIFKAN KEMBALI(*)</th>
                </thead>
                <?php
                $row = 1;
                while ($row <= 6) {
                    switch ($row) {
                        case 1:
                            $val = 'value = "BC : "';
                            break;
                        case 2:
                            $val = 'placeholder = "Paket Kartu : "';
                            break;
                        default:
                            $val = null;
                    }
                    ?>
                    <tr>
                        <td>
                            <input type="text" name="col1_<?php echo $row ?>" class="form-control" <?php echo $val ?>>
                        </td>
                        <td>
                            <input type="text" name="col2_<?php echo $row ?>" class="form-control" <?php echo $val ?>>
                        </td>
                    </tr>



                    <?php
                    $row++;
                }
                ?>

            </table>

            <input type="submit" class="btn btn-primary btn-block" value="Save">

        </form>
    </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>