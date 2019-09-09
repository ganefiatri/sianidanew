<?php //var_dump($restitusi->nama_pelanggan); ?>


    <div class="divclass3 box-body" style="display:none">
        <table class="table">
            <thead>
            <th>Date</th>
            <th>CSR</th>
            <th>Nama Pelanggan</th>
            <th>Nomor Pelanggan</th>
            <th>Nama Pelapor</th>
            <th>Alasan Klaim</th>
            <th>Nominal Klaim</th>
            </thead>
            <?php
            foreach ($restitusi as $row) {?>
                <tbody>
                    <td><?php echo date('m/d/Y', $row->date) ?></td>
                    <td><?php echo $this->ion_auth->user($row->author)->row()->full_name  ?></td>
                    <td><?php echo $row->nama_pelanggan  ?></td>
                    <td><?php echo $row->nomor_pelanggan ?></td>
                    <td><?php echo $row->nama_pelapor ?></td>
                    <td><?php echo $row->alasan ?></td>
                    <td><?php echo $row->nominal ?></td>
            <?php }?>
                </tbody>
        </table>
        <!-- <tr class="end"><td>Total</td><td></td><td></td><td><?php echo $total ?></td></tr> -->
    </div>
    <script>
        $("#btnExport3").click(function(e) {
            let file = new Blob([$('.divclass3').html()], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
                href: url,
                download: "restitusi.xls"}).appendTo("body").get(0).click();
            e.preventDefault();
        });
    </script>


    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('dist/_partials/header');
    ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Restitusi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Views</a></div>
                    <div class="breadcrumb-item">Restitusi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Restitusi</h4>
                            <div>
                                <button class="btn btn-success" id="btnExport3" onclick="">Print</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Pelapor</th>
                                    <th>Nomor pelanggan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <?php
                                foreach ($restitusi as $res) {?>
                                <tbody>

                                <td><?php echo $res->nama_pelanggan ?></td>
                                <td><?php echo $res->nama_pelapor ?></td>
                                <td><?php echo $res->nomor_pelanggan ?></td>
                                <td>
                                    <a href="<?= site_url('Restitusi_Controller/res_detail/'.$res->id) ?>" class="btn btn-primary btn-xs">View</a>
                                    <?php
                                    $user = $this->session->userdata('username');
                                    if($user == "henriques" || $user == "admin") { ?>
                                        <a href="<?= site_url('Restitusi_Controller/edit_res/'.$res->id) ?>" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="<?= site_url('Restitusi_Controller/hapus/'.$res->id) ?>" class="btn btn-danger btn-xs" onClick="return doconfirm();">Delete</a>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function doconfirm()
            {
                job=confirm("Are you sure to delete permanently?");
                if(job!=true)
                {
                    return false;
                }
            }
        </script>
    </div>

    <!-- --><?php //echo $this->pagination->create_links(); ?>
    <?php $this->load->view('dist/_partials/js'); ?>

