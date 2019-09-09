<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$groups = $this->ion_auth->groups()->result()
?>
<div class="col-md-12">
          <div class="box box-info">
              <div class="box-header with-border">
              <i class="fa fa-user"></i>
              <h3 class="box-title">User Credential</h3>

              <!-- /.box-tools -->
            </div>
              
              <div class="box-body">
                  <?php 
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
                  <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo $form_action?>">
              
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

                <!-- upload foto -->
                <!-- <div class="form-group">
                    <label for="gambar" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-10">
                        <input name="gambar" type="file" class="form-control" id="gambar">
                    </div>
                </div>  -->
                   
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
                      <p style="align:center">Password Change</p>
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