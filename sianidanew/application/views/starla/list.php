
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>STARLA LIST</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Views</a></div>
                <div class="breadcrumb-item">STARLA LIST</div>
            </div>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>STARLA LIST</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>CS</th>
                                <th>Nama Petugas</th>
                                <th>Topik</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php foreach ($starla as $row) { ?>
                                <tbody>
                                <tr>
                                    <td><?php echo date("d-m-Y", $row->date) ?></td>
                                    <td><?php echo $this->ion_auth->user($row->author)->row()->full_name ?></td>
                                    <td><?= $this->ion_auth->user($row->petugas)->row()->full_name ?></td>
                                    <td><?= $row->topik ?></td>
                                    <td><?php if ($row->total == NULL){echo '<a href="#" class="btn btn-warning">NILAI TIDAK ADA!</a>';}elseif($row->total < 90){echo '<a href="#" class="btn btn-danger">NILAI HUH!</a>';}else {echo '<a href="#" class="btn btn-success">GOOG JOB!</a>';} ?></td>
                                    <td>
                                        <a href="<?= site_url('Starla_controller/insert_view/'.$row->id) ?>" class="btn btn-primary btn-xs">View</a>
                                        <?php
                                        $user = $this->session->userdata('username');
                                        if($user == "henriques" || $user == "admin") { ?>
                                            <a href="<?= site_url('Starla_controller/plcsr2/'.$row->id) ?>" class="btn btn-warning btn-xs">Nilai</a>

                                            <a href="<?= site_url('Starla_controller/hapus/'.$row->id) ?>" class="btn btn-danger btn-xs" onClick="return doconfirm();">Hapus</a>
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
                                </tr>
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



    <!-- <script type="text/javascript" language="javascript">

            var save_method; //for save method string
            var table;

            $(document).ready(function() {
                //datatables
                table = $('#user_data').DataTable({
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo site_url('Mbanking_Controller/mbanking_json'); ?>',
                        "type": "POST"
                    },
                });

            });
    </script>   -->