<div class="col-md-12">
    <div class="col-md-6">
        <div class="box box-solid bg-teal-gradient">
            <form method="post" action="<?php echo site_url('VisitCashier/save') ?>">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-th"></i>
                    <h3 class="box-title">Telkom</h3>
                </div>
                <div class="box-body border-radius-none">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="number" name="msisdn_telkom" class="form-control">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-border"><input type="submit" value="ok" class="btn btn-block btn-default"></div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    <div class="col-md-6">

        <div class="box box-solid bg-maroon-gradient">
            <form method="post" action="<?php echo site_url('VisitCashier/save') ?>">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                    <i class="fa fa-th"></i>
                    <h3 class="box-title">Telkomsel</h3>
                </div>
                <div class="box-body border-radius-none">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="number" name="msisdn_telkomsel" class="form-control">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-border"><input type="submit" value="ok" class="btn btn-block btn-default"></div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>


    <?php $this->load->view('visitcashier/list.php') ?>
</div>


