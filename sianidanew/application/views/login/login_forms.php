<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<body class="hold-transition login-page" style="
      background-image: url(<?php echo base_url('login.jpg') ?>);
      background-size: COVER;
      BACKGROUND-POSITION:BOTTOM
      ">

    <?php
    if (isset($_GET['stat'])) {
        switch ($_GET['stat']) {
            case '1':
                $msg = '<div class="alert alert-danger">
            User Credential is required!
            </div>';
                break;
            case '2':
                $msg = '<div class="alert alert-info">
            You already sign out, Thank you.
            </div>';
                break;
        }
    }

    if (isset($_GET['msg'])) {
        $message = '<div class="alert alert-danger">' . $_GET['msg'] . '</div>';
    }
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    ?>
    <style>
        #judulwarna > span{
            text-shadow: 2px 2px #000
        }
    </style>
    <div class="col-md-4" style="height: 100px;top: 10px;left: -10px;"><img class="animated infinite tada" src="<?php echo base_url('logo2.png') ?>" style="width: 190px;"></div>
    <div class="col-md-4" style="height: 100px;top: 10px;font-family: 'Nosifer', serif;left: -10px;"><p class="animated bounceIn" id="judulwarna" style="
                                                                                                        font-family: 'Monoton', cursive;
                                                                                                        font-size: 68px;
                                                                                                        text-align: center;
                                                                                                        margin-bottom: -20px;
                                                                                                        "><span style="color:red">S</span><span style="color:#03A9F4">I</span><span style="color:#76FF03">A</span><span style="color:#AA00FF">N</span><span style="color:#E8CA0C">I</span><span style="color:#E8980C">D</span><span style="color:#000">A</span>
        </p>
        <p style="text-align:center;font-family: 'Ubuntu', sans-serif;    text-shadow: 2px 2px #000;
    color: #fff !important;">SISTEM PENYIMPANAN INFORMASI DATA DIGITAL</p></div>
    <div class="col-md-4" style="top: 10px;"><img class="animated infinite tada" src="<?php echo base_url('logo1.png') ?>" style="width: 180px;float: right;"></div>
    <div class="col-md-3 col-md-offset-9" style="/* max-height: 500px; */    top: 40px; opacity: 1">

        <!-- /.login-logo -->
        <div class="login-box-body" style="    box-shadow: 0px 1px 10px 0px #000;
}">
            <form action="<?php echo site_url('user/login'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input name="username" type="text" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="">
                    <!-- /.col -->
                    <div class="">
                        <input name="submit" type="submit" class="btn btn-default btn-block" value="Login" />
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-box-body -->


    </div>
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>


</body>