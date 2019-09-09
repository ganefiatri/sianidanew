<?php $model = $this->Disclaimer_model ?>
<link href="<?php echo base_url('assets/footable/css/footable.bootstrap.min.css') ?>" rel="stylesheet"/>
<script src="<?php echo base_url('assets/footable/js/footable.min.js') ?>"></script>
<script>

    $(function() {
        $('.footable').footable();
    });

</script>
<div class="col-md-12">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Logbook</h3>
            <div class="box-tools">
                <form action="" method="get" class="form-inline">
                    <input type="text" name="no" class="form-control" />
                    <input type="submit" class="btn btn-primary" />
                </form>
            </div>
        </div>


        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row">
                    <div class="col-sm-12">
                        <?= SIANIDA_ANNOUNC ?>
                        <table id="example2" class="table table-bordered table-hover footable" data-sorting="true" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th>Phone Number / Internet</th>
                                    <th>Customer Name</th>
                                    <th>Revenue</th>
                                    <th>CSR</th>
                                    <th data-type="date" data-format-string="DD/MM/YYYY">Date</th>
                                    <th></th>
                            </thead>
                            <tbody>
                                <?php
                                if ($this->ion_auth->get_users_groups()->row()->id == 1) {
                                    //$logbook = $this->db->get_where('logbook', array('tipe' => 1));
                                } else {
                                    $logbook = $this->db->get_where('logbook', array('tipe' => 1, 'author' => $this->ion_auth->user()->row()->id));
                                }
                                foreach ($logbook->result() as $row) {
                                    $tbl_del = null;
                                    if ($this->ion_auth->get_users_groups()->row()->id == 1) {
                                        $tbl_del = sprintf('<a href="%s" class="btn btn-danger btn-xs">Hapus</a>', site_url('logbook/hapus/' . $row->id));
                                    }

                                    $tipe = array('', 'Telkomsel', 'Telkom');
                                    $status = array('Pending', 'Closed',);
                                    echo sprintf('<tr style="    text-transform: uppercase;">
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>Rp. %s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>
                                    <a href = "%s" class = "btn btn-default btn-xs">View</a>
                                    <a href = "%s" class = "btn btn-default btn-xs">Edit</a>
                                    %s
                                    </td>
                                    </tr>', $row->msisdn, $row->nama_plgn, $row->revenue, $this->ion_auth->user($row->author)->row()->full_name, date("d-m-Y", $row->date), site_url('logbook/detail/' . $row->id), site_url('logbook/edit/' . $row->id), $tbl_del);
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
            <?php echo $this->pagination->create_links(); ?>

        </div>





    </div>


