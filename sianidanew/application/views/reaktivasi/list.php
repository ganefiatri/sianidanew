<?php $model = $this->Disclaimer_model ?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!--    test-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Reaktivasi Kartu Halo</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Views</a></div>
                <div class="breadcrumb-item">Reaktivasi Kartu Halo</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Reaktivasi Kartu Halo</h4>
                        <a href="<?php echo site_url('logbook/new') ?>" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="New Form">
                            <i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>CSR</th>
                                <th>Phone Number / Internet</th>
                                <th>CUSTOMER NAME</th>
                                <th>Customer Name</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($logbook[0]->result() as $row) {
                                $tbl_del = null;
                                if ($this->ion_auth->get_users_groups()->row()->id == 1) {
                                    $tbl_del = sprintf('<a href="%s" class="btn btn-danger btn-xs">Hapus</a>', site_url('ReaktivasiKartuHalo/hapus/' . $row->id));
                                }

                                $tipe = array('', 'Telkomsel', 'Telkom');
                                $status = array('Pending', 'Closed',);
                                echo sprintf('<tr style="    text-transform: uppercase;">
                                        <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>
                                    <a href = "%s" class = "btn btn-primary btn-xs">View</a>
                                    %s
                                    </td>
                                    </tr>', $this->ion_auth->user($row->author)->row()->full_name, $row->msisdn, $row->nama, date("d-m-Y", $row->waktu), site_url('ReaktivasiKartuHalo/detail/' . $row->id), $tbl_del);
                            }
                            ?>
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


