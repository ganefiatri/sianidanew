<script src="<?php echo base_url('assets/footable/js/footable.min.js') ?>"></script>
<script>

    $(function() {
        $('.footable').footable();
    });

</script>
<div class="col-md-12">
    <?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    if ($this->ion_auth->get_users_groups()->row()->id != 1) {
        echo sprintf('<div class="box box-danger">
                <div class="box-body">
                %s
                </div>
                </div>', $no_permission);
    } else {
        ?>
        <div class="box box-info">
            <div class="box-header with-border">
                <i class="fa fa-user"></i>
                <h3 class="box-title">User management</h3>

                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('user/unew') ?>" class="btn btn-success"/><span class="fa fa-plus"></span> New</a>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>

            <div class="box-body">
                <?= SIANIDA_ANNOUNC ?>
                <table class="table table-responsive table-hover footable" data-sorting="true">
                    <tr style="    border-bottom: 3px solid #ddd;
                        /* background: #ddd; */
                        background-image: linear-gradient(-180deg, #fafbfc 0%, #eff3f6 90%);">
                        <th class="sorting">Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th>Act</th>
                    </tr>
                    <?php
                    foreach ($users as $user) {
                        $usergroup = $this->ion_auth->get_users_groups($user->id)->row();
                        echo sprintf('<tr>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td>%s</td>
                                        <td><a class="btn btn-default btn-xs" href="%s"><span class="fa fa-pencil-square-o"></span> Edit</a></td>
                                        </tr>', $user->username, $user->full_name, $user->email, $usergroup->name, site_url('user/uedit/' . $user->id)
                        );
                    }
                    ?>
                </table>
            </div>
        </div>

        <?php
    }

    $config['base_url'] = current_url();
    $config['total_rows'] = count($users);
    $config['per_page'] = 20;

    $this->pagination->initialize($config);

    echo $this->pagination->create_links();
    ?>

</div>