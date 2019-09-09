<div class="col-md-12">
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if($this->ion_auth->get_users_groups()->row()->id != 1){
  echo sprintf('<div class="box box-danger"> 
                <div class="box-body">
                %s
                </div>
                </div>', $no_permission);
}else{

?>
          <div class="box box-info">
              <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title">groups management</h3>

              <div class="box-tools pull-right">
                  <a href="<?php echo site_url('user/gnew')?>" class="btn btn-success"/><span class="fa fa-plus"></span> New</a>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
              
              <div class="box-body">
                  <table class="table table-responsive table-hover">
                      <tr style="    border-bottom: 3px solid #ddd;
    /* background: #ddd; */
    background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
                          <th>Name</th>
                          <th>Description</th>
                          <th>Act</th>
                      </tr>
                      <?php
                      foreach ($groups as $group){
                          echo sprintf('<tr>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td><a class="btn btn-default btn-xs" href="%s"><span class="fa fa-pencil-square-o"></span> Edit</a></td>
                                        </tr>',
                                  $group->name,
                                  $group->description,
                                  site_url('user/gedit/'.$group->id)
                                  );
                      }
                      ?>
                  </table>
              </div>
          </div>

<?php } ?>          
</div> 