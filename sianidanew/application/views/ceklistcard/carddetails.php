

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>GANTI KARTU M-BANKING</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Views</a></div>
                <div class="breadcrumb-item">GANTI KARTU M-BANKING</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>GANTI KARTU M-BANKING</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>NAMA CSR</th>
                                <th>NIK</th>
                                <th>MSISDN</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <?php
                                $user = $this->session->userdata('username');
                                if($user == "henriques" || $user == "admin" || $user == "13009332" || $user == "medihafiz" || $user == "15009624" || $user == "18009334") { ?>
                                    <th>ACTION</th>
                                <?php } ?>
                            </tr>
                            </thead>
                            <?php foreach ($mbanking as $row) { ?>
                                <tbody>
                                <td><?php echo sprintf('<small>%s</small>', $this->ion_auth->user($row->author)->row()->full_name) ?></td>
                                <td><?= $row->nik ?></td>
                                <td><?= $row->msisdn ?></td>
                                <td><?php echo date("d-m-Y", $row->date) ?></td>
                                <td>
                                    <?php
                                    if ($row->cek == 0){
                                        echo '<a href="#" class="btn btn-danger">NOT APPROVED</a>';
                                    }else {
                                        echo '<a href="#" class="btn btn-success">APPROVED</a>';
                                    }
                                    ?>
                                </td>
                                <!--            --><?php //
                                //            $color = array('red','green');
                                //            $status = array('NOT APPROVE', 'APPROVED');
                                //            echo sprintf('<td style="background-color:%s">%s</td>',$color[$row->cek],$status[$row->cek]);
                                //            ?>
                                </td>
                                <td>
                                    <?php
                                    $user = $this->session->userdata('username');
                                    if($user == "henriques" || $user == "admin" || $user == "13009332" || $user == "medihafiz" || $user == "15009624" || $user == "18009334") { ?>
                                        <a href="<?= site_url('Mbanking_Controller/mbanking_detail/'.$row->id) ?>" class="btn btn-primary btn-xs">View</a>
                                    <?php } ?>
                                    <?php
                                    $user = $this->session->userdata('username');
                                    if($user == "henriques" || $user == "admin") { ?>

                                        <a href="<?= site_url('Mbanking_Controller/hapus/'.$row->id) ?>" class="btn btn-danger btn-xs" onClick="return doconfirm();">Delete</a>
                                    <?php } ?>
                                </td>

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
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- --><?php //echo $this->pagination->create_links(); ?>
<?php $this->load->view('dist/_partials/js'); ?>

