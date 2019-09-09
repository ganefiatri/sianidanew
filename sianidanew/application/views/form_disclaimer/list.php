<script>
    // A $( document ).ready() block.
    function recordDelete(i) {
        if (confirm("Are you sure you want to delete this?")) {
            $("#delete-button").attr("href", "<?= site_url('home/delete_disclaimer/') ?>" + i);
        } else {
            return false;
        }
        return null;              // The function returns the product of p1 and p2
    }

</script>
<link href="<?php echo base_url('assets/footable/css/footable.bootstrap.min.css') ?>" rel="stylesheet"/>
<script src="<?php echo base_url('assets/footable/js/footable.min.js') ?>"></script>
<?php $model = $this->Disclaimer_model ?>
<?= SIANIDA_ANNOUNC ?>
<div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hoverfootable footable" data-sorting="true" role="grid" aria-describedby="example2_info"  data-sorting="true">
                <thead>
                    <tr role="row">
                        <th>MSISDN No.</th>
                        <th>MSISDN Name</th>
                        <th>CSR</th>
                        <th data-type="date" data-format-string="DD/MM/YYYY">Date</th>
                        <th></th>

                </thead>
                <tbody>
                    <?php foreach ($this->Disclaimer_model->get_all_disclaimer()->result() as $row) {
                        ?>
                        <tr role="row">
                            <td><?= $row->msisdn ?></td>
                            <td><?= $row->msisdn_name ?></td>
                            <td><?= $this->ion_auth->user($row->author)->row()->full_name ?></td>
                            <td><?= date('d-m-Y H:i:s', $row->date) ?></td>

                            <td>
                                <a class="btn btn-default btn-xs" href="" onclick="<?= "window.open('" . site_url('home/FormRead/' . $row->id) . "', 'newwindow', 'width=1000,height=600'); return false;" ?>">view</a>
                                <a class="btn btn-warning btn-xs" href="" onclick="% s">edit</a>
                                <a href="#" class="btn btn-danger btn-xs" id="delete-button" onclick="recordDelete(<?= $row->id ?>)">delete</a>
                            </td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table></div></div>

    <div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing <?php echo $model->get_all_disclaimer()->num_rows() ?> to 10 of <?php echo $model->count_all() ?> entri(es)</div></div>
        <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                <ul class="pagination">
                    <li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                    <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
                </ul></div></div></div></div>

<script>
    jQuery(function($) {
        $('.table').footable();
    });
</script>