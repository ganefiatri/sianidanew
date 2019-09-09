<div>
<h2 style="text-align:center">LIST FORM SURAT PERNYATAAN GANTI KARTU M-BANKING</h2><br><br>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    <div class="table-responsive">
        <style>
            th, td {
                padding: 15px;
                text-align: left;
            }
            ul li {
                list-style:none;
                padding:10px;
                font-weight:bold;
            }
            .my-custom-scrollbar {
                position: relative;
                height: 550px;
                overflow: auto;
            }
            .table-wrapper-scroll-y {
                display: block;
            }
        </style>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
     <table id="user_data" class="table-wrapper-scroll-y my-custom-scrollbar" border='1px' style="">
        <thead class="bg-primary">  
            <tr>  
                <th>Tanggal</th>
                <th>CS</th>  
                <th>Nama Customer</th>  
                <th>Nik</th>
                <th>Msisdn</th>
                <th>Alamat</th>                                                                 
                <th>Action</th>
            </tr>  
        </thead>  
        <?php foreach ($formsp as $row) { ?>
        <tbody>
            <tr>
                <td><?php echo date("d-m-Y", $row->date) ?></td>
                <td><?php echo sprintf('<small>%s</small>', $this->ion_auth->user($row->author)->row()->full_name) ?></td>
                <td><?= $row->nama_customer ?></td>
                <td><?= $row->nik ?></td>
                <td><?= $row->msisdn ?></td>
                <td><?= $row->alamat ?></td>
                <td>
                    <a href="<?= site_url('Mbanking_Controller/sp_detail/'.$row->id) ?>" class="btn btn-success btn-xs">View</a>
                    <?php 
                    $user = $this->session->userdata('username');
                    if($user == "henriques" || $user == "admin") { ?> 
                        <a href="<?= site_url('Mbanking_Controller/edit_sp/'.$row->id) ?>" class="btn btn-warning btn-xs">Edit</a>
                        <a href="<?= site_url('Mbanking_Controller/hapus_sp/'.$row->id) ?>" class="btn btn-danger btn-xs" onClick="return doconfirm();">Delete</a>
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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
</div>