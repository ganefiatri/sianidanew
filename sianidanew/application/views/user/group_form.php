<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$usergroups = $this->ion_auth->users($groupdata->id)->result();

?>
<div class="col-md-12">
          <div class="box box-info">
              <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title">User group detail</h3>
              <a href="#adduser" data-toggle="modal" data-target="#adduser" class="btn btn-default btn-sm pull-right"><i class="fa fa-user-plus"></i> Add user</a>
              <!-- /.box-tools -->
            </div>
              
              <div class="box-body">
                  <table class="table table-responsive table-hover">
                      <th>Username</th>
                      <th>Display Name</th>
                      <th>Act</th>
                  <?php
                  if($usergroups == NULL)
                  {
                      echo '<tr><td colspan="3" style="text-align: center;">'.$msg_no_data.'</td></tr>';                  
                      
                  }
                  foreach($usergroups as $user){
                    echo sprintf('<tr><td>%s</td> <td>%s</td> <td>%s</td></tr>',$user->username,$user->full_name,$user->id);
                  }
                  ?>
                  
                  
                  
                  </table>
                  <?php 
                  die;
                  if(!empty($_GET['msg']))
                  {
                    echo sprintf('<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Info!</h4>
                %s
              </div>',$_GET['msg']);
                  }

                  ?>
                  <?php
                  $full_name = $id = $username = $email = null; 
                  $form_action = site_url('user/upost');
                  if($userdata != NULL){
                  //$form_action = site_url('user/uupdate');
                  $id= sprintf('<input name="id" type="hidden" value="%s" />',$userdata->id);
                  $email = $userdata->email;
                  $username = $userdata->username;
                  $full_name = $userdata->full_name;
                  }
                  ?>
                  <form class="form-horizontal" method="post" action="<?php echo $form_action?>">
              
               <div class="<?php if($userdata != null) echo 'col-md-6'; else{ echo 'col-md-12';}?>">    
               <?php echo $id;?>
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                      <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Username" value="<?php echo $username?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Display Name</label>

                  <div class="col-sm-10">
                      <input name="full_name" type="input" class="form-control" id="inputEmail3" placeholder="Username" value="<?php echo $full_name?>">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                      <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?php echo $email?>">
                  </div>
                </div>
                   
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Group</label>

                  <div class="col-sm-10">
                      <select name="group" class="form-control">
                          <?php 
                          foreach($groups as $group){
                            $selected = null;
                            if(!empty($userdata))
                            {
                              if($group->id == $this->ion_auth->get_users_groups($userdata->id)->row()->id)
                              {
                                $selected = 'selected = "selected"';
                              }
                            }
                            echo sprintf('<option %s value="%s">%s</option>',$selected,$group->id,$group->name);
                           }?>
                      </select>
                  </div>
                </div>   

                <?php if($userdata == null){?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                      
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>

                  <div class="col-sm-10">
                    <input name="password2" type="password" class="form-control" id="inputPassword3" placeholder="Retype Password">
                  </div>
                </div>      

                <?php }?>
               </div>
                
                <?php if($userdata != null){?>
                <div class="col-md-6">
                      <p align="center">Password Change</p>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                      
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>

                  <div class="col-sm-10">
                    <input name="password2" type="password" class="form-control" id="inputPassword3" placeholder="Retype password">
                  </div>
                </div>      
              </div>
              <?php }?>
                      
            </div>          
              <!-- /.box-body -->
              <div class="box-footer">
                  
                <a href="<?php echo site_url('user/ulist') ?>" class="btn btn-danger">Cancel</a>
                <?php if($userdata == NULL){?><button type="reset" class="btn btn-warning">Reset</button><?php }?>
                <button type="submit" class="btn btn-primary pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
              </div>
          </div>
</div>

<!-- MODAL-->
<div id="adduser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>