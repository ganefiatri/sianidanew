<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<Script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Disclaimer</h3>
              <div class="box-tools">
                  <a href="<?php echo site_url('home/NewForm') ?>" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="New Form">
                  <i class="fa fa-plus-circle"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
          <?php $this->load->view('form_disclaimer/list.php'); ?>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>