<?php
if (isset($_GET['sort'])) {
    $statusorder = site_url('logbook/telkom');
} else {
    $statusorder = '?sort=status&order=asc';
}
?><style>
    td.Closed{
        background: limegreen;
        color: #fff;
    }
    td.Pending{
        background: red;
        color: #fff;
    }
</style>
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
                    <input type="hidden" name="telkom" value="TRUE" />
                    <input type="submit" class="btn btn-primary" />
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#example2').on('click', 'tbody tr', function(event) {

                    $(this).addClass('bg-info').siblings().removeClass('bg-info');
                });
            });
        </script>
        <style>
            .table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th {
                background-color: #550055;
                color:#eeeeee;
            }
        </style>
        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row">
                    <div class="col-sm-12">
                        <?= SIANIDA_ANNOUNC ?>
                        <table id="example2" class="table table-bordered table-hover footable" data-sorting="true" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <?php
                                    if (strtoupper($this->uri->segment(2, 0)) == "BAST") {
                                        echo '<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Internet No.</th>';
                                    }
                                    ?>
                                    <th>Customer Name</th>
                                    <th>Customer Case</th>
                                    <th data-sort-ignore="true"><a href="<?= $statusorder ?>">Status</a></th>
                                    <th data-type="date" data-format-string="DD/MM/YYYY">Date</th>
                                    <th>CSR</a></th>
                                    <th></th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($logbook->result() as $row) {
                                    $row_internetno = $tbl_del = null;
                                    if ($this->ion_auth->get_users_groups()->row()->id == 1) {
                                        $tbl_del = sprintf('<a href="%s" class="btn btn-danger btn-xs">Hapus</a> %s', site_url('logbook/hapus/' . $row->id), $row->num_results);
                                    }

                                    if (strtoupper($this->uri->segment(2, 0)) == "BAST") {
                                        $row_internetno = sprintf('<td>%s</td>', $row->internet_no);
                                    }

                                    $tipe = array('', 'Telkomsel', 'Telkom');
                                    $status = array('Pending', 'Closed',);
                                    echo sprintf('<tr style="text-transform: uppercase;">
                                        %s
	                    			<td>%s</td>
	                    			<td>%s</td>
	                    			<td class="%s" >%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
	                    			<td class="clickable-row">
	                    			<a href="%s" class="btn btn-default btn-xs">View</a>
                                                <a href="%s" class="btn btn-danger btn-xs">Edit</a>
                                                %s
	                    			</td>
	                    			</tr>', $row_internetno, $row->nama_plgn, $row->case_type, $status[$row->status], $status[$row->status], date('d-m-Y', $row->date), $this->ion_auth->user($row->author)->row()->full_name, site_url('logbook/detail/' . $row->id), site_url('logbook/edit/' . $row->id), $tbl_del);
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


