<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<script>
    // A $( document ).ready() block.
    function recordDelete(i) {
        if (confirm("Are you sure you want to delete this?")) {
            $("#delete-button").attr("href", "<?= site_url('registrasi/hapus/') ?>" + i);
        } else {
            return false;
        }
        return null;              // The function returns the product of p1 and p2
    }

</script>
<!--    test-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>UnRegistrasi Prepaid</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Views</a></div>
                <div class="breadcrumb-item">UnRegistrasi Prepaid</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>UnRegistrasi Prepaid</h4>
                        <a href="<?php echo site_url('logbook/new') ?>" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="New Form">
                            <i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>CSR</th>
                                <th>KTP</th>
                                <th>CUSTOMER NAME</th>
                                <th>DATE</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($logbook[0]->result() as $row) { ?>
                                <tr>
                                    <td><?= $this->ion_auth->user($row->author)->row()->full_name ?></td>
                                    <td><?= $row->ktp ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= date('Y-m-d H:i', $row->waktu) ?></td>
                                    <td><a href="<?= site_url('registrasi/detail/' . $row->id) ?>" class="btn btn-primary btn-xs">view</a>
                                        <?php if ($this->ion_auth->in_group(array(1))) { ?>
                                        <a href="#" class="btn btn-danger btn-xs" id="delete-button" onclick="recordDelete(<?= $row->id ?>)">delete</a></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- --><?php //echo $this->pagination->create_links(); ?>
    <?php $this->load->view('dist/_partials/js'); ?>

