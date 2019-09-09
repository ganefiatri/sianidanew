<style>
    td.Closed{
        background: limegreen;
        color: #fff;
    }
    td.Pending{
        background: red;
        color: #fff;
    }
</style>
<div class="col-md-12">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Logbook</h3>
            <div class="box-tools">
                <form action="" method="get">

                    <input type="text" name="no" />
                    <input type="hidden" name="telkom" value="TRUE" />
                    <input type="submit" class="btn btn-primary" />
                </form>
            </div>
        </div>


        <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">

                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Customer Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Customer Case</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">CSR</th>

                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"></th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($logbook->result() as $row) {
                                    $tipe = array('', 'Telkomsel', 'Telkom');
                                    $status = array('Pending', 'Closed',);
                                    echo sprintf('<tr style="    text-transform: uppercase;">
	                    			<td>%s</td>
	                    			<td>%s</td>
	                    			<td class="%s" >%s</td>
                                                <td>%s</td>
                                                <td>%s</td>
	                    			<td>
	                    			<a href="%s" class="btn btn-default btn-xs">View</a>
                                                <a href="%s" class="btn btn-danger btn-xs">Edit</a>
	                    			</td>
	                    			</tr>', $row->nama_plgn, $row->case_type, $status[$row->status], $status[$row->status], date('d-m-Y', $row->date), $this->ion_auth->user($row->author)->row()->full_name, site_url('logbook/detail/' . $row->id), site_url('logbook/edit/' . $row->id));
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


